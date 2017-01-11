<table class="table table-striped ticket_listing">
    <tbody>
        <tr class="ticket-booking-details ticket-booking-detail-seat-selection">
            <td colspan="6" class="pl0 pr0 pt0 pb0" style="padding:0">
                <div class="booking-expand  clearfix">
                    <table class="table seat-template-table table-noborder mb0">
                        <thead class="bg-title-tbl">
                            <tr>
                                <th class="hidden-xs">Bấm ghế trống để chọn, bấm lần nữa để huỷ</th>
                                <th class="hidden-xs hidden-sm">Thông tin vé xe</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="col-md-5 pr30 seat-template-col">
                                    <table class="color-seat table table-noborder mb0">
                                        <tbody>
                                            <tr class="seat-guid-row">
                                                <td>
                                                    <div class="ml5" style="display: inline-block;border-radius: 50%;width: 11px;height: 11px;border: 1px solid #919191;"></div>
                                                    Ghế trống
                                                </td>
                                                <td>
                                                    <p class="mb0">
                                                        <i class="fa fa-circle ml5" style="color: #D4D4D4;"></i> Ghế đã đặt
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="mb0">
                                                        <i class="fa fa-circle ml5" style="color: #BADF41;"> </i> Đang chọn
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="cd-sodoghe mt10">
                                        <table>
                                        <?php
                                        for($x = 1; $x <= 10; $x ++) {
                                            echo '<tr>';
                                            for($y = 1; $y <= 8; $y ++) {
                                                $type = isset($seats[$x.$y]) ? $seats[$x.$y] : -1;
                                                $selectedSeat = false;
                                                if(isset($pickedSeats[$x.$y])) {
                                                    $selectedSeat = true;
                                                }

                                                if($selectedSeat) {
                                                    $src = '/img/seat-gray.svg';
                                                    $imgTag = '<img class="seat-icon" height="35" src="'. $src .'" style="display:inline-block; margin: 5px;" />';
                                                } else {
                                                    if($type != -1) {
                                                        $src = '/img/seat-white.svg';
                                                        $imgTag = '<img class="seat-icon empty '. $typeStr .'" data-x="'. $x .'" data-y="'. $y .'" height="35" src="'. $src .'" style="display:inline-block; margin: 5px; cursor: pointer" />';
                                                    }
                                                    else {
                                                        $imgTag = "";
                                                    }
                                                }

                                                if($type == 1) {
                                                    $src = '/img/steering-wheel.svg';
                                                    $imgTag = '<img class="seat-icon" height="35" src="'. $src .'" style="display:inline-block; margin: 5px;" />';
                                                }

                                                echo '<td data-x="'. $x .'" data-y="'. $y .'">
                                                    '. $imgTag .'
                                                </td>';

                                            }
                                            echo '</tr>';
                                        }
                                        ?>
                                        </table>
                                    </div>
                                    <div class="ticket-info-mobile visible-xs">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <span>Số ghế: </span>
                                            </div>
                                            <div class="col-xs-7">
                                                <span class="seat-template-seat-code">Vui lòng chọn ít nhất 1 chỗ ngồi</span>
                                            </div>
                                        </div>
                                        <div class="row mt5">
                                            <div class="col-xs-4">
                                                <span>Tổng tiền: </span>
                                            </div>
                                            <div class="col-xs-7">
                                                <span class="seat-template-old-total-fare" style="font-size: 14px; text-decoration: line-through; margin-right: 10px;"></span>
                                                <h4 class="seat-template-total-fare">0</h4>
                                                <span> đ</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="pl0 hidden-xs hidden-sm">
                                    <table class="table table-info" style="min-width:285px; background: #f7f6f6;">
                                        <tbody>
                                            <tr>
                                                <td>Tuyến đường:</td>
                                                <td><b>{{ $startPlace->getName() }} → {{ $endPlace->getName() }}</b></td>
                                            </tr>
                                            <tr>
                                                <td>Ngày khởi hành:</td>
                                                <td><b><span class="departure-date">{{ $trip->presenter()->getStartDate() }}</span></b></td>
                                            </tr>
                                            <tr>
                                                <td>Giờ xuất phát:</td>
                                                <td><b><span class="departure-time">{{ $trip->presenter()->getStartHour() }}</span></b></td>
                                            </tr>
                                            <tr>
                                                <td>Địa chỉ xuất phát:</td>
                                                <td><b><span>{{ $trip->getStartAddress() }}</span></b></td>
                                            </tr>
                                            <tr>
                                                <td>Địa chỉ điểm đến:</td>
                                                <td><b><span>{{ $trip->getEndAddress() }}</span></b></td>
                                            </tr>
                                            <tr>
                                                <td>Số ghế:</td>
                                                <td>
                                                    <span id="num-seat-choice" class="seat-selected {{ $typeStr }}">0</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Giá vé:</td>
                                                <td>
                                                    @if($trip->isSale() && $typeStr === 'reverse')
                                                        <strike class="sale-price">{{ $trip->presenter()->getPrice() }} đ/người</strike>
                                                        <span class="price">{{ $trip->presenter()->getSalePrice() }} đ/người</span>
                                                    @else
                                                        {{ $trip->presenter()->getPrice() }} đ/người
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <h4>Tổng tiền:</h4>
                                                </td>
                                                <td>
                                                    <h4 id="total_money" class="{{ $typeStr }}">0 đ</h4>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <h6 class="text-wblue thin200 pull-left pl5 selfie">SapaLimousine</h6>
                    <img class="logo-sm" src="/img/logo-sm.svg" alt="">
                    <h6 class="text-wblue thin200 pull-right pr5" style="padding-right: 10px">Mọi thắc mắc vui lòng gọi hotline:  <b><a class="hotline-link" href="tel:{{ setting()->getHotLine() }}">{{ setting()->getHotLine() }}</a></b></h6>
                </div>
            </td>
        </tr>
    </tbody>
</table>