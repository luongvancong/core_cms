@extends('admin/layouts/master')

@section('main-content')
	<section class="panel">
		<header class="panel-heading">
			<h4>
				{{ trans('admin/general.modules.product') }}
				<a class="pull-right btn btn-primary btn-sm" href="{{ route('admin.product.create') }}">Tạo mới</a>
			</h4>
		</header>
		<div class="panel-body">
			<div class="adv-table">
				<div class="dataTables_wrapper row">
					<div class="form-inline col-sm-2">
						<select class="form-control input-sm action-delete-multi">
							<option value="">Thao tác</option>
							<option value="delete_multi">Xóa</option>
						</select>
					</div>
					<form method="get" action="" class="form-filter form-inline mg-bt-10 col-sm-10">
						<input type="text" name="id" class="form-control search-box-modules input-sm" placeholder="ID sản phẩm" value="{{ Request::get('id', '') }}">
						<input type="text" name="name" class="form-control search-box-modules input-sm" placeholder="Tên sản phẩm" value="{{ Request::get('name', '') }}">
						<input type="text" name="price" class="form-control search-box-modules input-sm" placeholder="Giá sản phẩm" value="{{ Request::get('price', '') }}">
						<select name="type" class="form-control input-sm">
							<option value="">Chọn loại sản phẩm</option>
							@foreach(product_get_type_options() as $key => $value)
							<option value="{{ $key }}">{{ $value }}</option>
							@endforeach
						</select>

						<button type="submit" class="btn btn-default btn-sm"><i class="fa fa-search"></i> {{ trans('form.btn.search') }}</button>
					</form>
					<table class="display table table-bordered table-striped">
						<thead>
							<tr>
								<th><input type="checkbox" class="_all_options" name="_all_options"></th>
								<th>ID</th>
								<th>Tên sản phẩm</th>
								<th>Thứ tự</th>
								<th>Ảnh</th>
								<th>Loại sản phẩm</th>
								<th>Quản lý ảnh</th>
								<th>Atv</th>
								<th>Sửa</th>
								<th>Xóa</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($products as $key => $product)
								<tr>
									<td width="30"><input type="checkbox" class="_option" name="option_{{ $product->getId() }}" value="{{ $product->getId() }}"></td>
									<td width="50">{{ $product->getId() }}</td>
									<td width="300">
										<a href="{{ $product->getUrl() }}" title="{{ $product->getName() }}">{{ $product->getName() }}</a>
										<p>{!! $product->presenter()->getPrice() !!} <sup>đ</sup></p>
									</td>
									<td>
										<a href="#" class="editable" data-name="sort" data-id="{{ $product->getId() }}" data-type="text" data-pk="{{ $product->getId() }}" data-url="{{ route('admin.product.editable') }}" data-title="Thay đổi thứ tự">{{ $product->getSort() }}</a>
									</td>

									<td>
										<img height="50" src="{{ $product->getImage('sm_') }}" alt="">
									</td>
									<td>{{ $product->presenter()->getType() }}</td>
									<td>
										<a class="btn btn-default btn-xs" href="{{ route('admin.product.images', $product->getId()) }}">Quản lý ảnh SP ({{ $product->images()->count() }})</a>
									</td>
									<td width="30">{!! makeActiveButton(route('admin.product.toggleActive', $product->getId()), $product->active) !!}</td>
									<td width="30"><a href="{{ route('admin.product.edit', $product->getId()) }}" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a></td>
									<td width="30">
										{!! makeDeleteButton(route('admin.product.destroy', $product->getId())) !!}
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					@include('admin/partials/paginate', ['data' => $products, 'appended' => ['name' => Request::get('name'), 'price' => Request::get('price')]])
				</div>
			</div>
		</div>
	</section>


@stop

@section('scripts')
<script>
	$.fn.editable.defaults.mode = 'inline';
	$(function() {
		$('.editable').editable({
            showbuttons : true,
            params : {
               _token : '{{ csrf_token() }}'
            }
        });

		$('._all_options').click(function(){
	        $("input._option").prop('checked', $(this).prop("checked"));
	    });

	    $('.action-delete-multi').change(function() {
	    	var $this = $(this);
	    	var $checkedItems = $('input._option');
	    	var checkedIds = [];
	    	if($this.val() == 'delete_multi' && $('._option:checked').length) {
	    		if(confirm("Bạn có chắc chắn muốn xóa những bản ghi này?")) {
		    		$('._option:checked').each(function() {
		    			checkedIds.push($(this).val());
		    		});

		    		if(checkedIds.length) {
			    		$.ajax({
	    					url : "{{ route('admin.products.deleteMulti') }}",
	    					type : "POST",
	    					data : {
	    						product_ids : checkedIds
	    					},
	    					success : function(response) {
	    						if(response.code == 1) {
	    							alert("Xóa thành công");
	    							window.location.reload();
	    						}
	    					}
	    				});
	    			}
		    	} else {
		    		$this.val("");
		    	}
	    	} else {
	    		$this.val("");
	    	}
	    });
	});
</script>
@stop