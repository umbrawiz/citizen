<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $declaration->name }}</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .text-white {
            color: #fff !important;
        }

        .ui-bg-overlay-container,
        .ui-bg-video-container {
            position: relative;
        }

        .ui-bg-cover {
            background-color: #00b5ec;
            background-position: center center;
            background-size: cover;
        }

        .ui-bg-overlay-container .ui-bg-overlay {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            display: block;
        }

        .bg-dark {
            background-color: rgba(24, 28, 33, 0.9) !important;
        }

        .opacity-50 {
            opacity: .5 !important;
        }

        .bg-dark {
            background-color: rgba(24, 28, 33, 0.9) !important;
        }

        .ui-bg-overlay-container>*,
        .ui-bg-video-container>* {
            position: relative;
        }

        @media (min-width: 992px) {

            .container,
            .container-fluid {
                padding-right: 2rem;
                padding-left: 2rem;
            }
        }

        .media,
        .media>:not(.media-body),
        .jumbotron,
        .card {
            -ms-flex-negative: 1;
            flex-shrink: 1;
        }

        .d-flex,
        .d-inline-flex,
        .media,
        .media>:not(.media-body),
        .jumbotron,
        .card {
            -ms-flex-negative: 1;
            flex-shrink: 1;
        }

        .ui-w-100 {
            width: 100px !important;
            height: auto;
        }

        .font-weight-bold {
            font-weight: 700 !important;
        }

        .opacity-75 {
            opacity: .75 !important;
        }

        .tabs-alt.nav-tabs .nav-link.active,
        .tabs-alt.nav-tabs .nav-link.active:hover,
        .tabs-alt.nav-tabs .nav-link.active:focus,
        .tabs-alt>.nav-tabs .nav-link.active,
        .tabs-alt>.nav-tabs .nav-link.active:hover,
        .tabs-alt>.nav-tabs .nav-link.active:focus {
            -webkit-box-shadow: 0 -2px 0 #26B4FF inset;
            box-shadow: 0 -2px 0 #26B4FF inset;
        }

        .nav-tabs:not(.nav-fill):not(.nav-justified) .nav-link,
        .nav-pills:not(.nav-fill):not(.nav-justified) .nav-link {
            margin-right: .125rem;
        }

        .nav-tabs.tabs-alt .nav-link,
        .tabs-alt>.nav-tabs .nav-link {
            border-width: 0 !important;
            border-radius: 0 !important;
            background-color: transparent !important;
        }

        .nav-tabs .nav-link.active {
            border-bottom-color: #fff;
        }

        @media print {
            #printPageButton {
                display: none;
            }

            #returnDeclaration {
                display: none;
            }
        }

    </style>
</head>

<body>
    <div class="ui-bg-cover ui-bg-overlay-container text-white">
        <div class="ui-bg-overlay bg-dark opacity-50"></div>
        <div class="container">
            <div class="d-flex justify-content-between align-items-center pt-4">
                <div>
                    <a href="{{ route('declaration.index') }}" id="returnDeclaration" class="btn btn-primary btn-sm">
                        Trở lại
                    </a>
                </div>
                <div>
                    <a href="javascript:void(0)" id="printPageButton" class="btn btn-success btn-sm" onclick="window.print()">
                        In pdf
                    </a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="text-center py-5">
                <div class="col-md-12 col-lg-12 col-xl-12 p-0 mx-auto">
                    <h4 class="font-weight-bold my-4">{{ $declaration->name }}</h4>
                    <div class="opacity-75 mb-4">Chứng minh nhân dân: {{ $declaration->identity_card }}</div>
                    <div class="opacity-75 mb-4">Ngày sinh: {{ $declaration->birthday }}</div>
                    <div class="opacity-75 mb-4">Giới tính: {{ $declaration->sex == 0 ? 'Nam' : 'Nữ' }}</div>
                    <div class="opacity-75 mb-4">Quê quán: {{ $declaration->country }}</div>
                    <div class="opacity-75 mb-4">Địa chỉ thường trú: {{ $declaration->permanent_address }}</div>
                    <div class="opacity-75 mb-4">Địa chỉ tạm trú: {{ $declaration->temporary_address }}</div>
                    <div class="opacity-75 mb-4">Tôn giáo: {{ $declaration->religion == 0 ? 'Phật giáo' : ($declaration->religion == 1 ? 'Thiên chúa giáo' : 'Khác') }}</div>
                    <div class="opacity-75 mb-4">Trình độ văn hóa: {{ $declaration->education }}</div>
                    <div class="opacity-75 mb-4">Công việc: {{ $declaration->job }}</div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
