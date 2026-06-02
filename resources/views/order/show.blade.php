<style>
    #showOrder .modal-content {
        border: none;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 22px 60px rgba(6, 78, 59, 0.28);
    }

    #showOrder .modal-header {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        border-bottom: none;
        padding: 20px 24px;
    }

    #showOrder .modal-title {
        font-size: 20px;
        font-weight: 900;
        letter-spacing: 0.4px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    #showOrder .modal-title-icon {
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

    #showOrder .btn-close {
        background-color: #ffffff;
        opacity: 1;
        border-radius: 50%;
        padding: 10px;
    }

    #showOrder .modal-body {
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 55%, #ecfdf5 100%);
        padding: 26px;
    }

    #showOrder .order-info-card {
        background: #ffffff;
        border: 1px solid rgba(6, 95, 70, 0.14);
        border-radius: 22px;
        padding: 22px;
        box-shadow: 0 12px 28px rgba(6, 78, 59, 0.10);
        margin-bottom: 18px;
    }

    #showOrder .order-info-title {
        color: #022c22;
        font-size: 18px;
        font-weight: 900;
        margin-bottom: 18px;
        display: flex;
        align-items: center;
        gap: 9px;
        border-bottom: 1px solid #d1fae5;
        padding-bottom: 12px;
    }

    #showOrder .info-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 14px;
    }

    #showOrder .info-box {
        background: #f0fdf4;
        border: 1px solid #d1fae5;
        border-radius: 16px;
        padding: 13px 15px;
    }

    #showOrder .info-box strong {
        color: #022c22;
        font-size: 13px;
        font-weight: 900;
        display: flex;
        align-items: center;
        gap: 7px;
        margin-bottom: 6px;
    }

    #showOrder .info-box strong i {
        color: #047857;
    }

    #showOrder .info-box span {
        color: #334155;
        font-size: 14px;
        font-weight: 700;
        word-break: break-word;
    }

    #showOrder .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: #dcfce7;
        color: #064e3b;
        padding: 7px 13px;
        border-radius: 20px;
        font-weight: 900;
        font-size: 13px;
    }

    #showOrder .medicine-table-card,
    #showOrder .address-table-card {
        background: #ffffff;
        border: 1px solid rgba(6, 95, 70, 0.14);
        border-radius: 22px;
        padding: 18px;
        box-shadow: 0 12px 28px rgba(6, 78, 59, 0.10);
        margin-bottom: 18px;
        overflow-x: auto;
    }

    #showOrder .section-title {
        color: #022c22;
        font-size: 17px;
        font-weight: 900;
        margin-bottom: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    #showOrder .section-title i {
        color: #047857;
    }

    #showOrder .table {
        margin-bottom: 0;
        border-radius: 16px;
        overflow: hidden;
    }

    #showOrder .table thead th {
        background: linear-gradient(90deg, #064e3b, #022c22) !important;
        color: #ffffff !important;
        border: none !important;
        text-align: center;
        font-weight: 900;
        padding: 12px 10px;
        white-space: nowrap;
    }

    #showOrder .table tbody td {
        text-align: center;
        vertical-align: middle;
        font-weight: 700;
        color: #022c22;
        padding: 12px 10px;
        border-color: #d1fae5;
    }

    #showOrder .main-yes {
        background: #dcfce7;
        color: #064e3b;
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 900;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    #showOrder .main-no {
        background: #fee2e2;
        color: #991b1b;
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 900;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    #showOrder .modal-footer {
        background: #ffffff;
        border-top: 1px solid #d1fae5;
        padding: 18px 24px;
    }

    #showOrder .btn-close-order-show {
        background: #ecfdf5;
        color: #064e3b;
        border: none;
        border-radius: 24px;
        padding: 10px 26px;
        font-weight: 800;
        transition: all 0.25s ease;
    }

    #showOrder .btn-close-order-show:hover {
        background: #d1fae5;
        color: #022c22;
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        #showOrder .modal-body {
            padding: 20px 16px;
        }

        #showOrder .modal-header {
            padding: 18px 16px;
        }

        #showOrder .info-grid {
            grid-template-columns: 1fr;
        }

        #showOrder .order-info-card,
        #showOrder .medicine-table-card,
        #showOrder .address-table-card {
            padding: 16px;
        }
    }

    /* FIX: View Order medicine + quantity colors only */
    #showOrder .medicine-table-card {
        background: #ffffff !important;
    }

    #showOrder .medicine-table-card .section-title {
        color: #022c22 !important;
    }

    #showOrder #medicine table tbody tr,
    #showOrder #medicine table tbody td {
        background-color: #ffffff !important;
    }

    #showOrder #medicine table tbody td {
        color: #022c22 !important;
        font-weight: 900 !important;
    }

    #showOrder #medicine table thead th {
        background: linear-gradient(90deg, #064e3b, #022c22) !important;
        color: #ffffff !important;
        font-weight: 900 !important;
    }

    #showOrder #order-addresses tbody tr,
    #showOrder #order-addresses tbody td {
        background-color: #ffffff !important;
        color: #022c22 !important;
        font-weight: 800 !important;
        border: 1px solid #d1fae5 !important;
    }

    #showOrder #order-addresses tbody td.dataTables_empty {
        background-color: #ffffff !important;
        color: #022c22 !important;
        font-weight: 900 !important;
    }

    #showOrder .address-table-card {
        background: #ffffff !important;
    }
</style>

<!-- Show Order Modal -->
<div class="modal fade"
     id="showOrder"
     tabindex="-1"
     aria-labelledby="showOrderModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="showOrderModalLabel">
                    <span class="modal-title-icon">
                        <i class="fas fa-receipt"></i>
                    </span>
                    {{ __('orders.order_information') }}
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="{{ __('orders.close') }}">
                </button>

            </div>

            <div class="modal-body">

                <div class="order-info-card">

                    <div class="order-info-title">
                        <i class="fas fa-info-circle"></i>
                        {{ __('orders.main_order_details') }}
                    </div>

                    <div class="info-grid">

                        <div class="info-box">
                            <strong>
                                <i class="fas fa-user"></i>
                                {{ __('orders.user_name') }}
                            </strong>
                            <span id="Username"></span>
                        </div>

                        <div class="info-box">
                            <strong>
                                <i class="fas fa-clinic-medical"></i>
                                {{ __('orders.pharmacy_name') }}
                            </strong>
                            <span id="pharName"></span>
                        </div>

                        <div class="info-box">
                            <strong>
                                <i class="fas fa-user-md"></i>
                                {{ __('orders.doctor_name') }}
                            </strong>
                            <span id="doctorName"></span>
                        </div>

                        <div class="info-box">
                            <strong>
                                <i class="fas fa-clock"></i>
                                {{ __('orders.status') }}
                            </strong>
                            <span id="status" class="status-badge"></span>
                        </div>

                        <div class="info-box">
                            <strong>
                                <i class="fas fa-shield-alt"></i>
                                {{ __('orders.is_insured') }}
                            </strong>
                            <span id="isInsured"></span>
                        </div>

                        <div class="info-box">
                            <strong>
                                <i class="fas fa-user-edit"></i>
                                {{ __('orders.creator_type') }}
                            </strong>
                            <span id="creatorType"></span>
                        </div>

                        <div class="info-box">
                            <strong>
                                <i class="fas fa-money-bill-wave"></i>
                                {{ __('orders.total_price') }}
                            </strong>
                            <span id="totalPrice"></span>
                        </div>

                        <div class="info-box">
                            <strong>
                                <i class="fas fa-calendar-plus"></i>
                                {{ __('orders.created_at') }}
                            </strong>
                            <span id="createdAt"></span>
                        </div>

                        <div class="info-box">
                            <strong>
                                <i class="fas fa-calendar-check"></i>
                                {{ __('orders.updated_at') }}
                            </strong>
                            <span id="updateddAt"></span>
                        </div>

                    </div>

                </div>

                <div class="medicine-table-card">

                    <div class="section-title">
                        <i class="fas fa-pills"></i>
                        {{ __('orders.ordered_medicines') }}
                    </div>

                    <div id="medicine"></div>

                </div>

                <div class="address-table-card">

                    <div class="section-title">
                        <i class="fas fa-map-marked-alt"></i>
                        {{ __('orders.delivery_address') }}
                    </div>

                    <table class="table table-striped table-bordered" id="order-addresses">

                        <thead>
                            <tr>
                                <th>{{ __('orders.postal_code') }}</th>
                                <th>{{ __('orders.area_name') }}</th>
                                <th>{{ __('orders.street_name') }}</th>
                                <th>{{ __('orders.building') }}</th>
                                <th>{{ __('orders.floor') }}</th>
                                <th>{{ __('orders.flat') }}</th>
                                <th>{{ __('orders.main_street') }}</th>
                            </tr>
                        </thead>

                        <tbody id="order-body-addresses"></tbody>

                    </table>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button"
                        class="btn btn-close-order-show"
                        data-bs-dismiss="modal">

                    <i class="fas fa-times me-1"></i>
                    {{ __('orders.close') }}

                </button>

            </div>

        </div>

    </div>

</div>

<script>
    const orderShowTranslations = {
        orderIdNotFound: @json(__('orders.order_id_not_found')),
        nA: @json(__('orders.n_a')),
        unknown: @json(__('orders.unknown')),
        yes: @json(__('orders.yes')),
        no: @json(__('orders.no')),
        noMedicinesFound: @json(__('orders.no_medicines_found_for_order')),
        medicine: @json(__('orders.medicine')),
        quantity: @json(__('orders.quantity')),
        unableLoadOrderInformation: @json(__('orders.unable_load_order_information_try_again')),
    };

    function orderShow(event) {
        event.preventDefault();
        event.stopPropagation();

        const button = event.target.closest('button');
        const itemId = button ? button.getAttribute('id') : event.target.id;

        if (!itemId) {
            alert(orderShowTranslations.orderIdNotFound);
            return;
        }

        $('#showOrder #Username').text("");
        $('#showOrder #pharName').text("");
        $('#showOrder #doctorName').text("");
        $('#showOrder #status').text("");
        $('#showOrder #isInsured').text("");
        $('#showOrder #creatorType').text("");
        $('#showOrder #totalPrice').text("");
        $('#showOrder #createdAt').text("");
        $('#showOrder #updateddAt').text("");
        $('#showOrder #medicine').empty();
        $('#showOrder #order-body-addresses').empty();

        $.ajax({
            url: "{{ route('orders.show', ':id') }}".replace(':id', itemId),
            method: "GET",

            success: function(response) {
                const user = response.user || {};
                const pharmacy = response.pharmacy || {};
                const order = response.order || {};
                const address = response.address || {};
                const area = response.area || {};
                const doctorName = response.doctor_name || {};

                $('#showOrder #Username').text(user.name ?? orderShowTranslations.nA);
                $('#showOrder #pharName').text(pharmacy.pharmacy_name ?? orderShowTranslations.nA);
                $('#showOrder #doctorName').text(doctorName.name ?? orderShowTranslations.unknown);
                $('#showOrder #status').text(order.status ?? orderShowTranslations.nA);
                $('#showOrder #isInsured').html(order.is_insured
                    ? `<span class="main-yes"><i class="fas fa-check-circle"></i> ${orderShowTranslations.yes}</span>`
                    : `<span class="main-no"><i class="fas fa-times-circle"></i> ${orderShowTranslations.no}</span>`
                );
                $('#showOrder #creatorType').text(order.creator_type ?? orderShowTranslations.nA);
                $('#showOrder #totalPrice').text(order.price ?? '0');
                $('#showOrder #createdAt').text(order.created_at ?? orderShowTranslations.nA);
                $('#showOrder #updateddAt').text(order.updated_at ?? orderShowTranslations.nA);

                const medicines = response.medicines || [];

                let tableRows = '';

                if (!medicines || medicines.length === 0) {
                    tableRows = `
                        <tr>
                            <td colspan="2" class="text-center text-muted fw-bold py-4">
                                <i class="fas fa-pills me-1"></i>
                                ${orderShowTranslations.noMedicinesFound}
                            </td>
                        </tr>
                    `;
                } else {
                    for (let i = 0; i < medicines.length; i++) {
                        tableRows += `
                            <tr>
                                <td>${medicines[i].name ?? orderShowTranslations.nA}</td>
                                <td>${medicines[i].quantity ?? orderShowTranslations.nA}</td>
                            </tr>
                        `;
                    }
                }

                $('#showOrder #medicine').html(`
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>${orderShowTranslations.medicine}</th>
                                <th>${orderShowTranslations.quantity}</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${tableRows}
                        </tbody>
                    </table>
                `);

                const mainStreet = address.is_main
                    ? `<span class="main-yes"><i class="fas fa-check-circle"></i> ${orderShowTranslations.yes}</span>`
                    : `<span class="main-no"><i class="fas fa-times-circle"></i> ${orderShowTranslations.no}</span>`;

                const record = `
                    <tr>
                        <td>${address.area_id ?? orderShowTranslations.nA}</td>
                        <td>${area.name ?? orderShowTranslations.nA}</td>
                        <td>${address.street_name ?? orderShowTranslations.nA}</td>
                        <td>${address.building_number ?? orderShowTranslations.nA}</td>
                        <td>${address.floor_number ?? orderShowTranslations.nA}</td>
                        <td>${address.flat_number ?? orderShowTranslations.nA}</td>
                        <td>${mainStreet}</td>
                    </tr>
                `;

                $('#showOrder #order-body-addresses').append(record);
            },

            error: function(xhr) {
                console.log('Order show error:', xhr.responseJSON || xhr.responseText);

                if (xhr.responseJSON && xhr.responseJSON.real_error) {
                    alert(xhr.responseJSON.real_error);
                    return;
                }

                if (xhr.responseJSON && xhr.responseJSON.message) {
                    alert(xhr.responseJSON.message);
                    return;
                }

                alert(orderShowTranslations.unableLoadOrderInformation);
            }
        });
    }
</script>