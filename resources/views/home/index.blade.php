@extends('layouts.master')

@section('header')
    <link href="https://vjs.zencdn.net/7.20.1/video-js.css" rel="stylesheet" />
    <style>
        .melayang {
            z-index: 10;
            position: absolute;
        }


        .containercuy:hover .event-image,
        .containercuy:active .event-image {
            -webkit-filter: brightness(100%) !important;
            filter: brightness(100%) !important;
            transform: scale(1.05);
        }

        .containercuy:hover .text-title-p,
        .containercuy:active .text-title-p {
            color: white;
            opacity: 0 !important;
        }

        .event-image {
            -webkit-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        .text-title-p {
            -webkit-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        .event-image:active {
            -webkit-filter: brightness(50%);
            filter: brightness(50%)
        }

        .disable-select {
            user-select: none;
            /* supported by Chrome and Opera */
            -webkit-user-select: none;
            /* Safari */
            -khtml-user-select: none;
            /* Konqueror HTML */
            -moz-user-select: none;
            /* Firefox */
            -ms-user-select: none;
            /* Internet Explorer/Edge */
        }
    </style>
@endsection

@section('body')
    <div class="row">
        {{-- <span class="d-flex p-2">Teaser</span> --}}
        {{-- <span class="d-flex p-2 mt-3">Play Me</span>
        <div class="ratio ratio-16x9">
            <iframe src="{{ asset('storage/video/TEASER.mp4') }}" title="YouTube video" allowfullscreen allow="autoplay"></iframe>
        </div> --}}
        <span class="d-flex p-2 mt-3">Play Me</span>
        <video id="my-video" class="video-js" controls preload="auto" width="640" height="264" poster=""
            data-setup="{}">
            <source src="{{ asset('storage/video/TEASER.mp4') }}" type="video/mp4" />
            <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading to a
                web browser that
                <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
            </p>
        </video>
        <x-flash />
        <span class="d-flex p-2">On Going Event</span>
        @foreach ($eventReg as $each)
            <x-on-going href="{{ route('guest.home.detail', $each->id) }}" title="{{ $each->name }}"
                loc="{{ $each->location }}" date="{{ $each->date }}"
                image="{{ $each->event_image()->where('thumbnail', 1)->first()->image }}" />
        @endforeach
        <span class="d-flex p-2">Gallery</span>
        @foreach ($eventNonReg as $each)
            <x-gallery title="{!! $each->name !!}"
                image="{{ $each->event_image()->where('thumbnail', 1)->first()->image }}" />
        @endforeach
    </div>
@endsection

@section('footer')
    <script src="https://vjs.zencdn.net/7.20.1/video.min.js"></script>
@endsection
