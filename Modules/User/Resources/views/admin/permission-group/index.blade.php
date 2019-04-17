@extends('admin/layouts/master')

@section('main-content')
    <section class="panel">
        <header class="panel-heading">
            <h4>
                Permission Group
                <a href="{{ route('permission-group.create') }}" class="btn btn-xs btn-primary pull-right"><i class="fa fa-plus"></i> {{ trans('form.btn.create') }}</a>
            </h4>
        </header>
        <div class="panel-body">
            <div class="adv-table">
                <div class="dataTables_wrapper">
                    <table class="display table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="30">#</th>
                            <th class="sorting" aria-sort="descending">Tên</th>
                            <th colspan="2" align="center">{{ trans('table.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $key => $permission)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $permission->name }}</td>
                                <td width="15"><a href="{{ route('permission-group.edit', $permission->id) }}" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a></td>
                                <td width="15"><a href="{{ route('permission-group.destroy', $permission->id) }}" class="btn btn-xs btn-danger btn-delete-action"><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $items->links() !!}
                </div>
            </div>
        </div>
    </section>
@stop
