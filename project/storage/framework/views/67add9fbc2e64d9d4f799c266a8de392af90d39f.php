<?php if(isset($faqs)): ?>
    <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <input type="hidden" name="faq_id[]" value="<?php echo e($faq->id); ?>">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('FAQ Items')); ?></h6>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="left-area">
                            <h4 class="heading"><?php echo e(__('Name')); ?> *</h4>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <input type="text" class="input-field" name="faq_name[]" placeholder="<?php echo e(__('Enter Name')); ?>" value="<?php echo e($faq->faq_name); ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="left-area">
                            <h4 class="heading"><?php echo e(__('Description')); ?> *</h4>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <textarea name="faq_details[]" class="input-field" placeholder="<?php echo e(__('Description')); ?>" cols="30" rows="10"><?php echo e($faq->faq_details); ?></textarea>
                    </div>
                </div>


            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php else: ?>
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('FAQ Items')); ?></h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left-area">
                        <h4 class="heading"><?php echo e(__('Name')); ?> *</h4>
                    </div>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="input-field" name="faq_name[]" placeholder="<?php echo e(__('Enter Name')); ?>" value="">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="left-area">
                        <h4 class="heading"><?php echo e(__('Description')); ?> *</h4>
                    </div>
                </div>
                <div class="col-lg-9">
                    <textarea name="faq_details[]" class="input-field" placeholder="<?php echo e(__('Description')); ?>" cols="30" rows="10"></textarea>
                </div>
            </div>

        </div>
    </div>
<?php endif; ?>

<?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/partials/user/listing/faq.blade.php ENDPATH**/ ?>