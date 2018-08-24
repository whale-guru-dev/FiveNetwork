@extends('layouts.member')
@section('member-css')
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/ui-lightness/jquery-ui.css">
<style type="text/css">
    thead th {
        font-size: 14px;
    }

    table th, 
    table td {
      white-space: nowrap;
      padding: 3px 6px;
    }
    table.cellpadding-0 td {
        padding: 0;
    }
    table.cellspacing-0 {
        border-spacing: 0;
        border-collapse: collapse;
    }
    table.bordered th, 
    table.bordered td {
      border: 1px solid #ccc;
      border-right: none;
      text-align: center;
    }
    table.bordered th:last, 
    table.bordered td:last {
      border-right: 1px solid #ccc;
    }
.cell-full { max-width:1px; width:100%; }
.cell-ellipsis { overflow:hidden; white-space:nowrap; text-overflow:ellipsis; }
.cell-noWrap { white-space:nowrap; }
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
                    <label for="basic-url">Submit Investment Opportunity to Deal Room</label>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <a href="{{route('member.submit-simple-deal-view')}}" class="btn btn-info">Submit Investment Opportunity</a>
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
                    <label for="basic-url">Family Investment Exchange Diligence Document</label>
                    
                    <form action="" method="POST" class="input-form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope-o"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="family_email_val" aria-describedby="basic-addon3" value=""  required>
                                    <div class="input-group-append">
                                        <button class="btn btn-info" id="link-btn" type="button">Send Family Investment Exchange Diligence Document Link</button>
                                    </div>
                                </div>
                                <span style='color:red;display: none;' id='error1'>This field is required.</span>
                                <span style='color:red;display: none;' id='error2'>You should input valid email.</span>
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
                <div class="card-header">
                    <div class="card-actions">
                        <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                        <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                    </div>
                </div>
                <div class="card-body collapse show">
                    <h4 class="card-title">Deal Room</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="deal-room-table">
                            <thead>
                                <tr>
                                    <th id='column-header-1'>#<div id='column-header-1-sizer'></div></th>
                                    <th id='column-header-52'>Type<div id='column-header-52-sizer'></div></th>
                                    <th id='column-header-46'>Status<div id='column-header-46-sizer'></div></th>
                                    <th id='column-header-3'>Company Name<div id='column-header-3-sizer'></div></th>
                                    <th id='column-header-51'>View Detail<div id='column-header-51-sizer'></div></th>
                                    <th id='column-header-47' title="FIVE Network members that have met with this company"><i class="fa fa-handshake-o"></i>
                                        <div id='column-header-47-sizer'></div></th>

                                    <th id='column-header-48' title="FIVE Network members that are currently evaluating this opportunity"><i class="fa fa-thumbs-up"></i>
                                        <div id='column-header-48-sizer'></div></th>

                                    <th id='column-header-49' title="FIVE Network members that are no longer evaluating this opportunity"><i class="fa fa-thumbs-down"></i>
                                        <div id='column-header-49-sizer'></div></th>

                                    <th id='column-header-50' title="FIVE Network members that are open to discussing this opportunity"><i class="fa fa-link"></i>
                                        <div id='column-header-50-sizer'></div></th>

                                    <th id='column-header-2'>Submitted<div id='column-header-2-sizer'></div></th>
                                    
                                    <th id='column-header-4'>Company Website<div id='column-header-4-sizer'></div></th>
                                    <th id='column-header-5'>Owner Name<div id='column-header-5-sizer'></div></th>
                                    <th id='column-header-6'>Address<div id='column-header-6-sizer'></div></th>
                                    <th id='column-header-7'>Phone<div id='column-header-7-sizer'></div></th>
                                    <th id='column-header-8'>Email<div id='column-header-8-sizer'></div></th>
                                    <th id='column-header-9'>Date Company<div id='column-header-9-sizer'></div></th>
                                    <th id='column-header-10'>Brief description of company and the problem the company aims to solve<div id='column-header-10-sizer'></div></th>

                                    <th id='column-header-11'>Sector<div id='column-header-11-sizer'></div></th>

                                    <th id='column-header-12'>Investment Stage<div id='column-header-12-sizer'></div></th>

                                    <th id='column-header-13'>Structure of the Current Capital Raise<div id='column-header-13-sizer'></div></th>

                                    <th id='column-header-14'>What amount is still available?<div id='column-header-14-sizer'></div></th>

                                    <th id='column-header-15'>How much capital are they raising this round?<div id='column-header-15-sizer'></div></th>

                                    <th id='column-header-16'>Products/Services<div id='column-header-16-sizer'></div></th>

                                    <th id='column-header-17'>Brief description of product(s)/service(s) offered and price point<div id='column-header-17-sizer'></div></th>

                                    <th id='column-header-18'>Do they have any patents?<div id='column-header-18-sizer'></div></th>

                                    <th id='column-header-19'>Does the Owner have prior experience in the industry?<div id='column-header-19-sizer'></div></th>

                                    <th id='column-header-20'>Length of Time in Industry<div id='column-header-20-sizer'></div></th>

                                    <th id='column-header-21'>Prior Companies and Roles<div id='column-header-21-sizer'></div></th>

                                    <th id='column-header-22'>Details of outcome<div id='column-header-22-sizer'></div></th>

                                    <th id='column-header-23'>Are there additional members of the Management Team?<div id='column-header-23-sizer'></div></th>

                                    <th id='column-header-24'>Primary Competitors<div id='column-header-24-sizer'></div></th>

                                    <th id='column-header-25'>Describe how are you differentiated from your competitors<div id='column-header-25-sizer'></div></th>

                                    <th id='column-header-26'>Are current contracts in place with customers?<div id='column-header-26-sizer'></div></th>

                                    <th id='column-header-27'>Amount of Capital Business Began With<div id='column-header-27-sizer'></div></th>

                                    <th id='column-header-28'>What is the timing of this capital raise?<div id='column-header-28-sizer'></div></th>

                                    <th id='column-header-29'>Expected Close Date<div id='column-header-29-sizer'></div></th>

                                    <th id='column-header-30'>What will the capital be used for?<div id='column-header-30-sizer'></div></th>

                                    <th id='column-header-31'>Have you had previous capital raises?<div id='column-header-31-sizer'></div></th>

                                    <th id='column-header-32'>Does the founder have personal capital committed?<div id='column-header-32-sizer'></div></th>

                                    <th id='column-header-33'>How much?<div id='column-header-33-sizer'></div></th>

                                    <th id='column-header-34'>Do they expect any future capital raises?<div id='column-header-34-sizer'></div></th>

                                    <th id='column-header-35'>How much?<div id='column-header-35-sizer'></div></th>

                                    <th id='column-header-36'>Estimated timing of future capital raises<div id='column-header-36-sizer'></div></th>

                                    <th id='column-header-37'>Use of additional funds<div id='column-header-37-sizer'></div></th>

                                    <th id='column-header-38'>Current Post-Money Valuation<div id='column-header-38-sizer'></div></th>

                                    <th id='column-header-39'>Explanation of Valuation<div id='column-header-39-sizer'></div></th>

                                    <th id='column-header-40'>What are their plans for growth?<div id='column-header-40-sizer'></div></th>

                                    <th id='column-header-41'>Do they plan to exit the business in the future?<div id='column-header-41-sizer'></div></th>

                                    <th id='column-header-42'>Prior Year Monthly Financials<div id='column-header-42-sizer'></div></th>

                                    <th id='column-header-43'>Investor Deck<div id='column-header-43-sizer'></div></th>

                                    <th id='column-header-44'>3 Year Proforma Projections<div id='column-header-44-sizer'></div></th>

                                    <th id='column-header-45'>Detailed Cap Table<div id='column-header-45-sizer'></div></th>

                                </tr>
                            </thead>
                            <tbody>
                                @if(count($oppors)>0)
                                @foreach($oppors as $oppor)
                                <tr>
                                    <td class="cell-full cell-ellipsis">{{$loop->iteration}}</td>
                                    <td>
                                        @if($types[$oppor->code] == 'Co-Invest')
                                        <span class="badge badge-danger">{{$types[$oppor->code]}}</span>
                                        @else
                                        <span class="badge badge-success">{{$types[$oppor->code]}}</span>
                                        @endif
                                        
                                    </td>
                                    <td>
                                        @if($oppor->is_active == 1)
                                        <span class="badge badge-success">Active</span>
                                        @else
                                        <span class="badge badge-danger">Closed</span>
                                        @endif
                                    </td>
                                    <td class="cell-full cell-ellipsis">{{$oppor->company_name}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        <a href="{{route('member.detail-investment-questionnaire',['code' => $oppor->code])}}" class="btn btn-info">Detail</a>
                                    </td>
                                    
                                    <td>
                                        {{$nums[$oppor->code]['num_met']}}
                                    </td>
                                    <td>
                                        {{$nums[$oppor->code]['num_evaluate']}}
                                    </td>
                                    <td>
                                        {{$nums[$oppor->code]['num_noevaluate']}}
                                    </td>
                                    <td>
                                        {{$nums[$oppor->code]['num_open']}}
                                    </td>
                                    
                                    <td class="cell-full cell-ellipsis">{{$oppor->created_at}}
                                    </td>
                                    
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->company_website}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->fName.' '.$oppor->lName}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->address}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->phone}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->email}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->company_found_date}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->company_desc}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->investmentsector->type}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->investmentstage?$oppor->investmentstage->type:''}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->investmentstructure->type}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->investment_size}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->raising_capital}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->products_service}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->products_service_desc}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->bpatent==0?'No':'Yes'}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->prior_exp==0?'No':'Yes'}}</td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->length_time}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->prior_company_role}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->outcome_detail}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">{{$oppor->additional_member==0?'No':'Yes'}}</td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->primary_competitor}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->differ_desc_competitor}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">{{$oppor->bcur_contracts_customer==0?'No':'Yes'}}</td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->capital_amt_began}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->capital_raise_timing}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->expected_close_date}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->capital_used_for}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">{{$oppor->bprevious_capital_raise==0?'No':'Yes'}}</td>
                                    <td class="cell-full cell-ellipsis">{{$oppor->bfounder_capital_commit==0?'No':'Yes'}}</td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->founder_capital_amount}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">{{$oppor->bexpect_future_raise==0?'No':'Yes'}}</td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->expect_future_raise_amount}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->estimated_timing_future_capital}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->use_additional_fund}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->cur_postmoney_valuation}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->explanation_valuation}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        {{$oppor->plan_for_growth}}
                                    </td>
                                    <td class="cell-full cell-ellipsis">{{$oppor->bhave_plan_exit_business==0?'No':'Yes'}}</td>
                                    <td class="cell-full cell-ellipsis">
                                        @if($oppor->prior_year_monthly_finacial)
                                        <a href="{{route('opportunity.file',['name' => $oppor->prior_year_monthly_finacial])}}">Check</a>
                                        @else
                                        <p class="form-control-static">No File</p>
                                        @endif
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        @if($oppor->investor_deck)
                                        <a href="{{route('opportunity.file',['name' => $oppor->investor_deck])}}">Check</a>
                                        @else
                                        <p class="form-control-static">No File</p>
                                        @endif
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        @if($oppor->proforma_projections)
                                        <a href="{{route('opportunity.file',['name' => $oppor->proforma_projections])}}">Check</a>
                                        @else
                                        <p class="form-control-static">No File</p>
                                        @endif
                                    </td>
                                    <td class="cell-full cell-ellipsis">
                                        @if($oppor->detailed_cap_table)
                                        <a href="{{route('opportunity.file',['name' => $oppor->detailed_cap_table])}}">Check</a>
                                        @else
                                        <p class="form-control-static">No File</p>
                                        @endif
                                    </td>
                                    
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

<div id="link-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Will you Share this opportunity to Deal Room?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="family_email" id="family_email">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Will you Share this opportunity to Deal Room?</label>
                        <select name="bshare" class="form-control">
                            <option value="0">Do not share to Deal Room</option>
                            <option value="1">Share to Deal Room</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info form-control" style="color: white;">Submit</button>
                </form>
            </div>
        </div>
    </div>
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
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="{{asset('assets/dashboard/plugins/wizard/jquery.validate.min.js')}}"></script>
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
    
    $(function() {
      var thHeight = $("table th:first").height();
      $("table th").resizable({
          handles: "e",
          minHeight: thHeight,
          maxHeight: thHeight,
          minWidth: 40,
          resize: function (event, ui) {
            var sizerID = "#" + $(event.target).attr("id") + "-sizer";
            $(sizerID).width(ui.size.width);
          }
      });
    });

    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    $(document).on("click","#link-btn", function(){
        if($("#family_email_val").val() == ''){
            // $("#error-class").show();
            $("#error1").show();
            $("#error2").hide();
        }
        else{
            $("#error1").hide();
            if(IsEmail($("#family_email_val").val())){
                $("#error2").hide();
                $("#family_email").val($("#family_email_val").val());
                $("#link-modal").modal('show');
            }else{
                $("#error2").show();
            }
            
        }
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