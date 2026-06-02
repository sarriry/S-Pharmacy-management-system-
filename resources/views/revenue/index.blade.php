@extends('layouts.app')

@section('title')
    {{ __('revenue.revenues') }}
@endsection

@section('content')

<style>
    .revenue-main-wrapper {
        min-height: calc(100vh - 150px);
        padding: 24px 14px;
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 55%, #ecfdf5 100%);
    }

    .revenue-main-hero {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        border-radius: 24px;
        padding: 26px 30px;
        box-shadow: 0 16px 35px rgba(6, 78, 59, 0.25);
        margin-bottom: 26px;
        position: relative;
        overflow: hidden;
    }

    .revenue-main-hero::before {
        content: "";
        position: absolute;
        width: 190px;
        height: 190px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.13);
        top: -70px;
        right: -55px;
    }

    .revenue-main-hero-content {
        position: relative;
        z-index: 2;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
    }

    .revenue-main-title h2 {
        margin: 0 0 7px;
        font-size: 30px;
        font-weight: 900;
        letter-spacing: 0.4px;
    }

    .revenue-main-title p {
        margin: 0;
        color: rgba(255, 255, 255, 0.84);
        font-size: 15px;
        font-weight: 600;
    }

    .revenue-main-badge {
        background: rgba(255, 255, 255, 0.17);
        border: 1px solid rgba(255, 255, 255, 0.22);
        padding: 10px 16px;
        border-radius: 25px;
        font-weight: 800;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .revenue-main-content-card {
        background: #ffffff;
        border-radius: 24px;
        padding: 22px;
        border: 1px solid rgba(6, 95, 70, 0.14);
        box-shadow: 0 14px 35px rgba(6, 78, 59, 0.13);
    }

    #latest-order-bill {
        border: 1px solid rgba(6, 95, 70, 0.14);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 14px 35px rgba(6, 78, 59, 0.13);
        margin: 24px 14px;
    }

    #latest-order-bill .card-header {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        border-bottom: none;
        padding: 16px 20px;
        font-weight: 900;
    }

    #latest-order-bill .card-body {
        background: #ffffff;
        padding: 20px;
    }

    #latest-order-bill .btn-primary {
        background: #ffffff !important;
        color: #064e3b !important;
        border: none !important;
        border-radius: 20px;
        font-weight: 900;
        padding: 7px 14px;
        transition: all 0.25s ease;
    }

    #latest-order-bill .btn-primary:hover {
        background: #dcfce7 !important;
        color: #022c22 !important;
        transform: translateY(-2px);
    }

    #latest-order-bill table {
        margin-bottom: 0;
    }

    #latest-order-bill table thead th {
        background: linear-gradient(90deg, #064e3b, #022c22) !important;
        color: #ffffff !important;
        border: none !important;
        text-align: center;
        font-weight: 900;
        padding: 12px 10px;
    }

    #latest-order-bill table tbody td {
        color: #022c22 !important;
        font-weight: 700;
        text-align: center;
        vertical-align: middle;
        border-color: #d1fae5 !important;
        padding: 12px 10px;
    }

    #latest-order-bill table tbody tr:nth-child(even) td {
        background: #f0fdf4 !important;
    }

    #latest-order-bill table tfoot th {
        background: #dcfce7 !important;
        color: #064e3b !important;
        border-color: #d1fae5 !important;
        font-weight: 900;
        padding: 12px 10px;
    }

    @media (max-width: 768px) {
        .revenue-main-hero {
            padding: 22px 18px;
        }

        .revenue-main-title h2 {
            font-size: 24px;
        }

        .revenue-main-content-card {
            padding: 16px;
        }

        #latest-order-bill {
            margin: 20px 10px;
        }

        #latest-order-bill .card-header {
            flex-direction: column;
            gap: 10px;
            align-items: flex-start !important;
        }
    }
</style>

<section class="revenue-main-wrapper">

    <div class="container-fluid">

        <div class="revenue-main-hero">

            <div class="revenue-main-hero-content">

                <div class="revenue-main-title">
                    <h2>
                        <i class="fas fa-chart-line me-2"></i>
                        {{ __('revenue.revenues_management') }}
                    </h2>

                    <p>
                        {{ __('revenue.revenues_management_description') }}
                    </p>
                </div>

                <div class="revenue-main-badge">
                    <i class="fas fa-user-shield"></i>
                    {{ auth()->user()->name ?? __('revenue.user') }}
                </div>

            </div>

        </div>

        <div class="revenue-main-content-card">

            @role('admin')
                @include('revenue.admin')
            @endrole

            @role('pharmacy')
                @include('revenue.pharmacy')
            @endrole

        </div>

    </div>

</section>

@if(session('bill'))
    @php
        $bill = session('bill');
    @endphp

    <div class="card mb-4" id="latest-order-bill">
        <div class="card-header d-flex justify-content-between align-items-center">
            <strong>
                <i class="fas fa-file-invoice-dollar"></i>
                Generated Bill - Order #{{ $bill['order_id'] }}
            </strong>

            <button type="button"
                    class="btn btn-sm btn-primary"
                    onclick="printLatestOrderBill()">
                <i class="fas fa-print"></i>
                Print Bill
            </button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-0">
                    <thead>
                    <tr>
                        <th>Medicine Name</th>
                        <th>Type</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($bill['items'] as $item)
                        <tr>
                            <td>{{ $item['medicine_name'] }}</td>
                            <td>{{ $item['medicine_type'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ number_format($item['unit_price'], 2) }}</td>
                            <td>{{ number_format($item['line_total'], 2) }}</td>
                        </tr>
                    @endforeach
                    </tbody>

                    <tfoot>
                    <tr>
                        <th colspan="4" class="text-end">Grand Total</th>
                        <th>{{ number_format($bill['total_price'], 2) }}</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <script>
        function printLatestOrderBill() {
            const billContent = document.getElementById('latest-order-bill').innerHTML;
            const originalContent = document.body.innerHTML;

            document.body.innerHTML = billContent;
            window.print();
            document.body.innerHTML = originalContent;
            location.reload();
        }
    </script>
@endif

@endsection