@extends('layouts.admin')
@section('admin-css')

@endsection


@section('admin-content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Co-Investment Opportunities Submitted</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">pages</li>
            <li class="breadcrumb-item active">Co-Investment Opportunities Submitted</li>
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
                    <h4 class="card-title">All Requests</h4>
                    <h6 class="card-subtitle">You can check member's Request For Submit Opportunity.</h6>
                    <div class="table-responsive m-t-40">
                        <table id="allow-apply" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Family Office Name</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Company Name</th>
                                    <th>Contact Name</th>
                                    <th>Contact Email</th>
                                    <th>Phone Number</th>
                                    <th>Company Stage</th>
                                    <th>Investment Sector</th>
                                    <th>Investment Region</th>
                                    <th>Investment Structure</th>
                                    <th>Amount they are investing</th>
                                    <th>Total Investment company is looking to raise</th>
                                    <th>Available capacity for FIVE Network members</th>
                                    <th>Required Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Family Office Name</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Company Name</th>
                                    <th>Contact Name</th>
                                    <th>Contact Email</th>
                                    <th>Phone Number</th>
                                    <th>Company Stage</th>
                                    <th>Investment Sector</th>
                                    <th>Investment Region</th>
                                    <th>Investment Structure</th>
                                    <th>Amount they are investing</th>
                                    <th>Total Investment company is looking to raise</th>
                                    <th>Available capacity for FIVE Network members</th>
                                    <th>Required Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if($requests->count()>0)
                                @foreach($requests as $request)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$request->user->family_office_name}}</td>
                                    <td>{{$request->user->fName}}</td>
                                    <td>{{$request->user->lName}}</td>
                                    <td>{{$request->user->email}}</td>
                                    <td>{{$request->company_name}}</td>
                                    <td>{{$request->contact_name}}</td>
                                    <td>{{$request->email}}</td>
                                    <td>{{$request->phone}}</td>
                                    <td>
                                        @if($request->company_stage == 1)
                                            Seed/Pre-Revenue
                                        @elseif($request->company_stage == 2)
                                            Early Stage/Venture Capital
                                        @elseif($request->company_stage == 3)
                                            Private Equity
                                        @endif
                                    </td>
                                    <td>{{$request->investmentsector->type}}</td>
                                    <td>{{$request->investmentregion->type}}</td>
                                    <td>{{$request->investmentstructure->type}}</td>
                                    <td>{{$request->investing_amount}}</td>
                                    <td>{{$request->raising}}</td>
                                    <td>{{'$ '.number_format($request->valuation, 0, '.',',')}}</td>
                                    <td>{{$request->created_at}}</td>
                                    <td>
                                        @if($request->is_active == 1)
                                        <span class="badge badge-success">Active</span>
                                        @else
                                        <span class="badge badge-danger">Closed</span>
                                        @endif
                                    </td>
                                    <td><a  href="{{route('admin.requestopportunity-detail',['id'=>$request->id])}}" class="btn btn-info btn-sm btn-block text-uppercase waves-effect waves-light">Check</a></td>
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
@endsection

@section('admin-js')
<!-- This is data table -->
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
    $('#allow-apply').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

</script>
@endsection