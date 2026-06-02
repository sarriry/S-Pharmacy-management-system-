<style>
    .main-footer {
        background:
            radial-gradient(circle at left, rgba(16, 185, 129, 0.28), transparent 32%),
            radial-gradient(circle at right, rgba(5, 150, 105, 0.22), transparent 34%),
            linear-gradient(90deg, #022c22 0%, #064e3b 45%, #065f46 100%) !important;
        color: #ffffff !important;
        border-top: 1px solid rgba(209, 250, 229, 0.35) !important;
        padding: 14px 22px;
        font-size: 14px;
        box-shadow: 0 -6px 22px rgba(6, 78, 59, 0.26);
    }

    .main-footer a {
        color: #ffffff !important;
        font-weight: 800;
        text-decoration: none;
    }

    .main-footer a:hover {
        color: #d1fae5 !important;
        text-decoration: underline;
    }

    .footer-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        flex-wrap: wrap;
    }

    .footer-left,
    .footer-right {
        display: flex;
        align-items: center;
        gap: 14px;
        flex-wrap: wrap;
    }

    .footer-badge {
        background: rgba(255, 255, 255, 0.14);
        color: #ffffff;
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border: 1px solid rgba(209, 250, 229, 0.35);
        box-shadow:
            0 8px 20px rgba(0, 0, 0, 0.14),
            inset 0 1px 0 rgba(255, 255, 255, 0.22);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
    }

    .footer-badge:hover {
        background: rgba(255, 255, 255, 0.18);
        border-color: rgba(209, 250, 229, 0.55);
    }

    .footer-system-name {
        font-weight: 900;
        letter-spacing: 0.3px;
        color: #ffffff;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.28);
    }

    @media (max-width: 576px) {
        .footer-content {
            justify-content: center;
            text-align: center;
        }

        .footer-left,
        .footer-right {
            justify-content: center;
        }
    }
</style>

@php
    $footerRoute = route('index');

    if (auth()->check() && auth()->user()->hasRole('client')) {
        $footerRoute = route('home');
    }
@endphp

<footer class="main-footer">

    <div class="footer-content">

        <div class="footer-left">

            <strong class="footer-system-name">
                &copy; {{ date('Y') }}
                <a href="{{ $footerRoute }}">
                    {{ __('partial.ahmadi_pharmacy_management_system') }}
                </a>
            </strong>

            <span class="footer-badge">
                {{ __('partial.secure_system') }}
            </span>

            <span class="footer-badge">
                {{ __('partial.data_protected') }}
            </span>

        </div>

        <div class="footer-right d-none d-sm-flex">

            <span class="footer-badge">
                {{ __('partial.pharmacy_care') }}
            </span>

        </div>

    </div>

</footer>