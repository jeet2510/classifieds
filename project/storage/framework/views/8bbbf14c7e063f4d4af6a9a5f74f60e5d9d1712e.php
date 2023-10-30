<?php $__env->startSection('content'); ?>


<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between py-3">
    <h5 class=" mb-0 text-gray-800 pl-3"><?php echo e(__('Website Contents')); ?></h5>
    <ol class="breadcrumb m-0 py-0">
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
        <li class="breadcrumb-item"><a href="javascript:;"><?php echo e(__('General Settings')); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.gs.contents')); ?>"><?php echo e(__('Website Contents')); ?></a></li>
    </ol>
    </div>
</div>

  <div class="card mb-4 mt-3">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Website Contents Form')); ?></h6>
    </div>

    <div class="card-body">
      <div class="gocover" style="background: url(<?php echo e(asset('assets/images/'.$gs->admin_loader)); ?>) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
      <form class="geniusform" action="<?php echo e(route('admin.gs.update')); ?>" method="POST" enctype="multipart/form-data">

          <?php echo $__env->make('includes.admin.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <?php echo e(csrf_field()); ?>


          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="inp-title"><?php echo e(__('Login Email Verification')); ?></label>
                <div class="frm-btn btn-group mb-1">
                    <button type="button" class="btn btn-sm btn-rounded dropdown-toggle btn-<?php echo e($gs->is_verification_email == 1 ? 'success' : 'danger'); ?>" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <?php echo e($gs->is_verification_email == 1 ? __('Activated') : __('Deactivated')); ?>

                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item drop-change" href="javascript:;" data-status="1" data-val="<?php echo e(__('Activated')); ?>" data-href="<?php echo e(route('admin.gs.status',['is_verification_email',1])); ?>"><?php echo e(__('Activate')); ?></a>
                      <a class="dropdown-item drop-change" href="javascript:;" data-status="0" data-val="<?php echo e(__('Deactivated')); ?>" data-href="<?php echo e(route('admin.gs.status',['is_verification_email',0])); ?>"><?php echo e(__('Deactivate')); ?></a>
                    </div>
                  </div>
              </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                  <label for="inp-title"><?php echo e(__('Enable Force SSL Redirection')); ?></label>
                  <div class="frm-btn btn-group mb-1">
                      <button type="button" class="btn btn-sm btn-rounded dropdown-toggle btn-<?php echo e($gs->is_ssl == 1 ? 'success' : 'danger'); ?>" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <?php echo e($gs->is_ssl == 1 ? __('Activated') : __('Deactivated')); ?>

                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item drop-change" href="javascript:;" data-status="1" data-val="<?php echo e(__('Activated')); ?>" data-href="<?php echo e(route('admin.gs.status',['is_ssl',1])); ?>"><?php echo e(__('Activate')); ?></a>
                        <a class="dropdown-item drop-change" href="javascript:;" data-status="0" data-val="<?php echo e(__('Deactivated')); ?>" data-href="<?php echo e(route('admin.gs.status',['is_ssl',0])); ?>"><?php echo e(__('Deactivate')); ?></a>
                      </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                  <label for="inp-title"><?php echo e(__('Disqus')); ?></label>
                  <div class="frm-btn btn-group mb-1">
                    <button type="button" class="btn btn-sm btn-rounded dropdown-toggle btn-<?php echo e($gs->is_disqus == 1 ? 'success' : 'danger'); ?>" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <?php echo e($gs->is_disqus == 1 ? __('Activated') : __('Deactivated')); ?>

                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item drop-change" href="javascript:;" data-status="1" data-val="<?php echo e(__('Activated')); ?>" data-href="<?php echo e(route('admin.gs.status',['is_disqus',1])); ?>"><?php echo e(__('Activate')); ?></a>
                      <a class="dropdown-item drop-change" href="javascript:;" data-status="0" data-val="<?php echo e(__('Deactivated')); ?>" data-href="<?php echo e(route('admin.gs.status',['is_disqus',0])); ?>"><?php echo e(__('Deactivate')); ?></a>
                    </div>
                  </div>
                </div>
              </div>
          </div>


        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="inp-title"><?php echo e(__('Tawk.to')); ?></label>
              <div class="frm-btn btn-group mb-1">
                  <button type="button" class="btn btn-sm btn-rounded dropdown-toggle btn-<?php echo e($gs->is_talkto == 1 ? 'success' : 'danger'); ?>" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <?php echo e($gs->is_talkto == 1 ? __('Activated') : __('Deactivated')); ?>

                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item drop-change" href="javascript:;" data-status="1" data-val="<?php echo e(__('Activated')); ?>" data-href="<?php echo e(route('admin.gs.status',['is_talkto',1])); ?>"><?php echo e(__('Activate')); ?></a>
                    <a class="dropdown-item drop-change" href="javascript:;" data-status="0" data-val="<?php echo e(__('Deactivated')); ?>" data-href="<?php echo e(route('admin.gs.status',['is_talkto',0])); ?>"><?php echo e(__('Deactivate')); ?></a>
                  </div>
                </div>
            </div>
          </div>


            <div class="col-md-6">
              <div class="form-group">
                <div class="cp-container" id="cp3-container">
                  <div class="input-group" title="Using input value">
                      <input  type="color" name="colors"  class="form-control"  value="<?php echo e($gs->colors); ?>" id="exampleInputPassword1">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                  <label for="inp-name"><?php echo e(__('Time Zone')); ?></label>
                  <?php
                  $timezone_identifiers =
                      DateTimeZone::listIdentifiers(DateTimeZone::ALL);

                  echo "<select name='time_zone' class='form-control mb-3' required>";

                  echo "<option disabled selected>
                          Please Select Timezone
                        </option>";

                  for($i = 0; $i < count($timezone_identifiers); $i++) {
                    if($gs->time_zone == $timezone_identifiers[$i]){
                          $msg = 'selected';
                      }else{
                          $msg = '';
                      }
                      echo "<option value='" . $timezone_identifiers[$i] ."' ".$msg.">" . $timezone_identifiers[$i] . "</option>";
                  }

                  echo "</select>";
                ?>
                </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for="inp-phone_code"><?php echo e(__('Tawk.to ID')); ?></label>
                <input type="text" class="form-control" id="inp-phone_code" name="talkto"  placeholder="<?php echo e(__('Enter phone code')); ?>" value="<?php echo e($gs->talkto); ?>" required>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for="inp-title"><?php echo e(__('Website Title')); ?></label>
                <input type="text" class="form-control" id="inp-title" name="title"  placeholder="<?php echo e(__('Enter Website Title')); ?>" value="<?php echo e($gs->title); ?>" required>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for="inp-disqus"><?php echo e(__('Disqus Website Short Name')); ?></label>
                <input type="text" class="form-control" id="inp-disqus" name="disqus"  placeholder="<?php echo e(__('Disqus Website Short Name')); ?>" value="<?php echo e($gs->disqus); ?>" required>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for="inp-name"><?php echo e(__('Currency Format')); ?></label>
                <select class="form-control mb-3" name="currency_format">
                  <option value="" selected><?php echo e(__('Select Category')); ?></option>
                  <option value="0" <?php echo e($gs->currency_format== 0 ? 'selected':''); ?>><?php echo e(__('Before Price')); ?></option>
                  <option value="1" <?php echo e($gs->currency_format== 1 ? 'selected':''); ?>><?php echo e(__('After Price')); ?></option>
                </select>
              </div>
            </div>
        </div>

        <button type="submit" id="submit-btn" class="btn btn-primary w-100"><?php echo e(__('Submit')); ?></button>
      </form>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/admin/generalsetting/websitecontent.blade.php ENDPATH**/ ?>