@extends('frontend/default')

@section('styles')
<style type="text/css">
body {
    /*overflow: hidden;*/
}
.nav {

}
table > caption {
    font-weight: bold;
    text-transform: uppercase;
    font-size: 20px;
}
</style>
@stop

@section('content')
<div class="container" style="margin-top: 80px;">
    <div class="content-inner">

        <!--CONTENT HERE-->
        <div class="checkTicketBox animated fadeInDown">
            <div class="row">

                <div class="col-md-12">
                    <div class="ibox-content">

                        <h2 class="h2-check-ticket font-bold">Kiểm tra thông tin vé</h2>

                        <p>
                            Nhập chính xác Mã vé và Số điện thoại của bạn
                        </p>

                        <div class="row">

                            <div class="col-lg-12">
                                <form class="m-t" role="form" action="" method="GET">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Mã vé" name="code" value="{{ Request::get('code') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Số điện thoại" name="phone" value="{{ Request::get('phone') }}" required>
                                    </div>
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="action" value="search">
                                    <button type="submit" class="btn btn-primary block full-width m-b">Kiểm tra thông tin</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @if(isset($message))
                <div class="col-sm-12">
                    @if($message['code'] == 404)
                    <div class="alert alert-info">{{ $message['content'] }}</div>
                    @endif
                </div>
                @endif

                @if(isset($order) && isset($orderDetail))
                <div class="col-sm-12">
                    <table class="table table-hover table-striped table-bordered">
                        <caption>Thông tin chuyến đi</caption>
                        <tbody>
                            <tr>
                                <td>Mã đơn hàng</td>
                                <td>{{ $order->getCode() }}</td>
                            </tr>
                            <tr>
                                <td>Tổng tiền</td>
                                <td>{{ $order->presenter()->getTotalMoney() }} vnđ</td>
                            </tr>
                        </tbody>
                    </table>
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
                                    <td>{{ $item->presenter()->getPrice() }} vnđ</td>
                                    <td>{{ $item->getTicket() }}</td>
                                    <td>{{ $item->presenter()->getTotalMoney() }} vnđ</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>

    </div>
</div>
@stop