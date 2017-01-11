@extends('admin/layouts/master')

@section('main-content')
    <h3>Sửa danh mục tư vấn thiết kế</h3>
    <h6>{{ $category->getName() }}</h6>
    <div class="panel-body">
        @include('admin/advisory_design/form')
    </div>
@stop
