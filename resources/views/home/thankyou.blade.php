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
            <div class="card">
                <div class="card-body bg-light">

                    <p class="text-center">
                        <span class="h5">Terimakasih, telah ikut berpartisipasi dalam acara <span class="text-warning"><ins>Sekoin 2022</ins></span> yang diselenggarakan oleh<br><span class="text-warning">CMC POLINES</span></span>
                    </p>
                    <p class="text-center">
                        <span><em>Untuk mendapatkan informasi lebih lanjut, silahkan bergabung sesuai dengan event yang diikuti : </em></span>
                    </p>
                    <div class="mt-1 text-center">
                        <a href="https://chat.whatsapp.com/LG6IHYX9MofGW7e4DRpLZu" target="_blank" class="btn btn-outline-warning">Group Semnas</a>
                        <a href="https://chat.whatsapp.com/Dg8H7FDmYj38QDPr1ft5yP" target="_blank" class="btn btn-outline-warning">Group Trading</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
@endsection
