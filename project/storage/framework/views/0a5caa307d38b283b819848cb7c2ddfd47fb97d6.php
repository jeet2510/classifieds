<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between py-3">
    <h5 class=" mb-0 text-gray-800 pl-3"><?php echo e(__('Add New Role')); ?> <a class="btn btn-primary btn-rounded btn-sm" href="<?php echo e(route('admin.role.index')); ?>"><i class="fas fa-arrow-left"></i> <?php echo e(__('Back')); ?></a></h5>
    <ol class="breadcrumb py-0 m-0">
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
        <li class="breadcrumb-item"><a href="javascript:;"><?php echo e(__('Roles')); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.role.index')); ?>"><?php echo e(__('Manage Roles')); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.role.create')); ?>"><?php echo e(__('Add New Role')); ?></a></li>
    </ol>
    </div>
</div>

<div class="row justify-content-center mt-3">
  <div class="col-md-10">
    <!-- Form Basic -->
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Add Role Form')); ?></h6>
      </div>

      <div class="card-body">
        <div class="gocover" style="background: url(<?php echo e(asset('assets/images/'.$gs->admin_loader)); ?>) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
        <form class="geniusform" action="<?php echo e(route('admin.role.store')); ?>" method="POST" enctype="multipart/form-data">

            <?php echo $__env->make('includes.admin.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo e(csrf_field()); ?>


          <div class="form-group">
              <label for="inp-name"><?php echo e(__('Role Name')); ?></label>
              <input type="text" class="form-control" id="inp-name" name="name"  placeholder="<?php echo e(__('Enter Role Name')); ?>" value="" required>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-switch">
                  <input type="checkbox" name="section[]" value="Menu Builder" class="custom-control-input" id="menu_builder">
                  <label class="custom-control-label" for="menu_builder"><?php echo e(__('Menu Builder')); ?></label>
                  </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-switch">
                  <input type="checkbox" name="section[]" value="Manage Plan" class="custom-control-input" id="manage_plann">
                  <label class="custom-control-label" for="manage_plann"><?php echo e(__('Manage Plan')); ?></label>
                  </div>
              </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" name="section[]" value="Categories" class="custom-control-input" id="Categories">
                    <label class="custom-control-label" for="Categories"><?php echo e(__('Categories')); ?></label>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" name="section[]" value="Amenities" class="custom-control-input" id="Amenities">
                    <label class="custom-control-label" for="Amenities"><?php echo e(__('Amenities')); ?></label>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" name="section[]" value="Locations" class="custom-control-input" id="Locations">
                    <label class="custom-control-label" for="Locations"><?php echo e(__('Locations')); ?></label>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" name="section[]" value="Directory Listing" class="custom-control-input" id="Directory Listing">
                    <label class="custom-control-label" for="Directory Listing"><?php echo e(__('Directory Listing')); ?></label>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" name="section[]" value="Directory Reviews" class="custom-control-input" id="Directory Reviews">
                    <label class="custom-control-label" for="Directory Reviews"><?php echo e(__('Directory Reviews')); ?></label>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" name="section[]" value="Booking Request" class="custom-control-input" id="Booking Request">
                    <label class="custom-control-label" for="Booking Request"><?php echo e(__('Booking Request')); ?></label>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" name="section[]" value="Directory Enquiry" class="custom-control-input" id="Directory Enquiry">
                    <label class="custom-control-label" for="Directory Enquiry"><?php echo e(__('Directory Enquiry')); ?></label>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-switch">
                  <input type="checkbox" name="section[]" value="Manage Customers" class="custom-control-input" id="manage_customers">
                  <label class="custom-control-label" for="manage_customers"><?php echo e(__('Manage Customers')); ?></label>
                  </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-switch">
                  <input type="checkbox" name="section[]" value="Transactions" class="custom-control-input" id="transactions">
                  <label class="custom-control-label" for="transactions"><?php echo e(__('Transactions')); ?></label>
                  </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-switch">
                  <input type="checkbox" name="section[]" value="Manage Blog" class="custom-control-input" id="manage_blog">
                  <label class="custom-control-label" for="manage_blog"><?php echo e(__('Manage Blog')); ?></label>
                  </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-switch">
                  <input type="checkbox" name="section[]" value="General Settings" class="custom-control-input" id="general_setting">
                  <label class="custom-control-label" for="general_setting"><?php echo e(__('General Settings')); ?></label>
                  </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-switch">
                  <input type="checkbox" name="section[]" value="Home Page Manage" class="custom-control-input" id="homepage_manage">
                  <label class="custom-control-label" for="homepage_manage"><?php echo e(__('Home Page Manage')); ?></label>
                  </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-switch">
                  <input type="checkbox" name="section[]" value="Email Settings" class="custom-control-input" id="email_setting">
                  <label class="custom-control-label" for="email_setting"><?php echo e(__('Email Settings')); ?></label>
                  </div>
              </div>
            </div>


            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-switch">
                  <input type="checkbox" name="section[]" value="Message" class="custom-control-input" id="Message">
                  <label class="custom-control-label" for="Message"><?php echo e(__('Message')); ?></label>
                  </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-switch">
                  <input type="checkbox" name="section[]" value="Payment Settings" class="custom-control-input" id="payment_setting">
                  <label class="custom-control-label" for="payment_setting"><?php echo e(__('Payment Settings')); ?></label>
                  </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-switch">
                  <input type="checkbox" name="section[]" value="Manage Roles" class="custom-control-input" id="manage_roles">
                  <label class="custom-control-label" for="manage_roles"><?php echo e(__('Manage Roles')); ?></label>
                  </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-switch">
                  <input type="checkbox" name="section[]" value="Manage Staff" class="custom-control-input" id="manage_staff">
                  <label class="custom-control-label" for="manage_staff"><?php echo e(__('Manage Staff')); ?></label>
                  </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-switch">
                  <input type="checkbox" name="section[]" value="Language Manage" class="custom-control-input" id="language_setting">
                  <label class="custom-control-label" for="language_setting"><?php echo e(__('Language Manage')); ?></label>
                  </div>
              </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" name="section[]" value="Fonts" class="custom-control-input" id="font">
                    <label class="custom-control-label" for="font"><?php echo e(__('Fonts')); ?></label>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-switch">
                  <input type="checkbox" name="section[]" value="Menu Page Settings" class="custom-control-input" id="menupage_setting">
                  <label class="custom-control-label" for="menupage_setting"><?php echo e(__('Menu Page Settings')); ?></label>
                  </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-switch">
                  <input type="checkbox" name="section[]" value="Seo Tools" class="custom-control-input" id="seo_tools">
                  <label class="custom-control-label" for="seo_tools"><?php echo e(__('Seo Tools')); ?></label>
                  </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-switch">
                  <input type="checkbox" name="section[]" value="Sitemaps" class="custom-control-input" id="Sitemaps">
                  <label class="custom-control-label" for="Sitemaps"><?php echo e(__('Sitemaps')); ?></label>
                  </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <div class="custom-control custom-switch">
                  <input type="checkbox" name="section[]" value="Subscribers" class="custom-control-input" id="subscribers">
                  <label class="custom-control-label" for="subscribers"><?php echo e(__('Subscribers')); ?></label>
                  </div>
              </div>
            </div>

          </div>
          <hr>

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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/admin/role/create.blade.php ENDPATH**/ ?>