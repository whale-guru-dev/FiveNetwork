@extends('layouts.member')
@section('member-css')
<style type="text/css">
    ul, li {
      list-style-type: none;
    }
    .treeview li {
        padding: 2px 10px;
    }
</style>
@endsection


@section('member-content')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
@php
    $match = App\Model\MemberDealMatch::where('opportunity_id', $oppor->id)->get();
    $date_met = [];$date_eval = [];$date_noeval = [];$date_open = [];
    foreach($match as $each){
        if($each->bmet == 1) $date_met[] = $each->express_date;
        if($each->bevaluat == 1) $date_eval[] = $each->express_date;
        if($each->bnoevaluate == 1) $date_noeval[] = $each->express_date;
        if($each->bopen == 1) $date_open[] = $each->express_date;
    }


    $num_met = $match->sum('bmet');
    $num_evaluate = $match->sum('bevaluat');
    $num_noevaluate = $match->sum('bnoevaluate');
    $num_open = $match->sum('bopen');
@endphp
<div class="row page-titles">
    <div class="col-md-4 align-self-center">
        <h3 class="text-themecolor">Detailed Investment Questionnaire</h3>
    </div>
    <div class="col-md-4 align-self-center text-center">
        <!-- <div class="row text-center"> -->
            <img src="{{asset('logo.png')}}" width="200" height="150" alt="homepage" class="dark-logo" />
        <!-- </div> -->
        
    </div>
    <div class="col-md-4 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Detailed Investment Questionnaire</li>
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
        <div class="col-md-3">
            <button type="button" class="btn btn-info" id="back-btn"><i class="ti-back-left">Back</i></button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">
                            <h4 class="m-b-0 text-white">Investment Questionnaire Info</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" role="form" action="{{route('member.express-opportunity')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label>Allow members to know if you have met with this company, are evaluating the company, or if you are open to discussing this opportunity.</label><br><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" name="code" value="{{$oppor->code}}">
                                            <label for="treeview1">FIVE Member Feedback.</label>
                                            <ul class="treeview" id="treeview1">
                                                <li>
                                                    <i class="fa fa-minus"></i>
                                                    <label>
                                                        <div class="checkbox checkbox-success">
                                                            <input id="xnode-0" data-id="custom-0" type="checkbox">
                                                            <label for="xnode-0" id="selectall"> Select All  </label>
                                                        </div>
                                                    </label>
                                                    <ul>
                                                        <li>
                                                            <label>
                                                                <div class="checkbox checkbox-success">
                                                                    <input class="hummingbirdNoParent" id="xnode-0-1" data-id="custom-0-1" type="checkbox" name="express_oppor[]" value="0" @if($matched_oppor->bmet == 1) checked @endif>
                                                                    <label for="xnode-0-1"> I have met with this opportunity </label>
                                                                </div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <div class="checkbox checkbox-success">
                                                                    <input class="hummingbirdNoParent" id="xnode-0-2" data-id="custom-0-2" type="checkbox" name="express_oppor[]" value="1" @if($matched_oppor->bevaluat == 1) checked @endif>
                                                                    <label for="xnode-0-2"> I am actively evaluating this opportunity </label>
                                                                </div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <div class="checkbox checkbox-success">
                                                                    <input class="hummingbirdNoParent" id="xnode-0-3" data-id="custom-0-3" type="checkbox" name="express_oppor[]" value="2" @if($matched_oppor->bnoevaluate == 1) checked @endif>
                                                                    <label for="xnode-0-3"> I am no longer evaluating this opportunity </label>
                                                                </div>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <div class="checkbox checkbox-success">
                                                                    <input class="hummingbirdNoParent" id="xnode-0-4" data-id="custom-0-4" type="checkbox" name="express_oppor[]" value="3" @if($matched_oppor->bopen == 1) checked @endif>
                                                                    <label for="xnode-0-4"> I am open to discussing this opportunity with network members </label>
                                                                </div>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input type="date" name="express_date" class="form-control" value="{{$matched_oppor->express_date}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <br>
                    <form class="form-horizontal" role="form" >
                        <div class="form-body">
                            <h3 class="box-title">Investment Questionnaire Info</h3>
                            <hr class="m-t-0 m-b-40">
                            <h4>GENERAL INFORMATION</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-4">First Name</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static"> {{$oppor->fName}} </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-4">Last Name</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static"> {{$oppor->lName}} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-4">Phone</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static"> {{$oppor->phone}} </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-4">Email</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static"> {{$oppor->email}} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-4">Company Name</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static"> {{$oppor->company_name}} </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-4">Company Website</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static"> {{$oppor->company_website}} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-4">Address</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static"> {{$oppor->address}} </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-4">City</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static"> {{$oppor->city}} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-4">State</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static"> {{$oppor->investmentregion->type}} </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-4">Country</label>
                                                <div class="col-md-8 row">
                                                    <p class="form-control-static"> {{$oppor->country}} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">What is the structure of the Current Capital Raise ?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->investmentstructure->type}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Investment Stage</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->investmentstage->type}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Sector</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->investmentsector->type}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <h6>How much capacity is left this round</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">What amount is still available ?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->investment_size}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">How much capital are you raising this round ?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->raising_capital}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <h4>Company</h4>
                            <hr>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Date Company Founded</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->company_found_date}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Brief description of company and the problem the company aims to solve</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->company_desc}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Products/Services</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->products_service}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Brief description of product(s)/service(s) offered and price point</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->products_service_desc}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <h4>Patents</h4>
                            <hr>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Do you have any patents?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->bpatent==0?'No':'Yes'}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            @if($oppor->bpatent == 1)
                            <h6>About Patent(s)</h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Brief description of patent</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->patent_desc}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Patent Status</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->patent_status}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Date Filed</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->date_field}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            @endif

                            <h4>MANAGEMENT TEAM</h4>
                            <hr>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Does the Owner have prior experience in the industry?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->prior_exp==0?'No':'Yes'}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Length of Time in Industry</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->length_time}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Prior Companies and Roles</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->prior_company_role}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Please provide details of outcome</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->outcome_detail}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Are there additional members of the Management Team ?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->additional_member==0?'No':'Yes'}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            @if($oppor->additional_member==1)
                            <h6>Management Team Members</h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Name</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->additional_member_name}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Team Member Biography and Prior Experience</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->members_bio_pior_exp}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Are restrictive covenants in place to prevent management team from joining competitor, soliciting clients, etc ?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->brestrict_convenant==0?'No':'Yes'}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            @if($oppor->brestrict_convenant==1)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Please describe restrictive covenants in place</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->restrict_convenant_desc}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            @endif
                            @endif

                            <h4>FINANCIAL INFORMATION</h4>
                            <hr>

                            @if($oppor->company_stage == 3)
                            <h6>Previous Year</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Previous Year Total Revenue</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->prev1_total_revenue}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Previous Year Total Expenses</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->prev1_total_expense}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Previous Year Total Revenue - Total Expenses</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->prev1_revenue_expense}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <h6>Current Year</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Current Year Total Revenue</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->cur_total_revenue}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Current Year Total Expenses</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->cur_total_expense}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Current Year Total Revenue - Total Expense</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->cur_revenue_expense}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <h6>Next Year</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Next Year Total Revenue</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->next_total_revenue}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Next Year Total Expenses</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->next_total_expense}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Next Year Total Revenue - Total Expenses</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->next_revenue_expense}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">What percent of current revenue is contractually recurring (vs. non-recurring)?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->percent_cur_revenue}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">How do you expect this structure to change over time? Please describe</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->expect_change_over}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Cash Balance of Company today</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->cash_balance}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Do you currently have debt?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->bhave_debt==0?'No':'Yes'}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            @if($oppor->bhave_debt==1)
                            <h6>Debt Details</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Creditor</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->debt_creditor}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Amount</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->debt_amount}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Type of Debt, Rate, Maturity, & Payment Terms</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->type_debt_rate_maturity_term}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            @endif

                            @else
                            <h6>Previous Year</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Previous Year Total Revenue</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->prev1_total_revenue}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Previous Year Total Expenses</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->prev1_total_expense}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Previous Year Total Revenue - Total Expenses</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->prev1_revenue_expense}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <h6>Current Year</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Current Year Total Revenue</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->cur_total_revenue}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Current Year Total Expenses</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->cur_total_expense}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Current Year Total Revenue - Total Expense</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->cur_revenue_expense}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <h6>Next Year</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Next Year Total Revenue</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->next_total_revenue}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Next Year Total Expenses</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->next_total_expense}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Next Year Total Revenue - Total Expenses</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->next_revenue_expense}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">What percent of current revenue is contractually recurring (vs. non-recurring)?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->percent_cur_revenue}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">How do you expect this structure to change over time? Please describe</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->expect_change_over}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Expected Cash Flow Break Even Date</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->expected_cash_flow_break_date}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Cash Balance of Company today</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->cash_balance}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Do you currently have debt?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->bhave_debt==0?'No':'Yes'}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            @if($oppor->bhave_debt==1)
                            <h6>Debt Details</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Creditor</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->debt_creditor}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Amount</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->debt_amount}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Type of Debt, Rate, Maturity, & Payment Terms</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->type_debt_rate_maturity_term}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            @endif
                            @endif

                            <h4>COMPETITORS</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Primary Competitors</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->primary_competitor}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Describe how are you differentiated from your competitors</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->differ_desc_competitor}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <h4>Customers</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Are current contracts in place with customers?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->bcur_contracts_customer==0?'No':'Yes'}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            @if($oppor->bcur_contracts_customer==1)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Number of customers today</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->num_customer}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Average contract revenue per customer</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->revenue_avg_customer}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <h6>Top five customers by percentage revenue</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Customer Name 1</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->customer_name_1}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Percentage of Revenue</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->percent_revenue_1}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Customer Name 2</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->customer_name_2}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Percentage of Revenue</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->percent_revenue_2}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Customer Name 3</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->customer_name_3}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Percentage of Revenue</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->percent_revenue_3}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Customer Name 4</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->customer_name_4}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Percentage of Revenue</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->percent_revenue_4}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Customer Name 5</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->customer_name_5}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Percentage of Revenue</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->percent_revenue_5}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">How long are contracts?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->contract_duration}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Cancellation Fee</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->cancellation_fee}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Do the contracts auto-renew?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->bcontract_autonew==0?'No':'Yes'}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Projected number of clients/contracts for the year</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->projected_num_client}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Client Acquisition Cost</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->client_acq_cost}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Lifetime Value of Customer</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->lifetime_val}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Briefly describe how you are marketing today</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->desc_marketing}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Briefly describe your current sales strategy today</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->desc_sales_strategy}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            @endif

                            <h4>CAPITAL</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Amount of Capital Business Began With</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->capital_amt_began}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">What is the timing of this capital raise?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->capital_raise_timing}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Expected Close Date</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->expected_close_date}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">What will the capital be used for?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->capital_used_for}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Have you had previous capital raises?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->bprevious_capital_raise==0?'No':'Yes'}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            @if($oppor->bprevious_capital_raise==1)
                            <h6>Please detail prior capital raises</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Date</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->prior_raise_date}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Amount Raised</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->prior_raised_amount}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Previous Investors</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->prior_investors}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Valuation</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->prior_valuation}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            @endif

                            <h6>Founder Capital Committed</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Does the founder have personal capital committed?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->bfounder_capital_commit==0?'No':'Yes'}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">How much?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->founder_capital_amount}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <h6>Future Capital Needs</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Do you expect any future capital raises?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->bexpect_future_raise==0?'No':'Yes'}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">How much?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->expect_future_raise_amount}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Estimated timing of future capital raises</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->estimated_timing_future_capital}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Use of additional funds</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->use_additional_fund}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            @if($oppor->company_stage == 2)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Did previous investors reinvest this round?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->bprevious_investor_reinvest==0?'No':'Yes'}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($oppor->bprevious_investor_reinvest==1)
                            
                            <div class="row">
                                <h6>Previous investors reinvesting this round</h6>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Name of Investor</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->name_investor}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Amount Committed</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->amount_committed}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            @endif
                            @endif

                            <h4>VALUATION</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Current Post-Money Valuation</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->cur_postmoney_valuation}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Explanation of Valuation</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->explanation_valuation}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <h4>FUTURE OF COMPANY</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">What are your plans for growth?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->plan_for_growth}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Do you plan to exit the business in the future?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->bhave_plan_exit_business==0?'No':'Yes'}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if($oppor->bhave_plan_exit_business==1)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Anticipated Exit Date</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->anticipated_exit_date}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h6>Exit Strategy</h6>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Please describe exit strategy</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->exit_strategy}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Top Potential Acquirers</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->top_potential_acqu}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Revenue Target</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->revenue_target}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Net Income Target</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->net_income_target}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Exit Valuation</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->exit_valuation}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            @endif

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-left col-md-9">Prior Year Monthly Financials:</label>
                                        <div class="col-md-3">
                                            @if($oppor->prior_year_monthly_finacial)
                                            <a href="{{route('opportunity.file',['name' => $oppor->prior_year_monthly_finacial])}}">Check</a>
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
                                            @if($oppor->investor_deck)
                                            <a href="{{route('opportunity.file',['name' => $oppor->investor_deck])}}">Check</a>
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
                                            @if($oppor->proforma_projections)
                                            <a href="{{route('opportunity.file',['name' => $oppor->proforma_projections])}}">Check</a>
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
                                            @if($oppor->detailed_cap_table)
                                            <a href="{{route('opportunity.file',['name' => $oppor->detailed_cap_table])}}">Check</a>
                                            @else
                                            <p class="form-control-static">No File</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Submitted Time:</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->created_at}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-6">FIVE Network members that have met with this company :</label>
                                        <div class="col-md-6">
                                            <a href="#" data-toggle="modal" data-target="#date-modal" id="met_btn">{{$num_met}}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-6">FIVE Network members that are currently evaluating this opportunity :</label>
                                        <div class="col-md-6">
                                            <a href="#" data-toggle="modal" data-target="#date-modal" id="eval_btn">{{$num_evaluate}}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-6">FIVE Network members that are no longer evaluating this opportunity :</label>
                                        <div class="col-md-6">
                                            <a href="#" data-toggle="modal" data-target="#date-modal" id="noeval_btn">{{$num_noevaluate}}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-6">FIVE Network members that are open to discussing this opportunity :</label>
                                        <div class="col-md-6">
                                            <a href="#" data-toggle="modal" data-target="#date-modal" id="open_btn">{{$num_open}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">

                                        @if($matched_oppor->binterest == 0)
                                        <div class="offset-md-3 col-md-3">
                                            <button type="button" class="btn btn-sm btn-info" id="interest-btn"> <i class="fa fa-pencil"></i> Interest</button>
                                        </div>
                                        <div class="offset-md-3 col-md-3">
                                            <button type="button" class="btn btn-sm btn-danger" id="nointerest-btn"> <i class="fa fa-window-close"></i> No Interest</button>
                                        </div>
                                        @elseif($matched_oppor->binterest == 1)
                                        <div class="offset-md-6 col-md-6">
                                            <span class="badge badge-success ml-auto"> <i class="fa fa-pencil"></i> Interested</span>
                                        </div>
                                        @elseif($matched_oppor->binterest == 2)
                                        <div class="offset-md-6 col-md-6">
                                            <span class="badge badge-warning ml-auto"><i class="fa fa-window-close"></i> Not Interested</span>
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


    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

</div>

<div id="date-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">FIVE Member Feedback</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row"  id="date-modal-content">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="{{route('member.interest-dealroom-opportunity')}}" method="POST" id="interest-form">
    @csrf
    <input type="hidden" name="id" value="{{$matched_oppor->id}}">
</form>
<form action="{{route('member.no-interest-dealroom-opportunity')}}" method="POST" id="no-interest-form">
    @csrf
    <input type="hidden" name="id" value="{{$matched_oppor->id}}">
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
<script src="{{asset('assets/dashboard/plugins/checkbox-tree/hummingbird-treeview.js')}}"></script>
<script type="text/javascript">
    $(".treeview").hummingbird();
    $(document).on("click","#back-btn",function(e){
        e.preventDefault();
        window.history.back();
    });
</script>
<script type="text/javascript">
    $(document).on("click","#interest-btn",function(){
        $("#interest-form").submit();
    });

    $(document).on("click","#nointerest-btn",function(){
        $("#no-interest-form").submit();
    });

    
    $(document).on("click", "#met_btn", function(){
        var content = "";
        @if(count($date_met)>0)
        @foreach($date_met as $date)
        content = content + "<label class=\"control-label text-right col-md-6\">Five Network member met with this company : </label><div class=\"col-md-6\"><p class=\"form-control-static\">" + "{{$date}}" +"</p></div>";
        @endforeach
        @else
        content = "No Date";
        @endif
        $("#date-modal-content").html(content);
    });

    $(document).on("click", "#eval_btn", function(){
        
        var content = "";
        @if(count($date_eval)>0)
        @foreach($date_eval as $date)
        content = content + "<label class=\"control-label text-right col-md-6\">FIVE Network member currently evaluating this opportunity : </label><div class=\"col-md-6\"><p class=\"form-control-static\">" + "{{$date}}" +"</p></div>";
        @endforeach
        @else
        content = "No Date";
        @endif
        $("#date-modal-content").html(content);
    });

    $(document).on("click", "#noeval_btn", function(){
        
        var content = "";
        @if(count($date_noeval)>0)
        @foreach($date_noeval as $date)
        content = content + "<label class=\"control-label text-right col-md-6\">FIVE Network member no longer evaluating this opportunity : </label><div class=\"col-md-6\"><p class=\"form-control-static\">" + "{{$date}}" +"</p></div>";
        @endforeach
        @else
        content = "No Date";
        @endif
        $("#date-modal-content").html(content);
    });

    $(document).on("click", "#open_btn", function(){
        
        var content = "";
        @if(count($date_open)>0)
        @foreach($date_open as $date)
        content = content + "<label class=\"control-label text-right col-md-6\">FIVE Network member is open to discussing this opportunity : </label><div class=\"col-md-6\"><p class=\"form-control-static\">" + "{{$date}}" +"</p></div>";
        @endforeach
        @else
        content = "No Date";
        @endif
        $("#date-modal-content").html(content);
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