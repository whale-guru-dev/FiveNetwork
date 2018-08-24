@extends('layouts.member')
@section('member-css')
<link rel="stylesheet" href="{{asset('assets/dashboard/plugins/dropify/dist/css/dropify.min.css')}}">
@endsection


@section('member-content')
@php
$invest_region_types = App\Model\MemberInvestmentRegionType::orderBy('type','ASC')->get();
$invest_sector_types = App\Model\MemberInvestmentSectorType::orderBy('type','ASC')->get();
$invest_types = App\Model\InvestmentStructureType::all();
@endphp
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-4 align-self-center">
        <h3 class="text-themecolor">Submit Investment Opportunity to Deal Room</h3>
    </div>
    <div class="col-md-4 align-self-center text-center">
        <!-- <div class="row text-center"> -->
            <img src="{{asset('logo.png')}}" width="200" height="150" alt="homepage" class="dark-logo" />
        <!-- </div> -->
        
    </div>
    <div class="col-md-4 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Submit Investment Opportunity to Deal Room</li>
        </ol>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Submit Investment Opportunity to Deal Room</h4>
                    <h6 class="card-subtitle">Please submit the below information to upload Investment Opportunity to the Deal Room.</h6>
                    <form class="form p-t-20" action="{{route('member.submit-simple-deal')}}" method="POST" id="request-form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="contact_name">Company name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-server"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter Company name" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fName">Company Contact</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-pencil"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="fName" name="fName" placeholder="Enter Contact name" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-email"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-mobile"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone number" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="company_stage">Company Stage</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-tag"></i>
                                    </span>
                                </div>

                                <select name="company_stage" class="form-control" required="">
                                    <option>Select</option>
                                    <option value="1">Pre-Revenue/Seed</option>
                                    <option value="2">Early Stage/Venture Capital</option>
                                    <option value="3">Private Equity</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="investment_sector">Investment Sector</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-briefcase"></i>
                                    </span>
                                </div>

                                <select class="custom-select form-control required" id="investment_sector" name="investment_sector" required>
                                    <option value="" selected>Select</option>
                                    @foreach($invest_sector_types as $sector)
                                    <option value="{{$sector->id}}">{{$sector->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="investment_region">Investment Region</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-world"></i>
                                    </span>
                                </div>

                                <select class="form-control custom-select required" name="investment_region" id="investment_region" required>
                                    @foreach($invest_region_types as $irt)
                                        <option value="{{$irt->id}}">{{$irt->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="investment_structure">Investment Structure</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-thought"></i>
                                    </span>
                                </div>

                                <select class="custom-select form-control required" id="investment_structure" name="investment_structure" required>
                                    <option value="" selected>Select</option>
                                    @foreach($invest_types as $type)
                                    <option value="{{$type->id}}">{{$type->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label for="investing_amount">Amount You are Investing</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-target"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control mask-money" id="investing_amount" name="investing_amount" placeholder="Enter Amount You are Investing" data-inputmask="'alias': 'currency'"  required="">
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label for="raising">Total Investment company is looking to raise</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-flag-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control mask-money" id="raising" name="raising" placeholder="Total Amount Company is Looking to Raise" data-inputmask="'alias': 'currency'"  required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="valuation_val">Available capacity for FIVE Network members</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-flag-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control mask-money" id="valuation_val" name="valuation_val" placeholder="Enter Available capacity for FIVE Network members" data-inputmask="'alias': 'currency'"  required="">
                                <input type="hidden" name="valuation" id="valuation" >
                            </div>
                        </div>

                        <h6>Please upload all applicable files</h6>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="prior_year_monthly_finacial">Prior Year Monthly Financials</label>
                                        <input type="file" id="prior_year_monthly_finacial" class="dropify" name="prior_year_monthly_finacial" accept="*" data-max-file-size="40M" required=""/ >
                                    </div>

                                    <div class="col-md-6">
                                        <label for="investor_deck">Investor Deck</label>
                                        <input type="file" id="investor_deck" class="dropify" name="investor_deck" accept="*" data-max-file-size="40M" required=""/ >
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="proforma_projections">3 Year Proforma Projections</label>
                                        <input type="file" id="proforma_projections" class="dropify" name="proforma_projections" accept="*" data-max-file-size="40M" required=""/ >
                                    </div>

                                    <div class="col-md-6">
                                        <label for="detailed_cap_table">Detailed Cap Table</label>
                                        <input type="file" id="detailed_cap_table" class="dropify" name="detailed_cap_table" accept="*" data-max-file-size="40M" required=""/ >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>


                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                        <button type="button" class="btn btn-inverse waves-effect waves-light" id="cancel-btn">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('member-js')
<script src="{{asset('assets/dashboard/plugins/dropify/dist/js/dropify.min.js')}}"></script>
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

<script type="text/javascript">
    $('.dropify').dropify();
    $(document).on("click","#cancel-btn",function(){
        document.getElementById("request-form").reset();
    });

    $('.mask-money').inputmask({digits:0, rightAlign:false});

    $("#request-form").submit(function(){
        var valuation_cur = $("#valuation_val").val();
        var valuation = Number(valuation_cur.replace(/[^0-9\.-]+/g,""));
        $("#valuation").val(valuation);
    });

    $('#request-form').on('keyup keypress', function(e) {
      var keyCode = e.keyCode || e.which;
      if (keyCode === 13) { 
        e.preventDefault();
        return false;
      }
    });
    
</script>
@endsection 