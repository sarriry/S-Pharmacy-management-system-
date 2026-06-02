<style>
    #create .modal-content {
        border: none;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 22px 60px rgba(6, 78, 59, 0.28);
    }

    #create .modal-header {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
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
    }

    #create .modal-title-icon {
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

    #create .btn-close {
        background-color: #ffffff;
        opacity: 1;
        border-radius: 50%;
        padding: 10px;
    }

    #create .modal-body {
        background: linear-gradient(135deg, #ecfdf5 0%, #ffffff 55%, #dcfce7 100%);
        padding: 26px;
    }

    #create .doctor-note {
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

    #create .form-group-box {
        margin-bottom: 16px;
    }

    #create .form-label {
        color: #022c22;
        font-weight: 800;
        font-size: 14px;
        margin-bottom: 7px;
        display: flex;
        align-items: center;
        gap: 7px;
    }

    #create .form-label i {
        color: #065f46;
        font-size: 15px;
    }

    #create .input-group-text {
        background: linear-gradient(135deg, #065f46, #022c22);
        color: #ffffff;
        border: none;
        border-radius: 14px 0 0 14px;
        width: 45px;
        display: flex;
        justify-content: center;
    }

    #create .form-control,
    #create .form-select {
        height: 46px;
        border-radius: 14px;
        border: 1px solid rgba(6, 95, 70, 0.24);
        color: #022c22;
        font-weight: 600;
        background-color: #ffffff;
        box-shadow: none;
        transition: all 0.25s ease;
    }

    #create .input-group .form-control {
        border-radius: 0 14px 14px 0;
    }

    #create .form-control:focus,
    #create .form-select:focus {
        border-color: #065f46;
        box-shadow: 0 0 0 0.18rem rgba(6, 95, 70, 0.15);
    }

    #create .form-control::placeholder {
        color: #8aa39a;
        font-weight: 500;
    }

    #create .banned-box {
        background: #d1fae5;
        color: #064e3b;
        border-radius: 16px;
        padding: 13px 15px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 800;
        border: 1px solid rgba(6, 95, 70, 0.18);
    }

    #create .banned-box .form-check-input {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }

    #create .banned-box .form-check-input:checked {
        background-color: #065f46;
        border-color: #065f46;
    }

    #create .file-input-box {
        background: #ffffff;
        border: 1px dashed rgba(6, 95, 70, 0.4);
        border-radius: 18px;
        padding: 16px;
    }

    #create input[type="file"] {
        height: auto;
        padding: 10px;
    }

    #create .modal-footer {
        background: #ffffff;
        border-top: 1px solid #d1fae5;
        padding: 18px 24px;
    }

    #create .btn-cancel-doctor {
        background: #f1f5f9;
        color: #334155;
        border: none;
        border-radius: 24px;
        padding: 10px 24px;
        font-weight: 800;
        transition: all 0.25s ease;
    }

    #create .btn-cancel-doctor:hover {
        background: #e2e8f0;
        color: #022c22;
        transform: translateY(-2px);
    }

    #create .btn-create-doctor {
        background: linear-gradient(90deg, #065f46, #022c22);
        color: #ffffff;
        border: none;
        border-radius: 24px;
        padding: 10px 26px;
        font-weight: 800;
        box-shadow: 0 10px 22px rgba(6, 78, 59, 0.25);
        transition: all 0.25s ease;
    }

    #create .btn-create-doctor:hover {
        color: #ffffff;
        transform: translateY(-2px);
        background: linear-gradient(90deg, #047857, #064e3b);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.34);
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

        #create .btn-cancel-doctor,
        #create .btn-create-doctor {
            width: 100%;
        }
    }
</style>

<!-- Create Doctor Modal -->
<div class="modal fade"
     id="create"
     tabindex="-1"
     aria-labelledby="createDoctorModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="createDoctorModalLabel">
                    <span class="modal-title-icon">
                        <i class="fas fa-user-md"></i>
                    </span>
                    {{ __('doctor.create_new_doctor') }}
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="{{ __('doctor.close') }}">
                </button>

            </div>

            <form method="POST"
                  action="{{ route('doctors.store') }}"
                  enctype="multipart/form-data">

                @csrf

                <div class="modal-body">

                    <div class="doctor-note">
                        <i class="fas fa-info-circle"></i>
                        {{ __('doctor.create_doctor_note') }}
                    </div>

                    <div class="row">

                        <!-- National ID -->
                        <div class="col-md-6 form-group-box">
                            <label class="form-label">
                                <i class="fas fa-id-card"></i>
                                {{ __('doctor.national_id') }}
                            </label>

                            <input
                                name="id"
                                type="text"
                                class="form-control"
                                placeholder="{{ __('doctor.enter_national_id') }}"
                                value="{{ old('id') }}">
                        </div>

                        <!-- Name -->
                        <div class="col-md-6 form-group-box">
                            <label class="form-label">
                                <i class="fas fa-user"></i>
                                {{ __('doctor.doctor_name') }}
                            </label>

                            <input
                                name="name"
                                type="text"
                                class="form-control"
                                placeholder="{{ __('doctor.enter_doctor_name') }}"
                                value="{{ old('name') }}">
                        </div>

                        <!-- Email -->
                        <div class="col-md-6 form-group-box">
                            <label class="form-label">
                                <i class="fas fa-envelope"></i>
                                {{ __('doctor.email_address') }}
                            </label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-at"></i>
                                </span>

                                <input
                                    name="email"
                                    type="email"
                                    class="form-control"
                                    placeholder="{{ __('doctor.enter_doctor_email') }}"
                                    value="{{ old('email') }}">
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="col-md-6 form-group-box">
                            <label class="form-label">
                                <i class="fas fa-lock"></i>
                                {{ __('doctor.password') }}
                            </label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-key"></i>
                                </span>

                                <input
                                    name="password"
                                    type="password"
                                    class="form-control"
                                    placeholder="{{ __('doctor.enter_password') }}">
                            </div>
                        </div>

                        <!-- Pharmacy -->
                        <div class="col-md-12 form-group-box">
                            <label class="form-label">
                                <i class="fas fa-clinic-medical"></i>
                                {{ __('doctor.pharmacy') }}
                            </label>

                            <select name="pharmacy_id" class="form-control">
                                <option value="" disabled selected hidden>
                                    {{ __('doctor.choose_pharmacy') }}
                                </option>

                                @foreach($pharmacies as $pharmacy)
                                    <option value="{{ $pharmacy->id }}" {{ old('pharmacy_id') == $pharmacy->id ? 'selected' : '' }}>
                                        {{ $pharmacy->pharmacy_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Is Banned -->
                        <div class="col-md-12 form-group-box">
                            <div class="banned-box">
                                <input
                                    name="is_banned"
                                    class="form-check-input"
                                    type="checkbox"
                                    value="1"
                                    id="createDoctorBanned"
                                    {{ old('is_banned') ? 'checked' : '' }}>

                                <label class="form-check-label" for="createDoctorBanned">
                                    <i class="fas fa-ban me-1"></i>
                                    {{ __('doctor.is_banned') }}
                                </label>
                            </div>
                        </div>

                        <!-- Avatar -->
                        <div class="col-md-12 form-group-box">
                            <label class="form-label">
                                <i class="fas fa-image"></i>
                                {{ __('doctor.doctor_avatar_image') }}
                            </label>

                            <div class="file-input-box">
                                <input
                                    name="avatar_image"
                                    type="file"
                                    class="form-control"
                                    accept=".jpg,.jpeg,.png,.gif">
                            </div>
                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-cancel-doctor"
                            data-bs-dismiss="modal">

                        <i class="fas fa-times me-1"></i>
                        {{ __('doctor.cancel') }}

                    </button>

                    <button type="submit"
                            class="btn btn-create-doctor">

                        <i class="fas fa-plus-circle me-1"></i>
                        {{ __('doctor.create_doctor') }}

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>