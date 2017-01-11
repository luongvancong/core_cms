@extends('frontend/default')

@section('content')
<section id="trip-filter" class="trip">
    <div class="wrapper-content">
        <div class="container">
            <div class="content-inner">
                <!--CONTENT HERE-->
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
                    @if($hasPlace)
                    <li class="active">Đặt vé chuyến: <b>{{ $startPlace->getName() }} → {{ $endPlace->getName() }}</b> </li>
                    @else
                    <li class="active">Tìm kiếm chuyến đi phù hợp với bạn, nhanh chóng, dễ dàng</li>
                    @endif
                </ol>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sec-content">
                            <div class="sec-content-main">
                                <div class="filter" style="margin-bottom: 20px; margin-top: 20px;">
                                    <form method="GET" action="" class="form-inline" accept-charset="UTF-8">
                                        <select class="form-control m-b input-sm" name="start_hour">
                                            <option value="">Các chuyến</option>
                                            @foreach($startTimeOptions as $key => $value)
                                            <option value="{{ $key }}" {{ $key == Request::get('start_hour') ? 'selected="selected"' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        <input id="date_filter" type="text" class="form-control input-sm" name="start_date" value="{{ clean(Request::get('start_date')) }}" placeholder="Ngày xuất phát">
                                        <select name="start_place" class="form-control dtpk input-sm m-b">
                                            <option value="">Điểm xuất phát</option>
                                            @foreach($startPlaceOptions as $key => $value)
                                            <option value="{{ $key }}" {{ $key == Request::get('start_place') ? 'selected="selected"' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        <select name="end_place" class="form-control dtpk input-sm m-b">
                                            <option value="">Điểm đến</option>
                                            @foreach($endPlaceOptions as $key => $value)
                                            <option value="{{ $key }}" {{ $key == Request::get('end_place') ? 'selected="selected"' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-sm btn-primary">Lọc</button>
                                    </form>
                                </div>
                                <table class="table table-striped ticket_listing">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Chuyến đi</th>
                                            <th> Ngày / Giờ khởi hành</th>
                                            <th> Điểm lên xe</th>
                                            <th> Giá vé</th>
                                            <th class="text-right">Đặt vé</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = ($page-1) * $trips->perPage();
                                        ?>
                                        @foreach($trips as $key => $item)
                                        <?php $no ++; ?>

                                        <tr>
                                            <td>
                                                {{ $no }}
                                            </td>
                                            <td>
                                                <span style="font-size: 13px;" class="label label-primary">{{ $item->start_place_name }}</span>  <i class="fa fa-road "></i>
                                                <span style="font-size: 13px;" class="label label-primary">{{ $item->end_place_name }}</span>
                                            </td>
                                            <td>
                                                {{ $item->presenter()->getStartDate() }}
                                                <span style="font-size: 13px;" class="label label-primary"><i class="fa fa-clock-o "></i> {{ $item->presenter()->getStartHour() }}</span>
                                            </td>
                                            <td>
                                                {{ $item->getStartAddress() }}
                                            </td>
                                            <td>
                                               {{ $item->presenter()->getPrice() }} đ
                                            </td>
                                            <td class="text-right">
                                                <label class="radio-inline">
                                                    <input type="radio" name="trip_id" value="{{ $item->getId() }}"> Chọn
                                                </label>
                                                {{-- <a href="{{ route('trip.detail', [removeTitle($item->start_place_name) . '-di-' . removeTitle($item->end_place_name), $item->getId()]) }}" class="label label-primary btn-link-trip-detail">
                                                    <i class="fa fa-hand-o-up "></i>  Đặt vé / Chọn chỗ
                                                </a> --}}
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="7">
                                                <div class="text-right">
                                                    {!! $trips->links() !!}
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div><!-- End sec-content -->
                        <div class="sec-revers-trips">
                            @if(isset($reverseTrips))
                                <h2 class="heading-reverse-trip">Chuyến khứ hồi</h2>
                                <div class="table-container">
                                    <table class="table table-striped ticket_listing">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Chuyến đi</th>
                                                <th> Ngày / Giờ khởi hành</th>
                                                <th> Điểm lên xe</th>
                                                <th> Giá vé</th>
                                                <th class="text-right">Đặt vé</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = ($page-1) * $reverseTrips->perPage();
                                            ?>
                                            @foreach($reverseTrips as $key => $item)
                                                <?php $no ++; ?>

                                                <tr>
                                                    <td>
                                                        {{ $no }}
                                                    </td>
                                                    <td>
                                                        <span style="font-size: 13px;" class="label label-primary">{{ $item->start_place_name }}</span>  <i class="fa fa-road "></i>
                                                        <span style="font-size: 13px;" class="label label-primary">{{ $item->end_place_name }}</span>
                                                    </td>
                                                    <td>
                                                        {{ $item->presenter()->getStartDate() }}
                                                        <span style="font-size: 13px;" class="label label-primary"><i class="fa fa-clock-o "></i> {{ $item->presenter()->getStartHour() }}</span>
                                                    </td>
                                                    <td>
                                                        {{ $item->getStartAddress() }}
                                                    </td>
                                                    <td>
                                                        @if($item->isSale())
                                                            <strike class="sale-price">{{ $item->presenter()->getPrice() }} đ</strike> <span class="price">{{ $item->presenter()->getSalePrice() }} đ</span>
                                                        @else
                                                            {{ $item->presenter()->getPrice() }} đ
                                                        @endif
                                                    </td>
                                                    <td class="text-right">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="reverse_trip_id" value="{{ $item->getId() }}"> Chọn
                                                        </label>
                                                        {{-- <a href="{{ route('trip.detail', [removeTitle($item->start_place_name) . '-di-' . removeTitle($item->end_place_name), $item->getId()]) }}" class="label label-primary btn-link-trip-detail">
                                                            <i class="fa fa-hand-o-up "></i>  Đặt vé / Chọn chỗ
                                                        </a> --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="7">
                                                    <div class="text-right">
                                                        {!! $reverseTrips->links() !!}
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            @endif
                        </div><!-- End sec-revers-trip -->
                        <div class="pull-right">
                            <button id="btn-continue" class="btn btn-primary btn-sm btn-continue" type="button">Tiếp tục</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('scripts')
<script type="text/javascript">
    $(function() {
        $('#date_filter').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true,
            format: 'yyyy-mm-dd'
        });

        $('#btn-continue').click(function() {
            var tripId = $('input[name="trip_id"]:checked').val();
            var reverseTripId = $('input[name="reverse_trip_id"]:checked').val();
            if(!tripId) {
                alert('Vui lòng chọn một chuyến đi');
                return;
            }

            window.location.href = '{{ route('trip.choncho') }}?trip_id=' + tripId + '&rtrip_id=' + reverseTripId;
        });
    });
</script>
@stop