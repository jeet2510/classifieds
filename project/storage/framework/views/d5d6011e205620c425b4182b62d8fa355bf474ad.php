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
            <div class="dashboard-tlbar d-block mb-5">
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12">
                        <h1 class="ft-medium"><?php echo app('translator')->get('Beauty Booking Request'); ?></h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-muted"><a href="<?php echo e(route('front.index')); ?>"><?php echo app('translator')->get('Home'); ?></a></li>
                                <li class="breadcrumb-item text-muted"><a href="<?php echo e(route('user.dashboard')); ?>"><?php echo app('translator')->get('Dashboard'); ?></a></li>
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
                                    <h4 class="mb-0 ft-medium fs-md"><i class="fas fa-shopping-basket me-2 theme-cl fs-sm"></i><?php echo app('translator')->get('All Bookings'); ?></h4>
                                </div>
                            </div>

                            <div class="dashboard-list-wraps-body py-3 px-3">
                                <div class="dashboard-bookings-wraps">
                                    <?php $__currentLoopData = $beauties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$beauty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <!-- Single booking List -->
                                        <div class="dsd-single-bookings-wraps">
                                            <div class="dsd-single-book-thumb"><img src="<?php echo e(asset('assets/images/'.$beauty->user->photo)); ?>" class="img-fluid circle" alt="" /></div>
                                            <div class="dsd-single-book-caption">
                                                <div class="dsd-single-book-title"><h5><?php echo e($beauty->user->name); ?><span class="bko-dates"><?php echo e($beauty->user->created_at->format('d M Y')); ?></span></h5></div>
                                                <div class="ico-content">
                                                    <ul>
                                                        <li>
                                                            <div class="px-2 py-1 medium bg-light-<?php echo e($beauty->status == 0 ? 'warning' :($beauty->status == 1 ? 'success':'danger')); ?> rounded text-<?php echo e($beauty->status == 0 ? 'danger' :($beauty->status == 1 ? 'success':'primary')); ?>">
                                                                <?php if($beauty->status == 0): ?>
                                                                    <?php echo app('translator')->get('Pending'); ?>
                                                                <?php elseif($beauty->status == 1): ?>
                                                                    <?php echo app('translator')->get('Approved'); ?>
                                                                <?php else: ?>
                                                                    <?php echo app('translator')->get('Rejected'); ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="dsd-single-descr">
                                                    <div class="dsd-single-item">
                                                        <span class="dsd-item-title"><?php echo app('translator')->get('Listing Item'); ?>:</span>
                                                        <span class="dsd-item-info"><?php echo e($beauty->listing->name); ?></span>
                                                    </div>

                                                    <div class="dsd-single-item">
                                                        <span class="dsd-item-title"><?php echo app('translator')->get('Booking Date'); ?>:</span>
                                                        <span class="dsd-item-info"><?php echo e($beauty->checkin_date->format('d M Y')); ?></span>
                                                    </div>

                                                    <div class="dsd-single-item">
                                                        <span class="dsd-item-title"><?php echo app('translator')->get('Service Name'); ?>:</span>
                                                        <span class="dsd-item-info"><?php echo e($beauty->service->service_name); ?></span>
                                                    </div>

                                                    <?php if($beauty->note): ?>
                                                        <div class="dsd-single-item">
                                                            <span class="dsd-item-title"><?php echo app('translator')->get('Note'); ?>:</span>
                                                            <span class="dsd-item-info"><?php echo e($beauty->note); ?></span>
                                                        </div>
                                                    <?php endif; ?>

                                                    <div class="dsd-single-item">
                                                        <span class="dsd-item-title"><?php echo app('translator')->get('Member'); ?>:</span>
                                                        <span class="dsd-item-info"><?php echo e($beauty->adults); ?> <?php echo app('translator')->get('Adults'); ?>, <?php echo e($beauty->kids); ?> <?php echo app('translator')->get('Child'); ?></span>
                                                    </div>

                                                    <div class="dsd-single-item">
                                                        <span class="dsd-item-title"><?php echo app('translator')->get('Mail'); ?>:</span>
                                                        <span class="dsd-item-info"><?php echo e($beauty->user->email); ?></span>
                                                    </div>

                                                    <div class="dsd-single-item">
                                                        <span class="dsd-item-title"><?php echo app('translator')->get('Phone'); ?>:</span>
                                                        <span class="dsd-item-info"><?php echo e($beauty->user->phone); ?></span>
                                                    </div>
                                                </div>
                                                <div class="dsd-single-book-footer">
                                                    <?php if($beauty->status == 0): ?>
                                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#confirm-status" data-href="<?php echo e(route('user.booking.status',['id1' => $beauty->id, 'id2' => 1])); ?>" class="btn btn-aprd">
                                                            <i class="fas fa-check-circle me-1"></i>
                                                            <?php echo app('translator')->get('Approved'); ?>
                                                        </a>

                                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#confirm-status" data-href="<?php echo e(route('user.booking.status',['id1' => $beauty->id, 'id2' => 2])); ?>" class="btn btn-reject">
                                                            <i class="fas fa-trash me-1"></i>
                                                            <?php echo app('translator')->get('Reject'); ?>
                                                        </a>
                                                    <?php endif; ?>
                                                    <a href="<?php echo e(route('user.booking.conversation',$beauty->id)); ?>" class="btn btn-message"><i class="fas fa-envelope me-1"></i><?php echo app('translator')->get('Message'); ?></a>
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

    <div class="modal modal-blur fade" id="confirm-status" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4">
              <h3><?php echo e(__('Are you sure')); ?>?</h3>
              <div class="text-muted"><?php echo e(__("You are about to change the status")); ?></div>
            </div>
            <div class="modal-footer">
              <div class="w-100">
                <div class="d-flex justify-content-center gap-10px">
                  <a href="#" class="btn btn-outline-secondary w-100" data-bs-dismiss="modal">
                      <?php echo e(__('Cancel')); ?>

                    </a>

                    <a href="javascript:;" class="btn btn-success w-100 btn-ok text-white">
                      <?php echo e(__('Apply')); ?>

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

    $('#confirm-status').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/user/booking/beauty.blade.php ENDPATH**/ ?>