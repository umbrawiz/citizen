<div class="modal fade" id="add-admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Thông tin người dùng
                                <small>Thêm</small>
                            </h1>
                            <form id="form-admin">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="username">Tên: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Nhập username" id="username"
                                        name="username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Mật khẩu: <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" placeholder="Nhập mật khảu" id="password"
                                        name="password">
                                </div>
                                <div class="form-group">
                                    <label for="repassword">Nhập lại mật khẩu: <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" placeholder="Nhập lại mật khảu"
                                        id="repassword" name="repassword">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="button-modal-add-admin">Thêm</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#button-modal-add-admin').click(function() {
                var username = $('#add-admin #username').val();
                var password = $('#add-admin #password').val();
                var repassword = $('#add-admin #repassword').val();
                var message = '';
                if (username == '') {
                    message = 'Tên không được để trống';
                }
                if (password == '') {
                    message = 'Mật khẩu không được để trống';
                }
                if (repassword == '') {
                    message = 'Nhập lại mật khẩu không được để trống';
                }
                if (password != repassword) {
                    message = 'Mật khẩu không trùng khớp';
                }

                if (message != '') {
                    Swal.fire(
                        'Lỗi',
                        message,
                        'error'
                    )
                    return false;
                } else {
                    $.ajax({
                        url: '{{ route('api.admin.add') }}',
                        type: 'POST',
                        data: {
                            username: username,
                            password: password,
                            repassword: repassword,
                            _token: '{{ csrf_token() }}'
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            'Authorization': 'Bearer ' + localStorage.getItem('token')
                        },
                        success: function(data) {
                            if (data.status == '200') {
                                Swal.fire(
                                    'Thành công',
                                    data.message,
                                    'success'
                                )
                                $('#add-admin').modal('hide');
                                // $('#dataTables-admin').DataTable().ajax.reload();
                                location.reload();

                            } else {
                                Swal.fire(
                                    'Lỗi',
                                    data.message,
                                    'error'
                                )
                            }
                        }
                    });
                }
            });
        });
    </script>
