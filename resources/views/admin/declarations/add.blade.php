<div class="modal fade" id="add-declaration" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Thông tin thân nhân
                                <small>Thêm</small>
                            </h1>
                            <form id="form-declaration">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name">Họ và tên: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Nhập họ và tên" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="identity_card">Chứng minh nhân dân: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Nhập chứng minh nhân dân" id="identity_card" name="identity_card">
                                </div>
                                <div class="form-group">
                                    <label for="birthday">Ngày sinh <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="birthday" name="birthday" max="{{ date('Y-m-d') }}">
                                </div>
                                <div class="form-group">
                                    <label for="sex">Giới tính: <span class="text-danger">*</span></label>
                                    <select class="form-control" name="sex" id="sex">
                                        <option value="0">Nam</option>
                                        <option value="1">Nữ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="country">Quê quán: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Nhập quê quán" id="country" name="country">
                                </div>
                                <div class="form-group">
                                    <label for="permanent_address">Địa chỉ thường trú: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Nhập địa chỉ thường trú" id="permanent_address" name="permanent_address">
                                </div>
                                <div class="form-group">
                                    <label for="temporary_address">Địa chỉ tạm trú: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Nhập địa chỉ tạm trú" id="temporary_address" name="temporary_address">
                                </div>
                                <div class="form-group">
                                    <label for="religion">Tôn giáo: <span class="text-danger">*</span></label>
                                    <select class="form-control" name="religion" id="religion">
                                        <option value="0">Phật giáo</option>
                                        <option value="1">Thiên chúa giáo</option>
                                        <option value="2">Khác</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="education">Trình độ văn hóa: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Nhập trình độ văn hóa" id="education" name="education">
                                </div>
                                <div class="form-group">
                                    <label for="job">Công việc hiện tại: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Nhập công việc hiện tại" id="job" name="job">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="button-modal-add-declaration">Thêm</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#button-modal-add-declaration').click(function() {
                var name = $('#add-declaration #name').val();
                var identity_card = $('#add-declaration #identity_card').val();
                var birthday = $('#add-declaration #birthday').val();
                var sex = $('#add-declaration #sex').val();
                var country = $('#add-declaration #country').val();
                var permanent_address = $('#add-declaration #permanent_address').val();
                var temporary_address = $('#add-declaration #temporary_address').val();
                var religion = $('#add-declaration #religion').val();
                var education = $('#add-declaration #education').val();
                var job = $('#add-declaration #job').val();
                var message = '';

                if (name == '') {
                    message = 'Họ tên không được để trống';
                }

                if (identity_card == '') {
                    message = 'Chứng minh nhân dân không được để trống';
                }

                if (birthday == '') {
                    message = 'Ngày sinh không được để trống';
                }

                if (sex == '') {
                    message = 'Giới tính không được để trống';
                }

                if (country == '') {
                    message = 'Quê quán không được để trống';
                }

                if (permanent_address == '') {
                    message = 'Địa chỉ thường trú không được để trống';
                }

                if (temporary_address == '') {
                    message = 'Địa chỉ tạm trú không được để trống';
                }

                if (religion == '') {
                    message = 'Tôn giáo không được để trống';
                }

                if (education == '') {
                    message = 'Trình độ văn hóa không được để trống';
                }

                if (job == '') {
                    message = 'Công việc không được để trống';
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
                        url: '{{ route('api.declaration.add') }}',
                        type: 'POST',
                        data: {
                            name: name,
                            identity_card: identity_card,
                            birthday: birthday,
                            sex: sex,
                            country: country,
                            permanent_address: permanent_address,
                            temporary_address: temporary_address,
                            religion: religion,
                            education: education,
                            job: job,
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
                                $('#add-declaration').modal('hide');
                                $('#dataTables-declaration').DataTable().ajax.reload();

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
