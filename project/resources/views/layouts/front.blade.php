<!DOCTYPE html>
<html lang="zxx">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{$gs->title}}</title>

        <link href="{{asset('assets/front/css/styles.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/front/css/styles.php?color='.str_replace('#','',$gs->colors)) }}">

        @if ($default_font->font_value)
            <link href="https://fonts.googleapis.com/css?family={{ $default_font->font_value }}&display=swap" rel="stylesheet">
        @else
            <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        @endif

        @if ($default_font->font_family)
            <link rel="stylesheet" id="colorr" href="{{ asset('assets/front/css/font.php?font_familly='.$default_font->font_family) }}">
        @else
            <link rel="stylesheet" id="colorr" href="{{ asset('assets/front/css/font.php?font_familly='."Open Sans") }}">
        @endif

        <link href="{{ asset('assets/front/css/summernote.css') }}" rel="stylesheet" >
        <link rel="stylesheet" href="{{ asset('assets/front/css/toastr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/front/css/mdtimepicker.css') }}">
        <link href="{{ asset('assets/admin/css/tagify.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/front/css/custom.css') }}" />
        <link rel="shortcut icon" href="{{ asset('assets/images/'.$gs->favicon) }}">
        @stack('css')

        @if(!empty($seo->google_analytics))
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                    dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', '{{ $seo->google_analytics }}');
        </script>
        @endif

    </head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->

    @if($gs->is_loader == 1)
        <div class="preloader" id="preloader" style="background: url({{asset('assets/images/'.$gs->loader)}}) no-repeat scroll center center #FFF;"></div>
    @endif


    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <!-- Start Navigation -->
            @includeIf('partials.front.nav')
        <!-- End Navigation -->
        <div class="clearfix"></div>
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->

        @yield('content')

        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->


    @if ($gs->is_cookie)
        @include('cookieConsent::index')
    @endif

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/front/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/front/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/front/js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/front/js/summernote.js')}}"></script>
    <script src="{{ asset('assets/front/js/slick.js')}}"></script>
    <script src="{{ asset('assets/front/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('assets/front/js/dropzone.js')}}"></script>
    <script src="{{ asset('assets/front/js/counterup.js')}}"></script>
    <script src="{{ asset('assets/front/js/lightbox.js')}}"></script>
    <script src="{{ asset('assets/front/js/moment.min.js')}}"></script>
    <script src="{{ asset('assets/front/js/daterangepicker.js')}}"></script>
    <script src="{{ asset('assets/front/js/lightbox.js')}}"></script>
    <script src="{{ asset('assets/front/js/jQuery.style.switcher.js')}}"></script>
    <script src="{{asset('assets/front/js/toastr.min.js')}}"></script>
    <script src="{{asset('assets/front/js/mdtimepicker.js')}}"></script>
    <script src="{{ asset('assets/admin/js/tagify.js') }}"></script>
    <script src="{{ asset('assets/front/js/custom.js')}}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->


    <script>
        'use strict';
		let mainurl = '{{ url('/') }}';
        let tawkto = '{{ $gs->is_talkto }}';
	</script>


    <script type="text/javascript">
        if(tawkto == 1){
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/62305c801ffac05b1d7ea682/{{ $gs->talkto}}';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
            })();
        }
    </script>


    <script>
        'use strict';

        @if(Session::has('message'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.warning("{{ session('warning') }}");
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.warning("{{ $error }}");
            @endforeach
        @endif
    </script>


    @stack('js')
</body>

</html>
