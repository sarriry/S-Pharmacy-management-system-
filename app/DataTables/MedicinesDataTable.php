<?php

namespace App\DataTables;

use App\Models\Medicine;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class MedicinesDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))

            // ID
            ->editColumn('id', function (Medicine $medicine) {
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
                        #' . e($medicine->id) . '
                    </span>
                ';
            })

            // MEDICINE NAME
            ->editColumn('name', function (Medicine $medicine) {
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
                        ' . e($medicine->name) . '
                    </span>
                ';
            })

            // MEDICINE TYPE
            ->editColumn('type', function (Medicine $medicine) {
                return '
                    <span style="
                        display:inline-flex;
                        align-items:center;
                        justify-content:center;
                        gap:7px;
                        background:#ffffff;
                        color:#15803d;
                        padding:7px 13px;
                        border-radius:20px;
                        font-weight:900;
                        font-size:13px;
                        border:1px solid rgba(21,128,61,0.35);
                        box-shadow:0 5px 14px rgba(21,128,61,0.12);
                    ">
                        ' . e($medicine->type) . '
                    </span>
                ';
            })

            // QUANTITY / STOCK
            ->editColumn('quantity', function (Medicine $medicine) {
                $isLowStock = $medicine->quantity < 10;

                if ($isLowStock) {
                    return '
                        <span style="
                            display:inline-flex;
                            align-items:center;
                            justify-content:center;
                            gap:7px;
                            background:#f0fdf4;
                            color:#166534;
                            padding:7px 13px;
                            border-radius:20px;
                            font-weight:900;
                            font-size:13px;
                            border:1px solid rgba(243, 8, 8, 0.81);
                            box-shadow:0 5px 14px rgba(245, 39, 12, 0.57);
                        ">
                            <i class="fas fa-triangle-exclamation" style="color:#16a34a;"></i>
                            ' . e(__('MedicinesDataTable.low_stock')) . ': ' . e($medicine->quantity) . '
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
                        border:1px solid rgba(22,163,74,0.35);
                        box-shadow:0 5px 14px rgba(22,163,74,0.12);
                    ">
                        ' . e(__('MedicinesDataTable.in_stock')) . ': ' . e($medicine->quantity) . '
                    </span>
                ';
            })

            // PRICE
            ->editColumn('price', function (Medicine $medicine) {
                $price = number_format((float) $medicine->price, 2);

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

            // ACTIONS
            ->addColumn('actions', function (Medicine $medicine) {
                if (!auth()->user()->hasRole('admin')) {
                    return '';
                }

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
                            id="' . $medicine->id . '"
                            data-bs-toggle="modal"
                            data-bs-target="#edit_med"
                            title="' . e(__('MedicinesDataTable.edit_medicine')) . '"
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
                            ">
                           ' . e(__('MedicinesDataTable.edit')) . '
                        </button>

                        <!-- DELETE BUTTON -->
                        <form method="POST"
                              action="' . route("medicines.destroy", $medicine->id) . '"
                              style="margin:0;">

                            ' . csrf_field() . '
                            ' . method_field("DELETE") . '

                            <button type="button"
                                onclick="deletemodalShow(event)"
                                id="delete_' . $medicine->id . '"
                                data-bs-toggle="modal"
                                data-bs-target="#del_med"
                                title="' . e(__('MedicinesDataTable.delete_medicine')) . '"
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
                                ' . e(__('MedicinesDataTable.delete')) . '
                            </button>

                        </form>

                    </div>
                ';
            })

            ->rawColumns([
                'id',
                'name',
                'type',
                'quantity',
                'price',
                'actions',
            ])

            ->setRowId('id');
    }

    public function query(Medicine $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('medicines-table')
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
                    [10, 25, 50, 100, __('MedicinesDataTable.all')],
                ],

                'language' => [
                    'search' => '',
                    'searchPlaceholder' => __('MedicinesDataTable.search_medicine'),
                    'emptyTable' => __('MedicinesDataTable.empty_table'),
                    'zeroRecords' => __('MedicinesDataTable.zero_records'),
                    'info' => __('MedicinesDataTable.info'),
                    'infoEmpty' => __('MedicinesDataTable.info_empty'),
                    'infoFiltered' => __('MedicinesDataTable.info_filtered'),
                    'paginate' => [
                        'first' => __('MedicinesDataTable.first'),
                        'last' => __('MedicinesDataTable.last'),
                        'next' => __('MedicinesDataTable.next'),
                        'previous' => __('MedicinesDataTable.previous'),
                    ],
                ],

                'buttons' => [
                    [
                        'extend' => 'excel',
                        'text' => __('MedicinesDataTable.excel'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'csv',
                        'text' => __('MedicinesDataTable.csv'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'pdf',
                        'text' => __('MedicinesDataTable.pdf'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'print',
                        'text' => __('MedicinesDataTable.print'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'reload',
                        'text' => __('MedicinesDataTable.reload'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                ],

                'drawCallback' => 'function() {
                    $("#medicines-table").addClass("table table-hover align-middle");

                    $("#medicines-table thead").css({
                        "background": "linear-gradient(90deg,#14532d,#15803d,#22c55e)",
                        "color": "#ffffff",
                        "font-weight": "900",
                        "text-align": "center",
                        "letter-spacing": "0.2px"
                    });

                    $("#medicines-table thead th").css({
                        "border-color": "rgba(220,252,231,0.55)",
                        "padding": "13px 10px"
                    });

                    $("#medicines-table tbody tr").css({
                        "transition": "all 0.25s ease",
                        "background": "#ffffff"
                    });

                    $("#medicines-table tbody td").css({
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

                    $("#medicines-table_filter input").css({
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
                ->title(__('MedicinesDataTable.id'))
                ->addClass('text-center'),

            Column::make('name')
                ->title(__('MedicinesDataTable.medicine_name'))
                ->addClass('text-center'),

            Column::make('type')
                ->title(__('MedicinesDataTable.medicine_type'))
                ->addClass('text-center'),

            Column::make('quantity')
                ->title(__('MedicinesDataTable.stock_quantity'))
                ->addClass('text-center'),

            Column::make('price')
                ->title(__('MedicinesDataTable.price'))
                ->addClass('text-center'),
        ];

        if (auth()->user()->hasRole('admin')) {
            $columns[] = Column::computed('actions')
                ->title(__('MedicinesDataTable.actions'))
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center');
        }

        return $columns;
    }

    protected function filename(): string
    {
        return 'Medicines_' . date('YmdHis');
    }
}