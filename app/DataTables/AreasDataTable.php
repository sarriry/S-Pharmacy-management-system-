<?php

namespace App\DataTables;

use App\Models\Area;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AreasDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))

            // POSTAL CODE
            ->editColumn('id', function (Area $area) {
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
                        #' . e($area->id) . '
                    </span>
                ';
            })

            // COUNTRY
            ->addColumn('country', function (Area $area) {
                $country = $area->country_name ?? __('AreasDataTable.no_country');

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
                        ' . e($country) . '
                    </span>
                ';
            })

            // AREA NAME
            ->editColumn('name', function (Area $area) {
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
                        ' . e($area->name) . '
                    </span>
                ';
            })

            // AREA ADDRESS
            ->editColumn('address', function (Area $area) {
                return '
                    <span style="
                        display:inline-flex;
                        align-items:center;
                        justify-content:center;
                        gap:7px;
                        background:#f0fdf4;
                        color:#15803d;
                        padding:7px 13px;
                        border-radius:20px;
                        font-weight:800;
                        font-size:13px;
                        border:1px solid rgba(21,128,61,0.35);
                        box-shadow:0 5px 14px rgba(21,128,61,0.12);
                    ">
                        ' . e($area->address) . '
                    </span>
                ';
            })

            // ACTIONS
            ->addColumn('actions', function (Area $area) {
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
                            class="area-edit-btn"
                            onclick="editmodalShow(event)"
                            id="' . $area->id . '"
                            data-id="' . $area->id . '"
                            data-action="' . route('areas.update', $area->id) . '"
                            data-show-url="' . route('areas.show', $area->id) . '"
                            data-bs-toggle="modal"
                            data-bs-target="#edit"
                            title="' . e(__('AreasDataTable.edit_area')) . '"
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
                            ' . e(__('AreasDataTable.edit')) . '
                        </button>

                        <!-- DELETE BUTTON -->
                        <form method="POST"
                              action="' . route('areas.destroy', $area->id) . '"
                              style="margin:0;">

                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '

                            <button type="button"
                                onclick="deletemodalShow(event)"
                                id="delete_' . $area->id . '"
                                data-bs-toggle="modal"
                                data-bs-target="#del-model"
                                title="' . e(__('AreasDataTable.delete_area')) . '"
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
                                ">
                               ' . e(__('AreasDataTable.delete')) . '
                            </button>

                        </form>

                    </div>
                ';
            })

            ->rawColumns([
                'id',
                'country',
                'name',
                'address',
                'actions',
            ])

            ->setRowId('id');
    }

    public function query(Area $model): QueryBuilder
    {
        return $model->newQuery()
            ->leftJoin('countries', 'areas.country_id', '=', 'countries.id')
            ->select([
                'areas.*',
                'countries.name as country_name',
            ]);
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('areas-table')
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
                    [10, 25, 50, 100, __('AreasDataTable.all')],
                ],

                'language' => [
                    'search' => '',
                    'searchPlaceholder' => __('AreasDataTable.search_area'),
                    'emptyTable' => __('AreasDataTable.empty_table'),
                    'zeroRecords' => __('AreasDataTable.zero_records'),
                    'info' => __('AreasDataTable.info'),
                    'infoEmpty' => __('AreasDataTable.info_empty'),
                    'infoFiltered' => __('AreasDataTable.info_filtered'),
                    'paginate' => [
                        'first' => __('AreasDataTable.first'),
                        'last' => __('AreasDataTable.last'),
                        'next' => __('AreasDataTable.next'),
                        'previous' => __('AreasDataTable.previous'),
                    ],
                ],

                'buttons' => [
                    [
                        'extend' => 'excel',
                        'text' => __('AreasDataTable.excel'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'csv',
                        'text' => __('AreasDataTable.csv'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'pdf',
                        'text' => __('AreasDataTable.pdf'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'print',
                        'text' => __('AreasDataTable.print'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'reload',
                        'text' => __('AreasDataTable.reload'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                ],

                'drawCallback' => 'function() {
                    $("#areas-table").addClass("table table-hover align-middle");

                    $("#areas-table thead").css({
                        "background": "linear-gradient(90deg,#14532d,#15803d,#22c55e)",
                        "color": "#ffffff",
                        "font-weight": "900",
                        "text-align": "center",
                        "letter-spacing": "0.2px"
                    });

                    $("#areas-table thead th").css({
                        "border-color": "rgba(220,252,231,0.55)",
                        "padding": "13px 10px"
                    });

                    $("#areas-table tbody tr").css({
                        "transition": "all 0.25s ease",
                        "background": "#ffffff"
                    });

                    $("#areas-table tbody td").css({
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

                    $("#areas-table_filter input").css({
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
            Column::make('id')
                ->title(__('AreasDataTable.postal_code'))
                ->addClass('text-center'),

            Column::computed('country')
                ->title(__('AreasDataTable.country'))
                ->addClass('text-center'),

            Column::make('name')
                ->title(__('AreasDataTable.area_name'))
                ->addClass('text-center'),

            Column::make('address')
                ->title(__('AreasDataTable.area_address'))
                ->addClass('text-center'),

            Column::computed('actions')
                ->title(__('AreasDataTable.actions'))
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'Areas_' . date('YmdHis');
    }
}