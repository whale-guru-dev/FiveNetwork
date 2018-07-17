@extends('layouts.member')
@section('member-css')
<link href="{{asset('assets/dashboard/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

<link href="{{asset('assets/dashboard/plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/dashboard/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />

<link href="{{asset('assets/dashboard/plugins/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
<style type="text/css">
.emsg{
    color: red;
}
.hidden {
     visibility:hidden;
}
</style>
@endsection


@section('member-content')
@php
    $invest_types = App\Model\InvestmentStructureType::all();
    $invest_region_types = App\Model\MemberInvestmentRegionType::all();
    $invest_sector_types = App\Model\MemberInvestmentSectorType::all();
    $invest_stage_types = App\Model\MemberInvestmentStageType::all();
@endphp
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-4 align-self-center">
        <h3 class="text-themecolor">Investment Questionnaire</h3>
    </div>
    <div class="col-md-4 align-self-center text-center">
        <!-- <div class="row text-center"> -->
            <img src="{{asset('logo.png')}}" width="200" height="150" alt="homepage" class="dark-logo" />
        <!-- </div> -->
        
    </div>
    <div class="col-md-4 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Investment Questionnaire</li>
        </ol>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Investment Questionnaire</h4>
                    <h6 class="card-subtitle">Please fill Investment Questionnaire.</h6>
                    <form class="form p-t-20" action="{{route('member.submit-coinvestment-opportunity')}}" method="POST" id="submit-form">
                        @csrf
                        <input type="hidden" name="code" value="{{$opportunitymember->code}}">
                        <h4>GENERAL INFORMATION</h4>
                        <hr>
                        

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fName"> First Name
                                        <span class="danger">*</span> 
                                    </label>
                                    <input type="text" class="form-control required" id="fName" name="fName" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lName"> Last Name
                                        <span class="danger">*</span> 
                                    </label>
                                    <input type="text" class="form-control required" id="lName" name="lName" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone"> Phone
                                        <span class="danger">*</span> 
                                    </label>
                                    <input type="tel" class="form-control required" id="phone" name="phone" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email"> Email
                                        <span class="danger">*</span> 
                                    </label>
                                    <input type="email" class="form-control required" id="email" name="email" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="company_name"> Company Name
                                        <span class="danger">*</span> 
                                    </label>
                                    <input type="text" class="form-control required" id="company_name" name="company_name" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="company_website"> Company Website
                                        <span class="danger">*</span> 
                                    </label>
                                    <input type="text" class="form-control required" id="company_website" name="company_website" required>
                                    <p><span class="emsg hidden">Please Enter a Valid Name</span></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address"> Address
                                        <span class="danger">*</span> 
                                    </label>
                                    <input type="text" class="form-control required" id="address" name="address" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city"> City
                                        <span class="danger">*</span> 
                                    </label>
                                    <input type="text" class="form-control required" id="city" name="city" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="state"> State
                                        <span class="danger">*</span> 
                                    </label>
                                    <select class="select2 form-control custom-select required" style="width: 100%" name="state" id="state" required>
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
                                    <label for="country"> Country : <span class="danger">*</span> </label>
                                    <select class="custom-select form-control required" id="country" name="country" required>
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
                                    <label for="current_capital_raise_structure"> What is the structure of the Current Capital Raise?
                                        <span class="danger">*</span> 
                                    </label>
                                    <select class="custom-select form-control required" id="current_capital_raise_structure" name="current_capital_raise_structure" required>
                                        <option value="" selected>Select</option>
                                        @foreach($invest_types as $type)
                                        <option value="{{$type->id}}">{{$type->type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="investment_stage"> Investment Stage
                                        <span class="danger">*</span> 
                                    </label>
                                    <select class="custom-select form-control required" id="investment_stage" name="investment_stage" required>
                                        <option value="" selected>Select</option>
                                        @foreach($invest_stage_types as $ist)
                                        <option value="{{$ist->id}}">{{$ist->type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sector"> Sector
                                        <span class="danger">*</span> 
                                    </label>
                                    <select class="custom-select form-control required" id="sector" name="sector" required>
                                        <option value="" selected>Select</option>
                                        @foreach($invest_sector_types as $sector)
                                        <option value="{{$sector->id}}">{{$sector->type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        
                        </div>

                        <h4>How much capacity is left this round</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="raising_capital"> How much capital are you raising this round? <span class="danger">*</span> 
                                    </label>
                                    <input type="text" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="raising_capital" name="raising_capital" required>  
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="investment_size"> How much capacity is left this round <span class="danger">*</span></label>
                                    
                                    <input type="text" class="form-control required mask-money" data-inputmask="'alias': 'currency'" name="investment_size" id="investment_size" required>
                                    
                                    
                                </div>
                            </div>
                        </div>

                        <h4>Company</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="company_found_date"> Date Company Founded : <span class="danger">*</span> 
                                    </label>
                                    <input type="date" class="form-control required" id="company_found_date" name="company_found_date" required> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="company_desc"> Brief description of company and the problem the company aims to solve : <span class="danger">*</span> 
                                    </label>
                                    <textarea name="company_desc" id="company_desc" class="form-control required" cols=3></textarea required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="products_service"> Products/Services : <span class="danger">*</span> 
                                    </label>
                                    <input type="text" class="form-control required" id="products_service" name="products_service" required> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="products_service_desc"> Brief description of product(s)/service(s) offered and price point : <span class="danger">*</span> 
                                    </label>
                                    <textarea name="products_service_desc" id="products_service_desc" class="form-control required" cols=3 required></textarea>
                                </div>
                            </div>
                        </div>

                        <h4>Patents</h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="bpatent"> Do you have any patents?
                                        <span class="danger">*</span> 
                                    </label>
                                    <select class="custom-select form-control required" id="bpatent" name="bpatent" required>
                                        <option value="" selected >Select</option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="patent_div" style="display: none;">
                            <h6>About Patent(s)</h6>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="patent_desc"> Brief description of patent :  
                                    </label>
                                    <textarea name="patent_desc" id="patent_desc" class="form-control" cols=3></textarea> 
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="patent_status"> Patent Status :  
                                    </label>
                                    <textarea name="patent_status" id="patent_status" class="form-control" cols=3></textarea> 
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="date_field"> Date Filed :  
                                    </label>
                                    <input name="date_field" id="date_field" class="form-control" type="text">
                                </div>
                            </div>
                        </div>

                        <h4>MANAGEMENT TEAM</h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="prior_exp"> Does the Owner have prior experience in the industry? <span class="danger">*</span> 
                                    </label>
                                    <select name="prior_exp" class="form-control required" id="prior_exp" required>
                                        <option value="" selected>Select</option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="length_time"> Length of Time in Industry : <span class="danger">*</span> 
                                    </label>
                                    <input type="text" class="form-control required" id="length_time" name="length_time" required> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="prior_company_role"> Prior Companies and Roles : <span class="danger">*</span> 
                                    </label>
                                    <input type="text" class="form-control required" id="prior_company_role" name="prior_company_role" required> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="outcome_detail"> Please provide details of outcome :  <span class="danger">*</span>
                                    </label>
                                    <textarea name="outcome_detail" id="outcome_detail" class="form-control required" cols=3></textarea required> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="additional_member"> Are there additional members of the Management Team? <span class="danger">*</span> 
                                    </label>
                                    <select name="additional_member" class="form-control required" id="additional_member" required>
                                        <option value="" selected>Select</option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select> 
                                </div>
                            </div>
                        </div>

                        <div class="row" id="additional_member_div" style="display: none;">
                            <h6>Management Team Members</h6>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="additional_member_name"> Name : <span class="danger">*</span> 
                                    </label>
                                    <input type="text" class="form-control" id="additional_member_name" name="additional_member_name"> 
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="members_bio_pior_exp"> Team Member Biography and Prior Experience :  
                                    </label>
                                    <textarea name="members_bio_pior_exp" id="members_bio_pior_exp" class="form-control" cols=3></textarea> 
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="brestrict_convenant"> Are restrictive covenants in place to prevent management team from joining competitor, soliciting clients, etc? <span class="danger">*</span> 
                                    </label>
                                    <select name="brestrict_convenant" class="form-control" id="brestrict_convenant">
                                        <option value="" selected>Select</option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select> 
                                </div>
                            </div>

                            <div class="col-md-12" id="restrict_convenant_div">
                                <div class="form-group">
                                    <label for="restrict_convenant_desc"> Please describe restrictive covenants in place :  
                                    </label>
                                    <textarea name="restrict_convenant_desc" id="restrict_convenant_desc" class="form-control" cols=3></textarea> 
                                </div>
                            </div>
                        </div>

                        <h4>FINANCIAL INFORMATION</h4>
                        <hr>

                        @if($opportunitymember->company_stage == 2)
                        <div class="row">
                            <div class="col-md-12">
                                <h6>2014</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="prev4_total_revenue"> Total 2014 Revenue :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="prev4_total_revenue" name="prev4_total_revenue" required> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="prev4_total_expense"> Total 2014 Expenses :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required  mask-money" data-inputmask="'alias': 'currency'" id="prev4_total_expense" name="prev4_total_expense" required> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="prev4_revenue_expense"> Total Revenue - Total Expenses :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required  mask-money" id="prev4_revenue_expense" name="prev4_revenue_expense" data-inputmask="'alias': 'currency'" required> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h6>2015</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="prev3_total_revenue"> Total 2015 Revenue :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required  mask-money" data-inputmask="'alias': 'currency'" id="prev3_total_revenue" name="prev3_total_revenue" required> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="prev3_total_expense"> Total 2015 Expenses :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required  mask-money" data-inputmask="'alias': 'currency'" id="prev3_total_expense" name="prev3_total_expense" required> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="prev3_revenue_expense"> Total Revenue - Total Expenses :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required  mask-money" data-inputmask="'alias': 'currency'" id="prev3_revenue_expense" name="prev3_revenue_expense" required> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h6>2016</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="prev2_total_revenue"> Total 2016 Revenue :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required  mask-money" data-inputmask="'alias': 'currency'" id="prev2_total_revenue" name="prev2_total_revenue" required> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="prev2_total_expense"> Total 2016 Expenses :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required  mask-money" data-inputmask="'alias': 'currency'" id="prev2_total_expense" name="prev2_total_expense" required> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="prev2_revenue_expense"> Total Revenue - Total Expenses :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required  mask-money" data-inputmask="'alias': 'currency'" id="prev2_revenue_expense" name="prev2_revenue_expense" required> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h6>2017</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="prev1_total_revenue"> Total 2017 Revenue :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required  mask-money" data-inputmask="'alias': 'currency'" id="prev1_total_revenue" name="prev1_total_revenue" required> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="prev1_total_expense"> Total 2017 Expenses :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required  mask-money" data-inputmask="'alias': 'currency'" id="prev1_total_expense" name="prev1_total_expense" required> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="prev1_revenue_expense"> Total Revenue - Total Expenses :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required  mask-money" data-inputmask="'alias': 'currency'" id="prev1_revenue_expense" name="prev1_revenue_expense" required> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h6>Projection - 2018</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cur_total_revenue"> Projected 2018 Total Revenue :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="cur_total_revenue" name="cur_total_revenue" required> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cur_total_expense"> Projected 2018 Total Expenses :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="cur_total_expense" name="cur_total_expense" required> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="cur_revenue_expense"> Projected 2018 Total Revenue - Total Expense :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="cur_revenue_expense" name="cur_revenue_expense" required> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="expect_change_over">How do you expect this structure to change over time? Please describe :  <span class="danger">*</span></label>
                                    <textarea class="form-control required" name="expect_change_over" id="expect_change_over" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="percent_cur_revenue">What percent of current revenue is contractually recurring (vs. non-recurring)? <span class="danger">*</span></label>
                                    <input type="text" name="percent_cur_revenue " class="form-control required mask-percent" id="percent_cur_revenue" data-inputmask="'alias': 'percentage'" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cash_balance">Cash Balance of Company today :  <span class="danger">*</span></label>
                                    <input type="text" name="cash_balance" class="form-control required  mask-money data-inputmask="'alias': 'currency'"" id="cash_balance" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="bhave_debt">Do you currently have debt?  <span class="danger">*</span></label>
                                    <select class="form-control required" name="bhave_debt" id="bhave_debt" required>
                                        <option value="" selected>Select</option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12" style="display: none;" id="debt_detail_div">
                                <h6>Debt Details</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="debt_creditor">Creditor</label>
                                            <input type="text" name="debt_creditor" class="form-control" id="debt_creditor">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="debt_amount">Amount</label>
                                            <input type="text" name="debt_amount" class="form-control mask-money" data-inputmask="'alias': 'currency'" id="debt_amount" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="type_debt_rate_maturity_term">Type of Debt, Rate, Maturity, & Payment Terms</label>
                                            <input type="text" name="type_debt_rate_maturity_term" class="form-control" id="type_debt_rate_maturity_term">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="row">
                            <div class="col-md-12">
                                <h6>2017</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="prev1_total_revenue"> Total 2017 Revenue :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="prev1_total_revenue" name="prev1_total_revenue" required> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="prev1_total_expense"> Total 2017 Expenses :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="prev1_total_expense" name="prev1_total_expense" required> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="prev1_revenue_expense"> Total Revenue - Total Expenses :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="prev1_revenue_expense" name="prev1_revenue_expense" required> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h6>Previous Quarter</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="prev_quater_total_revenue"> Total Revenue Last 3 months :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="prev_quater_total_revenue" name="prev_quater_total_revenue" required> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="prev_quater_total_expense"> Total Expenses Last 3 months :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="prev_quater_total_expense" name="prev_quater_total_expense" required> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="prev_quater_revenue_expense"> Total Revenue - Total Expenses :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="prev_quater_revenue_expense" name="prev_quater_revenue_expense" required> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h6>Previous Month</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="prev_month_total_revenue"> Total Revenue Last Month :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="prev_month_total_revenue" name="prev_month_total_revenue" required> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="prev_month_total_expense"> Total Expenses Last Month :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="prev_month_total_expense" name="prev_month_total_expense" required> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="prev_month_revenue_expense"> Total Revenue - Total Expenses :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="prev_month_revenue_expense" name="prev_month_revenue_expense" required> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h6>Projection - 2018</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cur_total_revenue"> Projected 2018 Total Revenue :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="cur_total_revenue" name="cur_total_revenue" required> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cur_total_expense"> Projected 2018 Total Expenses :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="cur_total_expense" name="cur_total_expense" required> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="cur_revenue_expense"> Projected 2018 Total Revenue - Total Expense :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="cur_revenue_expense" name="cur_revenue_expense" required> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h6>Projection - Current Quarter</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="next3month_total_revenue"> Projected Total Revenue Next 3 months :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="next3month_total_revenue" name="next3month_total_revenue" required> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="next3month_total_expense"> Projected Total Expenses Next 3 Months :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="next3month_total_expense" name="next3month_total_expense" required> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="next3month_revenue_expense"> Projected Total Revenue - Total Expenses :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="next3month_revenue_expense" name="next3month_revenue_expense" required> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h6>Projection - Current Month</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cur_month_total_revenue"> Projected Total Revenue This Month :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="cur_month_total_revenue" name="cur_month_total_revenue" required> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cur_month_total_expense"> Projected Total Expenses This Month :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="cur_month_total_expense" name="cur_month_total_expense" required> 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="cur_month_revenue_expense"> Projected Total Revenue - Total Expense :  <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="cur_month_revenue_expense" name="cur_month_revenue_expense" required> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="expect_change_over">How do you expect this structure to change over time? Please describe  <span class="danger">*</span></label>
                                    <textarea class="form-control required" name="expect_change_over" id="expect_change_over" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="expected_cash_flow_break_date">Expected Cash Flow Break Even Date :  <span class="danger">*</span></label>
                                    <input type="date" name="expected_cash_flow_break_date" id="expected_cash_flow_break_date" class="form-control required" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="percent_cur_revenue">What percent of current revenue is contractually recurring (vs. non-recurring)?  <span class="danger">*</span></label>
                                    <input type="text" name="percent_cur_revenue" class="form-control required mask-percent" id="percent_cur_revenue" data-inputmask="'alias': 'percentage'" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cash_balance">Cash Balance of Company today :  <span class="danger">*</span></label>
                                    <input type="text" name="cash_balance" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="cash_balance" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="bhave_debt">Do you currently have debt?  <span class="danger">*</span></label>
                                    <select class="form-control required" name="bhave_debt" id="bhave_debt" required>
                                        <option value="" selected>Select</option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12" style="display: none;" id="debt_detail_div">
                                <h6>Debt Details</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="debt_creditor">Creditor</label>
                                            <input type="text" name="debt_creditor" class="form-control" id="debt_creditor">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="debt_amount">Amount</label>
                                            <input type="text" name="debt_amount" class="form-control mask-money" data-inputmask="'alias': 'currency'" id="debt_amount">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="type_debt_rate_maturity_term">Type of Debt, Rate, Maturity, & Payment Terms</label>
                                            <input type="text" name="type_debt_rate_maturity_term" class="form-control" id="type_debt_rate_maturity_term">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <h4>COMPETITORS</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="primary_competitor">Primary Competitors :  <span class="danger">*</span></label>
                                    <input type="text" name="primary_competitor" class="form-control required" id="primary_competitor" required>
                                </div>
                            </div> 

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="differ_desc_competitor">Describe how are you differentiated from your competitors :  <span class="danger">*</span></label>
                                    <textarea name="differ_desc_competitor" id="differ_desc_competitor" class="form-control required" cols=3 required></textarea>
                                </div>
                            </div>   
                        </div>

                        <h4>Customers</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="bcur_contracts_customer">Are current contracts in place with customers?  <span class="danger">*</span></label>
                                    <select name="bcur_contracts_customer" class="form-control required" id="bcur_contracts_customer" required>
                                        <option value="" selected>Select</option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select> 
                                </div>
                            </div> 
                        </div>
                        <div class="row" id="customer_contracts_div" style="display: none;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="num_customer">Number of customers today</label>
                                            <input type="number" name="num_customer" class="form-control" id="num_customer">
                                        </div>
                                    </div>  

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="revenue_avg_customer">Average contract revenue per customer</label>
                                            <input type="text" name="revenue_avg_customer" class="form-control mask-money" data-inputmask="'alias': 'currency'" id="revenue_avg_customer">
                                        </div>
                                    </div> 
                                </div>

                                <div class="row">
                                    <h6>Top five customers by percentage revenue</h6>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customer_name_1">Customer Name</label>
                                                    <input type="text" name="customer_name_1" class="form-control" id="customer_name_1">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="percent_revenue_1">Percentage of Revenue</label>
                                                    <input type="text" name="percent_revenue_1" class="form-control mask-percent" id="percent_revenue_1" data-inputmask="'alias': 'percentage'">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customer_name_2">Customer Name</label>
                                                    <input type="text" name="customer_name_2" class="form-control" id="customer_name_2">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="percent_revenue_2">Percentage of Revenue</label>
                                                    <input type="text" name="percent_revenue_2" class="form-control mask-percent" id="percent_revenue_2" data-inputmask="'alias': 'percentage'">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customer_name_3">Customer Name</label>
                                                    <input type="text" name="customer_name_3" class="form-control" id="customer_name_3">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="percent_revenue_3">Percentage of Revenue</label>
                                                    <input type="text" name="percent_revenue_3" class="form-control mask-percent" id="percent_revenue_3" data-inputmask="'alias': 'percentage'">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customer_name_4">Customer Name</label>
                                                    <input type="text" name="customer_name_4" class="form-control" id="customer_name_4">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="percent_revenue_4">Percentage of Revenue</label>
                                                    <input type="text" name="percent_revenue_4" class="form-control mask-percent" id="percent_revenue_4" data-inputmask="'alias': 'percentage'">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="customer_name_5">Customer Name</label>
                                                    <input type="text" name="customer_name_5" class="form-control" id="customer_name_5">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="percent_revenue_5">Percentage of Revenue</label>
                                                    <input type="text" name="percent_revenue_5" class="form-control mask-percent" id="percent_revenue_5" data-inputmask="'alias': 'percentage'">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contract_duration">How long are contracts?  <span class="danger">*</span></label>
                                    <input type="text" name="contract_duration" class="form-control required" id="contract_duration" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cancellation_fee">Cancellation Fee :  <span class="danger">*</span></label>
                                    <input type="text" name="cancellation_fee" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="cancellation_fee" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bcontract_autonew">Do the contracts auto-renew?  <span class="danger">*</span></label>
                                    <select name="bcontract_autonew" class="form-control required" id="bcontract_autonew" required>
                                        <option value="" selected>Select</option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select> 
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projected_num_client">Projected number of clients/contracts for the year :  <span class="danger">*</span></label>
                                    <input type="text" name="projected_num_client" class="form-control required" id="projected_num_client" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="client_acq_cost">Client Acquisition Cost :  <span class="danger">*</span></label>
                                    <input type="text" name="client_acq_cost" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="client_acq_cost" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lifetime_val">Lifetime Value of Customer :  <span class="danger">*</span></label>
                                    <input type="text" name="lifetime_val" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="lifetime_val" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="desc_marketing">Briefly describe how you are marketing today :  <span class="danger">*</span></label>
                                    <textarea name="desc_marketing" id="desc_marketing" class="form-control required" cols=3 required></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="desc_sales_strategy">Briefly describe your current sales strategy today :  <span class="danger">*</span></label>
                                    <textarea name="desc_sales_strategy" id="desc_sales_strategy" class="form-control required" cols=3 required></textarea>
                                </div>
                            </div>
                        </div>

                        <h4>CAPITAL</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="capital_amt_began">Amount of Capital Business Began With :  <span class="danger">*</span></label>
                                    <input type="text" name="capital_amt_began" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="capital_amt_began" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="capital_raise_timing">What is the timing of this capital raise?  <span class="danger">*</span></label>
                                    <input type="text" name="capital_raise_timing" class="form-control required" id="capital_raise_timing" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="expected_close_date">Expected Close Date :  <span class="danger">*</span></label>
                                    <input type="date" name="expected_close_date" class="form-control required" id="expected_close_date" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="capital_used_for">What will the capital be used for?  <span class="danger">*</span></label>
                                    <input type="text" name="capital_used_for" class="form-control required" id="capital_used_for" required >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="bprevious_capital_raise">Have you had previous capital raises?  <span class="danger">*</span></label>
                                    <select name="bprevious_capital_raise" class="form-control required" id="bprevious_capital_raise" required>
                                        <option value="" selected>Select</option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select> 
                                </div>
                            </div>
                        </div>

                        <div class="row" id="prior_capital_raise_div" style="display: none;">
                            <h6>Please detail prior capital raises</h6>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="prior_raise_date">Date</label>
                                            <input type="date" name="prior_raise_date" class="form-control" id="prior_raise_date">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="prior_raised_amount">Amount Raised</label>
                                            <input type="text" name="prior_raised_amount" class="form-control mask-money" data-inputmask="'alias': 'currency'" id="prior_raised_amount">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="prior_investors">Previous Investors</label>
                                            <input type="text" name="prior_investors" class="form-control" id="prior_investors">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="prior_valuation">Valuation</label>
                                            <input type="text" name="prior_valuation" class="form-control mask-money" data-inputmask="'alias': 'currency'" id="prior_valuation" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <h6>Founder Capital Committed</h6>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bfounder_capital_commit">Does the founder have personal capital committed?  <span class="danger">*</span></label>
                                            <select name="bfounder_capital_commit" id="bfounder_capital_commit" class="form-control required" required>
                                                <option value="" selected>Select</option>
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6" id="founder_capital_amount_div" style="display: none;">
                                        <div class="form-group">
                                            <label for="founder_capital_amount">How much</label>
                                            <input type="text" name="founder_capital_amount" class="form-control mask-money" data-inputmask="'alias': 'currency'" id="founder_capital_amount">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <h6>Future Capital Needs</h6>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bexpect_future_raise">Do you expect any future capital raises?  <span class="danger">*</span></label>
                                            <select name="bexpect_future_raise" id="bexpect_future_raise" class="form-control required" required>
                                                <option value="" selected>Select</option>
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6" id="expect_future_raise_div" style="display: none;">
                                        <div class="form-group">
                                            <label for="expect_future_raise_amount">How much</label>
                                            <input type="text" name="expect_future_raise_amount" class="form-control mask-money" data-inputmask="'alias': 'currency'" id="expect_future_raise_amount">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="estimated_timing_future_capital">Estimated timing of future capital raises :  <span class="danger">*</span></label>
                                            <input type="text" name="estimated_timing_future_capital" class="form-control required" id="estimated_timing_future_capital" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="use_additional_fund">Use of additional funds :  <span class="danger">*</span></label>
                                            <input type="text" name="use_additional_fund" class="form-control required" id="use_additional_fund" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($opportunitymember->company_stage == 1)
                        <h4>Did previous investors reinvest this round?</h4>
                        <div class="row">
                            <h6>Previous investors reinvesting this round</h6>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name_investor">Name of Investor :  <span class="danger">*</span></label>
                                            <input type="text" name="name_investor" class="form-control required" id="name_investor" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="amount_committed">Amount Committed :  <span class="danger">*</span></label>
                                            <input type="text" name="amount_committed" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="amount_committed" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="row">
                            <h6>VALUATION</h6>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cur_postmoney_valuation">Current Post-Money Valuation :  <span class="danger">*</span></label>
                                            <input type="text" name="cur_postmoney_valuation" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="cur_postmoney_valuation" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="explanation_valuation">Explanation of Valuation :  <span class="danger">*</span></label>
                                            <input type="text" name="explanation_valuation" class="form-control required" id="explanation_valuation" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4>FUTURE OF COMPANY</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="plan_for_growth">What are your plans for growth?  <span class="danger">*</span></label>
                                            <input type="text" name="plan_for_growth" class="form-control required" id="plan_for_growth" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bhave_plan_exit_business">Do you plan to exit the business in the future?  <span class="danger">*</span></label>
                                            <select name="bhave_plan_exit_business" id="bhave_plan_exit_business" class="form-control required" required>
                                                <option value="" selected>Select</option>
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6" id="exit_date_div" style="display: none;">
                                        <div class="form-group">
                                            <label for="anticipated_exit_date">Anticipated Exit Date</label>
                                            <input type="date" name="anticipated_exit_date" class="form-control" id="anticipated_exit_date" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <h6>Exit Strategy</h6>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exit_strategy">Please describe exit strategy :  <span class="danger">*</span></label>
                                            <textarea name="exit_strategy" class="form-control required" cols="3" required></textarea>
                                        </div>
                                    </div>  
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="top_potential_acqu">Top Potential Acquirers :  <span class="danger">*</span></label>
                                            <input type="text" name="top_potential_acqu" class="form-control required" id="top_potential_acqu" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="revenue_target">Revenue Target :  <span class="danger">*</span></label>
                                            <input type="text" name="revenue_target" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="revenue_target" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="net_income_target">Net Income Target :  <span class="danger">*</span></label>
                                            <input type="text" name="net_income_target" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="net_income_target" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exit_valuation">Exit Valuation :  <span class="danger">*</span></label>
                                            <input type="text" name="exit_valuation" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="exit_valuation" required>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <button type="button" class="btn btn-success waves-effect waves-light m-r-10" id="submit-btn">Submit</button>
                        <button type="button" class="btn btn-inverse waves-effect waves-light" id="cancel-btn">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('member-js')
    <script src="{{asset('assets/dashboard/plugins/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/dashboard/plugins/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/dashboard/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/dashboard/plugins/multiselect/js/jquery.multi-select.js')}}"></script>

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
        }, function(){   
            window.location.href = "{{route('member.dashboard')}}";
        });
    </script>
    @endif

    @if($submitted == 1)
    <script type="text/javascript">
        $("#submit-form input").prop("disabled", true);
        $("#submit-form select").prop("disabled", true);
        $("#submit-form textarea").prop("disabled", true);
        $(".btn").hide();
    </script>
    @endif
<script type="text/javascript">
    $(".select2").select2();

    $(".mask-money").inputmask();
    $(".mask-percent").inputmask();

    $(document).on("click","#submit-btn",function(){
        var emptyfields = $('.required').filter(function() { return this.value === ""; });
        if(emptyfields.length == 0){
            $("#submit-form").submit();
        }else{
            $(document).scrollTop($("#"+emptyfields[0].id).offset().top);
        }
    });

    $(document).on("click","#cancel-btn",function(){
        document.getElementById("submit-form").reset();
    });

    
    $( "#bpatent" ).change(function() {
        if($( "#bpatent" ).val() == 1)
            $("#patent_div").show();
        else $("#patent_div").hide();
    });


    $( "#additional_member" ).change(function() {
        if($( "#additional_member" ).val() == 1)
            $("#additional_member_div").show();
        else $("#additional_member_div").hide();
    });


    $( "#brestrict_convenant" ).change(function() {
        if($( "#brestrict_convenant" ).val() == 1)
            $("#restrict_convenant_div").show();
        else $("#restrict_convenant_div").hide();
    });

    
    $( "#bcur_contracts_customer" ).change(function() {
        if($( "#bcur_contracts_customer" ).val() == 1)
            $("#customer_contracts_div").show();
        else $("#customer_contracts_div").hide();
    });

    
    $( "#bprevious_capital_raise" ).change(function() {
        if($( "#bprevious_capital_raise" ).val() == 1)
            $("#prior_capital_raise_div").show();
        else $("#prior_capital_raise_div").hide();
    });

    
    $( "#bfounder_capital_commit" ).change(function() {
        if($( "#bfounder_capital_commit" ).val() == 1)
            $("#founder_capital_amount_div").show();
        else $("#founder_capital_amount_div").hide();
    });

    
    $( "#bexpect_future_raise" ).change(function() {
        if($( "#bexpect_future_raise" ).val() == 1)
            $("#expect_future_raise_div").show();
        else $("#expect_future_raise_div").hide();
    });

    
    $( "#bhave_plan_exit_business" ).change(function() {
        if($( "#bhave_plan_exit_business" ).val() == 1)
            $("#exit_date_div").show();
        else $("#exit_date_div").hide();
    });

    $( "#bhave_debt" ).change(function() {
        if($( "#bhave_debt" ).val() == 1)
            $("#debt_detail_div").show();
        else $("#debt_detail_div").hide();
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
@endsection 