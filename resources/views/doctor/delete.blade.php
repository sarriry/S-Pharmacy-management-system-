<style>
    #del-model .modal-content {
        border: none;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 22px 60px rgba(6, 78, 59, 0.28);
    }

    #del-model .modal-header {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        border-bottom: none;
        padding: 20px 24px;
    }

    #del-model .modal-title {
        font-size: 20px;
        font-weight: 900;
        letter-spacing: 0.4px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    #del-model .modal-title-icon {
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

    #del-model .btn-close {
        background-color: #ffffff;
        opacity: 1;
        border-radius: 50%;
        padding: 10px;
    }

    #del-model .modal-body {
        background: linear-gradient(135deg, #ecfdf5 0%, #ffffff 60%, #dcfce7 100%);
        padding: 32px 26px;
        text-align: center;
    }

    #del-model .delete-main-icon {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background: #d1fae5;
        color: #064e3b;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 42px;
        margin: 0 auto 18px;
        box-shadow: 0 12px 28px rgba(6, 78, 59, 0.18);
    }

    #del-model .delete-title {
        color: #022c22;
        font-size: 22px;
        font-weight: 900;
        margin-bottom: 10px;
    }

    #del-model .delete-text {
        color: #475569;
        font-size: 15px;
        font-weight: 600;
        line-height: 1.7;
        margin-bottom: 0;
    }

    #del-model .delete-note-box {
        margin-top: 20px;
        background: #d1fae5;
        color: #064e3b;
        border-radius: 16px;
        padding: 13px 15px;
        font-size: 13px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        border: 1px solid rgba(6, 95, 70, 0.16);
    }

    #del-model .modal-footer {
        background: #ffffff;
        border-top: 1px solid #d1fae5;
        padding: 18px 24px;
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    #del-model .btn-cancel-doctor-delete {
        background: #f1f5f9;
        color: #334155;
        border: none;
        border-radius: 24px;
        padding: 10px 24px;
        font-weight: 800;
        transition: all 0.25s ease;
    }

    #del-model .btn-cancel-doctor-delete:hover {
        background: #e2e8f0;
        color: #022c22;
        transform: translateY(-2px);
    }

    #del-model .btn-confirm-doctor-delete {
        background: linear-gradient(90deg, #065f46, #022c22);
        color: #ffffff;
        border: none;
        border-radius: 24px;
        padding: 10px 26px;
        font-weight: 800;
        box-shadow: 0 10px 22px rgba(6, 78, 59, 0.25);
        transition: all 0.25s ease;
    }

    #del-model .btn-confirm-doctor-delete:hover {
        color: #ffffff;
        transform: translateY(-2px);
        background: linear-gradient(90deg, #047857, #064e3b);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.34);
    }

    @media (max-width: 576px) {
        #del-model .modal-body {
            padding: 24px 16px;
        }

        #del-model .modal-footer {
            flex-direction: column;
        }

        #del-model .btn-cancel-doctor-delete,
        #del-model .btn-confirm-doctor-delete {
            width: 100%;
        }
    }
</style>

<!-- Delete Doctor Modal -->
<div class="modal fade"
     id="del-model"
     data-bs-backdrop="static"
     data-bs-keyboard="false"
     tabindex="-1"
     aria-labelledby="deleteDoctorModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">

                <h5 class="modal-title" id="deleteDoctorModalLabel">
                    <span class="modal-title-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                    {{ __('doctor.delete_doctor') }}
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="{{ __('doctor.close') }}">
                </button>

            </div>

            <!-- Body -->
            <div class="modal-body">

                <div class="delete-main-icon">
                    <i class="fas fa-user-times"></i>
                </div>

                <h5 class="delete-title">
                    {{ __('doctor.delete_doctor_confirm_title') }}
                </h5>

                <p class="delete-text">
                    {{ __('doctor.delete_doctor_confirm_text') }}
                </p>

                <div class="delete-note-box">
                    <i class="fas fa-info-circle"></i>
                    {{ __('doctor.delete_doctor_note') }}
                </div>

            </div>

            <!-- Footer -->
            <div class="modal-footer">

                <button type="button"
                        class="btn btn-cancel-doctor-delete"
                        data-bs-dismiss="modal">

                    <i class="fas fa-times me-1"></i>
                    {{ __('doctor.cancel') }}

                </button>

                <button id="delete"
                        type="button"
                        class="btn btn-confirm-doctor-delete">

                    <i class="fas fa-trash me-1"></i>
                    {{ __('doctor.delete_doctor') }}

                </button>

            </div>

        </div>

    </div>

</div>

<script>
    let selectedDoctorDeleteForm = null;

    function deletemodalShow(event) {
        event.preventDefault();
        event.stopPropagation();

        const clickedElement = event.target;
        selectedDoctorDeleteForm = clickedElement.closest("form");

        if (!selectedDoctorDeleteForm) {
            alert(@json(__('doctor.delete_form_not_found')));
            return;
        }

        const deleteModalElement = document.getElementById("del-model");

        if (typeof bootstrap !== "undefined") {
            const deleteModal = bootstrap.Modal.getOrCreateInstance(deleteModalElement);
            deleteModal.show();
        } else {
            $("#del-model").modal("show");
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        const deleteButton = document.getElementById("delete");

        if (deleteButton) {
            deleteButton.addEventListener("click", function () {
                if (selectedDoctorDeleteForm) {
                    selectedDoctorDeleteForm.submit();
                } else {
                    alert(@json(__('doctor.no_doctor_selected_for_deletion')));
                }
            });
        }
    });
</script>