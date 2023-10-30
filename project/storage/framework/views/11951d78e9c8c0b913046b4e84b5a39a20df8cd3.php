<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- =============================== Dashboard Header ========================== -->
    <?php if ($__env->exists('partials.user.header')) echo $__env->make('partials.user.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- =============================== Dashboard Header ========================== -->

    <!-- ======================= dashboard Detail ======================== -->
    <div class="dashboard-wrap gray px-4 py-5">
        <a class="mobNavigation" data-bs-toggle="collapse" href="#MobNav" role="button" aria-expanded="false" aria-controls="MobNav">
            <i class="fas fa-bars me-2"></i><?php echo app('translator')->get('Dashboard Navigation'); ?>
        </a>
        <div class="collapse" id="MobNav">
            <?php if ($__env->exists('partials.user.sidebar')) echo $__env->make('partials.user.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="dashboard-content">
            <div class="dashboard-tlbar d-block mb-5">
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12">
                        <h1 class="ft-medium"><?php echo app('translator')->get('Customer Enquiry'); ?></h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-muted"><a href="<?php echo e(route('front.index')); ?>"><?php echo app('translator')->get('Home'); ?></a></li>
                                <li class="breadcrumb-item text-muted"><a href="<?php echo e(route('user.dashboard')); ?>"><?php echo app('translator')->get('Dashboard'); ?></a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="dashboard-list-wraps bg-white rounded mb-4">
                            <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                <div class="dashboard-list-wraps-flx">
                                    <h4 class="mb-0 ft-medium fs-md"><i class="fas fa-shopping-basket me-2 theme-cl fs-sm"></i><?php echo app('translator')->get('All Enquiries'); ?></h4>
                                </div>
                            </div>

                            <div class="dashboard-list-wraps-body py-3 px-3">
                                <div class="dashboard-bookings-wraps">
                                    <?php if(count($enquires) == 0): ?>
                                        <h3 class="text-center"><?php echo app('translator')->get('No Data Found'); ?></h3>
                                    <?php else: ?>
                                        <?php $__currentLoopData = $enquires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <!-- Single booking List -->
                                            <div class="dsd-single-bookings-wraps">
                                                <div class="dsd-single-book-thumb"><img src="<?php echo e(asset('assets/images/'.$data->user->photo)); ?>" class="img-fluid circle" alt="" /></div>
                                                <div class="dsd-single-book-caption">
                                                    <div class="dsd-single-book-title"><h5><?php echo e($data->user->name); ?><span class="bko-dates"><?php echo e($data->user->created_at->format('d M, Y h:i A')); ?></span></h5></div>
                                                    <div class="dsd-single-descr">
                                                        <div class="dsd-single-item">
                                                            <span class="dsd-item-title"><?php echo app('translator')->get('Listing Item'); ?>:</span>
                                                            <span class="dsd-item-info"><?php echo e($data->listing->name); ?></span>
                                                        </div>

                                                        <div class="dsd-single-item">
                                                            <span class="dsd-item-title"><?php echo app('translator')->get('Mail'); ?>:</span>
                                                            <span class="dsd-item-info"><?php echo e($data->email); ?></span>
                                                        </div>

                                                        <div class="dsd-single-item">
                                                            <span class="dsd-item-title"><?php echo app('translator')->get('Message'); ?>:</span>
                                                            <span class="dsd-item-info"><?php echo e($data->details); ?></span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/user/enquiry/customer.blade.php ENDPATH**/ ?>