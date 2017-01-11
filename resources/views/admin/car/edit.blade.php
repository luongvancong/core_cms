@extends('admin/layouts/master')

@section('main-content')
    <h3>Xe {{ $car->getName() }}</h3>
    <div class="panel-body">
        @include('admin/car/form')
    </div>
@stop