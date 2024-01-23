<nav class="navbar navbar-expand bg-body border-bottom px-3">
    <button class="btn" id="sidebar-toggle" type="button" style="border: none;">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse navbar">
        <ul class="navbar-nav ms-auto pe-3">
            <li class="nav-item dropdown">
                <a href="#" data-bs-toggle="dropdown">
                    <span class="txt-primary fw-bold">
                        {{ auth()->user()->name }}
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown px-2">
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="fa-solid fa-user me-2"></i>
                        Profile
                    </a>
                    <a href="{{ route('password.edit', ['password' => auth()->user()->id]) }}" class="dropdown-item">
                        <i class="fa-solid fa-lock me-2"></i>
                        Password
                    </a>
                    <a href="{{ route('logout') }}" class="dropdown-item">
                        <i class="fa-solid fa-right-from-bracket text-danger me-2"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
