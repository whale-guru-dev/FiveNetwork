@extends('layouts.member')
@section('member-css')

@endsection


@section('member-content')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Request a opportunity</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Request a opportunity</li>
        </ol>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Request a opportunity</h4>
                    <h6 class="card-subtitle">Please fill these input to request a opportunity.</h6>
                    <form class="form p-t-20" action="{{route('member.requestopportunity')}}" method="POST" id="request-form">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-email"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-mobile"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="opportunity_name">Opportunity Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-tag"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="opportunity_name" name="opportunity_name" placeholder="Enter opportunity name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="investing_amount">How much they are investing?</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-target"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="investing_amount" name="investing_amount" placeholder="Enter how much they are investing">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="raising">Raising</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-flag-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="raising" name="raising" placeholder="Enter raising">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="valuation">Valuation</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-flag-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="valuation" name="valuation" placeholder="Enter Valuation">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                        <button type="button" class="btn btn-inverse waves-effect waves-light" id="cancel-btn">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('member-js')
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

<script type="text/javascript">
    $(document).on("click","#cancel-btn",function(){
        document.getElementById("request-form").reset();
    });
</script>
@endsection 