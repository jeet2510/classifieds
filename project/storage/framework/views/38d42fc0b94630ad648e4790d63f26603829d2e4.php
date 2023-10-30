<?php $__env->startSection('content'); ?>
<div class="card">
   <div class="d-sm-flex align-items-center justify-content-between py-3">
      <h5 class=" mb-0 text-gray-800 pl-3"><?php echo e(__('Update Menu Builder')); ?></h5>
      <ol class="breadcrumb py-0 m-0">
         <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
         <li class="breadcrumb-item"><a href="<?php echo e(route('admin.gs.menubuilder')); ?>"><?php echo e(__('Update Menu Builder')); ?></a></li>
      </ol>
   </div>
</div>

<div class="row justify-content-center mt-3">
   <div class="col-xl-4">
      <div class="card mb-4">
         <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between border-bottom">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Select From Built In Menus')); ?></h6>
         </div>
         <div class="card-body ">
            <div class="row menu-builder">
               <div class="col-lg-12">
                  <ul class="list-group">
                     <li class="list-group-item d-flex justify-content-between">
                        <span class="menu-items"><?php echo e(__('Home')); ?></span>
                        <a data-title="<?php echo e(__('Home')); ?>" data-dropdown="no" data-href="/" data-target="self" class="btn btn-primary btn-sm btn-rounded addToMenu" href="javascript:;"><?php echo e(__('Add To Menu')); ?></a>
                     </li>

                     <li class="list-group-item d-flex justify-content-between">
                        <span class="menu-items"><?php echo e(__('Listing')); ?></span>
                        <a data-title="<?php echo e(__('Listing')); ?>" data-dropdown="no" data-href="/listing" data-target="self" class="btn btn-primary btn-sm btn-rounded addToMenu" href="javascript:;"><?php echo e(__('Add To Menu')); ?></a>
                     </li>

                     <li class="list-group-item d-flex justify-content-between">
                        <span class="menu-items"><?php echo e(__('Pricing')); ?></span>
                        <a data-title="<?php echo e(__('Pricing')); ?>" data-dropdown="no" data-href="/pricing-plans" data-target="self" class="btn btn-primary btn-sm btn-rounded addToMenu" href="javascript:;"><?php echo e(__('Add To Menu')); ?></a>
                     </li>

                     <li class="list-group-item d-flex justify-content-between">
                        <span class="menu-items"><?php echo e(__('Blog')); ?></span>
                        <a data-title="<?php echo e(__('Blog')); ?>" data-dropdown="no" data-href="/blogs" data-target="self" class="btn btn-primary btn-sm btn-rounded addToMenu" href="javascript:;"><?php echo e(__('Add To Menu')); ?></a>
                     </li>

                     <li class="list-group-item d-flex justify-content-between">
                        <span class="menu-items"><?php echo e(__('Contact')); ?></span>
                        <a data-title="<?php echo e(__('Contact')); ?>" data-dropdown="no" data-href="/contact" data-target="self" class="btn btn-primary btn-sm btn-rounded addToMenu" href="javascript:;"><?php echo e(__('Add To Menu')); ?></a>
                     </li>


                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-xl-4">
      <div class="card mb-4">
         <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between border-bottom">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Add Custom Menu')); ?></h6>
         </div>
         <div class="card-body">
            <div class="alert alert-danger show__url__validation" style="display: none" role="alert">
               <button type="button" class="close hide-close" aria-label="Close">
                 <span aria-hidden="true">×</span>
               </button>
               <p class="m-0"><?php echo e(__('Url Not Valid')); ?></p>
             </div>

            <div class="form-group">
               <label for="title"><?php echo e(__('Title')); ?> *</label>
               <input type="text" class="form-control" id="title"
                  placeholder="<?php echo e(__('Enter Title')); ?>" value="" required>
            </div>

            <div class="form-group">
               <label for="url"><?php echo e(__('Url')); ?> *</label>
               <input type="text" class="form-control" id="url"
                  placeholder="<?php echo e(__('Enter Url')); ?>" value="" required>
            </div>

            

            <div class="form-group">
               <label for="target"><?php echo e(__('Target')); ?> *</label>
               <select class="form-control" id="target">
                  <option value="self"><?php echo e(__('Self')); ?></option>
                  <option value="blank"><?php echo e(__('New Tab')); ?></option>
               </select>
            </div>

            <div class="form-group">
               <button type="button" id="custom-submit" class="btn btn-primary btn-block w-100 mx-0"><?php echo e(__('Submit')); ?></button>
            </div>
         </div>
      </div>
   </div>
   <div class="col-xl-4">
      <div class="card mb-4">
         <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between border-bottom">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Website Menus')); ?></h6>
         </div>
         <div class="card-body">
            <form class="admin-form geniusform" action="<?php echo e(route('admin.gs.update')); ?>" method="POST" enctype="multipart/form-data">
               <?php echo csrf_field(); ?>
               <?php echo $__env->make('includes.admin.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               <input type="hidden" name="menu" value="menu">
               <div id="section-list">
                  <?php if(!empty($gs->menu)): ?>
                  <?php $__currentLoopData = json_decode($gs->menu,true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="card mt-2  draggable-item">
                     <div class="card-body">
                        <div class="media">
                           <div class="media-body">
                              <h5 class="mb-1 mt-0"><?php echo e($menu['title']); ?></h5>
                              <input type="hidden" name="<?php echo e($key); ?>[title]" value="<?php echo e($menu['title']); ?>">
                              <input type="hidden" name="<?php echo e($key); ?>[dropdown]" value="<?php echo e($menu['dropdown']); ?>">
                              <input type="hidden" name="<?php echo e($key); ?>[href]" value="<?php echo e($menu['href']); ?>">
                              <input type="hidden" name="<?php echo e($key); ?>[target]" value="<?php echo e($menu['target']); ?>">
                           </div>
                           <i class="remove-menu fa fa-trash-alt"></i>
                        </div>
                     </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
               </div>
               <div class="form-group my-2">
                  <button type="submit"  class="btn btn-primary btn-block w-100 mx-0"><?php echo e(__('Submit')); ?></button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/admin/menubuilder/index.blade.php ENDPATH**/ ?>