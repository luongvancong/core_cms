@extends('admin/layouts/master')

@section('main-content')
    <section class="panel">
        <header class="panel-heading">
            <h4>
                Danh sách nhà xe
                <a href="{{ route('admin.transporter.create') }}" class="btn btn-xs btn-primary pull-right"><i class="fa fa-plus"></i> {{ trans('form.btn.create') }}</a>
            </h4>
        </header>
        <div class="panel-body">
            <div class="adv-table">
                <div class="dataTables_wrapper">
                    <form method="get" action="" class="form-filter form-inline" style="margin-bottom:20px;">
                        <input type="text" name="name" class="form-control search-box-modules input-sm" placeholder="Tên xe" value="{{ Request::get('name', '') }}">
                        <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-search"></i> {{ trans('form.btn.search') }}</button>
                    </form>
                    <table class="display table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Ảnh</th>
                            <th>Chi nhánh</th>
                            <th width="30">Atv</th>
                            <th width="30">Sửa</th>
                            <th width="30">Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($transporters as $key => $transporter)
                            <tr>
                                <td width="50">{{ $transporter->getId() }}</td>
                                <td><a href="" class="editable" data-id="{{ $transporter->getId() }}" data-field="name">{{ $transporter->getName() }}</a></td>
                                <td>{{ $transporter->getEmail() }}</td>
                                <td>{{ $transporter->getAddress() }}</td>
                                <td>
                                    <a href="{{ route('admin.transporter.images', $transporter->getId()) }}" class="btn btn-default btn-sm">{{ $transporter->images()->count() }} ảnh</a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.transporter.address', $transporter->getId()) }}" class="btn btn-default btn-sm">{{ $transporter->_address()->count() }} chi nhánh</a>
                                </td>
                                <td>{!! makeActiveButton(route('admin.transporter.active', $transporter->getId()), $transporter->getActive()) !!}</td>
                                <td>{!! makeEditButton(route('admin.transporter.edit', $transporter->getId())) !!}</td>
                                <td>{!! makeDeleteButton(route('admin.transporter.delete', $transporter->getId())) !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $transporters->links() !!}
                </div>
            </div>
        </div>
    </section>
@stop

@section('scripts')

    <script>

    </script>
@stop