@extends('layouts.admin')
@section('admin-css')

@endsection


@section('admin-content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Check Opportunity Match</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">pages</li>
            <li class="breadcrumb-item active">Check Opportunity Match</li>
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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Check Opportunity Match - {{$name}}</h4>
                    <h6 class="card-subtitle">You can check opportunity matching info and approve it to send email with highlight.</h6>
                    <div class="table-responsive m-t-40">
                        <table id="allow-apply" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Family Name</th>
                                    <th>Family Email</th>
                                    <th>Matched Score</th>
                                    <th>Structure Match</th>
                                    <th>State Match</th>
                                    <th>Stage Match</th>
                                    <th>Sector Match</th>
                                    <th>Size Match</th>
                                    <th>Interested</th>
                                    <th>Member met with this opportunity</th>
                                    <th>Member evaluating with this opportunity</th>
                                    <th>Member no longer evaluating with this opportunity</th>
                                    <th>Member open to discuss with this opportunity</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Family Name</th>
                                    <th>Family Email</th>
                                    <th>Matched Score</th>
                                    <th>Structure Match</th>
                                    <th>State Match</th>
                                    <th>Stage Match</th>
                                    <th>Sector Match</th>
                                    <th>Size Match</th>
                                    <th>Interested</th>
                                    <th>Member met with this opportunity</th>
                                    <th>Member evaluating with this opportunity</th>
                                    <th>Member no longer evaluating with this opportunity</th>
                                    <th>Member open to discuss with this opportunity</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if($matchinfo->count()>0)
                                @foreach($matchinfo as $each)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$each->matchedMember->fName.' '.$each->matchedMember->lName}}</td>
                                    <td>{{$each->matchedMember->email}}</td>
                                    <td>
                                        
                                        @if($each->score == 100)
                                        <span class="badge badge-success">{{$each->score}} %</span>
                                        @elseif($each->score == 80)
                                        <span class="badge badge-info">{{$each->score}} %</span>
                                        @elseif($each->score == 60)
                                        <span class="badge badge-primary">{{$each->score}} %</span>
                                        @elseif($each->score == 40)
                                        <span class="badge badge-warning">{{$each->score}} %</span>
                                        @elseif($each->score == 20)
                                        <span class="badge badge-danger">{{$each->score}} %</span>
                                        @elseif($each->score == 0)
                                        <span class="badge badge-danger">{{$each->score}} %</span>
                                        @endif
                                    </td>
                                    <td>
                                        
                                        @if($each->matched_structure==1)
                                        <span class="badge badge-success">Matched</span>
                                        @else
                                        <span class="badge badge-danger">Unmatched</span>
                                        @endif
                                    </td>
                                    <td>
                                        
                                        @if($each->matched_state==1)
                                        <span class="badge badge-success">Matched</span>
                                        @else
                                        <span class="badge badge-danger">Unmatched</span>
                                        @endif
                                    </td>
                                    <td>
                                        
                                        @if($each->matched_stage==1)
                                        <span class="badge badge-success">Matched</span>
                                        @else
                                        <span class="badge badge-danger">Unmatched</span>
                                        @endif
                                    </td>
                                    <td>
                                        
                                        @if($each->matched_sector==1)
                                        <span class="badge badge-success">Matched</span>
                                        @else
                                        <span class="badge badge-danger">Unmatched</span>
                                        @endif
                                    </td>
                                    <td>
                                        
                                        @if($each->matched_size==1)
                                        <span class="badge badge-success">Matched</span>
                                        @else
                                        <span class="badge badge-danger">Unmatched</span>
                                        @endif
                                    </td>
                                    <td>
                                    	@if($each->binterest == 0)
                                    	<span class="badge badge-info ml-auto">Not Expressed</span>
                                    	@elseif($each->binterest == 1)
                                    	<span class="badge badge-success ml-auto">Interested</span>
                                    	@elseif($each->binterest == 2)
                                    	<span class="badge badge-warning ml-auto">Not Interested</span>
                                    	@endif
                                    </td>
                                    <td>
                                        @if($each->bmet == 0)
                                        <span class="badge badge-warning ml-auto">No</span>
                                        @else
                                        <span class="badge badge-success ml-auto">Yes</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($each->bevaluat == 0)
                                        <span class="badge badge-warning ml-auto">No</span>
                                        @else
                                        <span class="badge badge-success ml-auto">Yes</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($each->bnoevaluate == 0)
                                        <span class="badge badge-warning ml-auto">No</span>
                                        @else
                                        <span class="badge badge-success ml-auto">Yes</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($each->bopen == 0)
                                        <span class="badge badge-warning ml-auto">No</span>
                                        @else
                                        <span class="badge badge-success ml-auto">Yes</span>
                                        @endif
                                    </td>
                                    <td>{{$each->express_date}}</td>
                                    <td>
                                    	@if($each->is_allowed == 0)
                                    	<button class="btn waves-effect waves-light btn-sm btn-success" data-id="{{$each->id}}" id="approve-btn">Approve to Send Email</button>
                                    	@elseif($each->is_allowed == 1)
										<span class="badge badge-success ml-auto">Allowed</span>
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
</div>

<form action="{{route('admin.approve-opportunity-match')}}" method="POST" id="approve-form">
    @csrf
	<input type="hidden" name="id" id="approve-id">
</form>
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

    $(document).on("click","#approve-btn", function(){
    	var id = $(this).data('id');
    	$("#approve-id").val(id);
    	$("#approve-form").submit();
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