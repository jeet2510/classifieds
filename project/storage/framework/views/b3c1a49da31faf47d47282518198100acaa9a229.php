<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="d-sm-flex align-items-center justify-content-between">
    <h5 class=" mb-0 text-gray-800 pl-3"><?php echo e(__('Add New Directory')); ?> <a class="btn btn-primary btn-rounded btn-sm" href="<?php echo e(route('admin.listing.index')); ?>"><i class="fas fa-arrow-left"></i> <?php echo e(__('Back')); ?></a></h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
        <li class="breadcrumb-item"><a href="javascript:;"><?php echo e(__('Directory')); ?></a></li>
    </ol>
  </div>
</div>

<div class="row my-3">
    <div class="col-xl-4 col-md-6 mb-4">
        <a href="<?php echo e(route('admin.listing.create',['type'=>'restaurant'])); ?>">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo app('translator')->get('Restaurant'); ?></div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span><?php echo app('translator')->get('Create restaurant directory'); ?></span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-glass-cheers fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <a href="<?php echo e(route('admin.listing.create',['type'=>'hotel'])); ?>">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo app('translator')->get('Hotel'); ?></div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span><?php echo app('translator')->get('Create hotel directory'); ?></span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-pizza-slice fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <a href="<?php echo e(route('admin.listing.create',['type'=>'beauty'])); ?>">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo app('translator')->get('Beauty'); ?></div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span><?php echo app('translator')->get('Create beauty directory'); ?></span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-paint-roller fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <a href="<?php echo e(route('admin.listing.create',['type'=>'real_estate'])); ?>">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo app('translator')->get('Real Estate'); ?></div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span><?php echo app('translator')->get('Create beauty directory'); ?></span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <a href="<?php echo e(route('admin.listing.create',['type'=>'doctor'])); ?>">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo app('translator')->get('Doctor'); ?></div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span><?php echo app('translator')->get('Create beauty directory'); ?></span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-stethoscope fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <a href="<?php echo e(route('admin.listing.create',['type'=>'car'])); ?>">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo app('translator')->get('Car'); ?></div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span><?php echo app('translator')->get('Create job directory'); ?></span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-md fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>


</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/admin/listing/type.blade.php ENDPATH**/ ?>