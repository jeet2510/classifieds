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
                        <h1 class="ft-medium"><?php echo app('translator')->get('Pricing Plans'); ?></h1>
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
                                    <h4 class="mb-0 ft-medium fs-md"><i class="fas fa-shopping-basket me-2 theme-cl fs-sm"></i><?php echo app('translator')->get('All Plans'); ?></h4>
                                </div>
                            </div>

                            <div class="dashboard-list-wraps-body py-3 px-3">
                                <div class="dashboard-bookings-wraps">
                                    <div class="row">
                                        <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                                <div class="Rego-price-wrap">
                                                    <div class="Rego-author-header">
                                                        <div class="Rego-price-currency">
                                                            <h3>
                                                                <span class="Rego-new-price" style="color:<?php echo e($data->price_color); ?>"><?php echo e(globalCurrency()->sign); ?><del><?php echo e(showAmount($data->price)); ?></del></span>
                                                                <?php if($data->prev_price>0): ?>
                                                                    <span class="Rego-old-price"><?php echo e(globalCurrency()->sign); ?><del><?php echo e(showAmount($data->prev_price)); ?></del></span>
                                                                <?php endif; ?>
                                                            </h3>
                                                        </div>
                                                        <div class="Rego-price-title">
                                                            <div class="Rego-price-tlt">
                                                                <h4><?php echo e($data->title); ?></h4>
                                                            </div>

                                                        </div>
                                                        <div class="Rego-price-subtitle"><?php echo e($data->subtitle); ?></div>
                                                    </div>
                                                    <div class="Rego-price-body">
                                                        <ul class="price__features">
                                                            <?php if($data->attribute != NULL): ?>
                                                                <?php $__currentLoopData = json_decode($data->attribute); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li><i class="fa fa-angle-right"></i><?php echo e($attribute); ?></li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                    <div class="Rego-price-bottom">
                                                        <?php if(auth()->user()->plan_id == $data->id): ?>
                                                            <a class="Rego-price-btn" href="javascript:;">
                                                                <?php echo app('translator')->get('Current Plan'); ?>
                                                            </a>
                                                            <div class="text-end mt-2">
                                                                (<?php echo e(auth()->user()->plan_end_date ? auth()->user()->plan_end_date->toDateString() : ''); ?>) <a href="<?php echo e(route('user.package.subscription',$data->id)); ?>" class="text--base"><?php echo app('translator')->get('Renew Plan'); ?></a>
                                                            </div>
                                                        <?php else: ?>
                                                            <a class="Rego-price-btn" href="<?php echo e(route('user.package.subscription',$data->id)); ?>">
                                                                <i class="fas fa-shopping-basket"></i>
                                                                <?php echo app('translator')->get('Purchase Now'); ?>
                                                            </a>
                                                        <?php endif; ?>
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

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/user/packages/index.blade.php ENDPATH**/ ?>