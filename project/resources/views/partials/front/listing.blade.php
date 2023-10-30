@if (count($listings)>0)
    @foreach ($listings as $key => $data)
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <div class="Rego-grid-wrap">
                <div class="Rego-grid-upper">
                    <div class="Rego-bookmark-btn">
                        <button type="button" class="wishList" data-listing="{{ $data->id }}" data-user={{ auth()->id() }}>
                            <i class="lni lni-heart{{ $data->userFavourite(auth()->id(),$data->id) ? '-filled' : ''}} position-absolute"></i>
                        </button>
                    </div>
                    <div class="Rego-pos ab-left">
                        <div class="Rego-status open me-2">{{ $data->openClose($data->id) }}</div>
                        @if ($data->is_feature)
                            <div class="Rego-featured-tag">@lang('Featured')</div>
                        @endif
                    </div>
                    <div class="Rego-grid-thumb">
                        <a href="{{ route('front.listing.details',$data->slug) }}" class="d-block text-center m-auto"><img src="{{ asset('assets/images/'.$data->photo) }}" class="img-fluid" alt="" /></a>
                    </div>
                </div>
                <div class="Rego-grid-fl-wrap">
                    <div class="Rego-caption px-3 py-2">
                        <div class="Rego-author">
                            @if ($data->user_id == NULL && $data->admin_id == NULL)
                                <a href="{{ route('front.author.details','admin') }}">
                                    <img src="{{ asset('assets/images/'.getAdmin()->photo)}}" class="img-fluid circle" alt="">
                                </a>
                            @else
                                <a href="{{ route('front.author.details',$data->user->username) }}">
                                    <img src="{{ asset('assets/images/'.$data->user->photo)}}" class="img-fluid circle" alt="">
                                </a>
                            @endif
                        </div>
                        <div class="Rego-cates"><a href="{{ route('front.listing',['category' => $data->category->slug]) }}">{{ $data->category->title }}</a></div>
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
    <div class="col-lg-12 col-md-12">
        <h5 class="text-center">
            @lang('No Directory Found!')
        </h5>
    </div>
@endif

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        @if($listings->hasPages())
            {{ $listings->links() }}
        @endif
    </div>
</div>
