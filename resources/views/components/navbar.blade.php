<nav class="navbar navbar-expand-lg bg-body p-3 shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}"> {{-- Logo --}}
            Logo
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-lg-0 mb-2 ms-auto">
                <li class="nav-item me-3"> {{-- Home Page Link --}}
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item dropdown me-3"> {{-- Recipes Dropdown --}}
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Recipes
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown me-3"> {{-- Cuisines Dropdown --}}
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Cuisines
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item me-2"> {{-- Contact Us Page --}}
                    <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}"
                        href="{{ route('contact') }}">Contact Us</a>
                </li>
            </ul>
            @auth {{-- Authenticated User Menu --}}
                @if (Auth()->user()->role === 'admin')
                    <a href="{{ route('dashboard') }}" class="button button-primary">
                        Go To Dashboard
                    </a>
                @else
                    <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                            data-bs-display="static" style="border: none;">
                            <span class="txt-primary fw-bold">
                                {{ auth()->user()->name }}
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-lg-end profile-dropdown px-2">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="fa-solid fa-user me-2"></i>
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('password.edit', ['password' => auth()->user()->id]) }}">
                                    <i class="fa-solid fa-lock me-2"></i>
                                    Password
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="fa-solid fa-right-from-bracket text-danger me-2"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif
            @else
                <div class="mx-3"> {{-- Login Page --}}
                    <a class="button button-outline-primary text-uppercase login-button" href="{{ route('login') }}">
                        Login
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav>
