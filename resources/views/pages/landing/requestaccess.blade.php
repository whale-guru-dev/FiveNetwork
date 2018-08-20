<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1">
    <meta name="description"  content="Family Investment Exchange" />
    <meta name="author" content="DAO">
    <meta name="keywords"  content="Family Investment Exchange" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Family Investment Exchange | Login</title>

    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon.png')}}">

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/dashboard/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('assets/dashboard/member/css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('assets/dashboard/member/css/colors/blue-dark.css')}}" id="theme" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>

    <link href="{{asset('assets/dashboard/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/member/css/custom.css')}}">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<![endif]-->
</head>
<style type="text/css">

    img.background {
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0px;
        top: 0px;
        -webkit-filter: sepia(0.7);    
        filter: sepia(0.7);
    }
    @media (max-width: 767px){
        .login-register {
            position: fixed;
            overflow: hidden;
        }
    }

    #logo-box{
        margin: 0 auto;
        z-index: 1;
    }

    .sweet-alert {
        background-color: white;
    } 

    .sweet-alert h2 {
        color: #575757;
    }
    .sweet-alert p {
        color: #797979;
    }
    .sweet-alert .sa-icon.sa-success::before, .sweet-alert .sa-icon.sa-success::after {
        background: white;
    }

    .sweet-alert .sa-icon.sa-success .sa-fix {
        background-color: white; 
    }

    #logo-img {
        width: 250px;
      }
</style>
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register">
            <div>
                <img src="{{asset('assets/landing/img/intro-bg.jpg')}}" class="background">
            </div>
            <div class="row text-center">
                <a href="{{url('/')}}"  id="logo-box"><img src="{{asset('landing-logo.png')}}" id="logo-img"></a>
            </div>
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('requestaccess') }}" aria-label="{{ __('Request Access') }}">
                        @csrf
                        <h3 class="box-title m-b-20">{{ __('Request Access') }}</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" type="email" type="text" required placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" autofocus> 

                                @if ($errors->has('email'))
                                    <br><br>
                                    <div class="alert alert-danger">{{ $errors->first('email') == 'The email has already been taken.' ? 'This email has previously been used to request access.' : $errors->first('email') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">{{ __('Submit') }}</button>
                            </div>
                            <br><br>
                            <div class="col-xs-12">
                                Already A Member?
                                <a class="" href="{{url('/login')}}">
                                    {{ __('Login') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- <div id="particles-js" style="background-color: #2164fb;height: 100vh;"></div> -->
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/dashboard/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('assets/dashboard/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('assets/dashboard/admin/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('assets/dashboard/admin/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('assets/dashboard/admin/js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{asset('assets/dashboard/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- Sweet-Alert  -->
    <script src="{{asset('assets/dashboard/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/sweetalert/jquery.sweet-alert.custom.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('assets/dashboard/admin/js/custom.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/dashboard/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>

    <!-- <script src="{{asset('assets/dashboard/member/js/particles.js')}}"></script>
    <script type="text/javascript">
        particlesJS.load('particles-js', "{{asset('assets/dashboard/member/particles.json')}}", function() {});
    </script> -->

    @if(Session::get('msg'))
    <script type="text/javascript">
      swal({   
            title: "{{Session::get('msg')[0]}}",   
            text: "{{Session::get('msg')[1]}}",   
            type: "{{Session::get('msg')[2]}}",   
            showCancelButton: false,   
            confirmButtonColor:"#1e88e5",
            confirmButtonText: "OK",   
            closeOnConfirm: false 
        }, function(){   
            window.location.href = "{{route('home')}}";
        });
    </script>
    @endif
</body>

</html>