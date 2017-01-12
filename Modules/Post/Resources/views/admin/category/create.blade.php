@extends('admin/layouts/master')

@section('main-content')
	<h3>Thêm nhóm tin</h3>
	<div class="panel-body">
		@include('post::admin/category/form')
	</div>
@stop
