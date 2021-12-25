<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @if (isset($data[0]['village_name']))
                <h1 class="page-header">{{ $data[0]['village_name'] }}
                    <small>Thống kê</small>
                </h1>
            @endif
        </div>
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="dataTables-show-village">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Họ tên</th>
                    <th>Chứng minh nhân dân</th>
                    <th>Ngày sinh</th>
                    <th>Giới tính</th>
                    <th>Quê quán</th>
                    <th>Địa chỉ thường trú</th>
                    <th>Địa chỉ tạm trú</th>
                    <th>Tôn giáo</th>
                    <th>Trình độ văn hóa</th>
                    <th>Công việc</th>
                </tr>
            </thead>
            <tbody align="center">
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->identity_card }}</td>
                        <td>{{ $item->birthday }}</td>
                        <td>{{ $item->sex == 0 ? 'Nam' : 'Nữ' }}</td>
                        <td>{{ $item->country }}</td>
                        <td>{{ $item->permanent_address }}</td>
                        <td>{{ $item->temporary_address }}</td>
                        <td>{{ $item->religion == 0 ? 'Phật giáo' : ($item->religion == 1 ? 'Thiên chúa giáo' : 'Khác') }}</td>
                        <td>{{ $item->education }}</td>
                        <td>{{ $item->job }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
