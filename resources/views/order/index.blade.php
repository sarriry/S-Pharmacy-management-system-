@extends('layouts.app')

@section('title')
    {{ __('orders.orders_management') }}
@endsection

@section('content')

<style>
    .orders-page-wrapper {
        min-height: calc(100vh - 150px);
        padding: 24px 14px;
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 55%, #ecfdf5 100%);
    }

    .orders-hero {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        border-radius: 24px;
        padding: 26px 30px;
        box-shadow: 0 16px 35px rgba(6, 78, 59, 0.25);
        margin-bottom: 26px;
        position: relative;
        overflow: hidden;
    }

    .orders-hero::before {
        content: "";
        position: absolute;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.13);
        top: -70px;
        right: -55px;
    }

    .orders-hero-content {
        position: relative;
        z-index: 2;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
    }

    .orders-title-box h2 {
        margin: 0 0 7px;
        font-size: 30px;
        font-weight: 900;
        letter-spacing: 0.4px;
    }

    .orders-title-box p {
        margin: 0;
        color: rgba(255, 255, 255, 0.84);
        font-size: 15px;
        font-weight: 600;
    }

    .orders-hero-badge {
        background: rgba(255, 255, 255, 0.17);
        border: 1px solid rgba(255, 255, 255, 0.22);
        padding: 10px 16px;
        border-radius: 25px;
        font-weight: 800;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .orders-alert {
        border: none;
        border-radius: 18px;
        padding: 15px 18px;
        font-weight: 700;
        box-shadow: 0 10px 24px rgba(6, 78, 59, 0.12);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .orders-alert.alert-success {
        background: #dcfce7;
        color: #064e3b;
    }

    .orders-alert.alert-danger {
        background: #fee2e2;
        color: #991b1b;
    }

    .orders-alert ul {
        margin-bottom: 0;
    }

    .orders-alert .btn-close {
        box-shadow: none;
    }

    .orders-actions-card {
        background: #ffffff;
        border-radius: 22px;
        padding: 18px 20px;
        margin-bottom: 22px;
        border: 1px solid rgba(6, 95, 70, 0.14);
        box-shadow: 0 12px 28px rgba(6, 78, 59, 0.11);
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 14px;
        flex-wrap: wrap;
    }

    .orders-actions-title {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .orders-actions-icon {
        width: 48px;
        height: 48px;
        border-radius: 16px;
        background: linear-gradient(135deg, #047857, #022c22);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
        box-shadow: 0 8px 18px rgba(6, 78, 59, 0.22);
    }

    .orders-actions-title h5 {
        margin: 0;
        color: #022c22;
        font-size: 18px;
        font-weight: 900;
    }

    .orders-actions-title p {
        margin: 3px 0 0;
        color: #64748b;
        font-size: 13px;
        font-weight: 600;
    }

    .btn-add-order {
        background: linear-gradient(90deg, #047857, #022c22);
        color: #ffffff !important;
        border: none;
        border-radius: 25px;
        padding: 11px 22px;
        font-weight: 900;
        box-shadow: 0 10px 22px rgba(6, 78, 59, 0.24);
        transition: all 0.25s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-add-order:hover {
        color: #ffffff !important;
        transform: translateY(-2px);
        background: linear-gradient(90deg, #059669, #064e3b);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.33);
    }

    .orders-table-card {
        background: #ffffff;
        border-radius: 24px;
        padding: 22px;
        border: 1px solid rgba(6, 95, 70, 0.14);
        box-shadow: 0 14px 35px rgba(6, 78, 59, 0.13);
        overflow-x: auto;
    }

    .orders-table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 14px;
        flex-wrap: wrap;
        padding-bottom: 16px;
        margin-bottom: 18px;
        border-bottom: 1px solid #d1fae5;
    }

    .orders-table-header h5 {
        margin: 0;
        color: #022c22;
        font-size: 19px;
        font-weight: 900;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .orders-table-header span {
        background: #dcfce7;
        color: #064e3b;
        border-radius: 20px;
        padding: 7px 13px;
        font-size: 12px;
        font-weight: 900;
    }

    .orders-table-card table.dataTable {
        width: 100% !important;
        border-collapse: separate !important;
        border-spacing: 0 8px !important;
    }

    .orders-table-card table.dataTable thead th {
        background: linear-gradient(90deg, #064e3b, #022c22) !important;
        color: #ffffff !important;
        border: none !important;
        padding: 14px 10px !important;
        font-weight: 900 !important;
        text-align: center !important;
    }

    .orders-table-card table.dataTable tbody tr {
        background: #ffffff;
        box-shadow: 0 5px 18px rgba(6, 78, 59, 0.08);
        transition: all 0.25s ease;
    }

    .orders-table-card table.dataTable tbody tr:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 24px rgba(6, 78, 59, 0.14);
    }

    .orders-table-card table.dataTable tbody td {
        vertical-align: middle !important;
        border-top: 1px solid #d1fae5 !important;
        border-bottom: 1px solid #d1fae5 !important;
        padding: 13px 10px !important;
        text-align: center;
        color: #022c22 !important;
        font-weight: 700 !important;
    }

    .dataTables_filter input {
        border: 1px solid rgba(6, 95, 70, 0.22) !important;
        border-radius: 22px !important;
        padding: 8px 15px !important;
        outline: none !important;
        font-weight: 600;
        color: #022c22 !important;
    }

    .dataTables_filter input:focus {
        border-color: #047857 !important;
        box-shadow: 0 0 0 0.18rem rgba(4, 120, 87, 0.16) !important;
    }

    .dt-buttons .btn {
        margin-right: 6px;
        margin-bottom: 6px;
    }

    @media (max-width: 768px) {
        .orders-hero {
            padding: 22px 18px;
        }

        .orders-title-box h2 {
            font-size: 24px;
        }

        .orders-table-card {
            padding: 16px;
        }

        .orders-actions-card {
            justify-content: center;
            text-align: center;
        }

        .orders-actions-title {
            justify-content: center;
        }
    }
</style>

<section class="orders-page-wrapper">

    <div class="container-fluid">

        <div class="orders-hero">

            <div class="orders-hero-content">

                <div class="orders-title-box">
                    <h2>
                        <i class="fas fa-shopping-cart me-2"></i>
                        {{ __('orders.orders_management') }}
                    </h2>

                    <p>
                        {{ __('orders.orders_management_description') }}
                    </p>
                </div>

                <div class="orders-hero-badge">
                    <i class="fas fa-user-shield"></i>
                    {{ auth()->user()->name ?? __('orders.user') }}
                </div>

            </div>

        </div>

        {{-- Error Message --}}
        @if (session('error'))
            <div id="alert-message" class="alert orders-alert alert-danger my-4 alert-dismissible">
                <div>
                    <i class="fas fa-exclamation-circle me-1"></i>
                    {{ session('error') }}
                </div>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="alert orders-alert alert-danger my-4 alert-dismissible">
                <div>
                    <strong>
                        <i class="fas fa-exclamation-triangle me-1"></i>
                        {{ __('orders.please_fix_errors') }}
                    </strong>

                    <ul class="mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Success Message --}}
        @if (session('success'))
            <div id="alert-message" class="alert orders-alert alert-success my-4 alert-dismissible">
                <div>
                    <i class="fas fa-check-circle me-1"></i>
                    {{ session('success') }}
                </div>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="orders-actions-card">

            <div class="orders-actions-title">

                <div class="orders-actions-icon">
                    <i class="fas fa-prescription-bottle-alt"></i>
                </div>

                <div>
                    <h5>{{ __('orders.order_records') }}</h5>
                    <p>{{ __('orders.order_records_description') }}</p>
                </div>

            </div>

            {{-- Create Order Button --}}
            <button type="button"
                    class="btn btn-add-order"
                    data-bs-toggle="modal"
                    data-bs-target="#createOrder">

                <i class="fas fa-plus-circle"></i>
                {{ __('orders.create_new_order') }}

            </button>

        </div>

        <div class="orders-table-card">

            <div class="orders-table-header">
                <h5>
                    <i class="fas fa-table"></i>
                    {{ __('orders.orders_table') }}
                </h5>

                <span>
                    <i class="fas fa-database me-1"></i>
                    {{ __('orders.live_data') }}
                </span>
            </div>

            {{ $dataTable->table() }}

        </div>

    </div>

    {{-- Includes --}}
    @include('order.create')
    @include('order.edit')
    @include('order.delete')
    @include('order.show')

</section>

@endsection

@push('scripts')

    {{ $dataTable->scripts() }}

    <script>
        setTimeout(function () {
            $('.alert-success').fadeOut();
        }, {{ session('timeout') ?? 3000 }});
    </script>

@endpush