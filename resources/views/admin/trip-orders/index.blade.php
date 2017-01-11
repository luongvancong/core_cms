@extends('admin/layouts/master')

@section('main-content')
    <section class="panel">
        <header class="panel-heading">
            <h4>
                Danh sách hóa đơn
                <a href="{{ route('admin.tripOrder.index') }}" class="btn btn-xs btn-default pull-right"><i class="fa fa-angle-left"></i> Quay lại</a>
            </h4>
        </header>
        <div class="panel-body" >
            <div class="adv-table">
                <div class="dataTables_wrapper">
                    <div class="mg-bt-10">
                        Tổng doanh số: <span class="text-danger" style="font-size: 18px;">{{ formatCurrency($sumTotalMoney) }} vnđ</span>
                    </div>
                    <form method="get" action="" class="form-filter form-inline" style="margin-bottom:20px; position: relative;">
                        <input type="text" name="customer_name" class="form-control search-box-modules input-sm" placeholder="Tên khách hàng" title="Tên khách hàng" value="{{ Request::get('customer_name', '') }}">
                        <input type="text" name="customer_email" class="form-control search-box-modules input-sm" placeholder="Email khách hàng" title="Email khách hàng" value="{{ Request::get('customer_email', '') }}">
                        <input type="text" name="customer_phone" class="form-control search-box-modules input-sm" placeholder="Phone khách hàng" title="Phone khách hàng" value="{{ Request::get('customer_phone', '') }}">
                        {{-- <input type="text" name="trip_code" class="form-control search-box-modules input-sm" placeholder="Mã chuyến xe" title="Mã chuyến xe" value="{{ Request::get('trip_code', '') }}"> --}}
                        <input type="text" name="code" class="form-control search-box-modules input-sm mg-" placeholder="Mã vé" title="Mã vé" value="{{ Request::get('code', '') }}">
                        <select class="form-control input-sm" name="status">
                            <option value="">Trạng thái</option>
                            @foreach(get_order_status_options() as $key => $value)
                            <option value="{{ $key }}" {{ $key === Request::get('status') ? 'selected="selected"' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-search"></i> {{ trans('form.btn.search') }}</button>
                    </form>
                    <table class="display table table-bordered table-striped table-responsive">
                        <thead>
                            <th width="50">ID</th>
                            <th>Đơn hàng</th>
                            <th width="300">Khách hàng</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->getId() }}</td>
                                <td>
                                    <table class="table">
                                        <tr>
                                            <td>Status</td>
                                            <td>{{ $order->presenter()->getStatus() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Mã</td>
                                            <td><span style="display: block; white-space: normal; width: 200px; overflow: hidden; text-overflow: ellipsis; font-size: 11px;">{{ $order->getCode() }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Tổng tiền</td>
                                            <td>{{ $order->presenter()->getTotalMoney() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ngày đặt</td>
                                            <td>{{ $order->getCreatedAt() }}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table class="table">
                                        <tr>
                                            <td>ID:</td>
                                            <td>{{ $order->getCustomerId() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tên:</td>
                                            <td>{{ $order->getCustomerName() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td>{{ $order->getCustomerEmail() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone:</td>
                                            <td>{{ $order->getCustomerPhone() }}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <a href="{{ route('admin.tripOrder.detail', [$order->getId()]) }}" class="btn btn-xs btn-primary">Chi tiết</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $orders->links() !!}
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(function() {
            $('.dtpk').datepicker({
                locale: 'vi',
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
@stop

