@extends('layouts.admin.master')

@section('title', 'Home')

@section('header')

@endsection

@section('body')
<x-layoutDashboard>
    <div class="col-12">
        <div class="card">
            <div class="card-body text-center">
                <span class="h4">Statistik Audiens</span>
            </div>
        </div>
    </div>
    <x-card.card-statistic text="Total Audiens" value="{{$audience}}"/>
    <x-card.card-statistic text="Total Audiens Lomba" value="{{$audienceLomba}}"/>
    <x-card.card-statistic text="Total Audiens Seminar" value="{{$audienceSemnas}}"/>
</x-layoutDashboard>
@endsection

@section('footer')
<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script>

</script>
@endsection
