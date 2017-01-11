@extends('admin/layouts/master')

{{-- Page content --}}
@section('main-content')
<div class="panel">
	<div class="panel-heading">
		<h3>
	      Thêm bài viết
	   </h3>
	</div>
	<div class="panel-body">
		@include('admin/posts/form')
	</div>
</div>

@stop