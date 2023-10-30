<?php

namespace App\Http\Controllers\Admin;

use App\Classes\GeniusMailer;
use Datatables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Follow;
use App\Models\Generalsetting;
use App\Models\Listing;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function datatables()
    {
            $datas = User::orderBy('id','desc');

            return Datatables::of($datas)
                            ->addColumn('action', function(User $data) {
                                return '<div class="btn-group mb-1">
                                    <button type="button" class="btn btn-primary btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    '.'Actions' .'
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start">
                                    <a href="' . route('admin-user-show',$data->id) . '"  class="dropdown-item">'.__("Details").'</a>
                                    <a href="' . route('admin-user-edit',$data->id) . '" class="dropdown-item" >'.__("Edit").'</a>
                                    <a href="javascript:;" class="dropdown-item send" data-email="'. $data->email .'" data-toggle="modal" data-target="#vendorform">'.__("Send").'</a>
                                    <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="dropdown-item" data-href="'.  route('admin-user-delete',$data->id).'">'.__("Delete").'</a>
                                    </div>
                                </div>';
                            })

                            ->addColumn('status', function(User $data) {
                                $status      = $data->is_banned == 1 ? __('Block') : __('Unblock');
                                $status_sign = $data->is_banned == 1 ? 'danger'   : 'success';

                                    return '<div class="btn-group mb-1">
                                    <button type="button" class="btn btn-'.$status_sign.' btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        '.$status .'
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start">
                                        <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin-user-ban',['id1' => $data->id, 'id2' => 0]).'">'.__("Unblock").'</a>
                                        <a href="javascript:;" data-toggle="modal" data-target="#statusModal" class="dropdown-item" data-href="'. route('admin-user-ban',['id1' => $data->id, 'id2' => 1]).'">'.__("Block").'</a>
                                    </div>
                                    </div>';
                            })
                            ->rawColumns(['action','status'])
                            ->toJson();
    }

    public function index()
    {
        return view('admin.user.index');
    }

    public function image()
    {
        return view('admin.generalsetting.user_image');
    }

    public function show($id)
    {
        $data = User::findOrFail($id);
        $data['listings'] = Listing::whereUserId($id)->orderBy('id','desc')->limit(5)->get();
        $data['data'] = $data;
        return view('admin.user.show',$data);
    }

    public function ban($id1,$id2)
    {
        $user = User::findOrFail($id1);
        $user->is_banned = $id2;
        $user->update();
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('admin.user.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
                'photo' => 'mimes:jpeg,jpg,png,svg',
                ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $user = User::findOrFail($id);
        $data = $request->all();
        if ($file = $request->file('photo'))
        {
            $name = Str::random(8).time().'.'.$file->getClientOriginalExtension();
            $file->move('assets/images',$name);
            if($user->photo != null)
            {
                if (file_exists(public_path().'/assets/images/'.$user->photo)) {
                    unlink(public_path().'/assets/images/'.$user->photo);
                }
            }
            $data['photo'] = $name;
        }
        $user->update($data);
        $msg = 'Customer Information Updated Successfully.';
        return response()->json($msg);
    }



    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if($user->transactions->count() > 0)
        {
            foreach ($user->transactions as $transaction) {
                $transaction->delete();
            }
        }

        if($user->listings->count() > 0)
        {
            foreach ($user->listings as $listing) {

                if($listing->galleries != NULL){
                    foreach($listing->galleries as $gallery){
                        @unlink('assets/images/'.$gallery->photo);
                        $gallery->delete();
                    }
                }

                if($listing->menus != NULL){
                    foreach($listing->menus as $menu){
                        @unlink('assets/images/'.$menu->menu_photo);
                        $menu->delete();
                    }
                }

                if($listing->services != NULL){
                    foreach($listing->services as $service){
                        @unlink('assets/images/'.$service->service_photo);
                        $service->delete();
                    }
                }

                if($listing->rooms != NULL){
                    foreach($listing->rooms as $room){
                        @unlink('assets/images/'.$room->room_photo);
                        $room->delete();
                    }
                }

                if($listing->faqs != NULL){
                    foreach($listing->faqs as $faq){
                        $faq->delete();
                    }
                }

                if($listing->wishlists != NULL){
                    foreach($listing->wishlists as $wishlist){
                        $wishlist->delete();
                    }
                }

                if($listing->recentviews != NULL){
                    foreach($listing->recentviews as $recentview){
                        $recentview->delete();
                    }
                }

                if($listing->bookings != NULL){
                    foreach($listing->bookings as $booking){
                        $booking->delete();
                    }
                }

                if($listing->enquiries != NULL){
                    foreach($listing->enquiries as $enquiry){
                        $enquiry->delete();
                    }
                }

                if($listing->reviews != NULL){
                    foreach($listing->reviews as $review){
                        $review->delete();
                    }
                }

                @unlink('assets/images/'.$listing->photo);
                $listing->delete();
            }
        }

        if($user->booking->count() > 0)
        {
            foreach ($user->booking as $booking) {
                $booking->delete();
            }
        }

        if($user->enquries->count() > 0)
        {
            foreach ($user->enquries as $enqury) {
                $enqury->delete();
            }
        }

        if($user->messages->count() > 0)
        {
            foreach ($user->messages as $message) {
                $message->delete();
            }
        }

        if($user->followers->count() > 0)
        {
            foreach ($user->followers as $follower) {
                $follower->delete();
            }
        }

        @unlink('assets/images/'.$listing->photo);
        $user->delete();

        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
    }
    
    public function import()
    {
        return view('admin.user.import');
    }
    
    public function  importData(Request $request){
        
        $file = $request->file('import_file');
        
        $fileContents = file($file->getPathname());
        
        //$this->userDataMigrate($fileContents);
        
        //$this->titleDescDataMigrate($fileContents);
        
        //$this->blogsDataMigrate($fileContents);
        
        $this->addsDataMigrate($fileContents);
        
        
        $msg = 'Data import Successfully.';
        return response()->json($msg);
        
    }
    
    public function addsDataMigrate($fileContents){
        
        $row= 0;
        
        $dataset = [];
        
        foreach ($fileContents as $line) {
            
             $data1 = str_getcsv($line);
             
             //echo '<pre>'; print_r($data1); die;
            
                if($row > 0){
                
                    $data = str_getcsv($line);
                    
                    //echo '<pre>'; print_r($data);
                    
                    if(isset($data[38])){
                        $getUser = DB::table('users')->where('email',$data[38])->first();
                    }else{
                        $getUser = null;
                    }
                        
                    $add = [
                        'user_id'         => $getUser ? $getUser->id : null,
                        'category_id'     =>  8 ,
                        'name'            => isset($data[9]) ?  $data[9]    : null ,
                        'slug'            => isset($data[30]) ? $data[30]   : null ,
                        'description'     => isset($data[10]) ?  $data[10]  : null ,
                        'real_address'    => isset($data[6]) ?  $data[6]    : null ,
                        'photo'           => isset($data[18]) ? $data[18]   : null ,
                        'is_feature'      => (isset($data[36]) && $data[36] == 'no') ? 0 :1 ,
                        'email'           => isset($data[13]) ?  $data[13]  : null ,
                        'phone_number'    => isset($data[14]) ?  $data[14]  : null ,
                        'ranking'         => isset($data[3])  ?  $data[3]   : null ,
                        'age'             => isset($data[12]) ?  $data[12]  : null ,
                        'name_existing'   => isset($data[16]) ?  $data[16]  : null ,
                        'seo_title'       => isset($data[31]) ?  $data[31]  : null ,
                        'seo_description' => isset($data[32]) ?  $data[32]  : null ,
                        'seo_keyword'     => isset($data[33]) ?  $data[33]  : null ,
                        'city'            => isset($data[4])  ?  $data[4]   : null ,
                        'city_id'         => (isset($data[5]) && $data[5] !== 'NULL')  ?  $data[5]   : null ,
                        'zip'             => isset($data[7])  ?  $data[7]   : null ,
                        'badges'          => isset($data[34]) ?  $data[34]  : null ,
                        'created_at'      => date('Y-m-d H:i:s'),
                        'updated_at'      => date('Y-m-d H:i:s'), 
                    ];
                    
                    $dataset[] = $add;
                   
                    
                    // try{
                        
                    //     DB::table('listings')->insert($add);
                        
                    // }catch(Exception $e) {
                        
                    //     echo 'Message: ' .$e->getMessage();
                      
                    // } 
                }
            
            $row++;
        }
        
        echo '<pre>'; print_r($dataset); die;
        
        return true;
        
    }
    
    function validateDateTime($dateStr, $format){
        date_default_timezone_set('UTC');
        $date = DateTime::createFromFormat($format, $dateStr);
        return $date && ($date->format($format) === $dateStr);
    }
    
    
    public function blogsDataMigrate($fileContents){
        
        $row= 0;
        foreach ($fileContents as $line) {
            
            if($row > 0){
                
                $data = str_getcsv($line);
                
                $add = [
                    'title'            =>  isset($data[1]) ? $data[1] : null,
                    'slug'             =>  isset($data[2]) ? $data[2] : null,
                    'details'          =>  isset($data[3]) ? $data[3] : null,
                    'photo'            =>  isset($data[4]) ? $data[4] : null,
                    'meta_tag'         =>  isset($data[5]) ? $data[5] : null,
                    'tags'             =>  isset($data[6]) ? $data[6] : null,
                    'meta_description' =>  isset($data[7]) ? $data[7] : null,
                    'category_id'      =>  isset($data[8]) ? $data[8] : null, 
                    'created_at'       => date('Y-m-d H:i:s'),
                    'source'           => 'https://oyobiryani.in',
                ];
                
                echo '<pre>'; print_r($add);  die;
                
                
                if(isset($data[2])){
                    
                    $getExisting = DB::table('blogs')->where('slug',$data[2])->where('title',$data[1])->get();
                
                    if($getExisting->count() == 0){
                        
                        try{
                            
                            DB::table('blogs')->insert($add);
                            
                        }catch(Exception $e) {
                            
                            echo 'Message: ' .$e->getMessage();
                          
                        } 
                    }
                    
                }
            }
            
            $row++;
        }
        
        
        return true;
    }
    
    public function titleDescDataMigrate($fileContents){
        $row= 0;
        
        $insertData = [];
        
        foreach ($fileContents as $line) {
            
            if($row > 0){
                
                $data = str_getcsv($line);
                
                //echo '<pre>'; print_r($data);
                
                if(isset($data[9])){
                     $getUser = DB::table('users')->where('email',$data[9])->first();
                }else{
                    
                    $getUser = null;
                    
                }
                
               
                
                if($getUser){
                    
                    $add = [
                        'title'  =>       isset($data[1]) ? $data[1] : null,
                        'description' =>  isset($data[2]) ? $data[2] : null,
                        'city_name' =>    isset($data[10]) ? $data[10] : null,
                        'user_id'  =>     $getUser->id, 
                        'post_id' =>      isset($data[5]) ? $data[5] : null,
                        'is_used'  =>     isset($data[6]) ? $data[6] : null,
                        'is_selected' =>  isset($data[7]) ? $data[7] : 0,
                        'selected_start_time' => isset($data[8]) ? $data[8] : 0, 
                        'created_at'          => date('Y-m-d H:i:s'),
                    ];
                    
                    $insertData [] = $add;
                    
                    
                    //echo '<pre>'; print_r($add); die;
                    
                    $getExisting = DB::table('title_descriptions')->where('user_id',$getUser->id)->where('title',$data[1])->get();
                    
                    //echo '<pre>'; print_r($getExisting); die;
                    
                    if($getExisting->count() == 0){
                        
                        echo '<pre>'; print_r($add);
                        
                        try{
                            
                            DB::table('title_descriptions')->insert($add);
                            
                        }catch(Exception $e) {
                            
                          echo 'Message: ' .$e->getMessage();
                          
                        } 
                        
                        
                    }
                    
                    //die('here');
                }
            }
            
            $row++;
        }
        
        // echo '<pre>'; print_r($insertData);
        
         die;
        
        return true;
    }
    
    public function userDataMigrate($fileContents){
        
        $row= 0;
        foreach ($fileContents as $line) {
            if($row > 0){
                $data = str_getcsv($line);
                $cityName = null;
                if(isset($data[12])){
                    $getCity = DB::table('city')->where('id',$data[12])->first();
                    if($getCity){
                        $cityName = $getCity->name;
                    }
                }
                
                $userAdd = [
                    'name'       => $data[6],
                    'username'   => $data[1],
                    'password'   => Hash::make($data[1]), // user emailid will be their default password
                    'status'     => $data[4],
                    'age'        => $data[8],
                    'user_type'  => $data[7],
                    'profession' => $data[9], 
                    'email'      => $data[1],
                    'phone'      => $data[10],
                    'zip'        => $data[13],
                    'address'    => $data[11],
                    'city'       => $cityName, 
                ];
                $getUser = DB::table('users')->where('email',$data[1])->get();
                if($getUser->count() == 0){
                    DB::table('users')->insert($userAdd);
                }
            }
            
            $row++;
            
        }
        
        return true;
        
        
    }

}
