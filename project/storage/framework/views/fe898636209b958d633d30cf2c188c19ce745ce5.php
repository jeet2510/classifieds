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
                        <h1 class="ft-medium"><?php echo app('translator')->get('Transactions'); ?></h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-muted"><a href="<?php echo e(route('front.index')); ?>"><?php echo app('translator')->get('Home'); ?></a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('user.dashboard')); ?>" class="theme-cl"><?php echo app('translator')->get('Dashboard'); ?></a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="dashboard-widg-bar d-block">
                <div class="table-responsive table--mobile-lg">
                    <table class="table bg--body">
                        <thead>
                            <tr>
                              <th><?php echo app('translator')->get('No'); ?></th>
                              <th><?php echo app('translator')->get('Type'); ?></th>
                              <th><?php echo app('translator')->get('Txnid'); ?></th>
                              <th><?php echo app('translator')->get('Amount'); ?></th>
                              <th><?php echo app('translator')->get('Date'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php if(count($transactions) == 0): ?>
                              <tr>
                                  <td colspan="12">
                                      <h4 class="text-center m-0 py-2"><?php echo e(__('No Data Found')); ?></h4>
                                  </td>
                              </tr>
                          <?php else: ?>
                          <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <tr>
                                  <td data-label="<?php echo app('translator')->get('No'); ?>">
                                      <div>

                                      <span class="text-muted"><?php echo e($loop->iteration); ?></span>
                                      </div>
                                  </td>

                                  <td data-label="<?php echo app('translator')->get('Type'); ?>">
                                      <div>
                                      <?php echo e(strtoupper($data->type)); ?>

                                      </div>
                                  </td>

                                  <td data-label="<?php echo app('translator')->get('Txnid'); ?>">
                                      <div>
                                      <?php echo e($data->txnid); ?>

                                      </div>
                                  </td>

                                  <td data-label="<?php echo app('translator')->get('Amount'); ?>">
                                      <div>
                                      <p class="text-<?php echo e($data->profit == 'plus' ? 'success' : 'danger'); ?>"><?php echo e(showNameAmount($data->amount)); ?></p>
                                      </div>
                                  </td>

                                  <td data-label="<?php echo app('translator')->get('Date'); ?>">
                                      <div>
                                      <?php echo e(date('d M Y',strtotime($data->created_at))); ?>

                                      </div>
                                  </td>
                              </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <?php echo e($transactions->links()); ?>


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

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/user/transactions.blade.php ENDPATH**/ ?>