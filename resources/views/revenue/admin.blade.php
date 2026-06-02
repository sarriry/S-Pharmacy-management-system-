<style>
    .revenue-page-wrapper {
        min-height: calc(100vh - 150px);
        padding: 24px 14px;
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 55%, #ecfdf5 100%);
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

    .revenue-table-card {
        background: #ffffff;
        border-radius: 24px;
        padding: 22px;
        border: 1px solid rgba(6, 95, 70, 0.14);
        box-shadow: 0 14px 35px rgba(6, 78, 59, 0.13);
        overflow-x: auto;
    }

    .revenue-table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 14px;
        flex-wrap: wrap;
        padding-bottom: 16px;
        margin-bottom: 18px;
        border-bottom: 1px solid #d1fae5;
    }

    .revenue-table-header h5 {
        margin: 0;
        color: #022c22;
        font-size: 19px;
        font-weight: 900;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .revenue-table-header h5 i {
        color: #047857;
    }

    .revenue-table-header span {
        background: #dcfce7;
        color: #064e3b;
        border-radius: 20px;
        padding: 7px 13px;
        font-size: 12px;
        font-weight: 900;
    }

    .revenue-table-card table.dataTable {
        width: 100% !important;
        border-collapse: separate !important;
        border-spacing: 0 8px !important;
    }

    .revenue-table-card table.dataTable thead th {
        background: linear-gradient(90deg, #064e3b, #022c22) !important;
        color: #ffffff !important;
        border: none !important;
        padding: 14px 10px !important;
        font-weight: 900 !important;
        text-align: center !important;
    }

    .revenue-table-card table.dataTable tbody tr {
        background: #ffffff;
        box-shadow: 0 5px 18px rgba(6, 78, 59, 0.08);
        transition: all 0.25s ease;
    }

    .revenue-table-card table.dataTable tbody tr:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 24px rgba(6, 78, 59, 0.14);
    }

    .revenue-table-card table.dataTable tbody td {
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
        .revenue-hero {
            padding: 22px 18px;
        }

        .revenue-title-box h2 {
            font-size: 24px;
        }

        .revenue-table-card {
            padding: 16px;
        }
    }
</style>

<!-- Revenue Admin View -->
<section class="revenue-page-wrapper">

    <div class="container-fluid">

        <div class="revenue-hero">

            <div class="revenue-hero-content">

                <div class="revenue-title-box">
                    <h2>
                        <i class="fas fa-chart-line me-2"></i>
                        {{ __('revenue.revenue_management') }}
                    </h2>

                    <p>
                        {{ __('revenue.revenue_management_description') }}
                    </p>
                </div>

                <div class="revenue-hero-badge">
                    <i class="fas fa-user-shield"></i>
                    {{ auth()->user()->name ?? __('revenue.admin') }}
                </div>

            </div>

        </div>

        <div class="revenue-table-card">

            <div class="revenue-table-header">
                <h5>
                    <i class="fas fa-table"></i>
                    {{ __('revenue.revenue_table') }}
                </h5>

                <span>
                    <i class="fas fa-database me-1"></i>
                    {{ __('revenue.live_data') }}
                </span>
            </div>

            {{ $dataTable->table() }}

        </div>

    </div>

</section>

@push('scripts')

    {{ $dataTable->scripts() }}

@endpush