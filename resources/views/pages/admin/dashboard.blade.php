@extends('layouts.admin')
@section('admin-css')
<link href="{{asset('assets/dashboard/plugins/chartist-js/dist/chartist.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/dashboard/plugins/chartist-js/dist/chartist-init.css')}}" rel="stylesheet">
<link href="{{asset('assets/dashboard/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')}}" rel="stylesheet">
<style type="text/css">
	.ct-label, .ct-grid {
	    fill: rgba(255, 255, 255, 0.3);
	    stroke: rgba(255, 255, 255, 0.3);
	    color: rgba(255, 255, 255, 0.3);
	}
</style>
@endsection

@section('admin-content')
@php
$total_visit = App\Model\MemberLogin::all()->count();
$today_visit = App\Model\MemberLogin::whereDate('created_at', '=', date('Y-m-d'))->get()->count();
$current_visit = App\Model\MemberLogin::whereDate('created_at', '=', \Carbon\Carbon::today()->toDateString())->where('is_active', 1)->get()->count();

$month_member = [];
$month_opportunity = [];
$month_login = [];
$month_syndicated1 = [];
$month_syndicated2 = [];
for($i = 1; $i <= 12; $i++){
	$month_member[] = App\User::whereYear('created_at', '=', date('Y'))
              ->whereMonth('created_at', '=', $i)->get()->count();
    $month_opportunity[] = (App\Model\MemberRequestOpportunity::whereYear('created_at', '=', date('Y'))
                  ->whereMonth('created_at', '=', $i)->get()->count() + App\Model\MemberSimpleOpportunity::whereYear('created_at', '=', date('Y'))
                  ->whereMonth('created_at', '=', $i)->get()->count() + App\Model\InvestmentQuestionnaire::whereYear('created_at', '=', date('Y'))
                  ->whereMonth('created_at', '=', $i)->get()->count());
    $month_login[] = App\Model\MemberLogin::whereYear('created_at', '=', date('Y'))
              ->whereMonth('created_at', '=', $i)->get()->count();
    $month_syndicated1[] = App\Model\MemberMonthlyEmail::where('year', date('Y'))->where('month', date('m'))->sum('capital') ;
    $month_syndicated2[] =App\Model\MemberMonthlyEmail::where('year', date('Y'))->where('month', date('m'))->sum('capital1');
}

if(Auth::user()->role == 1)
	$adminlogins = App\Model\AdminLogin::orderBy('created_at','DESC')->get();
else
	$adminlogins = App\Model\AdminLogin::where('admin_id',Auth::user()->id)->orderBy('created_at','DESC')->get();

$user_act = [];

foreach(App\User::all() as $each){
	$score_login = App\Model\MemberLogin::where('usid', $each->id)->count() * 10;
	$score_oppor = App\Model\MemberRequestOpportunity::where('usid', $each->id)->count() *20;
    $score_deal = App\Model\MemberSimpleOpportunity::where('usid', $each->id)->count() *20;
	$score_express = App\Model\MemberOpportunityMatch::where('matched_member_id', $each->id)->where('is_allowed', 1)->where('binterest','!=',0)->count() * 20;
	$score_referral = App\Model\MemberReferLog::where('usid', $each->id)->count() * 20;
	$sum_score = $score_login + $score_oppor + $score_deal + $score_express + $score_referral;
    
    $status = $each->is_allowed;

	$user_act[$each->id] = ['id' => $each->id, 'Name' => $each->fName.' '.$each->lName, 'score' => $sum_score, 'status' => $status];
}


$admins = App\Model\Admin::all();
@endphp


<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Dashboard</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
    
</div>

<div class="container-fluid">
	<div class="row">
	    <div class="col-lg-9 col-xlg-9">
	        <div class="card">
	            <div class="card-body">
	                <div class="d-flex flex-wrap">
	                    <div>
	                        <h4 class="card-title">Analytics Overview</h4>
	                        <h6 class="card-subtitle">Overview of Monthly analytics</h6>
	                    </div>
	                    <div class="ml-auto align-self-center">
	                        <ul class="list-inline m-b-0">
	                            <li>
	                                <h6 class="text-muted text-success"><i class="fa fa-circle font-10 m-r-10 "></i>Member</h6> 
	                            </li>
	                            <li>
	                                <h6 class="text-muted text-info"><i class="fa fa-circle font-10 m-r-10"></i>Opportuniy</h6> 
	                            </li>
	                            <li>
	                                <h6 class="text-muted text-warning"><i class="fa fa-circle font-10 m-r-10 "></i>Login</h6> 
	                            </li>
	                        </ul>
	                    </div>
	                </div>
	                <div class="campaign ct-charts" style="height:305px!important;"></div>
	            </div>
	        </div>
	    </div>
	    <div class="col-lg-3">
	        <div class="card">
	        	<a href="{{route('admin.member-visit-detail',['date' => 'total'])}}">
	        		<div class="card-body">
		                <h4 class="card-title">Total Visit</h4>
		                <div class="d-flex">
		                    <div class="align-self-center">
		                        <h4 class="font-medium m-b-0"><i class="ti-angle-up text-success"></i>  {{$total_visit}}</h4></div>
		                    <div class="ml-auto">
		                        <div id="spark8"></div>
		                    </div>
		                </div>
		            </div>
	        	</a>
	        </div>

	        <div class="card">
	        	<a href="{{route('admin.member-visit-detail',['date' => 'today'])}}">
	        		<div class="card-body">
		                <h4 class="card-title">Today Visit</h4>
		                <div class="d-flex">
		                    <div class="align-self-center">
		                        <h4 class="font-medium m-b-0"><i class="ti-angle-up text-danger"></i>  {{$today_visit}}</h4></div>
		                    <div class="ml-auto">
		                        <div id="spark9"></div>
		                    </div>
		                </div>
		            </div>
	        	</a>
	        </div>

	        <div class="card">
	        	<a href="{{route('admin.member-visit-detail',['date' => 'current'])}}">
	        		<div class="card-body">
		                <h4 class="card-title">Current Visit</h4>
		                <div class="d-flex">
		                    <div class="align-self-center">
		                        <h4 class="font-medium m-b-0"><i class="ti-angle-up text-success"></i> {{$current_visit}}</h4></div>
		                    <div class="ml-auto">
		                        <div id="spark10"></div>
		                    </div>
		                </div>
		            </div>
	        	</a>
	        </div>
	    </div>
	</div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Amount $ Syndicated Overview</h4>
                    <h6 class="card-subtitle">Amount $ Syndicated on Platform Overview</h6>
                    <div class="amp-pxl m-t-40" style="height: 305px;"></div>
                    <div class="text-center">
                        <ul class="list-inline">
                            <li>
                                <h6 class="text-muted text-success"><i class="fa fa-circle font-10 m-r-10 "></i>Submitter Syndicated Amount</h6> </li>
                            <li>
                                <h6 class="text-muted  text-info"><i class="fa fa-circle font-10 m-r-10"></i>Co-Investor Syndicated Amount</h6> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<div class="row">
		<div class="col-lg-12 col-xlg-12">
			<div class="card card-default">
				<div class="card-header">
                    <div class="card-actions">
                        <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                        <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                        <a class="btn-close" data-action="close"><i class="ti-close"></i></a>
                    </div>
                    @if(Auth::user()->role == 1)
                    <h4 class="card-title m-b-0">Admins Login Info</h4>
                    @else
                    <h4 class="card-title m-b-0">Login Info</h4>
                    @endif
                </div>
                <div class="card-body collapse show">
                    <div class="table-responsive">
                        <table class="table product-overview">
                            <thead>
                                <tr>
                                    <th>Admin</th>
                                    <th>Email</th>
                                    <th>IP Address</th>
                                    <th>Location</th>
                                    <th>Device</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($adminlogins as $login)
                                <tr>
                                	<td>{{$login->admin->fName.' '.$login->admin->lName}}</td>
                                    <td>{{$login->admin->email}}</td>
                                	<td>{{$login->ip_addr}}</td>
                                	<td>{{$login->location}}</td>
                                	<td>{{$login->device}}</td>
                                	<td>{{$login->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6 col-xlg-6">
			<div class="card card-default">
				<div class="card-header">
                    <div class="card-actions">
                        <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                        <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                        <a class="btn-close" data-action="close"><i class="ti-close"></i></a>
                    </div>

                    <h4 class="card-title m-b-0">Members Activity Ranking</h4>
                    
                </div>
                <div class="card-body collapse show">
                    <div class="table-responsive">
                        <table class="table product-overview">
                            <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>Member Name</th>
                                    <th>Score</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(collect($user_act)->sortBy('score')->reverse()->toArray() as $each)
                                <tr>
                                	<td>{{$loop->iteration}}</td>
                                	<td>{{$each['Name']}}</td>
                                	<td>{{$each['score']}}</td>
                                    <td>
                                    @if($each['status'] == 0)
                                    <span class="badge badge-success">Not Checked</span>
                                    @elseif($each['status'] == 1)
                                    <span class="badge badge-info">Allowed</span>
                                    @elseif($each['status'] == 2)
                                    <span class="badge badge-warning">Denied</span>
                                    @elseif($each['status'] == 3)
                                    <span class="badge badge-danger">Removed</span>
                                    @endif
                                    </td>
                                	<td><a href="{{route('admin.member-activity-detail', ['id' => $each['id']])}}" class="btn btn-info btn-sm">More Info</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
			</div>
		</div>

        <div class="col-lg-6 col-xlg-6">
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-actions">
                        <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                        <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                        <a class="btn-close" data-action="close"><i class="ti-close"></i></a>
                    </div>

                    <h4 class="card-title m-b-0">Admins</h4>
                    
                </div>
                <div class="card-body collapse show">
                    <div class="table-responsive">
                        <table class="table product-overview">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Admin Name</th>
                                    <th>Admin Email</th>
                                    <th>Role</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admins as $admin)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$admin->fName.' '.$admin->lName}}</td>
                                    <td>{{$admin->email}}</td>
                                    <td>
                                        @if($admin->role == 1)
                                        <span class="badge badge-danger">Super Admin</span>
                                        @else
                                        <span class="badge badge-success">Admin</span>
                                        @endif
                                    </td>
                                    <td>{{$admin->created_at->format('Y/m/d')}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>	

@endsection

@section('admin-js')
<script src="{{asset('assets/dashboard/plugins/chartist-js/dist/chartist.min.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')}}"></script>

<script type="text/javascript">
	var chart = new Chartist.Line('.campaign', {
          labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
          series: [
            <?=json_encode($month_member);?>, 
            <?=json_encode($month_opportunity);?>,
            <?=json_encode($month_login);?>
          ]}, {
          low: 0,
          high: <?=max(max($month_member,$month_opportunity,$month_login))+10;?>,
          showArea: true,
          fullWidth: true,
          plugins: [
            Chartist.plugins.tooltip()
          ], 
            axisY: {
            onlyInteger: true
            , scaleMinSpace: 40    
            , offset: 20
            , labelInterpolationFnc: function (value) {
                return (value);
            }
        },
        });

        // Offset x1 a tiny amount so that the straight stroke gets a bounding box
        // Straight lines don't get a bounding box 
        // Last remark on -> http://www.w3.org/TR/SVG11/coords.html#ObjectBoundingBox
        chart.on('draw', function(ctx) {  
          if(ctx.type === 'area') {    
            ctx.element.attr({
              x1: ctx.x1 + 0.001
            });
          }
        });

        // Create the gradient definition on created event (always after chart re-render)
        chart.on('created', function(ctx) {
          var defs = ctx.svg.elem('defs');
          defs.elem('linearGradient', {
            id: 'gradient',
            x1: 0,
            y1: 1,
            x2: 0,
            y2: 0
          }).elem('stop', {
            offset: 0,
            'stop-color': 'rgba(255, 255, 255, 1)'
          }).parent().elem('stop', {
            offset: 1,
            'stop-color': 'rgba(38, 198, 218, 1)'
          });
        });
    
            
    var chart = [chart];

    // ============================================================== 
    // This is for the animation
    // ==============================================================
    
    for (var i = 0; i < chart.length; i++) {
        chart[i].on('draw', function(data) {
            if (data.type === 'line' || data.type === 'area') {
                data.element.animate({
                    d: {
                        begin: 500 * data.index,
                        dur: 500,
                        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                        to: data.path.clone().stringify(),
                        easing: Chartist.Svg.Easing.easeInOutElastic
                    }
                });
            }
            if (data.type === 'bar') {
                data.element.animate({
                    y2: {
                        dur: 500,
                        from: data.y1,
                        to: data.y2,
                        easing: Chartist.Svg.Easing.easeInOutElastic
                    },
                    opacity: {
                        dur: 500,
                        from: 0,
                        to: 1,
                        easing: Chartist.Svg.Easing.easeInOutElastic
                    }
                });
            }
        });
    }

    var chart = new Chartist.Bar('.amp-pxl', {
          labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
          series: [
            <?=json_encode($month_syndicated1)?>,
            <?=json_encode($month_syndicated2)?>
          ]
        }, {
          axisX: {
            // On the x-axis start means top and end means bottom
            position: 'end',
            showGrid: false
          },
          axisY: {
            // On the y-axis start means left and end means right
            position: 'start'
            , labelInterpolationFnc: function (value) {
                return (value / 1000) + 'k';
            }
          },
        high:<?=max(max($month_syndicated1,$month_syndicated2))+10000;?>,
        low: '0',
        plugins: [
            Chartist.plugins.tooltip()
        ]
    });
    

        // Offset x1 a tiny amount so that the straight stroke gets a bounding box
        // Straight lines don't get a bounding box 
        // Last remark on -> http://www.w3.org/TR/SVG11/coords.html#ObjectBoundingBox
        chart.on('draw', function(ctx) {  
          if(ctx.type === 'area') {    
            ctx.element.attr({
              x1: ctx.x1 + 0.001
            });
          }
        });

        // Create the gradient definition on created event (always after chart re-render)
        chart.on('created', function(ctx) {
          var defs = ctx.svg.elem('defs');
          defs.elem('linearGradient', {
            id: 'gradient',
            x1: 0,
            y1: 1,
            x2: 0,
            y2: 0
          }).elem('stop', {
            offset: 0,
            'stop-color': 'rgba(255, 255, 255, 1)'
          }).parent().elem('stop', {
            offset: 1,
            'stop-color': 'rgba(38, 198, 218, 1)'
          });
        });
    
            
    var chart = [chart];

    // ============================================================== 
    // This is for the animation
    // ==============================================================
    
    for (var i = 0; i < chart.length; i++) {
        chart[i].on('draw', function(data) {
            if (data.type === 'line' || data.type === 'area') {
                data.element.animate({
                    d: {
                        begin: 500 * data.index,
                        dur: 500,
                        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                        to: data.path.clone().stringify(),
                        easing: Chartist.Svg.Easing.easeInOutElastic
                    }
                });
            }
            if (data.type === 'bar') {
                data.element.animate({
                    y2: {
                        dur: 500,
                        from: data.y1,
                        to: data.y2,
                        easing: Chartist.Svg.Easing.easeInOutElastic
                    },
                    opacity: {
                        dur: 500,
                        from: 0,
                        to: 1,
                        easing: Chartist.Svg.Easing.easeInOutElastic
                    }
                });
            }
        });
    }

    var sparklineLogin = function() { 
       

        
        $('#spark8').sparkline([ 4, 5, 0, 10, 9, 12, 4, 9], {
            type: 'bar',
            width: '100%',
            height: '40',
            barWidth: '4',
            resize: true,
            barSpacing: '5',
            barColor: '#26c6da'
        });
         $('#spark9').sparkline([ 0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            width: '100%',
            height: '40',
            barWidth: '4',
            resize: true,
            barSpacing: '5',
            barColor: '#ef5350'
        });
          $('#spark10').sparkline([ 0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            width: '100%',
            height: '40',
            barWidth: '4',
            resize: true,
            barSpacing: '5',
            barColor: '#7460ee'
        });
          
        
       
   }
    var sparkResize;
 
    $(window).resize(function(e) {
        clearTimeout(sparkResize);
        sparkResize = setTimeout(sparklineLogin, 500);
    });
    sparklineLogin();

</script>
@endsection