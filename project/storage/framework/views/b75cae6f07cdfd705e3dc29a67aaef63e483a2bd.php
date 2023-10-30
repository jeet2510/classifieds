

<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="d-sm-flex align-items-center justify-content-between py-3">
    <h5 class=" mb-0 text-gray-800 pl-3"><?php echo e(__('Website Maintenance')); ?></h5>
    <ol class="breadcrumb py-0 m-0">
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
        <li class="breadcrumb-item"><a href="javascript:;"><?php echo e(__('General Settings')); ?></a></li>
    </ol>
  </div>
</div>

<div class="row justify-content-center mt-3">
  <div class="col-lg-12">
    <!-- Form Basic -->
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Website Maintenance')); ?></h6>
      </div>

      <div class="card-body">
        <div class="gocover" style="background: url(<?php echo e(asset('assets/images/'.$gs->admin_loader)); ?>) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
        <form class="geniusform" action="<?php echo e(route('admin.gs.update')); ?>" method="POST" enctype="multipart/form-data">

            <?php echo $__env->make('includes.admin.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo e(csrf_field()); ?>


            <div class="form-group">
              <label for="inp-title"><?php echo e(__('Website Maintenance')); ?></label>
              <div class="frm-btn btn-group mb-1">
                <button type="button" class="btn btn-sm btn-rounded dropdown-toggle btn-<?php echo e($gs->is_maintain == 1 ? 'success' : 'danger'); ?>" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <?php echo e($gs->is_maintain == 1 ? __('Activated') : __('Deactivated')); ?>

                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item drop-change" href="javascript:;" data-status="1" data-val="<?php echo e(__('Activated')); ?>" data-href="<?php echo e(route('admin.gs.status',['is_maintain',1])); ?>"><?php echo e(__('Activate')); ?></a>
                  <a class="dropdown-item drop-change" href="javascript:;" data-status="0" data-val="<?php echo e(__('Deactivated')); ?>" data-href="<?php echo e(route('admin.gs.status',['is_maintain',0])); ?>"><?php echo e(__('Deactivate')); ?></a>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="inp-maintain_text"><?php echo e(__('Maintenance Text')); ?></label>
              <textarea class="form-control summernote" name="maintain_text" required=""><?php echo e($gs->maintain_text); ?></textarea>
            </div> 

            <button type="submit" id="submit-btn" class="btn btn-primary w-100"><?php echo e(__('Submit')); ?></button>

        </form>
      </div>
    </div>
  </div>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/admin/generalsetting/maintain.blade.php ENDPATH**/ ?>