@extends('layouts.front')

@push('css')

@endpush

@section('content')
    <!-- ======================= Top Breadcrubms ======================== -->
    <div class="gray py-3">
        <div class="container">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">@lang('Home')</a></li>
                            <li class="breadcrumb-item"><a href="#">@lang('Pages')</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= Top Breadcrubms ======================== -->

			<!-- ======================= About Us Detail ======================== -->
			<section class="middle">
				<div class="container">
					<div class="row align-items-center justify-content-between">

						<div class="col-xl-11 col-lg-12 col-md-6 col-sm-12">
							<div class="abt_caption">
								<h2 class="ft-medium mb-4">{{ $page->title }}</h2>
								<p class="mb-4">
                                    @php
                                        echo $page->details;
                                    @endphp
                                </p>
							</div>
						</div>

					</div>
				</div>
			</section>
			<!-- ======================= About Us End ======================== -->

        <!-- ======================= Newsletter Start ============================ -->
        @include('partials.front.cta')
        <!-- ======================= Newsletter Start ============================ -->

        <!-- ============================ Footer Start ================================== -->
        @include('partials.front.footer')
        <!-- ============================ Footer End ================================== -->
@endsection

@push('js')

@endpush
