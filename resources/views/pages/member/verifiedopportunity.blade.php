@extends('layouts.member')
@section('member-css')

@endsection


@section('member-content')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-4 align-self-center">
        <h3 class="text-themecolor">FIVE Network Matched Opportunities</h3>
    </div>
    <div class="col-md-4 align-self-center text-center">
        <!-- <div class="row text-center"> -->
            <img src="{{asset('logo.png')}}" width="200" height="150" alt="homepage" class="dark-logo" />
        <!-- </div> -->
        
    </div>
    <div class="col-md-4 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">FIVE Network Matched Opportunities</li>
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
                <div class="card-header">
                    <div class="card-actions">
                        <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                        <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">FIVE Network Matched Opportunities</h4>
                    <h6>Below are opportunities that have been submitted to the FIVE Network that match your Investment Profile. Please review and indicate if you are interested in learning more from the company or founder.</h6>
                    <div class="table-responsive m-t-40">
                        <table id="allow-apply" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Opportunity</th>
                                    <th>Type</th>
                                    <th>Investment Stage</th>
                                    <th>Investment Sector</th>
                                    <th>Investment Region</th>
                                    <th>How much capacity is left this round</th>
                                    <th>Submitted Time</th>
                                    <th>Interested</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Opportunity</th>
                                    <th>Type</th>
                                    <th>Investment Stage</th>
                                    <th>Investment Sector</th>
                                    <th>Investment Region</th>
                                    <th>How much capacity is left this round</th>
                                    <th>Submitted Time</th>
                                    <th>Interested</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if($oppors->count()>0)
                                    @foreach($oppors as $each)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td><a href="{{route('member.detail-investment-questionnaire',['code' => $each->opportunity->code])}}">{{$each->opportunity->company_name}} <i class="fa fa-share"></i></a></td>
                                        <td><span class="badge badge-success ml-auto">Co-Invest</span></td>
                                        <td>{{$each->opportunity->investmentstage->type}}</td>
                                        <td>{{$each->opportunity->investmentsector->type}}</td>
                                        <td>{{$each->opportunity->investmentregion->type}}</td>
                                        <td>{{$each->opportunity->investment_size}}</td>
                                        
                                        <td>{{$each->opportunity->created_at}}</td>
                                        <td>
                                            @if($each->binterest == 0)
                                            <span class="badge badge-info ml-auto">Not Expressed</span>
                                            @elseif($each->binterest == 1)
                                            <span class="badge badge-success ml-auto">Interested</span>
                                            @elseif($each->binterest == 2)
                                            <span class="badge badge-warning ml-auto">Not Interested</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                                @if($deals->count()>0)
                                    @foreach($deals as $each)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td><a href="{{route('member.detail-investment-questionnaire',['code' => $each->opportunity->code])}}">{{$each->opportunity->company_name}} <i class="fa fa-share"></i></a></td>
                                        <td><span class="badge badge-success ml-auto">Deal Room</span></td>
                                        <td>{{$each->opportunity->investmentstage->type}}</td>
                                        <td>{{$each->opportunity->investmentsector->type}}</td>
                                        <td>{{$each->opportunity->investmentregion->type}}</td>
                                        <td>{{'$ '.number_format($each->opportunity->investment_size, 0, '.',',')}}</td>
                                        
                                        <td>{{$each->opportunity->created_at}}</td>
                                        <td>
                                            @if($each->binterest == 0)
                                            <span class="badge badge-info ml-auto">Not Expressed</span>
                                            @elseif($each->binterest == 1)
                                            <span class="badge badge-success ml-auto">Interested</span>
                                            @elseif($each->binterest == 2)
                                            <span class="badge badge-warning ml-auto">Not Interested</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                                @if($simples->count()>0)
                                    @foreach($simples as $each)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td><a href="{{route('member.detail-investment-questionnaire',['code' => $each->opportunity->code])}}">{{$each->opportunity->company_name}} <i class="fa fa-share"></i></a></td>
                                        <td><span class="badge badge-success ml-auto">Deal Room</span></td>
                                        <td>
                                            @if($each->opportunity->company_stage == 1)
                                            Seed/Pre-Revenue
                                            @elseif($each->opportunity->company_stage == 2)
                                            Early Stage/Venture Capital
                                            @elseif($each->opportunity->company_stage == 3)
                                            Private Equity
                                            @endif 
                                        </td>
                                        <td>{{$each->opportunity->investmentsector->type}}</td>
                                        <td>{{$each->opportunity->investmentregion->type}}</td>
                                        <td>{{'$ '.number_format($each->opportunity->investment_size, 0, '.',',')}}</td>
                                        
                                        <td>{{$each->opportunity->created_at}}</td>
                                        <td>
                                            @if($each->binterest == 0)
                                            <span class="badge badge-info ml-auto">Not Expressed</span>
                                            @elseif($each->binterest == 1)
                                            <span class="badge badge-success ml-auto">Interested</span>
                                            @elseif($each->binterest == 2)
                                            <span class="badge badge-warning ml-auto">Not Interested</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
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
<script src="{{asset('assets/dashboard/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<!-- end - This is for export functionality only -->
<script type="text/javascript">
    $('#allow-apply').DataTable();
</script>
@endsection