@extends('layouts.admin')
@section('admin-css')

@endsection


@section('admin-content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Opportunity Analytics</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item">pages</li>
            <li class="breadcrumb-item active">Opportunity Analytics</li>
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
                    <h4 class="card-title">Opportunity Analytics</h4>
                    <h6 class="card-subtitle">You can check matched opportunities.</h6>
                    <div class="table-responsive m-t-40">
                        <table id="allow-apply" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Opportunity</th>
                                    <th>Submitted Member</th>
                                    <th>Matched Family</th>
                                    <th>Matched Score</th>
                                    <th>Submitted Time</th>
                                    <th>Interested</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Opportunity</th>
                                    <th>Submitted Member</th>
                                    <th>Matched Family</th>
                                    <th>Matched Score</th>
                                    <th>Submitted Time</th>
                                    <th>Interested</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if($oppors->count()>0)
                                	@foreach($oppors as $each)
									<td>{{$i++}}</td>
                                    <td><a href="{{route('admin.opportunity-detail',['id' => $each->opportunity_id])}}">{{$each->opportunity->project_name}} <i class="fa fa-share"></i></a></td>
                                    <td><a href="{{route('admin.membership-detail',['id' => $each->opportunity->user->id])}}">{{$each->opportunity->user->fName.' '.$each->opportunity->user->lName}} <i class="fa fa-share"></i></a></td>
                                    <td><a href="{{route('admin.membership-detail',['id' => $each->matchedMember->id])}}">{{$each->matchedMember->fName.' '.$each->matchedMember->lName}} <i class="fa fa-share"></i></a></td>
                                    <td>{{$each->score}}</td>
                                    <td>{{$each->opportunity->created_at}}</td>
                                    @if($each->binterest == 0)
                                    <td>Not Expressed</td>
                                    @elseif($each->binterest == 1)
                                    <td>Interested</td>
                                    @elseif($each->binterest == 2)
                                    <td>Not Interested</td>
                                    @endif
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
	$('#allow-apply').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>
@endsection