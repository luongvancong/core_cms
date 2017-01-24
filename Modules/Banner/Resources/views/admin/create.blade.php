@extends('admin/layouts/master')

@section('main-content')
	<h3>Thêm Banner</h3>
	<div class="panel-body">
		@include('banner::admin/form');
	</div>
@stop

@section('scripts')
	<script>
		$(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
@stop
