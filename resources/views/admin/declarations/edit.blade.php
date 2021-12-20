@include('admin.layouts.header')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin thân nhân
                    <small>Cập nhật</small>
                </h1>
                <input type="hidden" id="id" value="{{ $declaration->id }}" />
                <div class="form-group">
                    <label for="identity_card">Chứng minh nhân dân: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Nhập chứng minh nhân dân" id="identity_card" name="identity_card" value="{{ $declaration->identity_card }}">
                </div>
                <div class="form-group">
                    <label for="name">Họ và tên: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Nhập họ và tên" id="name" name="name" value="{{ $declaration->name }}">
                </div>
                <div class="form-group">
                    <label for="birthday">Ngày sinh <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="birthday" name="birthday" max="{{ date('Y-m-d') }}" value="{{ $declaration->birthday }}">
                </div>
                <div class="form-group">
                    <label for="sex">Giới tính: <span class="text-danger">*</span></label>
                    <select class="form-control" name="sex" id="sex">
                        <option value="0" {{ $declaration->sex == 0 ? 'selected' : '' }}>Nam</option>
                        <option value="1" {{ $declaration->sex == 1 ? 'selected' : '' }}>Nữ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="country">Quê quán: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Nhập quê quán" id="country" name="country" value="{{ $declaration->country }}">
                </div>
                <div class="form-group">
                    <label for="permanent_address">Địa chỉ thường trú: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Nhập địa chỉ thường trú" id="permanent_address" name="permanent_address" value="{{ $declaration->permanent_address }}">
                </div>
                <div class="form-group">
                    <label for="temporary_address">Địa chỉ tạm trú: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Nhập địa chỉ tạm trú" id="temporary_address" name="temporary_address" value="{{ $declaration->temporary_address }}">
                </div>
                <div class="form-group">
                    <label for="religion">Tôn giáo: <span class="text-danger">*</span></label>
                    <select class="form-control" name="religion" id="religion">
                        <option value="0" {{ $declaration->religion == 0 ? 'selected' : '' }}>Phật giáo</option>
                        <option value="1" {{ $declaration->religion == 1 ? 'selected' : '' }}>Thiên chúa giáo</option>
                        <option value="2" {{ $declaration->religion == 2 ? 'selected' : '' }}>Khác</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="education">Trình độ văn hóa: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Nhập trình độ văn hóa" id="education" name="education" value="{{ $declaration->education }}">
                </div>
                <div class="form-group">
                    <label for="job">Công việc hiện tại: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Nhập công việc hiện tại" id="job" name="job" value="{{ $declaration->job }}">
                </div>

                <button type="button" id="edit-declaration" class="btn btn-primary" style="margin-bottom:15px;">Cập nhật</button>
            </div>
        </div>
    </div>    
</div>