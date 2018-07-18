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

@endsection