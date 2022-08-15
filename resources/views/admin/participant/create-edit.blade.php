@extends('layouts.admin.master')

@section('title', 'Participant Management')

@section('header')

@endsection

@section('body')
    <x-layoutContent Heading="Participant Management" mainTitle="SEKOIN 2022" subTitle="Participant Management" half="1">
        <x-card.card>
            <x-slot name="body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Event</th>
                            <td>{{$registran->event->name}}</td>
                        </tr>
                        <tr>
                            <th>Paket Event</th>
                            <td>{{$registran->event_package->name ?? ''}}</td>
                        </tr>
                        <tr>
                            <th>Harga Paket</th>
                            <td>{{ isset($registran->event_package->price) ? number_format($registran->event_package->price, 0, ",", ".") : ''}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$registran->email}}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{$registran->name}}</td>
                        </tr>
                        <tr>
                            <th>Team Name</th>
                            <td>{{$registran->team_name ?? ''}}</td>
                        </tr>
                        <tr>
                            <th>Team Leader</th>
                            <td>{{$registran->team_leader ?? ''}}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{$registran->gender == 'F' ? 'Perempuan' : 'Laki-Laki'}}</td>
                        </tr>
                        <tr>
                            <th>Agency</th>
                            <td>{{$registran->agency}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{$registran->phone}}</td>
                        </tr>
                        <tr>
                            <th>KTM</th>
                            <td><a href="{{$registran->card}}" target="_blank" class="btn btn-outline-primary">Cek Gambar</a></td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td><a href="{{$registran->photo}}" target="_blank" class="btn btn-outline-primary">Cek Gambar</a></td>
                        </tr>
                        {{-- <tr>
                            <th>Payment</th>
                            <td><a href="{{$registran->payment}}" target="_blank" class="btn btn-outline-primary">Cek Gambar</a></td>
                        </tr> --}}
                        <tr>
                            <th>Twibbon</th>
                            <td><a href="{{$registran->twibbon}}" target="_blank" class="btn btn-outline-primary">Cek Gambar</a></td>
                        </tr>
                        <tr>
                            <th>Follow IG CMC</th>
                            <td><a href="{{$registran->follow_ig_cmc}}" target="_blank" class="btn btn-outline-primary">Cek Gambar</a></td>
                        </tr>
                        <tr>
                            <th>Follow IG SEKOIN</th>
                            <td><a href="{{$registran->follow_ig_sekoin}}" target="_blank" class="btn btn-outline-primary">Cek Gambar</a></td>
                        </tr>
                        <tr>
                            <th>Register Type</th>
                            <td>{{$registran->register_type}}</td>
                        </tr>
                        <tr>
                            <th>Status Pembayaran</th>
                            <td>{{ isset($registran->event_transaction->pay_status) ? $registran->event_transaction->pay_status : ''}}</td>
                        </tr>
                        <tr>
                            <th>Waktu Pembayaran</th>
                            <td>{{ isset($registran->event_transaction->pay_time) ? $registran->event_transaction->pay_time : ''}}</td>
                        </tr>


                    </tbody>
                </table>
                <x-action.cancel />
            </x-slot>
        </x-card.card>
    </x-layoutContent>
@endsection

@section('footer')

@endsection
