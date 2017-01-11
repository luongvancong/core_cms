@extends('admin/layouts/master')

@section('main-content')
    <h3>Thêm chuyến xe</h3>
    <div class="panel-body">
        @include('admin/trips/form')
    </div>
@stop