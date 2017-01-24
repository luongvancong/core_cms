@extends('admin/layouts/master')

@section('main-content')
    <h3>Sửa trang</h3>
    <h4>{{ $page->getTitle() }}</h4>
    <div class="panel-body">
        @include('page::admin/form')
    </div>
@stop