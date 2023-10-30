@extends('layouts.front')

@push('css')

@endpush

@section('content')
    <!-- =============================== Dashboard Header ========================== -->
    @includeIf('partials.user.header')
    <!-- =============================== Dashboard Header ========================== -->

    <!-- ======================= dashboard Detail ======================== -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="dashboard-wrap gray px-4 py-5">
        <a class="mobNavigation" data-bs-toggle="collapse" href="#MobNav" role="button" aria-expanded="false" aria-controls="MobNav">
            <i class="fas fa-bars me-2"></i>@lang('Dashboard Navigation')
        </a>
        <div class="collapse" id="MobNav">
            @includeIf('partials.user.sidebar')
        </div>

        <div class="dashboard-content">
            <div class="dashboard-tlbar d-block mb-5">
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12">
                        <h1 class="ft-medium">@lang('Add Listing')</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-muted"><a href="{{ route('front.index') }}">@lang('Home')</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('user.listing.create',['type'=> request()->type]) }}" class="theme-cl">@lang('Create Listing')</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">
                <div class="row">
                    <div class="col-xl-12 col-lg-2 col-md-12 col-sm-12">
                        <form class="geniusform" action="{{route('user.listing.store')}}" method="POST" enctype="multipart/form-data">
                            @include('includes.admin.form-both')
                            {{ csrf_field() }}

                            <input type="hidden" name="type" value="{{ request()->type }}">
                            <div class="submit-form">
                                <div class="container pl-0 pr-0 ml-0 mr-0 w-100 mw-100">
                                    <div id="tabs">
                                        <ul class="nav nav-pills nav-justified mb-3" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link bsc active" data-bs-toggle="pill" href="#user_basic">{{ __('Basic') }}</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link user_amenities" data-bs-toggle="pill" href="#user_amenities">{{ __('Amenities') }}</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link media" data-bs-toggle="pill" href="#media">{{ __('Media') }}</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link schedule" data-bs-toggle="pill" href="#schedule">{{ __('Schedule') }}</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link contact" data-bs-toggle="pill" href="#contact">{{ __('Contact') }}</a>
                                            </li>

                                            @if (request()->type == 'restaurant')
                                                <li class="nav-item">
                                                    <a class="nav-link dynamic" data-bs-toggle="pill" href="#dynamic">{{ ucfirst(request()->type) }} {{ __('Item') }}</a>
                                                </li>
                                            @endif

                                            @if (request()->type == 'hotel')
                                                <li class="nav-item">
                                                    <a class="nav-link dynamic" data-bs-toggle="pill" href="#dynamic">{{ ucfirst(request()->type) }} {{ __('Room') }}</a>
                                                </li>
                                            @endif

                                            @if (request()->type == 'beauty')
                                                <li class="nav-item">
                                                    <a class="nav-link dynamic" data-bs-toggle="pill" href="#dynamic">{{ ucfirst(request()->type) }} {{ __('Service') }}</a>
                                                </li>
                                            @endif

                                            @if (request()->type == 'real_estate')
                                                <li class="nav-item">
                                                    <a class="nav-link dynamic" data-bs-toggle="pill" href="#dynamic">{{ ucfirst(str_replace("_"," ",request()->type)) }} {{ __('Info') }}</a>
                                                </li>
                                            @endif

                                            @if (request()->type == 'car')
                                                <li class="nav-item">
                                                    <a class="nav-link dynamic" data-bs-toggle="pill" href="#dynamic">{{ ucfirst(request()->type) }} {{ __('Specification') }}</a>
                                                </li>
                                            @endif

                                            <li class="nav-item">
                                                <a class="nav-link faq" data-bs-toggle="pill" href="#faq">{{ __('FAQ') }}</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-content">
                                        <div id="user_basic" class="container tab-pane active"><br>
                                            <!-- Listing Info -->
                                            <div class="dashboard-list-wraps bg-white rounded mb-4">
                                                <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                                    <div class="dashboard-list-wraps-flx">
                                                        <h4 class="mb-0 ft-medium fs-md"><i class="fa fa-file me-2 theme-cl fs-sm"></i>@lang('Listing Info')</h4>
                                                    </div>
                                                </div>

                                                <div class="dashboard-list-wraps-body py-3 px-3">
                                                    <div class="row">
                                                        @if (request()->type == 'doctor')
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="mb-1">@lang('Doctor Name')</label>
                                                                    <input type="text" name="name" class="form-control rounded" placeholder="@lang('Doctor Name')" />
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="mb-1">@lang('Doctor Designation')</label>
                                                                    <input type="text" name="designation" class="form-control rounded" placeholder="@lang('Doctor Designation')" />
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="mb-1">@lang('Listing Tile')</label>
                                                                    <input type="text" name="name" class="form-control rounded" placeholder="@lang('Listing Title')" />
                                                                </div>
                                                            </div>

                                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="mb-1">@lang('Listing Slug')</label>
                                                                    <input type="text" name="slug" class="form-control rounded" placeholder="@lang('Listing Slug')" />
                                                                </div>
                                                            </div>
                                                        @endif

                                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="mb-1">@lang('Categories')</label>
                                                                <select name="category_id" class="form-control">
                                                                    <option value="" selected>{{__('Please select a category')}}</option>
                                                                    @foreach ($categories as $key=>$category)
                                                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                                                    @if ($category->child)
                                                                        @foreach ($category->child as $key=>$childlocation)
                                                                            <option value="{{$childlocation->id}}">-{{$childlocation->title}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="mb-1">@lang('Location')</label>
                                                                <select name="location_id" class="form-control">
                                                                    <option value="" selected>{{__('Please select a location')}}</option>
                                                                    @foreach ($locations as $key=>$location)
                                                                        <option value="{{$location->id}}">{{ucfirst($location->name)}}</option>
                                                                        @if ($location->child)
                                                                            @foreach ($location->child as $key=>$childlocation)
                                                                                @if ($childlocation->status == 1)
                                                                                    <option value="{{$childlocation->id}}">--{{ ucfirst($childlocation->name)}}</option>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="mb-1">@lang('Real address')</label>
                                                                <input type="text" class="form-control rounded" name="real_address" placeholder="{{ __('Address') }}" />
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="mb-1">@lang('Map Latitude')</label>
                                                                <input type="text" class="form-control rounded" name="latitude" placeholder="{{ __('Latitude') }}" />
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="mb-1">@lang('Map Longitude')</label>
                                                                <input type="text" class="form-control rounded" name="longitude" placeholder="{{ __('Longitude') }}" />
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="mb-1">@lang('Description')</label>
                                                                <textarea class="form-control rounded ht-150" name="description" placeholder="@lang('Description')"></textarea>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="user_amenities" class="container tab-pane"><br>
                                            <!-- Amenties Options -->
                                            <div class="dashboard-list-wraps bg-white rounded mb-4">
                                                <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                                    <div class="dashboard-list-wraps-flx">
                                                        <h4 class="mb-0 ft-medium fs-md"><i class="lni lni-coffee-cup me-2 theme-cl fs-sm"></i>@lang('Amenties Options')</h4>
                                                    </div>
                                                </div>

                                                <div class="dashboard-list-wraps-body py-3 px-3">
                                                    <div class="row">
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                            <div class="Rego-all-features-list">
                                                                <ul>
                                                                    @if ($amenities)
                                                                        @foreach($amenities as $key=>$amenity)
                                                                        <li>
                                                                            <input class="checkbox-custom" name="amenities[{{ $amenity->name }}][]" value="{{$amenity->name}}" id="{{$amenity->name}}-option-{{$key}}" type="checkbox">
                                                                            <label for="{{$amenity->name}}-option-{{$key}}" class="checkbox-custom-label">{{ $amenity->name }}</label>
                                                                        </li>
                                                                        @endforeach
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="media" class="container tab-pane"><br>
                                            <!-- Image & Gallery Option -->
                                            <div class="dashboard-list-wraps bg-white rounded mb-4">
                                                <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                                    <div class="dashboard-list-wraps-flx">
                                                        <h4 class="mb-0 ft-medium fs-md"><i class="fa fa-camera me-2 theme-cl fs-sm"></i>@lang('Media')</h4>
                                                    </div>
                                                </div>

                                                <div class="dashboard-list-wraps-body py-3 px-3">
                                                    <div class="row">

                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="mb-1">@lang('Listing Video Provider')</label>
                                                                <select name="listing_video_provider" class="form-control">
                                                                    <option value="youtube">{{ __('Youtube') }}</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="mb-1">@lang('Listing Video Url')</label>
                                                                <input type="text" class="form-control rounded" name="listing_video" placeholder="https://www.youtube.com/watch?v=AXrHbrMrun0" />
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                            <label class="mb-1">@lang('Listing Thumbnail')</label>
                                                            <div class="wrapper-image-preview">
                                                                <div class="box">
                                                                    <div class="back-preview-image" style="background-image: url({{ asset('assets/images/default.png') }});"></div>
                                                                    <div class="upload-options">
                                                                        <label class="img-upload-label" for="img-upload"> <i class="fas fa-camera"></i> {{ __('Upload Picture') }} </label>
                                                                        <input id="img-upload" type="file" class="image-upload" name="photo" accept="image/*" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 my-2">
                                                            <label class="mb-1">@lang('Listing Thumbnail')</label>
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#setgallery" id="#myBtn">
                                                                    <i class="icofont-plus"></i> {{__('Set Gallery')}}
                                                                </button>
                                                                <input type="file" name="gallery[]" class="hidden" id="propertyuploadgallery" accept="image/*" multiple>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="schedule" class="container tab-pane"><br>
                                            <!-- Working hours -->
                                            <div class="dashboard-list-wraps bg-white rounded mb-4">
                                                <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                                    <div class="dashboard-list-wraps-flx">
                                                        <h4 class="mb-0 ft-medium fs-md"><i class="fa fa-clock me-2 theme-cl fs-sm"></i>Working Hours</h4>
                                                    </div>
                                                </div>

                                                <div class="dashboard-list-wraps-body py-3 px-3">
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <div class="row align-items-center">
                                                                <label class="control-label col-lg-2 col-md-2">@lang('Saturday')</label>
                                                                <div class="col-lg-5 col-md-5">
                                                                    <select class="form-control chosen-select" name="saturday_opening">
                                                                        <option>@lang('Opening Time')</option>
                                                                        @includeIf('partials.user.time')
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-5 col-md-5">
                                                                    <select class="form-control" name="saturday_closing">
                                                                        <option>@lang('Closing Time')</option>
                                                                         @includeIf('partials.user.time')
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row align-items-center">
                                                                <label class="control-label col-lg-2 col-md-2">@lang('Sunday')</label>
                                                                <div class="col-lg-5 col-md-5">
                                                                    <select class="form-control chosen-select" name="sunday_opening">
                                                                        <option>@lang('Opening Time')</option>
                                                                        @includeIf('partials.user.time')
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-5 col-md-5">
                                                                    <select class="form-control" name="sunday_closing">
                                                                        <option>@lang('Closing Time')</option>
                                                                        @includeIf('partials.user.time')
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row align-items-center">
                                                                <label class="control-label col-lg-2 col-md-2">@lang('Monday')</label>
                                                                <div class="col-lg-5 col-md-5">
                                                                    <select class="form-control chosen-select" name="monday_opening">
                                                                        <option>@lang('Opening Time')</option>
                                                                        @includeIf('partials.user.time')
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-5 col-md-5">
                                                                    <select class="form-control" name="monday_closing">
                                                                        <option>@lang('Closing Time')</option>
                                                                        @includeIf('partials.user.time')
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row align-items-center">
                                                                <label class="control-label col-lg-2 col-md-2">@lang('Tuesday')</label>
                                                                <div class="col-lg-5 col-md-5">
                                                                    <select class="form-control chosen-select" name="tuesday_opening">
                                                                        <option>Opening Time</option>
                                                                        @includeIf('partials.user.time')
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-5 col-md-5">
                                                                    <select class="form-control" name="tuesday_closing">
                                                                        <option>Closing Time</option>
                                                                        @includeIf('partials.user.time')
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row align-items-center">
                                                                <label class="control-label col-lg-2 col-md-2">@lang('Wednesday')</label>
                                                                <div class="col-lg-5 col-md-5">
                                                                    <select class="form-control chosen-select" name="wednesday_opening">
                                                                        <option>@lang('Opening Time')</option>
                                                                        @includeIf('partials.user.time')
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-5 col-md-5">
                                                                    <select class="form-control" name="wednesday_closing">
                                                                        <option>@lang('Closing Time')</option>
                                                                        @includeIf('partials.user.time')
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row align-items-center">
                                                                <label class="control-label col-lg-2 col-md-2">@lang('Thursday')</label>
                                                                <div class="col-lg-5 col-md-5">
                                                                    <select class="form-control chosen-select" name="thursday_opening">
                                                                        <option>@lang('Opening Time')</option>
                                                                        @includeIf('partials.user.time')
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-5 col-md-5">
                                                                    <select class="form-control" name="thursday_closing">
                                                                        <option>@lang('Closing Time')</option>
                                                                        @includeIf('partials.user.time')
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row align-items-center">
                                                                <label class="control-label col-lg-2 col-md-2">@lang('Friday')</label>
                                                                <div class="col-lg-5 col-md-5">
                                                                    <select class="form-control chosen-select" name="friday_opening">
                                                                        <option>@lang('Opening Time')</option>
                                                                        @includeIf('partials.user.time')
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-5 col-md-5">
                                                                    <select class="form-control" name="friday_closing">
                                                                        <option>@lang('Closing Time')</option>
                                                                        @includeIf('partials.user.time')
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="contact" class="container tab-pane"><br>
                                            <!-- Contact Info-->
                                            <div class="dashboard-list-wraps bg-white rounded mb-4">
                                                <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                                    <div class="dashboard-list-wraps-flx">
                                                        <h4 class="mb-0 ft-medium fs-md"><i class="fa fa-file me-2 theme-cl fs-sm"></i>@lang('Contact Info')</h4>
                                                    </div>
                                                </div>

                                                <div class="dashboard-list-wraps-body py-3 px-3">
                                                    <div class="row">
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="mb-1">@lang('Website')</label>
                                                                <input type="text" name="website" class="form-control rounded" placeholder="@lang('Website')" />
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="mb-1">@lang('Email')</label>
                                                                <input type="text" name="email" class="form-control rounded" placeholder="@lang('Email')" />
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                                                            
                                                            <div class="form-group">
                                                                <label class="mb-1">@lang('Phone number')</label>
                                                                <input type="text" name="phone_number" id="phone_number" class="form-control rounded" placeholder="@lang('Phone number')" />
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="mb-1"></label>
                                                                <!--<a href="javascript:;" id="send-otpn" class="tn btn-success form-control rounded"><i class="fa fa-sms"></i> verify</a>-->
                                                                <button id="send-otp" class="btn btn-success form-control rounded">verify</button>
                                                            </div>
                                                            </div>

                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="mb-1">@lang('Facebook')</label>
                                                                <input type="text" name="facebook" class="form-control rounded" placeholder="@lang('Facebook')" />
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="mb-1">@lang('Twitter')</label>
                                                                <input type="text" name="twitter" class="form-control rounded" placeholder="@lang('Twitter')" />
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label class="mb-1">@lang('Linkedin')</label>
                                                                <input type="text" name="linkedin" class="form-control rounded" placeholder="@lang('Linkedin')" />
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="dynamic" class="container tab-pane"><br>
                                            @if (request()->type == 'restaurant')
                                                <div class="menu-section-area">
                                                    @includeIf('partials.user.listing.menu')
                                                </div>

                                                <div class="row my-2">
                                                    <div class="col-lg-12 text-center">
                                                        <a href="javascript:;" id="menud-add-btn" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> {{__('Add More')}}</a>
                                                    </div>
                                                </div>
                                            @endif

                                            @if (request()->type == 'hotel')
                                                <div class="room-section-area">
                                                    @includeIf('partials.user.listing.room')
                                                </div>

                                                <div class="row my-2">
                                                    <div class="col-lg-12 text-center">
                                                        <a href="javascript:;" id="room-add-btn" class="btn btn-info"><i class="fa fa-plus"></i> {{__('Add More')}}</a>
                                                    </div>
                                                </div>
                                            @endif

                                            @if (request()->type == 'beauty')
                                                <div class="beauty-section-area">
                                                    @includeIf('partials.user.listing.beauty')
                                                </div>

                                                <div class="row my-2">
                                                    <div class="col-lg-12 text-center">
                                                        <a href="javascript:;" id="beauty-add-btn" class="btn btn-info"><i class="fa fa-plus"></i> {{__('Add More')}}</a>
                                                    </div>
                                                </div>
                                            @endif

                                            @if (request()->type == 'real_estate')
                                                @includeIf('partials.user.listing.real_estate')
                                            @endif

                                            @if (request()->type == 'car')
                                                @includeIf('partials.user.listing.car')
                                            @endif
                                        </div>

                                        <div id="faq" class="container tab-pane"><br>
                                            <div class="faq-section-area">
                                                @includeIf('partials.user.listing.faq')
                                            </div>

                                            <div class="row my-2">
                                                <div class="col-lg-12 text-center">
                                                    <a href="javascript:;" id="faq-add-btn" class="btn btn-info"><i class="fa fa-plus"></i> {{__('Add More')}}</a>
                                                </div>
                                            </div>

                                            <div class="row justify-content-center mt-3">
                                                <button type="submit" id="submit-btn" class="btn btn-primary text-center">{{ __('Submit') }}</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                        </div>
                    </div>
                </div>


            <!-- footer -->
            <div class="row">
                <div class="col-md-12">
                    <div class="py-3">
                        @php
                            echo $gs->copyright;
                        @endphp
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- ======================= dashboard Detail End ======================== -->

    <div class="modal fade" id="setgallery" tabindex="-1" role="dialog" aria-labelledby="setgallery" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('Image Gallery') }}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="top-area">
                        <div class="row d-flex justify-content-center">
                            <div class="col-sm-6">
                                <div class="upload-img-btn">
                                    <label id="property_gallery"><i class="icofont-upload-alt"></i>{{ __('Upload File') }}</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <a href="javascript:;" class="upload-done" data-dismiss="modal"> <i class="fas fa-check"></i> {{ __('Done') }}</a>
                            </div>
                            <div class="col-sm-12 text-center">( <small>{{ __('You can upload multiple Images.') }}</small> )</div>
                        </div>
                    </div>
                    <div class="gallery-images">
                        <div class="selected-image">
                            <div class="row">


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
<script>
    'use strict';

    $(document).on('click', '.remove-img' ,function() {
        var id = $(this).find('input[type=hidden]').val();
        $(this).parent().parent().remove();
    });

    let menuId = 2;
    $('#menud-add-btn').on('click',function(){
        $('.menu-section-area').append(''+
            `<div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('Menu Items') }}</h6>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Menu Name') }} *</h4>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="input-field" name="menu_title[]" placeholder="{{ __('Enter Name') }}" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Menu Price') }} *</h4>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <input type="number" class="input-field" name="menu_price[]" placeholder="{{ __('Enter Price') }}" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Menu Photo') }}</h4>
                                <p class="sub-heading">({{ __('Preferred Size 600 x 600') }})</p>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="wrapper-image-preview">
                                <div class="box">
                                    <div class="back-preview-image" style="background-image: url({{ asset('assets/images/default.png') }});"></div>
                                    <div class="upload-options">
                                        <label class="img-upload-label" for="menu-items-${menuId}"><i class="fas fa-camera"></i> {{ __('Upload Picture') }} </label>
                                        <input id="menu-items-${menuId}" type="file" class="image-upload" name="menu_photo[]" accept="image/*">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`
        +'')
        menuId ++;
    })

    let roomId = 2;
    $('#room-add-btn').on('click',function(){
        $('.room-section-area').append(''+
            `<div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('Hotel room') }}</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Room Name') }} *</h4>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="input-field" name="room_name[]" placeholder="{{ __('Enter Name') }}" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Room Price') }} *</h4>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <input type="number" class="input-field" name="room_price[]" placeholder="{{ __('Enter Price') }}" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Room Photo') }}</h4>
                                <p class="sub-heading">({{ __('Preferred Size 600 x 600') }})</p>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="wrapper-image-preview">
                                <div class="box">
                                    <div class="back-preview-image" style="background-image: url({{ asset('assets/images/placeholder.jpg') }});"></div>
                                    <div class="upload-options">
                                        <label class="img-upload-label" for="room-items-${roomId}"><i class="fas fa-camera"></i> {{ __('Upload Picture') }} </label>
                                        <input id="room-items-${roomId}" type="file" class="image-upload" name="room_photo[]" accept="image/*">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Room amenities') }}</h4>
                                <p class="sub-heading">{{ __('Seperated By Comma(,)') }}</p>
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <input type="text" id="tags" class="mytags tagify${roomId}" name="room_amenities[]" placeholder="{{ __('Room amenities') }}"  value="">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Room description') }}</h4>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <textarea class="input-field" name="room_description[]" placeholder="{{ __('Room description') }}" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            `
        +'')
        $('.tagify'+roomId).tagify({focus: true});
        roomId ++;
    })

    let beautyId = 2;
    $('#beauty-add-btn').on('click',function(){
        $('.beauty-section-area').append(''+
            `<div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('Service') }}</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Service Name') }} *</h4>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="input-field" name="service_name[]" placeholder="{{ __('Enter Name') }}" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Service Price') }} *</h4>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <input type="number" class="input-field" name="service_price[]" placeholder="{{ __('Enter Price') }}" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Service Photo') }}</h4>
                                <p class="sub-heading">({{ __('Preferred Size 600 x 600') }})</p>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="wrapper-image-preview">
                                <div class="box">
                                    <div class="back-preview-image" style="background-image: url({{ asset('assets/images/placeholder.jpg') }});"></div>
                                    <div class="upload-options">
                                        <label class="img-upload-label" for="service-items-${beautyId}"><i class="fas fa-camera"></i> {{ __('Upload Picture') }} </label>
                                        <input id="service-items-${beautyId}" type="file" class="image-upload" name="service_photo[]" accept="image/*">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Service Time') }} *</h4>
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="input-field" name="service_from[]" placeholder="{{ __('Enter time') }}" value="">
                                </div>

                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('To') }} *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" class="input-field" name="service_to[]" placeholder="{{ __('Enter time') }}" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Service Duration') }} *</h4>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <input type="number" class="input-field" name="service_duration[]" placeholder="{{ __('Enter Duration') }}" value="">
                        </div>
                    </div>
                </div>
            </div>`
            +'')
        beautyId ++;
    })

    $("#faq-add-btn").on('click',function(){
            $('.faq-section-area').append(''+
                `<div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('FAQ Items') }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="left-area">
                                    <h4 class="heading">{{ __('Name') }} *</h4>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="input-field" name="faq_name[]" placeholder="{{ __('Enter Name') }}" value="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="left-area">
                                    <h4 class="heading">{{ __('Description') }} *</h4>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <textarea name="faq_details[]" class="input-field" placeholder="{{ __('Description') }}" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                    </div>
                </div>`
            +'')
        })

// send otp script
$("#send-otp").on('click',function(){
   
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var formData = {
            _token: csrfToken,
            phone: $('#phone_number').val()
        };
       
        $.ajax({
            type: "POST",
            url: "https://api.textlocal.in/send/", // Replace with your actual URL
            data: postData,
            dataType: "json",
            success: function(response) {
                // Handle the response from the server
                alert('success');
            },
            error: function(xhr, status, error) {
                // Handle errors
                alert('failure');
            }
        });

});
</script>
@endpush
