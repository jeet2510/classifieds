<div class="dashboard-nav sticky-top">
    <div class="dashboard-inner">
        <ul data-submenu-title="Main Navigation">
            <li class="<?php echo e(request()->routeIs('user.dashboard') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.dashboard')); ?>"><i class="lni lni-dashboard me-2"></i><?php echo app('translator')->get('Dashboard'); ?></a></li>
            <li class="<?php echo e(request()->routeIs('user.transaction') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.transaction')); ?>"><i class="lni lni-stats-up me-2"></i><?php echo app('translator')->get('Transactions'); ?></a></li>
            <li class="<?php echo e(request()->routeIs('user.listing.type') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.listing.type')); ?>"><i class="lni lni-add-files me-2"></i><?php echo app('translator')->get('Add Listing'); ?></a></li>
            <li class="<?php echo e(request()->routeIs('user.listing.index') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.listing.index')); ?>"><i class="lni lni-files me-2"></i><?php echo app('translator')->get('My Listings'); ?></a></li>
            <li class="<?php echo e(request()->routeIs('user.saved.listing') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.saved.listing')); ?>"><i class="lni lni-bookmark me-2"></i><?php echo app('translator')->get('Saved Listing'); ?></a></li>
            <li class="<?php echo e(request()->routeIs('user.my.booking') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.my.booking')); ?>"><i class="lni lni-briefcase me-2"></i><?php echo app('translator')->get('My Bookings'); ?></a></li>
            <li class="<?php echo e(request()->routeIs('user.pricing.plans') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.pricing.plans')); ?>"><i class="lni lni-money-protection me-2"></i><?php echo app('translator')->get('Pricing Plan'); ?></a></li>
            <?php if($ticket = DB::table('admin_user_conversations')->orderBy('id','desc')->first()): ?>
                <li class="<?php echo e(request()->routeIs('user.message.index') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.message.index',['ticket' => $ticket->id])); ?>"><i class="lni lni-envelope me-2"></i><?php echo app('translator')->get('Messages'); ?></a></li>
            <?php else: ?>
                <li class="<?php echo e(request()->routeIs('user.message.index') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.message.index')); ?>"><i class="lni lni-envelope me-2"></i><?php echo app('translator')->get('Messages'); ?></a></li>
            <?php endif; ?>
        </ul>

        <ul data-submenu-title="Booking Requestes">
            <li class="<?php echo e(request()->routeIs('user.booking.hotel.request') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.booking.hotel.request')); ?>"><i class="lni lni-apartment me-2"></i><?php echo app('translator')->get('Hotel'); ?> </a></li>
            <li class="<?php echo e(request()->routeIs('user.booking.restaurant.request') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.booking.restaurant.request')); ?>"><i class="lni lni-restaurant me-2"></i><?php echo app('translator')->get('Restaurant'); ?></a></li>
            <li class="<?php echo e(request()->routeIs('user.booking.beauty.request') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.booking.beauty.request')); ?>"><i class="lni lni-pallet me-2"></i><?php echo app('translator')->get('Beauty'); ?></a></li>
        </ul>

        <ul data-submenu-title="Directory Enquiry">
            <li class="<?php echo e(request()->routeIs('user.customer.enquiry') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.customer.enquiry')); ?>"><i class="lni lni-pencil-alt me-2"></i><?php echo app('translator')->get('Customer Enquiry'); ?> </a></li>
            <li class="<?php echo e(request()->routeIs('user.my.enquiry') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.my.enquiry')); ?>"><i class="lni lni-library me-2"></i><?php echo app('translator')->get('My Enquiry'); ?></a></li>
        </ul>

        <ul data-submenu-title="My Accounts">
            <li class="<?php echo e(request()->routeIs('user.listing.analytics') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.listing.analytics')); ?>"><i class="lni lni-stats-down me-2"></i><?php echo app('translator')->get('Analytics'); ?> </a></li>
            <li class="<?php echo e(request()->routeIs('user.profile.index') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.profile.index')); ?>"><i class="lni lni-user me-2"></i><?php echo app('translator')->get('My Profile'); ?> </a></li>
            <li class="<?php echo e(request()->routeIs('user.change.password.form') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.change.password.form')); ?>"><i class="lni lni-lock-alt me-2"></i><?php echo app('translator')->get('Change Password'); ?></a></li>
            <li class="<?php echo e(request()->routeIs('user.logout') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.logout')); ?>"><i class="lni lni-power-switch me-2"></i><?php echo app('translator')->get('Log Out'); ?></a></li>
        </ul>
    </div>
</div>



<?php /**PATH /home/u607802192/domains/hotellpe.com/public_html/project/resources/views/partials/user/sidebar.blade.php ENDPATH**/ ?>