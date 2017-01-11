@extends('admin/layouts/master')

@section('main-content')
    <h3>Thêm nhà xe</h3>
    <div class="panel-body">
        @include('admin/transporters/form')
    </div>
@stop