<style>
    #showPharmacyModal .modal-content {
        border: none;
        border-radius: 26px;
        overflow: hidden;
        box-shadow: 0 22px 60px rgba(6, 78, 59, 0.28);
    }

    #showPharmacyModal .modal-header {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        border-bottom: none;
        padding: 20px 24px;
    }

    #showPharmacyModal .modal-title {
        font-size: 20px;
        font-weight: 900;
        letter-spacing: 0.4px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    #showPharmacyModal .modal-title-icon {
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

    #showPharmacyModal .btn-close {
        background-color: #ffffff;
        opacity: 1;
        border-radius: 50%;
        padding: 10px;
    }

    #showPharmacyModal .modal-body {
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 55%, #ecfdf5 100%);
        padding: 30px 26px;
    }

    #showPharmacyModal .pharmacy-profile-box {
        text-align: center;
        margin-bottom: 24px;
    }

    #showPharmacyModal .pharmacy-avatar-wrapper {
        width: 125px;
        height: 125px;
        border-radius: 50%;
        margin: 0 auto 14px;
        padding: 5px;
        background: linear-gradient(135deg, #047857, #022c22);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.28);
    }

    #showPharmacyModal #pharmacyAvatar {
        width: 115px;
        height: 115px;
        border-radius: 50%;
        object-fit: cover;
        background: #ffffff;
        border: 4px solid #ffffff;
    }

    #showPharmacyModal .pharmacy-profile-title {
        color: #022c22;
        font-size: 22px;
        font-weight: 900;
        margin: 8px 0 4px;
    }

    #showPharmacyModal .pharmacy-profile-subtitle {
        color: #475569;
        font-size: 14px;
        font-weight: 700;
        margin: 0;
    }

    #showPharmacyModal .pharmacy-info-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 13px;
        width: 100%;
    }

    #showPharmacyModal .pharmacy-info-item {
        background: #ffffff;
        border: 1px solid rgba(6, 95, 70, 0.14);
        border-radius: 18px;
        padding: 14px 16px;
        display: flex;
        align-items: center;
        gap: 13px;
        box-shadow: 0 8px 20px rgba(6, 78, 59, 0.08);
        transition: all 0.25s ease;
    }

    #showPharmacyModal .pharmacy-info-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 26px rgba(6, 78, 59, 0.14);
    }

    #showPharmacyModal .pharmacy-info-icon {
        width: 44px;
        height: 44px;
        border-radius: 14px;
        background: linear-gradient(135deg, #047857, #022c22);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
    }

    #showPharmacyModal .pharmacy-info-content {
        flex: 1;
    }

    #showPharmacyModal .pharmacy-info-label {
        color: #64748b;
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        margin-bottom: 2px;
    }

    #showPharmacyModal .pharmacy-info-value {
        color: #022c22;
        font-size: 15px;
        font-weight: 900;
        word-break: break-word;
    }

    #showPharmacyModal .modal-footer {
        background: #ffffff;
        border-top: 1px solid #d1fae5;
        padding: 18px 24px;
        justify-content: center;
    }

    #showPharmacyModal .btn-close-info {
        background: linear-gradient(90deg, #047857, #022c22);
        color: #ffffff;
        border: none;
        border-radius: 24px;
        padding: 10px 28px;
        font-weight: 900;
        box-shadow: 0 10px 22px rgba(6, 78, 59, 0.25);
        transition: all 0.25s ease;
    }

    #showPharmacyModal .btn-close-info:hover {
        color: #ffffff;
        transform: translateY(-2px);
        background: linear-gradient(90deg, #059669, #064e3b);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.34);
    }

    @media (max-width: 576px) {
        #showPharmacyModal .modal-body {
            padding: 24px 16px;
        }

        #showPharmacyModal .modal-header {
            padding: 18px 16px;
        }

        #showPharmacyModal .btn-close-info {
            width: 100%;
        }
    }
</style>

<!-- Pharmacy Info Modal -->
<div class="modal fade"
     id="showPharmacyModal"
     tabindex="-1"
     aria-labelledby="showPharmacyModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="showPharmacyModalLabel">
                    <span class="modal-title-icon">
                        <i class="fas fa-clinic-medical"></i>
                    </span>
                    {{ __('pharmacy.pharmacy_information') }}
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="{{ __('pharmacy.close') }}">
                </button>

            </div>

            <div class="modal-body">

                <div class="pharmacy-profile-box">

                    <div class="pharmacy-avatar-wrapper">
                        <img id="pharmacyAvatar"
                             src=""
                             alt="{{ __('pharmacy.pharmacy_avatar') }}"
                             class="animation__wobble">
                    </div>

                    <h4 class="pharmacy-profile-title" id="pharmacyTitleName">
                        {{ __('pharmacy.pharmacy_name') }}
                    </h4>

                    <p class="pharmacy-profile-subtitle">
                        <i class="fas fa-info-circle me-1"></i>
                        {{ __('pharmacy.pharmacy_profile_details') }}
                    </p>

                </div>

                <div class="pharmacy-info-grid">

                    <div class="pharmacy-info-item">
                        <div class="pharmacy-info-icon">
                            <i class="fas fa-prescription-bottle-alt"></i>
                        </div>

                        <div class="pharmacy-info-content">
                            <div class="pharmacy-info-label">{{ __('pharmacy.pharmacy_name') }}</div>
                            <div class="pharmacy-info-value" id="pharmacyName"></div>
                        </div>
                    </div>

                    <div class="pharmacy-info-item">
                        <div class="pharmacy-info-icon">
                            <i class="fas fa-id-card"></i>
                        </div>

                        <div class="pharmacy-info-content">
                            <div class="pharmacy-info-label">{{ __('pharmacy.owner_id') }}</div>
                            <div class="pharmacy-info-value" id="pharmacyID"></div>
                        </div>
                    </div>

                    <div class="pharmacy-info-item">
                        <div class="pharmacy-info-icon">
                            <i class="fas fa-user"></i>
                        </div>

                        <div class="pharmacy-info-content">
                            <div class="pharmacy-info-label">{{ __('pharmacy.owner_name') }}</div>
                            <div class="pharmacy-info-value" id="pharmacyOwnerName"></div>
                        </div>
                    </div>

                    <div class="pharmacy-info-item">
                        <div class="pharmacy-info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>

                        <div class="pharmacy-info-content">
                            <div class="pharmacy-info-label">{{ __('pharmacy.owner_email') }}</div>
                            <div class="pharmacy-info-value" id="pharmacyOwnerEmail"></div>
                        </div>
                    </div>

                    <div class="pharmacy-info-item">
                        <div class="pharmacy-info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>

                        <div class="pharmacy-info-content">
                            <div class="pharmacy-info-label">{{ __('pharmacy.area') }}</div>
                            <div class="pharmacy-info-value" id="pharmacyArea"></div>
                        </div>
                    </div>

                    <div class="pharmacy-info-item">
                        <div class="pharmacy-info-icon">
                            <i class="fas fa-star"></i>
                        </div>

                        <div class="pharmacy-info-content">
                            <div class="pharmacy-info-label">{{ __('pharmacy.priority') }}</div>
                            <div class="pharmacy-info-value" id="pharmacyPriority"></div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button"
                        class="btn btn-close-info"
                        data-bs-dismiss="modal">

                    <i class="fas fa-check-circle me-1"></i>
                    {{ __('pharmacy.close') }}

                </button>

            </div>

        </div>

    </div>

</div>

<!-- Script -->
<script>
    const pharmacyShowTranslations = {
        pharmacyIdNotFound: @json(__('pharmacy.pharmacy_id_not_found')),
        pharmacyName: @json(__('pharmacy.pharmacy_name')),
        nA: @json(__('pharmacy.n_a')),
        unableLoadPharmacyInformation: @json(__('pharmacy.unable_load_pharmacy_information_try_again')),
    };

    function showPharmacyModal(event) {
        event.preventDefault();
        event.stopPropagation();

        const button = event.target.closest('button');
        const pharmacyId = button ? button.getAttribute('id') : null;

        if (!pharmacyId) {
            alert(pharmacyShowTranslations.pharmacyIdNotFound);
            return;
        }

        $.ajax({
            url: "{{ route('pharmacies.show', ':id') }}".replace(':id', pharmacyId),
            method: "GET",

            success: function(response) {
                const pharmacy = response.pharmacy;
                const user = response.user;

                const imagePath = "{{ asset('storage/pharmacies_Images/:image') }}"
                    .replace(':image', pharmacy.avatar_image ?? 'default-avatar.jpg');

                $('#pharmacyAvatar').attr('src', imagePath);

                $('#pharmacyTitleName').text(pharmacy.pharmacy_name ?? pharmacyShowTranslations.pharmacyName);
                $('#pharmacyName').text(pharmacy.pharmacy_name ?? pharmacyShowTranslations.nA);
                $('#pharmacyID').text(pharmacy.id ?? pharmacyShowTranslations.nA);
                $('#pharmacyOwnerName').text(user?.name ?? pharmacyShowTranslations.nA);
                $('#pharmacyOwnerEmail').text(user?.email ?? pharmacyShowTranslations.nA);
                $('#pharmacyArea').text(pharmacy.area?.name ?? response.area?.name ?? pharmacyShowTranslations.nA);
                $('#pharmacyPriority').text(pharmacy.priority ?? pharmacyShowTranslations.nA);
            },

            error: function() {
                alert(pharmacyShowTranslations.unableLoadPharmacyInformation);
            }
        });
    }
</script>