@extends('layouts.member')
@section('member-css')
<link href="{{asset('assets/dashboard/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
<link href="{{asset('assets/dashboard/plugins/footable/css/footable.core.css')}}" rel="stylesheet">
<link href="{{asset('assets/dashboard/plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
<style type="text/css">
    .jvectormap-marker{
        r:2;
        fill: #1ba7ff;
        fill-opacity:1;
        stroke: #0080ff;
        stroke-width : 1;
        stroke-opacity: 1;
        animation: pulse 1.5s 2;
    }

    @-webkit-keyframes pulse {
      0% {
        r:0;fill-opacity:1;
      }
      50% {
        r:5;fill-opacity:0.5;
      }
      100% {
        r:0;fill:transparent;fill-opacity:0;
      }

    }
    @keyframes pulse {
      0% {
        r:0;fill-opacity:1;
      }
      50% {
        r:5;fill-opacity:0.5;
      }
      100% {
        r:0;fill:transparent;fill-opacity:0;
      }
    }

    #link-board a{
        white-space: normal;
    }

    .card .box h6{
        font-size: 12px;
    }
      
</style>
@endsection


@section('member-content')
<?php $i=1;?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-4 align-self-center">
        <h3 class="text-themecolor">Dashboard</h3>
    </div>

    <div class="col-md-4 align-self-center text-center">
        <!-- <div class="row text-center"> -->
            <img src="{{asset('logo.png')}}" width="200" height="150" alt="homepage" class="dark-logo" />
        <!-- </div> -->
        
    </div>

    <div class="col-md-4 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">The FIVE Network has representation from the below states</h4>
                    <div id="usa" style="height: 600px"></div>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" id="link-board">
                    <div class="row  button-group">
                        <div class="col-md-6 col-lg-6">
                            <a href="{{route('member.submit-opportunity')}}" class="btn btn-block btn-outline-info">Submit Co-Investment Opportunity</a>
                        </div>

                        <div class="col-md-6 col-lg-6">
                            <a href="{{route('member.refer-member-view')}}" class="btn btn-block btn-outline-info">Refer a Family to the FIVE Network</a>
                        </div>
                    </div>
                    <br>
                    <div class="row  button-group">
                        <div class="col-md-6 col-lg-6">
                            <a href="{{route('member.profile')}}" class="btn btn-block btn-outline-info">Edit Profile</a>
                        </div>
                        
                        <div class="col-md-6 col-lg-6">
                            <a href="{{route('member.verified-opportunity')}}" class="btn btn-block btn-outline-info">FIVE Network Matched Opportunities</a>
                        </div>
                    </div>
                    <br>
                    <div class="row  button-group">
                        <div class="col-md-6 col-lg-6">
                            <a href="{{route('member.faq')}}" class="btn btn-block btn-outline-info">Frequently Asked Questions</a>
                        </div>
                        
                        <div class="col-md-6 col-lg-6">
                            <a href="{{route('member.dealroom')}}" class="btn btn-block btn-outline-info">Deal Room</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@php
$num_total_oppor = App\Model\MemberRequestOpportunity::where('usid', Auth::user()->id)->count();
$num_allow_oppor = App\Model\MemberRequestOpportunity::where('usid', Auth::user()->id)->where('is_accepted',1)->count();
$num_referrals = App\Model\MemberReferLog::where('usid', Auth::user()->id)->count();
$num_logins = App\Model\MemberLogin::where('usid', Auth::user()->id)->count();
$num_deals = App\Model\MemberSimpleOpportunity::where('usid', Auth::user()->id)->count();
@endphp
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Analytics</h4>
                    <!-- <h6 class="card-subtitle">List of opportunities opend by you</h6> -->
                    <div class="row m-t-40">
                        <!-- Column -->
                        <div class="col-md-6 col-lg-3 col-xlg-3">
                            <a href="{{route('member.view-opportunities')}}">
                                <div class="card card-inverse card-info">
                                    <div class="box bg-info text-center">
                                        <h1 class="font-light text-white">{{$num_total_oppor}}</h1>
                                        <h6 class="text-white">Co-Investment Opportunities Submitted</h6>
                                    </div>
                                </div>
                            </a>
                            
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-3 col-xlg-3">
                            <a href="{{route('member.view-opportunities')}}">
                                <div class="card card-inverse card-primary">
                                    <div class="box text-center">
                                        <h1 class="font-light text-white">{{$num_deals}}</h1>
                                        <h6 class="text-white">Deal Room Submissions</h6>
                                    </div>
                                </div>
                            </a>
                            
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-3 col-xlg-3">
                            <a href="{{route('member.view-referrals')}}">
                                <div class="card card-inverse card-danger">
                                    <div class="box text-center">
                                        <h1 class="font-light text-white">{{$num_referrals}}</h1>
                                        <h6 class="text-white">Referrals</h6>
                                    </div>
                                </div>
                            </a>
                            
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-3 col-xlg-3">
                            <a href="{{route('member.view-logins')}}">
                                <div class="card card-inverse card-success">
                                    <div class="box text-center">
                                        <h1 class="font-light text-white">{{$num_logins}}</h1>
                                        <h6 class="text-white">Logins</h6>
                                    </div>
                                </div>
                            </a>
                            
                        </div>
                        <!-- Column -->
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->

@endsection

@section('member-js')
<script src="{{asset('assets/dashboard/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/vectormap/jquery-jvectormap-in-mill.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/vectormap/jquery-jvectormap-us-aea-en.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/footable/js/footable.all.min.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
<!-- <script src="{{asset('assets/dashboard/plugins/vectormap/jvectormap.custom.js')}}"></script> -->

<script type="text/javascript">
$('#usa').vectorMap({
    map : 'us_aea_en',
    backgroundColor: '#4c4c4c',
    borderColor: '#000',
    borderOpacity: 0.5,
    borderWidth: 1,
    zoomOnScroll: true,
    color: '#009efb',
    regionStyle : {
        initial : {
          fill : 'black'
        },
        selected: {
            fill: '#1976d2'
        }
      },
    markerStyle: {
      initial: {
        },
    },
    enableZoom: true,
    hoverColor: '#009efb',
    // markers : [
    // @foreach($markers as $marker)
    // { latLng : [ {{$marker['lat']}}, {{$marker['long']}} ]},
    // @endforeach
    // ],
    hoverOpacity: null,
    normalizeFunction: 'linear',
    scaleColors: ['#b6d6ff', '#005ace'],
    selectedColor: '#c9dfaf',
    selectedRegions:{!! json_encode($regions) !!},
    showTooltip: true,
});

</script>
<script type="text/javascript">
    

</script>
@endsection