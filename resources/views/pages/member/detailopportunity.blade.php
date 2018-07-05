@extends('layouts.member')
@section('member-css')

@endsection


@section('member-content')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Detailed Opportunity</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Detailed Opportunity</li>
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
        <div class="col-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">
                            <h4 class="m-b-0 text-white">Submitted Opportunity Info</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" role="form" >
                        <div class="form-body">
                            <h3 class="box-title">Submitted Opportunity Info</h3>
                            <hr class="m-t-0 m-b-40">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Would you like to remain anonymous?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->bremain_anonymous == 0? 'No':'Yes'}} </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4"></label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->name_remain_anonymous}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Do you prefer co-investors reach out to your or alternative contact?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->reachout_method == 0? 'No':'Yes'}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Contact Email:</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->contact_email}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Project Name:</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->project_name}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Company Description:</label>
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
                                        <label class="control-label text-right col-md-4">Head Quarter location:</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->headquater_loc}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Operations locations:</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->operation_loc}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Sectors, Sub-sectors & Specialization:</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->sector_subsector_specialization}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Investment Structure:</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->investment_structure_type->type}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Independent Sponsor:</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->independent_sponsor}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Stakes offered:</label>
                                        <div class="col-md-8">
                                            @if($oppor->offered_stake == 0)
                                            <p class="form-control-static">Less Than 50%</p>
                                            @elseif($oppor->offered_stake == 1)
                                            <p class="form-control-static">More Than 50%</p>
                                            @elseif($oppor->offered_stake == 2)
                                            <p class="form-control-static">100%</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Amount of Investment Seeking:</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> $ {{$oppor->amount_seeking_investment}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Revenue:</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->revenue}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">EBITDA:</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->EBITDA}} </p>
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
                                            <p class="form-control-static"> {{$oppor->valuation}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Structure/Terms:</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->structure_term}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Additional Commentary:</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$oppor->additional_commentary}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
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

                        </div>
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
                                            <button type="button" class="btn btn-sm btn-info"> <i class="fa fa-pencil"></i> Interested</button>
                                        </div>
                                        @elseif($matched_oppor->binterest == 2)
                                        <div class="offset-md-6 col-md-6">
                                            <button type="button" class="btn btn-sm btn-danger"><i class="fa fa-window-close"></i> Not Interested</button>
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

<form action="{{route('member.interest-opportunity')}}" method="POST" id="interest-form">
    @csrf
    <input type="hidden" name="id" value="{{$matched_oppor->id}}">
</form>
<form action="{{route('member.no-interest-opportunity')}}" method="POST" id="no-interest-form">
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
<script type="text/javascript">
    $(document).on("click","#interest-btn",function(){
        $("#interest-form").submit();
    });

    $(document).on("click","#nointerest-btn",function(){
        $("#no-interest-form").submit();
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