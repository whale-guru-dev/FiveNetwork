@extends('layouts.member')
@section('member-css')

@endsection


@section('member-content')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-4 align-self-center">
        <h3 class="text-themecolor">My Verified Opportunity</h3>
    </div>
    <div class="col-md-4 align-self-center text-center">
        <!-- <div class="row text-center"> -->
            <img src="{{asset('logo.png')}}" width="200" height="150" alt="homepage" class="dark-logo" />
        <!-- </div> -->
        
    </div>
    <div class="col-md-4 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">My Verified Opportunity</li>
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
                    <h4 class="card-title">My Verified Opportunity</h4>
                    
                    <div class="table-responsive m-t-40">
                        <table id="allow-apply" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Opportunity</th>
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
                                    <td>{{$i++}}</td>
                                    <td><a href="{{route('member.opportunity-detail',['id' => $each->opportunity_id])}}">{{$each->opportunity->company_name}} <i class="fa fa-share"></i></a></td>
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