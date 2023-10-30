<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- =============================== Dashboard Header ========================== -->
    <?php if ($__env->exists('partials.user.header')) echo $__env->make('partials.user.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- =============================== Dashboard Header ========================== -->

    <!-- ======================= dashboard Detail ======================== -->
    <div class="dashboard-wrap gray px-4 py-5">
        <a class="mobNavigation" data-bs-toggle="collapse" href="#MobNav" role="button" aria-expanded="false" aria-controls="MobNav">
            <i class="fas fa-bars me-2"></i><?php echo app('translator')->get('Dashboard Navigation'); ?>
        </a>
        <div class="collapse" id="MobNav">
            <?php if ($__env->exists('partials.user.sidebar')) echo $__env->make('partials.user.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="dashboard-content">
            <div class="dashboard-content">
                <div class="dashboard-tlbar d-block mb-5">
                    <div class="row">
                        <div class="colxl-12 col-lg-12 col-md-12">
                            <h1 class="ft-medium"><?php echo app('translator')->get('Manage Listings'); ?></h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item text-muted"><a href="<?php echo e(route('front.index')); ?>"><?php echo app('translator')->get('Home'); ?></a></li>
                                    <li class="breadcrumb-item"><a href="#" class="theme-cl"><?php echo app('translator')->get('Manage Listings'); ?></a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="dashboard-widg-bar d-block">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="dashboard-list-wraps bg-white rounded mb-4">
                                <div class="dashboard-list-wraps-head br-bottom py-3 px-3">
                                    <div class="dashboard-list-wraps-flx">
                                        <h4 class="mb-0 ft-medium fs-md"><i class="fa fa-file-alt me-2 theme-cl fs-sm"></i><?php echo app('translator')->get('My Listings'); ?></h4>
                                    </div>
                                </div>

                                <div class="dashboard-list-wraps-body py-3 px-3">
                                    <div class="dashboard-listing-wraps">
                                        <?php $__currentLoopData = $listings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <!-- Single Listing Item -->
                                            <div class="dsd-single-listing-wraps">
                                                <div class="dsd-single-lst-thumb"><img src="<?php echo e(asset('assets/images/'.$data->photo)); ?>" class="img-fluid" alt="" /></div>
                                                <div class="dsd-single-lst-caption">
                                                    <div class="dsd-single-lst-title"><h5><?php echo e($data->name); ?></h5></div>
                                                    <span class="agd-location"><i class="lni lni-map-marker me-1"></i><?php echo e($data->real_address); ?></span>
                                                    <?php if(count($data->reviews)>0): ?>
                                                        <div class="ico-content">
                                                            <div class="Rego-ft-first">
                                                                <div class="Rego-rating">
                                                                    <div class="Rego-rates">
                                                                        <?php
                                                                            $rate = ceil($data->directoryRatting($data->id));
                                                                        ?>

                                                                        <?php for($i=1; $i<=$rate; $i++): ?>
                                                                            <i class="fas fa-star active"></i>
                                                                        <?php endfor; ?>

                                                                        <?php for($i=1; $i<=(5-$rate); $i++): ?>
                                                                            <i class="fas fa-star"></i>
                                                                        <?php endfor; ?>
                                                                    </div>
                                                                </div>
                                                                <div class="Rego-price-range">
                                                                    <span class="ft-medium"><?php echo e($data->directoryRatting($data->id)); ?> <?php echo app('translator')->get('Reviews'); ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>

                                                    <div class="dsd-single-lst-footer">
                                                        <a href="<?php echo e(route('user.listing.edit',[$data->id,'type' => $data->type])); ?>" class="btn btn-edit mr-1"><i class="fas fa-edit me-1"></i><?php echo app('translator')->get('Edit'); ?></a>
                                                        <a href="<?php echo e(route('front.listing.details',$data->slug)); ?>" class="btn btn-view mr-1"><i class="fas fa-eye me-1"></i><?php echo app('translator')->get('View'); ?></a>
                                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#confirm-delete" data-href="<?php echo e(route('user.listing.delete',$data->id)); ?>" class="btn btn-delete">
                                                            <i class="fas fa-trash me-1"></i>
                                                            <?php echo app('translator')->get('Delete'); ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- footer -->
            <div class="row">
                <div class="col-md-12">
                    <div class="py-3">
                        <?php
                            echo $gs->copyright;
                        ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- ======================= dashboard Detail End ======================== -->

    <div class="modal modal-blur fade" id="confirm-delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4">
              <h3><?php echo e(__('Are you sure')); ?>?</h3>
              <div class="text-muted"><?php echo e(__("You are about to delete this favourite.")); ?></div>
            </div>
            <div class="modal-footer">
              <div class="w-100">
                <div class="d-flex justify-content-center gap-10px">
                  <a href="#" class="btn btn-outline-info w-100" data-bs-dismiss="modal">
                      <?php echo e(__('Cancel')); ?>

                    </a>

                    <a href="javascript:;" class="btn btn-danger w-100 btn-ok text-white">
                      <?php echo e(__('Delete')); ?>

                    </a>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script type="text/javascript">
    'use strict';

      $('#confirm-delete').on('show.bs.modal', function(e) {
          $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
      });

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/user/listing/index.blade.php ENDPATH**/ ?>