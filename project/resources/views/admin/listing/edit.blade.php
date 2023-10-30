@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="d-sm-flex align-items-center justify-content-between">
        <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Directory') }} <a class="btn btn-primary btn-rounded btn-sm" href="{{route('admin.listing.index')}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.listing.edit',$data->id) }}">{{ __('Edit Directory') }}</a></li>
        </ol>
	</div>
</div>


<div class="row justify-content-center mt-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('Edit Directory Form') }}</h6>
            </div>

            <div class="card-body">
                <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                <form class="geniusform" action="{{route('admin.listing.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                    @include('includes.admin.form-both')
                    {{ csrf_field() }}

                    <input type="hidden" name="type" value="{{ request()->type }}">
                    <div class="container pl-0 pr-0 ml-0 mr-0 w-100 mw-100">
                        <div id="tabs">
                            <ul class="nav nav-pills nav-justified mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link bsc active" data-toggle="pill" href="#basic">{{ __('Basic') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link amenities" data-toggle="pill" href="#amenities">{{ __('Amenities') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link media" data-toggle="pill" href="#media">{{ __('Media') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link schedule" data-toggle="pill" href="#schedule">{{ __('Schedule') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link contact" data-toggle="pill" href="#contact">{{ __('Contact') }}</a>
                                </li>

                                @if (request()->type == 'restaurant')
                                    <li class="nav-item">
                                        <a class="nav-link dynamic" data-toggle="pill" href="#dynamic">{{ ucfirst(request()->type) }} {{ __('Item') }}</a>
                                    </li>
                                @endif

                                @if (request()->type == 'hotel')
                                    <li class="nav-item">
                                        <a class="nav-link dynamic" data-toggle="pill" href="#dynamic">{{ ucfirst(request()->type) }} {{ __('Room') }}</a>
                                    </li>
                                @endif

                                @if (request()->type == 'beauty')
                                    <li class="nav-item">
                                        <a class="nav-link dynamic" data-toggle="pill" href="#dynamic">{{ ucfirst(request()->type) }} {{ __('Service') }}</a>
                                    </li>
                                @endif

                                @if (request()->type == 'real_estate')
                                    <li class="nav-item">
                                        <a class="nav-link dynamic" data-toggle="pill" href="#dynamic">{{ ucfirst(str_replace("_"," ",request()->type)) }} {{ __('Info') }}</a>
                                    </li>
                                @endif

                                @if (request()->type == 'car')
                                    <li class="nav-item">
                                        <a class="nav-link dynamic" data-toggle="pill" href="#dynamic">{{ ucfirst(request()->type) }} {{ __('Specification') }}</a>
                                    </li>
                                @endif

                                <li class="nav-item">
                                    <a class="nav-link faq" data-toggle="pill" href="#faq">{{ __('FAQ') }}</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="basic" class="container tab-pane active"><br>
                                    @if (request()->type == 'doctor')
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Doctor Name') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" class="input-field" name="name" placeholder="{{ __('name') }}" value="{{ $data->name }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Doctor Designation') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" class="input-field" name="designation" placeholder="{{ __('Designation') }}" value="{{ $data->designation }}">
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Listing Title') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" class="input-field" name="name" placeholder="{{ __('Listing Title') }}" value="{{ $data->name}}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Listing Slug') }} *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" class="input-field" name="slug" placeholder="{{ __('Listing Slug') }}" value="{{ $data->slug}}">
                                            </div>
                                        </div>
                                    @endif

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Category') }} *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <select name="category_id" class="input-field">
                                                <option value="" selected>{{__('Please select a category')}}</option>
                                                @foreach ($categories as $key=>$category)
                                                <option value="{{$category->id}}" {{ $category->id == $data->category_id ? 'selected' : '' }}>{{$category->title}}</option>
                                                @if ($category->child)
                                                    @foreach ($category->child as $key=>$childCategory)
                                                        <option value="{{$childCategory->id}}" {{ $childCategory->id == $data->category_id ? 'selected' : '' }}>--{{$childCategory->title}}</option>
                                                    @endforeach
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Location') }} *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <select id="location" name="location_id" class="input-field">
                                                <option value="" selected>{{__('Please select a location')}}</option>
                                                @foreach ($locations as $key=>$location)
                                                    <option value="{{$location->id}}" {{ $location->id == $data->location_id ? 'selected' : '' }}>{{ucfirst($location->name)}}</option>
                                                    @if ($location->child)
                                                        @foreach ($location->child as $key=>$childlocation)
                                                            <option value="{{$childlocation->id}}" {{ $childlocation->id == $data->location_id ? 'selected' : '' }}>--{{ ucfirst($childlocation->name)}}</option>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Real address') }}</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" class="input-field" name="real_address" placeholder="{{ __('Address') }}" value="{{ $data->real_address}}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Map Latitude') }}</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" class="input-field" name="latitude" placeholder="{{ __('Latitude') }}" value="{{ $data->latitude}}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Map Longitude') }}</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" class="input-field" name="longitude" placeholder="{{ __('Longitude') }}" value="{{ $data->longitude}}">
                                        </div>
                                    </div>

                                    @if (request()->type == 'hotel')
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading">{{ __('Distance') }}</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" class="input-field" name="distance" placeholder="{{ __('Distance') }}" value="{{ $data->distance }}">
                                            </div>
                                        </div>
                                    @endif

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Description') }} *</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-9">
                                            <textarea name="description" class="input-field" placeholder="{{ __('Description') }}" cols="30" rows="10" required>{{ $data->description }}</textarea>
                                        </div>
                                    </div>


                                    <div class="row mt-3 is_top">
                                        <div class="col-lg-3">
                                            <div class="left-area">

                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-check">
                                                <input type="checkbox" name="is_feature" class="form-check-input" value="1" id="is_feature" {{ $data->is_feature == 1 ? 'checked' : ''}}>
                                                <label class="form-check-label" for="is_feature">{{ __('Check if this directory is featured') }}</label>
                                            </div>
                                        </div>
                                    </div>


                                    <ul class="list-inline mt-3 mb-0  text-center">
                                        <li class="list-inline-item">
                                            <a href="javascript:;" data-href=".amenities" class="next-prev btn btn-primary"> {{ __('Next') }} </a>
                                        </li>
                                    </ul>

                                </div>

                                <div id="amenities" class="container tab-pane"><br>
                                    <div class="row">
                                        @if ($amenities)
                                            @foreach($amenities as $key=>$amenity)
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" name="amenities[{{ $amenity->icon }}][]" value="{{$amenity->name}}" id="{{$amenity->name}}-option-{{$key}}" {{ in_array($amenity->name,$listingAmenities) ? 'checked' : ''}}>
                                                        <label class="form-check-label" for="{{$amenity->name}}-option-{{$key}}">{{ $amenity->name }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                    <ul class="list-inline mt-3 mb-0  text-center">
                                        <li class="list-inline-item">
                                            <a href="javascript:;" data-href=".bsc" class="next-prev btn btn-primary"> {{ __('Prev') }} </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:;" data-href=".media" class="next-prev btn btn-primary"> {{ __('Next') }} </a>
                                        </li>
                                    </ul>
                                </div>

                                <div id="media" class="container tab-pane"><br>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Listing Video Provider') }}*</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <select name="listing_video_provider" class="input-field">
                                                <option value="youtube" {{ $data->listing_video_provider == 'youtube' ? 'selected' : '' }}>{{ __('Youtube') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Listing Video Url') }}*</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-9">
                                            <input type="text" class="input-field" name="listing_video" placeholder="https://www.youtube.com/watch?v=AXrHbrMrun0" value="{{ $data->listing_video }}">
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Listing Thumbnail') }}*</h4>
                                                <p class="sub-heading">({{ __('Preferred Size 600 x 600') }})</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="wrapper-image-preview">
                                                <div class="box">
                                                    <div class="back-preview-image" style="background-image: url({{ $data->photo ? asset('assets/images/'.$data->photo) : asset('assets/images/default.png') }});"></div>
                                                    <div class="upload-options">
                                                        <label class="img-upload-label" for="img-upload"> <i class="fas fa-camera"></i> {{ __('Upload Picture') }} </label>
                                                        <input id="img-upload" type="file" class="image-upload" name="photo" accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Listing Gallary') }}</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <button type="button" class="btn btn-primary set-gallery" data-toggle="modal" data-target="#setgallery" id="#myBtn">
                                                <i class="icofont-plus"></i> {{__('Set Gallery')}}
                                            </button>
                                        </div>
                                    </div>


                                    <ul class="list-inline mt-3 mb-0  text-center">
                                        <li class="list-inline-item">
                                            <a href="javascript:;" data-href=".amenities" class="next-prev btn btn-primary"> {{ __('Prev') }} </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:;" data-href=".schedule" class="next-prev btn btn-primary"> {{ __('Next') }} </a>
                                        </li>
                                    </ul>

                                </div>

                                <div id="schedule" class="container tab-pane"><br>

                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Saturday') }} *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <select class="input-field" name="saturday_opening">
                                                <option value="" selected>{{__('Opening Time')}}</option>
                                                <option value="12 am" {{ $listingSchedules['sat_open'] == "12 am" ? 'selected' : '' }}>12 am</option>
                                                <option value="01 am" {{ $listingSchedules['sat_open'] == "01 am" ? 'selected' : '' }}>01 am</option>
                                                <option value="02 am" {{ $listingSchedules['sat_open'] == "02 am" ? 'selected' : '' }}>02 am</option>
                                                <option value="03 am" {{ $listingSchedules['sat_open'] == "03 am" ? 'selected' : '' }}>03 am</option>
                                                <option value="04 am" {{ $listingSchedules['sat_open'] == "04 am" ? 'selected' : '' }}>04 am</option>
                                                <option value="05 am" {{ $listingSchedules['sat_open'] == "05 am" ? 'selected' : '' }}>05 am</option>
                                                <option value="06 am" {{ $listingSchedules['sat_open'] == "06 am" ? 'selected' : '' }}>06 am</option>
                                                <option value="07 am" {{ $listingSchedules['sat_open'] == "07 am" ? 'selected' : '' }}>07 am</option>
                                                <option value="08 am" {{ $listingSchedules['sat_open'] == "08 am" ? 'selected' : '' }}>08 am</option>
                                                <option value="09 am" {{ $listingSchedules['sat_open'] == "09 am" ? 'selected' : '' }}>09 am</option>
                                                <option value="10 am" {{ $listingSchedules['sat_open'] == "10 am" ? 'selected' : '' }}>10 am</option>
                                                <option value="11 am" {{ $listingSchedules['sat_open'] == "11 am" ? 'selected' : '' }}>11 am</option>
                                                <option value="12 pm" {{ $listingSchedules['sat_open'] == "12 pm" ? 'selected' : '' }}>12 pm</option>
                                                <option value="01 pm" {{ $listingSchedules['sat_open'] == "01 pm" ? 'selected' : '' }}>01 pm</option>
                                                <option value="02 pm" {{ $listingSchedules['sat_open'] == "02 pm" ? 'selected' : '' }}>02 pm</option>
                                                <option value="03 pm" {{ $listingSchedules['sat_open'] == "03 pm" ? 'selected' : '' }}>03 pm</option>
                                                <option value="04 pm" {{ $listingSchedules['sat_open'] == "04 pm" ? 'selected' : '' }}>04 pm</option>
                                                <option value="05 pm" {{ $listingSchedules['sat_open'] == "05 pm" ? 'selected' : '' }}>05 pm</option>
                                                <option value="06 pm" {{ $listingSchedules['sat_open'] == "06 pm" ? 'selected' : '' }}>06 pm</option>
                                                <option value="07 pm" {{ $listingSchedules['sat_open'] == "07 pm" ? 'selected' : '' }}>07 pm</option>
                                                <option value="08 pm" {{ $listingSchedules['sat_open'] == "08 pm" ? 'selected' : '' }}>08 pm</option>
                                                <option value="09 pm" {{ $listingSchedules['sat_open'] == "09 pm" ? 'selected' : '' }}>09 pm</option>
                                                <option value="10 pm" {{ $listingSchedules['sat_open'] == "10 pm" ? 'selected' : '' }}>10 pm</option>
                                                <option value="11 pm" {{ $listingSchedules['sat_open'] == "11 pm" ? 'selected' : '' }}>11 pm</option>
                                                <option value="closed" {{ $listingSchedules['sat_open'] == 'closed' ? 'selected' : ''}}>Closed</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-5">
                                            <select class="input-field" name="saturday_closing">
                                                <option value="" selected>{{__('Closing Time')}}</option>
                                                <option value="12 am" {{ $listingSchedules['sat_close'] == "12 am" ? 'selected' : '' }}>12 am</option>
                                                <option value="01 am" {{ $listingSchedules['sat_close'] == "01 am" ? 'selected' : '' }}>01 am</option>
                                                <option value="02 am" {{ $listingSchedules['sat_close'] == "02 am" ? 'selected' : '' }}>02 am</option>
                                                <option value="03 am" {{ $listingSchedules['sat_close'] == "03 am" ? 'selected' : '' }}>03 am</option>
                                                <option value="04 am" {{ $listingSchedules['sat_close'] == "04 am" ? 'selected' : '' }}>04 am</option>
                                                <option value="05 am" {{ $listingSchedules['sat_close'] == "05 am" ? 'selected' : '' }}>05 am</option>
                                                <option value="06 am" {{ $listingSchedules['sat_close'] == "06 am" ? 'selected' : '' }}>06 am</option>
                                                <option value="07 am" {{ $listingSchedules['sat_close'] == "07 am" ? 'selected' : '' }}>07 am</option>
                                                <option value="08 am" {{ $listingSchedules['sat_close'] == "08 am" ? 'selected' : '' }}>08 am</option>
                                                <option value="09 am" {{ $listingSchedules['sat_close'] == "09 am" ? 'selected' : '' }}>09 am</option>
                                                <option value="10 am" {{ $listingSchedules['sat_close'] == "10 am" ? 'selected' : '' }}>10 am</option>
                                                <option value="11 am" {{ $listingSchedules['sat_close'] == "11 am" ? 'selected' : '' }}>11 am</option>
                                                <option value="12 pm" {{ $listingSchedules['sat_close'] == "12 pm" ? 'selected' : '' }}>12 pm</option>
                                                <option value="01 pm" {{ $listingSchedules['sat_close'] == "01 pm" ? 'selected' : '' }}>01 pm</option>
                                                <option value="02 pm" {{ $listingSchedules['sat_close'] == "02 pm" ? 'selected' : '' }}>02 pm</option>
                                                <option value="03 pm" {{ $listingSchedules['sat_close'] == "03 pm" ? 'selected' : '' }}>03 pm</option>
                                                <option value="04 pm" {{ $listingSchedules['sat_close'] == "04 pm" ? 'selected' : '' }}>04 pm</option>
                                                <option value="05 pm" {{ $listingSchedules['sat_close'] == "05 pm" ? 'selected' : '' }}>05 pm</option>
                                                <option value="06 pm" {{ $listingSchedules['sat_close'] == "06 pm" ? 'selected' : '' }}>06 pm</option>
                                                <option value="07 pm" {{ $listingSchedules['sat_close'] == "07 pm" ? 'selected' : '' }}>07 pm</option>
                                                <option value="08 pm" {{ $listingSchedules['sat_close'] == "08 pm" ? 'selected' : '' }}>08 pm</option>
                                                <option value="09 pm" {{ $listingSchedules['sat_close'] == "09 pm" ? 'selected' : '' }}>09 pm</option>
                                                <option value="10 pm" {{ $listingSchedules['sat_close'] == "10 pm" ? 'selected' : '' }}>10 pm</option>
                                                <option value="11 pm" {{ $listingSchedules['sat_close'] == "11 pm" ? 'selected' : '' }}>11 pm</option>
                                                <option value="closed" {{ $listingSchedules['sat_close'] == 'closed' ? 'selected' : ''}}>Closed</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Sunday') }} *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <select class="input-field" name="sunday_opening">
                                                <option value="" selected>{{__('Opening Time')}}</option>
                                                <option value="12 am" {{ $listingSchedules['sun_open'] == "12 am" ? 'selected' : '' }}>12 am</option>
                                                <option value="01 am" {{ $listingSchedules['sun_open'] == "01 am" ? 'selected' : '' }}>01 am</option>
                                                <option value="02 am" {{ $listingSchedules['sun_open'] == "02 am" ? 'selected' : '' }}>02 am</option>
                                                <option value="03 am" {{ $listingSchedules['sun_open'] == "03 am" ? 'selected' : '' }}>03 am</option>
                                                <option value="04 am" {{ $listingSchedules['sun_open'] == "04 am" ? 'selected' : '' }}>04 am</option>
                                                <option value="05 am" {{ $listingSchedules['sun_open'] == "05 am" ? 'selected' : '' }}>05 am</option>
                                                <option value="06 am" {{ $listingSchedules['sun_open'] == "06 am" ? 'selected' : '' }}>06 am</option>
                                                <option value="07 am" {{ $listingSchedules['sun_open'] == "07 am" ? 'selected' : '' }}>07 am</option>
                                                <option value="08 am" {{ $listingSchedules['sun_open'] == "08 am" ? 'selected' : '' }}>08 am</option>
                                                <option value="09 am" {{ $listingSchedules['sun_open'] == "09 am" ? 'selected' : '' }}>09 am</option>
                                                <option value="10 am" {{ $listingSchedules['sun_open'] == "10 am" ? 'selected' : '' }}>10 am</option>
                                                <option value="11 am" {{ $listingSchedules['sun_open'] == "11 am" ? 'selected' : '' }}>11 am</option>
                                                <option value="12 pm" {{ $listingSchedules['sun_open'] == "12 pm" ? 'selected' : '' }}>12 pm</option>
                                                <option value="01 pm" {{ $listingSchedules['sun_open'] == "01 pm" ? 'selected' : '' }}>01 pm</option>
                                                <option value="02 pm" {{ $listingSchedules['sun_open'] == "02 pm" ? 'selected' : '' }}>02 pm</option>
                                                <option value="03 pm" {{ $listingSchedules['sun_open'] == "03 pm" ? 'selected' : '' }}>03 pm</option>
                                                <option value="04 pm" {{ $listingSchedules['sun_open'] == "04 pm" ? 'selected' : '' }}>04 pm</option>
                                                <option value="05 pm" {{ $listingSchedules['sun_open'] == "05 pm" ? 'selected' : '' }}>05 pm</option>
                                                <option value="06 pm" {{ $listingSchedules['sun_open'] == "06 pm" ? 'selected' : '' }}>06 pm</option>
                                                <option value="07 pm" {{ $listingSchedules['sun_open'] == "07 pm" ? 'selected' : '' }}>07 pm</option>
                                                <option value="08 pm" {{ $listingSchedules['sun_open'] == "08 pm" ? 'selected' : '' }}>08 pm</option>
                                                <option value="09 pm" {{ $listingSchedules['sun_open'] == "09 pm" ? 'selected' : '' }}>09 pm</option>
                                                <option value="10 pm" {{ $listingSchedules['sun_open'] == "10 pm" ? 'selected' : '' }}>10 pm</option>
                                                <option value="11 pm" {{ $listingSchedules['sun_open'] == "11 pm" ? 'selected' : '' }}>11 pm</option>
                                                <option value="closed" {{ $listingSchedules['sun_open'] == 'closed' ? 'selected' : ''}}>Closed</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-5">
                                            <select class="input-field" name="sunday_closing">
                                                <option value="" selected>{{__('Closing Time')}}</option>
                                                <option value="12 am" {{ $listingSchedules['sun_close'] == "12 am" ? 'selected' : '' }}>12 am</option>
                                                <option value="01 am" {{ $listingSchedules['sun_close'] == "01 am" ? 'selected' : '' }}>01 am</option>
                                                <option value="02 am" {{ $listingSchedules['sun_close'] == "02 am" ? 'selected' : '' }}>02 am</option>
                                                <option value="03 am" {{ $listingSchedules['sun_close'] == "03 am" ? 'selected' : '' }}>03 am</option>
                                                <option value="04 am" {{ $listingSchedules['sun_close'] == "04 am" ? 'selected' : '' }}>04 am</option>
                                                <option value="05 am" {{ $listingSchedules['sun_close'] == "05 am" ? 'selected' : '' }}>05 am</option>
                                                <option value="06 am" {{ $listingSchedules['sun_close'] == "06 am" ? 'selected' : '' }}>06 am</option>
                                                <option value="07 am" {{ $listingSchedules['sun_close'] == "07 am" ? 'selected' : '' }}>07 am</option>
                                                <option value="08 am" {{ $listingSchedules['sun_close'] == "08 am" ? 'selected' : '' }}>08 am</option>
                                                <option value="09 am" {{ $listingSchedules['sun_close'] == "09 am" ? 'selected' : '' }}>09 am</option>
                                                <option value="10 am" {{ $listingSchedules['sun_close'] == "10 am" ? 'selected' : '' }}>10 am</option>
                                                <option value="11 am" {{ $listingSchedules['sun_close'] == "11 am" ? 'selected' : '' }}>11 am</option>
                                                <option value="12 pm" {{ $listingSchedules['sun_close'] == "12 pm" ? 'selected' : '' }}>12 pm</option>
                                                <option value="01 pm" {{ $listingSchedules['sun_close'] == "01 pm" ? 'selected' : '' }}>01 pm</option>
                                                <option value="02 pm" {{ $listingSchedules['sun_close'] == "02 pm" ? 'selected' : '' }}>02 pm</option>
                                                <option value="03 pm" {{ $listingSchedules['sun_close'] == "03 pm" ? 'selected' : '' }}>03 pm</option>
                                                <option value="04 pm" {{ $listingSchedules['sun_close'] == "04 pm" ? 'selected' : '' }}>04 pm</option>
                                                <option value="05 pm" {{ $listingSchedules['sun_close'] == "05 pm" ? 'selected' : '' }}>05 pm</option>
                                                <option value="06 pm" {{ $listingSchedules['sun_close'] == "06 pm" ? 'selected' : '' }}>06 pm</option>
                                                <option value="07 pm" {{ $listingSchedules['sun_close'] == "07 pm" ? 'selected' : '' }}>07 pm</option>
                                                <option value="08 pm" {{ $listingSchedules['sun_close'] == "08 pm" ? 'selected' : '' }}>08 pm</option>
                                                <option value="09 pm" {{ $listingSchedules['sun_close'] == "09 pm" ? 'selected' : '' }}>09 pm</option>
                                                <option value="10 pm" {{ $listingSchedules['sun_close'] == "10 pm" ? 'selected' : '' }}>10 pm</option>
                                                <option value="11 pm" {{ $listingSchedules['sun_close'] == "11 pm" ? 'selected' : '' }}>11 pm</option>
                                                <option value="closed" {{ $listingSchedules['sun_close'] == 'closed' ? 'selected' : ''}}>Closed</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Monday') }} *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <select class="input-field" name="monday_opening">
                                                <option value="" selected>{{__('Opening Time')}}</option>
                                                <option value="12 am" {{ $listingSchedules['mon_open'] == "12 am" ? 'selected' : '' }}>12 am</option>
                                                <option value="01 am" {{ $listingSchedules['mon_open'] == "01 am" ? 'selected' : '' }}>01 am</option>
                                                <option value="02 am" {{ $listingSchedules['mon_open'] == "02 am" ? 'selected' : '' }}>02 am</option>
                                                <option value="03 am" {{ $listingSchedules['mon_open'] == "03 am" ? 'selected' : '' }}>03 am</option>
                                                <option value="04 am" {{ $listingSchedules['mon_open'] == "04 am" ? 'selected' : '' }}>04 am</option>
                                                <option value="05 am" {{ $listingSchedules['mon_open'] == "05 am" ? 'selected' : '' }}>05 am</option>
                                                <option value="06 am" {{ $listingSchedules['mon_open'] == "06 am" ? 'selected' : '' }}>06 am</option>
                                                <option value="07 am" {{ $listingSchedules['mon_open'] == "07 am" ? 'selected' : '' }}>07 am</option>
                                                <option value="08 am" {{ $listingSchedules['mon_open'] == "08 am" ? 'selected' : '' }}>08 am</option>
                                                <option value="09 am" {{ $listingSchedules['mon_open'] == "09 am" ? 'selected' : '' }}>09 am</option>
                                                <option value="10 am" {{ $listingSchedules['mon_open'] == "10 am" ? 'selected' : '' }}>10 am</option>
                                                <option value="11 am" {{ $listingSchedules['mon_open'] == "11 am" ? 'selected' : '' }}>11 am</option>
                                                <option value="12 pm" {{ $listingSchedules['mon_open'] == "12 pm" ? 'selected' : '' }}>12 pm</option>
                                                <option value="01 pm" {{ $listingSchedules['mon_open'] == "01 pm" ? 'selected' : '' }}>01 pm</option>
                                                <option value="02 pm" {{ $listingSchedules['mon_open'] == "02 pm" ? 'selected' : '' }}>02 pm</option>
                                                <option value="03 pm" {{ $listingSchedules['mon_open'] == "03 pm" ? 'selected' : '' }}>03 pm</option>
                                                <option value="04 pm" {{ $listingSchedules['mon_open'] == "04 pm" ? 'selected' : '' }}>04 pm</option>
                                                <option value="05 pm" {{ $listingSchedules['mon_open'] == "05 pm" ? 'selected' : '' }}>05 pm</option>
                                                <option value="06 pm" {{ $listingSchedules['mon_open'] == "06 pm" ? 'selected' : '' }}>06 pm</option>
                                                <option value="07 pm" {{ $listingSchedules['mon_open'] == "07 pm" ? 'selected' : '' }}>07 pm</option>
                                                <option value="08 pm" {{ $listingSchedules['mon_open'] == "08 pm" ? 'selected' : '' }}>08 pm</option>
                                                <option value="09 pm" {{ $listingSchedules['mon_open'] == "09 pm" ? 'selected' : '' }}>09 pm</option>
                                                <option value="10 pm" {{ $listingSchedules['mon_open'] == "10 pm" ? 'selected' : '' }}>10 pm</option>
                                                <option value="11 pm" {{ $listingSchedules['mon_open'] == "11 pm" ? 'selected' : '' }}>11 pm</option>
                                                <option value="closed" {{ $listingSchedules['mon_open'] == 'closed' ? 'selected' : ''}}>Closed</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-5">
                                            <select class="input-field" name="monday_closing">
                                                <option value="" selected>{{__('Closing Time')}}</option>
                                                <option value="12 am" {{ $listingSchedules['mon_close'] == "12 am" ? 'selected' : '' }}>12 am</option>
                                                <option value="01 am" {{ $listingSchedules['mon_close'] == "01 am" ? 'selected' : '' }}>01 am</option>
                                                <option value="02 am" {{ $listingSchedules['mon_close'] == "02 am" ? 'selected' : '' }}>02 am</option>
                                                <option value="03 am" {{ $listingSchedules['mon_close'] == "03 am" ? 'selected' : '' }}>03 am</option>
                                                <option value="04 am" {{ $listingSchedules['mon_close'] == "04 am" ? 'selected' : '' }}>04 am</option>
                                                <option value="05 am" {{ $listingSchedules['mon_close'] == "05 am" ? 'selected' : '' }}>05 am</option>
                                                <option value="06 am" {{ $listingSchedules['mon_close'] == "06 am" ? 'selected' : '' }}>06 am</option>
                                                <option value="07 am" {{ $listingSchedules['mon_close'] == "07 am" ? 'selected' : '' }}>07 am</option>
                                                <option value="08 am" {{ $listingSchedules['mon_close'] == "08 am" ? 'selected' : '' }}>08 am</option>
                                                <option value="09 am" {{ $listingSchedules['mon_close'] == "09 am" ? 'selected' : '' }}>09 am</option>
                                                <option value="10 am" {{ $listingSchedules['mon_close'] == "10 am" ? 'selected' : '' }}>10 am</option>
                                                <option value="11 am" {{ $listingSchedules['mon_close'] == "11 am" ? 'selected' : '' }}>11 am</option>
                                                <option value="12 pm" {{ $listingSchedules['mon_close'] == "12 pm" ? 'selected' : '' }}>12 pm</option>
                                                <option value="01 pm" {{ $listingSchedules['mon_close'] == "01 pm" ? 'selected' : '' }}>01 pm</option>
                                                <option value="02 pm" {{ $listingSchedules['mon_close'] == "02 pm" ? 'selected' : '' }}>02 pm</option>
                                                <option value="03 pm" {{ $listingSchedules['mon_close'] == "03 pm" ? 'selected' : '' }}>03 pm</option>
                                                <option value="04 pm" {{ $listingSchedules['mon_close'] == "04 pm" ? 'selected' : '' }}>04 pm</option>
                                                <option value="05 pm" {{ $listingSchedules['mon_close'] == "05 pm" ? 'selected' : '' }}>05 pm</option>
                                                <option value="06 pm" {{ $listingSchedules['mon_close'] == "06 pm" ? 'selected' : '' }}>06 pm</option>
                                                <option value="07 pm" {{ $listingSchedules['mon_close'] == "07 pm" ? 'selected' : '' }}>07 pm</option>
                                                <option value="08 pm" {{ $listingSchedules['mon_close'] == "08 pm" ? 'selected' : '' }}>08 pm</option>
                                                <option value="09 pm" {{ $listingSchedules['mon_close'] == "09 pm" ? 'selected' : '' }}>09 pm</option>
                                                <option value="10 pm" {{ $listingSchedules['mon_close'] == "10 pm" ? 'selected' : '' }}>10 pm</option>
                                                <option value="11 pm" {{ $listingSchedules['mon_close'] == "11 pm" ? 'selected' : '' }}>11 pm</option>
                                                <option value="closed" {{ $listingSchedules['mon_close'] == 'closed' ? 'selected' : ''}}>Closed</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Tuesday') }} *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <select class="input-field" name="tuesday_opening">
                                                <option value="" selected>{{__('Opening Time')}}</option>
                                                <option value="12 am" {{ $listingSchedules['tue_open'] == "12 am" ? 'selected' : '' }}>12 am</option>
                                                <option value="01 am" {{ $listingSchedules['tue_open'] == "01 am" ? 'selected' : '' }}>01 am</option>
                                                <option value="02 am" {{ $listingSchedules['tue_open'] == "02 am" ? 'selected' : '' }}>02 am</option>
                                                <option value="03 am" {{ $listingSchedules['tue_open'] == "03 am" ? 'selected' : '' }}>03 am</option>
                                                <option value="04 am" {{ $listingSchedules['tue_open'] == "04 am" ? 'selected' : '' }}>04 am</option>
                                                <option value="05 am" {{ $listingSchedules['tue_open'] == "05 am" ? 'selected' : '' }}>05 am</option>
                                                <option value="06 am" {{ $listingSchedules['tue_open'] == "06 am" ? 'selected' : '' }}>06 am</option>
                                                <option value="07 am" {{ $listingSchedules['tue_open'] == "07 am" ? 'selected' : '' }}>07 am</option>
                                                <option value="08 am" {{ $listingSchedules['tue_open'] == "08 am" ? 'selected' : '' }}>08 am</option>
                                                <option value="09 am" {{ $listingSchedules['tue_open'] == "09 am" ? 'selected' : '' }}>09 am</option>
                                                <option value="10 am" {{ $listingSchedules['tue_open'] == "10 am" ? 'selected' : '' }}>10 am</option>
                                                <option value="11 am" {{ $listingSchedules['tue_open'] == "11 am" ? 'selected' : '' }}>11 am</option>
                                                <option value="12 pm" {{ $listingSchedules['tue_open'] == "12 pm" ? 'selected' : '' }}>12 pm</option>
                                                <option value="01 pm" {{ $listingSchedules['tue_open'] == "01 pm" ? 'selected' : '' }}>01 pm</option>
                                                <option value="02 pm" {{ $listingSchedules['tue_open'] == "02 pm" ? 'selected' : '' }}>02 pm</option>
                                                <option value="03 pm" {{ $listingSchedules['tue_open'] == "03 pm" ? 'selected' : '' }}>03 pm</option>
                                                <option value="04 pm" {{ $listingSchedules['tue_open'] == "04 pm" ? 'selected' : '' }}>04 pm</option>
                                                <option value="05 pm" {{ $listingSchedules['tue_open'] == "05 pm" ? 'selected' : '' }}>05 pm</option>
                                                <option value="06 pm" {{ $listingSchedules['tue_open'] == "06 pm" ? 'selected' : '' }}>06 pm</option>
                                                <option value="07 pm" {{ $listingSchedules['tue_open'] == "07 pm" ? 'selected' : '' }}>07 pm</option>
                                                <option value="08 pm" {{ $listingSchedules['tue_open'] == "08 pm" ? 'selected' : '' }}>08 pm</option>
                                                <option value="09 pm" {{ $listingSchedules['tue_open'] == "09 pm" ? 'selected' : '' }}>09 pm</option>
                                                <option value="10 pm" {{ $listingSchedules['tue_open'] == "10 pm" ? 'selected' : '' }}>10 pm</option>
                                                <option value="11 pm" {{ $listingSchedules['tue_open'] == "11 pm" ? 'selected' : '' }}>11 pm</option>
                                                <option value="closed" {{ $listingSchedules['tue_open'] == 'closed' ? 'selected' : ''}}>Closed</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-5">
                                            <select class="input-field" name="tuesday_closing">
                                                <option value="" selected>{{__('Closing Time')}}</option>
                                                <option value="12 am" {{ $listingSchedules['tue_close'] == "12 am" ? 'selected' : '' }}>12 am</option>
                                                <option value="01 am" {{ $listingSchedules['tue_close'] == "01 am" ? 'selected' : '' }}>01 am</option>
                                                <option value="02 am" {{ $listingSchedules['tue_close'] == "02 am" ? 'selected' : '' }}>02 am</option>
                                                <option value="03 am" {{ $listingSchedules['tue_close'] == "03 am" ? 'selected' : '' }}>03 am</option>
                                                <option value="04 am" {{ $listingSchedules['tue_close'] == "04 am" ? 'selected' : '' }}>04 am</option>
                                                <option value="05 am" {{ $listingSchedules['tue_close'] == "05 am" ? 'selected' : '' }}>05 am</option>
                                                <option value="06 am" {{ $listingSchedules['tue_close'] == "06 am" ? 'selected' : '' }}>06 am</option>
                                                <option value="07 am" {{ $listingSchedules['tue_close'] == "07 am" ? 'selected' : '' }}>07 am</option>
                                                <option value="08 am" {{ $listingSchedules['tue_close'] == "08 am" ? 'selected' : '' }}>08 am</option>
                                                <option value="09 am" {{ $listingSchedules['tue_close'] == "09 am" ? 'selected' : '' }}>09 am</option>
                                                <option value="10 am" {{ $listingSchedules['tue_close'] == "10 am" ? 'selected' : '' }}>10 am</option>
                                                <option value="11 am" {{ $listingSchedules['tue_close'] == "11 am" ? 'selected' : '' }}>11 am</option>
                                                <option value="12 pm" {{ $listingSchedules['tue_close'] == "12 pm" ? 'selected' : '' }}>12 pm</option>
                                                <option value="01 pm" {{ $listingSchedules['tue_close'] == "01 pm" ? 'selected' : '' }}>01 pm</option>
                                                <option value="02 pm" {{ $listingSchedules['tue_close'] == "02 pm" ? 'selected' : '' }}>02 pm</option>
                                                <option value="03 pm" {{ $listingSchedules['tue_close'] == "03 pm" ? 'selected' : '' }}>03 pm</option>
                                                <option value="04 pm" {{ $listingSchedules['tue_close'] == "04 pm" ? 'selected' : '' }}>04 pm</option>
                                                <option value="05 pm" {{ $listingSchedules['tue_close'] == "05 pm" ? 'selected' : '' }}>05 pm</option>
                                                <option value="06 pm" {{ $listingSchedules['tue_close'] == "06 pm" ? 'selected' : '' }}>06 pm</option>
                                                <option value="07 pm" {{ $listingSchedules['tue_close'] == "07 pm" ? 'selected' : '' }}>07 pm</option>
                                                <option value="08 pm" {{ $listingSchedules['tue_close'] == "08 pm" ? 'selected' : '' }}>08 pm</option>
                                                <option value="09 pm" {{ $listingSchedules['tue_close'] == "09 pm" ? 'selected' : '' }}>09 pm</option>
                                                <option value="10 pm" {{ $listingSchedules['tue_close'] == "10 pm" ? 'selected' : '' }}>10 pm</option>
                                                <option value="11 pm" {{ $listingSchedules['tue_close'] == "11 pm" ? 'selected' : '' }}>11 pm</option>
                                                <option value="closed" {{ $listingSchedules['tue_close'] == 'closed' ? 'selected' : ''}}>Closed</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Wednesday') }} *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <select class="input-field" name="wednesday_opening">
                                                <option value="" selected>{{__('Opening Time')}}</option>
                                                <option value="12 am" {{ $listingSchedules['wed_open'] == "12 am" ? 'selected' : '' }}>12 am</option>
                                                <option value="01 am" {{ $listingSchedules['wed_open'] == "01 am" ? 'selected' : '' }}>01 am</option>
                                                <option value="02 am" {{ $listingSchedules['wed_open'] == "02 am" ? 'selected' : '' }}>02 am</option>
                                                <option value="03 am" {{ $listingSchedules['wed_open'] == "03 am" ? 'selected' : '' }}>03 am</option>
                                                <option value="04 am" {{ $listingSchedules['wed_open'] == "04 am" ? 'selected' : '' }}>04 am</option>
                                                <option value="05 am" {{ $listingSchedules['wed_open'] == "05 am" ? 'selected' : '' }}>05 am</option>
                                                <option value="06 am" {{ $listingSchedules['wed_open'] == "06 am" ? 'selected' : '' }}>06 am</option>
                                                <option value="07 am" {{ $listingSchedules['wed_open'] == "07 am" ? 'selected' : '' }}>07 am</option>
                                                <option value="08 am" {{ $listingSchedules['wed_open'] == "08 am" ? 'selected' : '' }}>08 am</option>
                                                <option value="09 am" {{ $listingSchedules['wed_open'] == "09 am" ? 'selected' : '' }}>09 am</option>
                                                <option value="10 am" {{ $listingSchedules['wed_open'] == "10 am" ? 'selected' : '' }}>10 am</option>
                                                <option value="11 am" {{ $listingSchedules['wed_open'] == "11 am" ? 'selected' : '' }}>11 am</option>
                                                <option value="12 pm" {{ $listingSchedules['wed_open'] == "12 pm" ? 'selected' : '' }}>12 pm</option>
                                                <option value="01 pm" {{ $listingSchedules['wed_open'] == "01 pm" ? 'selected' : '' }}>01 pm</option>
                                                <option value="02 pm" {{ $listingSchedules['wed_open'] == "02 pm" ? 'selected' : '' }}>02 pm</option>
                                                <option value="03 pm" {{ $listingSchedules['wed_open'] == "03 pm" ? 'selected' : '' }}>03 pm</option>
                                                <option value="04 pm" {{ $listingSchedules['wed_open'] == "04 pm" ? 'selected' : '' }}>04 pm</option>
                                                <option value="05 pm" {{ $listingSchedules['wed_open'] == "05 pm" ? 'selected' : '' }}>05 pm</option>
                                                <option value="06 pm" {{ $listingSchedules['wed_open'] == "06 pm" ? 'selected' : '' }}>06 pm</option>
                                                <option value="07 pm" {{ $listingSchedules['wed_open'] == "07 pm" ? 'selected' : '' }}>07 pm</option>
                                                <option value="08 pm" {{ $listingSchedules['wed_open'] == "08 pm" ? 'selected' : '' }}>08 pm</option>
                                                <option value="09 pm" {{ $listingSchedules['wed_open'] == "09 pm" ? 'selected' : '' }}>09 pm</option>
                                                <option value="10 pm" {{ $listingSchedules['wed_open'] == "10 pm" ? 'selected' : '' }}>10 pm</option>
                                                <option value="11 pm" {{ $listingSchedules['wed_open'] == "11 pm" ? 'selected' : '' }}>11 pm</option>
                                                <option value="closed" {{ $listingSchedules['wed_open'] == 'closed' ? 'selected' : ''}}>Closed</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-5">
                                            <select class="input-field" name="wednesday_closing">
                                                <option value="" selected>{{__('Closing Time')}}</option>
                                                <option value="12 am" {{ $listingSchedules['wed_close'] == "12 am" ? 'selected' : '' }}>12 am</option>
                                                <option value="01 am" {{ $listingSchedules['wed_close'] == "01 am" ? 'selected' : '' }}>01 am</option>
                                                <option value="02 am" {{ $listingSchedules['wed_close'] == "02 am" ? 'selected' : '' }}>02 am</option>
                                                <option value="03 am" {{ $listingSchedules['wed_close'] == "03 am" ? 'selected' : '' }}>03 am</option>
                                                <option value="04 am" {{ $listingSchedules['wed_close'] == "04 am" ? 'selected' : '' }}>04 am</option>
                                                <option value="05 am" {{ $listingSchedules['wed_close'] == "05 am" ? 'selected' : '' }}>05 am</option>
                                                <option value="06 am" {{ $listingSchedules['wed_close'] == "06 am" ? 'selected' : '' }}>06 am</option>
                                                <option value="07 am" {{ $listingSchedules['wed_close'] == "07 am" ? 'selected' : '' }}>07 am</option>
                                                <option value="08 am" {{ $listingSchedules['wed_close'] == "08 am" ? 'selected' : '' }}>08 am</option>
                                                <option value="09 am" {{ $listingSchedules['wed_close'] == "09 am" ? 'selected' : '' }}>09 am</option>
                                                <option value="10 am" {{ $listingSchedules['wed_close'] == "10 am" ? 'selected' : '' }}>10 am</option>
                                                <option value="11 am" {{ $listingSchedules['wed_close'] == "11 am" ? 'selected' : '' }}>11 am</option>
                                                <option value="12 pm" {{ $listingSchedules['wed_close'] == "12 pm" ? 'selected' : '' }}>12 pm</option>
                                                <option value="01 pm" {{ $listingSchedules['wed_close'] == "01 pm" ? 'selected' : '' }}>01 pm</option>
                                                <option value="02 pm" {{ $listingSchedules['wed_close'] == "02 pm" ? 'selected' : '' }}>02 pm</option>
                                                <option value="03 pm" {{ $listingSchedules['wed_close'] == "03 pm" ? 'selected' : '' }}>03 pm</option>
                                                <option value="04 pm" {{ $listingSchedules['wed_close'] == "04 pm" ? 'selected' : '' }}>04 pm</option>
                                                <option value="05 pm" {{ $listingSchedules['wed_close'] == "05 pm" ? 'selected' : '' }}>05 pm</option>
                                                <option value="06 pm" {{ $listingSchedules['wed_close'] == "06 pm" ? 'selected' : '' }}>06 pm</option>
                                                <option value="07 pm" {{ $listingSchedules['wed_close'] == "07 pm" ? 'selected' : '' }}>07 pm</option>
                                                <option value="08 pm" {{ $listingSchedules['wed_close'] == "08 pm" ? 'selected' : '' }}>08 pm</option>
                                                <option value="09 pm" {{ $listingSchedules['wed_close'] == "09 pm" ? 'selected' : '' }}>09 pm</option>
                                                <option value="10 pm" {{ $listingSchedules['wed_close'] == "10 pm" ? 'selected' : '' }}>10 pm</option>
                                                <option value="11 pm" {{ $listingSchedules['wed_close'] == "11 pm" ? 'selected' : '' }}>11 pm</option>
                                                <option value="closed" {{ $listingSchedules['wed_close'] == 'closed' ? 'selected' : ''}}>Closed</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Thursday') }} *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <select class="input-field" name="thursday_opening">
                                                <option value="" selected>{{__('Opening Time')}}</option>
                                                <option value="12 am" {{ $listingSchedules['thu_open'] == "12 am" ? 'selected' : '' }}>12 am</option>
                                                <option value="01 am" {{ $listingSchedules['thu_open'] == "01 am" ? 'selected' : '' }}>01 am</option>
                                                <option value="02 am" {{ $listingSchedules['thu_open'] == "02 am" ? 'selected' : '' }}>02 am</option>
                                                <option value="03 am" {{ $listingSchedules['thu_open'] == "03 am" ? 'selected' : '' }}>03 am</option>
                                                <option value="04 am" {{ $listingSchedules['thu_open'] == "04 am" ? 'selected' : '' }}>04 am</option>
                                                <option value="05 am" {{ $listingSchedules['thu_open'] == "05 am" ? 'selected' : '' }}>05 am</option>
                                                <option value="06 am" {{ $listingSchedules['thu_open'] == "06 am" ? 'selected' : '' }}>06 am</option>
                                                <option value="07 am" {{ $listingSchedules['thu_open'] == "07 am" ? 'selected' : '' }}>07 am</option>
                                                <option value="08 am" {{ $listingSchedules['thu_open'] == "08 am" ? 'selected' : '' }}>08 am</option>
                                                <option value="09 am" {{ $listingSchedules['thu_open'] == "09 am" ? 'selected' : '' }}>09 am</option>
                                                <option value="10 am" {{ $listingSchedules['thu_open'] == "10 am" ? 'selected' : '' }}>10 am</option>
                                                <option value="11 am" {{ $listingSchedules['thu_open'] == "11 am" ? 'selected' : '' }}>11 am</option>
                                                <option value="12 pm" {{ $listingSchedules['thu_open'] == "12 pm" ? 'selected' : '' }}>12 pm</option>
                                                <option value="01 pm" {{ $listingSchedules['thu_open'] == "01 pm" ? 'selected' : '' }}>01 pm</option>
                                                <option value="02 pm" {{ $listingSchedules['thu_open'] == "02 pm" ? 'selected' : '' }}>02 pm</option>
                                                <option value="03 pm" {{ $listingSchedules['thu_open'] == "03 pm" ? 'selected' : '' }}>03 pm</option>
                                                <option value="04 pm" {{ $listingSchedules['thu_open'] == "04 pm" ? 'selected' : '' }}>04 pm</option>
                                                <option value="05 pm" {{ $listingSchedules['thu_open'] == "05 pm" ? 'selected' : '' }}>05 pm</option>
                                                <option value="06 pm" {{ $listingSchedules['thu_open'] == "06 pm" ? 'selected' : '' }}>06 pm</option>
                                                <option value="07 pm" {{ $listingSchedules['thu_open'] == "07 pm" ? 'selected' : '' }}>07 pm</option>
                                                <option value="08 pm" {{ $listingSchedules['thu_open'] == "08 pm" ? 'selected' : '' }}>08 pm</option>
                                                <option value="09 pm" {{ $listingSchedules['thu_open'] == "09 pm" ? 'selected' : '' }}>09 pm</option>
                                                <option value="10 pm" {{ $listingSchedules['thu_open'] == "10 pm" ? 'selected' : '' }}>10 pm</option>
                                                <option value="11 pm" {{ $listingSchedules['thu_open'] == "11 pm" ? 'selected' : '' }}>11 pm</option>
                                                <option value="closed" {{ $listingSchedules['thu_open'] == 'closed' ? 'selected' : ''}}>Closed</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-5">
                                            <select class="input-field" name="thursday_closing">
                                                <option value="" selected>{{__('Closing Time')}}</option>
                                                <option value="12 am" {{ $listingSchedules['thu_close'] == "12 am" ? 'selected' : '' }}>12 am</option>
                                                <option value="01 am" {{ $listingSchedules['thu_close'] == "01 am" ? 'selected' : '' }}>01 am</option>
                                                <option value="02 am" {{ $listingSchedules['thu_close'] == "02 am" ? 'selected' : '' }}>02 am</option>
                                                <option value="03 am" {{ $listingSchedules['thu_close'] == "03 am" ? 'selected' : '' }}>03 am</option>
                                                <option value="04 am" {{ $listingSchedules['thu_close'] == "04 am" ? 'selected' : '' }}>04 am</option>
                                                <option value="05 am" {{ $listingSchedules['thu_close'] == "05 am" ? 'selected' : '' }}>05 am</option>
                                                <option value="06 am" {{ $listingSchedules['thu_close'] == "06 am" ? 'selected' : '' }}>06 am</option>
                                                <option value="07 am" {{ $listingSchedules['thu_close'] == "07 am" ? 'selected' : '' }}>07 am</option>
                                                <option value="08 am" {{ $listingSchedules['thu_close'] == "08 am" ? 'selected' : '' }}>08 am</option>
                                                <option value="09 am" {{ $listingSchedules['thu_close'] == "09 am" ? 'selected' : '' }}>09 am</option>
                                                <option value="10 am" {{ $listingSchedules['thu_close'] == "10 am" ? 'selected' : '' }}>10 am</option>
                                                <option value="11 am" {{ $listingSchedules['thu_close'] == "11 am" ? 'selected' : '' }}>11 am</option>
                                                <option value="12 pm" {{ $listingSchedules['thu_close'] == "12 pm" ? 'selected' : '' }}>12 pm</option>
                                                <option value="01 pm" {{ $listingSchedules['thu_close'] == "01 pm" ? 'selected' : '' }}>01 pm</option>
                                                <option value="02 pm" {{ $listingSchedules['thu_close'] == "02 pm" ? 'selected' : '' }}>02 pm</option>
                                                <option value="03 pm" {{ $listingSchedules['thu_close'] == "03 pm" ? 'selected' : '' }}>03 pm</option>
                                                <option value="04 pm" {{ $listingSchedules['thu_close'] == "04 pm" ? 'selected' : '' }}>04 pm</option>
                                                <option value="05 pm" {{ $listingSchedules['thu_close'] == "05 pm" ? 'selected' : '' }}>05 pm</option>
                                                <option value="06 pm" {{ $listingSchedules['thu_close'] == "06 pm" ? 'selected' : '' }}>06 pm</option>
                                                <option value="07 pm" {{ $listingSchedules['thu_close'] == "07 pm" ? 'selected' : '' }}>07 pm</option>
                                                <option value="08 pm" {{ $listingSchedules['thu_close'] == "08 pm" ? 'selected' : '' }}>08 pm</option>
                                                <option value="09 pm" {{ $listingSchedules['thu_close'] == "09 pm" ? 'selected' : '' }}>09 pm</option>
                                                <option value="10 pm" {{ $listingSchedules['thu_close'] == "10 pm" ? 'selected' : '' }}>10 pm</option>
                                                <option value="11 pm" {{ $listingSchedules['thu_close'] == "11 pm" ? 'selected' : '' }}>11 pm</option>
                                                <option value="closed" {{ $listingSchedules['thu_close'] == 'closed' ? 'selected' : ''}}>Closed</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Friday') }} *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <select class="input-field" name="friday_opening">
                                                <option value="" selected>{{__('Opening Time')}}</option>
                                                <option value="12 am" {{ $listingSchedules['fri_open'] == "12 am" ? 'selected' : '' }}>12 am</option>
                                                <option value="01 am" {{ $listingSchedules['fri_open'] == "01 am" ? 'selected' : '' }}>01 am</option>
                                                <option value="02 am" {{ $listingSchedules['fri_open'] == "02 am" ? 'selected' : '' }}>02 am</option>
                                                <option value="03 am" {{ $listingSchedules['fri_open'] == "03 am" ? 'selected' : '' }}>03 am</option>
                                                <option value="04 am" {{ $listingSchedules['fri_open'] == "04 am" ? 'selected' : '' }}>04 am</option>
                                                <option value="05 am" {{ $listingSchedules['fri_open'] == "05 am" ? 'selected' : '' }}>05 am</option>
                                                <option value="06 am" {{ $listingSchedules['fri_open'] == "06 am" ? 'selected' : '' }}>06 am</option>
                                                <option value="07 am" {{ $listingSchedules['fri_open'] == "07 am" ? 'selected' : '' }}>07 am</option>
                                                <option value="08 am" {{ $listingSchedules['fri_open'] == "08 am" ? 'selected' : '' }}>08 am</option>
                                                <option value="09 am" {{ $listingSchedules['fri_open'] == "09 am" ? 'selected' : '' }}>09 am</option>
                                                <option value="10 am" {{ $listingSchedules['fri_open'] == "10 am" ? 'selected' : '' }}>10 am</option>
                                                <option value="11 am" {{ $listingSchedules['fri_open'] == "11 am" ? 'selected' : '' }}>11 am</option>
                                                <option value="12 pm" {{ $listingSchedules['fri_open'] == "12 pm" ? 'selected' : '' }}>12 pm</option>
                                                <option value="01 pm" {{ $listingSchedules['fri_open'] == "01 pm" ? 'selected' : '' }}>01 pm</option>
                                                <option value="02 pm" {{ $listingSchedules['fri_open'] == "02 pm" ? 'selected' : '' }}>02 pm</option>
                                                <option value="03 pm" {{ $listingSchedules['fri_open'] == "03 pm" ? 'selected' : '' }}>03 pm</option>
                                                <option value="04 pm" {{ $listingSchedules['fri_open'] == "04 pm" ? 'selected' : '' }}>04 pm</option>
                                                <option value="05 pm" {{ $listingSchedules['fri_open'] == "05 pm" ? 'selected' : '' }}>05 pm</option>
                                                <option value="06 pm" {{ $listingSchedules['fri_open'] == "06 pm" ? 'selected' : '' }}>06 pm</option>
                                                <option value="07 pm" {{ $listingSchedules['fri_open'] == "07 pm" ? 'selected' : '' }}>07 pm</option>
                                                <option value="08 pm" {{ $listingSchedules['fri_open'] == "08 pm" ? 'selected' : '' }}>08 pm</option>
                                                <option value="09 pm" {{ $listingSchedules['fri_open'] == "09 pm" ? 'selected' : '' }}>09 pm</option>
                                                <option value="10 pm" {{ $listingSchedules['fri_open'] == "10 pm" ? 'selected' : '' }}>10 pm</option>
                                                <option value="11 pm" {{ $listingSchedules['fri_open'] == "11 pm" ? 'selected' : '' }}>11 pm</option>
                                                <option value="closed" {{ $listingSchedules['fri_open'] == 'closed' ? 'selected' : ''}}>Closed</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-5">
                                            <select class="input-field" name="friday_closing">
                                                <option value="" selected>{{__('Closing Time')}}</option>
                                                <option value="12 am" {{ $listingSchedules['fri_close'] == "12 am" ? 'selected' : '' }}>12 am</option>
                                                <option value="01 am" {{ $listingSchedules['fri_close'] == "01 am" ? 'selected' : '' }}>01 am</option>
                                                <option value="02 am" {{ $listingSchedules['fri_close'] == "02 am" ? 'selected' : '' }}>02 am</option>
                                                <option value="03 am" {{ $listingSchedules['fri_close'] == "03 am" ? 'selected' : '' }}>03 am</option>
                                                <option value="04 am" {{ $listingSchedules['fri_close'] == "04 am" ? 'selected' : '' }}>04 am</option>
                                                <option value="05 am" {{ $listingSchedules['fri_close'] == "05 am" ? 'selected' : '' }}>05 am</option>
                                                <option value="06 am" {{ $listingSchedules['fri_close'] == "06 am" ? 'selected' : '' }}>06 am</option>
                                                <option value="07 am" {{ $listingSchedules['fri_close'] == "07 am" ? 'selected' : '' }}>07 am</option>
                                                <option value="08 am" {{ $listingSchedules['fri_close'] == "08 am" ? 'selected' : '' }}>08 am</option>
                                                <option value="09 am" {{ $listingSchedules['fri_close'] == "09 am" ? 'selected' : '' }}>09 am</option>
                                                <option value="10 am" {{ $listingSchedules['fri_close'] == "10 am" ? 'selected' : '' }}>10 am</option>
                                                <option value="11 am" {{ $listingSchedules['fri_close'] == "11 am" ? 'selected' : '' }}>11 am</option>
                                                <option value="12 pm" {{ $listingSchedules['fri_close'] == "12 pm" ? 'selected' : '' }}>12 pm</option>
                                                <option value="01 pm" {{ $listingSchedules['fri_close'] == "01 pm" ? 'selected' : '' }}>01 pm</option>
                                                <option value="02 pm" {{ $listingSchedules['fri_close'] == "02 pm" ? 'selected' : '' }}>02 pm</option>
                                                <option value="03 pm" {{ $listingSchedules['fri_close'] == "03 pm" ? 'selected' : '' }}>03 pm</option>
                                                <option value="04 pm" {{ $listingSchedules['fri_close'] == "04 pm" ? 'selected' : '' }}>04 pm</option>
                                                <option value="05 pm" {{ $listingSchedules['fri_close'] == "05 pm" ? 'selected' : '' }}>05 pm</option>
                                                <option value="06 pm" {{ $listingSchedules['fri_close'] == "06 pm" ? 'selected' : '' }}>06 pm</option>
                                                <option value="07 pm" {{ $listingSchedules['fri_close'] == "07 pm" ? 'selected' : '' }}>07 pm</option>
                                                <option value="08 pm" {{ $listingSchedules['fri_close'] == "08 pm" ? 'selected' : '' }}>08 pm</option>
                                                <option value="09 pm" {{ $listingSchedules['fri_close'] == "09 pm" ? 'selected' : '' }}>09 pm</option>
                                                <option value="10 pm" {{ $listingSchedules['fri_close'] == "10 pm" ? 'selected' : '' }}>10 pm</option>
                                                <option value="11 pm" {{ $listingSchedules['fri_close'] == "11 pm" ? 'selected' : '' }}>11 pm</option>
                                                <option value="closed" {{ $listingSchedules['fri_close'] == 'closed' ? 'selected' : ''}}>Closed</option>
                                            </select>
                                        </div>
                                    </div>

                                    <ul class="list-inline mt-3 mb-0  text-center">
                                        <li class="list-inline-item">
                                            <a href="javascript:;" data-href=".media" class="next-prev btn btn-primary"> {{ __('Prev') }} </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:;" data-href=".contact" class="next-prev btn btn-primary"> {{ __('Next') }} </a>
                                        </li>
                                    </ul>

                                </div>

                                <div id="contact" class="container tab-pane"><br>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Website') }}</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-9">
                                            <input type="text" class="input-field" id="inp-website" name="website" placeholder="{{ __('Website') }}" value="{{ $data->website }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Email') }}</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-9">
                                            <input type="text" class="input-field" name="email" placeholder="{{ __('Email') }}" value="{{ $data->email }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Phone number') }}</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-9">
                                            <input type="text" class="input-field" name="phone_number" placeholder="{{ __('Phone number') }}" value="{{ $data->phone_number }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Facebook') }}</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-9">
                                            <input type="text" class="input-field" name="facebook" placeholder="{{ __('Facebook') }}" value="{{ $data->facebook }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Twitter') }}</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-9">
                                            <input type="text" class="input-field" name="twitter" placeholder="{{ __('Twitter') }}" value="{{ $data->twitter }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading">{{ __('Linkedin') }}</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-9">
                                            <input type="text" class="input-field" name="linkedin" placeholder="{{ __('Linkedin') }}" value="{{ $data->linkedin }}">
                                        </div>
                                    </div>

                                    <ul class="list-inline mt-3 mb-0  text-center">
                                        <li class="list-inline-item">
                                            <a href="javascript:;" data-href=".schedule" class="next-prev btn btn-primary"> {{ __('Prev') }} </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:;" data-href=".dynamic" class="next-prev btn btn-primary"> {{ __('Next') }} </a>
                                        </li>
                                    </ul>

                                </div>

                                <div id="dynamic" class="container tab-pane"><br>
                                    @if (request()->type == 'restaurant')
                                        <div class="menu-section-area">
                                            @includeIf('partials.admin.listing.menu',['menus' => $menus])
                                        </div>

                                        <div class="row my-2">
                                            <div class="col-lg-12 text-center">
                                                <a href="javascript:;" id="menud-add-btn" class="btn btn-info"><i class="fa fa-plus"></i> {{__('Add More')}}</a>
                                            </div>
                                        </div>
                                    @endif

                                    @if (request()->type == 'hotel')
                                        <div class="room-section-area">
                                            @includeIf('partials.admin.listing.room',['rooms'=> $rooms])
                                        </div>

                                        <div class="row my-2">
                                            <div class="col-lg-12 text-center">
                                                <a href="javascript:;" id="room-add-btn" class="btn btn-info"><i class="fa fa-plus"></i> {{__('Add More')}}</a>
                                            </div>
                                        </div>
                                    @endif

                                    @if (request()->type == 'beauty')
                                        <div class="beauty-section-area">
                                            @includeIf('partials.admin.listing.beauty',['beauties'=> $beauties])
                                        </div>

                                        <div class="row my-2">
                                            <div class="col-lg-12 text-center">
                                                <a href="javascript:;" id="beauty-add-btn" class="btn btn-info"><i class="fa fa-plus"></i> {{__('Add More')}}</a>
                                            </div>
                                        </div>
                                    @endif

                                    @if (request()->type == 'real_estate')
                                        @includeIf('partials.admin.listing.real_estate')
                                    @endif

                                    @if (request()->type == 'car')
                                        @includeIf('partials.admin.listing.car')
                                    @endif

                                    <ul class="list-inline mt-3 mb-0  text-center">
                                        <li class="list-inline-item">
                                            <a href="javascript:;" data-href=".contact" class="next-prev btn btn-primary"> {{ __('Prev') }} </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:;" data-href=".faq" class="next-prev btn btn-primary"> {{ __('Next') }} </a>
                                        </li>
                                    </ul>

                                </div>

                                <div id="faq" class="container tab-pane"><br>
                                    <div class="faq-section-area">
                                        @includeIf('partials.admin.listing.faq')
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
</div>

<div class="modal fade dynamic-modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="dynamicModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">{{ __("Confirm Delete") }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="text-center">{{__("You are about to delete this Item. Every informtation under this item will be deleted.")}}</p>
				<p class="text-center">{{ __("Do you want to proceed?") }}</p>
			</div>
			<div class="modal-footer">
				<a href="javascript:;" class="btn btn-secondary" data-dismiss="modal">{{ __("Cancel") }}</a>
				<a href="javascript:;" class="btn btn-danger btn-ok">{{ __("Delete") }}</a>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="setgallery" tabindex="-1" role="dialog" aria-labelledby="setgallery" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('Image Gallery') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="top-area">
                <div class="row">
                    <div class="col-sm-6 text-right">
                        <div class="upload-img-btn">
                            <form  method="POST" enctype="multipart/form-data" id="form-gallery">
                                {{ csrf_field() }}
                                <input type="hidden" id="listing_id" name="listing_id" value="{{ $data->id }}">
                                <input type="file" name="gallery[]" class="hidden" id="property_upload_gallery_edit" accept="image/*" multiple>
                                <label id="property_gallery_edit"><i class="icofont-upload-alt"></i>{{ __("Upload File") }}</label>
                            </form>
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

@section('scripts')
<script src="{{ asset('assets/admin/js/image_gallary.js') }}"></script>
<script>
    'use strict';
    @if(isset($menus))
        let menuId = '{{ count($menus) >0 ? count($menus) : 1}}';
        $('#menud-add-btn').on('click',function(){
            $('.menu-section-area').append(''+
                `<div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('Menu Items') }}</h6>
                        <button class="border-0"><i class="fas fa-trash-alt text-danger"></i></button>
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
                                        <div class="back-preview-image" style="background-image: url({{ asset('assets/images/placeholder.jpg') }});"></div>
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
    @endif

    @if(isset($rooms))
        let roomId = '{{ count($rooms) >0 ? count($rooms) : 1}}';
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
    @endif

    @if(isset($beauties))
        let beautyId = '{{ count($beauties) >0 ? count($beauties) : 1}}';
        $('#beauty-add-btn').on('click',function(){
            $('.beauty-section-area').append(''+
                `<div class="card mb-4">
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
    @endif

    @if(isset($faqs))
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
    @endif

</script>

@endsection
