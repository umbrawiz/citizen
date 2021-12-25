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
    <div id="wrapper">
        @include('admin.layouts.header')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Xã/Phường
                            <small>Thống kê</small>
                        </h1>
                        <h3 id="total-village"></h3>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-ward">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Xã/Phường</th>
                                <th>Mã Xã/Phường</th>
                                <th>Số dân</th>
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
    </div>

    <script type="text/javascript" src="{{ asset('admin/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/ajax.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $.ajax({
                url: '{{ route('api.sum.declaration.ward') }}',
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                },
                success: function(response) {
                    if (response.status == '200') {
                        $('#total-village').text('Tổng số dân là: ' + response.data);
                    }
                }
            });
            
            $('#dataTables-ward').DataTable({

                ajax: {
                    'headers': {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Authorization': 'Bearer ' + localStorage.getItem('token')
                    },
                    'url': '{{ route('api.report.ward') }}',
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
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'declarations_count',
                        name: 'declarations_count'
                    },
                    {
                        data: "code",
                        render: function(code) {
                            return `
                                <button data-code="${code}" id="button-show-ward">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                            `;
                        }
                    },
                ],
                "aaSorting": []
            });

            $("#wrapper").on('click', '#button-show-ward', function() {

                const code = $(this).data('code');

                $.ajax({
                    url: '{{ route('api.show.declaration.ward') }}',
                    type: 'GET',
                    data: {
                        code: code
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Authorization': 'Bearer ' + localStorage.getItem('token')
                    },
                    success: function(response) {
                        if (response.status == '200') {
                            window.history.pushState('', '', '/show-ward?code='+code);
                            $('#page-wrapper').html(response.data);
                            $('#dataTables-show-ward').DataTable();
                        }
                    }
                });
            });
        });
    </script>

</html>
