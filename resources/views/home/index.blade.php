@extends('layouts.master')

@section('header')
<style>
    .melayang {
        z-index: 10;
        position: absolute;
    }


    .containercuy:hover .event-image,
    .containercuy:active .event-image {
        -webkit-filter: brightness(50%);
        filter: brightness(50%)
    }

    .containercuy:hover .text-detail-event,
    .containercuy:active .text-detail-event {
        color: white;
    }

    .event-image {
        -webkit-transition: all 300ms ease;
        transition: all 300ms ease;
    }

    .event-image:active {
        -webkit-filter: brightness(50%);
        filter: brightness(50%)
    }

</style>
@endsection

@section('body')
<div class="row">
    <span class="d-flex p-2">On Going Event</span>
    <div class="d-xs-flex d-lg-flex d-sm-flex d-sm-flex align-items-center containercuy justify-content-center col-md-12 mb-2 px-0"
        style="position: relative">
        <div class="container melayang">
            <div class="d-flex flex-column">
                <p class="m-0 text-detail-event text-wrap"><strong>Seminar Nasional : Komodo Bukan Keajaiban
                        Dunia</strong></p>
                <p class="m-0 text-detail-event"><span><i class="fa-solid fa-location-dot"></i></span> RSG
                    Politeknik Negeri Semarang</p>
                <p class="m-0 text-detail-event"><span><i class="fa-solid fa-calendar-days"></i></span> 12
                    Agustus 2021</p>
                <p class="m-0">
                    <a
                        class="btn d-sm-inline-flex text-detail-event shadow d-none d-sm-block btn-sm btn-outline-secondary btn-pill">Beli
                        Tiket</a>
                    <a class="btn d-inline-flex d-block d-sm-none btn-sm btn-secondary btn-pill">Beli
                        Tiket</a>
                </p>
            </div>
        </div>
        <img src="https://dummyimage.com/popunder" class="event-image bg-dark img-fluid" alt="...">
    </div>
    <span class="d-flex p-2">Gallery</span>
    <div class="d-flex align-items-center justify-content-center col-md-12 mb-2 px-0" style="position: relative">
        <button class="btn melayang btn-secondary mt-2">Click Me</button>
        <img src="https://dummyimage.com/popunder" class="event-image img-fluid" alt="...">
    </div>
    <div class="d-flex align-items-center justify-content-center col-md-12 mb-2 px-0" style="position: relative">
        <button class="btn melayang btn-secondary mt-2">Click Me</button>
        <img src="https://dummyimage.com/popunder" class="event-image img-fluid" alt="...">
    </div>
    <div class="d-flex align-items-center justify-content-center col-md-12 mb-2 px-0" style="position: relative">
        <button class="btn melayang btn-secondary mt-2">Click Me</button>
        <img src="https://dummyimage.com/popunder" class="event-image img-fluid" alt="...">
    </div>
    <div class="d-flex align-items-center justify-content-center col-md-12 mb-2 px-0" style="position: relative">
        <button class="btn melayang btn-secondary mt-2">Click Me</button>
        <img src="https://dummyimage.com/popunder" class="event-image img-fluid" alt="...">
    </div>
</div>
@endsection
