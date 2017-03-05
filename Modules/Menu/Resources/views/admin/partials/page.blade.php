<div class="panel">
    <div class="panel-heading" role="tab" id="headingOne">
        Trang tĩnh
    </div>
</div>

@include('menu::admin/partials/general-control')

<div class="form-group {{ hasValidator('object_id') }}">
    <label class="control-label"><b class="text-danger">*</b> Trang tĩnh</label>
    <input type="text" id="keyword" name="object_id" class="form-control" placeholder="Tìm một trang tĩnh">
    {!! alertError('object_id') !!}
</div>

@section('scripts')
<script type="text/javascript">
    $(function() {
        $('#keyword').tokenInput('{{ route('admin.menu.ajax.searchPage') }}', {
            method: 'GET',
            queryParam: 'q',
            tokenLimit: 1
        });
    });
</script>
@endsection
