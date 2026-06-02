<?php

namespace App\DataTables;

use App\Models\Pharmacy;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class RevenuesDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))

            // AVATAR
            ->addColumn('avatar', function (Pharmacy $pharmacy) {
                $image = $pharmacy->avatar_image ?? 'default-avatar.jpg';

                return '
                    <div style="display:flex;justify-content:center;align-items:center;">
                        <img src="' . asset("storage/pharmacies_Images/" . $image) . '"
                             alt="' . e(__('RevenuesDataTable.pharmacy_avatar')) . '"
                             style="
                                width:52px;
                                height:52px;
                                border-radius:50%;
                                object-fit:cover;
                                border:3px solid #22c55e;
                                box-shadow:0 7px 18px rgba(22,163,74,0.30);
                                background:#ffffff;
                             ">
                    </div>
                ';
            })

            // PHARMACY NAME
            ->editColumn('pharmacy_name', function (Pharmacy $pharmacy) {
                return '
                    <span style="
                        display:inline-flex;
                        align-items:center;
                        justify-content:center;
                        gap:7px;
                        background:#f0fdf4;
                        color:#14532d;
                        padding:7px 13px;
                        border-radius:20px;
                        font-weight:900;
                        font-size:13px;
                        border:1px solid rgba(22,163,74,0.35);
                        box-shadow:0 5px 14px rgba(22,163,74,0.12);
                    ">
                        ' . e($pharmacy->pharmacy_name) . '
                    </span>
                ';
            })

            // TOTAL ORDERS
            ->addColumn('total_orders', function (Pharmacy $pharmacy) {
                $count = $pharmacy->delivered_orders ?? 0;

                return '
                    <span style="
                        display:inline-flex;
                        align-items:center;
                        justify-content:center;
                        gap:7px;
                        background:#ffffff;
                        color:#166534;
                        padding:7px 13px;
                        border-radius:20px;
                        font-weight:900;
                        font-size:13px;
                        border:1px solid rgba(22,163,74,0.35);
                        box-shadow:0 5px 14px rgba(22,163,74,0.12);
                    ">
                        ' . e($count) . ' ' . e(__('RevenuesDataTable.orders')) . '
                    </span>
                ';
            })

            // TOTAL REVENUE
            ->addColumn('total_revenue', function (Pharmacy $pharmacy) {
                $revenue = number_format((float) ($pharmacy->delivered_revenue ?? 0), 2);

                return '
                    <span style="
                        display:inline-flex;
                        align-items:center;
                        justify-content:center;
                        gap:7px;
                        background:#dcfce7;
                        color:#14532d;
                        padding:7px 13px;
                        border-radius:20px;
                        font-weight:900;
                        font-size:13px;
                        border:1px solid rgba(22,163,74,0.35);
                        box-shadow:0 5px 14px rgba(22,163,74,0.12);
                    ">
                        ' . e(__('RevenuesDataTable.currency')) . ' ' . e($revenue) . '
                    </span>
                ';
            })

            ->rawColumns([
                'avatar',
                'pharmacy_name',
                'total_orders',
                'total_revenue',
            ])

            ->setRowId('id');
    }

    public function query(Pharmacy $model): QueryBuilder
    {
        $revenueSubQuery = DB::table('orders')
            ->selectRaw('
                pharmacy_id,
                COUNT(*) as delivered_orders,
                COALESCE(SUM(price), 0) as delivered_revenue
            ')
            ->where('status', 'Delivered')
            ->groupBy('pharmacy_id');

        return $model->newQuery()
            ->leftJoinSub($revenueSubQuery, 'revenue_totals', function ($join) {
                $join->on('pharmacies.id', '=', 'revenue_totals.pharmacy_id');
            })
            ->select([
                'pharmacies.*',
                DB::raw('COALESCE(revenue_totals.delivered_orders, 0) as delivered_orders'),
                DB::raw('COALESCE(revenue_totals.delivered_revenue, 0) as delivered_revenue'),
            ]);
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('revenues-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->responsive(true)
            ->autoWidth(false)
            ->parameters([

                'dom' => '
                    <"row mb-3 align-items-center"
                        <"col-md-6 d-flex flex-wrap gap-2"B>
                        <"col-md-6"f>
                    >
                    rt
                    <"row mt-3 align-items-center"
                        <"col-md-6"i>
                        <"col-md-6"p>
                    >
                ',

                'pageLength' => 10,

                'lengthMenu' => [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, __('RevenuesDataTable.all')],
                ],

                'language' => [
                    'search' => '',
                    'searchPlaceholder' => __('RevenuesDataTable.search_revenue'),
                    'emptyTable' => __('RevenuesDataTable.empty_table'),
                    'zeroRecords' => __('RevenuesDataTable.zero_records'),
                    'info' => __('RevenuesDataTable.info'),
                    'infoEmpty' => __('RevenuesDataTable.info_empty'),
                    'infoFiltered' => __('RevenuesDataTable.info_filtered'),
                    'paginate' => [
                        'first' => __('RevenuesDataTable.first'),
                        'last' => __('RevenuesDataTable.last'),
                        'next' => __('RevenuesDataTable.next'),
                        'previous' => __('RevenuesDataTable.previous'),
                    ],
                ],

                'buttons' => [
                    [
                        'extend' => 'excel',
                        'text' => __('RevenuesDataTable.excel'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'csv',
                        'text' => __('RevenuesDataTable.csv'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'pdf',
                        'text' => __('RevenuesDataTable.pdf'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'print',
                        'text' => __('RevenuesDataTable.print'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'reload',
                        'text' => __('RevenuesDataTable.reload'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                ],

                'drawCallback' => 'function() {
                    $("#revenues-table").addClass("table table-hover align-middle");

                    $("#revenues-table thead").css({
                        "background": "linear-gradient(90deg,#14532d,#15803d,#22c55e)",
                        "color": "#ffffff",
                        "font-weight": "900",
                        "text-align": "center",
                        "letter-spacing": "0.2px"
                    });

                    $("#revenues-table thead th").css({
                        "border-color": "rgba(220,252,231,0.55)",
                        "padding": "13px 10px"
                    });

                    $("#revenues-table tbody tr").css({
                        "transition": "all 0.25s ease",
                        "background": "#ffffff"
                    });

                    $("#revenues-table tbody td").css({
                        "border-color": "rgba(22,163,74,0.12)",
                        "vertical-align": "middle"
                    });

                    $(".dt-button, .buttons-excel, .buttons-csv, .buttons-pdf, .buttons-print, .buttons-reload").css({
                        "background": "linear-gradient(135deg,#22c55e,#15803d)",
                        "color": "#ffffff",
                        "border": "none",
                        "border-radius": "999px",
                        "padding": "7px 16px",
                        "font-weight": "900",
                        "box-shadow": "0 7px 16px rgba(22,163,74,0.24)"
                    });

                    $("#revenues-table_filter input").css({
                        "border": "1px solid rgba(22,163,74,0.35)",
                        "border-radius": "999px",
                        "padding": "8px 14px",
                        "outline": "none",
                        "box-shadow": "0 5px 14px rgba(22,163,74,0.10)",
                        "color": "#14532d",
                        "font-weight": "700",
                        "background": "#ffffff"
                    });

                    $(".dataTables_info").css({
                        "color": "#14532d",
                        "font-weight": "800"
                    });

                    $(".paginate_button").css({
                        "border-radius": "12px",
                        "font-weight": "800",
                        "color": "#14532d"
                    });

                    $(".paginate_button.current").css({
                        "background": "linear-gradient(135deg,#22c55e,#15803d)",
                        "color": "#ffffff",
                        "border": "none"
                    });
                }',
            ]);
    }

    public function getColumns(): array
    {
        return [
            Column::computed('avatar')
                ->title(__('RevenuesDataTable.avatar'))
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),

            Column::make('pharmacy_name')
                ->title(__('RevenuesDataTable.pharmacy'))
                ->addClass('text-center'),

            Column::computed('total_orders')
                ->title(__('RevenuesDataTable.delivered_orders'))
                ->addClass('text-center'),

            Column::computed('total_revenue')
                ->title(__('RevenuesDataTable.total_revenue'))
                ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'Revenue_' . date('YmdHis');
    }
}