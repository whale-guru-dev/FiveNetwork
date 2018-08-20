@extends('layouts.admin')
@section('admin-css')

@endsection


@section('admin-content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Detailed Submitted Non Co-Investment Questionnaire</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">pages</li>
            <li class="breadcrumb-item active">Detailed Submitted Non Co-Investment Questionnaire</li>
        </ol>
    </div>
</div>
<div class="container-fluid">
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
                            <h4 class="m-b-10 text-white">Submitted Non Co-Investment Questionnaire</h4>
                        </div>
                    </div>
                </div>
	            <div class="card-body">
	                <form class="form-horizontal" role="form" >
	                    <div class="form-body">
	                        <h3 class="box-title">Submitted Non Co-Investment Questionnaire</h3>
	                        <hr class="m-t-0 m-b-40">
	                        <h4>GENERAL INFORMATION</h4>
	                        <hr>
	                        <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-4">First Name</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static"> {{$niq->fName}} </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-4">Last Name</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static"> {{$niq->lName}} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-4">Phone</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static"> {{$niq->phone}} </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-4">Email</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static"> {{$niq->email}} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-4">Company Name</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static"> {{$niq->company_name}} </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-4">Company Website</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static"> {{$niq->company_website}} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-4">Address</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static"> {{$niq->address}} </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-4">City</label>
                                                <div class="col-md-8">
                                                    <p class="form-control-static"> {{$niq->city}} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-4">State</label>
                                                <div class="col-md-8">
                                                    @if($niq->investmentregion)
                                                    <p class="form-control-static"> {{$niq->investmentregion->type}} </p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label text-right col-md-4">Country</label>
                                                <div class="col-md-8 row">
                                                    <p class="form-control-static"> {{$niq->country}} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">What is the structure of the Current Capital Raise ?</label>
                                        <div class="col-md-8">
                                            @if($niq->investmentstructure)
                                            <p class="form-control-static"> {{$niq->investmentstructure->type}} </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Investment Stage</label>
                                        <div class="col-md-8">
                                            @if($niq->investmentstage)
                                            <p class="form-control-static"> {{$niq->investmentstage->type}} </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Sector</label>
                                        <div class="col-md-8">
                                            @if($niq->investmentsector)
                                            <p class="form-control-static"> {{$niq->investmentsector->type}} </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <h6>How much capacity is left this round</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">What amount is still available ?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->investment_size}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">How much capital are you raising this round ?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->raising_capital}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <h4>Company</h4>
                            <hr>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Date Company Founded</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->company_found_date}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Brief description of company and the problem the company aims to solve</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->company_desc}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Brief description of company and the problem the company aims to solve</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->company_desc}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Products/Services</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->products_service}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Brief description of product(s)/service(s) offered and price point</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->products_service_desc}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <h4>Patents</h4>
                            <hr>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Do you have any patents?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->bpatent==0?'No':'Yes'}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            @if($niq->bpatent == 1)
                            <h6>About Patent(s)</h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Brief description of patent</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->patent_desc}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Patent Status</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->patent_status}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Date Filed</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->date_field}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            @endif

                            <h4>MANAGEMENT TEAM</h4>
                            <hr>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Does the Owner have prior experience in the industry?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->prior_exp==0?'No':'Yes'}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Length of Time in Industry</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->length_time}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Prior Companies and Roles</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->prior_company_role}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Please provide details of outcome</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->outcome_detail}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Are there additional members of the Management Team ?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->additional_member==0?'No':'Yes'}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            @if($niq->additional_member==1)
                            <h6>Management Team Members</h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Name</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->additional_member_name}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Team Member Biography and Prior Experience</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->members_bio_pior_exp}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Are restrictive covenants in place to prevent management team from joining competitor, soliciting clients, etc ?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->brestrict_convenant==0?'No':'Yes'}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            @if($niq->brestrict_convenant==1)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Please describe restrictive covenants in place</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->restrict_convenant_desc}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            @endif
                            @endif

                            <h4>FINANCIAL INFORMATION</h4>
                            <hr>

                            @if($niq->company_stage == 3)
                            <h6>Previous Year</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Previous Year Total Revenue</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->prev1_total_revenue}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Previous Year Total Expenses</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->prev1_total_expense}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Previous Year Total Revenue - Total Expenses</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->prev1_revenue_expense}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <h6>Current Year</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Current Year Total Revenue</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->cur_total_revenue}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Current Year Total Expenses</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->cur_total_expense}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Current Year Total Revenue - Total Expense</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->cur_revenue_expense}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <h6>Next Year</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Next Year Total Revenue</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->next_total_revenue}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Next Year Total Expenses</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->next_total_expense}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Next Year Total Revenue - Total Expenses</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->next_revenue_expense}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">What percent of current revenue is contractually recurring (vs. non-recurring)?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->percent_cur_revenue}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">How do you expect this structure to change over time? Please describe</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->expect_change_over}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Cash Balance of Company today</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->cash_balance}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Do you currently have debt?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->bhave_debt==0?'No':'Yes'}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            @if($niq->bhave_debt==1)
                            <h6>Debt Details</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Creditor</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->debt_creditor}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Amount</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->debt_amount}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Type of Debt, Rate, Maturity, & Payment Terms</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->type_debt_rate_maturity_term}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            @endif

                            @else
                            <h6>Previous Year</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Previous Year Total Revenue</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->prev1_total_revenue}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Previous Year Total Expenses</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->prev1_total_expense}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Previous Year Total Revenue - Total Expenses</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->prev1_revenue_expense}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <h6>Current Year</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Current Year Total Revenue</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->cur_total_revenue}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Current Year Total Expenses</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->cur_total_expense}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Current Year Total Revenue - Total Expense</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->cur_revenue_expense}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <h6>Next Year</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Next Year Total Revenue</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->next_total_revenue}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Next Year Total Expenses</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->next_total_expense}} </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Next Year Total Revenue - Total Expenses</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->next_revenue_expense}} </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">What percent of current revenue is contractually recurring (vs. non-recurring)?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->percent_cur_revenue}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">How do you expect this structure to change over time? Please describe</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->expect_change_over}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Expected Cash Flow Break Even Date</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->expected_cash_flow_break_date}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Cash Balance of Company today</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->cash_balance}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Do you currently have debt?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->bhave_debt==0?'No':'Yes'}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            @if($niq->bhave_debt==1)
                            <h6>Debt Details</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Creditor</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->debt_creditor}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Amount</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->debt_amount}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Type of Debt, Rate, Maturity, & Payment Terms</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->type_debt_rate_maturity_term}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            @endif
                            @endif

                            <h4>COMPETITORS</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Primary Competitors</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->primary_competitor}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Describe how are you differentiated from your competitors</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->differ_desc_competitor}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <h4>Customers</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Are current contracts in place with customers?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->bcur_contracts_customer==0?'No':'Yes'}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            @if($niq->bcur_contracts_customer==1)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Number of customers today</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->num_customer}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Average contract revenue per customer</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->revenue_avg_customer}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <h6>Top five customers by percentage revenue</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Customer Name 1</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->customer_name_1}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Percentage of Revenue</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->percent_revenue_1}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Customer Name 2</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->customer_name_2}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Percentage of Revenue</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->percent_revenue_2}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Customer Name 3</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->customer_name_3}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Percentage of Revenue</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->percent_revenue_3}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Customer Name 4</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->customer_name_4}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Percentage of Revenue</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->percent_revenue_4}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Customer Name 5</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->customer_name_5}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Percentage of Revenue</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->percent_revenue_5}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">How long are contracts?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->contract_duration}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Cancellation Fee</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->cancellation_fee}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Do the contracts auto-renew?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->bcontract_autonew==0?'No':'Yes'}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Projected number of clients/contracts for the year</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->projected_num_client}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Client Acquisition Cost</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->client_acq_cost}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Lifetime Value of Customer</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->lifetime_val}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Briefly describe how you are marketing today</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->desc_marketing}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Briefly describe your current sales strategy today</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->desc_sales_strategy}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            @endif

                            <h4>CAPITAL</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Amount of Capital Business Began With</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->capital_amt_began}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">What is the timing of this capital raise?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->capital_raise_timing}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Expected Close Date</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->expected_close_date}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">What will the capital be used for?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->capital_used_for}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Have you had previous capital raises?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->bprevious_capital_raise==0?'No':'Yes'}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            @if($niq->bprevious_capital_raise==1)
                            <h6>Please detail prior capital raises</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Date</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->prior_raise_date}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Amount Raised</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->prior_raised_amount}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Previous Investors</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->prior_investors}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Valuation</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->prior_valuation}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            @endif

                            <h6>Founder Capital Committed</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Does the founder have personal capital committed?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->bfounder_capital_commit==0?'No':'Yes'}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">How much?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->founder_capital_amount}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <h6>Future Capital Needs</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Do you expect any future capital raises?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->bexpect_future_raise==0?'No':'Yes'}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">How much?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->expect_future_raise_amount}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Estimated timing of future capital raises</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->estimated_timing_future_capital}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Use of additional funds</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->use_additional_fund}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            @if($niq->company_stage == 2)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Did previous investors reinvest this round?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->bprevious_investor_reinvest==0?'No':'Yes'}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($niq->bprevious_investor_reinvest==1)
                            <div class="row">
                                <h6>Previous investors reinvesting this round</h6>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Name of Investor</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->name_investor}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Amount Committed</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->amount_committed}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            @endif
                            @endif

                            <h4>VALUATION</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Current Post-Money Valuation</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->cur_postmoney_valuation}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Explanation of Valuation</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->explanation_valuation}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <h4>FUTURE OF COMPANY</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">What are your plans for growth?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->plan_for_growth}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Do you plan to exit the business in the future?</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->bhave_plan_exit_business==0?'No':'Yes'}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if($niq->bhave_plan_exit_business==1)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Anticipated Exit Date</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->anticipated_exit_date}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h6>Exit Strategy</h6>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Please describe exit strategy</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->exit_strategy}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Top Potential Acquirers</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->top_potential_acqu}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Revenue Target</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->revenue_target}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Net Income Target</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->net_income_target}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-4">Exit Valuation</label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"> {{$niq->exit_valuation}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
	                        @endif

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-left col-md-9">Prior Year Monthly Financials:</label>
                                        <div class="col-md-3">
                                            @if($niq->prior_year_monthly_finacial)
                                            <a href="{{route('opportunity.file',['name' => $niq->prior_year_monthly_finacial])}}">Check</a>
                                            @else
                                            <p class="form-control-static">No File</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-left col-md-9">Investor Deck:</label>
                                        <div class="col-md-3">
                                            @if($niq->investor_deck)
                                            <a href="{{route('opportunity.file',['name' => $niq->investor_deck])}}">Check</a>
                                            @else
                                            <p class="form-control-static">No File</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-left col-md-9">3 Year Proforma Projections:</label>
                                        <div class="col-md-3">
                                            @if($niq->proforma_projections)
                                            <a href="{{route('opportunity.file',['name' => $niq->proforma_projections])}}">Check</a>
                                            @else
                                            <p class="form-control-static">No File</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-left col-md-9">Detailed Cap Table:</label>
                                        <div class="col-md-3">
                                            @if($niq->detailed_cap_table)
                                            <a href="{{route('opportunity.file',['name' => $niq->detailed_cap_table])}}">Check</a>
                                            @else
                                            <p class="form-control-static">No File</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group row">
	                                    <label class="control-label text-right col-md-4">Submitted Time:</label>
	                                    <div class="col-md-8">
	                                        <p class="form-control-static"> {{$niq->created_at}} </p>
	                                    </div>
	                                </div>
	                            </div>
	                            <!--/span-->
	                        </div>
	                    </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        @if($niq->is_allowed == 0)
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="button" class="btn btn-info" id="allow-btn"> <i class="fa fa-pencil"></i> Allow</button>
                                            <button type="button" class="btn btn-danger" id="deny-btn">Deny</button>
                                        </div>
                                        @elseif($niq->is_allowed == 1)
                                        <div class="col-md-offset-6 col-md-6">
                                            <span class="badge badge-success ml-auto"><i class="fa fa-pencil"></i>Allowed</span>
                                        </div>
                                        @elseif($niq->is_allowed == 2)
                                        <div class="col-md-offset-6 col-md-6">
                                            <span class="badge badge-warning ml-auto"><i class="fa fa-close"></i>Denied</span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6"> </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        @if($niq->is_active == 0)
                                        <div class="col-md-offset-6 col-md-6">
                                            <span class="badge badge-danger ml-auto"><i class="fa fa-pencil"></i>Closed</span>
                                        </div>
                                        @else
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="button" class="btn btn-info" id="close-btn"> <i class="fa fa-pencil"></i> Set Status as Closed</button>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
	                    
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
</div>
<form action="{{route('admin.allow-non-co-investment-opportunity')}}" method="POST" id="allow-request-form">
    @csrf
    <input type="hidden" name="id" value="{{$niq->id}}">
</form>
<form action="{{route('admin.deny-non-co-investment-opportunity')}}" method="POST" id="deny-request-form">
    @csrf
    <input type="hidden" name="id" value="{{$niq->id}}">
</form>
<form action="{{route('admin.close-non-co-investment-opportunity')}}" method="POST" id="close-request-form">
    @csrf
    <input type="hidden" name="id" value="{{$niq->id}}">
</form>
@endsection

@section('admin-js')
<script type="text/javascript">
    $(document).on("click","#allow-btn",function(){
        $("#allow-request-form").submit();
    });

    $(document).on("click","#deny-btn",function(){
        $("#deny-request-form").submit();
    });

    $(document).on("click","#close-btn",function(){
        $("#close-request-form").submit();
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