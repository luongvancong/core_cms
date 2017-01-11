@extends('admin/layouts/master')

@section('main-content')
    <section class="panel">
        <header class="panel-heading">
            <h4>
                Danh sách đăng ký nhận tư vấn
            </h4>
        </header>
        <div class="panel-body">
            <div class="adv-table">
                <div class="dataTables_wrapper">
                    <table class="display table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Thông tin khách</th>
                                <th>Nội dung</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscribers as $key => $item)
                                <tr>
                                    <td>
                                        <table class="table">
                                            <tr>
                                                <td>Họ và tên</td>
                                                <td>{{ $item->getName() }}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>{{ $item->getEmail() }}</td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td>{{ $item->getPhone() }}</td>
                                            </tr>
                                            <tr>
                                                <td>Địa chỉ</td>
                                                <td>{{ $item->getAddress() }}</td>
                                            </tr>
                                            <tr>
                                                <td>Hạng mục</td>
                                                <td>{{ $item->presenter()->getCategory() }}</td>
                                            </tr>
                                            <tr>
                                                <td>Ngày tạo</td>
                                                <td>{{ $item->updated_at }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>{{ $item->getContent() }}</td>
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