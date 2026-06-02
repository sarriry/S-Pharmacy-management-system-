<style>
    #createPharmacyModal .modal-content {
        border: none;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 20px 55px rgba(6, 78, 59, 0.25);
    }

    #createPharmacyModal .modal-header {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        padding: 20px 24px;
        border-bottom: none;
    }

    #createPharmacyModal .modal-title {
        font-size: 20px;
        font-weight: 800;
        letter-spacing: 0.4px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    #createPharmacyModal .btn-close {
        background-color: #ffffff;
        opacity: 1;
        border-radius: 50%;
        padding: 10px;
    }

    #createPharmacyModal .modal-body {
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 55%, #ecfdf5 100%);
        padding: 26px;
    }

    #createPharmacyModal .form-group-box {
        margin-bottom: 16px;
    }

    #createPharmacyModal .form-label {
        color: #022c22;
        font-weight: 800;
        font-size: 14px;
        margin-bottom: 7px;
        display: flex;
        align-items: center;
        gap: 7px;
    }

    #createPharmacyModal .form-label i {
        color: #047857;
        font-size: 15px;
    }

    #createPharmacyModal .input-group-text {
        background: linear-gradient(135deg, #047857, #022c22);
        color: #ffffff;
        border: none;
        border-radius: 14px 0 0 14px;
        width: 45px;
        display: flex;
        justify-content: center;
    }

    #createPharmacyModal .form-control,
    #createPharmacyModal .form-select {
        height: 46px;
        border-radius: 14px;
        border: 1px solid rgba(6, 95, 70, 0.22);
        color: #022c22;
        font-weight: 600;
        background-color: #ffffff;
        box-shadow: none;
        transition: all 0.25s ease;
    }

    #createPharmacyModal .input-group .form-control {
        border-radius: 0 14px 14px 0;
    }

    #createPharmacyModal .form-control:focus,
    #createPharmacyModal .form-select:focus {
        border-color: #047857;
        box-shadow: 0 0 0 0.18rem rgba(4, 120, 87, 0.16);
    }

    #createPharmacyModal .form-control::placeholder {
        color: #94a3b8;
        font-weight: 500;
    }

    #createPharmacyModal .file-input-box {
        background: #ffffff;
        border: 1px dashed rgba(6, 95, 70, 0.4);
        border-radius: 18px;
        padding: 16px;
    }

    #createPharmacyModal input[type="file"] {
        height: auto;
        padding: 10px;
    }

    #createPharmacyModal .modal-footer {
        background: #ffffff;
        border-top: 1px solid #d1fae5;
        padding: 18px 24px;
    }

    #createPharmacyModal .btn-cancel-custom {
        background: #ecfdf5;
        color: #064e3b;
        border: none;
        border-radius: 22px;
        padding: 10px 22px;
        font-weight: 800;
        transition: all 0.25s ease;
    }

    #createPharmacyModal .btn-cancel-custom:hover {
        background: #d1fae5;
        color: #022c22;
        transform: translateY(-2px);
    }

    #createPharmacyModal .btn-create-custom {
        background: linear-gradient(90deg, #047857, #022c22);
        color: #ffffff;
        border: none;
        border-radius: 22px;
        padding: 10px 24px;
        font-weight: 800;
        box-shadow: 0 10px 22px rgba(6, 78, 59, 0.25);
        transition: all 0.25s ease;
    }

    #createPharmacyModal .btn-create-custom:hover {
        color: #ffffff;
        transform: translateY(-2px);
        background: linear-gradient(90deg, #059669, #064e3b);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.34);
    }

    #createPharmacyModal .modal-note {
        background: #dcfce7;
        color: #064e3b;
        border-radius: 16px;
        padding: 12px 15px;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 18px;
        display: flex;
        align-items: center;
        gap: 8px;
        border: 1px solid rgba(6, 95, 70, 0.18);
    }

    @media (max-width: 576px) {
        #createPharmacyModal .modal-body {
            padding: 20px 16px;
        }

        #createPharmacyModal .modal-header {
            padding: 18px 16px;
        }

        #createPharmacyModal .modal-footer {
            padding: 16px;
        }
    }
</style>

<!-- Create Pharmacy Modal -->
<div class="modal fade" id="createPharmacyModal" tabindex="-1" aria-labelledby="createPharmacyModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="createPharmacyModalLabel">
                    <i class="fas fa-clinic-medical"></i>
                    {{ __('pharmacy.create_new_pharmacy') }}
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="{{ __('pharmacy.close') }}">
                </button>

            </div>

            <form method="POST"
                  action="{{ route('pharmacies.store') }}"
                  id="create-pharmacy-form"
                  enctype="multipart/form-data">

                @csrf

                <div class="modal-body">

                    <div class="modal-note">
                        <i class="fas fa-info-circle"></i>
                        {{ __('pharmacy.create_pharmacy_note') }}
                    </div>

                    <div class="row">

                        <!-- Pharmacy Name -->
                        <div class="col-md-12 form-group-box">
                            <label for="createPharmacyName" class="form-label">
                                <i class="fas fa-prescription-bottle-alt"></i>
                                {{ __('pharmacy.pharmacy_name') }}
                            </label>

                            <input
                                name="pharmacy_name"
                                type="text"
                                class="form-control"
                                id="createPharmacyName"
                                placeholder="{{ __('pharmacy.enter_pharmacy_name') }}"
                                value="{{ old('pharmacy_name') }}">
                        </div>

                        <!-- Owner ID -->
                        <div class="col-md-6 form-group-box">
                            <label for="createPharmacyId" class="form-label">
                                <i class="fas fa-id-card"></i>
                                {{ __('pharmacy.owner_id') }}
                            </label>

                            <input
                                name="id"
                                type="text"
                                class="form-control"
                                id="createPharmacyId"
                                placeholder="{{ __('pharmacy.enter_owner_id') }}"
                                value="{{ old('id') }}">
                        </div>

                        <!-- Owner Name -->
                        <div class="col-md-6 form-group-box">
                            <label for="createPharmacyOwnerName" class="form-label">
                                <i class="fas fa-user"></i>
                                {{ __('pharmacy.owner_name') }}
                            </label>

                            <input
                                name="name"
                                type="text"
                                class="form-control"
                                id="createPharmacyOwnerName"
                                placeholder="{{ __('pharmacy.enter_owner_name') }}"
                                value="{{ old('name') }}">
                        </div>

                        <!-- Owner Email -->
                        <div class="col-md-6 form-group-box">
                            <label for="createPharmacyEmail" class="form-label">
                                <i class="fas fa-envelope"></i>
                                {{ __('pharmacy.owner_email') }}
                            </label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-at"></i>
                                </span>

                                <input
                                    name="email"
                                    type="email"
                                    class="form-control"
                                    id="createPharmacyEmail"
                                    placeholder="{{ __('pharmacy.enter_owner_email') }}"
                                    value="{{ old('email') }}">
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="col-md-6 form-group-box">
                            <label for="createPharmacyPassword" class="form-label">
                                <i class="fas fa-lock"></i>
                                {{ __('pharmacy.password') }}
                            </label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-key"></i>
                                </span>

                                <input
                                    name="password"
                                    type="password"
                                    class="form-control"
                                    id="createPharmacyPassword"
                                    placeholder="{{ __('pharmacy.enter_password') }}">
                            </div>
                        </div>

                        <!-- Priority -->
                        <div class="col-md-6 form-group-box">
                            <label for="createPharmacyPriority" class="form-label">
                                <i class="fas fa-star"></i>
                                {{ __('pharmacy.priority') }}
                            </label>

                            <input
                                name="priority"
                                type="number"
                                class="form-control"
                                id="createPharmacyPriority"
                                placeholder="{{ __('pharmacy.enter_pharmacy_priority') }}"
                                value="{{ old('priority') }}">
                        </div>

                        <!-- Area -->
                        <div class="col-md-6 form-group-box">
                            <label for="createPharmacyArea" class="form-label">
                                <i class="fas fa-map-marker-alt"></i>
                                {{ __('pharmacy.area') }}
                            </label>

                            <select name="area_id" id="createPharmacyArea" class="form-control">
                                <option value="" disabled selected hidden>
                                    {{ __('pharmacy.choose_area') }}
                                </option>

                                @foreach($areas as $area)
                                    <option value="{{ $area->id }}" {{ old('area_id') == $area->id ? 'selected' : '' }}>
                                        {{ $area->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Avatar -->
                        <div class="col-md-12 form-group-box">
                            <label for="createPharmacyAvatar" class="form-label">
                                <i class="fas fa-image"></i>
                                {{ __('pharmacy.pharmacy_avatar_image') }}
                            </label>

                            <div class="file-input-box">
                                <input
                                    name="avatar_image"
                                    type="file"
                                    class="form-control"
                                    id="createPharmacyAvatar"
                                    accept=".jpg,.jpeg,.png,.gif">
                            </div>
                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-cancel-custom"
                        data-bs-dismiss="modal">

                        <i class="fas fa-times me-1"></i>
                        {{ __('pharmacy.cancel') }}

                    </button>

                    <button
                        type="submit"
                        class="btn btn-create-custom">

                        <i class="fas fa-plus-circle me-1"></i>
                        {{ __('pharmacy.create_pharmacy') }}

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>