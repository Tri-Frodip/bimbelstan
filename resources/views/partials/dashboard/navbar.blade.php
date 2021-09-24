<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            {{-- @yield('breadcrumbs') --}}
            @yield('title')
        </nav>
        <div class="dropdown pe-2 d-flex align-items-center ps-3">
            <a href="#" class="nav-link text-body p-0" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user cursor-pointer me-2"></i>
                <span class="d-none d-md-inline-block">
                    {{ auth()->user()->name }}
                </span>
            </a>
            @cannot('test')
            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="userMenu">
                <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="{{ route('profile') }}">
                        {{ __('Profile') }}
                    </a>
                </li>
                <li class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item border-radius-md" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </li>
            </ul>
            @endcannot
        </div>
    </div>
</nav>

