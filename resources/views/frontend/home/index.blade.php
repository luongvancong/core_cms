@extends('frontend/default')

@section('content')
<header>
    <div class="container titles">
        <div class="col-lg-5">
            <div class="ibox-content">
                <div class="ibox-title">
                    <h4>Mua vé trực tuyến</h4>
                </div>
                <form action="{{ route('trip.filter') }}" method="get" class="form-horizontal">

                    <div class="form-group">
                        <div class="col-sm-6">
                            <select class="form-control m-b" name="start_place" required>
                                <option value="">Điểm khởi hành</option>
                                @foreach($cities as $key => $value)
                                    <option value="{{ $key  }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6 input-group date">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input id="date_added" name="start_date" type="text" class="form-control" value="" placeholder="Chọn ngày khởi hành" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <select class="form-control m-b" name="end_place" required>
                                <option value="">Điểm đến</option>
                                @foreach($cities as $key => $value)
                                    <option value="{{ $key  }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--div class="col-sm-6 input-group date">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input id="date_modified" name="end_date" type="text" class="form-control" value="">
                        </div-->
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <button class="btn btn-primary" type="submit">Tìm chuyến đi</button>
                        </div>
                        <div class="col-sm-8">
                            <label class="checkbox-inline">
                                <input type="checkbox" value="cheap" name="sort" checked id="inlineCheckbox1"> Tìm giá vé rẻ nhất
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="1" name="two_way" id="inlineCheckbox2"> Khứ hồi
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>
<section class="booking_hot" id="booking_hot">
    <div class="route-search-panel">
        <script>
            function changeTab() {
                var location = document.getElementsByClassName("is-visible")[0].getAttribute("john");
                setInActive();
                $("#li" + location).attr("class", "active");
                $("#" + location).attr("class", "tab-pane fade in active");
            };
        </script>

        <div id="routeSearch" class="odd-row clearfix">
            <div class="container">
                <div class="content-inner">
                    <h1 class="cd-headline clip is-full-width h1-tt" style="font-size: 18px;font-weight: bold;">
                        <span>Đặt vé xe các tuyến đường phổ biến trong hôm nay</span>
                    </h1>
                    <div class="clearfix">
                        <!-- Nav tabs -->
                        {{-- <ul class="nav nav-tabs clearfix" role="tablist">
                            <li id="lisaigon" role="presentation" class="active">
                                <a href="#saigon" aria-controls="home" role="tab" data-toggle="tab">SÀI GÒN</a>
                            </li>
                            <li id="lihanoi" role="presentation">
                                <a href="#hanoi" aria-controls="profile" role="tab" data-toggle="tab">HÀ NỘI</a>
                            </li>
                            <li id="lidanang" role="presentation">
                                <a href="#danang" aria-controls="messages" role="tab" data-toggle="tab">ĐÀ NẴNG</a>
                            </li>
                            <li id="linhatrang" role="presentation">
                                <a href="#nhatrang" aria-controls="settings" role="tab" data-toggle="tab">NHA TRANG</a>
                            </li>
                            <li id="licantho" role="presentation">
                                <a href="#cantho" aria-controls="settings" role="tab" data-toggle="tab">CẦN THƠ</a>
                            </li>
                        </ul> --}}

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="saigon">
                                <div class="clearfix">
                                    <div class="col-md-12 pl0 pr0">
                                        <table class="table table-hover" style="margin-top: 20px;">
                                            <thead>
                                                <th>Chuyến</th>
                                                <th>Giá vé</th>
                                                <th>Giờ khởi hành</th>
                                                <th>Điểm đi</th>
                                                <th>Điểm đến</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                @foreach($trips as $item)
                                                <tr>
                                                    <td>
                                                        {{ $item->start_place_name == 'Lào Cai' ? 'Sapa' : $item->start_place_name }} → {{ $item->end_place_name == 'Lào Cai' ? 'Sapa' : $item->end_place_name }}
                                                    </td>
                                                    <td>
                                                        <span class="price">{{ $item->presenter()->getPrice() }} ₫/vé</span>
                                                    </td>
                                                    <td>
                                                        <span class="start-date">{!! $item->presenter()->getStartDate('d/m/Y') . ' ' . '<b>' . $item->presenter()->getStartHour() . '</b>' !!}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $item->getStartAddress() }}</span>
                                                    </td>
                                                    <td>
                                                        <span>{{ $item->getEndAddress() }}</span>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('trip.choncho') .'?trip_id='.$item->getId().'&rtrip_id=0' }}" class="btn btn-sm btn-primary" style="color: #FFF !important">Đặt vé</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@stop