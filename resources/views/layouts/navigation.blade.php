<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        @if (Auth::user()->hasRole('administrator'))
            <li class="nav-item">
                <a class="nav-link " href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('accounts')}}">
                    <i class="bi bi-bookmark-dash"></i>
                    <span>Accounts</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                <i class="bi bi-cart4"></i>
                <span>dos</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                <i class="bi bi-card-list"></i>
                <span>tres</span>
                </a>
            </li><!-- End Contact Page Nav -->

            <!-- End Register Page Nav -->

            <!-- End Error 404 Page Nav -->

        @elseif (Auth::user()->hasRole('user'))
            <li class="nav-item">
                <a class="nav-link " href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-truck"></i>
                    <span>Request Role</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-truck"></i>
                    <span>dos</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-truck"></i>
                    <span>tres</span>
                </a>
            </li>
        @elseif (Auth::user()->hasRole('faculty'))
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('dashboard') }}">
                    <i class="bi bi-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-truck"></i>
                    <span>Supervisor Allocation</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-flag"></i>
                    <span>Downloads</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-pin-map-fill"></i>
                    <span>Notifications</span>
                </a>
            </li>
        @elseif (Auth::user()->hasRole('department'))
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('dashboard') }}">
                    <i class="bi bi-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-truck"></i>
                    <span>Department1</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-flag"></i>
                    <span>Downloads</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-pin-map-fill"></i>
                    <span>Notifications</span>
                </a>
            </li>
        @elseif (Auth::user()->hasRole('supervisor'))
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('dashboard') }}">
                    <i class="bi bi-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-truck"></i>
                    <span>Students</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-flag"></i>
                    <span>Downloads</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-pin-map-fill"></i>
                    <span>Notifications</span>
                </a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link collapsed" href="dashboard">
                    <i class="bi bi-house"></i>
                    <span>Home</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link collapsed" href=" {{ route('apply') }}">
                    <i class="bi bi-list-check"></i>
                    <span>Apply</span>
                </a>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link collapsed" href=" {{ route('downloads') }}">
                    <i class="bi bi-list-check"></i>
                    <span>Downloads</span>
                </a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-list-check"></i>
                    <span>Notifications</span>
                </a>
            </li>
        @endif

        <li class="nav-item">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
            <a class="nav-link collapsed" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="bi bi-lock"></i>
            <span>Logout</span>
            </a>
        </li><!-- End Blank Page Nav -->

    </ul>
  </aside>
