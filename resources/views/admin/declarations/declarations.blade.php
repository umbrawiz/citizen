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
                        <h1 class="page-header">Thông tin thân nhân
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <button id="add-declaration" data-toggle="modal" data-target="#add-testdeclaration" class="btn-success"><i class="fa fa-plus"
                        aria-hidden="true"></i></button>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-declaration">
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

                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

        {{-- Modal Add --}}
        <div>
            @include('admin.declarations.add')
        </div>

        {{-- Modal Edit --}}
        <div></div>

    </div>

    <script type="text/javascript" src="{{ asset('admin/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/ajax.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#dataTables-declaration').DataTable({

                ajax: {
                    'headers': {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Authorization': 'Bearer ' + localStorage.getItem('token')
                    },
                    'url': '{{ route('api.declaration.index') }}',
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'identity_card',
                        name: 'identity_card'
                    },
                    {
                        data: 'birthday',
                        name: 'birthday'
                    },
                    {
                        data: 'sex',
                        name: 'sex'
                    },
                    {
                        data: 'country',
                        name: 'country'
                    },
                    {
                        data: 'permanent_address',
                        name: 'permanent_address'
                    },
                    {
                        data: 'temporary_address',
                        name: 'temporary_address'
                    },
                    {
                        data: 'religion',
                        name: 'religion'
                    },
                    {
                        data: 'education',
                        name: 'education'
                    },
                    {
                        data: 'job',
                        name: 'job'
                    },
                    {
                        data: "id",
                        render: function(id) {
                            const user = JSON.parse(localStorage.getItem('user'));

                            if (user.type == 'B1' || user.type == 'B2') {
                                if (user.type == 'B1') {
                                    return `
                                        <button data-id="${id}" id="button-edit-declaration" data-toggle="modal" data-target="#edit-declaration" class="btn-primary">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </button>
                                        <button data-id="${id}" id="button-delete-declaration" class="btn-danger">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                        <button data-id="${id}" id="button-print-declaration" class="btn-warning">
                                            <i class="fa fa-print" aria-hidden="true"></i>
                                        </button>
                                    `;
                                } else {
                                    return `
                                        <button data-id="${id}" id="button-edit-declaration" data-toggle="modal" data-target="#edit-declaration" class="btn-primary">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </button>
                                        <button data-id="${id}" id="button-delete-declaration" class="btn-danger">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </button>
                                    `;
                                }
                            } else {
                                // $('#add-declaration').hide();
                                return ``;
                            }
                        }
                    },
                ],
                "aaSorting": []
            });

            $("#wrapper").on('click', '#button-edit-declaration', function() {

                const id = $(this).data('id');

                $.ajax({
                    url: '{{ route('api.declaration.edit') }}',
                    type: 'GET',
                    data: {
                        id: id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Authorization': 'Bearer ' + localStorage.getItem('token')
                    },
                    success: function(response) {
                        if (response.status == '200') {
                            $('#edit-declaration input[name="name"]').val(response.data.name);
                            $('#edit-declaration input[name="identity_card"]').val(response.data.identity_card);
                            $('#edit-declaration input[name="birthday"]').val(response.data.birthday);
                            $('#edit-declaration input[name="country"]').val(response.data.country);
                            $('#edit-declaration input[name="permanent_address"]').val(response.data.permanent_address);
                            $('#edit-declaration input[name="temporary_address"]').val(response.data.temporary_address);
                            $('#edit-declaration input[name="education"]').val(response.data.education);
                            $('#edit-declaration input[name="job"]').val(response.data.job);
                            $('#edit-declaration input[name="id"]').val(id);
                            $(`select[name^="sex"] option[value=${response.data.sex}]`).attr("selected","selected");
                            $(`select[name^="religion"] option[value=${response.data.religion}]`).attr("selected","selected");
                        }
                    }
                });
            });

            $("#wrapper").on('click', '#button-delete-declaration', function() {
                const id = $(this).data('id');

                $.ajax({
                    url: '{{ route('api.declaration.delete') }}',
                    type: 'DELETE',
                    data: {
                        id: id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Authorization': 'Bearer ' + localStorage.getItem('token')
                    },
                    success: function(response) {
                        if (response.status == '200') {
                            $('#dataTables-declaration').DataTable().ajax.reload();
                        }
                    }
                });
            });

            $("#wrapper").on('click', '#button-print-declaration', function() {
                const id = $(this).data('id');

                $.ajax({
                    url: '{{ route('api.declaration.print') }}',
                    type: 'GET',
                    data: {
                        id: id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Authorization': 'Bearer ' + localStorage.getItem('token')
                    },
                    success: function(response) {
                        if (response.status == '200') {
                            window.history.pushState('', '', '/declaration/print?id='+id);
                            var new_element = document.open("text/html", "replace");
                            new_element.write(response.data);
                            new_element.close();
                        }
                    }
                });
            });
        });
    </script>

</html>
