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
                            <li class="breadcrumb-item"><a href="{{ route('front.index') }}" class="text-light">@lang('Home')</a></li>
                            <li class="breadcrumb-item active theme-cl" aria-current="page">@lang('Error Page')</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= Top Breadcrubms ======================== -->

    <!-- ======================= Product Detail ======================== -->
    <section>
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">

                    <!-- Icon -->
                    <div class=""><img src="{{ asset('assets/images/'.$gs->error_photo)}}" class="img-fluid" alt="" /></div>
                    <!-- Heading -->
                    <h1 class="mb-3 ft-bold">{{ $gs->error_title }}</h1>
                    <!-- Text -->
                    <h5 class="ft-medium fs-md mb-5">{{ $gs->error_text }}</h5>
                    <!-- Button -->
                    <a class="btn rounded theme-bg text-light" href="{{ route('front.index') }}">@lang('Go To Home Page')</a>
                </div>
            </div>

        </div>
    </section>
    <!-- ======================= Product Detail End ======================== -->

    <!-- ======================= Newsletter Start ============================ -->

    <!-- ======================= Newsletter Start ============================ -->
@endsection

@push('js')

@endpush
