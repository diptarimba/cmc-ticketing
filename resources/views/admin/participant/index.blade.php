@extends('layouts.admin.master')

@section('title', 'Registran Management')

@section('header')

@endsection

@section('body')
<x-layoutContent
    Heading="Registran Management"
    mainTitle="Sekoin 2022"
    subTitle="Registran Management"
>
    <x-card.card>
        <x-slot name="header">
            @if(Auth::check())
            <x-card.card-title text="Registran Sekoin 22" />
            @endif
        </x-slot>
        <x-slot name="body">
            <table class="table table-striped datatables-target-exec">
                <thead>
                    <th>No</th>
                    <th>Name</th>
                    <th>Event</th>
                    <th>Package</th>
                    <th>Price</th>
                    <th>Action</th>
                </thead>
                <tbody>

                </tbody>
            </table>
        </x-slot>
    </x-card.card>
</x-layoutContent>
@endsection

@section('footer')
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script>
    $(document).ready(() => {
        var table = $('.datatables-target-exec').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('audience.index')}}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, sortable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'event.name', name: 'event.name'},
            {data: 'package_name', name: 'package_name'},
            {data: 'package_price', name: 'package_price'},
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ]
    });
    })
</script>
@endsection
