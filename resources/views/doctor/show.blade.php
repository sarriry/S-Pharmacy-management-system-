<style>
    #show-doctor .modal-content {
        border: none;
        border-radius: 26px;
        overflow: hidden;
        box-shadow: 0 22px 60px rgba(6, 78, 59, 0.28);
    }

    #show-doctor .modal-header {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        border-bottom: none;
        padding: 20px 24px;
    }

    #show-doctor .modal-title {
        font-size: 20px;
        font-weight: 900;
        letter-spacing: 0.4px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    #show-doctor .modal-title-icon {
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

    #show-doctor .btn-close {
        background-color: #ffffff;
        opacity: 1;
        border-radius: 50%;
        padding: 10px;
    }

    #show-doctor .modal-body {
        background: linear-gradient(135deg, #ecfdf5 0%, #ffffff 55%, #dcfce7 100%);
        padding: 30px 26px;
    }

    #show-doctor .doctor-profile-box {
        text-align: center;
        margin-bottom: 24px;
    }

    #show-doctor .doctor-avatar-wrapper {
        width: 125px;
        height: 125px;
        border-radius: 50%;
        margin: 0 auto 14px;
        padding: 5px;
        background: linear-gradient(135deg, #065f46, #022c22);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.28);
    }

    #show-doctor #doctorAvatar {
        width: 115px;
        height: 115px;
        border-radius: 50%;
        object-fit: cover;
        background: #ffffff;
        border: 4px solid #ffffff;
    }

    #show-doctor .doctor-profile-title {
        color: #022c22;
        font-size: 22px;
        font-weight: 900;
        margin: 8px 0 4px;
    }

    #show-doctor .doctor-profile-subtitle {
        color: #64748b;
        font-size: 14px;
        font-weight: 700;
        margin: 0;
    }

    #show-doctor .doctor-profile-subtitle i {
        color: #065f46;
    }

    #show-doctor .doctor-info-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 13px;
        width: 100%;
    }

    #show-doctor .doctor-info-item {
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 100%);
        border: 1px solid rgba(6, 95, 70, 0.22);
        border-radius: 18px;
        padding: 14px 16px;
        display: flex;
        align-items: center;
        gap: 13px;
        box-shadow: 0 8px 20px rgba(6, 78, 59, 0.08);
        transition: all 0.25s ease;
    }

    #show-doctor .doctor-info-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 26px rgba(6, 78, 59, 0.14);
    }

    #show-doctor .doctor-info-icon {
        width: 44px;
        height: 44px;
        border-radius: 14px;
        background: linear-gradient(135deg, #065f46, #022c22);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
    }

    #show-doctor .doctor-info-content {
        flex: 1;
    }

    #show-doctor .doctor-info-label {
        color: #64748b;
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        margin-bottom: 2px;
    }

    #show-doctor .doctor-info-value {
        color: #022c22;
        font-size: 15px;
        font-weight: 900;
        word-break: break-word;
    }

    #show-doctor .doctor-status-box {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    #show-doctor #is-banned {
        width: 26px;
        height: 26px;
        object-fit: contain;
        border-radius: 50%;
        border: 2px solid #065f46;
        padding: 2px;
        background: #ffffff;
    }

    #show-doctor .modal-footer {
        background: #ffffff;
        border-top: 1px solid #d1fae5;
        padding: 18px 24px;
        justify-content: center;
    }

    #show-doctor .btn-close-doctor-info {
        background: linear-gradient(90deg, #065f46, #022c22);
        color: #ffffff;
        border: none;
        border-radius: 24px;
        padding: 10px 28px;
        font-weight: 900;
        box-shadow: 0 10px 22px rgba(6, 78, 59, 0.25);
        transition: all 0.25s ease;
    }

    #show-doctor .btn-close-doctor-info:hover {
        color: #ffffff;
        transform: translateY(-2px);
        background: linear-gradient(90deg, #047857, #064e3b);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.34);
    }

    @media (max-width: 576px) {
        #show-doctor .modal-body {
            padding: 24px 16px;
        }

        #show-doctor .modal-header {
            padding: 18px 16px;
        }

        #show-doctor .btn-close-doctor-info {
            width: 100%;
        }
    }
</style>

<!-- Show Doctor Modal -->
<div class="modal fade"
     id="show-doctor"
     tabindex="-1"
     aria-labelledby="showDoctorModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">

                <h5 class="modal-title" id="showDoctorModalLabel">
                    <span class="modal-title-icon">
                        <i class="fas fa-user-md"></i>
                    </span>
                    {{ __('doctor.doctor_information') }}
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="{{ __('doctor.close') }}">
                </button>

            </div>

            <!-- Body -->
            <div class="modal-body">

                <div class="doctor-profile-box">

                    <div class="doctor-avatar-wrapper">
                        <img id="doctorAvatar"
                             src=""
                             alt="{{ __('doctor.doctor_avatar') }}">
                    </div>

                    <h4 class="doctor-profile-title" id="doctorProfileTitle">
                        {{ __('doctor.doctor_profile') }}
                    </h4>

                    <p class="doctor-profile-subtitle">
                        <i class="fas fa-info-circle me-1"></i>
                        {{ __('doctor.doctor_profile_details') }}
                    </p>

                </div>

                <div class="doctor-info-grid">

                    <div class="doctor-info-item">
                        <div class="doctor-info-icon">
                            <i class="fas fa-user"></i>
                        </div>

                        <div class="doctor-info-content">
                            <div class="doctor-info-label">{{ __('doctor.doctor_name') }}</div>
                            <div class="doctor-info-value" id="doctorName"></div>
                        </div>
                    </div>

                    <div class="doctor-info-item">
                        <div class="doctor-info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>

                        <div class="doctor-info-content">
                            <div class="doctor-info-label">{{ __('doctor.email_address') }}</div>
                            <div class="doctor-info-value" id="doctorEmail"></div>
                        </div>
                    </div>

                    <div class="doctor-info-item">
                        <div class="doctor-info-icon">
                            <i class="fas fa-id-card"></i>
                        </div>

                        <div class="doctor-info-content">
                            <div class="doctor-info-label">{{ __('doctor.national_id') }}</div>
                            <div class="doctor-info-value" id="national-id"></div>
                        </div>
                    </div>

                    <div class="doctor-info-item">
                        <div class="doctor-info-icon">
                            <i class="fas fa-clinic-medical"></i>
                        </div>

                        <div class="doctor-info-content">
                            <div class="doctor-info-label">{{ __('doctor.assigned_pharmacy') }}</div>
                            <div class="doctor-info-value" id="pharmacy"></div>
                        </div>
                    </div>

                    <div class="doctor-info-item">
                        <div class="doctor-info-icon">
                            <i class="fas fa-ban"></i>
                        </div>

                        <div class="doctor-info-content">
                            <div class="doctor-info-label">{{ __('doctor.banned_status') }}</div>

                            <div class="doctor-info-value doctor-status-box">
                                <span>{{ __('doctor.status') }}</span>
                                <img id="is-banned"
                                     src=""
                                     alt="{{ __('doctor.banned_status') }}">
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Footer -->
            <div class="modal-footer">

                <button type="button"
                        class="btn btn-close-doctor-info"
                        data-bs-dismiss="modal">

                    <i class="fas fa-check-circle me-1"></i>
                    {{ __('doctor.close') }}

                </button>

            </div>

        </div>

    </div>

</div>

<script>
    function doctorshowmodalShow(event) {
        event.preventDefault();
        event.stopPropagation();

        const button = event.target.closest('button');
        const doctorId = button ? button.getAttribute('id') : event.target.id;

        if (!doctorId) {
            alert('Doctor ID not found.');
            return;
        }

        $('#show-doctor #doctorName').text('');
        $('#show-doctor #doctorEmail').text('');
        $('#show-doctor #national-id').text('');
        $('#show-doctor #pharmacy').text('');
        $('#show-doctor #doctorProfileTitle').text('');
        $('#show-doctor #doctorAvatar').attr('src', '');
        $('#show-doctor #is-banned').attr('src', '');

        $.ajax({
            url: "{{ route('doctors.show', ':id') }}".replace(':id', doctorId),
            method: "GET",

            success: function(response) {
                const doctor = response.doctor || {};
                const user = response.user || {};
                const pharmacy = response.pharmacy || {};

                $('#show-doctor #doctorName').text(user.name ?? 'N/A');
                $('#show-doctor #doctorEmail').text(user.email ?? 'N/A');
                $('#show-doctor #national-id').text(doctor.id ?? 'N/A');
                $('#show-doctor #pharmacy').text(pharmacy.pharmacy_name ?? 'N/A');
                $('#show-doctor #doctorProfileTitle').text(user.name ?? 'Doctor Profile');

                if (doctor.avatar_image) {
                    $('#show-doctor #doctorAvatar').attr(
                        'src',
                        "{{ asset('storage/doctors_Images') }}/" + doctor.avatar_image
                    );
                } else {
                    $('#show-doctor #doctorAvatar').attr(
                        'src',
                        "{{ asset('storage/doctors_Images/default-avatar.jpg') }}"
                    );
                }

                if (user.is_banned == 1 || doctor.is_banned == 1) {
                    $('#show-doctor #is-banned').attr(
                        'src',
                        "{{ asset('images/banned.png') }}"
                    );
                } else {
                    $('#show-doctor #is-banned').attr(
                        'src',
                        "{{ asset('images/active.png') }}"
                    );
                }
            },

            error: function(xhr) {
                console.log('Doctor show error:', xhr.responseJSON || xhr.responseText);

                if (xhr.responseJSON && xhr.responseJSON.real_error) {
                    alert(xhr.responseJSON.real_error);
                    return;
                }

                if (xhr.responseJSON && xhr.responseJSON.message) {
                    alert(xhr.responseJSON.message);
                    return;
                }

                alert('Unable to load doctor information.');
            }
        });
    }
</script>