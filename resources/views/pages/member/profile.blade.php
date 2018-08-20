@extends('layouts.member')
@section('member-css')
<link href="{{asset('assets/dashboard/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

<link href="{{asset('assets/dashboard/plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/dashboard/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />

<link href="{{asset('assets/dashboard/plugins/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/dashboard/plugins/jQuery-Multi-Select-Checboxes-multiselect/css/jquery.multiselect.css')}}" rel="stylesheet" type="text/css" />

<link href="{{asset('assets/dashboard/plugins/checkbox-tree/hummingbird-treeview.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{asset('assets/dashboard/plugins/dropify/dist/css/dropify.min.css')}}">
<style type="text/css">
.treeview {
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
}

.treeview li {
    padding: 2px 10px;
}

#region-type ,#selectall{
    color: #08c !important;
    font-weight: bold;
}
</style>
@endsection


@section('member-content')
@php
    $invest_types = App\Model\InvestmentStructureType::all();
    $invest_size_types = App\Model\MemberInvestmentSizeType::all();
    $invest_stage_types = App\Model\MemberInvestmentStageType::all();
    $invest_sector_types = App\Model\MemberInvestmentSectorType::all();
    $invest_region_types = App\Model\MemberInvestmentRegionType::all();

    $user_struc = [];$user_size = [];$user_stage = [];$user_sector = [];$user_region = [];
    foreach(Auth::user()->investmentstructure as $uis)
    {
        $user_struc[] = $uis->type_id;
    }
    foreach(Auth::user()->investmentstage as $uist)
    {
        $user_stage[] = $uist->type_id;
    }
    foreach(Auth::user()->investmentsize as $uisz)
    {
        $user_size[] = $uisz->type_id;
    }
    foreach(Auth::user()->investmentregion as $uir)
    {
        $user_region[] = $uir->type_id;
    }
    foreach(Auth::user()->investmentsector as $uistr)
    {
        $user_sector[] = $uistr->type_id;
    }
@endphp
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-4 align-self-center">
        <h3 class="text-themecolor">Profile</h3>
    </div>
    <div class="col-md-4 align-self-center text-center">
        <!-- <div class="row text-center"> -->
            <img src="{{asset('logo.png')}}" width="200" height="150" alt="homepage" class="dark-logo" />
        <!-- </div> -->
        
    </div>
    <div class="col-md-4 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
@php
$num_refer = App\Model\MemberReferLog::where('usid', Auth::user()->id)->count();
$num_oppor = App\Model\MemberRequestOpportunity::where('usid', Auth::user()->id)->count() + App\Model\MemberSimpleOpportunity::where('usid', Auth::user()->id)->count();
@endphp
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"> <img src="{{asset('assets/dashboard/profile/propic/'.$user->propic)}}" class="img-circle" width="150" />
                        <h4 class="card-title m-t-10">{{$user->fName.' '.$user->lName}}</h4>
                        <h6 class="card-subtitle">{{$user->title}}</h6>
                        <div class="row text-center justify-content-md-center">
                            <div class="col-4" data-toggle="tooltip" title="Number of Referrals">
                                <a href="{{route('member.view-referrals')}}" class="link">
                                    <i class="icon-people"></i> 
                                    <font class="font-medium">{{$num_refer}}</font>
                                </a>
                            </div>
                            <div class="col-4" data-toggle="tooltip" title="Number of Opportunities">
                                <a href="{{route('member.view-opportunities')}}" class="link">
                                    <i class="icon-layers"></i> 
                                    <font class="font-medium">{{$num_oppor}}</font>
                                </a>
                            </div>
                        </div>
                    </center>
                </div>
                <div>
                    <hr> 
                </div>
                <div class="card-body"> 
                    <small class="text-muted">Email address </small>
                    <h6>{{$user->email}}</h6> 
                    <small class="text-muted p-t-30 db">Office Phone</small>
                    <h6>{{$user->phone_office}}</h6>
                    <small class="text-muted p-t-30 db">Mobile Phone</small>
                    <h6>{{$user->phone_mobile}}</h6>
                    <small class="text-muted p-t-30 db">Social Profile</small>
                    <br/>
                    <a class="btn btn-circle btn-secondary" href="{{$user->linkedIn}}"><i class="fa fa-linkedin"></i></a>
                    <a class="btn btn-circle btn-secondary" href="{{$user->company_website}}"><i class="fa fa-external-link"></i></a>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Applicant Information</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#objectives" role="tab">Investment Objectives</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#logins" role="tab">Login Info</a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">

                    <!--second tab-->
                    <div class="tab-pane active" id="profile" role="tabpanel">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-xs-4 b-r"> <strong>Family Office Name</strong>
                                    <br>
                                    <p class="text-muted">{{$user->family_office_name}}</p>
                                </div>
                                <div class="col-md-4 col-xs-4 b-r"> <strong>First Name</strong>
                                    <br>
                                    <p class="text-muted">{{$user->fName}}</p>
                                </div>
                                <div class="col-md-4 col-xs-4 b-r"> <strong>Last Name</strong>
                                    <br>
                                    <p class="text-muted">{{$user->lName}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 col-xs-6 b-r"> <strong>Address Line 1</strong>
                                    <br>
                                    <p class="text-muted">{{$user->addr_1}}</p>
                                </div>
                                <div class="col-md-6 col-xs-6 b-r"> <strong>Address Line 2</strong>
                                    <br>
                                    <p class="text-muted">{{$user->addr_2}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Town/City</strong>
                                    <br>
                                    <p class="text-muted">{{$user->town_city}}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>State</strong>
                                    <br>
                                    <p class="text-muted">{{$user->state}}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Postal Code</strong>
                                    <br>
                                    <p class="text-muted">{{$user->postal_code}}</p>
                                </div>
                                <div class="col-md-3 col-xs-6"> <strong>Country</strong>
                                    <br>
                                    <p class="text-muted">{{$user->country}}</p>
                                </div>
                            </div>
                            <hr>
                            <strong>Professional History/Bio</strong><p class="m-t-30">{{$user->professional_history_bio}}</p>
                            <strong>About Family Office / Investment Entity</strong><p>{{$user->family_office_investment_entity}}</p>
                        </div>
                    </div>
                    <div class="tab-pane" id="settings" role="tabpanel">
                        <div class="card-body">
                            <form class="form-horizontal form-material" action="{{route('member.edit-profile')}}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <section>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="input-file-now-custom-1">You can upload your photo</label>
                                            <input type="file" id="input-file-now-custom-1" class="dropify" data-default-file="{{asset('assets/dashboard/profile/propic/'.$user->propic)}}" name="profile_photo"/>

                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email"> Email Address :  </label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}"> </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="conf_email">Re-Enter Email :  </label>
                                                <input type="email" class="form-control" id="conf_email" name="email_confirmation" value="{{$user->email}}"> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password"> Original Password : 
                                                </label>
                                                <input type="password" class="form-control" id="original_password" name="original_password"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password"> Password : 
                                                </label>
                                                <input type="password" class="form-control" id="password" name="password"  minlength="8"> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="conf_password"> Confirm Password : 
                                                </label>
                                                <input type="password" class="form-control" id="conf_password" name="conf_password"  minlength="8"> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="family_office_name"> Family Office Name : 
                                                </label>
                                                <input type="text" class="form-control" id="family_office_name" name="family_office_name" value="{{$user->family_office_name}}"> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fName"> First Name : 
                                                </label>
                                                <input type="text" class="form-control" id="fName" name="fName"  value="{{$user->fName}}"> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lName"> Last Name : 
                                                </label>
                                                <input type="text" class="form-control" id="lName" name="lName" value="{{$user->lName}}"> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title"> Title : 
                                                </label>
                                                <input type="text" class="form-control" id="title" name="title" value="{{$user->title}}"> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="addr_1"> Address Line 1 : </label>
                                                <input type="text" class="form-control" id="addr_1" name="addr_1"  value="{{$user->addr_1}}"> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="addr_2"> Address Line 2 :</label>
                                                <input type="text" class="form-control" id="addr_2"  name="addr_2"  value="{{$user->addr_2}}"> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="town_city"> Town/City :  </label>
                                                <input type="text" class="form-control" id="town_city" name="town_city"  value="{{$user->town_city}}"> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="state"> State : </label>
                                                <input type="text" class="form-control" id="state"  name="state" value="{{$user->state}}"> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="postal_code"> Postal Code :  </label>
                                                <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{$user->postal_code}}"> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="country"> Country :  </label>
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
                                                <label for="phone_office">Office Phone : </label>
                                                <input type="tel" class="form-control" id="phone_office" name="phone_office"  value="{{$user->phone_office}}"> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone_mobile">Mobile Phone : </label>
                                                <input type="tel" class="form-control" id="phone_mobile" name="phone_mobile" value="{{$user->phone_mobile}}"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="mdate">Date of Birth :</label>
                                                <input type="date" class="form-control" placeholder="mm/dd/yyyy" name="dob" value="{{$user->dob}}"> 

                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" type="submit">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane" id="objectives" role="tabpanel">
                        <div class="card-body">
                            <form class="form-horizontal form-material" action="{{route('member.edit-investment')}}" method="POST">
                                @csrf
                                <section>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="private_investment_number">Approximately How many Private Investments do you/your family invest in annually? </label>
                                                <select class="custom-select form-control " id="private_investment_number" name="private_investment_number">
                                                    
                                                    <option value="0" @php if(Auth::user()->private_investment_number == "0") echo "Selected" @endphp>1-2</option>
                                                    <option value="1" @php if(Auth::user()->private_investment_number == "1") echo "Selected" @endphp>3-4</option>
                                                    <option value="2" @php if(Auth::user()->private_investment_number == "2") echo "Selected" @endphp>5-7</option>
                                                    <option value="3" @php if(Auth::user()->private_investment_number == "3") echo "Selected" @endphp>8-10</option>
                                                    <option value="4" @php if(Auth::user()->private_investment_number == "4") echo "Selected" @endphp> >10 </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="additional_capacity">Approximately what % of the investments you participate in have additional capacity after your participation ?</label>
                                                <select class="custom-select form-control " id="additional_capacity" name="additional_capacity">
                                                    
                                                    <option value="20" @php if(Auth::user()->additional_capacity == "20") echo "Selected" @endphp>20%</option>
                                                    <option value="40" @php if(Auth::user()->additional_capacity == "40") echo "Selected" @endphp>40%</option>
                                                    <option value="60" @php if(Auth::user()->additional_capacity == "60") echo "Selected" @endphp>60%</option>
                                                    <option value="80" @php if(Auth::user()->additional_capacity == "80") echo "Selected" @endphp>80%</option>
                                                    <option value="100" @php if(Auth::user()->additional_capacity == "100") echo "Selected" @endphp>100%</option>
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
                                                                        <input class="hummingbirdNoParent" id="xnode-1-1-{{$type->id}}" data-id="custom-1-1-{{$type->id}}" type="checkbox" name="invest_structure[]" value="{{$type->id}}" @php if(in_array($type->id, $user_struc)) echo "checked" @endphp>
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
                                                                <input id="xnode-0-1" data-id="custom-0-1" type="checkbox">
                                                                <label for="xnode-0-1" id="region-type"> Southeast  </label>
                                                            </div>
                                                        </label>
                                                        
                                                        <ul>
                                                            @foreach($invest_region_types as $irt)
                                                            @if($irt->id < 14)
                                                            <li>
                                                                <label>
                                                                    <div class="checkbox checkbox-success">
                                                                        <input class="hummingbirdNoParent" id="xnode-0-1-{{$irt->id}}" data-id="custom-0-1-{{$irt->id}}" type="checkbox" name="invest_region[]" value="{{$irt->id}}" @php if(in_array($irt->id, $user_region)) echo "checked" @endphp>
                                                                        <label for="xnode-0-1-{{$irt->id}}"> {{$irt->type}}   </label>
                                                                    </div>
                                                                </label>
                                                            </li>
                                                            @endif
                                                            @endforeach
                                                        </ul>
                                                    </li>

                                                    <li> 
                                                        <i class="fa fa-minus"></i>
                                                        <label>
                                                            <div class="checkbox checkbox-success">
                                                                <input id="xnode-0-2" data-id="custom-0-2" type="checkbox">
                                                                <label for="xnode-0-2" id="region-type"> Southwest  </label>
                                                            </div>
                                                        </label>
                                                        
                                                        <ul>
                                                            @foreach($invest_region_types as $irt)
                                                            @if($irt->id > 13 && $irt->id < 18)
                                                            <li>
                                                                <label>
                                                                    <div class="checkbox checkbox-success">
                                                                        <input class="hummingbirdNoParent" id="xnode-0-2-{{$irt->id}}" data-id="custom-0-2-{{$irt->id}}" type="checkbox" name="invest_region[]" value="{{$irt->id}}" @php if(in_array($irt->id, $user_region)) echo "checked" @endphp>
                                                                        <label for="xnode-0-2-{{$irt->id}}"> {{$irt->type}}   </label>
                                                                    </div>
                                                                </label>
                                                            </li>
                                                            @endif
                                                            @endforeach
                                                        </ul>
                                                    </li>

                                                    <li> 
                                                        <i class="fa fa-minus"></i>
                                                        <label>
                                                            <div class="checkbox checkbox-success">
                                                                <input id="xnode-0-3" data-id="custom-0-3" type="checkbox">
                                                                <label for="xnode-0-3" id="region-type"> Midwest  </label>
                                                            </div>
                                                        </label>
                                                        
                                                        <ul>
                                                            @foreach($invest_region_types as $irt)
                                                            @if($irt->id > 17 && $irt->id < 30)
                                                            <li>
                                                                <label>
                                                                    <div class="checkbox checkbox-success">
                                                                        <input class="hummingbirdNoParent" id="xnode-0-4-{{$irt->id}}" data-id="custom-0-4-{{$irt->id}}" type="checkbox" name="invest_region[]" value="{{$irt->id}}" @php if(in_array($irt->id, $user_region)) echo "checked" @endphp>
                                                                        <label for="xnode-0-4-{{$irt->id}}"> {{$irt->type}}   </label>
                                                                    </div>
                                                                </label>
                                                            </li>
                                                            @endif
                                                            @endforeach
                                                        </ul>
                                                    </li>

                                                    <li> 
                                                        <i class="fa fa-minus"></i>
                                                        <label>
                                                            <div class="checkbox checkbox-success">
                                                                <input id="xnode-0-5" data-id="custom-0-5" type="checkbox">
                                                                <label for="xnode-0-5" id="region-type"> West  </label>
                                                            </div>
                                                        </label>
                                                        
                                                        <ul>
                                                            @foreach($invest_region_types as $irt)
                                                            @if($irt->id > 29 && $irt->id < 41)
                                                            <li>
                                                                <label>
                                                                    <div class="checkbox checkbox-success">
                                                                        <input class="hummingbirdNoParent" id="xnode-0-5-{{$irt->id}}" data-id="custom-0-5-{{$irt->id}}" type="checkbox" name="invest_region[]" value="{{$irt->id}}" @php if(in_array($irt->id, $user_region)) echo "checked" @endphp>
                                                                        <label for="xnode-0-5-{{$irt->id}}"> {{$irt->type}}   </label>
                                                                    </div>
                                                                </label>
                                                            </li>
                                                            @endif
                                                            @endforeach
                                                        </ul>
                                                    </li>

                                                    <li> 
                                                        <i class="fa fa-minus"></i>
                                                        <label>
                                                            <div class="checkbox checkbox-success">
                                                                <input id="xnode-0-6" data-id="custom-0-6" type="checkbox">
                                                                <label for="xnode-0-6" id="region-type"> Northeast  </label>
                                                            </div>
                                                        </label>
                                                        
                                                        <ul>
                                                            @foreach($invest_region_types as $irt)
                                                            @if($irt->id > 40)
                                                            <li>
                                                                <label>
                                                                    <div class="checkbox checkbox-success">
                                                                        <input class="hummingbirdNoParent" id="xnode-0-6-{{$irt->id}}" data-id="custom-0-6-{{$irt->id}}" type="checkbox" name="invest_region[]" value="{{$irt->id}}" @php if(in_array($irt->id, $user_region)) echo "checked" @endphp>
                                                                        <label for="xnode-0-6-{{$irt->id}}"> {{$irt->type}}   </label>
                                                                    </div>
                                                                </label>
                                                            </li>
                                                            @endif
                                                            @endforeach
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
                                                                        <input class="hummingbirdNoParent" id="xnode-2-1-{{$type->id}}" data-id="custom-2-1-{{$type->id}}" type="checkbox" name="average_investment_size[]" value="{{$type->id}}" @php if(in_array($type->id, $user_size)) echo "checked"; @endphp>
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
                                                                        <input class="hummingbirdNoParent" id="xnode-3-1-{{$type->id}}" data-id="custom-3-1-{{$type->id}}" type="checkbox" name="investment_stage[]" value="{{$type->id}}" @php if(in_array($type->id, $user_stage)) echo "checked"; @endphp>
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
                                            <div class="form-group">
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
                                                                        <input class="hummingbirdNoParent" id="xnode-4-1-{{$isrt->id}}" data-id="custom-4-1-{{$isrt->id}}" type="checkbox" name="investment_sector[]" value="{{$isrt->id}}" @php if(in_array($isrt->id, $user_sector)) echo "checked"; @endphp>
                                                                        <label for="xnode-4-1-{{$isrt->id}}" > {{$isrt->type}} </label>
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
                                </section>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane" id="logins" role="tabpanel">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>IP Address</th>
                                            <th>Location</th>
                                            <th>Device</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($logins as $login)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$login->ip_addr}}</td>
                                            <td>{{$login->location}}</td>
                                            <td>{{$login->device}}</td>
                                            <td>{{$login->created_at}}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6">
                                                <div class="text-right">
                                                    <ul class="pagination"> </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
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
<script src="{{asset('assets/dashboard/plugins/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/dashboard/plugins/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/dashboard/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/dashboard/plugins/multiselect/js/jquery.multi-select.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/dashboard/plugins/jQuery-Multi-Select-Checboxes-multiselect/js/jquery.multiselect.js')}}"></script>

<script src="{{asset('assets/dashboard/plugins/checkbox-tree/hummingbird-treeview.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/icheck/icheck.min.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/icheck/icheck.init.js')}}"></script>
<!-- ============================================================== -->
<!-- Wizard -->
<script src="{{asset('assets/dashboard/plugins/wizard/jquery.steps.min.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/wizard/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/wizard/steps.js')}}"></script>

<script src="{{asset('assets/dashboard/plugins/dropify/dist/js/dropify.min.js')}}"></script>

<script type="text/javascript">
    $(".treeview").hummingbird();
    $('.dropify').dropify();

    // var addrow = $('#demo-foo-addrow');
    //     addrow.footable().on('click', '.delete-row-btn', function() {

    //     //get the footable object
    //     var footable = addrow.data('footable');

    //     //get the row we are wanting to delete
    //     var row = $(this).parents('tr:first');

    //     //delete the row
    //     footable.removeRow(row);
    // });

    
</script>


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
            });
        </script>
    @endif
@endif
@endsection