<?php $__env->startSection('content'); ?>

<div class="card">
	<div class="d-sm-flex align-items-center justify-content-between py-3">
        
        <ol class="breadcrumb py-0 m-0">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
            <li class="breadcrumb-item"><a href="javascript:;"><?php echo e(__('User')); ?></a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.user.index')); ?>"><?php echo e(__('Users')); ?></a></li>
        </ol>
	</div>
</div>


<div class="row justify-content-center mt-3">
  <div class="col-md-10">
    <!-- Form Basic -->
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Upload User Data')); ?></h6>
      </div>

      <div class="card-body">
       
        <form class="geniusform" action="<?php echo e(route('admin-user-import-data')); ?>" method="POST" enctype="multipart/form-data">

            <?php echo $__env->make('includes.admin.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo e(csrf_field()); ?>

            

            <div class="form-group">
                <label for="inp-name"><?php echo e(__('CSV File')); ?></label>
                <input type="file" class="form-control" id="inp-name" name="import_file"  placeholder="<?php echo e(__('Select FIle')); ?>"  required>
            </div>

            
            <button type="submit" id="submit-btn" class="btn btn-primary w-100"><?php echo e(__('Submit')); ?></button>

        </form>
      </div>
    </div>

    <!-- Form Sizing -->

    <!-- Horizontal Form -->

  </div>

</div>
<!--Row-->

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/admin/user/import.blade.php ENDPATH**/ ?>