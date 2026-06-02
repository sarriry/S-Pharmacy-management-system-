<style>
    #createOrder .modal-dialog {
        max-width: 860px;
    }

    #createOrder .modal-content {
        border: none;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 22px 60px rgba(6, 78, 59, 0.28);
    }

    #createOrder .modal-header {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        border-bottom: none;
        padding: 20px 24px;
    }

    #createOrder .modal-title {
        font-size: 20px;
        font-weight: 900;
        letter-spacing: 0.4px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    #createOrder .modal-title-icon {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: #ffffff;
        color: #064e3b;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.18);
    }

    #createOrder .btn-close {
        background-color: #ffffff;
        opacity: 1;
        border-radius: 50%;
        padding: 10px;
    }

    #createOrder .modal-body {
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 55%, #ecfdf5 100%);
        padding: 26px;
    }

    #createOrder .order-note {
        background: #dcfce7;
        color: #064e3b;
        border-radius: 16px;
        padding: 12px 15px;
        font-size: 13px;
        font-weight: 800;
        margin-bottom: 18px;
        display: flex;
        align-items: center;
        gap: 8px;
        border: 1px solid rgba(6, 95, 70, 0.18);
    }

    #createOrder .form-group-box {
        margin-bottom: 16px;
    }

    #createOrder .form-label,
    #createOrder label {
        color: #022c22 !important;
        font-weight: 800;
        font-size: 14px;
        margin-bottom: 7px;
        display: flex;
        align-items: center;
        gap: 7px;
    }

    #createOrder .form-label i,
    #createOrder label i {
        color: #047857 !important;
        font-size: 15px;
    }

    #createOrder .input-icon-box {
        position: relative;
    }

    #createOrder .input-icon-box > i {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #047857;
        font-size: 15px;
        z-index: 3;
    }

    #createOrder .form-control,
    #createOrder .form-select {
        min-height: 46px;
        border-radius: 14px;
        border: 1px solid rgba(6, 95, 70, 0.35) !important;
        color: #022c22 !important;
        -webkit-text-fill-color: #022c22 !important;
        font-weight: 700;
        background-color: #ffffff !important;
        box-shadow: none;
        transition: all 0.25s ease;
        caret-color: #022c22 !important;
    }

    #createOrder .input-icon-box .form-control,
    #createOrder .input-icon-box .form-select {
        padding-left: 44px;
    }

    #createOrder .form-control:focus,
    #createOrder .form-select:focus {
        border-color: #047857 !important;
        box-shadow: 0 0 0 0.18rem rgba(4, 120, 87, 0.16);
        color: #022c22 !important;
        -webkit-text-fill-color: #022c22 !important;
        background-color: #ffffff !important;
    }

    #createOrder .form-control::placeholder,
    #createOrder input::placeholder {
        color: #475569 !important;
        -webkit-text-fill-color: #475569 !important;
        opacity: 1 !important;
    }

    #createOrder .select2-container {
        width: 100% !important;
    }

    #createOrder #medicine-select + .select2-container .select2-selection--multiple,
    #createOrder .select2-container--default .select2-selection--multiple {
        min-height: 50px !important;
        border-radius: 14px !important;
        border: 2px solid #047857 !important;
        padding: 6px 10px !important;
        background-color: #ecfdf5 !important;
        color: #022c22 !important;
        -webkit-text-fill-color: #022c22 !important;
    }

    #createOrder .select2-container--default.select2-container--focus .select2-selection--multiple {
        border-color: #064e3b !important;
        box-shadow: 0 0 0 0.18rem rgba(6, 95, 70, 0.18) !important;
    }

    #createOrder .select2-selection__rendered,
    #createOrder .select2-selection__choice,
    #createOrder .select2-selection__choice__display {
        color: #022c22 !important;
        -webkit-text-fill-color: #022c22 !important;
        font-weight: 800 !important;
    }

    #createOrder .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background: #ffffff !important;
        border: 1px solid #047857 !important;
        color: #022c22 !important;
        border-radius: 20px !important;
        padding: 4px 10px !important;
        font-weight: 800 !important;
    }

    #createOrder .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: #991b1b !important;
        -webkit-text-fill-color: #991b1b !important;
        border-right: 1px solid rgba(6, 95, 70, 0.25) !important;
        margin-right: 6px !important;
        font-weight: 900 !important;
    }

    #createOrder .select2-search__field,
    #createOrder .select2-container--default .select2-search--inline .select2-search__field,
    #createOrder .select2-container--default .select2-selection--multiple .select2-search__field {
        color: #022c22 !important;
        -webkit-text-fill-color: #022c22 !important;
        background-color: transparent !important;
        caret-color: #022c22 !important;
        font-weight: 800 !important;
    }

    #createOrder .select2-search__field::placeholder {
        color: #475569 !important;
        -webkit-text-fill-color: #475569 !important;
        opacity: 1 !important;
    }

    .select2-container--default .select2-dropdown {
        background-color: #ffffff !important;
        border: 1px solid #047857 !important;
    }

    .select2-container--default .select2-results__option {
        color: #022c22 !important;
        -webkit-text-fill-color: #022c22 !important;
        background-color: #ffffff !important;
        font-weight: 700 !important;
    }

    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #047857 !important;
        color: #ffffff !important;
        -webkit-text-fill-color: #ffffff !important;
    }

    .select2-container--default .select2-search--dropdown .select2-search__field {
        color: #022c22 !important;
        -webkit-text-fill-color: #022c22 !important;
        background-color: #ffffff !important;
        border: 1px solid #047857 !important;
        caret-color: #022c22 !important;
    }

    #createOrder #input-container {
        width: 100%;
        display: block;
    }

    #createOrder #input-container .alert-info {
        background: #dcfce7 !important;
        color: #064e3b !important;
        border: 1px solid rgba(6, 95, 70, 0.18) !important;
        border-radius: 14px !important;
        font-weight: 800 !important;
    }

    #createOrder #input-container input,
    #createOrder #input-container .form-control,
    #createOrder input[name="quantity[]"],
    #createOrder input[name="quantities[]"],
    #createOrder input[name^="quantity"],
    #createOrder input[name^="quantities"] {
        margin-bottom: 8px !important;
        border-radius: 14px !important;
        border: 2px solid #047857 !important;
        min-height: 46px !important;
        font-weight: 800 !important;
        background-color: #ecfdf5 !important;
        color: #022c22 !important;
        -webkit-text-fill-color: #022c22 !important;
        caret-color: #022c22 !important;
        box-shadow: none !important;
    }

    #createOrder #input-container input:focus,
    #createOrder input[name="quantity[]"]:focus,
    #createOrder input[name="quantities[]"]:focus,
    #createOrder input[name^="quantity"]:focus,
    #createOrder input[name^="quantities"]:focus {
        background-color: #ffffff !important;
        color: #022c22 !important;
        -webkit-text-fill-color: #022c22 !important;
        border-color: #064e3b !important;
        box-shadow: 0 0 0 0.18rem rgba(6, 95, 70, 0.18) !important;
    }

    #createOrder #input-container input::placeholder,
    #createOrder input[name="quantity[]"]::placeholder,
    #createOrder input[name="quantities[]"]::placeholder,
    #createOrder input[name^="quantity"]::placeholder,
    #createOrder input[name^="quantities"]::placeholder {
        color: #475569 !important;
        -webkit-text-fill-color: #475569 !important;
        opacity: 1 !important;
    }

    #createOrder input:-webkit-autofill,
    #createOrder input:-webkit-autofill:hover,
    #createOrder input:-webkit-autofill:focus {
        -webkit-text-fill-color: #022c22 !important;
        box-shadow: 0 0 0 1000px #ecfdf5 inset !important;
        caret-color: #022c22 !important;
    }

    #createOrder .insured-box {
        background: #ffffff;
        border: 1px solid rgba(6, 95, 70, 0.18);
        border-radius: 16px;
        padding: 13px 16px;
        display: flex;
        align-items: center;
        gap: 10px;
        min-height: 46px;
    }

    #createOrder .form-check-input {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }

    #createOrder .form-check-input:checked {
        background-color: #047857;
        border-color: #047857;
    }

    #createOrder #create-order-bill-print-area {
        background: #ffffff !important;
        color: #022c22 !important;
        -webkit-text-fill-color: #022c22 !important;
        padding: 16px;
        border-radius: 18px;
        border: 1px solid rgba(6, 95, 70, 0.18);
        box-shadow: 0 10px 24px rgba(6, 78, 59, 0.08);
    }

    #createOrder #create-order-bill-print-area h4,
    #createOrder #create-order-bill-print-area strong,
    #createOrder #create-order-bill-print-area span,
    #createOrder #create-order-bill-print-area div {
        color: #022c22 !important;
        -webkit-text-fill-color: #022c22 !important;
    }

    #createOrder #bill-preview-table {
        background: #ffffff !important;
        color: #022c22 !important;
        -webkit-text-fill-color: #022c22 !important;
        border-collapse: collapse !important;
        margin-bottom: 0 !important;
    }

    #createOrder #bill-preview-table thead,
    #createOrder #bill-preview-table thead tr,
    #createOrder #bill-preview-table thead th {
        background: linear-gradient(90deg, #064e3b, #022c22) !important;
        color: #ffffff !important;
        -webkit-text-fill-color: #ffffff !important;
        border: 1px solid #064e3b !important;
        font-weight: 900 !important;
        text-align: center !important;
    }

    #createOrder #bill-preview-table tbody,
    #createOrder #bill-preview-table tbody tr {
        background: #ffffff !important;
        color: #022c22 !important;
        -webkit-text-fill-color: #022c22 !important;
    }

    #createOrder #bill-preview-table tbody td {
        background: #ffffff !important;
        color: #022c22 !important;
        -webkit-text-fill-color: #022c22 !important;
        border: 1px solid #d1fae5 !important;
        font-weight: 800 !important;
        text-align: center !important;
        vertical-align: middle !important;
    }

    #createOrder #bill-preview-table tbody tr:nth-child(even) td {
        background: #f0fdf4 !important;
    }

    #createOrder #bill-preview-table tbody tr:hover td {
        background: #dcfce7 !important;
        color: #022c22 !important;
        -webkit-text-fill-color: #022c22 !important;
    }

    #createOrder #bill-preview-table tfoot,
    #createOrder #bill-preview-table tfoot tr,
    #createOrder #bill-preview-table tfoot th {
        background: #ecfdf5 !important;
        color: #022c22 !important;
        -webkit-text-fill-color: #022c22 !important;
        border: 1px solid #d1fae5 !important;
        font-weight: 900 !important;
    }

    #createOrder #bill-grand-total {
        color: #047857 !important;
        -webkit-text-fill-color: #047857 !important;
        font-weight: 900 !important;
    }

    #createOrder .btn-print-bill {
        background: linear-gradient(90deg, #047857, #022c22) !important;
        color: #ffffff !important;
        border: none !important;
        border-radius: 18px;
        padding: 8px 16px;
        font-weight: 900;
        box-shadow: 0 8px 18px rgba(6, 78, 59, 0.22);
        transition: all 0.25s ease;
    }

    #createOrder .btn-print-bill:hover {
        background: linear-gradient(90deg, #059669, #064e3b) !important;
        color: #ffffff !important;
        transform: translateY(-2px);
    }

    #createOrder .modal-footer {
        background: #ffffff;
        border-top: 1px solid #d1fae5;
        padding: 18px 24px;
    }

    #createOrder .btn-cancel-order {
        background: #ecfdf5;
        color: #064e3b;
        border: none;
        border-radius: 24px;
        padding: 10px 24px;
        font-weight: 800;
        transition: all 0.25s ease;
    }

    #createOrder .btn-cancel-order:hover {
        background: #d1fae5;
        color: #022c22;
        transform: translateY(-2px);
    }

    #createOrder .btn-create-order {
        background: linear-gradient(90deg, #047857, #022c22);
        color: #ffffff;
        border: none;
        border-radius: 24px;
        padding: 10px 26px;
        font-weight: 800;
        box-shadow: 0 10px 22px rgba(6, 78, 59, 0.25);
        transition: all 0.25s ease;
    }

    #createOrder .btn-create-order:hover {
        color: #ffffff;
        transform: translateY(-2px);
        background: linear-gradient(90deg, #059669, #064e3b);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.34);
    }

    @media (max-width: 576px) {
        #createOrder .modal-body {
            padding: 20px 16px;
        }

        #createOrder .modal-header {
            padding: 18px 16px;
        }

        #createOrder .modal-footer {
            padding: 16px;
            flex-direction: column;
        }

        #createOrder .btn-cancel-order,
        #createOrder .btn-create-order {
            width: 100%;
        }
    }
</style>

<!-- Create Order Modal -->
<div class="modal fade"
     id="createOrder"
     tabindex="-1"
     aria-labelledby="createOrderModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="createOrderModalLabel">
                    <span class="modal-title-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </span>
                    {{ __('orders.create_new_order') }}
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="{{ __('orders.close') }}">
                </button>

            </div>

            <form method="POST"
                  action="{{ route('orders.store') }}"
                  enctype="multipart/form-data">

                @csrf

                <div class="modal-body">

                    <div class="order-note">
                        <i class="fas fa-info-circle"></i>
                        {{ __('orders.create_order_note') }}
                    </div>

                    <div class="row gy-2 gx-3 align-items-center">

                        <div class="col-md-12 form-group-box">
                            <label class="form-label">
                                <i class="fas fa-user-cog"></i>
                                {{ __('orders.client_option') }}
                            </label>

                            <div class="input-icon-box">
                                <i class="fas fa-users"></i>

                                <select name="client_mode"
                                        id="client_mode"
                                        class="form-control"
                                        required>
                                    <option value="existing" selected>{{ __('orders.select_existing_client') }}</option>
                                    <option value="new">{{ __('orders.add_new_client_manually') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 form-group-box" id="existing_client_box">
                            <label class="form-label">
                                <i class="fas fa-user"></i>
                                {{ __('orders.existing_client') }}
                            </label>

                            <div class="input-icon-box">
                                <i class="fas fa-user-check"></i>

                                <select name="user_id"
                                        id="create_order_client_id"
                                        class="form-control">

                                    <option value="">
                                        {{ __('orders.select_client') }}
                                    </option>

                                    @foreach ($clients as $client)
                                        <option value="{{ $client->user_id }}">
                                            {{ optional($client->User)->name }} / {{ optional($client->User)->email }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="col-md-12" id="new_client_box" style="display:none;">
                            <div class="row gy-2 gx-3">

                                <div class="col-md-6 form-group-box">
                                    <label class="form-label">
                                        <i class="fas fa-user-plus"></i>
                                        {{ __('orders.client_name') }}
                                    </label>

                                    <div class="input-icon-box">
                                        <i class="fas fa-user"></i>
                                        <input name="client_name"
                                               id="client_name"
                                               type="text"
                                               class="form-control"
                                               placeholder="{{ __('orders.enter_client_name') }}">
                                    </div>
                                </div>

                                <div class="col-md-6 form-group-box">
                                    <label class="form-label">
                                        <i class="fas fa-envelope"></i>
                                        {{ __('orders.client_email') }}
                                    </label>

                                    <div class="input-icon-box">
                                        <i class="fas fa-envelope"></i>
                                        <input name="client_email"
                                               id="client_email"
                                               type="email"
                                               class="form-control"
                                               placeholder="{{ __('orders.enter_client_email') }}">
                                    </div>
                                </div>

                                <div class="col-md-6 form-group-box">
                                    <label class="form-label">
                                        <i class="fas fa-phone"></i>
                                        {{ __('orders.client_phone') }}
                                    </label>

                                    <div class="input-icon-box">
                                        <i class="fas fa-phone"></i>
                                        <input name="client_phone"
                                               id="client_phone"
                                               type="text"
                                               class="form-control"
                                               placeholder="{{ __('orders.enter_client_phone') }}">
                                    </div>
                                </div>

                                <div class="col-md-3 form-group-box">
                                    <label class="form-label">
                                        <i class="fas fa-venus-mars"></i>
                                        {{ __('orders.gender') }}
                                    </label>

                                    <select name="client_gender" class="form-control">
                                        <option value="Male">{{ __('orders.male') }}</option>
                                        <option value="Female">{{ __('orders.female') }}</option>
                                    </select>
                                </div>

                                <div class="col-md-3 form-group-box">
                                    <label class="form-label">
                                        <i class="fas fa-calendar"></i>
                                        {{ __('orders.date_of_birth') }}
                                    </label>

                                    <input name="client_date_of_birth"
                                           type="date"
                                           class="form-control">
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12 form-group-box">
                            <label class="form-label">
                                <i class="fas fa-pills"></i>
                                {{ __('orders.medicines') }}
                            </label>

                            <select name="medicine_id[]"
                                    id="medicine-select"
                                    class="select2"
                                    multiple="multiple"
                                    style="width:100%;"
                                    required>

                                @foreach ($medicines as $medicine)
                                    <option value="{{ $medicine->id }}"
                                            data-name="{{ $medicine->name }}"
                                            data-type="{{ $medicine->type }}"
                                            data-price="{{ $medicine->price }}">
                                        {{ $medicine->name }} | {{ $medicine->type }} | {{ $medicine->price }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="col-md-12 form-group-box">
                            <label class="form-label">
                                <i class="fas fa-boxes"></i>
                                {{ __('orders.quantity') }}
                            </label>

                            <div class="input-group" id="input-container"></div>
                        </div>

                        <div class="col-md-12 form-group-box">

                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label class="form-label mb-0">
                                    <i class="fas fa-file-invoice-dollar"></i>
                                    {{ __('orders.bill_preview') }}
                                </label>

                                <button type="button"
                                        class="btn btn-sm btn-print-bill"
                                        onclick="printCreateOrderBill()">
                                    <i class="fas fa-print"></i>
                                    {{ __('orders.print_bill') }}
                                </button>
                            </div>

                            <div id="create-order-bill-print-area">

                                <div class="mb-3">
                                    <h4 class="text-center mb-1">{{ __('orders.pharmacy_bill') }}</h4>

                                    <div class="d-flex justify-content-between flex-wrap">
                                        <strong>
                                            {{ __('orders.client') }}:
                                            <span id="bill-client-name">{{ __('orders.not_selected') }}</span>
                                        </strong>

                                        <strong>
                                            {{ __('orders.date') }}:
                                            <span id="bill-date"></span>
                                        </strong>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="bill-preview-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('orders.medicine') }}</th>
                                                <th>{{ __('orders.type') }}</th>
                                                <th>{{ __('orders.quantity') }}</th>
                                                <th>{{ __('orders.unit_price') }}</th>
                                                <th>{{ __('orders.total') }}</th>
                                            </tr>
                                        </thead>

                                        <tbody id="bill-preview-body">
                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    {{ __('orders.select_medicine_to_preview_bill') }}
                                                </td>
                                            </tr>
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th colspan="5" class="text-end">{{ __('orders.grand_total') }}</th>
                                                <th id="bill-grand-total">0</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6 form-group-box">
                            <label class="form-label">
                                <i class="fas fa-clinic-medical"></i>
                                {{ __('orders.pharmacy_name') }}
                            </label>

                            <div class="input-icon-box">
                                <i class="fas fa-prescription-bottle-alt"></i>

                                <select name="pharmacy_id"
                                        id="create_order_pharmacy_id"
                                        class="form-control">

                                    <option value="">
                                        {{ __('orders.select_pharmacy') }}
                                    </option>

                                    @foreach ($pharmacies as $pharmacy)
                                        <option value="{{ $pharmacy->id }}">
                                            {{ $pharmacy->pharmacy_name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 form-group-box">
                            <label class="form-label">
                                <i class="fas fa-user-md"></i>
                                {{ __('orders.doctor_name') }}
                            </label>

                            <div class="input-icon-box">
                                <i class="fas fa-stethoscope"></i>

                                <select name="doctor_id"
                                        id="create_order_doctor_id"
                                        class="form-control">

                                    <option value="">
                                        {{ __('orders.no_doctor') }}
                                    </option>

                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">
                                            {{ optional($doctor->User)->name }}

                                            @if($doctor->pharmacy)
                                                / {{ $doctor->pharmacy->pharmacy_name }}
                                            @endif
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 form-group-box">
                            <label class="form-label">
                                <i class="fas fa-user-edit"></i>
                                {{ __('orders.order_creator') }}
                            </label>

                            <div class="input-icon-box">
                                <i class="fas fa-user-shield"></i>

                                <select name="creator_type" class="form-control">
                                    <option value="client">{{ __('orders.creator_client') }}</option>
                                    <option value="doctor">{{ __('orders.creator_doctor') }}</option>
                                    <option value="pharmacy">{{ __('orders.creator_pharmacy') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 form-group-box">
                            <label class="form-label">
                                <i class="fas fa-clock"></i>
                                {{ __('orders.status') }}
                            </label>

                            <div class="input-icon-box">
                                <i class="fas fa-hourglass-half"></i>

                                <select name="status" class="form-control">
                                    <option value="WaitingForUserConfirmation" selected>
                                        {{ __('orders.status_waiting_for_user_confirmation') }}
                                    </option>
                                    <option value="New">{{ __('orders.status_new') }}</option>
                                    <option value="Processing">{{ __('orders.status_processing') }}</option>
                                    <option value="Confirmed">{{ __('orders.status_confirmed') }}</option>
                                    <option value="Delivered">{{ __('orders.status_delivered') }}</option>
                                    <option value="Canceled">{{ __('orders.status_canceled') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 form-group-box">
                            <label class="form-label">
                                <i class="fas fa-shield-alt"></i>
                                {{ __('orders.insurance') }}
                            </label>

                            <div class="insured-box">
                                <input name="is_insured"
                                       class="form-check-input"
                                       type="checkbox"
                                       value="1"
                                       id="create_order_is_insured">

                                <label class="form-check-label mb-0" for="create_order_is_insured">
                                    {{ __('orders.insured_order') }}
                                </label>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-cancel-order"
                            data-bs-dismiss="modal">

                        <i class="fas fa-times me-1"></i>
                        {{ __('orders.cancel') }}

                    </button>

                    <button type="submit"
                            class="btn btn-create-order">

                        <i class="fas fa-plus-circle me-1"></i>
                        {{ __('orders.create_order') }}

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>
window.ordersTranslations = {
    manualClient: @json(__('orders.manual_client')),
    notSelected: @json(__('orders.not_selected')),
    pleaseSelectMedicineFirst: @json(__('orders.please_select_medicine_first')),
    quantityFor: @json(__('orders.quantity_for')),
    enterQuantityFor: @json(__('orders.enter_quantity_for')),
    selectMedicineToPreviewBill: @json(__('orders.select_medicine_to_preview_bill')),
    billAreaNotFound: @json(__('orders.bill_area_not_found')),
    allowPopupsToPrintBill: @json(__('orders.allow_popups_to_print_bill')),
    pharmacyBill: @json(__('orders.pharmacy_bill')),
};
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const clientMode = document.getElementById('client_mode');
    const existingClientBox = document.getElementById('existing_client_box');
    const newClientBox = document.getElementById('new_client_box');
    const existingClientSelect = document.getElementById('create_order_client_id');
    const clientNameInput = document.getElementById('client_name');

    const medicineSelect = document.getElementById('medicine-select');
    const inputContainer = document.getElementById('input-container');
    const billPreviewBody = document.getElementById('bill-preview-body');
    const billGrandTotal = document.getElementById('bill-grand-total');
    const billClientName = document.getElementById('bill-client-name');
    const billDate = document.getElementById('bill-date');

    function toggleClientMode() {
        if (!clientMode) {
            return;
        }

        if (clientMode.value === 'new') {
            existingClientBox.style.display = 'none';
            newClientBox.style.display = 'block';

            if (existingClientSelect) {
                existingClientSelect.value = '';
                existingClientSelect.removeAttribute('required');
            }

            if (clientNameInput) {
                clientNameInput.setAttribute('required', 'required');
            }
        } else {
            existingClientBox.style.display = 'block';
            newClientBox.style.display = 'none';

            if (existingClientSelect) {
                existingClientSelect.setAttribute('required', 'required');
            }

            if (clientNameInput) {
                clientNameInput.removeAttribute('required');
            }
        }

        updateBillHeader();
    }

    function updateBillHeader() {
        if (billDate) {
            billDate.textContent = new Date().toLocaleString();
        }

        if (!billClientName) {
            return;
        }

        if (clientMode && clientMode.value === 'new') {
            billClientName.textContent = clientNameInput && clientNameInput.value
                ? clientNameInput.value
                : window.ordersTranslations.manualClient;

            return;
        }

        if (existingClientSelect && existingClientSelect.selectedIndex >= 0) {
            const selectedOption = existingClientSelect.options[existingClientSelect.selectedIndex];

            billClientName.textContent = selectedOption && selectedOption.value
                ? selectedOption.textContent.trim()
                : window.ordersTranslations.notSelected;

            return;
        }

        billClientName.textContent = window.ordersTranslations.notSelected;
    }

    if (clientMode) {
        clientMode.addEventListener('change', toggleClientMode);
        toggleClientMode();
    }

    if (existingClientSelect) {
        existingClientSelect.addEventListener('change', updateBillHeader);
    }

    if (clientNameInput) {
        clientNameInput.addEventListener('input', updateBillHeader);
    }

    function createQuantityInputs() {
        if (!medicineSelect || !inputContainer) {
            return;
        }

        inputContainer.innerHTML = '';

        const selectedOptions = Array.from(medicineSelect.selectedOptions);

        if (selectedOptions.length === 0) {
            inputContainer.innerHTML = `
                <div class="alert alert-info w-100 mb-0">
                    ${window.ordersTranslations.pleaseSelectMedicineFirst}
                </div>
            `;

            updateBillPreview();
            return;
        }

        selectedOptions.forEach(function (option) {
            const medicineName = option.getAttribute('data-name') || option.textContent.trim();
            const medicineId = option.value;

            const row = document.createElement('div');
            row.className = 'w-100 mb-2';

            row.innerHTML = `
                <label class="form-label" style="color:#022c22 !important; font-weight:800;">
                    ${window.ordersTranslations.quantityFor} ${medicineName}
                </label>

                <input type="number"
                       name="quantity[]"
                       class="form-control medicine-quantity-input"
                       data-medicine-id="${medicineId}"
                       min="1"
                       value="1"
                       required
                       placeholder="${window.ordersTranslations.enterQuantityFor} ${medicineName}"
                       style="
                           background-color:#ecfdf5 !important;
                           color:#022c22 !important;
                           -webkit-text-fill-color:#022c22 !important;
                           border:2px solid #047857 !important;
                           border-radius:14px !important;
                           min-height:46px !important;
                           font-weight:800 !important;
                           caret-color:#022c22 !important;
                           margin-bottom:8px !important;
                       ">
            `;

            inputContainer.appendChild(row);
        });

        document.querySelectorAll('.medicine-quantity-input').forEach(function (input) {
            input.addEventListener('input', updateBillPreview);
            input.addEventListener('change', updateBillPreview);
        });

        updateBillPreview();
    }

    function updateBillPreview() {
        if (!medicineSelect || !billPreviewBody || !billGrandTotal) {
            return;
        }

        updateBillHeader();

        const selectedOptions = Array.from(medicineSelect.selectedOptions);
        const quantityInputs = Array.from(document.querySelectorAll('.medicine-quantity-input'));

        billPreviewBody.innerHTML = '';

        if (selectedOptions.length === 0) {
            billPreviewBody.innerHTML = `
                <tr>
                    <td colspan="6" class="text-center">
                        ${window.ordersTranslations.selectMedicineToPreviewBill}
                    </td>
                </tr>
            `;

            billGrandTotal.textContent = '0';
            return;
        }

        let grandTotal = 0;

        selectedOptions.forEach(function (option, index) {
            const name = option.getAttribute('data-name') || option.textContent.trim();
            const type = option.getAttribute('data-type') || '';
            const price = parseFloat(option.getAttribute('data-price') || '0');

            const quantityInput = quantityInputs[index];
            const quantity = quantityInput ? parseInt(quantityInput.value || '1') : 1;

            const lineTotal = price * quantity;
            grandTotal += lineTotal;

            const row = document.createElement('tr');

            row.innerHTML = `
                <td style="color:#022c22 !important; -webkit-text-fill-color:#022c22 !important;">${index + 1}</td>
                <td style="color:#022c22 !important; -webkit-text-fill-color:#022c22 !important;">${name}</td>
                <td style="color:#022c22 !important; -webkit-text-fill-color:#022c22 !important;">${type}</td>
                <td style="color:#022c22 !important; -webkit-text-fill-color:#022c22 !important;">${quantity}</td>
                <td style="color:#022c22 !important; -webkit-text-fill-color:#022c22 !important;">${price.toFixed(2)}</td>
                <td style="color:#047857 !important; -webkit-text-fill-color:#047857 !important; font-weight:900;">${lineTotal.toFixed(2)}</td>
            `;

            billPreviewBody.appendChild(row);
        });

        billGrandTotal.textContent = grandTotal.toFixed(2);
    }

    if (medicineSelect) {
        medicineSelect.addEventListener('change', createQuantityInputs);

        if (window.jQuery) {
            $('#medicine-select').on('change select2:select select2:unselect', function () {
                setTimeout(createQuantityInputs, 50);
            });
        }

        createQuantityInputs();
    }

    updateBillHeader();
});
</script>

<script>
function printCreateOrderBill() {
    const billArea = document.getElementById('create-order-bill-print-area');

    if (!billArea) {
        alert(window.ordersTranslations.billAreaNotFound);
        return;
    }

    const printWindow = window.open('', '_blank');

    if (!printWindow) {
        alert(window.ordersTranslations.allowPopupsToPrintBill);
        return;
    }

    printWindow.document.write(`
        <!DOCTYPE html>
        <html>
            <head>
                <title>${window.ordersTranslations.pharmacyBill}</title>

                <style>
                    * {
                        box-sizing: border-box;
                    }

                    html,
                    body {
                        margin: 0;
                        padding: 0;
                        background: #ffffff !important;
                        color: #022c22 !important;
                        -webkit-text-fill-color: #022c22 !important;
                        font-family: Arial, sans-serif;
                        -webkit-print-color-adjust: exact !important;
                        print-color-adjust: exact !important;
                    }

                    body {
                        padding: 25px;
                    }

                    h4 {
                        text-align: center;
                        font-size: 24px;
                        font-weight: 900;
                        margin: 0 0 15px;
                        color: #022c22 !important;
                        -webkit-text-fill-color: #022c22 !important;
                    }

                    strong,
                    span,
                    div,
                    p {
                        color: #022c22 !important;
                        -webkit-text-fill-color: #022c22 !important;
                    }

                    table {
                        width: 100%;
                        border-collapse: collapse !important;
                        margin-top: 15px;
                        background: #ffffff !important;
                        color: #022c22 !important;
                        -webkit-text-fill-color: #022c22 !important;
                    }

                    thead,
                    thead tr,
                    thead th {
                        background: #064e3b !important;
                        color: #ffffff !important;
                        -webkit-text-fill-color: #ffffff !important;
                    }

                    th {
                        background: #064e3b !important;
                        color: #ffffff !important;
                        -webkit-text-fill-color: #ffffff !important;
                        border: 1px solid #064e3b !important;
                        padding: 9px;
                        text-align: center;
                        font-size: 14px;
                        font-weight: 900;
                    }

                    td {
                        background: #ffffff !important;
                        color: #022c22 !important;
                        -webkit-text-fill-color: #022c22 !important;
                        border: 1px solid #d1fae5 !important;
                        padding: 9px;
                        text-align: center;
                        font-size: 14px;
                        font-weight: 700;
                    }

                    tbody tr:nth-child(even) td {
                        background: #f0fdf4 !important;
                    }

                    tfoot th {
                        background: #ecfdf5 !important;
                        color: #022c22 !important;
                        -webkit-text-fill-color: #022c22 !important;
                        border: 1px solid #d1fae5 !important;
                        font-weight: 900;
                    }

                    #bill-grand-total {
                        color: #047857 !important;
                        -webkit-text-fill-color: #047857 !important;
                        font-weight: 900 !important;
                    }

                    .d-flex {
                        display: flex;
                    }

                    .justify-content-between {
                        justify-content: space-between;
                    }

                    .flex-wrap {
                        flex-wrap: wrap;
                    }

                    .text-center {
                        text-align: center !important;
                    }

                    .text-end {
                        text-align: right !important;
                    }

                    .mb-1 {
                        margin-bottom: 4px;
                    }

                    .mb-3 {
                        margin-bottom: 16px;
                    }

                    @media print {
                        html,
                        body {
                            background: #ffffff !important;
                            color: #022c22 !important;
                            -webkit-text-fill-color: #022c22 !important;
                        }

                        body {
                            padding: 15px;
                        }

                        table,
                        th,
                        td {
                            -webkit-print-color-adjust: exact !important;
                            print-color-adjust: exact !important;
                        }
                    }
                </style>
            </head>

            <body>
                ${billArea.innerHTML}
            </body>
        </html>
    `);

    printWindow.document.close();
    printWindow.focus();

    setTimeout(function () {
        printWindow.print();
        printWindow.close();
    }, 300);
}
</script>