<style>
    #modEdit .modal-dialog {
        max-width: 1100px;
    }

    #modEdit .modal-content {
        border: none;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 22px 60px rgba(6, 78, 59, 0.28);
    }

    #modEdit .modal-header {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        border-bottom: none;
        padding: 20px 24px;
    }

    #modEdit .modal-title {
        font-size: 20px;
        font-weight: 900;
        letter-spacing: 0.4px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    #modEdit .modal-title-icon {
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

    #modEdit .btn-close {
        background-color: #ffffff;
        opacity: 1;
        border-radius: 50%;
        padding: 10px;
    }

    #modEdit .modal-body {
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 55%, #ecfdf5 100%);
        padding: 26px;
    }

    #modEdit .edit-order-form-card {
        background: #ffffff;
        border: 1px solid rgba(6, 95, 70, 0.14);
        border-radius: 22px;
        padding: 24px;
        box-shadow: 0 12px 28px rgba(6, 78, 59, 0.10);
    }

    #modEdit .edit-order-image-card {
        background: #ffffff;
        border: 1px solid rgba(6, 95, 70, 0.14);
        border-radius: 22px;
        padding: 18px;
        box-shadow: 0 12px 28px rgba(6, 78, 59, 0.10);
        height: 100%;
    }

    #modEdit .order-note {
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

    #modEdit .form-group-box {
        margin-bottom: 16px;
    }

    #modEdit .form-label,
    #modEdit label {
        color: #022c22;
        font-weight: 800;
        font-size: 14px;
        margin-bottom: 7px;
        display: flex;
        align-items: center;
        gap: 7px;
    }

    #modEdit .form-label i,
    #modEdit label i {
        color: #047857;
        font-size: 15px;
    }

    #modEdit .input-icon-box {
        position: relative;
    }

    #modEdit .input-icon-box > i {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #047857;
        font-size: 15px;
        z-index: 3;
    }

    #modEdit .form-control,
    #modEdit .form-select {
        min-height: 46px;
        border-radius: 14px;
        border: 1px solid rgba(6, 95, 70, 0.22);
        color: #022c22;
        font-weight: 600;
        background-color: #ffffff;
        box-shadow: none;
        transition: all 0.25s ease;
    }

    #modEdit .input-icon-box .form-control,
    #modEdit .input-icon-box .form-select {
        padding-left: 44px;
    }

    #modEdit .form-control:focus,
    #modEdit .form-select:focus {
        border-color: #047857;
        box-shadow: 0 0 0 0.18rem rgba(4, 120, 87, 0.16);
    }

    #modEdit .form-control:disabled,
    #modEdit .form-control[readonly],
    #modEdit select:disabled {
        background: #f0fdf4;
        color: #64748b;
        cursor: not-allowed;
    }

    #modEdit .select2-container {
        width: 100% !important;
    }

    #modEdit .select2-container--default .select2-selection--multiple {
        min-height: 46px;
        border-radius: 14px;
        border: 1px solid rgba(6, 95, 70, 0.22);
        padding: 6px 10px;
        background-color: #ffffff;
    }

    #modEdit .select2-container--default.select2-container--focus .select2-selection--multiple {
        border-color: #047857;
        box-shadow: 0 0 0 0.18rem rgba(4, 120, 87, 0.16);
    }

    #modEdit .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background: linear-gradient(90deg, #047857, #022c22);
        color: #ffffff;
        border: none;
        border-radius: 20px;
        padding: 4px 10px;
        font-weight: 700;
    }

    #modEdit #editQuantity {
        width: 100%;
        display: block;
    }

    #modEdit #editQuantity input {
        margin-bottom: 8px;
        border-radius: 14px;
        border: 1px solid rgba(6, 95, 70, 0.22);
        min-height: 44px;
        font-weight: 600;
    }

    #modEdit .input-group-text {
        background: #ecfdf5;
        color: #064e3b;
        border: 1px solid rgba(6, 95, 70, 0.22);
        border-radius: 14px;
        font-weight: 900;
    }

    #modEdit .insured-box {
        background: #f0fdf4;
        border: 1px solid rgba(6, 95, 70, 0.18);
        border-radius: 16px;
        padding: 13px 16px;
        display: flex;
        align-items: center;
        gap: 10px;
        min-height: 46px;
    }

    #modEdit .form-check-input {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }

    #modEdit .form-check-input:checked {
        background-color: #047857;
        border-color: #047857;
    }

    #modEdit .prescription-title {
        color: #022c22;
        font-weight: 900;
        font-size: 17px;
        margin-bottom: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    #modEdit #carouselExampleControls {
        border-radius: 20px;
        overflow: hidden;
        background: #f0fdf4;
        border: 1px solid #d1fae5;
        min-height: 360px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #modEdit #prescription {
        width: 100%;
    }

    #modEdit #prescription img {
        border-radius: 18px;
        max-height: 430px;
        object-fit: contain;
        background: #ffffff;
    }

    #modEdit .carousel-control-prev-icon,
    #modEdit .carousel-control-next-icon {
        background-color: #047857 !important;
        border-radius: 50%;
        padding: 18px;
    }

    #modEdit .modal-footer {
        background: transparent;
        border-top: 1px solid #d1fae5;
        padding: 18px 0 0;
        margin-top: 8px;
    }

    #modEdit .btn-cancel-order-edit {
        background: #ecfdf5;
        color: #064e3b;
        border: none;
        border-radius: 24px;
        padding: 10px 24px;
        font-weight: 800;
        transition: all 0.25s ease;
    }

    #modEdit .btn-cancel-order-edit:hover {
        background: #d1fae5;
        color: #022c22;
        transform: translateY(-2px);
    }

    #modEdit .btn-update-order-edit {
        background: linear-gradient(90deg, #047857, #022c22);
        color: #ffffff;
        border: none;
        border-radius: 24px;
        padding: 10px 26px;
        font-weight: 800;
        box-shadow: 0 10px 22px rgba(6, 78, 59, 0.25);
        transition: all 0.25s ease;
    }

    #modEdit .btn-update-order-edit:hover {
        color: #ffffff;
        transform: translateY(-2px);
        background: linear-gradient(90deg, #059669, #064e3b);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.34);
    }

    @media (max-width: 768px) {
        #modEdit .modal-body {
            padding: 20px 16px;
        }

        #modEdit .modal-header {
            padding: 18px 16px;
        }

        #modEdit .edit-order-form-card,
        #modEdit .edit-order-image-card {
            padding: 18px;
        }

        #modEdit .modal-footer {
            flex-direction: column;
        }

        #modEdit .btn-cancel-order-edit,
        #modEdit .btn-update-order-edit {
            width: 100%;
        }
    }
</style>

<!-- Edit Order Modal -->
<div class="modal fade"
     id="modEdit"
     tabindex="-1"
     aria-labelledby="editOrderModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-xl">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="editOrderModalLabel">
                    <span class="modal-title-icon">
                        <i class="fas fa-edit"></i>
                    </span>
                    {{ __('orders.update_order_information') }}
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="{{ __('orders.close') }}">
                </button>

            </div>

            <form method="POST"
                  id="order-edit-form"
                  data-update-base-url="{{ url('orders') }}"
                  data-show-base-url="{{ url('orders') }}"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="modal-body">

                    <div class="row g-4">

                        <div class="col-md-7">

                            <div class="edit-order-form-card">

                                <div class="order-note">
                                    <i class="fas fa-info-circle"></i>
                                    {{ __('orders.edit_order_note') }}
                                </div>

                                {{-- Assigned User --}}
                                <div class="form-group-box">
                                    <label for="AssignedUser" class="form-label">
                                        <i class="fas fa-user"></i>
                                        {{ __('orders.assigned_user') }}
                                    </label>

                                    <div class="input-icon-box">
                                        <i class="fas fa-user-check"></i>

                                        <select name="user_id"
                                                id="AssignedUser"
                                                class="form-control"
                                                disabled>

                                            @foreach ($clients as $client)
                                                <option value="{{ $client->user_id }}">
                                                    {{ $client->User->name }} / {{ $client->User->email }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                {{-- Address --}}
                                <div class="form-group-box">
                                    <label for="editadress" class="form-label">
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{ __('orders.delivery_address') }}
                                    </label>

                                    <div class="input-icon-box">
                                        <i class="fas fa-location-dot"></i>

                                        <select name="delivering_address_id"
                                                id="editadress"
                                                class="form-control"
                                                disabled>

                                            @foreach ($clients as $client)
                                                @foreach ($client->Address as $address)
                                                    @if ($client->id == $address->client_id)
                                                        <option value="{{ $address->id }}">
                                                            {{ $address->street_name }} {{ $address->Area->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                {{-- Medicine --}}
                                <div class="form-group-box">
                                    <label for="edit_medicine" class="form-label">
                                        <i class="fas fa-pills"></i>
                                        {{ __('orders.medicines') }}
                                    </label>

                                    <select name="medicine_id[]"
                                            id="edit_medicine"
                                            class="select2 js-data-example-ajax"
                                            multiple
                                            style="width: 100%;">

                                        @foreach ($medicines as $medicine)
                                            <option value="{{ $medicine->id }}">
                                                {{ $medicine->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                                {{-- Quantity --}}
                                <div class="form-group-box">
                                    <label class="form-label">
                                        <i class="fas fa-boxes"></i>
                                        {{ __('orders.quantity') }}
                                    </label>

                                    <div class="input-group" id="editQuantity"></div>
                                </div>

                                <div class="row">

                                    {{-- Pharmacy --}}
                                    <div class="col-md-6 form-group-box">
                                        <label for="pharmacyEdit" class="form-label">
                                            <i class="fas fa-clinic-medical"></i>
                                            {{ __('orders.pharmacy_name') }}
                                        </label>

                                        <div class="input-icon-box">
                                            <i class="fas fa-prescription-bottle-alt"></i>

                                            <select name="pharmacy_id"
                                                    id="pharmacyEdit"
                                                    class="form-control"
                                                    disabled>

                                                @foreach ($pharmacies as $pharmacy)
                                                    <option value="{{ $pharmacy->id }}">
                                                        {{ $pharmacy->pharmacy_name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    {{-- Doctor --}}
                                    <div class="col-md-6 form-group-box">
                                        <label for="doctorEdit" class="form-label">
                                            <i class="fas fa-user-md"></i>
                                            {{ __('orders.doctor_name') }}
                                        </label>

                                        <div class="input-icon-box">
                                            <i class="fas fa-stethoscope"></i>

                                            <select name="doctor_id"
                                                    id="doctorEdit"
                                                    class="form-control">

                                                @foreach ($pharmacies as $pharmacy)
                                                    <optgroup label="{{ __('orders.pharmacy') }}: {{ $pharmacy->pharmacy_name }}">
                                                        @foreach ($pharmacy->doctors as $doctor)
                                                            <option value="{{ $doctor->id }}">
                                                                {{ $doctor->User->name }}
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    {{-- Creator Type --}}
                                    <div class="col-md-6 form-group-box">
                                        <label for="editOrderCreator" class="form-label">
                                            <i class="fas fa-user-edit"></i>
                                            {{ __('orders.creator_type') }}
                                        </label>

                                        <div class="input-icon-box">
                                            <i class="fas fa-user-shield"></i>

                                            <input name="creator_type"
                                                   id="editOrderCreator"
                                                   class="form-control"
                                                   readonly>
                                        </div>
                                    </div>

                                    {{-- Status --}}
                                    <div class="col-md-6 form-group-box">
                                        <label for="orderStatus" class="form-label">
                                            <i class="fas fa-clock"></i>
                                            {{ __('orders.status') }}
                                        </label>

                                        <div class="input-icon-box">
                                            <i class="fas fa-hourglass-half"></i>

                                            <input name="status"
                                                   id="orderStatus"
                                                   class="form-control"
                                                   readonly>
                                        </div>
                                    </div>

                                    {{-- Insured --}}
                                    <div class="col-md-6 form-group-box">
                                        <label class="form-label">
                                            <i class="fas fa-shield-alt"></i>
                                            {{ __('orders.insurance') }}
                                        </label>

                                        <div class="insured-box">
                                            <input name="is_insured"
                                                   class="form-check-input"
                                                   type="checkbox"
                                                   id="edit_insured"
                                                   disabled>

                                            <label class="form-check-label mb-0" for="edit_insured">
                                                {{ __('orders.is_insured') }}
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                {{-- Footer --}}
                                <div class="modal-footer">

                                    <button type="button"
                                            class="btn btn-cancel-order-edit"
                                            data-bs-dismiss="modal">

                                        <i class="fas fa-times me-1"></i>
                                        {{ __('orders.cancel') }}

                                    </button>

                                    <button type="submit"
                                            class="btn btn-update-order-edit">

                                        <i class="fas fa-save me-1"></i>
                                        {{ __('orders.update_order') }}

                                    </button>

                                </div>

                            </div>

                        </div>

                        {{-- Images --}}
                        <div class="col-md-5">

                            <div class="edit-order-image-card">

                                <div class="prescription-title">
                                    <i class="fas fa-file-medical"></i>
                                    {{ __('orders.prescription_images') }}
                                </div>

                                <div id="carouselExampleControls" class="carousel slide">

                                    <div class="carousel-inner" id="prescription"></div>

                                    <button class="carousel-control-prev"
                                            type="button"
                                            data-bs-target="#carouselExampleControls"
                                            data-bs-slide="prev">

                                        <span class="carousel-control-prev-icon"></span>

                                        <span class="visually-hidden">
                                            {{ __('orders.previous') }}
                                        </span>

                                    </button>

                                    <button class="carousel-control-next"
                                            type="button"
                                            data-bs-target="#carouselExampleControls"
                                            data-bs-slide="next">

                                        <span class="carousel-control-next-icon"></span>

                                        <span class="visually-hidden">
                                            {{ __('orders.next') }}
                                        </span>

                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

<script>
    function orderEditModalShow(event) {
        event.preventDefault();
        event.stopPropagation();

        const button = event.target.closest("button, a");

        if (!button) {
            alert("Edit button not found.");
            return;
        }

        const orderId =
            button.getAttribute("data-id") ||
            button.getAttribute("data-order-id") ||
            button.getAttribute("id");

        if (!orderId) {
            alert("Order ID not found.");
            return;
        }

        const editForm = document.getElementById("order-edit-form");

        if (!editForm) {
            alert("Edit order form not found.");
            return;
        }

        const updateBaseUrl = editForm.getAttribute("data-update-base-url");
        const showBaseUrl = editForm.getAttribute("data-show-base-url");

        /*
         * IMPORTANT:
         * This fixes the error.
         * The form will submit to /orders/{id}, not /orders.
         */
        editForm.setAttribute("action", updateBaseUrl + "/" + orderId);

        $("#editQuantity").empty();
        $("#prescription").empty();

        $.ajax({
            url: showBaseUrl + "/" + orderId,
            method: "GET",

            success: function (response) {
                const order = response.order || {};
                const medicines = response.medicines || [];
                const prescriptions = response.prescriptions || [];

                $("#AssignedUser").val(order.user_id);
                $("#editadress").val(order.delivering_address_id);
                $("#pharmacyEdit").val(order.pharmacy_id);
                $("#doctorEdit").val(order.doctor_id);

                $("#editOrderCreator").val(order.creator_type || "");
                $("#orderStatus").val(order.status || "");

                if (parseInt(order.is_insured) === 1) {
                    $("#edit_insured").prop("checked", true);
                } else {
                    $("#edit_insured").prop("checked", false);
                }

                const selectedMedicineIds = medicines.map(function (medicine) {
                    return String(medicine.id);
                });

                $("#edit_medicine").val(selectedMedicineIds).trigger("change");

                medicines.forEach(function (medicine) {
                    const quantityValue = medicine.quantity || 1;

                    $("#editQuantity").append(`
                        <div class="input-group mb-2">
                            <span class="input-group-text fw-bold">
                                ${medicine.name}
                            </span>

                            <input type="number"
                                   name="quantity[]"
                                   min="1"
                                   class="form-control"
                                   value="${quantityValue}"
                                   required>
                        </div>
                    `);
                });

                if (prescriptions.length === 0) {
                    $("#prescription").append(`
                        <div class="carousel-item active">
                            <div class="text-center text-muted fw-bold p-4">
                                No prescription images found.
                            </div>
                        </div>
                    `);
                } else {
                    prescriptions.forEach(function (prescription, index) {
                        const imageName =
                            prescription.image ||
                            prescription.prescription_image ||
                            prescription.prescription ||
                            prescription.file ||
                            prescription.filename ||
                            "";

                        if (!imageName) {
                            return;
                        }

                        $("#prescription").append(`
                            <div class="carousel-item ${index === 0 ? "active" : ""}">
                                <img src="/storage/prescriptions/${imageName}"
                                     class="d-block w-100"
                                     style="max-height:420px; object-fit:contain;"
                                     alt="Prescription Image">
                            </div>
                        `);
                    });
                }

                const editModalElement = document.getElementById("modEdit");

                if (typeof bootstrap !== "undefined") {
                    const editModal = new bootstrap.Modal(editModalElement);
                    editModal.show();
                } else {
                    $("#modEdit").modal("show");
                }
            },

            error: function () {
                alert("Unable to load order information. Please try again.");
            }
        });
    }

    function ordereditmodalShow(event) {
        orderEditModalShow(event);
    }

    function editordermodalShow(event) {
        orderEditModalShow(event);
    }
</script>