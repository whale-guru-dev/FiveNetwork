<?php
    $invest_types = App\Model\InvestmentStructureType::all();
    $invest_size_types = App\Model\MemberInvestmentSizeType::all();
    $invest_stage_types = App\Model\MemberInvestmentStageType::all();
?>

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

    <title>Family Investment Exchange | Reset Password</title>

    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">

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
    <link href="{{asset('assets/dashboard/admin/css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('assets/dashboard/admin/css/colors/blue-dark.css')}}" id="theme" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <link rel="stylesheet" type="text/css" href="{{asset('assets/dashboard/admin/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/admin/css/intlTelInput.css')}}">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

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
                                    <h6>Applicant Information – For Family Office</h6>
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
                                                    <input type="password" class="form-control required" id="password" name="password"> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="conf_password"> Confirm Password : <span class="danger">*</span> 
                                                    </label>
                                                    <input type="password" class="form-control required" id="conf_password" name="conf_password"> 
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
                                                        <option value="-1">Select</option>
                                                        <option value="1" {{ old('aware_method') == 1 ? 'selected' : '' }}>Current FIVE Network member</option>
                                                        <option value="0" {{ old('aware_method') == 0 ? 'selected' : '' }}>Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group collapse" id="aware_who" style="display: none;">
                                                    <label for="aware_method_desc_who"> Who : <span class="danger">*</span> 
                                                    </label>
                                                    <input type="email" class="form-control " id="aware_method_desc_who" name="aware_method_desc" value="{{old('aware_method_desc')}}"> 
                                                </div>
                                                <div class="form-group collapse" id="aware_how" style="display: none;">
                                                    <label for="aware_method_desc_how"> How : <span class="danger">*</span> 
                                                    </label>
                                                    <input type="text" class="form-control " id="aware_method_desc_how" name="aware_method_desc"  value="{{old('aware_method_desc')}}"> 
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
                                                        <option value="US" selected="">United States</option>
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
                                                    <label for="desired_invest_type">Desired Types of Investments :</label>
                                                    <select class="custom-select form-control " id="desired_invest_type" name="desired_invest_type">
                                                        <option value="">Select</option>
                                                        <option value="1" {{ old('desired_invest_type') == 1 ? 'selected' : '' }}>Control/Active – Ask specific</option>
                                                        <option value="0" {{ old('desired_invest_type') == 0 ? 'selected' : '' }}>Non- Control/Passive – Ask Specific</option>
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
                                                    <label for="additional_capacity">Desired Types of Investments :</label>
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
                                                    <label for="average_investment_size">Average Investment Size :</label>
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
                                                    <label for="region">Regions – Will have broken out :</label>
                                                    <select class="custom-select form-control" id="region" name="region">
                                                        <option value="">Select</option>
                                                        <option value="North America">  North America </option>
                                                        <option value="South America">  South America </option>
                                                        <option value="Western Europe"> Western Europe </option>
                                                        <option value="Emerging Europe">    Emerging Europe </option>
                                                        <option value="MENA">   MENA </option>
                                                        <option value="BRICs">  BRICs </option>
                                                        <option value="Asia Ex-Japan">  Asia Ex-Japan </option>
                                                        <option value="Indian Subcontinent">    Indian Subcontinent </option>
                                                        <option value="Frontier (Asia)">    Frontier (Asia) </option>
                                                        <option value="Global Emerging Markets">    Global Emerging Markets </option>
                                                        <option value="Central America">    Central America </option>
                                                        <option value="CIS">    CIS </option>
                                                        <option value="Sub-Saharan Africa"> Sub-Saharan Africa </option>
                                                        <option value="Antarctica Region">  Antarctica Region </option>
                                                        <option value="Global"> Global </option>
                                                        <option value="Latin America">  Latin America </option>
                                                        <option value="Andean Region">  Andean Region </option>
                                                        <option value="Europe"> Europe </option>
                                                        <option value="Southern Europe">    Southern Europe </option>
                                                        <option value="Northern Europe">    Northern Europe </option>
                                                        <option value="DACH">   DACH </option>
                                                        <option value="BeNeLux">    BeNeLux </option>
                                                        <option value="Scandinavia">    Scandinavia </option>
                                                        <option value="Baltic Region">  Baltic Region </option>
                                                        <option value="Iberian Penisula">   Iberian Penisula </option>
                                                        <option value="CEE">    CEE </option>
                                                        <option value="Central Europe"> Central Europe </option>
                                                        <option value="Africa"> Africa </option>
                                                        <option value="West Africa">    West Africa </option>
                                                        <option value="East Africa">    East Africa </option>
                                                        <option value="Francophone Africa"> Francophone Africa </option>
                                                        <option value="Southern Africa">    Southern Africa </option>
                                                        <option value="Asia">   Asia </option>
                                                        <option value="ASEAN">  ASEAN </option>
                                                        <option value="Middle East">    Middle East </option>
                                                        <option value="East Asia">  East Asia </option>
                                                        <option value="Central Asia">   Central Asia </option>
                                                        <option value="Oceania">    Oceania </option>
                                                        <option value="Caribbean">  Caribbean </option>
                                                        <option value="Afghanistan">    Afghanistan </option>
                                                        <option value="Aland Islands">  Aland Islands </option>
                                                        <option value="Albania">    Albania </option>
                                                        <option value="Algeria">    Algeria </option>
                                                        <option value="American Samoa"> American Samoa </option>
                                                        <option value="Andorra">    Andorra </option>
                                                        <option value="Angola"> Angola </option>
                                                        <option value="Anguilla">   Anguilla </option>
                                                        <option value="Antarctica"> Antarctica </option>
                                                        <option value="Antigua and Barbuda">    Antigua and Barbuda </option>
                                                        <option value="Argentina">  Argentina </option>
                                                        <option value="Armenia">    Armenia </option>
                                                        <option value="Aruba">  Aruba </option>
                                                        <option value="Australia">  Australia </option>
                                                        <option value="Austria">    Austria </option>
                                                        <option value="Azerbaijan"> Azerbaijan </option>
                                                        <option value="Bahamas">    Bahamas </option>
                                                        <option value="Bahrain">    Bahrain </option>
                                                        <option value="Bangladesh"> Bangladesh </option>
                                                        <option value="Barbados">   Barbados </option>
                                                        <option value="Belarus">    Belarus </option>
                                                        <option value="Belgium">    Belgium </option>
                                                        <option value="Belize"> Belize </option>
                                                        <option value="Benin">  Benin </option>
                                                        <option value="Bermuda">    Bermuda </option>
                                                        <option value="Bhutan"> Bhutan </option>
                                                        <option value="Bolivia">    Bolivia </option>
                                                        <option value="Bonaire">    Bonaire </option>
                                                        <option value="Bosnia"> Bosnia </option>
                                                        <option value="Botswana">   Botswana </option>
                                                        <option value="Bouvet Island">  Bouvet Island </option>
                                                        <option value="Brazil"> Brazil </option>
                                                        <option value="British Indian Ocean">   British Indian Ocean </option>
                                                        <option value="Brunei Darussalam">  Brunei Darussalam </option>
                                                        <option value="Bulgaria">   Bulgaria </option>
                                                        <option value="Burkina Faso">   Burkina Faso </option>
                                                        <option value="Burundi">    Burundi </option>
                                                        <option value="Cambodia">   Cambodia </option>
                                                        <option value="Cameroon">   Cameroon </option>
                                                        <option value="Canada"> Canada </option>
                                                        <option value="Cape Verde"> Cape Verde </option>
                                                        <option value="Cayman Islands"> Cayman Islands </option>
                                                        <option value="Central African">    Central African </option>
                                                        <option value="Chad">   Chad </option>
                                                        <option value="Chile">  Chile </option>
                                                        <option value="China">  China </option>
                                                        <option value="Christmas Island">   Christmas Island </option>
                                                        <option value="Cocos Islands">  Cocos Islands </option>
                                                        <option value="Colombia">   Colombia </option>
                                                        <option value="Comoros">    Comoros </option>
                                                        <option value="Cook Islands">   Cook Islands </option>
                                                        <option value="Costa Rica"> Costa Rica </option>
                                                        <option value="Cote d'Ivoire">  Cote d'Ivoire </option>
                                                        <option value="Croatia">    Croatia </option>
                                                        <option value="Cuba">   Cuba </option>
                                                        <option value="Curacao">    Curacao </option>
                                                        <option value="Cyprus"> Cyprus </option>
                                                        <option value="Czech Republic"> Czech Republic </option>
                                                        <option value="Democratic Republic of the Congo">   Democratic Republic of the Congo </option>
                                                        <option value="Denmark">    Denmark </option>
                                                        <option value="Djibouti">   Djibouti </option>
                                                        <option value="Dominica">   Dominica </option>
                                                        <option value="Dominican Republic"> Dominican Republic </option>
                                                        <option value="East Timor"> East Timor </option>
                                                        <option value="Ecuador">    Ecuador </option>
                                                        <option value="Egypt">  Egypt </option>
                                                        <option value="El Salvador">    El Salvador </option>
                                                        <option value="Equatorial Guinea">  Equatorial Guinea </option>
                                                        <option value="Eritrea">    Eritrea </option>
                                                        <option value="Estonia">    Estonia </option>
                                                        <option value="Ethiopia">   Ethiopia </option>
                                                        <option value="Falkland Islands">   Falkland Islands </option>
                                                        <option value="Faroe Islands">  Faroe Islands </option>
                                                        <option value="Fiji">   Fiji </option>
                                                        <option value="Finland">    Finland </option>
                                                        <option value="France"> France </option>
                                                        <option value="French Guiana">  French Guiana </option>
                                                        <option value="French Polynesia">   French Polynesia </option>
                                                        <option value="French Southern">    French Southern </option>
                                                        <option value="Gabon">  Gabon </option>
                                                        <option value="Gambia"> Gambia </option>
                                                        <option value="Georgia">    Georgia </option>
                                                        <option value="Germany">    Germany </option>
                                                        <option value="Ghana">  Ghana </option>
                                                        <option value="Gibraltar">  Gibraltar </option>
                                                        <option value="Greece"> Greece </option>
                                                        <option value="Greenland">  Greenland </option>
                                                        <option value="Grenada">    Grenada </option>
                                                        <option value="Guadeloupe"> Guadeloupe </option>
                                                        <option value="Guam">   Guam </option>
                                                        <option value="Guatemala">  Guatemala </option>
                                                        <option value="Guernsey">   Guernsey </option>
                                                        <option value="Guinea"> Guinea </option>
                                                        <option value="Guinea-Bissau">  Guinea-Bissau </option>
                                                        <option value="Guyana"> Guyana </option>
                                                        <option value="Haiti">  Haiti </option>
                                                        <option value="Vatican City">   Vatican City </option>
                                                        <option value="Honduras">   Honduras </option>
                                                        <option value="Hong Kong">  Hong Kong </option>
                                                        <option value="Hungary">    Hungary </option>
                                                        <option value="Iceland">    Iceland </option>
                                                        <option value="India">  India </option>
                                                        <option value="Indonesia">  Indonesia </option>
                                                        <option value="Iran">   Iran </option>
                                                        <option value="Iraq">   Iraq </option> 
                                                        <option value="Ireland">    Ireland </option>
                                                        <option value="Isle of Man">    Isle of Man </option>
                                                        <option value="Israel"> Israel </option>
                                                        <option value="Italy">  Italy </option>
                                                        <option value="Jamaica">    Jamaica </option>
                                                        <option value="Japan">  Japan </option> 
                                                        <option value="Jersey"> Jersey </option>
                                                        <option value="Jordan"> Jordan </option>
                                                        <option value="Kazakhstan"> Kazakhstan </option>
                                                        <option value="Kenya">  Kenya </option>
                                                        <option value="Kiribati">   Kiribati </option>
                                                        <option value="South Korea">    South Korea </option>
                                                        <option value="Kuwait"> Kuwait </option>
                                                        <option value="Kyrgyzstan"> Kyrgyzstan </option>
                                                        <option value="Laos">   Laos </option>
                                                        <option value="Latvia"> Latvia </option> 
                                                        <option value="Lebanon">    Lebanon </option>
                                                        <option value="Lesotho">    Lesotho </option>
                                                        <option value="Liberia">    Liberia </option>
                                                        <option value="Libya">  Libya </option>
                                                        <option value="Liechtenstein">  Liechtenstein </option>
                                                        <option value="Lithuania">  Lithuania </option>
                                                        <option value="Luxembourg"> Luxembourg </option>
                                                        <option value="Macau">  Macau </option>
                                                        <option value="Macedonia">  Macedonia </option>
                                                        <option value="Madagascar"> Madagascar </option>
                                                        <option value="Malawi"> Malawi </option> 
                                                        <option value="Malaysia">   Malaysia </option>
                                                        <option value="Maldives">   Maldives </option>
                                                        <option value="Mali">   Mali </option>
                                                        <option value="Malta">  Malta </option> 
                                                        <option value="Mariana Islands">    Mariana Islands </option>
                                                        <option value="Marshall Islands">   Marshall Islands </option>
                                                        <option value="Martinique"> Martinique </option>
                                                        <option value="Mauritania"> Mauritania </option>
                                                        <option value="Mauritius">  Mauritius </option>
                                                        <option value="Mayotte">    Mayotte </option>
                                                        <option value="Mexico"> Mexico </option>
                                                        <option value="Micronesia"> Micronesia </option>
                                                        <option value="Moldova">    Moldova </option>
                                                        <option value="Monaco"> Monaco </option>
                                                        <option value="Mongolia">   Mongolia </option>
                                                        <option value="Montenegro"> Montenegro </option>
                                                        <option value="Montserrat"> Montserrat </option>
                                                        <option value="Morocco">    Morocco </option>
                                                        <option value="Mozambique"> Mozambique </option>
                                                        <option value="Myanmar">    Myanmar </option>
                                                        <option value="Namibia">    Namibia </option>
                                                        <option value="Nauru">  Nauru </option>
                                                        <option value="Nepal">  Nepal </option>
                                                        <option value="Netherlands">    Netherlands </option>
                                                        <option value="New Caledonia">  New Caledonia </option>
                                                        <option value="New Zealand">    New Zealand </option>
                                                        <option value="Nicaragua">  Nicaragua </option>
                                                        <option value="Niger">  Niger </option>
                                                        <option value="Nigeria">    Nigeria </option>
                                                        <option value="Niue">   Niue </option>
                                                        <option value="Norfolk Island"> Norfolk Island </option>
                                                        <option value="Norway"> Norway </option>
                                                        <option value="Oman">   Oman </option>
                                                        <option value="Pakistan">   Pakistan </option>
                                                        <option value="Palau">  Palau </option>
                                                        <option value="Palestinian Territory">  Palestinian Territory </option>
                                                        <option value="Panama"> Panama </option>
                                                        <option value="Papua New Guinea">   Papua New Guinea </option>
                                                        <option value="Paraguay">   Paraguay </option>
                                                        <option value="Peru">   Peru </option>
                                                        <option value="Philippines">    Philippines </option>
                                                        <option value="Pitcairn">   Pitcairn </option>
                                                        <option value="Poland"> Poland </option>
                                                        <option value="Portugal">   Portugal </option>
                                                        <option value="Puerto Rico">    Puerto Rico </option>
                                                        <option value="Qatar">  Qatar </option>
                                                        <option value="Republic of the Congo">  Republic of the Congo </option>
                                                        <option value="Reunion">    Reunion </option>
                                                        <option value="Romania">    Romania </option>
                                                        <option value="Russia"> Russia </option>
                                                        <option value="Rwanda"> Rwanda </option>
                                                        <option value="Saint Bartelemey">   Saint Bartelemey </option>
                                                        <option value="Saint Kitts and Nevis">  Saint Kitts and Nevis </option>
                                                        <option value="Saint Lucia">    Saint Lucia </option>
                                                        <option value="Saint Martin">   Saint Martin </option>
                                                        <option value="Saint Pierre and Miquelon">  Saint Pierre and Miquelon </option>
                                                        <option value="Saint Vincent">  Saint Vincent </option>
                                                        <option value="Samoa">  Samoa </option>
                                                        <option value="San Marino"> San Marino </option>
                                                        <option value="Sao Tome and Principe">  Sao Tome and Principe </option>
                                                        <option value="Saudi Arabia">   Saudi Arabia </option>
                                                        <option value="Senegal">    Senegal </option>
                                                        <option value="Serbia"> Serbia </option>
                                                        <option value="Seychelles"> Seychelles </option>
                                                        <option value="Sierra Leone">   Sierra Leone </option>
                                                        <option value="Singapore">  Singapore </option>
                                                        <option value="Sint Maarten">   Sint Maarten </option>
                                                        <option value="Slovakia">   Slovakia </option>
                                                        <option value="Slovenia">   Slovenia </option>
                                                        <option value="Solomon Islands">    Solomon Islands </option>
                                                        <option value="Somalia">    Somalia </option>
                                                        <option value="South Africa">   South Africa </option>
                                                        <option value="South Georgia">  South Georgia </option>
                                                        <option value="South Sudan">    South Sudan </option>
                                                        <option value="Spain">  Spain </option>
                                                        <option value="Sri Lanka">  Sri Lanka </option>
                                                        <option value="St. Helena"> St. Helena </option>
                                                        <option value="Sudan">  Sudan </option>
                                                        <option value="Suriname">   Suriname </option>
                                                        <option value="Svalbard">   Svalbard </option>
                                                        <option value="Swaziland">  Swaziland </option>
                                                        <option value="Sweden"> Sweden </option>
                                                        <option value="Switzerland">    Switzerland </option>
                                                        <option value="Syria">  Syria </option>
                                                        <option value="Taiwan"> Taiwan </option>
                                                        <option value="Tajikistan"> Tajikistan </option>
                                                        <option value="Tanzania">   Tanzania </option>
                                                        <option value="Thailand">   Thailand </option>
                                                        <option value="Togo">   Togo </option>
                                                        <option value="Tokelau">    Tokelau </option>
                                                        <option value="Tonga">  Tonga </option>
                                                        <option value="Trinidad">   Trinidad </option>
                                                        <option value="Tunisia">    Tunisia</option>
                                                        <option value="Turkey"> Turkey</option>
                                                        <option value="Turkmenistan">   Turkmenistan</option>
                                                        <option value="Turks">  Turks</option>
                                                        <option value="Tuvalu"> Tuvalu</option>
                                                        <option value="Uganda"> Uganda</option>
                                                        <option value="Ukraine">    Ukraine</option>
                                                        <option value="United Arab Emirates">   United Arab Emirates</option>
                                                        <option value="United Kingdom"> United Kingdom</option>
                                                        <option value="United States of America">   United States of America</option>
                                                        <option value="Uruguay">    Uruguay</option>
                                                        <option value="Uzbekistan"> Uzbekistan</option>
                                                        <option value="Vanuatu">    Vanuatu</option>
                                                        <option value="Venezuela">  Venezuela</option>
                                                        <option value="Vietnam">    Vietnam</option>
                                                        <option value="Virgin Islands"> Virgin Islands</option>
                                                        <option value="Wallis"> Wallis</option>
                                                        <option value="Western Sahara"> Western Sahara</option>
                                                        <option value="Yemen">  Yemen</option>
                                                        <option value="Zambia"> Zambia</option>
                                                        <option value="Zimbabwe">   Zimbabwe</option>
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
                                                    <input type="text" class="form-control" id="networth_aum" name="networth_aum" value="{{old('networth_aum')}}"> 
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
                                                    <input type="text" class="form-control" id="education" name="education" value="{{old('education')}}"> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="high_school">High School : </label>
                                                    <input type="text" class="form-control" id="high_school" name="high_school" value="{{old('high_school')}}"> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="college">College : </label>
                                                    <input type="text" class="form-control" id="college" name="college" value="{{old('college')}}"> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="graduate_school">Graduate School : </label>
                                                    <input type="text" class="form-control" id="graduate_school" name="graduate_school"  value="{{old('graduate_school')}}"> 
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
                                                        <option value="">Select</option>
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
                                                <input type="file" id="input-file-now" class="dropify required" name="govern_photo_id" accept="image/*"/>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="attest_ai_qp"> Please attest you are Accredited Investor/Qualified Purchaser.
                                                    </label>
                                                    <select class="custom-select form-control" id="attest_ai_qp" name="attest_ai_qp">
                                                        <option value="">Select</option>
                                                        <option value="1" {{old('attest_ai_qp') == 1 ? 'Selected':''}}>Yes</option>
                                                        <option value="0" {{old('attest_ai_qp') == 0 ? 'Selected':''}}>No</option>
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
                                                        <option value="">Select</option>
                                                        <option value="1" {{old('platform_use_case') == 1 ? 'Selected':''}}>Yes</option>
                                                        <option value="0" {{old('platform_use_case') == 0 ? 'Selected':''}}>No</option>
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
                                                        <option value="">Select</option>
                                                        <option value="1" {{old('plan_use_network') == 1 ? 'Selected':''}}>Yes</option>
                                                        <option value="0" {{old('plan_use_network') == 0 ? 'Selected':''}}>No</option>
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
                                                        <option value="">Select</option>
                                                        <option value="1" {{old('understand_agree') == 1 ? 'Selected':''}}>Yes</option>
                                                        <option value="0" {{old('understand_agree') == 0 ? 'Selected':''}}>No</option>
                                                    </select>
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
    
    @if(Session::get('msg'))
        @if(Session::get('msg')[2] == 'success')
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
                    window.location.href = "{{url('/')}}";
                });
            </script>
        @elseif(Session::get('msg')[2] == 'error')
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

