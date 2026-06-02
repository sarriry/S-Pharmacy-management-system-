<?php

namespace App\DataTables;

use App\Models\Pharmacy;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PharmaciesDataTable extends DataTable
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
                             alt="' . e(__('PharmaciesDataTable.pharmacy_image')) . '"
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

            // OWNER ID
            ->editColumn('id', function (Pharmacy $pharmacy) {
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
                        #' . e($pharmacy->id) . '
                    </span>
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

            // OWNER NAME
            ->addColumn('owner_name', function (Pharmacy $pharmacy) {
                $ownerName = optional($pharmacy->user)->name ?? __('PharmaciesDataTable.no_owner');

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
                        ' . e($ownerName) . '
                    </span>
                ';
            })

            // OWNER EMAIL
            ->addColumn('owner_email', function (Pharmacy $pharmacy) {
                $ownerEmail = optional($pharmacy->user)->email ?? __('PharmaciesDataTable.no_email');

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
                        ' . e($ownerEmail) . '
                    </span>
                ';
            })

            // AREA
            ->addColumn('area', function (Pharmacy $pharmacy) {
                $areaName = optional($pharmacy->area)->name ?? __('PharmaciesDataTable.no_area');

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
                        ' . e($areaName) . '
                    </span>
                ';
            })

            // PRIORITY
            ->editColumn('priority', function (Pharmacy $pharmacy) {
                return '
                    <span style="
                        display:inline-flex;
                        align-items:center;
                        justify-content:center;
                        gap:7px;
                        min-width:70px;
                        background:#ffffff;
                        color:#166534;
                        padding:7px 13px;
                        border-radius:20px;
                        font-weight:900;
                        font-size:13px;
                        border:1px solid rgba(22,163,74,0.35);
                        box-shadow:0 5px 14px rgba(22,163,74,0.12);
                    ">
                        ' . e($pharmacy->priority) . '
                    </span>
                ';
            })

            // STATUS
            ->addColumn('status', function (Pharmacy $pharmacy) {
                if ($pharmacy->deleted_at) {
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
                            ' . e(__('PharmaciesDataTable.deleted')) . '
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
                        ' . e(__('PharmaciesDataTable.active')) . '
                    </span>
                ';
            })

            // ACTIONS
            ->addColumn('actions', function (Pharmacy $pharmacy) {

                // RESTORE BUTTON FOR DELETED PHARMACY
                if ($pharmacy->deleted_at) {
                    return '
                        <div style="display:flex;justify-content:center;align-items:center;">
                            <form method="GET" action="' . route('pharmacies.restore', $pharmacy->id) . '" style="margin:0;">
                                <button type="submit"
                                    onclick="restoreDeletedPharmacy(event)"
                                    style="
                                        background:linear-gradient(135deg,#22c55e,#15803d);
                                        color:#ffffff;
                                        border:none;
                                        padding:8px 14px;
                                        border-radius:18px;
                                        cursor:pointer;
                                        font-weight:900;
                                        font-size:13px;
                                        box-shadow:0 7px 16px rgba(22,163,74,0.28);
                                        transition:all 0.22s ease;
                                    ">
                                    ' . e(__('PharmaciesDataTable.restore')) . '
                                </button>
                            </form>
                        </div>
                    ';
                }

                // NORMAL ACTION BUTTONS
                return '
                    <div style="
                        display:flex;
                        justify-content:center;
                        align-items:center;
                        gap:7px;
                        flex-wrap:wrap;
                    ">

                        <button type="button"
                            onclick="showPharmacyModal(event)"
                            id="' . $pharmacy->id . '"
                            data-bs-toggle="modal"
                            data-bs-target="#showPharmacyModal"
                            title="' . e(__('PharmaciesDataTable.view_pharmacy')) . '"
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
                            View
                        </button>

                        <button type="button"
                            onclick="showEditModal(event)"
                            id="' . $pharmacy->id . '"
                            data-bs-toggle="modal"
                            data-bs-target="#editPharmacyModal"
                            title="' . e(__('PharmaciesDataTable.edit_pharmacy')) . '"
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
                            Edit
                        </button>

                        <button type="button"
                            onclick="showDeleteModal(event)"
                            id="' . $pharmacy->id . '"
                            data-bs-toggle="modal"
                            data-bs-target="#deletePharmacyModal"
                            title="' . e(__('PharmaciesDataTable.delete_pharmacy')) . '"
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
                            Delete
                        </button>

                    </div>
                ';
            })

            ->rawColumns([
                'avatar',
                'id',
                'pharmacy_name',
                'owner_name',
                'owner_email',
                'area',
                'priority',
                'status',
                'actions',
            ])

            ->setRowId('id');
    }

    public function query(Pharmacy $model): QueryBuilder
    {
        $user = auth()->user();

        if ($user && $user->hasRole('admin')) {
            return $model->newQuery()
                ->withTrashed()
                ->with(['user', 'area']);
        }

        if ($user && $user->hasRole('pharmacy')) {
            return $model->newQuery()
                ->where('user_id', $user->id)
                ->withTrashed()
                ->with(['user', 'area']);
        }

        return $model->newQuery()
            ->with(['user', 'area']);
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pharmacies-table')
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
                    [10, 25, 50, 100, __('PharmaciesDataTable.all')],
                ],

                'language' => [
                    'search' => '',
                    'searchPlaceholder' => __('PharmaciesDataTable.search_pharmacy'),
                    'emptyTable' => __('PharmaciesDataTable.empty_table'),
                    'zeroRecords' => __('PharmaciesDataTable.zero_records'),
                    'info' => __('PharmaciesDataTable.info'),
                    'infoEmpty' => __('PharmaciesDataTable.info_empty'),
                    'infoFiltered' => __('PharmaciesDataTable.info_filtered'),
                    'paginate' => [
                        'first' => __('PharmaciesDataTable.first'),
                        'last' => __('PharmaciesDataTable.last'),
                        'next' => __('PharmaciesDataTable.next'),
                        'previous' => __('PharmaciesDataTable.previous'),
                    ],
                ],

                'buttons' => [
                    [
                        'extend' => 'excel',
                        'text' => __('PharmaciesDataTable.excel'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'csv',
                        'text' => __('PharmaciesDataTable.csv'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'pdf',
                        'text' => __('PharmaciesDataTable.pdf'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'print',
                        'text' => __('PharmaciesDataTable.print'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'reload',
                        'text' => __('PharmaciesDataTable.reload'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                ],

                'drawCallback' => 'function() {
                    $("#pharmacies-table").addClass("table table-hover align-middle");

                    $("#pharmacies-table thead").css({
                        "background": "linear-gradient(90deg,#14532d,#15803d,#22c55e)",
                        "color": "#ffffff",
                        "font-weight": "900",
                        "text-align": "center",
                        "letter-spacing": "0.2px"
                    });

                    $("#pharmacies-table thead th").css({
                        "border-color": "rgba(220,252,231,0.55)",
                        "padding": "13px 10px"
                    });

                    $("#pharmacies-table tbody tr").css({
                        "transition": "all 0.25s ease",
                        "background": "#ffffff"
                    });

                    $("#pharmacies-table tbody td").css({
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

                    $("#pharmacies-table_filter input").css({
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
                ->title(__('PharmaciesDataTable.avatar'))
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),

            Column::make('pharmacy_name')
                ->title(__('PharmaciesDataTable.pharmacy_name'))
                ->addClass('text-center'),

            Column::make('id')
                ->title(__('PharmaciesDataTable.owner_id'))
                ->addClass('text-center'),

            Column::computed('owner_name')
                ->title(__('PharmaciesDataTable.owner_name'))
                ->addClass('text-center'),

            Column::computed('owner_email')
                ->title(__('PharmaciesDataTable.owner_email'))
                ->addClass('text-center'),

            Column::computed('area')
                ->title(__('PharmaciesDataTable.area'))
                ->addClass('text-center'),

            Column::make('priority')
                ->title(__('PharmaciesDataTable.priority'))
                ->addClass('text-center'),

            Column::computed('status')
                ->title(__('PharmaciesDataTable.status'))
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),

            Column::computed('actions')
                ->title(__('PharmaciesDataTable.actions'))
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'Pharmacies_' . date('YmdHis');
    }
}