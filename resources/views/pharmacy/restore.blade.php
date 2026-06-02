<style>
    #restorePharmacyModal .modal-content {
        border: none;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 22px 60px rgba(6, 78, 59, 0.28);
    }

    #restorePharmacyModal .modal-header {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        border-bottom: none;
        padding: 20px 24px;
    }

    #restorePharmacyModal .modal-title {
        font-size: 20px;
        font-weight: 800;
        letter-spacing: 0.4px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    #restorePharmacyModal .restore-title-icon {
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

    #restorePharmacyModal .btn-close {
        background-color: #ffffff;
        opacity: 1;
        border-radius: 50%;
        padding: 10px;
    }

    #restorePharmacyModal .modal-body {
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 60%, #ecfdf5 100%);
        padding: 32px 26px;
        text-align: center;
    }

    #restorePharmacyModal .restore-main-icon {
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

    #restorePharmacyModal .restore-title {
        color: #022c22;
        font-size: 22px;
        font-weight: 900;
        margin-bottom: 10px;
    }

    #restorePharmacyModal .restore-text {
        color: #475569;
        font-size: 15px;
        font-weight: 600;
        line-height: 1.7;
        margin-bottom: 0;
    }

    #restorePharmacyModal .restore-note-box {
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
        border: 1px solid rgba(6, 95, 70, 0.18);
    }

    #restorePharmacyModal .modal-footer {
        background: #ffffff;
        border-top: 1px solid #d1fae5;
        padding: 18px 24px;
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    #restorePharmacyModal .btn-cancel-restore {
        background: #ecfdf5;
        color: #064e3b;
        border: none;
        border-radius: 24px;
        padding: 10px 24px;
        font-weight: 800;
        transition: all 0.25s ease;
    }

    #restorePharmacyModal .btn-cancel-restore:hover {
        background: #d1fae5;
        color: #022c22;
        transform: translateY(-2px);
    }

    #restorePharmacyModal .btn-confirm-restore {
        background: linear-gradient(90deg, #047857, #022c22);
        color: #ffffff;
        border: none;
        border-radius: 24px;
        padding: 10px 26px;
        font-weight: 800;
        box-shadow: 0 10px 22px rgba(6, 78, 59, 0.25);
        transition: all 0.25s ease;
    }

    #restorePharmacyModal .btn-confirm-restore:hover {
        color: #ffffff;
        transform: translateY(-2px);
        background: linear-gradient(90deg, #059669, #064e3b);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.34);
    }

    @media (max-width: 576px) {
        #restorePharmacyModal .modal-body {
            padding: 24px 16px;
        }

        #restorePharmacyModal .modal-footer {
            flex-direction: column;
        }

        #restorePharmacyModal .btn-cancel-restore,
        #restorePharmacyModal .btn-confirm-restore {
            width: 100%;
        }
    }
</style>

<!-- Restore Pharmacy Modal -->
<div class="modal fade"
     id="restorePharmacyModal"
     data-bs-backdrop="static"
     data-bs-keyboard="false"
     tabindex="-1"
     aria-labelledby="restorePharmacyModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="restorePharmacyModalLabel">
                    <span class="restore-title-icon">
                        <i class="fas fa-undo"></i>
                    </span>
                    {{ __('pharmacy.restore_pharmacy') }}
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="{{ __('pharmacy.close') }}">
                </button>

            </div>

            <div class="modal-body">

                <div class="restore-main-icon">
                    <i class="fas fa-recycle"></i>
                </div>

                <h5 class="restore-title">
                    {{ __('pharmacy.restore_pharmacy_confirm_title') }}
                </h5>

                <p class="restore-text">
                    {{ __('pharmacy.restore_pharmacy_confirm_text') }}
                </p>

                <div class="restore-note-box">
                    <i class="fas fa-info-circle"></i>
                    {{ __('pharmacy.restore_pharmacy_note') }}
                </div>

            </div>

            <div class="modal-footer">

                <button type="button"
                        class="btn btn-cancel-restore"
                        data-bs-dismiss="modal">

                    <i class="fas fa-times me-1"></i>
                    {{ __('pharmacy.cancel') }}

                </button>

                <button id="restore"
                        type="button"
                        class="btn btn-confirm-restore">

                    <i class="fas fa-check-circle me-1"></i>
                    {{ __('pharmacy.restore_pharmacy') }}

                </button>

            </div>

        </div>

    </div>

</div>

<!-- Script -->
<script>
    let pharmacyRestoreForm = null;

    function restoreDeletedPharmacy(event) {
        event.preventDefault();
        event.stopPropagation();

        pharmacyRestoreForm = event.target.closest("form");

        if (!pharmacyRestoreForm) {
            alert(@json(__('pharmacy.restore_form_not_found')));
            return;
        }

        const restoreModalElement = document.getElementById("restorePharmacyModal");

        if (typeof bootstrap !== "undefined") {
            const restoreModal = new bootstrap.Modal(restoreModalElement);
            restoreModal.show();
        } else {
            $("#restorePharmacyModal").modal("show");
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        const restoreButton = document.getElementById("restore");

        if (restoreButton) {
            restoreButton.addEventListener("click", function () {
                if (pharmacyRestoreForm) {
                    pharmacyRestoreForm.submit();
                } else {
                    alert(@json(__('pharmacy.no_pharmacy_selected_for_restore')));
                }
            });
        }
    });
</script>