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
            <div class="dashboard-content">
                <div class="dashboard-tlbar d-block mb-5">
                    <div class="row">
                        <div class="colxl-12 col-lg-12 col-md-12">
                            <h1 class="ft-medium">@lang('Listings Analytics')</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item text-muted"><a href="{{ route('front.index') }}">@lang('Home')</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('user.listing.index') }}" class="theme-cl">@lang('Manage Listings')</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="dashboard-widg-bar d-block">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="dashboard-list-wraps bg-white rounded mb-4">
                                <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                    <div class="dashboard-list-wraps-flx">
                                        <h4 class="mb-0 ft-medium fs-md"><i class="fa fa-file-alt me-2 theme-cl fs-sm"></i>@lang('Listing Statistics')</h4>
                                    </div>
                                </div>

                                <div class="dashboard-list-wraps-body py-3 px-3">
                                    <div class="dashboard-listing-wraps">
                                        @foreach ($listings as $key => $data)
                                            @php
                                                $listing = \App\Models\Listing::findOrFail($data->listing_id);
                                            @endphp
                                            <div class="dsd-single-listing-wraps">
                                                <div class="dsd-single-lst-thumb">
                                                    <img src="{{ asset('assets/images/'.$listing->photo)}}" class="img-fluid" alt="" />
                                                </div>
                                                <div class="dsd-single-lst-caption">
                                                    <div class="dsd-single-lst-title"><h5>{{ $listing->name }}</h5></div>
                                                    <span class="agd-location"><i class="lni lni-map-marker me-1"></i>{{ $listing->real_address }}</span>
                                                    <div class=""><p><strong>@lang('Total views : ')</strong> {{ $data->total }}</p></div>
                                                    <div class="dsd-single-lst-footer">
                                                        <a href="{{ route('user.listing.analytics.details',$listing->id) }}" class="btn btn-view mr-1"><i class="fas fa-eye me-1"></i>@lang('View')</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="position-relative text-center">
                                                @if($listings->hasPages())
                                                    {{ $listings->links() }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
