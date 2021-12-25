<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Đăng nhập</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Css -->
    <link rel="stylesheet" href="{{asset('admin/css/login.css')}}" media="all" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ URL::to('/') }}/favicon.ico" />
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
</head>
<body>
    @include('sweetalert::alert')
    <section class="vh-100">
      <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid"
              alt="Sample image">
          </div>
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form id="form-login">
              <h3 class="text-center text-secondary">CITIZENV</h3>
              <!-- Username input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="username">Tài khoản</label>
                <input type="text" class="form-control form-control-lg"
                  placeholder="Tài khoản" id="username" name="username" />
              </div>
    
              <!-- Password input -->
              <div class="form-outline mb-3">
                <label class="form-label" for="password">Mật khẩu</label>
                <input type="password" class="form-control form-control-lg"
                  placeholder="Mật khẩu" id="password" name="password"/>
              </div>
    
              <div class="text-center text-lg-start mt-4 pt-2">
                <button type="button" class="btn btn-primary btn-lg"
                  style="padding-left: 2.5rem; padding-right: 2.5rem;" id="btn-login">Đăng nhập</button>
              </div>
    
            </form>
          </div>
        </div>
      </div>
      <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
          Bản quyền nội dung thuộc sở hữu của bộ y tế. Ghi rõ nguồn khi chia sẻ dưới mọi hình thức.
        </div>
        <!-- Copyright -->
      </div>
    </section>
    <script type="text/javascript" src="{{ asset('admin/js/ajax.js') }}"></script>
</body>
</html>
