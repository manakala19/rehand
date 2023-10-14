<aside class="sidebar" style="background-color: #1a1a1a">
    <div class="toggle">
        <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
            <span></span>
        </a>
    </div>
    <div class="side-inner">
        {{--  <div class="profile" style="background-image: url('{{ url('foto') . '/' . $user->foto }}');">  --}}
            <nav aria-label="breadcrumb" class="navbar-dark py-3 ps-3">
                <h6 class="font-weight-bolder mb-0 text-light">Pendataan / <span
                        class="text-light">{{ $title }}</span></h6>
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                </ol>
            </nav>
            <div class="profile">
                <img src="{{ url('foto') . '/' . $user->foto }}" alt="Gambar"
                    class="rounded-circle img-fluid shadow-lg">
                <h3 class="name text-light">{{ $user->name }}</h3>
            </div>
        {{--  </div>  --}}
        <div class="nav-menu">
            <ul class="list-unstyled">
                <li class="{{ $title == 'Dashboard' ? 'active' : '' }}">
                    <a href="/dashboard">
                        <i class="pe-2 fas fa-home icon-data mr-3"></i>Dashboard
                    </a>
                </li>
                <li class="{{ $title == 'Data' ? 'active' : '' }}">
                    <a href="/data">
                        <i class="pe-2 fas fa-database icon-data mr-3"></i>Data
                    </a>
                </li>
                <li class="{{ $title == 'Profile' ? 'active' : '' }}">
                    <a href="/profile">
                        <i class="pe-2 fas fa-user icon-profile mr-3"></i>Profile
                    </a>
                </li>
                @if (Auth::user()->role == 'operator')
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="pe-2 fas fa-cogs icon-cog mr-3"></i>Admin Control
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/admin">
                                    <i class="pe-2 fas fa-cog icon-wrench mr-3"></i>Control Admin
                                </a>
                            </li>
                            <li>
                                <a href="/register">
                                    <i class="pe-2 fas fa-user-plus icon-plus mr-3"></i>Add Admin
                                </a>
                            </li>
                            <li>
                                <a href="/last">
                                    <i class="pe-2 fas fa-history icon-clock mr-3"></i>Last Updates
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li>
                    <a href="/logout">
                        <i class="pe-2 fas fa-sign-out-alt icon-logout mr-3"></i>Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>


<script src="asset/js/jquery-3.3.1.min.js"></script>
<script src="asset/js/popper.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/main.js"></script>
