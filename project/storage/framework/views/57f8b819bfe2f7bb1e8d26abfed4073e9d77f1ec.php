<?php if(isset($data)): ?>
    <div class="row">
        <div class="col-lg-3">
            <div class="left-area">
                <h4 class="heading"><?php echo e(__('Car Price')); ?></h4>
            </div>
        </div>

        <div class="col-lg-9">
            <input type="text" class="input-field" name="car_price" placeholder="<?php echo e(__('Car Price')); ?>" value="<?php echo e($data->car_price); ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="left-area">
                <h4 class="heading"><?php echo e(__('Fuel type')); ?></h4>
            </div>
        </div>

        <div class="col-lg-9">
            <input type="text" class="input-field" name="car_fuel_type" placeholder="<?php echo e(__('Fuel type')); ?>" value="<?php echo e($data->car_fuel_type); ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="left-area">
                <h4 class="heading"><?php echo e(__('Year of Manufacture')); ?></h4>
            </div>
        </div>

        <div class="col-lg-9">
            <input type="text" class="input-field" name="car_manufacture_year" placeholder="<?php echo e(__('Example: 2010')); ?>" value="<?php echo e($data->car_manufacture_year); ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="left-area">
                <h4 class="heading"><?php echo e(__('Engine capacity')); ?></h4>
            </div>
        </div>

        <div class="col-lg-9">
            <input type="text" class="input-field" name="car_engine_capacity" placeholder="<?php echo e(__('Example: 500 cc')); ?>" value="<?php echo e($data->car_engine_capacity); ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="left-area">
                <h4 class="heading"><?php echo e(__('Mileage')); ?></h4>
            </div>
        </div>

        <div class="col-lg-9">
            <input type="text" class="input-field" name="car_mileage" placeholder="<?php echo e(__('Example: 22 KM/L')); ?>" value="<?php echo e($data->car_mileage); ?>">
        </div>
    </div>
<?php else: ?>
    <div class="row">
        <div class="col-lg-3">
            <div class="left-area">
                <h4 class="heading"><?php echo e(__('Car Price')); ?></h4>
            </div>
        </div>

        <div class="col-lg-9">
            <input type="text" class="input-field" name="car_price" placeholder="<?php echo e(__('Car Price')); ?>" value="">
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="left-area">
                <h4 class="heading"><?php echo e(__('Fuel type')); ?></h4>
            </div>
        </div>

        <div class="col-lg-9">
            <input type="text" class="input-field" name="car_fuel_type" placeholder="<?php echo e(__('Fuel type')); ?>" value="">
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="left-area">
                <h4 class="heading"><?php echo e(__('Year of Manufacture')); ?></h4>
            </div>
        </div>

        <div class="col-lg-9">
            <input type="text" class="input-field" name="car_manufacture_year" placeholder="<?php echo e(__('Example: 2010')); ?>" value="">
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="left-area">
                <h4 class="heading"><?php echo e(__('Engine capacity')); ?></h4>
            </div>
        </div>

        <div class="col-lg-9">
            <input type="text" class="input-field" name="car_engine_capacity" placeholder="<?php echo e(__('Example: 500 cc')); ?>" value="">
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="left-area">
                <h4 class="heading"><?php echo e(__('Mileage')); ?></h4>
            </div>
        </div>

        <div class="col-lg-9">
            <input type="text" class="input-field" name="car_mileage" placeholder="<?php echo e(__('Example: 22 KM/L')); ?>" value="">
        </div>
    </div>

<?php endif; ?>

<?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/partials/admin/listing/car.blade.php ENDPATH**/ ?>