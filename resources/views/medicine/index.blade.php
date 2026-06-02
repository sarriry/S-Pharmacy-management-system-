@extends('layouts.app')

@section('title')
    {{ __('medicine.medicines_management') }}
@endsection

@section('content')

<style>
    .medicine-page-wrapper {
        min-height: calc(100vh - 150px);
        padding: 24px 14px;
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 55%, #ecfdf5 100%);
    }

    .medicine-hero {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        border-radius: 24px;
        padding: 26px 30px;
        box-shadow: 0 16px 35px rgba(6, 78, 59, 0.25);
        margin-bottom: 26px;
        position: relative;
        overflow: hidden;
    }

    .medicine-hero::before {
        content: "";
        position: absolute;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.13);
        top: -70px;
        right: -55px;
    }

    .medicine-hero-content {
        position: relative;
        z-index: 2;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
    }

    .medicine-title-box h2 {
        margin: 0 0 7px;
        font-size: 30px;
        font-weight: 900;
        letter-spacing: 0.4px;
    }

    .medicine-title-box p {
        margin: 0;
        color: rgba(255, 255, 255, 0.84);
        font-size: 15px;
        font-weight: 600;
    }

    .medicine-hero-badge {
        background: rgba(255, 255, 255, 0.17);
        border: 1px solid rgba(255, 255, 255, 0.22);
        padding: 10px 16px;
        border-radius: 25px;
        font-weight: 800;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .medicine-alert {
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

    .medicine-alert.alert-success {
        background: #dcfce7;
        color: #064e3b;
    }

    .medicine-alert.alert-danger {
        background: #fee2e2;
        color: #991b1b;
    }

    .medicine-alert ul {
        margin-bottom: 0;
    }

    .medicine-alert .btn-close {
        box-shadow: none;
    }

    .medicine-actions-card {
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

    .medicine-actions-title {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .medicine-actions-icon {
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

    .medicine-actions-title h5 {
        margin: 0;
        color: #022c22;
        font-size: 18px;
        font-weight: 900;
    }

    .medicine-actions-title p {
        margin: 3px 0 0;
        color: #64748b;
        font-size: 13px;
        font-weight: 600;
    }

    .btn-add-medicine {
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

    .btn-add-medicine:hover {
        color: #ffffff !important;
        transform: translateY(-2px);
        background: linear-gradient(90deg, #059669, #064e3b);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.33);
    }

    .medicine-table-card {
        background: #ffffff;
        border-radius: 24px;
        padding: 22px;
        border: 1px solid rgba(6, 95, 70, 0.14);
        box-shadow: 0 14px 35px rgba(6, 78, 59, 0.13);
        overflow-x: auto;
    }

    .medicine-table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 14px;
        flex-wrap: wrap;
        padding-bottom: 16px;
        margin-bottom: 18px;
        border-bottom: 1px solid #d1fae5;
    }

    .medicine-table-header h5 {
        margin: 0;
        color: #022c22;
        font-size: 19px;
        font-weight: 900;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .medicine-table-header span {
        background: #dcfce7;
        color: #064e3b;
        border-radius: 20px;
        padding: 7px 13px;
        font-size: 12px;
        font-weight: 900;
    }

    #medicines-table {
        width: 100% !important;
        border-collapse: separate !important;
        border-spacing: 0 8px !important;
    }

    #medicines-table thead th {
        background: linear-gradient(90deg, #064e3b, #022c22) !important;
        color: #ffffff !important;
        border: none !important;
        padding: 14px 10px !important;
        font-weight: 900 !important;
        text-align: center !important;
    }

    #medicines-table tbody tr {
        background: #ffffff;
        box-shadow: 0 5px 18px rgba(6, 78, 59, 0.08);
        transition: all 0.25s ease;
    }

    #medicines-table tbody tr:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 24px rgba(6, 78, 59, 0.14);
    }

    #medicines-table tbody td {
        vertical-align: middle !important;
        border-top: 1px solid #d1fae5 !important;
        border-bottom: 1px solid #d1fae5 !important;
        padding: 13px 10px !important;
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
        .medicine-hero {
            padding: 22px 18px;
        }

        .medicine-title-box h2 {
            font-size: 24px;
        }

        .medicine-table-card {
            padding: 16px;
        }

        .medicine-actions-card {
            justify-content: center;
            text-align: center;
        }

        .medicine-actions-title {
            justify-content: center;
        }
    }
</style>

<section class="medicine-page-wrapper">

    <div class="container-fluid">

        <div class="medicine-hero">

            <div class="medicine-hero-content">

                <div class="medicine-title-box">
                    <h2>
                        <i class="fas fa-pills me-2"></i>
                        {{ __('medicine.medicines_management') }}
                    </h2>

                    <p>
                        {{ __('medicine.medicines_management_description') }}
                    </p>
                </div>

                <div class="medicine-hero-badge">
                    <i class="fas fa-user-shield"></i>
                    {{ auth()->user()->name ?? __('medicine.user') }}
                </div>

            </div>

        </div>

        {{-- VALIDATION ERRORS --}}

@if(isset($expiredMedicines) && $expiredMedicines->count() > 0)
    <div class="alert alert-danger">
        <strong>{{ __('medicine.expired_medicines') }}</strong>
        <ul class="mb-0">
            @foreach($expiredMedicines as $medicine)
                <li>
                    {{ $medicine->name }}
                    {{ __('medicine.expired_on') }}
                    {{ $medicine->expiration_date->format('Y-m-d') }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

@if(isset($expiringMedicines) && $expiringMedicines->count() > 0)
    <div class="alert alert-warning">
        <strong>{{ __('medicine.medicines_about_to_expire') }}</strong>
        <ul class="mb-0">
            @foreach($expiringMedicines as $medicine)
                <li>
                    {{ $medicine->name }}
                    {{ __('medicine.will_expire_on') }}
                    {{ $medicine->expiration_date->format('Y-m-d') }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

        @if ($errors->any())
            <div class="alert medicine-alert alert-danger my-4 alert-dismissible">
                <div>
                    <strong>
                        <i class="fas fa-exclamation-triangle me-1"></i>
                        {{ __('medicine.please_fix_errors') }}
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
                        aria-label="{{ __('medicine.close') }}">
                </button>
            </div>
        @endif

        {{-- SUCCESS --}}
        @if (session('success'))
            <div class="alert medicine-alert alert-success my-4 alert-dismissible">
                <div>
                    <i class="fas fa-check-circle me-1"></i>
                    {{ session('success') }}
                </div>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="{{ __('medicine.close') }}">
                </button>
            </div>
        @endif

        {{-- ERROR --}}
        @if (session('error'))
            <div class="alert medicine-alert alert-danger my-4 alert-dismissible">
                <div>
                    <i class="fas fa-exclamation-circle me-1"></i>
                    {{ session('error') }}
                </div>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="{{ __('medicine.close') }}">
                </button>
            </div>
        @endif

        <div class="medicine-actions-card">

            <div class="medicine-actions-title">

                <div class="medicine-actions-icon">
                    <i class="fas fa-capsules"></i>
                </div>

                <div>
                    <h5>{{ __('medicine.medicine_records') }}</h5>
                    <p>{{ __('medicine.medicine_records_description') }}</p>
                </div>

            </div>

            {{-- CREATE BUTTON --}}
            @role('admin')
                <button type="button"
                        class="btn btn-add-medicine"
                        onclick="createmodalShow(event)"
                        data-bs-toggle="modal"
                        data-bs-target="#create">

                    <i class="fas fa-plus-circle"></i>
                    {{ __('medicine.create_new_medicine') }}

                </button>
            @endrole

        </div>

        <div class="medicine-table-card">

            <div class="medicine-table-header">
                <h5>
                    <i class="fas fa-table"></i>
                    {{ __('medicine.medicines_table') }}
                </h5>

                <span>
                    <i class="fas fa-database me-1"></i>
                    {{ __('medicine.live_data') }}
                </span>
            </div>

            {{ $dataTable->table() }}

        </div>

    </div>

    {{-- MODALS --}}
    @include('medicine.delete')
    @include('medicine.create')
    @include('medicine.edit')

</section>

@endsection

@push('scripts')

    {{ $dataTable->scripts() }}

    <script>
        function createmodalShow(event) {
            event.preventDefault();
            event.stopPropagation();

            $('#create input[name="name"]').val("");
            $('#create input[name="type"]').val("");
            $('#create input[name="quantity"]').val("");
            $('#create input[name="price"]').val("");
        }

        function editmodalShow(event) {
            event.preventDefault();
            event.stopPropagation();

            const button = event.target.closest('button');
            const itemId = button ? button.getAttribute('id') : event.target.id;

            if (!itemId) {
                alert(@json(__('medicine.medicine_id_not_found')));
                return;
            }

            $('#edit_medName').val("");
            $('#edit_medType').val("");
            $('#edit_medQuntity').val("");
            $('#edit_medPrice').val("");

            $.ajax({
                url: "{{ route('medicines.show', ':id') }}".replace(':id', itemId),
                method: "GET",

                success: function(response) {
                    let med = response.medicine[0];

                    $('#edit_medName').val(med.name);
                    $('#edit_medType').val(med.type);
                    $('#edit_medQuntity').val(med.quantity);
                    $('#edit_medPrice').val(med.price);
                },

                error: function () {
                    alert(@json(__('medicine.unable_load_medicine_data_try_again')));
                }
            });

            let route = "{{ route('medicines.update', ':id') }}".replace(':id', itemId);
            document.getElementById("edit-form").action = route;
        }

        let selectedMedicineDeleteForm = null;

        function deletemodalShow(event) {
            event.preventDefault();
            event.stopPropagation();

            selectedMedicineDeleteForm = event.target.closest("form");

            if (!selectedMedicineDeleteForm) {
                alert(@json(__('medicine.delete_form_not_found')));
                return;
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            const deleteButton = document.getElementById("delete");

            if (deleteButton) {
                deleteButton.addEventListener("click", function () {
                    if (selectedMedicineDeleteForm) {
                        selectedMedicineDeleteForm.submit();
                    } else {
                        alert(@json(__('medicine.no_medicine_selected_for_deletion')));
                    }
                });
            }
        });

        setTimeout(function () {
            $('.alert-success').fadeOut();
        }, {{ session('timeout', 3000) }});
    </script>

@endpush