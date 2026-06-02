@extends('layouts.app')

@section('title')
    {{ __('home.dashboard') }}
@endsection

@section('content')

<style>
    .dashboard-wrapper {
        min-height: calc(100vh - 140px);
        padding: 25px 18px;
        background: linear-gradient(135deg, #ecfdf5 0%, #ffffff 45%, #dcfce7 100%);
    }

    .dashboard-hero {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        border-radius: 24px;
        padding: 26px 30px;
        box-shadow: 0 16px 35px rgba(6, 78, 59, 0.25);
        margin-bottom: 28px;
        position: relative;
        overflow: hidden;
    }

    .dashboard-hero::before {
        content: "";
        position: absolute;
        width: 190px;
        height: 190px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.12);
        top: -70px;
        right: -55px;
    }

    .dashboard-hero::after {
        content: "";
        position: absolute;
        width: 130px;
        height: 130px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.10);
        bottom: -45px;
        left: -35px;
    }

    .dashboard-hero-content {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        flex-wrap: wrap;
    }

    .dashboard-title-box h2 {
        font-size: 30px;
        font-weight: 800;
        margin: 0 0 7px;
        letter-spacing: 0.4px;
    }

    .dashboard-title-box p {
        margin: 0;
        color: rgba(255, 255, 255, 0.84);
        font-size: 15px;
        font-weight: 600;
    }

    .dashboard-badge {
        background: rgba(255, 255, 255, 0.17);
        border: 1px solid rgba(255, 255, 255, 0.22);
        padding: 10px 16px;
        border-radius: 25px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #ffffff;
    }

    .dashboard-marquee-box {
        width: 100%;
        overflow: hidden;
        background: #ffffff;
        border-radius: 18px;
        border: 1px solid rgba(6, 95, 70, 0.14);
        box-shadow: 0 10px 25px rgba(6, 78, 59, 0.12);
        margin-bottom: 28px;
        padding: 13px 0;
    }

    .dashboard-marquee-text {
        display: inline-block;
        white-space: nowrap;
        color: #064e3b;
        font-size: 22px;
        font-weight: 800;
        letter-spacing: 1px;
        animation: dashboardScroll 15s linear infinite;
        padding-left: 100%;
    }

    .dashboard-marquee-text i {
        color: #065f46;
    }

    @keyframes dashboardScroll {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    .chart-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 24px;
        align-items: stretch;
    }

    .chart-card {
        background: #ffffff;
        border-radius: 24px;
        padding: 22px;
        box-shadow: 0 14px 35px rgba(6, 78, 59, 0.13);
        border: 1px solid rgba(6, 95, 70, 0.12);
        min-height: 420px;
        transition: all 0.25s ease;
    }

    .chart-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 45px rgba(6, 78, 59, 0.18);
    }

    .chart-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 18px;
        padding-bottom: 14px;
        border-bottom: 1px solid #d1fae5;
    }

    .chart-card-title {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 0;
        font-size: 18px;
        font-weight: 800;
        color: #022c22;
    }

    .chart-icon {
        width: 42px;
        height: 42px;
        border-radius: 14px;
        background: linear-gradient(135deg, #065f46, #022c22);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 8px 18px rgba(6, 78, 59, 0.22);
    }

    .chart-status-badge {
        background: #d1fae5;
        color: #064e3b;
        border-radius: 20px;
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 800;
        border: 1px solid rgba(6, 95, 70, 0.16);
    }

    .quick-info-row {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
        margin-bottom: 26px;
    }

    .quick-info-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 18px;
        box-shadow: 0 10px 25px rgba(6, 78, 59, 0.11);
        border: 1px solid rgba(6, 95, 70, 0.12);
        display: flex;
        align-items: center;
        gap: 14px;
        transition: all 0.25s ease;
    }

    .quick-info-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.15);
    }

    .quick-info-icon {
        width: 48px;
        height: 48px;
        border-radius: 16px;
        background: linear-gradient(135deg, #065f46, #022c22);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        box-shadow: 0 8px 18px rgba(6, 78, 59, 0.20);
    }

    .quick-info-card h6 {
        margin: 0;
        color: #022c22;
        font-weight: 800;
        font-size: 15px;
    }

    .quick-info-card p {
        margin: 3px 0 0;
        color: #64748b;
        font-size: 13px;
        font-weight: 600;
    }

    @media (max-width: 992px) {
        .chart-grid {
            grid-template-columns: 1fr;
        }

        .quick-info-row {
            grid-template-columns: 1fr;
        }

        .dashboard-title-box h2 {
            font-size: 24px;
        }
    }

    @media (max-width: 576px) {
        .dashboard-wrapper {
            padding: 18px 10px;
        }

        .dashboard-hero {
            padding: 22px 18px;
        }

        .dashboard-marquee-text {
            font-size: 18px;
        }

        .chart-card {
            padding: 16px;
            min-height: auto;
        }
    }
</style>

<div class="dashboard-wrapper">

    <div class="dashboard-hero">
        <div class="dashboard-hero-content">

            <div class="dashboard-title-box">
                <h2>
                    <i class="fas fa-chart-line me-2"></i>
                    {{ __('home.orders_dashboard') }}
                </h2>

                <p>
                    {{ __('home.orders_dashboard_description') }}
                </p>
            </div>

            <div class="dashboard-badge">
                <i class="fas fa-user-shield"></i>
                {{ Auth::user()->name ?? __('home.user') }}
            </div>

        </div>
    </div>

    <div class="dashboard-marquee-box">
        <div class="dashboard-marquee-text">
            <i class="fas fa-prescription-bottle-alt"></i>
            {{ __('home.welcome_orders_charts_dashboard') }}
            <i class="fas fa-chart-pie"></i>
        </div>
    </div>

    <div class="quick-info-row">

        <div class="quick-info-card">
            <div class="quick-info-icon">
                <i class="fas fa-shopping-cart"></i>
            </div>

            <div>
                <h6>{{ __('home.order_tracking') }}</h6>
                <p>{{ __('home.monitor_all_order_statuses') }}</p>
            </div>
        </div>

        <div class="quick-info-card">
            <div class="quick-info-icon">
                <i class="fas fa-chart-bar"></i>
            </div>

            <div>
                <h6>{{ __('home.bar_chart') }}</h6>
                <p>{{ __('home.compare_order_progress') }}</p>
            </div>
        </div>

        <div class="quick-info-card">
            <div class="quick-info-icon">
                <i class="fas fa-chart-pie"></i>
            </div>

            <div>
                <h6>{{ __('home.pie_chart') }}</h6>
                <p>{{ __('home.analyze_status_percentage') }}</p>
            </div>
        </div>

    </div>

    <div class="chart-grid">

        <div class="chart-card">
            <div class="chart-card-header">
                <h5 class="chart-card-title">
                    <span class="chart-icon">
                        <i class="fas fa-chart-bar"></i>
                    </span>
                    {{ __('home.orders_status_bar_chart') }}
                </h5>

                <span class="chart-status-badge">
                    {{ __('home.live_report') }}
                </span>
            </div>

            @include('statistics.statusbarchart')
        </div>

        <div class="chart-card">
            <div class="chart-card-header">
                <h5 class="chart-card-title">
                    <span class="chart-icon">
                        <i class="fas fa-chart-pie"></i>
                    </span>
                    {{ __('home.orders_status_pie_chart') }}
                </h5>

                <span class="chart-status-badge">
                    {{ __('home.analytics') }}
                </span>
            </div>

            @include('statistics.statuspiechart')
        </div>

    </div>

</div>

@endsection


