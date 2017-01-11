<form class="form-horizontal bucket-form" method="post" action enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="form-group {{ hasValidator('name') }}">
        <label class="col-sm-3 control-label">Tên <b class="text-danger">*</b></label>
        <div class="col-sm-6 text-center">
            <input type="text" class="form-control input-sm" value="{{ Request::old('name', $address->getName()) }}" name="name">
            {!! alertError('name') !!}
        </div>
    </div>

    <div class="form-group {{ hasValidator('city_id') }}">
        <label class="col-sm-3 control-label">Thành phố <b class="text-danger">*</b></label>
        <div class="col-sm-6 text-center">
            <select name="city_id" class="form-control input-sm select2">
                <option value="">Thành phố</option>
                @foreach($cities as $cit)
                <option value="{{ $cit->getId() }}" {{ $address->getCityId() == $cit->getId() ? 'selected="selected"' : '' }}>{{ $cit->getName() }}</option>
                @endforeach
            </select>
            {!! alertError('city_id') !!}
        </div>
    </div>

    <div class="form-group {{ hasValidator('address') }}">
        <label class="col-sm-3 control-label">Địa chỉ <b class="text-danger">*</b></label>
        <div class="col-sm-6 text-center">
            <input type="text" name="address" value="{{ $address->getAddress() }}" class="form-control input-sm">
            {!! alertError('address') !!}
        </div>
    </div>

    <div class="form-group {{ hasValidator('phone_ticket') }}">
        <label class="col-sm-3 control-label">SĐT đặt vé <b class="text-danger">*</b></label>
        <div class="col-sm-6 text-center">
            <input type="text" name="phone_ticket" value="{{ $address->getPhoneTicket() }}" class="form-control input-sm">
            {!! alertError('phone_ticket') !!}
        </div>
    </div>

    <div class="form-group {{ hasValidator('phone_shop') }}">
        <label class="col-sm-3 control-label">SĐT gửi hàng <b class="text-danger">*</b></label>
        <div class="col-sm-6 text-center">
            <input type="text" name="phone_shop" value="{{ $address->getPhoneShop() }}" class="form-control input-sm">
            {!! alertError('phone_shop') !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
        <button type="submit" class="btn btn-primary btn-sm">Cập nhật</button>
        <a href="{{ route('admin.transporter.address', $transporter->getId()) }}" class="btn btn-link">{{ trans('form.btn.back') }}</a>
        </div>
    </div>
</form>