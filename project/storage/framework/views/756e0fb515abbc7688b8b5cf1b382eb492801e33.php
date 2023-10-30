<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- ======================= Top Breadcrubms ======================== -->
    <div class="gray py-3">
        <div class="container">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('front.index')); ?>"><?php echo app('translator')->get('Home'); ?></a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo app('translator')->get('Pages'); ?></a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ======================= Top Breadcrubms ======================== -->

			<!-- ======================= About Us Detail ======================== -->
			<section class="middle">
				<div class="container">
					<div class="row align-items-center justify-content-between">

						<div class="col-xl-11 col-lg-12 col-md-6 col-sm-12">
							<div class="abt_caption">
								<h2 class="ft-medium mb-4"><?php echo e($page->title); ?></h2>
								<p class="mb-4">
                                    <?php
                                        echo $page->details;
                                    ?>
                                </p>
							</div>
						</div>

					</div>
				</div>
			</section>
			<!-- ======================= About Us End ======================== -->

        <!-- ======================= Newsletter Start ============================ -->
        <?php echo $__env->make('partials.front.cta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- ======================= Newsletter Start ============================ -->

        <!-- ============================ Footer Start ================================== -->
        <?php echo $__env->make('partials.front.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- ============================ Footer End ================================== -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/frontend/page.blade.php ENDPATH**/ ?>