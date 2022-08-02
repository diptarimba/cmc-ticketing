@extends('layouts.master')

@section('header')
    <style>
        .melayang {
            z-index: 10;
            position: absolute;
        }


        .containercuy:hover .event-image,
        .containercuy:active .event-image {
            -webkit-filter: brightness(25%);
            filter: brightness(25%);
            transform: scale(1.05);
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
        {{-- <span class="d-flex p-2">Teaser</span> --}}
        <div class="ratio ratio-16x9 mt-3 ">
            <iframe src="{{ asset('storage/video/TEASER.mp4') }}" title="YouTube video" allowfullscreen></iframe>
        </div>
        <x-flash />
        <span class="d-flex p-2">On Going Event</span>
        @foreach ($eventReg as $each)
            <x-on-going href="{{ route('guest.home.detail', $each->id) }}" title="{{ $each->name }}"
                loc="{{ $each->location }}" date="{{ $each->date }}"
                image="{{ $each->event_image->where('thumbnail', 1)->first()->image }}" />
        @endforeach
        <span class="d-flex p-2">Gallery</span>
        @foreach ($eventNonReg as $each)
            <x-gallery title="{{ $each->name }}"
                image="{{ $each->event_image->where('thumbnail', 1)->first()->image }}" />
        @endforeach
    </div>
@endsection
