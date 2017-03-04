<div class="panel">
    <div class="panel-heading" role="tab" id="headingOne">
        Tin tức
    </div>
</div>

@include('menu::admin/partials/general-control')

<div class="form-group">
    <label class="control-label">Tin tức</label>
    <input type="text" id="keyword" name="q" class="form-control" placeholder="Tìm một tin tức">
</div>

@section('scripts')
<script type="text/javascript">
    $(function() {
        $('#keyword').tokenInput('{{ route('admin.menu.ajax.searchPost') }}', {
            method: 'GET',
            queryParam: 'q',
            tokenLimit: 1
        });
    });
</script>
@endsection
