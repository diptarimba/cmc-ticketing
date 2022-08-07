@extends('layouts.master')

@section('header')
@endsection

@section('body')
<div class="row">
    <div class="container pt-5 vh-100">
        <a href="{{ url('/') }}" class="btn btn-pill btn-outline-secondary btn-sm">Back</a>
        <div class="card mt-2 shadow">
            <img src="{{$event->event_image->where('thumbnail', 1)->first()->image}}" class="card-img-top p-1" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$event->name}}</h5>
                <p class="card-text">
                    {{$event->description}}
                </p>
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($event->event_document as $each)
                <li class="list-group-item">Download : <a href="{{$each->document}}" class="btn btn-warning btn-sm">{{$each->name}}</a></li>
                @endforeach
            </ul>
            <div class="card-body">
                @if ($event->is_register == 1)
                <a href="{{route('guest.home.register', $event->id)}}" class="btn btn-outline-warning text-black">Register</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
