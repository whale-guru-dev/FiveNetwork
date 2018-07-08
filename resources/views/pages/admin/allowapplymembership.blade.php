@extends('layouts.admin')
@section('admin-css')

@endsection


@section('admin-content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Allow To Apply Membership</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">pages</li>
            <li class="breadcrumb-item active">Allow To Apply Membership</li>
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
                    <h4 class="card-title">Users Who Sent Request Access</h4>
                    <h6 class="card-subtitle">You can allow user to apply membership.</h6>
                    <div class="table-responsive m-t-40">
                        <table id="allow-apply" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Request Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Request Time</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if($users->count()>0)
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td><button id="btn-allow-apply" data-id="{{$user->id}}" type="submit" class="btn btn-info btn-sm btn-block text-uppercase waves-effect waves-light">Allow</button><br><button id="btn-deny-apply" data-id="{{$user->id}}" type="submit" class="btn btn-danger btn-sm btn-block text-uppercase waves-effect waves-light">Deny</button></td>
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
    <form id="allow-apply-form" action="{{route('admin.allow.apply')}}" method="POST">
        @csrf
        <input type="hidden" name="id" id="apply-id">
    </form>

    <form id="deny-apply-form" action="{{route('admin.deny.apply')}}" method="POST">
        @csrf
        <input type="hidden" name="id" id="deny-id">
    </form>

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
    $(document).on("click","#btn-allow-apply",function(){
        $("#apply-id").val($(this).data('id'));
        $("#allow-apply-form").submit();
    });

    $(document).on("click","#btn-deny-apply",function(){
        $("#deny-id").val($(this).data('id'));
        $("#deny-apply-form").submit();
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