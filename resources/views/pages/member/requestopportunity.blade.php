@extends('layouts.member')
@section('member-css')

@endsection


@section('member-content')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-4 align-self-center">
        <h3 class="text-themecolor">Submit an opportunity</h3>
    </div>
    <div class="col-md-4 align-self-center text-center">
        <!-- <div class="row text-center"> -->
            <img src="{{asset('logo.png')}}" width="200" height="150" alt="homepage" class="dark-logo" />
        <!-- </div> -->
        
    </div>
    <div class="col-md-4 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Submit an opportunity</li>
        </ol>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Submit an opportunity</h4>
                    <h6 class="card-subtitle">Please fill these input to submit an opportunity.</h6>
                    <form class="form p-t-20" action="{{route('member.requestopportunity')}}" method="POST" id="request-form">
                        @csrf
                        <div class="form-group">
                            <label for="contact_name">Contact name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-world"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="Enter Contact name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-email"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
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
                            <label for="company_stage">Company Stage</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-tag"></i>
                                    </span>
                                </div>

                                <select name="company_stage" class="form-control">
                                    <option>Select</option>
                                    <option value="0">Pre-Revenue/Seed</option>
                                    <option value="1">Early Stage/Venture Capital</option>
                                    <option value="2">Private Equity</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="investing_amount">Amount You are Investing</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-target"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="investing_amount" name="investing_amount" placeholder="Enter Amount You are Investing">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="raising">Total Investment company is looking to raise</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-flag-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="raising" name="raising" placeholder="Total Amount Company is Looking to Raise">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="valuation">Available capacity for FIVE Network members</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ti-flag-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="valuation" name="valuation" placeholder="Enter Available capacity for FIVE Network members">
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