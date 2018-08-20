@extends('layouts.member')
@section('member-css')

@endsection


@section('member-content')
<?php $i=1;?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-4 align-self-center">
        <h3 class="text-themecolor">Refer a member</h3>
    </div>
    <div class="col-md-4 align-self-center text-center">
        <!-- <div class="row text-center"> -->
            <img src="{{asset('logo.png')}}" width="200" height="150" alt="homepage" class="dark-logo" />
        <!-- </div> -->
        
    </div>
    <div class="col-md-4 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Refer a member</li>
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
<!--     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <label for="basic-url">Your Referral URL</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">{{url('/follow-me')}}/</span>
                        </div>
                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="{{Auth::user()->user_code}}" readonly="">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="button" id="copy-btn" data-clipboard-text="{{url('/follow-me/'.Auth::user()->user_code)}}" data-clipboard-action="copy"><i class="fa fa-copy"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <label for="basic-url">Refer a Family to the FIVE Network</label>
                    
                    <form action="" method="POST" class="input-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope-o"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="" name="family_email"  required>
                                    <div class="input-group-append">
                                        <button class="btn btn-info" type="submit"><i class="fa fa-paper-plane"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <label for="basic-url">Your Referrals</label>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            @if($preregisters->count()==0 && $referers->count()==0)
                            <p>You have no followers.</p>
                            @else
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Email</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($preregisters->count()>0)
                                                @foreach($preregisters as $pre)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$pre->email}}</td>
                                                    <td>{{$pre->created_at->format('Y/m/d')}}</td>
                                                    <td><span class="label label-warning">Access Requested</span></td>
                                                </tr>
                                                @endforeach
                                            @endif

                                            @if($referers->count()>0)
                                                @foreach($referers as $ref)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$ref->email}}</td>
                                                    <td>{{$ref->created_at}}</td>
                                                    @if($ref->is_allowed == 0)
                                                    <td><span class="label label-success">Applied Membership</span></td>
                                                    @else
                                                    <td><span class="label label-info">Membership Allowed</span></td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
<script type="text/javascript">

    var clipboard = new ClipboardJS('#copy-btn');


    clipboard.on('success', function (e) {
        $('#copy-btn').html('Copied').attr('disabled', true);
        setTimeout(function () {
            $('#copy-btn').html('<i class=\"fa fa-copy\"></i>').removeAttr('disabled');
        }, 5000);
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
            confirmButtonText: "Okay",   
            closeOnConfirm: false 
        });
    </script>
@endif

@endsection
