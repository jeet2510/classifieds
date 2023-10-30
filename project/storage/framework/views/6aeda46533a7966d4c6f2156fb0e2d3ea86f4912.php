<?php if(isset($menus)): ?>
    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <input type="hidden" name="menu_id[]" value="<?php echo e($menu->id); ?>">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Menu Items')); ?></h6>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="left-area">
                            <h4 class="heading"><?php echo e(__('Menu Name')); ?> *</h4>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <input type="text" class="input-field" name="menu_title[]" placeholder="<?php echo e(__('Enter Name')); ?>" value="<?php echo e($menu->menu_title); ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="left-area">
                            <h4 class="heading"><?php echo e(__('Menu Price')); ?> *</h4>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <input type="number" class="input-field" name="menu_price[]" placeholder="<?php echo e(__('Enter Price')); ?>" value="<?php echo e($menu->menu_price); ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="left-area">
                            <h4 class="heading"><?php echo e(__('Menu Photo')); ?></h4>
                            <p class="sub-heading">(<?php echo e(__('Preferred Size 600 x 600')); ?>)</p>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="wrapper-image-preview">
                            <div class="box">
                                <div class="back-preview-image" style="background-image: url(<?php echo e($menu->menu_photo ? asset('assets/images/'.$menu->menu_photo) : asset('assets/images/default.png')); ?>);"></div>
                                <div class="upload-options">
                                    <label class="img-upload-label" for="menu-items-<?php echo e($key); ?>"><i class="fas fa-camera"></i> <?php echo e(__('Upload Picture')); ?> </label>
                                    <input id="menu-items-<?php echo e($key); ?>" type="file" class="image-upload" name="menu_photo[]" accept="image/*">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php else: ?>
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Menu Items')); ?></h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left-area">
                        <h4 class="heading"><?php echo e(__('Menu Name')); ?> *</h4>
                    </div>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="input-field" name="menu_title[]" placeholder="<?php echo e(__('Enter Name')); ?>" value="">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="left-area">
                        <h4 class="heading"><?php echo e(__('Menu Price')); ?> *</h4>
                    </div>
                </div>
                <div class="col-lg-9">
                    <input type="number" class="input-field" name="menu_price[]" placeholder="<?php echo e(__('Enter Price')); ?>" value="">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="left-area">
                        <h4 class="heading"><?php echo e(__('Menu Photo')); ?></h4>
                        <p class="sub-heading">(<?php echo e(__('Preferred Size 600 x 600')); ?>)</p>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="wrapper-image-preview">
                        <div class="box">
                            <div class="back-preview-image" style="background-image: url(<?php echo e(asset('assets/images/default.png')); ?>);"></div>
                            <div class="upload-options">
                                <label class="img-upload-label" for="menu-items-1"><i class="fas fa-camera"></i> <?php echo e(__('Upload Picture')); ?> </label>
                                <input id="menu-items-1" type="file" class="image-upload" name="menu_photo[]" accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php endif; ?>

<?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/partials/user/listing/menu.blade.php ENDPATH**/ ?>