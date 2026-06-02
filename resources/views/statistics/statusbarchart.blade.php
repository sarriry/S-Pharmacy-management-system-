<style>
    .status-chart-wrapper {
        width: 100%;
        padding: 24px 14px;
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 55%, #ecfdf5 100%);
    }

    .status-chart-card {
        max-width: 850px;
        margin: 0 auto;
        background: #ffffff;
        border-radius: 26px;
        padding: 24px;
        border: 1px solid rgba(6, 95, 70, 0.14);
        box-shadow: 0 18px 45px rgba(6, 78, 59, 0.16);
        overflow: hidden;
    }

    .status-chart-header {
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

    .status-chart-title {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .status-chart-icon {
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

    .status-chart-title h4 {
        margin: 0;
        font-size: 22px;
        font-weight: 900;
    }

    .status-chart-title p {
        margin: 4px 0 0;
        color: rgba(255, 255, 255, 0.82);
        font-size: 13px;
        font-weight: 600;
    }

    .status-chart-badge {
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

    .status-chart-body {
        background: #f0fdf4;
        border-radius: 22px;
        padding: 20px;
        border: 1px solid #d1fae5;
        min-height: 360px;
    }

    #statusbarChart {
        width: 100% !important;
        min-height: 330px !important;
    }

    @media (max-width: 768px) {
        .status-chart-card {
            padding: 16px;
        }

        .status-chart-header {
            padding: 18px;
        }

        .status-chart-title h4 {
            font-size: 19px;
        }

        .status-chart-body {
            padding: 14px;
        }
    }
</style>

<div class="status-chart-wrapper">

    <div class="status-chart-card">

        <div class="status-chart-header">

            <div class="status-chart-title">

                <div class="status-chart-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>

                <div>
                    <h4>{{ __('statistics.orders_status_chart') }}</h4>
                    <p>{{ __('statistics.orders_status_chart_description') }}</p>
                </div>

            </div>

            <div class="status-chart-badge">
                <i class="fas fa-database"></i>
                {{ __('statistics.live_data') }}
            </div>

        </div>

        <div class="status-chart-body">
            <canvas id="statusbarChart"></canvas>
        </div>

    </div>

</div>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    const statisticsTranslations = {
        numberOfOrders: @json(__('statistics.number_of_orders')),
        unableLoadStatusBarChartData: @json(__('statistics.unable_load_status_bar_chart_data')),
    };

    const barctx = document.getElementById('statusbarChart').getContext('2d');

    const barchart = new Chart(barctx, {
        type: 'bar',

        data: {
            labels: [],
            datasets: [{
                label: statisticsTranslations.numberOfOrders,
                data: [],
                backgroundColor: [
                    'rgba(4, 120, 87, 0.22)',
                    'rgba(6, 95, 70, 0.22)',
                    'rgba(5, 150, 105, 0.22)',
                    'rgba(2, 44, 34, 0.22)',
                    'rgba(20, 83, 45, 0.22)'
                ],
                borderColor: [
                    'rgba(4, 120, 87, 1)',
                    'rgba(6, 95, 70, 1)',
                    'rgba(5, 150, 105, 1)',
                    'rgba(2, 44, 34, 1)',
                    'rgba(20, 83, 45, 1)'
                ],
                borderWidth: 2,
                borderRadius: 10,
                barThickness: 42
            }]
        },

        options: {
            indexAxis: 'x',
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    display: true,
                    labels: {
                        color: '#022c22',
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
            },

            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: '#334155',
                        font: {
                            weight: 'bold'
                        },
                        precision: 0
                    },
                    grid: {
                        color: 'rgba(6, 95, 70, 0.16)'
                    }
                },

                x: {
                    ticks: {
                        color: '#334155',
                        font: {
                            weight: 'bold'
                        }
                    },
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    $.ajax({
        url: '{{ route('statusbarchart.data') }}',
        type: 'GET',
        dataType: 'json',

        success: function(data) {
            barchart.data.labels = data.labels;
            barchart.data.datasets[0].data = data.data;
            barchart.update();
        },

        error: function() {
            console.error(statisticsTranslations.unableLoadStatusBarChartData);
        }
    });
</script>