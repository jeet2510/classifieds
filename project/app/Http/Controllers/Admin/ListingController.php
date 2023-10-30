<?php

namespace App\Http\Controllers\Admin;

use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use App\Http\Requests\ListingRequest;
use App\Models\Amenity;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Country;
use App\Models\Gallery;
use App\Models\Generalsetting;
use App\Models\Listing;
use App\Models\ListingBeauty;
use App\Models\ListingFaq;
use App\Models\ListingMenu;
use App\Models\ListingRoom;
use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Datatables;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function datatables(Request $request)
    {
        if($request->status == 'all'){
            $datas = Listing::orderBy('id','desc');
        }else{
            $datas = Listing::whereStatus($request->status)->orderBy('id','desc');
        }

        return Datatables::of($datas)
                            ->editColumn('photo', function(Listing $data) {
                                $photo = $data->photo ? url('assets/images/'.$data->photo):url('assets/images/noimage.png');
                                return '<img src="' . $photo . '" alt="Image">';
                            })
                            ->editColumn('category_id',function(Listing $data){
                                return $data->category != NULL ? $data->category->title : 'Category Deleted';
                            })
                            ->editColumn('status', function(Listing $data) {
                                    $status      = $data->status == 1 ? __('Approved') : __('Pending');
                                    $status_sign = $data->status == 1 ? 'success'   : 'danger';

                                    return '<div class="btn-group mb-1">
                                            <button type="button" class="btn btn-'.$status_sign.' btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            '.$status .'
                                            </button>
                                            <div class="dropdown-menu" x-placement="bottom-start">
                                                <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.listing.status',['id1' => $data->id, 'id2' => 1]).'">'.__("Approved").'</a>
                                                <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin.listing.status',['id1' => $data->id, 'id2' => 0]).'">'.__("Pending").'</a>
                                            </div>
                                        </div>';
                            })
                            ->addColumn('action', function(Listing $data) {
                                return '<div class="btn-group mb-1">
                                        <button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        '.'Actions' .'
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start">
                                            <a href="' . route('admin.listing.edit',[$data->id,'type'=>$data->type]) . '"  class="dropdown-item">'.__("Edit").'</a>
                                            <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="dropdown-item" data-href="'.  route('admin.listing.delete',$data->id).'">'.__("Delete").'</a>
                                        </div>
                                    </div>';

                            })
                            ->rawColumns(['photo','status','action'])
                            ->toJson();
    }

    public function index(){
        return view('admin.listing.index');
    }

    public function pending(){
        return view('admin.listing.pending');
    }

    public function approved(){
        return view('admin.listing.approve');
    }

    public function type(){
        return view('admin.listing.type');
    }

    public function create(){
        $data['categories'] = Category::whereStatus(1)->orderBy('id','desc')->get();
        $data['locations'] = Location::whereParentId(NULL)->whereStatus(1)->orderBy('id','desc')->get();
        $data['amenities'] = Amenity::whereStatus(1)->orderBy('id','desc')->get();
        $data['countries'] = Country::whereStatus(1)->orderBy('id','desc')->get();

        return view('admin.listing.create',$data);
    }

    public function store(ListingRequest $request){
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
        $amenity_icons = [];

        if($request->amenities){
            foreach ($request->amenities as $key => $amenity) {
                array_push($amenities,$amenity[0]);
                array_push($amenity_icons,$key);
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
        $input['amenity_icons'] = json_encode($amenity_icons,true);
        $input['schedules'] = json_encode($schedule,true);
        $data->fill($input)->save();

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


        $msg = __('New Data Added Successfully.').' '.'<a href="'.route('admin.listing.index').'"> '.__('View Lists.').'</a>';
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

        return view('admin.listing.edit',$data);
    }

    public function update(ListingRequest $request,$id){
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
        $amenity_icons = [];

        if($request->amenities){
            foreach ($request->amenities as $key => $amenity) {
                array_push($amenities,$amenity[0]);
                array_push($amenity_icons,$key);
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
        $input['amenity_icons'] = json_encode($amenity_icons,true);
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

    public function status($id1,$id2)
    {
        $data = Listing::findOrFail($id1);
        $data->status = $id2;
        $data->update();

        $gs = Generalsetting::findOrFail(1);
        $user = User::findOrFail($data->user_id);
        $admin = auth()->guard('admin')->user();

        if($user && $id2 == 1){
            if($gs->is_smtp == 1)
            {
                $data = [
                    'to' => $user->email,
                    'type' => "directory approved",
                    'cname' => $user->name,
                    'oamount' => $data->price,
                    'aname' => $admin->name,
                    'aemail' => $admin->email,
                    'wtitle' => "",
                ];

                $mailer = new GeniusMailer();
                $mailer->sendAutoMail($data);
            }
            else
            {
                $to = $user->email;
                $subject = " Your directory approved successfully.";
                $msg = "Hello ".$user->name."!\nYour directory approve by".$admin->name. " successfully.\nThank you.";
                $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
                mail($to,$subject,$msg,$headers);
            }
        }

        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
    }

    public function menuDestroy($id){
        $data = ListingMenu::findOrFail($id);
        @unlink('assets/images/'.$data->photo);
        $data->delete();

        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
    }

    public function faqDestroy($id){
        ListingFaq::findOrFail($id)->delete();

        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
    }

    public function roomDestroy($id){
        $data = ListingRoom::findOrFail($id);
        @unlink('assets/images/'.$data->photo);
        $data->delete();

        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
    }

    public function bulkdelete(Request $request){
        $ids = $request->bulk_id;
        $bulk_ids = explode(",",$ids);
        foreach($bulk_ids as $key=>$id){
            if($id){
                try {
                    $this->delete($id);
                    $msg = 'Data Deleted Successfully.';
                } catch (\Throwable $th) {
                    $msg = 'Something went wrong.';
                }
            }
        }
        return response()->json($msg);
    }

    public function destroy($id)
    {
        try {
            $this->delete($id);
            $msg = 'Data Deleted Successfully.';
        } catch (\Throwable $th) {
            $msg = 'Something went wrong.';
        }
        return response()->json($msg);
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

        if($data->wishlists != NULL){
            foreach($data->wishlists as $wishlist){
                $wishlist->delete();
            }
        }

        if($data->recentviews != NULL){
            foreach($data->recentviews as $recentview){
                $recentview->delete();
            }
        }

        if($data->bookings != NULL){
            foreach($data->bookings as $booking){
                $booking->delete();
            }
        }

        if($data->enquiries != NULL){
            foreach($data->enquiries as $enquiry){
                $enquiry->delete();
            }
        }

        if($data->reviews != NULL){
            foreach($data->reviews as $review){
                $review->delete();
            }
        }

        @unlink('assets/images/'.$data->photo);
        $data->delete();

        return true;
    }
}
