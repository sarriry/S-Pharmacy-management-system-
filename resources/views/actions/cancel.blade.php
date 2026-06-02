<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('actions.order_cancellation_title') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container w-50 p-5 border shadow-lg rounded-5" style="margin-top: 150px;">

        <h3 class="mb-5">
            {{ __('actions.hello', ['name' => $order->user->name]) }}
        </h3>

        @if ($state == "Canceled")
            <p><strong>{{ __('actions.already_cancelled') }}</strong></p>
            <p class="mt-5">{{ __('actions.thank_you') }}</p>

        @elseif ($state == "WaitingForUserConfirmation")
            <p><strong>{{ __('actions.cancel_success') }}</strong></p>
            <p class="mt-5">{{ __('actions.thank_you') }}</p>

        @elseif ($state == "Confirmed")
            <p><strong>{{ __('actions.cannot_cancel') }}</strong></p>
            <p class="mt-5">{{ __('actions.thank_you') }}</p>
        @endif

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>