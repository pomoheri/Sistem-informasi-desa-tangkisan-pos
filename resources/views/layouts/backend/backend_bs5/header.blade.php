<header class="main-header">
    <div class="topbar">
        <div class="topbar-brand">
            <!-- Brand -->
            <a href="#">
                <img src="{{ asset('assets_bs5/img/logo-05.png') }}" alt="" loading="lazy"><b>SIMDES</b>
            </a>
            <!-- Sidebar & Nav Toggle -->
            <ul class="nav ms-auto">
                <li class="nav-item mx-1">
                    <a class="nav-link" href="#"><span class="ri-search-line topsearch-toggle"></a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link" href="#"><span class="ri-more-line topnav-toggle"></a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link" href="#"><span class="ri-menu-line sidebar-toggle"></span></a>
                </li>
            </ul>
        </div>
        <div id="topnav" class="topbar-nav">
            <!-- Sidebar Toggle -->
            <a class="nav-link" href="#"><span class="ri-menu-line sidebar-toggle"></span></a>

            <!-- Topbar Nav -->
            <ul class="nav ms-auto">
                <li class="nav-item dropdown mx-1">
                    <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        <span class="me-2 d-none d-lg-inline text-white-9 small">{{ strtoupper(auth()->user()->name) }}</span>
                        <img class="avatar-sm rounded-circle" src="{{ asset('assets_bs5/img/nouser.png') }}">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-area">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
        <div id="topsearch" class="topbar-nav">
            <!-- Topbar Search -->
            <form class="d-sm-inline-block form-inline me-auto ms-md-3 my-2 my-md-0 mw-100">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                           aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-primary btn-sm" type="button">
                            <i class="ri-search-line"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</header>
