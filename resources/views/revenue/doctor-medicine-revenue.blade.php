@extends('layouts.app')

@section('title')
    {{ __('dmr.page_title') }}
@endsection

@section('content')

<style>
    .doctor-medicine-revenue-wrapper {
        min-height: calc(100vh - 150px);
        padding: 24px 14px;
        background: linear-gradient(135deg, #ecfdf5 0%, #ffffff 55%, #dcfce7 100%);
    }

    .revenue-hero {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        border-radius: 24px;
        padding: 26px 30px;
        box-shadow: 0 16px 35px rgba(6, 78, 59, 0.25);
        margin-bottom: 26px;
        position: relative;
        overflow: hidden;
    }

    .revenue-hero::before {
        content: "";
        position: absolute;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.13);
        top: -70px;
        right: -55px;
    }

    .revenue-hero-content {
        position: relative;
        z-index: 2;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
    }

    .revenue-title-box h2 {
        margin: 0 0 7px;
        font-size: 30px;
        font-weight: 900;
        letter-spacing: 0.4px;
    }

    .revenue-title-box p {
        margin: 0;
        color: rgba(255, 255, 255, 0.84);
        font-size: 15px;
        font-weight: 600;
    }

    .revenue-hero-badge {
        background: rgba(255, 255, 255, 0.17);
        border: 1px solid rgba(255, 255, 255, 0.22);
        padding: 10px 16px;
        border-radius: 25px;
        font-weight: 800;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .filter-card,
    .summary-card,
    .report-card {
        background: #ffffff;
        border-radius: 24px;
        border: 1px solid rgba(6, 95, 70, 0.12);
        box-shadow: 0 14px 35px rgba(6, 78, 59, 0.13);
        padding: 22px;
        margin-bottom: 24px;
    }

    .section-title {
        margin: 0 0 18px;
        color: #022c22;
        font-size: 19px;
        font-weight: 900;
        display: flex;
        align-items: center;
        gap: 9px;
        padding-bottom: 14px;
        border-bottom: 1px solid #d1fae5;
    }

    .section-title i {
        color: #065f46;
    }

    .form-label {
        color: #022c22;
        font-weight: 800;
        font-size: 14px;
        margin-bottom: 7px;
    }

    .form-control,
    .form-select {
        height: 46px;
        border-radius: 14px;
        border: 1px solid rgba(6, 95, 70, 0.24);
        color: #022c22;
        font-weight: 600;
        background-color: #ffffff;
        box-shadow: none;
        transition: all 0.25s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #065f46;
        box-shadow: 0 0 0 0.18rem rgba(6, 95, 70, 0.15);
    }

    .btn-filter {
        background: linear-gradient(90deg, #065f46, #022c22);
        color: #ffffff !important;
        border: none;
        border-radius: 24px;
        padding: 11px 26px;
        font-weight: 900;
        box-shadow: 0 10px 22px rgba(6, 78, 59, 0.25);
        transition: all 0.25s ease;
    }

    .btn-filter:hover {
        transform: translateY(-2px);
        background: linear-gradient(90deg, #047857, #064e3b);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.34);
    }

    .btn-reset {
        background: #f1f5f9;
        color: #334155 !important;
        border: none;
        border-radius: 24px;
        padding: 11px 24px;
        font-weight: 900;
        transition: all 0.25s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-reset:hover {
        background: #e2e8f0;
        color: #022c22 !important;
        transform: translateY(-2px);
        text-decoration: none;
    }

    .summary-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
    }

    .summary-box {
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 100%);
        border: 1px solid rgba(6, 95, 70, 0.18);
        border-radius: 20px;
        padding: 18px;
        display: flex;
        align-items: center;
        gap: 14px;
        box-shadow: 0 8px 20px rgba(6, 78, 59, 0.08);
    }

    .summary-icon {
        width: 52px;
        height: 52px;
        border-radius: 16px;
        background: linear-gradient(135deg, #065f46, #022c22);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        flex-shrink: 0;
    }

    .summary-box h6 {
        margin: 0;
        color: #64748b;
        font-size: 13px;
        font-weight: 800;
    }

    .summary-box p {
        margin: 4px 0 0;
        color: #022c22;
        font-size: 22px;
        font-weight: 900;
    }

    .table {
        border-collapse: separate !important;
        border-spacing: 0 8px !important;
        margin-bottom: 0;
    }

    .table thead th {
        background: linear-gradient(90deg, #064e3b, #022c22) !important;
        color: #ffffff !important;
        border: none !important;
        padding: 14px 10px !important;
        font-weight: 900 !important;
        text-align: center !important;
        white-space: nowrap;
    }

    .table tbody tr {
        background: #ffffff;
        box-shadow: 0 5px 18px rgba(6, 78, 59, 0.08);
        transition: all 0.25s ease;
    }

    .table tbody tr:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 24px rgba(6, 78, 59, 0.14);
    }

    .table tbody td {
        background: #ffffff !important;
        vertical-align: middle !important;
        border-top: 1px solid #d1fae5 !important;
        border-bottom: 1px solid #d1fae5 !important;
        padding: 13px 10px !important;
        text-align: center;
        color: #022c22;
        font-weight: 700;
    }

    .money-text {
        color: #065f46;
        font-weight: 900;
    }

    .empty-box {
        background: #f8fafc;
        border-radius: 18px;
        padding: 26px;
        color: #64748b;
        font-weight: 800;
        text-align: center;
        border: 1px dashed rgba(6, 95, 70, 0.25);
    }

    @media (max-width: 768px) {
        .revenue-hero {
            padding: 22px 18px;
        }

        .revenue-title-box h2 {
            font-size: 24px;
        }

        .summary-grid {
            grid-template-columns: 1fr;
        }

        .filter-card,
        .summary-card,
        .report-card {
            padding: 16px;
        }
    }

    .report-card .table,
    .report-card .table-bordered,
    .report-card .table-responsive {
        background: #ffffff !important;
        color: #022c22 !important;
    }

    .report-card .table thead,
    .report-card .table thead tr,
    .report-card .table thead th {
        background: linear-gradient(90deg, #064e3b, #022c22) !important;
        color: #ffffff !important;
        border-color: rgba(209, 250, 229, 0.35) !important;
    }

    .report-card .table tbody,
    .report-card .table tbody tr {
        background: #ffffff !important;
        color: #022c22 !important;
    }

    .report-card .table tbody tr:nth-child(even) td {
        background: #f0fdf4 !important;
    }

    .report-card .table tbody tr:nth-child(odd) td {
        background: #ffffff !important;
    }

    .report-card .table tbody td {
        background-color: #ffffff !important;
        color: #022c22 !important;
        border-top: 1px solid #d1fae5 !important;
        border-bottom: 1px solid #d1fae5 !important;
        border-left: none !important;
        border-right: none !important;
        vertical-align: middle !important;
        text-align: center !important;
        font-weight: 800 !important;
    }

    .report-card .table tbody tr:nth-child(even) td {
        background-color: #f0fdf4 !important;
    }

    .report-card .table tbody td *,
    .report-card .table tbody td span,
    .report-card .table tbody td div,
    .report-card .table tbody td a {
        color: #022c22 !important;
    }

    .report-card .table tbody td.money-text,
    .report-card .table tbody td .money-text,
    .report-card .money-text {
        color: #047857 !important;
        font-weight: 900 !important;
    }

    .report-card .table tbody tr:hover td {
        background-color: #dcfce7 !important;
        color: #022c22 !important;
    }

    .report-card .table tbody tr:hover td *,
    .report-card .table tbody tr:hover .money-text {
        color: #022c22 !important;
    }

    .report-card .table tbody tr:hover td.money-text,
    .report-card .table tbody tr:hover td .money-text {
        color: #065f46 !important;
    }
</style>

<section class="doctor-medicine-revenue-wrapper">

    <div class="container-fluid">

        <div class="revenue-hero">
            <div class="revenue-hero-content">

                <div class="revenue-title-box">
                    <h2>
                        <i class="fas fa-user-md me-2"></i>
                        {{ __('dmr.hero_title') }}
                    </h2>

                    <p>
                        {{ __('dmr.hero_description') }}
                    </p>
                </div>

                <div class="revenue-hero-badge">
                    <i class="fas fa-chart-line"></i>
                    {{ __('dmr.revenue_report') }}
                </div>

            </div>
        </div>

        <div class="filter-card">

            <h5 class="section-title">
                <i class="fas fa-filter"></i>
                {{ __('dmr.filter_report') }}
            </h5>

            <form method="GET" action="{{ route('revenues.doctor-medicine') }}">

                <div class="row">

                    <div class="col-md-3 mb-3">
                        <label class="form-label">
                            <i class="fas fa-user-md me-1"></i>
                            {{ __('dmr.doctor') }}
                        </label>

                        <select name="doctor_id" class="form-control">
                            <option value="">{{ __('dmr.all_doctors') }}</option>

                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}" {{ (string) $selectedDoctorId === (string) $doctor->id ? 'selected' : '' }}>
                                    {{ optional($doctor->user)->name ?? __('dmr.doctor_number', ['id' => $doctor->id]) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">
                            <i class="fas fa-pills me-1"></i>
                            {{ __('dmr.medicine') }}
                        </label>

                        <select name="medicine_id" class="form-control">
                            <option value="">{{ __('dmr.all_medicines') }}</option>

                            @foreach($medicines as $medicine)
                                <option value="{{ $medicine->id }}" {{ (string) $selectedMedicineId === (string) $medicine->id ? 'selected' : '' }}>
                                    {{ $medicine->name }} {{ $medicine->type ? '(' . $medicine->type . ')' : '' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label">
                            <i class="fas fa-calendar me-1"></i>
                            {{ __('dmr.from_date') }}
                        </label>

                        <input type="date"
                               name="from_date"
                               class="form-control"
                               value="{{ $fromDate }}">
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label">
                            <i class="fas fa-calendar-check me-1"></i>
                            {{ __('dmr.to_date') }}
                        </label>

                        <input type="date"
                               name="to_date"
                               class="form-control"
                               value="{{ $toDate }}">
                    </div>

                    <div class="col-md-2 mb-3 d-flex align-items-end gap-2">
                        <button type="submit" class="btn btn-filter w-100">
                            <i class="fas fa-search me-1"></i>
                            {{ __('dmr.search') }}
                        </button>
                    </div>

                    <div class="col-md-12">
                        <a href="{{ route('revenues.doctor-medicine') }}" class="btn-reset">
                            <i class="fas fa-sync-alt me-1"></i>
                            {{ __('dmr.reset_filter') }}
                        </a>
                    </div>

                </div>

            </form>

        </div>

        <div class="summary-card">

            <h5 class="section-title">
                <i class="fas fa-chart-pie"></i>
                {{ __('dmr.summary') }}
            </h5>

            <div class="summary-grid">

                <div class="summary-box">
                    <div class="summary-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>

                    <div>
                        <h6>{{ __('dmr.total_orders') }}</h6>
                        <p>{{ $summary['total_orders'] }}</p>
                    </div>
                </div>

                <div class="summary-box">
                    <div class="summary-icon">
                        <i class="fas fa-boxes"></i>
                    </div>

                    <div>
                        <h6>{{ __('dmr.total_quantity') }}</h6>
                        <p>{{ $summary['total_quantity'] }}</p>
                    </div>
                </div>

                <div class="summary-box">
                    <div class="summary-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>

                    <div>
                        <h6>{{ __('dmr.total_revenue') }}</h6>
                        <p>{{ number_format($summary['total_revenue'], 2) }}</p>
                    </div>
                </div>

            </div>

        </div>

        <div class="report-card">

            <h5 class="section-title">
                <i class="fas fa-table"></i>
                {{ __('dmr.details_title') }}
            </h5>

            @if($reportRows->count() > 0)

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>{{ __('dmr.order_id') }}</th>
                                <th>{{ __('dmr.date') }}</th>
                                <th>{{ __('dmr.doctor') }}</th>
                                <th>{{ __('dmr.pharmacy') }}</th>
                                <th>{{ __('dmr.medicine') }}</th>
                                <th>{{ __('dmr.type') }}</th>
                                <th>{{ __('dmr.quantity') }}</th>
                                <th>{{ __('dmr.unit_price') }}</th>
                                <th>{{ __('dmr.total_revenue') }}</th>
                                <th>{{ __('dmr.status') }}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($reportRows as $row)
                                <tr>
                                    <td>#{{ $row['order_id'] }}</td>
                                    <td>{{ $row['order_date'] }}</td>
                                    <td>{{ $row['doctor_name'] }}</td>
                                    <td>{{ $row['pharmacy_name'] }}</td>
                                    <td>{{ $row['medicine_name'] }}</td>
                                    <td>{{ $row['medicine_type'] }}</td>
                                    <td>{{ $row['quantity'] }}</td>
                                    <td class="money-text">{{ number_format($row['unit_price'], 2) }}</td>
                                    <td class="money-text">{{ number_format($row['total_revenue'], 2) }}</td>
                                    <td>{{ $row['order_status'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            @else

                <div class="empty-box">
                    <i class="fas fa-info-circle me-1"></i>
                    {{ __('dmr.empty_message') }}
                </div>

            @endif

        </div>

    </div>

</section>

@endsection