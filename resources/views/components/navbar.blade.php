<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Toggle button -->
        <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
        >
        <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="{{ route('index') }}">
            <img
            src="{{ asset('images/love.png') }}"
            height="22"
            alt="my Logo"
            loading="lazy"
            />
        </a>
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item ">
                <a class="nav-link @if(Request::is('/')) 'active text-success fw-bolder' @endif" href="{{ route('index') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(Request::is('user/createPost')) 'active text-success fw-bolder' @endif" href="{{ route('createPost') }}">Create Post</a>
            </li>
            @can('admin')
                <li class="nav-item">
                    <a class="nav-link @if(Request::is('admin/index')) 'active text-success fw-bolder' @endif" href="{{ route('admin.index') }}">Admin Control</a>
                </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link @if(Request::is('user/contactUs')) 'active text-success fw-bolder' @endif" href="{{ route('contactUs') }}">Contact Us</a>
            </li>
        </ul>
        <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">

        <!-- Notifications -->
        <div class="dropdown">
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                <li>
                    <a class="dropdown-item" href="#">Some news</a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">Another news</a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">Something else here</a>
                </li>
            </ul>
        </div>
        <!-- Avatar -->
        <div class="dropdown">
            <a
            class="dropdown-toggle d-flex align-items-center hidden-arrow"
            href="#"
            id="navbarDropdownMenuAvatar"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
            >
            <img
                src="{{ asset('images/profiles/'.Auth::user()->image) }}"
                class="rounded-circle"
                height="25"
                alt="Black and White Portrait of a Man"
                loading="lazy"
            />
            </a>
            <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdownMenuAvatar"
            >
                <li>
                    <a class="dropdown-item text-success" href=""><h4>{{ Auth::user()->name }}</h4></a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('userProfile') }}">User Profile</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                </li>
            </ul>
        </div>
        </div>
        <!-- Right elements -->
        </div>
    <!-- Container wrapper -->
</nav>
