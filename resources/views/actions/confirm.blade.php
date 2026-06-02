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

        @if ($state == 'Canceled')
            <p><strong>{{ __('actions.cannot_confirm_cancelled') }}</strong></p>
            <p class="mt-5">{{ __('actions.thank_you') }}</p>

        @elseif ($state == 'Confirmed')
            <p><strong>{{ __('actions.already_confirmed') }}</strong></p>
            <p class="mt-5">{{ __('actions.thank_you') }}</p>

        @elseif ($state == 'Confirmednow')
            <p><strong>{{ __('actions.confirmed_now') }}</strong></p>
            <p class="mt-5">{{ __('actions.thank_you') }}</p>

        @elseif ($state == 'Delivered')
            <p><strong>{{ __('actions.already_delivered') }}</strong></p>
            <p class="mt-5">{{ __('actions.thank_you') }}</p>
        @endif

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>