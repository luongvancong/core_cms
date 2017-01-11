@extends('admin/layouts/master')

@section('main-content')
    <section class="panel">
        <header class="panel-heading">
            <h4>
                Ảnh chi tiết chuyến xe <small>{{ $trip->startPlace()->first()->getName() }}-{{ $trip->endPlace()->first()->getName() }}</small>
                <a href="{{ route('admin.trip.index') }}" class="pull-right btn btn-default btn-sm mg-l-10">Quay lại</a>
                <a class="pull-right btn btn-primary btn-sm" href="{{ route('admin.trip.images.create', [$trip->getId()]) }}">Tạo mới</a>
            </h4>
        </header>
        <div class="panel-body">
            <div class="adv-table">
                <div class="dataTables_wrapper">
                    <table class="display table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ảnh</th>

                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($images as $key => $image)
                                <tr>
                                    <td width="50">{{ $image->getId() }}</td>
                                    <td>
                                        <img height="50" src="{{ parse_image_url($image->getImage('sm_')) }}" alt="">
                                    </td>
                                    <td width="30"><a href="{{ route('admin.trip.images.delete', [$trip->getId(), $image->getId()]) }}" class="btn btn-xs btn-danger btn-delete-action"><i class="fa fa-trash-o"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


@stop
