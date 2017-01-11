@extends('admin/layouts/master')

@section('main-content')
    <h3>Nhà xe <small>{{ $transporter->getName()  }}</small> </h3>
    <div class="panel-body">
        @include('admin/transporters/form')
    </div>
@stop