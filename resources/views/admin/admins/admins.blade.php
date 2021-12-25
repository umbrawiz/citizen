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
                        <h1 class="page-header">Thông tin người dùng
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <button data-toggle="modal" data-target="#add-admin" class="btn-success"><i class="fa fa-plus"
                            aria-hidden="true"></i></button>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-admin">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Loại</th>
                                <th>Quyền khai báo</th>
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
            @include('admin.admins.add')
        </div>

        {{-- Modal Edit --}}
        <div>
            @include('admin.admins.edit')
        </div>

    </div>

    <script type="text/javascript" src="{{ asset('admin/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/ajax.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#dataTables-admin').DataTable({

                ajax: {
                    'headers': {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Authorization': 'Bearer ' + localStorage.getItem('token')
                    },
                    'url': '{{ route('api.admin.index') }}',
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'type',
                        name: 'type'
                    },
                    {
                        data: 'is_declaration',
                        name: 'is_declaration'
                    },
                    {
                        data: "id",
                        render: function(id) {
                            const user = JSON.parse(localStorage.getItem('user'));

                            if (user.id != id) {
                                return `
                                <button data-id="${id}" id="button-edit-admin" data-toggle="modal" data-target="#edit-admin" class="btn-primary">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </button>
                                <button data-id="${id}" id="button-delete-admin" class="btn-danger">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </button>
                            `;
                            } else {
                                return ``;
                            }
                        }
                    },
                ],
                "aaSorting": []
            });

            $("#wrapper").on('click', '#button-edit-admin', function() {

                const id = $(this).data('id');

                $.ajax({
                    url: '{{ route('api.admin.edit') }}',
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
                            $('#edit-admin input[name="username"]').val(response.data.username);
                            $(`select[name^="is_declaration"] option[value=${response.data.is_declaration}]`).attr("selected","selected");
                            $('#edit-admin input[name="id"]').val(id);
                        }
                    }
                });
            });

            $("#wrapper").on('click', '#button-delete-admin', function() {
                const id = $(this).data('id');

                $.ajax({
                    url: '{{ route('api.admin.delete') }}',
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
                            $('#dataTables-admin').DataTable().ajax.reload();
                        }
                    }
                });
            });
        });
    </script>

</html>
