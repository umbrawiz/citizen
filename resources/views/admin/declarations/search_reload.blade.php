<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" type="image/png" href="{{ URL::to('/') }}/favicon.ico" />
    <title>CitizenV</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/1.1.3/metisMenu.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}" media="all" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/1.1.3/metisMenu.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
</head>

<body>
    @include('sweetalert::alert')
    <div id="wrapper">
        @include('admin.layouts.header')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tìm kiếm với tên
                            <small>{{ $q }}</small>
                        </h1>
                    </div>
                    <button data-toggle="modal" data-target="#add-declaration" class="btn-success"><i class="fa fa-plus"
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
                                        <button data-id="{{ $item->id }}" id="button-edit-declaration" data-toggle="modal" data-target="#edit-testdeclaration" class="btn-primary">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </button>
                                        <button data-id="{{ $item->id }}" id="button-delete-declaration" class="btn-danger">
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
        </div>
        <!-- /.container-fluid -->
        {{-- Modal Add --}}
        <div>
            @include('admin.declarations.add')
        </div>

        {{-- Modal Edit --}}
        <div>
            @include('admin.declarations.edit')
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('admin/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/ajax.js') }}"></script>
    <script>
        $('#dataTables-search').DataTable({
            responsive: true
        });
    </script>
</html>
