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
</head>

<body>
    @include('sweetalert::alert')
    <div id="wrapper">
        @include('admin.layouts.header')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thông tin thân nhân
                            <small>Thêm</small>
                        </h1>
                        <div class="form-group">
                            <label for="identity_card">Chứng minh nhân dân: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Nhập chứng minh nhân dân" id="identity_card" name="identity_card">
                        </div>
                        <div class="form-group">
                            <label for="name">Họ và tên: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Nhập họ và tên" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="birthday">Ngày sinh <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="birthday" name="birthday" max="{{ date('Y-m-d') }}">
                        </div>
                        <div class="form-group">
                            <label for="sex">Giới tính: <span class="text-danger">*</span></label>
                            <select class="form-control" name="sex" id="sex">
                                <option value="0">Nam</option>
                                <option value="1">Nữ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="country">Quê quán: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Nhập quê quán" id="country" name="country">
                        </div>
                        <div class="form-group">
                            <label for="permanent_address">Địa chỉ thường trú: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Nhập địa chỉ thường trú" id="permanent_address" name="permanent_address">
                        </div>
                        <div class="form-group">
                            <label for="temporary_address">Địa chỉ tạm trú: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Nhập địa chỉ tạm trú" id="temporary_address" name="temporary_address">
                        </div>
                        <div class="form-group">
                            <label for="religion">Tôn giáo: <span class="text-danger">*</span></label>
                            <select class="form-control" name="religion" id="religion">
                                <option value="0">Phật giáo</option>
                                <option value="1">Thiên chúa giáo</option>
                                <option value="2">Khác</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="education">Trình độ văn hóa: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Nhập trình độ văn hóa" id="education" name="education">
                        </div>
                        <div class="form-group">
                            <label for="job">Công việc hiện tại: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Nhập công việc hiện tại" id="job" name="job">
                        </div>
        
                        <button type="button" id="add-declaration" class="btn btn-primary" style="margin-bottom:15px;">Thêm</button>
                    </div>
                </div>
            </div>    
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/1.1.3/metisMenu.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('admin/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/ajax.js') }}"></script>
</html>
