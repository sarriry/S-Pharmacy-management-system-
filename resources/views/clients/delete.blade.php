<style>
    #client-del-model .modal-content {
        border: none;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 22px 60px rgba(6, 78, 59, 0.28);
    }

    #client-del-model .modal-header {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        border-bottom: none;
        padding: 20px 24px;
    }

    #client-del-model .modal-title {
        font-size: 20px;
        font-weight: 900;
        letter-spacing: 0.4px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    #client-del-model .modal-title-icon {
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

    #client-del-model .btn-close {
        background-color: #ffffff;
        opacity: 1;
        border-radius: 50%;
        padding: 10px;
    }

    #client-del-model .modal-body {
        background: linear-gradient(135deg, #ecfdf5 0%, #ffffff 60%, #dcfce7 100%);
        padding: 32px 26px;
        text-align: center;
    }

    #client-del-model .delete-main-icon {
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

    #client-del-model .delete-title {
        color: #022c22;
        font-size: 22px;
        font-weight: 900;
        margin-bottom: 10px;
    }

    #client-del-model .delete-text {
        color: #475569;
        font-size: 15px;
        font-weight: 600;
        line-height: 1.7;
        margin-bottom: 0;
    }

    #client-del-model .delete-note-box {
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

    #client-del-model .modal-footer {
        background: #ffffff;
        border-top: 1px solid #d1fae5;
        padding: 18px 24px;
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    #client-del-model .btn-cancel-client-delete {
        background: #f1f5f9;
        color: #334155;
        border: none;
        border-radius: 24px;
        padding: 10px 24px;
        font-weight: 800;
        transition: all 0.25s ease;
    }

    #client-del-model .btn-cancel-client-delete:hover {
        background: #e2e8f0;
        color: #022c22;
        transform: translateY(-2px);
    }

    #client-del-model .btn-confirm-client-delete {
        background: linear-gradient(90deg, #065f46, #022c22);
        color: #ffffff;
        border: none;
        border-radius: 24px;
        padding: 10px 26px;
        font-weight: 800;
        box-shadow: 0 10px 22px rgba(6, 78, 59, 0.25);
        transition: all 0.25s ease;
    }

    #client-del-model .btn-confirm-client-delete:hover {
        color: #ffffff;
        transform: translateY(-2px);
        background: linear-gradient(90deg, #047857, #064e3b);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.34);
    }

    @media (max-width: 576px) {
        #client-del-model .modal-body {
            padding: 24px 16px;
        }

        #client-del-model .modal-footer {
            flex-direction: column;
        }

        #client-del-model .btn-cancel-client-delete,
        #client-del-model .btn-confirm-client-delete {
            width: 100%;
        }
    }
</style>

<!-- Delete Client Modal -->
<div class="modal fade"
     id="client-del-model"
     data-bs-backdrop="static"
     data-bs-keyboard="false"
     tabindex="-1"
     aria-labelledby="deleteClientModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="deleteClientModalLabel">
                    <span class="modal-title-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                    {{ __('clients.delete_client') }}
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="{{ __('clients.close') }}">
                </button>

            </div>

            <div class="modal-body">

                <div class="delete-main-icon">
                    <i class="fas fa-user-times"></i>
                </div>

                <h5 class="delete-title">
                    {{ __('clients.delete_client_confirm_title') }}
                </h5>

                <p class="delete-text">
                    {{ __('clients.delete_client_confirm_text') }}
                </p>

                <div class="delete-note-box">
                    <i class="fas fa-info-circle"></i>
                    {{ __('clients.delete_client_note') }}
                </div>

            </div>

            <div class="modal-footer">

                <button type="button"
                        class="btn btn-cancel-client-delete"
                        data-bs-dismiss="modal">

                    <i class="fas fa-times me-1"></i>
                    {{ __('clients.cancel') }}

                </button>

                <button id="delete-client"
                        type="button"
                        class="btn btn-confirm-client-delete">

                    <i class="fas fa-trash me-1"></i>
                    {{ __('clients.delete_client') }}

                </button>

            </div>

        </div>

    </div>

</div>

<script>
    let selectedClientDeleteForm = null;

    function clientDeleteModalShow(event) {
        event.preventDefault();
        event.stopPropagation();

        selectedClientDeleteForm = event.target.closest("form");

        if (!selectedClientDeleteForm) {
            alert(@json(__('clients.delete_form_not_found')));
            return;
        }

        const deleteModalElement = document.getElementById("client-del-model");

        if (typeof bootstrap !== "undefined") {
            const deleteModal = bootstrap.Modal.getOrCreateInstance(deleteModalElement);
            deleteModal.show();
        } else {
            $("#client-del-model").modal("show");
        }
    }

    function deleteClientModalShow(event) {
        clientDeleteModalShow(event);
    }

    function clientDeletemodalShow(event) {
        clientDeleteModalShow(event);
    }

    document.addEventListener("DOMContentLoaded", function () {
        const deleteButton = document.getElementById("delete-client");

        if (deleteButton) {
            deleteButton.addEventListener("click", function () {
                if (selectedClientDeleteForm) {
                    selectedClientDeleteForm.submit();
                } else {
                    alert(@json(__('clients.no_client_selected_for_deletion')));
                }
            });
        }
    });
</script>