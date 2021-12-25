<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tìm kiếm với tên
                <small>{{ $q }}</small>
            </h1>
        </div>
        <button data-toggle="modal" data-target="#add-declaration"><i class="fa fa-plus"
                aria-hidden="true"></i></button>
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="dataTables-search">
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
                    <th>Hành động</th>
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
                        <td>
                            <button data-id="{{ $item->id }}" id="button-edit-declaration" data-toggle="modal" data-target="#edit-declaration">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
                            <button data-id="{{ $item->id }}" id="button-delete-declaration">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
