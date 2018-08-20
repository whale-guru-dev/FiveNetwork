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
    <title>Family Investment Exchange | Admin Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/dashboard/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('assets/dashboard/admin/css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('assets/dashboard/admin/css/colors/blue-dark.css')}}" id="theme" rel="stylesheet">
    <link href="{{asset('assets/dashboard/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css">
    @yield('admin-css')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<style type="text/css">
    #sidebarnav li span{
        color: white;
    }

    .sidebar-nav ul li ul li a{
        color: white;
    }

    .card {
        color: white;
    }
    .card h5 a, h6, p{
        color: white;
    }

    .sidebar-nav > ul > li > a {
        background: #272c33 !important;
    }

</style>

<body class="fix-header card-no-border">
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
                    <a class="navbar-brand" href="{{url('admin/')}}">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="{{asset('logo.png')}}" width="128" height="40" alt="homepage" class="dark-logo" /> -->
                            <!-- Light Logo icon -->
                            <!-- <img src="{{asset('logo.png')}}" width="128" height="40" alt="homepage" class="light-logo" /> -->
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                             <!-- dark Logo text -->
                            <!-- <img src="{{asset('logo.png')}}" width="128" height="40" alt="homepage" class="dark-logo" /> -->
                             <!-- Light Logo text -->    
                            <img src="{{asset('logo.png')}}" width="128" height="56" class="light-logo" alt="homepage" />
                        </span> 
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
                        <!-- This is  -->
                        <li class="nav-item"> 
                            <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i>
                            </a> 
                        </li>
                        <li class="nav-item m-l-10"> 
                            <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i>
                            </a> 
                        </li>
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{asset('assets/dashboard/profile/propic/'.Auth::user()->propic)}}" alt="user" class="profile-pic" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img">
                                                <img src="{{asset('assets/dashboard/profile/propic/'.Auth::user()->propic)}}" alt="user">
                                            </div>
                                            <div class="u-text">
                                                <h4>{{Auth::user()->fName.' '.Auth::user()->lName}}</h4>
                                                <p class="text-muted">{{Auth::user()->email}}</p>
                                                <a href="{{route('admin.staff-account')}}" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{route('admin.staff-account')}}"><i class="ti-user"></i> My Profile</a></li>
                                    <!-- <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li> -->
                                    <!-- <li><a href="#"><i class="ti-email"></i> Inbox</a></li> -->
                                    <!-- <li role="separator" class="divider"></li> -->
                                    <!-- <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li> -->
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{url('admin/logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
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
                <!-- User profile -->
                <div class="user-profile" style="background: url({{asset('assets/dashboard/images/background/user-info.jpg')}}) no-repeat;">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="{{asset('assets/dashboard/profile/propic/'.Auth::user()->propic)}}" alt="user" /> </div>
                    <!-- User profile text-->
                    <div class="profile-text"> 
                        <!-- <a href="#" class="dropdown-toggle link u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Markarn Doe <span class="caret"></span>
                        </a> -->
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> 
                            <a class="waves-effect waves-dark" href="{{route('admin.dashboard')}}">
                                <i class="mdi mdi-gauge"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                        <li> 
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                <i class="mdi mdi-widgets"></i>
                                <span class="hide-menu">Membership</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="{{route('admin.allow-apply-membership')}}">Access Requested 
                                    @if(App\Model\Preregister::where('allowed', 0)->count()>0)
                                    <span class="label label-rounded label-danger" id="num-requested">
                                    {{App\Model\Preregister::where('allowed', 0)->count()}}
                                    </span>
                                    @endif
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('admin.check-membership')}}">Pending Membership Applications 
                                        @if(App\User::where('is_allowed', 0)->count()>0)
                                        <span class="label label-rounded label-danger" id="num-requested">
                                        {{App\User::where('is_allowed', 0)->count()}}
                                        </span>
                                        @endif
                                    </a>
                                </li>
                                <li><a href="{{route('admin.remove.member')}}">Remove Member</a></li>
                                <li><a href="{{route('admin.removed.member')}}">Removed Members</a></li>
                                <li><a href="{{route('admin.check.membership')}}">Membership Database</a></li>
                            </ul>
                        </li>

                        <li> 
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                <i class="mdi mdi-book-open"></i>
                                <span class="hide-menu">Opportunity</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('admin.check-request-opportunity')}}">Approve Co-Investment Opportunity 
                                    @if(App\Model\MemberRequestOpportunity::where('is_accepted', 0)->count()>0)
                                    <span class="label label-rounded label-danger" id="num-requested">
                                    {{App\Model\MemberRequestOpportunity::where('is_accepted', 0)->count()}}
                                    </span>
                                    @endif</a></li>
                                <li><a href="{{route('admin.check-allrequest-opportunity')}}">Co-Investment Database</a></li>
                                <li><a href="{{route('admin.opportunity-analytics')}}">Opportunity Analytics</a></li>
                                <li><a href="{{route('admin.check-investment-questionnaire')}}">Approve Deal Room Opportunity 
                                    @if((App\Model\MemberSimpleOpportunity::where('is_allowed', 0)->count() + App\Model\InvestmentQuestionnaire::where('is_allowed', 0)->where('is_upload_deal', 1)->where('is_completed', 1)->count())>0)
                                    <span class="label label-rounded label-danger" id="num-requested">
                                    {{App\Model\MemberSimpleOpportunity::where('is_allowed', 0)->count() + App\Model\InvestmentQuestionnaire::where('is_allowed', 0)->where('is_upload_deal', 1)->where('is_completed', 1)->count()}}
                                    </span>
                                    @endif</a></li>
                                <li><a href="{{route('admin.check-all-investment-questionnaire')}}">Deal Room opportunity Database</a></li>
                                <li><a href="{{route('admin.dealroom-analytics')}}">Deal Room opportunity Analytics</a></li>
                            </ul>
                        </li>

                        <li>
                            <a  href="{{route('admin.check-feedback')}}" aria-expanded="false">
                                <i class="mdi mdi-comment-text"></i>
                                <span class="hide-menu">Feedback</span>
                            </a>
                        </li>

                        <li>
                            <a  href="{{route('admin.edit-faq-view')}}" aria-expanded="false">
                                <i class="icon-question"></i>
                                <span class="hide-menu">Faq</span>
                            </a>
                        </li>

                        

                        <li> 
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                <i class="mdi mdi-account-key"></i>
                                <span class="hide-menu">Staff</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                @if(Auth::user()->role == 1)
                                <li><a href="{{route('admin.staff-management')}}">Management</a></li>
                                @endif
                                <li><a href="{{route('admin.staff-account')}}">Account Setting</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <!-- End Bottom points-->
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
            @yield('admin-content')
            
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © 2018 Admin Panel For Five Network
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
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

    @yield('admin-js')
    <script type="text/javascript">
        $(document).on("click","#back-btn",function(e){
            e.preventDefault();
            window.history.back();
        });
    </script>
</body>

</html>
