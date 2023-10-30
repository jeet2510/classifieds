<?php if(count($listings)>0): ?>
    <?php $__currentLoopData = $listings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
            <div class="Rego-grid-wrap">
                <div class="Rego-grid-upper">
                    <div class="Rego-bookmark-btn">
                        <button type="button" class="wishList" data-listing="<?php echo e($data->id); ?>" data-user=<?php echo e(auth()->id()); ?>>
                            <i class="lni lni-heart<?php echo e($data->userFavourite(auth()->id(),$data->id) ? '-filled' : ''); ?> position-absolute"></i>
                        </button>
                    </div>
                    <div class="Rego-pos ab-left">
                        <div class="Rego-status open me-2"><?php echo e($data->openClose($data->id)); ?></div>
                        <?php if($data->is_feature): ?>
                            <div class="Rego-featured-tag"><?php echo app('translator')->get('Featured'); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="Rego-grid-thumb">
                        <a href="<?php echo e(route('front.listing.details',$data->slug)); ?>" class="d-block text-center m-auto"><img src="<?php echo e(asset('assets/images/'.$data->photo)); ?>" class="img-fluid" alt="" /></a>
                    </div>
                </div>
                <div class="Rego-grid-fl-wrap">
                    <div class="Rego-caption px-3 py-2">
                        <div class="Rego-author">
                            <?php if($data->user_id == NULL && $data->admin_id == NULL): ?>
                                <a href="<?php echo e(route('front.author.details','admin')); ?>">
                                    <img src="<?php echo e(asset('assets/images/'.getAdmin()->photo)); ?>" class="img-fluid circle" alt="">
                                </a>
                            <?php else: ?>
                                <a href="<?php echo e(route('front.author.details',$data->user->username)); ?>">
                                    <img src="<?php echo e(asset('assets/images/'.$data->user->photo)); ?>" class="img-fluid circle" alt="">
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="Rego-cates"><a href="<?php echo e(route('front.listing',['category' => $data->category->slug])); ?>"><?php echo e($data->category->title); ?></a></div>
                        <h4 class="mb-0 ft-medium medium"><a href="<?php echo e(route('front.listing.details',$data->slug)); ?>" class="text-dark fs-md"><?php echo e($data->name); ?><span class="verified-badge"><i class="fas fa-check-circle"></i></span></a></h4>
                        <div class="Rego-middle-caption mt-3">
                            <div class="Rego-location"><i class="fas fa-map-marker-alt"></i><?php echo e($data->real_address); ?></div>
                            <div class="Rego-call"><i class="fas fa-phone-alt"></i><?php echo e($data->phone_number); ?></div>
                        </div>
                    </div>
                    <div class="Rego-grid-footer py-3 px-3">
                        <div class="Rego-ft-first">
                            <?php if(count($data->reviews)>0): ?>
                                <div class="Rego-rating">
                                    <div class="Rego-pr-average high"><?php echo e($data->directoryRatting($data->id)); ?></div>
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
                            <?php endif; ?>
                        </div>
                        <div class="Rego-ft-last">
                            <span class="small"><?php echo e($data->created_at->diffForHumans()); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <div class="col-lg-12 col-md-12">
        <h5 class="text-center">
            <?php echo app('translator')->get('No Directory Found!'); ?>
        </h5>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <?php if($listings->hasPages()): ?>
            <?php echo e($listings->links()); ?>

        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/partials/front/listing.blade.php ENDPATH**/ ?>