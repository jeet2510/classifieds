
@if ($gs->theme == 'theme-3' || $gs->theme == 'theme-5')
    <div class="header {{ request()->path() == '/' ? 'header-transparent change-logo' : 'header-light dark-text head-border'}}">
        <div class="container">
            <nav id="navigation" class="navigation navigation-landscape">
                <div class="nav-header">
                    <a class="nav-brand static-logo" href="{{ route('front.index') }}"><img src="{{asset('assets/images/'.$gs->light_logo)}}" class="logo" alt="" /></a>
                    <a class="nav-brand fixed-logo" href="{{ route('front.index') }}"><img src="{{asset('assets/images/'.$gs->logo)}}" class="logo" alt="" /></a>

                    <div class="nav-toggle"></div>
                    <div class="mobile_nav">
                        <ul>
                            @auth
                                <li>
                                    <a href="{{ route('user.dashboard') }}" class="theme-cl fs-lg">
                                        <i class="lni lni-user"></i>
                                    </a>
                            </li>
                            @else
                                <li>
                                    <a href="{{ route('user.login') }}" class="theme-cl fs-lg">
                                        <i class="lni lni-user"></i>
                                    </a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
                <div class="nav-menus-wrapper" style="transition-property: none;">
                    <ul class="nav-menu">
                        @foreach(json_decode($gs->menu,true) as $key => $menue)
                            <li><a href="{{ url($menue['href']) }}" target="{{ $menue['target'] == 'blank' ? '_blank' : '_self' }}">{{ $menue['title'] }}</a></li>
                        @endforeach
                    </ul>

                    <ul class="nav-menu nav-menu-social align-to-right">
                        @auth
                            <li><a href="javascript:void(0);">@lang('My account')</a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="{{ route('user.dashboard') }}"><i class="lni lni-dashboard me-2"></i>@lang('Dashboard')</a></li>
                                    <li><a href="{{ route('user.change.password.form') }}"><i class="lni lni-lock-alt me-2"></i>@lang('Change Password')</a></li>
                                    <li><a href="{{ route('user.logout') }}"><i class="lni lni-dashboard me-2"></i>@lang('Logout')</a></li>
                                </ul>
                            </li>

                            <li class="add-listing">
                                <a href="{{ route('user.listing.type') }}" >
                                    <i class="fas fa-plus me-2"></i>@lang('Add Listing')
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('user.login') }}" class="ft-bold">
                                    <i class="fas fa-sign-in-alt me-1 theme-cl"></i>@lang('Sign In')
                                </a>
                            </li>
                            <li class="add-listing">
                                <a href="{{ route('user.listing.type') }}" >
                                    <i class="fas fa-plus me-2"></i>@lang('Add Listing')
                                </a>
                            </li>
                        @endauth

                    </ul>
                </div>
            </nav>
        </div>
    </div>
@else
<div class="header header-light dark-text">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="{{ url('/') }}">
                    <img src="{{ asset('assets/images/'.$gs->logo) }}" class="logo" alt="" />
                </a>
                <div class="nav-toggle"></div>
                <div class="mobile_nav">
                    <ul>
                        @auth
                            <li>
                                <a href="{{ route('user.dashboard') }}" class="ft-bold">
                                    @lang('Dashboard')
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('user.login') }}" class="theme-cl fs-lg">
                                    <i class="lni lni-user"></i>
                                </a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">
                <ul class="nav-menu">
                    @foreach(json_decode($gs->menu,true) as $key => $menue)
                        <li>
                            <a href="{{ url($menue['href']) }}" target="{{ $menue['target'] == 'blank' ? '_blank' : '_self' }}">{{ $menue['title'] }} </a>
                        </li>
                    @endforeach
                </ul>

                <ul class="nav-menu nav-menu-social align-to-right">

                    @auth
                        <li><a href="javascript:void(0);">@lang('My account')</a>
                            <ul class="nav-dropdown nav-submenu">
                                <li><a href="{{ route('user.dashboard') }}"><i class="lni lni-dashboard me-2"></i>@lang('Dashboard')</a></li>
                                <li><a href="{{ route('user.change.password.form') }}"><i class="lni lni-lock-alt me-2"></i>@lang('Change Password')</a></li>
                                <li><a href="{{ route('user.logout') }}"><i class="lni lni-dashboard me-2"></i>@lang('Logout')</a></li>
                            </ul>
                        </li>

                        <li class="add-listing">
                            <a href="{{ route('user.listing.type') }}" >
                                <i class="fas fa-plus me-2"></i>@lang('Add Listing')
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('user.login') }}" class="ft-bold">
                                <i class="fas fa-sign-in-alt me-1 theme-cl"></i>@lang('Sign In')
                            </a>
                        </li>
                        <li class="add-listing">
                            <a href="{{ route('user.listing.type') }}" >
                                <i class="fas fa-plus me-2"></i>@lang('Add Listing')
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </div>
</div>
@endif

