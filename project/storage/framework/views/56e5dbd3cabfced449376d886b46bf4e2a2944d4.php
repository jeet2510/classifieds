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
                        <h1 class="ft-medium"><?php echo app('translator')->get('My Bookings'); ?></h1>
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
                                    <h4 class="mb-0 ft-medium fs-md"><i class="fas fa-shopping-basket me-2 theme-cl fs-sm"></i><?php echo app('translator')->get('All Bookings'); ?></h4>
                                </div>
                            </div>

                            <div class="dashboard-list-wraps-body py-3 px-3">
                                <div class="dashboard-bookings-wraps">
                                    <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$listing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <!-- Single booking List -->
                                        <div class="dsd-single-bookings-wraps">
                                            <div class="dsd-single-book-thumb"><img src="<?php echo e(asset('assets/images/'.$listing->user->photo)); ?>" class="img-fluid circle" alt="" /></div>
                                            <div class="dsd-single-book-caption">
                                                <div class="dsd-single-book-title"><h5><?php echo e($listing->user->name); ?><span class="bko-dates"><?php echo e($listing->user->created_at->format('d M Y')); ?></span></h5></div>
                                                <div class="ico-content">
                                                    <ul>
                                                        <li>
                                                            <div class="px-2 py-1 medium bg-light-<?php echo e($listing->status == 0 ? 'warning' :($listing->status == 1 ? 'success':'danger')); ?> rounded text-<?php echo e($listing->status == 0 ? 'danger' :($listing->status == 1 ? 'success':'primary')); ?>">
                                                                <?php if($listing->status == 0): ?>
                                                                    <?php echo app('translator')->get('Pending'); ?>
                                                                <?php elseif($listing->status == 1): ?>
                                                                    <?php echo app('translator')->get('Approved'); ?>
                                                                <?php else: ?>
                                                                    <?php echo app('translator')->get('Rejected'); ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="dsd-single-descr">
                                                    <div class="dsd-single-item">
                                                        <span class="dsd-item-title"><?php echo app('translator')->get('Listing Item'); ?>:</span>
                                                        <span class="dsd-item-info"><?php echo e($listing->listing->name); ?></span>
                                                    </div>

                                                    <div class="dsd-single-item">
                                                        <span class="dsd-item-title"><?php echo app('translator')->get('Booking Date'); ?>:</span>
                                                        <span class="dsd-item-info"><?php echo e($listing->checkin_date->format('d M Y')); ?> <?php echo e($listing->type == 'hotel' ? ' -- '.$listing->checkout_date->format('d M Y') : ''); ?></span>
                                                    </div>

                                                    <?php if($listing->type == 'beauty'): ?>
                                                        <div class="dsd-single-item">
                                                            <span class="dsd-item-title"><?php echo app('translator')->get('Service Name'); ?>:</span>
                                                            <span class="dsd-item-info"><?php echo e($listing->service->service_name); ?></span>
                                                        </div>

                                                        <?php if($listing->note): ?>
                                                            <div class="dsd-single-item">
                                                                <span class="dsd-item-title"><?php echo app('translator')->get('Note'); ?>:</span>
                                                                <span class="dsd-item-info"><?php echo e($listing->note); ?></span>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                    <?php if($listing->type != 'beauty'): ?>
                                                        <div class="dsd-single-item">
                                                            <span class="dsd-item-title"><?php echo app('translator')->get('Member'); ?>:</span>
                                                            <span class="dsd-item-info"><?php echo e($listing->adults); ?> <?php echo app('translator')->get('Adults'); ?>, <?php echo e($listing->kids); ?> <?php echo app('translator')->get('Child'); ?></span>
                                                        </div>
                                                    <?php endif; ?>

                                                    <div class="dsd-single-item">
                                                        <span class="dsd-item-title"><?php echo app('translator')->get('Mail'); ?>:</span>
                                                        <span class="dsd-item-info"><?php echo e($listing->user->name); ?></span>
                                                    </div>

                                                    <div class="dsd-single-item">
                                                        <span class="dsd-item-title"><?php echo app('translator')->get('Phone'); ?>:</span>
                                                        <span class="dsd-item-info"><?php echo e($listing->user->phone); ?></span>
                                                    </div>
                                                </div>
                                                <div class="dsd-single-book-footer">
                                                    <a href="<?php echo e(route('user.booking.conversation',$listing->id)); ?>" class="btn btn-message"><i class="fas fa-envelope me-1"></i><?php echo app('translator')->get('Message'); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/user/booking/mybooking.blade.php ENDPATH**/ ?>