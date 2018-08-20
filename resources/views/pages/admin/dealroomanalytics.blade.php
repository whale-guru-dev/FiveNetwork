@extends('layouts.admin')
@section('admin-css')

@endsection


@section('admin-content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Deal Room Analytics</h3>
    </div> 
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">pages</li>
            <li class="breadcrumb-item active">Deal Room Analytics</li>
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
    <!-- =============================== =============================== -->
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
                    <h4 class="card-title">Non Co-Investment Questionnaire Analytics</h4>
                    <h6 class="card-subtitle">You can check matched opportunities.</h6>
                    <div class="table-responsive m-t-40">
                        <table id="allow-apply-nonco" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Company Name</th>
                                    <th>Submitted Time</th>
                                    <th>Status</th>
                                    <th>FIVE Network members that have met with this company</th>
                                    <th>FIVE Network members that are currently evaluating this opportunity</th>
                                    <th>FIVE Network members that are no longer evaluating this opportunity</th>
                                    <th>FIVE Network members that are open to discussing this opportunity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Company Name</th>
                                    <th>Submitted Time</th>
                                    <th>Status</th>
                                    <th>FIVE Network members that have met with this company</th>
                                    <th>FIVE Network members that are currently evaluating this opportunity</th>
                                    <th>FIVE Network members that are no longer evaluating this opportunity</th>
                                    <th>FIVE Network members that are open to discussing this opportunity</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if(count($oppors)>0)
                                    @foreach($oppors as $each)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            {{$each->fName.' '.$each->lName}}
                                        </td>
                                        <td>
                                            {{$each->email}}
                                        </td>
                                        <td>{{$each->company_name}}</td>
                                        <td>{{$each->created_at}}</td>
                                        <td>
                                            @if($each->is_active == 0)
                                            <span class="badge badge-danger">Closed</span>
                                            @else
                                            <span class="badge badge-info">Active</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{$nums[$each->code]['num_met']}}
                                        </td>
                                        <td>
                                            {{$nums[$each->code]['num_evaluate']}}
                                        </td>
                                        <td>
                                            {{$nums[$each->code]['num_noevaluate']}}
                                        </td>
                                        <td>
                                            {{$nums[$each->code]['num_open']}}
                                        </td>
                                        <td><a href="{{route('admin.check-dealroom-match',['id' => $each->id])}}" class="btn btn-info btn-sm btn-block text-uppercase waves-effect waves-light">Check Match</a></td>
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
                    <h4 class="card-title">Check Simple Co-Invesetment Opportunity</h4>
                    <h6 class="card-subtitle">You can Check Simple Co-Invesetment Opportunity.</h6>
                    <div class="table-responsive m-t-40">
                        <table id="allow-apply-simple" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Company Name</th>
                                    <th>Submitted Time</th>
                                    <th>Status</th>
                                    <th>FIVE Network members that have met with this company</th>
                                    <th>FIVE Network members that are currently evaluating this opportunity</th>
                                    <th>FIVE Network members that are no longer evaluating this opportunity</th>
                                    <th>FIVE Network members that are open to discussing this opportunity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Company Name</th>
                                    <th>Submitted Time</th>
                                    <th>Status</th>
                                    <th>FIVE Network members that have met with this company</th>
                                    <th>FIVE Network members that are currently evaluating this opportunity</th>
                                    <th>FIVE Network members that are no longer evaluating this opportunity</th>
                                    <th>FIVE Network members that are open to discussing this opportunity</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if($msds->count()>0)
                                @foreach($msds as $msd)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$msd->user->fName.' '.$msd->user->lName}}</td>
                                    <td>{{$msd->user->email}}</td>
                                    <td>{{$msd->company_name}}</td>
                                    <td>{{$msd->created_at}}</td>
                                    <td>
                                        @if($each->is_active == 0)
                                        <span class="badge badge-danger">Closed</span>
                                        @else
                                        <span class="badge badge-info">Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{$nums1[$msd->code]['num_met']}}
                                    </td>
                                    <td>
                                        {{$nums1[$msd->code]['num_evaluate']}}
                                    </td>
                                    <td>
                                        {{$nums1[$msd->code]['num_noevaluate']}}
                                    </td>
                                    <td>
                                        {{$nums1[$msd->code]['num_open']}}
                                    </td>
                                    <td><a  href="{{route('admin.check-simpledeal-match',['id'=>$msd->id])}}" class="btn btn-info btn-sm btn-block text-uppercase waves-effect waves-light">Check</a></td>
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
</div>
@endsection

@section('admin-js')
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
    //     if($( "#choose-check" ).val() == 0){
    //         $("#nonco").show();
    //         $("#simple").hide();
    //     }
    //     else if($( "#choose-check" ).val() == 1) {
    //         $("#nonco").hide();
    //         $("#simple").show();
    //     }else{
    //         $("#nonco").hide();
    //         $("#simple").hide();
    //     }
    // });

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