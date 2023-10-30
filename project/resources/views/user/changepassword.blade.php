@extends('layouts.front')

@push('css')

@endpush

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
                        <h1 class="ft-medium">@lang('Change Password')</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-muted"><a href="{{ route('front.index') }}">@lang('Home')</a></li>
                                <li class="breadcrumb-item"><a href="#" class="theme-cl">@lang('Change Password')</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="_dashboard_content bg-white rounded mb-4">
                            <div class="_dashboard_content_header br-bottom py-3 px-3">
                                <div class="_dashboard__header_flex">
                                    <h4 class="mb-0 ft-medium fs-md"><i class="fa fa-lock me-2 theme-cl fs-sm"></i>@lang("Change Password")</h4>
                                </div>
                            </div>

                            <div class="_dashboard_content_body py-3 px-3">
                                <form class="row submit-form" action="{{ route('user.change.password') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @includeIf('includes.flash')
                                    <div class="col-xl-8 col-lg-9 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>@lang("Old Password")</label>
                                            <input type="password" name="cpass" class="form-control rounded" placeholder="@lang('Current Password')">
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-9 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>@lang("New Password")</label>
                                            <input type="password" name="newpass" class="form-control rounded" placeholder="@lang('New Password')">
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-9 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>@lang("Confirm Password")</label>
                                            <input type="password" name="renewpass" class="form-control rounded" placeholder="@lang('Confirm Password')">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-md ft-medium text-light rounded theme-bg">@lang("Save Changes")</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
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

@endsection

@push('js')

@endpush
