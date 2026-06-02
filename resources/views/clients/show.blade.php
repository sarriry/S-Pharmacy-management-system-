<style>
    #show-client .modal-content {
        border: none;
        border-radius: 26px;
        overflow: hidden;
        box-shadow: 0 22px 60px rgba(6, 78, 59, 0.28);
    }

    #show-client .modal-header {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        border-bottom: none;
        padding: 20px 24px;
    }

    #show-client .modal-title {
        font-size: 20px;
        font-weight: 900;
        letter-spacing: 0.4px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    #show-client .modal-title-icon {
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

    #show-client .btn-close {
        background-color: #ffffff;
        opacity: 1;
        border-radius: 50%;
        padding: 10px;
    }

    #show-client .modal-body {
        background: linear-gradient(135deg, #ecfdf5 0%, #ffffff 55%, #dcfce7 100%);
        padding: 30px 26px;
    }

    #show-client .form-control {
        background-color: #ffffff;
        border: 1px solid rgba(6, 95, 70, 0.35);
        color: #022c22;
        font-weight: 800;
        box-shadow: 0 5px 14px rgba(6, 78, 59, 0.10);
    }

    #show-client .client-profile-box {
        text-align: center;
        margin-bottom: 24px;
    }

    #show-client .client-avatar-wrapper {
        width: 125px;
        height: 125px;
        border-radius: 50%;
        margin: 0 auto 14px;
        padding: 5px;
        background: linear-gradient(135deg, #065f46, #022c22);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.28);
    }

    #show-client #image {
        width: 115px;
        height: 115px;
        border-radius: 50%;
        object-fit: cover;
        background: #ffffff;
        border: 4px solid #ffffff;
    }

    #show-client .client-profile-title {
        color: #022c22;
        font-size: 22px;
        font-weight: 900;
        margin: 8px 0 4px;
    }

    #show-client .client-profile-subtitle {
        color: #64748b;
        font-size: 14px;
        font-weight: 700;
        margin: 0;
    }

    #show-client .client-profile-subtitle i {
        color: #065f46;
    }

    #show-client .client-info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 13px;
        width: 100%;
        margin-bottom: 24px;
    }

    #show-client .client-info-item {
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

    #show-client .client-info-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 26px rgba(6, 78, 59, 0.14);
    }

    #show-client .client-info-icon {
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

    #show-client .client-info-content {
        flex: 1;
    }

    #show-client .client-info-label {
        color: #64748b;
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        margin-bottom: 2px;
    }

    #show-client .client-info-value {
        color: #022c22;
        font-size: 15px;
        font-weight: 900;
        word-break: break-word;
    }

    #show-client .client-address-card {
        background: #ffffff;
        border-radius: 22px;
        border: 1px solid rgba(6, 95, 70, 0.14);
        padding: 18px;
        box-shadow: 0 10px 24px rgba(6, 78, 59, 0.09);
    }

    #show-client .client-address-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        padding-bottom: 14px;
        margin-bottom: 14px;
        border-bottom: 1px solid #d1fae5;
    }

    #show-client .client-address-header h5 {
        margin: 0;
        color: #022c22;
        font-size: 18px;
        font-weight: 900;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    #show-client .client-address-header h5 i {
        color: #065f46;
    }

    #show-client .client-address-header span {
        background: #d1fae5;
        color: #064e3b;
        border-radius: 20px;
        padding: 7px 13px;
        font-size: 12px;
        font-weight: 900;
        border: 1px solid rgba(6, 95, 70, 0.16);
    }

    #show-client #client-addresses {
        border-collapse: separate !important;
        border-spacing: 0 8px !important;
        width: 100% !important;
        margin-bottom: 0;
    }

    #show-client #client-addresses thead th {
        background: linear-gradient(90deg, #064e3b, #022c22) !important;
        color: #ffffff !important;
        border: none !important;
        padding: 13px 10px !important;
        font-weight: 900 !important;
        text-align: center !important;
        font-size: 13px;
    }

    #show-client #client-addresses tbody tr {
        background: transparent !important;
        box-shadow: none !important;
        transition: all 0.25s ease;
    }

    #show-client #client-addresses tbody tr:hover {
        transform: translateY(-2px);
    }

    #show-client #client-addresses tbody td {
        background: #f0fdf4 !important;
        color: #022c22 !important;
        font-weight: 900 !important;
        border: 2px solid #ffffff !important;
        padding: 13px 10px !important;
        text-align: center !important;
        vertical-align: middle !important;
    }

    #show-client #client-addresses tbody td:nth-child(1) {
        background: #d1fae5 !important;
        color: #064e3b !important;
    }

    #show-client #client-addresses tbody td:nth-child(2) {
        background: #dcfce7 !important;
        color: #065f46 !important;
    }

    #show-client #client-addresses tbody td:nth-child(3) {
        background: #ecfdf5 !important;
        color: #022c22 !important;
    }

    #show-client #client-addresses tbody td:nth-child(4) {
        background: #bbf7d0 !important;
        color: #14532d !important;
    }

    #show-client #client-addresses tbody td:nth-child(5) {
        background: #ccfbf1 !important;
        color: #134e4a !important;
    }

    #show-client #client-addresses tbody td:nth-child(6) {
        background: #f0fdf4 !important;
        color: #166534 !important;
    }

    #show-client #client-addresses tbody td:nth-child(7) {
        background: #dcfce7 !important;
        color: #14532d !important;
    }

    #show-client #client-addresses tbody td[colspan="7"] {
        background: #f8fafc !important;
        color: #64748b !important;
    }

    #show-client .main-address-icon {
        width: 28px;
        height: 28px;
        object-fit: contain;
        border-radius: 50%;
        border: 2px solid #065f46;
        padding: 2px;
        background: #ffffff;
    }

    #show-client .modal-footer {
        background: #ffffff;
        border-top: 1px solid #d1fae5;
        padding: 18px 24px;
        justify-content: center;
    }

    #show-client .btn-close-client-info {
        background: linear-gradient(90deg, #065f46, #022c22);
        color: #ffffff;
        border: none;
        border-radius: 24px;
        padding: 10px 28px;
        font-weight: 900;
        box-shadow: 0 10px 22px rgba(6, 78, 59, 0.25);
        transition: all 0.25s ease;
    }

    #show-client .btn-close-client-info:hover {
        color: #ffffff;
        transform: translateY(-2px);
        background: linear-gradient(90deg, #047857, #064e3b);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.34);
    }

    @media (max-width: 768px) {
        #show-client .client-info-grid {
            grid-template-columns: 1fr;
        }

        #show-client .modal-body {
            padding: 24px 16px;
        }

        #show-client .modal-header {
            padding: 18px 16px;
        }

        #show-client .btn-close-client-info {
            width: 100%;
        }
    }
</style>

<div class="modal fade"
     id="show-client"
     tabindex="-1"
     aria-labelledby="showClientModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-xl">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="showClientModalLabel">
                    <span class="modal-title-icon">
                        <i class="fas fa-user"></i>
                    </span>
                    {{ __('clients.client_information') }}
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="{{ __('clients.close') }}">
                </button>

            </div>

            <div class="modal-body">

                {{-- Client Image --}}
                <div class="client-profile-box">

                    <div class="client-avatar-wrapper">
                        <img id="image"
                             src=""
                             alt="{{ __('clients.client_avatar') }}">
                    </div>

                    <h4 class="client-profile-title" id="clientProfileTitle">
                        {{ __('clients.client_profile') }}
                    </h4>

                    <p class="client-profile-subtitle">
                        <i class="fas fa-info-circle me-1"></i>
                        {{ __('clients.client_profile_details') }}
                    </p>

                </div>

                {{-- Client Info --}}
                <div class="client-info-grid">

                    <div class="client-info-item">
                        <div class="client-info-icon">
                            <i class="fas fa-id-card"></i>
                        </div>

                        <div class="client-info-content">
                            <div class="client-info-label">{{ __('clients.national_id') }}</div>
                            <div class="client-info-value" id="national-id"></div>
                        </div>
                    </div>

                    <div class="client-info-item">
                        <div class="client-info-icon">
                            <i class="fas fa-user"></i>
                        </div>

                        <div class="client-info-content">
                            <div class="client-info-label">{{ __('clients.client_name') }}</div>
                            <div class="client-info-value" id="name"></div>
                        </div>
                    </div>

                    <div class="client-info-item">
                        <div class="client-info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>

                        <div class="client-info-content">
                            <div class="client-info-label">{{ __('clients.email_address') }}</div>
                            <div class="client-info-value" id="email"></div>
                        </div>
                    </div>

                    <div class="client-info-item">
                        <div class="client-info-icon">
                            <i class="fas fa-venus-mars"></i>
                        </div>

                        <div class="client-info-content">
                            <div class="client-info-label">{{ __('clients.gender') }}</div>
                            <div class="client-info-value" id="gender"></div>
                        </div>
                    </div>

                    <div class="client-info-item">
                        <div class="client-info-icon">
                            <i class="fas fa-phone"></i>
                        </div>

                        <div class="client-info-content">
                            <div class="client-info-label">{{ __('clients.phone_number') }}</div>
                            <div class="client-info-value" id="phone"></div>
                        </div>
                    </div>

                    <div class="client-info-item">
                        <div class="client-info-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>

                        <div class="client-info-content">
                            <div class="client-info-label">{{ __('clients.date_of_birth') }}</div>
                            <div class="client-info-value" id="date-of-birth"></div>
                        </div>
                    </div>

                </div>

                {{-- Address Table --}}
                <div class="client-address-card">

                    <div class="client-address-header">
                        <h5>
                            <i class="fas fa-map-marked-alt"></i>
                            {{ __('clients.client_addresses') }}
                        </h5>

                        <span>
                            <i class="fas fa-database me-1"></i>
                            {{ __('clients.address_records') }}
                        </span>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped text-center table-bordered"
                               id="client-addresses">

                            <thead>
                                <tr>
                                    <th>{{ __('clients.postal_code') }}</th>
                                    <th>{{ __('clients.area_name') }}</th>
                                    <th>{{ __('clients.street_name') }}</th>
                                    <th>{{ __('clients.building_no') }}</th>
                                    <th>{{ __('clients.floor_no') }}</th>
                                    <th>{{ __('clients.flat_no') }}</th>
                                    <th>{{ __('clients.main_street') }}</th>
                                </tr>
                            </thead>

                            <tbody id="client-body-addresses"></tbody>

                        </table>
                    </div>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button"
                        class="btn btn-close-client-info"
                        data-bs-dismiss="modal">

                    <i class="fas fa-check-circle me-1"></i>
                    {{ __('clients.close') }}

                </button>

            </div>

        </div>

    </div>

</div>

<script>
    let currentClientId = null;

    function clientshowmodalShow(event) {
        event.preventDefault();
        event.stopPropagation();

        const button = event.target.closest('button');
        const itemId = button ? button.getAttribute('id') : event.target.id;

        if (!itemId) {
            alert(@json(__('clients.client_id_not_found')));
            return;
        }

        currentClientId = itemId;

        $('#client-body-addresses').empty();

        $('#show-client #image').attr('src', '');
        $('#show-client #clientProfileTitle').text(@json(__('clients.client_profile')));
        $('#show-client #national-id').text('');
        $('#show-client #name').text('');
        $('#show-client #email').text('');
        $('#show-client #gender').text('');
        $('#show-client #phone').text('');
        $('#show-client #date-of-birth').text('');

        $.ajax({
            url: "{{ route('clients.show', ':id') }}".replace(':id', itemId),
            method: "GET",

            success: function(response) {
                const client = response.client;
                const user = response.user;
                const addresses = response.addresses || [];

                const imageName = client.avatar_image ?? 'default-avatar.jpg';

                const imagePath = "{{ asset('storage/clients_Images/:image_name') }}"
                    .replace(':image_name', imageName);

                $('#show-client #image').attr('src', imagePath);

                $('#show-client #clientProfileTitle').text(user?.name ?? @json(__('clients.client_profile')));
                $('#show-client #name').text(user?.name ?? @json(__('clients.n_a')));
                $('#show-client #email').text(user?.email ?? @json(__('clients.n_a')));
                $('#show-client #national-id').text(client?.id ?? @json(__('clients.n_a')));
                $('#show-client #gender').text(client?.gender ?? @json(__('clients.n_a')));
                $('#show-client #phone').text(client?.phone ?? @json(__('clients.n_a')));
                $('#show-client #date-of-birth').text(client?.date_of_birth ?? @json(__('clients.n_a')));

                const tableBody = $('#client-body-addresses');
                tableBody.empty();

                if (addresses.length === 0) {
                    tableBody.append(`
                        <tr>
                            <td colspan="7" class="text-center text-muted fw-bold py-4">
                                <i class="fas fa-map-marker-alt me-1"></i>
                                ${@json(__('clients.no_addresses_found_for_client'))}
                            </td>
                        </tr>
                    `);
                    return;
                }

                for (const address of addresses) {
                    const mainStreet = address.is_main
                        ? `<img src="/dist/img/icons/Success-Mark-icon.png" width="30" class="main-address-icon" alt="${@json(__('clients.main'))}">`
                        : `<img src="/dist/img/icons/Failed-Mark-icon.png" width="30" class="main-address-icon" alt="${@json(__('clients.not_main'))}">`;

                    const record = `
                        <tr>
                            <td>${address.area_id ?? @json(__('clients.n_a'))}</td>
                            <td>${address.area_name ?? @json(__('clients.n_a'))}</td>
                            <td>${address.street_name ?? @json(__('clients.n_a'))}</td>
                            <td>${address.building_number ?? @json(__('clients.n_a'))}</td>
                            <td>${address.floor_number ?? @json(__('clients.n_a'))}</td>
                            <td>${address.flat_number ?? @json(__('clients.n_a'))}</td>
                            <td>${mainStreet}</td>
                        </tr>
                    `;

                    tableBody.append(record);
                }
            },

            error: function() {
                alert(@json(__('clients.unable_load_client_info_try_again')));
            }
        });
    }

    function setClientId() {
        const clientInput = document.getElementById('client_id');

        if (clientInput) {
            clientInput.value = currentClientId;
        }
    }
</script>