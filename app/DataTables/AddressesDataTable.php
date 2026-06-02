<?php

namespace App\DataTables;

use App\Models\Address;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AddressesDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))

            // ID
            ->editColumn('id', function (Address $address) {
                return '
                    <span style="
                        display:inline-flex;
                        align-items:center;
                        justify-content:center;
                        gap:7px;
                        background:#dbeafe;
                        color:#082f6f;
                        padding:7px 13px;
                        border-radius:20px;
                        font-weight:900;
                        font-size:13px;
                        border:1px solid rgba(13,110,253,0.18);
                        box-shadow:0 5px 14px rgba(13,110,253,0.10);
                    ">
                        #' . e($address->id) . '
                    </span>
                ';
            })

            // CLIENT NAME
            ->addColumn('client-name', function (Address $address) {
                $name = optional(optional($address->client)->user)->name ?? __('AddressesDataTable.no_client');

                return '
                    <span style="
                        display:inline-flex;
                        align-items:center;
                        justify-content:center;
                        gap:7px;
                        background:#bfdbfe;
                        color:#0d47a1;
                        padding:7px 13px;
                        border-radius:20px;
                        font-weight:900;
                        font-size:13px;
                        border:1px solid rgba(13,110,253,0.22);
                        box-shadow:0 5px 14px rgba(13,110,253,0.12);
                    ">
                        ' . e($name) . '
                    </span>
                ';
            })

            // CLIENT EMAIL
            ->addColumn('client-email', function (Address $address) {
                $email = optional(optional($address->client)->user)->email ?? __('AddressesDataTable.no_email');

                return '
                    <span style="
                        display:inline-flex;
                        align-items:center;
                        justify-content:center;
                        gap:7px;
                        background:#eff6ff;
                        color:#1d4ed8;
                        padding:7px 13px;
                        border-radius:20px;
                        font-weight:800;
                        font-size:13px;
                        border:1px solid rgba(37,99,235,0.22);
                        box-shadow:0 5px 14px rgba(37,99,235,0.08);
                    ">
                        ' . e($email) . '
                    </span>
                ';
            })

            // POSTAL CODE
            ->addColumn('area-id', function (Address $address) {
                $postalCode = optional($address->area)->id ?? __('AddressesDataTable.n_a');

                return '
                    <span style="
                        display:inline-flex;
                        align-items:center;
                        justify-content:center;
                        gap:7px;
                        background:#e0f2fe;
                        color:#075985;
                        padding:7px 13px;
                        border-radius:20px;
                        font-weight:900;
                        font-size:13px;
                        border:1px solid rgba(14,165,233,0.25);
                        box-shadow:0 5px 14px rgba(14,165,233,0.10);
                    ">
                        ' . e($postalCode) . '
                    </span>
                ';
            })

            // AREA NAME
            ->addColumn('area-name', function (Address $address) {
                $areaName = optional($address->area)->name ?? __('AddressesDataTable.no_area');

                return '
                    <span style="
                        display:inline-flex;
                        align-items:center;
                        justify-content:center;
                        gap:7px;
                        background:#dbeafe;
                        color:#0d47a1;
                        padding:7px 13px;
                        border-radius:20px;
                        font-weight:900;
                        font-size:13px;
                        border:1px solid rgba(13,110,253,0.22);
                        box-shadow:0 5px 14px rgba(13,110,253,0.10);
                    ">
                        ' . e($areaName) . '
                    </span>
                ';
            })

            // STREET
            ->editColumn('street_name', function (Address $address) {
                $street = $address->street_name ?? __('AddressesDataTable.n_a');

                return '
                    <span style="
                        display:inline-flex;
                        align-items:center;
                        justify-content:center;
                        gap:7px;
                        background:#eff6ff;
                        color:#1e40af;
                        padding:7px 13px;
                        border-radius:20px;
                        font-weight:800;
                        font-size:13px;
                        border:1px solid rgba(30,64,175,0.20);
                        box-shadow:0 5px 14px rgba(30,64,175,0.08);
                    ">
                        ' . e($street) . '
                    </span>
                ';
            })

            // BUILDING
            ->editColumn('building_number', function (Address $address) {
                $building = $address->building_number ?? __('AddressesDataTable.n_a');

                return '
                    <span style="
                        display:inline-flex;
                        align-items:center;
                        justify-content:center;
                        gap:7px;
                        background:#bfdbfe;
                        color:#0d47a1;
                        padding:7px 13px;
                        border-radius:20px;
                        font-weight:900;
                        font-size:13px;
                        border:1px solid rgba(13,110,253,0.22);
                        box-shadow:0 5px 14px rgba(13,110,253,0.10);
                    ">
                        ' . e($building) . '
                    </span>
                ';
            })

            // FLOOR
            ->editColumn('floor_number', function (Address $address) {
                $floor = $address->floor_number ?? __('AddressesDataTable.n_a');

                return '
                    <span style="
                        display:inline-flex;
                        align-items:center;
                        justify-content:center;
                        gap:7px;
                        background:#e0f2fe;
                        color:#075985;
                        padding:7px 13px;
                        border-radius:20px;
                        font-weight:900;
                        font-size:13px;
                        border:1px solid rgba(14,165,233,0.25);
                        box-shadow:0 5px 14px rgba(14,165,233,0.10);
                    ">
                        ' . e($floor) . '
                    </span>
                ';
            })

            // FLAT
            ->editColumn('flat_number', function (Address $address) {
                $flat = $address->flat_number ?? __('AddressesDataTable.n_a');

                return '
                    <span style="
                        display:inline-flex;
                        align-items:center;
                        justify-content:center;
                        gap:7px;
                        background:#dbeafe;
                        color:#082f6f;
                        padding:7px 13px;
                        border-radius:20px;
                        font-weight:900;
                        font-size:13px;
                        border:1px solid rgba(13,110,253,0.18);
                        box-shadow:0 5px 14px rgba(13,110,253,0.10);
                    ">
                        ' . e($flat) . '
                    </span>
                ';
            })

            // MAIN ADDRESS
            ->addColumn('is_main', function (Address $address) {
                if ($address->is_main) {
                    return '
                        <span style="
                            display:inline-flex;
                            align-items:center;
                            justify-content:center;
                            gap:7px;
                            background:#bfdbfe;
                            color:#0d47a1;
                            padding:7px 13px;
                            border-radius:20px;
                            font-weight:900;
                            font-size:13px;
                            border:1px solid rgba(13,110,253,0.22);
                            box-shadow:0 5px 14px rgba(13,110,253,0.12);
                        ">
                            ' . e(__('AddressesDataTable.main')) . '
                        </span>
                    ';
                }

                return '
                    <span style="
                        display:inline-flex;
                        align-items:center;
                        justify-content:center;
                        gap:7px;
                        background:#eff6ff;
                        color:#1d4ed8;
                        padding:7px 13px;
                        border-radius:20px;
                        font-weight:900;
                        font-size:13px;
                        border:1px solid rgba(37,99,235,0.22);
                        box-shadow:0 5px 14px rgba(37,99,235,0.08);
                    ">
                        ' . e(__('AddressesDataTable.no')) . '
                    </span>
                ';
            })

            ->rawColumns([
                'id',
                'client-name',
                'client-email',
                'area-id',
                'area-name',
                'street_name',
                'building_number',
                'floor_number',
                'flat_number',
                'is_main',
            ])

            ->setRowId('id');
    }

    public function query(Address $model): QueryBuilder
    {
        return $model->newQuery()
            ->with(['client.user', 'area']);
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('addresses-table')
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
                    [10, 25, 50, 100, __('AddressesDataTable.all')],
                ],

                'language' => [
                    'search' => '',
                    'searchPlaceholder' => __('AddressesDataTable.search_address'),
                    'emptyTable' => __('AddressesDataTable.empty_table'),
                    'zeroRecords' => __('AddressesDataTable.zero_records'),
                    'info' => __('AddressesDataTable.info'),
                    'infoEmpty' => __('AddressesDataTable.info_empty'),
                    'infoFiltered' => __('AddressesDataTable.info_filtered'),
                    'paginate' => [
                        'first' => __('AddressesDataTable.first'),
                        'last' => __('AddressesDataTable.last'),
                        'next' => __('AddressesDataTable.next'),
                        'previous' => __('AddressesDataTable.previous'),
                    ],
                ],

                'buttons' => [
                    [
                        'extend' => 'excel',
                        'text' => __('AddressesDataTable.excel'),
                        'className' => 'btn btn-primary btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'csv',
                        'text' => __('AddressesDataTable.csv'),
                        'className' => 'btn btn-primary btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'pdf',
                        'text' => __('AddressesDataTable.pdf'),
                        'className' => 'btn btn-primary btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'print',
                        'text' => __('AddressesDataTable.print'),
                        'className' => 'btn btn-primary btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'reload',
                        'text' => __('AddressesDataTable.reload'),
                        'className' => 'btn btn-primary btn-sm rounded-pill px-3 fw-bold',
                    ],
                ],

                'drawCallback' => 'function() {
                    $("#addresses-table").addClass("table table-hover align-middle");

                    $("#addresses-table thead").css({
                        "background": "linear-gradient(90deg,#082f6f,#0d47a1,#f0fdf4)",
                        "color": "#ffffff",
                        "font-weight": "900",
                        "text-align": "center",
                        "letter-spacing": "0.2px"
                    });

                    $("#addresses-table thead th").css({
                        "border-color": "rgba(191,219,254,0.35)",
                        "padding": "13px 10px"
                    });

                    $("#addresses-table tbody tr").css({
                        "transition": "all 0.25s ease"
                    });

                    $(".dt-button, .buttons-excel, .buttons-csv, .buttons-pdf, .buttons-print, .buttons-reload").css({
                        "background": "linear-gradient(135deg,#f0fdf4,#f0fdf4)",
                        "color": "#ffffff",
                        "border": "none",
                        "border-radius": "999px",
                        "padding": "7px 16px",
                        "font-weight": "900",
                        "box-shadow": "0 7px 16px rgba(13,110,253,0.22)"
                    });

                    $("#addresses-table_filter input").css({
                        "border": "1px solid rgba(13,110,253,0.28)",
                        "border-radius": "999px",
                        "padding": "8px 14px",
                        "outline": "none",
                        "box-shadow": "0 5px 14px rgba(13,110,253,0.08)",
                        "color": "#082f6f",
                        "font-weight": "700"
                    });

                    $(".dataTables_info").css({
                        "color": "#082f6f",
                        "font-weight": "800"
                    });

                    $(".paginate_button").css({
                        "border-radius": "12px",
                        "font-weight": "800"
                    });
                }',
            ]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('id')
                ->title(__('AddressesDataTable.id'))
                ->addClass('text-center'),

            Column::computed('client-name')
                ->title(__('AddressesDataTable.client_name'))
                ->addClass('text-center'),

            Column::computed('client-email')
                ->title(__('AddressesDataTable.client_email'))
                ->addClass('text-center'),

            Column::computed('area-id')
                ->title(__('AddressesDataTable.postal_code'))
                ->addClass('text-center'),

            Column::computed('area-name')
                ->title(__('AddressesDataTable.area_name'))
                ->addClass('text-center'),

            Column::make('street_name')
                ->title(__('AddressesDataTable.street_name'))
                ->addClass('text-center'),

            Column::make('building_number')
                ->title(__('AddressesDataTable.building'))
                ->addClass('text-center'),

            Column::make('floor_number')
                ->title(__('AddressesDataTable.floor'))
                ->addClass('text-center'),

            Column::make('flat_number')
                ->title(__('AddressesDataTable.flat'))
                ->addClass('text-center'),

            Column::computed('is_main')
                ->title(__('AddressesDataTable.main_address'))
                ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'Addresses_' . date('YmdHis');
    }
}





;