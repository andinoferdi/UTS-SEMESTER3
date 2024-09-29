     <div id="kt_header" style="" class="header align-items-stretch">
         <div class="container-fluid d-flex align-items-stretch justify-content-between">
             <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                 <div class="btn btn-icon btn-active-color-white" id="kt_aside_mobile_toggle">
                     <i class="bi bi-list fs-1"></i>
                 </div>
             </div>
             <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                 <a href="/dashboard" class="d-lg-none">
                     <img alt="Logo" src="{{ asset('assets/media/logos/logo-demo13-compact.svg') }}"
                         class="h-25px" />
                 </a>
             </div>
             <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                 <div class="d-flex align-items-stretch" id="kt_header_nav">
                     <div class="header-menu align-items-stretch" data-kt-drawer="true"
                         data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                         data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                         data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle"
                         data-kt-swapper="true" data-kt-swapper-mode="prepend"
                         data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                         <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                             id="#kt_header_menu" data-kt-menu="true">
                             <div class="menu-item me-lg-1">
                                 <a class="menu-link {{ request()->is('dashboard') ? 'active' : '' }} py-3"
                                     href="/dashboard">
                                     <span class="menu-title">Dashboard</span>
                                 </a>
                             </div>

                             <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                                 class="menu-item menu-lg-down-accordion me-lg-1">
                                 <span
                                     class="menu-link {{ request()->is('dashboard/master/satuan*') || request()->is('dashboard/master/user*') || request()->is('dashboard/master/kecamatan*') ? 'active' : '' }}  py-3">
                                     <span class="menu-title">Master</span>
                                     <span class="menu-arrow d-lg-none"></span>
                                 </span>
                                 <div
                                     class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">

                                     <div class="menu-item">
                                         <a class="menu-link py-3" href="/dashboard/master/satuan">
                                             <span class="menu-bullet">
                                                 <span class="bullet bullet-dot"></span>
                                             </span>
                                             <span class="menu-title">Satuan</span>
                                         </a>
                                     </div>

                                     <div class="menu-item">
                                         <a class="menu-link py-3" href="/dashboard/master/user">
                                             <span class="menu-bullet">
                                                 <span class="bullet bullet-dot"></span>
                                             </span>
                                             <span class="menu-title">User</span>
                                         </a>
                                     </div>

                                     <div class="menu-item">
                                         <a class="menu-link py-3" href="/dashboard/master/kecamatan">
                                             <span class="menu-bullet">
                                                 <span class="bullet bullet-dot"></span>
                                             </span>
                                             <span class="menu-title">Kecamatan</span>
                                         </a>
                                     </div>

                                 </div>
                             </div>

                             <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                                 class="menu-item menu-lg-down-accordion me-lg-1">
                                 <span
                                     class="menu-link {{ request()->is('dashboard/aktivitas/user*') || request()->is('dashboard/aktivitas/error_aplikasi*') ? 'active' : '' }}  py-3">
                                     <span class="menu-title">Aktivitas</span>
                                     <span class="menu-arrow d-lg-none"></span>
                                 </span>
                                 <div
                                     class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                     <div class="menu-item">
                                         <a class="menu-link py-3" href="/dashboard/aktivitas/user">
                                             <span class="menu-bullet">
                                                 <span class="bullet bullet-dot"></span>
                                             </span>
                                             <span class="menu-title">User</span>
                                         </a>
                                     </div>

                                     <div class="menu-item">
                                         <a class="menu-link py-3" href="/dashboard/aktivitas/error_aplikasi">
                                             <span class="menu-bullet">
                                                 <span class="bullet bullet-dot"></span>
                                             </span>
                                             <span class="menu-title">Error Aplikasi</span>
                                         </a>
                                     </div>

                                 </div>
                             </div>


                             <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                                 class="menu-item menu-lg-down-accordion me-lg-1">
                                 <span
                                     class="menu-link {{ request()->is('dashboard/settings/profile*') ? 'active' : '' }}  py-3">
                                     <span class="menu-title">Settings</span>
                                     <span class="menu-arrow d-lg-none"></span>
                                 </span>
                                 <div
                                     class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
                                     <div class="menu-item">
                                         <a class="menu-link py-3" href="/dashboard/settings/profile">
                                             <span class="menu-bullet">
                                                 <span class="bullet bullet-dot"></span>
                                             </span>
                                             <span class="menu-title">Profile</span>
                                         </a>
                                     </div>

                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="d-flex align-items-stretch flex-shrink-0">
                     <div class="topbar d-flex align-items-stretch flex-shrink-0">
                         <div class="d-flex align-items-stretch" id="kt_header_user_menu_toggle">
                             <div class="topbar-item cursor-pointer symbol px-3 px-lg-5 me-n3 me-lg-n5 symbol-30px symbol-md-35px"
                                 data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                 data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                                 <img
                                     src="{{ isset(auth()->user()->foto) ? asset('storage/' . auth()->user()->foto) : asset('assets/media/avatars/blank.png') }}">
                             </div>
                             <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                 data-kt-menu="true">
                                 <div class="menu-item px-3">
                                     <div class="menu-content d-flex align-items-center px-3">
                                         <div class="symbol symbol-50px me-5">
                                             <img alt="Logo"
                                                 src="{{ isset(auth()->user()->foto) ? asset('storage/' . auth()->user()->foto) : asset('assets/media/avatars/blank.png') }}" />
                                         </div>
                                         <div class="d-flex flex-column">
                                             <div class="fw-bolder d-flex align-items-center fs-5">
                                                 {{ auth()->user()->name }}
                                             </div>
                                             <a href="#"
                                                 class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="separator my-2"></div>
                                 <div class="menu-item px-5">
                                     <a href="/dashboard/settings/profile" class="menu-link px-5">My
                                         Profile</a>
                                 </div>
                                 <div class="separator my-2"></div>
                                 <div class="menu-item px-5">
                                     <form id="logout-form" action="/logout" method="post">
                                         @csrf
                                         <a href="#" class="menu-link px-5"
                                             onclick="document.getElementById('logout-form').submit(); return false;">Log
                                             Out</a>
                                     </form>
                                 </div>
                             </div>
                         </div>
                         <div class="d-flex align-items-stretch d-lg-none px-3 me-n3" title="Show header menu">
                             <div class="topbar-item" id="kt_header_menu_mobile_toggle">
                                 <i class="bi bi-text-left fs-1"></i>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <script>
         // Fungsi untuk mengirimkan form logout
         function submitLogoutForm() {
             document.getElementById('logout-form').submit();
         }
     </script>
