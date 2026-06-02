@php
    $rtlLocales = ['ps', 'fa', 'ar'];
    $isRtl = in_array(app()->getLocale(), $rtlLocales);
@endphp

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('dist/img/PharmacyLogo.png') }}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <title>{{ __('passwords.pharmacy_system') }} | {{ __('passwords.login') }}</title>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #ecfdf5 0%, #ffffff 45%, #dcfce7 100%);
            overflow-x: hidden;
        }

        html[dir="rtl"] body {
            direction: rtl;
            text-align: right;
        }

        html[dir="ltr"] body {
            direction: ltr;
            text-align: left;
        }

        .login-page-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 14px;
            position: relative;
        }

        .login-page-wrapper::before {
            content: "";
            position: absolute;
            width: 360px;
            height: 360px;
            border-radius: 50%;
            background: rgba(6, 78, 59, 0.14);
            top: -130px;
            left: -120px;
        }

        .login-page-wrapper::after {
            content: "";
            position: absolute;
            width: 420px;
            height: 420px;
            border-radius: 50%;
            background: rgba(5, 150, 105, 0.12);
            bottom: -170px;
            right: -140px;
        }

        .login-card {
            width: 100%;
            max-width: 440px;
            border: none;
            border-radius: 28px;
            overflow: hidden;
            background: #ffffff;
            box-shadow: 0 24px 70px rgba(6, 78, 59, 0.26);
            position: relative;
            z-index: 2;
        }

        .login-card-header {
            background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
            color: #ffffff;
            padding: 30px 28px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .login-card-header::before {
            content: "";
            position: absolute;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.13);
            top: -60px;
            right: -35px;
        }

        .login-logo-box {
            width: 86px;
            height: 86px;
            border-radius: 50%;
            background: #ffffff;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.22);
            position: relative;
            z-index: 2;
        }

        .login-logo-box img {
            width: 62px;
            height: 62px;
            object-fit: contain;
        }

        .login-card-header h2 {
            margin: 0;
            font-size: 28px;
            font-weight: 900;
            letter-spacing: 0.4px;
            position: relative;
            z-index: 2;
        }

        .login-card-header p {
            margin: 7px 0 0;
            font-size: 14px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.84);
            position: relative;
            z-index: 2;
        }

        .login-card-body {
            padding: 30px 28px;
            background: linear-gradient(135deg, #ffffff 0%, #f0fdf4 100%);
        }

        .login-alert {
            border: none;
            border-radius: 16px;
            font-weight: 700;
            padding: 13px 15px;
        }

        .login-form-label {
            color: #022c22;
            font-weight: 900;
            font-size: 14px;
            margin-bottom: 7px;
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .login-form-label i {
            color: #065f46;
        }

        .login-input-box {
            position: relative;
            margin-bottom: 18px;
        }

        .login-input-box i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #065f46;
            font-size: 15px;
            z-index: 2;
        }

        html[dir="rtl"] .login-input-box i {
            left: auto;
            right: 16px;
        }

        .login-input-box .form-control {
            height: 48px;
            border-radius: 15px;
            border: 1px solid rgba(6, 95, 70, 0.22);
            padding-left: 44px;
            color: #022c22;
            font-weight: 700;
            box-shadow: none;
            transition: all 0.25s ease;
        }

        html[dir="rtl"] .login-input-box .form-control {
            padding-left: 12px;
            padding-right: 44px;
        }

        .login-input-box .form-control:focus {
            border-color: #065f46;
            box-shadow: 0 0 0 0.18rem rgba(6, 95, 70, 0.16);
        }

        .login-input-box .form-control::placeholder {
            color: #8aa39a;
            font-weight: 600;
        }

        .remember-box {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 16px;
            padding: 12px 15px;
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 20px;
        }

        .remember-box .form-check-input {
            margin: 0;
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .remember-box .form-check-input:checked {
            background-color: #065f46;
            border-color: #065f46;
        }

        .remember-box label {
            color: #064e3b;
            font-weight: 800;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-login {
            width: 100%;
            height: 48px;
            border: none;
            border-radius: 24px;
            background: linear-gradient(90deg, #065f46, #022c22);
            color: #ffffff;
            font-weight: 900;
            box-shadow: 0 12px 28px rgba(6, 78, 59, 0.32);
            transition: all 0.25s ease;
        }

        .btn-login:hover {
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 16px 36px rgba(6, 78, 59, 0.42);
            background: linear-gradient(90deg, #047857, #064e3b);
        }

        .language-box {
            margin-top: 22px;
            text-align: center;
        }

        .btn-language {
            border: 1px solid rgba(6, 95, 70, 0.24);
            color: #064e3b;
            background: #dcfce7;
            border-radius: 24px;
            padding: 10px 20px;
            font-weight: 900;
            box-shadow: 0 8px 20px rgba(6, 78, 59, 0.14);
            transition: all 0.25s ease;
        }

        .btn-language:hover {
            background: #bbf7d0;
            color: #022c22;
            transform: translateY(-2px);
        }

        .dropdown-menu {
            border: none;
            border-radius: 18px;
            padding: 9px;
            box-shadow: 0 16px 38px rgba(6, 78, 59, 0.20);
        }

        .dropdown-item {
            border-radius: 12px;
            font-weight: 800;
            padding: 9px 14px;
            color: #334155;
        }

        .dropdown-item:hover {
            background: #dcfce7;
            color: #064e3b;
        }

        .login-footer-text {
            margin-top: 18px;
            text-align: center;
            color: #64748b;
            font-size: 13px;
            font-weight: 700;
        }

        .login-footer-text i {
            color: #065f46;
        }

        @media (max-width: 576px) {
            .login-card-header {
                padding: 26px 20px;
            }

            .login-card-body {
                padding: 24px 20px;
            }

            .login-card-header h2 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

<div class="login-page-wrapper">

    <div class="login-card">

        <div class="login-card-header">

            <div class="login-logo-box">
                <img src="{{ asset('dist/img/PharmacyLogo.png') }}" alt="{{ __('passwords.pharmacy_logo') }}">
            </div>

            <h2>
                {{ __('passwords.login') }}
            </h2>

            <p>
                {{ __('passwords.welcome_back') }}
            </p>

        </div>

        <div class="login-card-body">

            {{-- ERROR --}}
            @if(session('error'))
                <div class="alert alert-danger login-alert text-center">
                    <i class="fas fa-exclamation-circle me-1"></i>
                    {{ session('error') }}
                </div>
            @endif

            {{-- LOGIN FORM --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- EMAIL --}}
                <label class="login-form-label">
                    <i class="fas fa-envelope"></i>
                    {{ __('passwords.email_address') }}
                </label>

                <div class="login-input-box">
                    <i class="fas fa-at"></i>

                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="{{ __('passwords.email_address') }}"
                           value="{{ old('email') }}"
                           required
                           autofocus>
                </div>

                {{-- PASSWORD --}}
                <label class="login-form-label">
                    <i class="fas fa-lock"></i>
                    {{ __('passwords.password') }}
                </label>

                <div class="login-input-box">
                    <i class="fas fa-key"></i>

                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="{{ __('passwords.password') }}"
                           required>
                </div>

                {{-- REMEMBER --}}
                <div class="remember-box">
                    <input class="form-check-input"
                           type="checkbox"
                           name="remember"
                           id="remember"
                           {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('passwords.remember_me') }}
                    </label>
                </div>

                {{-- LOGIN BUTTON --}}
                <button type="submit" class="btn btn-login">
                    <i class="fas fa-sign-in-alt me-1"></i>
                    {{ __('passwords.login') }}
                </button>
            </form>

            {{-- LANGUAGE DROPDOWN --}}
            <div class="language-box">

                <div class="dropdown">
                    <button class="btn btn-language dropdown-toggle"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                        <i class="fas fa-globe me-1"></i>
                        {{ __('passwords.language') }}
                    </button>

<ul class="dropdown-menu dropdown-menu-end text-center">
    <li>
        <a class="dropdown-item" href="{{ url('/lang/en') }}">
            🇺🇸 English
        </a>
    </li>

    <li>
        <a class="dropdown-item" href="{{ url('/lang/fa') }}">
            🇦🇫 پښتو
        </a>
    </li>

    <li>
        <a class="dropdown-item" href="{{ url('/lang/ps') }}">
            🇦🇫 دری
        </a>
    </li>
</ul>
                </div>

            </div>

            <div class="login-footer-text">
                <i class="fas fa-shield-alt me-1"></i>
                {{ __('passwords.secure_login') }}
            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>