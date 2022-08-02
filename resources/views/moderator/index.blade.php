@extends('layouts.master')

@section('header')

@endsection

@section('body')
<div class="container vh-100">
    <p class="h3 text-center pt-5">Statistik Audience</p>
    <div class="col-12">
        <x-flash />
    </div>
    <div class="col-12 mb-2">
        <div class="card border-success">
            <div class="card-header">
                Total Audience
            </div>
            <div class="card-body">
                {{$audience}}
            </div>
        </div>
    </div>
    <div class="col-12 mb-2">
        <div class="card border-success">
            <div class="card-header">
                Total Audience Seminar
            </div>
            <div class="card-body">
                {{$audienceSemnas}}
            </div>
        </div>
    </div>
    <div class="col-12 mb-2">
        <div class="card border-success">
            <div class="card-header">
                Total Audience Lomba
            </div>
            <div class="card-body">
                {{$audienceLomba}}
            </div>
        </div>
    </div>
    <div class="col-12">
        <a href="{{route('logout.index')}}" class="btn btn-danger btn-sm btn-pill">Logout</a>
    </div>
</div>
@endsection
