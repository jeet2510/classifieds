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
                            <li class="breadcrumb-item active theme-cl" aria-current="page"><?php echo app('translator')->get('Contact Us'); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= Top Breadcrubms ======================== -->

    <!-- ======================= Contact Page Detail ======================== -->
    <section class="gray">
        <div class="container">

            <div class="row justify-content-center mb-5">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="sec_title position-relative text-center">
                        <h2 class="off_title"><?php echo e($ps->side_title); ?></h2>
                    </div>
                </div>
            </div>

            <div class="row align-items-start justify-content-center">

                <div class="col-xl-10 col-lg-11 col-md-12 col-sm-12">
                    <form class="row submit-form py-4 px-3 rounded bg-white mb-4" action="<?php echo e(route('front.contact.submit')); ?>" id="contactform">
                        <?php echo csrf_field(); ?>
                        <?php if ($__env->exists('includes.user.form-both')) echo $__env->make('includes.user.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="small text-dark ft-medium"><?php echo app('translator')->get('Your Name'); ?> *</label>
                                <input type="text" name="name" class="form-control" placeholder="<?php echo app('translator')->get('Your Name'); ?>">
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="small text-dark ft-medium"><?php echo app('translator')->get('Your Email'); ?> *</label>
                                <input type="email" name="email" class="form-control" placeholder="<?php echo app('translator')->get('Enter your email'); ?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="small text-dark ft-medium"><?php echo app('translator')->get('Your Phone'); ?></label>
                                <input type="text" name="phone" class="form-control" placeholder="+00 256 548 7542">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="small text-dark ft-medium"><?php echo app('translator')->get('Your Subject'); ?></label>
                                <input type="text" name="subject" class="form-control" placeholder="<?php echo app('translator')->get('Type Your Subject'); ?>">
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="small text-dark ft-medium"><?php echo app('translator')->get('Your Message'); ?></label>
                                <textarea name="message" class="form-control ht-80" placeholder="<?php echo app('translator')->get('Your Message...'); ?>"></textarea>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <button type="submit" class="btn theme-bg text-light btn-contact">
                                    <?php echo app('translator')->get('Send Message'); ?>
                                    <div class="spinner-border formSpin" role="status"></div>
                                </button>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="col-xl-10 col-lg-11 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-12">
                            <div class="bg-white rounded p-3 mb-2">
                                <h4 class="ft-medium mb-3 theme-cl"><?php echo app('translator')->get('Address info'); ?>:</h4>
                                <p>
                                    <?php
                                        echo $ps->street;
                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12">
                            <div class="bg-white rounded p-3 mb-2">
                                <h4 class="ft-medium mb-3 theme-cl"><?php echo app('translator')->get('Call Us'); ?>:</h4>
                                <p class="mb-2"><?php echo e($ps->phone); ?></p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12">
                            <div class="bg-white rounded p-3 mb-2">
                                <h4 class="ft-medium mb-3 theme-cl"><?php echo app('translator')->get('Drop A Mail'); ?>:</h4>
                                <p><?php echo app('translator')->get('Drop mail we will contact you within 24 hours.'); ?></p>
                                <p class="lh-1 text-dark"><?php echo e($ps->contact_email); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ======================= Contact Page End ======================== -->

    <!-- ======================= Newsletter Start ============================ -->
        <?php echo $__env->make('partials.front.cta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ======================= Newsletter Start ============================ -->

    <!-- ============================ Footer Start ================================== -->
    <?php echo $__env->make('partials.front.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ============================ Footer End ================================== -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/frontend/contact.blade.php ENDPATH**/ ?>