@extends('admin/layouts/master')

{{-- Page content --}}
@section('main-content')
<div class="panel">
   <div class="panel-heading">
      <h3>
         Quản lý trang tĩnh
         <div class="pull-right">
            <a href="{{ route('admin.page.create') }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Thêm mới</a>
         </div>
      </h3>
   </div>
   <div class="panel-body">
      <table class="table table-bordered table-striped table-hover">
         <thead>
            <tr>
               <th>ID</th>
               <th>Ảnh</th>
               <th>Tiêu đề</th>
               <th>Slug</th>
               <th>Loại</th>
               <th width="30">Atv</th>
               <th width="30">Edit</th>
               <th width="30">Del</th>
            </tr>
         </thead>
         <tbody>
            @foreach($pages as $page)
               <tr>
                  <td>{{ $page->pag_id }}</td>
                  <td><img src="{{ $page->getImage('sm_') }}" height="25"></td>
                  <td>
                     <a href="{{ route('page.detail', [$page->pag_id, removeTitle($page->pag_title)]) }}">{{ $page->pag_title }}</a>
                  </td>
                  <td>
                     {{ $page->getSlug() }}
                  </td>
                  <td>{{ page_type_to_text($page->getType()) }}</td>
                  <td class="text-center">{!! makeActiveButton(route('admin.page.active', [$page->pag_id]), $page->pag_active) !!}</td>
                  <td class="text-center">{!! makeEditButton(route('admin.page.edit', [$page->pag_id])) !!}</td>
                  <td class="text-center">{!! makeDeleteButton(route('admin.page.delete', [$page->pag_id])) !!}</td>
               </tr>
            @endforeach
         </tbody>
      </table>

      <div class="text-right">
         {!! $pages->links() !!}
      </div>
   </div>
</div>


@stop