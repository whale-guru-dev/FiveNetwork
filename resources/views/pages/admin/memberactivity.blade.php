@extends('layouts.admin')
@section('admin-css')

@endsection


@section('admin-content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Member Activity</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">pages</li>
            <li class="breadcrumb-item active">Member Activity</li>
        </ol>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
@php
$num_logins = App\Model\MemberLogin::where('usid', $member->id)->count();
$num_oppors = App\Model\MemberRequestOpportunity::where('usid', $member->id)->count();
$num_expresss = App\Model\MemberOpportunityMatch::where('matched_member_id', $member->id)->where('is_allowed', 1)->where('binterest','!=',0)->count();
$num_refers = App\Model\MemberReferLog::where('usid', $member->id)->count();
$refers = App\User::where('refer_by',$member->user_code)->latest()->get();
$preregisters = App\Model\Preregister::where('refer_by',$member->user_code)->where('applied',0)->latest()->get(); 
$num_deals = App\Model\MemberSimpleOpportunity::where('usid', $member->id)->count();   
@endphp
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
        <div class="col-md-3">
            <div class="card"> <img class="card-img-top" src="{{asset('assets/landing/img/intro-bg.jpg')}}" alt="Background image cap" style="max-height: 165px;">
                <div class="card-body little-profile text-center">
                    <div class="pro-img"><img src="{{asset('assets/dashboard/profile/propic/'.$member->propic)}}" alt="user"></div>
                    <h3 class="m-b-0">{{$member->fName.' '.$member->lName}}</h3>
                    <a href="{{route('admin.membership-detail',['id' => $member->id])}}" class="m-t-10 waves-effect waves-dark btn btn-info btn-sm btn-rounded">Check Membership</a>
                    <div class="row text-center m-t-20">
                        <div class="col-lg-12 col-md-12 m-t-20">
                            <h3 class="m-b-0 font-light"><small>Logins : {{$num_logins}}</small></h3></div>
                        <div class="col-lg-12 col-md-12 m-t-20">
                            <h3 class="m-b-0 font-light"><small>Refers : {{$num_refers}}</small></h3></div>
                        <div class="col-lg-12 col-md-12 m-t-20">
                            <h3 class="m-b-0 font-light"><small>Opportunities : {{$num_oppors}}</small></h3></div>
                        <div class="col-lg-12 col-md-12 m-t-20">
                            <h3 class="m-b-0 font-light"><small>Express Interests : {{$num_expresss}}</small></h3></div>
                        <div class="col-lg-12 col-md-12 m-t-20">
                            <h3 class="m-b-0 font-light"><small>Deal Room Opportunities : {{$num_deals}}</small></h3></div>
                        <div class="col-md-12 m-b-10"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <!-- <div class="row"> -->
                <div class="card">
                    <div class="card-body">
                        <label for="basic-url">List of Login Information</label>
                        <div class="table-responsive m-t-10">
                            @if($logins->count()>0)
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>IP Address</th>
                                        <th>Location</th>
                                        <th>Device</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($logins as $login)
                                    <tr style="line-height: 1em;">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$login->ip_addr}}</td>
                                        <td>{{$login->location}}</td>
                                        <td>{{$login->device}}</td>
                                        <td>{{$login->created_at->format('Y/m/d')}}</td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            @else
                            <h6>There is no login info.</h6>
                            @endif
                        </div>
                    </div>
                </div>
            <!-- </div> -->

                <div class="card">
                    <div class="card-body">
                        <label for="basic-url">List of Opportunies Information</label>
                        <div class="table-responsive m-t-10">
                            @if($oppors->count()>0)
                            <table id="myTable1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Contact Name</th>
                                        <th>Amount you are investing</th>
                                        <th>Company Stage</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($oppors as $oppor)
                                    <tr style="line-height: 1em;">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$oppor->contact_name}}</td>
                                        <td>{{$oppor->investing_amount}}</td>
                                        <td>
                                            @if($oppor->company_stage == 1)
                                            <span class="badge badge-success">Seed/Pre-Revenue</span>
                                            @elseif($oppor->company_stage == 2)
                                            <span class="badge badge-info">Early Stage/Venture Capital</span>
                                            @elseif($oppor->company_stage == 3)
                                            <span class="badge badge-warning">Private Equity</span>
                                            @endif
                                        </td>
                                        <td>{{$oppor->created_at->format('Y/m/d')}}</td>
                                        <td><a href="{{route('admin.requestopportunity-detail',['id' => $oppor->id])}}" class="btn btn-info btn-sm">More</a></td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            @else
                            <h6>There is no submitted opportunity.</h6>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <label for="basic-url">List of Deal Room Opportunities</label>
                        <div class="table-responsive m-t-10">
                            @if($deals->count()>0)
                            <table id="myTable1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Contact Name</th>
                                        <th>Amount you are investing</th>
                                        <th>Company Stage</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($deals as $deal)
                                    <tr style="line-height: 1em;">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$deal->fName.' '.$deal->lName}}</td>
                                        <td>{{$deal->investing_amount}}</td>
                                        <td>
                                            @if($deal->company_stage == 1)
                                            <span class="badge badge-success">Seed/Pre-Revenue</span>
                                            @elseif($deal->company_stage == 2)
                                            <span class="badge badge-info">Early Stage/Venture Capital</span>
                                            @elseif($deal->company_stage == 3)
                                            <span class="badge badge-warning">Private Equity</span>
                                            @endif
                                        </td>
                                        <td>{{$deal->created_at->format('Y/m/d')}}</td>
                                        <td><a href="{{route('admin.check-simple-deal',['id' => $deal->id])}}" class="btn btn-info btn-sm">More</a></td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            @else
                            <h6>There is no submitted opportunity.</h6>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <label for="basic-url">Express Interests</label>
                        <div class="table-responsive m-t-10">
                            @if($matchs->count()>0)
                            <table id="myTable1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Company Name</th>
                                        <th>Score</th>
                                        <th>Express Interest</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($matchs as $match)
                                    <tr style="line-height: 1em;">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$match->opportunity->company_name}}</td>
                                        <td>{{$match->score}}</td>
                                        <td>
                                            @if($match->binterest == 0)
                                            <span class="badge badge-info">Not Expressed</span>
                                            @elseif($match->binterest == 1)
                                            <span class="badge badge-success">Interested</span>
                                            @elseif($match->binterest == 2)
                                            <span class="badge badge-warning">Not Interested</span>
                                            @endif
                                        </td>
                                        <td><a href="{{route('admin.check-member-opportunity-match',['id' => $match->opportunity_id])}}" class="btn btn-info btn-sm">More</a></td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                                @else
                                <h6>There is no matched opportunity.</h6>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>

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

                <div class="card">
                    <div class="card-body">
                        <label for="basic-url">Followers</label>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                @if($preregisters->count()==0 && $refers->count()==0)
                                <p>There is no followers.</p>
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
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$pre->email}}</td>
                                                        <td>{{$pre->created_at->format('Y/m/d')}}</td>
                                                        <td><span class="label label-warning">Access Requested</span></td>
                                                    </tr>
                                                    @endforeach
                                                @endif

                                                @if($refers->count()>0)
                                                    @foreach($refers as $ref)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
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

    $('#myTable').DataTable();
    $('#myTable1').DataTable();
</script>


@endsection