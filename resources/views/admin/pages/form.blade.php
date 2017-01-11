<form class="form-horizontal bucket-form" method="post" action enctype="multipart/form-data">
   <div class="form-group">
      <label for="email" class="col-sm-3 control-label">Loại trang <b class="text-danger">*</b></label>
      <div class="col-sm-6 text-center">
         <select class="form-control" name="pag_type">
            <option value="">Chọn loại trang</option>
            @foreach(page_get_all_types() as $key => $value)
            <option value="{{ $key }}" {{ $page->getType() == $key ? 'selected="selected"' : '' }}>{{ $value }}</option>
            @endforeach
         </select>
      </div>
   </div>

   <div class="form-group {{ hasValidator('pag_title') }}">
      <label for="email" class="col-sm-3 control-label">Tiêu đề <b class="text-danger">*</b></label>
      <div class="col-sm-6 text-center">
         <input type="text" class="form-control" value="{{ Request::old('pag_title', $page->getTitle()) }}" name="pag_title">
         {!! alertError('pag_title') !!}
      </div>
   </div>

   <div class="form-group">
      <label for="email" class="col-sm-3 control-label">Slug</label>
      <div class="col-sm-6 text-center">
         <input type="text" class="form-control" value="{{ Request::old('pag_slug', $page->getSlug()) }}" name="pag_slug">
      </div>
   </div>

   @if($page->hasImage())
   <div class="form-group">
      <div class="col-sm-6 col-sm-offset-3">
         <img src="{{ $page->getImage('md_') }}">
      </div>
   </div>
   @endif

   <div class="form-group">
      <label for="email" class="col-sm-3 control-label">Ảnh đại diện <b class="text-danger">*</b></label>
      <div class="col-sm-6 text-center">
         <input type="file" class="form-control" name="pag_image">
         <input type="text" name="image_alt" class="form-control" placeholder="Alt">
      </div>
   </div>

   <div class="form-group">
      <label for="email" class="col-sm-3 control-label">Nội dung <b class="text-danger">*</b></label>
      <div class="col-sm-12">
         <textarea class="form-control ckeditor" name="pag_content">{!! $page->getContent() !!}</textarea>
      </div>
   </div>


   <hr>
   <h5 class="mg-bt-20"><b>Phần thông tin Metadata dành cho SEO</b></h5>

   <div class="form-group">
      <label for="email" class="col-sm-3 control-label">Meta title</label>
      <div class="col-sm-6 text-center">
         <input type="text" name="meta_title" value="{{ old('meta_title', $page->getMetaTitle()) }}" class="form-control">
      </div>
   </div>
   <div class="form-group">
      <label for="email" class="col-sm-3 control-label">Meta keyword</label>
      <div class="col-sm-6 text-center">
         <input type="text" name="meta_keyword" value="{{ old('meta_keyword', $page->getMetaKeyword()) }}" class="form-control">
      </div>
   </div>
   <div class="form-group">
      <label for="email" class="col-sm-3 control-label">Meta description</label>
      <div class="col-sm-6 text-center">
         <input type="text" name="meta_description" value="{{ old('meta_description', $page->getMetaDescription()) }}" class="form-control">
      </div>
   </div>

   <div class="form-group">
      <div class="col-sm-6 col-sm-offset-3">
         {!! csrf_field() !!}
         <button type="submit" class="btn btn-sm btn-primary">Cập nhật</button>
      </div>
   </div>
</form>