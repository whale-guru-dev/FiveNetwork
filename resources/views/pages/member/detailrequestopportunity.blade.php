@extends('layouts.member')
@section('member-css')

@endsection


@section('member-content')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-4 align-self-center">
        <h3 class="text-themecolor">Submitted Opportuniy</h3>
    </div>
    <div class="col-md-4 align-self-center text-center">
        <!-- <div class="row text-center"> -->
            <img src="{{asset('logo.png')}}" width="200" height="150" alt="homepage" class="dark-logo" />
        <!-- </div> -->
        
    </div>
    <div class="col-md-4 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Submitted Opportunity</li>
        </ol>
    </div>

</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<?php $i=1;?>
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Submitted Opportunity</h4>
                    
                    <div class="card-body">
                        <form class="form-horizontal" role="form" >
                            <div class="form-body">
                                <h3 class="box-title">Opportunity Info</h3>
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

    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

</div>
<form action="{{route('member.close-submit-opportunity')}}" method="POST" id="close-request-form">
    @csrf
    <input type="hidden" name="id" value="{{$request->id}}">
</form>
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
<script type="text/javascript">

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