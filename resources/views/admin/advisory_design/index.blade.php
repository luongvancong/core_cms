@extends('admin/layouts/master')

@section('main-content')
    <section class="panel">
        <header class="panel-heading">
            <h4>
                Danh sách danh mục tư vấn thiết kế
                <a href="{{ route('admin.advisory_design.categories.create') }}" class="btn btn-xs btn-primary pull-right"><i class="fa fa-plus"></i> {{ trans('form.btn.create') }}</a>
            </h4>
        </header>
        <div class="panel-body">
            <div class="adv-table">
                <div class="dataTables_wrapper">
                    <form method="get" action="" class="form-filter form-inline" style="margin-bottom:20px;">
                        <input type="text" name="name" class="form-control search-box-modules input-sm" placeholder="Tên" value="{{ Request::get('name', '') }}">
                        <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-search"></i> {{ trans('form.btn.search') }}</button>
                    </form>
                    <table class="display table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Ảnh</th>
                                <th>Trạng thái</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                                <tr>
                                    <td width="50">{{ $category->getId() }}</td>
                                    <td>
                                        <a href="" class="editable" data-id="{{ $category->getId() }}" data-field="name"><?php for($i = 1 ; $i < $category->level; $i ++) echo '--'; ?>{{ $category->getName() }}</a>
                                    </td>
                                    <td>
                                        <img src="{{ $category->getImage('sm_') }}" height="50">
                                    </td>
                                    <td width="30">
                                        {!! makeActiveButton(route('admin.advisory_design.categories.toggleActive', $category->id), $category->active) !!}
                                    </td>
                                    <td width="30"><a href="{{ route('admin.advisory_design.categories.edit', $category->getId()) }}" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a></td>
                                    <td width="30"><a href="{{ route('admin.advisory_design.categories.destroy', $category->getId()) }}" class="btn btn-xs btn-danger btn-delete-action"><i class="fa fa-trash-o"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop

@section('scripts')
<script>

</script>
@stop