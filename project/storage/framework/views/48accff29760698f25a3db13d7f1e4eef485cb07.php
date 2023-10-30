<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- =============================== Dashboard Header ========================== -->
    <?php if ($__env->exists('partials.user.header')) echo $__env->make('partials.user.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- =============================== Dashboard Header ========================== -->

    <!-- ======================= dashboard Detail ======================== -->
    <div class="dashboard-wrap gray px-4 py-5">
        <a class="mobNavigation" data-bs-toggle="collapse" href="#MobNav" role="button" aria-expanded="false" aria-controls="MobNav">
            <i class="fas fa-bars me-2"></i><?php echo app('translator')->get('Listing'); ?>
        </a>
        <div class="collapse" id="MobNav">
            <?php if ($__env->exists('partials.user.sidebar')) echo $__env->make('partials.user.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="dashboard-content">
            <div class="dashboard-tlbar d-block mb-5">
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12">
                        <h1 class="ft-medium"><?php echo app('translator')->get('Hello'); ?>, <?php echo e(auth()->user()->name); ?></h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-muted"><a href="<?php echo e(route('front.index')); ?>"><?php echo app('translator')->get('Home'); ?></a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('user.dashboard')); ?>" class="theme-cl"><?php echo app('translator')->get('Dashboard'); ?></a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">

                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="dsd-boxed-widget py-5 px-4 bg-danger rounded">
                            <h2 class="ft-medium mb-1 fs-xl text-light count"><?php echo e($active_listings); ?></h2>
                            <p class="p-0 m-0 text-light fs-md"><?php echo app('translator')->get('Active Listings'); ?></p>
                            <i class="lni lni-empty-file"></i>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="dsd-boxed-widget py-5 px-4 bg-success rounded">
                            <h2 class="ft-medium mb-1 fs-xl text-light count"><?php echo e($view_listings); ?></h2>
                            <p class="p-0 m-0 text-light fs-md"><?php echo app('translator')->get('Views Listing'); ?></p>
                            <i class="lni lni-eye"></i>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="dsd-boxed-widget py-5 px-4 bg-warning rounded">
                            <h2 class="ft-medium mb-1 fs-xl text-light count"><?php echo e($total_reviews); ?></h2>
                            <p class="p-0 m-0 text-light fs-md"><?php echo app('translator')->get('Total Reviews'); ?></p>
                            <i class="lni lni-comments"></i>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="dsd-boxed-widget py-5 px-4 bg-purple rounded">
                            <h2 class="ft-medium mb-1 fs-xl text-light count"><?php echo e($total_bookings); ?></h2>
                            <p class="p-0 m-0 text-light fs-md"><?php echo app('translator')->get('Total Bookings'); ?></p>
                            <i class="lni lni-wallet"></i>
                        </div>
                    </div>
                </div>

                <!-- row -->
                <div class="row">

                    <!-- Area Chart -->
                    <div class="col-md-8 col-sm-12">
                        <div class="dashboard-grouping-list invoices with-icons">
                            <h4><?php echo app('translator')->get('Subscriptiona'); ?></h4>
                            <ul>
                                <?php if(count($subscriptions) == 0): ?>
                                    <li>
                                        <p><?php echo app('translator')->get('No Subscription Found'); ?></p>
                                    </li>
                                <?php else: ?>
                                    <?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <i class="dsd-icon-uiyo ti-files text-<?php echo e($data->status == 1 ? 'success':'pending'); ?> bg-light-<?php echo e($data->status == 1 ? 'success':'pending'); ?>"></i>
                                            <strong><?php echo e($data->plan->title); ?> Plan</strong>
                                            <ul>
                                                <?php if($data->status == 1): ?>
                                                    <li class="paid"><?php echo app('translator')->get('paid'); ?></li>
                                                <?php else: ?>
                                                    <li class="pending"><?php echo app('translator')->get('pending'); ?></li>
                                                <?php endif; ?>
                                                <li><?php echo app('translator')->get('Order No'); ?>: #<?php echo e($data->subscription_number); ?></li>
                                                <li><?php echo app('translator')->get('Date'); ?>: <?php echo e($data->created_at->format('d M Y')); ?></li>
                                            </ul>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>

                    <!-- Donut Chart -->
                    <div class="col-md-4 col-sm-12">
                        <div class="dash-card">
                            <div class="dash-card-header">
                                <h4>Followers</h4>
                            </div>
                            <?php if(count($followers) == 0): ?>
                                <div class="ground-list ground-hover-list">
                                    <div class="ground ground-list-single">
                                        <p><?php echo app('translator')->get('No Follower Found'); ?></p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <?php $__currentLoopData = $followers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="ground-list ground-hover-list">
                                        <div class="ground ground-list-single">
                                            <a href="#">
                                                <img class="ground-avatar" src="<?php echo e(asset('assets/images/'.$data->user->photo)); ?>" alt="...">
                                                <span class="profile-status bg-online pull-right"></span>
                                            </a>

                                            <div class="ground-content">
                                                <h6><a href="#"><?php echo e($data->user->name); ?></a></h6>
                                                <small class="text-fade"><i class="fas fa-map-marker-alt me-1"></i><?php echo e($data->user->address); ?></small>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
                <!-- /.row -->


            </div>

            <!-- footer -->
            <div class="row">
                <div class="col-md-12">
                    <div class="py-3">
                        <?php
                            echo $gs->copyright;
                        ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- ======================= dashboard Detail End ======================== -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <!-- Morris.js charts -->
    <script src="<?php echo e(asset('assets/front/js/plugins/raphael/raphael.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/front/js/plugins/morris.js/morris.min.js')); ?>"></script>

    <!-- Custom Chart JavaScript -->
    <script src="<?php echo e(asset('assets/front/js/plugins/dashboard-2.js')); ?>"></script>
    <!-- ============================================================== -->

    <script>
      'use strict';

      function myFunction() {
        var copyText = document.getElementById("cronjobURL");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
        $.notify("Referral url copied", "info");
    }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/user/dashboard.blade.php ENDPATH**/ ?>