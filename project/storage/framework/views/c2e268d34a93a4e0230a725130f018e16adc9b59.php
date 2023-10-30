<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- ======================= Top Breadcrubms ======================== -->
    <div class="bg-dark py-3">
        <div class="container">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>" class="text-light"><?php echo app('translator')->get('Home'); ?></a></li>
                            <li class="breadcrumb-item active theme-cl" aria-current="page"><?php echo app('translator')->get('Blog Page'); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= Top Breadcrubms ======================== -->

    <!-- ======================= Blog Start ============================ -->
    <section class="middle">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="sec_title position-relative text-center mb-5">
                        <h6 class="theme-cl mb-0"><?php echo app('translator')->get('Latest Updates'); ?></h6>
                        <h2 class="ft-bold"><?php echo app('translator')->get('View Recent Updates'); ?></h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
				<?php if(count($blogs) == 0): ?>
					<div class="col-12 text-center">
						<h3 class="m-0"><?php echo e(__('No Blog Found')); ?></h3>
					</div>
				<?php else: ?>
                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- Single Item -->
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="blg_grid_box">
                                <div class="blg_grid_thumb">
                                    <a href="<?php echo e(route('blog.details',$data->slug)); ?>">
                                        <img src="<?php echo e(asset('assets/images/'.$data->photo)); ?>" class="img-fluid" alt="">
                                    </a>
                                </div>
                                <div class="blg_grid_caption">
                                    <div class="blg_tag">
                                        <span><?php echo e($data->category->name); ?></span>
                                    </div>
                                    <div class="blg_title">
                                        <h4>
                                            <a href="<?php echo e(route('blog.details',$data->slug)); ?>"><?php echo e($data->title); ?></a>
                                        </h4>
                                    </div>
                                    <div class="blg_desc">

                                    </div>
                                </div>
                                <div class="crs_grid_foot">
                                    <div class="crs_flex d-flex align-items-center justify-content-between br-top px-3 py-2">
                                        <div class="crs_fl_first">
                                            <div class="crs_tutor">
                                                <div class="crs_tutor_thumb">
                                                    <a href="javascript:void(0);">
                                                        <img src="<?php echo e(asset('assets/images/'.getAdmin()->photo)); ?>" class="img-fluid circle" width="35" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="crs_fl_last">
                                            <div class="foot_list_info">
                                                <ul>
                                                    <li><div class="elsio_ic"><i class="fa fa-eye text-success"></i></div><div class="elsio_tx"><?php echo e($data->views); ?> <?php echo app('translator')->get('Views'); ?></div></li>
                                                    <li><div class="elsio_ic"><i class="fa fa-clock text-warning"></i></div><div class="elsio_tx"><?php echo e($data->created_at->format('d M Y')); ?></div></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="position-relative text-center">
                        <?php if($blogs->hasPages()): ?>
                            <?php echo e($blogs->links()); ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ======================= Blog Start ============================ -->

    <!-- ======================= Newsletter Start ============================ -->
        <?php echo $__env->make('partials.front.cta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ======================= Newsletter Start ============================ -->

    <!-- ============================ Footer Start ================================== -->
    <?php echo $__env->make('partials.front.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ============================ Footer End ================================== -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/frontend/blog.blade.php ENDPATH**/ ?>