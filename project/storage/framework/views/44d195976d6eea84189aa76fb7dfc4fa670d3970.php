<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- ======================= Top Breadcrubms ======================== -->
    <div class="bg-dark py-3">
        <div class="container">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('front.index')); ?>" class="text-light"><?php echo app('translator')->get('Home'); ?></a></li>
                            <li class="breadcrumb-item active theme-cl" aria-current="page"><?php echo app('translator')->get('Error Page'); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= Top Breadcrubms ======================== -->

    <!-- ======================= Product Detail ======================== -->
    <section>
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">

                    <!-- Icon -->
                    <div class=""><img src="<?php echo e(asset('assets/images/'.$gs->error_photo)); ?>" class="img-fluid" alt="" /></div>
                    <!-- Heading -->
                    <h1 class="mb-3 ft-bold"><?php echo e($gs->error_title); ?></h1>
                    <!-- Text -->
                    <h5 class="ft-medium fs-md mb-5"><?php echo e($gs->error_text); ?></h5>
                    <!-- Button -->
                    <a class="btn rounded theme-bg text-light" href="<?php echo e(route('front.index')); ?>"><?php echo app('translator')->get('Go To Home Page'); ?></a>
                </div>
            </div>

        </div>
    </section>
    <!-- ======================= Product Detail End ======================== -->

    <!-- ======================= Newsletter Start ============================ -->

    <!-- ======================= Newsletter Start ============================ -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/jeetpandya/Downloads/public_html/project/resources/views/errors/404.blade.php ENDPATH**/ ?>