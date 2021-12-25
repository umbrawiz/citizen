<div class="modal fade" id="edit-district" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Thông tin Tỉnh/Thành Phố
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
                    <button type="button" class="btn btn-primary" id="button-modal-edit-district">Sửa</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {

            $('#button-modal-edit-district').click(function() {
                var name = $('#edit-district input[name="name"]').val();
                var code = $('#edit-district input[name="code"]').val();
                var id = $('#edit-district input[name="id"]').val();
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
                        url: '{{ route('api.district.update') }}',
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
                                $('#edit-district').modal('hide');
                                $('#dataTables-district').DataTable().ajax.reload();

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
