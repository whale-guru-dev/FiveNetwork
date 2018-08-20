@extends('layouts.admin')
@section('admin-css')
<link href="{{asset('assets/dashboard/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/dashboard/plugins/switchery/dist/switchery.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/dashboard/plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/dashboard/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
<link href="{{asset('assets/dashboard/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/dashboard/plugins/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/dashboard/plugins/Magnific-Popup-master/dist/magnific-popup.css')}}" rel="stylesheet">

@endsection

@section('admin-content')
<?php
$private_investment_number = ['1-2','3-4','5-7','8-10','10~'];
$pref_contact_form = ['Office','Mobile','Email','Administrative Assistant / Associate'];

?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Detailed Membership</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">pages</li>
            <li class="breadcrumb-item active">Detailed Membership</li>
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
        <div class="col-md-3">
            <button type="button" class="btn btn-info" id="back-btn"><i class="ti-back-left">Back</i></button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
        	<div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9">
                            <h4 class="m-b-0 text-white">Membership Info</h4>
                        </div>
                    </div>
                </div>
        	</div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
        	<div class="card">
        		<div class="card-body">
        			<h4>Step 1</h4>
        			<h6 class="card-subtitle">Applicant Information – For Family Office.</h6>
        			<form class="form-horizontal" role="form">
                        <div class="form-body">
                            <h3 class="box-title">Person Info</h3>
                            <hr class="m-t-0 m-b-40">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Family Office Name:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->family_office_name}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">First Name:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->fName}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Last Name:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->lName}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Date of Birth:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->dob ? $user->dob:''}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Office Phone:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->phone_office}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Mobile Phone:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->phone_mobile?$user->phone_mobile:''}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!-- /row -->
                            <div class="row">
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Email:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->email}} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- /row -->
                            <h3 class="box-title">Address</h3>
                            <hr class="m-t-0 m-b-40">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Address Line 1:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->addr_1?$user->addr_1:''}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Address Line 2:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->addr_2?$user->addr_2:''}} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Town/City:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->town_city?$user->town_city:''}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">State:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->state?$user->state:''}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Post Code:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->postal_code?$user->postal_code:''}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Country:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->country?$user->country:''}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-left col-md-6">Is this user applying for a Family Office or Individual Membership?</label>
                                        <div class="col-md-3">
                                            <p class="form-control-static"> {{$user->apply_type == 0? 'Family Office':'Individual'}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->

                                @if($user->bprinciple != null)
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-left col-md-6">Is this user a Principle of the Family Office?</label>
                                        <div class="col-md-3">
                                            <p class="form-control-static"> {{$user->bprinciple==0?'No':'Yes'}} </p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <!--/span-->
                            </div>

                            <!--/row-->
                            <h3 class="box-title">Other</h3>
                            <hr class="m-t-0 m-b-40">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Title:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->title}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">How did he hear about Family InVestment Exchange?</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> {{$user->aware_method_desc}} </p>
                                        </div>
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
        			<h4>Step 2</h4>
        			<h6 class="card-subtitle">Investment Objectives.</h6>
        			<div class="row">
        				<div class="tags-default col-md-6">
        					<div class="form-group row">
                                <label class="control-label text-left col-md-3">Investment Structure:</label>
                                <div class="col-md-9">
	                                <select multiple data-role="tagsinput" disabled="">
	                                	@foreach($user->investmentstructure as $ist)
	                                	<option value="{{$ist->type->type}}">{{$ist->type->type}}</option>
	                                	@endforeach
	                                </select>
                                </div>
                            </div>
	                    </div>

	                    
        			</div>

        			<div class="row">
        				<div class="tags-default col-md-6">
        					<div class="form-group row">
                                <label class="control-label text-left col-md-3">Approximately How many Private Investments do you/your family invest in annually?</label>
                                <div class="col-md-9">
	                                <input type="text" value="{{$private_investment_number[$user->private_investment_number]}}" data-role="tagsinput" disabled="" />
                                </div>
                            </div>
	                    </div>

        				<div class="tags-default col-md-6">
        					<div class="form-group row">
                                <label class="control-label text-left col-md-3">Approximately what % of the investments you participate in have additional capacity after your participation?</label>
                                <div class="col-md-9">
	                               <input type="text" value="{{$user->additional_capacity}} %" data-role="tagsinput" disabled="" />
                                </div>
                            </div>
	                    </div>
        			</div>

        			<div class="row">
        				<div class="tags-default col-md-6">
        					<div class="form-group row">
                                <label class="control-label text-left col-md-3">Typical Check Size:</label>
                                <div class="col-md-9">
	                                <select multiple data-role="tagsinput" disabled="">
	                                	@foreach($user->investmentsize as $isz)
	                                	<option value="{{$isz->type->type}}">{{$isz->type->type}}</option>
	                                	@endforeach
	                                </select>
                                </div>
                            </div>
	                    </div>

	                    <div class="tags-default col-md-6">
        					<div class="form-group row">
                                <label class="control-label text-left col-md-3">Investment Stage:</label>
                                <div class="col-md-9">
	                                <select multiple data-role="tagsinput" disabled="">
	                                	@foreach($user->investmentstage as $isg)
	                                	<option value="{{$isg->type->type}}">{{$isg->type->type}}</option>
	                                	@endforeach
	                                </select>
                                </div>
                            </div>
	                    </div>
        			</div>

        			<div class="row">
        				<div class="tags-default col-md-6">
        					<div class="form-group row">
                                <label class="control-label text-left col-md-3">Investment Regions</label>
                                <div class="col-md-9">
                                    <select multiple data-role="tagsinput" disabled="">
                                        @foreach($user->investmentregion as $ir)
                                        <option value="{{$ir->type->type}}">{{$ir->type->type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
	                    </div>

                        <div class="tags-default col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-left col-md-3">Investment Sector Focus</label>
                                <div class="col-md-9">
                                    <select multiple data-role="tagsinput" disabled="">
                                        @foreach($user->investmentsector as $isr)
                                        <option value="{{$isr->type->type}}">{{$isr->type->type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
        			</div>
                    
        		</div>
        	</div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
        	<div class="card">
        		<div class="card-body">
        			<h4>Step 3</h4>
        			<h6 class="card-subtitle">Background Information.</h6>
        			<div class="row">
                        <!--/span-->
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Professional History/Bio:</label>
                                <div class="col-md-9">
                                    <p class="form-control-static"> {{$user->professional_history_bio}} </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!--/span-->
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">About Family Office / Investment Entity:</label>
                                <div class="col-md-9">
                                    <p class="form-control-static"> {{$user->family_office_investment_entity}} </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Area of Family/Investor Expertise:</label>
                                <div class="col-md-9">
                                    <p class="form-control-static"> {{$user->area_family_investor_expertise}} </p>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Approximate Networth/AUM:</label>
                                <div class="col-md-9">
                                    <p class="form-control-static"> {{$user->networth_aum}} </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Company Website:</label>
                                <div class="col-md-9">
                                    <p class="form-control-static"> <a href="{{$user->company_website}}">{{$user->company_website}}</a> </p>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">LinkedIn:</label>
                                <div class="col-md-9">
                                    <p class="form-control-static"> <a href="{{$user->linkedIn}}">{{$user->linkedIn}}</a> </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Education:</label>
                                <div class="col-md-9">
                                    <p class="form-control-static"> {{$user->education}} </p>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div>


                    <div class="row">
                        <!--/span-->
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">What is his priority of use? Please rank in order of most important to least important:</label>
                                <div class="col-md-9">
                                    <p class="form-control-static"> {{$user->desc_notable_past_investment}} </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!--/span-->
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Description of Notable Past Investments:</label>
                                <div class="col-md-9 offset-md-3">
                                    <p class="form-control-static"> Show deals : {{$user->rank_show_deals}} </p>
                                </div>
                                <div class="col-md-9 offset-md-3">
                                    <p class="form-control-static"> See deals : {{$user->rank_see_deals}} </p>
                                </div>
                                <div class="col-md-9 offset-md-3">
                                    <p class="form-control-static"> Leverage due-diligence capabilities : {{$user->rank_leverage_due_diligence_capability}} </p>
                                </div>
                                <div class="col-md-9 offset-md-3">
                                    <p class="form-control-static"> Network with other Family Offices and Individuals : {{$user->rank_network_with_other_family_offices}} </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Preferred Form of Contact:</label>
                                <div class="col-md-9">
                                    <p class="form-control-static"> {{$pref_contact_form[$user->pref_contact_form]}} </p>
                                </div>
                            </div>
                        </div>
                    </div>
        		</div>
        	</div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
        	<div class="card">
        		<div class="card-body">
        			<h4>Step 4</h4>
        			<h6 class="card-subtitle">Investor Accreditation.</h6>
        			<!-- <div class="row">
                        <div class="col-md-12">
                            <div class="row el-element-overlay">
                                <label class="control-label text-right col-md-3">Copy of a Government Issued Photo ID:</label>
                                <div class="col-lg-6 col-md-9">
                                	<div class="card">
	                                    <div class="el-card-item">
			                                <div class="el-card-avatar el-overlay-1"> 
			                                	<img src="{{asset('assets/dashboard/profile/id/'.$user->govern_photo_id)}}" alt="ID" />
			                                    <div class="el-overlay scrl-dwn">
			                                        <ul class="el-info">
			                                            <li>
			                                            	<a class="btn default btn-outline image-popup-vertical-fit" href="{{asset('assets/dashboard/profile/id/'.$user->govern_photo_id)}}">
			                                            		<i class="icon-magnifier"></i>
			                                            	</a>
			                                            </li>
			                                        </ul>
			                                    </div>
			                                </div>
			                            </div>
		                        	</div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="row">
                        <!--/span-->
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-left col-md-9">I attest and understand that by applying for membership, I permit the Family Investment Exchange to run a background check on myself and any executive members of our family office/investment entity that plans to use the platform:</label>
                                <div class="col-md-3">
                                    <p class="form-control-static"> {{$user->check_back_attest==0?'No':'Yes'}} </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!--/span-->
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-left col-md-9">Please attest you are Accredited Investor/Qualified Purchaser:</label>
                                <div class="col-md-3">
                                    <p class="form-control-static"> {{$user->attest_ai_qp==0?'No':'Yes'}} </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!--/span-->
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-left col-md-9">Please attest you will not use this platform to circumvent or attempt to interfere with an investment opportunity made available to you through the FIVE Network, and you understand if this activity takes place you will be removed from the network indefinitely:</label>
                                <div class="col-md-3">
                                    <p class="form-control-static"> {{$user->platform_use_case==0?'No':'Yes'}} </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!--/span-->
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-left col-md-9">Please attest you plan to use this network for the purposes of sharing and syndicating investment opportunities and intend to share all investment opportunities of which there is capacity with members of the network:</label>
                                <div class="col-md-3">
                                    <p class="form-control-static"> {{$user->plan_use_network==0?'No':'Yes'}} </p>
                                </div>
                            </div>
                            @if($user->plan_use_network==0)
                            <div class="form-group row">
                                <label class="control-label text-left col-md-9">Explain:</label>
                                <div class="col-md-3">
                                    <p class="form-control-static"> {{$user->explain_plan_use_network_no}} </p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <!--/span-->
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-left col-md-9">Please attest you understand and agree this network is not a recommendation for investment and isn’t responsible for any investment performance that is learned about through the platform.:</label>
                                <div class="col-md-3">
                                    <p class="form-control-static"> {{$user->understand_agree==0?'No':'Yes'}} </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!--/span-->
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-left col-md-9">You understand that members can be removed from the Family Investment Exchange at any time at the sole and exclusive discretion of the membership committee.:</label>
                                <div class="col-md-3">
                                    <p class="form-control-static"> Yes </p>
                                </div>
                            </div>
                        </div>
                    </div>

        		</div>
        	</div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
        	<div class="card">
        		<div class="card-body">
        			<h4>Allow User</h4>
        			<h6 class="card-subtitle">You can allow this user as a member.</h6> 
        			@if($user->is_allowed == 0)
        				
        				<div class="form-actions col-md-6 offset-md-3">
                            <button type="submit" id="allow" class="btn btn-info btn-sm btn-block text-uppercase waves-effect waves-light">Allow</button>
                            <button type="submit" id="deny" class="btn btn-danger btn-sm btn-block text-uppercase waves-effect waves-light">Deny</button>
                        </div>
        			
        			@elseif($user->is_allowed == 1)
        			<div class="row">
        				<div class="col-sm-2 col-md-4 offset-md-4">
	                        <span class="badge badge-success ml-auto">Allowed</span>
	                    </div>
        			</div>
        			@elseif($user->is_allowed == 2)
                    <div class="row">
                        <div class="col-sm-2 col-md-4 offset-md-4">
                            <span class="badge badge-warning ml-auto">Denied</span>
                        </div>
                    </div>
                    @elseif($user->is_allowed == 3)
                    <div class="row">
                        <div class="col-sm-2 col-md-4 offset-md-4">
                            <span class="badge badge-danger ml-auto">Removed</span>
                        </div>
                    </div>
        			@endif
        		</div>
        	</div>
        </div>
    </div>   
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

</div>
<form action="{{route('admin.allow-user-membership')}}" id="allow-membership" method="post">
    @csrf
    <input type="hidden" name="usid" value="{{$user->id}}">
</form>

<form action="{{route('admin.deny-user-membership')}}" id="deny-membership" method="post">
    @csrf
    <input type="hidden" name="usid" value="{{$user->id}}">
</form>
@endsection

@section('admin-js')
<script src="{{asset('assets/dashboard/plugins/switchery/dist/switchery.min.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/dashboard/plugins/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/dashboard/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/dashboard/plugins/dff/dff.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('assets/dashboard/plugins/multiselect/js/jquery.multi-select.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/Magnific-Popup-master/dist/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/Magnific-Popup-master/dist/jquery.magnific-popup-init.js')}}"></script>
<script type="text/javascript">
    $(document).on("click","#allow",function(){
        $("#allow-membership").submit();
    });

    $(document).on("click","#deny",function(){
        $("#deny-membership").submit();
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