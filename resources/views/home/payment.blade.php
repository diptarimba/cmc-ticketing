@extends('layouts.master')

@section('header')
    @if (config('midtrans.is_production') == true)
        <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js"
            data-client-key="{{ config('midtrans.client_key') }}"></script>
    @else
        <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('midtrans.client_key') }}"></script>
    @endif
@endsection

@section('body')
    <div class="row">
        <div class="container pt-5 vh-100">
            @component('components.flash')
            @endcomponent
            <div class="card mt-2 shadow">
                <div class="card-body">
                    <h5 class="card-title">Pembayaran</h5>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ $trx->event_register->name }}</td>
                            </tr>
                            <tr>
                                <th>Event</th>
                                <td>{{ $trx->event_register->event->name }}</td>
                            </tr>
                            <tr>
                                <th>Package</th>
                                <td>{{ $trx->event_package->name }}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>Rp. {{ number_format($trx->event_package->price, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center">
                        <button id="pay-button" class="btn btn-primary">Bayar!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Update Web Check
            var tokenBayar = '{{ $snapToken }}'
            window.snap.pay(tokenBayar, {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    alert("payment success!");
                    window.location.href = '/';
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        });
    </script>
@endsection
