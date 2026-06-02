<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ps' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="../dist/img/PharmacyLogo.png">
    <title>{{ __('home.pharmacy_system') }} | {{ __('home.payment') }}</title>

    {{-- style--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    <div class="wrapper">
        <div class="container">
            <div class="row justify-content-center align-items-center" style="height: 100vh;">
                <div class="col-8 col-md-6">
                    <div class="card p-5" style="border-radius:10px;">

                        <div class="text-center fw-bold fs-2 mb-5">
                            {{ __('home.payment_details') }}
                        </div>

                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#"
                                   class="close"
                                   data-dismiss="alert"
                                   aria-label="{{ __('home.close') }}">
                                    ×
                                </a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif

                        <form role="form"
                              action="{{ route('stripe.post') }}"
                              method="post"
                              class="require-validation"
                              data-cc-on-file="false"
                              data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                              id="payment-form">

                            @csrf

                            <div class='form-row row'>
                                <div class="col-12 mb-4">
                                    <span>
                                        <input class='form-control'
                                               type='text'
                                               placeholder="{{ __('home.card_placeholder') }}"
                                               required
                                               style="height: 50px;">
                                    </span>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class="col-12 mb-4">
                                    <span>
                                        <input class='form-control card-number'
                                               type='text'
                                               placeholder="{{ __('home.card_number') }}"
                                               required
                                               style="height: 50px;">
                                    </span>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-12'>

                                    <div class='col-md-4 form-group cvc required'>
                                        <label class='form-label'>
                                            {{ __('home.cvc') }}
                                        </label>

                                        <input autocomplete='off'
                                               class='form-control card-cvc'
                                               placeholder="{{ __('home.cvc_example') }}"
                                               type='text'
                                               style="height: 45px;">
                                    </div>

                                    <div class='col-md-4 form-group expiration required'>
                                        <label class='form-label'>
                                            {{ __('home.expiration_month') }}
                                        </label>

                                        <input class='form-control card-expiry-month'
                                               placeholder='MM'
                                               type='text'
                                               style="height: 45px;">
                                    </div>

                                    <div class='col-md-4 form-group expiration required'>
                                        <label class='form-label'>
                                            {{ __('home.expiration_year') }}
                                        </label>

                                        <input class='form-control card-expiry-year'
                                               placeholder='YYYY'
                                               type='text'
                                               style="height: 45px;">
                                    </div>

                                </div>
                            </div>

                            <div class='col-12'>
                                <div class='col-md-12 error form-group hide'>
                                    <div class='alert-danger alert'>
                                        {{ __('home.please_correct_errors_try_again') }}
                                    </div>
                                </div>
                            </div>

                            <input type="text" name="order_id" value="{{ $order->id }}" hidden>

                            <div class="col-12">
                                <div class="col-12">
                                    <button type="submit"
                                            onclick="clientdeletemodalShow(event)"
                                            class="btn btn-primary btn-lg btn-block">
                                        {{ __('home.pay_now') }} ${{ $order->price }}
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script type="text/javascript">
        function clientdeletemodalShow(event) {
            event.preventDefault();
            event.stopPropagation();

            event.target.closest("form").submit();
        }

        $(function() {
            var $form = $(".require-validation");

            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;

                $errorMessage.addClass('hide');
                $('.has-error').removeClass('has-error');

                $inputs.each(function(i, el) {
                    var $input = $(el);

                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();

                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));

                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }
            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
        });
    </script>

</body>

</html>