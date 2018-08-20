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

@php
    $match = App\Model\MemberSimpleOpportunityMatch::where('opportunity_id', $oppor->id)->get();
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

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-4 align-self-center">
        <h3 class="text-themecolor">Submitted Investment Opportunity to Deal Room</h3>
    </div>
    <div class="col-md-4 align-self-center text-center">
        <!-- <div class="row text-center"> -->
            <img src="{{asset('logo.png')}}" width="200" height="150" alt="homepage" class="dark-logo" />
        <!-- </div> -->
        
    </div>
    <div class="col-md-4 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Submitted Investment Opportunity to Deal Room</li>
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
        <div class="col-md-3">
            <button type="button" class="btn btn-info" id="back-btn"><i class="ti-back-left">Back</i></button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Submitted Investment Opportunity to Deal Room</h4>
                    
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
                                <h3 class="box-title">Investment Opportunity Info</h3>
                                <hr class="m-t-0 m-b-40">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-4">Company name:</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static"> {{$oppor->company_name}} </p>
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
                                                <p class="form-control-static"> {{$oppor->fName.' '.$oppor->lName}} </p>
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
                                                <p class="form-control-static"> {{$oppor->email}} </p>
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
                                                <p class="form-control-static"> {{$oppor->phone}} </p>
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
                                                @if($oppor->company_stage == 1)
                                                Seed/Pre-Revenue
                                                @elseif($oppor->company_stage == 2)
                                                Early Stage/Venture Capital
                                                @elseif($oppor->company_stage == 3)
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
                                                <p class="form-control-static"> {{$oppor->investing_amount}} </p>
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
                                                <p class="form-control-static"> {{$oppor->raising_capital}} </p>
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
                                                <p class="form-control-static"> {{'$ '.number_format($oppor->investment_size, 0, '.',',')}} </p>
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
<form action="{{route('member.interest-simple-deal')}}" method="POST" id="interest-form">
    @csrf
    <input type="hidden" name="id" value="{{$matched_oppor->id}}">
</form>
<form action="{{route('member.no-interest-simple-deal')}}" method="POST" id="no-interest-form">
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