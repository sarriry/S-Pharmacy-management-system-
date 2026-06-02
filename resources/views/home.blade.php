@extends('layouts.app')

@section('content')

<style>
    .login-success-wrapper {
        min-height: calc(100vh - 160px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px 15px;
        background: linear-gradient(135deg, #ecfdf5 0%, #ffffff 45%, #dcfce7 100%);
    }

    .login-success-card {
        width: 100%;
        max-width: 820px;
        background: #ffffff;
        border-radius: 28px;
        padding: 38px;
        box-shadow: 0 18px 45px rgba(6, 78, 59, 0.16);
        border: 1px solid rgba(6, 95, 70, 0.12);
        position: relative;
        overflow: hidden;
    }

    .login-success-card::before {
        content: "";
        position: absolute;
        width: 220px;
        height: 220px;
        background: rgba(6, 95, 70, 0.12);
        border-radius: 50%;
        top: -80px;
        right: -70px;
    }

    .login-success-card::after {
        content: "";
        position: absolute;
        width: 180px;
        height: 180px;
        background: rgba(5, 150, 105, 0.14);
        border-radius: 50%;
        bottom: -70px;
        left: -60px;
    }

    .login-success-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .success-icon-box {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background: linear-gradient(135deg, #065f46, #022c22);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 18px;
        box-shadow: 0 12px 28px rgba(6, 78, 59, 0.32);
        font-size: 40px;
    }

    .login-success-title {
        font-size: 30px;
        font-weight: 800;
        color: #022c22;
        margin-bottom: 10px;
        letter-spacing: 0.4px;
    }

    .login-success-subtitle {
        color: #64748b;
        font-size: 16px;
        margin-bottom: 25px;
        line-height: 1.7;
    }

    .success-user-box {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        border-radius: 22px;
        padding: 18px 20px;
        margin: 25px auto;
        max-width: 520px;
        box-shadow: 0 12px 28px rgba(6, 78, 59, 0.23);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 14px;
        flex-wrap: wrap;
    }

    .success-user-avatar {
        width: 58px;
        height: 58px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid rgba(255, 255, 255, 0.8);
        background: #ffffff;
    }

    .success-user-name {
        font-size: 18px;
        font-weight: 800;
        margin: 0;
    }

    .success-user-role {
        font-size: 13px;
        opacity: 0.85;
        margin: 0;
        font-weight: 600;
    }

    .success-info-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 14px;
        margin: 28px 0;
    }

    .success-info-item {
        background: #f0fdf4;
        border: 1px solid rgba(6, 95, 70, 0.14);
        border-radius: 18px;
        padding: 18px 12px;
        color: #064e3b;
        transition: all 0.25s ease;
        box-shadow: 0 5px 14px rgba(6, 78, 59, 0.06);
    }

    .success-info-item:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 24px rgba(6, 78, 59, 0.14);
    }

    .success-info-item i {
        font-size: 24px;
        margin-bottom: 10px;
        color: #065f46;
    }

    .success-info-item h6 {
        margin: 0;
        font-weight: 800;
        font-size: 14px;
        color: #022c22;
    }

    .success-info-item p {
        margin: 4px 0 0;
        font-size: 12px;
        color: #64748b;
        font-weight: 600;
    }

    .success-actions {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 25px;
    }

    .success-btn-primary {
        background: linear-gradient(90deg, #065f46, #022c22);
        color: #ffffff !important;
        padding: 11px 22px;
        border-radius: 25px;
        font-weight: 800;
        text-decoration: none;
        border: none;
        box-shadow: 0 8px 20px rgba(6, 78, 59, 0.26);
        transition: all 0.25s ease;
    }

    .success-btn-primary:hover {
        transform: translateY(-2px);
        color: #ffffff !important;
        background: linear-gradient(90deg, #047857, #064e3b);
        box-shadow: 0 12px 28px rgba(6, 78, 59, 0.34);
    }

    .success-btn-danger {
        background: #ffffff;
        color: #064e3b !important;
        padding: 11px 22px;
        border-radius: 25px;
        font-weight: 800;
        text-decoration: none;
        border: 1px solid rgba(6, 95, 70, 0.28);
        transition: all 0.25s ease;
    }

    .success-btn-danger:hover {
        background: #064e3b;
        color: #ffffff !important;
        transform: translateY(-2px);
    }

    .session-alert {
        border-radius: 15px;
        font-weight: 700;
        border: none;
        background: #d1fae5;
        color: #064e3b;
        box-shadow: 0 8px 20px rgba(6, 78, 59, 0.15);
    }

    @media (max-width: 768px) {
        .login-success-card {
            padding: 28px 18px;
        }

        .login-success-title {
            font-size: 24px;
        }

        .success-info-grid {
            grid-template-columns: 1fr;
        }

        .success-user-box {
            flex-direction: column;
        }
    }
</style>

@php
    $dashboardRoute = route('home');
    $userRole = __('home.user');
    $userImage = asset('dist/img/admin.jpg');

    if (auth()->check()) {
        if (auth()->user()->hasRole('admin')) {
            $dashboardRoute = route('index');
            $userRole = __('home.admin');
            $userImage = asset('dist/img/admin.jpg');
        }

        if (auth()->user()->hasRole('pharmacy')) {
            $dashboardRoute = route('index');
            $userRole = __('home.pharmacy');
            $pharmacyImage = optional(auth()->user()->pharmacy)->avatar_image;
            $userImage = asset('storage/pharmacies_Images/' . ($pharmacyImage ?? 'default-avatar.jpg'));
        }

        if (auth()->user()->hasRole('doctor')) {
            $dashboardRoute = route('index');
            $userRole = __('home.doctor');
            $doctorImage = optional(auth()->user()->doctor)->avatar_image;
            $userImage = asset('storage/doctors_Images/' . ($doctorImage ?? 'default-avatar.jpg'));
        }

        if (auth()->user()->hasRole('client')) {
            $dashboardRoute = route('home');
            $userRole = __('home.client');
            $clientImage = optional(auth()->user()->client)->avatar_image;
            $userImage = asset('storage/clients_Images/' . ($clientImage ?? 'default-avatar.jpg'));
        }
    }
@endphp

<div class="login-success-wrapper">

    <div class="login-success-card">

        <div class="login-success-content">

            @if (session('status'))
                <div class="alert alert-success session-alert" role="alert">
                    <i class="fas fa-check-circle me-1"></i>
                    {{ session('status') }}
                </div>
            @endif

            <div class="success-icon-box">
                <i class="fas fa-check"></i>
            </div>

            <h2 class="login-success-title">
                {{ __('home.login_successful') }}
            </h2>

            <p class="login-success-subtitle">
                {{ __('home.login_successful_description') }}
            </p>

            <div class="success-user-box">

                <img
                    src="{{ $userImage }}"
                    alt="{{ __('home.user_image') }}"
                    class="success-user-avatar">

                <div>
                    <p class="success-user-name">
                        {{ Auth::user()->name }}
                    </p>

                    <p class="success-user-role">
                        <i class="fas fa-user-shield me-1"></i>
                        {{ __('home.role_account', ['role' => $userRole]) }}
                    </p>
                </div>

            </div>

            <div class="success-info-grid">

                <div class="success-info-item">
                    <i class="fas fa-shield-alt"></i>
                    <h6>{{ __('home.secure_access') }}</h6>
                    <p>{{ __('home.your_session_is_protected') }}</p>
                </div>

                <div class="success-info-item">
                    <i class="fas fa-prescription-bottle-alt"></i>
                    <h6>{{ __('home.pharmacy_system') }}</h6>
                    <p>{{ __('home.manage_services_safely') }}</p>
                </div>

                <div class="success-info-item">
                    <i class="fas fa-user-check"></i>
                    <h6>{{ __('home.account_verified') }}</h6>
                    <p>{{ __('home.role_based_access_enabled') }}</p>
                </div>

            </div>

            <div class="success-actions">

                <a href="{{ $dashboardRoute }}" class="success-btn-primary">
                    <i class="fas fa-home me-1"></i>
                    {{ __('home.go_to_dashboard') }}
                </a>

                <a href="{{ route('logout') }}"
                   class="success-btn-danger"
                   onclick="event.preventDefault(); document.getElementById('home-logout-form').submit();">
                    <i class="fas fa-sign-out-alt me-1"></i>
                    {{ __('home.logout') }}
                </a>

                <form id="home-logout-form"
                      action="{{ route('logout') }}"
                      method="POST"
                      class="d-none">
                    @csrf
                </form>

            </div>

        </div>

    </div>

</div>

@endsection


