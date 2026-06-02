<style>
    #create-client .modal-content {
        border: none;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 22px 60px rgba(6, 78, 59, 0.28);
    }

    #create-client .modal-header {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        border-bottom: none;
        padding: 20px 24px;
    }

    #create-client .modal-title {
        font-size: 20px;
        font-weight: 900;
        letter-spacing: 0.4px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    #create-client .modal-title-icon {
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

    #create-client .btn-close {
        background-color: #ffffff;
        opacity: 1;
        border-radius: 50%;
        padding: 10px;
    }

    #create-client .modal-body {
        background: linear-gradient(135deg, #ecfdf5 0%, #ffffff 45%, #dcfce7 100%);
        padding: 26px;
    }

    #create-client .client-note {
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

    #create-client .form-group-box {
        margin-bottom: 16px;
    }

    #create-client .form-label {
        color: #022c22;
        font-weight: 800;
        font-size: 14px;
        margin-bottom: 7px;
        display: flex;
        align-items: center;
        gap: 7px;
    }

    #create-client .form-label i {
        color: #065f46;
        font-size: 15px;
    }

    #create-client .input-group-text {
        background: linear-gradient(135deg, #065f46, #022c22);
        color: #ffffff;
        border: none;
        border-radius: 14px 0 0 14px;
        width: 45px;
        display: flex;
        justify-content: center;
    }

    #create-client .form-control,
    #create-client .form-select {
        height: 46px;
        border-radius: 14px;
        border: 1px solid rgba(6, 95, 70, 0.35);
        color: #022c22;
        font-weight: 800;
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 100%);
        box-shadow: 0 5px 14px rgba(6, 78, 59, 0.08);
        transition: all 0.25s ease;
    }

    #create-client .input-group .form-control {
        border-radius: 0 14px 14px 0;
    }

    #create-client .form-control:focus,
    #create-client .form-select:focus {
        border-color: #065f46;
        box-shadow: 0 0 0 0.18rem rgba(6, 95, 70, 0.15);
    }

    #create-client .form-control::placeholder {
        color: #8aa39a;
        font-weight: 500;
    }

    #create-client .file-input-box {
        background: #ffffff;
        border: 1px dashed rgba(6, 95, 70, 0.4);
        border-radius: 18px;
        padding: 16px;
    }

    #create-client input[type="file"] {
        height: auto;
        padding: 10px;
    }

    #create-client .modal-footer {
        background: #ffffff;
        border-top: 1px solid #d1fae5;
        padding: 18px 24px;
    }

    #create-client .btn-cancel-client {
        background: #f1f5f9;
        color: #334155;
        border: none;
        border-radius: 24px;
        padding: 10px 24px;
        font-weight: 800;
        transition: all 0.25s ease;
    }

    #create-client .btn-cancel-client:hover {
        background: #e2e8f0;
        color: #022c22;
        transform: translateY(-2px);
    }

    #create-client .btn-create-client {
        background: linear-gradient(90deg, #065f46, #022c22);
        color: #ffffff;
        border: none;
        border-radius: 24px;
        padding: 10px 26px;
        font-weight: 800;
        box-shadow: 0 10px 22px rgba(6, 78, 59, 0.25);
        transition: all 0.25s ease;
    }

    #create-client .btn-create-client:hover {
        color: #ffffff;
        transform: translateY(-2px);
        background: linear-gradient(90deg, #047857, #064e3b);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.34);
    }

    @media (max-width: 576px) {
        #create-client .modal-body {
            padding: 20px 16px;
        }

        #create-client .modal-header {
            padding: 18px 16px;
        }

        #create-client .modal-footer {
            padding: 16px;
            flex-direction: column;
        }

        #create-client .btn-cancel-client,
        #create-client .btn-create-client {
            width: 100%;
        }
    }
</style>

<!-- Create Client Modal -->
<div class="modal fade"
     id="create-client"
     tabindex="-1"
     aria-labelledby="createClientModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="createClientModalLabel">
                    <span class="modal-title-icon">
                        <i class="fas fa-user-plus"></i>
                    </span>
                    {{ __('clients.create_new_client') }}
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="{{ __('clients.close') }}">
                </button>

            </div>

            <form method="POST"
                  action="{{ route('clients.store') }}"
                  id="create-form"
                  enctype="multipart/form-data">

                @csrf

                <div class="modal-body">

                    <div class="client-note">
                        <i class="fas fa-info-circle"></i>
                        {{ __('clients.create_client_note') }}
                    </div>

                    <div class="row">

                        <!-- National ID -->
                        <div class="col-md-6 form-group-box">
                            <label for="client-id" class="form-label">
                                <i class="fas fa-id-card"></i>
                                {{ __('clients.national_id') }}
                            </label>

                            <input
                                name="id"
                                type="text"
                                class="form-control"
                                id="client-id"
                                placeholder="{{ __('clients.enter_national_id') }}"
                                value="{{ old('id') }}">
                        </div>

                        <!-- Name -->
                        <div class="col-md-6 form-group-box">
                            <label for="client-name" class="form-label">
                                <i class="fas fa-user"></i>
                                {{ __('clients.client_name') }}
                            </label>

                            <input
                                name="name"
                                type="text"
                                class="form-control"
                                id="client-name"
                                placeholder="{{ __('clients.enter_client_name') }}"
                                value="{{ old('name') }}">
                        </div>

                        <!-- Email -->
                        <div class="col-md-6 form-group-box">
                            <label for="client-email" class="form-label">
                                <i class="fas fa-envelope"></i>
                                {{ __('clients.email_address') }}
                            </label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-at"></i>
                                </span>

                                <input
                                    name="email"
                                    type="email"
                                    class="form-control"
                                    id="client-email"
                                    placeholder="{{ __('clients.enter_client_email') }}"
                                    value="{{ old('email') }}">
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="col-md-6 form-group-box">
                            <label for="client-password" class="form-label">
                                <i class="fas fa-lock"></i>
                                {{ __('clients.password') }}
                            </label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-key"></i>
                                </span>

                                <input
                                    name="password"
                                    type="password"
                                    class="form-control"
                                    id="client-password"
                                    placeholder="{{ __('clients.enter_password') }}">
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="col-md-12 form-group-box">
                            <label for="client-phone" class="form-label">
                                <i class="fas fa-phone"></i>
                                {{ __('clients.phone_number') }}
                            </label>

                            <input
                                name="phone"
                                type="text"
                                class="form-control"
                                id="client-phone"
                                placeholder="{{ __('clients.enter_phone_number') }}"
                                value="{{ old('phone') }}">
                        </div>

                        <!-- Date of Birth -->
                        <div class="col-md-6 form-group-box">
                            <label for="client-birthdate" class="form-label">
                                <i class="fas fa-calendar-alt"></i>
                                {{ __('clients.date_of_birth') }}
                            </label>

                            <input
                                type="date"
                                class="form-control"
                                name="date_of_birth"
                                id="client-birthdate"
                                min="1860-01-01"
                                max="2023-01-01"
                                value="{{ old('date_of_birth') }}">
                        </div>

                        <!-- Gender -->
                        <div class="col-md-6 form-group-box">
                            <label for="client-gender" class="form-label">
                                <i class="fas fa-venus-mars"></i>
                                {{ __('clients.gender') }}
                            </label>

                            <select name="gender"
                                    id="client-gender"
                                    class="form-select">

                                <option value="" disabled selected hidden>
                                    {{ __('clients.select_gender') }}
                                </option>

                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>
                                    {{ __('clients.male') }}
                                </option>

                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>
                                    {{ __('clients.female') }}
                                </option>

                            </select>
                        </div>

                        <!-- Avatar -->
                        <div class="col-md-12 form-group-box">
                            <label for="avatar" class="form-label">
                                <i class="fas fa-image"></i>
                                {{ __('clients.client_avatar_image') }}
                            </label>

                            <div class="file-input-box">
                                <input
                                    name="avatar_image"
                                    type="file"
                                    class="form-control"
                                    id="avatar"
                                    accept=".jpg,.jpeg,.png">
                            </div>
                        </div>

                        <input
                            name="password_confirmation"
                            id="client-password-confirmation"
                            hidden>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-cancel-client"
                            data-bs-dismiss="modal">

                        <i class="fas fa-times me-1"></i>
                        {{ __('clients.cancel') }}

                    </button>

                    <button type="submit"
                            class="btn btn-create-client">

                        <i class="fas fa-plus-circle me-1"></i>
                        {{ __('clients.create_client') }}

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const passwordInput = document.getElementById("client-password");
        const passwordConfirmationInput = document.getElementById("client-password-confirmation");

        if (passwordInput && passwordConfirmationInput) {
            passwordInput.addEventListener("input", function () {
                passwordConfirmationInput.value = passwordInput.value;
            });
        }
    });
</script>