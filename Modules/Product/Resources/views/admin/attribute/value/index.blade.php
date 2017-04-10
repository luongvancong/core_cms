@extends('admin/layouts/master')

@section('main-content')
    <section class="panel">
        <header class="panel-heading">
            <h4>
                Giá trị thuộc tính
                <small>Danh mục: <i>Máy tính</i></small>
                <small>Thuộc tính: <b>CPU</b></small>
                <div class="pull-right">
                    {{-- <a href="{{ route('admin.product_attribute.create', $category->getId()) }}" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i> {{ trans('form.btn.create') }}</a> --}}
                    {{-- <a href="{{ route('admin.product_attribute.index', $category->getId()) }}" class="btn btn-xs btn-default">{{ trans('form.btn.back') }}</a> --}}
                </div>
            </h4>
        </header>
        <div class="panel-body">
            <div class="adv-table">
                <div class="dataTables_wrapper">
                    <form method="get" action="" class="form-filter form-inline" style="margin-bottom:20px;">
                        <input type="text" name="name" class="form-control search-box-modules input-sm" placeholder="Giá trị thuộc tính" value="{{ Request::get('name', '') }}">
                        <button type="submit" class="btn btn-default btn-xs"><i class="fa fa-search"></i> {{ trans('form.btn.search') }}</button>
                    </form>
                    <table class="display table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Giá trị</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop