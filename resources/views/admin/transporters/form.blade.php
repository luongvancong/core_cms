<form class="form-horizontal bucket-form" method="post" action enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="form-group {{ hasValidator('name') }}">
        <label class="col-sm-3 control-label">Tên <b class="text-danger">*</b></label>
        <div class="col-sm-6 text-center">
            <input type="text" class="form-control" value="{{ Request::old('name', $transporter->getName()) }}" name="name">
            {!! alertError('name') !!}
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-sm-3 control-label">Ảnh minh họa</label>
        <div class="col-sm-6">
            @if($transporter->hasImage())
                <img src="{{ $transporter->presenter()->getImage('md_') }}" style="margin-bottom: 10px; height: 90px;">
            @endif
            <input type="file" class="form-control" name="image">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Địa chỉ</label>
        <div class="col-sm-6 text-center">
            <input type="text" class="form-control" value="{{ Request::old('address', $transporter->getAddress()) }}" name="address">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Email</label>
        <div class="col-sm-6 text-center">
            <input type="text" class="form-control" value="{{ Request::old('email', $transporter->getEmail()) }}" name="email">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Điện thoại cố định</label>
        <div class="col-sm-6 text-center">
            <input type="text" class="form-control" value="{{ Request::old('home_phone', $transporter->getHomePhone()) }}" name="home_phone">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Điện thoại di động</label>
        <div class="col-sm-6 text-center">
            <input type="text" class="form-control" value="{{ Request::old('phone', $transporter->getHomePhone()) }}" name="phone">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-6 col-sm-offset-3">
            <button class="btn btn-sm btn-primary">Cập nhật</button>
        </div>
    </div>
</form>