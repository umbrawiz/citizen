<div class="modal fade" id="add-province" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Thông tin Tỉnh/Thành Phố
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
                                        name="code" maxlength="2">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="button-modal-add-province">Thêm</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#button-modal-add-province').click(function() {
                var name = $('#add-province #name').val();
                var code = $('#add-province #code').val();
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
                        url: '{{ route('api.province.add') }}',
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
                                $('#add-province').modal('hide');
                                // $('#dataTables-province').DataTable().ajax.reload();
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
