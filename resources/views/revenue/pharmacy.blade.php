<style>
    .pharmacy-revenue-wrapper {
        min-height: calc(100vh - 180px);
        padding: 24px 14px;
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 55%, #ecfdf5 100%);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .pharmacy-revenue-card {
        width: 100%;
        max-width: 680px;
        background: #ffffff;
        border: 1px solid rgba(6, 95, 70, 0.14);
        border-radius: 28px;
        overflow: hidden;
        box-shadow: 0 22px 60px rgba(6, 78, 59, 0.22);
    }

    .pharmacy-revenue-header {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        padding: 28px 30px;
        position: relative;
        overflow: hidden;
    }

    .pharmacy-revenue-header::before {
        content: "";
        position: absolute;
        width: 170px;
        height: 170px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.13);
        top: -65px;
        right: -45px;
    }

    .pharmacy-revenue-profile {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        gap: 18px;
    }

    .pharmacy-revenue-profile img {
        width: 76px;
        height: 76px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid rgba(255, 255, 255, 0.85);
        box-shadow: 0 10px 24px rgba(0, 0, 0, 0.20);
        background: #ffffff;
    }

    .pharmacy-revenue-profile h3 {
        margin: 0;
        font-size: 24px;
        font-weight: 900;
        letter-spacing: 0.4px;
    }

    .pharmacy-revenue-profile p {
        margin: 5px 0 0;
        color: rgba(255, 255, 255, 0.84);
        font-size: 14px;
        font-weight: 600;
    }

    .pharmacy-revenue-body {
        padding: 28px;
        background: linear-gradient(135deg, #ffffff 0%, #f0fdf4 100%);
    }

    .revenue-stat-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 16px;
    }

    .revenue-stat-box {
        background: #ffffff;
        border: 1px solid rgba(6, 95, 70, 0.14);
        border-radius: 22px;
        padding: 20px 16px;
        text-align: center;
        box-shadow: 0 10px 24px rgba(6, 78, 59, 0.10);
        transition: all 0.25s ease;
    }

    .revenue-stat-box:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 34px rgba(6, 78, 59, 0.16);
    }

    .revenue-stat-icon {
        width: 54px;
        height: 54px;
        border-radius: 18px;
        margin: 0 auto 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        font-size: 23px;
        box-shadow: 0 8px 18px rgba(6, 78, 59, 0.22);
    }

    .icon-id {
        background: linear-gradient(135deg, #047857, #022c22);
    }

    .icon-orders {
        background: linear-gradient(135deg, #059669, #064e3b);
    }

    .icon-revenue {
        background: linear-gradient(135deg, #065f46, #022c22);
    }

    .revenue-stat-label {
        color: #64748b;
        font-size: 13px;
        font-weight: 800;
        margin-bottom: 6px;
    }

    .revenue-stat-value {
        color: #022c22;
        font-size: 22px;
        font-weight: 900;
        word-break: break-word;
    }

    .pharmacy-revenue-footer {
        margin-top: 22px;
        background: #dcfce7;
        color: #064e3b;
        border: 1px solid rgba(6, 95, 70, 0.18);
        border-radius: 18px;
        padding: 14px 16px;
        font-size: 13px;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-align: center;
    }

    @media (max-width: 768px) {
        .pharmacy-revenue-wrapper {
            padding: 18px 10px;
        }

        .pharmacy-revenue-header {
            padding: 24px 20px;
        }

        .pharmacy-revenue-body {
            padding: 20px;
        }

        .pharmacy-revenue-profile {
            flex-direction: column;
            text-align: center;
        }

        .revenue-stat-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- Revenue Pharmacy View -->
<section class="pharmacy-revenue-wrapper">

    <div class="pharmacy-revenue-card animation__wobble">

        <div class="pharmacy-revenue-header">

            <div class="pharmacy-revenue-profile">

                <img src="{{ asset('storage/pharmacies_Images/' . ($pharmacy['avatar_image'] ?? 'default-avatar.jpg')) }}"
                     alt="{{ __('revenue.pharmacy_image') }}">

                <div>
                    <h3>
                        {{ $pharmacy['pharmacy_name'] ?? __('revenue.pharmacy_name') }}
                    </h3>

                    <p>
                        <i class="fas fa-chart-line me-1"></i>
                        {{ __('revenue.pharmacy_revenue_summary') }}
                    </p>
                </div>

            </div>

        </div>

        <div class="pharmacy-revenue-body">

            <div class="revenue-stat-grid">

                <div class="revenue-stat-box">

                    <div class="revenue-stat-icon icon-id">
                        <i class="fas fa-id-card"></i>
                    </div>

                    <div class="revenue-stat-label">
                        {{ __('revenue.pharmacy_id') }}
                    </div>

                    <div class="revenue-stat-value">
                        {{ $pharmacy['id'] ?? __('revenue.n_a') }}
                    </div>

                </div>

                <div class="revenue-stat-box">

                    <div class="revenue-stat-icon icon-orders">
                        <i class="fas fa-shopping-cart"></i>
                    </div>

                    <div class="revenue-stat-label">
                        {{ __('revenue.total_orders') }}
                    </div>

                    <div class="revenue-stat-value">
                        {{ $orders ?? 0 }}
                    </div>

                </div>

                <div class="revenue-stat-box">

                    <div class="revenue-stat-icon icon-revenue">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>

                    <div class="revenue-stat-label">
                        {{ __('revenue.total_revenue') }}
                    </div>

                    <div class="revenue-stat-value">
                        {{ __('revenue.currency') }} {{ number_format((float) ($revenues ?? 0), 2) }}
                    </div>

                </div>

            </div>

            <div class="pharmacy-revenue-footer">
                <i class="fas fa-info-circle"></i>
                {{ __('revenue.pharmacy_summary_note') }}
            </div>

        </div>

    </div>

</section>