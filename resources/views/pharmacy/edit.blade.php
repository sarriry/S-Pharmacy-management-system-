<style>
    #editPharmacyModal .modal-content {
        border: none;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 22px 60px rgba(6, 78, 59, 0.28);
    }

    #editPharmacyModal .modal-header {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        border-bottom: none;
        padding: 20px 24px;
    }

    #editPharmacyModal .modal-title {
        font-size: 20px;
        font-weight: 800;
        letter-spacing: 0.4px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    #editPharmacyModal .modal-title-icon {
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

    #editPharmacyModal .btn-close {
        background-color: #ffffff;
        opacity: 1;
        border-radius: 50%;
        padding: 10px;
    }

    #editPharmacyModal .modal-body {
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 55%, #ecfdf5 100%);
        padding: 26px;
    }

    #editPharmacyModal .form-group-box {
        margin-bottom: 16px;
    }

    #editPharmacyModal .form-label {
        color: #022c22;
        font-weight: 800;
        font-size: 14px;
        margin-bottom: 7px;
        display: flex;
        align-items: center;
        gap: 7px;
    }

    #editPharmacyModal .form-label i {
        color: #047857;
        font-size: 15px;
    }

    #editPharmacyModal .input-group-text {
        background: linear-gradient(135deg, #047857, #022c22);
        color: #ffffff;
        border: none;
        border-radius: 14px 0 0 14px;
        width: 45px;
        display: flex;
        justify-content: center;
    }

    #editPharmacyModal .form-control,
    #editPharmacyModal .form-select {
        height: 46px;
        border-radius: 14px;
        border: 1px solid rgba(6, 95, 70, 0.22);
        color: #022c22;
        font-weight: 600;
        background-color: #ffffff;
        box-shadow: none;
        transition: all 0.25s ease;
    }

    #editPharmacyModal .input-group .form-control {
        border-radius: 0 14px 14px 0;
    }

    #editPharmacyModal .form-control:focus,
    #editPharmacyModal .form-select:focus {
        border-color: #047857;
        box-shadow: 0 0 0 0.18rem rgba(4, 120, 87, 0.16);
    }

    #editPharmacyModal .form-control[readonly],
    #editPharmacyModal .form-control:read-only {
        background: #f0fdf4;
        color: #64748b;
        cursor: not-allowed;
    }

    #editPharmacyModal select[readonly] {
        background: #f0fdf4;
        color: #64748b;
        pointer-events: none;
        cursor: not-allowed;
    }

    #editPharmacyModal .file-input-box {
        background: #ffffff;
        border: 1px dashed rgba(6, 95, 70, 0.4);
        border-radius: 18px;
        padding: 16px;
    }

    #editPharmacyModal input[type="file"] {
        height: auto;
        padding: 10px;
    }

    #editPharmacyModal .edit-note {
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

    #editPharmacyModal .modal-footer {
        background: #ffffff;
        border-top: 1px solid #d1fae5;
        padding: 18px 24px;
    }

    #editPharmacyModal .btn-cancel-edit {
        background: #ecfdf5;
        color: #064e3b;
        border: none;
        border-radius: 24px;
        padding: 10px 24px;
        font-weight: 800;
        transition: all 0.25s ease;
    }

    #editPharmacyModal .btn-cancel-edit:hover {
        background: #d1fae5;
        color: #022c22;
        transform: translateY(-2px);
    }

    #editPharmacyModal .btn-update-edit {
        background: linear-gradient(90deg, #047857, #022c22);
        color: #ffffff;
        border: none;
        border-radius: 24px;
        padding: 10px 26px;
        font-weight: 800;
        box-shadow: 0 10px 22px rgba(6, 78, 59, 0.25);
        transition: all 0.25s ease;
    }

    #editPharmacyModal .btn-update-edit:hover {
        color: #ffffff;
        transform: translateY(-2px);
        background: linear-gradient(90deg, #059669, #064e3b);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.34);
    }

    @media (max-width: 576px) {
        #editPharmacyModal .modal-body {
            padding: 20px 16px;
        }

        #editPharmacyModal .modal-header {
            padding: 18px 16px;
        }

        #editPharmacyModal .modal-footer {
            padding: 16px;
            flex-direction: column;
        }

        #editPharmacyModal .btn-cancel-edit,
        #editPharmacyModal .btn-update-edit {
            width: 100%;
        }
    }
</style>

<!-- Edit Pharmacy Modal -->
<div class="modal fade"
     id="editPharmacyModal"
     tabindex="-1"
     aria-labelledby="editPharmacyModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="editPharmacyModalLabel">
                    <span class="modal-title-icon">
                        <i class="fas fa-edit"></i>
                    </span>
                    {{ __('pharmacy.update_pharmacy_data') }}
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="{{ __('pharmacy.close') }}">
                </button>

            </div>

            <form method="POST"
                  id="edit-pharmacy-form"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="modal-body">

                    <div class="edit-note">
                        <i class="fas fa-info-circle"></i>
                        {{ __('pharmacy.edit_pharmacy_note') }}
                    </div>

                    <div class="row">

                        <!-- Pharmacy Name -->
                        <div class="col-md-12 form-group-box">
                            <label for="PharmacyName" class="form-label">
                                <i class="fas fa-prescription-bottle-alt"></i>
                                {{ __('pharmacy.pharmacy_name') }}
                            </label>

                            <input
                                name="pharmacy_name"
                                type="text"
                                class="form-control"
                                id="PharmacyName"
                                placeholder="{{ __('pharmacy.enter_pharmacy_name') }}">
                        </div>

                        <!-- Owner ID -->
                        <div class="col-md-6 form-group-box">
                            <label for="pharmacyId" class="form-label">
                                <i class="fas fa-id-card"></i>
                                {{ __('pharmacy.owner_id') }}
                            </label>

                            <input
                                name="id"
                                type="text"
                                class="form-control"
                                id="pharmacyId"
                                placeholder="{{ __('pharmacy.enter_owner_id') }}">
                        </div>

                        <!-- Owner Name -->
                        <div class="col-md-6 form-group-box">
                            <label for="name" class="form-label">
                                <i class="fas fa-user"></i>
                                {{ __('pharmacy.owner_name') }}
                            </label>

                            <input
                                name="name"
                                type="text"
                                class="form-control"
                                id="name"
                                placeholder="{{ __('pharmacy.enter_owner_name') }}">
                        </div>

                        <!-- Owner Email -->
                        <div class="col-md-6 form-group-box">
                            <label for="email" class="form-label">
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
                                    id="email"
                                    placeholder="{{ __('pharmacy.enter_owner_email') }}">
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="col-md-6 form-group-box">
                            <label for="password" class="form-label">
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
                                    id="password"
                                    placeholder="{{ __('pharmacy.leave_empty_if_unchanged') }}">
                            </div>
                        </div>

                        <!-- Admin Area and Priority -->
                        @role('admin')

                            <div class="col-md-6 form-group-box">
                                <label for="areaSelect" class="form-label">
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{ __('pharmacy.area_name') }}
                                </label>

                                <select
                                    name="area_id"
                                    id="areaSelect"
                                    class="form-control">
                                </select>
                            </div>

                            <div class="col-md-6 form-group-box">
                                <label for="priority" class="form-label">
                                    <i class="fas fa-star"></i>
                                    {{ __('pharmacy.priority') }}
                                </label>

                                <input
                                    name="priority"
                                    type="number"
                                    class="form-control"
                                    id="priority"
                                    placeholder="{{ __('pharmacy.enter_priority') }}">
                            </div>

                        @endrole

                        <!-- Pharmacy Area and Priority Readonly -->
                        @role('pharmacy')

                            <div class="col-md-6 form-group-box">
                                <label for="areaSelect" class="form-label">
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{ __('pharmacy.area_name') }}
                                </label>

                                <select
                                    name="area_id"
                                    id="areaSelect"
                                    class="form-control"
                                    readonly>
                                </select>
                            </div>

                            <div class="col-md-6 form-group-box">
                                <label for="priority" class="form-label">
                                    <i class="fas fa-star"></i>
                                    {{ __('pharmacy.priority') }}
                                </label>

                                <input
                                    name="priority"
                                    type="number"
                                    class="form-control"
                                    id="priority"
                                    placeholder="{{ __('pharmacy.priority') }}"
                                    readonly>
                            </div>

                        @endrole

                        <!-- Avatar -->
                        <div class="col-md-12 form-group-box">
                            <label for="avatar" class="form-label">
                                <i class="fas fa-image"></i>
                                {{ __('pharmacy.pharmacy_avatar_image') }}
                            </label>

                            <div class="file-input-box">
                                <input
                                    name="avatar_image"
                                    type="file"
                                    class="form-control"
                                    id="avatar"
                                    accept=".jpg,.jpeg,.png,.gif">
                            </div>
                        </div>

                        <!-- Hidden User ID -->
                        <input
                            name="user_id"
                            class="form-control client-input"
                            id="pharmacy-edit-userid"
                            hidden>

                    </div>

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-cancel-edit"
                        data-bs-dismiss="modal">

                        <i class="fas fa-times me-1"></i>
                        {{ __('pharmacy.cancel') }}

                    </button>

                    <button
                        type="submit"
                        class="btn btn-update-edit">

                        <i class="fas fa-save me-1"></i>
                        {{ __('pharmacy.update_pharmacy') }}

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<!-- Script -->
<script>
    function showEditModal(event) {
        event.preventDefault();
        event.stopPropagation();

        const button = event.target.closest('button');
        const pharmacyId = button ? button.getAttribute('id') : null;

        if (!pharmacyId) {
            alert(@json(__('pharmacy.pharmacy_id_not_found')));
            return;
        }

        $.ajax({
            url: "{{ route('pharmacies.show', ':id') }}".replace(':id', pharmacyId),
            method: "GET",

            success: function(response) {
                $('#PharmacyName').val(response.pharmacy.pharmacy_name);
                $('#pharmacyId').val(response.pharmacy.id);
                $('#priority').val(response.pharmacy.priority);
                $('#pharmacy-edit-userid').val(response.user.id);
                $('#name').val(response.user.name);
                $('#email').val(response.user.email);
                $('#password').val('');

                const areaSelect = $('#areaSelect');
                areaSelect.empty();

                $.each(response.areas, function(index, area) {
                    const option = $('<option>')
                        .val(area.id)
                        .text(area.name);

                    if (String(area.id) === String(response.pharmacy.area_id)) {
                        option.attr('selected', 'selected');
                    }

                    areaSelect.append(option);
                });

                areaSelect.val(response.pharmacy.area_id);
            },

            error: function() {
                alert(@json(__('pharmacy.unable_load_pharmacy_data_try_again')));
            }
        });

        const route = "{{ route('pharmacies.update', ':id') }}"
            .replace(':id', pharmacyId);

        document.getElementById("edit-pharmacy-form").action = route;
    }
</script>