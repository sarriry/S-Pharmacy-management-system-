<?php

namespace App\DataTables;

use App\Models\Client;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ClientsDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))

            // AVATAR
            ->addColumn('avatar', function (Client $client) {
                $image = $client->avatar_image ?: 'default-avatar.jpg';

                return '
                    <div style="display:flex;justify-content:center;align-items:center;">
                        <img src="' . asset("storage/clients_Images/" . $image) . '"
                             alt="' . e(__('ClientsDataTable.client_avatar')) . '"
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

            // NATIONAL ID
            ->editColumn('id', function (Client $client) {
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
                        #' . e($client->id) . '
                    </span>
                ';
            })

            // NAME
            ->addColumn('name', function (Client $client) {
                $name = optional($client->user)->name ?? __('ClientsDataTable.no_name');

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
                        ' . e($name) . '
                    </span>
                ';
            })

            // EMAIL
            ->addColumn('email', function (Client $client) {
                $email = optional($client->user)->email ?? __('ClientsDataTable.no_email');

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
                        ' . e($email) . '
                    </span>
                ';
            })

            // PHONE
            ->editColumn('phone', function (Client $client) {
                $phone = $client->phone ?? __('ClientsDataTable.no_phone');

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
                        font-weight:900;
                        font-size:13px;
                        border:1px solid rgba(21,128,61,0.35);
                        box-shadow:0 5px 14px rgba(21,128,61,0.12);
                    ">
                        ' . e($phone) . '
                    </span>
                ';
            })

            // GENDER
            ->addColumn('gender', function (Client $client) {
                if ($client->gender === 'Female') {
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
                            ' . e(__('ClientsDataTable.female')) . '
                        </span>
                    ';
                }

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
                        ' . e(__('ClientsDataTable.male')) . '
                    </span>
                ';
            })

            // ACTIONS
            ->addColumn('actions', function (Client $client) {
                return '
                    <div style="
                        display:flex;
                        justify-content:center;
                        align-items:center;
                        gap:7px;
                        flex-wrap:wrap;
                    ">

                        <!-- VIEW CLIENT BUTTON -->
                        <button type="button"
                            onclick="clientshowmodalShow(event)"
                            id="' . $client->id . '"
                            data-bs-toggle="modal"
                            data-bs-target="#show-client"
                            title="' . e(__('ClientsDataTable.view_client')) . '"
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
                           ' . e(__('ClientsDataTable.view')) . '
                        </button>

                        <!-- ADDRESS BUTTON -->
                        <button type="button"
                            class="open-addresses-btn"
                            data-client-id="' . $client->id . '"
                            data-bs-toggle="modal"
                            data-bs-target="#show-addresses"
                            title="' . e(__('ClientsDataTable.client_addresses')) . '"
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
                             ' . e(__('ClientsDataTable.address')) . '
                        </button>

                        <!-- EDIT BUTTON -->
                        <button type="button"
                            onclick="clienteditmodalShow(event)"
                            id="' . $client->id . '"
                            data-id="' . $client->id . '"
                            data-user-id="' . e(optional($client->user)->id) . '"
                            data-name="' . e(optional($client->user)->name) . '"
                            data-email="' . e(optional($client->user)->email) . '"
                            data-date-of-birth="' . e($client->date_of_birth) . '"
                            data-gender="' . e($client->gender) . '"
                            data-phone="' . e($client->phone) . '"
                            data-bs-toggle="modal"
                            data-bs-target="#client-edit"
                            title="' . e(__('ClientsDataTable.edit_client')) . '"
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
                            ' . e(__('ClientsDataTable.edit')) . '
                        </button>

                        <!-- DELETE BUTTON -->
                        <form method="POST" action="' . route("clients.destroy", $client->id) . '" style="margin:0;">
                            ' . csrf_field() . '
                            ' . method_field("DELETE") . '

                            <button type="button"
                                onclick="clientdeletemodalShow(event)"
                                id="delete_' . $client->id . '"
                                data-bs-toggle="modal"
                                data-bs-target="#client-del-model"
                                title="' . e(__('ClientsDataTable.delete_client')) . '"
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
                                ' . e(__('ClientsDataTable.delete')) . '
                            </button>
                        </form>

                    </div>
                ';
            })

            ->rawColumns([
                'avatar',
                'id',
                'name',
                'email',
                'phone',
                'gender',
                'actions',
            ])

            ->setRowId('id');
    }

    public function query(Client $model): QueryBuilder
    {
        return $model->newQuery()
            ->with('user');
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('clients-table')
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
                    [10, 25, 50, 100, __('ClientsDataTable.all')],
                ],

                'language' => [
                    'search' => '',
                    'searchPlaceholder' => __('ClientsDataTable.search_client'),
                    'emptyTable' => __('ClientsDataTable.empty_table'),
                    'zeroRecords' => __('ClientsDataTable.zero_records'),
                    'info' => __('ClientsDataTable.info'),
                    'infoEmpty' => __('ClientsDataTable.info_empty'),
                    'infoFiltered' => __('ClientsDataTable.info_filtered'),
                    'paginate' => [
                        'first' => __('ClientsDataTable.first'),
                        'last' => __('ClientsDataTable.last'),
                        'next' => __('ClientsDataTable.next'),
                        'previous' => __('ClientsDataTable.previous'),
                    ],
                ],

                'buttons' => [
                    [
                        'extend' => 'excel',
                        'text' => __('ClientsDataTable.excel'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'csv',
                        'text' => __('ClientsDataTable.csv'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'pdf',
                        'text' => __('ClientsDataTable.pdf'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'print',
                        'text' => __('ClientsDataTable.print'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'reload',
                        'text' => __('ClientsDataTable.reload'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                ],

                'drawCallback' => 'function() {
                    $("#clients-table").addClass("table table-hover align-middle");

                    $("#clients-table thead").css({
                        "background": "linear-gradient(90deg,#14532d,#15803d,#22c55e)",
                        "color": "#ffffff",
                        "font-weight": "900",
                        "text-align": "center",
                        "letter-spacing": "0.2px"
                    });

                    $("#clients-table thead th").css({
                        "border-color": "rgba(220,252,231,0.55)",
                        "padding": "13px 10px"
                    });

                    $("#clients-table tbody tr").css({
                        "transition": "all 0.25s ease",
                        "background": "#ffffff"
                    });

                    $("#clients-table tbody td").css({
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

                    $("#clients-table_filter input").css({
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
                ->title(__('ClientsDataTable.avatar'))
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),

            Column::make('id')
                ->title(__('ClientsDataTable.national_id'))
                ->addClass('text-center'),

            Column::computed('name')
                ->title(__('ClientsDataTable.client_name'))
                ->addClass('text-center'),

            Column::computed('email')
                ->title(__('ClientsDataTable.email_address'))
                ->addClass('text-center'),

            Column::make('phone')
                ->title(__('ClientsDataTable.phone_number'))
                ->addClass('text-center'),

            Column::computed('gender')
                ->title(__('ClientsDataTable.gender'))
                ->addClass('text-center'),

            Column::computed('actions')
                ->title(__('ClientsDataTable.actions'))
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'Clients_' . date('YmdHis');
    }
}