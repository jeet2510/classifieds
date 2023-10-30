@extends('layouts.front')

@push('css')

@endpush

@section('title')

@endsection

@section('content')
    <!-- =============================== Dashboard Header ========================== -->
    @includeIf('partials.user.header')
    <!-- =============================== Dashboard Header ========================== -->

    <!-- ======================= dashboard Detail ======================== -->
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
                        <h1 class="ft-medium">@lang('Profile Info')</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-muted"><a href="{{ route('front.index') }}">@lang('Home')</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('user.profile.index') }}" class="theme-cl">@lang('My Profile')</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">
                <form class="submit-form" action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @includeIf('includes.flash')
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 order-xl-last order-lg-last order-md-last">
                            <div class="d-flex bg-white rounded px-3 py-3 mb-3">
                                <div class="dash-figure">
                                    <div class="dash-figure-thumb">
                                        <img src="{{ auth()->user()->photo ? asset('assets/images/'.auth()->user()->photo) : asset('assets/front/img/t-4.png') }}" class="img-fluid rounded" alt="" />
                                    </div>
                                    <div class="upload-photo-btn">
                                        <div class="Uploadphoto">
                                            <span><i class="fas fa-upload"></i> @lang('Upload Photo')</span>
                                            <input type="file" name="photo" id="profile-image-upload" class="upload">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex bg-white rounded px-3 py-3 mb-3">
                                <div class="dash-figure">
                                    <div class="dash-figure-breadcumb">
                                        <img src="{{ auth()->user()->breadcumb ? asset('assets/images/'.auth()->user()->breadcumb) : asset('assets/front/img/t-4.png') }}" class="img-fluid rounded" alt="" />
                                    </div>
                                    <div class="upload-breadcumb-btn">
                                        <div class="Uploadphoto">
                                            <span><i class="fas fa-upload"></i> @lang('Upload Breadcumb')</span>
                                            <input type="file" name="breadcumb" id="profile-breadcumb-upload" class="upload">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12">
                            <div class="dashboard-list-wraps bg-white rounded mb-4">
                                <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                    <div class="dashboard-list-wraps-flx">
                                        <h4 class="mb-0 ft-medium fs-md"><i class="fa fa-user-check me-2 theme-cl fs-sm"></i>@lang('My Profile')</h4>
                                    </div>
                                </div>

                                <div class="dashboard-list-wraps-body py-3 px-3">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">@lang('Name')</label>
                                                <input type="text" name="" class="form-control rounded" placeholder="Amit Kumar" value="{{ $user->name }}"/>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">@lang('Email')</label>
                                                <input type="text" class="form-control rounded" placeholder="amitkumar@gmail.com" value="{{ $user->email }}" readonly/>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">@lang('Mobile')</label>
                                                <input type="text" class="form-control rounded" placeholder="91 256 584 7895" name="phone" value="{{ $user->phone }}" />
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">@lang('City')</label>
                                                <input type="text" class="form-control rounded" placeholder="London" name="city" value="{{ $user->city }}" />
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">@lang('Zip')</label>
                                                <input type="text" class="form-control rounded" name="zip" value="{{ $user->zip }}" />
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">@lang('Direction')</label>
                                                <input type="text" class="form-control rounded" placeholder="@lang('Direction')" name="direction" value="{{ $user->direction }}" />
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">@lang('Website')</label>
                                                <input type="text" class="form-control rounded" name="website" value="{{ $user->website }}" placeholder="@lang('website')"/>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">@lang('Address')</label>
                                                <input type="text" class="form-control rounded" name="address" value="{{ $user->address }}" placeholder="USA 20TH Berlin Market NY" />
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1">@lang('About Notes')</label>
                                                <textarea class="form-control rounded ht-150" placeholder="Describe your self">{{ $user->about }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dashboard-list-wraps bg-white rounded mb-4">
                                <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                    <div class="dashboard-list-wraps-flx">
                                        <h4 class="mb-0 ft-medium fs-md"><i class="fa fa-user-friends me-2 theme-cl fs-sm"></i>@lang('My Social Links')</h4>
                                    </div>
                                </div>

                                <div class="dashboard-list-wraps-body py-3 px-3">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1"><i class="ti-facebook theme-cl me-1"></i>@lang('Facebook')</label>
                                                <input type="text" class="form-control rounded" placeholder="https://facebook.com/" name="fb_link" value="{{ $user->fb_link }}"/>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1"><i class="ti-twitter theme-cl me-1"></i>@lang('Twitter')</label>
                                                <input type="text" class="form-control rounded" placeholder="https://twitter.com/" name="twitter_link" value="{{ $user->twitter_link }}"/>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1"><i class="ti-instagram theme-cl me-1"></i>@lang('Instagram')</label>
                                                <input type="text" class="form-control rounded" placeholder="https://instagram.com/" name="instagram_link" value="{{ $user->instagram_link }}"/>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="mb-1"><i class="ti-linkedin theme-cl me-1"></i>@lang('Linkedin')</label>
                                                <input type="text" class="form-control rounded" placeholder="https://linkedin.com/" name="linkedin_link" value="{{ $user->linkedin_link }}"/>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn theme-bg rounded text-light">@lang('Save Changes')</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

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

@endsection

@push('js')
<script>
  "use strict"
  var prevImg = $('.dash-figure .dash-figure-thumb').html();
    function proPicURL(input) {
        if (input.files && input.files[0]) {
          var uploadedFile = new FileReader();
          uploadedFile.onload = function (e) {
              var preview = $('.dash-figure').find('.dash-figure-thumb');
              preview.html(`<img src="${e.target.result}" class="img-fluid rounded" alt="user">`);
              preview.addClass('image-loaded');
              preview.hide();
              preview.fadeIn(650);
              $(".image-view").hide();
              $(".remove-thumb").show();
          }
          uploadedFile.readAsDataURL(input.files[0]);
        }
    }

    $("#profile-image-upload").on('change', function () {
        proPicURL(this);
    });

    var prevImg = $('.dash-figure .dash-figure-breadcumb').html();

    function proBreadURL(input) {
        if (input.files && input.files[0]) {
          var uploadedFile = new FileReader();
          uploadedFile.onload = function (e) {
              var preview = $('.dash-figure').find('.dash-figure-breadcumb');
              preview.html(`<img src="${e.target.result}" class="img-fluid rounded" alt="user">`);
              preview.addClass('image-loaded');
              preview.hide();
              preview.fadeIn(650);
              $(".image-view").hide();
              $(".remove-thumb").show();
          }
          uploadedFile.readAsDataURL(input.files[0]);
        }
    }

    $("#profile-breadcumb-upload").on('change', function () {
        proBreadURL(this);
    });

</script>
@endpush
