@extends('layouts.app')

@section('title')
    {{ __('area.areas_management') }}
@endsection

@section('content')

<style>
    :root {
        --dark-green: #064e3b;
        --deep-green: #022c22;
        --main-green: #047857;
        --medium-green: #059669;
        --soft-green: #d1fae5;
        --light-green: #ecfdf5;
        --border-green: #a7f3d0;
        --white: #ffffff;
        --text-dark: #1f2937;
        --text-muted: #64748b;
        --danger-bg: #fee2e2;
        --danger-text: #991b1b;
    }

    .area-page-wrapper {
        min-height: calc(100vh - 150px);
        padding: 24px 14px;
        background: linear-gradient(135deg, var(--light-green) 0%, var(--white) 55%, #f0fdf4 100%);
    }

    .area-hero {
        background: linear-gradient(90deg, var(--deep-green) 0%, var(--dark-green) 55%, var(--main-green) 100%);
        color: var(--white);
        border-radius: 24px;
        padding: 26px 30px;
        box-shadow: 0 16px 35px rgba(6, 78, 59, 0.25);
        margin-bottom: 26px;
        position: relative;
        overflow: hidden;
    }

    .area-hero::before {
        content: "";
        position: absolute;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.13);
        top: -70px;
        right: -55px;
    }

    .area-hero-content {
        position: relative;
        z-index: 2;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
    }

    .area-title-box h2 {
        margin: 0 0 7px;
        font-size: 30px;
        font-weight: 900;
        letter-spacing: 0.4px;
        color: var(--white);
    }

    .area-title-box p {
        margin: 0;
        color: rgba(255, 255, 255, 0.86);
        font-size: 15px;
        font-weight: 600;
    }

    .area-hero-badge {
        background: rgba(255, 255, 255, 0.17);
        border: 1px solid rgba(255, 255, 255, 0.24);
        color: var(--white);
        padding: 10px 16px;
        border-radius: 25px;
        font-weight: 800;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .area-alert {
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

    .area-alert.alert-success {
        background: var(--soft-green);
        color: var(--dark-green);
        border: 1px solid var(--border-green);
    }

    .area-alert.alert-danger {
        background: var(--danger-bg);
        color: var(--danger-text);
        border: 1px solid #fecaca;
    }

    .area-alert ul {
        margin-bottom: 0;
    }

    .area-alert .btn-close {
        box-shadow: none;
        opacity: 0.85;
    }

    .area-actions-card {
        background: var(--white);
        border-radius: 22px;
        padding: 18px 20px;
        margin-bottom: 22px;
        border: 1px solid rgba(6, 78, 59, 0.10);
        box-shadow: 0 12px 28px rgba(6, 78, 59, 0.11);
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 14px;
        flex-wrap: wrap;
    }

    .area-actions-title {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .area-actions-icon {
        width: 48px;
        height: 48px;
        border-radius: 16px;
        background: linear-gradient(135deg, var(--dark-green), var(--main-green));
        color: var(--white);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
        box-shadow: 0 8px 18px rgba(4, 120, 87, 0.24);
    }

    .area-actions-title h5 {
        margin: 0;
        color: var(--dark-green);
        font-size: 18px;
        font-weight: 900;
    }

    .area-actions-title p {
        margin: 3px 0 0;
        color: var(--text-muted);
        font-size: 13px;
        font-weight: 600;
    }

    .btn-add-area {
        background: linear-gradient(90deg, var(--dark-green), var(--main-green));
        color: var(--white) !important;
        border: none;
        border-radius: 25px;
        padding: 11px 22px;
        font-weight: 900;
        box-shadow: 0 10px 22px rgba(4, 120, 87, 0.24);
        transition: all 0.25s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-add-area:hover {
        color: var(--white) !important;
        transform: translateY(-2px);
        box-shadow: 0 14px 30px rgba(4, 120, 87, 0.33);
    }

    .area-table-card {
        background: var(--white);
        border-radius: 24px;
        padding: 22px;
        border: 1px solid rgba(6, 78, 59, 0.10);
        box-shadow: 0 14px 35px rgba(6, 78, 59, 0.13);
        overflow-x: auto;
    }

    .area-table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 14px;
        flex-wrap: wrap;
        padding-bottom: 16px;
        margin-bottom: 18px;
        border-bottom: 1px solid var(--border-green);
    }

    .area-table-header h5 {
        margin: 0;
        color: var(--dark-green);
        font-size: 19px;
        font-weight: 900;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .area-table-header h5 i {
        color: var(--main-green);
    }

    .area-table-header span {
        background: var(--soft-green);
        color: var(--dark-green);
        border: 1px solid var(--border-green);
        border-radius: 20px;
        padding: 7px 13px;
        font-size: 12px;
        font-weight: 900;
    }

    #areas-table {
        width: 100% !important;
        border-collapse: separate !important;
        border-spacing: 0 8px !important;
    }

    #areas-table thead th {
        background: linear-gradient(90deg, var(--deep-green), var(--dark-green), var(--main-green)) !important;
        color: var(--white) !important;
        border: none !important;
        padding: 14px 10px !important;
        font-weight: 900 !important;
        text-align: center !important;
        white-space: nowrap;
    }

    #areas-table tbody tr {
        background: var(--white) !important;
        box-shadow: 0 5px 18px rgba(6, 78, 59, 0.08);
        transition: all 0.25s ease;
    }

    #areas-table tbody tr:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 24px rgba(6, 78, 59, 0.14);
    }

    #areas-table tbody tr:hover td {
        background: #f0fdf4 !important;
    }

    #areas-table tbody td {
        vertical-align: middle !important;
        border-top: 1px solid #e5f7ef !important;
        border-bottom: 1px solid #e5f7ef !important;
        padding: 13px 10px !important;
        color: var(--dark-green) !important;
        font-weight: 700;
        background: var(--white) !important;
        text-align: center;
    }

    #areas-table tbody td:first-child {
        border-left: 1px solid #e5f7ef !important;
        border-radius: 14px 0 0 14px;
    }

    #areas-table tbody td:last-child {
        border-right: 1px solid #e5f7ef !important;
        border-radius: 0 14px 14px 0;
    }

    .dataTables_wrapper {
        color: var(--dark-green) !important;
        font-weight: 600;
    }

    .dataTables_length label,
    .dataTables_filter label,
    .dataTables_info {
        color: var(--dark-green) !important;
        font-weight: 700;
    }

    .dataTables_length select {
        border: 1px solid var(--border-green) !important;
        border-radius: 12px !important;
        padding: 6px 28px 6px 10px !important;
        color: var(--dark-green) !important;
        background-color: var(--white) !important;
        font-weight: 700;
        outline: none !important;
    }

    .dataTables_filter input {
        border: 1px solid var(--border-green) !important;
        border-radius: 22px !important;
        padding: 8px 15px !important;
        outline: none !important;
        font-weight: 700;
        color: var(--dark-green) !important;
        background-color: var(--white) !important;
    }

    .dataTables_filter input:focus,
    .dataTables_length select:focus {
        border-color: var(--main-green) !important;
        box-shadow: 0 0 0 0.18rem rgba(4, 120, 87, 0.15) !important;
    }

    .dataTables_filter input::placeholder {
        color: #6b7280 !important;
        opacity: 1;
    }

    .dataTables_paginate .paginate_button {
        border-radius: 12px !important;
        border: 1px solid var(--border-green) !important;
        color: var(--dark-green) !important;
        background: var(--white) !important;
        font-weight: 800 !important;
        margin: 0 3px !important;
    }

    .dataTables_paginate .paginate_button.current,
    .dataTables_paginate .paginate_button.current:hover {
        background: linear-gradient(90deg, var(--dark-green), var(--main-green)) !important;
        color: var(--white) !important;
        border: 1px solid var(--main-green) !important;
    }

    .dataTables_paginate .paginate_button:hover {
        background: var(--soft-green) !important;
        color: var(--dark-green) !important;
        border: 1px solid var(--main-green) !important;
    }

    .dt-buttons .btn {
        margin-right: 6px;
        margin-bottom: 6px;
        border-radius: 12px !important;
        font-weight: 800 !important;
    }

    .area-table-card .btn-primary,
    .area-table-card .btn-info {
        background: linear-gradient(90deg, var(--dark-green), var(--main-green)) !important;
        border: none !important;
        color: var(--white) !important;
    }

    .area-table-card .btn-success {
        background: linear-gradient(90deg, #047857, #10b981) !important;
        border: none !important;
        color: var(--white) !important;
    }

    .area-table-card .btn-warning {
        background: #f59e0b !important;
        border: none !important;
        color: #ffffff !important;
    }

    .area-table-card .btn-danger {
        background: #dc2626 !important;
        border: none !important;
        color: #ffffff !important;
    }

    .area-table-card .form-control,
    .area-table-card .form-select {
        background-color: var(--white) !important;
        color: var(--dark-green) !important;
        border: 1px solid var(--border-green) !important;
        border-radius: 12px !important;
        font-weight: 700;
    }

    .area-table-card .form-control:focus,
    .area-table-card .form-select:focus {
        background-color: var(--white) !important;
        color: var(--dark-green) !important;
        border-color: var(--main-green) !important;
        box-shadow: 0 0 0 0.18rem rgba(4, 120, 87, 0.15) !important;
    }

    @media (max-width: 768px) {
        .area-hero {
            padding: 22px 18px;
        }

        .area-title-box h2 {
            font-size: 24px;
        }

        .area-table-card {
            padding: 16px;
        }

        .area-actions-card {
            justify-content: center;
            text-align: center;
        }

        .area-actions-title {
            justify-content: center;
        }
    }
</style>

<section class="area-page-wrapper">

    <div class="container-fluid">

        <div class="area-hero">

            <div class="area-hero-content">

                <div class="area-title-box">
                    <h2>
                        <i class="fas fa-map-marked-alt me-2"></i>
                        {{ __('area.areas_management') }}
                    </h2>

                    <p>
                        {{ __('area.areas_management_description') }}
                    </p>
                </div>

                <div class="area-hero-badge">
                    <i class="fas fa-user-shield"></i>
                    {{ auth()->user()->name ?? __('area.user') }}
                </div>

            </div>

        </div>

        {{-- ERROR MESSAGE --}}
        @if (session('error'))
            <div id="alert-message-error" class="alert area-alert alert-danger my-4 alert-dismissible">
                <div>
                    <i class="fas fa-exclamation-circle me-1"></i>
                    {{ session('error') }}
                </div>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="{{ __('area.close') }}">
                </button>
            </div>
        @endif

        {{-- VALIDATION ERRORS --}}
        @if ($errors->any())
            <div class="alert area-alert alert-danger my-4 alert-dismissible">
                <div>
                    <strong>
                        <i class="fas fa-exclamation-triangle me-1"></i>
                        {{ __('area.please_fix_errors') }}
                    </strong>

                    <ul class="mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="{{ __('area.close') }}">
                </button>
            </div>
        @endif

        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))
            <div id="alert-message-success" class="alert area-alert alert-success my-4 alert-dismissible">
                <div>
                    <i class="fas fa-check-circle me-1"></i>
                    {{ session('success') }}
                </div>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="{{ __('area.close') }}">
                </button>
            </div>
        @endif

        <div class="area-actions-card">

            <div class="area-actions-title">

                <div class="area-actions-icon">
                    <i class="fas fa-location-dot"></i>
                </div>

                <div>
                    <h5>{{ __('area.area_records') }}</h5>
                    <p>{{ __('area.area_records_description') }}</p>
                </div>

            </div>

            <button type="button"
                    class="btn btn-add-area"
                    onclick="createmodalShow(event)"
                    data-bs-toggle="modal"
                    data-bs-target="#create">

                <i class="fas fa-plus-circle"></i>
                {{ __('area.create_new_area') }}

            </button>

        </div>

        <div class="area-table-card">

            <div class="area-table-header">
                <h5>
                    <i class="fas fa-table"></i>
                    {{ __('area.areas_table') }}
                </h5>

                <span>
                    <i class="fas fa-database me-1"></i>
                    {{ __('area.live_data') }}
                </span>
            </div>

            {{ $dataTable->table() }}

        </div>

    </div>

    @include('area.create')
    @include('area.edit')
    @include('area.delete')

</section>

@endsection

@push('scripts')

    {{ $dataTable->scripts() }}

    <script>
        function editmodalShow(event) {
            const areaId = event.currentTarget.id;

            const editForm = document.getElementById('edit-form');
            const countrySelect = document.getElementById('countrySelect');
            const areaIdInput = document.getElementById('edit_areaId');
            const areaNameInput = document.getElementById('edit_areaName');
            const areaAddressInput = document.getElementById('edit_areaAddress');

            if (!areaId || !editForm) {
                return;
            }

            editForm.action = "{{ url('areas') }}/" + areaId;

            fetch("{{ url('areas') }}/" + areaId)
                .then(function (response) {
                    if (!response.ok) {
                        throw new Error('Failed to load area data.');
                    }

                    return response.json();
                })
                .then(function (data) {
                    const area = data.area && data.area.length > 0 ? data.area[0] : null;

                    if (!area) {
                        return;
                    }

                    if (areaIdInput) {
                        areaIdInput.value = area.id ?? '';
                    }

                    if (areaNameInput) {
                        areaNameInput.value = area.name ?? '';
                    }

                    if (areaAddressInput) {
                        areaAddressInput.value = area.address ?? '';
                    }

                    if (countrySelect) {
                        countrySelect.innerHTML = '';

                        if (Array.isArray(data.countries)) {
                            data.countries.forEach(function (country) {
                                const option = document.createElement('option');
                                option.value = country.id;
                                option.textContent = country.name;

                                if (country.id == area.country_id) {
                                    option.selected = true;
                                }

                                countrySelect.appendChild(option);
                            });
                        }
                    }
                })
                .catch(function (error) {
                    console.error('Area edit loading error:', error);
                });
        }

        function createmodalShow(event) {
            const createForm = document.getElementById('create-form');

            if (createForm) {
                createForm.reset();
            }
        }

        setTimeout(function () {
            if (window.jQuery) {
                $('.alert-success').fadeOut();
            } else {
                const successAlert = document.querySelector('.alert-success');

                if (successAlert) {
                    successAlert.style.display = 'none';
                }
            }
        }, Number(@json(session('timeout') ?? 3000)));
    </script>

@endpush