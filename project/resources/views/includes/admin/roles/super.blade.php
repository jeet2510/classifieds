    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.gs.menubuilder') }}">
            <i class="fas fa-compass"></i>
            <span>{{ __('Menu Builder') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#manage_plan" aria-expanded="true" aria-controls="collapseTable">
            <i class="fab fa-telegram-plane"></i>
            <span>{{  __('Manage Plan') }}</span>
        </a>
        <div id="manage_plan" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.plans.index') }}">{{ __('All Plans') }}</a>
                <a class="collapse-item" href="{{ route('admin.plans.create') }}">{{ __('Create Plan') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.categories.index') }}">
            <i class="fas fa-project-diagram"></i>
            <span>{{ __('Categories') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.amenities.index') }}">
            <i class="fas fa-clinic-medical"></i>
            <span>{{ __('Amenities') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.locations.index') }}">
            <i class="fas fa-map-marker-alt"></i>
            <span>{{ __('Locations') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#manage_properties" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-map-signs"></i>
            <span>{{  __('Directory Listing') }}</span>
        </a>
        <div id="manage_properties" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.listing.index') }}">{{ __('All Directories') }}</a>
                <a class="collapse-item" href="{{ route('admin.listing.pending') }}">{{ __('Pending Directories') }}</a>
                <a class="collapse-item" href="{{ route('admin.listing.approved') }}">{{ __('Approved Directories') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.diretory.review.index') }}">
            <i class="fas fa-thumbs-up"></i>
            <span>{{ __('Directory Reviews') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#booking_request" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-shopping-bag"></i>
            <span>{{  __('Booking Request') }}</span>
        </a>
        <div id="booking_request" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.hotel.booking') }}">{{ __('Hotel') }}</a>
                <a class="collapse-item" href="{{ route('admin.restaurant.booking') }}">{{ __('Restaurant') }}</a>
                <a class="collapse-item" href="{{ route('admin.beauty.booking') }}">{{ __('Beauty') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.listing.enquiry') }}">
            <i class="fas fa-compass"></i>
            <span>{{ __('Directory Enquiry') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.user.index') }}">
            <i class="fas fa-user"></i>
            <span>{{ __('Manage Customers') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.transactions.index') }}">
            <i class="fas fa-chart-line"></i>
            <span>{{ __('Transactions') }}</span>
        </a>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#blog" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>{{  __('Manage Blog') }}</span>
        </a>
        <div id="blog" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.cblog.index') }}">{{ __('Categories') }}</a>
                <a class="collapse-item" href="{{ route('admin.blog.index') }}">{{ __('Posts') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable1" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-fw fa-cogs"></i>
            <span>{{  __('General Settings') }}</span>
        </a>
        <div id="collapseTable1" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.gs.logo') }}">{{ __('Logo') }}</a>
                <a class="collapse-item" href="{{ route('admin.gs.fav') }}">{{ __('Favicon') }}</a>
                <a class="collapse-item" href="{{ route('admin.gs.load') }}">{{ __('Loader') }}</a>
                <a class="collapse-item" href="{{ route('admin.gs.contents') }}">{{ __('Website Contents') }}</a>
                <a class="collapse-item" href="{{ route('admin.gs.cookie') }}">{{ __('Cookie Concent') }}</a>
                <a class="collapse-item" href="{{ route('admin.gs.customcss') }}">{{ __('Custom css') }}</a>
                <a class="collapse-item" href="{{ route('admin.gs.theme') }}">{{ __('Theme Manage') }}</a>
                <a class="collapse-item" href="{{ route('admin.gs.footer') }}">{{ __('Footer') }}</a>
                <a class="collapse-item" href="{{ route('admin.gs.error.banner') }}">{{ __('Error Banner') }}</a>
                <a class="collapse-item" href="{{ route('admin.gs.maintenance') }}">{{ __('Website Maintenance') }}</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#homepage" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-igloo"></i>
            <span>{{ __('Home Page Manage') }}</span>
        </a>
        <div id="homepage" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.ps.hero') }}">{{ __('Hero Section') }}</a>
                <a class="collapse-item" href="{{ route('admin.mission.index') }}">{{ __('Mission Section') }}</a>
                <a class="collapse-item" href="{{ route('admin.account.process.index') }}">{{ __('Process Section') }}</a>
                <a class="collapse-item" href="{{ route('admin.ps.listing') }}">{{ __('Listing Submit Section') }}</a>
                <a class="collapse-item" href="{{ route('admin.review.index') }}">{{ __('Testimonial Section') }}</a>
                <a class="collapse-item" href="{{ route('admin.partner.index') }}">{{ __('Partner Section') }}</a>
                <a class="collapse-item" href="{{ route('admin.faq.index') }}">{{ __('FAQ Section') }}</a>
                <a class="collapse-item" href="{{ route('admin.ps.download') }}">{{ __('Download apps Section') }}</a>
                <a class="collapse-item" href="{{ route('admin.ps.call') }}">{{ __('Call To Action Section') }}</a>
                <a class="collapse-item" href="{{ route('admin.ps.heading') }}">{{ __('Section Heading') }}</a>
                <a class="collapse-item" href="{{ route('admin.ps.customization') }}">{{ __('Homepage Customization') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#email_settings" aria-expanded="true" aria-controls="collapseTable">
            <i class="fa fa-envelope"></i>
            <span>{{  __('Email Settings') }}</span>
        </a>
        <div id="email_settings" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.mail.index') }}">{{ __('Email Template') }}</a>
                <a class="collapse-item" href="{{ route('admin.mail.config') }}">{{ __('Email Configurations') }}</a>
                <a class="collapse-item" href="{{ route('admin.group.show') }}">{{ __('Group Email') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.user.message') }}">
            <i class="fas fa-vote-yea"></i>
            <span>{{ __('Messages') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#payment_gateways" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>{{  __('Payment Settings') }}</span>
        </a>
        <div id="payment_gateways" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.currency.index') }}">{{ __('Currencies') }}</a>
                <a class="collapse-item" href="{{ route('admin.payment.index') }}">{{  __('Payment Gateways')  }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.role.index') }}">
            <i class="fa fa-crop"></i>
            <span>{{ __('Manage Roles') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.staff.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>{{ __('Manage Staff') }}</span>
        </a>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#langs" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-language"></i>
            <span>{{  __('Language Manage') }}</span>
        </a>
        <div id="langs" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.lang.index')}}">{{ __('Website Language') }}</a>
                <a class="collapse-item" href="{{route('admin.tlang.index')}}">{{ __('Admin Panel Language') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.font.index') }}">
            <i class="fas fa-font"></i>
            <span>{{ __('Fonts') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-fw fa-edit"></i>
            <span>{{  __('Menu Page Settings') }}</span>
        </a>
        <div id="menu" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.ps.contact') }}">{{ __('Contact Us Page') }}</a>
                <a class="collapse-item" href="{{ route('admin.page.index') }}">{{ __('Other Pages') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#seoTools" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-wrench"></i>
            <span>{{  __('SEO Tools') }}</span>
        </a>
        <div id="seoTools" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.seotool.analytics')}}">{{ __('Google Analytics') }}</a>
                <a class="collapse-item" href="{{route('admin.social.links.index')}}">{{ __('Social Links') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.sitemap.index') }}">
            <i class="fa fa-sitemap"></i>
            <span>{{ __('Sitemaps') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.subs.index') }}">
            <i class="fas fa-layer-group"></i>
            <span>{{ __('Subscribers') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.cache.clear') }}">
            <i class="fas fa-sync"></i>
            <span>{{ __('Clear Cache') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sactive" aria-expanded="true" aria-controls="collapseTable">
            <i class="fas fa-fw fa-at"></i>
            <span>{{  __('System Activation') }}</span>
        </a>
        <div id="sactive" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin-activation-form')}}">{{ __('Activation') }}</a>
                <a class="collapse-item" href="{{route('admin-generate-backup')}}">{{ __('Generate Backup') }}</a>
            </div>
        </div>
    </li>


