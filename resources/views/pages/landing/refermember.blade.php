<?php
if(!isset($user))
  $user = '';
?>
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

    <title>Family Investment Exchange | Refer A Member</title>

    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon.png')}}">

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/dashboard/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('assets/dashboard/member/css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('assets/dashboard/member/css/colors/blue-dark.css')}}" id="theme" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/member/css/custom.css')}}"> -->

    <link href="{{asset('assets/dashboard/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<![endif]-->
</head>
<style type="text/css">
    .login-register{
        position: relative;
    }

    img.background {
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0px;
        top: 0px;
        -webkit-filter: sepia(0.7);    
        filter: sepia(0.7);
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
                <img src="{{asset('assets/landing/img/background.jpg')}}" class="background">
            </div>
            <div class="row text-center">
                <a href="{{url('/')}}"  id="logo-box"><img src="{{asset('logo.png')}}" width="250" height="200"></a>
            </div>
            <div class="card login-box">
                <div class="card-body">
                    <h4 class="card-title">Refer A Member</h4>
                    <h6 class="card-subtitle">invite 5 other high impact families for priority access to the FIVE network portal</h6>
                    <form class="form p-t-20" method="POST" action="{{url('/refermember')}}">
                      @csrf
                        <div class="form-group">
                            <label for="email1">Referral 1 Email Address *</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-email"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control" id="email1" name="email[]" placeholder="Enter email" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email2">Referral 2 Email Address</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-email"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control" id="email2" name="email[]" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email3">Referral 3 Email Address</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-email"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control" id="email3" name="email[]" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email4">Referral 4 Email Address</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-email"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control" id="email4" name="email[]" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email5">Referral 5 Email Address</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-email"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control" id="email5" name="email[]" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="referred">Referred By</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-email"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control" id="referred" name="refer_by" readonly="" value="{{$user->email}}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info waves-effect waves-light m-r-10" <?php if($user->submitted == 1) echo "disabled";?>>Submit</button>
                        <a href="{{url('/')}}" class="btn btn-inverse waves-effect waves-light">Go Back !</a>
                    </form>
                </div>
            </div>
        </div>
        <!-- <div id="particles-js" style="background-color: #2164fb;min-height: 100%;"></div> -->
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

    <!--Custom JavaScript -->
    <script src="{{asset('assets/dashboard/admin/js/custom.min.js')}}"></script>
    
    <script src="{{asset('assets/dashboard/admin/js/sidebarmenu.js')}}"></script>

    <script src="{{asset('assets/dashboard/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- Sweet-Alert  -->
    <script src="{{asset('assets/dashboard/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/sweetalert/jquery.sweet-alert.custom.js')}}"></script>
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <!-- <script src="{{asset('assets/dashboard/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script> -->
    <!-- <script src="{{asset('assets/dashboard/member/js/particles.js')}}"></script>
    <script type="text/javascript">
        particlesJS.load('particles-js', "{{asset('assets/dashboard/member/particles.json')}}", function() {});
    </script> -->
    <script type="text/javascript">
      $.SweetAlert.init();
    </script>
    @if(Session::get('msg'))
    <script type="text/javascript">
      swal({   
            title: "{{Session::get('msg')[0]}}",   
            text: "{{Session::get('msg')[1]}}",   
            type: "{{Session::get('msg')[2]}}",   
            showCancelButton: false,   
            confirmButtonColor:"#1e88e5",
            confirmButtonText: "OK!",   
            closeOnConfirm: false 
        }, function(){   
            window.location.href = "{{url('/')}}";
        });
    </script>
    @endif
</body>

</html>