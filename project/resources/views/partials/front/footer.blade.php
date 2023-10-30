<footer class="light-footer skin-light-footer style-2">
    <div class="footer-middle">
        <div class="container">
            <div class="row">

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="footer_widget">
                        <img src="{{ asset('assets/images/'.$gs->footer_logo)}}" class="img-footer small mb-2" alt="" />

                        <div class="address mt-2">
                            {{ $ps->street }}
                        </div>
                        <div class="address mt-3">
                            {{ $ps->phone }}<br>{{ $ps->contact_email }}
                        </div>
                        <div class="address mt-2">
                            <ul class="list-inline">
                                @if ($sociallinks)
                                    @foreach ($sociallinks as $key => $social)
                                        @if($social->status)
                                            <li class="list-inline-item">
                                                <a href="{{ $social->link }}" class="theme-cl">
                                                    <i class="{{ $social->icon }}"></i>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-2 col-sm-12">
                    <div class="footer_widget">
                        <h4 class="widget_title">@lang('Main Navigation')</h4>
                        <ul class="footer-menu">
                            <li><a href="{{ route('front.listing') }}">@lang('Explore Listings')</a></li>
                            <li><a href="{{ route('front.plans') }}">@lang('Pricing Plan')</a></li>
                            <li><a href="{{ route('front.blog') }}">@lang('Blogs')</a></li>
                            <li><a href="{{ route('front.contact') }}">@lang('Contact')</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-2 col-sm-12">
                    <div class="footer_widget">
                        <h4 class="widget_title">@lang('Helpful Topics')</h4>
                        <ul class="footer-menu">
                            @foreach ($pages as $key=>$page)
                                <li><a href="{{ route('front.page',$page->slug) }}">{{ $page->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom br-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 text-center">
                    <p class="mb-0">
                        @php
                            echo $gs->copyright;
                        @endphp
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
