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
    <div class="container">
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
              <div class="card-body">
                <h5 class="card-title text-center">Đăng nhập</h5>
                <form id="form-login">
                  <div class="form-label-group">
                    <input type="text" id="username" class="form-control" placeholder="Tài khoản" name="username" autofocus>
                    <label for="username">Tài khoản</label>
                  </div>

                  <div class="form-label-group">
                    <input type="password" id="password" class="form-control" placeholder="Mật khẩu" name="password">
                    <label for="password">Mật khẩu</label>
                  </div>
                  <button class="btn btn-lg btn-block text-uppercase text-white" style="background:#fc9d3d;" id="btn-login" type="button">Đăng nhập</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('admin/js/ajax.js') }}"></script>
</body>
</html>
