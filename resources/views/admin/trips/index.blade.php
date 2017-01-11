@extends('admin/layouts/master')

@section('main-content')
    <section class="panel">
        <header class="panel-heading">
            <h4>
                Danh sách chuyến xe
                <a href="{{ route('admin.trip.create') }}" class="btn btn-xs btn-primary pull-right"><i class="fa fa-plus"></i> {{ trans('form.btn.create') }}</a>
            </h4>
        </header>
        <div class="panel-body">
            <div class="adv-table">
                <div class="dataTables_wrapper">
                    <form method="get" action="" class="form-filter form-inline" style="margin-bottom:20px; position: relative;">
                        <select name="start_place" class="form-control input-sm" title="Chọn điểm đi">
                            <option value="">Chọn điểm đi</option>
                            @foreach(city_get_city_options() as $key => $value)
                            <option value="{{ $key }}" {{ $key == Request::get('start_place') ? 'selected="selected"' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                        <select name="end_place" class="form-control input-sm" title="Chọn điểm đến">
                            <option value="">Chọn điểm đến</option>
                            @foreach(city_get_city_options() as $key => $value)
                            <option value="{{ $key }}" {{ $key == Request::get('end_place') ? 'selected="selected"' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                        <input name="start_address" value="{{ Request::get('start_address') }}" placeholder="Địa chỉ điểm đi" title="Địa chỉ điểm đi" class="form-control input-sm" type="text">
                        <input name="end_address" value="{{ Request::get('end_address') }}" placeholder="Địa chỉ điểm đến" title="Địa chỉ điểm đến" class="form-control input-sm" type="text">
                        <input name="price" value="{{ Request::get('price') }}" placeholder="Giá vé" title="Giá vé" class="form-control input-sm" type="text">
                        <input name="num_ticket" value="{{ Request::get('num_ticket') }}" placeholder="Số lượng vé" title="Số lượng vé" class="form-control input-sm" type="text">
                        <input name="start_date" value="{{ Request::get('start_date') }}" type="text" placeholder="Thời gian từ" title="Thời gian từ" class="form-control input-sm mg-t-5 dtpk" />
                        <input name="end_date" value="{{ Request::get('end_date') }}" type="text" placeholder="đến" title="đến" class="form-control input-sm mg-t-5 dtpk" />
                        <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-search"></i> {{ trans('form.btn.search') }}</button>
                    </form>
                    <table class="display table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Điểm đi/Điểm đến</th>
                            <th>Địa chỉ đi/Địa chỉ đến</th>
                            <th>Giá vé/Khuyến mãi</th>
                            <th>Số lượng vé</th>
                            <th>Thời gian</th>
                            {{-- <th>Lịch trình</th> --}}
                            {{-- <th>Ảnh</th> --}}
                            <th width="30">Atv</th>
                            <th width="30">Sửa</th>
                            <th width="30">Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($trips as $key => $trip)
                            <tr>
                                <td width="50">{{ $trip->getId() }}</td>
                                <td>
                                    <div>
                                        <p>Điểm đi: {{ $trip->start_place_name }}</p>
                                        <p>Điểm đến: {{ $trip->end_place_name }}</p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <p>Địa chỉ đi: {{ $trip->getStartAddress() }}</p>
                                        <p>Địa chỉ đến: {{ $trip->getEndAddress() }}</p>
                                    </div>
                                </td>
                                <td>{{ $trip->presenter()->getPrice() }}/{{ $trip->presenter()->getSalePrice() }}</td>
                                <td>
                                    {{ $trip->getNumTicket() }}
                                </td>
                                <td>
                                    <div>
                                        <p>Giờ khởi hành: {{ $trip->getStartDate() }} </p>
                                        <p>Giờ khởi hành: {{ $trip->getEndDate() }} </p>
                                    </div>
                                </td>
                                {{-- <td>
                                    <a href="{{ route('admin.trip.schedule', $trip->getId()) }}" class="btn btn-xs btn-primary">Lịch trình</a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.trip.images', $trip->getId()) }}" class="btn btn-info btn-xs">{{ $trip->images()->count() }} Ảnh</a>
                                </td> --}}
                                <td>{!! makeActiveButton(route('admin.trip.active', $trip->getId()), $trip->getActive()) !!}</td>
                                <td>{!! makeEditButton(route('admin.trip.edit', $trip->getId())) !!}</td>
                                <td>{!! makeDeleteButton(route('admin.trip.delete', $trip->getId())) !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $trips->links() !!}
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(function() {
            $('.dtpk').datepicker({
                locale: 'vi',
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
@stop




