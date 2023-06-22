<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>  société ASDA, ASSOCIATION DE SOUTIEN AUX DEFICIENTS AUDITIFS </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- CSS -->
    <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">

    <style>
        /* Custom styles */
        body {
            background: linear-gradient(to bottom, #f7f7f7, #ebebeb);
            font-family: 'Poppins', sans-serif;
        }

        .login-fancy-bg {
            background: linear-gradient(to bottom, #fff, #f7f7f7);
        }

        .login-fancy {
            background-image: url('your-image-url.jpg');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            width: 100%;
            height: 60vh;
        }

        .custom-input {
            border: 1px solid #ddd;
            border-radius: 3px;
            padding: 10px;
            width: 100%;
            font-size: 14px;
        }

        .custom-button {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        .custom-button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Preloader -->
        <div id="pre-loader">
            <img src="{{URL::asset('assets/images/pre-loader/loader-01.svg')}}" alt="">
        </div>

        <!-- Login -->
        <section class="height-100vh d-flex align-items-center page-section-ptb login">
            <div class="container">
                <div class="row justify-content-center no-gutters vertical-align">
                    <div class="col-lg-4 col-md-6 login-fancy-bg bg">
                        <div class="login-fancy"></div>
                    </div>
                    <div class="col-lg-4 col-md-6 bg-white">
                        <div class="login-fancy pb-40 clearfix">
                            <form method="POST" action="{{route('login')}}">
                                @csrf
                                <div class="section-field mb-20">
                                    <label class="mb-10" for="name">Email / البريدالالكتروني*</label>
                                    <input id="email" type="email" class="form-control custom-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="section-field mb-20">
                                    <label class="mb-10" for="Password">Password / كلمه السر*</label>
                                    <input id="password" type="password" class="form-control custom-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="section-field">
                                    <div class="remember-checkbox mb-30">
                                        <input type="checkbox" class="form-control" name="two" id="two" />
                                        <label for="two"> تذكرني</label>
                                        <br><br>
                                        <a href="#" class="float-right"> Mot de passe oublié / هل نسيت كلمة المرور</a>
                                    </div>
                                </div>  <br>
                                <button class="button custom-button"><span>دخول</span><i class="fa fa-check"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- jQuery -->
    <script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <!-- Plugins-jQuery -->
    <script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
    <!-- Plugin Path -->
    <script>
        var plugin_path = 'js/';
    </script>

    <!-- Chart -->
    <script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
    <!-- Calendar -->
    <script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
    <!-- Charts Sparkline -->
    <script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
    <!-- Charts Morris -->
    <script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
    <!-- Datepicker -->
    <script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
    <!-- Toastr -->
    @yield('js')
    <script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
    <!-- Validation -->
    <script src="{{ URL::asset('assets/js/validation.js') }}"></script>
    <!-- Lobilist -->
    <script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
    <!-- Custom -->
    <script src="{{ URL::asset('assets/js/custom.js') }}"></script>
</body>

</html>
