$(document).ready(function () {
    // Login
    $('#form-login').keypress(function (e) {
        var key = e.which;
        if(key == 13)  // the enter key code
        {
            var username = $("#username").val();
            var password = $("#password").val();
            if (username != "" && password != "") {
                $.ajax({
                    url: '/api/login',
                    type: 'POST',
                    data: {
                        'username' : username,
                        'password' : password
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if(response.status == 200) {
                            swal({ title: 'Đăng nhập thành công', type: 'success' });
                            $.ajax({
                                url: '/api/declarations',
                                type: 'GET',
                                success: function(response) {
                                    if(response.status == 200) { 
                                        window.history.pushState('', '', '/declarations');
                                        var new_element = document.open("text/html", "replace");
                                        new_element.write(response.data);
                                        new_element.close();
                                    }
                                }
                            });
                        } else {
                            swal({ title: 'Tài khoản/mật khẩu không đúng', type: 'error' });
                        }
                    }
                });
            } else {
                swal({ title: 'Tài khoản/mật khẩu không được để trống', type: 'error' });
            }
        }
    });   
    $("#btn-login").click(function () {
        var username = $("#username").val();
        var password = $("#password").val();
        if (username != "" && password != "") {
            $.ajax({
                url: '/api/login',
                type: 'POST',
                data: {
                    'username' : username,
                    'password' : password
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if(response.status == 200) {
                        swal({ title: 'Đăng nhập thành công', type: 'success' });
                        $.ajax({
                            url: '/api/declarations',
                            type: 'GET',
                            success: function(response) {
                                if(response.status == 200) { 
                                    window.history.pushState('', '', '/declarations');
                                    var new_element = document.open("text/html", "replace");
                                    new_element.write(response.data);
                                    new_element.close();
                                }
                            }
                        });
                    } else {
                        swal({ title: 'Tài khoản/mật khẩu không đúng', type: 'error' });
                    }
                }
            });
        } else {
            swal({ title: 'Tài khoản/mật khẩu không được để trống', type: 'error' });
        }
    });
    // CRUD declaration
    // Add
    $("#wrapper").on('click','#add-declaration',function () {
        var identity_card = $("#identity_card").val();
        var name = $("#name").val();
        var birthday = $("#birthday").val();
        var sex = $("#sex").val();
        var country = $("#country").val();
        var permanent_address = $("#permanent_address").val();
        var temporary_address = $("#temporary_address").val();
        var religion = $("#religion").val();
        var education = $("#education").val();
        var job = $("#job").val();
        if (identity_card != "" && name != "" && birthday != "" && sex != "" && country != "" && permanent_address != "" && temporary_address != "" && education != "" && job != "") {
            $.ajax({
                url: '/api/declaration',
                type: 'POST',
                data: {
                    'identity_card' : identity_card,
                    'name' : name,
                    'birthday': birthday,
                    'sex': sex,
                    'country': country,
                    'permanent_address': permanent_address,
                    'temporary_address': temporary_address,
                    'religion': religion,
                    'education': education,
                    'job': job
                },
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');
        
                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                success: function(response) {
                    if(response.status == 200) {
                        swal({ title: 'Thêm thành công', type: 'success' });
                        $('#wrapper').html(response.data);
                        $('#dataTables-example').DataTable({
                            responsive: true
                        });
                        window.history.pushState('', '', '/declarations');
                    } else {
                        swal({ title: 'Thêm thất bại', type: 'error' });
                    }
                }
            });
        } else {
            swal({ title: 'Vui lòng điền đầy đủ thông tin', type: 'error' });
        }
    });
    // Edit
    $("#wrapper").on('click','#edit-declaration',function () {
        var id = $("#id").val();
        var identity_card = $("#identity_card").val();
        var name = $("#name").val();
        var birthday = $("#birthday").val();
        var sex = $("#sex").val();
        var country = $("#country").val();
        var permanent_address = $("#permanent_address").val();
        var temporary_address = $("#temporary_address").val();
        var religion = $("#religion").val();
        var education = $("#education").val();
        var job = $("#job").val();
        if (identity_card != "" && name != "" && birthday != "" && sex != "" && country != "" && permanent_address != "" && temporary_address != "" && education != "" && job != "") {
            $.ajax({
                url: '/api/declarations/id/'+id,
                type: 'PUT',
                data: {
                    'identity_card' : identity_card,
                    'name' : name,
                    'birthday': birthday,
                    'sex': sex,
                    'country': country,
                    'permanent_address': permanent_address,
                    'temporary_address': temporary_address,
                    'religion': religion,
                    'education': education,
                    'job': job
                },
                beforeSend: function (xhr) {
                    var token = $('meta[name="csrf-token"]').attr('content');
        
                    if (token) {
                          return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                success: function(response) {
                    if(response.status == 200) {
                        swal({ title: 'Cập nhật thành công', type: 'success' });
                        $('#wrapper').html(response.data);
                        $('#dataTables-example').DataTable({
                            responsive: true
                        });
                        window.history.pushState('', '', '/declarations');
                    } else {
                        swal({ title: 'Cập nhật thất bại', type: 'error' });
                    }
                }
            });
        } else {
            swal({ title: 'Vui lòng điền đầy đủ thông tin', type: 'error' });
        }
    });
    // ======================================================================
});
// Form declaration
function showListDeclaration() {
    $.ajax({
        url: '/api/declarations',
        type: 'GET',
        success: function(response) {
            if(response.status == 200) {
                window.history.pushState('', '', '/declarations');
                $('#wrapper').html(response.data);
            }
        }
    });
}

function showFormAddDeclaration() {
    $.ajax({
        url: '/api/declaration/add',
        type: 'GET',
        success: function(response) {
            if(response.status == 200) {
                window.history.pushState('', '', '/declarations/add');
                $('#wrapper').html(response.data);
            }
        }
    });
}

function showFormEditDeclaration(id) {
    $.ajax({
        url: '/api/declaration/edit/id/' + id,
        type: 'GET',
        success: function(response) {
            if(response.status == 200) {
                window.history.pushState('', '', '/declarations/edit/id/'+id);
                $('#wrapper').html(response.data);
            }
        }
    });
}

function deleteDeclaration(id) {
    $.ajax({
        url: '/api/declarations/id/' + id,
        type: 'DELETE',
        beforeSend: function (xhr) {
            var token = $('meta[name="csrf-token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
        success: function(response) {
            if(response.status == 200) {
                swal({ title: 'Xóa thành công', type: 'success' });
                $('#wrapper').html(response.data);
                $('#dataTables-example').DataTable({
                    responsive: true
                });
                window.history.pushState('', '', '/declarations');
            } else {
                swal({ title: 'Xóa thất bại', type: 'error' });
            }
        }
    });
}

// ===========================================================