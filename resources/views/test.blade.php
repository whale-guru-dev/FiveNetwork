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

    <link href="{{asset('assets/dashboard/plugins/multiple-select/multiple-select.css')}}" rel="stylesheet" type="text/css" />
    <!-- <link href="{{asset('assets/dashboard/plugins/jQuery-Multi-Select-Checboxes-multiselect/css/jquery.multiselect.css')}}" rel="stylesheet" type="text/css" /> -->

    <link href="{{asset('assets/dashboard/plugins/checkbox-tree/hummingbird-treeview.css')}}" rel="stylesheet" type="text/css" />

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

    #star-check > #star-error {
        display: none !important;
    }

    /*.ms-choice{
        display: none;
    }
    #invest_structure ,#invest_region {
        width: 100%;
        position: absolute;
        left: -9999px;
    }*/

    /*.ms-drop{
        display: block !important;
        background: #fff;
        color: #555555;
        float: left;
        width: 45%;
        border: 0px solid #aaa; 
    }
    .ms-drop ul{
        webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -webkit-transition: border linear 0.2s, box-shadow linear 0.2s;
        -moz-transition: border linear 0.2s, box-shadow linear 0.2s;
        -ms-transition: border linear 0.2s, box-shadow linear 0.2s;
        -o-transition: border linear 0.2s, box-shadow linear 0.2s;
        transition: border linear 0.2s, box-shadow linear 0.2s;*/
        /*border: 1px solid #ccc;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;*/
        /*position: relative;
        height: 200px;
        overflow-y: auto;*/
    /*}*/

/*    .ms-drop [type=checkbox]:checked, [type=checkbox]:not(:checked) {
        position: relative !important;
        left: 0px !important;
        opacity: 1 !important; 
    }

    .ms-drop ul > li {
        list-style: none;
        display: list-item;
        background-image: none;
        position: static;
        border-bottom: 1px #eee solid;
        padding: 2px 10px;
        color: #555;
        font-size: 14px;
    }

    .ms-drop span{
        margin-left: 5px;
    }*/
    ul, li {
      list-style-type: none;
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
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="deal-room-table">
                            <thead>
                                <tr>
                                    <th title="Hooray!"><i class="fa fa-thumbs-up"></i></th>
                                    <th title="Hooray!"><i class="fa fa-thumbs-down"></i></th>
                                    <th title="Hooray!"><i class="fa fa-handshake-o"></i></th>
                                    <th title="Hooray!"><i class="fa fa-link"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="checkbox checkbox-success">
                                            <input type="checkbox" id="connected_member_1" name="connected_member[]" value="1" class="filled-in" >
                                            <label for="connected_member_1"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="checkbox checkbox-success">
                                            <input type="checkbox" id="connected_member_2" name="connected_member[]" value="2" class="filled-in" >
                                            <label for="connected_member_2"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="checkbox checkbox-success">
                                            <input type="checkbox" id="connected_member_3" name="connected_member[]" value="3" class="filled-in" >
                                            <label for="connected_member_3"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="checkbox checkbox-success">
                                            <input type="checkbox" id="connected_member_4" name="connected_member[]" value="4" class="filled-in" >
                                            <label for="connected_member_4"></label>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h6>Previous Year</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="prev1_total_revenue"> Previous Year Total Revenue :  <span class="danger">*</span>
                                        </label>
                                        <input type="text" class="form-control  mask-money" data-inputmask="'alias': 'currency'" id="prev1_total_revenue" name="prev1_total_revenue"  value="@php if(isset($form)) echo $form->prev1_total_revenue; @endphp"> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="prev1_total_expense"> Previous Year Total Expenses :  <span class="danger">*</span>
                                        </label>
                                        <input type="text" class="form-control  mask-money" data-inputmask="'alias': 'currency'" id="prev1_total_expense" name="prev1_total_expense"  value="@php if(isset($form)) echo $form->prev1_total_expense; @endphp"> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="prev1_revenue_expense"> Previous Year Total Revenue  - Total Expenses :  <span class="danger">*</span>
                                        </label>
                                        <input type="text" class="form-control  mask-money" data-inputmask="'alias': 'currency'" id="prev1_revenue_expense" name="prev1_revenue_expense" readonly="" value="@php if(isset($form)) echo $form->prev1_revenue_expense; @endphp"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="form-group">
                                <button class="btn btn-info" id="connect-btn">Connect Interested Members</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <form action="{{url('/test')}}" method="POST" id="connect-form">
        @csrf
        <input type="hidden" name="connected_member_ids[]" id="connect-member-ids">
    </form>

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

    <!-- <script type="text/javascript" src="{{asset('assets/dashboard/plugins/multiselect/js/jquery.multi-select.js')}}"></script> -->
    <!-- <link rel="stylesheet"  href="{{asset('assets/dashboard/plugins/bootstrap-multiselect/dist/css/bootstrap-multiselect.css')}}"> -->
    <!-- <script src="{{asset('assets/dashboard/plugins/bootstrap-multiselect/dist/js/bootstrap-multiselect.js')}}" type="text/javascript"></script> -->
    <!-- <script type="text/javascript" src="{{asset('assets/dashboard/plugins/jQuery-Multi-Select-Checboxes-multiselect/js/jquery.multiselect.js')}}"></script> -->
    <script type="text/javascript" src="{{asset('assets/dashboard/plugins/multiple-select/multiple-select.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/dashboard/plugins/checkbox-tree/hummingbird-treeview.js')}}"></script>
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

    <script src="{{asset('assets/dashboard/plugins/icheck/icheck.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/icheck/icheck.init.js')}}"></script>


    <script src="{{asset('assets/dashboard/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

    <script src="{{asset('assets/dashboard/plugins/dropify/dist/js/dropify.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/sweetalert/sweetalert.min.js')}}"></script>


    <script src="{{asset('assets/dashboard/admin/js/intlTelInput.js')}}"></script>
    <script src="{{asset('assets/dashboard/admin/js/self-custom.js')}}"></script>  

    <script src="{{asset('assets/dashboard/member/js/particles.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
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
        // particlesJS.load('particles-js', "{{asset('assets/dashboard/member/particles.json')}}", function() {});
    </script>

    <script type="text/javascript">
        $('#deal-room-table').DataTable();
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip(); 
        });
        $('.dropify').dropify();
        $("#invest_region").multipleSelect({
            
        });

        $('#invest_structure').multipleSelect({
            
        });

        $("#treeview").hummingbird();

        $(".mask-money").inputmask({digits:0, rightAlign:false});
        
        function check(){
            $("#m3").val( Math.abs(Number($("#m1").val().replace(/[^0-9\.-]+/g,"")) - Number($("#m2").val().replace(/[^0-9\.-]+/g,"")) ))
        }

        $(".mask-money").bind("paste keyup",function (event) {
           var _this = this;
            // Short pause to wait for paste to complete
            setTimeout( function() {
               $("#prev1_revenue_expense").val( Math.abs(Number($("#prev1_total_revenue").val().replace(/[^0-9\.-]+/g,"")) - Number($("#prev1_total_expense").val().replace(/[^0-9\.-]+/g,"")) ));
            }, 100);
        });

        $(document).on("click","#connect-btn", function(){
            var ids = new Array();
            $.each($("input[name='connected_member[]']:checked"), function() {
              ids.push($(this).val());
            });

            $("#connect-member-ids").val(ids);
            $("#connect-form").submit();

        });
        
        $("#form").validate({
            ignore: "input[type=hidden]"
            , errorClass: "text-danger"
            , successClass: "text-success"
            , highlight: function (element, errorClass) {
                $(element).removeClass(errorClass)
            }
            , unhighlight: function (element, errorClass) {
                $(element).removeClass(errorClass)
            }
            , errorPlacement: function (error, element) {
                if(element[0].id == "bprivacy")
                    error.insertAfter(element[0].parentElement)
                else error.insertAfter(element)
            }
            , rules: {
                star: {
                    required : true
                }
            }
        });

        $('#form').on('keyup keypress', function(e) {
          var keyCode = e.keyCode || e.which;
          if (keyCode === 13) { 
            e.preventDefault();
            return false;
          }
        });
    </script>

</body>

</html>