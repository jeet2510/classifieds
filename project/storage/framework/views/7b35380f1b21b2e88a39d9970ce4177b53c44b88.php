<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- ======================= Login Detail ======================== -->
    <section class="gray">
        <div class="container">
            <div class="row align-items-start justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-12">

                    <div class="signup-screen-wrap">
                        <div class="signup-screen-single light">
                            <div class="text-center mb-4">
                                <h4 class="m-0 ft-medium"><?php echo app('translator')->get('Create An Account'); ?></h4>
                            </div>

                            <form id="registerform" class="row gy-3" action="<?php echo e(route('user.register.submit')); ?>" method="POST">
                                <?php if ($__env->exists('includes.user.form-both')) echo $__env->make('includes.user.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="mb-1"><?php echo app('translator')->get('Your Name'); ?></label>
                                            <input type="text" name="name" class="form-control rounded" placeholder="<?php echo app('translator')->get('Your Name'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                        <label class="mb-1"><?php echo app('translator')->get('Email'); ?></label>
                                        <input type="text" name="email" class="form-control rounded" placeholder="<?php echo app('translator')->get('Email'); ?>">
                                    </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="mb-1"><?php echo app('translator')->get('User Name'); ?></label>
                                    <input type="text" name="username" class="form-control rounded" placeholder="<?php echo app('translator')->get('User Name'); ?>">
                                </div>

                                <div class="form-group">
                                    <label class="mb-1"><?php echo app('translator')->get('User Phone'); ?></label>
                                    <input type="text" name="phone" class="form-control rounded" placeholder="<?php echo app('translator')->get('User Phone'); ?>">
                                </div>

                                <div class="form-group">
                                    <label class="mb-1"><?php echo app('translator')->get('Password'); ?></label>
                                    <input type="password" name="password" class="form-control rounded" placeholder="<?php echo app('translator')->get('Password'); ?>*">
                                </div>

                                <div class="form-group">
                                    <label class="mb-1"><?php echo app('translator')->get('Confirm Password'); ?></label>
                                    <input type="password" name="password_confirmation" class="form-control rounded" placeholder="<?php echo app('translator')->get('Confirm Password'); ?>*">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-md full-width theme-bg text-light rounded ft-medium">
                                        <?php echo app('translator')->get('Sign Up'); ?>
                                        <div class="spinner-border formSpin" role="status"></div>
                                    </button>
                                </div>

                                <div class="form-group text-center mt-4 mb-0">
                                    <p class="mb-0"><?php echo app('translator')->get('Have You Already An account'); ?>? <a href="<?php echo e(route('user.login')); ?>" class="ft-medium text-success"><?php echo app('translator')->get('Sign In'); ?></a></p>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ======================= Login End ======================== -->

    <!-- ======================= Newsletter Start ============================ -->
        <?php echo $__env->make('partials.front.cta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ======================= Newsletter Start ============================ -->

    <!-- ============================ Footer Start ================================== -->
    <?php echo $__env->make('partials.front.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ============================ Footer End ================================== -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/user/register.blade.php ENDPATH**/ ?>