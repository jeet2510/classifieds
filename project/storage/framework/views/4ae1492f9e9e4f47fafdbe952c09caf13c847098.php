<!DOCTYPE html>
<html lang="zxx">
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
        <title><?php echo e($gs->title); ?></title>

        <link href="<?php echo e(asset('assets/front/css/styles.css')); ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(asset('assets/front/css/styles.php?color='.str_replace('#','',$gs->colors))); ?>">

        <?php if($default_font->font_value): ?>
            <link href="https://fonts.googleapis.com/css?family=<?php echo e($default_font->font_value); ?>&display=swap" rel="stylesheet">
        <?php else: ?>
            <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <?php endif; ?>

        <?php if($default_font->font_family): ?>
            <link rel="stylesheet" id="colorr" href="<?php echo e(asset('assets/front/css/font.php?font_familly='.$default_font->font_family)); ?>">
        <?php else: ?>
            <link rel="stylesheet" id="colorr" href="<?php echo e(asset('assets/front/css/font.php?font_familly='."Open Sans")); ?>">
        <?php endif; ?>

        <link href="<?php echo e(asset('assets/front/css/summernote.css')); ?>" rel="stylesheet" >
        <link rel="stylesheet" href="<?php echo e(asset('assets/front/css/toastr.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/front/css/mdtimepicker.css')); ?>">
        <link href="<?php echo e(asset('assets/admin/css/tagify.css')); ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(asset('assets/front/css/custom.css')); ?>" />
        <link rel="shortcut icon" href="<?php echo e(asset('assets/images/'.$gs->favicon)); ?>">
        <?php echo $__env->yieldPushContent('css'); ?>

        <?php if(!empty($seo->google_analytics)): ?>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                    dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', '<?php echo e($seo->google_analytics); ?>');
        </script>
        <?php endif; ?>

    </head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->

    <?php if($gs->is_loader == 1): ?>
        <div class="preloader" id="preloader" style="background: url(<?php echo e(asset('assets/images/'.$gs->loader)); ?>) no-repeat scroll center center #FFF;"></div>
    <?php endif; ?>


    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <!-- Start Navigation -->
            <?php if ($__env->exists('partials.front.nav')) echo $__env->make('partials.front.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End Navigation -->
        <div class="clearfix"></div>
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->

        <?php echo $__env->yieldContent('content'); ?>

        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->


    <?php if($gs->is_cookie): ?>
        <?php echo $__env->make('cookieConsent::index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo e(asset('assets/front/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/front/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/front/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/front/js/summernote.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/front/js/slick.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/front/js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/front/js/dropzone.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/front/js/counterup.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/front/js/lightbox.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/front/js/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/front/js/daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/front/js/lightbox.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/front/js/jQuery.style.switcher.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/front/js/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/front/js/mdtimepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/admin/js/tagify.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/front/js/custom.js')); ?>"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->


    <script>
        'use strict';
		let mainurl = '<?php echo e(url('/')); ?>';
        let tawkto = '<?php echo e($gs->is_talkto); ?>';
	</script>


    <script type="text/javascript">
        if(tawkto == 1){
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/62305c801ffac05b1d7ea682/<?php echo e($gs->talkto); ?>';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
            })();
        }
    </script>


    <script>
        'use strict';

        <?php if(Session::has('message')): ?>
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.success("<?php echo e(session('message')); ?>");
        <?php endif; ?>

        <?php if(Session::has('error')): ?>
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.error("<?php echo e(session('error')); ?>");
        <?php endif; ?>

        <?php if(Session::has('info')): ?>
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.info("<?php echo e(session('info')); ?>");
        <?php endif; ?>

        <?php if(Session::has('warning')): ?>
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.warning("<?php echo e(session('warning')); ?>");
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.warning("<?php echo e($error); ?>");
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </script>


    <?php echo $__env->yieldPushContent('js'); ?>
</body>

</html>
<?php /**PATH /Users/jeetpandya/Downloads/public_html/project/resources/views/layouts/front.blade.php ENDPATH**/ ?>