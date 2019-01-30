@extends('admin/layouts/master')

@section('main-content')
    <div class="panel">
        <div class="panel-heading">
            <h3>
                Testimonial
                <div class="pull-right">
                    <a href="{{ route('admin.testimonial.create') }}" class="btn btn-xs btn-primary">Thêm mới</a>
                </div>
            </h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover table-stripped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Avatar</th>
                        <th>Nghề nghiệp</th>
                        <th>Bình luận</th>
                        <th>Ngày tạo</th>
                        <th>Cập nhật</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testimonials as $item)
                        <tr>
                            <td>{{ $item->getId() }}</td>
                            <td>
                                <img src="{{ $item->presenter()->getAvatar('sm_') }}" height="90">
                            </td>
                            <td>{{ $item->getProfession() }}</td>
                            <td>{{ $item->getComment() }}</td>
                            <td>{{ $item->getCreatedAt() }}</td>
                            <td>{{ $item->getUpdatedAt() }}</td>
                            <td width="30">{!! makeEditButton(route('admin.testimonial.edit', $item->getId())) !!}</td>
                            <td width="30">{!! makeDeleteButton(route('admin.testimonial.delete', $item->getId())) !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

