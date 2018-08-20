@extends('layouts.admin')
@section('admin-css')

@endsection


@section('admin-content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Check Members Who were Removed</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">pages</li>
            <li class="breadcrumb-item active">Check Members Who were Removed</li>
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
                    <h4 class="card-title">Members Who were Removed</h4>
                    <h6 class="card-subtitle">You can check members who were Removed.</h6>
                    <div class="table-responsive m-t-40">
                        <table id="allow-apply" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Region of focus</th>
                                    <th>Sector of Focus</th>
                                    <th>Typical Check Size</th>
                                    <th>Area of Family/Investor Expertise</th>
                                    <th>Net Worth</th>
                                    <th>Applied Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Region of focus</th>
                                    <th>Sector of Focus</th>
                                    <th>Typical Check Size</th>
                                    <th>Area of Family/Investor Expertise</th>
                                    <th>Net Worth</th>
                                    <th>Applied Time</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if($users->count()>0)
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$user->fName.' '.$user->lName}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if($user->investmentregion)
                                            @foreach($user->investmentregion as $ir)
                                                <span class="badge badge-success">{{$ir->type->type}}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->investmentsector)
                                            @foreach($user->investmentsector as $isr)
                                                <span class="badge badge-info">{{$isr->type->type}}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->investmentsize)
                                            @foreach($user->investmentsize as $isz)
                                                <span class="badge badge-warning">{{$isz->type->type}}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>{{$user->area_family_investor_expertise}}</td>
                                    <td>{{$user->networth_aum}}</td>
                                    <td>{{$user->updated_at}}</td>
                                    <td><a  href="{{route('admin.membership-detail',['id'=>$user->id])}}" class="btn btn-info btn-sm btn-block text-uppercase waves-effect waves-light">Check</a></td>
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