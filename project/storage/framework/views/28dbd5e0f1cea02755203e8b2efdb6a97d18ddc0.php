<?php if(isset($rooms)): ?>
    <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <input type="hidden" name="room_id[]" value="<?php echo e($room->id); ?>">

        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Hotel room')); ?></h6>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="left-area">
                            <h4 class="heading"><?php echo e(__('Room Name')); ?> *</h4>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <input type="text" class="input-field" name="room_name[]" placeholder="<?php echo e(__('Enter Name')); ?>" value="<?php echo e($room->room_name); ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="left-area">
                            <h4 class="heading"><?php echo e(__('Room Price')); ?> *</h4>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <input type="number" class="input-field" name="room_price[]" placeholder="<?php echo e(__('Enter Price')); ?>" value="<?php echo e($room->room_price); ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="left-area">
                            <h4 class="heading"><?php echo e(__('Room Photo')); ?></h4>
                            <p class="sub-heading">(<?php echo e(__('Preferred Size 600 x 600')); ?>)</p>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="wrapper-image-preview">
                            <div class="box">
                                <div class="back-preview-image" style="background-image: url(<?php echo e($room->room_photo ? asset('assets/images/'.$room->room_photo) : asset('assets/images/default.png')); ?>);"></div>
                                <div class="upload-options">
                                    <label class="img-upload-label" for="room-items-1"><i class="fas fa-camera"></i> <?php echo e(__('Upload Picture')); ?> </label>
                                    <input id="room-items-1" type="file" class="image-upload" name="room_photo[]" accept="image/*">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-3">
                        <div class="left-area">
                            <h4 class="heading"><?php echo e(__('Room amenities')); ?></h4>
                            <p class="sub-heading"><?php echo e(__('Seperated By Comma(,)')); ?></p>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <input type="text" id="tags" class="mytags" name="room_amenities[]" placeholder="<?php echo e(__('Room amenities')); ?>"  value="<?php echo e($room->room_amenities); ?>">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-3">
                        <div class="left-area">
                            <h4 class="heading"><?php echo e(__('Room description')); ?></h4>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <textarea class="input-field" name="room_description[]" placeholder="<?php echo e(__('Room description')); ?>" cols="30" rows="10"><?php echo e($room->room_description); ?></textarea>
                    </div>
                </div>

            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Hotel room')); ?></h6>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left-area">
                        <h4 class="heading"><?php echo e(__('Room Name')); ?> *</h4>
                    </div>
                </div>
                <div class="col-lg-9">
                    <input type="text" class="input-field" name="room_name[]" placeholder="<?php echo e(__('Enter Name')); ?>" value="">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="left-area">
                        <h4 class="heading"><?php echo e(__('Room Price')); ?> *</h4>
                    </div>
                </div>
                <div class="col-lg-9">
                    <input type="number" class="input-field" name="room_price[]" placeholder="<?php echo e(__('Enter Price')); ?>" value="">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="left-area">
                        <h4 class="heading"><?php echo e(__('Room Photo')); ?></h4>
                        <p class="sub-heading">(<?php echo e(__('Preferred Size 600 x 600')); ?>)</p>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="wrapper-image-preview">
                        <div class="box">
                            <div class="back-preview-image" style="background-image: url(<?php echo e(asset('assets/images/placeholder.jpg')); ?>);"></div>
                            <div class="upload-options">
                                <label class="img-upload-label" for="room-items-1"><i class="fas fa-camera"></i> <?php echo e(__('Upload Picture')); ?> </label>
                                <input id="room-items-1" type="file" class="image-upload" name="room_photo[]" accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-3">
                    <div class="left-area">
                        <h4 class="heading"><?php echo e(__('Room amenities')); ?></h4>
                        <p class="sub-heading"><?php echo e(__('Seperated By Comma(,)')); ?></p>
                    </div>
                </div>

                <div class="col-lg-9">
                    <input type="text" class="mytags" name="room_amenities[]" placeholder="<?php echo e(__('Room amenities')); ?>"  value="">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-3">
                    <div class="left-area">
                        <h4 class="heading"><?php echo e(__('Room description')); ?></h4>
                    </div>
                </div>
                <div class="col-lg-9">
                    <textarea class="input-field" name="room_description[]" placeholder="<?php echo e(__('Room description')); ?>" cols="30" rows="10"></textarea>
                </div>
            </div>

        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/partials/user/listing/room.blade.php ENDPATH**/ ?>