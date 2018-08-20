@extends('layouts.admin')
@section('admin-css')

@endsection


@section('admin-content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Check All Deal Room Opportunity</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">pages</li>
            <li class="breadcrumb-item active">Check All Deal Room Opportunity</li>
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
    <!-- <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Select one you will check</h4>
                    <h6 class="card-subtitle">You can select one you will check.</h6>
                    <div class="form-group">
                        <label>Select one to check</label>
                        <select id="choose-check" class="form-control">
                            <option>Select</option>
                            <option value="0">Non Co-Investment Questionnaire</option>
                            <option value="1">Simple Co-Investment Opportunity</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="row" id="nonco">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Company Submitted Investment Questionnaire Opportunities.</h4>
                    <h6 class="card-subtitle">You can check all Investment Questionnaire Opportunities.</h6>
                    <div class="table-responsive m-t-40">
                        <table id="allow-apply-nonco" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Company Name</th>
                                    <th>Submitted Time</th>
                                    <th>Status</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Company Name</th>
                                    <th>Submitted Time</th>
                                    <th>Status</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if($niqs->count()>0)
                                @foreach($niqs as $niq)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$niq->fName}}</td>
                                    <td>{{$niq->lName}}</td>
                                    <td>{{$niq->email}}</td>
                                    <td>{{$niq->company_name}}</td>
                                    <td>{{$niq->created_at}}</td>
                                    @if($niq->is_allowed == 0)
                                    <td><span class="badge badge-info">Not Checked</span></td>
                                    @elseif($niq->is_allowed == 1)
                                    <td><span class="badge badge-success">Allowed</span></td>
                                    @elseif($niq->is_allowed == 2)
                                    <td><span class="badge badge-warning">Denied</span></td>
                                    @endif
                                    <td>
                                        @if($niq->is_active == 1)
                                        <span class="badge badge-success">Active</span>
                                        @else
                                        <span class="badge badge-danger">Closed</span>
                                        @endif
                                    </td>
                                    <td><a  href="{{route('admin.noncoinvestment-detail',['id'=>$niq->id])}}" class="btn btn-info btn-sm btn-block text-uppercase waves-effect waves-light">Check</a></td>
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

    <div class="row" id="simple">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Member Submitted Investment Opportunities.</h4>
                    <h6 class="card-subtitle">You can Check Investment Opportunities.</h6>
                    <div class="table-responsive m-t-40">
                        <table id="allow-apply-simple" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Company Name</th>
                                    <th>Submitted Time</th>
                                    <th>Status</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Company Name</th>
                                    <th>Submitted Time</th>
                                    <th>Status</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if($msds->count()>0)
                                @foreach($msds as $msd)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$msd->user->fName}}</td>
                                    <td>{{$msd->user->lName}}</td>
                                    <td>{{$msd->user->email}}</td>
                                    <td>{{$msd->company_name}}</td>
                                    <td>{{$msd->created_at}}</td>
                                    @if($msd->is_allowed == 0)
                                    <td><span class="badge badge-info">Not Checked</span></td>
                                    @elseif($msd->is_allowed == 1)
                                    <td><span class="badge badge-success">Allowed</span></td>
                                    @elseif($msd->is_allowed == 2)
                                    <td><span class="badge badge-warning">Denied</span></td>
                                    @endif
                                    <td>
                                        @if($msd->is_active == 1)
                                        <span class="badge badge-success">Active</span>
                                        @else
                                        <span class="badge badge-danger">Closed</span>
                                        @endif
                                    </td>
                                    <td><a  href="{{route('admin.check-simple-deal',['id'=>$msd->id])}}" class="btn btn-info btn-sm btn-block text-uppercase waves-effect waves-light">Check</a></td>
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
	// $( "#choose-check" ).change(function() {
 //        if($( "#choose-check" ).val() == 0){
 //            $("#nonco").show();
 //            $("#simple").hide();
 //        }
 //        else if($( "#choose-check" ).val() == 1) {
 //            $("#nonco").hide();
 //            $("#simple").show();
 //        }else{
 //            $("#nonco").hide();
 //            $("#simple").hide();
 //        }
 //    });

    $('#allow-apply-nonco').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('#allow-apply-simple').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>
@endsection