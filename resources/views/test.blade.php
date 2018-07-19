    <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1">
    <meta name="description"  content="Family Investment Exchange" />
    <meta name="author" content="DAO">
    <meta name="keywords"  content="Family Investment Exchange" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Family Investment Exchange | Apply Membership</title>

    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon.png')}}">

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/dashboard/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/dashboard/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">


    <link href="{{asset('assets/dashboard/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/dashboard/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/dashboard/plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/dashboard/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />

    <link href="{{asset('assets/dashboard/plugins/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
    <!-- <link href="{{asset('assets/dashboard/plugins/jQuery-Multi-Select-Checboxes-multiselect/css/jquery.multiselect.css')}}" rel="stylesheet" type="text/css" /> -->

    <link rel="stylesheet" href="{{asset('assets/dashboard/plugins/dropify/dist/css/dropify.min.css')}}">

    <link href="{{asset('assets/dashboard/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/dashboard/plugins/wizard/steps.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('assets/dashboard/member/css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('assets/dashboard/member/css/colors/blue-dark.css')}}" id="theme" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/member/css/custom.css')}}"> -->
    <link rel="stylesheet" href="{{asset('assets/dashboard/admin/css/intlTelInput.css')}}">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<style type="text/css">
    .emsg{
    color: red;
    }
    .hidden {
         visibility:hidden;
    }
</style>
@php
    $invest_types = App\Model\InvestmentStructureType::all();
    $invest_size_types = App\Model\MemberInvestmentSizeType::all();
    $invest_stage_types = App\Model\MemberInvestmentStageType::all();
    $invest_sector_types = App\Model\MemberInvestmentSectorType::all();
    $invest_region_types = App\Model\MemberInvestmentRegionType::all();
@endphp
<body>
<div id="main-wrapper">
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
    <div class="page-wrapper" id="page-wrapper" style="margin-left: 0px !important;">

        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <!-- Validation wizard -->
            <div class="row" id="validation">
                <div class="col-12">
                    <div class="card wizard-content apply-box">
                        <div class="card-body">
                            <h4 class="card-title">Apply for Membership</h4>

                            <form action="{{url('/test')}}" class="form" id="apply-form" method="POST">
                                @csrf
                                <h6>Step</h6>
                                
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="invest_structure">Investment Structure :</label>
                                                <select class="required" style="width: 100%" multiple  name="invest_structure[]" id="invest_structure" required>
                                                    
                                                    @foreach($invest_types as $type)
                                                    <option value="{{$type->id}}">{{$type->type}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="button-box m-t-20"> <a id="select-all" class="btn btn-danger" href="#">select all</a> <a id="deselect-all" class="btn btn-info" href="#">deselect all</a> </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="invest_region">Investment Regions :</label>
                                                <select class="required" style="width: 100%" multiple  name="invest_region[]" id="invest_region" required>
                                                    
                                                    @foreach($invest_region_types as $irt)
                                                        @if($irt->id < 14)
                                                        @if($loop->iteration == 1)
                                                        <optgroup label="Southeast">
                                                        @endif
                                                            <option value="{{$irt->id}}">{{$irt->type}}</option>
                                                        @if($loop->iteration == 13)
                                                        </optgroup>
                                                        @endif
                                                        @elseif($irt->id > 13 && $irt->id < 18)
                                                        @if($loop->iteration == 14)
                                                        <optgroup label="Southwest">
                                                        @endif
                                                            <option value="{{$irt->id}}">{{$irt->type}}</option>
                                                        @if($loop->iteration == 17)
                                                        </optgroup>
                                                        @endif
                                                        @elseif($irt->id > 17 && $irt->id < 30)
                                                        @if($loop->iteration == 18)
                                                        <optgroup label="Midwest">
                                                        @endif
                                                            <option value="{{$irt->id}}">{{$irt->type}}</option>
                                                        @if($loop->iteration == 29)
                                                        </optgroup>
                                                        @endif
                                                        @elseif($irt->id > 29 && $irt->id < 41)
                                                        @if($loop->iteration == 30)
                                                        <optgroup label="West">
                                                        @endif
                                                            <option value="{{$irt->id}}">{{$irt->type}}</option>
                                                        @if($loop->iteration == 40)
                                                        </optgroup>
                                                        @endif
                                                        @else
                                                        @if($loop->iteration == 41)
                                                        <optgroup label="Northeast">
                                                        @endif
                                                            <option value="{{$irt->id}}">{{$irt->type}}</option>
                                                        @if($loop->iteration == 50)
                                                        </optgroup>
                                                        @endif
                                                        @endif
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="private_investment_number">Approximately How many Private Investments do you/your family invest in annually? </label>
                                                <select class="custom-select form-control required" id="private_investment_number" name="private_investment_number" required="">
                                                    <option value="" selected="">Select</option>
                                                    <option value="0">1-2</option>
                                                    <option value="1">3-4</option>
                                                    <option value="2">5-7</option>
                                                    <option value="3">8-10</option>
                                                    <option value="4"> >10 </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="additional_capacity">Approximately what % of the investments you participate in have additional capacity after your participation ?</label>
                                                <select class="custom-select form-control required" id="additional_capacity" name="additional_capacity" required="">
                                                    <option value="" selected="">Select</option>
                                                    <option value="20">20%</option>
                                                    <option value="40">40%</option>
                                                    <option value="60">60%</option>
                                                    <option value="80">80%</option>
                                                    <option value="100">100%</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="average_investment_size">Typical Check Size :</label>
                                                <select class="select2 m-b-10 select2-multiple required" style="width: 100%" multiple="multiple" data-placeholder="Choose" name="average_investment_size[]" id="average_investment_size" required="">
                                                    <option value="" selected="">Select</option>
                                                    @foreach($invest_size_types as $type)
                                                    <option value="{{$type->id}}">{{$type->type}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="investment_stage">Investment Stage :</label>
                                                <select class="select2 m-b-10 select2-multiple required" style="width: 100%" multiple="multiple" data-placeholder="Choose" name="investment_stage[]" id="investment_stage" required="">
                                                    <option value="" selected="">Select</option>
                                                    @foreach($invest_stage_types as $type)
                                                    <option value="{{$type->id}}">{{$type->type}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="investment_sector">Investment Sector Focus :</label>
                                                <select class="select2 m-b-10 select2-multiple required" style="width: 100%" multiple="multiple" data-placeholder="Choose" name="investment_sector[]" id="investment_sector" required="">
                                                    <option value="" selected="">Select</option>
                                                    @foreach($invest_sector_types as $isrt)
                                                    <option value="{{$isrt->id}}">{{$isrt->type}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label>Mask Test</label>
                                            <input type="text" name="mask-val" data-inputmask="'alias': 'currency'"  class="form-control mask-money required" id="mask-val" required="">
                                            <input type="hidden" name="mask" id="mask">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group">
                                            <label>Mask Test</label>
                                            <input type="number" name="mask-val" class="form-control required" required="">
                                        </div>
                                    </div>

                                
                                
                                <button type="submit" class="form-control" id="sub-btn">submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="{{asset('assets/dashboard/plugins/jquery/jquery.min.js')}}"></script>
    <!-- <script src="{{asset('assets/dashboard/plugins/jqueryui/jquery-ui.min.js')}}"></script> -->
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('assets/dashboard/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('assets/dashboard/admin/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('assets/dashboard/admin/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('assets/dashboard/admin/js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{asset('assets/dashboard/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!--Custom JavaScript -->

    <script src="{{asset('assets/dashboard/plugins/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/dashboard/plugins/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/dashboard/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/dashboard/plugins/multiselect/js/jquery.multi-select.js')}}"></script>

    <!-- <script type="text/javascript" src="{{asset('assets/dashboard/plugins/jQuery-Multi-Select-Checboxes-multiselect/js/jquery.multiselect.js')}}"></script> -->
    <script src="{{asset('assets/dashboard/admin/js/custom.min.js')}}"></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script> -->
    <script type="text/javascript" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
    <!-- ============================================================== -->
    <!-- Wizard -->
    <script src="{{asset('assets/dashboard/plugins/wizard/jquery.steps.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/wizard/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/wizard/steps.js')}}"></script>
    <!-- ============================================================== -->
    <!-- <script src="{{asset('assets/dashboard/member/js/validation.js')}}"></script> -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/dashboard/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/moment/moment.js')}}"></script>

    <script src="{{asset('assets/dashboard/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>


    <script src="{{asset('assets/dashboard/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

    <script src="{{asset('assets/dashboard/plugins/dropify/dist/js/dropify.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/sweetalert/sweetalert.min.js')}}"></script>


    <script src="{{asset('assets/dashboard/admin/js/intlTelInput.js')}}"></script>
    <script src="{{asset('assets/dashboard/admin/js/self-custom.js')}}"></script>  

    <script src="{{asset('assets/dashboard/member/js/particles.js')}}"></script>
    <script type="text/javascript">
        // particlesJS.load('particles-js', "{{asset('assets/dashboard/member/particles.json')}}", function() {});
    </script>

    <script type="text/javascript">

        // $(".mask-money").mask('$000,000,000,000', {reverse: false, numericInput:true});
        $(".mask-money").inputmask({digits:0});
        // $(document).on("click","#sub-btn",function(){

        //     var emptyfields = $('.required').filter(function() { return this.value === ""; });
        //     if(emptyfields.length == 0){
        //         console.log('empty')
        //         $("#apply-form").submit();
        //     }else{
        //         console.log($("#"+emptyfields[0].id).offset().top)
        //         $('html, body').scrollTop($("#"+emptyfields[0].id).offset().top);
        //     }
            
        // });

        $("#apply-form").submit(function(){
            var investsite = $("#mask-val").val();
            var number = Number(investsite.replace(/[^0-9\.-]+/g,""));
            $("#mask").val(number);
        });

        
    </script>

    <script type="text/javascript">
        // $("#invest_region, #invest_structure, #private_investment_number, #additional_capacity, #average_investment_size, #investment_stage, #investment_sector").multiselect({
        //     addSearchBox:false
        // });

        $("#invest_region").multiSelect({
            selectableOptgroup: true
        });

        $('#invest_structure').multiSelect();
        $('#select-all').click(function() {
            $('#invest_structure').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function() {
            $('#invest_structure').multiSelect('deselect_all');
            return false;
        });
    $(document).ready(function(){
        var $regexname=/^((http[s]?|ftp[s]?):\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*/;
        $('#company_website').on('keypress keydown keyup',function(){
            if (!$(this).val().match($regexname)) {
              // there is a mismatch, hence show the error message
                $('.emsg').removeClass('hidden');
                $('.emsg').show();
            }
            else{
                // else, do not display message
                $('.emsg').addClass('hidden');
            }
        });
    });
    </script>
</body>

</html>