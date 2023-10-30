
<?php if($gs->theme == 'theme-3' || $gs->theme == 'theme-5'): ?>
    <div class="header <?php echo e(request()->path() == '/' ? 'header-transparent change-logo' : 'header-light dark-text head-border'); ?>">
        <div class="container">
            <nav id="navigation" class="navigation navigation-landscape">
                <div class="nav-header">
                    <a class="nav-brand static-logo" href="<?php echo e(route('front.index')); ?>"><img src="<?php echo e(asset('assets/images/'.$gs->light_logo)); ?>" class="logo" alt="" /></a>
                    <a class="nav-brand fixed-logo" href="<?php echo e(route('front.index')); ?>"><img src="<?php echo e(asset('assets/images/'.$gs->logo)); ?>" class="logo" alt="" /></a>

                    <div class="nav-toggle"></div>
                    <div class="mobile_nav">
                        <ul>
                            <?php if(auth()->guard()->check()): ?>
                                <li>
                                    <a href="<?php echo e(route('user.dashboard')); ?>" class="theme-cl fs-lg">
                                        <i class="lni lni-user"></i>
                                    </a>
                            </li>
                            <?php else: ?>
                                <li>
                                    <a href="<?php echo e(route('user.login')); ?>" class="theme-cl fs-lg">
                                        <i class="lni lni-user"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="nav-menus-wrapper" style="transition-property: none;">
                    <ul class="nav-menu">
                        <?php $__currentLoopData = json_decode($gs->menu,true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(url($menue['href'])); ?>" target="<?php echo e($menue['target'] == 'blank' ? '_blank' : '_self'); ?>"><?php echo e($menue['title']); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                    <ul class="nav-menu nav-menu-social align-to-right">
                        <?php if(auth()->guard()->check()): ?>
                            <li><a href="javascript:void(0);"><?php echo app('translator')->get('My account'); ?></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="<?php echo e(route('user.dashboard')); ?>"><i class="lni lni-dashboard me-2"></i><?php echo app('translator')->get('Dashboard'); ?></a></li>
                                    <li><a href="<?php echo e(route('user.change.password.form')); ?>"><i class="lni lni-lock-alt me-2"></i><?php echo app('translator')->get('Change Password'); ?></a></li>
                                    <li><a href="<?php echo e(route('user.logout')); ?>"><i class="lni lni-dashboard me-2"></i><?php echo app('translator')->get('Logout'); ?></a></li>
                                </ul>
                            </li>

                            <li class="add-listing">
                                <a href="<?php echo e(route('user.listing.type')); ?>" >
                                    <i class="fas fa-plus me-2"></i><?php echo app('translator')->get('Add Listing'); ?>
                                </a>
                            </li>
                        <?php else: ?>
                            <li>
                                <a href="<?php echo e(route('user.login')); ?>" class="ft-bold">
                                    <i class="fas fa-sign-in-alt me-1 theme-cl"></i><?php echo app('translator')->get('Sign In'); ?>
                                </a>
                            </li>
                            <li class="add-listing">
                                <a href="<?php echo e(route('user.listing.type')); ?>" >
                                    <i class="fas fa-plus me-2"></i><?php echo app('translator')->get('Add Listing'); ?>
                                </a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
<?php else: ?>
<div class="header header-light dark-text">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="<?php echo e(url('/')); ?>">
                    <img src="<?php echo e(asset('assets/images/'.$gs->logo)); ?>" class="logo" alt="" />
                </a>
                <div class="nav-toggle"></div>
                <div class="mobile_nav">
                    <ul>
                        <?php if(auth()->guard()->check()): ?>
                            <li>
                                <a href="<?php echo e(route('user.dashboard')); ?>" class="ft-bold">
                                    <?php echo app('translator')->get('Dashboard'); ?>
                                </a>
                            </li>
                        <?php else: ?>
                            <li>
                                <a href="<?php echo e(route('user.login')); ?>" class="theme-cl fs-lg">
                                    <i class="lni lni-user"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">
                <ul class="nav-menu">
                    <?php $__currentLoopData = json_decode($gs->menu,true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e(url($menue['href'])); ?>" target="<?php echo e($menue['target'] == 'blank' ? '_blank' : '_self'); ?>"><?php echo e($menue['title']); ?> </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>

                <ul class="nav-menu nav-menu-social align-to-right">

                    <?php if(auth()->guard()->check()): ?>
                        <li><a href="javascript:void(0);"><?php echo app('translator')->get('My account'); ?></a>
                            <ul class="nav-dropdown nav-submenu">
                                <li><a href="<?php echo e(route('user.dashboard')); ?>"><i class="lni lni-dashboard me-2"></i><?php echo app('translator')->get('Dashboard'); ?></a></li>
                                <li><a href="<?php echo e(route('user.change.password.form')); ?>"><i class="lni lni-lock-alt me-2"></i><?php echo app('translator')->get('Change Password'); ?></a></li>
                                <li><a href="<?php echo e(route('user.logout')); ?>"><i class="lni lni-dashboard me-2"></i><?php echo app('translator')->get('Logout'); ?></a></li>
                            </ul>
                        </li>

                        <li class="add-listing">
                            <a href="<?php echo e(route('user.listing.type')); ?>" >
                                <i class="fas fa-plus me-2"></i><?php echo app('translator')->get('Add Listing'); ?>
                            </a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="<?php echo e(route('user.login')); ?>" class="ft-bold">
                                <i class="fas fa-sign-in-alt me-1 theme-cl"></i><?php echo app('translator')->get('Sign In'); ?>
                            </a>
                        </li>
                        <li class="add-listing">
                            <a href="<?php echo e(route('user.listing.type')); ?>" >
                                <i class="fas fa-plus me-2"></i><?php echo app('translator')->get('Add Listing'); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </div>
</div>
<?php endif; ?>

<?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/partials/front/nav.blade.php ENDPATH**/ ?>