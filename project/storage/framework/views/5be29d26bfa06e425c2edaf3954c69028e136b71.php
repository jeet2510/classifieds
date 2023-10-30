<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between py-3">
    <h5 class=" mb-0 text-gray-800 pl-3"><?php echo e(__('Subscribers')); ?></h5>
    <ol class="breadcrumb m-0 py-0">
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.subs.index')); ?>"><?php echo e(__('Subscribers')); ?></a></li>
    </ol>
    </div>
</div>

<!-- Row -->
<div class="row mt-3">
    <!-- Datatables -->
    <div class="col-lg-12">

      <?php echo $__env->make('includes.admin.form-success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <div class="card mb-4">
        <div class="table-responsive p-3">
            <table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
            <thead class="thead-light">
              <tr>
                <th><?php echo e(__("#Sl")); ?></th>
                <th><?php echo e(__("Email")); ?></th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
    <!-- DataTable with Hover -->

  </div>
  <!--Row-->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script type="text/javascript">
	"use strict";

		var table = $('#geniustable').DataTable({
			   ordering: false,
               processing: true,
               serverSide: true,
               searching: true,
               ajax: '<?php echo e(route('admin.subs.datatables')); ?>',
               columns: [
                        { data: 'id', name: 'id' },
                        { data: 'email', name: 'email' }
                     ],
                language : {
                  processing: '<img src="<?php echo e(asset('assets/images/'.$gs->admin_loader)); ?>">'
                }
            });

			$(function() {
            $(".btn-area").append('<div class="col-sm-12 col-md-4 text-right">'+
                '<a class="btn btn-primary" href="<?php echo e(route('admin.subs.download')); ?>">'+
            '<i class="fas fa-download"></i> <?php echo e(__("Download")); ?>'+
            '</a>'+
            '</div>');
        });

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/admin/subscribers/index.blade.php ENDPATH**/ ?>