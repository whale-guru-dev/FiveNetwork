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
@php
$invest_region_types = App\Model\MemberInvestmentRegionType::all();
@endphp
<body>
<form method="post" class="validation-wizard wizard-circle">
 <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="invest_region">Investment Regions :</label>
            <select class="select2 m-b-10 select2-multiple" style="width: 100%" multiple="multiple" data-placeholder="Choose" name="invest_region[]" id="invest_region">
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
    <div class="col-md-6">
        <div class="form-group">
            <input type="text" placeholder="" data-mask="$999,999,999.99" class="form-control" name="currenty">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="company_website">Company Website : </label>
                
                <input type="text" class="form-control" id="company_website" name="company_website" > 
                
                
                
            </div>
        </div>
    </div>
</div>
<button type="submit">submit</button>
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

    <script type="text/javascript" src="{{asset('assets/dashboard/plugins/multiselect/js/jquery.multi-select.js')}}"></script>


    <script src="{{asset('assets/dashboard/admin/js/custom.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/admin/js/mask.js')}}"></script>
    <!-- ============================================================== -->
    <!-- Wizard -->
    <script src="{{asset('assets/dashboard/plugins/wizard/jquery.steps.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/wizard/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/wizard/steps.js')}}"></script>
    <!-- ============================================================== -->
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
        // $users_list = $('#invest_region');
        // $users_list.multiselect({
        //     listWidth: 400,
        //     addSearchBox: false,
        //     showSelectedItems: false
        // });

        // $("#invest_region").multipleSelect({
        //     multiple: true,
        //     multipleWidth: 55,
        //     width: '100%'
        // });
    </script>
</body>

</html>