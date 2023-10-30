<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Follower;
use App\Models\Listing;
use App\Models\ListingEnquiry;
use App\Models\ListingReview;
use App\Models\Location;
use Jenssegers\Agent\Agent;
use App\Models\RecentViewsListing;
use App\Models\User;
use App\Models\Wishlists;
use Illuminate\Http\Request;

class DirectoryController extends Controller
{
    public function listing(Request $request)
    {
        $categories = $request->category ? $request->category[0] : null;
        $locations = $request->location ? $request->location[0] : null;
        $types = $request->type ? $request->type[0] : null;
        $types = $request->type ? $request->type[0] : null;
        $real_address = $request->real_address ? $request->real_address : null;

        $data['categories'] = Category::whereIsTop(1)->orderBy('id','desc')->get();
        $data['locations'] = Location::whereStatus(1)->orderBy('id','desc')->get();

        $data['listings'] = Listing::when($categories,function($query,$categories){
                                            $categories = explode(",",$categories);
                                            foreach($categories as $key=>$category){
                                                $cat = Category::whereSlug($category)->first();
                                                if($key == 0){
                                                    if($cat != NULL){
                                                        $query->where('category_id',$cat->id);
                                                    }
                                                }else{
                                                    if($cat != NULL){
                                                        $query->orWhere('category_id',$cat->id);
                                                    }
                                                }
                                            }
                                            return $query;
                                        })
                                        ->when($locations,function($query,$locations){
                                            $locations = explode(",",$locations);
                                            foreach($locations as $key=>$location){
                                                if($key == 0){
                                                    $query->where('location_id',$location);
                                                }else{
                                                    $query->orWhere('location_id',$location);
                                                }
                                            }
                                            return $query;
                                        })
                                        ->when($types,function($query,$types){
                                            $types = explode(",",$types);
                                            foreach($types as $key=>$type){
                                                if($key == 0){
                                                    $query->where('type',$type);
                                                }else{
                                                    $query->orWhere('type',$type);
                                                }
                                            }
                                            return $query;
                                        })
                                        ->when($real_address, function ($q) use ($real_address) {
                                            return $q->where('real_address', 'LIKE', "%$real_address%");
                                        })
                                        ->whereStatus(1)
                                        ->orderBy('id', 'desc')
                                        ->paginate(6);
        if($request->ajax()){
            return view('partials.front.listing',$data);
        }

        return view('frontend.list', $data);
    }

    public function listingDetails($slug){
        $data = Listing::whereSlug($slug)->whereStatus(1)->first();
        $data['amenities'] = $data->amenities != NULL ? json_decode($data->amenities,true) : [];
        $data['schedules'] = $data->schedules != NULL ? json_decode($data->schedules,true) : [];
        $data['reviews'] = ListingReview::whereListingId($data->id)->whereStatus(1)->paginate(3);
        $data['data'] = $data;

        if(auth()->user()){
            $this->recentViews($data->id,$data->user_id);
            $data['recentViews'] = RecentViewsListing::whereNotIn('listing_id',[$data->id])->whereUserId(auth()->id())->orderBy('id','desc')->limit(4)->get();
        }

        if($data){
            return view('frontend.details',$data);
        }else{
            return view('errors.404');
        }
    }

    public function recentViews($id,$userId){
        $agent = new Agent();
        $data = new RecentViewsListing();
        $data->user_id    = auth()->id();
        $data->listing_owner_id  = $userId;
        $data->listing_id = $id;
        $data->device = $agent->device();
        $data->browser = $agent->browser();
        $data->operating_system = $agent->platform();
        $data->save();
        return;
    }

    public function authorDetails($username){
        if($username == 'admin'){
            $data['listings'] = Listing::where('admin_id',NULL)->where('user_id',NULL)->paginate(6);
            $data['admin'] = Admin::first();
        }else{
            $data['user'] = User::whereUsername($username)->first();
            $data['listings'] = Listing::whereUserId($data['user']->id)->whereStatus(1)->orderBy('id','desc')->paginate(6);
        }

        return view('frontend.author_details',$data);
    }

    public function listingEnquiry(Request $request){
        $request->validate([
            'email' => 'required',
            'details' => 'required',
        ]);

        if(auth()->user() == NULL){
            return back()->with('warning','Please login first!');
        }

        if(Listing::whereId($request->listing_id)->whereUserId(auth()->id())->exists()){
            return back()->with('warning','You are the owner of this directory!');
        }

        if(ListingEnquiry::whereListingId($request->listing_id)->whereUserId(auth()->id())->exists()){
            return back()->with('warning','You have already submitted message for this directory!');
        }

        $listing = Listing::whereId($request->listing_id)->first();

        $data = new ListingEnquiry();
        $data->user_id = auth()->id();
        $data->listing_owner_id = $listing->user_id;
        $data->listing_id = $request->listing_id;
        $data->email = $request->email;
        $data->details = $request->details;
        $data->save();

        return back()->with('message','Thank you for contacting us! We will get back to you soon');
    }

    public function wishlist(Request $request){
        if(auth()->user() == NULL){
            return response()->json(['error'=>'Please login first!']);
        }

        if(Wishlists::whereUserId(auth()->id())->whereListingId($request->listing_id)->exists()){
            $wishlist = Wishlists::whereUserId(auth()->id())->whereListingId($request->listing_id)->first();
            $wishlist->delete();
            return response()->json(['error'=>'Directory remove from favourite list']);
        }

        $wishlist = new Wishlists();
        $wishlist->user_id = auth()->id();
        $wishlist->listing_id = $request->listing_id;
        $wishlist->save();

        return response()->json(['success'=>'Property added into your favourite list.']);
    }

    public function review(Request $request){
        $request->validate([
            'rate' => 'required',
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        if(auth()->user() == NULL){
            return back()->with('warning','Please login first!');
        }

        if(Listing::whereUserId(auth()->id())->whereId($request->listing_id)->exists()){
            return back()->with('warning','You are not allow to give review own directory!');
        }

        if(ListingReview::whereUserId(auth()->id())->whereListingId($request->listing_id)->exists()){
            return back()->with('warning','you have given review already!');
        }

        if(!User::whereId(auth()->id())->exists()){
            return back()->with('warning','Please login first!');
        }

        $listing = Listing::whereId($request->listing_id)->first();

        $review = new ListingReview();
        $review->user_id = auth()->id();
        $review->listing_owner_id = $listing->user_id;
        $review->listing_id = $request->listing_id;
        $review->name = $request->name;
        $review->email = $request->email;
        $review->message = $request->message;
        $review->rate = $request->rate;
        $review->save();

        return back()->with('message','Data submitted for admin to review.');
    }

    public function follow(Request $request){
        if(auth()->user() == NULL){
            return response()->json(['error'=>'Please login first!']);
        }

        if($request->has('listing_id')){
            if(Listing::whereId($request->listing_id)->whereUserId(auth()->id())->exists()){
                return response()->json(['error'=>'You can not follow yourself!']);
            }
        }

        if(Follower::whereFollowerId(auth()->id())->exists()){
            return response()->json(['error'=>'You already follow this owner!!']);
        }

        $data = new Follower();
        $data->user_id = $request->has('owner_id') ? $request->owner_id : null;
        $data->follower_id = auth()->id();
        $data->save();

        return response()->json(['success'=>'Property added into your favourite list.']);
    }

}
