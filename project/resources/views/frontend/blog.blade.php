@extends('layouts.front')

@push('css')

@endpush

@section('content')
    <!-- ======================= Top Breadcrubms ======================== -->
    <div class="bg-dark py-3">
        <div class="container">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-light">@lang('Home')</a></li>
                            <li class="breadcrumb-item active theme-cl" aria-current="page">@lang('Blog Page')</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= Top Breadcrubms ======================== -->

    <!-- ======================= Blog Start ============================ -->
    <section class="middle">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="sec_title position-relative text-center mb-5">
                        <h6 class="theme-cl mb-0">@lang('Latest Updates')</h6>
                        <h2 class="ft-bold">@lang('View Recent Updates')</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
				@if (count($blogs) == 0)
					<div class="col-12 text-center">
						<h3 class="m-0">{{__('No Blog Found')}}</h3>
					</div>
				@else
                    @foreach ($blogs as $key=>$data)
                        <!-- Single Item -->
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="blg_grid_box">
                                <div class="blg_grid_thumb">
                                    <a href="{{ route('blog.details',$data->slug) }}">
                                        <img src="{{asset('assets/images/'.$data->photo)}}" class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="blg_grid_caption">
                                    <div class="blg_tag">
                                        <span>{{ $data->category->name }}</span>
                                    </div>
                                    <div class="blg_title">
                                        <h4>
                                            <a href="{{ route('blog.details',$data->slug) }}">{{ $data->title }}</a>
                                        </h4>
                                    </div>
                                    <div class="blg_desc">

                                    </div>
                                </div>
                                <div class="crs_grid_foot">
                                    <div class="crs_flex d-flex align-items-center justify-content-between br-top px-3 py-2">
                                        <div class="crs_fl_first">
                                            <div class="crs_tutor">
                                                <div class="crs_tutor_thumb">
                                                    <a href="javascript:void(0);">
                                                        <img src="{{ asset('assets/images/'.getAdmin()->photo) }}" class="img-fluid circle" width="35" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="crs_fl_last">
                                            <div class="foot_list_info">
                                                <ul>
                                                    <li><div class="elsio_ic"><i class="fa fa-eye text-success"></i></div><div class="elsio_tx">{{ $data->views }} @lang('Views')</div></li>
                                                    <li><div class="elsio_ic"><i class="fa fa-clock text-warning"></i></div><div class="elsio_tx">{{ $data->created_at->format('d M Y') }}</div></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
				@endif
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="position-relative text-center">
                        @if($blogs->hasPages())
                            {{ $blogs->links() }}
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ======================= Blog Start ============================ -->

    <!-- ======================= Newsletter Start ============================ -->
        @include('partials.front.cta')
    <!-- ======================= Newsletter Start ============================ -->

    <!-- ============================ Footer Start ================================== -->
    @include('partials.front.footer')
    <!-- ============================ Footer End ================================== -->
@endsection

@push('js')

@endpush
