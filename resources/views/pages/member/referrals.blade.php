@extends('layouts.member')
@section('member-css')

@endsection


@section('member-content')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-4 align-self-center">
        <h3 class="text-themecolor">Referrals</h3>
    </div>
    <div class="col-md-4 align-self-center text-center">
        <!-- <div class="row text-center"> -->
            <img src="{{asset('logo.png')}}" width="200" height="150" alt="homepage" class="dark-logo" />
        <!-- </div> -->
        
    </div>
    <div class="col-md-4 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Referrals</li>
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
                    <label for="basic-url">Referrals</label>
                    <div class="table-responsive m-t-10">
                        @if($referlog->count()>0)
                        <table id="myTable1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Referred Email</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($referlog as $log)
                                <tr style="line-height: 1em;">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$log->referer_email}}</td>
                                    <td>{{$log->created_at->format('Y/m/d')}}</td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                            @else
                            <h6>There is no referred family.</h6>
                            @endif
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

@endsection