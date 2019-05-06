@extends('admin/layouts/master')

@section('main-content')
	<div class="panel">
		<div class="panel-heading">
			<h3>{{ trans('admin/general.update_info') . ' Permission Group'}}</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" method="post" action="">
				<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					<label for="name" class="col-sm-3 control-label">Name <b class="text-danger">*</b></label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="name" name="name" value="{{ Request::old('name', $item->name) }}" />
						<i class="help-inline text-muted">Ex: blog.edit</i>
						{!! $errors->first('name', '<span class="help-inline text-danger">:message</span>') !!}
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
						<button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> {{ trans('form.btn.update') }}</button>
					</div>
				</div>
				{!! csrf_field() !!}
			</form>
		</div>
	</div>


@stop
