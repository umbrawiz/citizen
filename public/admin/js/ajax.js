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
                            localStorage.setItem('token', response.data.access_token);
                            localStorage.setItem('user', response.data.user);
                            swal({ title: 'Đăng nhập thành công', type: 'success' });
                            $.ajax({
                                url: '/api/declaration/render',
                                type: 'GET',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                    'Authorization': 'Bearer ' + response.data.access_token
                                },
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
                        localStorage.setItem('token', response.data.access_token);
                        localStorage.setItem('user', response.data.user);
                        swal({ title: 'Đăng nhập thành công', type: 'success' });
                        $.ajax({
                            url: '/api/declaration/render',
                            type: 'GET',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                'Authorization': 'Bearer ' + response.data.access_token
                            },
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
});
// Form declaration
function showListDeclaration() {
    $.ajax({
        url: '/api/declaration/render',
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': 'Bearer ' + localStorage.getItem('token')
        },
        success: function(response) {
            if(response.status == 200) {
                window.history.pushState('', '', '/declarations');
                $('#wrapper').html(response.data);
            }
        }
    });
}

// Form Admin
function showListAdmin() {
    $.ajax({
        url: '/api/admin/render',
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': 'Bearer ' + localStorage.getItem('token')
        },
        success: function(response) {
            if(response.status == 200) {
                window.history.pushState('', '', '/admins');
                $('#wrapper').html(response.data);
            }
        }
    });
}

// Form Province
function showListProvince() {
    $.ajax({
        url: '/api/province/render',
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': 'Bearer ' + localStorage.getItem('token')
        },
        success: function(response) {
            if(response.status == 200) {
                window.history.pushState('', '', '/provinces');
                $('#wrapper').html(response.data);
            }
        }
    });
}

// Form District
function showListDistrict() {
    $.ajax({
        url: '/api/district/render',
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': 'Bearer ' + localStorage.getItem('token')
        },
        success: function(response) {
            if(response.status == 200) {
                window.history.pushState('', '', '/districts');
                $('#wrapper').html(response.data);
            }
        }
    });
}

// Form Ward
function showListWard() {
    $.ajax({
        url: '/api/ward/render',
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': 'Bearer ' + localStorage.getItem('token')
        },
        success: function(response) {
            if(response.status == 200) {
                window.history.pushState('', '', '/wards');
                $('#wrapper').html(response.data);
            }
        }
    });
}

// Form Village
function showListVillage() {
    $.ajax({
        url: '/api/village/render',
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': 'Bearer ' + localStorage.getItem('token')
        },
        success: function(response) {
            if(response.status == 200) {
                window.history.pushState('', '', '/villages');
                $('#wrapper').html(response.data);
            }
        }
    });
}

// Report city
function showReportProvince() {
    $.ajax({
        url: '/api/report-province/render',
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': 'Bearer ' + localStorage.getItem('token')
        },
        success: function(response) {
            if(response.status == 200) {
                window.history.pushState('', '', '/report-province');
                $('#wrapper').html(response.data);
            }
        }
    });
}

// Report district
function showReportDistrict() {
    $.ajax({
        url: '/api/report-district/render',
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': 'Bearer ' + localStorage.getItem('token')
        },
        success: function(response) {
            if(response.status == 200) {
                window.history.pushState('', '', '/report-district');
                $('#wrapper').html(response.data);
            }
        }
    });
}

// Report ward
function showReportWard() {
    $.ajax({
        url: '/api/report-ward/render',
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': 'Bearer ' + localStorage.getItem('token')
        },
        success: function(response) {
            if(response.status == 200) {
                window.history.pushState('', '', '/report-ward');
                $('#wrapper').html(response.data);
            }
        }
    });
}

// Report village
function showReportVillage() {
    $.ajax({
        url: '/api/report-village/render',
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization': 'Bearer ' + localStorage.getItem('token')
        },
        success: function(response) {
            if(response.status == 200) {
                window.history.pushState('', '', '/report-village');
                $('#wrapper').html(response.data);
            }
        }
    });
}
