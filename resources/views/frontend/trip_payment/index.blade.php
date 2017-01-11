@extends('frontend/default')

@section('content')
<div class="wrapper-content gray-bg">
    <div class="container">
        <div class="content-inner">
            <!--CONTENT HERE-->
            <div class="checkTicketDetailsBox animated fadeInDown">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox-content">

                            <h2 class="h2-check-ticket-details font-bold">Đặt vé thành công </h2>
                            <p>Vui lòng chuyển khoản tiền vào số tài khoản bên dưới để đảm bảo giữ chỗ. Hoặc đến địa chỉ bên dưới để nộp tiền</p>
                            <div>
                                <ul class="list-unstyled">
                                    <li>Địa chỉ: Số 89 Mã Mây, Hoàn Kiếm, Hà Nội</li>
                                    <li>Số hotline: 0912.281.883</li>
                                    <li>Chủ tài khoản: PHAM QUANG TUAN - Số tài khoản 111 101 33076 010 - Ngân hàng Tecombank Hà Nội</li>
                                </ul>
                            </div>
                            <p>
                            Chúng tôi sẽ kiểm tra mã vé của khách hàng trươc khi lên xe. Mọi chi tiết xin liên hệ Hotline: {{ setting()->getHotLine() }}.<br>
                            <b>Xin chân thành cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi. </b>
                            </p>

                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="list-group clear-list">
                                        <li class="list-group-item fist-item">
                                            <span class="pull-right"> <b>{{ $order->getCode() }}</b> </span>
                                            Mã đơn hàng: <span class="text-primary"></span>
                                        </li>
                                        <li class="list-group-item fist-item">
                                            <span class="pull-right"> <b>{{ $order->getCustomerName() }}</b> </span>
                                            Khách hàng
                                        </li>
                                        <li class="list-group-item fist-item">
                                            <span class="pull-right"> <b>{{ $order->getCustomerPhone() }}</b> </span>
                                            Số điện thoại
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
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
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    {{-- <a href="" class="btn btn-sm btn-primary">Tiếp tục</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop