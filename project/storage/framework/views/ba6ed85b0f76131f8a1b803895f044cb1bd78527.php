<?php $__env->startSection('content'); ?>


    <div class="card">
        <div class="d-sm-flex align-items-center justify-content-between py-3">
        <h5 class=" mb-0 text-gray-800 pl-3"><?php echo e(__('System Purchase Activation')); ?></h5>
        <ol class="breadcrumb py-0 m-0">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>

            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.profile')); ?>"><?php echo e(__('System Activation')); ?></a></li>
        </ol>
        </div>
    </div>


    <!-- Row -->
    <div class="row mt-3">
      <!-- Datatables -->
      <div class="col-lg-12">

        <?php echo $__env->make('includes.admin.form-success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card mb-4">
            <div class="card-body">
              <div class="gocover" style="background: url(<?php echo e(asset('assets/images/'.$gs->admin_loader)); ?>) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
              <?php if($activation_data != ""): ?>
                        <div class="row">
                            <div class="col-lg-12 text-center" style="color:darkgreen">
                                <?php
                                    echo $activation_data;
                                ?>

                            </div>
                        </div>
                    <?php else: ?>
              <form class="geniusform" action="<?php echo e(route('admin-activate-purchase')); ?>" method="POST" enctype="multipart/form-data">

                  <?php echo $__env->make('includes.admin.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                  <?php echo e(csrf_field()); ?>


                  <div class="form-group">
                    <label for="inp-extented"><?php echo e(__('Purchase Code')); ?> *</label>
                    <p class="sub-heading"><a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank"><?php echo e(__('How to get purchase code?')); ?></a></p>
                    <input class="form-control" name="pcode" id="admin_name" placeholder="<?php echo e(__('Enter Purchase Code')); ?>" required="" value="" type="text">
                  </div>
                  <button type="submit" id="submit-btn" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
              </form>
              <?php endif; ?>
            </div>
          </div>
      </div>
    </div>
    <!--Row-->




<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/admin/activation.blade.php ENDPATH**/ ?>