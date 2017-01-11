@extends('admin/layouts/master')

@section('main-content')
    <section class="panel">
        <header class="panel-heading">
            <h4>
                Lịch trình chuyến xe <small>{{ $trip->startPlace()->first()->getName() }}-{{ $trip->endPlace()->first()->getName() }}</small>
                <a href="{{ route('admin.trip.schedule.create', $trip->getId()) }}" class="btn btn-xs btn-primary pull-right"><i class="fa fa-plus"></i> {{ trans('form.btn.create') }}</a>
            </h4>
        </header>
        <div class="panel-body">
            <div class="adv-table">
                <div class="dataTables_wrapper">

                    <table class="display table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Thời gian</th>
                            <th>Địa điểm đi(đến)</th>
                            <th>Địa chỉ đi(đến)</th>
                            <th width="30">Sửa</th>
                            <th width="30">Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($schedules as $key => $schedule)
                            <tr>
                                <td>{{ $schedule->getId() }}</td>
                                <td>
                                    <a href="#">{{ $schedule->getTime() }}</a>
                                </td>
                                <td>
                                    <a href="#">{{ $schedule->getPlacement() }}</a>
                                </td>
                                <td>
                                    <a href="#">{{ $schedule->getAddress() }}</a>
                                </td>
                                <td>{!! makeEditButton(route('admin.trip.schedule.edit', [$trip->getId(), $schedule->getId()])) !!}</td>
                                <td>{!! makeDeleteButton(route('admin.trip.schedule.delete', [$trip->getId(), $schedule->getId()])) !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop

@section('scripts')

    <script>

    </script>
@stop