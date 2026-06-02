<style>
    #del_med .modal-content {
        border: none;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 22px 60px rgba(6, 78, 59, 0.28);
    }

    #del_med .modal-header {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        border-bottom: none;
        padding: 20px 24px;
    }

    #del_med .modal-title {
        font-size: 20px;
        font-weight: 900;
        letter-spacing: 0.4px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    #del_med .modal-title-icon {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: #ffffff;
        color: #064e3b;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.18);
    }

    #del_med .btn-close {
        background-color: #ffffff;
        opacity: 1;
        border-radius: 50%;
        padding: 10px;
    }

    #del_med .modal-body {
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 60%, #ecfdf5 100%);
        padding: 32px 26px;
        text-align: center;
    }

    #del_med .delete-main-icon {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background: #dcfce7;
        color: #064e3b;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 42px;
        margin: 0 auto 18px;
        box-shadow: 0 12px 28px rgba(6, 78, 59, 0.18);
    }

    #del_med .delete-title {
        color: #022c22;
        font-size: 22px;
        font-weight: 900;
        margin-bottom: 10px;
    }

    #del_med .delete-text {
        color: #475569;
        font-size: 15px;
        font-weight: 600;
        line-height: 1.7;
        margin-bottom: 0;
    }

    #del_med .delete-note-box {
        margin-top: 20px;
        background: #dcfce7;
        color: #064e3b;
        border-radius: 16px;
        padding: 13px 15px;
        font-size: 13px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    #del_med .modal-footer {
        background: #ffffff;
        border-top: 1px solid #d1fae5;
        padding: 18px 24px;
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    #del_med .btn-cancel-medicine-delete {
        background: #ecfdf5;
        color: #064e3b;
        border: none;
        border-radius: 24px;
        padding: 10px 24px;
        font-weight: 800;
        transition: all 0.25s ease;
    }

    #del_med .btn-cancel-medicine-delete:hover {
        background: #d1fae5;
        color: #022c22;
        transform: translateY(-2px);
    }

    #del_med .btn-confirm-medicine-delete {
        background: linear-gradient(90deg, #047857, #022c22);
        color: #ffffff;
        border: none;
        border-radius: 24px;
        padding: 10px 26px;
        font-weight: 800;
        box-shadow: 0 10px 22px rgba(6, 78, 59, 0.25);
        transition: all 0.25s ease;
    }

    #del_med .btn-confirm-medicine-delete:hover {
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.34);
        background: linear-gradient(90deg, #059669, #064e3b);
    }

    @media (max-width: 576px) {
        #del_med .modal-body {
            padding: 24px 16px;
        }

        #del_med .modal-footer {
            flex-direction: column;
        }

        #del_med .btn-cancel-medicine-delete,
        #del_med .btn-confirm-medicine-delete {
            width: 100%;
        }
    }
</style>

<!-- Delete Medicine Modal -->
<div class="modal fade"
     id="del_med"
     data-bs-backdrop="static"
     data-bs-keyboard="false"
     tabindex="-1"
     aria-labelledby="deleteMedicineModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">

                <h5 class="modal-title" id="deleteMedicineModalLabel">
                    <span class="modal-title-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                    {{ __('medicine.delete_medicine') }}
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="{{ __('medicine.close') }}">
                </button>

            </div>

            <!-- Body -->
            <div class="modal-body">

                <div class="delete-main-icon">
                    <i class="fas fa-pills"></i>
                </div>

                <h5 class="delete-title">
                    {{ __('medicine.delete_medicine_confirm_title') }}
                </h5>

                <p class="delete-text">
                    {{ __('medicine.delete_medicine_confirm_text') }}
                </p>

                <div class="delete-note-box">
                    <i class="fas fa-info-circle"></i>
                    {{ __('medicine.delete_medicine_note') }}
                </div>

            </div>

            <!-- Footer -->
            <div class="modal-footer">

                <button type="button"
                        class="btn btn-cancel-medicine-delete"
                        data-bs-dismiss="modal">

                    <i class="fas fa-times me-1"></i>
                    {{ __('medicine.cancel') }}

                </button>

                <button id="delete"
                        type="button"
                        class="btn btn-confirm-medicine-delete">

                    <i class="fas fa-trash me-1"></i>
                    {{ __('medicine.delete_medicine') }}

                </button>

            </div>

        </div>

    </div>

</div>

<script>
    let selectedMedicineDeleteForm = null;

    function medicineDeleteModalShow(event) {
        event.preventDefault();
        event.stopPropagation();

        selectedMedicineDeleteForm = event.target.closest("form");

        if (!selectedMedicineDeleteForm) {
            alert(@json(__('medicine.delete_form_not_found')));
            return;
        }

        const deleteModalElement = document.getElementById("del_med");

        if (typeof bootstrap !== "undefined") {
            const deleteModal = new bootstrap.Modal(deleteModalElement);
            deleteModal.show();
        } else {
            $("#del_med").modal("show");
        }
    }

    function deletemodalShow(event) {
        medicineDeleteModalShow(event);
    }

    function medicinedeletemodalShow(event) {
        medicineDeleteModalShow(event);
    }

    document.addEventListener("DOMContentLoaded", function () {
        const deleteButton = document.getElementById("delete");

        if (deleteButton) {
            deleteButton.addEventListener("click", function () {
                if (selectedMedicineDeleteForm) {
                    selectedMedicineDeleteForm.submit();
                } else {
                    alert(@json(__('medicine.no_medicine_selected_for_deletion')));
                }
            });
        }
    });
</script>