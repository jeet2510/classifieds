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
                        <h1 class="ft-medium"><?php echo app('translator')->get('Listing Type'); ?></h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-muted"><a href="<?php echo e(route('front.index')); ?>"><?php echo app('translator')->get('Home'); ?></a></li>
                                <li class="breadcrumb-item"><a href="#" class="theme-cl"><?php echo app('translator')->get('Add Listing'); ?></a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <?php if(now()<auth()->user()->plan_end_date): ?>
                            <h3><?php echo app('translator')->get('You have'); ?> <?php echo e(auth()->user()->ad_limit); ?> <?php echo app('translator')->get('directory left to add.'); ?></h3>
                        <?php else: ?>
                            <h3><?php echo app('translator')->get('Current plan date expired!'); ?></h3>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <a href="<?php echo e(route('user.listing.create',['type'=>'restaurant'])); ?>">
                            <div class="dsd-boxed-widget py-5 px-4 bg-danger rounded">
                                <p class="p-0 m-0 text-light fs-md"><?php echo app('translator')->get('Restaurant'); ?></p>
                                <i class="lni lni-empty-file"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <a href="<?php echo e(route('user.listing.create',['type'=>'hotel'])); ?>">
                            <div class="dsd-boxed-widget py-5 px-4 bg-success rounded">
                                <p class="p-0 m-0 text-light fs-md"><?php echo app('translator')->get('Hotel'); ?></p>
                                <i class="lni lni-empty-file"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <a href="<?php echo e(route('user.listing.create',['type'=>'beauty'])); ?>">
                            <div class="dsd-boxed-widget py-5 px-4 bg-warning rounded">
                                <p class="p-0 m-0 text-light fs-md"><?php echo app('translator')->get('Beauty'); ?></p>
                                <i class="lni lni-empty-file"></i>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <a href="<?php echo e(route('user.listing.create',['type'=>'real_estate'])); ?>">
                            <div class="dsd-boxed-widget py-5 px-4 bg-purple rounded">
                                <p class="p-0 m-0 text-light fs-md"><?php echo app('translator')->get('Real Estate'); ?></p>
                                <i class="lni lni-empty-file"></i>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <a href="<?php echo e(route('user.listing.create',['type'=>'doctor'])); ?>">
                            <div class="dsd-boxed-widget py-5 px-4 bg-info rounded">
                                <p class="p-0 m-0 text-light fs-md"><?php echo app('translator')->get('Doctor'); ?></p>
                                <i class="lni lni-empty-file"></i>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <a href="<?php echo e(route('user.listing.create',['type'=>'car'])); ?>">
                            <div class="dsd-boxed-widget py-5 px-4 bg-secondary rounded">
                                <p class="p-0 m-0 text-light fs-md"><?php echo app('translator')->get('Car'); ?></p>
                                <i class="lni lni-empty-file"></i>
                            </div>
                        </a>
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

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/user/listing/type.blade.php ENDPATH**/ ?>