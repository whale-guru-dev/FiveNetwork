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

$today_visit = App\Model\MemberLogin::whereDate('created_at', '=', \Carbon\Carbon::today()->toDateString())->get()->count();
$current_visit = App\Model\MemberLogin::whereDate('created_at', '=', \Carbon\Carbon::today()->toDateString())->where('is_active', 1)->get()->count();
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
	                            <li>
	                                <h6 style="color: #f4c63d;"><i class="fa fa-circle font-10 m-r-10"></i>Syndicated $</h6> 
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
</div>	

@endsection

@section('admin-js')
<script src="{{asset('assets/dashboard/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/chartist-js/dist/chartist.min.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')}}"></script>

<script type="text/javascript">
	var chart = new Chartist.Line('.campaign', {
          labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
          series: [
            [0, 5000, 15000, 8000, 15000, 9000, 30000, 0, 0, 0, 0, 0], 
            [0, 3000, 5000, 2000, 8000, 1000, 5000, 0, 0, 0, 0, 0],
            [0, 2000, 4000, 4000, 3000, 500, 0, 0, 0, 0, 0, 0],
            [0, 1000, 2000, 3000, 4000, 5000, 0, 0, 0, 500, 0, 0]
          ]}, {
          low: 0,
          high: 40000,
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
                return (value / 1000) + 'k';
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