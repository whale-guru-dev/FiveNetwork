@extends('layouts.member')
@section('member-css')
<style type="text/css">
    thead th {
        font-size: 14px;
    }
</style>
@endsection


@section('member-content')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-4 align-self-center">
        <h3 class="text-themecolor">Deal Room</h3>
    </div>

    <div class="col-md-4 align-self-center text-center">
        <!-- <div class="row text-center"> -->
            <img src="{{asset('logo.png')}}" width="200" height="150" alt="homepage" class="dark-logo" />
        <!-- </div> -->
        
    </div>

    <div class="col-md-4 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Deal Room</li>
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
                    <h4 class="card-title">Deal Room</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="deal-room-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Submitter</th>
                                    <th>Company Stage</th>
                                    <th>Amount they are investing</th>
                                    <th>Total Investment company is looking to raise</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($oppors->count()>0)
                                @foreach($oppors as $oppor)
                                <td>{{$loop->iteration}}</td>
                                <td>{{$oppor->user->fName.' '.$oppor->user->lName}}</td>
                                <td>
                                    @if($oppor->company_stage == 0)
                                    Seed/Pre-Revenue, Early Stage
                                    @elseif($oppor->company_stage == 1)
                                    Venture Capital
                                    @elseif($oppor->company_stage == 2)
                                    Private Equity
                                    @endif
                                </td>
                                <td>{{$oppor->investing_amount}}</td>
                                <td>{{$oppor->raising}}</td>
                                <td>{{$oppor->created_at->format('Y/m/d')}}</td>
                                <td>
                                    @if($oppor->is_accepted == 0)
                                    <span class="label label-info">Checking</span>
                                    @elseif($oppor->is_accepted == 1)
                                    <span class="label label-success">Allowed</span>
                                    @elseif($oppor->is_accepted == 2)
                                    <span class="label label-Warning">Denied</span>
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
    $('#deal-room-table').DataTable();
</script>
@endsection