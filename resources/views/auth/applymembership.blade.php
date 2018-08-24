@php
    $invest_types = App\Model\InvestmentStructureType::all();
    $invest_size_types = App\Model\MemberInvestmentSizeType::all();
    $invest_stage_types = App\Model\MemberInvestmentStageType::all();
    $invest_sector_types = App\Model\MemberInvestmentSectorType::orderBy('type','ASC')->get();
    $invest_region_types = App\Model\MemberInvestmentRegionType::all();
    $invest_state = App\Model\MemberState::all();
@endphp

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
    <link href="{{asset('assets/dashboard/plugins/jQuery-Multi-Select-Checboxes-multiselect/css/jquery.multiselect.css')}}" rel="stylesheet" type="text/css" />

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
.sweet-alert {
  background-color: white;
} 

.sweet-alert h2 {
color: #575757;
}
.sweet-alert p {
color: #797979;
}
.sweet-alert .sa-icon.sa-success::before, .sweet-alert .sa-icon.sa-success::after {
    background: white;
}
.sweet-alert .sa-icon.sa-success .sa-fix {
    background-color: white; 
}
.emsg{
    color: red;
}
.emsg1{
    color: red;
}
.hidden {
     visibility:hidden;
}


ul, li {
  list-style-type: none;
}

/*.treeview {
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border linear 0.2s, box-shadow linear 0.2s;
    -moz-transition: border linear 0.2s, box-shadow linear 0.2s;
    -ms-transition: border linear 0.2s, box-shadow linear 0.2s;
    -o-transition: border linear 0.2s, box-shadow linear 0.2s;
    transition: border linear 0.2s, box-shadow linear 0.2s;
    border: 1px solid #ccc;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    position: relative;
    height: 200px;
    padding: 0;
    overflow-y: auto;
}*/

.treeview li {
    padding: 2px 10px;
}

#region-type ,#selectall{
    color: #08c !important;
    font-weight: bold;
}


</style>
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->


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
                @if($submitted == 1)
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{route('home')}}" class="btn btn-sm btn-info">Go To Landing Page</a>
                    </div>
                </div>
                @endif
                <div class="row" id="validation">
                    <div class="col-12">
                        <div class="card wizard-content apply-box">
                            <div class="card-body">
                                <h4 class="card-title">Apply for Membership</h4>

                                <form action="{{url('/applymembership')}}" class="validation-wizard wizard-circle" id="apply-form" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <h6>Applicant Information</h6>
                                    <section>
                                    <!-- </section> -->
                                    <!-- Step 1 -->
                                    
                                    <!-- <section> -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> Email Address : <span class="danger">*</span> </label>
                                                    <input type="email" class="form-control required" id="email" name="email" readonly="" value="{{$user->email}}"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="conf_email">Re-Enter Email : <span class="danger">*</span> </label>
                                                    <input type="email" class="form-control required" id="conf_email" name="email_confirmation"> </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password"> Password : <span class="danger">*</span> 
                                                    </label>
                                                    <input type="password" class="form-control required" minlength="8" id="password" name="password"> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="conf_password"> Confirm Password : <span class="danger">*</span> 
                                                    </label>
                                                    <input type="password" class="form-control required" minlength="8" id="conf_password" name="conf_password"> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="apply_type"> Are you applying for a Family Office or Individual Membership?
                                                        <span class="danger">*</span> 
                                                    </label>
                                                    <select class="custom-select form-control required" id="apply_type" name="apply_type">
                                                        <option value="">Select</option>
                                                        <option value="0">Family Office</option>
                                                        <option value="1">Individual</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="family_office" style="display: none;">
                                                <div class="form-group">
                                                    <label for="bprinciple"> Are you a Principle of the Family Office? 
                                                        <span class="danger">*</span> 
                                                    </label>
                                                    <select class="custom-select form-control" id="bprinciple" name="bprinciple">
                                                        <option value="">Select</option>
                                                        <option value="0">No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="title"> Title : <span class="danger">*</span> 
                                                    </label>
                                                    <input type="text" class="form-control required" id="title" name="title" > 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="aware_method"> How did you hear about Family Investment Exchange?
                                                        <span class="danger">*</span> 
                                                    </label>
                                                    <select class="custom-select form-control required" id="aware_method" name="aware_method">
                                                        <option value="" selected>Select</option>
                                                        <option value="1">Current FIVE Network member</option>
                                                        <option value="0">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group collapse" id="aware_who" style="display: none;">
                                                    <label for="aware_method_desc_who"> Who : <span class="danger">*</span> 
                                                    </label>
                                                    <input type="text" class="form-control" id="aware_method_desc_who" name="aware_method_desc_who"> 
                                                </div>
                                                <div class="form-group collapse" id="aware_how" style="display: none;">
                                                    <label for="aware_method_desc_how"> How : <span class="danger">*</span> 
                                                    </label>
                                                    <input type="text" class="form-control " id="aware_method_desc_how" name="aware_method_desc_how"> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="family_office_name"> <span id="name_type">Family Office Name</span> : <span class="danger">*</span> 
                                                    </label>
                                                    <input type="text" class="form-control required" id="family_office_name" name="family_office_name"> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fName"> First Name : <span class="danger">*</span> 
                                                    </label>
                                                    <input type="text" class="form-control required" id="fName" name="fName"  > 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="lName"> Last Name : <span class="danger">*</span> 
                                                    </label>
                                                    <input type="text" class="form-control required" id="lName" name="lName" > 
                                                </div>
                                            </div>
                                        </div>

                                        

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="addr_1"> Address Line 1 : <span class="danger">*</span> </label>
                                                    <input type="text" class="form-control required" id="addr_1" name="addr_1"  > 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="addr_2"> Address Line 2 :</label>
                                                    <input type="text" class="form-control" id="addr_2"  name="addr_2"> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="town_city"> Town/City : <span class="danger">*</span> </label>
                                                    <input type="text" class="form-control required" id="town_city" name="town_city" > 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="state"> State : <span class="danger">*</span></label>
                                                    <select class="custom-select form-control required" style="width: 100%" name="state" id="state" required >
                                                        <option value="" selected="">Select</option>
                                                        @foreach($invest_state as $istate)
                                                            <option value="{{$istate->code}}">{{$istate->state}}</option>
                                                        @endforeach
                                                    </select> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="postal_code"> Postal Code : <span class="danger">*</span> </label>
                                                    <input type="text" class="form-control required" id="postal_code" name="postal_code"> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="country"> Country : <span class="danger">*</span> </label>
                                                    <select class="custom-select form-control required" id="country" name="country">
                                                        <option value="">Select Country</option>
                                                        <option value="US" selected>United States</option>
                                                        <option value="AF">Afghanistan</option>
                                                        <option value="AX">Åland Islands</option>
                                                        <option value="AL">Albania</option>
                                                        <option value="DZ">Algeria</option>
                                                        <option value="AS">American Samoa</option>
                                                        <option value="AD">Andorra</option>
                                                        <option value="AO">Angola</option>
                                                        <option value="AI">Anguilla</option>
                                                        <option value="AQ">Antarctica</option>
                                                        <option value="AG">Antigua and Barbuda</option>
                                                        <option value="AR">Argentina</option>
                                                        <option value="AM">Armenia</option>
                                                        <option value="AW">Aruba</option>
                                                        <option value="AU">Australia</option>
                                                        <option value="AT">Austria</option>
                                                        <option value="AZ">Azerbaijan</option>
                                                        <option value="BS">Bahamas</option>
                                                        <option value="BH">Bahrain</option>
                                                        <option value="BD">Bangladesh</option>
                                                        <option value="BB">Barbados</option>
                                                        <option value="BY">Belarus</option>
                                                        <option value="BE">Belgium</option>
                                                        <option value="BZ">Belize</option>
                                                        <option value="BJ">Benin</option>
                                                        <option value="BM">Bermuda</option>
                                                        <option value="BT">Bhutan</option>
                                                        <option value="BO">Bolivia, Plurinational State of</option>
                                                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                        <option value="BA">Bosnia and Herzegovina</option>
                                                        <option value="BW">Botswana</option>
                                                        <option value="BV">Bouvet Island</option>
                                                        <option value="BR">Brazil</option>
                                                        <option value="IO">British Indian Ocean Territory</option>
                                                        <option value="BN">Brunei Darussalam</option>
                                                        <option value="BG">Bulgaria</option>
                                                        <option value="BF">Burkina Faso</option>
                                                        <option value="BI">Burundi</option>
                                                        <option value="KH">Cambodia</option>
                                                        <option value="CM">Cameroon</option>
                                                        <option value="CA">Canada</option>
                                                        <option value="CV">Cape Verde</option>
                                                        <option value="KY">Cayman Islands</option>
                                                        <option value="CF">Central African Republic</option>
                                                        <option value="TD">Chad</option>
                                                        <option value="CL">Chile</option>
                                                        <option value="CN">China</option>
                                                        <option value="CX">Christmas Island</option>
                                                        <option value="CC">Cocos (Keeling) Islands</option>
                                                        <option value="CO">Colombia</option>
                                                        <option value="KM">Comoros</option>
                                                        <option value="CG">Congo</option>
                                                        <option value="CD">Congo, the Democratic Republic of the</option>
                                                        <option value="CK">Cook Islands</option>
                                                        <option value="CR">Costa Rica</option>
                                                        <option value="CI">Côte d'Ivoire</option>
                                                        <option value="HR">Croatia</option>
                                                        <option value="CU">Cuba</option>
                                                        <option value="CW">Curaçao</option>
                                                        <option value="CY">Cyprus</option>
                                                        <option value="CZ">Czech Republic</option>
                                                        <option value="DK">Denmark</option>
                                                        <option value="DJ">Djibouti</option>
                                                        <option value="DM">Dominica</option>
                                                        <option value="DO">Dominican Republic</option>
                                                        <option value="EC">Ecuador</option>
                                                        <option value="EG">Egypt</option>
                                                        <option value="SV">El Salvador</option>
                                                        <option value="GQ">Equatorial Guinea</option>
                                                        <option value="ER">Eritrea</option>
                                                        <option value="EE">Estonia</option>
                                                        <option value="ET">Ethiopia</option>
                                                        <option value="FK">Falkland Islands (Malvinas)</option>
                                                        <option value="FO">Faroe Islands</option>
                                                        <option value="FJ">Fiji</option>
                                                        <option value="FI">Finland</option>
                                                        <option value="FR">France</option>
                                                        <option value="GF">French Guiana</option>
                                                        <option value="PF">French Polynesia</option>
                                                        <option value="TF">French Southern Territories</option>
                                                        <option value="GA">Gabon</option>
                                                        <option value="GM">Gambia</option>
                                                        <option value="GE">Georgia</option>
                                                        <option value="DE">Germany</option>
                                                        <option value="GH">Ghana</option>
                                                        <option value="GI">Gibraltar</option>
                                                        <option value="GR">Greece</option>
                                                        <option value="GL">Greenland</option>
                                                        <option value="GD">Grenada</option>
                                                        <option value="GP">Guadeloupe</option>
                                                        <option value="GU">Guam</option>
                                                        <option value="GT">Guatemala</option>
                                                        <option value="GG">Guernsey</option>
                                                        <option value="GN">Guinea</option>
                                                        <option value="GW">Guinea-Bissau</option>
                                                        <option value="GY">Guyana</option>
                                                        <option value="HT">Haiti</option>
                                                        <option value="HM">Heard Island and McDonald Islands</option>
                                                        <option value="VA">Holy See (Vatican City State)</option>
                                                        <option value="HN">Honduras</option>
                                                        <option value="HK">Hong Kong</option>
                                                        <option value="HU">Hungary</option>
                                                        <option value="IS">Iceland</option>
                                                        <option value="IN">India</option>
                                                        <option value="ID">Indonesia</option>
                                                        <option value="IR">Iran, Islamic Republic of</option>
                                                        <option value="IQ">Iraq</option>
                                                        <option value="IE">Ireland</option>
                                                        <option value="IM">Isle of Man</option>
                                                        <option value="IL">Israel</option>
                                                        <option value="IT">Italy</option>
                                                        <option value="JM">Jamaica</option>
                                                        <option value="JP">Japan</option>
                                                        <option value="JE">Jersey</option>
                                                        <option value="JO">Jordan</option>
                                                        <option value="KZ">Kazakhstan</option>
                                                        <option value="KE">Kenya</option>
                                                        <option value="KI">Kiribati</option>
                                                        <option value="KP">Korea, Democratic People's Republic of</option>
                                                        <option value="KR">Korea, Republic of</option>
                                                        <option value="KW">Kuwait</option>
                                                        <option value="KG">Kyrgyzstan</option>
                                                        <option value="LA">Lao People's Democratic Republic</option>
                                                        <option value="LV">Latvia</option>
                                                        <option value="LB">Lebanon</option>
                                                        <option value="LS">Lesotho</option>
                                                        <option value="LR">Liberia</option>
                                                        <option value="LY">Libya</option>
                                                        <option value="LI">Liechtenstein</option>
                                                        <option value="LT">Lithuania</option>
                                                        <option value="LU">Luxembourg</option>
                                                        <option value="MO">Macao</option>
                                                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                                        <option value="MG">Madagascar</option>
                                                        <option value="MW">Malawi</option>
                                                        <option value="MY">Malaysia</option>
                                                        <option value="MV">Maldives</option>
                                                        <option value="ML">Mali</option>
                                                        <option value="MT">Malta</option>
                                                        <option value="MH">Marshall Islands</option>
                                                        <option value="MQ">Martinique</option>
                                                        <option value="MR">Mauritania</option>
                                                        <option value="MU">Mauritius</option>
                                                        <option value="YT">Mayotte</option>
                                                        <option value="MX">Mexico</option>
                                                        <option value="FM">Micronesia, Federated States of</option>
                                                        <option value="MD">Moldova, Republic of</option>
                                                        <option value="MC">Monaco</option>
                                                        <option value="MN">Mongolia</option>
                                                        <option value="ME">Montenegro</option>
                                                        <option value="MS">Montserrat</option>
                                                        <option value="MA">Morocco</option>
                                                        <option value="MZ">Mozambique</option>
                                                        <option value="MM">Myanmar</option>
                                                        <option value="NA">Namibia</option>
                                                        <option value="NR">Nauru</option>
                                                        <option value="NP">Nepal</option>
                                                        <option value="NL">Netherlands</option>
                                                        <option value="NC">New Caledonia</option>
                                                        <option value="NZ">New Zealand</option>
                                                        <option value="NI">Nicaragua</option>
                                                        <option value="NE">Niger</option>
                                                        <option value="NG">Nigeria</option>
                                                        <option value="NU">Niue</option>
                                                        <option value="NF">Norfolk Island</option>
                                                        <option value="MP">Northern Mariana Islands</option>
                                                        <option value="NO">Norway</option>
                                                        <option value="OM">Oman</option>
                                                        <option value="PK">Pakistan</option>
                                                        <option value="PW">Palau</option>
                                                        <option value="PS">Palestinian Territory, Occupied</option>
                                                        <option value="PA">Panama</option>
                                                        <option value="PG">Papua New Guinea</option>
                                                        <option value="PY">Paraguay</option>
                                                        <option value="PE">Peru</option>
                                                        <option value="PH">Philippines</option>
                                                        <option value="PN">Pitcairn</option>
                                                        <option value="PL">Poland</option>
                                                        <option value="PT">Portugal</option>
                                                        <option value="PR">Puerto Rico</option>
                                                        <option value="QA">Qatar</option>
                                                        <option value="RE">Réunion</option>
                                                        <option value="RO">Romania</option>
                                                        <option value="RU">Russian Federation</option>
                                                        <option value="RW">Rwanda</option>
                                                        <option value="BL">Saint Barthélemy</option>
                                                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                                        <option value="KN">Saint Kitts and Nevis</option>
                                                        <option value="LC">Saint Lucia</option>
                                                        <option value="MF">Saint Martin (French part)</option>
                                                        <option value="PM">Saint Pierre and Miquelon</option>
                                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                                        <option value="WS">Samoa</option>
                                                        <option value="SM">San Marino</option>
                                                        <option value="ST">Sao Tome and Principe</option>
                                                        <option value="SA">Saudi Arabia</option>
                                                        <option value="SN">Senegal</option>
                                                        <option value="RS">Serbia</option>
                                                        <option value="SC">Seychelles</option>
                                                        <option value="SL">Sierra Leone</option>
                                                        <option value="SG">Singapore</option>
                                                        <option value="SX">Sint Maarten (Dutch part)</option>
                                                        <option value="SK">Slovakia</option>
                                                        <option value="SI">Slovenia</option>
                                                        <option value="SB">Solomon Islands</option>
                                                        <option value="SO">Somalia</option>
                                                        <option value="ZA">South Africa</option>
                                                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                                                        <option value="SS">South Sudan</option>
                                                        <option value="ES">Spain</option>
                                                        <option value="LK">Sri Lanka</option>
                                                        <option value="SD">Sudan</option>
                                                        <option value="SR">Suriname</option>
                                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                                        <option value="SZ">Swaziland</option>
                                                        <option value="SE">Sweden</option>
                                                        <option value="CH">Switzerland</option>
                                                        <option value="SY">Syrian Arab Republic</option>
                                                        <option value="TW">Taiwan, Province of China</option>
                                                        <option value="TJ">Tajikistan</option>
                                                        <option value="TZ">Tanzania, United Republic of</option>
                                                        <option value="TH">Thailand</option>
                                                        <option value="TL">Timor-Leste</option>
                                                        <option value="TG">Togo</option>
                                                        <option value="TK">Tokelau</option>
                                                        <option value="TO">Tonga</option>
                                                        <option value="TT">Trinidad and Tobago</option>
                                                        <option value="TN">Tunisia</option>
                                                        <option value="TR">Turkey</option>
                                                        <option value="TM">Turkmenistan</option>
                                                        <option value="TC">Turks and Caicos Islands</option>
                                                        <option value="TV">Tuvalu</option>
                                                        <option value="UG">Uganda</option>
                                                        <option value="UA">Ukraine</option>
                                                        <option value="AE">United Arab Emirates</option>
                                                        <option value="GB">United Kingdom</option>
                                                        <option value="UM">United States Minor Outlying Islands</option>
                                                        <option value="UY">Uruguay</option>
                                                        <option value="UZ">Uzbekistan</option>
                                                        <option value="VU">Vanuatu</option>
                                                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                                                        <option value="VN">Viet Nam</option>
                                                        <option value="VG">Virgin Islands, British</option>
                                                        <option value="VI">Virgin Islands, U.S.</option>
                                                        <option value="WF">Wallis and Futuna</option>
                                                        <option value="EH">Western Sahara</option>
                                                        <option value="YE">Yemen</option>
                                                        <option value="ZM">Zambia</option>
                                                        <option value="ZW">Zimbabwe</option>
                                                    </select> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone_office">Office Phone : <span class="danger">*</span></label>
                                                    <input type="tel" class="form-control required" id="phone_officex" name="phone_officex" placeholder="000-000-0000"> 
                                                    <input id="phone_office" type="hidden" name="phone_office">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone_mobile">Mobile Phone : </label>
                                                    <input type="tel" class="form-control" id="phone_mobile" name="phone_mobile"  placeholder="000-000-0000"> 
                                                    <input id="mobilex" type="hidden" name="mobilex">
                                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mdate">Date of Birth :</label>
                                                    <input type="date" class="form-control" placeholder="mm/dd/yyyy" name="dob" > 

                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 2 -->
                                    <h6>Investment Objectives</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="private_investment_number">Approximately how many private investments do you/your family invest in annually? <span class="danger">*</span></label>
                                                    <select class="custom-select form-control required" id="private_investment_number" name="private_investment_number">
                                                        <option value="" selected="">Select</option>
                                                        <option value="0">1-2</option>
                                                        <option value="1">3-4</option>
                                                        <option value="2">5-7</option>
                                                        <option value="3">8-10</option>
                                                        <option value="4"> >10 </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="additional_capacity">Approximately what % of the investments you participate in are you co-investing alongside others? <span class="danger">*</span></label>
                                                    <select class="custom-select form-control required" id="additional_capacity" name="additional_capacity">
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
                                                    <label for="invest_structure">Investment Structure :</label>
                                                    <ul class="treeview" id="treeview1">
                                                        <li> 
                                                            <i class="fa fa-minus"></i>
                                                            <label>
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="xnode-1-1" data-id="custom-1-1" type="checkbox">
                                                                    <label for="xnode-1-1" id="selectall"> Select All  </label>
                                                                </div>
                                                            </label>
                                                            <ul>
                                                                @foreach($invest_types as $type)
                                                                <li>
                                                                    <label>
                                                                        <div class="checkbox checkbox-success">
                                                                            <input class="hummingbirdNoParent" id="xnode-1-1-{{$type->id}}" data-id="custom-1-1-{{$type->id}}" type="checkbox" name="invest_structure[]" value="{{$type->id}}">
                                                                            <label for="xnode-1-1-{{$type->id}}"> {{$type->type}} </label>
                                                                        </div>
                                                                    </label>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="invest_region">Investment Regions :</label>
                                                    <ul id="treeview2" class="treeview">
                                                        <li> 
                                                            <i class="fa fa-minus"></i>
                                                            <label>
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="xnode-0-0" data-id="custom-0-0" type="checkbox" >
                                                                    <label for="xnode-0-0" id="selectall"> Select All  </label>
                                                                </div>
                                                            </label>
                                                            <ul>
                                                                <li> 
                                                                    <i class="fa fa-plus"></i>
                                                                    <label>
                                                                        <div class="checkbox checkbox-success">
                                                                            <input id="xnode-0-6" data-id="custom-0-6" type="checkbox">
                                                                            <label for="xnode-0-6" id="region-type"> Northeast  </label>
                                                                        </div>
                                                                    </label>
                                                                    
                                                                    <ul style="display: none;">
                                                                        @foreach($invest_region_types as $irt)
                                                                        @if($irt->id > 40)
                                                                        <li>
                                                                            <label>
                                                                                <div class="checkbox checkbox-success">
                                                                                    <input class="hummingbirdNoParent" id="xnode-0-6-{{$irt->id}}" data-id="custom-0-6-{{$irt->id}}" type="checkbox" name="invest_region[]" value="{{$irt->id}}" >
                                                                                    <label for="xnode-0-6-{{$irt->id}}"> {{$irt->type}}   </label>
                                                                                </div>
                                                                            </label>
                                                                        </li>
                                                                        @endif
                                                                        @endforeach
                                                                    </ul>
                                                                </li>

                                                                <li> 
                                                                    <i class="fa fa-plus"></i>
                                                                    <label>
                                                                        <div class="checkbox checkbox-success">
                                                                            <input id="xnode-0-3" data-id="custom-0-3" type="checkbox">
                                                                            <label for="xnode-0-3" id="region-type"> Midwest  </label>
                                                                        </div>
                                                                    </label>
                                                                    
                                                                    <ul style="display: none;">
                                                                        @foreach($invest_region_types as $irt)
                                                                        @if($irt->id > 17 && $irt->id < 30)
                                                                        <li>
                                                                            <label>
                                                                                <div class="checkbox checkbox-success">
                                                                                    <input class="hummingbirdNoParent" id="xnode-0-4-{{$irt->id}}" data-id="custom-0-4-{{$irt->id}}" type="checkbox" name="invest_region[]" value="{{$irt->id}}" >
                                                                                    <label for="xnode-0-4-{{$irt->id}}"> {{$irt->type}}   </label>
                                                                                </div>
                                                                            </label>
                                                                        </li>
                                                                        @endif
                                                                        @endforeach
                                                                    </ul>
                                                                </li>

                                                                <li> 
                                                                    <i class="fa fa-plus"></i>
                                                                    <label>
                                                                        <div class="checkbox checkbox-success">
                                                                            <input id="xnode-0-1" data-id="custom-0-1" type="checkbox" >
                                                                            <label for="xnode-0-1" id="region-type"> Southeast  </label>
                                                                        </div>
                                                                    </label>
                                                                    
                                                                    <ul style="display: none;">
                                                                        @foreach($invest_region_types as $irt)
                                                                        @if($irt->id < 14)
                                                                        <li>
                                                                            <label>
                                                                                <div class="checkbox checkbox-success">
                                                                                    <input class="hummingbirdNoParent" id="xnode-0-1-{{$irt->id}}" data-id="custom-0-1-{{$irt->id}}" type="checkbox" name="invest_region[]" value="{{$irt->id}}" >
                                                                                    <label for="xnode-0-1-{{$irt->id}}" > {{$irt->type}}   </label>
                                                                                </div>
                                                                            </label>
                                                                        </li>
                                                                        @endif
                                                                        @endforeach
                                                                    </ul>
                                                                </li>

                                                                <li> 
                                                                    <i class="fa fa-plus"></i>
                                                                    <label>
                                                                        <div class="checkbox checkbox-success">
                                                                            <input id="xnode-0-2" data-id="custom-0-2" type="checkbox" >
                                                                            <label for="xnode-0-2" id="region-type"> Southwest  </label>
                                                                        </div>
                                                                    </label>
                                                                    
                                                                    <ul style="display: none;">
                                                                        @foreach($invest_region_types as $irt)
                                                                        @if($irt->id > 13 && $irt->id < 18)
                                                                        <li>
                                                                            <label>
                                                                                <div class="checkbox checkbox-success">
                                                                                    <input class="hummingbirdNoParent" id="xnode-0-2-{{$irt->id}}" data-id="custom-0-2-{{$irt->id}}" type="checkbox" name="invest_region[]" value="{{$irt->id}}" >
                                                                                    <label for="xnode-0-2-{{$irt->id}}" > {{$irt->type}}   </label>
                                                                                </div>
                                                                            </label>
                                                                        </li>
                                                                        @endif
                                                                        @endforeach
                                                                    </ul>
                                                                </li>
                                                                
                                                                <li> 
                                                                    <i class="fa fa-plus"></i>
                                                                    <label>
                                                                        <div class="checkbox checkbox-success">
                                                                            <input id="xnode-0-5" data-id="custom-0-5" type="checkbox" >
                                                                            <label for="xnode-0-5" id="region-type"> West  </label>
                                                                        </div>
                                                                    </label>
                                                                    
                                                                    <ul style="display: none;">
                                                                        @foreach($invest_region_types as $irt)
                                                                        @if($irt->id > 29 && $irt->id < 41)
                                                                        <li>
                                                                            <label>
                                                                                <div class="checkbox checkbox-success">
                                                                                    <input class="hummingbirdNoParent" id="xnode-0-5-{{$irt->id}}" data-id="custom-0-5-{{$irt->id}}" type="checkbox" name="invest_region[]" value="{{$irt->id}}" >
                                                                                    <label for="xnode-0-5-{{$irt->id}}"> {{$irt->type}}   </label>
                                                                                </div>
                                                                            </label>
                                                                        </li>
                                                                        @endif
                                                                        @endforeach
                                                                    </ul>
                                                                </li>

                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="average_investment_size">Typical Check Size :</label>
                                                    
                                                    <ul class="treeview" id="treeview1">
                                                        <li> 
                                                            <i class="fa fa-minus"></i>
                                                            <label>
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="xnode-2-1" data-id="custom-2-1" type="checkbox">
                                                                    <label for="xnode-2-1" id="selectall"> Select All  </label>
                                                                </div>
                                                            </label>
                                                            <ul>
                                                                @foreach($invest_size_types as $type)
                                                                <li>
                                                                    <label>
                                                                        <div class="checkbox checkbox-success">
                                                                            <input class="hummingbirdNoParent" id="xnode-2-1-{{$type->id}}" data-id="custom-2-1-{{$type->id}}" type="checkbox" name="average_investment_size[]" value="{{$type->id}}">
                                                                            <label for="xnode-2-1-{{$type->id}}"> {{$type->type}} </label>
                                                                        </div>
                                                                    </label>
                                                                </li>
                                                               @endforeach
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="investment_stage">Investment Stage :</label>
                                                    
                                                    <ul class="treeview" id="treeview1">
                                                        <li> 
                                                            <i class="fa fa-minus"></i>
                                                            <label>
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="xnode-3-1" data-id="custom-3-1" type="checkbox">
                                                                    <label for="xnode-3-1" id="selectall"> Select All  </label>
                                                                </div>
                                                            </label>
                                                            <ul>
                                                                @foreach($invest_stage_types as $type)
                                                                <li>
                                                                    <label>
                                                                        <div class="checkbox checkbox-success">
                                                                            <input class="hummingbirdNoParent" id="xnode-3-1-{{$type->id}}" data-id="custom-3-1-{{$type->id}}" type="checkbox" name="investment_stage[]" value="{{$type->id}}">
                                                                            <label for="xnode-3-1-{{$type->id}}"> {{$type->type}} </label>
                                                                        </div>
                                                                    </label>
                                                                </li>
                                                               @endforeach
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                
                                                <label for="investment_sector">Investment Sector Focus :</label>
                                                <ul class="treeview" id="treeview1">
                                                    <li> 
                                                        <i class="fa fa-minus"></i>
                                                        <label>
                                                            <div class="checkbox checkbox-success">
                                                                <input id="xnode-4-1" data-id="custom-4-1" type="checkbox">
                                                                <label for="xnode-4-1" id="selectall"> Select All  </label>
                                                            </div>
                                                        </label>
                                                        <ul>
                                                            @foreach($invest_sector_types as $isrt)
                                                            <li>
                                                                <label>
                                                                    <div class="checkbox checkbox-success">
                                                                        <input class="hummingbirdNoParent" id="xnode-4-1-{{$isrt->id}}" data-id="custom-4-1-{{$isrt->id}}" type="checkbox" name="investment_sector[]" value="{{$isrt->id}}">
                                                                        <label for="xnode-4-1-{{$isrt->id}}"> {{$isrt->type}} </label>
                                                                    </div>
                                                                </label>
                                                            </li>
                                                           @endforeach
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 3 -->
                                    <h6>Background Information</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="professional_history_bio">Professional History/Bio : <span class="danger">*</span></label>
                                                    <textarea name="professional_history_bio" id="professional_history_bio" rows="3" class="form-control required"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="family_office_investment_entity">About Family Office/Investment Entity : <span class="danger">*</span></label>
                                                    <textarea name="family_office_investment_entity" id="family_office_investment_entity" rows="3" class="form-control required"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="area_family_investor_expertise">Area of Family/Investor Expertise : <span class="danger">*</span></label>
                                                    <textarea name="area_family_investor_expertise" id="area_family_investor_expertise" rows="3" class="form-control required"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="networth_aum">Approximate Networth/AUM : <span class="danger">*</span></label>
                                                    <input type="text" class="form-control mask-money required" data-inputmask="'alias': 'currency'" id="networth_aum" name="networth_aum" > 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="company_website">Company Website : <span class="danger">*</span></label>
                                                    
                                                    <input type="text" class="form-control required" id="company_website" name="company_website" > 
                                                    <p><span class="emsg hidden">Please Enter a Valid URL</span></p>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="linkedIn">LinkedIn : <span class="danger">*</span></label>
                                                    <input type="text" class="form-control required" id="linkedIn" name="linkedIn"> 
                                                    <p><span class="emsg1 hidden">Please Enter a Valid URL</span></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="corporate_board">Corporate Boards : <span class="danger">*</span></label>
                                                    <input type="text" class="form-control required" id="corporate_board" name="corporate_board"> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="civic_non_profit_board">Civic/Non-Profit Boards : <span class="danger">*</span></label>
                                                    <input type="text" class="form-control required" id="civic_non_profit_board" name="civic_non_profit_board"> 
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="education">Education (Please include, High School, College, and Post Graduate if applicable): <span class="danger">*</span></label>
                                                    <textarea class="form-control required" id="education" name="education" cols="3"></textarea> 
                                                </div>
                                            </div>
                                        </div>

                                        

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="desc_notable_past_investment">Description of Notable Past/Current Investments (If applicable) : <span class="danger">*</span></label>
                                                    <textarea name="desc_notable_past_investment" id="desc_notable_past_investment" rows="3" class="form-control required"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="desc_notable_past_investment">What is of most interest to you for using the FIVE Network? Please rank each below: (ex: 1 = Most Important, 4 = Least Important) : 
                                                    </label>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Show deals</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="m-b-10">
                                                                <input name="rank_show_deals" type="radio" value="1" id="radio_1" class="radio-col-cyan" checked=""><label for="radio_1">1</label>
                                                                <input name="rank_show_deals" type="radio" value="2" id="radio_2" class="radio-col-cyan" ><label for="radio_2">2</label>
                                                                <input name="rank_show_deals" type="radio" value="3" id="radio_3" class="radio-col-cyan" ><label for="radio_3">3</label>
                                                                <input name="rank_show_deals" type="radio" value="4" id="radio_4" class="radio-col-cyan" ><label for="radio_4">4</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>See deals</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="m-b-10">
                                                                <input name="rank_see_deals" type="radio" value="1" id="radio_5" class="radio-col-cyan" ><label for="radio_5">1</label>
                                                                <input name="rank_see_deals" type="radio" value="2" id="radio_6" class="radio-col-cyan" checked=""><label for="radio_6">2</label>
                                                                <input name="rank_see_deals" type="radio" value="3" id="radio_7" class="radio-col-cyan" ><label for="radio_7">3</label>
                                                                <input name="rank_see_deals" type="radio" value="4" id="radio_8" class="radio-col-cyan" ><label for="radio_8">4</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Leverage due-diligence capabilities</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="m-b-10">
                                                                <input name="rank_leverage_due_diligence_capability" type="radio" value="1" id="radio_9" class="radio-col-cyan" ><label for="radio_9">1</label>
                                                                <input name="rank_leverage_due_diligence_capability" type="radio" value="2" id="radio_10" class="radio-col-cyan" ><label for="radio_10">2</label>
                                                                <input name="rank_leverage_due_diligence_capability" type="radio" value="3" id="radio_11" class="radio-col-cyan" checked=""><label for="radio_11">3</label>
                                                                <input name="rank_leverage_due_diligence_capability" type="radio" value="4" id="radio_12" class="radio-col-cyan" ><label for="radio_12">4</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Network with other Family Offices and Individuals</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="m-b-10">
                                                                <input name="rank_network_with_other_family_offices" type="radio" value="1" id="radio_13" class="radio-col-cyan" ><label for="radio_13">1</label>
                                                                <input name="rank_network_with_other_family_offices" type="radio" value="2" id="radio_14" class="radio-col-cyan" ><label for="radio_14">2</label>
                                                                <input name="rank_network_with_other_family_offices" type="radio" value="3" id="radio_15" class="radio-col-cyan" ><label for="radio_15">3</label>
                                                                <input name="rank_network_with_other_family_offices" type="radio" value="4" id="radio_16" class="radio-col-cyan" checked=""><label for="radio_16">4</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="pref_contact_form"> Preferred Form of Contact
                                                    </label>
                                                    <select class="custom-select form-control" id="pref_contact_form" name="pref_contact_form">
                                                        <option value="" selected>Select</option>
                                                        <option value="0">Office</option>
                                                        <option value="1">Mobile</option>
                                                        <option value="2">Email</option>
                                                        <option value="3">Administrative Assistant / Associate</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 4 -->
                                    <h6> Investor Accreditation</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="check_back_attest"> I attest and understand that by applying for membership, I permit the Family Investment Exchange to run a background check on myself and any executive members of our family office/investment entity that plans to use the platform. <span class="danger">*</span>
                                                    </label>
                                                    <select class="custom-select form-control required" id="check_back_attest" name="check_back_attest">
                                                        <option value="" selected="">Select</option>
                                                        <option value="1">Yes, I attest.</option>
                                                        <option value="0">No, I do not attest.</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="plan_use_network"> Please attest you plan to use this network for the purposes of sharing and syndicating investment opportunities and intend to share all investment opportunities of which there is capacity with members of the network. <span class="danger">*</span>
                                                    </label>
                                                    <select class="custom-select form-control required" id="plan_use_network" name="plan_use_network">
                                                        <option value="" selected="">Select</option>
                                                        <option value="1">Yes, I attest.</option>
                                                        <option value="0">No, I do not attest.</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" id="no_plan_use_network" style="display: none;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="explain_plan_use_network_no">If no, Please explain. <span class="danger">*</span></label>
                                                    <textarea name="explain_plan_use_network_no" id="explain_plan_use_network_no" rows="3" class="form-control "></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="platform_use_case"> Please attest you will not use this platform to circumvent or attempt to interfere with an investment opportunity made available to you through the FIVE Network, and you understand if this activity takes place you will be removed from the network indefinitely.
                                                    </label>
                                                    <select class="custom-select form-control" id="platform_use_case" name="platform_use_case">
                                                        <option value="" selected>Select</option>
                                                        <option value="1">Yes, I attest.</option>
                                                        <option value="0">No, I do not attest.</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="understand_agree"> Please attest you understand and agree this network is not a recommendation for investment and isn’t responsible for any investment performance that is learned about through the platform.
                                                    </label>
                                                    <select class="custom-select form-control" id="understand_agree" name="understand_agree">
                                                        <option value="" selected="">Select</option>
                                                        <option value="1">Yes, I attest.</option>
                                                        <option value="0">No, I do not attest.</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="attest_ai_qp"> Please attest you are Accredited Investor/Qualified Purchaser.
                                                    </label>
                                                    <select class="custom-select form-control" id="attest_ai_qp" name="attest_ai_qp">
                                                        <option value="" selected>Select</option>
                                                        <option value="1">Yes, I attest.</option>
                                                        <option value="0">No, I do not attest.</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="c-inputs-stacked">
                                                        <label class="custom-control custom-checkbox block">
                                                            <input type="checkbox" class="custom-control-input required" name="bprivacy" id="bprivacy" required=""><span class="custom-control-label ml-0">By checking this box, you understand that members can be removed from the Family Investment Exchange at any time at the sole and exclusive discretion of the membership committee.</span> 
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </section>

                                    <h6> Disclaimers </h6>
                                    <section style="text-align: justify;">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>This website (“Site”) is being made available as a platform for accredited investors to interact with entrepreneurs and entities with a business plan that are seeking funding.
<br>
You should read the following Disclaimers carefully before you access or use the Site.  You are agreeing to such Disclaimers and, if you do not wish to be bound by such Disclaimers, you should not use the Site.<br>FIVE Network reserves the right to modify these Disclaimers and such Disclaimers, as modified, will be effective immediately upon being uploaded on the Site. FIVE Network may, but is not required to, send you any separate notice of any such modification, and you agree that you will periodically review these Disclaimers in connection with your access to, and use of, the Site.<br>

You are accessing and using this Site on the terms and subject to the conditions contained in the User Agreement, as in effect from time to time (“User Agreement”). Nothing contained in these Disclaimers affects such terms and such conditions, all of which remain in full force and effect.</label>
                                                    <p class="form-control-static">FIVE NETWORK IS NOT ACTING AS EITHER A BROKER-DEALER OR INVESTMENT ADVISOR IN ITS OWNERSHIP AND ITS OPERATION OF THE SITE.  FIVE NETWORK IS NOT A REGISTERED BROKER-DEALER OR A REGISTERED INVESTMENT ADVISOR AND IS NOT ACTING AS A FIDUCIARY OR IN ANY OTHER CAPACITY FOR ANY PERSON OR ENTITY ACCESSING OR USING THIS SITE.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>You expressly acknowledge that: <br>
                                                    (1)  FIVE Network is not engaged in the business of buying or selling securities, providing investment advice to others or issuing reports or analyses regarding securities.<br>(2)  FIVE Network is not currently receiving any compensation in connection with your access to, and your use of, the Site.  In particular, without limiting the generality of the foregoing, FIVE Network is not receiving any commission in connection with the offer, the purchase or the sale of a security.<br>(3)  FIVE Network is not and will not be taking possession of any funds or securities, including, without limitation, in connection with the offer, the purchase or the sale of a security.</label>
                                                    <p class="form-control-static">THE CONTENT ON THIS SITE IS FOR INFORMATION PURPOSES ONLY, FIVE NETWORK IS NOT PROVIDING, THROUGH THIS SITE OR OTHERWISE, ANY INVESTMENT ADVICE OR MAKING ANY INVESTMENT RECOMMENDATION.  
<br>
THE CONTENT ON THIS SITE IS GENERAL IN NATURE AND IS NOT TAILORED FOR YOUR INDIVIDUAL SITUATION.
<br>
FIVE NETWORK IS NOT PROVIDING ANY ACCOUNTING, BUSINESS OR TAX ADVICE.  YOU SHOULD SEEK ANY SUCH ADVICE FROM YOUR OWN PROFESSIONAL ADVISORS.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>There are inherent risks in relying on, using or retrieving any information found on the Site and FIVE Network urges you to make sure you understand these risks before relying on, using or retrieving any information on the Site. You should carefully evaluate the information made available through the Site and you should seek the advice of professionals, as appropriate.</label>
                                                    <p class="form-control-static">THE CONTENT PROVIDED ON THIS SITE HAS BEEN PROVIDED BY THIRD PARTIES. FIVE NETWORK HAS NOT INDEPENDENTLY VERIFIED THE ACCURACY OR THE COMPLETENESS OF SUCH INFORMATION AND SUCH INFORMATION IS PROVIDED ON AN “AS IS, WHERE-IS BASIS.”  FIVE NETWORK IS NOT RESPONSIBLE AND SHALL NOT BE HELD LIABLE FOR ANY INACCURACY, DEFECT, DELAY, OMISSION, TRANSMISSION OR DELIVERY OF ANY THIRD PARTY DATA OR ANY LOSS OR DAMAGE ARISING FROM: (A) ANY INACCURACY, ERROR, DELAY OR OMISSION OF TRANSMISSION OF INFORMATION; (B) NON-PERFORMANCE BY ANY THIRD PARTY; OR (C) INTERRUPTION CAUSED DUE TO ANY THIRD PARTY’S NEGLIGENT ACT OR OMISSION OR ANY OTHER CAUSE BEYOND THE REASONABLE CONTROL OF US.
<br>
ACCESS TO, AND USE OF, THIS SITE AND THE CONTENT IS SOLELY AT YOUR RISK.  YOU AGREE AND UNDERSTAND THAT THE SITE IS BEING MADE AVAILABLE TO YOU ON AN "AS IS" AND "AS AVAILABLE" BASIS WITHOUT PROVIDING ANY WARRANTIES, GUARANTIES OR CONDITIONS AS TO THE USAGE BEING FREE FROM ANY FAULTS, DEFECTS, INTERRUPTIONS, ERRORS, VIRUSES OR TO THE ACCURACY, RELIABILITY, AVAILABILITY OF THE CONTENTS OF THE SITE. </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>You are making your own decision with respect to any investment that you make in connection with this Site.  You are solely responsible for making your own investigation with respect to any such investment and such information and the accuracy and the completeness of such information.  You are solely relying on your investigation.<br>

You are responsible for your compliance with applicable limitations on the use of confidential and/or proprietary information, including, without limitation, compliance with any confidentiality, non-disclosure or other similar contractual limitations, and your own contractual obligations.  You are also responsible for the protection of your own copyrights, patents, trademarks and other intellectual property.</label>
                                                    <p class="form-control-static">YOU AGREE AND UNDERSTAND THAT FIVE NETWORK IS NOT RESPONSIBLE FOR ANY INTERFERENCE OR DAMAGE THAT MAY BE CAUSED TO YOUR COMPUTER RESOURCE THAT ARISES IN CONNECTION WITH YOUR ACCESS TO THE SITE.
<br>
FIVE NETWORK SPECIFICALLY DISCLAIMS ANY AND ALL WARRANTIES, EXPRESS OR IMPLIED, INCLUDING, WITHOUT LIMITATION, WARRANTIES OF MERCHANTABILITY OR FITNESS FOR A PARTICULAR PURPOSE, AND WARRANTIES IMPLIED BY ANY COURSE OF DEALING, ANY COURSE OF PERFORAMNCE OR USAGE OF TRADE.<br>

YOU FURTHER ACKNOWLEDGE AND AGREE THAT FIVE NETWORK WILL NOT BE RESPONSIBLE FOR ANY DEFAMATORY, OFFENSIVE OR ILLEGAL CONDUCT OF ANY PERSON OR ENTITY ON THE SITE. <br>

FIVE NETWORK AND ITS AFFILIATES, SHAREHOLDERS, DIRECTORS, OFFICERS, EMPLOYEES AND LICENSORS WILL NOT BE LIABLE,  JOINTLY OR SEVERALLY, TO YOU OR ANY OTHER PERSON AS A RESULT OF YOUR ACCESS TO, RELIANCE ON, AND USE OF, OR INABILITY TO USE, THE SITE FOR INDIRECT, CONSEQUENTIAL, SPECIAL, INCIDENTAL, PUNITIVE, OR EXEMPLARY DAMAGES, INCLUDING, WITHOUT LIMITATION, LOST PROFITS, LOST SAVINGS AND LOST REVENUES (COLLECTIVELY, “EXCLUDED DAMAGES”), WHETHER OR NOT CHARACTERIZED IN NEGLIGENCE, TORT, CONTRACT, OR OTHER THEORY OF LIABILITY, EVEN IF ANY OF SUCH PARTIES HAVE BEEN ADVISED OF THE POSSIBILITY OF OR COULD HAVE FORESEEN ANY OF THE EXCLUDED DAMAGES AND IRRESPECTIVE OF ANY FAILURE OF AN ESSENTIAL PURPOSE OF A LIMITED REMEDY. <br>
THE MAXIMUM LIABILITY OF FIVE NETWORK SHALL NEVER EXCEED, UNDER ANY CIRCUMSTANCES, THE AMOUNT, IF ANY, PAID BY A PERSON OR ENTITY FOR ACCESS TO THE SITE DURING THE THEN CURRENT CALENDAR YEAR.<br>
IF ANY PORTION OF THESE DISCLAIMERS IS DETERMINED TO BE UNENFORCEABLE, IT SHALL NOT AFFECT ANY OTHER PORTION OF THESE DISCLAIMERS AND THE FIVE NETWORK PARTIES' LIABILITY SHALL BE LIMITED TO THE FULLEST POSSIBLE EXTENT PERMITTED BY APPLICABLE LAW.</p>
                                                </div>
                                            </div>
                                        </div>

                                    </section>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- <div id="particles-js" style="background-color: #2164fb;height: 100vh;"></div> -->
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
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

    <script type="text/javascript" src="{{asset('assets/dashboard/plugins/jQuery-Multi-Select-Checboxes-multiselect/js/jquery.multiselect.js')}}"></script>
    <script src="{{asset('assets/dashboard/admin/js/custom.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/checkbox-tree/hummingbird-treeview.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/icheck/icheck.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/icheck/icheck.init.js')}}"></script>
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
        $(".treeview").hummingbird();
        $("#phone_mobile, #phone_officex").intlTelInput({
            geoIpLookup: function(callback) {
               $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                 var countryCode = (resp && resp.country) ? resp.country : "";
                 callback(countryCode);
               });
            },

            initialCountry: "us",

            separateDialCode: true,
            utilsScript: "{{asset('assets/dashboard/admin/js/utils.js')}}" 
        });

        $("#apply-form").submit(function() {
            $("#mobilex").val($("#phone_mobile").intlTelInput("getNumber"));
            $("#phone_office").val($("#phone_officex").intlTelInput("getNumber"));
        });

        $('.mask-money').inputmask({digits:0, rightAlign:false});

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
            $('#linkedIn').on('keypress keydown keyup',function(){
                if (!$(this).val().match($regexname)) {
                  // there is a mismatch, hence show the error message
                    $('.emsg1').removeClass('hidden');
                    $('.emsg1').show();
                 }
                else{
                    // else, do not display message
                    $('.emsg1').addClass('hidden');
                }
            });
        });


    </script>


    @if($submitted == 1)
        <script type="text/javascript">
            window.location.href = "{{route('home')}}";
        </script>
    @endif

    @if(Session::get('msg'))
        @if(Session::get('msg')[2] == 'error')
            <script type="text/javascript">
                swal({   
                    title: "{{Session::get('msg')[0]}}",   
                    text: "{{Session::get('msg')[1]}}",   
                    type: "{{Session::get('msg')[2]}}",   
                    showCancelButton: false,   
                    confirmButtonColor:"#1e88e5",
                    confirmButtonText: "Okay",   
                    closeOnConfirm: false 
                }, function(){   
                    window.location.href = "{{route('apply-membership',['user' => $user])}}";
                });
            </script>
        @endif
    @endif

</body>

</html>

