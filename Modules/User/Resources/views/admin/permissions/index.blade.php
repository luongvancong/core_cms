@extends('admin/layouts/master')

@section('main-content')
	<section class="panel">
		<header class="panel-heading">
			<h4>
				{{ trans('admin/general.modules.roles') }}
				<a href="{{ route('permission.create') }}" class="btn btn-xs btn-primary pull-right"><i class="fa fa-plus"></i> {{ trans('form.btn.create') }}</a>
			</h4>
		</header>
		<div class="panel-body">
			<div class="adv-table">
				<div class="dataTables_wrapper">
					<form action="" class="form-filter form-inline mg-bt-10">
						<span>Permission Group</span>
						<select name="group_id" class="form-control">
							<option value="">--Select--</option>
							@foreach($groups as $item)
								<option value="{{ $item->id }}" {{ $item->id == request('group_id') ? 'selected' : '' }}>{{ $item->name }}</option>
							@endforeach
						</select>
						<button type="submit" class="btn btn-default btn-xs"><i class="fa fa-search"></i> {{ trans('form.btn.search') }}</button>
						<a href="{{ route('permission.index') }}" class="btn btn-link btn-xs">Xóa lọc</a>
					</form>
					<table class="display table table-bordered table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Nhóm quyền</th>
								<th class="sorting" aria-sort="descending">{{ trans('form.perm_name') }}</th>
								<th class="sorting" aria-sort="descending">{{ trans('form.perm_key') }}</th>
								<th>Mô tả</th>
								<th colspan="2" align="center">{{ trans('table.actions') }}</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($permissions as $key => $permission)
								<tr>
									<td>{{ $key + 1 }}</td>
									<td>{{ is_object($permission->group) ? $permission->group->name: "" }}</td>
									<td>{{ $permission->display_name }}</td>
									<td>{{ $permission->name }}</td>
									<td>{{ $permission->description }}</td>
									<td><a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a></td>
									<td><a href="{{ route('permission.destroy', $permission->id) }}" class="btn btn-xs btn-danger btn-delete-action"><i class="fa fa-trash-o"></i></a></td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{!! $permissions->links() !!}
				</div>
			</div>
		</div>
	</section>
@stop
