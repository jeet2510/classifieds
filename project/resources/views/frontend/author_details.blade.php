@extends('layouts.front')

@push('css')

@endpush

@section('content')
    <!-- ============================ Main Section Start ================================== -->
    <section class="gray">
        <div class="container">
            <div class="row">

                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="author-wrap-ngh">
                        @if (isset($admin))
                            <div class="author-wrap-head-ngh">
                                <div class="author-wrap-ngh-thumb">
                                    <img src="{{ asset('assets/images/'.$admin->photo)}}" class="img-fluid circle" alt="" />
                                </div>
                                <div class="author-wrap-ngh-info">
                                    <h5>{{ $admin->name }}</h5>
                                    <div class="Rego-location"><i class="fas fa-map-marker-alt"></i>{{ $admin->address }}</div>
                                </div>
                            </div>
                        @endif

                        @if (isset($user))
                            <div class="author-wrap-head-ngh">
                                <div class="author-wrap-ngh-thumb">
                                    <img src="{{ asset('assets/images/'.$user->photo)}}" class="img-fluid circle" alt="" />
                                </div>
                                <div class="author-wrap-ngh-info">
                                    <h5>{{ $user->name }}</h5>
                                    <div class="Rego-location"><i class="fas fa-map-marker-alt"></i>{{ $user->address }}</div>
                                </div>
                            </div>
                        @endif

                        <div class="author-wrap-caption-ngh">
                            <div class="author-wrap-jhyu-ngh">
                                <ul>
                                    @if (isset($user))
                                        <li>
                                            <div class="list-kjvr">
                                                <div class="list-kjvr-icon bg-light-sky text-sky"><i class="fas fa-file"></i></div>
                                                <div class="list-kjvr-ctr"><h6 class="count">{{ count($user->listings) }}</h6></div>
                                                <div class="list-kjvr-text">@lang('Listings')</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="list-kjvr">
                                                <div class="list-kjvr-icon bg-light-warning text-warning"><i class="fas fa-thumbs-up"></i></div>
                                                <div class="list-kjvr-ctr"><h6 class="count">{{ DB::table('followers')->where('user_id',$user->id)->count() }}</h6><span></span></div>
                                                <div class="list-kjvr-text">@lang('Followers')</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="list-kjvr">
                                                <div class="list-kjvr-icon bg-light-danger text-danger"><i class="fas fa-heart"></i></div>
                                                <div class="list-kjvr-ctr"><h6 class="count">{{ DB::table('followers')->where('follower_id',$user->id)->count() }}</h6></div>
                                                <div class="list-kjvr-text">@lang('Followings')</div>
                                            </div>
                                        </li>
                                    @endif

                                    @if (isset($admin))
                                        <li>
                                            <div class="list-kjvr">
                                                <div class="list-kjvr-icon bg-light-sky text-sky"><i class="fas fa-file"></i></div>
                                                <div class="list-kjvr-ctr"><h6 class="count">{{ count(DB::table('listings')->where('user_id',NULL)->where('admin_id',NULL)->get()) }}</h6></div>
                                                <div class="list-kjvr-text">@lang('Listings')</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="list-kjvr">
                                                <div class="list-kjvr-icon bg-light-warning text-warning"><i class="fas fa-thumbs-up"></i></div>
                                                <div class="list-kjvr-ctr"><h6 class="count">{{ DB::table('followers')->where('user_id','NULL')->count() }}</h6><span></span></div>
                                                <div class="list-kjvr-text">@lang('Followers')</div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="list-kjvr">
                                                <div class="list-kjvr-icon bg-light-danger text-danger"><i class="fas fa-heart"></i></div>
                                                <div class="list-kjvr-ctr"><h6 class="count">{{ (int)DB::table('recent_views_listings')->where('listing_owner_id',NULL)->count() }}</h6></div>
                                                <div class="list-kjvr-text">@lang('views')</div>
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                            </div>

                            @if (isset($admin))
                            <div class="author-wrap-yuio-ngh mt-5">
                                <div class="row g-4">
                                    <div class="col-12">
                                        <a href="javascript:void(0);" class="adv-btn full-width add-follow" data-user="{{ auth()->id() }}" data-owner="" data-listing="">@lang('Follow Now')</a>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if (isset($user))
                            <div class="author-wrap-yuio-ngh mt-5">
                                <div class="row g-4">
                                    <div class="col-12">
                                        <a href="javascript:void(0);" class="adv-btn full-width add-follow" data-user="{{ auth()->id() }}" data-owner="{{ $user->id }}" data-listing="">@lang('Follow Now')</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="author-wrap-footer-ngh">
                            <ul>
                                @if (isset($user))
                                    <li>
                                        <div class="jhk-list-inf">
                                            <div class="jhk-list-inf-ico"><i class="fas fa-envelope"></i></div>
                                            <div class="jhk-list-inf-caption"><h5>@lang('Mail Us')</h5><p>{{ $user->email }}</p></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="jhk-list-inf">
                                            <div class="jhk-list-inf-ico"><i class="fas fa-phone"></i></div>
                                            <div class="jhk-list-inf-caption"><h5>@lang('Make Call')</h5><p>{{ $user->phone }}</p></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="jhk-list-inf">
                                            <div class="jhk-list-inf-ico"><i class="fas fa-map-marker-alt"></i></div>
                                            <div class="jhk-list-inf-caption"><h5>@lang('Get Direction')</h5><p>{{ $user->direction }}</p></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="jhk-list-inf">
                                            <div class="jhk-list-inf-ico"><i class="fas fa-globe"></i></div>
                                            <div class="jhk-list-inf-caption"><h5>@lang('Live Web'):</h5><p>{{ $user->website }}</p></div>
                                        </div>
                                    </li>
                                @endif

                                @if (isset($admin))
                                <li>
                                    <div class="jhk-list-inf">
                                        <div class="jhk-list-inf-ico"><i class="fas fa-envelope"></i></div>
                                        <div class="jhk-list-inf-caption"><h5>@lang('Mail Us')</h5><p>{{ $admin->email }}</p></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="jhk-list-inf">
                                        <div class="jhk-list-inf-ico"><i class="fas fa-phone"></i></div>
                                        <div class="jhk-list-inf-caption"><h5>@lang('Make Call')</h5><p>{{ $admin->phone }}</p></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="jhk-list-inf">
                                        <div class="jhk-list-inf-ico"><i class="fas fa-map-marker-alt"></i></div>
                                        <div class="jhk-list-inf-caption"><h5>@lang('Get Direction')</h5><p>{{ $admin->direction }}</p></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="jhk-list-inf">
                                        <div class="jhk-list-inf-ico"><i class="fas fa-globe"></i></div>
                                        <div class="jhk-list-inf-caption"><h5>@lang('Live Web'):</h5><p>{{ $admin->website }}</p></div>
                                    </div>
                                </li>
                            @endif
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="col-xl-8 col-lg-8 col-md-12">


                    <!-- row -->
                    <div class="row justify-content-center gx-3">
                        @if (count($listings)>0)
                            @foreach ($listings as $key => $data)
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                    <div class="Rego-grid-wrap">
                                        <div class="Rego-grid-upper">
                                            <div class="Rego-bookmark-btn">
                                                <button type="button" class="wishList" data-listing="{{ $data->id }}" data-user={{ auth()->id() }}>
                                                    <i class="lni lni-heart{{ $data->userFavourite(auth()->id(),$data->id) ? '-filled' : ''}} position-absolute"></i>
                                                </button>
                                            </div>
                                            <div class="Rego-pos ab-left">
                                                <div class="Rego-status open me-2">{{ $data->openClose($data->id) }}</div>
                                                @if ($data->is_featured)
                                                    <div class="Rego-featured-tag">@lang('Featured')</div>
                                                @endif
                                            </div>
                                            <div class="Rego-grid-thumb">
                                                <a href="{{ route('front.listing.details',$data->slug) }}" class="d-block text-center m-auto"><img src="{{ asset('assets/images/'.$data->photo) }}" class="img-fluid" alt="" /></a>
                                            </div>
                                        </div>
                                        <div class="Rego-grid-fl-wrap">
                                            <div class="Rego-caption px-3 py-2">
                                                <div class="Rego-cates"><a href="{{ route('front.listing',['category' => $data->category->slug]) }}">{{ $data->category->name }}</a></div>
                                                <h4 class="mb-0 ft-medium medium"><a href="{{ route('front.listing.details',$data->slug) }}" class="text-dark fs-md">{{ $data->name }}<span class="verified-badge"><i class="fas fa-check-circle"></i></span></a></h4>
                                                <div class="Rego-middle-caption mt-3">
                                                    <div class="Rego-location"><i class="fas fa-map-marker-alt"></i>{{ $data->real_address }}</div>
                                                    <div class="Rego-call"><i class="fas fa-phone-alt"></i>{{ $data->phone_number }}</div>
                                                </div>
                                            </div>
                                            <div class="Rego-grid-footer py-3 px-3">
                                                <div class="Rego-ft-first">
                                                    @if (count($data->reviews)>0)
                                                    <div class="Rego-rating">
                                                        <div class="Rego-pr-average high">{{ $data->directoryRatting($data->id) }}</div>
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
                                                    @endif
                                                </div>
                                                <div class="Rego-ft-last">
                                                    <span class="small">{{ $data->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12 text-center">
                                <h3 class="m-0">{{__('No Directory Found')}}</h3>
                            </div>
                        @endif

                    </div>
                    <!-- /row -->

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            @if($listings->hasPages())
                                {{ $listings->links() }}
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Main Section End ================================== -->

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
