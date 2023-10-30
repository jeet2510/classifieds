@extends('layouts.front')

@push('css')

@endpush

@section('content')
    <!-- ======================= Searchbar Banner ======================== -->
    <div class="featured-slick">
        <div class="featured-slick-slide">

            <div class="dlf-flew">
                <a href="{{ asset('assets/images/'.$data->photo) }}" class="mfp-gallery">
                    <img src="{{ asset('assets/images/'.$data->photo) }}" class="img-fluid mx-auto" alt="" />
                </a>
            </div>

            @if ($data->galleries)
                @foreach ($data->galleries as $key => $gallery)
                    <div class="dlf-flew">
                        <a href="{{ asset('assets/images/'.$gallery->photo) }}" class="mfp-gallery">
                            <img src="{{ asset('assets/images/'.$gallery->photo) }}" class="img-fluid mx-auto" alt="" />
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="Rego-ops-bhri">
            <div class="Rego-lkp-flex d-flex align-items-start justify-content-start">
                <div class="Rego-lkp-caption ps-3">
                    <div class="Rego-lkp-title"><h1 class="text-light mb-0 ft-bold">{{ $data->name }}</h4></div>
                        @if (count($data->reviews)>0)
                            <div class="Rego-ft-first">
                                <div class="Rego-rating">
                                    <div class="Rego-rates">
                                        @php
                                            $rate = ceil($data->directoryRatting($data->id));
                                        @endphp

                                        @for($i=1; $i<=$rate; $i++)
                                            <i class="fas fa-star active"></i>
                                        @endfor

                                        @for($i=1; $i<=(5-$rate); $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                    </div>
                                </div>
                                <div class="Rego-price-range">
                                    <span class="ft-medium text-light">{{ count($data->reviews) }} @lang('Reviews')</span>
                                </div>
                            </div>
                        @endif

                    @if ($data->type == 'restaurant' || $data->type == 'hotel' || $data->type == 'beauty')
                        <div class="d-block mt-3">
                            <div class="list-lioe">
                                <div class="list-lioe-single ms-2 ps-3 seperate">
                                    @if ($data->type == 'restaurant')
                                        @if (count($data->menus)>0)
                                            @foreach ($data->menus as $key=>$menu)
                                                <a href="javascript:void(0);" class="text-light ft-medium">{{ $menu->menu_title}}</a>,
                                            @endforeach
                                        @endif
                                    @endif

                                    @if ($data->type == 'hotel')
                                        @if (count($data->rooms)>0)
                                            @foreach ($data->rooms as $key=>$room)
                                                <a href="javascript:void(0);" class="text-light ft-medium">{{ $room->room_name}}</a>,
                                            @endforeach
                                        @endif
                                    @endif

                                    @if ($data->type == 'beauty')
                                        @if (count($data->services)>0)
                                            @foreach ($data->services as $key=>$service)
                                                <a href="javascript:void(0);" class="text-light ft-medium">{{ $service->room_name}}</a>,
                                            @endforeach
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="d-block mt-1">
                        <div class="list-lioe">
                            <div class="list-lioe-single">
                                <span class="ft-medium text-danger">{{ $data->openClose($data->id) }}</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= Searchbar Banner ======================== -->

    <!-- ============================ Listing Details Start ================================== -->
    <section class="gray py-5 position-relative">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">

                    <!-- About The Business -->
                    <div class="bg-white rounded mb-4">
                        <div class="jbd-01 px-4 py-4">
                            <div class="jbd-details">
                                <h5 class="ft-bold fs-lg">@lang('About the Business')</h5>

                                <div class="d-block mt-3">
                                    <p>
                                        @php
                                            echo $data->description;
                                        @endphp
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                    @if ($data->type == 'restaurant')
                        <!-- Business Menu -->
                        <div class="bg-white rounded mb-4">
                            <div class="jbd-01 px-4 py-4">
                                <div class="jbd-details mb-2">
                                    <h5 class="ft-bold fs-lg">@lang('Food Menus')</h5>

                                    <div class="d-block mt-3">
                                        <div class="row g-3">
                                            <!-- Single Menu -->
                                            @if (count($data->menus)>0)
                                                @foreach ($data->menus as $key=>$menu)
                                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
                                                        <div class="Rego-sng-menu">
                                                            <div class="Rego-sng-menu-thumb">
                                                                <img src="{{ asset('assets/images/'.$menu->menu_photo) }}" class="img-fluid" alt="" />
                                                            </div>
                                                            <div class="Rego-sng-menu-caption">
                                                                <h4 class="ft-medium fs-md">{{ $menu->menu_title}}</h4>
                                                                <div class="lkji-oiyt"><span>@lang('Start From')</span> <h5 class="theme-cl ft-bold">{{ showSignAmount($menu->menu_price) }}</h5></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endif

                    @if ($data->type == 'hotel')
                        <!-- Business Menu -->
                        <div class="bg-white rounded mb-4">
                            <div class="jbd-01 px-4 py-4">
                                <div class="jbd-details mb-2">
                                    <h5 class="ft-bold fs-lg">@lang('Hotel room')</h5>

                                    <div class="d-block mt-3">
                                        <div class="row g-3">
                                            <!-- Single Menu -->
                                            @if (count($data->rooms)>0)
                                                @foreach ($data->rooms as $key=>$room)
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                                        <div class="Rego-sng-menu">
                                                            <div class="Rego-sng-menu-thumb">
                                                                <img src="{{ asset('assets/images/'.$room->room_photo) }}" class="img-fluid" alt="" />
                                                            </div>
                                                            <div class="Rego-sng-menu-caption">
                                                                <h4 class="ft-medium fs-md">{{ $room->room_name}}</h4>
                                                                <p>{{ $room->room_description }}</p>
                                                                <div class="row">

                                                                    @foreach (explode(",",$room->room_amenities) as $key=>$amenity)
                                                                        <div class="col-lg-4 col-md-4 col-xl-4">
                                                                            {{ $amenity }}
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                                <div class="lkji-oiyt mt-3"><span>@lang('Start From')</span> <h5 class="theme-cl ft-bold">{{ showSignAmount($room->room_price) }}</h5></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endif

                    @if ($data->type == 'beauty')
                        <!-- Business Menu -->
                        <div class="bg-white rounded mb-4">
                            <div class="jbd-01 px-4 py-4">
                                <div class="jbd-details mb-2">
                                    <h5 class="ft-bold fs-lg">@lang('Beauty Service')</h5>

                                    <div class="d-block mt-3">
                                        <div class="row g-3">
                                            <!-- Single Menu -->
                                            @if (count($data->services)>0)
                                                @foreach ($data->services as $key=>$service)
                                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
                                                        <div class="Rego-sng-menu">
                                                            <div class="Rego-sng-menu-thumb">
                                                                <img src="{{ asset('assets/images/'.$service->service_photo) }}" class="img-fluid" alt="" />
                                                            </div>
                                                            <div class="Rego-sng-menu-caption">
                                                                <h4 class="ft-medium fs-md">{{ $service->service_name}}</h4>
                                                                <p>@lang('Availability '): {{  $service->service_from }} - {{  $service->service_to }}</p>
                                                                <p>@lang('Duration '): {{  $service->service_duration }} @lang('Minute')</p>
                                                                <div class="lkji-oiyt"><span>@lang('Start From')</span> <h5 class="theme-cl ft-bold">{{ showSignAmount($service->service_price) }}</h5></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endif

                    <!-- Amenities and More -->
                    <div class="bg-white rounded mb-4">
                        <div class="jbd-01 px-4 py-4">
                            <div class="jbd-details">
                                <h5 class="ft-bold fs-lg">@lang('Amenities and More')</h5>

                                <div class="Rego-all-features-list mt-3">
                                    <ul>
                                        @foreach ($amenities as $key => $amenity)
                                            <li>
                                                <div class="Rego-afl-pace">
                                                    <img src="{{ asset('assets/front/img/verify.svg')}}" class="" alt="" />
                                                    <span>{{ $amenity }}</span>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Frequently Asked Questions -->
                    @if (count($data->faqs)>0)
                        <div class="d-block mb-2">
                            <div class="jbd-01 py-2">
                                <div class="jbd-details">
                                    <h5 class="ft-bold fs-lg">@lang('Frequently Asked Questions')</h5>

                                    <div class="d-block mt-3">
                                        <div id="accordion2" class="accordion">
                                            @foreach ($data->faqs as $key=>$faq)
                                                <div class="card">
                                                    <div class="card-header" id="h{{$key}}">
                                                        <h5 class="mb-0">
                                                        <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#ord{{$key}}" aria-expanded="true" aria-controls="ord{{$key}}">
                                                            {{ $faq->faq_name}}
                                                        </button>
                                                        </h5>
                                                    </div>

                                                    <div id="ord{{$key}}" class="collapse {{ $key == 0 ? 'show' :''}}" aria-labelledby="h{{$key}}" data-parent="#accordion2">
                                                        <div class="card-body">
                                                            {{ $faq->faq_details}}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif


                    <!-- Recommended Reviews -->
                    <div class="bg-white rounded mb-4">
                        <div class="jbd-01 px-4 py-4">
                            <div class="jbd-details mb-4">
                                <h5 class="ft-bold fs-lg">@lang('Recommended Reviews')</h5>
                                <div class="reviews-comments-wrap">
                                    @if (count($reviews) == 0)
                                        <div class="col-12 text-center">
                                            <p class="m-0">{{__('No Review Found')}}</p>
                                        </div>
                                    @else
                                        @foreach ($reviews as $key=>$review)
                                            <!-- reviews-comments-item -->
                                            <div class="reviews-comments-item">
                                                <div class="review-comments-avatar">
                                                    <img src="{{ asset('assets/images/'.$review->user->photo)}}" class="img-fluid" alt="">
                                                </div>
                                                <div class="reviews-comments-item-text">
                                                    <h4>
                                                        <a href="#">{{ $review->name }}</a>
                                                        <span class="reviews-comments-item-date">
                                                            <i class="ti-calendar theme-cl me-1"></i>
                                                            {{ $review->created_at->format('d M Y') }}
                                                        </span>
                                                    </h4>
                                                    <span class="agd-location">
                                                        <i class="lni lni-map-marker me-1"></i>
                                                        {{ $review->user->address }}
                                                    </span>

                                                    <div class="listing-rating high">
                                                        @for($i=1; $i<=$review->rate; $i++)
                                                            <i class="fas fa-star active"></i>
                                                        @endfor

                                                        @for($i=1; $i<=(5-$review->rate); $i++)
                                                            <i class="fas fa-star"></i>
                                                        @endfor
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <p>
                                                        {{ $review->message }}
                                                    </p>

                                                </div>
                                            </div>
                                            <!--reviews-comments-item end-->
                                        @endforeach
                                    @endif

                                    <ul class="pagination">
                                        @if($reviews->hasPages())
                                            {{ $reviews->links() }}
                                        @endif
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Location & Hours -->
                    <div class="bg-white rounded mb-4">
                        <div class="jbd-01 px-4 py-4">
                            <div class="jbd-details mb-4">
                                <h5 class="ft-bold fs-lg">@lang('Location & Hours')</h5>
                                <div class="Rego-lot-wrap d-block">
                                    <div class="row g-4">
                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <div class="list-map-lot">
                                                <iframe src="https://maps.google.com/maps?q={{ $data->latitude }},{{ $data->longitude }}&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">@lang('Mon')</th>
                                                        @if ($schedules['mon_open'] != 'closed' && $schedules['mon_close'])
                                                            <td>{{ $schedules['mon_open'] }} - {{ $schedules['mon_close'] }}</td>
                                                        @else
                                                            <td>@lang('closed')</td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td>@lang('Tue')</td>
                                                        @if ($schedules['tue_open'] != 'closed' && $schedules['tue_close'])
                                                            <td>{{ $schedules['tue_open'] }} - {{ $schedules['tue_close'] }}</td>
                                                        @else
                                                            <td>@lang('closed')</td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td>@lang('Wed')</td>
                                                        @if ($schedules['wed_open'] != 'closed' && $schedules['wed_close'])
                                                            <td>{{ $schedules['wed_open'] }} - {{ $schedules['wed_close'] }}</td>
                                                        @else
                                                            <td>@lang('closed')</td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td>@lang('Thu')</td>
                                                        @if ($schedules['thu_open'] != 'closed' && $schedules['thu_close'])
                                                            <td>{{ $schedules['thu_open'] }} - {{ $schedules['thu_close'] }}</td>
                                                        @else
                                                            <td>@lang('closed')</td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td>@lang('Fri')</td>
                                                        @if ($schedules['fri_open'] != 'closed' && $schedules['fri_close'])
                                                            <td>{{ $schedules['fri_open'] }} - {{ $schedules['fri_close'] }}</td>
                                                        @else
                                                            <td>@lang('closed')</td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td>@lang('Sat')</td>
                                                        @if ($schedules['sat_open'] != 'closed' && $schedules['sat_close'])
                                                            <td>{{ $schedules['sat_open'] }} - {{ $schedules['sat_close'] }}</td>
                                                        @else
                                                            <td>@lang('closed')</td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td>@lang('Sun')</td>
                                                        @if ($schedules['sun_open'] != 'closed' && $schedules['sun_close'])
                                                            <td>{{ $schedules['sun_open'] }} - {{ $schedules['sun_close'] }}</td>
                                                        @else
                                                            <td>@lang('closed')</td>
                                                        @endif
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Drop Your Review -->
                    <div class="bg-white rounded mb-4">
                        <div class="jbd-01 px-4 py-4">
                            <div class="jbd-details mb-4">
                                <h5 class="ft-bold fs-lg">@lang('Drop Your Review')</h5>
                                <div class="review-form-box form-submit mt-3">
                                    <form action="{{ route('front.listing.review') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <input type="hidden" name="listing_id" value="{{ $data->id }}">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label class="ft-medium small mb-1">@lang('Choose Rate')</label>
                                                    <select name="rate" class="form-control rounded">
                                                        <option>@lang('Choose Rating')</option>
                                                        <option value="1">@lang('1 Star')</option>
                                                        <option value="2">@lang('2 Star')</option>
                                                        <option value="3">@lang('3 Star')</option>
                                                        <option value="4">@lang('4 Star')</option>
                                                        <option value="5">@lang('5 Star')</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label class="ft-medium small mb-1">@lang('Name')</label>
                                                    <input class="form-control rounded" type="text" name="name" placeholder="@lang('Your Name')">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label class="ft-medium small mb-1">@lang('Email')</label>
                                                    <input class="form-control rounded" type="email" name="email" placeholder="@lang('Your Email')">
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group mb-3">
                                                    <label class="ft-medium small mb-1">@lang('Review')</label>
                                                    <textarea class="form-control rounded ht-140" name="message" placeholder="@lang('Review')"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn theme-bg text-light rounded">Submit Review</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    @if ($data->type == 'restaurant')
                        @includeIf('partials.front.listing.restaurant')
                    @elseif($data->type == 'hotel')
                        @includeIf('partials.front.listing.hotel')
                    @elseif($data->type == 'beauty')
                        @includeIf('partials.front.listing.beauty')
                    @else
                        @includeIf('partials.front.listing.general')
                    @endif


                    <!-- Author Box -->
                    <div class="jb-apply-form bg-white rounded py-4 px-4 mb-4">
                        @if ($data->user_id != NULL)
                            <div class="Rego-agent-blocks">
                                <div class="Rego-agent-thumb"><img src="{{ asset('assets/images/'.$data->user->photo)}}" width="90" class="img-fluid circle" alt=""></div>
                                <div class="Rego-agent-caption">
                                    <h4 class="ft-medium mb-0">{{ $data->user->name }}</h4>
                                    <span class="agd-location"><i class="lni lni-map-marker me-1"></i>{{ $data->user->address }}</span>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="Rego-iuky">
                                <ul>
                                    <li>{{ DB::table('recent_views_listings')->where('listing_owner_id',$data->user->id)->count() }}<span>@lang('Views')</span></li>
                                    <li>{{ count($data->user->listings) }}<span>@lang('Listings')</span></li>
                                    <li>{{ DB::table('followers')->where('user_id',$data->user->id)->count() }}<span>@lang('Followers')</span></li>
                                </ul>
                            </div>
                        @else
                            <div class="Rego-agent-blocks">
                                <div class="Rego-agent-thumb"><img src="{{ asset('assets/images/'.getAdmin()->photo)}}" width="90" class="img-fluid circle" alt=""></div>
                                <div class="Rego-agent-caption">
                                    <h4 class="ft-medium mb-0">{{ getAdmin()->name }}</h4>
                                    <span class="agd-location"><i class="lni lni-map-marker me-1"></i>San Francisco</span>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="Rego-iuky">
                                <ul>
                                    <li>{{ DB::table('recent_views_listings')->where('listing_owner_id','NULL')->count() }}<span>@lang('Views')</span></li>
                                    <li>{{ DB::table('listings')->where('admin_id','NULL')->count() }}<span>@lang('Listings')</span></li>
                                    <li>{{ DB::table('followers')->where('user_id','NULL')->count() }}<span>@lang('Followers')</span></li>
                                </ul>
                            </div>
                        @endif

                        <div class="agent-cnt-info">
                            <div class="row g-4">
                                <div class="col-12">
                                    <a href="javascript:void(0);" class="adv-btn full-width add-follow" data-user="{{ auth()->id() }}" data-owner="{{ $data->user_id }}" data-listing="{{ $data->id }}">@lang('Follow Now')</a>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    @if ($data->user_id != NULL)
                                        <a href="{{ route('front.author.details',$data->user->username) }}" class="adv-btn full-width theme-bg text-light">@lang('View Profile')</a>
                                    @else
                                        <a href="{{ route('front.author.details','admin') }}" class="adv-btn full-width theme-bg text-light">@lang('View Profile')</a>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Business Info -->
                    <div class="jb-apply-form bg-white rounded py-4 px-4 mb-4">
                        <div class="uli-list-info">
                            <ul>

                                <li>
                                    <div class="list-uiyt">
                                        <div class="list-iobk"><i class="fas fa-globe"></i></div>
                                        <div class="list-uiyt-capt"><h5>@lang('Live Site')</h5><p>{{ $data->website }}</p></div>
                                    </div>
                                </li>

                                <li>
                                    <div class="list-uiyt">
                                        <div class="list-iobk"><i class="fas fa-envelope"></i></div>
                                        <div class="list-uiyt-capt"><h5>@lang('Drop a Mail')</h5><p>{{ $data->email }}</p></div>
                                    </div>
                                </li>

                                <li>
                                    <div class="list-uiyt">
                                        <div class="list-iobk"><i class="fas fa-phone"></i></div>
                                        <div class="list-uiyt-capt"><h5>@lang('Call Us')</h5><p>{{ $data->phone_number }}</p></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-uiyt">
                                        <div class="list-iobk"><i class="fas fa-map-marker-alt"></i></div>
                                        <div class="list-uiyt-capt"><h5>@lang('Get Directions')</h5><p>{{ $data->real_address }}</p></div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- ============================ Listing Details End ================================== -->

    <!-- ======================= Related Listings ======================== -->
    @if (isset($$recentViews) && count($recentViews)>0)
        <section class="space min">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="sec_title position-relative text-center mb-5">
                            <h6 class="theme-cl mb-0">@lang('Related Listing')</h6>
                            <h2 class="ft-bold">@lang('Recently Viewed Listing')</h2>
                        </div>
                    </div>
                </div>

                <!-- row -->
                <div class="row justify-content-center">
                    @foreach ($recentViews as $key=>$recentview)
                        @php
                            $data = $recentview->listing;
                        @endphp
                        <!-- Single -->
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <div class="Rego-grid-wrap">
                                <div class="Rego-grid-upper">
                                    <div class="Rego-pos ab-left">
                                        <div class="Rego-status close me-2">{{ $data->openClose($data->id) }}</div>
                                    </div>
                                    <div class="Rego-grid-thumb">
                                        <a href="{{ route('front.listing.details',$data->slug) }}" class="d-block text-center m-auto">
                                            <img src="{{ asset('assets/images/'.$data->photo)}}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    @if (count($data->reviews))
                                        <div class="Rego-rating overlay">
                                            <div class="Rego-pr-average high">{{ $data->directoryRatting($data->id) }}</div>
                                            <div class="Rego-aldeio">
                                                <div class="Rego-rates">
                                                    @php
                                                        $rate = ceil($data->directoryRatting($data->id));
                                                    @endphp

                                                    @for($i=1; $i<=$rate; $i++)
                                                        <i class="fas fa-star active"></i>
                                                    @endfor

                                                    @for($i=1; $i<=(5-$rate); $i++)
                                                        <i class="fas fa-star"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="Rego-grid-fl-wrap">
                                    <div class="Rego-caption px-3 py-2">
                                        <div class="Rego-author">
                                            @if ($data->user_id == NULL && $data->admin_id == NULL)
                                                <a href="{{ route('front.author.details','admin') }}">
                                                    <img src="{{ asset('assets/images/'.getAdmin()->photo)}}" class="img-fluid circle" alt="">
                                                </a>
                                            @else
                                                <a href="{{ route('front.author.details',$data->user->name) }}">
                                                    <img src="{{ asset('assets/images/'.$data->user->photo)}}" class="img-fluid circle" alt="">
                                                </a>
                                            @endif
                                        </div>
                                        <h4 class="mb-0 ft-medium medium">
                                            <a href="{{ route('front.listing.details',$data->slug) }}" class="text-dark fs-md">{{ $data->category->title }}</a>
                                        </h4>
                                        <div class="Rego-location">
                                            <i class="fas fa-map-marker-alt me-1 theme-cl"></i>
                                            {{ $data->real_address }}
                                        </div>
                                        <div class="Rego-middle-caption mt-3">
                                            <p>
                                                {{ strlen($data->description)>60 ? substr($data->description,0,60) :  $data->description }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="Rego-grid-footer py-2 px-3">
                                        <div class="Rego-ft-first">
                                            <a href="{{ route('front.listing',['category' => $data->category->slug]) }}" class="Rego-cats-wrap"><span class="cats-title">{{ $data->category->title }}</span></a>
                                        </div>
                                        <div class="Rego-ft-last">
                                            <div class="Rego-inline">
                                                <div class="Rego-bookmark-btn"><button type="button"><i class="lni lni-envelope position-absolute"></i></button></div>
                                                <div class="Rego-bookmark-btn">
                                                    <button type="button" class="wishList" data-listing="{{ $data->id }}" data-user={{ auth()->id() }}>
                                                        <i class="lni lni-heart{{ $data->userFavourite(auth()->id(),$data->id) ? '-filled' : ''}} position-absolute"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- row -->

            </div>
        </section>
    @endif
    <!-- ======================= Related Listings ======================== -->

    <!-- ============================ Call To Action ================================== -->
    @includeIf('partials.front.cta')
    <!-- ============================ Call To Action End ================================== -->

    <!-- ============================ Footer Start ================================== -->
    @include('partials.front.footer')
    <!-- ============================ Footer End ================================== -->
@endsection

@push('js')
    <script>
        'use strict';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click','.wishList',function(){
            let $this = $(this);
            let listingId = $(this).data('listing');
            let userId = $(this).data('user');
            if(userId == ''){
                window.location.href = mainurl+'/user/login'
            }

            $.ajax({
                method:"POST",
                url: mainurl+'/listing/wishlist',
                data: {
                    listing_id : listingId,
                    user_id : userId
                },
                success:function(data)
                {
                    if(data.success){
                        $this.children().prop('class','');
                        $this.children().prop('class','lni lni-heart-filled  position-absolute');
                        toastr.success(data.success);
                    }else{
                        $this.children().prop('class','');
                        $this.children().prop('class','lni lni-heart  position-absolute');
                        toastr.error(data.error);
                    }
                }

            });

        })

        $(document).on('click','.add-follow',function(){
            let $this = $(this);
            let listingId = $(this).data('listing');
            let ownerId = $(this).data('owner');
            let userId = $(this).data('user');
            if(userId == ''){
                window.location.href = mainurl+'/user/login'
            }

            $.ajax({
                method:"POST",
                url: mainurl+'/follow',
                data: {
                    listing_id : listingId,
                    owner_id : ownerId,
                    user_id : userId,
                },
                success:function(data)
                {
                    if(data.success) toastr.success(data.success);
                    else toastr.error(data.error);
                }

            });
        })

    </script>
@endpush
