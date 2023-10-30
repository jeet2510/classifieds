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
                        <h1 class="ft-medium">@lang('Listing Type')</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-muted"><a href="{{ route('front.index') }}">@lang('Home')</a></li>
                                <li class="breadcrumb-item"><a href="#" class="theme-cl">@lang('Add Listing')</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        @if (now()<auth()->user()->plan_end_date)
                            <h3>@lang('You have') {{ auth()->user()->ad_limit }} @lang('directory left to add.')</h3>
                        @else
                            <h3>@lang('Current plan date expired!')</h3>
                        @endif
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <a href="{{ route('user.listing.create',['type'=>'restaurant']) }}">
                            <div class="dsd-boxed-widget py-5 px-4 bg-danger rounded">
                                <p class="p-0 m-0 text-light fs-md">@lang('Restaurant')</p>
                                <i class="lni lni-empty-file"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <a href="{{ route('user.listing.create',['type'=>'hotel']) }}">
                            <div class="dsd-boxed-widget py-5 px-4 bg-success rounded">
                                <p class="p-0 m-0 text-light fs-md">@lang('Hotel')</p>
                                <i class="lni lni-empty-file"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <a href="{{ route('user.listing.create',['type'=>'beauty']) }}">
                            <div class="dsd-boxed-widget py-5 px-4 bg-warning rounded">
                                <p class="p-0 m-0 text-light fs-md">@lang('Beauty')</p>
                                <i class="lni lni-empty-file"></i>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <a href="{{ route('user.listing.create',['type'=>'real_estate']) }}">
                            <div class="dsd-boxed-widget py-5 px-4 bg-purple rounded">
                                <p class="p-0 m-0 text-light fs-md">@lang('Real Estate')</p>
                                <i class="lni lni-empty-file"></i>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <a href="{{ route('user.listing.create',['type'=>'doctor']) }}">
                            <div class="dsd-boxed-widget py-5 px-4 bg-info rounded">
                                <p class="p-0 m-0 text-light fs-md">@lang('Doctor')</p>
                                <i class="lni lni-empty-file"></i>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <a href="{{ route('user.listing.create',['type'=>'car']) }}">
                            <div class="dsd-boxed-widget py-5 px-4 bg-secondary rounded">
                                <p class="p-0 m-0 text-light fs-md">@lang('Car')</p>
                                <i class="lni lni-empty-file"></i>
                            </div>
                        </a>
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
