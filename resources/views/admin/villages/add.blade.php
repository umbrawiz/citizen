<div class="modal fade" id="add-village" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Thông tin Thôn/Bản
                                <small>Thêm</small>
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
                                    <input type="text" class="form-control" placeholder="Nhập mã" id="code"
                                        name="code">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="button-modal-add-village">Thêm</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#button-modal-add-village').click(function() {
                var name = $('#add-village #name').val();
                var code = $('#add-village #code').val();
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
                        url: '{{ route('api.village.add') }}',
                        type: 'POST',
                        data: {
                            name: name,
                            code: code,
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
                                $('#add-village').modal('hide');
                                $('#dataTables-village').DataTable().ajax.reload();

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
