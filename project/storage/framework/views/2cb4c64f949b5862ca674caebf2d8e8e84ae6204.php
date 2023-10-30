<section class="bg-cover position-relative" style="background:red url(<?php echo e(auth()->user()->breadcumb ? asset('assets/images/'.auth()->user()->breadcumb) : asset('assets/front/img/cover.jpg')); ?>) no-repeat;" data-overlay="3">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

                <div class="dashboard-head-author-clicl">
                    <div class="dashboard-head-author-thumb">
                        <img src="<?php echo e(auth()->user()->photo ? asset('assets/images/'.auth()->user()->photo) : asset('assets/front/img/t-7.png')); ?>" class="img-fluid" alt="" />
                    </div>
                    <div class="dashboard-head-author-caption">
                        <div class="dashploio"><h4><?php echo e(auth()->user()->name); ?></h4></div>
                        <div class="dashploio"><span class="agd-location"><i class="lni lni-map-marker me-1"></i><?php echo e(auth()->user()->address); ?></span></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/partials/user/header.blade.php ENDPATH**/ ?>