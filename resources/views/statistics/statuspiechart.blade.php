<style>
    .status-pie-wrapper {
        width: 100%;
        padding: 24px 14px;
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 55%, #ecfdf5 100%);
    }

    .status-pie-card {
        max-width: 620px;
        margin: 0 auto;
        background: #ffffff;
        border-radius: 26px;
        padding: 24px;
        border: 1px solid rgba(6, 95, 70, 0.14);
        box-shadow: 0 18px 45px rgba(6, 78, 59, 0.16);
        overflow: hidden;
    }

    .status-pie-header {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        border-radius: 22px;
        padding: 20px 24px;
        margin-bottom: 22px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 14px;
        flex-wrap: wrap;
        box-shadow: 0 12px 28px rgba(6, 78, 59, 0.24);
    }

    .status-pie-title {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .status-pie-icon {
        width: 48px;
        height: 48px;
        border-radius: 16px;
        background: #ffffff;
        color: #064e3b;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.16);
    }

    .status-pie-title h4 {
        margin: 0;
        font-size: 22px;
        font-weight: 900;
    }

    .status-pie-title p {
        margin: 4px 0 0;
        color: rgba(255, 255, 255, 0.82);
        font-size: 13px;
        font-weight: 600;
    }

    .status-pie-badge {
        background: rgba(255, 255, 255, 0.18);
        border: 1px solid rgba(255, 255, 255, 0.24);
        padding: 9px 15px;
        border-radius: 22px;
        font-weight: 900;
        font-size: 13px;
        display: inline-flex;
        align-items: center;
        gap: 7px;
    }

    .status-pie-body {
        background: #f0fdf4;
        border-radius: 22px;
        padding: 22px;
        border: 1px solid #d1fae5;
        min-height: 390px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #statuspieChart {
        width: 100% !important;
        max-width: 430px;
        min-height: 330px !important;
    }

    @media (max-width: 768px) {
        .status-pie-card {
            padding: 16px;
        }

        .status-pie-header {
            padding: 18px;
        }

        .status-pie-title h4 {
            font-size: 19px;
        }

        .status-pie-body {
            padding: 14px;
            min-height: 330px;
        }
    }
</style>

<div class="status-pie-wrapper">

    <div class="status-pie-card">

        <div class="status-pie-header">

            <div class="status-pie-title">

                <div class="status-pie-icon">
                    <i class="fas fa-chart-pie"></i>
                </div>

                <div>
                    <h4>{{ __('statistics.orders_status_pie_chart') }}</h4>
                    <p>{{ __('statistics.orders_status_pie_chart_description') }}</p>
                </div>

            </div>

            <div class="status-pie-badge">
                <i class="fas fa-database"></i>
                {{ __('statistics.live_data') }}
            </div>

        </div>

        <div class="status-pie-body">
            <canvas id="statuspieChart"></canvas>
        </div>

    </div>

</div>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    const statisticsPieTranslations = {
        numberOfOrders: @json(__('statistics.number_of_orders')),
        unableLoadStatusPieChartData: @json(__('statistics.unable_load_status_pie_chart_data')),
    };

    const piectx = document.getElementById('statuspieChart').getContext('2d');

    const piechart = new Chart(piectx, {
        type: 'pie',

        data: {
            labels: [],
            datasets: [{
                label: statisticsPieTranslations.numberOfOrders,
                data: [],
                backgroundColor: [
                    'rgba(4, 120, 87, 0.78)',
                    'rgba(6, 95, 70, 0.78)',
                    'rgba(5, 150, 105, 0.78)',
                    'rgba(2, 44, 34, 0.78)',
                    'rgba(20, 83, 45, 0.78)'
                ],
                borderColor: '#ffffff',
                borderWidth: 3,
                hoverOffset: 14
            }]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        color: '#022c22',
                        padding: 18,
                        usePointStyle: true,
                        pointStyle: 'circle',
                        font: {
                            size: 13,
                            weight: 'bold'
                        }
                    }
                },

                tooltip: {
                    backgroundColor: '#022c22',
                    titleColor: '#ffffff',
                    bodyColor: '#ffffff',
                    padding: 12,
                    cornerRadius: 12
                }
            }
        }
    });

    $.ajax({
        url: '{{ route('statuspiechart.data') }}',
        type: 'GET',
        dataType: 'json',

        success: function(data) {
            piechart.data.labels = data.labels;
            piechart.data.datasets[0].data = data.data;
            piechart.update();
        },

        error: function() {
            console.error(statisticsPieTranslations.unableLoadStatusPieChartData);
        }
    });
</script>