@extends('frontend/default')

@section('content')

<section id="trip-filter" class="trip">
    <div class="wrapper-content">
        <div class="container">
            <div class="content-inner">
                <!--CONTENT HERE-->
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Đặt vé chuyến: <b>{{ $startPlace->getName() }} → {{ $endPlace->getName() }}</b> </li>
                </ol>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sec-content">
                            <div class="sec-content-main">
                                <div id="error-message">
                                    <ul class="list-unstyled">

                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        {{-- End trip item template--}}
                                        <div class="heading-reverse-trip item-reverse-trip">Chiều đi:  {{ $startPlace->getName() }} -> {{ $endPlace->getName() }}</div>
                                        {!! $tplTrip !!}
                                        {{-- End trip item template--}}

                                        {{-- Reverse trip item --}}
                                        @if($hasReverseTrip)
                                            <div class="heading-reverse-trip item-reverse-trip">Chiều về:  {{ $reverseTrip['startPlace']->getName() }} -> {{ $reverseTrip['endPlace']->getName() }}</div>
                                            {!! $tplReverseTripItem !!}
                                        @endif
                                        {{-- End reverse trip item --}}
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="customer-info-col">
                                            <form id="form-customer" action="{{ route('order.submit') }}" method="POST" class="frmSeatSelection form-horizontal" style="min-width: 300px;font-size:13px;">
                                                <div class="container-fluid customer-info-title visible-xs">
                                                    <h4>THÔNG TIN KHÁCH HÀNG</h4>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 pl0 pr0 col-sm-3 control-label text-left hidden-xs">Họ tên:</label>
                                                    <div class="col-md-8 col-sm-8 pl0 pr0">
                                                        <input id="cfn" tabindex="1" name="customer_name" type="text" class="form-control input-sm" value="" placeholder="Họ tên" data-toggle="popover" data-content="Họ tên không hợp lệ" data-placement="top">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 pl0 pr0 control-label text-left hidden-xs">SĐT:</label>
                                                    <div class="col-md-8 col-sm-8 pl0 pr0">
                                                        <input id="cp" tabindex="2" name="customer_phone" type="tel" class="form-control input-sm" value="" placeholder="VD: 0912345678" data-toggle="popover" data-content="Vui lòng nhập đúng định dạng (VD: 091 234 56 78)" data-placement="left" onkeypress="return isNumberByEventCode(event)">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3" tabindex="3" class="col-md-3 pl0 pr0 col-sm-3 control-label text-left hidden-xs">Email:</label>
                                                    <div class="col-md-8 col-sm-8 pl0 pr0">
                                                        <input id="ce" name="customer_email" type="text" class="form-control input-sm" value="" placeholder="Email" data-toggle="popover" data-content="Email không hợp lệ" data-placement="left">
                                                    </div>
                                                </div>
                                                <div class="form-group mb0">
                                                    <div class="col-md-offset-3 col-md-8 col-sm-11 pl0 pr0 cont-container text-left">
                                                        <button class="btn btn-primary label-primary" type="submit">Tiếp tục</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="clearfix"></div>
                                            <div class="text-right pull-right col-md-offset-4 col-md-7 pl0">
                                            </div>
                                        </div>
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

@section('scripts')
<script type="text/javascript">
    var price = {{ $trip->getPrice() }};
    @if($hasReverseTrip)
        var reversePrice = parseInt({{ $reverseTrip['trip']->isSale() ? $reverseTrip['trip']->getSalePrice() : $reverseTrip['trip']->getPrice() }});
    @else
        var reversePrice = 0;
    @endif
    var totalMoney = 0;
    $(function() {
        $('.seat-icon.empty').click(function() {
            var $this = $(this);
            if($this.hasClass('selected')) {
                $this.removeClass('selected');
                $this.attr('src', '/img/seat-white.svg');
            } else {
                $this.addClass('selected');
                $this.attr('src', '/img/seat-green.svg');
            }

            // Nếu bình thường
            if($this.hasClass('normal')) {
                var $seatSelected = $('.seat-icon.empty.normal.selected');
                var numSeatSelected = $seatSelected.length;
                totalMoney = parseInt(numSeatSelected) * price;
                $('#total_money.normal').text(number_format(totalMoney, 0, '.', '.'));
                $('#num-seat-choice.normal').text(numSeatSelected);
            }
            // Nếu khứ hồi
            else {
                var $seatSelected = $('.seat-icon.empty.reverse.selected');
                var numSeatSelected = $seatSelected.length;
                totalMoney = parseInt(numSeatSelected) * reversePrice;
                $('#total_money.reverse').text(number_format(totalMoney, 0, '.', '.'));
                $('#num-seat-choice.reverse').text(numSeatSelected);
            }
        });

        $('#form-customer').on('submit', function(e) {
            e.preventDefault();
            var $this = $(this);

            var $seatSelected = $('.seat-icon.empty.normal.selected');
            var numSeatSelected = $seatSelected.length;

            var customerName = $this.find('input[name="customer_name"]').val();
            var customerPhone = $this.find('input[name="customer_phone"]').val();
            var customerEmail = $this.find('input[name="customer_email"]').val();

            var formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('data[0][num_seat]', numSeatSelected);
            formData.append('data[0][trip_id]', {{ $trip->getId() }});
            formData.append('customer_name', customerName);
            formData.append('customer_email', customerEmail);
            formData.append('customer_phone', customerPhone);

            var dataSeat = [];
            $seatSelected.each(function(index, el) {
                var _seat = $(this);
                formData.append('data[0][data_seats]['+index+'][x]', _seat.data('x'));
                formData.append('data[0][data_seats]['+index+'][y]', _seat.data('y'));
            });

            @if($hasReverseTrip)
                // Reverse
                var $seatSelected = $('.seat-icon.empty.reverse.selected');
                var numSeatSelected = $seatSelected.length;

                formData.append('data[1][num_seat]', numSeatSelected);
                formData.append('data[1][trip_id]', {{ $reverseTrip['trip']->getId() }});

                var dataSeat = [];
                $seatSelected.each(function(index, el) {
                    var _seat = $(this);
                    formData.append('data[1][data_seats]['+index+'][x]', _seat.data('x'));
                    formData.append('data[1][data_seats]['+index+'][y]', _seat.data('y'));
                });

                formData.append('has_reverse_trip', {{ (int) $hasReverseTrip }});
                formData.append('rtrip_id', {{ $reverseTrip['trip']->getId() }});
            @endif

            $.ajax({
                url : '{{ route('order.submit') }}',
                type : 'POST',
                dataType : 'json',
                processData: false,
                contentType: false,
                data : formData,
                success : function(response) {
                    if(response.code == 1) {
                        window.location.href = response.redirect_uri;
                    } else {
                        alert(response.message);
                    }
                },
                error : function(response) {
                    var data = response.responseJSON;
                    $('#error-message').find('ul').empty();
                    for(var i in data) {
                        for(var j in data[i]) {
                            $('#error-message').find('ul').append('<li><span style="font-size: 14px; margin-bottom: 10px; display: inline-block;" class="label label-warning">' + data[i][j] + '</span></li>');
                        }
                    }
                }
            });

        });
    });
</script>
@stop