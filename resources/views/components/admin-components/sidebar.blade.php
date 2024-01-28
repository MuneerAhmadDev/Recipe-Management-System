<aside id="sidebar" class="js-sidebar">
    <!-- Content For Sidebar -->
    <div class="h-100">
        <div class="sidebar-header">
            <a href="#">
                Recipe Management System
            </a>
        </div>
        <ul class="sidebar-nav">
            {{-- Dashboard Link --}}
            <li class="sidebar-item">
                <a href="{{ route('dashboard') }}"
                    class="sidebar-link {{ Route::currentRouteName() === 'dashboard' ? 'sidebar-link-active' : '' }}">
                    <i class="fa-solid fa-list pe-2"></i>
                    Dashboard
                </a>
            </li>

            {{-- Users Link --}}
            <li class="sidebar-item">
                <a href="{{ route('users.index') }}"
                    class="sidebar-link {{ (Route::currentRouteName() === 'users.index' ? 'sidebar-link-active' : '' || Route::currentRouteName() === 'users.show') ? 'sidebar-link-active' : '' }}">
                    <i class="fa-solid fa-users pe-2"></i>
                    Users
                </a>
            </li>

            {{-- Recipe Links --}}
            <li class="sidebar-item mb-1">
                <a class="sidebar-link collapsed sidebar-dropdown {{ (Route::currentRouteName() === 'category.index' ? 'sidebar-link-active' : '') || (Route::currentRouteName() === 'category.create' ? 'sidebar-link-active' : '') || (Route::currentRouteName() === 'category.edit' ? 'sidebar-link-active' : '') || (Route::currentRouteName() === 'cuisine.index' ? 'sidebar-link-active' : '') || (Route::currentRouteName() === 'cuisine.create' ? 'sidebar-link-active' : '') || Route::currentRouteName() === 'cuisine.edit' ? 'sidebar-link-active' : '' }}"
                    data-bs-toggle="collapse" href="#category-target">
                    <i class="fa-solid fa-utensils me-2"></i>
                    Recipe
                </a>
                <div class="collapse" id="category-target">
                    <div class="card card-body">
                        <a class="txt-secondary {{ (Route::currentRouteName() === 'category.index' ? 'sidebar-link-active' : '') || (Route::currentRouteName() === 'category.create' ? 'sidebar-link-active' : '') || Route::currentRouteName() === 'category.edit' ? 'sidebar-link-active' : '' }} mb-2"
                            href="{{ route('category.index') }}">
                            <i class="fa-solid fa-box me-2"></i> Category
                        </a>
                        <a class="txt-secondary {{ (Route::currentRouteName() === 'cuisine.index' ? 'sidebar-link-active' : '') || (Route::currentRouteName() === 'cuisine.create' ? 'sidebar-link-active' : '') || Route::currentRouteName() === 'cuisine.edit' ? 'sidebar-link-active' : '' }} mb-2"
                            href="{{ route('cuisine.index') }}">
                            <i class="fa-solid fa-gear me-2"></i> Cusisine
                        </a>
                    </div>
                </div>
            </li>

            {{-- Settings Link --}}
            <li class="sidebar-item">
                <a class="sidebar-link collapsed sidebar-dropdown {{ (Route::currentRouteName() === 'settings.edit' ? 'sidebar-link-active' : '' || Route::currentRouteName() === 'banner.create') ? 'sidebar-link-active' : '' }}"
                    data-bs-toggle="collapse" href="#target">
                    <i class="fa-solid fa-gears pe-2"></i>
                    Settings
                </a>
                <div class="collapse" id="target">
                    <div class="card card-body">
                        <a class="txt-secondary mb-2" href="{{ route('banner.create') }}">
                            <i class="fa-solid fa-images me-2"></i> Banner
                        </a>
                        <a class="txt-secondary" href="{{ route('settings.edit', ['setting' => 1]) }}">
                            <i class="fa-solid fa-wrench me-2"></i> General Settings
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>
