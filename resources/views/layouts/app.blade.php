@php
    $locale = session('locale', app()->getLocale());

    if (!in_array($locale, ['en', 'ps', 'fa'])) {
        $locale = 'en';
    }

    app()->setLocale($locale);

    $rtlLocales = ['ps', 'fa', 'ar'];
    $isRtl = in_array($locale, $rtlLocales);
@endphp





<!doctype html>
<html lang="{{ str_replace('_', '-', $locale) }}" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('dist/img/PharmacyLogo.png') }}">

    <title>{{ __('layouts.pharmacy_System') }}</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Fonts -->


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic:wght@400;500;600;700;800;900&family=Vazirmatn:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">




    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <!-- overlayScrollbars -->
   

    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/stylee.min.css') }}">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', 'Source Sans Pro', sans-serif;
            background: linear-gradient(135deg, #eef7ff 0%, #ffffff 55%, #e8fff9 100%);
            color: #0f172a;
        }

        html[dir="rtl"] body,
        body.rtl-mode {
            direction: rtl !important;
            text-align: right !important;
            font-family: 'Noto Naskh Arabic', 'Nunito', 'Source Sans Pro', sans-serif !important;
        }

        html[dir="ltr"] body,
        body.ltr-mode {
            direction: ltr !important;
            text-align: left !important;
        }

        .wrapper {
            background: transparent;
        }

        .content-wrapper {
            background: linear-gradient(135deg, #eef7ff 0%, #ffffff 55%, #e8fff9 100%) !important;
            min-height: calc(100vh - 110px);
            padding-bottom: 24px;
        }

        .content-header {
            padding: 20px 20px 8px;
        }

        .page-title-card {
            background: linear-gradient(90deg, #300575 0%, #122d57 100%);
            border-radius: 24px;
            padding: 22px 26px;
            color: #ffffff;
            box-shadow: 0 16px 35px rgba(13, 110, 253, 0.25);
            position: relative;
            overflow: hidden;
        }

        .page-title-card::before {
            content: "";
            position: absolute;
            width: 170px;
            height: 170px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.13);
            top: -70px;
            right: -55px;
        }

        html[dir="rtl"] .page-title-card::before {
            right: auto;
            left: -55px;
        }

        .page-title-content {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .page-title-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .page-title-icon {
            width: 52px;
            height: 52px;
            border-radius: 18px;
            background: #ffffff;
            color: #0cc243;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.18);
        }

        .page-title-text h3 {
            margin: 0;
            font-size: 26px;
            font-weight: 900;
            letter-spacing: 0.4px;
        }

        .page-title-text span {
            font-size: 18px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.88);
        }

        .breadcrumb-box {
            background: rgba(255, 255, 255, 0.18);
            border: 1px solid rgba(255, 255, 255, 0.24);
            border-radius: 25px;
            padding: 10px 16px;
        }

        .breadcrumb-box .breadcrumb {
            margin: 0;
            background: transparent;
            padding: 0;
            align-items: center;
        }

        .breadcrumb-box .breadcrumb-item,
        .breadcrumb-box .breadcrumb-item.active {
            color: rgba(255, 255, 255, 0.88);
            font-weight: 800;
            font-size: 13px;
        }

        .breadcrumb-box .breadcrumb-item a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 900;
        }

        .breadcrumb-box .breadcrumb-item + .breadcrumb-item::before {
            color: rgba(255, 255, 255, 0.72);
        }

        .preloader {
            background: linear-gradient(135deg, #eef7ff 0%, #ffffff 55%, #e8fff9 100%) !important;
        }

        .preloader img {
            filter: drop-shadow(0 14px 24px rgba(13, 110, 253, 0.25));
        }

        .control-sidebar {
            box-shadow: -10px 0 30px rgba(15, 23, 42, 0.18);
        }

        .main-sidebar {
            box-shadow: 8px 0 30px rgba(15, 23, 42, 0.12);
        }

        .main-header {
            box-shadow: 0 6px 22px rgba(13, 110, 253, 0.10);
            border-bottom: none !important;
        }

        .content {
            padding: 0 20px 20px;
        }

        /* ===============================
           FULL RTL DASHBOARD FIX
           Pashto in your project = fa
        =============================== */

        html[dir="rtl"] .main-sidebar,
        body.rtl-mode .main-sidebar {
            right: 0 !important;
            left: auto !important;
            direction: rtl !important;
            text-align: right !important;
            box-shadow: -8px 0 30px rgba(15, 23, 42, 0.12);
        }

        html[dir="rtl"] .main-header,
        html[dir="rtl"] .content-wrapper,
        html[dir="rtl"] .main-footer,
        body.rtl-mode .main-header,
        body.rtl-mode .content-wrapper,
        body.rtl-mode .main-footer {
            margin-left: 0 !important;
            margin-right: 250px !important;
            direction: rtl !important;
            text-align: right !important;
        }

        html[dir="rtl"] body.sidebar-collapse .main-header,
        html[dir="rtl"] body.sidebar-collapse .content-wrapper,
        html[dir="rtl"] body.sidebar-collapse .main-footer,
        body.rtl-mode.sidebar-collapse .main-header,
        body.rtl-mode.sidebar-collapse .content-wrapper,
        body.rtl-mode.sidebar-collapse .main-footer {
            margin-left: 0 !important;
            margin-right: 4.6rem !important;
        }

        html[dir="rtl"] .brand-link,
        html[dir="rtl"] .nav-sidebar,
        html[dir="rtl"] .nav-sidebar .nav-item,
        html[dir="rtl"] .nav-sidebar .nav-link,
        body.rtl-mode .brand-link,
        body.rtl-mode .nav-sidebar,
        body.rtl-mode .nav-sidebar .nav-item,
        body.rtl-mode .nav-sidebar .nav-link {
            direction: rtl !important;
            text-align: right !important;
        }

        html[dir="rtl"] .nav-sidebar .nav-link,
        body.rtl-mode .nav-sidebar .nav-link {
            display: flex !important;
            align-items: center !important;
            justify-content: flex-start !important;
        }

        html[dir="rtl"] .nav-sidebar .nav-icon,
        html[dir="rtl"] .nav-sidebar .nav-link i,
        body.rtl-mode .nav-sidebar .nav-icon,
        body.rtl-mode .nav-sidebar .nav-link i {
            margin-right: 0 !important;
            margin-left: 10px !important;
        }

        html[dir="rtl"] .nav-sidebar .nav-link p,
        body.rtl-mode .nav-sidebar .nav-link p {
            margin-right: 0 !important;
            margin-left: 0 !important;
        }

        html[dir="rtl"] .navbar-nav,
        body.rtl-mode .navbar-nav {
            padding-right: 0 !important;
        }

        html[dir="rtl"] .ml-auto,
        html[dir="rtl"] .ms-auto,
        body.rtl-mode .ml-auto,
        body.rtl-mode .ms-auto {
            margin-left: 0 !important;
            margin-right: auto !important;
        }

        html[dir="rtl"] .dropdown-menu,
        body.rtl-mode .dropdown-menu {
            direction: rtl !important;
            text-align: right !important;
        }

        html[dir="rtl"] .dropdown-menu-end,
        body.rtl-mode .dropdown-menu-end {
            right: auto !important;
            left: 0 !important;
        }

        html[dir="rtl"] .breadcrumb,
        body.rtl-mode .breadcrumb {
            direction: rtl !important;
            justify-content: flex-start !important;
        }

        html[dir="rtl"] .breadcrumb-item + .breadcrumb-item,
        body.rtl-mode .breadcrumb-item + .breadcrumb-item {
            padding-left: 0 !important;
            padding-right: 0.5rem !important;
        }

        html[dir="rtl"] .breadcrumb-item + .breadcrumb-item::before,
        body.rtl-mode .breadcrumb-item + .breadcrumb-item::before {
            float: right !important;
            padding-right: 0 !important;
            padding-left: 0.5rem !important;
        }

        html[dir="rtl"] .float-sm-right,
        body.rtl-mode .float-sm-right {
            float: left !important;
        }

        html[dir="rtl"] .form-control,
        html[dir="rtl"] .form-select,
        html[dir="rtl"] textarea,
        html[dir="rtl"] select,
        body.rtl-mode .form-control,
        body.rtl-mode .form-select,
        body.rtl-mode textarea,
        body.rtl-mode select {
            direction: rtl !important;
            text-align: right !important;
        }

        html[dir="rtl"] input[type="email"],
        html[dir="rtl"] input[type="number"],
        html[dir="rtl"] input[type="date"],
        html[dir="rtl"] input[type="time"],
        html[dir="rtl"] input[type="url"],
        body.rtl-mode input[type="email"],
        body.rtl-mode input[type="number"],
        body.rtl-mode input[type="date"],
        body.rtl-mode input[type="time"],
        body.rtl-mode input[type="url"] {
            direction: ltr !important;
            text-align: left !important;
        }

        html[dir="rtl"] table,
        html[dir="rtl"] table th,
        html[dir="rtl"] table td,
        body.rtl-mode table,
        body.rtl-mode table th,
        body.rtl-mode table td {
            direction: rtl !important;
            text-align: right !important;
        }

        html[dir="rtl"] .card,
        html[dir="rtl"] .card-header,
        html[dir="rtl"] .card-body,
        html[dir="rtl"] .card-footer,
        html[dir="rtl"] .modal-header,
        html[dir="rtl"] .modal-body,
        html[dir="rtl"] .modal-footer,
        body.rtl-mode .card,
        body.rtl-mode .card-header,
        body.rtl-mode .card-body,
        body.rtl-mode .card-footer,
        body.rtl-mode .modal-header,
        body.rtl-mode .modal-body,
        body.rtl-mode .modal-footer {
            direction: rtl !important;
            text-align: right !important;
        }

        html[dir="rtl"] .modal-header .btn-close,
        body.rtl-mode .modal-header .btn-close {
            margin: 0 auto 0 0 !important;
        }

        html[dir="rtl"] .page-title-content,
        body.rtl-mode .page-title-content {
            direction: rtl !important;
        }

        html[dir="rtl"] .page-title-left,
        body.rtl-mode .page-title-left {
            flex-direction: row !important;
            text-align: right !important;
        }

        html[dir="rtl"] .me-1,
        body.rtl-mode .me-1 {
            margin-right: 0 !important;
            margin-left: 0.25rem !important;
        }

        html[dir="rtl"] .me-2,
        body.rtl-mode .me-2 {
            margin-right: 0 !important;
            margin-left: 0.5rem !important;
        }

        html[dir="rtl"] .ms-1,
        body.rtl-mode .ms-1 {
            margin-left: 0 !important;
            margin-right: 0.25rem !important;
        }

        html[dir="rtl"] .ms-2,
        body.rtl-mode .ms-2 {
            margin-left: 0 !important;
            margin-right: 0.5rem !important;
        }

        html[dir="ltr"] .main-sidebar,
        body.ltr-mode .main-sidebar {
            left: 0 !important;
            right: auto !important;
        }

        html[dir="ltr"] .main-header,
        html[dir="ltr"] .content-wrapper,
        html[dir="ltr"] .main-footer,
        body.ltr-mode .main-header,
        body.ltr-mode .content-wrapper,
        body.ltr-mode .main-footer {
            margin-right: 0 !important;
        }

        @media (max-width: 768px) {
            .content-header {
                padding: 15px 12px 6px;
            }

            .content {
                padding: 0 12px 18px;
            }

            .page-title-card {
                padding: 18px;
                border-radius: 20px;
            }

            .page-title-left {
                align-items: flex-start;
            }

            .page-title-icon {
                width: 46px;
                height: 46px;
                font-size: 20px;
            }

            .page-title-text h3 {
                font-size: 22px;
            }

            .page-title-text span {
                font-size: 15px;
            }

            .breadcrumb-box {
                width: 100%;
            }
        }

        @media (max-width: 991.98px) {
            html[dir="rtl"] .main-header,
            html[dir="rtl"] .content-wrapper,
            html[dir="rtl"] .main-footer,
            body.rtl-mode .main-header,
            body.rtl-mode .content-wrapper,
            body.rtl-mode .main-footer {
                margin-right: 0 !important;
                margin-left: 0 !important;
            }

            html[dir="rtl"] .main-sidebar,
            body.rtl-mode .main-sidebar {
                right: 0 !important;
                left: auto !important;
            }

            html[dir="rtl"] body:not(.sidebar-open) .main-sidebar,
            body.rtl-mode:not(.sidebar-open) .main-sidebar {
                transform: translateX(250px) !important;
            }

            html[dir="rtl"] body.sidebar-open .main-sidebar,
            body.rtl-mode.sidebar-open .main-sidebar {
                transform: translateX(0) !important;
            }
        }
    </style>

    @stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed {{ $isRtl ? 'rtl-mode' : 'ltr-mode' }}">

<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble"
             src="{{ asset('dist/img/Transparent-PharmacyLogo.PNG') }}"
             alt="PharmacyLogo"
             height="100"
             width="100">
    </div>

    <!-- Navbar -->
    @include('partials.header')

    <!-- Sidebar -->
    @include('partials.sidebar')

    <!-- Content Wrapper -->
    <div class="content-wrapper">

        <!-- Content Header -->
        <div class="content-header">

            <div class="container-fluid">

                <div class="page-title-card">

                    <div class="page-title-content">

                        <div class="page-title-left">

                            <div class="page-title-icon">
                                <i class="fas fa-clinic-medical"></i>
                            </div>

                            <div class="page-title-text">
                                <h3>
                                    {{ __('layouts.pharmacy_System') }}
                                </h3>

                                <span>
                                    @yield('title')
                                </span>
                            </div>

                        </div>

                        <div class="breadcrumb-box">

                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item">
                                    <a href="{{ route('index') }}">
                                        <i class="fas fa-home me-1"></i>
                                        {{ __('layouts.home') }}
                                    </a>
                                </li>

                                <li class="breadcrumb-item active">
                                    {{ __('layouts.pharmacy_System') }}
                                </li>

                            </ol>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Main Content -->
        <section class="content">
            @yield('content')
        </section>

    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark"></aside>

    <!-- Footer -->
    @include('partials.footer')

</div>

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap 4 for AdminLTE compatibility -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- overlayScrollbars -->


<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>

<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

<!-- Dashboard JS -->
<script src="{{ asset('dist/js/pages/dashboard2.js') }}"></script>

<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!-- Bootstrap 5 for data-bs modals -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@yield('scripts')
@stack('scripts')

</body>
</html>