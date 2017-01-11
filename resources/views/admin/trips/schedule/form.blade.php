<form class="form-horizontal bucket-form" method="post" action enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="form-group {{ hasValidator('time') }}">
        <label class="col-sm-3 control-label">Thời gian <b class="text-danger">*</b></label>
        <div class="col-sm-6 text-center">
            <input type="text" name="time" value="{{ $schedule->getTime() }}" class="form-control dtpk">
            {!! alertError('time') !!}
        </div>
    </div>
    <div class="form-group {{ hasValidator('placement') }}">
        <label class="col-sm-3 control-label">Điểm đi (đến)<b class="text-danger">*</b></label>
        <div class="col-sm-6 text-center">
            <input type="text" name="placement" value="{{ $schedule->getPlacement() }}" class="form-control">
            {!! alertError('placement') !!}
        </div>
    </div>
    <div class="form-group {{ hasValidator('address') }}">
        <label class="col-sm-3 control-label">Địa chỉ<b class="text-danger">*</b></label>
        <div class="col-sm-6 text-center">
            <input type="text" name="address" value="{{ $schedule->getAddress() }}" class="form-control">
            {!! alertError('address') !!}
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
            format: 'H:mm'
        });
    });
</script>