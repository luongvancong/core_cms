@extends('admin/layouts/master')

@section('main-content')
    <section class="panel">
        <header class="panel-heading">
            <h4>
                Địa chỉ nhà xe
                <a href="{{ route('admin.transporter.index') }}" class="pull-right btn btn-default btn-sm mg-l-10">Quay lại</a>
                <a class="pull-right btn btn-primary btn-sm" href="{{ route('admin.transporter.address.create', $transporter->getId()) }}">Tạo mới</a>
            </h4>
            <h5>{{ $transporter->getName() }}</h5>
        </header>
        <div class="panel-body">
            <div class="adv-table">
                <div class="dataTables_wrapper">
                    <table class="display table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Thành phố</th>
                                <th>SĐT đặt vé</th>
                                <th>SĐT gửi hàng</th>
                                <th>Địa chỉ</th>
                                <th>Sửa</th>
                                <th>Atv</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($address as $key => $addr)
                                <tr>
                                    <td width="50">{{ $addr->getId() }}</td>
                                    <td>
                                        <a href="">{{ $addr->getName() }}</a>
                                    </td>
                                    <td>
                                        <a href="">{{ $addr->city()->first()->getName() }}</a>
                                    </td>
                                    <td>
                                        <a href="">{{ $addr->getPhoneTicket() }}</a>
                                    </td>
                                    <td>
                                        <a href="">{{ $addr->getPhoneShop() }}</a>
                                    </td>
                                    <td>
                                        <a href="">{{ $addr->getAddress() }}</a>
                                    </td>
                                    <td width="30">{!! makeEditButton(route('admin.transporter.address.edit', [$transporter->getId(), $addr->getId()])) !!}</td>
                                    <td width="30">{!! makeActiveButton('', 1) !!}</td>
                                    <td width="30">{!! makeDeleteButton(route('admin.transporter.address.delete', [$transporter->getId(), $addr->getId()])) !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


@stop
