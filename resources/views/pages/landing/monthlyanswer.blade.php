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

    <title>Family Investment Exchange | Monthly Question</title>

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
            <div class="card login-box">
                <div class="card-body">
                    <h4 class="card-title">Monthly Question</h4>
                    <h6 class="card-subtitle">In an effort to keep track of activity of investment opportunities in the FIVE Network platform please take a moment to answer the following questions.</h6>
                    <form class="form p-t-20" method="POST" action="{{route('answer-monthly-email')}}">
                      @csrf
                        <input type="hidden" name="memberid" value="{{$memberid}}">
                        <input type="hidden" name="code" value="{{$code}}">
                        <input type="hidden" name="year" value="{{$year}}">
                        <input type="hidden" name="month" value="{{$month}}">

                        <div class="form-group">
                            <label for="bsubmitted">Have you submitted an investment opportunity to the FIVE Network this month ?</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-package"></i>
                                    </span>
                                </div>
                                <select name="bsubmitted" class="form-control " id="bsubmitted" required>
                                    <option value="" selected>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>

                        <div id="submitted-div" style="display: none;">
                            <div class="form-group">
                                <label for="bfindinvestor">Did you find co-investors through the platform ?</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-pin"></i>
                                        </span>
                                    </div>
                                    <select name="bfindinvestor" class="form-control" id="bfindinvestor">
                                        <option value="" selected>Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="investor">Who was the co-investor ?</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-user"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="investor" id="investor" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="capital">How much capital was invested by co-investors ?</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-money"></i>
                                        </span>
                                    </div>
                                    <input type="number" name="capital" id="capital" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="largetransaction">How large was the total transaction ?</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-layout-grid2"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="largetransaction" id="largetransaction" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="binvested">Have you co-invested in an investment opportunity you saw through the FIVE Network ?</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-package"></i>
                                    </span>
                                </div>
                                <select name="binvested" class="form-control " id="binvested" required>
                                    <option value="" selected>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>

                        <div id="invested-div" style="display: none;">
                            <div class="form-group">
                                <label for="investor1">Who was the co-investor ?</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-user"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="investor1" id="investor1" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="capital1">How much capital was invested by co-investors ?</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-money"></i>
                                        </span>
                                    </div>
                                    <input type="number" name="capital1" id="capital1" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="largetransacton1">How large was the total transaction ?</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ti-layout-grid2"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="largetransacton1" id="largetransacton1" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nopportunity">How many opportunities have you seen this month through the FIVE Network ?</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-eye"></i>
                                    </span>
                                </div>
                                <input type="number" name="nopportunity" id="nopportunity" class="form-control " required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="feedback">What feedback or changes would you like to see to the FIVE Network platform ?</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-star"></i>
                                    </span>
                                </div>
                                <textarea name="feedback" id="feedback" class="form-control " cols="3" required></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-info waves-effect waves-light m-r-10 form-control" style="color: white;">Submit</button>
                        </div>
                        
                    
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
        $( "#bsubmitted" ).change(function() {
            if($( "#bsubmitted" ).val() == 1)
                $("#submitted-div").show();
            else $("#submitted-div").hide();
        });

        $( "#binvested" ).change(function() {
            if($( "#binvested" ).val() == 1)
                $("#invested-div").show();
            else $("#invested-div").hide();
        });
    </script>

    @if(Session::get('msg'))
        @if(Session::get('msg')[0] == 'Error')
        <script type="text/javascript">
          swal({   
                title: "{{Session::get('msg')[0]}}",   
                text: "{{Session::get('msg')[1]}}",   
                type: "{{Session::get('msg')[2]}}",   
                showCancelButton: false,   
                confirmButtonColor:"#1e88e5",
                confirmButtonText: "OK!",   
                closeOnConfirm: false 
            });
        </script>
        @else
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
                window.location.href = "{{route('home')}}";
            });
        </script>
        @endif
    @endif
</body>

</html>