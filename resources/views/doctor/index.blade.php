@extends('layouts.app')

@section('title')
    {{ __('doctor.doctors_management') }}
@endsection

@section('content')

<style>
    .doctor-page-wrapper {
        min-height: calc(100vh - 150px);
        padding: 24px 14px;
        background: linear-gradient(135deg, #ecfdf5 0%, #ffffff 55%, #dcfce7 100%);
    }

    .doctor-hero {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        border-radius: 24px;
        padding: 26px 30px;
        box-shadow: 0 16px 35px rgba(6, 78, 59, 0.25);
        margin-bottom: 26px;
        position: relative;
        overflow: hidden;
    }

    .doctor-hero::before {
        content: "";
        position: absolute;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.13);
        top: -70px;
        right: -55px;
    }

    .doctor-hero-content {
        position: relative;
        z-index: 2;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
    }

    .doctor-title-box h2 {
        margin: 0 0 7px;
        font-size: 30px;
        font-weight: 900;
        letter-spacing: 0.4px;
    }

    .doctor-title-box p {
        margin: 0;
        color: rgba(255, 255, 255, 0.84);
        font-size: 15px;
        font-weight: 600;
    }

    .doctor-hero-badge {
        background: rgba(255, 255, 255, 0.17);
        border: 1px solid rgba(255, 255, 255, 0.22);
        padding: 10px 16px;
        border-radius: 25px;
        font-weight: 800;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .doctor-alert {
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

    .doctor-alert.alert-success {
        background: #d1fae5;
        color: #064e3b;
    }

    .doctor-alert.alert-danger {
        background: #fee2e2;
        color: #991b1b;
    }

    .doctor-alert ul {
        margin-bottom: 0;
    }

    .doctor-alert .btn-close {
        box-shadow: none;
    }

    .doctor-actions-card {
        background: #ffffff;
        border-radius: 22px;
        padding: 18px 20px;
        margin-bottom: 22px;
        border: 1px solid rgba(6, 95, 70, 0.12);
        box-shadow: 0 12px 28px rgba(6, 78, 59, 0.11);
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 14px;
        flex-wrap: wrap;
    }

    .doctor-actions-title {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .doctor-actions-icon {
        width: 48px;
        height: 48px;
        border-radius: 16px;
        background: linear-gradient(135deg, #065f46, #022c22);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
        box-shadow: 0 8px 18px rgba(6, 78, 59, 0.22);
    }

    .doctor-actions-title h5 {
        margin: 0;
        color: #022c22;
        font-size: 18px;
        font-weight: 900;
    }

    .doctor-actions-title p {
        margin: 3px 0 0;
        color: #64748b;
        font-size: 13px;
        font-weight: 600;
    }

    .btn-add-doctor {
        background: linear-gradient(90deg, #065f46, #022c22);
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

    .btn-add-doctor:hover {
        color: #ffffff !important;
        transform: translateY(-2px);
        background: linear-gradient(90deg, #047857, #064e3b);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.33);
    }

    .doctor-table-card {
        background: #ffffff;
        border-radius: 24px;
        padding: 22px;
        border: 1px solid rgba(6, 95, 70, 0.12);
        box-shadow: 0 14px 35px rgba(6, 78, 59, 0.13);
        overflow-x: auto;
    }

    .doctor-table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 14px;
        flex-wrap: wrap;
        padding-bottom: 16px;
        margin-bottom: 18px;
        border-bottom: 1px solid #d1fae5;
    }

    .doctor-table-header h5 {
        margin: 0;
        color: #022c22;
        font-size: 19px;
        font-weight: 900;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .doctor-table-header h5 i {
        color: #065f46;
    }

    .doctor-table-header span {
        background: #d1fae5;
        color: #064e3b;
        border-radius: 20px;
        padding: 7px 13px;
        font-size: 12px;
        font-weight: 900;
        border: 1px solid rgba(6, 95, 70, 0.16);
    }

    #doctors-table {
        width: 100% !important;
        border-collapse: separate !important;
        border-spacing: 0 8px !important;
    }

    #doctors-table thead th {
        background: linear-gradient(90deg, #064e3b, #022c22) !important;
        color: #ffffff !important;
        border: none !important;
        padding: 14px 10px !important;
        font-weight: 900 !important;
        text-align: center !important;
    }

    #doctors-table tbody tr {
        background: #ffffff;
        box-shadow: 0 5px 18px rgba(6, 78, 59, 0.08);
        transition: all 0.25s ease;
    }

    #doctors-table tbody tr:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 24px rgba(6, 78, 59, 0.14);
    }

    #doctors-table tbody td {
        vertical-align: middle !important;
        border-top: 1px solid #d1fae5 !important;
        border-bottom: 1px solid #d1fae5 !important;
        padding: 13px 10px !important;
    }

    .dataTables_filter label {
        color: #022c22;
        font-weight: 800;
    }

    .dataTables_filter input {
        border: 1px solid rgba(6, 95, 70, 0.24) !important;
        border-radius: 22px !important;
        padding: 8px 15px !important;
        outline: none !important;
        font-weight: 600;
        color: #022c22 !important;
    }

    .dataTables_filter input:focus {
        border-color: #065f46 !important;
        box-shadow: 0 0 0 0.18rem rgba(6, 95, 70, 0.15) !important;
    }

    .dataTables_length label {
        color: #022c22;
        font-weight: 800;
    }

    .dataTables_length select {
        border: 1px solid rgba(6, 95, 70, 0.24) !important;
        border-radius: 12px !important;
        color: #022c22 !important;
        font-weight: 700;
        outline: none !important;
    }

    .dataTables_info {
        color: #475569 !important;
        font-weight: 700;
    }

    .dataTables_paginate .paginate_button {
        border-radius: 12px !important;
        font-weight: 800 !important;
        color: #064e3b !important;
    }

    .dataTables_paginate .paginate_button.current,
    .dataTables_paginate .paginate_button.current:hover {
        background: linear-gradient(90deg, #065f46, #022c22) !important;
        color: #ffffff !important;
        border: none !important;
    }

    .dataTables_paginate .paginate_button:hover {
        background: #d1fae5 !important;
        color: #064e3b !important;
        border: 1px solid #d1fae5 !important;
    }

    .dt-buttons .btn {
        margin-right: 6px;
        margin-bottom: 6px;
        background: linear-gradient(90deg, #065f46, #022c22) !important;
        color: #ffffff !important;
        border: none !important;
        border-radius: 18px !important;
        font-weight: 800 !important;
        box-shadow: 0 8px 18px rgba(6, 78, 59, 0.18);
    }

    .dt-buttons .btn:hover {
        background: linear-gradient(90deg, #047857, #064e3b) !important;
        color: #ffffff !important;
        transform: translateY(-1px);
    }

    @media (max-width: 768px) {
        .doctor-hero {
            padding: 22px 18px;
        }

        .doctor-title-box h2 {
            font-size: 24px;
        }

        .doctor-table-card {
            padding: 16px;
        }

        .doctor-actions-card {
            justify-content: center;
            text-align: center;
        }

        .doctor-actions-title {
            justify-content: center;
        }
    }
</style>

<section class="doctor-page-wrapper">

    <div class="container-fluid">

        <div class="doctor-hero">

            <div class="doctor-hero-content">

                <div class="doctor-title-box">
                    <h2>
                        <i class="fas fa-user-md me-2"></i>
                        {{ __('doctor.doctors_management') }}
                    </h2>

                    <p>
                        {{ __('doctor.doctors_management_description') }}
                    </p>
                </div>

                <div class="doctor-hero-badge">
                    <i class="fas fa-user-shield"></i>
                    {{ Auth::user()->name ?? __('doctor.user') }}
                </div>

            </div>

        </div>

        {{-- ERROR ALERT --}}
        @if (session('error'))
            <div id="alert-message" class="alert doctor-alert alert-danger my-4 alert-dismissible">
                <div>
                    <i class="fas fa-exclamation-circle me-1"></i>
                    {{ session('error') }}
                </div>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="{{ __('doctor.close') }}">
                </button>
            </div>
        @endif

        {{-- VALIDATION ERRORS --}}
        @if ($errors->any())
            <div class="alert doctor-alert alert-danger my-4 alert-dismissible">
                <div>
                    <strong>
                        <i class="fas fa-exclamation-triangle me-1"></i>
                        {{ __('doctor.please_fix_errors') }}
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
                        aria-label="{{ __('doctor.close') }}">
                </button>
            </div>
        @endif

        {{-- SUCCESS --}}
        @if(session('success'))
            <div id="alert-message" class="alert doctor-alert alert-success my-4 alert-dismissible">
                <div>
                    <i class="fas fa-check-circle me-1"></i>
                    {{ session('success') }}
                </div>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="{{ __('doctor.close') }}">
                </button>
            </div>
        @endif

        <div class="doctor-actions-card">

            <div class="doctor-actions-title">

                <div class="doctor-actions-icon">
                    <i class="fas fa-stethoscope"></i>
                </div>

                <div>
                    <h5>{{ __('doctor.doctor_records') }}</h5>
                    <p>{{ __('doctor.doctor_records_description') }}</p>
                </div>

            </div>

            {{-- ADD BUTTON --}}
            @role('admin|pharmacy')
                <button type="button"
                        class="btn btn-add-doctor"
                        onclick="createmodalShow(event)"
                        data-bs-toggle="modal"
                        data-bs-target="#create">

                    <i class="fas fa-plus-circle"></i>
                    {{ __('doctor.add_new_doctor') }}

                </button>
            @endrole

        </div>

        <div class="doctor-table-card">

            <div class="doctor-table-header">
                <h5>
                    <i class="fas fa-table"></i>
                    {{ __('doctor.doctors_table') }}
                </h5>

                <span>
                    <i class="fas fa-database me-1"></i>
                    {{ __('doctor.live_data') }}
                </span>
            </div>

            {{-- DATATABLE --}}
            {{ $dataTable->table() }}

        </div>

    </div>

    {{-- MODALS --}}
    @include('doctor.create')
    @include('doctor.show')
    @include('doctor.edit')
    @include('doctor.delete')

</section>

@endsection


@push('scripts')

    {{ $dataTable->scripts() }}

    <script>
        setTimeout(function () {
            $('.alert-success').fadeOut();
        }, {{ session('timeout', 3000) }});
    </script>

@endpush