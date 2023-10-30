<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between">
    <h5 class=" mb-0 text-gray-800 pl-3"><?php echo e(__('Edit Currency')); ?> <a class="btn btn-primary btn-rounded btn-sm" href="<?php echo e(route('admin.currency.index')); ?>"><i class="fas fa-arrow-left"></i> <?php echo e(__('Back')); ?></a></h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
        <li class="breadcrumb-item"><a href="javascript:;"><?php echo e(__('Payment Settings')); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.currency.index')); ?>"><?php echo e(__('Currencies')); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.currency.edit',$data->id)); ?>"><?php echo e(__('Edit Category')); ?></a></li>
    </ol>
    </div>
</div>

<div class="row justify-content-center mt-3">
  <div class="col-md-10">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Edit Currency Form')); ?></h6>
      </div>

      <div class="card-body">
       
        <form class="geniusform" action="<?php echo e(route('admin.currency.update',$data->id)); ?>" method="POST" enctype="multipart/form-data">

            <?php echo $__env->make('includes.admin.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo e(csrf_field()); ?>


            <div class="form-group">
              <label for="c-name"><?php echo e(__('Currency Name')); ?></label>
              <input type="text" class="form-control" name="name" placeholder="<?php echo e(__('Enter Currency Name')); ?>" required="" value="<?php echo e($data->name); ?>">
            </div>

          <div class="form-group">
            <label for="inp-sign"><?php echo e(__('Currency sign')); ?></label>
            <input type="text" class="form-control"  id="inp-sign" name="sign" placeholder="<?php echo e(__('Enter Currency Sign')); ?>" required="" value="<?php echo e($data->sign); ?>">
          </div>

          <div class="form-group">
            <label for="inp-value"><?php echo e(__('Value')); ?></label>
            <input type="text" class="form-control" id="inp-value" name="value" placeholder="<?php echo e(__('Enter Currency Value')); ?>" required="" value="<?php echo e($data->value); ?>">
          </div>

          <button type="submit" id="submit-btn" class="btn btn-primary w-100"><?php echo e(__('Submit')); ?></button>

        </form>
      </div>
    </div>
  </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/admin/currency/edit.blade.php ENDPATH**/ ?>