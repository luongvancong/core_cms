<form class="form-horizontal bucket-form" method="post" action enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="form-group {{ hasValidator('start_place') }}">
        <label class="col-sm-3 control-label">Điểm đi <b class="text-danger">*</b></label>
        <div class="col-sm-6 text-center">
            <select name="start_place" class="form-control select2 input-sm">
                <option value="">Chọn điểm đi</option>
                @foreach($cities as $item)
                <option value="{{ $item->getId() }}" {{ $item->getId() == $trip->getStartPlace() ? 'selected="selected"' : '' }}>{{ $item->getName() }}</option>
                @endforeach
            </select>
            {!! alertError('start_place') !!}
        </div>
    </div>

    <div class="form-group {{ hasValidator('end_place') }}">
        <label class="col-sm-3 control-label">Điểm đến <b class="text-danger">*</b></label>
        <div class="col-sm-6 text-center">
            <select name="end_place" class="form-control select2 input-sm">
                <option value="">Chọn điểm đến</option>
                @foreach($cities as $item)
                <option value="{{ $item->getId() }}" {{ $item->getId() == $trip->getEndPlace() ? 'selected="selected"' : '' }}>{{ $item->getName() }}</option>
                @endforeach
            </select>
            {!! alertError('end_place') !!}
        </div>
    </div>

    <div class="form-group {{ hasValidator('start_address') }}">
        <label class="col-sm-3 control-label">Địa chỉ điểm đi <b class="text-danger">*</b></label>
        <div class="col-sm-6 text-center">
            <input type="text" name="start_address" value="{{ $trip->getStartAddress() }}" class="form-control input-sm" placeholder="Bến xe nước ngầm">
            {!! alertError('start_address') !!}
        </div>
    </div>

    <div class="form-group {{ hasValidator('end_address') }}">
        <label class="col-sm-3 control-label">Địa chỉ điểm đến <b class="text-danger">*</b></label>
        <div class="col-sm-6 text-center">
            <input type="text" name="end_address" value="{{ $trip->getEndAddress() }}" class="form-control input-sm" placeholder="Thành phố Yên Bái">
            {!! alertError('end_address') !!}
        </div>
    </div>

    <div class="form-group {{ hasValidator('start_date') }}">
        <label class="col-sm-3 control-label">Ngày/Giờ đi <b class="text-danger">*</b></label>
        <div class="col-sm-6 text-center">
            <input type="text" name="start_date" value="{{ $trip->getStartDate() }}" class="dtpk form-control input-sm" placeholder="2016-12-20 05:30">
            {!! alertError('start_date') !!}
        </div>
    </div>

    <div class="form-group {{ hasValidator('end_date') }}">
        <label class="col-sm-3 control-label">Ngày/Giờ đến <b class="text-danger">*</b></label>
        <div class="col-sm-6 text-center">
            <input type="text" name="end_date" value="{{ $trip->getEndDate() }}" class="dtpk form-control input-sm" placeholder="2016-12-20 09:30">
            {!! alertError('end_date') !!}
        </div>
    </div>

    <div class="form-group {{ hasValidator('price') }}">
        <label class="col-sm-3 control-label">Giá vé <b class="text-danger">*</b></label>
        <div class="col-sm-6 text-center">
            <input type="text" name="price" value="{{ $trip->getPrice() }}" class="form-control input-sm">
            {!! alertError('price') !!}
        </div>
    </div>

    <div class="form-group {{ hasValidator('sale_price') }}">
        <label class="col-sm-3 control-label">Giá vé khuyến mãi</label>
        <div class="col-sm-6 text-center">
            <input type="text" name="sale_price" value="{{ $trip->getSalePrice() }}" class="form-control input-sm">
            {!! alertError('sale_price') !!}
        </div>
    </div>

    <div class="form-group {{ hasValidator('num_ticket') }}">
        <label class="col-sm-3 control-label">Số lượng vé <b class="text-danger">*</b></label>
        <div class="col-sm-6 text-center">
            <input type="text" name="num_ticket" value="{{ $trip->getNumTicket() }}" class="form-control input-sm">
            {!! alertError('num_ticket') !!}
        </div>
    </div>

    <div class="form-group {{ hasValidator('car_id') }}">
        <label class="col-sm-3 control-label">Chọn xe <b class="text-danger">*</b></label>
        <div class="col-sm-6 text-center">
            <select name="car_id" class="form-control input-sm select2">
                <option value="">Chọn xe</option>
                @foreach($cars as $item)
                <option value="{{ $item->getId() }}" {{ $item->getId() == $trip->getCarId() ? 'selected="selected"' : '' }}>{{ $item->getName() }}</option>
                @endforeach
            </select>
            {!! alertError('car_id') !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-6 col-sm-offset-3">
            <button class="btn btn-sm btn-primary">Cập nhật</button>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(function() {
        $('.dtpk').datetimepicker({
            locale: 'vi',
            format: 'YYYY-MM-DD H:mm'
        });
    });
</script>