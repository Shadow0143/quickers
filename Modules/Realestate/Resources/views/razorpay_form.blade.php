<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Craftgenie | Pay</title>
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
    @laravelPWA
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
    .card {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: 0.25rem;
        box-shadow: 0px 0px 6px #c9c6c6;
        padding: 20px;
    }

    .login-card {
        text-align: center;
    }

    .login-card-body {
        margin-top: 20px;
    }

    .login-card-text {
        text-align: left;
        color: #000;
    }

    .login-card-text label {
        margin-bottom: 2px;
        margin-top: 10px;
        font-weight: 500;
        font-size: 15px;
    }

    .login-card-pay h3 {
        font-size: 13px;
        margin-top: 14px;
        color: #868686;
    }

    .razorpay-payment-button {
        display: none;
    }
</style>

<body>
    <div id="app">
        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-3 col-md-offset-6">
                        {{-- @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>Error!</strong> {{ $message }}
                        </div>
                        @endif
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}"
                            role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>Success!</strong> {{ $message }}
                        </div>
                        @endif --}}
                        <div class="card card-default">
                            <div class="container login-container">
                                <h4 class="text-center">Secure Payment Gateway</h4>
                                <div class="login-card">
                                    <img src="{{asset('img/logo.png')}}" alt="main-logo">
                                    <div class="login-card-body">
                                        <div class="card-body text-center">
                                            <form action="{{ route('razorpay.payment.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="name" value="{{$data->name}}" />
                                                <input type="hidden" name="email" value="{{$data->email}}" />
                                                <input type="hidden" name="contactNumber"
                                                    value="{{$data->contactNumber}}" />
                                                <input type="hidden" name="amount" value="{{$data->amount}}" />
                                                <input type="hidden" name="address" value="{{$data->address}}" />
                                                <input type="hidden" name="payment_id" value="{{$data->payment_id}}" />
                                                <script src="https://checkout.razorpay.com/v1/checkout.js"
                                                    data-key="rzp_test_mpwfYrksWHIGnE" data-buttontext="Submit"
                                                    data-name="{{$data->name}}" data-description="Customer Payment"
                                                    data-image="{{asset('img/logo.png')}}"
                                                    data-prefill.name="{{$data->name}}"
                                                    data-prefill.email="{{$data->email}}"
                                                    data-prefill.contact="{{$data->contactNumber}}"
                                                    data-amount="{{$data->amount * 100}}" data-currency="INR"
                                                    data-theme.color="#5500ff">
                                                </script>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
<script>
    $(window).on('load', function() {
            $('.razorpay-payment-button').click();
        });
</script>

</html>