<div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg">
    <!--begin::Header-->
    <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
        data-kt-sticky-offset="{default: '200px', lg: '300px'}">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Wrapper-->
            <div class="d-flex align-items-center justify-content-between">
                <!--begin::Logo-->
                <div class="d-flex align-items-center flex-equal">
                    <!--begin::Mobile menu toggle-->
                    <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none"
                        id="kt_landing_menu_toggle">
                        <i class="ki-duotone ki-abstract-14 fs-2hx">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </button>
                    <!--end::Mobile menu toggle-->
                    <!--begin::Logo image-->
                    <a href="/">
                        <img alt="Logo" src="{{ asset('/assets/media/logos/logo-white.png') }}" class="logo-default" />
                        <img alt="Logo" src="{{ asset('/assets/media/logos/logo-black.png') }}" class="logo-sticky" />
                    </a>
                    <!--end::Logo image-->
                </div>
                <!--end::Logo-->
                <!--begin::Menu wrapper-->
                <div class="d-lg-block" id="kt_header_nav_wrapper">
                    <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu"
                        data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                        data-kt-drawer-width="200px" data-kt-drawer-direction="start"
                        data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"
                        data-kt-swapper-mode="prepend"
                        data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                        <!--begin::Menu-->
                        <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-600 menu-state-title-primary nav nav-flush fw-semibold"
                            id="kt_landing_menu">
                            <!--begin::Menu item-->
                            
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                 
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item">
                                <!--begin::Menu link-->
                                <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#team"
                                    data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Satta King Results Live</a>
                                <!--end::Menu link-->
                            </div>
                            <!--end::Menu item-->
                            <div class="memu-item">

                            @auth
                                @if (Auth::user()->hasVerifiedEmail())
                                <!--begin::Form-->
                                <div class="search">
                                    <form data-kt-search-element="form" class="w-100 position-relative" autocomplete="off">

                                        <!--begin::Input-->
                                        <input type="text" class="search-input form-control form-control-flush pe-10" name="search" value="" placeholder="Search jobs here" data-kt-search-element="input" />
                                        <!--end::Input-->
                                        <!--begin::Icon-->
                                        <a href="javascript:void(0);" class="btn btn-success position-absolute searchbtn">
                                            <i class="ki-duotone ki-magnifier fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                        <!--end::Icon-->
                                    </form>
                                </div>
                                <!--end::Form-->
                                @endif
                            @endauth
                            </div>

                            @guest
                                <!--begin::Menu item-->
                     
                                <!--end::Menu item-->
                            @endguest
                        </div>
                        <!--end::Menu-->

                    </div>
                </div>
                <!--end::Menu wrapper-->
                <!--begin::Toolbar-->

                <div class="flex-equal text-end ms-1 d-flex justify-content-end align-items-center">
                    @auth
                            @if (Auth::user()->hasVerifiedEmail())
                            <div class="menu-item">
                                <!--begin::Menu link-->
                                <a class="menu-link nav-link py-2 px-2 px-xxl-6 {{ request()->is('inbox') ? 'active' : '' }}" href="{{ route('inbox.index') }}">
                                    <div class="btn btn-icon btn-custom btn-icon-muted w-35px h-35px" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" id="kt_menu_item_wow">
                                        <i class="ki-outline ki-notification-status fs-1"></i>
                                    </div>
                                </a>
                                <!--end::Menu link-->
                            </div>

                            <div class="menu-item">
                                <!--begin::Menu link-->
                                <a class="menu-link nav-link py-2 px-2 px-xxl-6 {{ request()->is('notification') ? 'active' : '' }}" href="{{ route('notification.index') }}">
                                    <div class="btn btn-icon btn-custom btn-icon-muted w-35px h-35px position-relative" id="kt_drawer_chat_toggle">
                                        <i class="ki-outline ki-message-text-2 fs-1"></i>
                                        <span class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink"></span>
                                    </div>
                                </a>
                                <!--end::Menu link-->
                            </div>
                            @endif
                    @endauth
                    @guest
                        <!--begin::Toggle-->
                        <button type="button" class="btn btn-success fw-bolder rotate" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-start" data-kt-menu-offset="0px, 0px">
                            For Employers
                            <i class="ki-duotone ki-down fs-2 rotate-180 ms-3"></i>
                        </button>
                        <!--end::Toggle-->

                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold min-w-150 mw-150px"
                            data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="/employer/login" class="menu-link px-3">
                                    Login
                                </a>
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="/employer/register" class="menu-link px-3">
                                    Sign up
                                </a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                        {{-- <a href="authentication/layouts/corporate/sign-in.html" class="btn btn-success fw-bolder" style="font-size:15px">For Employers</a> --}}
                    @endguest



                    <!--begin::User menu-->
                    <div class="app-navbar-item ms-1 ms-md-5" id="kt_header_user_menu_toggle">

                        <!--begin::Menu wrapper-->
                        @if (Auth::check())
                            <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
                                data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                                data-kt-menu-placement="bottom-end">
                                @if (Auth::user()->avatar)
                                    <img src="{{ \Auth::user()->avatar }}" alt="user" />
                                @else
                                    <div
                                        class="symbol-label fs-3 fw-bold bg-light-info text-info d-flex justify-content-center align-items-center">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </div>
                                @endif
                            </div>
                            @include('employee/includes/menu_user')
                            {{-- @include('partials/menus/_user-account-menu') --}}
                            <!--end::Menu wrapper-->
                        @endif
                    </div>
                    <!--end::User menu-->
                </div>




                <!--end::Toolbar-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Header-->
</div>
<div class="animated-text">
      Welcome to My Website ✨
    </div>