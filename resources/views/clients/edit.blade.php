<style>
    #client-edit .modal-content,
    #show-addresses .modal-content,
    #address-del-model .modal-content,
    #address-edit .modal-content,
    #create-address .modal-content {
        border: none;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 22px 60px rgba(6, 78, 59, 0.25);
    }

    #client-edit .modal-header,
    #show-addresses .modal-header,
    #address-del-model .modal-header,
    #address-edit .modal-header,
    #create-address .modal-header {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        border-bottom: none;
        padding: 20px 24px;
    }

    #client-edit .modal-title,
    #show-addresses .modal-title,
    #address-del-model .modal-title,
    #address-edit .modal-title,
    #create-address .modal-title {
        font-size: 20px;
        font-weight: 900;
        letter-spacing: 0.4px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .client-modal-icon {
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

    #address-del-model .client-modal-icon {
        color: #064e3b;
    }

    #client-edit .btn-close,
    #show-addresses .btn-close,
    #address-del-model .btn-close,
    #address-edit .btn-close,
    #create-address .btn-close {
        background-color: #ffffff;
        opacity: 1;
        border-radius: 50%;
        padding: 10px;
    }

    #client-edit .modal-body,
    #show-addresses .modal-body,
    #address-edit .modal-body,
    #create-address .modal-body {
        background: linear-gradient(135deg, #ecfdf5 0%, #ffffff 55%, #dcfce7 100%);
        padding: 26px;
    }

    #address-del-model .modal-body {
        background: linear-gradient(135deg, #ecfdf5 0%, #ffffff 60%, #dcfce7 100%);
        padding: 32px 26px;
        text-align: center;
    }

    .client-note-box {
        background: #d1fae5;
        color: #064e3b;
        border-radius: 16px;
        padding: 12px 15px;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 18px;
        display: flex;
        align-items: center;
        gap: 8px;
        border: 1px solid rgba(6, 95, 70, 0.16);
    }

    .client-form-box {
        margin-bottom: 16px;
    }

    #client-edit .form-label,
    #address-edit .form-label,
    #create-address .form-label {
        color: #022c22;
        font-weight: 800;
        font-size: 14px;
        margin-bottom: 7px;
        display: flex;
        align-items: center;
        gap: 7px;
    }

    #client-edit .form-label i,
    #address-edit .form-label i,
    #create-address .form-label i {
        color: #065f46;
        font-size: 15px;
    }

    #client-edit .form-control,
    #client-edit .form-select,
    #address-edit .form-control,
    #address-edit .form-select,
    #create-address .form-control,
    #create-address .form-select {
        height: 46px;
        border-radius: 14px;
        border: 1px solid rgba(6, 95, 70, 0.24);
        color: #022c22;
        font-weight: 600;
        background-color: #ffffff;
        box-shadow: none;
        transition: all 0.25s ease;
    }

    #client-edit .form-control:focus,
    #client-edit .form-select:focus,
    #address-edit .form-control:focus,
    #address-edit .form-select:focus,
    #create-address .form-control:focus,
    #create-address .form-select:focus {
        border-color: #065f46;
        box-shadow: 0 0 0 0.18rem rgba(6, 95, 70, 0.15);
    }

    #client-edit .form-control[readonly],
    #client-edit .form-control:read-only {
        background: #f1f5f9;
        color: #64748b;
        cursor: not-allowed;
    }

    .client-file-box {
        background: #ffffff;
        border: 1px dashed rgba(6, 95, 70, 0.4);
        border-radius: 18px;
        padding: 16px;
    }

    #client-edit input[type="file"],
    #address-edit input[type="file"],
    #create-address input[type="file"] {
        height: auto;
        padding: 10px;
    }

    .client-main-check-box {
        background: #d1fae5;
        color: #064e3b;
        border-radius: 16px;
        padding: 13px 15px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 800;
        border: 1px solid rgba(6, 95, 70, 0.18);
        margin-top: 28px;
    }

    .client-main-check-box .form-check-input {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }

    .client-main-check-box .form-check-input:checked {
        background-color: #065f46;
        border-color: #065f46;
    }

    #show-addresses .address-action-bar {
        background: #ffffff;
        border: 1px solid rgba(6, 95, 70, 0.14);
        border-radius: 18px;
        padding: 16px;
        margin-bottom: 18px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        box-shadow: 0 8px 20px rgba(6, 78, 59, 0.08);
    }

    #show-addresses .address-action-title {
        color: #022c22;
        font-weight: 900;
        font-size: 17px;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    #show-addresses .address-action-title i {
        color: #065f46;
    }

    #show-addresses .address-action-subtitle {
        color: #64748b;
        font-size: 13px;
        font-weight: 600;
        margin: 3px 0 0;
    }

    #open-create-address-btn {
        background: linear-gradient(90deg, #065f46, #022c22);
        color: #ffffff;
        border: none;
        border-radius: 24px;
        padding: 10px 20px;
        font-weight: 900;
        box-shadow: 0 10px 22px rgba(6, 78, 59, 0.24);
        transition: all 0.25s ease;
    }

    #open-create-address-btn:hover {
        color: #ffffff;
        transform: translateY(-2px);
        background: linear-gradient(90deg, #047857, #064e3b);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.33);
    }

    #client-editAddresses {
        border-collapse: separate !important;
        border-spacing: 0 8px !important;
        width: 100% !important;
    }

    #client-editAddresses thead th {
        background: linear-gradient(90deg, #064e3b, #022c22) !important;
        color: #ffffff !important;
        border: none !important;
        padding: 13px 10px !important;
        font-weight: 900 !important;
        text-align: center !important;
        font-size: 13px;
    }

    #client-editAddresses tbody tr {
        background: #ffffff;
        box-shadow: 0 5px 18px rgba(6, 78, 59, 0.08);
        transition: all 0.25s ease;
    }

    #client-editAddresses tbody tr:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 24px rgba(6, 78, 59, 0.14);
    }

    #client-editAddresses tbody td {
        vertical-align: middle !important;
        border-top: 1px solid #d1fae5 !important;
        border-bottom: 1px solid #d1fae5 !important;
        padding: 12px 10px !important;
        text-align: center;
        font-weight: 700;
        color: #334155;
    }

    .address-delete-main-icon {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background: #d1fae5;
        color: #064e3b;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 42px;
        margin: 0 auto 18px;
        box-shadow: 0 12px 28px rgba(6, 78, 59, 0.18);
    }

    .address-delete-title {
        color: #022c22;
        font-size: 22px;
        font-weight: 900;
        margin-bottom: 10px;
    }

    .address-delete-text {
        color: #475569;
        font-size: 15px;
        font-weight: 600;
        line-height: 1.7;
        margin-bottom: 0;
    }

    .address-delete-note {
        margin-top: 20px;
        background: #d1fae5;
        color: #064e3b;
        border-radius: 16px;
        padding: 13px 15px;
        font-size: 13px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        border: 1px solid rgba(6, 95, 70, 0.16);
    }

    #client-edit .modal-footer,
    #show-addresses .modal-footer,
    #address-del-model .modal-footer,
    #address-edit .modal-footer,
    #create-address .modal-footer {
        background: #ffffff;
        border-top: 1px solid #d1fae5;
        padding: 18px 24px;
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .btn-client-cancel {
        background: #f1f5f9;
        color: #334155;
        border: none;
        border-radius: 24px;
        padding: 10px 24px;
        font-weight: 800;
        transition: all 0.25s ease;
    }

    .btn-client-cancel:hover {
        background: #e2e8f0;
        color: #022c22;
        transform: translateY(-2px);
    }

    .btn-client-primary,
    .btn-client-success,
    .btn-client-danger {
        background: linear-gradient(90deg, #065f46, #022c22);
        color: #ffffff;
        border: none;
        border-radius: 24px;
        padding: 10px 26px;
        font-weight: 800;
        box-shadow: 0 10px 22px rgba(6, 78, 59, 0.25);
        transition: all 0.25s ease;
    }

    .btn-client-primary:hover,
    .btn-client-success:hover,
    .btn-client-danger:hover {
        color: #ffffff;
        transform: translateY(-2px);
        background: linear-gradient(90deg, #047857, #064e3b);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.34);
    }

    @media (max-width: 576px) {
        #client-edit .modal-body,
        #show-addresses .modal-body,
        #address-edit .modal-body,
        #create-address .modal-body,
        #address-del-model .modal-body {
            padding: 22px 16px;
        }

        #client-edit .modal-footer,
        #show-addresses .modal-footer,
        #address-del-model .modal-footer,
        #address-edit .modal-footer,
        #create-address .modal-footer {
            flex-direction: column;
            padding: 16px;
        }

        .btn-client-cancel,
        .btn-client-primary,
        .btn-client-success,
        .btn-client-danger {
            width: 100%;
        }
    }
</style>

<!-- ===================== EDIT CLIENT MODAL ===================== -->
<div class="modal fade"
     id="client-edit"
     tabindex="-1"
     aria-labelledby="clientEditModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="clientEditModalLabel">
                    <span class="client-modal-icon">
                        <i class="fas fa-user-edit"></i>
                    </span>
                    {{ __('clients.update_client_information') }}
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="{{ __('clients.close') }}">
                </button>

            </div>

            <form method="POST"
                  id="client-edit-form"
                  action=""
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="modal-body">

                    <div class="client-note-box">
                        <i class="fas fa-info-circle"></i>
                        {{ __('clients.update_client_note') }}
                    </div>

                    <div class="row">

                        <div class="col-md-6 client-form-box">
                            <label for="client-edit-name" class="form-label">
                                <i class="fas fa-user"></i>
                                {{ __('clients.client_name') }}
                            </label>

                            <input
                                name="name"
                                type="text"
                                class="form-control client-input"
                                id="client-edit-name"
                                placeholder="{{ __('clients.enter_client_name') }}">
                        </div>

                        <div class="col-md-6 client-form-box">
                            <label for="client-edit-email" class="form-label">
                                <i class="fas fa-envelope"></i>
                                {{ __('clients.email_address') }}
                            </label>

                            <input
                                name="email"
                                type="email"
                                class="form-control client-input"
                                id="client-edit-email"
                                placeholder="{{ __('clients.enter_client_email') }}">
                        </div>

                        <div class="col-md-6 client-form-box">
                            <label for="client-edit-id" class="form-label">
                                <i class="fas fa-id-card"></i>
                                {{ __('clients.national_id') }}
                            </label>

                            <input
                                name="id"
                                type="text"
                                class="form-control client-input"
                                id="client-edit-id"
                                readonly>
                        </div>

                        <div class="col-md-6 client-form-box">
                            <label for="client-edit-birthdate" class="form-label">
                                <i class="fas fa-calendar-alt"></i>
                                {{ __('clients.date_of_birth') }}
                            </label>

                            <input
                                type="date"
                                class="form-control client-input"
                                name="date_of_birth"
                                id="client-edit-birthdate">
                        </div>

                        <div class="col-md-6 client-form-box">
                            <label for="client-edit-gender" class="form-label">
                                <i class="fas fa-venus-mars"></i>
                                {{ __('clients.gender') }}
                            </label>

                            <select
                                name="gender"
                                id="client-edit-gender"
                                class="form-select">

                                <option value="">
                                    {{ __('clients.select_gender') }}
                                </option>

                                <option value="Male">
                                    {{ __('clients.male') }}
                                </option>

                                <option value="Female">
                                    {{ __('clients.female') }}
                                </option>

                            </select>
                        </div>

                        <div class="col-md-6 client-form-box">
                            <label for="client-edit-phone" class="form-label">
                                <i class="fas fa-phone"></i>
                                {{ __('clients.phone_number') }}
                            </label>

                            <input
                                name="phone"
                                type="text"
                                class="form-control client-input"
                                id="client-edit-phone"
                                placeholder="{{ __('clients.enter_phone_number') }}">
                        </div>

                        <div class="col-md-12 client-form-box">
                            <label for="edit-avatar" class="form-label">
                                <i class="fas fa-image"></i>
                                {{ __('clients.client_avatar_image') }}
                            </label>

                            <div class="client-file-box">
                                <input
                                    name="avatar_image"
                                    type="file"
                                    class="form-control client-input"
                                    id="edit-avatar"
                                    accept=".jpg,.jpeg,.png">
                            </div>
                        </div>

                    </div>

                </div>

                <input name="user_id"
                       class="client-input"
                       id="client-userid"
                       hidden>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-client-cancel"
                            data-bs-dismiss="modal">

                        <i class="fas fa-times me-1"></i>
                        {{ __('clients.cancel') }}

                    </button>

                    <button type="submit"
                            class="btn btn-client-primary">

                        <i class="fas fa-save me-1"></i>
                        {{ __('clients.update_client') }}

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<!-- ===================== CLIENT ADDRESSES MODAL ===================== -->
<div class="modal fade"
     id="show-addresses"
     tabindex="-1"
     aria-labelledby="showClientAddressesModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-xl">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="showClientAddressesModalLabel">
                    <span class="client-modal-icon">
                        <i class="fas fa-map-marked-alt"></i>
                    </span>
                    {{ __('clients.client_addresses') }}
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="{{ __('clients.close') }}">
                </button>

            </div>

            <div class="modal-body">

                <div class="address-action-bar">

                    <div>
                        <h5 class="address-action-title">
                            <i class="fas fa-location-dot"></i>
                            {{ __('clients.address_records') }}
                        </h5>

                        <p class="address-action-subtitle">
                            {{ __('clients.address_records_description') }}
                        </p>
                    </div>

                    <button type="button"
                            id="open-create-address-btn"
                            class="btn"
                            data-bs-toggle="modal"
                            data-bs-target="#create-address">

                        <i class="fas fa-plus-circle me-1"></i>
                        {{ __('clients.add_address') }}

                    </button>

                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered"
                           id="client-editAddresses">

                        <thead>
                            <tr>
                                <th>{{ __('clients.postal_code') }}</th>
                                <th>{{ __('clients.area_name') }}</th>
                                <th>{{ __('clients.street_name') }}</th>
                                <th>{{ __('clients.building_no') }}</th>
                                <th>{{ __('clients.floor_no') }}</th>
                                <th>{{ __('clients.flat_no') }}</th>
                                <th>{{ __('clients.main_street') }}</th>
                                <th>{{ __('clients.actions') }}</th>
                            </tr>
                        </thead>

                        <tbody id="client-edit-addresses"></tbody>

                    </table>
                </div>

            </div>

            <div class="modal-footer">

                <button type="button"
                        class="btn btn-client-cancel"
                        data-bs-dismiss="modal">

                    <i class="fas fa-times me-1"></i>
                    {{ __('clients.close') }}

                </button>

            </div>

        </div>

    </div>

</div>


<!-- ===================== DELETE ADDRESS MODAL ===================== -->
<div class="modal fade"
     id="address-del-model"
     tabindex="-1"
     data-bs-backdrop="static"
     aria-labelledby="deleteAddressModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="deleteAddressModalLabel">
                    <span class="client-modal-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                    {{ __('clients.delete_address') }}
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="{{ __('clients.close') }}">
                </button>

            </div>

            <div class="modal-body">

                <div class="address-delete-main-icon">
                    <i class="fas fa-trash-alt"></i>
                </div>

                <h5 class="address-delete-title">
                    {{ __('clients.delete_address_confirm_title') }}
                </h5>

                <p class="address-delete-text">
                    {{ __('clients.delete_address_confirm_text') }}
                </p>

                <div class="address-delete-note">
                    <i class="fas fa-info-circle"></i>
                    {{ __('clients.delete_address_note') }}
                </div>

            </div>

            <div class="modal-footer">

                <button type="button"
                        class="btn btn-client-cancel"
                        data-bs-dismiss="modal">

                    <i class="fas fa-times me-1"></i>
                    {{ __('clients.cancel') }}

                </button>

                <button id="delete-address"
                        type="button"
                        class="btn btn-client-danger">

                    <i class="fas fa-trash me-1"></i>
                    {{ __('clients.delete_address') }}

                </button>

            </div>

        </div>

    </div>

</div>


<!-- ===================== EDIT ADDRESS MODAL ===================== -->
<div class="modal fade"
     id="address-edit"
     tabindex="-1"
     aria-labelledby="editAddressModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="editAddressModalLabel">
                    <span class="client-modal-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </span>
                    {{ __('clients.edit_address') }}
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="{{ __('clients.close') }}">
                </button>

            </div>

            <form method="POST"
                  id="address-edit-form">

                @csrf
                @method('PUT')

                <div class="modal-body">

                    <div class="client-note-box">
                        <i class="fas fa-info-circle"></i>
                        {{ __('clients.update_address_note') }}
                    </div>

                    <div class="row">

                        <div class="col-md-6 client-form-box">
                            <label for="postal" class="form-label">
                                <i class="fas fa-map"></i>
                                {{ __('clients.area_name') }}
                            </label>

                            <select
                                name="area_id"
                                id="postal"
                                class="form-select">

                                <option value="">
                                    {{ __('clients.select_area') }}
                                </option>

                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}">
                                        {{ $area->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="col-md-6 client-form-box">
                            <label for="street" class="form-label">
                                <i class="fas fa-road"></i>
                                {{ __('clients.street_name') }}
                            </label>

                            <input
                                name="street_name"
                                type="text"
                                class="form-control"
                                id="street"
                                placeholder="{{ __('clients.enter_street_name') }}">
                        </div>

                        <div class="col-md-6 client-form-box">
                            <label for="building" class="form-label">
                                <i class="fas fa-building"></i>
                                {{ __('clients.building_number') }}
                            </label>

                            <input
                                name="building_number"
                                type="text"
                                class="form-control"
                                id="building"
                                placeholder="{{ __('clients.enter_building_number') }}">
                        </div>

                        <div class="col-md-6 client-form-box">
                            <label for="floor" class="form-label">
                                <i class="fas fa-layer-group"></i>
                                {{ __('clients.floor_number') }}
                            </label>

                            <input
                                name="floor_number"
                                type="text"
                                class="form-control"
                                id="floor"
                                placeholder="{{ __('clients.enter_floor_number') }}">
                        </div>

                        <div class="col-md-6 client-form-box">
                            <label for="flat" class="form-label">
                                <i class="fas fa-door-open"></i>
                                {{ __('clients.flat_number') }}
                            </label>

                            <input
                                name="flat_number"
                                type="text"
                                class="form-control"
                                id="flat"
                                placeholder="{{ __('clients.enter_flat_number') }}">
                        </div>

                        <div class="col-md-6 client-form-box">
                            <div class="client-main-check-box">
                                <input
                                    class="form-check-input"
                                    name="is_main"
                                    type="checkbox"
                                    id="main">

                                <label class="form-check-label" for="main">
                                    <i class="fas fa-star me-1"></i>
                                    {{ __('clients.main_address') }}
                                </label>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-client-cancel"
                            data-bs-dismiss="modal">

                        <i class="fas fa-times me-1"></i>
                        {{ __('clients.cancel') }}

                    </button>

                    <button type="submit"
                            class="btn btn-client-primary">

                        <i class="fas fa-save me-1"></i>
                        {{ __('clients.update_address') }}

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<!-- ===================== CREATE ADDRESS MODAL ===================== -->
<div class="modal fade"
     id="create-address"
     tabindex="-1"
     aria-labelledby="createAddressModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="createAddressModalLabel">
                    <span class="client-modal-icon">
                        <i class="fas fa-location-plus"></i>
                    </span>
                    {{ __('clients.create_address') }}
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="{{ __('clients.close') }}">
                </button>

            </div>

            <form method="POST"
                  action="{{ route('addresses.store') }}">

                @csrf

                <input type="hidden"
                       name="client_id"
                       id="address_client_id">

                <div class="modal-body">

                    <div class="client-note-box">
                        <i class="fas fa-info-circle"></i>
                        {{ __('clients.create_address_note') }}
                    </div>

                    <div class="row">

                        <div class="col-md-6 client-form-box">
                            <label class="form-label">
                                <i class="fas fa-map"></i>
                                {{ __('clients.area_name') }}
                            </label>

                            <select name="area_id"
                                    class="form-select">

                                <option value="">
                                    {{ __('clients.select_area') }}
                                </option>

                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}">
                                        {{ $area->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="col-md-6 client-form-box">
                            <label class="form-label">
                                <i class="fas fa-road"></i>
                                {{ __('clients.street_name') }}
                            </label>

                            <input
                                name="street_name"
                                type="text"
                                class="form-control"
                                placeholder="{{ __('clients.enter_street_name') }}">
                        </div>

                        <div class="col-md-6 client-form-box">
                            <label class="form-label">
                                <i class="fas fa-building"></i>
                                {{ __('clients.building_number') }}
                            </label>

                            <input
                                name="building_number"
                                type="text"
                                class="form-control"
                                placeholder="{{ __('clients.enter_building_number') }}">
                        </div>

                        <div class="col-md-6 client-form-box">
                            <label class="form-label">
                                <i class="fas fa-layer-group"></i>
                                {{ __('clients.floor_number') }}
                            </label>

                            <input
                                name="floor_number"
                                type="text"
                                class="form-control"
                                placeholder="{{ __('clients.enter_floor_number') }}">
                        </div>

                        <div class="col-md-6 client-form-box">
                            <label class="form-label">
                                <i class="fas fa-door-open"></i>
                                {{ __('clients.flat_number') }}
                            </label>

                            <input
                                name="flat_number"
                                type="text"
                                class="form-control"
                                placeholder="{{ __('clients.enter_flat_number') }}">
                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-client-cancel"
                            data-bs-dismiss="modal">

                        <i class="fas fa-times me-1"></i>
                        {{ __('clients.cancel') }}

                    </button>

                    <button type="submit"
                            class="btn btn-client-success">

                        <i class="fas fa-plus-circle me-1"></i>
                        {{ __('clients.create_address') }}

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const clientEditModal = document.getElementById('client-edit');
        const clientEditForm = document.getElementById('client-edit-form');

        if (!clientEditModal || !clientEditForm) {
            console.error('Client edit modal or client edit form not found.');
            return;
        }

        clientEditModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;

            if (!button) {
                console.error('Client edit button not found.');
                return;
            }

            const clientId = button.getAttribute('data-id') || button.getAttribute('id');

            if (!clientId) {
                console.error('Client ID is missing from edit button.');
                return;
            }

            clientEditForm.setAttribute('action', "{{ url('clients') }}/" + clientId);

            const userIdInput = document.getElementById('client-userid');
            const idInput = document.getElementById('client-edit-id');
            const nameInput = document.getElementById('client-edit-name');
            const emailInput = document.getElementById('client-edit-email');
            const birthdateInput = document.getElementById('client-edit-birthdate');
            const genderInput = document.getElementById('client-edit-gender');
            const phoneInput = document.getElementById('client-edit-phone');
            const avatarInput = document.getElementById('edit-avatar');

            if (userIdInput) {
                userIdInput.value = button.getAttribute('data-user-id') || '';
            }

            if (idInput) {
                idInput.value = clientId;
            }

            if (nameInput) {
                nameInput.value = button.getAttribute('data-name') || '';
            }

            if (emailInput) {
                emailInput.value = button.getAttribute('data-email') || '';
            }

            if (birthdateInput) {
                birthdateInput.value = button.getAttribute('data-date-of-birth') || '';
            }

            if (genderInput) {
                genderInput.value = button.getAttribute('data-gender') || '';
            }

            if (phoneInput) {
                phoneInput.value = button.getAttribute('data-phone') || '';
            }

            if (avatarInput) {
                avatarInput.value = '';
            }
        });
    });
</script>