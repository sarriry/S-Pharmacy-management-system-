<style>
    #delOrder .modal-content {
        border: none;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 22px 60px rgba(6, 78, 59, 0.28);
    }

    #delOrder .modal-header {
        background: linear-gradient(90deg, #064e3b 0%, #022c22 100%);
        color: #ffffff;
        border-bottom: none;
        padding: 20px 24px;
    }

    #delOrder .modal-title {
        font-size: 20px;
        font-weight: 900;
        letter-spacing: 0.4px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    #delOrder .modal-title-icon {
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

    #delOrder .btn-close {
        background-color: #ffffff;
        opacity: 1;
        border-radius: 50%;
        padding: 10px;
    }

    #delOrder .modal-body {
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 60%, #ecfdf5 100%);
        padding: 32px 26px;
        text-align: center;
    }

    #delOrder .delete-main-icon {
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

    #delOrder .delete-title {
        color: #022c22;
        font-size: 22px;
        font-weight: 900;
        margin-bottom: 10px;
    }

    #delOrder .delete-text {
        color: #475569;
        font-size: 15px;
        font-weight: 600;
        line-height: 1.7;
        margin-bottom: 0;
    }

    #delOrder .delete-note-box {
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

    #delOrder .modal-footer {
        background: #ffffff;
        border-top: 1px solid #d1fae5;
        padding: 18px 24px;
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    #delOrder .btn-cancel-order-delete {
        background: #ecfdf5;
        color: #064e3b;
        border: none;
        border-radius: 24px;
        padding: 10px 24px;
        font-weight: 800;
        transition: all 0.25s ease;
    }

    #delOrder .btn-cancel-order-delete:hover {
        background: #d1fae5;
        color: #022c22;
        transform: translateY(-2px);
    }

    #delOrder .btn-confirm-order-delete {
        background: linear-gradient(90deg, #047857, #022c22);
        color: #ffffff;
        border: none;
        border-radius: 24px;
        padding: 10px 26px;
        font-weight: 800;
        box-shadow: 0 10px 22px rgba(6, 78, 59, 0.25);
        transition: all 0.25s ease;
    }

    #delOrder .btn-confirm-order-delete:hover {
        color: #ffffff;
        transform: translateY(-2px);
        background: linear-gradient(90deg, #059669, #064e3b);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.34);
    }

    @media (max-width: 576px) {
        #delOrder .modal-body {
            padding: 24px 16px;
        }

        #delOrder .modal-footer {
            flex-direction: column;
        }

        #delOrder .btn-cancel-order-delete,
        #delOrder .btn-confirm-order-delete,
        #delOrder #delete_order {
            width: 100%;
        }
    }
</style>

<!-- Delete Order Modal -->
<div class="modal fade"
     id="delOrder"
     data-bs-backdrop="static"
     data-bs-keyboard="false"
     tabindex="-1"
     aria-labelledby="deleteOrderModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <!-- HEADER -->
            <div class="modal-header">

                <h5 class="modal-title" id="deleteOrderModalLabel">
                    <span class="modal-title-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                    {{ __('orders.delete_order') }}
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="{{ __('orders.close') }}">
                </button>

            </div>

            <!-- BODY -->
            <div class="modal-body">

                <div class="delete-main-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>

                <h5 class="delete-title">
                    {{ __('orders.delete_order_confirm_title') }}
                </h5>

                <p class="delete-text">
                    {{ __('orders.delete_order_confirm_text') }}
                </p>

                <div class="delete-note-box">
                    <i class="fas fa-info-circle"></i>
                    {{ __('orders.delete_order_note') }}
                </div>

            </div>

            <!-- FOOTER -->
            <div class="modal-footer">

                <button type="button"
                        class="btn btn-cancel-order-delete"
                        data-bs-dismiss="modal">

                    <i class="fas fa-times me-1"></i>
                    {{ __('orders.cancel') }}

                </button>

                <form method="POST"
                      id="delete_order"
                      action=""
                      class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-confirm-order-delete">

                        <i class="fas fa-trash me-1"></i>
                        {{ __('orders.delete_order') }}

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<script>
    function setOrderDeleteAction(orderId) {
        if (!orderId) {
            alert("Order ID not found.");
            return false;
        }

        const deleteForm = document.getElementById("delete_order");

        if (!deleteForm) {
            alert("Delete form not found.");
            return false;
        }

        deleteForm.setAttribute("action", "{{ url('orders') }}/" + orderId);

        return true;
    }

    function orderDeleteModalShow(event) {
        event.preventDefault();
        event.stopPropagation();

        const button = event.target.closest("button, a");

        if (!button) {
            alert("Delete button not found.");
            return;
        }

        const orderId =
            button.getAttribute("data-id") ||
            button.getAttribute("data-order-id") ||
            button.getAttribute("id");

        if (!setOrderDeleteAction(orderId)) {
            return;
        }

        const deleteModalElement = document.getElementById("delOrder");

        if (typeof bootstrap !== "undefined") {
            const deleteModal = new bootstrap.Modal(deleteModalElement);
            deleteModal.show();
        } else {
            $("#delOrder").modal("show");
        }
    }

    /*
     * This part fixes the case when you open modal using:
     * data-bs-toggle="modal" data-bs-target="#delOrder"
     */
    document.addEventListener("DOMContentLoaded", function () {
        const deleteModalElement = document.getElementById("delOrder");

        if (deleteModalElement) {
            deleteModalElement.addEventListener("show.bs.modal", function (event) {
                const button = event.relatedTarget;

                if (!button) {
                    return;
                }

                const orderId =
                    button.getAttribute("data-id") ||
                    button.getAttribute("data-order-id") ||
                    button.getAttribute("id");

                setOrderDeleteAction(orderId);
            });
        }

        const deleteForm = document.getElementById("delete_order");

        if (deleteForm) {
            deleteForm.addEventListener("submit", function (event) {
                const action = deleteForm.getAttribute("action");

                if (!action || action === "#" || action.endsWith("/orders")) {
                    event.preventDefault();
                    alert("Delete action URL is missing order ID. Please click delete button again.");
                }
            });
        }
    });

    function deleteordermodalShow(event) {
        orderDeleteModalShow(event);
    }

    function orderdeletemodalShow(event) {
        orderDeleteModalShow(event);
    }

    function deletemodalShow(event) {
        orderDeleteModalShow(event);
    }
</script>