
@extends('layouts.admin')
@section('admin-css')

@endsection


@section('admin-content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Detailed Request opportunity</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item">pages</li>
            <li class="breadcrumb-item active">Detailed Request opportunity</li>
        </ol>
    </div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card card-outline-info">
				<div class="card-header">
	            	<div class="row">
                        <div class="col-md-9">
                            <h4 class="m-b-0 text-white">Request Info</h4>
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-warning" id="back-btn"><i class="ti-back-left">Back</i></button>
                        </div>
                    </div>
                </div>
	            <div class="card-body">
	                <form class="form-horizontal" role="form" >
	                    <div class="form-body">
	                        <h3 class="box-title">Request Info</h3>
	                        <hr class="m-t-0 m-b-40">
	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group row">
	                                    <label class="control-label text-right col-md-4">Email:</label>
	                                    <div class="col-md-8">
	                                        <p class="form-control-static"> {{$request->email}} </p>
	                                    </div>
	                                </div>
	                            </div>
	                            <!--/span-->
	                        </div>

	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group row">
	                                    <label class="control-label text-right col-md-4">Phone Number:</label>
	                                    <div class="col-md-8">
	                                        <p class="form-control-static"> {{$request->phone}} </p>
	                                    </div>
	                                </div>
	                            </div>
	                            <!--/span-->
	                        </div>

	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group row">
	                                    <label class="control-label text-right col-md-4">Opportunity Name:</label>
	                                    <div class="col-md-8">
	                                        <p class="form-control-static"> {{$request->opportunity_name}} </p>
	                                    </div>
	                                </div>
	                            </div>
	                            <!--/span-->
	                        </div>

	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group row">
	                                    <label class="control-label text-right col-md-4">How much they are investing?</label>
	                                    <div class="col-md-8">
	                                        <p class="form-control-static"> {{$request->investing_amount}} </p>
	                                    </div>
	                                </div>
	                            </div>
	                            <!--/span-->
	                        </div>

	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group row">
	                                    <label class="control-label text-right col-md-4">Raising:</label>
	                                    <div class="col-md-8">
	                                        <p class="form-control-static"> {{$request->raising}} </p>
	                                    </div>
	                                </div>
	                            </div>
	                            <!--/span-->
	                        </div>

	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group row">
	                                    <label class="control-label text-right col-md-4">Valuation:</label>
	                                    <div class="col-md-8">
	                                        <p class="form-control-static"> {{$request->valuation}} </p>
	                                    </div>
	                                </div>
	                            </div>
	                            <!--/span-->
	                        </div>
	                    </div>
	                    <div class="form-actions">
	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="row">
	                                	@if($request->is_accepted == 0)
	                                    <div class="col-md-offset-3 col-md-9">
	                                        <button type="button" class="btn btn-info" id="allow-btn"> <i class="fa fa-pencil"></i> Allow</button>
	                                        <button type="button" class="btn btn-danger" id="deny-btn">Deny</button>
	                                    </div>
	                                    @elseif($request->is_accepted == 1)
	                                    <div class="col-md-offset-6 col-md-6">
	                                        <button type="button" class="btn btn-info"> <i class="fa fa-pencil"></i> Allowed</button>
	                                    </div>
	                                    @elseif($request->is_accepted == 2)
	                                    <div class="col-md-offset-6 col-md-6">
	                                        <button type="button" class="btn btn-danger">Denied</button>
	                                    </div>
	                                    @endif
	                                </div>
	                            </div>
	                            <div class="col-md-6"> </div>
	                        </div>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
</div>
<form action="{{route('admin.allow-submit-opportunity')}}" method="POST" id="allow-request-form">
	@csrf
	<input type="hidden" name="id" value="{{$request->id}}">
</form>
<form action="{{route('admin.deny-submit-opportunity')}}" method="POST" id="deny-request-form">
	@csrf
	<input type="hidden" name="id" value="{{$request->id}}">
</form>
@endsection

@section('admin-js')
<script type="text/javascript">
	$(document).on("click","#allow-btn",function(){
		$("#allow-request-form").submit();
	});

	$(document).on("click","#deny-btn",function(){
		$("#deny-request-form").submit();
	});

	$(document).on("click","#back-btn",function(){
        window.history.back();
    });
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
    });
</script>
@endif
@endsection