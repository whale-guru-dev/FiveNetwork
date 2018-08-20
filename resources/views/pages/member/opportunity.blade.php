@extends('layouts.member')
@section('member-css')

@endsection


@section('member-content')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-4 align-self-center">
        <h3 class="text-themecolor">Investment Opportunity</h3>
    </div>
    <div class="col-md-4 align-self-center text-center">
        <!-- <div class="row text-center"> -->
            <img src="{{asset('logo.png')}}" width="200" height="150" alt="homepage" class="dark-logo" />
        <!-- </div> -->
        
    </div>
    <div class="col-md-4 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Investment Opportunity</li>
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
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Investment Opportunity</h4>
                    
                    <div class="table-responsive m-t-40">
                        <table id="allow-apply" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Company Name</th>
                                    <th>Company Stage</th>
                                    <th>Amount you are investing</th>
                                    <th>Requested Time</th>
                                    <th>Status</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Company Name</th>
                                    <th>Company Stage</th>
                                    <th>Amount you are investing</th>
                                    <th>Requested Time</th>
                                    <th>Status</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if($requests->count()>0)
                                @foreach($requests as $request)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$request->company_name}}</td>
                                    <td>
                                        @if($request->company_stage == 1)
                                        <span class="badge badge-info">Seed/Pre-Revenue</span>
                                        @elseif($request->company_stage == 2)
                                        <span class="badge badge-success">Early Stage/Venture Capital</span>
                                        @elseif($request->company_stage == 3)
                                        <span class="badge badge-warning">Private Equity</span>
                                        @endif
                                    </td>
                                    <td>{{$request->investing_amount}}</td>
                                    <td>{{$request->user->updated_at}}</td>
                                    <td>
                                        @if($request->is_accepted == 0)
                                        <span class="badge badge-info">Not Checked</span>
                                        @elseif($request->is_accepted == 1)
                                        <span class="badge badge-success">Allowed</span>
                                        @elseif($request->is_accepted == 2)
                                        <span class="badge badge-success">Denied</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($request->is_active == 1)
                                        <span class="badge badge-info">Active</span>
                                        @else
                                        <span class="badge badge-danger">Closed</span>
                                        @endif
                                    </td>                                    
                                    <td><a  href="{{route('member.requestopportunity-detail',['id'=>$request->id])}}" class="btn btn-info btn-sm btn-block text-uppercase waves-effect waves-light">Check</a></td>
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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Deal Room Opportunity</h4>
                    
                    <div class="table-responsive m-t-40">
                        <table id="allow-apply" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Company Name</th>
                                    <th>Company Stage</th>
                                    <th>Amount you are investing</th>
                                    <th>Requested Time</th>
                                    <th>Status</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Company Name</th>
                                    <th>Company Stage</th>
                                    <th>Amount you are investing</th>
                                    <th>Requested Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if($deals->count()>0)
                                @foreach($deals as $deal)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$deal->company_name}}</td>
                                    <td>
                                        @if($deal->company_stage == 1)
                                        <span class="badge badge-info">Seed/Pre-Revenue</span>
                                        @elseif($deal->company_stage == 2)
                                        <span class="badge badge-success">Early Stage/Venture Capital</span>
                                        @elseif($deal->company_stage == 3)
                                        <span class="badge badge-warning">Private Equity</span>
                                        @endif
                                    </td>
                                    <td>{{$deal->investing_amount}}</td>
                                    <td>{{$deal->user->updated_at}}</td>
                                    <td>
                                        @if($deal->is_accepted == 0)
                                        <span class="badge badge-info">Not Checked</span>
                                        @elseif($deal->is_accepted == 1)
                                        <span class="badge badge-success">Allowed</span>
                                        @elseif($deal->is_accepted == 2)
                                        <span class="badge badge-success">Denied</span>
                                        @endif
                                    </td>    
                                    <td>
                                        @if($deal->is_active == 1)
                                        <span class="badge badge-info">Active</span>
                                        @else
                                        <span class="badge badge-danger">Closed</span>
                                        @endif
                                    </td>                                  
                                    <td><a  href="{{route('member.dealroomopportunity-detail',['id'=>$deal->id])}}" class="btn btn-info btn-sm btn-block text-uppercase waves-effect waves-light">Check</a></td>
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
    $('#allow-apply').DataTable({
        
    });
</script>
@endsection