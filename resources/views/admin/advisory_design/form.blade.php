<form class="form-horizontal bucket-form" method="post" action enctype="multipart/form-data">
    <div class="form-group {{ hasValidator('category_id') }}">
        <label class="col-sm-3 control-label">Danh mục cha</label>
        <div class="col-sm-6">
            {!! getCategoriesHtmlSelectOption($categories, old('category_id', $category->getParentId()), ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group {{ hasValidator('name') }}">
        <label for="email" class="col-sm-3 control-label">Tên <b class="text-danger">*</b></label>
        <div class="col-sm-6 text-center">
            <input type="text" class="form-control" value="{{ old('name', $category->getName()) }}" name="name">
            {!! alertError('name') !!}
        </div>
    </div>

    <div class="form-group {{ hasValidator('slug') }}">
        <label for="email" class="col-sm-3 control-label">Slug</label>
        <div class="col-sm-6 text-center">
            <input type="text" class="form-control" value="{{ old('slug', $category->getSlug()) }}" name="slug">
            {!! alertError('slug') !!}
        </div>
    </div>

    @if($category->id > 0)
    <div class="form-group">
        <div class="col-sm-6 col-sm-offset-3">
            <img class="img-reponsive" src="{{ $category->getImage() }}">
        </div>
    </div>
    @endif

    <div class="form-group">
        <label class="col-sm-3 control-label">Ảnh đại diện <b class="text-red">*</b></label>
        <div class="col-sm-6 text-center">
            <input type="file" class="form-control" name="background">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Mô tả ngắn</label>
        <div class="col-sm-6">
            <textarea name="short_description" rows="10" class="form-control ckeditor">{{ $category->getShortDescription() }}</textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
        <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> {{ trans('form.btn.update') }}</button>
        <a href="{{ route('admin.category.index') }}" class="btn btn-link">{{ trans('form.btn.back') }}</a>
        </div>
    </div>
    {!! csrf_field() !!}
</form>