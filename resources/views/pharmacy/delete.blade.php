<style>
    #deletePharmacyModal .modal-content {
        border: none;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 22px 60px rgba(6, 78, 59, 0.28);
    }

    #deletePharmacyModal .modal-header {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        border-bottom: none;
        padding: 20px 24px;
    }

    #deletePharmacyModal .modal-title {
        font-size: 20px;
        font-weight: 800;
        letter-spacing: 0.4px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    #deletePharmacyModal .warning-icon {
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

    #deletePharmacyModal .btn-close {
        background-color: #ffffff;
        opacity: 1;
        border-radius: 50%;
        padding: 10px;
    }

    #deletePharmacyModal .modal-body {
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 60%, #ecfdf5 100%);
        padding: 30px 26px;
        text-align: center;
    }

    #deletePharmacyModal .delete-main-icon {
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

    #deletePharmacyModal .delete-title {
        color: #022c22;
        font-size: 22px;
        font-weight: 900;
        margin-bottom: 10px;
    }

    #deletePharmacyModal .delete-text {
        color: #475569;
        font-size: 15px;
        font-weight: 600;
        line-height: 1.7;
        margin-bottom: 0;
    }

    #deletePharmacyModal .delete-note-box {
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

    #deletePharmacyModal .modal-footer {
        background: #ffffff;
        border-top: 1px solid #d1fae5;
        padding: 18px 24px;
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    #deletePharmacyModal .btn-cancel-delete {
        background: #ecfdf5;
        color: #064e3b;
        border: none;
        border-radius: 24px;
        padding: 10px 24px;
        font-weight: 800;
        transition: all 0.25s ease;
    }

    #deletePharmacyModal .btn-cancel-delete:hover {
        background: #d1fae5;
        color: #022c22;
        transform: translateY(-2px);
    }

    #deletePharmacyModal .btn-confirm-delete {
        background: linear-gradient(90deg, #047857, #022c22);
        color: #ffffff;
        border: none;
        border-radius: 24px;
        padding: 10px 26px;
        font-weight: 800;
        box-shadow: 0 10px 22px rgba(6, 78, 59, 0.25);
        transition: all 0.25s ease;
    }

    #deletePharmacyModal .btn-confirm-delete:hover {
        color: #ffffff;
        transform: translateY(-2px);
        background: linear-gradient(90deg, #059669, #064e3b);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.34);
    }

    @media (max-width: 576px) {
        #deletePharmacyModal .modal-body {
            padding: 24px 16px;
        }

        #deletePharmacyModal .modal-footer {
            flex-direction: column;
        }

        #deletePharmacyModal .btn-cancel-delete,
        #deletePharmacyModal .btn-confirm-delete {
            width: 100%;
        }
    }
</style>

<!-- Delete Pharmacy Modal -->
<div class="modal fade"
     id="deletePharmacyModal"
     data-bs-backdrop="static"
     data-bs-keyboard="false"
     tabindex="-1"
     aria-labelledby="deletePharmacyModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="deletePharmacyModalLabel">
                    <span class="warning-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                    {{ __('pharmacy.delete_pharmacy') }}
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="{{ __('pharmacy.close') }}">
                </button>

            </div>

            <div class="modal-body">

                <div class="delete-main-icon">
                    <i class="fas fa-trash-alt"></i>
                </div>

                <h5 class="delete-title">
                    {{ __('pharmacy.delete_pharmacy_confirm_title') }}
                </h5>

                <p class="delete-text">
                    {{ __('pharmacy.delete_pharmacy_confirm_text') }}
                </p>

                <div class="delete-note-box">
                    <i class="fas fa-info-circle"></i>
                    {{ __('pharmacy.delete_pharmacy_note') }}
                </div>

            </div>

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-cancel-delete"
                    data-bs-dismiss="modal">

                    <i class="fas fa-times me-1"></i>
                    {{ __('pharmacy.cancel') }}

                </button>

                <form
                    method="POST"
                    id="delete-pharmacy-form"
                    class="delete_item">

                    @csrf
                    @method('DELETE')

                    <button
                        id="deletePharmacy"
                        type="submit"
                        class="btn btn-confirm-delete">

                        <i class="fas fa-trash me-1"></i>
                        {{ __('pharmacy.delete_pharmacy') }}

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<script>
    function showDeleteModal(event) {
        event.preventDefault();
        event.stopPropagation();

        const button = event.target.closest('button');
        const selectedPharmacyId = button ? button.getAttribute('id') : null;

        if (!selectedPharmacyId) {
            alert(@json(__('pharmacy.pharmacy_id_not_found')));
            return;
        }

        const deleteRoute = "{{ route('pharmacies.destroy', ':id') }}"
            .replace(':id', selectedPharmacyId);

        document.getElementById("delete-pharmacy-form").action = deleteRoute;
    }
</script>