<style>
    #edit_med .modal-content {
        border: none;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 22px 60px rgba(6, 78, 59, 0.28);
    }

    #edit_med .modal-header {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        border-bottom: none;
        padding: 20px 24px;
    }

    #edit_med .modal-title {
        font-size: 20px;
        font-weight: 900;
        letter-spacing: 0.4px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    #edit_med .modal-title-icon {
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

    #edit_med .btn-close {
        background-color: #ffffff;
        opacity: 1;
        border-radius: 50%;
        padding: 10px;
    }

    #edit_med .modal-body {
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 55%, #ecfdf5 100%);
        padding: 26px;
    }

    #edit_med .medicine-note {
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
    }

    #edit_med .form-group-box {
        margin-bottom: 16px;
    }

    #edit_med .form-label {
        color: #022c22;
        font-weight: 800;
        font-size: 14px;
        margin-bottom: 7px;
        display: flex;
        align-items: center;
        gap: 7px;
    }

    #edit_med .form-label i {
        color: #047857;
        font-size: 15px;
    }

    #edit_med .input-icon-box {
        position: relative;
    }

    #edit_med .input-icon-box i {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #047857;
        font-size: 15px;
        z-index: 2;
    }

    #edit_med .form-control {
        height: 46px;
        border-radius: 14px;
        border: 1px solid rgba(6, 95, 70, 0.22);
        color: #022c22;
        font-weight: 600;
        background-color: #ffffff;
        box-shadow: none;
        transition: all 0.25s ease;
        padding-left: 44px;
    }

    #edit_med .form-control:focus {
        border-color: #047857;
        box-shadow: 0 0 0 0.18rem rgba(4, 120, 87, 0.16);
    }

    #edit_med .modal-footer {
        background: #ffffff;
        border-top: 1px solid #d1fae5;
        padding: 18px 24px;
    }

    #edit_med .btn-cancel-medicine-edit {
        background: #ecfdf5;
        color: #064e3b;
        border: none;
        border-radius: 24px;
        padding: 10px 24px;
        font-weight: 800;
        transition: all 0.25s ease;
    }

    #edit_med .btn-cancel-medicine-edit:hover {
        background: #d1fae5;
        color: #022c22;
        transform: translateY(-2px);
    }

    #edit_med .btn-update-medicine-edit {
        background: linear-gradient(90deg, #047857, #022c22);
        color: #ffffff;
        border: none;
        border-radius: 24px;
        padding: 10px 26px;
        font-weight: 800;
        box-shadow: 0 10px 22px rgba(6, 78, 59, 0.25);
        transition: all 0.25s ease;
    }

    #edit_med .btn-update-medicine-edit:hover {
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.34);
        background: linear-gradient(90deg, #059669, #064e3b);
    }

    @media (max-width: 576px) {
        #edit_med .modal-body {
            padding: 20px 16px;
        }

        #edit_med .modal-header {
            padding: 18px 16px;
        }

        #edit_med .modal-footer {
            padding: 16px;
            flex-direction: column;
        }

        #edit_med .btn-cancel-medicine-edit,
        #edit_med .btn-update-medicine-edit {
            width: 100%;
        }
    }
</style>

<!-- Edit Medicine Modal -->
<div class="modal fade"
     id="edit_med"
     tabindex="-1"
     aria-labelledby="editMedicineModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">

                <h5 class="modal-title" id="editMedicineModalLabel">
                    <span class="modal-title-icon">
                        <i class="fas fa-pills"></i>
                    </span>
                    {{ __('medicine.edit_medicine_information') }}
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="{{ __('medicine.close') }}">
                </button>

            </div>

            <!-- Form -->
            <form method="POST"
                  id="edit-form"
                  data-update-base-url="{{ url('medicines') }}"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="modal-body">

                    <div class="medicine-note">
                        <i class="fas fa-info-circle"></i>
                        {{ __('medicine.edit_medicine_note') }}
                    </div>

                    <!-- Name -->
                    <div class="form-group-box">
                        <label for="edit_medName" class="form-label">
                            <i class="fas fa-capsules"></i>
                            {{ __('medicine.medicine_name') }}
                        </label>

                        <div class="input-icon-box">
                            <i class="fas fa-prescription-bottle-alt"></i>

                            <input name="name"
                                   type="text"
                                   class="form-control"
                                   id="edit_medName"
                                   placeholder="{{ __('medicine.enter_medicine_name') }}"
                                   required>
                        </div>
                    </div>

                    <!-- Type -->
                    <div class="form-group-box">
                        <label for="edit_medType" class="form-label">
                            <i class="fas fa-notes-medical"></i>
                            {{ __('medicine.medicine_type') }}
                        </label>

                        <div class="input-icon-box">
                            <i class="fas fa-tablets"></i>

                            <input name="type"
                                   type="text"
                                   class="form-control"
                                   id="edit_medType"
                                   placeholder="{{ __('medicine.enter_medicine_type') }}"
                                   required>
                        </div>
                    </div>

                    <!-- Quantity -->
                    <div class="form-group-box">
                        <label for="edit_medQuntity" class="form-label">
                            <i class="fas fa-boxes"></i>
                            {{ __('medicine.quantity') }}
                        </label>

                        <div class="input-icon-box">
                            <i class="fas fa-sort-numeric-up"></i>

                            <input name="quantity"
                                   type="number"
                                   min="0"
                                   class="form-control"
                                   id="edit_medQuntity"
                                   placeholder="{{ __('medicine.enter_quantity') }}"
                                   required>
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="form-group-box">
                        <label for="edit_medPrice" class="form-label">
                            <i class="fas fa-dollar-sign"></i>
                            {{ __('medicine.price') }}
                        </label>

                        <div class="input-icon-box">
                            <i class="fas fa-money-bill-wave"></i>

                            <input name="price"
                                   type="number"
                                   min="0"
                                   step="0.01"
                                   class="form-control"
                                   id="edit_medPrice"
                                   placeholder="{{ __('medicine.enter_price') }}"
                                   required>
                        </div>
                    </div>

                    <!-- Expiration Date -->
                    <div class="form-group-box">
                        <label for="edit_medExpirationDate" class="form-label">
                            <i class="fas fa-calendar-times"></i>
                            Expiration Date
                        </label>

                        <div class="input-icon-box">
                            <i class="fas fa-calendar-alt"></i>

                            <input name="expiration_date"
                                   type="date"
                                   class="form-control"
                                   id="edit_medExpirationDate"
                                   required>
                        </div>
                    </div>

                </div>

                <!-- Footer -->
                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-cancel-medicine-edit"
                            data-bs-dismiss="modal">

                        <i class="fas fa-times me-1"></i>
                        {{ __('medicine.cancel') }}

                    </button>

                    <button type="submit"
                            class="btn btn-update-medicine-edit">

                        <i class="fas fa-save me-1"></i>
                        {{ __('medicine.update_medicine') }}

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>
    function normalizeDateForInput(dateValue) {
        if (!dateValue) {
            return "";
        }

        /*
         * If value is already like 2026-05-14, return it.
         * If value is like 2026-05-14 00:00:00, take only first 10 characters.
         */
        return String(dateValue).substring(0, 10);
    }

    function medicineEditModalShow(event) {
        event.preventDefault();
        event.stopPropagation();

        const button = event.target.closest("button, a");

        if (!button) {
            alert("Edit button not found.");
            return;
        }

        const medicineId =
            button.getAttribute("data-id") ||
            button.getAttribute("data-medicine-id") ||
            button.getAttribute("id");

        if (!medicineId) {
            alert("Medicine ID not found.");
            return;
        }

        const editForm = document.getElementById("edit-form");

        if (!editForm) {
            alert("Edit form not found.");
            return;
        }

        const baseUrl = editForm.getAttribute("data-update-base-url");

        /*
         * This makes the form submit to /medicines/{id}
         * Example: /medicines/5
         */
        editForm.setAttribute("action", baseUrl + "/" + medicineId);

        document.getElementById("edit_medName").value =
            button.getAttribute("data-name") || "";

        document.getElementById("edit_medType").value =
            button.getAttribute("data-type") || "";

        document.getElementById("edit_medQuntity").value =
            button.getAttribute("data-quantity") || "";

        document.getElementById("edit_medPrice").value =
            button.getAttribute("data-price") || "";

        document.getElementById("edit_medExpirationDate").value =
            normalizeDateForInput(
                button.getAttribute("data-expiration-date") ||
                button.getAttribute("data-expiration_date") ||
                ""
            );

        const editModalElement = document.getElementById("edit_med");

        if (typeof bootstrap !== "undefined") {
            const editModal = new bootstrap.Modal(editModalElement);
            editModal.show();
        } else {
            $("#edit_med").modal("show");
        }
    }

    function editmodalShow(event) {
        medicineEditModalShow(event);
    }

    function medicineeditmodalShow(event) {
        medicineEditModalShow(event);
    }
</script>