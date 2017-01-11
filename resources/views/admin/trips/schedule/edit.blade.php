@extends('admin/layouts/master')

@section('main-content')
    <h4>Chuyến xe {{ $trip->getId() }}: {{ $trip->startPlace()->first()->getName() }}-{{ $trip->endPlace()->first()->getName() }}</h4>
    <h3>Lịch trình</h3>
    <div class="panel-body">
        @include('admin/trips/schedule/form')
    </div>
@stop