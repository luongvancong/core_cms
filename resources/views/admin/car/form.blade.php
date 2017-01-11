<form class="form-horizontal bucket-form" method="post" action enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="form-group {{ hasValidator('name') }}">
        <label for="email" class="col-sm-3 control-label">Tên <b class="text-danger">*</b></label>
        <div class="col-sm-6 text-center">
            <input type="text" class="form-control" value="{{ Request::old('name', $car->getName()) }}" name="name">
            {!! alertError('name') !!}
        </div>
    </div>

    @if($car->hasImage())
    <div class="form-group">
        <div class="col-sm-6 col-sm-offset-3">
            <img src="{{ $car->presenter()->getImage() }}">
        </div>
    </div>
    @endif

    <div class="form-group">
        <label for="email" class="col-sm-3 control-label">Ảnh minh họa</label>
        <div class="col-sm-6 text-center">
            <input type="file" class="form-control" name="image">
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-sm-3 control-label">Số tầng</label>
        <div class="col-sm-6 text-center">
            <input type="text" class="form-control" value="{{ Request::old('name', $car->getFloor() ? $car->getFloor() : 1) }}" name="floor">
        </div>
    </div>

    <div class="form-group {{ hasValidator('seat') }}">
        <label for="email" class="col-sm-3 control-label">Số ghế tầng 1<b class="text-danger">*</b></label>
        <div class="col-sm-6 text-center">
            <input type="text" class="form-control" value="{{ Request::old('seat', $car->getSeat()) }}" name="seat">
            {!! alertError('seat') !!}
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-sm-3 control-label">Số ghế tầng 2</label>
        <div class="col-sm-6 text-center">
            <input type="text" class="form-control" value="{{ Request::old('seat_floor_2', $car->getSeat2()) }}" name="seat_floor_2">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-6 col-sm-offset-3">
            <button class="btn btn-sm btn-primary">Cập nhật</button>
        </div>
    </div>
</form>