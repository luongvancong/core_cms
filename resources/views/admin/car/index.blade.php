@extends('admin/layouts/master')

@section('main-content')
    <section class="panel">
        <header class="panel-heading">
            <h4>
                Danh sách xe
                <a href="{{ route('admin.car.create') }}" class="btn btn-xs btn-primary pull-right"><i class="fa fa-plus"></i> {{ trans('form.btn.create') }}</a>
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
                                <th>Ảnh</th>
                                <th>Ghế</th>
                                <th>Tầng</th>
                                <th>Vị trí ghế</th>
                                <th width="30">Sửa/Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cars as $key => $car)
                                <tr>
                                    <td width="50">{{ $car->getId() }}</td>
                                    <td><a href="" class="editable" data-id="{{ $car->getId() }}" data-field="name">{{ $car->getName() }}</a></td>
                                    <td><img src="{{ $car->presenter()->getImage() }}" height="50"></td>
                                    <td>{{ $car->getSeat() }}</td>
                                    <td>{{ $car->getFloor() }}</td>
                                    <td>
                                        <a href="{{ route('admin.car.position_seat.index', $car->getId()) }}" class="btn btn-sm btn-danger">Tạo vị trí ghế ngồi</a>
                                    </td>
                                    <td>
                                        {!! makeEditButton(route('admin.car.edit', $car->getId())) !!}
                                        {!! makeDeleteButton(route('admin.car.delete', $car->getId())) !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $cars->links() !!}
                </div>
            </div>
        </div>
    </section>
@stop

@section('scripts')

<script>

</script>
@stop