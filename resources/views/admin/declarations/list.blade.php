@include('admin.layouts.header')   
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin thân nhân
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Chứng minh nhân dân</th>
                        <th>Họ và tên</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Quê quán</th>
                        <th>Địa chỉ thường trú</th>
                        <th>Địa chỉ tạm trú</th>
                        <th>Tôn giáo</th>
                        <th>Trình độ văn hóa</th>
                        <th>Công việc hiện tại</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody align="center">
                    @php $count = 1; @endphp
                    @foreach ($declarations as $declaration)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $declaration->identity_card }}</td>
                            <td>{{ $declaration->name }}</td>
                            <td>{{ date('d/m/Y', strtotime($declaration->birthday)) }}</td>
                            <td>{{ $declaration->sex == 0 ? 'Nam' : 'Nữ' }}</td>
                            <td>{{ $declaration->country }}</td>
                            <td>{{ $declaration->permanent_address }}</td>
                            <td>{{ $declaration->temporary_address }}</td>
                            <td>{{ $declaration->religion == 0 ? 'Phật giáo' : ($declaration->religion == 1 ? 'Thiên chúa giáo' : 'Khác') }}</td>
                            <td>{{ $declaration->education }}</td>
                            <td>{{ $declaration->job }}</td>
                            <td>
                                <a href="javascript:void(0)" onclick="deleteDeclaration({{ $declaration->id }});" class="btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    <a href="javascript:void(0)" onclick="showFormEditDeclaration({{ $declaration->id }})" style="margin:0 1rem;" class="btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @php $count++; @endphp
                        @endforeach
                    </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>