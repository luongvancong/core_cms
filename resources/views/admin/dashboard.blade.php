@extends('admin/layouts/master')

@section('main-content')
	<h1>{{ trans('admin/general.modules.dashboard') }}</h1>
	<script type="text/javascript">
		window.location.href = "/admin/trip/index";
	</script>

	<!--mini statistics start-->
	{{-- <div class="row">
		<div class="col-md-3">
			<a class="mini-stat clearfix block" href="{{ route('admin.post.index') }}">
				<span class="mini-stat-icon orange"><i class="fa fa-newspaper-o"></i></span>
				<div class="mini-stat-info">
					<span>{{ postRepository()->countAllPosts() }}</span>
					Tin tức
				</div>
			</a>
		</div>
		<div class="col-md-3">
			<a class="mini-stat clearfix block" href="{{ route('admin.product.index') }}">
				<span class="mini-stat-icon tar"><i class="fa fa-cubes"></i></span>
				<div class="mini-stat-info">
					<span>{{ productRepository()->countAllProducts() }}</span>
					Sản phẩm
				</div>
			</a>
		</div>
		<div class="col-md-3">
			<a class="mini-stat clearfix block" href="javascript:;">
				<span class="mini-stat-icon pink"><i class="fa fa-user"></i></span>
				<div class="mini-stat-info">
					<span>{{ userRepository()->countAllUsers() }}</span>
					Users
				</div>
			</a>
		 </div>
	</div> --}}
	<!--mini statistics end-->
@stop