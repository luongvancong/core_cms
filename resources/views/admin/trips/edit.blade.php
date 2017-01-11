@extends('admin/layouts/master')

@section('main-content')
    <h3>Chuyến xe <small>{{ $trip->getId() }}</small></h3>
    <div class="panel-body">
        @include('admin/trips/form')
    </div>
@stop