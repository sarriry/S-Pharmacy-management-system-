<style>
    .main-header {
        background:
            radial-gradient(circle at left, rgba(16, 185, 129, 0.25), transparent 32%),
            radial-gradient(circle at right, rgba(5, 150, 105, 0.20), transparent 35%),
            linear-gradient(90deg, #022c22 0%, #064e3b 45%, #065f46 100%) !important;
        border-bottom: 1px solid rgba(209, 250, 229, 0.35) !important;
        min-height: 62px;
        box-shadow: 0 6px 22px rgba(6, 78, 59, 0.28);
        padding: 0 14px;
    }

    .main-header .nav-link {
        color: #ffffff !important;
        font-weight: 800;
        border-radius: 14px;
        padding: 9px 14px;
        transition: all 0.25s ease;
        letter-spacing: 0.2px;
    }

    .main-header .nav-link:hover {
        background: rgba(255, 255, 255, 0.20);
        color: #ffffff !important;
        transform: translateY(-1px);
    }

    .navbar-home-link {
        background: rgba(255, 255, 255, 0.14);
        margin-left: 8px;
        border: 1px solid rgba(209, 250, 229, 0.35);
        box-shadow:
            0 8px 20px rgba(0, 0, 0, 0.12),
            inset 0 1px 0 rgba(255, 255, 255, 0.22);
    }

    .navbar-home-link:hover {
        background: rgba(255, 255, 255, 0.24);
        border-color: rgba(209, 250, 229, 0.55);
    }

    .navbar-action-link {
        min-width: 42px;
        height: 40px;
        display: flex !important;
        align-items: center;
        justify-content: center;
        margin-left: 6px;
        background: rgba(255, 255, 255, 0.12);
        border: 1px solid rgba(209, 250, 229, 0.32);
        box-shadow:
            0 8px 20px rgba(0, 0, 0, 0.12),
            inset 0 1px 0 rgba(255, 255, 255, 0.20);
    }

    .navbar-action-link:hover {
        background: rgba(255, 255, 255, 0.24);
        border-color: rgba(209, 250, 229, 0.55);
    }

    .navbar-action-text {
        font-size: 13px;
        font-weight: 900;
        line-height: 1;
        white-space: nowrap;
    }

    .navbar-user-box {
        display: flex !important;
        align-items: center;
        gap: 9px;
        background: rgba(255, 255, 255, 0.16);
        padding: 7px 13px !important;
        border-radius: 25px !important;
        margin-left: 8px;
        border: 1px solid rgba(209, 250, 229, 0.35);
        box-shadow:
            0 8px 20px rgba(0, 0, 0, 0.14),
            inset 0 1px 0 rgba(255, 255, 255, 0.24);
    }

    .navbar-user-box:hover {
        background: rgba(255, 255, 255, 0.25);
        border-color: rgba(209, 250, 229, 0.55);
    }

    .navbar-user-box img {
        width: 34px;
        height: 34px;
        object-fit: cover;
        border: 2px solid rgba(255, 255, 255, 0.88);
        background: #ffffff;
        box-shadow: 0 6px 14px rgba(0, 0, 0, 0.18);
    }

    .navbar-user-name {
        color: #ffffff;
        font-size: 15px;
        font-weight: 900;
        white-space: nowrap;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.25);
    }

    .navbar-user-role {
        color: #d1fae5;
        font-size: 11px;
        font-weight: 700;
        display: block;
        line-height: 1;
    }

    .navbar-search-block {
        background:
            radial-gradient(circle at left, rgba(16, 185, 129, 0.25), transparent 32%),
            linear-gradient(90deg, #022c22 0%, #064e3b 50%, #065f46 100%) !important;
        padding: 10px 16px;
        box-shadow: 0 6px 22px rgba(0, 0, 0, 0.22);
        border-bottom: 1px solid rgba(209, 250, 229, 0.35);
    }

    .form-control-navbar {
        background: rgba(255, 255, 255, 0.96) !important;
        border: none !important;
        color: #022c22 !important;
        border-radius: 12px 0 0 12px !important;
        height: 40px;
        font-weight: 700;
        padding: 8px 12px;
    }

    .form-control-navbar::placeholder {
        color: #64748b !important;
        font-weight: 600;
    }

    .form-control-navbar:focus {
        box-shadow: 0 0 0 0.18rem rgba(209, 250, 229, 0.25) !important;
    }

    .btn-navbar {
        background: #ffffff !important;
        border: none !important;
        color: #064e3b !important;
        height: 40px;
        font-weight: 900;
        padding: 0 13px;
        transition: all 0.22s ease;
    }

    .btn-navbar:hover {
        background: #d1fae5 !important;
        color: #022c22 !important;
    }

    .btn-navbar:last-child {
        border-radius: 0 12px 12px 0 !important;
    }

    .navbar-login-btn {
        background: #ffffff;
        color: #064e3b !important;
        font-weight: 900 !important;
        padding: 8px 18px !important;
        border-radius: 25px !important;
        border: 1px solid rgba(255, 255, 255, 0.65);
        box-shadow:
            0 8px 20px rgba(0, 0, 0, 0.14),
            inset 0 1px 0 rgba(255, 255, 255, 0.85);
    }

    .navbar-login-btn:hover {
        background: #d1fae5 !important;
        color: #022c22 !important;
    }

    @media (max-width: 576px) {
        .navbar-user-name {
            display: none;
        }

        .navbar-user-role {
            display: none;
        }

        .navbar-user-box {
            padding: 6px !important;
        }

        .navbar-action-link {
            min-width: 40px;
            padding: 9px 10px !important;
        }

        .navbar-action-text {
            font-size: 12px;
        }

        .navbar-home-link {
            margin-left: 4px;
        }
    }
</style>

@php
    $dashboardRoute = route('index');

    if (auth()->check() && auth()->user()->hasRole('client')) {
        $dashboardRoute = route('home');
    }

    $userImage = asset('dist/img/admin.PNG');
    $userRole = __('partial.user');

    if (auth()->check()) {
        if (auth()->user()->hasRole('admin')) {
            $userImage = asset('dist/img/admin.PNG');
            $userRole = __('partial.admin');
        }

        if (auth()->user()->hasRole('pharmacy')) {
            $pharmacyImage = optional(auth()->user()->pharmacy)->avatar_image;
            $userImage = asset('storage/pharmacies_Images/' . ($pharmacyImage ?? 'default-avatar.PNG'));
            $userRole = __('partial.pharmacy');
        }

        if (auth()->user()->hasRole('doctor')) {
            $doctorImage = optional(auth()->user()->doctor)->avatar_image;
            $userImage = asset('storage/doctors_Images/' . ($doctorImage ?? 'default-avatar.PNG'));
            $userRole = __('partial.doctor');
        }

        if (auth()->user()->hasRole('client')) {
            $clientImage = optional(auth()->user()->client)->avatar_image;
            $userImage = asset('storage/clients_Images/' . ($clientImage ?? 'default-avatar.PNG'));
            $userRole = __('partial.client');
        }
    }
@endphp

<nav class="main-header navbar navbar-expand navbar-dark">

    <!-- Left navbar links -->
    <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link navbar-action-link" data-widget="pushmenu" href="#" role="button">
                <span class="navbar-action-text">Menu</span>
            </a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ $dashboardRoute }}" class="nav-link navbar-home-link">
                {{ __('partial.home') }}
            </a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- Search -->
        <li class="nav-item">
            <a class="nav-link navbar-action-link" data-widget="navbar-search" href="#" role="button">
                <span class="navbar-action-text">{{ __('partial.search') }}</span>
            </a>

            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">

                        <input
                            class="form-control form-control-navbar"
                            type="search"
                            placeholder="{{ __('partial.search_placeholder') }}"
                            aria-label="{{ __('partial.search') }}">

                        <div class="input-group-append">

                            <button class="btn btn-navbar" type="submit">
                                {{ __('partial.search') }}
                            </button>

                            <button
                                class="btn btn-navbar"
                                type="button"
                                data-widget="navbar-search">
                                Close
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Fullscreen -->
        <li class="nav-item">
            <a class="nav-link navbar-action-link" data-widget="fullscreen" href="#" role="button">
                <span class="navbar-action-text">Full</span>
            </a>
        </li>

        <!-- Control Sidebar -->
        <li class="nav-item">
            <a class="nav-link navbar-action-link"
               data-widget="control-sidebar"
               data-slide="true"
               href="#"
               role="button">
                <span class="navbar-action-text">Panel</span>
            </a>
        </li>

        <!-- Guest -->
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link navbar-login-btn" href="{{ route('login') }}">
                        {{ __('partial.login') }}
                    </a>
                </li>
            @endif
        @else

            <!-- Logged User -->
            <li class="nav-item">
                <a id="navbarDropdown"
                   class="nav-link navbar-user-box"
                   href="{{ $dashboardRoute }}"
                   role="button">

                    <img
                        src="{{ $userImage }}"
                        class="img-circle elevation-2"
                        alt="{{ __('partial.user_image') }}">

                    <span>
                        <span class="navbar-user-name">
                            {{ Auth::user()->name }}
                        </span>

                        <span class="navbar-user-role">
                            {{ $userRole }}
                        </span>
                    </span>

                </a>
            </li>

        @endguest

    </ul>
</nav>