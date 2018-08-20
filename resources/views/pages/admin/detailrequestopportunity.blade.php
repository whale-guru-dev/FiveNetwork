
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
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">pages</li>
            <li class="breadcrumb-item active">Detailed Request opportunity</li>
        </ol>
    </div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
	        <button type="button" class="btn btn-info" id="back-btn"><i class="ti-back-left">Back</i></button>
	    </div>
	</div>
		
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
	            	<div class="row">
                        <div class="col-md-9">
                            <h4 class="m-b-0 text-white">Request Info</h4>
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
	                                    <label class="control-label text-right col-md-4">Company name:</label>
	                                    <div class="col-md-8">
	                                        <p class="form-control-static"> {{$request->company_name}} </p>
	                                    </div>
	                                </div>
	                            </div>
	                            <!--/span-->
	                        </div>
	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group row">
	                                    <label class="control-label text-right col-md-4">Contact name:</label>
	                                    <div class="col-md-8">
	                                        <p class="form-control-static"> {{$request->contact_name}} </p>
	                                    </div>
	                                </div>
	                            </div>
	                            <!--/span-->
	                        </div>

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
	                                    <label class="control-label text-right col-md-4">Company Stage</label>
	                                    <div class="col-md-8">
	                                        <p class="form-control-static">
	                                        @if($request->company_stage == 1)
	                                        Seed/Pre-Revenue
	                                        @elseif($request->company_stage == 2)
	                                        Early Stage/Venture Capital
	                                        @elseif($request->company_stage == 3)
	                                        Private Equity
	                                        @endif 
	                                        </p>
	                                    </div>
	                                </div>
	                            </div>
	                            <!--/span-->
	                        </div>

	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group row">
	                                    <label class="control-label text-right col-md-4">Investment Sector</label>
	                                    <div class="col-md-8">
	                                        <p class="form-control-static"> {{$request->investmentsector->type}} </p>
	                                    </div>
	                                </div>
	                            </div>
	                            <!--/span-->
	                        </div>

	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group row">
	                                    <label class="control-label text-right col-md-4">Investment Region</label>
	                                    <div class="col-md-8">
	                                        <p class="form-control-static"> {{$request->investmentregion->type}} </p>
	                                    </div>
	                                </div>
	                            </div>
	                            <!--/span-->
	                        </div>

	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group row">
	                                    <label class="control-label text-right col-md-4">Investment Structure</label>
	                                    <div class="col-md-8">
	                                        <p class="form-control-static"> {{$request->investmentstructure->type}} </p>
	                                    </div>
	                                </div>
	                            </div>
	                            <!--/span-->
	                        </div>

	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group row">
	                                    <label class="control-label text-right col-md-4">Amount they are investing</label>
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
	                                    <label class="control-label text-right col-md-4">Total Investment company is looking to raise:</label>
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
	                                    <label class="control-label text-right col-md-4">Available capacity for FIVE Network members:</label>
	                                    <div class="col-md-8">
	                                        <p class="form-control-static"> {{'$ '.number_format($request->valuation, 0, '.',',')}} </p>
	                                    </div>
	                                </div>
	                            </div>
	                            <!--/span-->
	                        </div>

	                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-left col-md-9">Prior Year Monthly Financials:</label>
                                        <div class="col-md-3">
                                            @if($request->prior_year_monthly_finacial)
                                            <a href="{{route('opportunity.file',['name' => $request->prior_year_monthly_finacial])}}">Check</a>
                                            @else
                                            <p class="form-control-static">No File</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-left col-md-9">Investor Deck:</label>
                                        <div class="col-md-3">
                                            @if($request->investor_deck)
                                            <a href="{{route('opportunity.file',['name' => $request->investor_deck])}}">Check</a>
                                            @else
                                            <p class="form-control-static">No File</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-left col-md-9">3 Year Proforma Projections:</label>
                                        <div class="col-md-3">
                                            @if($request->proforma_projections)
                                            <a href="{{route('opportunity.file',['name' => $request->proforma_projections])}}">Check</a>
                                            @else
                                            <p class="form-control-static">No File</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-left col-md-9">Detailed Cap Table:</label>
                                        <div class="col-md-3">
                                            @if($request->detailed_cap_table)
                                            <a href="{{route('opportunity.file',['name' => $request->detailed_cap_table])}}">Check</a>
                                            @else
                                            <p class="form-control-static">No File</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
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
	                                       
	                                        <span class="badge badge-success ml-auto"><i class="fa fa-pencil"></i>Allowed</span>
	                                    </div>
	                                    @elseif($request->is_accepted == 2)
	                                    <div class="col-md-offset-6 col-md-6">
	                                       
	                                        <span class="badge badge-warning ml-auto"><i class="fa fa-close"></i>Denied</span>
	                                    </div>
	                                    @endif
	                                </div>
	                            </div>
	                            <div class="col-md-6"> </div>
	                        </div>
	                        <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        @if($request->is_active == 0)
                                        <div class="col-md-offset-6 col-md-6">
                                            <span class="badge badge-danger ml-auto"><i class="fa fa-pencil"></i>Closed</span>
                                        </div>
                                        @else
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="button" class="btn btn-info" id="close-btn"> <i class="fa fa-pencil"></i> Set Status as Closed</button>
                                        </div>
                                        @endif
                                    </div>
                                </div>
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
<form action="{{route('admin.close-submit-opportunity')}}" method="POST" id="close-request-form">
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

	$(document).on("click","#close-btn",function(){
        $("#close-request-form").submit();
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