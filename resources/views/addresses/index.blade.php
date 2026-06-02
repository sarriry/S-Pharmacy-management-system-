@extends('layouts.app')

@section('title')
    {{ __('addresses.client_addresses') }}
@endsection

@section('content')

<style>
    :root {
        --dark-green: #064e3b;
        --main-green: #047857;
        --soft-green: #d1fae5;
        --light-green: #ecfdf5;
        --border-green: #a7f3d0;
        --white: #ffffff;
        --text-dark: #1f2937;
        --text-muted: #4b5563;
    }

    .client-address-page-wrapper {
        min-height: calc(100vh - 150px);
        padding: 24px 14px;
        background: linear-gradient(135deg, var(--light-green) 0%, var(--white) 55%, var(--soft-green) 100%);
    }

    .client-address-hero {
        background: linear-gradient(90deg, var(--dark-green) 0%, var(--main-green) 100%);
        color: var(--white);
        border-radius: 24px;
        padding: 26px 30px;
        box-shadow: 0 16px 35px rgba(6, 78, 59, 0.25);
        margin-bottom: 26px;
        position: relative;
        overflow: hidden;
    }

    .client-address-hero::before {
        content: "";
        position: absolute;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.13);
        top: -70px;
        right: -55px;
    }

    .client-address-hero-content {
        position: relative;
        z-index: 2;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
    }

    .client-address-title-box h2 {
        margin: 0 0 7px;
        font-size: 30px;
        font-weight: 900;
        letter-spacing: 0.4px;
    }

    .client-address-title-box p {
        margin: 0;
        color: rgba(255, 255, 255, 0.84);
        font-size: 15px;
        font-weight: 600;
    }

    .client-address-hero-badge {
        background: rgba(255, 255, 255, 0.17);
        border: 1px solid rgba(255, 255, 255, 0.22);
        padding: 10px 16px;
        border-radius: 25px;
        font-weight: 800;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .client-address-table-card {
        background: var(--white);
        border-radius: 24px;
        padding: 22px;
        border: 1px solid rgba(6, 78, 59, 0.1);
        box-shadow: 0 14px 35px rgba(6, 78, 59, 0.13);
        overflow-x: auto;
    }

    .client-address-table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 14px;
        flex-wrap: wrap;
        padding-bottom: 16px;
        margin-bottom: 18px;
        border-bottom: 1px solid #edf2f7;
    }

    .client-address-table-header h5 {
        margin: 0;
        color: var(--dark-green);
        font-size: 19px;
        font-weight: 900;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .client-address-table-header span {
        background: var(--soft-green);
        color: var(--dark-green);
        border-radius: 20px;
        padding: 7px 13px;
        font-size: 12px;
        font-weight: 900;
    }

    .client-address-table-card table.dataTable {
        width: 100% !important;
        border-collapse: separate !important;
        border-spacing: 0 8px !important;
    }

    .client-address-table-card table.dataTable thead th {
        background: linear-gradient(90deg, var(--dark-green), var(--main-green)) !important;
        color: var(--white) !important;
        border: none !important;
        padding: 14px 10px !important;
        font-weight: 900 !important;
        text-align: center !important;
    }

    .client-address-table-card table.dataTable tbody tr {
        background: var(--soft-green);
        box-shadow: 0 5px 18px rgba(6, 78, 59, 0.08);
        transition: all 0.25s ease;
    }

    .client-address-table-card table.dataTable tbody tr:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 24px rgba(6, 78, 59, 0.14);
    }

    .client-address-table-card table.dataTable tbody td {
        vertical-align: middle !important;
        border-top: 1px solid #e6f2ec !important;
        border-bottom: 1px solid #e6f2ec !important;
        padding: 13px 10px !important;
        text-align: center;
        color: var(--dark-green);
    }

    .client-address-table-card .form-control,
    .dataTables_filter input {
        background-color: var(--light-green);
        color: var(--dark-green);
        border: 1px solid var(--border-green);
        border-radius: 12px;
        padding: 8px 10px;
    }

    .client-address-table-card .form-control:focus,
    .dataTables_filter input:focus {
        border-color: var(--main-green) !important;
        box-shadow: 0 0 0 0.2rem rgba(4, 120, 87, 0.18) !important;
        color: var(--dark-green);
        outline: none !important;
    }

    .btn-dark-green {
        background: linear-gradient(135deg, var(--dark-green), var(--main-green));
        border: none;
        color: var(--white);
        border-radius: 12px;
        padding: 10px 22px;
        font-weight: 700;
        transition: 0.2s ease;
    }

    .btn-dark-green:hover {
        transform: translateY(-1px);
        box-shadow: 0 10px 22px rgba(4, 120, 87, 0.28);
        color: var(--white);
    }

    @media (max-width: 768px) {
        .client-address-hero {
            padding: 22px 18px;
        }

        .client-address-title-box h2 {
            font-size: 24px;
        }

        .client-address-table-card {
            padding: 16px;
        }
    }
</style>

<section class="client-address-page-wrapper">
    <div class="container-fluid">

        <div class="client-address-hero">
            <div class="client-address-hero-content">

                <div class="client-address-title-box">
                    <h2>
                        <i class="fas fa-map-marked-alt me-2"></i>
                        {{ __('addresses.client_addresses') }}
                    </h2>

                    <p>
                        {{ __('addresses.client_addresses_description') }}
                    </p>
                </div>

                <div class="client-address-hero-badge">
                    <i class="fas fa-user-shield"></i>
                    {{ auth()->user()->name ?? __('addresses.user') }}
                </div>

            </div>
        </div>

        <div class="client-address-table-card">

            <div class="client-address-table-header">
                <h5>
                    <i class="fas fa-table"></i>
                    {{ __('addresses.client_addresses_table') }}
                </h5>

                <span>
                    <i class="fas fa-database me-1"></i>
                    {{ __('addresses.live_data') }}
                </span>
            </div>

            {{ $dataTable->table(['class' => 'dataTable table table-bordered align-middle']) }}

        </div>

    </div>
</section>

@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush