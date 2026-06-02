<style>
    /* =====================================================
       CLEAN PROFESSIONAL SIDEBAR STYLE
       LTR + RTL SAFE
    ===================================================== */

    .main-sidebar {
        width: 260px !important;
        min-width: 260px !important;
        max-width: 260px !important;
        height: 100vh !important;
        min-height: 100vh !important;
        position: fixed !important;
        top: 0 !important;
        bottom: 0 !important;
        left: 0 !important;
        right: auto !important;
        z-index: 1038 !important;
        overflow: hidden !important;

        display: flex !important;
        flex-direction: column !important;

        background:
            radial-gradient(circle at top left, rgba(52, 211, 153, 0.20), transparent 36%),
            linear-gradient(180deg, #022c22 0%, #064e3b 48%, #022c22 100%) !important;

        border-right: 1px solid rgba(209, 250, 229, 0.22) !important;
        box-shadow: 12px 0 34px rgba(2, 44, 34, 0.32) !important;
    }

    html[dir="rtl"] .main-sidebar,
    body.rtl-mode .main-sidebar {
        left: auto !important;
        right: 0 !important;
        border-right: none !important;
        border-left: 1px solid rgba(209, 250, 229, 0.22) !important;
        box-shadow: -12px 0 34px rgba(2, 44, 34, 0.32) !important;
        direction: rtl !important;
        text-align: right !important;
    }

    .main-sidebar::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.08), transparent);
        pointer-events: none;
        z-index: 0;
    }

    .main-sidebar > * {
        position: relative;
        z-index: 1;
    }

    .main-sidebar .brand-link {
        min-height: 76px !important;
        margin: 14px 12px 10px !important;
        padding: 13px 12px !important;
        border-radius: 20px !important;

        display: flex !important;
        align-items: center !important;
        gap: 11px !important;

        background: rgba(255, 255, 255, 0.10) !important;
        border: 1px solid rgba(209, 250, 229, 0.22) !important;
        color: #ffffff !important;
        text-decoration: none !important;
        overflow: hidden !important;

        box-shadow: 0 10px 24px rgba(0, 0, 0, 0.18) !important;
    }

    html[dir="rtl"] .main-sidebar .brand-link,
    body.rtl-mode .main-sidebar .brand-link {
        direction: rtl !important;
        text-align: right !important;
        flex-direction: row !important;
    }

    .main-sidebar .brand-image {
        width: 44px !important;
        height: 44px !important;
        min-width: 44px !important;
        max-width: 44px !important;
        object-fit: cover !important;
        margin: 0 !important;
        background: #ffffff !important;
        border: 3px solid rgba(255, 255, 255, 0.90) !important;
        opacity: 1 !important;
    }

    .main-sidebar .brand-text {
        color: #ffffff !important;
        font-size: 15px !important;
        font-weight: 900 !important;
        line-height: 1.45 !important;
        white-space: normal !important;
        word-break: break-word !important;
        margin: 0 !important;
    }

    .main-sidebar .sidebar {
        flex: 1 1 auto !important;
        width: 100% !important;
        height: auto !important;
        min-height: 0 !important;
        padding: 10px 12px !important;
        overflow-y: auto !important;
        overflow-x: hidden !important;
    }

    .main-sidebar .sidebar::-webkit-scrollbar {
        width: 6px !important;
    }

    .main-sidebar .sidebar::-webkit-scrollbar-track {
        background: transparent !important;
    }

    .main-sidebar .sidebar::-webkit-scrollbar-thumb {
        background: rgba(209, 250, 229, 0.55) !important;
        border-radius: 999px !important;
    }

    .main-sidebar .sidebar::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.85) !important;
    }

    .sidebar-section-title {
        color: #a7f3d0 !important;
        font-size: 11px !important;
        font-weight: 900 !important;
        letter-spacing: 1px !important;
        text-transform: uppercase !important;
        margin: 10px 10px 12px !important;
        line-height: 1.5 !important;
    }

    html[dir="rtl"] .sidebar-section-title,
    body.rtl-mode .sidebar-section-title {
        text-align: right !important;
    }

    html[dir="ltr"] .sidebar-section-title,
    body.ltr-mode .sidebar-section-title {
        text-align: left !important;
    }

    .nav-sidebar,
    .sidebar-list {
        width: 100% !important;
    }

    .sidebar-list .nav-link {
        width: 100% !important;
        min-height: 47px !important;
        margin: 6px 0 !important;
        padding: 11px 12px !important;
        border-radius: 15px !important;

        display: flex !important;
        align-items: center !important;
        gap: 10px !important;

        color: #ecfdf5 !important;
        background: rgba(255, 255, 255, 0.07) !important;
        border: 1px solid rgba(209, 250, 229, 0.16) !important;
        text-decoration: none !important;
        overflow: hidden !important;

        transition: all 0.22s ease !important;
    }

    html[dir="rtl"] .sidebar-list .nav-link,
    body.rtl-mode .sidebar-list .nav-link {
        direction: rtl !important;
        text-align: right !important;
        flex-direction: row !important;
        justify-content: flex-start !important;
    }

    html[dir="ltr"] .sidebar-list .nav-link,
    body.ltr-mode .sidebar-list .nav-link {
        direction: ltr !important;
        text-align: left !important;
        flex-direction: row !important;
        justify-content: flex-start !important;
    }

    .sidebar-list .nav-link:hover {
        color: #ffffff !important;
        background: rgba(255, 255, 255, 0.15) !important;
        border-color: rgba(209, 250, 229, 0.34) !important;
        transform: translateX(4px) !important;
    }

    html[dir="rtl"] .sidebar-list .nav-link:hover,
    body.rtl-mode .sidebar-list .nav-link:hover {
        transform: translateX(-4px) !important;
    }

    .sidebar-list .nav-link.active {
        background: #ecfdf5 !important;
        color: #064e3b !important;
        border-color: #bbf7d0 !important;
        font-weight: 900 !important;
        box-shadow: 0 10px 24px rgba(0, 0, 0, 0.20) !important;
    }

    .sidebar-list .nav-svg {
        width: 23px !important;
        height: 23px !important;
        min-width: 23px !important;
        max-width: 23px !important;
        color: currentColor !important;
        flex-shrink: 0 !important;
    }

    .sidebar-list p {
        margin: 0 !important;
        color: currentColor !important;
        font-size: 14.5px !important;
        font-weight: 800 !important;
        line-height: 1.45 !important;
        white-space: normal !important;
        word-break: break-word !important;
    }

    .sidebar-logout {
        min-height: 49px !important;
        margin: 10px 12px 14px !important;
        padding: 11px 13px !important;
        border-radius: 16px !important;

        display: flex !important;
        align-items: center !important;
        gap: 10px !important;

        color: #ffffff !important;
        background: linear-gradient(135deg, #047857 0%, #064e3b 55%, #022c22 100%) !important;
        border: 1px solid rgba(209, 250, 229, 0.28) !important;
        text-decoration: none !important;
        font-weight: 900 !important;
        overflow: hidden !important;
        flex-shrink: 0 !important;

        box-shadow: 0 12px 26px rgba(0, 0, 0, 0.22) !important;
        transition: all 0.22s ease !important;
    }

    html[dir="rtl"] .sidebar-logout,
    body.rtl-mode .sidebar-logout {
        direction: rtl !important;
        text-align: right !important;
        justify-content: flex-start !important;
    }

    html[dir="ltr"] .sidebar-logout,
    body.ltr-mode .sidebar-logout {
        direction: ltr !important;
        text-align: left !important;
        justify-content: flex-start !important;
    }

    .sidebar-logout:hover {
        color: #ffffff !important;
        background: linear-gradient(135deg, #059669 0%, #047857 55%, #064e3b 100%) !important;
        transform: translateX(4px) !important;
    }

    html[dir="rtl"] .sidebar-logout:hover,
    body.rtl-mode .sidebar-logout:hover {
        transform: translateX(-4px) !important;
    }

    .sidebar-logout .logout-svg {
        width: 23px !important;
        height: 23px !important;
        min-width: 23px !important;
        max-width: 23px !important;
        color: currentColor !important;
        flex-shrink: 0 !important;
    }

    .sidebar-logout span {
        font-size: 14.5px !important;
        font-weight: 900 !important;
        line-height: 1.45 !important;
    }

    body.sidebar-collapse .main-sidebar {
        width: 4.6rem !important;
        min-width: 4.6rem !important;
        max-width: 4.6rem !important;
    }

    body.sidebar-collapse .main-sidebar .brand-text,
    body.sidebar-collapse .sidebar-section-title,
    body.sidebar-collapse .sidebar-list p,
    body.sidebar-collapse .sidebar-logout span {
        display: none !important;
    }

    body.sidebar-collapse .main-sidebar .brand-link,
    body.sidebar-collapse .sidebar-list .nav-link,
    body.sidebar-collapse .sidebar-logout {
        justify-content: center !important;
        padding-left: 8px !important;
        padding-right: 8px !important;
    }

    body.sidebar-collapse .main-sidebar .brand-image {
        width: 38px !important;
        height: 38px !important;
        min-width: 38px !important;
        max-width: 38px !important;
    }

    body.sidebar-collapse .sidebar {
        padding-left: 8px !important;
        padding-right: 8px !important;
    }

    @media (max-width: 991.98px) {
        .main-sidebar,
        body.sidebar-collapse .main-sidebar {
            width: 260px !important;
            min-width: 260px !important;
            max-width: 260px !important;
        }

        body.sidebar-collapse .main-sidebar .brand-text,
        body.sidebar-collapse .sidebar-section-title,
        body.sidebar-collapse .sidebar-list p,
        body.sidebar-collapse .sidebar-logout span {
            display: inline !important;
        }

        .main-sidebar .sidebar {
            padding: 10px 12px !important;
        }
    }
</style>

@php
    $active = function ($routePattern) {
        return request()->routeIs($routePattern) ? ' active' : '';
    };

    $svgIcon = function ($name) {
        $icons = [
            'pharmacies' => '<svg class="nav-svg" viewBox="0 0 24 24" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 21V8.5C4 7.67 4.67 7 5.5 7H18.5C19.33 7 20 7.67 20 8.5V21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <path d="M8 7V4.5C8 3.67 8.67 3 9.5 3H14.5C15.33 3 16 3.67 16 4.5V7" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <path d="M12 10V18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <path d="M8 14H16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <path d="M3 21H21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>',

            'doctors' => '<svg class="nav-svg" viewBox="0 0 24 24" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 3V7C8 9.21 9.79 11 12 11C14.21 11 16 9.21 16 7V3" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <path d="M12 11V14C12 17.31 14.69 20 18 20C20.21 20 22 18.21 22 16V14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <circle cx="22" cy="12" r="1.5" fill="currentColor"/>
                <path d="M6 3H4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <path d="M20 3H18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>',

            'clients' => '<svg class="nav-svg" viewBox="0 0 24 24" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 21V19C16 16.79 14.21 15 12 15H6C3.79 15 2 16.79 2 19V21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="2"/>
                <path d="M22 21V19C22 17.14 20.72 15.57 19 15.13" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <path d="M16 3.13C17.72 3.57 19 5.14 19 7C19 8.86 17.72 10.43 16 10.87" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>',

            'areas' => '<svg class="nav-svg" viewBox="0 0 24 24" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 21C12 21 19 14.8 19 8.8C19 4.93 15.87 2 12 2C8.13 2 5 4.93 5 8.8C5 14.8 12 21 12 21Z" stroke="currentColor" stroke-width="2"/>
                <circle cx="12" cy="9" r="2.5" stroke="currentColor" stroke-width="2"/>
            </svg>',

            'addresses' => '<svg class="nav-svg" viewBox="0 0 24 24" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <rect x="3" y="5" width="18" height="14" rx="2" stroke="currentColor" stroke-width="2"/>
                <circle cx="8" cy="11" r="2" stroke="currentColor" stroke-width="2"/>
                <path d="M5.5 17C6.2 15.8 7.05 15 8 15C8.95 15 9.8 15.8 10.5 17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <path d="M14 10H18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <path d="M14 14H18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>',

            'medicines' => '<svg class="nav-svg" viewBox="0 0 24 24" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.5 4.5L4.5 10.5C2.84 12.16 2.84 14.84 4.5 16.5C6.16 18.16 8.84 18.16 10.5 16.5L16.5 10.5C18.16 8.84 18.16 6.16 16.5 4.5C14.84 2.84 12.16 2.84 10.5 4.5Z" stroke="currentColor" stroke-width="2"/>
                <path d="M8 7L14 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <path d="M15 18H21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <path d="M18 15V21" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>',

            'prescription_scanner' => '<svg class="nav-svg" viewBox="0 0 24 24" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 3H15L20 8V21H7C5.9 21 5 20.1 5 19V5C5 3.9 5.9 3 7 3Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                <path d="M15 3V8H20" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                <path d="M9 13H15" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <path d="M9 17H13" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <path d="M11 9H13" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <path d="M12 8V10" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>',

            'orders' => '<svg class="nav-svg" viewBox="0 0 24 24" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 6H21L19 15H9.5L8 6Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                <path d="M8 6L7.4 3H3" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <circle cx="10" cy="20" r="1.5" fill="currentColor"/>
                <circle cx="18" cy="20" r="1.5" fill="currentColor"/>
                <path d="M11 10H17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>',

            'revenue' => '<svg class="nav-svg" viewBox="0 0 24 24" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 19V5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <path d="M4 19H20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <path d="M7 16L11 12L14 15L20 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M17 8H20V11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>',

            'home' => '<svg class="nav-svg" viewBox="0 0 24 24" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 11L12 3L21 11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M5 10V21H19V10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9 21V14H15V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>',

            'logout' => '<svg class="logout-svg" viewBox="0 0 24 24" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 17L15 12L10 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M15 12H3" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <path d="M14 4H19C20.1 4 21 4.9 21 6V18C21 19.1 20.1 20 19 20H14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>',
        ];

        return $icons[$name] ?? '';
    };
@endphp

<aside class="main-sidebar elevation-4">

    <a href="{{ route('index') }}" class="brand-link">
        <img
            src="{{ asset('dist/img/PharmacyLogo.PNG') }}"
            alt="{{ __('partial.pharmacy_logo') }}"
            class="brand-image img-circle elevation-3">

        <span class="brand-text">
            {{ __('partial.pharmacy_system') }}
        </span>
    </a>

    {{-- ADMIN SIDEBAR --}}
    @role('admin')
    <div class="sidebar">
        <div class="sidebar-section-title">{{ __('partial.admin_panel') }}</div>

        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                <li class="nav-item sidebar-list">
                    <a href="{{ route('pharmacies.index') }}" class="nav-link{{ $active('pharmacies.*') }}">
                        {!! $svgIcon('pharmacies') !!}
                        <p>{{ __('partial.pharmacies') }}</p>
                    </a>
                </li>

                <li class="nav-item sidebar-list">
                    <a href="{{ route('doctors.index') }}" class="nav-link{{ $active('doctors.*') }}">
                        {!! $svgIcon('doctors') !!}
                        <p>{{ __('partial.doctors') }}</p>
                    </a>
                </li>

                <li class="nav-item sidebar-list">
                    <a href="{{ route('clients.index') }}" class="nav-link{{ $active('clients.*') }}">
                        {!! $svgIcon('clients') !!}
                        <p>{{ __('partial.clients') }}</p>
                    </a>
                </li>

                <li class="nav-item sidebar-list">
                    <a href="{{ route('areas.index') }}" class="nav-link{{ $active('areas.*') }}">
                        {!! $svgIcon('areas') !!}
                        <p>{{ __('partial.areas') }}</p>
                    </a>
                </li>

                <li class="nav-item sidebar-list">
                    <a href="{{ route('addresses.index') }}" class="nav-link{{ $active('addresses.*') }}">
                        {!! $svgIcon('addresses') !!}
                        <p>{{ __('partial.client_addresses') }}</p>
                    </a>
                </li>

                <li class="nav-item sidebar-list">
                    <a href="{{ route('medicines.index') }}" class="nav-link{{ $active('medicines.*') }}">
                        {!! $svgIcon('medicines') !!}
                        <p>{{ __('partial.medicines') }}</p>
                    </a>
                </li>

                <li class="nav-item sidebar-list">
                    <a href="{{ route('prescription-scanner.index') }}" class="nav-link{{ $active('prescription-scanner.*') }}">
                        {!! $svgIcon('prescription_scanner') !!}
                        <p>{{ __('partial.prescription_scanner') }}</p>
                    </a>
                </li>

                <li class="nav-item sidebar-list">
                    <a href="{{ route('orders.index') }}" class="nav-link{{ $active('orders.*') }}">
                        {!! $svgIcon('orders') !!}
                        <p>{{ __('partial.orders') }}</p>
                    </a>
                </li>

                <li class="nav-item sidebar-list">
                    <a href="{{ route('revenues.index') }}" class="nav-link{{ request()->routeIs('revenues.index') ? ' active' : '' }}">
                        {!! $svgIcon('revenue') !!}
                        <p>{{ __('partial.revenue') }}</p>
                    </a>
                </li>

                <li class="nav-item sidebar-list">
                    <a href="{{ route('revenues.doctor-medicine') }}" class="nav-link{{ request()->routeIs('revenues.doctor-medicine') ? ' active' : '' }}">
                        {!! $svgIcon('revenue') !!}
                        <p>{{ __('partial.doctor_medicine_revenue') }}</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
    @endrole


    {{-- PHARMACY SIDEBAR --}}
    @role('pharmacy')
    <div class="sidebar">
        <div class="sidebar-section-title">{{ __('partial.pharmacy_panel') }}</div>

        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                <li class="nav-item sidebar-list">
                    <a href="{{ route('pharmacies.index') }}" class="nav-link{{ $active('pharmacies.*') }}">
                        {!! $svgIcon('pharmacies') !!}
                        <p>{{ __('partial.pharmacy') }}</p>
                    </a>
                </li>

                <li class="nav-item sidebar-list">
                    <a href="{{ route('doctors.index') }}" class="nav-link{{ $active('doctors.*') }}">
                        {!! $svgIcon('doctors') !!}
                        <p>{{ __('partial.doctors') }}</p>
                    </a>
                </li>

                <li class="nav-item sidebar-list">
                    <a href="{{ route('medicines.index') }}" class="nav-link{{ $active('medicines.*') }}">
                        {!! $svgIcon('medicines') !!}
                        <p>{{ __('partial.medicines') }}</p>
                    </a>
                </li>

                <li class="nav-item sidebar-list">
                    <a href="{{ route('prescription-scanner.index') }}" class="nav-link{{ $active('prescription-scanner.*') }}">
                        {!! $svgIcon('prescription_scanner') !!}
                        <p>{{ __('partial.prescription_scanner') }}</p>
                    </a>
                </li>

                <li class="nav-item sidebar-list">
                    <a href="{{ route('orders.index') }}" class="nav-link{{ $active('orders.*') }}">
                        {!! $svgIcon('orders') !!}
                        <p>{{ __('partial.orders') }}</p>
                    </a>
                </li>

                <li class="nav-item sidebar-list">
                    <a href="{{ route('revenues.index') }}" class="nav-link{{ request()->routeIs('revenues.index') ? ' active' : '' }}">
                        {!! $svgIcon('revenue') !!}
                        <p>{{ __('partial.revenue') }}</p>
                    </a>
                </li>

                <li class="nav-item sidebar-list">
                    <a href="{{ route('revenues.doctor-medicine') }}" class="nav-link{{ request()->routeIs('revenues.doctor-medicine') ? ' active' : '' }}">
                        {!! $svgIcon('revenue') !!}
                        <p>{{ __('partial.doctor_medicine_revenue') }}</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
    @endrole


    {{-- DOCTOR SIDEBAR --}}
    @role('doctor')
    <div class="sidebar">
        <div class="sidebar-section-title">{{ __('partial.doctor_panel') }}</div>

        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                <li class="nav-item sidebar-list">
                    <a href="{{ route('doctors.index') }}" class="nav-link{{ $active('doctors.*') }}">
                        {!! $svgIcon('doctors') !!}
                        <p>{{ __('partial.doctor_profile') }}</p>
                    </a>
                </li>

                <li class="nav-item sidebar-list">
                    <a href="{{ route('medicines.index') }}" class="nav-link{{ $active('medicines.*') }}">
                        {!! $svgIcon('medicines') !!}
                        <p>{{ __('partial.medicines') }}</p>
                    </a>
                </li>

                <li class="nav-item sidebar-list">
                    <a href="{{ route('prescription-scanner.index') }}" class="nav-link{{ $active('prescription-scanner.*') }}">
                        {!! $svgIcon('prescription_scanner') !!}
                        <p>{{ __('partial.prescription_scanner') }}</p>
                    </a>
                </li>

                <li class="nav-item sidebar-list">
                    <a href="{{ route('orders.index') }}" class="nav-link{{ $active('orders.*') }}">
                        {!! $svgIcon('orders') !!}
                        <p>{{ __('partial.orders') }}</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
    @endrole


    {{-- CLIENT SIDEBAR --}}
    @role('client')
    <div class="sidebar">
        <div class="sidebar-section-title">{{ __('partial.client_panel') }}</div>

        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                <li class="nav-item sidebar-list">
                    <a href="{{ route('home') }}" class="nav-link{{ $active('home') }}">
                        {!! $svgIcon('home') !!}
                        <p>{{ __('partial.home') }}</p>
                    </a>
                </li>

                <li class="nav-item sidebar-list">
                    <a href="{{ route('home') }}" class="nav-link">
                        {!! $svgIcon('orders') !!}
                        <p>{{ __('partial.order_confirmation') }}</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
    @endrole


    {{-- LOGOUT --}}
    <a class="sidebar-logout"
       href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

        {!! $svgIcon('logout') !!}

        <span>{{ __('partial.logout') }}</span>
    </a>

    <form id="logout-form"
          action="{{ route('logout') }}"
          method="POST"
          class="d-none">
        @csrf
    </form>

</aside>