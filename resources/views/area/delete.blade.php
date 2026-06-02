<style>
    #del-model .modal-content {
        border: none;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 22px 60px rgba(220, 53, 69, 0.28);
    }

    #del-model .modal-header {
        background: linear-gradient(90deg, #dc3545 0%, #b02a37 100%);
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
        color: #dc3545;
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
        background: linear-gradient(135deg, #fff5f5 0%, #ffffff 60%, #fff1f2 100%);
        padding: 32px 26px;
        text-align: center;
    }

    #del-model .delete-main-icon {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background: #ffe8e8;
        color: #dc3545;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 42px;
        margin: 0 auto 18px;
        box-shadow: 0 12px 28px rgba(220, 53, 69, 0.18);
    }

    #del-model .delete-title {
        color: #842029;
        font-size: 22px;
        font-weight: 900;
        margin-bottom: 10px;
    }

    #del-model .delete-text {
        color: #6c757d;
        font-size: 15px;
        font-weight: 600;
        line-height: 1.7;
        margin-bottom: 0;
    }

    #del-model .delete-note-box {
        margin-top: 20px;
        background: #fff3cd;
        color: #856404;
        border-radius: 16px;
        padding: 13px 15px;
        font-size: 13px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    #del-model .modal-footer {
        background: #ffffff;
        border-top: 1px solid #f1f5f9;
        padding: 18px 24px;
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    #del-model .btn-cancel-area-delete {
        background: #f1f5f9;
        color: #334155;
        border: none;
        border-radius: 24px;
        padding: 10px 24px;
        font-weight: 800;
        transition: all 0.25s ease;
    }

    #del-model .btn-cancel-area-delete:hover {
        background: #e2e8f0;
        color: #0f172a;
        transform: translateY(-2px);
    }

    #del-model .btn-confirm-area-delete {
        background: linear-gradient(90deg, #dc3545, #b02a37);
        color: #ffffff;
        border: none;
        border-radius: 24px;
        padding: 10px 26px;
        font-weight: 800;
        box-shadow: 0 10px 22px rgba(220, 53, 69, 0.25);
        transition: all 0.25s ease;
    }

    #del-model .btn-confirm-area-delete:hover {
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 14px 30px rgba(220, 53, 69, 0.34);
    }

    @media (max-width: 576px) {
        #del-model .modal-body {
            padding: 24px 16px;
        }

        #del-model .modal-footer {
            flex-direction: column;
        }

        #del-model .btn-cancel-area-delete,
        #del-model .btn-confirm-area-delete {
            width: 100%;
        }
    }
</style>

<!-- Delete Area Modal -->
<div class="modal fade"
     id="del-model"
     data-bs-backdrop="static"
     data-bs-keyboard="false"
     tabindex="-1"
     aria-labelledby="deleteAreaModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="deleteAreaModalLabel">
                    <span class="modal-title-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                    {{ __('area.delete_area') }}
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="{{ __('area.close') }}">
                </button>

            </div>

            <div class="modal-body">

                <div class="delete-main-icon">
                    <i class="fas fa-map-marked-alt"></i>
                </div>

                <h5 class="delete-title">
                    {{ __('area.delete_area_confirm_title') }}
                </h5>

                <p class="delete-text">
                    {{ __('area.delete_area_confirm_text') }}
                </p>

                <div class="delete-note-box">
                    <i class="fas fa-info-circle"></i>
                    {{ __('area.delete_area_note') }}
                </div>

            </div>

            <div class="modal-footer">

                <button type="button"
                        class="btn btn-cancel-area-delete"
                        data-bs-dismiss="modal">

                    <i class="fas fa-times me-1"></i>
                    {{ __('area.cancel') }}

                </button>

                <button id="deletePharmacy"
                        type="button"
                        class="btn btn-confirm-area-delete">

                    <i class="fas fa-trash me-1"></i>
                    {{ __('area.delete_area') }}

                </button>

            </div>

        </div>

    </div>

</div>

<script>
    let selectedAreaDeleteForm = null;

    function areaDeleteModalShow(event) {
        event.preventDefault();
        event.stopPropagation();

        selectedAreaDeleteForm = event.target.closest("form");

        if (!selectedAreaDeleteForm) {
            alert(@json(__('area.delete_form_not_found')));
            return;
        }

        const deleteModalElement = document.getElementById("del-model");

        if (typeof bootstrap !== "undefined") {
            const deleteModal = new bootstrap.Modal(deleteModalElement);
            deleteModal.show();
        } else {
            $("#del-model").modal("show");
        }
    }

    function deletemodalShow(event) {
        areaDeleteModalShow(event);
    }

    function areadeletemodalShow(event) {
        areaDeleteModalShow(event);
    }

    document.addEventListener("DOMContentLoaded", function () {
        const deleteButton = document.getElementById("deletePharmacy");

        if (deleteButton) {
            deleteButton.addEventListener("click", function () {
                if (selectedAreaDeleteForm) {
                    selectedAreaDeleteForm.submit();
                } else {
                    alert(@json(__('area.no_area_selected_for_deletion')));
                }
            });
        }
    });
</script>