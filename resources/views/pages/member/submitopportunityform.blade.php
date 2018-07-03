@extends('layouts.member')
@section('member-css')
<link href="{{asset('assets/dashboard/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

<link href="{{asset('assets/dashboard/plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/dashboard/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />

<link href="{{asset('assets/dashboard/plugins/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
@endsection


@section('member-content')
<?php $invest_types = App\Model\InvestmentStructureType::all();?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Co-Investment opportunity form</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Co-Investment opportunity form</li>
        </ol>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Co-Investment opportunity form</h4>
                    <h6 class="card-subtitle">Please fill Co-Investment opportunity form.</h6>
                    <form class="form p-t-20" action="{{route('member.submit-coinvestment-opportunity')}}" method="POST" id="submit-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="bremain_anonymous"> Would you like to remain anonymous?
                                        <span class="danger">*</span> 
                                    </label>
                                    <select class="custom-select form-control required" id="bremain_anonymous" name="bremain_anonymous">
                                        <option value="" selected>Select</option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group collapse" id="remain_anonymous" style="display: none;">
                                    <label for="name_remain_anonymous"> Name : <span class="danger">*</span> 
                                    </label>
                                    <input type="email" class="form-control " id="name_remain_anonymous" name="name_remain_anonymous"> 
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="reachout_method"> Do you prefer co-investors reach out to your or alternative contact?
                                        <span class="danger">*</span> 
                                    </label>
                                    <select class="custom-select form-control required" id="reachout_method" name="reachout_method">
                                        <option value="" selected>Select</option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group collapse" id="alternative" style="display: none;">
                                    <label for="contact_email"> Contact Email : <span class="danger">*</span> 
                                    </label>
                                    <input type="email" class="form-control " id="contact_email" name="contact_email"> 
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="project_name"> Project name : <span class="danger">*</span> 
                                    </label>
                                    <input type="text" class="form-control required" id="project_name" name="project_name"> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="company_desc"> Company Description : <span class="danger">*</span> 
                                    </label>
                                    <input type="text" class="form-control required" id="company_desc" name="company_desc"> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="headquater_loc"> Head Quarter location : <span class="danger">*</span> 
                                    </label>
                                    <input type="text" class="form-control required" id="headquater_loc" name="headquater_loc"> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="operation_loc"> Operations locations : <span class="danger">*</span> 
                                    </label>
                                    <input type="text" class="form-control required" id="operation_loc" name="operation_loc"> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="sector_subsector_specialization"> Sectors, Sub-sectors & Specialization : <span class="danger">*</span> 
                                    </label>
                                    <input type="text" class="form-control required" id="sector_subsector_specialization" name="sector_subsector_specialization"> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="invest_structure">Investment Structure :</label>
                                    <select class="select2 m-b-10 select2-multiple" style="width: 100%;"  data-placeholder="Choose" name="invest_structure[]" id="invest_structure">
                                        <option value="">Select</option>
                                        @foreach($invest_types as $type)
                                        <option value="{{$type->id}}">{{$type->type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="independent_sponsor"> Independent Sponsor : <span class="danger">*</span> 
                                    </label>
                                    <input type="text" class="form-control required" id="independent_sponsor" name="independent_sponsor"> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="offered_stake"> Stakes offered :
                                        <span class="danger">*</span> 
                                    </label>
                                    <select class="custom-select form-control required" id="offered_stake" name="offered_stake">
                                        <option value="" selected>Select</option>
                                        <option value="0">Less than 50%</option>
                                        <option value="1">More than 50%</option>
                                        <option value="2">100%</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="amount_seeking_investment"> Amount of Investment Seeking : </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control required" name="amount_seeking_investment" id="amount_seeking_investment">
                                        <span class="input-group-btn">
                                            <select class="btn" id="money_unit">
                                                <option>M $</option>
                                                <option>MM $</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="revenue"> Revenue : <span class="danger">*</span> 
                                    </label>
                                    <input type="text" class="form-control required" id="revenue" name="revenue"> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="EBITDA"> EBITDA : <span class="danger">*</span> 
                                    </label>
                                    <input type="text" class="form-control required" id="EBITDA" name="EBITDA"> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="valuation"> Valuation : <span class="danger">*</span> 
                                    </label>
                                    <input type="text" class="form-control required" id="valuation" name="valuation"> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="structure_term"> Structure / Terms : <span class="danger">*</span> 
                                    </label>
                                    <input type="text" class="form-control required" id="structure_term" name="structure_term"> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="additional_commentary"> Additional Commentary : <span class="danger">*</span> 
                                    </label>
                                    <input type="text" class="form-control required" id="additional_commentary" name="additional_commentary"> 
                                </div>
                            </div>
                        </div>

                        
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                        <button type="button" class="btn btn-inverse waves-effect waves-light" id="cancel-btn">Cancel</button>
                    </form>
                    <form action="{{route('member.submit-coinvestment-opportunity')}}" class="validation-wizard wizard-circle" id="apply-form" method="POST" >
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('member-js')
    <script src="{{asset('assets/dashboard/plugins/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/dashboard/plugins/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/dashboard/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/dashboard/plugins/multiselect/js/jquery.multi-select.js')}}"></script>

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
    $(".select2").select2();

    $(document).on("click","#cancel-btn",function(){
        document.getElementById("request-form").reset();
    });
</script>
@endsection 