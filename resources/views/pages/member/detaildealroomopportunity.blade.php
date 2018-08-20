@extends('layouts.member')
@section('member-css')

@endsection


@section('member-content')
@php
    $match = App\Model\MemberSimpleOpportunityMatch::where('opportunity_id', $request->id)->get();
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
        <h3 class="text-themecolor">Submitted Deal Room Opportuniy</h3>
    </div>
    <div class="col-md-4 align-self-center text-center">
        <!-- <div class="row text-center"> -->
            <img src="{{asset('logo.png')}}" width="200" height="150" alt="homepage" class="dark-logo" />
        <!-- </div> -->
        
    </div>
    <div class="col-md-4 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Submitted Deal Room Opportunity</li>
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
                    <h4 class="card-title">Submitted Deal Room Opportunity</h4>
                    
                    <div class="card-body">
                        <form class="form-horizontal" role="form" >
                            <div class="form-body">
                                <h3 class="box-title">Deal Room Opportunity Info</h3>
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
                                                <p class="form-control-static"> {{$request->fName.' '.$request->lName}} </p>
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
                                                <p class="form-control-static"> {{$request->raising_capital}} </p>
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
                                                <p class="form-control-static"> {{'$ '.number_format($request->investment_size, 0, '.',',')}} </p>
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

<div id="date-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Express Date List</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-6">Express Date List</label>
                            <div class="col-md-6" id="date-modal-content">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="{{route('member.close-simple-deal')}}" method="POST" id="close-request-form">
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

    $(document).on("click","#back-btn",function(e){
        e.preventDefault();
        window.history.back();
    });

    $(document).on("click", "#met_btn", function(){
        
        var content = "";
        @if(count($date_met)>0)
        @foreach($date_met as $date)
        content = content + "<p class=\"form-control-static\">" + "{{$date}}" +"</p>";
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
        content = content + "<p class=\"form-control-static\">" + "{{$date}}" +"</p>";
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
        content = content + "<p class=\"form-control-static\">" + "{{$date}}" +"</p>";
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
        content = content + "<p class=\"form-control-static\">" + "{{$date}}" +"</p>";
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