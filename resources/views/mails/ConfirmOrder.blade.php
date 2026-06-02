<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Mail</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .container {
            padding: 50px;
        }

        .btn-success, .btn-danger {
            border: none;
            border-radius: 7px;
            padding: 10px 30px;
            color: white;
            margin-bottom: 10px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-success { background-color: #00bc8c; }
        .btn-success:hover { background-color: #00bc8d91; }

        .btn-danger { background-color: #e74c3c; }
        .btn-danger:hover { background-color: #e74d3c92; }

        .btn-container {
            text-align: center;
            margin-top: 40px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>
        {{ __('mails.hello') }} {{ $notifiable->name }}!
    </h1>

    <p>
        {{ __('mails.order_ready') }}
    </p>

    <h4>{{ __('mails.order_details') }}:</h4>

    <ul>
        <li>
            <strong>{{ __('mails.order_id') }}:</strong> {{ $order->id }}
        </li>

        <li>
            <strong>{{ __('mails.delivery_address') }}:</strong>
            {{ $order->address->area->name }}
        </li>

        <li>
            <strong>{{ __('mails.pharmacy_name') }}:</strong>
            {{ $order->pharmacy->pharmacy_name }}
        </li>

        <li>
            <strong>{{ __('mails.ordered_medicine') }}:</strong>
            <ul>
                @foreach ($order->medicines as $order_medicine)
                    <li>{{ $order_medicine->name }}</li>
                @endforeach
            </ul>
        </li>

        <li>
            <strong>{{ __('mails.order_status') }}:</strong> {{ $order->status }}
        </li>

        <li>
            <strong>{{ __('mails.total_price') }}:</strong> {{ $order->price }}
        </li>
    </ul>

    <div class="btn-container">

        <a href="{{ route('orders.confirm', $order->id) }}" class="btn-success">
    {{ __('mails.confirm_order') }}
        </a>
        

        <a href="{{ route('orders.updatestatus', $order->id) }}" class="btn-danger">
            {{ __('mails.cancel_order') }}
        </a>

    </div>

</div>

</body>
</html>
