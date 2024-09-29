<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">

    <!-- LOGO -->
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <a href="/dashboard">
            <img alt="Logo" src="{{ asset('assets/media/logos/logo-demo13.svg') }}" class="h-15px logo" />
        </a>
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="aside-minimize">
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <path
                        d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z"
                        fill="black" />
                </svg>
            </span>
        </div>
    </div>

    <!-- MENU -->
    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y my-2 py-5 py-lg-8" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
            data-kt-scroll-offset="0">

            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary
                menu-state-bullet-primary menu-arrow-gray-500"
                id="kt_aside_menu" data-kt-menu="true">

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Dashboard</span>
                    </div>
                </div>

                @php
                    $jenis_user_id = auth()->user()->jenis_user_id;

                    $menus = App\Models\Menu::whereHas('settingMenus', function ($query) use ($jenis_user_id) {
                        $query->where('jenis_user_id', $jenis_user_id);
                    })->get();
                @endphp
                @foreach ($menus as $menu)
                    <div class="menu-item">
                        <a class="menu-link {{ request()->is('dashboard/' . $menu->link_menu . '*') ? 'active' : '' }}"
                            href="/dashboard/{{ $menu->link_menu }}">
                            <span class="menu-icon">
                                <i class="{{ $menu->icon_menu ?? 'bi bi-folder' }} fs-3"></i>
                            </span>
                            <span class="menu-title">{{ $menu->nama_menu }}</span>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
