<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1">
    <meta name="description"  content="Family Investment Exchange" />
    <meta name="author" content="DAO">
    <meta name="keywords"  content="Family Investment Exchange" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon.png')}}">
    <title>Family Investment Exchange | Member Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/dashboard/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('assets/dashboard/member/css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('assets/dashboard/member/css/colors/blue.css')}}" id="theme" rel="stylesheet">
    <link href="{{asset('assets/dashboard/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/dashboard/plugins/toast-master/css/jquery.toast.css')}}" rel="stylesheet">

    @yield('member-css')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<style type="text/css">
.sidebar-nav>ul>li>a.active {
    background: #e5eeff;
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

@font-face {
   font-family: Shrikhand;
   src: url({{asset('assets/dashboard/member/font/Shrikhand-Regular.ttf')}});
}

.navbar-brand{
    font-family: Shrikhand;
    color: white !important;
}

@media (max-width: 479px){
    .navbar-brand{
        font-size: 15px;
    }
}
.jq-icon-info {
  background-color: #1e88e5;
  color: #ffffff; }
</style>

<body class="fix-header card-no-border logo-center">
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
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{url('/member')}}">
                        <!-- Logo icon -->
                        <!-- <b>Family Investment Exchange</b> -->
                        Family Investment Exchange
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item"> 
                            <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi-close mdi-menu mdi"></i>
                            </a> 
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li> -->

                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('assets/dashboard/profile/propic/'.Auth::user()->propic)}}" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="{{asset('assets/dashboard/profile/propic/'.Auth::user()->propic)}}" alt="user"></div>
                                            <div class="u-text">
                                                <h4>{{Auth::user()->fName}} {{Auth::user()->lName}}</h4>
                                                <p class="text-muted">{{Auth::user()->email}}</p><a href="{{route('member.profile')}}" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                        </div>
                                    </li>
                                    <!-- <li role="separator" class="divider"></li> -->
                                    <!-- <li><a href="{{route('member.profile')}}"><i class="ti-user"></i> My Profile</a></li> -->
                                    <!-- <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li> -->
                                    <!-- <li><a href="#"><i class="ti-email"></i> Inbox</a></li> -->
                                    <!-- <li role="separator" class="divider"></li> -->
                                    <!-- <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li> -->
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">PERSONAL</li>
                        <li> 
                            <a class="waves-effect waves-dark" href="{{route('member.dashboard')}}" aria-expanded="false">
                                <i class="mdi mdi-gauge"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                        <li> 
                            <a class="waves-effect waves-dark" href="{{route('member.refer-member-view')}}" aria-expanded="false">
                                <i class="mdi mdi-share-variant"></i>
                                <span class="hide-menu">Refer A Family</span>
                            </a>
                        </li>

                        <li> 
                            <a class="waves-effect waves-dark" href="{{route('member.submit-opportunity')}}" aria-expanded="false">
                                <i class="mdi mdi-plus-box"></i>
                                <span class="hide-menu">Submit A Co-Investment Opportunity</span>
                            </a>
                        </li>

                        <li> 
                            <a class="waves-effect waves-dark" href="{{route('member.verified-opportunity')}}" aria-expanded="false">
                                <i class="mdi mdi-verified"></i>
                                <span class="hide-menu">FIVE Network Matched Opportunities</span>
                            </a>
                        </li>

                        <li> 
                            <a class="waves-effect waves-dark" href="{{route('member.dealroom')}}" aria-expanded="false">
                                <i class="mdi mdi-file-multiple"></i>
                                <span class="hide-menu">Deal Room</span>
                            </a>
                        </li>

                        <li> 
                            <a class="waves-effect waves-dark" href="{{route('member.profile')}}" aria-expanded="false">
                                <i class="mdi mdi-account-circle"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>

                        <li> 
                            <a class="waves-effect waves-dark" href="{{route('member.faq')}}" aria-expanded="false">
                                <i class="mdi mdi-comment-question-outline"></i>
                                <span class="hide-menu">FAQ</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            @yield('member-content')
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <!-- <div class="row text-center">
                <div class="col-md-12">
                    <h1>Are you available to spend your 1 minute time to improve our portal?</h1>
                    <h3>Please put your valuable recommendation</h3>
                    <button class="btn btn-info">Leave a feedback</button>
                </div>
            </div> -->
            <footer class="footer">

                © {{date('Y')}} Family Investment Exchange. All Rights Reserved. &nbsp;&nbsp;
                <button class="btn btn-outline-info" data-toggle="modal" data-target="#feedback-modal">Give us your feedback</button>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>

    <div id="feedback-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-white">Feedback Request</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                      <i class="fa fa-file-text-o fa-4x mb-3 animated rotateIn text-info"></i>
                      <p>
                        <strong>Your feedback</strong>
                      </p>
                      <p>Are you available to spend your 1 minute time to improve our portal?
                        <strong></strong>Please put your valuable recommendation.
                      </p>
                    </div>
                    <hr>
                    <form class="floating-labels m-t-40">
                        <h4></h4>
                        <div class="form-group m-b-5">
                            <label for="message-text">Your message</label>
                            <span class="bar"></span>
                            <textarea class="form-control" id="message-text" rows="4"></textarea>
                        </div>
                        <span style='color:red;display: none;' id='error1'>This field is required.</span>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info waves-effect waves-light" id="feedback-send-btn">SEND <i class="fa fa-paper-plane"></i></button>
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>

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
    <script src="{{asset('assets/dashboard/member/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('assets/dashboard/member/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('assets/dashboard/member/js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{asset('assets/dashboard/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- Sweet-Alert  -->
    <script src="{{asset('assets/dashboard/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/sweetalert/jquery.sweet-alert.custom.js')}}"></script>

    <!--Toastr Alert -->

    <script src="{{asset('assets/dashboard/plugins/toast-master/js/jquery.toast.js')}}"></script>

    <!--Custom JavaScript -->
    <script src="{{asset('assets/dashboard/member/js/custom.min.js')}}"></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script> -->
    <script type="text/javascript" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
    <!-- ============================================================== -->

    <!-- <script src="{{asset('assets/dashboard/plugins/session-timeout/jquery.sessionTimeout.min.js')}}"></script> -->
    <!-- <script src="{{asset('assets/dashboard/plugins/session-timeout/session-timeout-init.js')}}"></script> -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/dashboard/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
<!--     <script type="text/javascript">
        var SessionTimeout = function() {
            var i = function() {
                $.sessionTimeout({
                    title: "Session Timeout Notification",
                    message: "Your session is expiring soon.",
                    redirUrl: "{{route('login')}}",
                    logoutUrl: "{{route('login')}}",
                    keepAlive: false,
                    warnAfter: 11e4,
                    redirAfter: 12e4,
                    ignoreUserActivity: !0,
                    countdownMessage: "Redirecting in {timer} seconds.",
                    countdownBar: !0
                })
            };
            return {
                init: function() {
                    i()
                }
            }
        }();
        jQuery(document).ready(function() {
            SessionTimeout.init()
        });
    </script> -->
    <script type="text/javascript">

        $(document).on("click","#feedback-send-btn", function(){
            if($("#message-text").val() == ''){
                $("#error1").show();
            }else{
                $("#error1").hide();
                $.ajax({
                    url: '{{route('member.feedback')}}',
                    type: 'POST',
                    data: {
                        '_token' : '{{csrf_token()}}',
                        'feedback' : $("#message-text").val()
                    },
                    dataType: 'html',
                    success: function (data) {
                        $("#feedback-modal").modal('hide');
                        $("#message-text").val('');
                       data= jQuery.parseJSON(data);
                        if(data['status']=='ok'){
                            $.toast({
                                heading: 'Thank you for your feedback.',
                                text: 'We have sent your feedback to the FIVE Network support team.',
                                position: 'bottom-right',
                                loaderBg:'#ff6849',
                                icon: 'info',
                                hideAfter: 3000, 
                                stack: 6
                              });
                        }else{
                            $("#feedback-modal").modal('hide');
                            $.toast({
                                heading: 'There was an error while sending your feedback.',
                                text: 'Please try again later.',
                                position: 'bottom-right',
                                loaderBg:'#ff6849',
                                icon: 'warning',
                                hideAfter: 3000, 
                                stack: 6
                              });
                        }
                    },
                    error: function () {
                        $("#feedback-modal").modal('hide');
                        $.toast({
                            heading: 'Something went wrong.',
                            text: 'Please try again later.',
                            position: 'bottom-right',
                            loaderBg:'#ff6849',
                            icon: 'warning',
                            hideAfter: 3000, 
                            stack: 6
                          });
                    }
                });
            }
        });
    </script>
    @yield('member-js')
</body>

</html>
