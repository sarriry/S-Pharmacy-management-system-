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
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 55%, #ecfdf5 100%);
        padding: 26px;
    }

    #create .medicine-note {
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
        color: #047857;
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
        color: #047857;
        font-size: 15px;
        z-index: 2;
    }

    #create .form-control {
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

    #create .form-control:focus {
        border-color: #047857;
        box-shadow: 0 0 0 0.18rem rgba(4, 120, 87, 0.16);
    }

    #create .form-control::placeholder {
        color: #94a3b8;
        font-weight: 500;
    }

    #create .modal-footer {
        background: #ffffff;
        border-top: 1px solid #d1fae5;
        padding: 18px 24px;
    }

    #create .btn-cancel-medicine {
        background: #ecfdf5;
        color: #064e3b;
        border: none;
        border-radius: 24px;
        padding: 10px 24px;
        font-weight: 800;
        transition: all 0.25s ease;
    }

    #create .btn-cancel-medicine:hover {
        background: #d1fae5;
        color: #022c22;
        transform: translateY(-2px);
    }

    #create .btn-create-medicine {
        background: linear-gradient(90deg, #047857, #022c22);
        color: #ffffff;
        border: none;
        border-radius: 24px;
        padding: 10px 26px;
        font-weight: 800;
        box-shadow: 0 10px 22px rgba(6, 78, 59, 0.25);
        transition: all 0.25s ease;
    }

    #create .btn-create-medicine:hover {
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.34);
        background: linear-gradient(90deg, #059669, #064e3b);
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

        #create .btn-cancel-medicine,
        #create .btn-create-medicine {
            width: 100%;
        }
    }
</style>

<!-- Create Medicine Modal -->
<div class="modal fade"
     id="create"
     tabindex="-1"
     aria-labelledby="createMedicineModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">

                <h5 class="modal-title" id="createMedicineModalLabel">
                    <span class="modal-title-icon">
                        <i class="fas fa-pills"></i>
                    </span>
                    {{ __('medicine.create_new_medicine') }}
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="{{ __('medicine.close') }}">
                </button>

            </div>

            <!-- Form -->
            <form method="POST"
                  action="{{ route('medicines.store') }}"
                  enctype="multipart/form-data">

                @csrf

                <div class="modal-body">

                    <div class="medicine-note">
                        <i class="fas fa-info-circle"></i>
                        {{ __('medicine.create_medicine_note') }}
                    </div>

                    <!-- Name -->
                    <div class="form-group-box">
                        <label class="form-label">
                            <i class="fas fa-capsules"></i>
                            {{ __('medicine.medicine_name') }}
                        </label>

                        <div class="input-icon-box">
                            <i class="fas fa-prescription-bottle-alt"></i>

                            <input name="name"
                                   type="text"
                                   class="form-control"
                                   placeholder="{{ __('medicine.enter_medicine_name') }}"
                                   value="{{ old('name') }}">
                        </div>
                    </div>

                    <!-- Type -->
                    <div class="form-group-box">
                        <label class="form-label">
                            <i class="fas fa-notes-medical"></i>
                            {{ __('medicine.medicine_type') }}
                        </label>

                        <div class="input-icon-box">
                            <i class="fas fa-tablets"></i>

                            <input name="type"
                                   type="text"
                                   class="form-control"
                                   placeholder="{{ __('medicine.enter_medicine_type') }}"
                                   value="{{ old('type') }}">
                        </div>
                    </div>

                    <!-- Quantity -->
                    <div class="form-group-box">
                        <label class="form-label">
                            <i class="fas fa-boxes"></i>
                            {{ __('medicine.quantity') }}
                        </label>

                        <div class="input-icon-box">
                            <i class="fas fa-sort-numeric-up"></i>

                            <input name="quantity"
                                   type="number"
                                   min="0"
                                   class="form-control"
                                   placeholder="{{ __('medicine.enter_quantity') }}"
                                   value="{{ old('quantity') }}">
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="form-group-box">
                        <label class="form-label">
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
                                   placeholder="{{ __('medicine.enter_price') }}"
                                   value="{{ old('price') }}">
                        </div>
                    </div>

                    <!-- Expiration Date -->
                    <div class="form-group-box">
                        <label class="form-label">
                            <i class="fas fa-calendar-times"></i>
                            {{ __('medicine.expiration_date') }}
                        </label>

                        <div class="input-icon-box">
                            <i class="fas fa-calendar-alt"></i>

                            <input name="expiration_date"
                                   type="date"
                                   class="form-control"
                                   value="{{ old('expiration_date') }}"
                                   required>
                        </div>
                    </div>

                </div>

                <!-- Footer -->
                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-cancel-medicine"
                            data-bs-dismiss="modal">

                        <i class="fas fa-times me-1"></i>
                        {{ __('medicine.cancel') }}

                    </button>

                    <button type="submit"
                            class="btn btn-create-medicine">

                        <i class="fas fa-plus-circle me-1"></i>
                        {{ __('medicine.create_medicine') }}

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>