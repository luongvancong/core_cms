<div class="panel">
    <div class="panel-heading">
        Danh mục tin tức
    </div>
</div>

@include('menu::admin/partials/general-control')

<div class="form-group {{ hasValidator('object_id') }}">
    <label class="control-label"><b class="text-danger">*</b> Danh mục</label>
    <select class="form-control" name="object_id">
        <option value="">Chọn một danh mục</option>
        @foreach($postCategories as $item)
            <option value="{{ $item->getId() }}" {{ $menu->getObjectId() == $item->getId() ? 'selected' : '' }}><?php for($i = 0; $i < $item->level; $i ++) echo '--'; ?>{{ $item->getName() }}</option>
        @endforeach
    </select>
    {!! alertError('object_id') !!}
</div>

@section('scripts')
<script type="text/javascript">
    $(function() {
        $('#keyword').tokenInput('{{ route('admin.menu.ajax.searchPostCategory') }}', {
            method: 'GET',
            queryParam: 'q',
            tokenLimit: 1
        });
    });
</script>
@endsection