<?php

namespace App\DataTables;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class DoctorsDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))

            // AVATAR
            ->addColumn('avatar', function (Doctor $doctor) {
                $image = $doctor->avatar_image ?: 'default-avatar.jpg';

                return '
                    <div style="display:flex;justify-content:center;align-items:center;">
                        <img src="' . asset("storage/doctors_Images/" . $image) . '"
                             alt="' . e(__('DoctorsDataTable.doctor_avatar')) . '"
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
            ->editColumn('id', function (Doctor $doctor) {
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
                        #' . e($doctor->id) . '
                    </span>
                ';
            })

            // NAME
            ->addColumn('name', function (Doctor $doctor) {
                $name = optional($doctor->user)->name ?? __('DoctorsDataTable.no_name');

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
            ->addColumn('email', function (Doctor $doctor) {
                $email = optional($doctor->user)->email ?? __('DoctorsDataTable.no_email');

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

            // ASSIGNED PHARMACY
            ->addColumn('assigned_pharmacy', function (Doctor $doctor) {
                $pharmacyName = optional($doctor->pharmacy)->pharmacy_name ?? __('DoctorsDataTable.no_pharmacy');

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
                        ' . e($pharmacyName) . '
                    </span>
                ';
            })

            // CREATED DATE
            ->addColumn('created_at', function (Doctor $doctor) {
                $date = optional($doctor->created_at)->format('Y-m-d') ?? __('DoctorsDataTable.n_a');

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
                        ' . e($date) . '
                    </span>
                ';
            })

            // BAN STATUS
            ->addColumn('is_banned', function (Doctor $doctor) {
                $isBanned = false;

                if ($doctor->user && method_exists($doctor->user, 'isBanned')) {
                    $isBanned = $doctor->user->isBanned();
                }

                if ($isBanned) {
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
                            ' . e(__('DoctorsDataTable.banned')) . '
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
                        ' . e(__('DoctorsDataTable.active')) . '
                    </span>
                ';
            })

            // BAN / UNBAN BUTTON
            ->addColumn('ban_unban', function (Doctor $doctor) {
                $isBanned = false;

                if ($doctor->user && method_exists($doctor->user, 'isBanned')) {
                    $isBanned = $doctor->user->isBanned();
                }

                $formAction = route('doctors.' . ($isBanned ? 'unban' : 'ban'), $doctor->id);

                if ($isBanned) {
                    return '
                        <form method="POST" action="' . $formAction . '" style="margin:0;display:flex;justify-content:center;">
                            ' . csrf_field() . '

                            <button type="submit"
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
                                ' . e(__('DoctorsDataTable.unban')) . '
                            </button>
                        </form>
                    ';
                }

                return '
                    <form method="POST" action="' . $formAction . '" style="margin:0;display:flex;justify-content:center;">
                        ' . csrf_field() . '

                        <button type="submit"
                            style="
                                background:linear-gradient(135deg,#15803d,#14532d);
                                color:#ffffff;
                                border:none;
                                padding:8px 14px;
                                border-radius:18px;
                                cursor:pointer;
                                font-weight:900;
                                font-size:13px;
                                box-shadow:0 7px 16px rgba(20,83,45,0.28);
                                transition:all 0.22s ease;
                            ">
                            ' . e(__('DoctorsDataTable.ban')) . '
                        </button>
                    </form>
                ';
            })

            // ACTIONS
            ->addColumn('actions', function (Doctor $doctor) {
                $deleteButton = '';

                if (!auth()->user()->hasRole('doctor')) {
                    $deleteButton = '
                        <form method="POST" action="' . route("doctors.destroy", $doctor->id) . '" style="margin:0;">
                            ' . csrf_field() . '
                            ' . method_field("DELETE") . '

                            <button type="button"
                                onclick="deletemodalShow(event)"
                                id="delete_' . $doctor->id . '"
                                data-bs-toggle="modal"
                                data-bs-target="#del-model"
                                title="' . e(__('DoctorsDataTable.delete_doctor')) . '"
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
                                ' . e(__('DoctorsDataTable.delete')) . '
                            </button>
                        </form>
                    ';
                }

                return '
                    <div style="
                        display:flex;
                        justify-content:center;
                        align-items:center;
                        gap:7px;
                        flex-wrap:wrap;
                    ">

                        <button type="button"
                            onclick="doctorshowmodalShow(event)"
                            id="' . $doctor->id . '"
                            data-bs-toggle="modal"
                            data-bs-target="#show-doctor"
                            title="' . e(__('DoctorsDataTable.view_doctor')) . '"
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
                            ' . e(__('DoctorsDataTable.view')) . '
                        </button>

                        <button type="button"
                            onclick="editmodalShow(event)"
                            id="' . $doctor->id . '"
                            data-id="' . $doctor->id . '"
                            data-national-id="' . $doctor->id . '"
                            data-name="' . e(optional($doctor->user)->name) . '"
                            data-email="' . e(optional($doctor->user)->email) . '"
                            data-is-banned="' . (($doctor->user && method_exists($doctor->user, 'isBanned') && $doctor->user->isBanned()) ? 1 : 0) . '"
                            data-bs-toggle="modal"
                            data-bs-target="#edit"
                            title="' . e(__('DoctorsDataTable.edit_doctor')) . '"
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
                            ' . e(__('DoctorsDataTable.edit')) . '
                        </button>

                        ' . $deleteButton . '

                    </div>
                ';
            })

            ->rawColumns([
                'avatar',
                'id',
                'name',
                'email',
                'assigned_pharmacy',
                'created_at',
                'is_banned',
                'ban_unban',
                'actions',
            ])

            ->setRowId('id');
    }

    public function query(Doctor $model): QueryBuilder
    {
        $user = auth()->user();

        if (!$user) {
            return $model->newQuery()->whereRaw('1 = 0');
        }

        // ADMIN: show all doctors
        if ($user->hasRole('admin')) {
            return $model->newQuery()
                ->with(['user', 'pharmacy'])
                ->withBanned();
        }

        // PHARMACY: show doctors of the logged-in pharmacy only
        if ($user->hasRole('pharmacy')) {
            $pharmacyId = optional($user->pharmacy)->id;

            if (!$pharmacyId) {
                return $model->newQuery()->whereRaw('1 = 0');
            }

            return $model->newQuery()
                ->where('pharmacy_id', $pharmacyId)
                ->with(['user', 'pharmacy'])
                ->withBanned();
        }

        // DOCTOR: show only own doctor record
        if ($user->hasRole('doctor')) {
            return $model->newQuery()
                ->where('user_id', $user->id)
                ->with(['user', 'pharmacy']);
        }

        return $model->newQuery()->whereRaw('1 = 0');
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('doctors-table')
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
                    [10, 25, 50, 100, __('DoctorsDataTable.all')],
                ],

                'language' => [
                    'search' => '',
                    'searchPlaceholder' => __('DoctorsDataTable.search_doctor'),
                    'emptyTable' => __('DoctorsDataTable.empty_table'),
                    'zeroRecords' => __('DoctorsDataTable.zero_records'),
                    'info' => __('DoctorsDataTable.info'),
                    'infoEmpty' => __('DoctorsDataTable.info_empty'),
                    'infoFiltered' => __('DoctorsDataTable.info_filtered'),
                    'paginate' => [
                        'first' => __('DoctorsDataTable.first'),
                        'last' => __('DoctorsDataTable.last'),
                        'next' => __('DoctorsDataTable.next'),
                        'previous' => __('DoctorsDataTable.previous'),
                    ],
                ],

                'buttons' => [
                    [
                        'extend' => 'excel',
                        'text' => __('DoctorsDataTable.excel'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'csv',
                        'text' => __('DoctorsDataTable.csv'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'pdf',
                        'text' => __('DoctorsDataTable.pdf'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'print',
                        'text' => __('DoctorsDataTable.print'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                    [
                        'extend' => 'reload',
                        'text' => __('DoctorsDataTable.reload'),
                        'className' => 'btn btn-success btn-sm rounded-pill px-3 fw-bold',
                    ],
                ],

                'drawCallback' => 'function() {
                    $("#doctors-table").addClass("table table-hover align-middle");

                    $("#doctors-table thead").css({
                        "background": "linear-gradient(90deg,#14532d,#15803d,#22c55e)",
                        "color": "#ffffff",
                        "font-weight": "900",
                        "text-align": "center",
                        "letter-spacing": "0.2px"
                    });

                    $("#doctors-table thead th").css({
                        "border-color": "rgba(220,252,231,0.55)",
                        "padding": "13px 10px"
                    });

                    $("#doctors-table tbody tr").css({
                        "transition": "all 0.25s ease",
                        "background": "#ffffff"
                    });

                    $("#doctors-table tbody td").css({
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

                    $("#doctors-table_filter input").css({
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
        $user = auth()->user();

        $columns = [
            Column::computed('avatar')
                ->title(__('DoctorsDataTable.avatar'))
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),

            Column::make('id')
                ->title(__('DoctorsDataTable.national_id'))
                ->addClass('text-center'),

            Column::computed('name')
                ->title(__('DoctorsDataTable.doctor_name'))
                ->addClass('text-center'),

            Column::computed('email')
                ->title(__('DoctorsDataTable.email_address'))
                ->addClass('text-center'),

            Column::computed('created_at')
                ->title(__('DoctorsDataTable.created_date'))
                ->addClass('text-center'),
        ];

        if ($user && $user->hasRole('admin')) {
            $columns[] = Column::computed('assigned_pharmacy')
                ->title(__('DoctorsDataTable.assigned_pharmacy'))
                ->addClass('text-center');

            $columns[] = Column::computed('is_banned')
                ->title(__('DoctorsDataTable.status'))
                ->addClass('text-center');

            $columns[] = Column::computed('ban_unban')
                ->title(__('DoctorsDataTable.control'))
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center');
        }

        if ($user && $user->hasRole('pharmacy')) {
            $columns[] = Column::computed('is_banned')
                ->title(__('DoctorsDataTable.status'))
                ->addClass('text-center');

            $columns[] = Column::computed('ban_unban')
                ->title(__('DoctorsDataTable.control'))
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center');
        }

        $columns[] = Column::computed('actions')
            ->title(__('DoctorsDataTable.actions'))
            ->exportable(false)
            ->printable(false)
            ->addClass('text-center');

        return $columns;
    }

    protected function filename(): string
    {
        return 'Doctors_' . date('YmdHis');
    }
}