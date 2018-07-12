@php
    $invest_types = App\Model\InvestmentStructureType::all();
    $invest_size_types = App\Model\MemberInvestmentSizeType::all();
    $invest_stage_types = App\Model\MemberInvestmentStageType::all();
    $invest_sector_types = App\Model\MemberInvestmentSectorType::all();
    $invest_region_types = App\Model\MemberInvestmentRegionType::all();
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
                
                <div class="row" id="validation">
                    <div class="col-12">
                        <div class="card wizard-content apply-box">
                            <div class="card-body">
                                <h4 class="card-title">Apply for Membership</h4>

                                <form action="{{url('/applymembership')}}" class="validation-wizard wizard-circle" id="apply-form" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <h6></h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="apply_type"> Are you applying for a Family Office or Individual Membership?
                                                        <span class="danger">*</span> 
                                                    </label>
                                                    <select class="custom-select form-control required" id="apply_type" name="apply_type">
                                                        <option value="">Select</option>
                                                        <option value="0" {{ old('apply_type') == 0 ? 'selected' : '' }}>Family Office</option>
                                                        <option value="1" {{ old('apply_type') == 1 ? 'selected' : '' }}>Individual</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="bprinciple"> Are you a Principle of the Family Office? 
                                                        <span class="danger">*</span> 
                                                    </label>
                                                    <select class="custom-select form-control required" id="bprinciple" name="bprinciple">
                                                        <option value="">Select</option>
                                                        <option value="0" {{ old('bprinciple') == 0 ? 'selected' : '' }}>No</option>
                                                        <option value="1" {{ old('bprinciple') == 0 ? 'selected' : '' }}>Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 1 -->
                                    <h6>Applicant Information</h6>
                                    <section>
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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="aware_method"> How did you hear about Family InVestment Exchange?
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
                                                    <input type="email" class="form-control" id="aware_method_desc_who" name="aware_method_desc_who"> 
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
                                                    <label for="family_office_name"> Family Office Name : <span class="danger">*</span> 
                                                    </label>
                                                    <input type="text" class="form-control required" id="family_office_name" name="family_office_name" value="{{old('family_office_name')}}"> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fName"> First Name : <span class="danger">*</span> 
                                                    </label>
                                                    <input type="text" class="form-control required" id="fName" name="fName"  value="{{old('fName')}}"> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="lName"> Last Name : <span class="danger">*</span> 
                                                    </label>
                                                    <input type="text" class="form-control required" id="lName" name="lName" value="{{old('lName')}}"> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="title"> Title : <span class="danger">*</span> 
                                                    </label>
                                                    <input type="text" class="form-control required" id="title" name="title" value="{{old('title')}}"> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="addr_1"> Address Line 1 : <span class="danger">*</span> </label>
                                                    <input type="text" class="form-control required" id="addr_1" name="addr_1"  value="{{old('addr_1')}}"> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="addr_2"> Address Line 2 :</label>
                                                    <input type="text" class="form-control" id="addr_2"  name="addr_2"  value="{{old('addr_2')}}"> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="town_city"> Town/City : <span class="danger">*</span> </label>
                                                    <input type="text" class="form-control required" id="town_city" name="town_city"  value="{{old('town_city')}}"> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="state"> State : <span class="danger">*</span></label>
                                                    <input type="text" class="form-control required" id="state"  name="state" value="{{old('state')}}"> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="postal_code"> Postal Code : <span class="danger">*</span> </label>
                                                    <input type="text" class="form-control required" id="postal_code" name="postal_code" value="{{old('postal_code')}}"> 
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
                                                    <input type="tel" class="form-control required" id="phone_office" name="phone_office"  value="{{old('phone_office')}}"> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone_mobile">Mobile Phone : </label>
                                                    <input type="tel" class="form-control" id="phone_mobile" name="phone_mobile" value="{{old('phone_mobile')}}"> 
                                                    <input id="mobilex" type="hidden" name="mobilex" value="{{old('mobilex')}}">
                                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mdate">Date of Birth :</label>
                                                    <input type="date" class="form-control" placeholder="mm/dd/yyyy" name="dob" value="{{old('dob')}}"> 

                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 2 -->
                                    <h6>Investment Objectives</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="invest_structure">Investment Structure :</label>
                                                    <select class="select2 m-b-10 select2-multiple" style="width: 100%" multiple="multiple" data-placeholder="Choose" name="invest_structure[]" id="invest_structure">
                                                        <option value="">Select</option>
                                                        @foreach($invest_types as $type)
                                                        <option value="{{$type->id}}">{{$type->type}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
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
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="private_investment_number">Approximately How many Private Investments do you/your family invest in annually? </label>
                                                    <select class="custom-select form-control " id="private_investment_number" name="private_investment_number">
                                                        <option value="">Select</option>
                                                        <option value="0" {{ old('private_investment_number') == 0 ? 'selected' : '' }}>1-2</option>
                                                        <option value="1" {{ old('private_investment_number') == 1 ? 'selected' : '' }}>3-4</option>
                                                        <option value="2" {{ old('private_investment_number') == 2 ? 'selected' : '' }}>5-7</option>
                                                        <option value="3" {{ old('private_investment_number') == 3 ? 'selected' : '' }}>8-10</option>
                                                        <option value="4" {{ old('private_investment_number') == 4 ? 'selected' : '' }}> >10 </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="additional_capacity">Approximately what % of the investments you participate in have additional capacity after your participation ?</label>
                                                    <select class="custom-select form-control " id="additional_capacity" name="additional_capacity">
                                                        <option value="">Select</option>
                                                        <option value="20" {{ old('additional_capacity') == 20 ? 'selected' : '' }}>20%</option>
                                                        <option value="40" {{ old('additional_capacity') == 40 ? 'selected' : '' }}>40%</option>
                                                        <option value="60" {{ old('additional_capacity') == 60 ? 'selected' : '' }}>60%</option>
                                                        <option value="80" {{ old('additional_capacity') == 80 ? 'selected' : '' }}>80%</option>
                                                        <option value="100" {{ old('additional_capacity') == 100 ? 'selected' : '' }}>100%</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="average_investment_size">How much capacity is left this round :</label>
                                                    <select class="select2 m-b-10 select2-multiple" style="width: 100%" multiple="multiple" data-placeholder="Choose" name="average_investment_size[]" id="average_investment_size">
                                                        <option value="">Select</option>
                                                        @foreach($invest_size_types as $type)
                                                        <option value="{{$type->id}}">{{$type->type}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="investment_stage">Investment Stage :</label>
                                                    <select class="select2 m-b-10 select2-multiple" style="width: 100%" multiple="multiple" data-placeholder="Choose" name="investment_stage[]" id="investment_stage">
                                                        <option value="">Select</option>
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
                                                    <select class="select2 m-b-10 select2-multiple" style="width: 100%" multiple="multiple" data-placeholder="Choose" name="investment_sector[]" id="investment_sector">
                                                        <option value="">Select</option>
                                                        @foreach($invest_sector_types as $isrt)
                                                        <option value="{{$isrt->id}}">{{$isrt->type}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
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
                                                    <textarea name="professional_history_bio" id="professional_history_bio" rows="3" class="form-control required">{{old('professional_history_bio')}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="family_office_investment_entity">About Family Office / Investment Entity : <span class="danger">*</span></label>
                                                    <textarea name="family_office_investment_entity" id="family_office_investment_entity" rows="3" class="form-control required">{{old('family_office_investment_entity')}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="area_family_investor_expertise">Area of Family/Investor Expertise : </label>
                                                    <textarea name="area_family_investor_expertise" id="area_family_investor_expertise" rows="3" class="form-control">{{old('area_family_investor_expertise')}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="networth_aum">Approximate Networth/AUM : </label>
                                                    <input type="text" class="form-control" id="networth_aum" name="networth_aum" value="{{old('networth_aum')}}" data-mask="$999,999,999" > 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="company_website">Company Website : </label>
                                                    
                                                    <input type="text" class="form-control" id="company_website" name="company_website"  value="{{old('company_website')}}"> 
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="linkedIn">LinkedIn : </label>
                                                    <input type="text" class="form-control" id="linkedIn" name="linkedIn" value="{{old('linkedIn')}}"> 
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="corporate_board">Corporate Boards : </label>
                                                    <input type="text" class="form-control" id="corporate_board" name="corporate_board" value="{{old('corporate_board')}}"> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="civic_non_profit_board">Civic/Non-Profit Boards : </label>
                                                    <input type="text" class="form-control" id="civic_non_profit_board" name="civic_non_profit_board" value="{{old('civic_non_profit_board')}}"> 
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="education">Education : </label>
                                                    <textarea class="form-control" id="education" name="education" cols="3"></textarea> 
                                                </div>
                                            </div>
                                        </div>

                                        

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="desc_notable_past_investment">Description of Notable Past Investments : </label>
                                                    <textarea name="desc_notable_past_investment" id="desc_notable_past_investment" rows="3" class="form-control">{{old('desc_notable_past_investment')}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="desc_notable_past_investment">What is your priority of use? Please rank in order of most important to least important : 
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
                                                        <option value="0" {{old('pref_contact_form') == 0 ? 'Selected':''}}>Office</option>
                                                        <option value="1" {{old('pref_contact_form') == 1 ? 'Selected':''}}>Mobile</option>
                                                        <option value="2" {{old('pref_contact_form') == 2 ? 'Selected':''}}>Email</option>
                                                        <option value="3" {{old('pref_contact_form') == 3 ? 'Selected':''}}>Administrative Assistant / Associate</option>
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
                                                <label for="input-file-now">Please attach a copy of a government issued photo ID <span class="danger">*</span></label>
                                                <input type="file" id="input-file-now" class="dropify" name="govern_photo_id" accept="image/*"/ data-default-file="{{asset('assets/dashboard/profile/id.png')}}">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="attest_ai_qp"> Please attest you are Accredited Investor/Qualified Purchaser.
                                                    </label>
                                                    <select class="custom-select form-control" id="attest_ai_qp" name="attest_ai_qp">
                                                        <option value="" selected>Select</option>
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
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
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
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
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" id="no_plan_use_network" style="display: none;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="explain_plan_use_network_no">If no, Please explain. <span class="danger">*</span></label>
                                                    <textarea name="explain_plan_use_network_no" id="explain_plan_use_network_no" rows="3" class="form-control ">{{old('explain_plan_use_network_no')}}</textarea>
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
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </section>

                                    <h6> Disclaimers Tab </h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="font-weight: bold;">Personal and Noncommercial Use :</label>
                                                    <p class="form-control-static">PERSONAL AND NON-COMMERCIAL USE LIMITATION <br>
The Site is for your personal and non-commercial use, and FIVE Network grants you a non-exclusive, non-transferable and limited personal license to access and use the Site, conditioned on your continued compliance with these Terms of Use. You may not modify, copy (except as set forth below), distribute, transmit, display, perform, reproduce, publish, license, create derivative works from, transfer, or sell any information, products or services obtained from the Site. You may not link other websites to the Site without the prior written permission of FIVE Network. You may print one hardcopy of the information and download one temporary copy of the information into one single computer’s memory solely for your own personal, non-commercial use and not for distribution, provided that all relevant copyright, trademark and other proprietary notices are kept intact. You are prohibited from using the Site to advertise or perform any commercial solicitation. You also are prohibited from using any robot, spider, scraper or other automated means to access the Site for any purpose without the prior written permission of FIVE Network. You may not take any action that imposes, or may impose, in our sole discretion, an unreasonable or disproportionately large load on our infrastructure, interfere or attempt to interfere with the proper working of the Site or any activities conducted on the Site, or bypass any measures we may use to prevent or restrict access to the Site. Any rights not expressly granted herein are reserved.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="font-weight: bold;">This is not a recommendation :</label>
                                                    <p class="form-control-static">NO INVESTMENT ADVICE<br>
The information on the Site is intended to enable investors to understand the nature of FIVE Network’s services. It is not intended as and does not constitute investment advice or legal or tax advice or an offer to sell any securities to any person or a solicitation of any person of any offer to purchase any securities. The information in the Site should not be construed as any endorsement, recommendation or sponsorship of any company or security by FIVE Network. There are inherent risks in relying on, using or retrieving any information found on the Site, and FIVE Network urges you to make sure you understand these risks before relying on, using or retrieving any information on the Site. You should evaluate the information made available through the Site, and you should seek the advice of professionals, as appropriate, to evaluate any opinion, advice, product, service or other information.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="font-weight: bold;">We are not a broker dealer :</label>
                                                    <p class="form-control-static">The FIVE Network is not a registered broker-dealer or a registered investment adviser. You understand that the Product is furnished for your personal, noncommercial, informational purposes only, and that no mention of a particular security in the Product constitutes a recommendation to buy, sell, or hold that or any other security, or that any particular security, portfolio of securities, transaction or investment strategy is suitable for any specific person. You further understand that FIVE Network will not advise you personally concerning the nature, potential, value or suitability of any particular security, portfolio of securities, transaction, investment strategy or other matter. To the extent any of the information contained in the Product may be deemed to be investment advice, such information is impersonal and not tailored to the investment needs of any specific person. You acknowledge that you are responsible for your own financial decisions.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label style="font-weight: bold;">No Liability :</label>
                                                    <p class="form-control-static">USE OF THIS SITE AND CONTENT IS SOLELY AT YOUR RISK. FIVE NETWORK AND ITS AFFILIATES, SHAREHOLDERS, DIRECTORS, OFFICERS, EMPLOYEES AND LICENSORS WILL NOT BE LIABLE (JOINTLY OR SEVERALLY) TO YOU OR ANY OTHER PERSON AS A RESULT OF YOUR USE OF, OR RELIANCE ON, OR INABILITY TO USE FAMILYINVESTMENTEXCHANGE.COM FOR INDIRECT, CONSEQUENTIAL, SPECIAL, INCIDENTAL, PUNITIVE, OR EXEMPLARY DAMAGES, INCLUDING, WITHOUT LIMITATION, LOST PROFITS, LOST SAVINGS AND LOST REVENUES (COLLECTIVELY, “THE EXCLUDED DAMAGES”), WHETHER OR NOT CHARACTERIZED IN NEGLIGENCE, TORT, CONTRACT, OR OTHER THEORY OF LIABILITY, EVEN IF ANY OF THE FIVE NETWORK PARTIES HAVE BEEN ADVISED OF THE POSSIBILITY OF OR COULD HAVE FORESEEN ANY OF THE EXCLUDED DAMAGES, AND IRRESPECTIVE OF ANY FAILURE OF AN ESSENTIAL PURPOSE OF A LIMITED REMEDY. IF ANY APPLICABLE AUTHORITY HOLDS ANY PORTION OF THIS SECTION TO BE UNENFORCEABLE, THEN THE FIVE NETWORK PARTIES' LIABILITY WILL BE LIMITED TO THE FULLEST POSSIBLE EXTENT PERMITTED BY APPLICABLE LAW.</p>
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


    <script src="{{asset('assets/dashboard/admin/js/custom.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/admin/js/mask.js')}}"></script>

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

        $("#phone_mobile").intlTelInput({
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
        });

    </script>


    @if($submitted == 1)
        <script type="text/javascript">
            $("#apply-form input").prop("disabled", true);
            $("#apply-form select").prop("disabled", true);
            $("#apply-form textarea").prop("disabled", true);
            $("#apply-form .actions").hide();
        </script>
    @endif

    @if(Session::get('msg'))
        if(Session::get('msg')[2] == 'error')
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

