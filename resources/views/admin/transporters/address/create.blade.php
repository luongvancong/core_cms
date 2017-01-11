@extends('admin/layouts/master')

@section('main-content')
    <h3>Thêm địa chỉ nhà xe <small>{{ $transporter->getName() }}</small></h3>
    <div class="panel-body">
        @include('admin/transporters/address/form')
    </div>
@stop