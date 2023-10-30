<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h5 class=" mb-0 text-gray-800 pl-3"><?php echo e(__('Manage Amenities')); ?></h5>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.amenities.index')); ?>"><?php echo e(__('Amenities')); ?></a></li>
            </ol>
        </div>
    </div>

    <div class="row mt-3">
    <div class="col-lg-12">
        <?php echo $__env->make('includes.admin.form-success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card mb-4">
            <div class="row px-3 py-3">
                <div class="bulk-delete-section">
                    <div class="select-box-section">
                        <select id="bulk_option">
                            <option value=""><?php echo app('translator')->get('Bulk Action'); ?></option>
                            <option value="delete"><?php echo app('translator')->get('Delete'); ?></option>
                        </select>

                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-href="<?php echo e(route('admin.amenities.bulk.delete')); ?>" data-target="" id="bulk_apply"><?php echo app('translator')->get('Apply'); ?></button>
                    </div>
                </div>
            </div>
        <div class="table-responsive p-3">
            <table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
            <thead class="thead-light">
                <tr>
                    <th>
                        <input type="checkbox" class="" id="headercheck">
                    </th>
                    <th><?php echo e(__('Name')); ?></th>
                    <th><?php echo e(__('Status')); ?></th>
                    <th><?php echo e(__('Options')); ?></th>
                </tr>
            </thead>
            </table>
        </div>
        </div>
    </div>
    </div>

    <?php if ($__env->exists('partials.admin.status')) echo $__env->make('partials.admin.status', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="modal fade confirm-modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__("Confirm Delete")); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center"><?php echo e(__("You are about to delete this amenity. Every informtation under this amenity will be deleted.")); ?></p>
                    <p class="text-center"><?php echo e(__("Do you want to proceed?")); ?></p>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("Cancel")); ?></a>
                    <a href="javascript:;" class="btn btn-danger btn-ok"><?php echo e(__("Delete")); ?></a>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>

    <script type="text/javascript">
	    "use strict";

		var table = $('#geniustable').DataTable({
			   ordering: false,
               processing: true,
               serverSide: true,
               searching: true,
               ajax: '<?php echo e(route('admin.amenities.datatables')); ?>',
               columns: [
                        { data: 'checkbox', name: 'checkbox' },
                        { data: 'name', name: 'name' },
                        { data: 'status', name: 'status' },
            			{ data: 'action', searchable: false, orderable: false }

                    ],
                language: {
                	processing: '<img src="<?php echo e(asset('assets/images/'.$gs->admin_loader)); ?>">'
                }
            });
			$(function() {
                $(".btn-area").append('<div class="col-sm-12 col-md-4 pr-3 text-right">'+
                    '<a class="btn btn-primary" href="<?php echo e(route('admin.amenities.create')); ?>">'+
                        '<i class="fas fa-plus"></i> <?php echo e(__('Add New')); ?>'+
                    '</a>'+
                '</div>');
            });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/admin/amenities/index.blade.php ENDPATH**/ ?>