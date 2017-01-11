@extends('admin/layouts/master')

@section('main-content')
    <section class="panel">
        <header class="panel-heading">
            <h4>
                Danh sách đăng ký nhận brochure
            </h4>
        </header>
        <div class="panel-body">
            <div class="adv-table">
                <div class="dataTables_wrapper">
                    <table class="display table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Brochure</th>
                                <th>Ngày tạo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscribers as $key => $item)
                                <tr>
                                    <td width="50">{{ $item->getName() }}</td>
                                    <td>
                                        {{ $item->getEmail() }}
                                    </td>
                                    <td>
                                        {{ $item->getPhone() }}
                                    </td>
                                    <td>
                                        {{ $item->getAddress() }}
                                    </td>
                                    <td>
                                        {{ $item->presenter()->getBrochure() }}
                                    </td>
                                    <td>{{ $item->updated_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @include('admin/partials/paginate', ['data' => $subscribers, 'appended' => Request::all()])
                </div>
            </div>
        </div>
    </section>
@stop

@section('scripts')
<script>

</script>
@stop