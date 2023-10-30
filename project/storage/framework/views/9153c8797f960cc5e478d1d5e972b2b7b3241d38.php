<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between py-3">
      <h5 class=" mb-0 text-gray-800 pl-3"><?php echo e(__('Manage Theme')); ?></h5>
        <ol class="breadcrumb m-0 py-0">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
            <li class="breadcrumb-item"><a href="javascript:;"><?php echo e(__('General Settings')); ?></a></li>
        </ol>
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-6">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Theme 1')); ?></h6>
        </div>

        <div class="card-body">
          <div class="row justify-content-center">

          <div class="gocover" style="background: url(<?php echo e(asset('assets/images/'.$gs->admin_loader)); ?>) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
            <form action="<?php echo e(route('admin.gs.update')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo $__env->make('includes.admin.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo e(csrf_field()); ?>


                <div class="form-group">
                    <div class="wrapper-image-preview-settings">
                        <div class="box-settings">
                            <div class="back-preview-image" style="background-image: url(<?php echo e(asset('assets/images/1.png')); ?>);"></div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="theme" value="theme-1">
                <?php if($gs->theme == 'theme-1'): ?>
                    <button type="submit" class="btn btn-secondary btn-block" disabled><?php echo e(__('Selected')); ?></button>
                <?php else: ?>
                    <button type="submit" id="submit-btn" class="btn btn-primary btn-block"><?php echo e(__('Select as active')); ?></button>
                <?php endif; ?>

            </form>
        </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Theme 2')); ?></h6>
        </div>

        <div class="card-body">
          <div class="row justify-content-center">

          <form action="<?php echo e(route('admin.gs.update')); ?>" method="POST" enctype="multipart/form-data">
              <?php echo $__env->make('includes.admin.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

              <?php echo e(csrf_field()); ?>


              <div class="form-group">
                  <div class="wrapper-image-preview-settings">
                      <div class="box-settings">
                        <div class="back-preview-image" style="background-image: url(<?php echo e(asset('assets/images/2.png')); ?>);"></div>
                      </div>
                  </div>
              </div>
              <input type="hidden" name="theme" value="theme-2">
                <?php if($gs->theme == 'theme-2'): ?>
                    <button type="submit" class="btn btn-secondary btn-block" disabled><?php echo e(__('Selected')); ?></button>
                <?php else: ?>
                    <button type="submit" id="submit-btn" class="btn btn-primary btn-block"><?php echo e(__('Select as active')); ?></button>
                <?php endif; ?>

          </form>
        </div>
        </div>
      </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-6">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Theme 3')); ?></h6>
        </div>

        <div class="card-body">
          <div class="row justify-content-center">

          <div class="gocover" style="background: url(<?php echo e(asset('assets/images/'.$gs->admin_loader)); ?>) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
            <form action="<?php echo e(route('admin.gs.update')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo $__env->make('includes.admin.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <div class="wrapper-image-preview-settings">
                        <div class="box-settings">
                            <div class="back-preview-image" style="background-image: url(<?php echo e(asset('assets/images/3.png')); ?>);"></div>
                        </div>
                    </div>
                </div>
                    <input type="hidden" name="theme" value="theme-3">
                    <?php if($gs->theme == 'theme-3'): ?>
                        <button type="submit" class="btn btn-secondary btn-block" disabled><?php echo e(__('Selected')); ?></button>
                    <?php else: ?>
                        <button type="submit" id="submit-btn" class="btn btn-primary btn-block"><?php echo e(__('Select as active')); ?></button>
                    <?php endif; ?>

            </form>
        </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Theme 4')); ?></h6>
        </div>

        <div class="card-body">
            <div class="row justify-content-center">
                <form action="<?php echo e(route('admin.gs.update')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo $__env->make('includes.admin.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo e(csrf_field()); ?>


                    <div class="form-group">
                        <div class="wrapper-image-preview-settings">
                            <div class="box-settings">
                                <div class="back-preview-image" style="background-image: url(<?php echo e(asset('assets/images/4.png')); ?>);"></div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="theme" value="theme-4">
                    <?php if($gs->theme == 'theme-4'): ?>
                        <button type="submit" class="btn btn-secondary btn-block" disabled><?php echo e(__('Selected')); ?></button>
                    <?php else: ?>
                        <button type="submit" id="submit-btn" class="btn btn-primary btn-block"><?php echo e(__('Select as active')); ?></button>
                    <?php endif; ?>

                </form>
            </div>
        </div>
      </div>
    </div>
</div>

<div class="row d-plex justify-content-center mt-3">
    <div class="col-lg-6">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Theme 5')); ?></h6>
        </div>

        <div class="card-body">
          <div class="row justify-content-center">

          <div class="gocover" style="background: url(<?php echo e(asset('assets/images/'.$gs->admin_loader)); ?>) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
          <form action="<?php echo e(route('admin.gs.update')); ?>" method="POST" enctype="multipart/form-data">
              <?php echo $__env->make('includes.admin.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

              <?php echo e(csrf_field()); ?>


              <div class="form-group">
                  <div class="wrapper-image-preview-settings">
                      <div class="box-settings">
                          <div class="back-preview-image" style="background-image: url(<?php echo e(asset('assets/images/5.png')); ?>);"></div>
                      </div>
                  </div>
              </div>
              <input type="hidden" name="theme" value="theme-5">
                <?php if($gs->theme == 'theme-5'): ?>
                    <button type="submit" class="btn btn-secondary btn-block" disabled><?php echo e(__('Selected')); ?></button>
                <?php else: ?>
                    <button type="submit" id="submit-btn" class="btn btn-primary btn-block"><?php echo e(__('Select as active')); ?></button>
                <?php endif; ?>

          </form>
        </div>
        </div>
      </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/admin/generalsetting/theme.blade.php ENDPATH**/ ?>