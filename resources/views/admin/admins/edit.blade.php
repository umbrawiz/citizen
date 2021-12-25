<div class="modal fade" id="edit-admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Thông tin người dùng
                                <small>Sửa</small>
                            </h1>
                            <form id="form-admin">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="identity_card">Tên: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Nhập username" id="username"
                                        name="username">
                                </div>
                                <div class="form-group">
                                    <label for="name">Quyền khai báo: <span class="text-danger">*</span></label>
                                    <select name="is_declaration" id="is_declaration" class="form-control">
                                        <option value="1">Được khai báo</option>
                                        <option value="0">Khóa khai báo</option>
                                    </select>
                                </div>
                                <input type="hidden" name="id">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="button-modal-edit-admin">Sửa</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {

            $('#button-modal-edit-admin').click(function() {
                var username = $('#edit-admin input[name=username]').val();
                var id = $('#edit-admin input[name=id]').val();
                var is_declaration = $('#edit-admin #is_declaration').val();
                var message = '';
                if (username == '') {
                    message = 'Tên không được để trống';
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
                        url: '{{ route('api.admin.update') }}',
                        type: 'PUT',
                        data: {
                            username: username,
                            id: id,
                            is_declaration: is_declaration,
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
                                $('#edit-admin').modal('hide');
                                $('#dataTables-admin').DataTable().ajax.reload();

                            } else {
                                Swal.fire(
                                    'Lỗi',
                                    data.message,
                                    'error'
                                )
                            }
                        },
                        error: function(data) {
                            Swal.fire(
                                'Lỗi',
                                data.message,
                                'error'
                            )
                        }
                    });
                }
            });
        });
    </script>
