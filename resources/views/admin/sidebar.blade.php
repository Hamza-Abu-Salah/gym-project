


<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('site.home') }}">
        <div class="sidebar-brand-icon ">
            <i class="fas fa-dumbbell"></i>
        </div>
        <div class="sidebar-brand-text mx-3">GymFit</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('admin.dashbord') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user"></i>
            <span>{{ __('admin.trainers') }}</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.trainers.index') }}">All Trainer</a>
                <a class="collapse-item" href="{{ route('admin.trainers.create') }}">Add Trainer</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-users"></i>
            <span>{{ __('admin.users') }}</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.users.index') }}">All Users</a>
                <a class="collapse-item" href="{{ route('admin.users.create') }}">Add Users</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities10"
            aria-expanded="true" aria-controls="collapseUtilities10">
            <i class="fas fa-fw fa-tags"></i>
            <span>{{ __('admin.categories') }}</span>
        </a>
        <div id="collapseUtilities10" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.categories.index') }}">All categories</a>
                <a class="collapse-item" href="{{ route('admin.categories.create') }}">Add categories</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities1"
            aria-expanded="true" aria-controls="collapseUtilities1">
            <i class="fas fa-fw fa-award"></i>
            <span>{{ __('admin.features') }}</span>
        </a>
        <div id="collapseUtilities1" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.features.index') }}">All Feature</a>
                <a class="collapse-item" href="{{ route('admin.features.create') }}">Add Feature</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities66"
            aria-expanded="true" aria-controls="collapseUtilities66">
            <i class="fas fa-fw fa-award"></i>
            <span>{{ __('admin.abouts') }}</span>
        </a>
        <div id="collapseUtilities66" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.abouts.index') }}">All Abouts</a>
                <a class="collapse-item" href="{{ route('admin.abouts.create') }}">Add Abouts</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities9"
            aria-expanded="true" aria-controls="collapseUtilities9">
            <i class="fas fa-fw fa-star"></i>
            <span>{{ __('admin.sections') }}</span>
        </a>
        <div id="collapseUtilities9" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.sections.index') }}">All Sections</a>
                <a class="collapse-item" href="{{ route('admin.sections.create') }}">Add Sections</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2"
            aria-expanded="true" aria-controls="collapseUtilities2">
            <i class="fas fa-fw fa-heart"></i>
            <span>{{ __('admin.services') }}</span>
        </a>
        <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.services.index') }}">All Service</a>
                <a class="collapse-item" href="{{ route('admin.services.create') }}">Add Service</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities20"
            aria-expanded="true" aria-controls="collapseUtilities20">
            <i class="fas fa-fw fa-heart"></i>
            <span>{{ __('admin.crids') }}</span>
        </a>
        <div id="collapseUtilities20" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.crid.index') }}">All Crid</a>
                <a class="collapse-item" href="{{ route('admin.crid.create') }}">Add Crid</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities3"
            aria-expanded="true" aria-controls="collapseUtilities3">
            <i class="fa-brands fa-envira"></i>
            <span>{{ __('admin.gallery') }}</span>
        </a>
        <div id="collapseUtilities3" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.gallerys.index') }}">All Gallery</a>
                <a class="collapse-item" href="{{ route('admin.gallerys.create') }}">Add Gallery</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities4"
            aria-expanded="true" aria-controls="collapseUtilities4">
            <i class="fas fa-fw fa-award"></i>
            <span>{{ __('admin.testimonials') }}</span>
        </a>
        <div id="collapseUtilities4" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.testimonials.index') }}">All Testimonial</a>
                <a class="collapse-item" href="{{ route('admin.testimonials.create') }}">Add Testimonial</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities5"
            aria-expanded="true" aria-controls="collapseUtilities5">
            <i class="fa-brands fa-discourse"></i>
            {{-- <i class="fa-brands fa-discourse"></i> --}}
            <span>{{ __('admin.courses') }}</span>
        </a>
        <div id="collapseUtilities5" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.courses.index') }}">All Course</a>
                <a class="collapse-item" href="{{ route('admin.courses.create') }}">Add Course</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities6"
            aria-expanded="true" aria-controls="collapseUtilities6">
            <i class="fa-solid fa-calendar-days"></i>
            <span>{{ __('admin.schedules') }}</span>
        </a>
        <div id="collapseUtilities6" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.schedules.index') }}">All Schedule</a>
                <a class="collapse-item" href="{{ route('admin.schedules.create') }}">Add Schedule</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities7"
            aria-expanded="true" aria-controls="collapseUtilities7">
            <i class="fas fa-fw fa-users"></i>
            <span>{{ __('admin.memberships') }}</span>
        </a>
        <div id="collapseUtilities7" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.memberships.index') }}">All Membership</a>
                <a class="collapse-item" href="{{ route('admin.memberships.create') }}">Add Membership</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities12"
            aria-expanded="true" aria-controls="collapseUtilities12">
            <i class="fa-solid fa-gear"></i>
            <span>{{ __('admin.settings') }}</span>
        </a>
        <div id="collapseUtilities12" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.settings.index') }}">All Settings</a>
                <a class="collapse-item" href="{{ route('admin.settings.create') }}">Add Settings</a>
            </div>
        </div>
    </li>




    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
