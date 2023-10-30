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
            <i class="fas fa-bars me-2"></i>@lang('Listing')
        </a>
        <div class="collapse" id="MobNav">
            @includeIf('partials.user.sidebar')
        </div>

        <div class="dashboard-content">
            <div class="dashboard-tlbar d-block mb-5">
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12">
                        <h1 class="ft-medium">@lang('Hello'), {{ auth()->user()->name }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-muted"><a href="{{ route('front.index') }}">@lang('Home')</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}" class="theme-cl">@lang('Dashboard')</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">

                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="dsd-boxed-widget py-5 px-4 bg-danger rounded">
                            <h2 class="ft-medium mb-1 fs-xl text-light count">{{ $active_listings }}</h2>
                            <p class="p-0 m-0 text-light fs-md">@lang('Active Listings')</p>
                            <i class="lni lni-empty-file"></i>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="dsd-boxed-widget py-5 px-4 bg-success rounded">
                            <h2 class="ft-medium mb-1 fs-xl text-light count">{{ $view_listings }}</h2>
                            <p class="p-0 m-0 text-light fs-md">@lang('Views Listing')</p>
                            <i class="lni lni-eye"></i>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="dsd-boxed-widget py-5 px-4 bg-warning rounded">
                            <h2 class="ft-medium mb-1 fs-xl text-light count">{{ $total_reviews }}</h2>
                            <p class="p-0 m-0 text-light fs-md">@lang('Total Reviews')</p>
                            <i class="lni lni-comments"></i>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="dsd-boxed-widget py-5 px-4 bg-purple rounded">
                            <h2 class="ft-medium mb-1 fs-xl text-light count">{{ $total_bookings }}</h2>
                            <p class="p-0 m-0 text-light fs-md">@lang('Total Bookings')</p>
                            <i class="lni lni-wallet"></i>
                        </div>
                    </div>
                </div>

                <!-- row -->
                <div class="row">

                    <!-- Area Chart -->
                    <div class="col-md-8 col-sm-12">
                        <div class="dashboard-grouping-list invoices with-icons">
                            <h4>@lang('Subscriptiona')</h4>
                            <ul>
                                @if (count($subscriptions) == 0)
                                    <li>
                                        <p>@lang('No Subscription Found')</p>
                                    </li>
                                @else
                                    @foreach ($subscriptions as $key=> $data)
                                        <li>
                                            <i class="dsd-icon-uiyo ti-files text-{{ $data->status == 1 ? 'success':'pending'}} bg-light-{{ $data->status == 1 ? 'success':'pending'}}"></i>
                                            <strong>{{ $data->plan->title }} Plan</strong>
                                            <ul>
                                                @if ($data->status == 1)
                                                    <li class="paid">@lang('paid')</li>
                                                @else
                                                    <li class="pending">@lang('pending')</li>
                                                @endif
                                                <li>@lang('Order No'): #{{ $data->subscription_number }}</li>
                                                <li>@lang('Date'): {{ $data->created_at->format('d M Y') }}</li>
                                            </ul>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>

                    <!-- Donut Chart -->
                    <div class="col-md-4 col-sm-12">
                        <div class="dash-card">
                            <div class="dash-card-header">
                                <h4>Followers</h4>
                            </div>
                            @if (count($followers) == 0)
                                <div class="ground-list ground-hover-list">
                                    <div class="ground ground-list-single">
                                        <p>@lang('No Follower Found')</p>
                                    </div>
                                </div>
                            @else
                                @foreach ($followers as $key=>$data)
                                    <div class="ground-list ground-hover-list">
                                        <div class="ground ground-list-single">
                                            <a href="#">
                                                <img class="ground-avatar" src="{{ asset('assets/images/'.$data->user->photo)}}" alt="...">
                                                <span class="profile-status bg-online pull-right"></span>
                                            </a>

                                            <div class="ground-content">
                                                <h6><a href="#">{{ $data->user->name }}</a></h6>
                                                <small class="text-fade"><i class="fas fa-map-marker-alt me-1"></i>{{ $data->user->address }}</small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                </div>
                <!-- /.row -->


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
    <!-- Morris.js charts -->
    <script src="{{ asset('assets/front/js/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{ asset('assets/front/js/plugins/morris.js/morris.min.js')}}"></script>

    <!-- Custom Chart JavaScript -->
    <script src="{{ asset('assets/front/js/plugins/dashboard-2.js')}}"></script>
    <!-- ============================================================== -->

    <script>
      'use strict';

      function myFunction() {
        var copyText = document.getElementById("cronjobURL");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
        $.notify("Referral url copied", "info");
    }
    </script>
@endpush
