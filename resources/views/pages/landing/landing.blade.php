<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1">
    <meta name="description"  content="Family Investment Exchange" />
    <meta name="author" content="DAO">
    <meta name="keywords"  content="Family Investment Exchange" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Family Investment Exchange</title>

    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon.png')}}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/landing/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{asset('assets/landing/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{asset('assets/landing/css/grayscale.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/landing/css/style.css')}}">
    <style type="text/css">
      #logo-img-loading {
        width: 250px;
      }
    </style>
  </head>

  <body id="page-top">
    <div id="loading">
      <div id="loading-center">
        <!-- <div> -->
          <img src="{{asset('landing-logo.png')}}"  id="logo-img-loading" >
        <!-- </div> -->
        <div id="loading-center-absolute">
          <div class="object"></div>
          <div class="object"></div>
          <div class="object"></div>
          <div class="object"></div>
          <div class="object"></div>
          <div class="object"></div>
          <div class="object"></div>
          <div class="object"></div>
          <div class="object"></div>
          <div class="object"></div>
          <div class="object"></div>
        </div>
      </div>
    </div>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
          <img src="{{asset('landing-logo.png')}}"  id="logo-img">
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{route('request-access')}}">Request Access</a>
            </li>

            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{route('login')}}">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Intro Header -->
    <header class="masthead">
      <!-- <div>
        <img src="{{asset('assets/landing/img/intro-bg.jpg')}}" class="background">
      </div> -->
      <div class="intro-body">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 mx-auto">
              <h1 class="brand-heading">Family Investment Exchange</h1>
              <p class="intro-text typewrite" data-period="2000" data-type='["Connecting Like-Minded Family Offices to World Class Investment Opportunities." ]'>Connecting Like-Minded Family Offices to World Class Investment Opportunities.</p>
            </div>
          </div> 
        </div>
      </div>
    </header>

    <!-- Footer -->
    <!-- <footer>
      <div class="container text-center">
        <p>Copyright &copy; Your Website 2018</p>
      </div>
    </footer>
 -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('assets/landing/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/landing/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{asset('assets/landing/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script> -->

    <!-- Custom scripts for this template -->
    <script src="{{asset('assets/landing/js/grayscale.min.js')}}"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#loading").delay(2000).fadeOut(500);

        // $("#loading").fadeOut(1000);

      })
    </script>
  </body>

</html>
