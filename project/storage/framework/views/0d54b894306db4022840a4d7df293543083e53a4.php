    <!-- Room Booking -->
    <div class="jb-apply-form bg-white rounded py-4 px-4 border mb-4">
        <h4 class="ft-bold mb-1"><?php echo app('translator')->get('Send a Message'); ?></h4>
        <form action="<?php echo e(route('front.listing.enquiry')); ?>" method="post">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="listing_id" value="<?php echo e($data->id); ?>">
            <input type="hidden" name="type" value="<?php echo e($data->type); ?>">

            <div class="Rego-boo-space mt-3">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label class="mb-1"><?php echo app('translator')->get('Email'); ?></label>
                            <input type="email" name="email" class="form-control border rounded ps-3" value="" placeholder="Email" autocomplete="off">
                        </div>
                    </div>


                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label class="mb-1"><?php echo app('translator')->get('Description'); ?></label>
                            <textarea class="form-control border rounded ps-3" name="details" placeholder="<?php echo app('translator')->get('Write your message'); ?>"></textarea>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <button type="submit" class="btn text-light rounded full-width theme-bg ft-medium"><?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/partials/front/listing/general.blade.php ENDPATH**/ ?>