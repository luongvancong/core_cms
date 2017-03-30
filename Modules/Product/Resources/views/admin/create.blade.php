@extends('admin/layouts/master')

@section('main-content')
	<h3>{{ trans('admin/general.create_info') . ' ' . trans('admin/general.modules.products') }}</h3>
	@include('product::admin/form')
@stop
