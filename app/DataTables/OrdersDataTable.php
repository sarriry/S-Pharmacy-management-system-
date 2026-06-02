<?php

namespace App\DataTables;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class OrdersDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))

            // ID
            ->editColumn('id', function (Order $order) {
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
                        #' . e($order->id) . '
                    </span>
                ';
            })

            // CLIENT
            ->addColumn('client_name', function (Order $order) {
                $clientName = optional($order->user)->name ?? __('OrdersDataTable.no_client');

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
                        ' . e($clientName) . '
                    </span>
                ';
            })

            // STATUS
            ->editColumn('status', function (Order $order) {
                $status = $order->status ?? 'Unknown';

                if ($status === 'WaitingForUserConfirmation') {
                    return '
                        <div style="
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            gap:7px;
                            flex-wrap:wrap;
                        ">

                            <form method="POST"
                                  action="' . route('orders.accept', $order->id) . '"
                                  style="margin:0;">
                                ' . csrf_field() . '
                                ' . method_field('PATCH') . '

                                <button type="submit"
                                    title="' . e(__('OrdersDataTable.accept_order')) . '"
                                    style="
                                        background:linear-gradient(135deg,#22c55e,#15803d);
                                        color:#ffffff;
                                        border:none;
                                        padding:7px 14px;
                                        border-radius:18px;
                                        cursor:pointer;
                                        font-weight:900;
                                        font-size:12px;
                                        box-shadow:0 7px 16px rgba(22,163,74,0.28);
                                        transition:all 0.22s ease;
                                    ">
                                    ' . e(__('OrdersDataTable.accept')) . '
                                </button>
                            </form>

                            <form method="POST"
                                  action="' . route('orders.cancel', $order->id) . '"
                                  style="margin:0;">
                                ' . csrf_field() . '
                                ' . method_field('PATCH') . '

                                <button type="submit"
                                    title="' . e(__('OrdersDataTable.cancel_order')) . '"
                                    style="
                                        background:linear-gradient(135deg,#16a34a,#166534);
                                        color:#ffffff;
                                        border:none;
                                        padding:7px 14px;
                                        border-radius:18px;
                                        cursor:pointer;
                                        font-weight:900;
                                        font-size:12px;
                                        box-shadow:0 7px 16px rgba(22,101,52,0.28);
                                        transition:all 0.22s ease;
                                    ">
                                    ' . e(__('OrdersDataTable.cancel')) . '
                                </button>
                            </form>

                        </div>
                    ';
                }

                $styles = [
                    'New' => [
                        'bg' => '#ffffff',
                        'color' => '#166534',
                        'label' => __('OrdersDataTable.status_new'),
                    ],
                    'Processing' => [
                        'bg' => '#f0fdf4',
                        'color' => '#15803d',
                        'label' => __('OrdersDataTable.status_processing'),
                    ],
                    'Completed' => [
                        'bg' => '#dcfce7',
                        'color' => '#14532d',
                        'label' => __('OrdersDataTable.status_completed'),
                    ],
                    'Delivered' => [
                        'bg' => '#dcfce7',
                        'color' => '#14532d',
                        'label' => 'Delivered',
                    ],
                    'Canceled' => [
                        'bg' => '#ffffff',
                        'color' => '#166534',
                        'label' => __('OrdersDataTable.status_canceled'),
                    ],
                    'Confirmed' => [
                        'bg' => '#f0fdf4',
                        'color' => '#15803d',
                        'label' => 'Confirmed',
                    ],
                ];

                $style = $styles[$status] ?? [
                    'bg' => '#ffffff',
                    'color' => '#166534',
                    'label' => $status === 'Unknown' ? __('OrdersDataTable.unknown') : $status,
                ];

                return '
                    <span style="
                        display:inline-flex;
                        align-items:center;
                        justify-content:center;
                        gap:7px;
                        background:' . $style['bg'] . ';
                        color:' . $style['color'] . ';
                        padding:7px 13px;
                        border-radius:20px;
                        font-weight:900;
                        font-size:13px;
                        border:1px solid rgba(22,163,74,0.35);
                        box-shadow:0 5px 14px rgba(22,163,74,0.12);
                    ">
                        ' . e($style['label']) . '
                    </span>
                ';
            })

            // INSURANCE
            ->addColumn('is_insured', function (Order $order) {
                if ($order->is_insured) {
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
                            ' . e(__('OrdersDataTable.yes')) . '
                        </span>
                    ';
                }

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
                        border:1px solid rgba(22,163,74,0.30);
                        box-shadow:0 5px 14px rgba(22,163,74,0.10);
                    ">
                        ' . e(__('OrdersDataTable.no')) . '
                    </span>
                ';
            })

            // DOCTOR
            ->addColumn('doctor', function (Order $order) {
                $doctorName = optional(optional($order->doctor)->user)->name ?? __('OrdersDataTable.no_doctor');

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
                        ' . e($doctorName) . '
                    </span>
                ';
            })

            // PRICE
            ->editColumn('price', function (Order $order) {
                $price = number_format((float) ($order->price ?? 0), 2);

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
                        ' . e($price) . '
                    </span>
                ';
            })

            // CREATOR TYPE
            ->editColumn('creator_type', function (Order $order) {
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
                        font-weight:800;
                        font-size:13px;
                        border:1px solid rgba(22,163,74,0.30);
                        box-shadow:0 5px 14px rgba(22,163,74,0.10);
                    ">
                        ' . e($order->creator_type ?? __('OrdersDataTable.n_a')) . '
                    </span>
                ';
            })

            // PHARMACY
            ->addColumn('pharmacy', function (Order $order) {
                $pharmacyName = optional($order->pharmacy)->pharmacy_name ?? __('OrdersDataTable.no_pharmacy');

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
                        ' . e($pharmacyName) . '
                    </span>
                ';
            })

            // ACTIONS
            ->addColumn('actions', function (Order $order) {
                $disabled = !in_array($order->status, ['New', 'Processing', 'WaitingForUserConfirmation']);

                $disabledStyle = $disabled ? 'opacity:0.50;cursor:not-allowed;' : '';
                $disabledAttr = $disabled ? 'disabled' : '';

                return '
                    <div style="
                        display:flex;
                        justify-content:center;
                        align-items:center;
                        gap:7px;
                        flex-wrap:wrap;
                    ">

                        <!-- EDIT BUTTON -->
                        <button type="button"
                            onclick="editmodalShow(event)"
                            id="' . $order->id . '"
                            data-bs-toggle="modal"
                            data-bs-target="#modEdit"
                            title="' . e(__('OrdersDataTable.edit_order')) . '"
                            ' . $disabledAttr . '
                            style="
                                background:linear-gradient(135deg,#22c55e,#15803d);
                                color:#ffffff;
                                border:none;
                                padding:8px 14px;
                                border-radius:14px;
                                cursor:pointer;
                                font-weight:900;
                                font-size:13px;
                                box-shadow:0 7px 16px rgba(22,163,74,0.28);
                                transition:all 0.22s ease;
                                ' . $disabledStyle . '
                            ">
                            ' . e(__('OrdersDataTable.edit')) . '
                        </button>

                        <!-- SHOW BUTTON -->
                        <button type="button"
                            onclick="orderShow(event)"
                            id="' . $order->id . '"
                            data-bs-toggle="modal"
                            data-bs-target="#showOrder"
                            title="' . e(__('OrdersDataTable.view_order')) . '"
                            style="
                                background:linear-gradient(135deg,#16a34a,#166534);
                                color:#ffffff;
                                border:none;
                                padding:8px 14px;
                                border-radius:14px;
                                cursor:pointer;
                                font-weight:900;
                                font-size:13px;
                                box-shadow:0 7px 16px rgba(22,101,52,0.28);
                                transition:all 0.22s ease;
                            ">
                            ' . e(__('OrdersDataTable.view')) . '
                        </button>

                        <!-- DELETE BUTTON -->
                        <button type="button"
                            onclick="deleteOrderModel(event)"
                            id="' . $order->id . '"
                            data-bs-toggle="modal"
                            data-bs-target="#delOrder"
                            title="' . e(__('OrdersDataTable.delete_order')) . '"
                            ' . $disabledAttr . '
                            style="
                                background:linear-gradient(135deg,#15803d,#14532d);
                                color:#ffffff;
                                border:none;
                                padding:8px 14px;
                                border-radius:14px;
                                cursor:pointer;
                                font-weight:900;
                                font-size:13px;
                                box-shadow:0 7px 16px rgba(20,83,45,0.28);
                                transition:all 0.22s ease;
                                ' . $disabledStyle . '
                            ">
                            ' . e(__('OrdersDataTable.delete')) . '
                        </button>

                    </div>
                ';
            })

            ->rawColumns([
                'id',
                'pharmacy',
                'client_name',
                'doctor',
                'status',
                'is_insured',
                'price',
                'creator_type',
                'actions',
            ])

            ->setRowId('id');
    }

    public function query(Order $model): QueryBuilder
    {
        $user = Auth::user();

        $query = $model->newQuery()
            ->with([
                'pharmacy',
                'user',
                'doctor.user',
            ]);

        if ($user->hasRole('pharmacy') && $user->pharmacy) {
            $query->where('pharmacy_id', $user->pharmacy->id);
        }

        if ($user->hasRole('doctor') && $user->doctor) {
            $query->where('pharmacy_id', $user->doctor->pharmacy_id);
        }

        return $query;
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('orders-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
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
                    [10, 25, 50, 100, __('OrdersDataTable.all')],
                ],

                'language' => [
                    'search' => '',
                    'searchPlaceholder' => __('OrdersDataTable.search_order'),
                    'emptyTable' => __('OrdersDataTable.empty_table'),
                    'zeroRecords' => __('OrdersDataTable.zero_records'),
                    'info' => __('OrdersDataTable.info'),
                    'infoEmpty' => __('OrdersDataTable.info_empty'),
                    'infoFiltered' => __('OrdersDataTable.info_filtered'),
                    'paginate' => [
                        'first' => __('OrdersDataTable.first'),
                        'last' => __('OrdersDataTable.last'),
                        'next' => __('OrdersDataTable.next'),
                        'previous' => __('OrdersDataTable.previous'),
                    ],
                ],

                'buttons' => [
                    [
                        'extend' => 'excel',
                        'text' => __('OrdersDataTable.excel'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'csv',
                        'text' => __('OrdersDataTable.csv'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'pdf',
                        'text' => __('OrdersDataTable.pdf'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'print',
                        'text' => __('OrdersDataTable.print'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'reload',
                        'text' => __('OrdersDataTable.reload'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                ],

                'drawCallback' => 'function() {
                    $("#orders-table").addClass("table table-hover align-middle");

                    $("#orders-table thead").css({
                        "background": "linear-gradient(90deg,#14532d,#15803d,#22c55e)",
                        "color": "#ffffff",
                        "font-weight": "900",
                        "text-align": "center",
                        "letter-spacing": "0.2px"
                    });

                    $("#orders-table thead th").css({
                        "border-color": "rgba(220,252,231,0.55)",
                        "padding": "13px 10px"
                    });

                    $("#orders-table tbody tr").css({
                        "transition": "all 0.25s ease",
                        "background": "#ffffff"
                    });

                    $("#orders-table tbody td").css({
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

                    $("#orders-table_filter input").css({
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
        $columns = [
            Column::make('id')
                ->title(__('OrdersDataTable.id'))
                ->addClass('text-center'),

            Column::computed('client_name')
                ->title(__('OrdersDataTable.client'))
                ->addClass('text-center'),

            Column::make('status')
                ->title(__('OrdersDataTable.status'))
                ->addClass('text-center'),

            Column::computed('is_insured')
                ->title(__('OrdersDataTable.insured'))
                ->addClass('text-center'),

            Column::computed('doctor')
                ->title(__('OrdersDataTable.doctor'))
                ->addClass('text-center'),

            Column::make('price')
                ->title(__('OrdersDataTable.price'))
                ->addClass('text-center'),
        ];

        if (Auth::user()->hasRole('admin')) {
            $columns[] = Column::make('creator_type')
                ->title(__('OrdersDataTable.creator'))
                ->addClass('text-center');

            $columns[] = Column::computed('pharmacy')
                ->title(__('OrdersDataTable.pharmacy'))
                ->addClass('text-center');
        }

        $columns[] = Column::computed('actions')
            ->title(__('OrdersDataTable.actions'))
            ->exportable(false)
            ->printable(false)
            ->addClass('text-center');

        return $columns;
    }

    protected function filename(): string
    {
        return 'Orders_' . date('YmdHis');
    }
}