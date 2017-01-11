@extends('admin/layouts/master')

@section('main-content')
    <section class="panel">
        <header class="panel-heading">
            <h4>
                Chi tiết hóa đơn: {{ $order->getCode() }}
                <a href="{{ route('admin.tripOrder.index') }}" class="btn btn-xs btn-default pull-right"><i class="fa fa-angle-left"></i> Quay lại</a>
            </h4>
        </header>
        <div class="panel-body" >
            <div class="adv-table">
                <div class="dataTables_wrapper">
                    <table class="table">
                        <thead>
                            <th>Chuyến</th>
                            <th>Ngày/giờ khởi hành</th>
                            <th>Giá vé</th>
                            <th>SL vé</th>
                            <th>Tiền</th>
                        </thead>
                        <tbody>
                            @foreach($orderDetail as $item)
                                <?php
                                    $trip = $item->trip()->first();
                                ?>
                                <tr>
                                    <td>{{ $trip->startPlace()->first()->getName() }}->{{ $trip->endPlace()->first()->getName() }}</td>
                                    <td>{{ $trip->presenter()->getStartDate('d/m/Y') }}&nbsp;{{ $trip->presenter()->getStartHour() }}</td>
                                    <td>{{ $item->presenter()->getPrice() }}</td>
                                    <td>{{ $item->getTicket() }}</td>
                                    <td>{{ $item->presenter()->getTotalMoney() }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Tổng tiền</td>
                                <td>{{ $order->presenter()->getTotalMoney() }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop