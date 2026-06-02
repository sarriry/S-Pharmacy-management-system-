<style>
    :root {
        --dark-green: #064e3b;
        --deep-green: #022c22;
        --main-green: #047857;
        --soft-green: #d1fae5;
        --light-green: #ecfdf5;
        --border-green: #a7f3d0;
        --text-green: #064e3b;
        --text-dark: #1f2937;
        --muted-text: #64748b;
        --white: #ffffff;
    }

    #create .modal-content {
        border: none;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 22px 60px rgba(6, 78, 59, 0.28);
        background: var(--white);
    }

    #create .modal-header {
        background: linear-gradient(90deg, var(--deep-green) 0%, var(--dark-green) 55%, var(--main-green) 100%);
        color: var(--white);
        border-bottom: none;
        padding: 20px 24px;
    }

    #create .modal-title {
        font-size: 20px;
        font-weight: 900;
        letter-spacing: 0.4px;
        display: flex;
        align-items: center;
        gap: 10px;
        color: var(--white);
    }

    #create .modal-title-icon {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: var(--white);
        color: var(--dark-green);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.18);
    }

    #create .btn-close {
        background-color: var(--white);
        opacity: 1;
        border-radius: 50%;
        padding: 10px;
        box-shadow: none;
    }

    #create .btn-close:focus {
        box-shadow: 0 0 0 0.18rem rgba(167, 243, 208, 0.45);
    }

    #create .modal-body {
        background: linear-gradient(135deg, var(--light-green) 0%, var(--white) 55%, #f0fdf4 100%);
        padding: 26px;
    }

    #create .area-note {
        background: var(--soft-green);
        color: var(--dark-green);
        border: 1px solid var(--border-green);
        border-radius: 16px;
        padding: 12px 15px;
        font-size: 13px;
        font-weight: 800;
        margin-bottom: 18px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    #create .area-note i {
        color: var(--main-green);
    }

    #create .form-group-box {
        margin-bottom: 16px;
    }

    #create .form-label {
        color: var(--dark-green);
        font-weight: 800;
        font-size: 14px;
        margin-bottom: 7px;
        display: flex;
        align-items: center;
        gap: 7px;
    }

    #create .form-label i {
        color: var(--main-green);
        font-size: 15px;
    }

    #create .input-icon-box {
        position: relative;
    }

    #create .input-icon-box i {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--main-green);
        font-size: 15px;
        z-index: 2;
        pointer-events: none;
    }

    #create .form-control,
    #create .form-select {
        height: 46px;
        border-radius: 14px;
        border: 1px solid var(--border-green);
        color: var(--dark-green) !important;
        font-weight: 700;
        background-color: var(--white) !important;
        box-shadow: none;
        transition: all 0.25s ease;
        padding-left: 44px;
    }

    #create .form-control:focus,
    #create .form-select:focus {
        border-color: var(--main-green);
        color: var(--dark-green) !important;
        background-color: var(--white) !important;
        box-shadow: 0 0 0 0.18rem rgba(4, 120, 87, 0.18);
    }

    #create .form-control::placeholder {
        color: #6b7280;
        font-weight: 600;
        opacity: 1;
    }

    #create .form-select option {
        color: var(--dark-green);
        background-color: var(--white);
        font-weight: 700;
    }

    #create .form-control:disabled,
    #create .form-select:disabled,
    #create .form-control[readonly] {
        background-color: #e5f7ef !important;
        color: var(--dark-green) !important;
        opacity: 1;
    }

    #create .modal-footer {
        background: var(--white);
        border-top: 1px solid var(--border-green);
        padding: 18px 24px;
    }

    #create .btn-cancel-area {
        background: #e5f7ef;
        color: var(--dark-green);
        border: 1px solid var(--border-green);
        border-radius: 24px;
        padding: 10px 24px;
        font-weight: 800;
        transition: all 0.25s ease;
    }

    #create .btn-cancel-area:hover {
        background: var(--soft-green);
        color: var(--deep-green);
        transform: translateY(-2px);
    }

    #create .btn-create-area {
        background: linear-gradient(90deg, var(--dark-green), var(--main-green));
        color: var(--white);
        border: none;
        border-radius: 24px;
        padding: 10px 26px;
        font-weight: 800;
        box-shadow: 0 10px 22px rgba(4, 120, 87, 0.25);
        transition: all 0.25s ease;
    }

    #create .btn-create-area:hover {
        color: var(--white);
        transform: translateY(-2px);
        box-shadow: 0 14px 30px rgba(4, 120, 87, 0.34);
    }

    #create .btn-create-area:focus,
    #create .btn-cancel-area:focus {
        box-shadow: 0 0 0 0.18rem rgba(4, 120, 87, 0.20);
    }

    @media (max-width: 576px) {
        #create .modal-body {
            padding: 20px 16px;
        }

        #create .modal-header {
            padding: 18px 16px;
        }

        #create .modal-footer {
            padding: 16px;
            flex-direction: column;
        }

        #create .btn-cancel-area,
        #create .btn-create-area {
            width: 100%;
        }
    }
</style>

<!-- Create Area Modal -->
<div class="modal fade"
     id="create"
     tabindex="-1"
     aria-labelledby="createAreaModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="createAreaModalLabel">
                    <span class="modal-title-icon">
                        <i class="fas fa-map-marked-alt"></i>
                    </span>
                    {{ __('area.create_new_area') }}
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="{{ __('area.close') }}">
                </button>

            </div>

            <form method="POST"
                  action="{{ route('areas.store') }}"
                  id="create-form"
                  enctype="multipart/form-data">

                @csrf

                <div class="modal-body">

                    <div class="area-note">
                        <i class="fas fa-info-circle"></i>
                        {{ __('area.create_area_note') }}
                    </div>

                    <!-- Country -->
                    <div class="form-group-box">
                        <label for="create_countryId" class="form-label">
                            <i class="fas fa-flag"></i>
                            {{ __('area.country') }}
                        </label>

                        <div class="input-icon-box">
                            <i class="fas fa-globe-asia"></i>

                            <select name="country_id"
                                    id="create_countryId"
                                    class="form-select"
                                    required>

                                <option value="" disabled selected hidden>
                                    {{ __('area.choose_country') }}
                                </option>

                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}">
                                        {{ $country->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <!-- Postal Code -->
                    <div class="form-group-box">
                        <label for="create_areaId" class="form-label">
                            <i class="fas fa-mail-bulk"></i>
                            {{ __('area.postal_code') }}
                        </label>

                        <div class="input-icon-box">
                            <i class="fas fa-hashtag"></i>

                            <input
                                name="id"
                                type="text"
                                class="form-control"
                                id="create_areaId"
                                placeholder="{{ __('area.enter_postal_code') }}"
                                value="{{ old('id') }}"
                                required>
                        </div>
                    </div>

                    <!-- Area Name -->
                    <div class="form-group-box">
                        <label for="create_areaName" class="form-label">
                            <i class="fas fa-map-marker-alt"></i>
                            {{ __('area.area_name') }}
                        </label>

                        <div class="input-icon-box">
                            <i class="fas fa-location-dot"></i>

                            <input
                                name="name"
                                type="text"
                                class="form-control"
                                id="create_areaName"
                                placeholder="{{ __('area.enter_area_name') }}"
                                value="{{ old('name') }}"
                                required>
                        </div>
                    </div>

                    <!-- Area Address -->
                    <div class="form-group-box">
                        <label for="create_areaAddress" class="form-label">
                            <i class="fas fa-road"></i>
                            {{ __('area.area_address') }}
                        </label>

                        <div class="input-icon-box">
                            <i class="fas fa-map"></i>

                            <input
                                name="address"
                                type="text"
                                class="form-control"
                                id="create_areaAddress"
                                placeholder="{{ __('area.enter_area_address') }}"
                                value="{{ old('address') }}"
                                required>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-cancel-area"
                            data-bs-dismiss="modal">

                        <i class="fas fa-times me-1"></i>
                        {{ __('area.cancel') }}

                    </button>

                    <button type="submit"
                            class="btn btn-create-area">

                        <i class="fas fa-plus-circle me-1"></i>
                        {{ __('area.create_area') }}

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>