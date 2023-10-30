<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ListingRequest;
use App\Models\Amenity;
use App\Models\Category;
use App\Models\Country;
use App\Models\Gallery;
use App\Models\Listing;
use App\Models\ListingBeauty;
use App\Models\ListingFaq;
use App\Models\ListingMenu;
use App\Models\ListingRoom;
use App\Models\Location;
use App\Models\Plan;
use App\Models\Wishlists;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ListingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function type(){
        $data['listings'] = Listing::whereUserId(auth()->id())->count();
        return view('user.listing.type',$data);
    }

    public function index(){
        $listings = Listing::whereUserId(auth()->id())->orderBy('id','desc')->paginate(7);
        return view('user.listing.index',compact('listings'));
    }

    public function create(){
        $data['categories'] = Category::whereStatus(1)->orderBy('id','desc')->get();
        $data['locations'] = Location::whereParentId(NULL)->whereStatus(1)->orderBy('id','desc')->get();
        $data['amenities'] = Amenity::whereStatus(1)->orderBy('id','desc')->get();
        $data['countries'] = Country::whereStatus(1)->orderBy('id','desc')->get();

        return view('user.listing.create',$data);
    }

    public function store(ListingRequest $request){
        $user = auth()->user();
        if(now()>$user->plan_end_date){
            return ['errors' => [0=>'Plan date expired, Please buy a new plan.']];
        }

        $plan = Plan::findOrFail($user->plan_id);
        if(!$plan){
            return ['errors' => [0=>'Please buy a new plan.']];
        }

        if($user->ad_limit < Listing::whereUserId(auth()->id())->count() ){
            return ['errors' => [0=>'Please buy a new plan.']];
        }

        $data = new Listing();
        $input = $request->all();

        if($input['photo']){
            $status = ExtensionValidation($input['photo']);
            if(!$status){
                return ['errors' => [0=>'file format not supported']];
            }
            $input['photo'] = handleMakeImage($input['photo']);
        }

        $input['slug'] = Str::slug($request->slug);
        $amenities = [];

        if($request->amenities){
            foreach ($request->amenities as $key => $amenity) {
                array_push($amenities,$amenity[0]);
            }
        }

        $schedule['sat_open']  = $request->saturday_opening;
        $schedule['sat_close'] = $request->saturday_closing;
        $schedule['sun_open']  = $request->sunday_opening;
        $schedule['sun_close'] = $request->sunday_closing;
        $schedule['mon_open']  = $request->monday_opening;
        $schedule['mon_close'] = $request->monday_closing;
        $schedule['tue_open']  = $request->tuesday_opening;
        $schedule['tue_close'] = $request->tuesday_closing;
        $schedule['wed_open']  = $request->wednesday_opening;
        $schedule['wed_close'] = $request->wednesday_closing;
        $schedule['thu_open']  = $request->thursday_opening;
        $schedule['thu_close'] = $request->thursday_closing;
        $schedule['fri_open']  = $request->friday_opening;
        $schedule['fri_close'] = $request->friday_closing;

        $input['amenities'] = json_encode($amenities,true);
        $input['schedules'] = json_encode($schedule,true);
        $input['user_id'] = auth()->id();
        $input['status'] = 0;
        $data->fill($input)->save();

        $user->ad_limit = $user->ad_limit - 1;
        $user->update();

        if ($files = $request->file('gallery')){
            foreach ($files as  $key => $file){
                $gallery = new Gallery();

                if($file){
                    $status = ExtensionValidation($file);
                    if(!$status){
                        return ['errors' => [0=>'file format not supported']];
                    }
                    $gallery['photo'] = handleMakeImage($file);
                }
                $gallery['listing_id'] = $data->id;
                $gallery->save();
            }
        }

        if($request->menu_title){
            foreach($request->menu_title as $key=> $title){
                $item = new ListingMenu();
                $item->listing_id = $data->id;
                $item->menu_title = $title;
                if(isset($request->menu_price[$key])){
                    $item->menu_price = $request->menu_price[$key];
                }

                if(isset($request->menu_photo[$key])){
                    $item->menu_photo = handleMakeImage($request->menu_photo[$key]);
                }
                $item->save();
            }
        }

        if($request->room_name){
            foreach($request->room_name as $key=> $name){
                $room = new ListingRoom();
                $room->listing_id = $data->id;
                $room->room_name = $name;
                if(isset($request->room_price[$key])){
                    $room->room_price = $request->room_price[$key];
                }

                if(isset($request->room_photo[$key])){
                    $room->room_photo = handleMakeImage($request->room_photo[$key]);
                }

                if(isset($request->room_description[$key])){
                    $room->room_description = $request->room_description[$key];
                }

                if($request->room_amenities[$key]){
                    $tag = sanitizeTag($request->room_amenities[$key]);

                    if (!empty($tag))
                    {
                        $room->room_amenities = $tag;
                    }
                }
                $room->save();
            }
        }

        if($request->service_name){
            foreach ($request->service_name as $key => $name) {
                $beauty = new ListingBeauty();
                $beauty->listing_id = $data->id;
                $beauty->service_name = $name;
                if(isset($request->service_photo[$key])){
                    $beauty->service_photo = handleMakeImage($request->service_photo[$key]);
                }

                if(isset($request->service_price[$key])){
                    $beauty->service_price =  $request->service_price[$key];
                }

                if(isset($request->service_duration[$key])){
                    $beauty->service_duration = $request->service_duration[$key];
                }

                if(isset($request->service_from[$key])){
                    $beauty->service_from = $request->service_from[$key];
                }

                if(isset($request->service_to[$key])){
                    $beauty->service_to = $request->service_to[$key];
                }
                $beauty->save();
            }
        }

        if($request->faq_name){
            foreach($request->faq_name as $key => $title){
                $faq = new ListingFaq();
                $faq->listing_id = $data->id;
                $faq->faq_name = $title;
                if(isset($request->faq_details[$key])){
                    $faq->faq_details = $request->faq_details[$key];
                }

                $faq->save();
            }
        }


        $msg = __('New Data Added Successfully.').' '.'<a href="'.route('user.listing.index').'"> '.__('View Lists.').'</a>';
        return response()->json($msg);
    }

    public function edit($id){
        $data['data'] = Listing::findOrFail($id);
        $data['listingAmenities'] = $data['data']->amenities != NULL ? json_decode($data['data']->amenities,true) : [];
        $data['listingSchedules'] = $data['data']->schedules != NULL ? json_decode($data['data']->schedules,true) : [];

        if($data['data']->type == 'restaurant'){
            $data['menus'] = ListingMenu::whereListingId($data['data']->id)->get();
        }

        if($data['data']->type == 'hotel'){
            $data['rooms'] = ListingRoom::whereListingId($data['data']->id)->get();
        }

        if($data['data']->type == 'beauty'){
            $data['beauties'] = ListingBeauty::whereListingId($data['data']->id)->get();
        }

        $data['faqs'] = ListingFaq::whereListingId($data['data']->id)->get();
        $data['categories'] = Category::whereStatus(1)->orderBy('id','desc')->get();
        $data['locations'] = Location::whereParentId(NULL)->whereStatus(1)->orderBy('id','desc')->get();
        $data['amenities'] = Amenity::whereStatus(1)->orderBy('id','desc')->get();
        $data['countries'] = Country::whereStatus(1)->orderBy('id','desc')->get();

        return view('user.listing.edit',$data);
    }

    public function update(Request $request,$id){
        $data = Listing::findOrFail($id);
        $input = $request->all();


        if(isset($input['photo'])){
            $status = ExtensionValidation($input['photo']);
            if(!$status){
                return ['errors' => [0=>'file format not supported']];
            }
            $input['photo'] = handleUpdateImage($input['photo'],$data->photo);
        }

        $input['slug'] = Str::slug($request->slug);

        $amenities = [];

        if($request->amenities){
            foreach ($request->amenities as $key => $amenity) {
                array_push($amenities,$amenity[0]);
            }
        }

        $schedule['sat_open']  = $request->saturday_opening;
        $schedule['sat_close'] = $request->saturday_closing;
        $schedule['sun_open']  = $request->sunday_opening;
        $schedule['sun_close'] = $request->sunday_closing;
        $schedule['mon_open']  = $request->monday_opening;
        $schedule['mon_close'] = $request->monday_closing;
        $schedule['tue_open']  = $request->tuesday_opening;
        $schedule['tue_close'] = $request->tuesday_closing;
        $schedule['wed_open']  = $request->wednesday_opening;
        $schedule['wed_close'] = $request->wednesday_closing;
        $schedule['thu_open']  = $request->thursday_opening;
        $schedule['thu_close'] = $request->thursday_closing;
        $schedule['fri_open']  = $request->friday_opening;
        $schedule['fri_close'] = $request->friday_closing;

        $input['amenities'] = json_encode($amenities,true);
        $input['schedules'] = json_encode($schedule,true);

        $data->update($input);

        if($request->menu_title){
            foreach($request->menu_title as $key=> $title){
                if(isset($request->menu_id[$key])){
                    $item = ListingMenu::findOrFail($request->menu_id[$key]);
                    $item->listing_id = $data->id;
                    $item->menu_title = $title;
                    if(isset($request->menu_price[$key])){
                        $item->menu_price = $request->menu_price[$key];
                    }

                    if(isset($request->menu_photo[$key])){
                        $item->menu_photo = handleUpdateImage($request->menu_photo[$key],$item->menu_photo);
                    }
                    $item->update();
                }else{
                    $item = new ListingMenu();
                    $item->listing_id = $data->id;
                    $item->menu_title = $title;
                    if(isset($request->menu_price[$key])){
                        $item->menu_price = $request->menu_price[$key];
                    }

                    if(isset($request->menu_photo[$key])){
                        $item->menu_photo = handleMakeImage($request->menu_photo[$key]);
                    }
                    $item->save();
                }
            }
        }

        if($request->room_name){
            foreach($request->room_name as $key=> $name){
                if(isset($request->room_id[$key])){
                    $room = ListingRoom::findOrFail($request->room_id[$key]);
                    $room->listing_id = $data->id;
                    $room->room_name = $name;
                    if(isset($request->room_price[$key])){
                        $room->room_price = $request->room_price[$key];
                    }

                    if(isset($request->room_photo[$key])){
                        $room->room_photo = handleUpdateImage($request->room_photo[$key],$room->room_photo);
                    }

                    if(isset($request->room_description[$key])){
                        $room->room_description = $request->room_description[$key];
                    }

                    if($request->room_amenities[$key]){
                        $tag = sanitizeTag($request->room_amenities[$key]);

                        if (!empty($tag))
                        {
                            $room->room_amenities = $tag;
                        }
                    }
                    $room->save();
                }else{
                    $room = new ListingRoom();
                    $room->listing_id = $data->id;
                    $room->room_name = $name;
                    if(isset($request->room_price[$key])){
                        $room->room_price = $request->room_price[$key];
                    }

                    if(isset($request->room_photo[$key])){
                        $room->room_photo = handleMakeImage($request->room_photo[$key]);
                    }

                    if(isset($request->room_description[$key])){
                        $room->room_description = $request->room_description[$key];
                    }

                    if($request->room_amenities[$key]){
                        $tag = sanitizeTag($request->room_amenities[$key]);

                        if (!empty($tag))
                        {
                            $room->room_amenities = $tag;
                        }
                    }
                    $room->save();
                }
            }
        }

        if($request->service_name){
            foreach ($request->service_name as $key => $name) {
                if(isset($request->service_id[$key])){

                    $beauty = ListingBeauty::findOrFail($request->service_id[$key]);
                    $beauty->listing_id = $data->id;
                    $beauty->service_name = $name;
                    if(isset($request->service_photo[$key])){
                        $beauty->service_photo = handleMakeImage($request->service_photo[$key]);
                    }

                    if(isset($request->service_price[$key])){
                        $beauty->service_price =  $request->service_price[$key];
                    }

                    if(isset($request->service_duration[$key])){
                        $beauty->service_duration = $request->service_duration[$key];
                    }

                    if(isset($request->service_from[$key])){
                        $beauty->service_from = $request->service_from[$key];
                    }

                    if(isset($request->service_to[$key])){
                        $beauty->service_to = $request->service_to[$key];
                    }
                    $beauty->save();

                }else{
                    $beauty = new ListingBeauty();
                    $beauty->listing_id = $data->id;
                    $beauty->service_name = $name;
                    if(isset($request->service_photo[$key])){
                        $beauty->service_photo = handleMakeImage($request->service_photo[$key]);
                    }

                    if(isset($request->service_price[$key])){
                        $beauty->service_price =  $request->service_price[$key];
                    }

                    if(isset($request->service_duration[$key])){
                        $beauty->service_duration = $request->service_duration[$key];
                    }

                    if(isset($request->service_from[$key])){
                        $beauty->service_from = $request->service_from[$key];
                    }

                    if(isset($request->service_to[$key])){
                        $beauty->service_to = $request->service_to[$key];
                    }
                    $beauty->save();
                }
            }
        }

        if($request->faq_name){
            foreach($request->faq_name as $key => $title){
                if(isset($request->faq_id[$key])){
                    $faq = ListingFaq::findOrFail($request->faq_id[$key]);
                    $faq->listing_id = $data->id;
                    $faq->faq_name = $title;
                    if(isset($request->faq_details[$key])){
                        $faq->faq_details = $request->faq_details[$key];
                    }

                    $faq->save();
                }else{
                    $faq = new ListingFaq();
                    $faq->listing_id = $data->id;
                    $faq->faq_name = $title;
                    if(isset($request->faq_details[$key])){
                        $faq->faq_details = $request->faq_details[$key];
                    }

                    $faq->save();
                }
            }
        }

        $msg = __('Data Updated Successfully.').' '.'<a href="'.route('admin.listing.index').'"> '.__('View Lists.').'</a>';
        return response()->json($msg);
    }

    public function saved_listing(){
        $data['wishlists'] = Wishlists::whereUserId(auth()->id())->paginate(6);

        return view('user.listing.saved',$data);
    }

    public function savedDelete($id){
        Wishlists::findOrFail($id)->delete();
        return back()->with('message','Directory removed successfully');
    }

    public function delete($id){
        $data = Listing::findOrFail($id);
        if($data->galleries != NULL){
            foreach($data->galleries as $gallery){
                @unlink('assets/images/'.$gallery->photo);
                $gallery->delete();
            }
        }

        if($data->menus != NULL){
            foreach($data->menus as $menu){
                @unlink('assets/images/'.$menu->menu_photo);
                $menu->delete();
            }
        }

        if($data->services != NULL){
            foreach($data->services as $service){
                @unlink('assets/images/'.$service->service_photo);
                $service->delete();
            }
        }

        if($data->rooms != NULL){
            foreach($data->rooms as $room){
                @unlink('assets/images/'.$room->room_photo);
                $room->delete();
            }
        }

        if($data->faqs != NULL){
            foreach($data->faqs as $faq){
                $faq->delete();
            }
        }

        @unlink('assets/images/'.$data->photo);
        $data->delete();

        return back()->with('message','Data deleted successfully');
    }
}
