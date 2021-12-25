<div class="modal fade" id="edit-village" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Thông tin Thôn/Bản
                                <small>Sửa</small>
                            </h1>
                            <form id="form-admin">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="identity_card">Tên: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Nhập tên" id="name"
                                        name="name">
                                </div>
                                <input type="hidden" name="id">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="button-modal-edit-village">Sửa</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {

            $('#button-modal-edit-village').click(function() {
                var name = $('#edit-village input[name="name"]').val();
                var id = $('#edit-village input[name="id"]').val();
                var message = '';

                if (name == '') {
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
                        url: '{{ route('api.village.update') }}',
                        type: 'PUT',
                        data: {
                            name: name,
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
                                $('#edit-village').modal('hide');
                                $('#dataTables-village').DataTable().ajax.reload();

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
