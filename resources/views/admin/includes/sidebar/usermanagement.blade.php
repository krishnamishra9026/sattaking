<!--begin:Menu item-->
<div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('admin.user-management.*') ? 'here show' : '' }}">


    <div class="menu-item menu-accordion {{ request()->routeIs('admin.user-management.*') ? 'here show' : '' }}" data-kt-menu-trigger="click">
            <!--begin::Menu link-->
            <a href="#" class="menu-link py-3">
                <span class="menu-bullet">
                    {{-- <i class="ki-outline ki-element-12 fs-2"></i> --}}
                    <i class="ki-outline ki-profile-user fs-2"></i>
                </span>
                <span class="menu-title">User Management</span>
                <span class="menu-arrow"></span>
            </a>

            <!--begin::Menu sub-->
            <div class="menu-sub menu-sub-accordion {{ request()->routeIs('admin.user-management.*') ? 'here show' : '' }}">
                    <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->routeIs('admin.user-management.users.*') ? 'active' : '' }}" href="{{ route('admin.user-management.users.index') }}">
                        <span class="menu-bullet">
                            <i class="fa-solid fa-angle-right"></i>
                        </span>
                        <span class="menu-title">Manage Users</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->routeIs('admin.user-management.roles.*') ? 'active' : '' }}" href="{{ route('admin.user-management.roles.index') }}">
                        <span class="menu-bullet">
                            <i class="fa-solid fa-angle-right"></i>
                        </span>
                        <span class="menu-title">Roles</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->routeIs('admin.user-management.permissions.*') ? 'active' : '' }}" href="{{ route('admin.user-management.permissions.index') }}">
                        <span class="menu-bullet">
                            <i class="fa-solid fa-angle-right"></i>
                        </span>
                        <span class="menu-title">Permissions</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            </div>
            <!--end:Menu sub-->

            <!--begin:Menu Employee item-->
            {{-- <div class="menu-item">
                <!--begin:Menu link-->
                <a class="menu-link {{ request()->routeIs('admin.user-management.employees.*') ? 'active' : '' }}" href="{{ route('admin.user-management.employees.index') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Employee</span>
                </a>
                <!--end:Menu link-->
            </div> --}}
            <!--end:Menu Employee item-->

             <!--begin:Menu Employer item-->
             {{-- <div class="menu-item">
                <!--begin:Menu link-->
                <a class="menu-link {{ request()->routeIs('admin.user-management.employers.*') ? 'active' : '' }}" href="{{ route('admin.user-management.employers.index') }}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Employer</span>
                </a>
                <!--end:Menu link-->
            </div> --}}
            <!--end:Menu Employer item-->

        </div>
</div>
