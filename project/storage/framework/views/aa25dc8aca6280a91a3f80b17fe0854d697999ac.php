<?php $__env->startSection('content'); ?>

<div class="card">
	<div class="d-sm-flex align-items-center justify-content-between">
        <h5 class=" mb-0 text-gray-800 pl-3"><?php echo e(__('Directory')); ?> <a class="btn btn-primary btn-rounded btn-sm" href="<?php echo e(route('admin.listing.index')); ?>"><i class="fas fa-arrow-left"></i> <?php echo e(__('Back')); ?></a></h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.listing.edit',$data->id)); ?>"><?php echo e(__('Edit Directory')); ?></a></li>
        </ol>
	</div>
</div>


<div class="row justify-content-center mt-3">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Edit Directory Form')); ?></h6>
            </div>

            <div class="card-body">
                <div class="gocover" style="background: url(<?php echo e(asset('assets/images/'.$gs->admin_loader)); ?>) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                <form class="geniusform" action="<?php echo e(route('admin.listing.update',$data->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo $__env->make('includes.admin.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo e(csrf_field()); ?>


                    <input type="hidden" name="type" value="<?php echo e(request()->type); ?>">
                    <div class="container pl-0 pr-0 ml-0 mr-0 w-100 mw-100">
                        <div id="tabs">
                            <ul class="nav nav-pills nav-justified mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link bsc active" data-toggle="pill" href="#basic"><?php echo e(__('Basic')); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link amenities" data-toggle="pill" href="#amenities"><?php echo e(__('Amenities')); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link media" data-toggle="pill" href="#media"><?php echo e(__('Media')); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link schedule" data-toggle="pill" href="#schedule"><?php echo e(__('Schedule')); ?></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link contact" data-toggle="pill" href="#contact"><?php echo e(__('Contact')); ?></a>
                                </li>

                                <?php if(request()->type == 'restaurant'): ?>
                                    <li class="nav-item">
                                        <a class="nav-link dynamic" data-toggle="pill" href="#dynamic"><?php echo e(ucfirst(request()->type)); ?> <?php echo e(__('Item')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(request()->type == 'hotel'): ?>
                                    <li class="nav-item">
                                        <a class="nav-link dynamic" data-toggle="pill" href="#dynamic"><?php echo e(ucfirst(request()->type)); ?> <?php echo e(__('Room')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(request()->type == 'beauty'): ?>
                                    <li class="nav-item">
                                        <a class="nav-link dynamic" data-toggle="pill" href="#dynamic"><?php echo e(ucfirst(request()->type)); ?> <?php echo e(__('Service')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(request()->type == 'real_estate'): ?>
                                    <li class="nav-item">
                                        <a class="nav-link dynamic" data-toggle="pill" href="#dynamic"><?php echo e(ucfirst(str_replace("_"," ",request()->type))); ?> <?php echo e(__('Info')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(request()->type == 'car'): ?>
                                    <li class="nav-item">
                                        <a class="nav-link dynamic" data-toggle="pill" href="#dynamic"><?php echo e(ucfirst(request()->type)); ?> <?php echo e(__('Specification')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <li class="nav-item">
                                    <a class="nav-link faq" data-toggle="pill" href="#faq"><?php echo e(__('FAQ')); ?></a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="basic" class="container tab-pane active"><br>
                                    <?php if(request()->type == 'doctor'): ?>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading"><?php echo e(__('Doctor Name')); ?> *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" class="input-field" name="name" placeholder="<?php echo e(__('name')); ?>" value="<?php echo e($data->name); ?>">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading"><?php echo e(__('Doctor Designation')); ?> *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" class="input-field" name="designation" placeholder="<?php echo e(__('Designation')); ?>" value="<?php echo e($data->designation); ?>">
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading"><?php echo e(__('Listing Title')); ?> *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" class="input-field" name="name" placeholder="<?php echo e(__('Listing Title')); ?>" value="<?php echo e($data->name); ?>">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading"><?php echo e(__('Listing Slug')); ?> *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" class="input-field" name="slug" placeholder="<?php echo e(__('Listing Slug')); ?>" value="<?php echo e($data->slug); ?>">
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading"><?php echo e(__('Category')); ?> *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <select name="category_id" class="input-field">
                                                <option value="" selected><?php echo e(__('Please select a category')); ?></option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>" <?php echo e($category->id == $data->category_id ? 'selected' : ''); ?>><?php echo e($category->title); ?></option>
                                                <?php if($category->child): ?>
                                                    <?php $__currentLoopData = $category->child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$childCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($childCategory->id); ?>" <?php echo e($childCategory->id == $data->category_id ? 'selected' : ''); ?>>--<?php echo e($childCategory->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading"><?php echo e(__('Location')); ?> *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <select id="location" name="location_id" class="input-field">
                                                <option value="" selected><?php echo e(__('Please select a location')); ?></option>
                                                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($location->id); ?>" <?php echo e($location->id == $data->location_id ? 'selected' : ''); ?>><?php echo e(ucfirst($location->name)); ?></option>
                                                    <?php if($location->child): ?>
                                                        <?php $__currentLoopData = $location->child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$childlocation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($childlocation->id); ?>" <?php echo e($childlocation->id == $data->location_id ? 'selected' : ''); ?>>--<?php echo e(ucfirst($childlocation->name)); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading"><?php echo e(__('Real address')); ?></h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" class="input-field" name="real_address" placeholder="<?php echo e(__('Address')); ?>" value="<?php echo e($data->real_address); ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading"><?php echo e(__('Map Latitude')); ?></h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" class="input-field" name="latitude" placeholder="<?php echo e(__('Latitude')); ?>" value="<?php echo e($data->latitude); ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading"><?php echo e(__('Map Longitude')); ?></h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" class="input-field" name="longitude" placeholder="<?php echo e(__('Longitude')); ?>" value="<?php echo e($data->longitude); ?>">
                                        </div>
                                    </div>

                                    <?php if(request()->type == 'hotel'): ?>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading"><?php echo e(__('Distance')); ?></h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" class="input-field" name="distance" placeholder="<?php echo e(__('Distance')); ?>" value="<?php echo e($data->distance); ?>">
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading"><?php echo e(__('Description')); ?> *</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-9">
                                            <textarea name="description" class="input-field" placeholder="<?php echo e(__('Description')); ?>" cols="30" rows="10" required><?php echo e($data->description); ?></textarea>
                                        </div>
                                    </div>


                                    <div class="row mt-3 is_top">
                                        <div class="col-lg-3">
                                            <div class="left-area">

                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="form-check">
                                                <input type="checkbox" name="is_feature" class="form-check-input" value="1" id="is_feature" <?php echo e($data->is_feature == 1 ? 'checked' : ''); ?>>
                                                <label class="form-check-label" for="is_feature"><?php echo e(__('Check if this directory is featured')); ?></label>
                                            </div>
                                        </div>
                                    </div>


                                    <ul class="list-inline mt-3 mb-0  text-center">
                                        <li class="list-inline-item">
                                            <a href="javascript:;" data-href=".amenities" class="next-prev btn btn-primary"> <?php echo e(__('Next')); ?> </a>
                                        </li>
                                    </ul>

                                </div>

                                <div id="amenities" class="container tab-pane"><br>
                                    <div class="row">
                                        <?php if($amenities): ?>
                                            <?php $__currentLoopData = $amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" name="amenities[<?php echo e($amenity->icon); ?>][]" value="<?php echo e($amenity->name); ?>" id="<?php echo e($amenity->name); ?>-option-<?php echo e($key); ?>" <?php echo e(in_array($amenity->name,$listingAmenities) ? 'checked' : ''); ?>>
                                                        <label class="form-check-label" for="<?php echo e($amenity->name); ?>-option-<?php echo e($key); ?>"><?php echo e($amenity->name); ?></label>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>

                                    <ul class="list-inline mt-3 mb-0  text-center">
                                        <li class="list-inline-item">
                                            <a href="javascript:;" data-href=".bsc" class="next-prev btn btn-primary"> <?php echo e(__('Prev')); ?> </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:;" data-href=".media" class="next-prev btn btn-primary"> <?php echo e(__('Next')); ?> </a>
                                        </li>
                                    </ul>
                                </div>

                                <div id="media" class="container tab-pane"><br>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading"><?php echo e(__('Listing Video Provider')); ?>*</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <select name="listing_video_provider" class="input-field">
                                                <option value="youtube" <?php echo e($data->listing_video_provider == 'youtube' ? 'selected' : ''); ?>><?php echo e(__('Youtube')); ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading"><?php echo e(__('Listing Video Url')); ?>*</h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-9">
                                            <input type="text" class="input-field" name="listing_video" placeholder="https://www.youtube.com/watch?v=AXrHbrMrun0" value="<?php echo e($data->listing_video); ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading"><?php echo e(__('Listing Thumbnail')); ?>*</h4>
                                                <p class="sub-heading">(<?php echo e(__('Preferred Size 600 x 600')); ?>)</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="wrapper-image-preview">
                                                <div class="box">
                                                    <div class="back-preview-image" style="background-image: url(<?php echo e($data->photo ? asset('assets/images/'.$data->photo) : asset('assets/images/default.png')); ?>);"></div>
                                                    <div class="upload-options">
                                                        <label class="img-upload-label" for="img-upload"> <i class="fas fa-camera"></i> <?php echo e(__('Upload Picture')); ?> </label>
                                                        <input id="img-upload" type="file" class="image-upload" name="photo" accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading"><?php echo e(__('Listing Gallary')); ?></h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <button type="button" class="btn btn-primary set-gallery" data-toggle="modal" data-target="#setgallery" id="#myBtn">
                                                <i class="icofont-plus"></i> <?php echo e(__('Set Gallery')); ?>

                                            </button>
                                        </div>
                                    </div>


                                    <ul class="list-inline mt-3 mb-0  text-center">
                                        <li class="list-inline-item">
                                            <a href="javascript:;" data-href=".amenities" class="next-prev btn btn-primary"> <?php echo e(__('Prev')); ?> </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:;" data-href=".schedule" class="next-prev btn btn-primary"> <?php echo e(__('Next')); ?> </a>
                                        </li>
                                    </ul>

                                </div>

                                <div id="schedule" class="container tab-pane"><br>

                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="left-area">
                                                <h4 class="heading"><?php echo e(__('Saturday')); ?> *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <select class="input-field" name="saturday_opening">
                                                <option value="" selected><?php echo e(__('Opening Time')); ?></option>
                                                <option value="12 am" <?php echo e($listingSchedules['sat_open'] == "12 am" ? 'selected' : ''); ?>>12 am</option>
                                                <option value="01 am" <?php echo e($listingSchedules['sat_open'] == "01 am" ? 'selected' : ''); ?>>01 am</option>
                                                <option value="02 am" <?php echo e($listingSchedules['sat_open'] == "02 am" ? 'selected' : ''); ?>>02 am</option>
                                                <option value="03 am" <?php echo e($listingSchedules['sat_open'] == "03 am" ? 'selected' : ''); ?>>03 am</option>
                                                <option value="04 am" <?php echo e($listingSchedules['sat_open'] == "04 am" ? 'selected' : ''); ?>>04 am</option>
                                                <option value="05 am" <?php echo e($listingSchedules['sat_open'] == "05 am" ? 'selected' : ''); ?>>05 am</option>
                                                <option value="06 am" <?php echo e($listingSchedules['sat_open'] == "06 am" ? 'selected' : ''); ?>>06 am</option>
                                                <option value="07 am" <?php echo e($listingSchedules['sat_open'] == "07 am" ? 'selected' : ''); ?>>07 am</option>
                                                <option value="08 am" <?php echo e($listingSchedules['sat_open'] == "08 am" ? 'selected' : ''); ?>>08 am</option>
                                                <option value="09 am" <?php echo e($listingSchedules['sat_open'] == "09 am" ? 'selected' : ''); ?>>09 am</option>
                                                <option value="10 am" <?php echo e($listingSchedules['sat_open'] == "10 am" ? 'selected' : ''); ?>>10 am</option>
                                                <option value="11 am" <?php echo e($listingSchedules['sat_open'] == "11 am" ? 'selected' : ''); ?>>11 am</option>
                                                <option value="12 pm" <?php echo e($listingSchedules['sat_open'] == "12 pm" ? 'selected' : ''); ?>>12 pm</option>
                                                <option value="01 pm" <?php echo e($listingSchedules['sat_open'] == "01 pm" ? 'selected' : ''); ?>>01 pm</option>
                                                <option value="02 pm" <?php echo e($listingSchedules['sat_open'] == "02 pm" ? 'selected' : ''); ?>>02 pm</option>
                                                <option value="03 pm" <?php echo e($listingSchedules['sat_open'] == "03 pm" ? 'selected' : ''); ?>>03 pm</option>
                                                <option value="04 pm" <?php echo e($listingSchedules['sat_open'] == "04 pm" ? 'selected' : ''); ?>>04 pm</option>
                                                <option value="05 pm" <?php echo e($listingSchedules['sat_open'] == "05 pm" ? 'selected' : ''); ?>>05 pm</option>
                                                <option value="06 pm" <?php echo e($listingSchedules['sat_open'] == "06 pm" ? 'selected' : ''); ?>>06 pm</option>
                                                <option value="07 pm" <?php echo e($listingSchedules['sat_open'] == "07 pm" ? 'selected' : ''); ?>>07 pm</option>
                                                <option value="08 pm" <?php echo e($listingSchedules['sat_open'] == "08 pm" ? 'selected' : ''); ?>>08 pm</option>
                                                <option value="09 pm" <?php echo e($listingSchedules['sat_open'] == "09 pm" ? 'selected' : ''); ?>>09 pm</option>
                                                <option value="10 pm" <?php echo e($listingSchedules['sat_open'] == "10 pm" ? 'selected' : ''); ?>>10 pm</option>
                                                <option value="11 pm" <?php echo e($listingSchedules['sat_open'] == "11 pm" ? 'selected' : ''); ?>>11 pm</option>
                                                <option value="closed" <?php echo e($listingSchedules['sat_open'] == 'closed' ? 'selected' : ''); ?>>Closed</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-5">
                                            <select class="input-field" name="saturday_closing">
                                                <option value="" selected><?php echo e(__('Closing Time')); ?></option>
                                                <option value="12 am" <?php echo e($listingSchedules['sat_close'] == "12 am" ? 'selected' : ''); ?>>12 am</option>
                                                <option value="01 am" <?php echo e($listingSchedules['sat_close'] == "01 am" ? 'selected' : ''); ?>>01 am</option>
                                                <option value="02 am" <?php echo e($listingSchedules['sat_close'] == "02 am" ? 'selected' : ''); ?>>02 am</option>
                                                <option value="03 am" <?php echo e($listingSchedules['sat_close'] == "03 am" ? 'selected' : ''); ?>>03 am</option>
                                                <option value="04 am" <?php echo e($listingSchedules['sat_close'] == "04 am" ? 'selected' : ''); ?>>04 am</option>
                                                <option value="05 am" <?php echo e($listingSchedules['sat_close'] == "05 am" ? 'selected' : ''); ?>>05 am</option>
                                                <option value="06 am" <?php echo e($listingSchedules['sat_close'] == "06 am" ? 'selected' : ''); ?>>06 am</option>
                                                <option value="07 am" <?php echo e($listingSchedules['sat_close'] == "07 am" ? 'selected' : ''); ?>>07 am</option>
                                                <option value="08 am" <?php echo e($listingSchedules['sat_close'] == "08 am" ? 'selected' : ''); ?>>08 am</option>
                                                <option value="09 am" <?php echo e($listingSchedules['sat_close'] == "09 am" ? 'selected' : ''); ?>>09 am</option>
                                                <option value="10 am" <?php echo e($listingSchedules['sat_close'] == "10 am" ? 'selected' : ''); ?>>10 am</option>
                                                <option value="11 am" <?php echo e($listingSchedules['sat_close'] == "11 am" ? 'selected' : ''); ?>>11 am</option>
                                                <option value="12 pm" <?php echo e($listingSchedules['sat_close'] == "12 pm" ? 'selected' : ''); ?>>12 pm</option>
                                                <option value="01 pm" <?php echo e($listingSchedules['sat_close'] == "01 pm" ? 'selected' : ''); ?>>01 pm</option>
                                                <option value="02 pm" <?php echo e($listingSchedules['sat_close'] == "02 pm" ? 'selected' : ''); ?>>02 pm</option>
                                                <option value="03 pm" <?php echo e($listingSchedules['sat_close'] == "03 pm" ? 'selected' : ''); ?>>03 pm</option>
                                                <option value="04 pm" <?php echo e($listingSchedules['sat_close'] == "04 pm" ? 'selected' : ''); ?>>04 pm</option>
                                                <option value="05 pm" <?php echo e($listingSchedules['sat_close'] == "05 pm" ? 'selected' : ''); ?>>05 pm</option>
                                                <option value="06 pm" <?php echo e($listingSchedules['sat_close'] == "06 pm" ? 'selected' : ''); ?>>06 pm</option>
                                                <option value="07 pm" <?php echo e($listingSchedules['sat_close'] == "07 pm" ? 'selected' : ''); ?>>07 pm</option>
                                                <option value="08 pm" <?php echo e($listingSchedules['sat_close'] == "08 pm" ? 'selected' : ''); ?>>08 pm</option>
                                                <option value="09 pm" <?php echo e($listingSchedules['sat_close'] == "09 pm" ? 'selected' : ''); ?>>09 pm</option>
                                                <option value="10 pm" <?php echo e($listingSchedules['sat_close'] == "10 pm" ? 'selected' : ''); ?>>10 pm</option>
                                                <option value="11 pm" <?php echo e($listingSchedules['sat_close'] == "11 pm" ? 'selected' : ''); ?>>11 pm</option>
                                                <option value="closed" <?php echo e($listingSchedules['sat_close'] == 'closed' ? 'selected' : ''); ?>>Closed</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="left-area">
                                                <h4 class="heading"><?php echo e(__('Sunday')); ?> *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <select class="input-field" name="sunday_opening">
                                                <option value="" selected><?php echo e(__('Opening Time')); ?></option>
                                                <option value="12 am" <?php echo e($listingSchedules['sun_open'] == "12 am" ? 'selected' : ''); ?>>12 am</option>
                                                <option value="01 am" <?php echo e($listingSchedules['sun_open'] == "01 am" ? 'selected' : ''); ?>>01 am</option>
                                                <option value="02 am" <?php echo e($listingSchedules['sun_open'] == "02 am" ? 'selected' : ''); ?>>02 am</option>
                                                <option value="03 am" <?php echo e($listingSchedules['sun_open'] == "03 am" ? 'selected' : ''); ?>>03 am</option>
                                                <option value="04 am" <?php echo e($listingSchedules['sun_open'] == "04 am" ? 'selected' : ''); ?>>04 am</option>
                                                <option value="05 am" <?php echo e($listingSchedules['sun_open'] == "05 am" ? 'selected' : ''); ?>>05 am</option>
                                                <option value="06 am" <?php echo e($listingSchedules['sun_open'] == "06 am" ? 'selected' : ''); ?>>06 am</option>
                                                <option value="07 am" <?php echo e($listingSchedules['sun_open'] == "07 am" ? 'selected' : ''); ?>>07 am</option>
                                                <option value="08 am" <?php echo e($listingSchedules['sun_open'] == "08 am" ? 'selected' : ''); ?>>08 am</option>
                                                <option value="09 am" <?php echo e($listingSchedules['sun_open'] == "09 am" ? 'selected' : ''); ?>>09 am</option>
                                                <option value="10 am" <?php echo e($listingSchedules['sun_open'] == "10 am" ? 'selected' : ''); ?>>10 am</option>
                                                <option value="11 am" <?php echo e($listingSchedules['sun_open'] == "11 am" ? 'selected' : ''); ?>>11 am</option>
                                                <option value="12 pm" <?php echo e($listingSchedules['sun_open'] == "12 pm" ? 'selected' : ''); ?>>12 pm</option>
                                                <option value="01 pm" <?php echo e($listingSchedules['sun_open'] == "01 pm" ? 'selected' : ''); ?>>01 pm</option>
                                                <option value="02 pm" <?php echo e($listingSchedules['sun_open'] == "02 pm" ? 'selected' : ''); ?>>02 pm</option>
                                                <option value="03 pm" <?php echo e($listingSchedules['sun_open'] == "03 pm" ? 'selected' : ''); ?>>03 pm</option>
                                                <option value="04 pm" <?php echo e($listingSchedules['sun_open'] == "04 pm" ? 'selected' : ''); ?>>04 pm</option>
                                                <option value="05 pm" <?php echo e($listingSchedules['sun_open'] == "05 pm" ? 'selected' : ''); ?>>05 pm</option>
                                                <option value="06 pm" <?php echo e($listingSchedules['sun_open'] == "06 pm" ? 'selected' : ''); ?>>06 pm</option>
                                                <option value="07 pm" <?php echo e($listingSchedules['sun_open'] == "07 pm" ? 'selected' : ''); ?>>07 pm</option>
                                                <option value="08 pm" <?php echo e($listingSchedules['sun_open'] == "08 pm" ? 'selected' : ''); ?>>08 pm</option>
                                                <option value="09 pm" <?php echo e($listingSchedules['sun_open'] == "09 pm" ? 'selected' : ''); ?>>09 pm</option>
                                                <option value="10 pm" <?php echo e($listingSchedules['sun_open'] == "10 pm" ? 'selected' : ''); ?>>10 pm</option>
                                                <option value="11 pm" <?php echo e($listingSchedules['sun_open'] == "11 pm" ? 'selected' : ''); ?>>11 pm</option>
                                                <option value="closed" <?php echo e($listingSchedules['sun_open'] == 'closed' ? 'selected' : ''); ?>>Closed</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-5">
                                            <select class="input-field" name="sunday_closing">
                                                <option value="" selected><?php echo e(__('Closing Time')); ?></option>
                                                <option value="12 am" <?php echo e($listingSchedules['sun_close'] == "12 am" ? 'selected' : ''); ?>>12 am</option>
                                                <option value="01 am" <?php echo e($listingSchedules['sun_close'] == "01 am" ? 'selected' : ''); ?>>01 am</option>
                                                <option value="02 am" <?php echo e($listingSchedules['sun_close'] == "02 am" ? 'selected' : ''); ?>>02 am</option>
                                                <option value="03 am" <?php echo e($listingSchedules['sun_close'] == "03 am" ? 'selected' : ''); ?>>03 am</option>
                                                <option value="04 am" <?php echo e($listingSchedules['sun_close'] == "04 am" ? 'selected' : ''); ?>>04 am</option>
                                                <option value="05 am" <?php echo e($listingSchedules['sun_close'] == "05 am" ? 'selected' : ''); ?>>05 am</option>
                                                <option value="06 am" <?php echo e($listingSchedules['sun_close'] == "06 am" ? 'selected' : ''); ?>>06 am</option>
                                                <option value="07 am" <?php echo e($listingSchedules['sun_close'] == "07 am" ? 'selected' : ''); ?>>07 am</option>
                                                <option value="08 am" <?php echo e($listingSchedules['sun_close'] == "08 am" ? 'selected' : ''); ?>>08 am</option>
                                                <option value="09 am" <?php echo e($listingSchedules['sun_close'] == "09 am" ? 'selected' : ''); ?>>09 am</option>
                                                <option value="10 am" <?php echo e($listingSchedules['sun_close'] == "10 am" ? 'selected' : ''); ?>>10 am</option>
                                                <option value="11 am" <?php echo e($listingSchedules['sun_close'] == "11 am" ? 'selected' : ''); ?>>11 am</option>
                                                <option value="12 pm" <?php echo e($listingSchedules['sun_close'] == "12 pm" ? 'selected' : ''); ?>>12 pm</option>
                                                <option value="01 pm" <?php echo e($listingSchedules['sun_close'] == "01 pm" ? 'selected' : ''); ?>>01 pm</option>
                                                <option value="02 pm" <?php echo e($listingSchedules['sun_close'] == "02 pm" ? 'selected' : ''); ?>>02 pm</option>
                                                <option value="03 pm" <?php echo e($listingSchedules['sun_close'] == "03 pm" ? 'selected' : ''); ?>>03 pm</option>
                                                <option value="04 pm" <?php echo e($listingSchedules['sun_close'] == "04 pm" ? 'selected' : ''); ?>>04 pm</option>
                                                <option value="05 pm" <?php echo e($listingSchedules['sun_close'] == "05 pm" ? 'selected' : ''); ?>>05 pm</option>
                                                <option value="06 pm" <?php echo e($listingSchedules['sun_close'] == "06 pm" ? 'selected' : ''); ?>>06 pm</option>
                                                <option value="07 pm" <?php echo e($listingSchedules['sun_close'] == "07 pm" ? 'selected' : ''); ?>>07 pm</option>
                                                <option value="08 pm" <?php echo e($listingSchedules['sun_close'] == "08 pm" ? 'selected' : ''); ?>>08 pm</option>
                                                <option value="09 pm" <?php echo e($listingSchedules['sun_close'] == "09 pm" ? 'selected' : ''); ?>>09 pm</option>
                                                <option value="10 pm" <?php echo e($listingSchedules['sun_close'] == "10 pm" ? 'selected' : ''); ?>>10 pm</option>
                                                <option value="11 pm" <?php echo e($listingSchedules['sun_close'] == "11 pm" ? 'selected' : ''); ?>>11 pm</option>
                                                <option value="closed" <?php echo e($listingSchedules['sun_close'] == 'closed' ? 'selected' : ''); ?>>Closed</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="left-area">
                                                <h4 class="heading"><?php echo e(__('Monday')); ?> *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <select class="input-field" name="monday_opening">
                                                <option value="" selected><?php echo e(__('Opening Time')); ?></option>
                                                <option value="12 am" <?php echo e($listingSchedules['mon_open'] == "12 am" ? 'selected' : ''); ?>>12 am</option>
                                                <option value="01 am" <?php echo e($listingSchedules['mon_open'] == "01 am" ? 'selected' : ''); ?>>01 am</option>
                                                <option value="02 am" <?php echo e($listingSchedules['mon_open'] == "02 am" ? 'selected' : ''); ?>>02 am</option>
                                                <option value="03 am" <?php echo e($listingSchedules['mon_open'] == "03 am" ? 'selected' : ''); ?>>03 am</option>
                                                <option value="04 am" <?php echo e($listingSchedules['mon_open'] == "04 am" ? 'selected' : ''); ?>>04 am</option>
                                                <option value="05 am" <?php echo e($listingSchedules['mon_open'] == "05 am" ? 'selected' : ''); ?>>05 am</option>
                                                <option value="06 am" <?php echo e($listingSchedules['mon_open'] == "06 am" ? 'selected' : ''); ?>>06 am</option>
                                                <option value="07 am" <?php echo e($listingSchedules['mon_open'] == "07 am" ? 'selected' : ''); ?>>07 am</option>
                                                <option value="08 am" <?php echo e($listingSchedules['mon_open'] == "08 am" ? 'selected' : ''); ?>>08 am</option>
                                                <option value="09 am" <?php echo e($listingSchedules['mon_open'] == "09 am" ? 'selected' : ''); ?>>09 am</option>
                                                <option value="10 am" <?php echo e($listingSchedules['mon_open'] == "10 am" ? 'selected' : ''); ?>>10 am</option>
                                                <option value="11 am" <?php echo e($listingSchedules['mon_open'] == "11 am" ? 'selected' : ''); ?>>11 am</option>
                                                <option value="12 pm" <?php echo e($listingSchedules['mon_open'] == "12 pm" ? 'selected' : ''); ?>>12 pm</option>
                                                <option value="01 pm" <?php echo e($listingSchedules['mon_open'] == "01 pm" ? 'selected' : ''); ?>>01 pm</option>
                                                <option value="02 pm" <?php echo e($listingSchedules['mon_open'] == "02 pm" ? 'selected' : ''); ?>>02 pm</option>
                                                <option value="03 pm" <?php echo e($listingSchedules['mon_open'] == "03 pm" ? 'selected' : ''); ?>>03 pm</option>
                                                <option value="04 pm" <?php echo e($listingSchedules['mon_open'] == "04 pm" ? 'selected' : ''); ?>>04 pm</option>
                                                <option value="05 pm" <?php echo e($listingSchedules['mon_open'] == "05 pm" ? 'selected' : ''); ?>>05 pm</option>
                                                <option value="06 pm" <?php echo e($listingSchedules['mon_open'] == "06 pm" ? 'selected' : ''); ?>>06 pm</option>
                                                <option value="07 pm" <?php echo e($listingSchedules['mon_open'] == "07 pm" ? 'selected' : ''); ?>>07 pm</option>
                                                <option value="08 pm" <?php echo e($listingSchedules['mon_open'] == "08 pm" ? 'selected' : ''); ?>>08 pm</option>
                                                <option value="09 pm" <?php echo e($listingSchedules['mon_open'] == "09 pm" ? 'selected' : ''); ?>>09 pm</option>
                                                <option value="10 pm" <?php echo e($listingSchedules['mon_open'] == "10 pm" ? 'selected' : ''); ?>>10 pm</option>
                                                <option value="11 pm" <?php echo e($listingSchedules['mon_open'] == "11 pm" ? 'selected' : ''); ?>>11 pm</option>
                                                <option value="closed" <?php echo e($listingSchedules['mon_open'] == 'closed' ? 'selected' : ''); ?>>Closed</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-5">
                                            <select class="input-field" name="monday_closing">
                                                <option value="" selected><?php echo e(__('Closing Time')); ?></option>
                                                <option value="12 am" <?php echo e($listingSchedules['mon_close'] == "12 am" ? 'selected' : ''); ?>>12 am</option>
                                                <option value="01 am" <?php echo e($listingSchedules['mon_close'] == "01 am" ? 'selected' : ''); ?>>01 am</option>
                                                <option value="02 am" <?php echo e($listingSchedules['mon_close'] == "02 am" ? 'selected' : ''); ?>>02 am</option>
                                                <option value="03 am" <?php echo e($listingSchedules['mon_close'] == "03 am" ? 'selected' : ''); ?>>03 am</option>
                                                <option value="04 am" <?php echo e($listingSchedules['mon_close'] == "04 am" ? 'selected' : ''); ?>>04 am</option>
                                                <option value="05 am" <?php echo e($listingSchedules['mon_close'] == "05 am" ? 'selected' : ''); ?>>05 am</option>
                                                <option value="06 am" <?php echo e($listingSchedules['mon_close'] == "06 am" ? 'selected' : ''); ?>>06 am</option>
                                                <option value="07 am" <?php echo e($listingSchedules['mon_close'] == "07 am" ? 'selected' : ''); ?>>07 am</option>
                                                <option value="08 am" <?php echo e($listingSchedules['mon_close'] == "08 am" ? 'selected' : ''); ?>>08 am</option>
                                                <option value="09 am" <?php echo e($listingSchedules['mon_close'] == "09 am" ? 'selected' : ''); ?>>09 am</option>
                                                <option value="10 am" <?php echo e($listingSchedules['mon_close'] == "10 am" ? 'selected' : ''); ?>>10 am</option>
                                                <option value="11 am" <?php echo e($listingSchedules['mon_close'] == "11 am" ? 'selected' : ''); ?>>11 am</option>
                                                <option value="12 pm" <?php echo e($listingSchedules['mon_close'] == "12 pm" ? 'selected' : ''); ?>>12 pm</option>
                                                <option value="01 pm" <?php echo e($listingSchedules['mon_close'] == "01 pm" ? 'selected' : ''); ?>>01 pm</option>
                                                <option value="02 pm" <?php echo e($listingSchedules['mon_close'] == "02 pm" ? 'selected' : ''); ?>>02 pm</option>
                                                <option value="03 pm" <?php echo e($listingSchedules['mon_close'] == "03 pm" ? 'selected' : ''); ?>>03 pm</option>
                                                <option value="04 pm" <?php echo e($listingSchedules['mon_close'] == "04 pm" ? 'selected' : ''); ?>>04 pm</option>
                                                <option value="05 pm" <?php echo e($listingSchedules['mon_close'] == "05 pm" ? 'selected' : ''); ?>>05 pm</option>
                                                <option value="06 pm" <?php echo e($listingSchedules['mon_close'] == "06 pm" ? 'selected' : ''); ?>>06 pm</option>
                                                <option value="07 pm" <?php echo e($listingSchedules['mon_close'] == "07 pm" ? 'selected' : ''); ?>>07 pm</option>
                                                <option value="08 pm" <?php echo e($listingSchedules['mon_close'] == "08 pm" ? 'selected' : ''); ?>>08 pm</option>
                                                <option value="09 pm" <?php echo e($listingSchedules['mon_close'] == "09 pm" ? 'selected' : ''); ?>>09 pm</option>
                                                <option value="10 pm" <?php echo e($listingSchedules['mon_close'] == "10 pm" ? 'selected' : ''); ?>>10 pm</option>
                                                <option value="11 pm" <?php echo e($listingSchedules['mon_close'] == "11 pm" ? 'selected' : ''); ?>>11 pm</option>
                                                <option value="closed" <?php echo e($listingSchedules['mon_close'] == 'closed' ? 'selected' : ''); ?>>Closed</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="left-area">
                                                <h4 class="heading"><?php echo e(__('Tuesday')); ?> *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <select class="input-field" name="tuesday_opening">
                                                <option value="" selected><?php echo e(__('Opening Time')); ?></option>
                                                <option value="12 am" <?php echo e($listingSchedules['tue_open'] == "12 am" ? 'selected' : ''); ?>>12 am</option>
                                                <option value="01 am" <?php echo e($listingSchedules['tue_open'] == "01 am" ? 'selected' : ''); ?>>01 am</option>
                                                <option value="02 am" <?php echo e($listingSchedules['tue_open'] == "02 am" ? 'selected' : ''); ?>>02 am</option>
                                                <option value="03 am" <?php echo e($listingSchedules['tue_open'] == "03 am" ? 'selected' : ''); ?>>03 am</option>
                                                <option value="04 am" <?php echo e($listingSchedules['tue_open'] == "04 am" ? 'selected' : ''); ?>>04 am</option>
                                                <option value="05 am" <?php echo e($listingSchedules['tue_open'] == "05 am" ? 'selected' : ''); ?>>05 am</option>
                                                <option value="06 am" <?php echo e($listingSchedules['tue_open'] == "06 am" ? 'selected' : ''); ?>>06 am</option>
                                                <option value="07 am" <?php echo e($listingSchedules['tue_open'] == "07 am" ? 'selected' : ''); ?>>07 am</option>
                                                <option value="08 am" <?php echo e($listingSchedules['tue_open'] == "08 am" ? 'selected' : ''); ?>>08 am</option>
                                                <option value="09 am" <?php echo e($listingSchedules['tue_open'] == "09 am" ? 'selected' : ''); ?>>09 am</option>
                                                <option value="10 am" <?php echo e($listingSchedules['tue_open'] == "10 am" ? 'selected' : ''); ?>>10 am</option>
                                                <option value="11 am" <?php echo e($listingSchedules['tue_open'] == "11 am" ? 'selected' : ''); ?>>11 am</option>
                                                <option value="12 pm" <?php echo e($listingSchedules['tue_open'] == "12 pm" ? 'selected' : ''); ?>>12 pm</option>
                                                <option value="01 pm" <?php echo e($listingSchedules['tue_open'] == "01 pm" ? 'selected' : ''); ?>>01 pm</option>
                                                <option value="02 pm" <?php echo e($listingSchedules['tue_open'] == "02 pm" ? 'selected' : ''); ?>>02 pm</option>
                                                <option value="03 pm" <?php echo e($listingSchedules['tue_open'] == "03 pm" ? 'selected' : ''); ?>>03 pm</option>
                                                <option value="04 pm" <?php echo e($listingSchedules['tue_open'] == "04 pm" ? 'selected' : ''); ?>>04 pm</option>
                                                <option value="05 pm" <?php echo e($listingSchedules['tue_open'] == "05 pm" ? 'selected' : ''); ?>>05 pm</option>
                                                <option value="06 pm" <?php echo e($listingSchedules['tue_open'] == "06 pm" ? 'selected' : ''); ?>>06 pm</option>
                                                <option value="07 pm" <?php echo e($listingSchedules['tue_open'] == "07 pm" ? 'selected' : ''); ?>>07 pm</option>
                                                <option value="08 pm" <?php echo e($listingSchedules['tue_open'] == "08 pm" ? 'selected' : ''); ?>>08 pm</option>
                                                <option value="09 pm" <?php echo e($listingSchedules['tue_open'] == "09 pm" ? 'selected' : ''); ?>>09 pm</option>
                                                <option value="10 pm" <?php echo e($listingSchedules['tue_open'] == "10 pm" ? 'selected' : ''); ?>>10 pm</option>
                                                <option value="11 pm" <?php echo e($listingSchedules['tue_open'] == "11 pm" ? 'selected' : ''); ?>>11 pm</option>
                                                <option value="closed" <?php echo e($listingSchedules['tue_open'] == 'closed' ? 'selected' : ''); ?>>Closed</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-5">
                                            <select class="input-field" name="tuesday_closing">
                                                <option value="" selected><?php echo e(__('Closing Time')); ?></option>
                                                <option value="12 am" <?php echo e($listingSchedules['tue_close'] == "12 am" ? 'selected' : ''); ?>>12 am</option>
                                                <option value="01 am" <?php echo e($listingSchedules['tue_close'] == "01 am" ? 'selected' : ''); ?>>01 am</option>
                                                <option value="02 am" <?php echo e($listingSchedules['tue_close'] == "02 am" ? 'selected' : ''); ?>>02 am</option>
                                                <option value="03 am" <?php echo e($listingSchedules['tue_close'] == "03 am" ? 'selected' : ''); ?>>03 am</option>
                                                <option value="04 am" <?php echo e($listingSchedules['tue_close'] == "04 am" ? 'selected' : ''); ?>>04 am</option>
                                                <option value="05 am" <?php echo e($listingSchedules['tue_close'] == "05 am" ? 'selected' : ''); ?>>05 am</option>
                                                <option value="06 am" <?php echo e($listingSchedules['tue_close'] == "06 am" ? 'selected' : ''); ?>>06 am</option>
                                                <option value="07 am" <?php echo e($listingSchedules['tue_close'] == "07 am" ? 'selected' : ''); ?>>07 am</option>
                                                <option value="08 am" <?php echo e($listingSchedules['tue_close'] == "08 am" ? 'selected' : ''); ?>>08 am</option>
                                                <option value="09 am" <?php echo e($listingSchedules['tue_close'] == "09 am" ? 'selected' : ''); ?>>09 am</option>
                                                <option value="10 am" <?php echo e($listingSchedules['tue_close'] == "10 am" ? 'selected' : ''); ?>>10 am</option>
                                                <option value="11 am" <?php echo e($listingSchedules['tue_close'] == "11 am" ? 'selected' : ''); ?>>11 am</option>
                                                <option value="12 pm" <?php echo e($listingSchedules['tue_close'] == "12 pm" ? 'selected' : ''); ?>>12 pm</option>
                                                <option value="01 pm" <?php echo e($listingSchedules['tue_close'] == "01 pm" ? 'selected' : ''); ?>>01 pm</option>
                                                <option value="02 pm" <?php echo e($listingSchedules['tue_close'] == "02 pm" ? 'selected' : ''); ?>>02 pm</option>
                                                <option value="03 pm" <?php echo e($listingSchedules['tue_close'] == "03 pm" ? 'selected' : ''); ?>>03 pm</option>
                                                <option value="04 pm" <?php echo e($listingSchedules['tue_close'] == "04 pm" ? 'selected' : ''); ?>>04 pm</option>
                                                <option value="05 pm" <?php echo e($listingSchedules['tue_close'] == "05 pm" ? 'selected' : ''); ?>>05 pm</option>
                                                <option value="06 pm" <?php echo e($listingSchedules['tue_close'] == "06 pm" ? 'selected' : ''); ?>>06 pm</option>
                                                <option value="07 pm" <?php echo e($listingSchedules['tue_close'] == "07 pm" ? 'selected' : ''); ?>>07 pm</option>
                                                <option value="08 pm" <?php echo e($listingSchedules['tue_close'] == "08 pm" ? 'selected' : ''); ?>>08 pm</option>
                                                <option value="09 pm" <?php echo e($listingSchedules['tue_close'] == "09 pm" ? 'selected' : ''); ?>>09 pm</option>
                                                <option value="10 pm" <?php echo e($listingSchedules['tue_close'] == "10 pm" ? 'selected' : ''); ?>>10 pm</option>
                                                <option value="11 pm" <?php echo e($listingSchedules['tue_close'] == "11 pm" ? 'selected' : ''); ?>>11 pm</option>
                                                <option value="closed" <?php echo e($listingSchedules['tue_close'] == 'closed' ? 'selected' : ''); ?>>Closed</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="left-area">
                                                <h4 class="heading"><?php echo e(__('Wednesday')); ?> *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <select class="input-field" name="wednesday_opening">
                                                <option value="" selected><?php echo e(__('Opening Time')); ?></option>
                                                <option value="12 am" <?php echo e($listingSchedules['wed_open'] == "12 am" ? 'selected' : ''); ?>>12 am</option>
                                                <option value="01 am" <?php echo e($listingSchedules['wed_open'] == "01 am" ? 'selected' : ''); ?>>01 am</option>
                                                <option value="02 am" <?php echo e($listingSchedules['wed_open'] == "02 am" ? 'selected' : ''); ?>>02 am</option>
                                                <option value="03 am" <?php echo e($listingSchedules['wed_open'] == "03 am" ? 'selected' : ''); ?>>03 am</option>
                                                <option value="04 am" <?php echo e($listingSchedules['wed_open'] == "04 am" ? 'selected' : ''); ?>>04 am</option>
                                                <option value="05 am" <?php echo e($listingSchedules['wed_open'] == "05 am" ? 'selected' : ''); ?>>05 am</option>
                                                <option value="06 am" <?php echo e($listingSchedules['wed_open'] == "06 am" ? 'selected' : ''); ?>>06 am</option>
                                                <option value="07 am" <?php echo e($listingSchedules['wed_open'] == "07 am" ? 'selected' : ''); ?>>07 am</option>
                                                <option value="08 am" <?php echo e($listingSchedules['wed_open'] == "08 am" ? 'selected' : ''); ?>>08 am</option>
                                                <option value="09 am" <?php echo e($listingSchedules['wed_open'] == "09 am" ? 'selected' : ''); ?>>09 am</option>
                                                <option value="10 am" <?php echo e($listingSchedules['wed_open'] == "10 am" ? 'selected' : ''); ?>>10 am</option>
                                                <option value="11 am" <?php echo e($listingSchedules['wed_open'] == "11 am" ? 'selected' : ''); ?>>11 am</option>
                                                <option value="12 pm" <?php echo e($listingSchedules['wed_open'] == "12 pm" ? 'selected' : ''); ?>>12 pm</option>
                                                <option value="01 pm" <?php echo e($listingSchedules['wed_open'] == "01 pm" ? 'selected' : ''); ?>>01 pm</option>
                                                <option value="02 pm" <?php echo e($listingSchedules['wed_open'] == "02 pm" ? 'selected' : ''); ?>>02 pm</option>
                                                <option value="03 pm" <?php echo e($listingSchedules['wed_open'] == "03 pm" ? 'selected' : ''); ?>>03 pm</option>
                                                <option value="04 pm" <?php echo e($listingSchedules['wed_open'] == "04 pm" ? 'selected' : ''); ?>>04 pm</option>
                                                <option value="05 pm" <?php echo e($listingSchedules['wed_open'] == "05 pm" ? 'selected' : ''); ?>>05 pm</option>
                                                <option value="06 pm" <?php echo e($listingSchedules['wed_open'] == "06 pm" ? 'selected' : ''); ?>>06 pm</option>
                                                <option value="07 pm" <?php echo e($listingSchedules['wed_open'] == "07 pm" ? 'selected' : ''); ?>>07 pm</option>
                                                <option value="08 pm" <?php echo e($listingSchedules['wed_open'] == "08 pm" ? 'selected' : ''); ?>>08 pm</option>
                                                <option value="09 pm" <?php echo e($listingSchedules['wed_open'] == "09 pm" ? 'selected' : ''); ?>>09 pm</option>
                                                <option value="10 pm" <?php echo e($listingSchedules['wed_open'] == "10 pm" ? 'selected' : ''); ?>>10 pm</option>
                                                <option value="11 pm" <?php echo e($listingSchedules['wed_open'] == "11 pm" ? 'selected' : ''); ?>>11 pm</option>
                                                <option value="closed" <?php echo e($listingSchedules['wed_open'] == 'closed' ? 'selected' : ''); ?>>Closed</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-5">
                                            <select class="input-field" name="wednesday_closing">
                                                <option value="" selected><?php echo e(__('Closing Time')); ?></option>
                                                <option value="12 am" <?php echo e($listingSchedules['wed_close'] == "12 am" ? 'selected' : ''); ?>>12 am</option>
                                                <option value="01 am" <?php echo e($listingSchedules['wed_close'] == "01 am" ? 'selected' : ''); ?>>01 am</option>
                                                <option value="02 am" <?php echo e($listingSchedules['wed_close'] == "02 am" ? 'selected' : ''); ?>>02 am</option>
                                                <option value="03 am" <?php echo e($listingSchedules['wed_close'] == "03 am" ? 'selected' : ''); ?>>03 am</option>
                                                <option value="04 am" <?php echo e($listingSchedules['wed_close'] == "04 am" ? 'selected' : ''); ?>>04 am</option>
                                                <option value="05 am" <?php echo e($listingSchedules['wed_close'] == "05 am" ? 'selected' : ''); ?>>05 am</option>
                                                <option value="06 am" <?php echo e($listingSchedules['wed_close'] == "06 am" ? 'selected' : ''); ?>>06 am</option>
                                                <option value="07 am" <?php echo e($listingSchedules['wed_close'] == "07 am" ? 'selected' : ''); ?>>07 am</option>
                                                <option value="08 am" <?php echo e($listingSchedules['wed_close'] == "08 am" ? 'selected' : ''); ?>>08 am</option>
                                                <option value="09 am" <?php echo e($listingSchedules['wed_close'] == "09 am" ? 'selected' : ''); ?>>09 am</option>
                                                <option value="10 am" <?php echo e($listingSchedules['wed_close'] == "10 am" ? 'selected' : ''); ?>>10 am</option>
                                                <option value="11 am" <?php echo e($listingSchedules['wed_close'] == "11 am" ? 'selected' : ''); ?>>11 am</option>
                                                <option value="12 pm" <?php echo e($listingSchedules['wed_close'] == "12 pm" ? 'selected' : ''); ?>>12 pm</option>
                                                <option value="01 pm" <?php echo e($listingSchedules['wed_close'] == "01 pm" ? 'selected' : ''); ?>>01 pm</option>
                                                <option value="02 pm" <?php echo e($listingSchedules['wed_close'] == "02 pm" ? 'selected' : ''); ?>>02 pm</option>
                                                <option value="03 pm" <?php echo e($listingSchedules['wed_close'] == "03 pm" ? 'selected' : ''); ?>>03 pm</option>
                                                <option value="04 pm" <?php echo e($listingSchedules['wed_close'] == "04 pm" ? 'selected' : ''); ?>>04 pm</option>
                                                <option value="05 pm" <?php echo e($listingSchedules['wed_close'] == "05 pm" ? 'selected' : ''); ?>>05 pm</option>
                                                <option value="06 pm" <?php echo e($listingSchedules['wed_close'] == "06 pm" ? 'selected' : ''); ?>>06 pm</option>
                                                <option value="07 pm" <?php echo e($listingSchedules['wed_close'] == "07 pm" ? 'selected' : ''); ?>>07 pm</option>
                                                <option value="08 pm" <?php echo e($listingSchedules['wed_close'] == "08 pm" ? 'selected' : ''); ?>>08 pm</option>
                                                <option value="09 pm" <?php echo e($listingSchedules['wed_close'] == "09 pm" ? 'selected' : ''); ?>>09 pm</option>
                                                <option value="10 pm" <?php echo e($listingSchedules['wed_close'] == "10 pm" ? 'selected' : ''); ?>>10 pm</option>
                                                <option value="11 pm" <?php echo e($listingSchedules['wed_close'] == "11 pm" ? 'selected' : ''); ?>>11 pm</option>
                                                <option value="closed" <?php echo e($listingSchedules['wed_close'] == 'closed' ? 'selected' : ''); ?>>Closed</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="left-area">
                                                <h4 class="heading"><?php echo e(__('Thursday')); ?> *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <select class="input-field" name="thursday_opening">
                                                <option value="" selected><?php echo e(__('Opening Time')); ?></option>
                                                <option value="12 am" <?php echo e($listingSchedules['thu_open'] == "12 am" ? 'selected' : ''); ?>>12 am</option>
                                                <option value="01 am" <?php echo e($listingSchedules['thu_open'] == "01 am" ? 'selected' : ''); ?>>01 am</option>
                                                <option value="02 am" <?php echo e($listingSchedules['thu_open'] == "02 am" ? 'selected' : ''); ?>>02 am</option>
                                                <option value="03 am" <?php echo e($listingSchedules['thu_open'] == "03 am" ? 'selected' : ''); ?>>03 am</option>
                                                <option value="04 am" <?php echo e($listingSchedules['thu_open'] == "04 am" ? 'selected' : ''); ?>>04 am</option>
                                                <option value="05 am" <?php echo e($listingSchedules['thu_open'] == "05 am" ? 'selected' : ''); ?>>05 am</option>
                                                <option value="06 am" <?php echo e($listingSchedules['thu_open'] == "06 am" ? 'selected' : ''); ?>>06 am</option>
                                                <option value="07 am" <?php echo e($listingSchedules['thu_open'] == "07 am" ? 'selected' : ''); ?>>07 am</option>
                                                <option value="08 am" <?php echo e($listingSchedules['thu_open'] == "08 am" ? 'selected' : ''); ?>>08 am</option>
                                                <option value="09 am" <?php echo e($listingSchedules['thu_open'] == "09 am" ? 'selected' : ''); ?>>09 am</option>
                                                <option value="10 am" <?php echo e($listingSchedules['thu_open'] == "10 am" ? 'selected' : ''); ?>>10 am</option>
                                                <option value="11 am" <?php echo e($listingSchedules['thu_open'] == "11 am" ? 'selected' : ''); ?>>11 am</option>
                                                <option value="12 pm" <?php echo e($listingSchedules['thu_open'] == "12 pm" ? 'selected' : ''); ?>>12 pm</option>
                                                <option value="01 pm" <?php echo e($listingSchedules['thu_open'] == "01 pm" ? 'selected' : ''); ?>>01 pm</option>
                                                <option value="02 pm" <?php echo e($listingSchedules['thu_open'] == "02 pm" ? 'selected' : ''); ?>>02 pm</option>
                                                <option value="03 pm" <?php echo e($listingSchedules['thu_open'] == "03 pm" ? 'selected' : ''); ?>>03 pm</option>
                                                <option value="04 pm" <?php echo e($listingSchedules['thu_open'] == "04 pm" ? 'selected' : ''); ?>>04 pm</option>
                                                <option value="05 pm" <?php echo e($listingSchedules['thu_open'] == "05 pm" ? 'selected' : ''); ?>>05 pm</option>
                                                <option value="06 pm" <?php echo e($listingSchedules['thu_open'] == "06 pm" ? 'selected' : ''); ?>>06 pm</option>
                                                <option value="07 pm" <?php echo e($listingSchedules['thu_open'] == "07 pm" ? 'selected' : ''); ?>>07 pm</option>
                                                <option value="08 pm" <?php echo e($listingSchedules['thu_open'] == "08 pm" ? 'selected' : ''); ?>>08 pm</option>
                                                <option value="09 pm" <?php echo e($listingSchedules['thu_open'] == "09 pm" ? 'selected' : ''); ?>>09 pm</option>
                                                <option value="10 pm" <?php echo e($listingSchedules['thu_open'] == "10 pm" ? 'selected' : ''); ?>>10 pm</option>
                                                <option value="11 pm" <?php echo e($listingSchedules['thu_open'] == "11 pm" ? 'selected' : ''); ?>>11 pm</option>
                                                <option value="closed" <?php echo e($listingSchedules['thu_open'] == 'closed' ? 'selected' : ''); ?>>Closed</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-5">
                                            <select class="input-field" name="thursday_closing">
                                                <option value="" selected><?php echo e(__('Closing Time')); ?></option>
                                                <option value="12 am" <?php echo e($listingSchedules['thu_close'] == "12 am" ? 'selected' : ''); ?>>12 am</option>
                                                <option value="01 am" <?php echo e($listingSchedules['thu_close'] == "01 am" ? 'selected' : ''); ?>>01 am</option>
                                                <option value="02 am" <?php echo e($listingSchedules['thu_close'] == "02 am" ? 'selected' : ''); ?>>02 am</option>
                                                <option value="03 am" <?php echo e($listingSchedules['thu_close'] == "03 am" ? 'selected' : ''); ?>>03 am</option>
                                                <option value="04 am" <?php echo e($listingSchedules['thu_close'] == "04 am" ? 'selected' : ''); ?>>04 am</option>
                                                <option value="05 am" <?php echo e($listingSchedules['thu_close'] == "05 am" ? 'selected' : ''); ?>>05 am</option>
                                                <option value="06 am" <?php echo e($listingSchedules['thu_close'] == "06 am" ? 'selected' : ''); ?>>06 am</option>
                                                <option value="07 am" <?php echo e($listingSchedules['thu_close'] == "07 am" ? 'selected' : ''); ?>>07 am</option>
                                                <option value="08 am" <?php echo e($listingSchedules['thu_close'] == "08 am" ? 'selected' : ''); ?>>08 am</option>
                                                <option value="09 am" <?php echo e($listingSchedules['thu_close'] == "09 am" ? 'selected' : ''); ?>>09 am</option>
                                                <option value="10 am" <?php echo e($listingSchedules['thu_close'] == "10 am" ? 'selected' : ''); ?>>10 am</option>
                                                <option value="11 am" <?php echo e($listingSchedules['thu_close'] == "11 am" ? 'selected' : ''); ?>>11 am</option>
                                                <option value="12 pm" <?php echo e($listingSchedules['thu_close'] == "12 pm" ? 'selected' : ''); ?>>12 pm</option>
                                                <option value="01 pm" <?php echo e($listingSchedules['thu_close'] == "01 pm" ? 'selected' : ''); ?>>01 pm</option>
                                                <option value="02 pm" <?php echo e($listingSchedules['thu_close'] == "02 pm" ? 'selected' : ''); ?>>02 pm</option>
                                                <option value="03 pm" <?php echo e($listingSchedules['thu_close'] == "03 pm" ? 'selected' : ''); ?>>03 pm</option>
                                                <option value="04 pm" <?php echo e($listingSchedules['thu_close'] == "04 pm" ? 'selected' : ''); ?>>04 pm</option>
                                                <option value="05 pm" <?php echo e($listingSchedules['thu_close'] == "05 pm" ? 'selected' : ''); ?>>05 pm</option>
                                                <option value="06 pm" <?php echo e($listingSchedules['thu_close'] == "06 pm" ? 'selected' : ''); ?>>06 pm</option>
                                                <option value="07 pm" <?php echo e($listingSchedules['thu_close'] == "07 pm" ? 'selected' : ''); ?>>07 pm</option>
                                                <option value="08 pm" <?php echo e($listingSchedules['thu_close'] == "08 pm" ? 'selected' : ''); ?>>08 pm</option>
                                                <option value="09 pm" <?php echo e($listingSchedules['thu_close'] == "09 pm" ? 'selected' : ''); ?>>09 pm</option>
                                                <option value="10 pm" <?php echo e($listingSchedules['thu_close'] == "10 pm" ? 'selected' : ''); ?>>10 pm</option>
                                                <option value="11 pm" <?php echo e($listingSchedules['thu_close'] == "11 pm" ? 'selected' : ''); ?>>11 pm</option>
                                                <option value="closed" <?php echo e($listingSchedules['thu_close'] == 'closed' ? 'selected' : ''); ?>>Closed</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="left-area">
                                                <h4 class="heading"><?php echo e(__('Friday')); ?> *</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <select class="input-field" name="friday_opening">
                                                <option value="" selected><?php echo e(__('Opening Time')); ?></option>
                                                <option value="12 am" <?php echo e($listingSchedules['fri_open'] == "12 am" ? 'selected' : ''); ?>>12 am</option>
                                                <option value="01 am" <?php echo e($listingSchedules['fri_open'] == "01 am" ? 'selected' : ''); ?>>01 am</option>
                                                <option value="02 am" <?php echo e($listingSchedules['fri_open'] == "02 am" ? 'selected' : ''); ?>>02 am</option>
                                                <option value="03 am" <?php echo e($listingSchedules['fri_open'] == "03 am" ? 'selected' : ''); ?>>03 am</option>
                                                <option value="04 am" <?php echo e($listingSchedules['fri_open'] == "04 am" ? 'selected' : ''); ?>>04 am</option>
                                                <option value="05 am" <?php echo e($listingSchedules['fri_open'] == "05 am" ? 'selected' : ''); ?>>05 am</option>
                                                <option value="06 am" <?php echo e($listingSchedules['fri_open'] == "06 am" ? 'selected' : ''); ?>>06 am</option>
                                                <option value="07 am" <?php echo e($listingSchedules['fri_open'] == "07 am" ? 'selected' : ''); ?>>07 am</option>
                                                <option value="08 am" <?php echo e($listingSchedules['fri_open'] == "08 am" ? 'selected' : ''); ?>>08 am</option>
                                                <option value="09 am" <?php echo e($listingSchedules['fri_open'] == "09 am" ? 'selected' : ''); ?>>09 am</option>
                                                <option value="10 am" <?php echo e($listingSchedules['fri_open'] == "10 am" ? 'selected' : ''); ?>>10 am</option>
                                                <option value="11 am" <?php echo e($listingSchedules['fri_open'] == "11 am" ? 'selected' : ''); ?>>11 am</option>
                                                <option value="12 pm" <?php echo e($listingSchedules['fri_open'] == "12 pm" ? 'selected' : ''); ?>>12 pm</option>
                                                <option value="01 pm" <?php echo e($listingSchedules['fri_open'] == "01 pm" ? 'selected' : ''); ?>>01 pm</option>
                                                <option value="02 pm" <?php echo e($listingSchedules['fri_open'] == "02 pm" ? 'selected' : ''); ?>>02 pm</option>
                                                <option value="03 pm" <?php echo e($listingSchedules['fri_open'] == "03 pm" ? 'selected' : ''); ?>>03 pm</option>
                                                <option value="04 pm" <?php echo e($listingSchedules['fri_open'] == "04 pm" ? 'selected' : ''); ?>>04 pm</option>
                                                <option value="05 pm" <?php echo e($listingSchedules['fri_open'] == "05 pm" ? 'selected' : ''); ?>>05 pm</option>
                                                <option value="06 pm" <?php echo e($listingSchedules['fri_open'] == "06 pm" ? 'selected' : ''); ?>>06 pm</option>
                                                <option value="07 pm" <?php echo e($listingSchedules['fri_open'] == "07 pm" ? 'selected' : ''); ?>>07 pm</option>
                                                <option value="08 pm" <?php echo e($listingSchedules['fri_open'] == "08 pm" ? 'selected' : ''); ?>>08 pm</option>
                                                <option value="09 pm" <?php echo e($listingSchedules['fri_open'] == "09 pm" ? 'selected' : ''); ?>>09 pm</option>
                                                <option value="10 pm" <?php echo e($listingSchedules['fri_open'] == "10 pm" ? 'selected' : ''); ?>>10 pm</option>
                                                <option value="11 pm" <?php echo e($listingSchedules['fri_open'] == "11 pm" ? 'selected' : ''); ?>>11 pm</option>
                                                <option value="closed" <?php echo e($listingSchedules['fri_open'] == 'closed' ? 'selected' : ''); ?>>Closed</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-5">
                                            <select class="input-field" name="friday_closing">
                                                <option value="" selected><?php echo e(__('Closing Time')); ?></option>
                                                <option value="12 am" <?php echo e($listingSchedules['fri_close'] == "12 am" ? 'selected' : ''); ?>>12 am</option>
                                                <option value="01 am" <?php echo e($listingSchedules['fri_close'] == "01 am" ? 'selected' : ''); ?>>01 am</option>
                                                <option value="02 am" <?php echo e($listingSchedules['fri_close'] == "02 am" ? 'selected' : ''); ?>>02 am</option>
                                                <option value="03 am" <?php echo e($listingSchedules['fri_close'] == "03 am" ? 'selected' : ''); ?>>03 am</option>
                                                <option value="04 am" <?php echo e($listingSchedules['fri_close'] == "04 am" ? 'selected' : ''); ?>>04 am</option>
                                                <option value="05 am" <?php echo e($listingSchedules['fri_close'] == "05 am" ? 'selected' : ''); ?>>05 am</option>
                                                <option value="06 am" <?php echo e($listingSchedules['fri_close'] == "06 am" ? 'selected' : ''); ?>>06 am</option>
                                                <option value="07 am" <?php echo e($listingSchedules['fri_close'] == "07 am" ? 'selected' : ''); ?>>07 am</option>
                                                <option value="08 am" <?php echo e($listingSchedules['fri_close'] == "08 am" ? 'selected' : ''); ?>>08 am</option>
                                                <option value="09 am" <?php echo e($listingSchedules['fri_close'] == "09 am" ? 'selected' : ''); ?>>09 am</option>
                                                <option value="10 am" <?php echo e($listingSchedules['fri_close'] == "10 am" ? 'selected' : ''); ?>>10 am</option>
                                                <option value="11 am" <?php echo e($listingSchedules['fri_close'] == "11 am" ? 'selected' : ''); ?>>11 am</option>
                                                <option value="12 pm" <?php echo e($listingSchedules['fri_close'] == "12 pm" ? 'selected' : ''); ?>>12 pm</option>
                                                <option value="01 pm" <?php echo e($listingSchedules['fri_close'] == "01 pm" ? 'selected' : ''); ?>>01 pm</option>
                                                <option value="02 pm" <?php echo e($listingSchedules['fri_close'] == "02 pm" ? 'selected' : ''); ?>>02 pm</option>
                                                <option value="03 pm" <?php echo e($listingSchedules['fri_close'] == "03 pm" ? 'selected' : ''); ?>>03 pm</option>
                                                <option value="04 pm" <?php echo e($listingSchedules['fri_close'] == "04 pm" ? 'selected' : ''); ?>>04 pm</option>
                                                <option value="05 pm" <?php echo e($listingSchedules['fri_close'] == "05 pm" ? 'selected' : ''); ?>>05 pm</option>
                                                <option value="06 pm" <?php echo e($listingSchedules['fri_close'] == "06 pm" ? 'selected' : ''); ?>>06 pm</option>
                                                <option value="07 pm" <?php echo e($listingSchedules['fri_close'] == "07 pm" ? 'selected' : ''); ?>>07 pm</option>
                                                <option value="08 pm" <?php echo e($listingSchedules['fri_close'] == "08 pm" ? 'selected' : ''); ?>>08 pm</option>
                                                <option value="09 pm" <?php echo e($listingSchedules['fri_close'] == "09 pm" ? 'selected' : ''); ?>>09 pm</option>
                                                <option value="10 pm" <?php echo e($listingSchedules['fri_close'] == "10 pm" ? 'selected' : ''); ?>>10 pm</option>
                                                <option value="11 pm" <?php echo e($listingSchedules['fri_close'] == "11 pm" ? 'selected' : ''); ?>>11 pm</option>
                                                <option value="closed" <?php echo e($listingSchedules['fri_close'] == 'closed' ? 'selected' : ''); ?>>Closed</option>
                                            </select>
                                        </div>
                                    </div>

                                    <ul class="list-inline mt-3 mb-0  text-center">
                                        <li class="list-inline-item">
                                            <a href="javascript:;" data-href=".media" class="next-prev btn btn-primary"> <?php echo e(__('Prev')); ?> </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:;" data-href=".contact" class="next-prev btn btn-primary"> <?php echo e(__('Next')); ?> </a>
                                        </li>
                                    </ul>

                                </div>

                                <div id="contact" class="container tab-pane"><br>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading"><?php echo e(__('Website')); ?></h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-9">
                                            <input type="text" class="input-field" id="inp-website" name="website" placeholder="<?php echo e(__('Website')); ?>" value="<?php echo e($data->website); ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading"><?php echo e(__('Email')); ?></h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-9">
                                            <input type="text" class="input-field" name="email" placeholder="<?php echo e(__('Email')); ?>" value="<?php echo e($data->email); ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading"><?php echo e(__('Phone number')); ?></h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-9">
                                            <input type="text" class="input-field" name="phone_number" placeholder="<?php echo e(__('Phone number')); ?>" value="<?php echo e($data->phone_number); ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading"><?php echo e(__('Facebook')); ?></h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-9">
                                            <input type="text" class="input-field" name="facebook" placeholder="<?php echo e(__('Facebook')); ?>" value="<?php echo e($data->facebook); ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading"><?php echo e(__('Twitter')); ?></h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-9">
                                            <input type="text" class="input-field" name="twitter" placeholder="<?php echo e(__('Twitter')); ?>" value="<?php echo e($data->twitter); ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="left-area">
                                                <h4 class="heading"><?php echo e(__('Linkedin')); ?></h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-9">
                                            <input type="text" class="input-field" name="linkedin" placeholder="<?php echo e(__('Linkedin')); ?>" value="<?php echo e($data->linkedin); ?>">
                                        </div>
                                    </div>

                                    <ul class="list-inline mt-3 mb-0  text-center">
                                        <li class="list-inline-item">
                                            <a href="javascript:;" data-href=".schedule" class="next-prev btn btn-primary"> <?php echo e(__('Prev')); ?> </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:;" data-href=".dynamic" class="next-prev btn btn-primary"> <?php echo e(__('Next')); ?> </a>
                                        </li>
                                    </ul>

                                </div>

                                <div id="dynamic" class="container tab-pane"><br>
                                    <?php if(request()->type == 'restaurant'): ?>
                                        <div class="menu-section-area">
                                            <?php if ($__env->exists('partials.admin.listing.menu',['menus' => $menus])) echo $__env->make('partials.admin.listing.menu',['menus' => $menus], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>

                                        <div class="row my-2">
                                            <div class="col-lg-12 text-center">
                                                <a href="javascript:;" id="menud-add-btn" class="btn btn-info"><i class="fa fa-plus"></i> <?php echo e(__('Add More')); ?></a>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(request()->type == 'hotel'): ?>
                                        <div class="room-section-area">
                                            <?php if ($__env->exists('partials.admin.listing.room',['rooms'=> $rooms])) echo $__env->make('partials.admin.listing.room',['rooms'=> $rooms], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>

                                        <div class="row my-2">
                                            <div class="col-lg-12 text-center">
                                                <a href="javascript:;" id="room-add-btn" class="btn btn-info"><i class="fa fa-plus"></i> <?php echo e(__('Add More')); ?></a>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(request()->type == 'beauty'): ?>
                                        <div class="beauty-section-area">
                                            <?php if ($__env->exists('partials.admin.listing.beauty',['beauties'=> $beauties])) echo $__env->make('partials.admin.listing.beauty',['beauties'=> $beauties], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>

                                        <div class="row my-2">
                                            <div class="col-lg-12 text-center">
                                                <a href="javascript:;" id="beauty-add-btn" class="btn btn-info"><i class="fa fa-plus"></i> <?php echo e(__('Add More')); ?></a>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(request()->type == 'real_estate'): ?>
                                        <?php if ($__env->exists('partials.admin.listing.real_estate')) echo $__env->make('partials.admin.listing.real_estate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>

                                    <?php if(request()->type == 'car'): ?>
                                        <?php if ($__env->exists('partials.admin.listing.car')) echo $__env->make('partials.admin.listing.car', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>

                                    <ul class="list-inline mt-3 mb-0  text-center">
                                        <li class="list-inline-item">
                                            <a href="javascript:;" data-href=".contact" class="next-prev btn btn-primary"> <?php echo e(__('Prev')); ?> </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:;" data-href=".faq" class="next-prev btn btn-primary"> <?php echo e(__('Next')); ?> </a>
                                        </li>
                                    </ul>

                                </div>

                                <div id="faq" class="container tab-pane"><br>
                                    <div class="faq-section-area">
                                        <?php if ($__env->exists('partials.admin.listing.faq')) echo $__env->make('partials.admin.listing.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>

                                    <div class="row my-2">
                                        <div class="col-lg-12 text-center">
                                            <a href="javascript:;" id="faq-add-btn" class="btn btn-info"><i class="fa fa-plus"></i> <?php echo e(__('Add More')); ?></a>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center mt-3">
                                        <button type="submit" id="submit-btn" class="btn btn-primary text-center"><?php echo e(__('Submit')); ?></button>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade dynamic-modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="dynamicModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?php echo e(__("Confirm Delete")); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p class="text-center"><?php echo e(__("You are about to delete this Item. Every informtation under this item will be deleted.")); ?></p>
				<p class="text-center"><?php echo e(__("Do you want to proceed?")); ?></p>
			</div>
			<div class="modal-footer">
				<a href="javascript:;" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("Cancel")); ?></a>
				<a href="javascript:;" class="btn btn-danger btn-ok"><?php echo e(__("Delete")); ?></a>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="setgallery" tabindex="-1" role="dialog" aria-labelledby="setgallery" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo e(__('Image Gallery')); ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="top-area">
                <div class="row">
                    <div class="col-sm-6 text-right">
                        <div class="upload-img-btn">
                            <form  method="POST" enctype="multipart/form-data" id="form-gallery">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" id="listing_id" name="listing_id" value="<?php echo e($data->id); ?>">
                                <input type="file" name="gallery[]" class="hidden" id="property_upload_gallery_edit" accept="image/*" multiple>
                                <label id="property_gallery_edit"><i class="icofont-upload-alt"></i><?php echo e(__("Upload File")); ?></label>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <a href="javascript:;" class="upload-done" data-dismiss="modal"> <i class="fas fa-check"></i> <?php echo e(__('Done')); ?></a>
                    </div>
                    <div class="col-sm-12 text-center">( <small><?php echo e(__('You can upload multiple Images.')); ?></small> )</div>
                </div>
            </div>
            <div class="gallery-images">
                <div class="selected-image">
                    <div class="row">


                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('assets/admin/js/image_gallary.js')); ?>"></script>
<script>
    'use strict';
    <?php if(isset($menus)): ?>
        let menuId = '<?php echo e(count($menus) >0 ? count($menus) : 1); ?>';
        $('#menud-add-btn').on('click',function(){
            $('.menu-section-area').append(''+
                `<div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Menu Items')); ?></h6>
                        <button class="border-0"><i class="fas fa-trash-alt text-danger"></i></button>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="left-area">
                                    <h4 class="heading"><?php echo e(__('Menu Name')); ?> *</h4>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="input-field" name="menu_title[]" placeholder="<?php echo e(__('Enter Name')); ?>" value="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="left-area">
                                    <h4 class="heading"><?php echo e(__('Menu Price')); ?> *</h4>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <input type="number" class="input-field" name="menu_price[]" placeholder="<?php echo e(__('Enter Price')); ?>" value="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="left-area">
                                    <h4 class="heading"><?php echo e(__('Menu Photo')); ?></h4>
                                    <p class="sub-heading">(<?php echo e(__('Preferred Size 600 x 600')); ?>)</p>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="wrapper-image-preview">
                                    <div class="box">
                                        <div class="back-preview-image" style="background-image: url(<?php echo e(asset('assets/images/placeholder.jpg')); ?>);"></div>
                                        <div class="upload-options">
                                            <label class="img-upload-label" for="menu-items-${menuId}"><i class="fas fa-camera"></i> <?php echo e(__('Upload Picture')); ?> </label>
                                            <input id="menu-items-${menuId}" type="file" class="image-upload" name="menu_photo[]" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`
            +'')
            menuId ++;
        })
    <?php endif; ?>

    <?php if(isset($rooms)): ?>
        let roomId = '<?php echo e(count($rooms) >0 ? count($rooms) : 1); ?>';
        $('#room-add-btn').on('click',function(){
            $('.room-section-area').append(''+
                `<div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Hotel room')); ?></h6>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="left-area">
                                    <h4 class="heading"><?php echo e(__('Room Name')); ?> *</h4>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="input-field" name="room_name[]" placeholder="<?php echo e(__('Enter Name')); ?>" value="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="left-area">
                                    <h4 class="heading"><?php echo e(__('Room Price')); ?> *</h4>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <input type="number" class="input-field" name="room_price[]" placeholder="<?php echo e(__('Enter Price')); ?>" value="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="left-area">
                                    <h4 class="heading"><?php echo e(__('Room Photo')); ?></h4>
                                    <p class="sub-heading">(<?php echo e(__('Preferred Size 600 x 600')); ?>)</p>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="wrapper-image-preview">
                                    <div class="box">
                                        <div class="back-preview-image" style="background-image: url(<?php echo e(asset('assets/images/placeholder.jpg')); ?>);"></div>
                                        <div class="upload-options">
                                            <label class="img-upload-label" for="room-items-${roomId}"><i class="fas fa-camera"></i> <?php echo e(__('Upload Picture')); ?> </label>
                                            <input id="room-items-${roomId}" type="file" class="image-upload" name="room_photo[]" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-3">
                                <div class="left-area">
                                    <h4 class="heading"><?php echo e(__('Room amenities')); ?></h4>
                                    <p class="sub-heading"><?php echo e(__('Seperated By Comma(,)')); ?></p>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                <input type="text" id="tags" class="mytags tagify${roomId}" name="room_amenities[]" placeholder="<?php echo e(__('Room amenities')); ?>"  value="">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-3">
                                <div class="left-area">
                                    <h4 class="heading"><?php echo e(__('Room description')); ?></h4>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <textarea class="input-field" name="room_description[]" placeholder="<?php echo e(__('Room description')); ?>" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                `
            +'')
            $('.tagify'+roomId).tagify({focus: true});
            roomId ++;
        })
    <?php endif; ?>

    <?php if(isset($beauties)): ?>
        let beautyId = '<?php echo e(count($beauties) >0 ? count($beauties) : 1); ?>';
        $('#beauty-add-btn').on('click',function(){
            $('.beauty-section-area').append(''+
                `<div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="left-area">
                                    <h4 class="heading"><?php echo e(__('Service Name')); ?> *</h4>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="input-field" name="service_name[]" placeholder="<?php echo e(__('Enter Name')); ?>" value="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="left-area">
                                    <h4 class="heading"><?php echo e(__('Service Price')); ?> *</h4>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <input type="number" class="input-field" name="service_price[]" placeholder="<?php echo e(__('Enter Price')); ?>" value="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="left-area">
                                    <h4 class="heading"><?php echo e(__('Service Photo')); ?></h4>
                                    <p class="sub-heading">(<?php echo e(__('Preferred Size 600 x 600')); ?>)</p>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="wrapper-image-preview">
                                    <div class="box">
                                        <div class="back-preview-image" style="background-image: url(<?php echo e(asset('assets/images/placeholder.jpg')); ?>);"></div>
                                        <div class="upload-options">
                                            <label class="img-upload-label" for="service-items-${beautyId}"><i class="fas fa-camera"></i> <?php echo e(__('Upload Picture')); ?> </label>
                                            <input id="service-items-${beautyId}" type="file" class="image-upload" name="service_photo[]" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-lg-3">
                                <div class="left-area">
                                    <h4 class="heading"><?php echo e(__('Service Time')); ?> *</h4>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" class="input-field" name="service_from[]" placeholder="<?php echo e(__('Enter time')); ?>" value="">
                                    </div>

                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="left-area">
                                                    <h4 class="heading"><?php echo e(__('To')); ?> *</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <input type="text" class="input-field" name="service_to[]" placeholder="<?php echo e(__('Enter time')); ?>" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="left-area">
                                    <h4 class="heading"><?php echo e(__('Service Duration')); ?> *</h4>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <input type="number" class="input-field" name="service_duration[]" placeholder="<?php echo e(__('Enter Duration')); ?>" value="">
                            </div>
                        </div>
                    </div>
                </div>`
                +'')
            beautyId ++;
        })
    <?php endif; ?>

    <?php if(isset($faqs)): ?>
        $("#faq-add-btn").on('click',function(){
            $('.faq-section-area').append(''+
                `<div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('FAQ Items')); ?></h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="left-area">
                                    <h4 class="heading"><?php echo e(__('Name')); ?> *</h4>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="input-field" name="faq_name[]" placeholder="<?php echo e(__('Enter Name')); ?>" value="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="left-area">
                                    <h4 class="heading"><?php echo e(__('Description')); ?> *</h4>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <textarea name="faq_details[]" class="input-field" placeholder="<?php echo e(__('Description')); ?>" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                    </div>
                </div>`
            +'')
        })
    <?php endif; ?>

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/admin/listing/edit.blade.php ENDPATH**/ ?>