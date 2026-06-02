<style>
    #edit .modal-content {
        border: none;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 22px 60px rgba(6, 78, 59, 0.28);
    }

    #edit .modal-header {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        border-bottom: none;
        padding: 20px 24px;
    }

    #edit .modal-title {
        font-size: 20px;
        font-weight: 900;
        letter-spacing: 0.4px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    #edit .modal-title-icon {
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

    #edit .btn-close {
        background-color: #ffffff;
        opacity: 1;
        border-radius: 50%;
        padding: 10px;
    }

    #edit .modal-body {
        background: linear-gradient(135deg, #ecfdf5 0%, #ffffff 55%, #dcfce7 100%);
        padding: 26px;
    }

    #edit .edit-doctor-note {
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

    #edit .form-group-box {
        margin-bottom: 16px;
    }

    #edit .form-label {
        color: #022c22;
        font-weight: 800;
        font-size: 14px;
        margin-bottom: 7px;
        display: flex;
        align-items: center;
        gap: 7px;
    }

    #edit .form-label i {
        color: #065f46;
        font-size: 15px;
    }

    #edit .input-group-text {
        background: linear-gradient(135deg, #065f46, #022c22);
        color: #ffffff;
        border: none;
        border-radius: 14px 0 0 14px;
        width: 45px;
        display: flex;
        justify-content: center;
    }

    #edit .form-control,
    #edit .form-select {
        height: 46px;
        border-radius: 14px;
        border: 1px solid rgba(6, 95, 70, 0.24);
        color: #022c22;
        font-weight: 600;
        background-color: #ffffff;
        box-shadow: none;
        transition: all 0.25s ease;
    }

    #edit .input-group .form-control {
        border-radius: 0 14px 14px 0;
    }

    #edit .form-control:focus,
    #edit .form-select:focus {
        border-color: #065f46;
        box-shadow: 0 0 0 0.18rem rgba(6, 95, 70, 0.15);
    }

    #edit .form-control::placeholder {
        color: #8aa39a;
        font-weight: 500;
    }

    #edit .form-control[readonly],
    #edit .form-control:read-only {
        background: #f1f5f9;
        color: #64748b;
        cursor: not-allowed;
    }

    #edit select:disabled {
        background: #f1f5f9;
        color: #64748b;
        cursor: not-allowed;
    }

    #edit .banned-box {
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

    #edit .banned-box .form-check-input {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }

    #edit .banned-box .form-check-input:checked {
        background-color: #065f46;
        border-color: #065f46;
    }

    #edit .file-input-box {
        background: #ffffff;
        border: 1px dashed rgba(6, 95, 70, 0.4);
        border-radius: 18px;
        padding: 16px;
    }

    #edit input[type="file"] {
        height: auto;
        padding: 10px;
    }

    #edit .modal-footer {
        background: #ffffff;
        border-top: 1px solid #d1fae5;
        padding: 18px 24px;
    }

    #edit .btn-cancel-doctor-edit {
        background: #f1f5f9;
        color: #334155;
        border: none;
        border-radius: 24px;
        padding: 10px 24px;
        font-weight: 800;
        transition: all 0.25s ease;
    }

    #edit .btn-cancel-doctor-edit:hover {
        background: #e2e8f0;
        color: #022c22;
        transform: translateY(-2px);
    }

    #edit .btn-update-doctor-edit {
        background: linear-gradient(90deg, #065f46, #022c22);
        color: #ffffff;
        border: none;
        border-radius: 24px;
        padding: 10px 26px;
        font-weight: 800;
        box-shadow: 0 10px 22px rgba(6, 78, 59, 0.25);
        transition: all 0.25s ease;
    }

    #edit .btn-update-doctor-edit:hover {
        color: #ffffff;
        transform: translateY(-2px);
        background: linear-gradient(90deg, #047857, #064e3b);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.34);
    }

    @media (max-width: 576px) {
        #edit .modal-body {
            padding: 20px 16px;
        }

        #edit .modal-header {
            padding: 18px 16px;
        }

        #edit .modal-footer {
            padding: 16px;
            flex-direction: column;
        }

        #edit .btn-cancel-doctor-edit,
        #edit .btn-update-doctor-edit {
            width: 100%;
        }
    }
</style>

<!-- Edit Doctor Modal -->
<div class="modal fade"
     id="edit"
     tabindex="-1"
     aria-labelledby="editDoctorModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">

                <h5 class="modal-title" id="editDoctorModalLabel">
                    <span class="modal-title-icon">
                        <i class="fas fa-user-edit"></i>
                    </span>
                    {{ __('doctor.edit_doctor_information') }}
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="{{ __('doctor.close') }}">
                </button>

            </div>

            <!-- Form -->
            <form method="POST"
                  id="edit-form"
                  action=""
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="modal-body">

                    <div class="edit-doctor-note">
                        <i class="fas fa-info-circle"></i>
                        {{ __('doctor.edit_doctor_note') }}
                    </div>

                    <div class="row">

                        <!-- National ID -->
                        <div class="col-md-6 form-group-box">
                            <label class="form-label" for="nationalIdEdit">
                                <i class="fas fa-id-card"></i>
                                {{ __('doctor.national_id') }}
                            </label>

                            <input
                                name="id"
                                type="text"
                                class="form-control"
                                id="nationalIdEdit"
                                readonly>
                        </div>

                        <!-- Name -->
                        <div class="col-md-6 form-group-box">
                            <label class="form-label" for="nameEdit">
                                <i class="fas fa-user"></i>
                                {{ __('doctor.doctor_name') }}
                            </label>

                            <input
                                name="name"
                                type="text"
                                class="form-control"
                                id="nameEdit"
                                placeholder="{{ __('doctor.enter_doctor_name') }}">
                        </div>

                        <!-- Password -->
                        <div class="col-md-6 form-group-box">
                            <label class="form-label" for="passwordEdit">
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
                                    id="passwordEdit"
                                    placeholder="{{ __('doctor.leave_empty_if_unchanged') }}">
                            </div>
                        </div>

                        <!-- ADMIN / PHARMACY ROLE -->
                        @role('admin|pharmacy')

                            <div class="col-md-6 form-group-box">
                                <label class="form-label" for="emailEdit">
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
                                        id="emailEdit"
                                        placeholder="{{ __('doctor.enter_email_address') }}">
                                </div>
                            </div>

                            <div class="col-md-12 form-group-box">
                                <label class="form-label" for="pharmacyEdit">
                                    <i class="fas fa-clinic-medical"></i>
                                    {{ __('doctor.assigned_pharmacy') }}
                                </label>

                                <select
                                    name="pharmacy_id"
                                    id="pharmacyEdit"
                                    class="form-control">
                                </select>
                            </div>

                            <div class="col-md-12 form-group-box">
                                <div class="banned-box">
                                    <input
                                        name="is_banned"
                                        class="form-check-input"
                                        id="bannedEdit"
                                        type="checkbox"
                                        value="1">

                                    <label class="form-check-label" for="bannedEdit">
                                        <i class="fas fa-ban me-1"></i>
                                        {{ __('doctor.is_banned') }}
                                    </label>
                                </div>
                            </div>

                        @endrole

                        <!-- DOCTOR ROLE -->
                        @role('doctor')

                            <div class="col-md-6 form-group-box">
                                <label class="form-label" for="emailEdit">
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
                                        id="emailEdit"
                                        readonly>
                                </div>
                            </div>

                            <div class="col-md-12 form-group-box">
                                <label class="form-label" for="pharmacyEdit">
                                    <i class="fas fa-clinic-medical"></i>
                                    {{ __('doctor.assigned_pharmacy') }}
                                </label>

                                <select
                                    name="pharmacy_id"
                                    id="pharmacyEdit"
                                    class="form-control"
                                    disabled>
                                </select>
                            </div>

                            <div class="col-md-12 form-group-box" hidden>
                                <div class="banned-box">
                                    <input
                                        name="is_banned"
                                        class="form-check-input"
                                        id="bannedEdit"
                                        type="checkbox">

                                    <label class="form-check-label" for="bannedEdit">
                                        <i class="fas fa-ban me-1"></i>
                                        {{ __('doctor.is_banned') }}
                                    </label>
                                </div>
                            </div>

                        @endrole

                        <!-- Avatar -->
                        <div class="col-md-12 form-group-box">
                            <label class="form-label" for="avatarEdit">
                                <i class="fas fa-image"></i>
                                {{ __('doctor.doctor_avatar_image') }}
                            </label>

                            <div class="file-input-box">
                                <input
                                    type="file"
                                    name="avatar_image"
                                    class="form-control"
                                    id="avatarEdit"
                                    accept=".jpg,.jpeg,.png,.gif">
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Hidden User ID -->
                <input name="user_id" id="userid" hidden>

                <!-- Footer -->
                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-cancel-doctor-edit"
                            data-bs-dismiss="modal">

                        <i class="fas fa-times me-1"></i>
                        {{ __('doctor.cancel') }}

                    </button>

                    <button type="submit"
                            class="btn btn-update-doctor-edit">

                        <i class="fas fa-save me-1"></i>
                        {{ __('doctor.update_doctor') }}

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editModal = document.getElementById('edit');
        const editForm = document.getElementById('edit-form');

        if (!editModal || !editForm) {
            console.error('Edit modal or edit form not found.');
            return;
        }

        editModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;

            if (!button) {
                console.error('Edit button not found.');
                return;
            }

            /*
             |--------------------------------------------------------------------------
             | Get Doctor ID
             | Works with both:
             | data-id="5"
             | id="5"
             |--------------------------------------------------------------------------
             */
            const doctorId = button.getAttribute('data-id') || button.getAttribute('id');

            if (!doctorId) {
                console.error('Doctor ID is missing from edit button.');
                return;
            }

            /*
             |--------------------------------------------------------------------------
             | Correct Update URL
             | This will create: /doctors/5
             |--------------------------------------------------------------------------
             */
            editForm.setAttribute('action', "{{ url('doctors') }}/" + doctorId);

            /*
             |--------------------------------------------------------------------------
             | Fill modal inputs safely
             |--------------------------------------------------------------------------
             */
            const userIdInput = document.getElementById('userid');
            const nationalIdInput = document.getElementById('nationalIdEdit');
            const nameInput = document.getElementById('nameEdit');
            const emailInput = document.getElementById('emailEdit');
            const bannedInput = document.getElementById('bannedEdit');
            const passwordInput = document.getElementById('passwordEdit');

            if (userIdInput) {
                userIdInput.value = doctorId;
            }

            if (nationalIdInput) {
                nationalIdInput.value =
                    button.getAttribute('data-national-id') ||
                    button.getAttribute('data-id') ||
                    doctorId;
            }

            if (nameInput) {
                nameInput.value = button.getAttribute('data-name') || '';
            }

            if (emailInput) {
                emailInput.value = button.getAttribute('data-email') || '';
            }

            if (passwordInput) {
                passwordInput.value = '';
            }

            if (bannedInput) {
                bannedInput.checked = button.getAttribute('data-is-banned') === '1';
            }
        });
    });
</script>