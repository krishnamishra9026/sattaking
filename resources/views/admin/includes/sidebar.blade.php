<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="/">
            <img alt="Logo" src="{{ asset('assets/media/logos/bcrew-logo.png') }}"
                class="h-55px app-sidebar-logo-default" />
            <img alt="Logo" src="{{ asset('assets/media/logos/bcrew-logo.png') }}"
                class="h-20px app-sidebar-logo-minimize" />
        </a>
        <!--end::Logo image-->
    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
            <!--begin::Scroll wrapper-->
            <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true"
                data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                data-kt-scroll-save-state="true">
                <!--begin::Menu-->
                <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu"
                    data-kt-menu="true" data-kt-menu-expand="false">
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                            href="{{ route('admin.dashboard.index') }}">
                            <span class="menu-bullet"><i class="ki-outline ki-home fs-3"></i></span>
                            <span class="menu-title">Dashboard</span>
                        </a>
                        <!--end:Menu link-->
                    </div>

        


                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ request()->routeIs('games') ? 'active' : '' }}" href="{{ route('admin.games.index') }}">
                            <span class="menu-bullet">
                                <i class="ki-outline ki-game fs-2"></i>
                            </span>
                            <span class="menu-title">Games</span>
                        </a>
                        <!--end:Menu link-->
                    </div>

                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ request()->routeIs('games.result') ? 'active' : '' }}" href="{{ route('admin.games.result.index') }}">
                            <span class="menu-bullet">
                                <i class="ki-outline ki-trophy fs-2"></i>
                            </span>
                            <span class="menu-title">Games Result</span>
                        </a>
                        <!--end:Menu link-->
                    </div>

                   
      

                    @include('admin.includes.sidebar.usermanagement')

                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion" {{ request()->routeIs('admin.setting*') ? 'here show' : '' }}>


                        <div class="menu-item menu-accordion" data-kt-menu-trigger="click" {{ request()->routeIs('admin.setting*') ? 'here show' : '' }}>
                            <!--begin::Menu link-->
                            <a href="#" class="menu-link py-3">
                                <span class="menu-bullet">
                                    <i class="ki-outline ki-setting-4 fs-2"></i>
                                </span>
                                <span class="menu-title">Settings</span>
                                <span class="menu-arrow"></span>
                            </a>

                            <!--begin::Menu sub-->
                            <div class="menu-sub menu-sub-accordion {{ request()->is('admin.setting*') ? 'here show' : '' }}">
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link {{ request()->routeIs('setting') ? 'active' : '' }}" href="{{ route('admin.setting.general-setting') }}">
                                        <span class="menu-bullet">
                                            <i class="fa-solid fa-angle-right"></i>
                                        </span>
                                        <span class="menu-title">General setting</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link {{ request()->routeIs('setting') ? 'active' : '' }}" href="{{ route('admin.setting.my-account') }}">
                                        <span class="menu-bullet">
                                            <i class="fa-solid fa-angle-right"></i>
                                        </span>
                                        <span class="menu-title">My Account</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link {{ request()->routeIs('setting') ? 'active' : '' }}" href="{{ route('admin.setting.change-password') }}">
                                        <span class="menu-bullet">
                                            <i class="fa-solid fa-angle-right"></i>
                                        </span>
                                        <span class="menu-title">Change Password</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->


                            </div>
                            <!--end:Menu sub-->
                        </div>
                    </div>

                </div>
                <!--end::Menu-->
            </div>
            <!--end::Scroll wrapper-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
    <!--begin::Footer-->
    <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            href="{{ route('admin.logout') }}"
            class="btn btn-flex flex-center btn-light overflow-hidden text-nowrap px-0 h-40px w-100">Logout</a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
    <!--end::Footer-->
</div>
