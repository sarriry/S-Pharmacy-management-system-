@extends('layouts.app')

@section('content')
<style>
    :root {
        --dark-green: #064e3b;
        --deep-green: #022c22;
        --main-green: #047857;
        --soft-green: #d1fae5;
        --light-green: #ecfdf5;
        --border-green: #a7f3d0;
        --text-dark: #1f2937;
        --text-muted: #6b7280;
        --white: #ffffff;
    }

    .scanner-wrapper {
        background: linear-gradient(135deg, #ecfdf5 0%, #ffffff 45%, #f0fdf4 100%);
        min-height: 100vh;
        padding: 35px 0;
    }

    .scanner-card {
        border: none;
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 18px 45px rgba(6, 78, 59, 0.18);
        background: var(--white);
    }

    .scanner-header {
        background: linear-gradient(135deg, var(--deep-green), var(--dark-green), var(--main-green));
        color: var(--white);
        padding: 28px 32px;
        border-bottom: 4px solid var(--border-green);
    }

    .scanner-header h4 {
        margin: 0;
        font-weight: 800;
        letter-spacing: 0.3px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .scanner-header .subtitle {
        margin-top: 8px;
        font-size: 14px;
        opacity: 0.9;
    }

    .scanner-body {
        padding: 30px;
    }

    .section-title {
        color: var(--dark-green);
        font-weight: 800;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .section-divider {
        border: none;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--border-green), transparent);
        margin: 30px 0;
    }

    .upload-box {
        border: 2px dashed var(--border-green);
        background: var(--light-green);
        border-radius: 18px;
        padding: 24px;
        transition: 0.25s ease;
    }

    .upload-box:hover {
        border-color: var(--main-green);
        box-shadow: 0 10px 25px rgba(4, 120, 87, 0.12);
    }

    .form-label {
        color: var(--dark-green);
        font-weight: 700;
        margin-bottom: 8px;
    }

    .form-control,
    .form-select {
        border-radius: 12px;
        border: 1px solid #d1d5db;
        padding: 10px 13px;
        transition: 0.2s ease;
        color: var(--text-dark);
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--main-green);
        box-shadow: 0 0 0 0.2rem rgba(4, 120, 87, 0.18);
    }

    .btn-dark-green {
        background: linear-gradient(135deg, var(--dark-green), var(--main-green));
        border: none;
        color: var(--white);
        border-radius: 12px;
        padding: 11px 22px;
        font-weight: 700;
        box-shadow: 0 10px 22px rgba(4, 120, 87, 0.22);
        transition: 0.2s ease;
    }

    .btn-dark-green:hover {
        color: var(--white);
        transform: translateY(-1px);
        box-shadow: 0 14px 28px rgba(4, 120, 87, 0.28);
    }

    .btn-confirm-green,
    .btn-print-prescription {
        background: linear-gradient(135deg, #065f46, #10b981);
        border: none;
        color: var(--white);
        border-radius: 12px;
        padding: 11px 22px;
        font-weight: 700;
        box-shadow: 0 10px 22px rgba(16, 185, 129, 0.22);
        transition: 0.2s ease;
    }

    .btn-confirm-green:hover,
    .btn-print-prescription:hover {
        color: var(--white);
        transform: translateY(-1px);
        box-shadow: 0 14px 28px rgba(16, 185, 129, 0.28);
    }

    .alert {
        border-radius: 14px;
        border: none;
        font-weight: 600;
    }

    .alert-success {
        background: #d1fae5;
        color: #065f46;
    }

    .alert-danger {
        background: #fee2e2;
        color: #991b1b;
    }

    .alert-warning {
        background: #fef3c7;
        color: #92400e;
    }

    .ocr-textarea {
        background: #f8fafc;
        border: 1px solid var(--border-green);
        color: var(--text-dark);
        font-family: Consolas, Monaco, monospace;
        line-height: 1.7;
    }

    .green-table {
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid var(--border-green);
        background: var(--white);
    }

    .green-table table {
        margin-bottom: 0;
    }

    .green-table thead th {
        background: var(--dark-green);
        color: var(--white);
        border-color: rgba(255, 255, 255, 0.14);
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        vertical-align: middle;
        white-space: nowrap;
    }

    .green-table tbody td {
        vertical-align: middle;
        border-color: #e5e7eb;
        background: #ffffff;
    }

    .green-table tbody tr:hover td {
        background: #f0fdf4;
    }

    .original-line {
        display: block;
        max-width: 260px;
        color: var(--text-muted);
        font-size: 12px;
        line-height: 1.5;
        word-break: break-word;
    }

    .confirmed-table thead th {
        background: #065f46;
        color: #ffffff;
    }

    .confirmed-table tbody td {
        background: #f0fdf4;
    }

    .badge-soft-green {
        background: var(--soft-green);
        color: var(--dark-green);
        border: 1px solid var(--border-green);
        border-radius: 999px;
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 800;
    }

    .print-toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 16px;
    }

    .print-only-area {
        display: none;
    }

    @media (max-width: 768px) {
        .scanner-body {
            padding: 20px;
        }

        .scanner-header {
            padding: 22px;
        }

        .scanner-header h4 {
            font-size: 19px;
        }

        .print-toolbar {
            align-items: flex-start;
            flex-direction: column;
        }
    }

    .green-table .form-control {
        background-color: #dcfce7;
        color: #064e3b;
    }

    .confirmed-table tbody td {
        background-color: #a7f3d0;
        color: #064e3b;
    }

    .confirmed-table input[readonly],
    .confirmed-table textarea[readonly] {
        background-color: #a7f3d0;
        color: #064e3b;
        border: 1px solid #064e3b;
    }
</style>

@php
    $medicineTypes = [
        'Unknown' => 'type_unknown',
        'Tablet' => 'type_tablet',
        'Capsule' => 'type_capsule',
        'Syrup' => 'type_syrup',
        'Injection' => 'type_injection',
        'Drops' => 'type_drops',
        'Cream' => 'type_cream',
        'Ointment' => 'type_ointment',
        'Gel' => 'type_gel',
        'Inhaler' => 'type_inhaler',
    ];
@endphp

<div class="scanner-wrapper">
    <div class="container">

        <div class="scanner-card">

            <div class="scanner-header">
                <h4>
                    <i class="fas fa-file-medical"></i>
                    {{ __('ps.page_title') }}
                </h4>

                <div class="subtitle">
                    {{ __('ps.page_subtitle') }}
                </div>
            </div>

            <div class="scanner-body">

                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle me-1"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-triangle me-1"></i>
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle me-1"></i>
                        {{ $errors->first() }}
                    </div>
                @endif

                {{-- SCAN FORM --}}
                <div class="upload-box">
                    <h5 class="section-title">
                        <i class="fas fa-cloud-upload-alt"></i>
                        {{ __('ps.upload_prescription') }}
                    </h5>

                    <form method="POST"
                          action="{{ route('prescription-scanner.scan') }}"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="mb-3">
                            <label class="form-label">
                                {{ __('ps.upload_label') }}
                            </label>

                            <input type="file"
                                   name="prescription_image"
                                   class="form-control"
                                   accept="image/*"
                                   required>
                        </div>

                        <button type="submit" class="btn btn-dark-green">
                            <i class="fas fa-search me-1"></i>
                            {{ __('ps.scan_prescription') }}
                        </button>
                    </form>
                </div>

                {{-- RAW OCR TEXT --}}
                @if(session('raw_text'))
                    <hr class="section-divider">

                    <div class="alert alert-warning">
                        <i class="fas fa-info-circle me-1"></i>
                        {{ __('ps.ocr_warning') }}
                    </div>

                    <h5 class="section-title">
                        <i class="fas fa-align-left"></i>
                        {{ __('ps.raw_ocr_text') }}
                    </h5>

                    <textarea class="form-control ocr-textarea mb-4" rows="8" readonly>{{ session('raw_text') }}</textarea>
                @endif

                {{-- EDITABLE PRESCRIPTION TABLE --}}
                @if(session('prescription_items'))
                    <hr class="section-divider">

                    <div class="print-toolbar">
                        <h5 class="section-title mb-0">
                            <i class="fas fa-tablets"></i>
                            {{ __('ps.computer_prescription_table') }}
                            <span class="badge-soft-green">{{ __('ps.review_before_confirm') }}</span>
                        </h5>

                        <button type="button"
                                class="btn btn-print-prescription"
                                onclick="printPrescriptionArea('generated-prescription-print-area')">
                            <i class="fas fa-print me-1"></i>
                            {{ __('ps.print_prescription') }}
                        </button>
                    </div>

                    <form method="POST" action="{{ route('prescription-scanner.confirm') }}">
                        @csrf

                        <div class="table-responsive green-table">
                            <table class="table table-bordered align-middle">
                                <thead>
                                    <tr>
                                        <th style="min-width: 190px;">{{ __('ps.medicine_name') }}</th>
                                        <th style="min-width: 150px;">{{ __('ps.type') }}</th>
                                        <th style="min-width: 110px;">{{ __('ps.quantity') }}</th>
                                        <th style="min-width: 140px;">{{ __('ps.ml_dose') }}</th>
                                        <th style="min-width: 190px;">{{ __('ps.instruction') }}</th>
                                        <th style="min-width: 240px;">{{ __('ps.original_ocr_line') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach(session('prescription_items') as $item)
                                        @php
                                            $selectedType = $item['type'] ?? 'Unknown';
                                        @endphp

                                        <tr>
                                            <td>
                                                <input type="text"
                                                       name="medicine_name[]"
                                                       class="form-control"
                                                       value="{{ $item['medicine_name'] ?? '' }}"
                                                       placeholder="{{ __('ps.only_medicine_name') }}"
                                                       required>

                                                <input type="hidden"
                                                       name="medicine_id[]"
                                                       value="{{ $item['medicine_id'] ?? '' }}">
                                            </td>

                                            <td>
                                                <select name="type[]" class="form-select">
                                                    @foreach($medicineTypes as $typeValue => $typeKey)
                                                        <option value="{{ $typeValue }}" {{ $selectedType === $typeValue ? 'selected' : '' }}>
                                                            {{ __('ps.' . $typeKey) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>

                                            <td>
                                                <input type="number"
                                                       name="quantity[]"
                                                       class="form-control"
                                                       value="{{ $item['quantity'] ?? 1 }}"
                                                       min="1"
                                                       required>
                                            </td>

                                            <td>
                                                <input type="text"
                                                       name="dose_or_ml[]"
                                                       class="form-control"
                                                       value="{{ $item['dose_or_ml'] ?? '' }}"
                                                       placeholder="{{ __('ps.dose_placeholder') }}">
                                            </td>

                                            <td>
                                                <input type="text"
                                                       name="instruction[]"
                                                       class="form-control"
                                                       value="{{ $item['instruction'] ?? '' }}"
                                                       placeholder="{{ __('ps.instruction_placeholder') }}">
                                            </td>

                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-confirm-green">
                                <i class="fas fa-check me-1"></i>
                                {{ __('ps.confirm_prescription') }}
                            </button>
                        </div>
                    </form>

                    {{-- PRINT AREA FOR GENERATED PRESCRIPTION --}}
                    <div id="generated-prescription-print-area" class="print-only-area">
                        <div class="print-header">
                            <h2>{{ __('ps.computer_prescription_table') }}</h2>
                            <p>{{ __('ps.print_date') }}: {{ now()->format('Y-m-d H:i') }}</p>
                        </div>

                        <table class="print-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('ps.medicine_name') }}</th>
                                    <th>{{ __('ps.type') }}</th>
                                    <th>{{ __('ps.quantity') }}</th>
                                    <th>{{ __('ps.ml_dose') }}</th>
                                    <th>{{ __('ps.instruction') }}</th>
                                    
                                </tr>
                            </thead>

                            <tbody>
                                @foreach(session('prescription_items') as $index => $item)
                                    @php
                                        $printType = $item['type'] ?? '';
                                        $printTypeKey = $medicineTypes[$printType] ?? null;
                                    @endphp

                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item['medicine_name'] ?? '' }}</td>
                                        <td>{{ $printTypeKey ? __('ps.' . $printTypeKey) : $printType }}</td>
                                        <td>{{ $item['quantity'] ?? '' }}</td>
                                        <td>{{ $item['dose_or_ml'] ?? '' }}</td>
                                        <td>{{ $item['instruction'] ?? '' }}</td>
                                        <td>{{ $item['original_line'] ?? '' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                {{-- CONFIRMED RESULT --}}
                @if(session('confirmed_prescription_items'))
                    <hr class="section-divider">

                    <div class="alert alert-success">
                        <i class="fas fa-check-circle me-1"></i>
                        {{ __('ps.confirmed_success_message') }}
                    </div>

                    <div class="print-toolbar">
                        <h5 class="section-title mb-0">
                            <i class="fas fa-clipboard-check"></i>
                            {{ __('ps.confirmed_prescription') }}
                        </h5>

                        <button type="button"
                                class="btn btn-print-prescription"
                                onclick="printPrescriptionArea('confirmed-prescription-print-area')">
                            <i class="fas fa-print me-1"></i>
                            {{ __('ps.print_prescription') }}
                        </button>
                    </div>

                    <div class="table-responsive green-table confirmed-table">
                        <table class="table table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th>{{ __('ps.medicine_name') }}</th>
                                    <th>{{ __('ps.type') }}</th>
                                    <th>{{ __('ps.quantity') }}</th>
                                    <th>{{ __('ps.ml_dose') }}</th>
                                    <th>{{ __('ps.instruction') }}</th>
                                    <th>{{ __('ps.original_ocr_line') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach(session('confirmed_prescription_items') as $item)
                                    <tr>
                                        <td>{{ $item['medicine_name'] ?? '' }}</td>

                                        <td>
                                            @php
                                                $confirmedType = $item['type'] ?? '';
                                                $confirmedTypeKey = $medicineTypes[$confirmedType] ?? null;
                                            @endphp

                                            {{ $confirmedTypeKey ? __('ps.' . $confirmedTypeKey) : $confirmedType }}
                                        </td>

                                        <td>{{ $item['quantity'] ?? '' }}</td>
                                        <td>{{ $item['dose_or_ml'] ?? '' }}</td>
                                        <td>{{ $item['instruction'] ?? '' }}</td>
                                        <td>{{ $item['original_line'] ?? '' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- PRINT AREA FOR CONFIRMED PRESCRIPTION --}}
                    <div id="confirmed-prescription-print-area" class="print-only-area">
                        <div class="print-header">
                            <h2>{{ __('ps.confirmed_prescription') }}</h2>
                            <p>{{ __('ps.print_date') }}: {{ now()->format('Y-m-d H:i') }}</p>
                        </div>

                        <table class="print-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('ps.medicine_name') }}</th>
                                    <th>{{ __('ps.type') }}</th>
                                    <th>{{ __('ps.quantity') }}</th>
                                    <th>{{ __('ps.ml_dose') }}</th>
                                    <th>{{ __('ps.instruction') }}</th>
                                    <th>{{ __('ps.original_ocr_line') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach(session('confirmed_prescription_items') as $index => $item)
                                    @php
                                        $confirmedPrintType = $item['type'] ?? '';
                                        $confirmedPrintTypeKey = $medicineTypes[$confirmedPrintType] ?? null;
                                    @endphp

                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item['medicine_name'] ?? '' }}</td>
                                        <td>{{ $confirmedPrintTypeKey ? __('ps.' . $confirmedPrintTypeKey) : $confirmedPrintType }}</td>
                                        <td>{{ $item['quantity'] ?? '' }}</td>
                                        <td>{{ $item['dose_or_ml'] ?? '' }}</td>
                                        <td>{{ $item['instruction'] ?? '' }}</td>
                                        <td>{{ $item['original_line'] ?? '' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

            </div>
        </div>

    </div>
</div>

<script>
function printPrescriptionArea(areaId) {
    const printArea = document.getElementById(areaId);

    if (!printArea) {
        alert(@json(__('ps.print_area_not_found')));
        return;
    }

    const printWindow = window.open('', '_blank', 'width=1000,height=700');

    if (!printWindow) {
        alert(@json(__('ps.print_window_blocked')));
        return;
    }

    printWindow.document.open();

    printWindow.document.write(`
        <!DOCTYPE html>
        <html>
        <head>
            <title>${@json(__('ps.print_prescription'))}</title>
            <style>
                body {
                    font-family: Tahoma, Arial, sans-serif;
                    margin: 30px;
                    color: #022c22;
                    background: #ffffff;
                }

                .print-header {
                    text-align: center;
                    margin-bottom: 25px;
                    padding-bottom: 15px;
                    border-bottom: 2px solid #064e3b;
                }

                .print-header h2 {
                    margin: 0 0 8px;
                    color: #064e3b;
                    font-size: 24px;
                    font-weight: 900;
                }

                .print-header p {
                    margin: 0;
                    color: #475569;
                    font-size: 14px;
                    font-weight: 700;
                }

                .print-table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 10px;
                }

                .print-table th {
                    background: #064e3b;
                    color: #ffffff;
                    font-weight: 900;
                    border: 1px solid #064e3b;
                    padding: 10px;
                    font-size: 13px;
                    text-align: center;
                }

                .print-table td {
                    border: 1px solid #064e3b;
                    padding: 9px;
                    font-size: 13px;
                    text-align: center;
                    vertical-align: middle;
                    word-break: break-word;
                }

                @media print {
                    body {
                        margin: 15px;
                    }
                }
            </style>
        </head>
        <body>
            ${printArea.innerHTML}
        </body>
        </html>
    `);

    printWindow.document.close();
    printWindow.focus();

    setTimeout(function () {
        printWindow.print();
        printWindow.close();
    }, 300);
}
</script>
@endsection