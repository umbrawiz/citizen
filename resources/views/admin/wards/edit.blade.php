<div class="modal fade" id="edit-ward" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Thông tin Xã/Phường
                                <small>Sửa</small>
                            </h1>
                            <form id="form-admin">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="identity_card">Tên: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Nhập tên" id="name"
                                        name="name">
                                </div>
                                <div class="form-group">
                                    <label for="name">Mã: <span class="text-danger">*</span></label>
                                    <input type="text"  class="form-control" placeholder="Nhập mã" id="code"
                                        name="code" maxlength="10">
                                </div>
                                <input type="hidden" name="id">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="button-modal-edit-ward">Sửa</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {

            $('#button-modal-edit-ward').click(function() {
                var name = $('#edit-ward input[name="name"]').val();
                var code = $('#edit-ward input[name="code"]').val();
                var id = $('#edit-ward input[name="id"]').val();
                var message = '';

                if (name == '') {
                    message = 'Tên không được để trống';
                }
                if (code == '') {
                    message = 'Mã không được để trống';
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
                        url: '{{ route('api.ward.update') }}',
                        type: 'PUT',
                        data: {
                            name: name,
                            code: code,
                            id: id,
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
                                $('#edit-ward').modal('hide');
                                $('#dataTables-ward').DataTable().ajax.reload();

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
