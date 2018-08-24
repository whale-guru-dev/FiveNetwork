<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1">
    <meta name="description"  content="Family Investment Exchange" />
    <meta name="author" content="DAO">
    <meta name="keywords"  content="Family Investment Exchange" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon.png')}}">
    <title>Family Investment Exchange | Investment Questionnaire</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/dashboard/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('assets/dashboard/member/css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('assets/dashboard/member/css/colors/blue.css')}}" id="theme" rel="stylesheet">
    <link href="{{asset('assets/dashboard/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/dashboard/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/dashboard/plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/dashboard/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('assets/dashboard/plugins/dropify/dist/css/dropify.min.css')}}">

    <link href="{{asset('assets/dashboard/plugins/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
    <style type="text/css">
    .emsg{
        color: red;
    }
    .hidden {
         visibility:hidden;
    }
    .error {
      color: red;
      margin-left: 5px;
    }
     
    label.error {
      display: initial;
    }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<style type="text/css">
.sidebar-nav>ul>li>a.active {
    background: #e5eeff;
}
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

@font-face {
   font-family: Shrikhand;
   src: url({{asset('assets/dashboard/member/font/Shrikhand-Regular.ttf')}});
}

.navbar-brand{
    font-family: Shrikhand;
    color: white !important;
}

@media (max-width: 479px){
    .navbar-brand{
        font-size: 15px;
    }
}
</style>

<body class="fix-header card-no-border logo-center">
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
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{route('home')}}">
                        <!-- Logo icon -->
                        <!-- <b>Family Investment Exchange</b> -->
                        Family Investment Exchange
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item"> 
                            <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi-close mdi-menu mdi"></i>
                            </a> 
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            @php
                $invest_types = App\Model\InvestmentStructureType::all();
                $invest_stage_types = App\Model\MemberInvestmentStageType::all();

                $invest_region_types = App\Model\MemberInvestmentRegionType::orderBy('type','ASC')->get();
                $invest_sector_types = App\Model\MemberInvestmentSectorType::orderBy('type','ASC')->get();
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
                                <form class="form p-t-20" action="{{route('investment-questionnaire-submit')}}" method="POST" id="submit-form" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <input type="hidden" name="code" value="@php if(isset($form)) echo $form->code; @endphp">

                                    <input type="hidden" name="identity" id="identity" value="submit">
                                    <h4>GENERAL INFORMATION</h4>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="sendto"> Send To
                                                    <span class="danger">*</span> 
                                                </label>
                                                <input type="email" class="form-control required" id="sendto" name="sendto" required value="@php if(isset($form)) echo $form->sendto; @endphp" maxlength="55">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fName"> First Name
                                                    <span class="danger">*</span> 
                                                </label>
                                                <input type="text" class="form-control required" id="fName" name="fName" required value="@php if(isset($form)) echo $form->fName; @endphp" maxlength="55">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lName"> Last Name
                                                    <span class="danger">*</span> 
                                                </label>
                                                <input type="text" class="form-control required" id="lName" name="lName" required value="@php if(isset($form)) echo $form->lName; @endphp" maxlength="55">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone"> Phone
                                                    <span class="danger">*</span> 
                                                </label>
                                                <input type="tel" class="form-control required" id="phone" name="phone" required value="@php if(isset($form)) echo $form->phone; @endphp" maxlength="55">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email"> Email
                                                    <span class="danger">*</span> 
                                                </label>
                                                <input type="email" class="form-control required" id="email" name="email" required value="@php if(isset($form)) echo $form->email; @endphp" maxlength="55">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="company_name"> Company Name
                                                    <span class="danger">*</span> 
                                                </label>
                                                <input type="text" class="form-control required" id="company_name" name="company_name" required value="@php if(isset($form)) echo $form->company_name; @endphp" maxlength="255">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="company_website"> Company Website
                                                    <span class="danger">*</span> 
                                                </label>
                                                <input type="text" class="form-control required" id="company_website" name="company_website" required value="@php if(isset($form)) echo $form->company_website; @endphp" maxlength="255">
                                                <p><span class="emsg hidden">Please Enter a Valid URL</span></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="address"> Address
                                                    <span class="danger">*</span> 
                                                </label>
                                                <input type="text" class="form-control required" id="address" name="address" required value="@php if(isset($form)) echo $form->address; @endphp" maxlength="255">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="city"> City
                                                    <span class="danger">*</span> 
                                                </label>
                                                <input type="text" class="form-control required" id="city" name="city" required  value="@php if(isset($form)) echo $form->city; @endphp" maxlength="255">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="state"> State
                                                    <span class="danger">*</span> 
                                                </label>
                                                <select class="form-control required" style="width: 100%" name="state" id="state" required>
                                                    <option value="" selected="">Select</option>
                                                    @foreach($invest_region_types as $irt)
                                                        <option value="{{$irt->id}}" @php if(isset($form) && $form->state == $irt->id) echo "selected" @endphp>{{$irt->type}}</option>
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
                                                    <option value="AF" @php if(isset($form) && $form->country == "AF") echo "selected" @endphp>Afghanistan</option>
                                                    <option value="AX" @php if(isset($form) && $form->country == "AX") echo "selected" @endphp>Åland Islands</option>
                                                    <option value="AL" @php if(isset($form) && $form->country == "AL") echo "selected" @endphp>Albania</option>
                                                    <option value="DZ" @php if(isset($form) && $form->country == "DZ") echo "selected" @endphp>Algeria</option>
                                                    <option value="AS" @php if(isset($form) && $form->country == "AS") echo "selected" @endphp>American Samoa</option>
                                                    <option value="AD" @php if(isset($form) && $form->country == "AD") echo "selected" @endphp>Andorra</option>
                                                    <option value="AO" @php if(isset($form) && $form->country == "AO") echo "selected" @endphp>Angola</option>
                                                    <option value="AI" @php if(isset($form) && $form->country == "AI") echo "selected" @endphp>Anguilla</option>
                                                    <option value="AQ" @php if(isset($form) && $form->country == "AQ") echo "selected" @endphp>Antarctica</option>
                                                    <option value="AG" @php if(isset($form) && $form->country == "AG") echo "selected" @endphp>Antigua and Barbuda</option>
                                                    <option value="AR" @php if(isset($form) && $form->country == "AR") echo "selected" @endphp>Argentina</option>
                                                    <option value="AM" @php if(isset($form) && $form->country == "AM") echo "selected" @endphp>Armenia</option>
                                                    <option value="AW" @php if(isset($form) && $form->country == "AW") echo "selected" @endphp>Aruba</option>
                                                    <option value="AU" @php if(isset($form) && $form->country == "AU") echo "selected" @endphp>Australia</option>
                                                    <option value="AT" @php if(isset($form) && $form->country == "AT") echo "selected" @endphp>Austria</option>
                                                    <option value="AZ" @php if(isset($form) && $form->country == "AZ") echo "selected" @endphp>Azerbaijan</option>
                                                    <option value="BS" @php if(isset($form) && $form->country == "BS") echo "selected" @endphp>Bahamas</option>
                                                    <option value="BH" @php if(isset($form) && $form->country == "BH") echo "selected" @endphp>Bahrain</option>
                                                    <option value="BD" @php if(isset($form) && $form->country == "BD") echo "selected" @endphp>Bangladesh</option>
                                                    <option value="BB" @php if(isset($form) && $form->country == "BB") echo "selected" @endphp>Barbados</option>
                                                    <option value="BY" @php if(isset($form) && $form->country == "BY") echo "selected" @endphp>Belarus</option>
                                                    <option value="BE" @php if(isset($form) && $form->country == "BE") echo "selected" @endphp>Belgium</option>
                                                    <option value="BZ" @php if(isset($form) && $form->country == "BZ") echo "selected" @endphp>Belize</option>
                                                    <option value="BJ" @php if(isset($form) && $form->country == "BJ") echo "selected" @endphp>Benin</option>
                                                    <option value="BM" @php if(isset($form) && $form->country == "BM") echo "selected" @endphp>Bermuda</option>
                                                    <option value="BT" @php if(isset($form) && $form->country == "BT") echo "selected" @endphp>Bhutan</option>
                                                    <option value="BO" @php if(isset($form) && $form->country == "BO") echo "selected" @endphp>Bolivia, Plurinational State of</option>
                                                    <option value="BQ" @php if(isset($form) && $form->country == "BQ") echo "selected" @endphp>Bonaire, Sint Eustatius and Saba</option>
                                                    <option value="BA" @php if(isset($form) && $form->country == "BA") echo "selected" @endphp>Bosnia and Herzegovina</option>
                                                    <option value="BW" @php if(isset($form) && $form->country == "BW") echo "selected" @endphp>Botswana</option>
                                                    <option value="BV" @php if(isset($form) && $form->country == "BV") echo "selected" @endphp>Bouvet Island</option>
                                                    <option value="BR" @php if(isset($form) && $form->country == "BR") echo "selected" @endphp>Brazil</option>
                                                    <option value="IO" @php if(isset($form) && $form->country == "IO") echo "selected" @endphp>British Indian Ocean Territory</option>
                                                    <option value="BN" @php if(isset($form) && $form->country == "BN") echo "selected" @endphp>Brunei Darussalam</option>
                                                    <option value="BG" @php if(isset($form) && $form->country == "BG") echo "selected" @endphp>Bulgaria</option>
                                                    <option value="BF" @php if(isset($form) && $form->country == "BF") echo "selected" @endphp>Burkina Faso</option>
                                                    <option value="BI" @php if(isset($form) && $form->country == "BI") echo "selected" @endphp>Burundi</option>
                                                    <option value="KH" @php if(isset($form) && $form->country == "KH") echo "selected" @endphp>Cambodia</option>
                                                    <option value="CM" @php if(isset($form) && $form->country == "CM") echo "selected" @endphp>Cameroon</option>
                                                    <option value="CA" @php if(isset($form) && $form->country == "CA") echo "selected" @endphp>Canada</option>
                                                    <option value="CV" @php if(isset($form) && $form->country == "CV") echo "selected" @endphp>Cape Verde</option>
                                                    <option value="KY" @php if(isset($form) && $form->country == "KY") echo "selected" @endphp>Cayman Islands</option>
                                                    <option value="CF" @php if(isset($form) && $form->country == "CF") echo "selected" @endphp>Central African Republic</option>
                                                    <option value="TD" @php if(isset($form) && $form->country == "TD") echo "selected" @endphp>Chad</option>
                                                    <option value="CL" @php if(isset($form) && $form->country == "CL") echo "selected" @endphp>Chile</option>
                                                    <option value="CN" @php if(isset($form) && $form->country == "CN") echo "selected" @endphp>China</option>
                                                    <option value="CX" @php if(isset($form) && $form->country == "CX") echo "selected" @endphp>Christmas Island</option>
                                                    <option value="CC" @php if(isset($form) && $form->country == "CC") echo "selected" @endphp>Cocos (Keeling) Islands</option>
                                                    <option value="CO" @php if(isset($form) && $form->country == "CO") echo "selected" @endphp>Colombia</option>
                                                    <option value="KM" @php if(isset($form) && $form->country == "KM") echo "selected" @endphp>Comoros</option>
                                                    <option value="CG" @php if(isset($form) && $form->country == "CG") echo "selected" @endphp>Congo</option>
                                                    <option value="CD" @php if(isset($form) && $form->country == "CD") echo "selected" @endphp>Congo, the Democratic Republic of the</option>
                                                    <option value="CK" @php if(isset($form) && $form->country == "CK") echo "selected" @endphp>Cook Islands</option>
                                                    <option value="CR" @php if(isset($form) && $form->country == "CR") echo "selected" @endphp>Costa Rica</option>
                                                    <option value="CI" @php if(isset($form) && $form->country == "CI") echo "selected" @endphp>Côte d'Ivoire</option>
                                                    <option value="HR" @php if(isset($form) && $form->country == "HR") echo "selected" @endphp>Croatia</option>
                                                    <option value="CU" @php if(isset($form) && $form->country == "CU") echo "selected" @endphp>Cuba</option>
                                                    <option value="CW" @php if(isset($form) && $form->country == "CW") echo "selected" @endphp>Curaçao</option>
                                                    <option value="CY" @php if(isset($form) && $form->country == "CY") echo "selected" @endphp>Cyprus</option>
                                                    <option value="CZ" @php if(isset($form) && $form->country == "CZ") echo "selected" @endphp>Czech Republic</option>
                                                    <option value="DK" @php if(isset($form) && $form->country == "DK") echo "selected" @endphp>Denmark</option>
                                                    <option value="DJ" @php if(isset($form) && $form->country == "DJ") echo "selected" @endphp>Djibouti</option>
                                                    <option value="DM" @php if(isset($form) && $form->country == "DM") echo "selected" @endphp>Dominica</option>
                                                    <option value="DO" @php if(isset($form) && $form->country == "DO") echo "selected" @endphp>Dominican Republic</option>
                                                    <option value="EC" @php if(isset($form) && $form->country == "EC") echo "selected" @endphp>Ecuador</option>
                                                    <option value="EG" @php if(isset($form) && $form->country == "EG") echo "selected" @endphp>Egypt</option>
                                                    <option value="SV" @php if(isset($form) && $form->country == "SV") echo "selected" @endphp>El Salvador</option>
                                                    <option value="GQ" @php if(isset($form) && $form->country == "GQ") echo "selected" @endphp>Equatorial Guinea</option>
                                                    <option value="ER" @php if(isset($form) && $form->country == "ER") echo "selected" @endphp>Eritrea</option>
                                                    <option value="EE" @php if(isset($form) && $form->country == "EE") echo "selected" @endphp>Estonia</option>
                                                    <option value="ET" @php if(isset($form) && $form->country == "ET") echo "selected" @endphp>Ethiopia</option>
                                                    <option value="FK" @php if(isset($form) && $form->country == "FK") echo "selected" @endphp>Falkland Islands (Malvinas)</option>
                                                    <option value="FO" @php if(isset($form) && $form->country == "FO") echo "selected" @endphp>Faroe Islands</option>
                                                    <option value="FJ" @php if(isset($form) && $form->country == "FJ") echo "selected" @endphp>Fiji</option>
                                                    <option value="FI" @php if(isset($form) && $form->country == "FI") echo "selected" @endphp>Finland</option>
                                                    <option value="FR" @php if(isset($form) && $form->country == "FR") echo "selected" @endphp>France</option>
                                                    <option value="GF" @php if(isset($form) && $form->country == "GF") echo "selected" @endphp>French Guiana</option>
                                                    <option value="PF" @php if(isset($form) && $form->country == "PF") echo "selected" @endphp>French Polynesia</option>
                                                    <option value="TF" @php if(isset($form) && $form->country == "TF") echo "selected" @endphp>French Southern Territories</option>
                                                    <option value="GA" @php if(isset($form) && $form->country == "GA") echo "selected" @endphp>Gabon</option>
                                                    <option value="GM" @php if(isset($form) && $form->country == "GM") echo "selected" @endphp>Gambia</option>
                                                    <option value="GE" @php if(isset($form) && $form->country == "GE") echo "selected" @endphp>Georgia</option>
                                                    <option value="DE" @php if(isset($form) && $form->country == "DE") echo "selected" @endphp>Germany</option>
                                                    <option value="GH" @php if(isset($form) && $form->country == "GH") echo "selected" @endphp>Ghana</option>
                                                    <option value="GI" @php if(isset($form) && $form->country == "GI") echo "selected" @endphp>Gibraltar</option>
                                                    <option value="GR" @php if(isset($form) && $form->country == "GR") echo "selected" @endphp>Greece</option>
                                                    <option value="GL" @php if(isset($form) && $form->country == "GL") echo "selected" @endphp>Greenland</option>
                                                    <option value="GD" @php if(isset($form) && $form->country == "GD") echo "selected" @endphp>Grenada</option>
                                                    <option value="GP" @php if(isset($form) && $form->country == "GP") echo "selected" @endphp>Guadeloupe</option>
                                                    <option value="GU" @php if(isset($form) && $form->country == "GU") echo "selected" @endphp>Guam</option>
                                                    <option value="GT" @php if(isset($form) && $form->country == "GT") echo "selected" @endphp>Guatemala</option>
                                                    <option value="GG" @php if(isset($form) && $form->country == "GG") echo "selected" @endphp>Guernsey</option>
                                                    <option value="GN" @php if(isset($form) && $form->country == "GN") echo "selected" @endphp>Guinea</option>
                                                    <option value="GW" @php if(isset($form) && $form->country == "GW") echo "selected" @endphp>Guinea-Bissau</option>
                                                    <option value="GY" @php if(isset($form) && $form->country == "GY") echo "selected" @endphp>Guyana</option>
                                                    <option value="HT" @php if(isset($form) && $form->country == "HT") echo "selected" @endphp>Haiti</option>
                                                    <option value="HM" @php if(isset($form) && $form->country == "HM") echo "selected" @endphp>Heard Island and McDonald Islands</option>
                                                    <option value="VA" @php if(isset($form) && $form->country == "VA") echo "selected" @endphp>Holy See (Vatican City State)</option>
                                                    <option value="HN" @php if(isset($form) && $form->country == "HN") echo "selected" @endphp>Honduras</option>
                                                    <option value="HK" @php if(isset($form) && $form->country == "HK") echo "selected" @endphp>Hong Kong</option>
                                                    <option value="HU" @php if(isset($form) && $form->country == "HU") echo "selected" @endphp>Hungary</option>
                                                    <option value="IS" @php if(isset($form) && $form->country == "IS") echo "selected" @endphp>Iceland</option>
                                                    <option value="IN" @php if(isset($form) && $form->country == "IN") echo "selected" @endphp>India</option>
                                                    <option value="ID" @php if(isset($form) && $form->country == "ID") echo "selected" @endphp>Indonesia</option>
                                                    <option value="IR" @php if(isset($form) && $form->country == "IR") echo "selected" @endphp>Iran, Islamic Republic of</option>
                                                    <option value="IQ" @php if(isset($form) && $form->country == "IQ") echo "selected" @endphp>Iraq</option>
                                                    <option value="IE" @php if(isset($form) && $form->country == "IE") echo "selected" @endphp>Ireland</option>
                                                    <option value="IM" @php if(isset($form) && $form->country == "IM") echo "selected" @endphp>Isle of Man</option>
                                                    <option value="IL" @php if(isset($form) && $form->country == "IL") echo "selected" @endphp>Israel</option>
                                                    <option value="IT" @php if(isset($form) && $form->country == "IT") echo "selected" @endphp>Italy</option>
                                                    <option value="JM" @php if(isset($form) && $form->country == "JM") echo "selected" @endphp>Jamaica</option>
                                                    <option value="JP" @php if(isset($form) && $form->country == "JP") echo "selected" @endphp>Japan</option>
                                                    <option value="JE" @php if(isset($form) && $form->country == "JE") echo "selected" @endphp>Jersey</option>
                                                    <option value="JO" @php if(isset($form) && $form->country == "JO") echo "selected" @endphp>Jordan</option>
                                                    <option value="KZ" @php if(isset($form) && $form->country == "KZ") echo "selected" @endphp>Kazakhstan</option>
                                                    <option value="KE" @php if(isset($form) && $form->country == "KE") echo "selected" @endphp>Kenya</option>
                                                    <option value="KI" @php if(isset($form) && $form->country == "KI") echo "selected" @endphp>Kiribati</option>
                                                    <option value="KP" @php if(isset($form) && $form->country == "KP") echo "selected" @endphp>Korea, Democratic People's Republic of</option>
                                                    <option value="KR" @php if(isset($form) && $form->country == "KR") echo "selected" @endphp>Korea, Republic of</option>
                                                    <option value="KW" @php if(isset($form) && $form->country == "KW") echo "selected" @endphp>Kuwait</option>
                                                    <option value="KG" @php if(isset($form) && $form->country == "KG") echo "selected" @endphp>Kyrgyzstan</option>
                                                    <option value="LA" @php if(isset($form) && $form->country == "LA") echo "selected" @endphp>Lao People's Democratic Republic</option>
                                                    <option value="LV" @php if(isset($form) && $form->country == "LV") echo "selected" @endphp>Latvia</option>
                                                    <option value="LB" @php if(isset($form) && $form->country == "LB") echo "selected" @endphp>Lebanon</option>
                                                    <option value="LS" @php if(isset($form) && $form->country == "LS") echo "selected" @endphp>Lesotho</option>
                                                    <option value="LR" @php if(isset($form) && $form->country == "LR") echo "selected" @endphp>Liberia</option>
                                                    <option value="LY" @php if(isset($form) && $form->country == "LY") echo "selected" @endphp>Libya</option>
                                                    <option value="LI" @php if(isset($form) && $form->country == "LI") echo "selected" @endphp>Liechtenstein</option>
                                                    <option value="LT" @php if(isset($form) && $form->country == "LT") echo "selected" @endphp>Lithuania</option>
                                                    <option value="LU" @php if(isset($form) && $form->country == "LU") echo "selected" @endphp>Luxembourg</option>
                                                    <option value="MO" @php if(isset($form) && $form->country == "MO") echo "selected" @endphp>Macao</option>
                                                    <option value="MK" @php if(isset($form) && $form->country == "MK") echo "selected" @endphp>Macedonia, the former Yugoslav Republic of</option>
                                                    <option value="MG" @php if(isset($form) && $form->country == "MG") echo "selected" @endphp>Madagascar</option>
                                                    <option value="MW" @php if(isset($form) && $form->country == "MW") echo "selected" @endphp>Malawi</option>
                                                    <option value="MY" @php if(isset($form) && $form->country == "MY") echo "selected" @endphp>Malaysia</option>
                                                    <option value="MV" @php if(isset($form) && $form->country == "MV") echo "selected" @endphp>Maldives</option>
                                                    <option value="ML" @php if(isset($form) && $form->country == "ML") echo "selected" @endphp>Mali</option>
                                                    <option value="MT" @php if(isset($form) && $form->country == "MT") echo "selected" @endphp>Malta</option>
                                                    <option value="MH" @php if(isset($form) && $form->country == "MH") echo "selected" @endphp>Marshall Islands</option>
                                                    <option value="MQ" @php if(isset($form) && $form->country == "MQ") echo "selected" @endphp>Martinique</option>
                                                    <option value="MR" @php if(isset($form) && $form->country == "MR") echo "selected" @endphp>Mauritania</option>
                                                    <option value="MU" @php if(isset($form) && $form->country == "MU") echo "selected" @endphp>Mauritius</option>
                                                    <option value="YT" @php if(isset($form) && $form->country == "YT") echo "selected" @endphp>Mayotte</option>
                                                    <option value="MX" @php if(isset($form) && $form->country == "MX") echo "selected" @endphp>Mexico</option>
                                                    <option value="FM" @php if(isset($form) && $form->country == "FM") echo "selected" @endphp>Micronesia, Federated States of</option>
                                                    <option value="MD" @php if(isset($form) && $form->country == "MD") echo "selected" @endphp>Moldova, Republic of</option>
                                                    <option value="MC" @php if(isset($form) && $form->country == "MC") echo "selected" @endphp>Monaco</option>
                                                    <option value="MN" @php if(isset($form) && $form->country == "MN") echo "selected" @endphp>Mongolia</option>
                                                    <option value="ME" @php if(isset($form) && $form->country == "ME") echo "selected" @endphp>Montenegro</option>
                                                    <option value="MS" @php if(isset($form) && $form->country == "MS") echo "selected" @endphp>Montserrat</option>
                                                    <option value="MA" @php if(isset($form) && $form->country == "MA") echo "selected" @endphp>Morocco</option>
                                                    <option value="MZ" @php if(isset($form) && $form->country == "MZ") echo "selected" @endphp>Mozambique</option>
                                                    <option value="MM" @php if(isset($form) && $form->country == "MM") echo "selected" @endphp>Myanmar</option>
                                                    <option value="NA" @php if(isset($form) && $form->country == "NA") echo "selected" @endphp>Namibia</option>
                                                    <option value="NR" @php if(isset($form) && $form->country == "NR") echo "selected" @endphp>Nauru</option>
                                                    <option value="NP" @php if(isset($form) && $form->country == "NP") echo "selected" @endphp>Nepal</option>
                                                    <option value="NL" @php if(isset($form) && $form->country == "NL") echo "selected" @endphp>Netherlands</option>
                                                    <option value="NC" @php if(isset($form) && $form->country == "NC") echo "selected" @endphp>New Caledonia</option>
                                                    <option value="NZ" @php if(isset($form) && $form->country == "NZ") echo "selected" @endphp>New Zealand</option>
                                                    <option value="NI" @php if(isset($form) && $form->country == "NI") echo "selected" @endphp>Nicaragua</option>
                                                    <option value="NE" @php if(isset($form) && $form->country == "NE") echo "selected" @endphp>Niger</option>
                                                    <option value="NG" @php if(isset($form) && $form->country == "NG") echo "selected" @endphp>Nigeria</option>
                                                    <option value="NU" @php if(isset($form) && $form->country == "NU") echo "selected" @endphp>Niue</option>
                                                    <option value="NF" @php if(isset($form) && $form->country == "NF") echo "selected" @endphp>Norfolk Island</option>
                                                    <option value="MP" @php if(isset($form) && $form->country == "MP") echo "selected" @endphp>Northern Mariana Islands</option>
                                                    <option value="NO" @php if(isset($form) && $form->country == "NO") echo "selected" @endphp>Norway</option>
                                                    <option value="OM" @php if(isset($form) && $form->country == "OM") echo "selected" @endphp>Oman</option>
                                                    <option value="PK" @php if(isset($form) && $form->country == "PK") echo "selected" @endphp>Pakistan</option>
                                                    <option value="PW" @php if(isset($form) && $form->country == "PW") echo "selected" @endphp>Palau</option>
                                                    <option value="PS" @php if(isset($form) && $form->country == "PS") echo "selected" @endphp>Palestinian Territory, Occupied</option>
                                                    <option value="PA" @php if(isset($form) && $form->country == "PA") echo "selected" @endphp>Panama</option>
                                                    <option value="PG" @php if(isset($form) && $form->country == "PG") echo "selected" @endphp>Papua New Guinea</option>
                                                    <option value="PY" @php if(isset($form) && $form->country == "PY") echo "selected" @endphp>Paraguay</option>
                                                    <option value="PE" @php if(isset($form) && $form->country == "PE") echo "selected" @endphp>Peru</option>
                                                    <option value="PH" @php if(isset($form) && $form->country == "PH") echo "selected" @endphp>Philippines</option>
                                                    <option value="PN" @php if(isset($form) && $form->country == "PN") echo "selected" @endphp>Pitcairn</option>
                                                    <option value="PL" @php if(isset($form) && $form->country == "PL") echo "selected" @endphp>Poland</option>
                                                    <option value="PT" @php if(isset($form) && $form->country == "PT") echo "selected" @endphp>Portugal</option>
                                                    <option value="PR" @php if(isset($form) && $form->country == "PR") echo "selected" @endphp>Puerto Rico</option>
                                                    <option value="QA" @php if(isset($form) && $form->country == "QA") echo "selected" @endphp>Qatar</option>
                                                    <option value="RE" @php if(isset($form) && $form->country == "RE") echo "selected" @endphp>Réunion</option>
                                                    <option value="RO" @php if(isset($form) && $form->country == "RO") echo "selected" @endphp>Romania</option>
                                                    <option value="RU" @php if(isset($form) && $form->country == "RU") echo "selected" @endphp>Russian Federation</option>
                                                    <option value="RW" @php if(isset($form) && $form->country == "RW") echo "selected" @endphp>Rwanda</option>
                                                    <option value="BL" @php if(isset($form) && $form->country == "BL") echo "selected" @endphp>Saint Barthélemy</option>
                                                    <option value="SH" @php if(isset($form) && $form->country == "SH") echo "selected" @endphp>Saint Helena, Ascension and Tristan da Cunha</option>
                                                    <option value="KN" @php if(isset($form) && $form->country == "KN") echo "selected" @endphp>Saint Kitts and Nevis</option>
                                                    <option value="LC" @php if(isset($form) && $form->country == "LC") echo "selected" @endphp>Saint Lucia</option>
                                                    <option value="MF" @php if(isset($form) && $form->country == "MF") echo "selected" @endphp>Saint Martin (French part)</option>
                                                    <option value="PM" @php if(isset($form) && $form->country == "PM") echo "selected" @endphp>Saint Pierre and Miquelon</option>
                                                    <option value="VC" @php if(isset($form) && $form->country == "VC") echo "selected" @endphp>Saint Vincent and the Grenadines</option>
                                                    <option value="WS" @php if(isset($form) && $form->country == "WS") echo "selected" @endphp>Samoa</option>
                                                    <option value="SM" @php if(isset($form) && $form->country == "SM") echo "selected" @endphp>San Marino</option>
                                                    <option value="ST" @php if(isset($form) && $form->country == "ST") echo "selected" @endphp>Sao Tome and Principe</option>
                                                    <option value="SA" @php if(isset($form) && $form->country == "SA") echo "selected" @endphp>Saudi Arabia</option>
                                                    <option value="SN" @php if(isset($form) && $form->country == "SN") echo "selected" @endphp>Senegal</option>
                                                    <option value="RS" @php if(isset($form) && $form->country == "RS") echo "selected" @endphp>Serbia</option>
                                                    <option value="SC" @php if(isset($form) && $form->country == "SC") echo "selected" @endphp>Seychelles</option>
                                                    <option value="SL" @php if(isset($form) && $form->country == "SL") echo "selected" @endphp>Sierra Leone</option>
                                                    <option value="SG" @php if(isset($form) && $form->country == "SG") echo "selected" @endphp>Singapore</option>
                                                    <option value="SX" @php if(isset($form) && $form->country == "SX") echo "selected" @endphp>Sint Maarten (Dutch part)</option>
                                                    <option value="SK" @php if(isset($form) && $form->country == "SK") echo "selected" @endphp>Slovakia</option>
                                                    <option value="SI" @php if(isset($form) && $form->country == "SI") echo "selected" @endphp>Slovenia</option>
                                                    <option value="SB" @php if(isset($form) && $form->country == "SB") echo "selected" @endphp>Solomon Islands</option>
                                                    <option value="SO" @php if(isset($form) && $form->country == "SO") echo "selected" @endphp>Somalia</option>
                                                    <option value="ZA" @php if(isset($form) && $form->country == "ZA") echo "selected" @endphp>South Africa</option>
                                                    <option value="GS" @php if(isset($form) && $form->country == "GS") echo "selected" @endphp>South Georgia and the South Sandwich Islands</option>
                                                    <option value="SS" @php if(isset($form) && $form->country == "SS") echo "selected" @endphp>South Sudan</option>
                                                    <option value="ES" @php if(isset($form) && $form->country == "ES") echo "selected" @endphp>Spain</option>
                                                    <option value="LK" @php if(isset($form) && $form->country == "LK") echo "selected" @endphp>Sri Lanka</option>
                                                    <option value="SD" @php if(isset($form) && $form->country == "SD") echo "selected" @endphp>Sudan</option>
                                                    <option value="SR" @php if(isset($form) && $form->country == "SR") echo "selected" @endphp>Suriname</option>
                                                    <option value="SJ" @php if(isset($form) && $form->country == "SJ") echo "selected" @endphp>Svalbard and Jan Mayen</option>
                                                    <option value="SZ" @php if(isset($form) && $form->country == "SZ") echo "selected" @endphp>Swaziland</option>
                                                    <option value="SE" @php if(isset($form) && $form->country == "SE") echo "selected" @endphp>Sweden</option>
                                                    <option value="CH" @php if(isset($form) && $form->country == "CH") echo "selected" @endphp>Switzerland</option>
                                                    <option value="SY" @php if(isset($form) && $form->country == "SY") echo "selected" @endphp>Syrian Arab Republic</option>
                                                    <option value="TW" @php if(isset($form) && $form->country == "TW") echo "selected" @endphp>Taiwan, Province of China</option>
                                                    <option value="TJ" @php if(isset($form) && $form->country == "TJ") echo "selected" @endphp>Tajikistan</option>
                                                    <option value="TZ" @php if(isset($form) && $form->country == "TZ") echo "selected" @endphp>Tanzania, United Republic of</option>
                                                    <option value="TH" @php if(isset($form) && $form->country == "TH") echo "selected" @endphp>Thailand</option>
                                                    <option value="TL" @php if(isset($form) && $form->country == "TL") echo "selected" @endphp>Timor-Leste</option>
                                                    <option value="TG" @php if(isset($form) && $form->country == "TG") echo "selected" @endphp>Togo</option>
                                                    <option value="TK" @php if(isset($form) && $form->country == "TK") echo "selected" @endphp>Tokelau</option>
                                                    <option value="TO" @php if(isset($form) && $form->country == "TO") echo "selected" @endphp>Tonga</option>
                                                    <option value="TT" @php if(isset($form) && $form->country == "TT") echo "selected" @endphp>Trinidad and Tobago</option>
                                                    <option value="TN" @php if(isset($form) && $form->country == "TN") echo "selected" @endphp>Tunisia</option>
                                                    <option value="TR" @php if(isset($form) && $form->country == "TR") echo "selected" @endphp>Turkey</option>
                                                    <option value="TM" @php if(isset($form) && $form->country == "TM") echo "selected" @endphp>Turkmenistan</option>
                                                    <option value="TC" @php if(isset($form) && $form->country == "TC") echo "selected" @endphp>Turks and Caicos Islands</option>
                                                    <option value="TV" @php if(isset($form) && $form->country == "TV") echo "selected" @endphp>Tuvalu</option>
                                                    <option value="UG" @php if(isset($form) && $form->country == "UG") echo "selected" @endphp>Uganda</option>
                                                    <option value="UA" @php if(isset($form) && $form->country == "UA") echo "selected" @endphp>Ukraine</option>
                                                    <option value="AE" @php if(isset($form) && $form->country == "AE") echo "selected" @endphp>United Arab Emirates</option>
                                                    <option value="GB" @php if(isset($form) && $form->country == "GB") echo "selected" @endphp>United Kingdom</option>
                                                    <option value="US" @php if(isset($form) && $form->country == "US") echo "selected"; elseif(!isset($form)) echo "selected"; @endphp>United States</option>
                                                    <option value="UM" @php if(isset($form) && $form->country == "UM") echo "selected" @endphp>United States Minor Outlying Islands</option>
                                                    <option value="UY" @php if(isset($form) && $form->country == "UY") echo "selected" @endphp>Uruguay</option>
                                                    <option value="UZ" @php if(isset($form) && $form->country == "UZ") echo "selected" @endphp>Uzbekistan</option>
                                                    <option value="VU" @php if(isset($form) && $form->country == "VU") echo "selected" @endphp>Vanuatu</option>
                                                    <option value="VE" @php if(isset($form) && $form->country == "VE") echo "selected" @endphp>Venezuela, Bolivarian Republic of</option>
                                                    <option value="VN" @php if(isset($form) && $form->country == "VN") echo "selected" @endphp>Viet Nam</option>
                                                    <option value="VG" @php if(isset($form) && $form->country == "VG") echo "selected" @endphp>Virgin Islands, British</option>
                                                    <option value="VI" @php if(isset($form) && $form->country == "VI") echo "selected" @endphp>Virgin Islands, U.S.</option>
                                                    <option value="WF" @php if(isset($form) && $form->country == "WF") echo "selected" @endphp>Wallis and Futuna</option>
                                                    <option value="EH" @php if(isset($form) && $form->country == "EH") echo "selected" @endphp>Western Sahara</option>
                                                    <option value="YE" @php if(isset($form) && $form->country == "YE") echo "selected" @endphp>Yemen</option>
                                                    <option value="ZM" @php if(isset($form) && $form->country == "ZM") echo "selected" @endphp>Zambia</option>
                                                    <option value="ZW" @php if(isset($form) && $form->country == "ZW") echo "selected" @endphp>Zimbabwe</option>
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
                                                    <option value="{{$type->id}}" @php if(isset($form) && $form->current_capital_raise_structure == $type->id) echo "selected" @endphp>{{$type->type}}</option>
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
                                                    <option value="{{$ist->id}}" @php if(isset($form) && $form->investment_stage == $ist->id) echo "selected" @endphp>{{$ist->type}}</option>
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
                                                    <option value="{{$sector->id}}" @php if(isset($form) && $form->sector == $sector->id) echo "selected" @endphp>{{$sector->type}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    
                                    </div>

                                    <h4>How much capacity is available currently?</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="raising_capital"> How much capital are you raising currently? <span class="danger">*</span> 
                                                </label>
                                                <input type="text" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="raising_capital" name="raising_capital" required  value="@php if(isset($form)) echo $form->raising_capital; @endphp">  
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="investment_size"> How much capacity is available currently? <span class="danger">*</span></label>
                                                
                                                <input type="text" class="form-control required mask-money" data-inputmask="'alias': 'currency'" name="investment_size_val" id="investment_size_val" required value="@php if(isset($form)) echo $form->investment_size; @endphp">
                                                
                                                <input type="hidden" name="investment_size" id="investment_size">
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
                                                <input type="date" class="form-control required" id="company_found_date" name="company_found_date" required value="@php if(isset($form)) echo $form->company_found_date; @endphp"> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="company_desc"> Brief description of company and the problem the company aims to solve : <span class="danger">*</span> 
                                                </label>
                                                <textarea name="company_desc" id="company_desc" class="form-control required" cols=3>@php if(isset($form)) echo $form->company_desc; @endphp</textarea required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="products_service"> Products/Services : <span class="danger">*</span> 
                                                </label>

                                                <textarea name="products_service" id="products_service" class="form-control required" cols=3>@php if(isset($form)) echo $form->products_service; @endphp</textarea required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="products_service_desc"> Brief description of product(s)/service(s) offered and price point : <span class="danger">*</span> 
                                                </label>
                                                <textarea name="products_service_desc" id="products_service_desc" class="form-control required" cols=3 required>@php if(isset($form)) echo $form->products_service_desc; @endphp</textarea>
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
                                                    <option value="" @php if(!isset($form) || !isset($form->bpatent)) echo "selected"; @endphp>Select</option>
                                                    <option value="0" @php if(isset($form) && $form->bpatent =="0") echo "selected"; @endphp>No</option>
                                                    <option value="1" @php if(isset($form) && $form->bpatent =="1") echo "selected"; @endphp>Yes</option>
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
                                                <textarea name="patent_desc" id="patent_desc" class="form-control" cols=3>@php if(isset($form)) echo $form->patent_desc; @endphp</textarea> 
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="patent_status"> Patent Status :  
                                                </label>
                                                <textarea name="patent_status" id="patent_status" class="form-control" cols=3>@php if(isset($form)) echo $form->patent_status; @endphp</textarea> 
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="date_field"> Date Filed :  
                                                </label>
                                                <input name="date_field" id="date_field" class="form-control" type="text" value="@php if(isset($form)) echo $form->date_field; @endphp">
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
                                                    <option value="" @php if(!isset($form) || !isset($form->prior_exp)) echo "selected"; @endphp>Select</option>
                                                    <option value="0" @php if(isset($form) && $form->prior_exp =="0") echo "selected"; @endphp>No</option>
                                                    <option value="1" @php if(isset($form) && $form->prior_exp =="1") echo "selected"; @endphp>Yes</option>
                                                </select> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" id="prior_exp_div" style="display: none;">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="length_time"> Length of Time in Industry : 
                                                </label>
                                                <input type="text" class="form-control" id="length_time" name="length_time" value="@php if(isset($form)) echo $form->length_time; @endphp" maxlength="255"> 
                                            </div>
                                        </div>
                                    

                                    
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="prior_company_role"> Prior Companies and Roles : 
                                                </label>
                                                <input type="text" class="form-control" id="prior_company_role" name="prior_company_role" value="@php if(isset($form)) echo $form->prior_company_role; @endphp" maxlength="255"> 
                                            </div>
                                        </div>
                                    

                                    
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="outcome_detail"> Please provide details of outcome :  
                                                </label>
                                                <textarea name="outcome_detail" id="outcome_detail" class="form-control " cols=3>@php if(isset($form)) echo $form->outcome_detail; @endphp</textarea> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="additional_member"> Are there additional members of the Management Team? <span class="danger">*</span> 
                                                </label>
                                                <select name="additional_member" class="form-control required" id="additional_member" required>
                                                    <option value="" @php if(!isset($form) || !isset($form->additional_member)) echo "selected"; @endphp>Select</option>
                                                    <option value="0" @php if(isset($form) && $form->additional_member =="0") echo "selected"; @endphp>No</option>
                                                    <option value="1" @php if(isset($form) && $form->additional_member =="1") echo "selected"; @endphp>Yes</option>
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
                                                <input type="text" class="form-control" id="additional_member_name" name="additional_member_name" value="@php if(isset($form)) echo $form->additional_member_name; @endphp" maxlength="255"> 
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="members_bio_pior_exp"> Team Member Biography and Prior Experience :  
                                                </label>
                                                <textarea name="members_bio_pior_exp" id="members_bio_pior_exp" class="form-control" cols=3>@php if(isset($form)) echo $form->members_bio_pior_exp; @endphp</textarea> 
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="brestrict_convenant"> Are restrictive covenants in place to prevent management team from joining competitor, soliciting clients, etc? <span class="danger">*</span> 
                                                </label>
                                                <select name="brestrict_convenant" class="form-control" id="brestrict_convenant">
                                                    <option value="" @php if(!isset($form) || !isset($form->brestrict_convenant)) echo "selected"; @endphp>Select</option>
                                                    <option value="0" @php if(isset($form) && $form->brestrict_convenant =="0") echo "selected"; @endphp>No</option>
                                                    <option value="1" @php if(isset($form) && $form->brestrict_convenant =="1") echo "selected"; @endphp>Yes</option>
                                                </select> 
                                            </div>
                                        </div>

                                        <div class="col-md-12" id="restrict_convenant_div">
                                            <div class="form-group">
                                                <label for="restrict_convenant_desc"> Please describe restrictive covenants in place :  
                                                </label>
                                                <textarea name="restrict_convenant_desc" id="restrict_convenant_desc" class="form-control" cols=3>@php if(isset($form)) echo $form->restrict_convenant_desc; @endphp</textarea> 
                                            </div>
                                        </div>
                                    </div>

                                    <h4>FINANCIAL INFORMATION</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="company_stage">Company Stage : <span class="danger">*</span></label>
                                                <select name="company_stage" id="company_stage" class="form-control" required="">
                                                    <option value="" @php if(!isset($form) || !isset($form->company_stage)) echo "selected"; @endphp>Select</option>
                                                    <option value="1" @php if(isset($form) && $form->company_stage =="1") echo "selected"; @endphp>Pre-Revenue/Seed</option>
                                                    <option value="2" @php if(isset($form) && $form->company_stage =="2") echo "selected"; @endphp>Early Stage/Venture Capital</option>
                                                    <option value="3" @php if(isset($form) && $form->company_stage =="3") echo "selected"; @endphp>Private Equity</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="company_stage_3">

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
                                            <div class="col-md-12">
                                                <h6>Current Year</h6>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="cur_total_revenue"> Current Year Total Revenue :  <span class="danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control  mask-money" data-inputmask="'alias': 'currency'" id="cur_total_revenue" name="cur_total_revenue"  value="@php if(isset($form)) echo $form->cur_total_revenue; @endphp"> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="cur_total_expense"> Current Year Total Expenses :  <span class="danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control  mask-money" data-inputmask="'alias': 'currency'" id="cur_total_expense" name="cur_total_expense"  value="@php if(isset($form)) echo $form->cur_total_expense; @endphp"> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="cur_revenue_expense"> Current Year Total Revenue - Total Expense :  <span class="danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control  mask-money" data-inputmask="'alias': 'currency'" id="cur_revenue_expense" name="cur_revenue_expense" readonly="" value="@php if(isset($form)) echo $form->cur_revenue_expense; @endphp"> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6>Next Year</h6>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="next_total_revenue"> Next Year Projected Total Revenue :  <span class="danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control  mask-money" data-inputmask="'alias': 'currency'" id="next_total_revenue" name="next_total_revenue"  value="@php if(isset($form)) echo $form->next_total_revenue; @endphp"> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="next_total_expense"> Next Year Projected Total Expenses :  <span class="danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control  mask-money" data-inputmask="'alias': 'currency'" id="next_total_expense" name="next_total_expense"  value="@php if(isset($form)) echo $form->next_total_expense; @endphp"> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="next_revenue_expense"> Next Year Total Revenue - Total Expense :  <span class="danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control  mask-money" data-inputmask="'alias': 'currency'" id="next_revenue_expense" name="next_revenue_expense" readonly="" value="@php if(isset($form)) echo $form->next_revenue_expense; @endphp"> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    
                                    <div id="company_stage_12">
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
                                            <div class="col-md-12">
                                                <h6>Current Year</h6>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="cur_total_revenue"> Current Year Total Revenue :  <span class="danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control  mask-money" data-inputmask="'alias': 'currency'" id="cur_total_revenue" name="cur_total_revenue"  value="@php if(isset($form)) echo $form->cur_total_revenue; @endphp"> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="cur_total_expense"> Current Year Total Expenses :  <span class="danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control  mask-money" data-inputmask="'alias': 'currency'" id="cur_total_expense" name="cur_total_expense"  value="@php if(isset($form)) echo $form->cur_total_expense; @endphp"> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="cur_revenue_expense"> Current Year Total Revenue - Total Expense :  <span class="danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control  mask-money" data-inputmask="'alias': 'currency'" id="cur_revenue_expense" name="cur_revenue_expense" readonly="" value="@php if(isset($form)) echo $form->cur_revenue_expense; @endphp"> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6>Next Year</h6>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="next_total_revenue"> Next Year Projected Total Revenue :  <span class="danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control  mask-money" data-inputmask="'alias': 'currency'" id="next_total_revenue" name="next_total_revenue"  value="@php if(isset($form)) echo $form->next_total_revenue; @endphp"> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="next_total_expense"> Next Year Projected Total Expenses :  <span class="danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control  mask-money" data-inputmask="'alias': 'currency'" id="next_total_expense" name="next_total_expense"  value="@php if(isset($form)) echo $form->next_total_expense; @endphp"> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="next_revenue_expense"> Next Year Total Revenue - Total Expense :  <span class="danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control  mask-money" data-inputmask="'alias': 'currency'" id="next_revenue_expense" name="next_revenue_expense" readonly="" value="@php if(isset($form)) echo $form->next_revenue_expense; @endphp"> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="expected_cash_flow_break_date">Expected Cash Flow Break Even Date :  <span class="danger">*</span></label>
                                                    <input type="date" name="expected_cash_flow_break_date" id="expected_cash_flow_break_date" class="form-control "  value="@php if(isset($form)) echo $form->expected_cash_flow_break_date; @endphp">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="percent_cur_revenue">What percent of current revenue is contractually recurring (vs. non-recurring)? <span class="danger">*</span></label>
                                                <input type="text" name="percent_cur_revenue" class="form-control required mask-percent" id="percent_cur_revenue" data-inputmask="'alias': 'percentage'"  value="@php if(isset($form)) echo $form->percent_cur_revenue; else echo '0'; @endphp" maxlength="255" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cash_balance">Cash Balance of Company today :  <span class="danger">*</span></label>
                                                <input type="text" name="cash_balance" class="form-control required  mask-money" data-inputmask="'alias': 'currency'" id="cash_balance"  value="@php if(isset($form)) echo $form->cash_balance; @endphp" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="expect_change_over">How do you expect this structure to change over time? Please describe :  <span class="danger">*</span></label>
                                                <textarea class="form-control required" name="expect_change_over" id="expect_change_over" required>@php if(isset($form)) echo $form->expect_change_over; @endphp</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="bhave_debt">Do you currently have debt?  <span class="danger">*</span></label>
                                                <select class="form-control required" name="bhave_debt" id="bhave_debt" required>
                                                    <option value="" @php if(!isset($form) || !isset($form->bhave_debt)) echo "selected"; @endphp>Select</option>
                                                    <option value="0" @php if(isset($form) && $form->bhave_debt =="0") echo "selected"; @endphp>No</option>
                                                    <option value="1" @php if(isset($form) && $form->bhave_debt =="1") echo "selected"; @endphp>Yes</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12" style="display: none;" id="debt_detail_div">
                                            <h6>Debt Details</h6>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="debt_creditor">Creditor</label>
                                                        <input type="text" name="debt_creditor" class="form-control" id="debt_creditor" value="@php if(isset($form)) echo $form->debt_creditor; @endphp" maxlength="255">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="debt_amount">Amount</label>
                                                        <input type="text" name="debt_amount" class="form-control mask-money" data-inputmask="'alias': 'currency'" id="debt_amount" value="@php if(isset($form)) echo $form->debt_amount; @endphp">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="type_debt_rate_maturity_term">Type of Debt, Rate, Maturity, & Payment Terms</label>
                                                        <input type="text" name="type_debt_rate_maturity_term" class="form-control" id="type_debt_rate_maturity_term" value="@php if(isset($form)) echo $form->type_debt_rate_maturity_term; @endphp" maxlength="255">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h4>COMPETITORS</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="primary_competitor">Primary Competitors :  <span class="danger">*</span></label>
                                                <input type="text" name="primary_competitor" class="form-control required" id="primary_competitor" required value="@php if(isset($form)) echo $form->primary_competitor; @endphp" maxlength="255">
                                            </div>
                                        </div> 

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="differ_desc_competitor">Describe how you are differentiated from your competitors :  <span class="danger">*</span></label>
                                                <textarea name="differ_desc_competitor" id="differ_desc_competitor" class="form-control required" cols=3 required>@php if(isset($form)) echo $form->differ_desc_competitor; @endphp</textarea>
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
                                                    <option value="" @php if(!isset($form) || !isset($form->bcur_contracts_customer)) echo "selected"; @endphp>Select</option>
                                                    <option value="0" @php if(isset($form) && $form->bcur_contracts_customer =="0") echo "selected"; @endphp>No</option>
                                                    <option value="1" @php if(isset($form) && $form->bcur_contracts_customer =="1") echo "selected"; @endphp>Yes</option>
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
                                                        <input type="number" name="num_customer" class="form-control" id="num_customer" value="@php if(isset($form)) echo $form->num_customer; @endphp">
                                                    </div>
                                                </div>  

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="revenue_avg_customer">Average contract revenue per customer</label>
                                                        <input type="text" name="revenue_avg_customer" class="form-control mask-money" data-inputmask="'alias': 'currency'" id="revenue_avg_customer" value="@php if(isset($form)) echo $form->revenue_avg_customer; @endphp">
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
                                                                <input type="text" name="customer_name_1" class="form-control" id="customer_name_1" value="@php if(isset($form)) echo $form->customer_name_1; @endphp" maxlength="255">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="percent_revenue_1">Percentage of Revenue</label>
                                                                <input type="text" name="percent_revenue_1" class="form-control mask-percent" id="percent_revenue_1" data-inputmask="'alias': 'percentage'" value="@php if(isset($form)) echo $form->percent_revenue_1; @endphp">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="customer_name_2">Customer Name</label>
                                                                <input type="text" name="customer_name_2" class="form-control" id="customer_name_2" value="@php if(isset($form)) echo $form->customer_name_2; @endphp" maxlength="255">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="percent_revenue_2">Percentage of Revenue</label>
                                                                <input type="text" name="percent_revenue_2" class="form-control mask-percent" id="percent_revenue_2" data-inputmask="'alias': 'percentage'" value="@php if(isset($form)) echo $form->percent_revenue_2; @endphp">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="customer_name_3">Customer Name</label>
                                                                <input type="text" name="customer_name_3" class="form-control" id="customer_name_3" value="@php if(isset($form)) echo $form->customer_name_3; @endphp" maxlength="255">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="percent_revenue_3">Percentage of Revenue</label>
                                                                <input type="text" name="percent_revenue_3" class="form-control mask-percent" id="percent_revenue_3" data-inputmask="'alias': 'percentage'" value="@php if(isset($form)) echo $form->percent_revenue_3; @endphp">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="customer_name_4">Customer Name</label>
                                                                <input type="text" name="customer_name_4" class="form-control" id="customer_name_4" value="@php if(isset($form)) echo $form->customer_name_4; @endphp" maxlength="255">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="percent_revenue_4">Percentage of Revenue</label>
                                                                <input type="text" name="percent_revenue_4" class="form-control mask-percent" id="percent_revenue_4" data-inputmask="'alias': 'percentage'" value="@php if(isset($form)) echo $form->percent_revenue_4; @endphp">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="customer_name_5">Customer Name</label>
                                                                <input type="text" name="customer_name_5" class="form-control" id="customer_name_5" value="@php if(isset($form)) echo $form->customer_name_5; @endphp" maxlength="255">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="percent_revenue_5">Percentage of Revenue</label>
                                                                <input type="text" name="percent_revenue_5" class="form-control mask-percent" id="percent_revenue_5" data-inputmask="'alias': 'percentage'" value="@php if(isset($form)) echo $form->percent_revenue_5; @endphp">
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
                                                <input type="text" name="contract_duration" class="form-control required" id="contract_duration" required value="@php if(isset($form)) echo $form->contract_duration; @endphp" maxlength="255">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cancellation_fee">Cancellation Fee :  <span class="danger">*</span></label>
                                                <input type="text" name="cancellation_fee" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="cancellation_fee" required value="@php if(isset($form)) echo $form->cancellation_fee; @endphp" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="bcontract_autonew">Do the contracts auto-renew?  <span class="danger">*</span></label>
                                                <select name="bcontract_autonew" class="form-control required" id="bcontract_autonew" required>
                                                    <option value="" @php if(!isset($form) || !isset($form->bcontract_autonew)) echo "selected"; @endphp>Select</option>
                                                    <option value="0" @php if(isset($form) && $form->bcontract_autonew =="0") echo "selected"; @endphp>No</option>
                                                    <option value="1" @php if(isset($form) && $form->bcontract_autonew =="1") echo "selected"; @endphp>Yes</option>
                                                </select> 
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projected_num_client">Projected number of clients/contracts for the year :  <span class="danger">*</span></label>
                                                <input type="text" name="projected_num_client" class="form-control required mask-numeric"  id="projected_num_client" data-inputmask="'alias': 'numeric'"  required value="@php if(isset($form)) echo $form->projected_num_client; @endphp" maxlength="255">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="client_acq_cost">Client Acquisition Cost :  <span class="danger">*</span></label>
                                                <input type="text" name="client_acq_cost" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="client_acq_cost" required value="@php if(isset($form)) echo $form->client_acq_cost; @endphp">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lifetime_val">Lifetime Value of Customer :  <span class="danger">*</span></label>
                                                <input type="text" name="lifetime_val" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="lifetime_val" required value="@php if(isset($form)) echo $form->lifetime_val; @endphp">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="desc_marketing">Briefly describe how you are marketing today :  <span class="danger">*</span></label>
                                                <textarea name="desc_marketing" id="desc_marketing" class="form-control required" cols=3 required>@php if(isset($form)) echo $form->desc_marketing; @endphp</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="desc_sales_strategy">Briefly describe your current sales strategy today :  <span class="danger">*</span></label>
                                                <textarea name="desc_sales_strategy" id="desc_sales_strategy" class="form-control required" cols=3 required>@php if(isset($form)) echo $form->desc_sales_strategy; @endphp</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <h4>CAPITAL</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="capital_amt_began">Amount of Capital Business Began With :  <span class="danger">*</span></label>
                                                <input type="text" name="capital_amt_began" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="capital_amt_began" required value="@php if(isset($form)) echo $form->capital_amt_began; @endphp">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="capital_raise_timing">What is the timing of this capital raise?  <span class="danger">*</span></label>
                                                <input type="text" name="capital_raise_timing" class="form-control required" id="capital_raise_timing" required value="@php if(isset($form)) echo $form->capital_raise_timing; @endphp" maxlength="255">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="expected_close_date">Expected Close Date :  <span class="danger">*</span></label>
                                                <input type="date" name="expected_close_date" class="form-control required" id="expected_close_date" required value="@php if(isset($form)) echo $form->expected_close_date; @endphp">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="capital_used_for">What will the capital be used for?  <span class="danger">*</span></label>
                                                <input type="text" name="capital_used_for" class="form-control required" id="capital_used_for" required value="@php if(isset($form)) echo $form->capital_used_for; @endphp" maxlength="255">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="bprevious_capital_raise">Have you had previous capital raises?  <span class="danger">*</span></label>
                                                <select name="bprevious_capital_raise" class="form-control required" id="bprevious_capital_raise" required>
                                                    <option value="" @php if(!isset($form) || !isset($form->bprevious_capital_raise)) echo "selected"; @endphp>Select</option>
                                                    <option value="0" @php if(isset($form) && $form->bprevious_capital_raise =="0") echo "selected"; @endphp>No</option>
                                                    <option value="1" @php if(isset($form) && $form->bprevious_capital_raise =="1") echo "selected"; @endphp>Yes</option>
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
                                                        <input type="date" name="prior_raise_date" class="form-control" id="prior_raise_date" value="@php if(isset($form)) echo $form->prior_raise_date; @endphp">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="prior_raised_amount">Amount Raised</label>
                                                        <input type="text" name="prior_raised_amount" class="form-control mask-money" data-inputmask="'alias': 'currency'" id="prior_raised_amount" value="@php if(isset($form)) echo $form->prior_raised_amount; @endphp">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="prior_investors">Previous Investors</label>
                                                        <input type="text" name="prior_investors" class="form-control" id="prior_investors" value="@php if(isset($form)) echo $form->prior_investors; @endphp" maxlength="255">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="prior_valuation">Valuation</label>
                                                        <input type="text" name="prior_valuation" class="form-control mask-money" data-inputmask="'alias': 'currency'" id="prior_valuation" value="@php if(isset($form)) echo $form->prior_valuation; @endphp">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h6>Founder Capital Committed</h6>
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="bfounder_capital_commit">Does the founder have personal capital committed?  <span class="danger">*</span></label>
                                                        <select name="bfounder_capital_commit" id="bfounder_capital_commit" class="form-control required" required>
                                                            <option value="" @php if(!isset($form) || !isset($form->bfounder_capital_commit)) echo "selected"; @endphp>Select</option>
                                                            <option value="0" @php if(isset($form) && $form->bfounder_capital_commit =="0") echo "selected"; @endphp>No</option>
                                                            <option value="1" @php if(isset($form) && $form->bfounder_capital_commit =="1") echo "selected"; @endphp>Yes</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6" id="founder_capital_amount_div" style="display: none;">
                                                    <div class="form-group">
                                                        <label for="founder_capital_amount">How much</label>
                                                        <input type="text" name="founder_capital_amount" class="form-control mask-money" data-inputmask="'alias': 'currency'" id="founder_capital_amount" value="@php if(isset($form)) echo $form->founder_capital_amount; @endphp">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h6>Future Capital Needs</h6>
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="bexpect_future_raise">Do you expect any future capital raises?  <span class="danger">*</span></label>
                                                        <select name="bexpect_future_raise" id="bexpect_future_raise" class="form-control required" required>
                                                            <option value="" @php if(!isset($form) || !isset($form->bexpect_future_raise)) echo "selected"; @endphp>Select</option>
                                                            <option value="0" @php if(isset($form) && $form->bexpect_future_raise =="0") echo "selected"; @endphp>No</option>
                                                            <option value="1" @php if(isset($form) && $form->bexpect_future_raise =="1") echo "selected"; @endphp>Yes</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="expect_future_raise_div" style="display: none;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="expect_future_raise_amount">How much</label>
                                                            <input type="text" name="expect_future_raise_amount" class="form-control mask-money" data-inputmask="'alias': 'currency'" id="expect_future_raise_amount" value="@php if(isset($form)) echo $form->expect_future_raise_amount; @endphp">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="estimated_timing_future_capital">Estimated timing of future capital raises :  </label>
                                                            <input type="text" name="estimated_timing_future_capital" class="form-control " id="estimated_timing_future_capital"  value="@php if(isset($form)) echo $form->estimated_timing_future_capital; @endphp" maxlength="255">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="use_additional_fund">Use of additional funds :  </label>
                                                            <input type="text" name="use_additional_fund" class="form-control " id="use_additional_fund"  value="@php if(isset($form)) echo $form->use_additional_fund; @endphp" maxlength="255">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div id="company_stage_2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="bprevious_investor_reinvest">Did previous investors reinvest this round?  <span class="danger">*</span></label>
                                                    <select name="bprevious_investor_reinvest" id="bprevious_investor_reinvest" class="form-control " >
                                                        <option value="" @php if(!isset($form) || !isset($form->bprevious_investor_reinvest)) echo "selected"; @endphp>Select</option>
                                                        <option value="0" @php if(isset($form) && $form->bprevious_investor_reinvest =="0") echo "selected"; @endphp>No</option>
                                                        <option value="1" @php if(isset($form) && $form->bprevious_investor_reinvest =="1") echo "selected"; @endphp>Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="row" id="previous_investor_div" style="display: none;">
                                            
                                            <div class="col-md-12">
                                                <h6>Previous investors reinvesting this round</h6>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name_investor">Name of Investor :  <span class="danger">*</span></label>
                                                            <input type="text" name="name_investor" class="form-control " id="name_investor"  value="@php if(isset($form)) echo $form->name_investor; @endphp" maxlength="255">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="amount_committed">Amount Committed :  <span class="danger">*</span></label>
                                                            <input type="text" name="amount_committed" class="form-control  mask-money" data-inputmask="'alias': 'currency'" id="amount_committed"  value="@php if(isset($form)) echo $form->amount_committed; @endphp">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>


                                    <h6>VALUATION</h6>
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="cur_postmoney_valuation">Current Post-Money Valuation :  <span class="danger">*</span></label>
                                                        <input type="text" name="cur_postmoney_valuation" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="cur_postmoney_valuation" required value="@php if(isset($form)) echo $form->cur_postmoney_valuation; @endphp">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="explanation_valuation">Explanation of Valuation :  <span class="danger">*</span></label>
                                                        <input type="text" name="explanation_valuation" class="form-control required" id="explanation_valuation" required value="@php if(isset($form)) echo $form->explanation_valuation; @endphp" maxlength="255">
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
                                                        <input type="text" name="plan_for_growth" class="form-control required" id="plan_for_growth" required value="@php if(isset($form)) echo $form->plan_for_growth; @endphp" maxlength="255">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="bhave_plan_exit_business">Do you plan to exit the business in the future?  <span class="danger">*</span></label>
                                                        <select name="bhave_plan_exit_business" id="bhave_plan_exit_business" class="form-control required" required>
                                                            <option value="" @php if(!isset($form) || !isset($form->bhave_plan_exit_business)) echo "selected"; @endphp>Select</option>
                                                            <option value="0" @php if(isset($form) && $form->bhave_plan_exit_business =="0") echo "selected"; @endphp>No</option>
                                                            <option value="1" @php if(isset($form) && $form->bhave_plan_exit_business =="1") echo "selected"; @endphp>Yes</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6" id="exit_date_div" style="display: none;">
                                                    <div class="form-group">
                                                        <label for="anticipated_exit_date">Anticipated Exit Date</label>
                                                        <input type="date" name="anticipated_exit_date" class="form-control" id="anticipated_exit_date" value="@php if(isset($form)) echo $form->anticipated_exit_date; @endphp">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h6>Exit Strategy</h6>
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exit_strategy">Please describe exit strategy :  <span class="danger">*</span></label>
                                                        <textarea name="exit_strategy" id="exit_strategy" class="form-control required" cols=3 required>@php if(isset($form)) echo $form->exit_strategy; @endphp</textarea>

                                                    </div>
                                                </div>  
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="top_potential_acqu">Top Potential Acquirers :  <span class="danger">*</span></label>
                                                        <input type="text" name="top_potential_acqu" class="form-control required" id="top_potential_acqu" required value="@php if(isset($form)) echo $form->top_potential_acqu; @endphp" maxlength="255">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="revenue_target">Revenue Target :  <span class="danger">*</span></label>
                                                        <input type="text" name="revenue_target" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="revenue_target" required value="@php if(isset($form)) echo $form->revenue_target; @endphp">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="net_income_target">Net Income Target :  <span class="danger">*</span></label>
                                                        <input type="text" name="net_income_target" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="net_income_target" required value="@php if(isset($form)) echo $form->net_income_target; @endphp">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exit_valuation">Exit Valuation :  <span class="danger">*</span></label>
                                                        <input type="text" name="exit_valuation" class="form-control required mask-money" data-inputmask="'alias': 'currency'" id="exit_valuation" required value="@php if(isset($form)) echo $form->exit_valuation; @endphp">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <h6>Please upload all applicable files</h6>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="prior_year_monthly_finacial">Prior Year Monthly Financials</label>
                                                    <input type="file" id="prior_year_monthly_finacial" class="dropify" name="prior_year_monthly_finacial" accept="*" data-max-file-size="40M" required="" @if(isset($form) && $form->prior_year_monthly_finacial) data-default-file="{{asset('assets/dashboard/profile/file/'.$form->prior_year_monthly_finacial)}}" @endif/ >
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="investor_deck">Investor Deck</label>
                                                    <input type="file" id="investor_deck" class="dropify" name="investor_deck" accept="*" data-max-file-size="40M" required="" @if(isset($form) && $form->investor_deck) data-default-file="{{asset('assets/dashboard/profile/file/'.$form->investor_deck)}}" @endif/ >
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="proforma_projections">3 Year Proforma Projections</label>
                                                    <input type="file" id="proforma_projections" class="dropify" name="proforma_projections" accept="*" data-max-file-size="40M" required="" @if(isset($form) && $form->proforma_projections) data-default-file="{{asset('assets/dashboard/profile/file/'.$form->proforma_projections)}}" @endif/ >
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="detailed_cap_table">Detailed Cap Table</label>
                                                    <input type="file" id="detailed_cap_table" class="dropify" name="detailed_cap_table" accept="*" data-max-file-size="40M" required="" @if(isset($form) && $form->detailed_cap_table) data-default-file="{{asset('assets/dashboard/profile/file/'.$form->detailed_cap_table)}}" @endif/ >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" id="submit-btn">Submit</button>
                                    <button type="button" class="btn btn-info waves-effect waves-light" id="save-btn">Save</button>
                                </form>
                            </div>
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
            <footer class="footer">
                © {{date('Y')}} Family Investment Exchange. All Rights Reserved.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
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

    <div id="save-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">YOUR PROGRESS HAS BEEN SAVED.</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Copy your form link:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="@php if(isset($form)) echo route('saved-investment-questionnaire',['code' => $form->code]); @endphp" readonly="">
                                <div class="input-group-append">
                                    <button class="btn btn-info" type="button" id="copy-btn" data-clipboard-text="@php if(isset($form)) echo route('saved-investment-questionnaire',['code' => $form->code]); @endphp" data-clipboard-action="copy"><i class="fa fa-copy"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Send email your link:</label>
                            <div class="input-group">
                                <input type="email" name="linkemail" id="linkemail" class="form-control">
                                <div class="input-group-append">
                                    <button class="btn btn-info" type="button" id="send-btn"><i class="fa fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <span id="status-span"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('assets/dashboard/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('assets/dashboard/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('assets/dashboard/member/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('assets/dashboard/member/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('assets/dashboard/member/js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{asset('assets/dashboard/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- Sweet-Alert  -->
    <script src="{{asset('assets/dashboard/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/sweetalert/jquery.sweet-alert.custom.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('assets/dashboard/member/js/custom.min.js')}}"></script>

    <script type="text/javascript" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
    <script src="{{asset('assets/dashboard/plugins/wizard/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/dashboard/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>

    <script src="{{asset('assets/dashboard/plugins/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/dashboard/plugins/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/dashboard/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>

    <script src="{{asset('assets/dashboard/plugins/dropify/dist/js/dropify.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/dashboard/plugins/multiselect/js/jquery.multi-select.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
    @if(Session::get('msg') && Session::get('status') != 'saved')
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
            window.location.href = "{{route('home')}}";
        });
    </script>
    @endif

    @if(Session::get('status'))
        @if(Session::get('status') == 'saved')
        <script type="text/javascript">
            $("#save-modal").modal('show');
        </script>
        @endif
    @endif

    <script type="text/javascript">
        @if(isset($form))
            @if($form->company_stage == 1)
                $("#company_stage_12").show();
                $("#company_stage_2").hide();
                $("#company_stage_3").hide();
            @elseif($form->company_stage == 2)
                $("#company_stage_12").show();
                $("#company_stage_2").show();
                $("#company_stage_3").hide();
            @elseif($form->company_stage == 3)
                $("#company_stage_12").hide();
                $("#company_stage_2").hide();
                $("#company_stage_3").show();
            @endif
        @endif

        @if(!isset($form) || !isset($form->company_stage))
            $("#company_stage_12").hide();
            $("#company_stage_2").hide();
            $("#company_stage_3").hide();
        @endif

        $( "#company_stage" ).change(function() {
            if($( "#company_stage" ).val() == 1){
                $("#company_stage_12").show();
                $("#company_stage_2").hide();
                $("#company_stage_3").hide();
            }else if($( "#company_stage" ).val() == 2){
                $("#company_stage_12").show();
                $("#company_stage_2").show();
                $("#company_stage_3").hide();
            }else if($( "#company_stage" ).val() == 3){
                $("#company_stage_12").hide();
                $("#company_stage_2").hide();
                $("#company_stage_3").show();
            }else{
                $("#company_stage_12").hide();
                $("#company_stage_2").hide();
                $("#company_stage_3").hide();
            }
        });
    </script>

    <script type="text/javascript">
        $('textarea').keypress(function(event) {
          if (event.which == 13) {
            event.preventDefault();
              var s = $(this).val();
              $(this).val(s+"\n");
          }
        });

        $(".select2").select2();
        $('.dropify').dropify();
        $(".mask-money").inputmask({digits:0, rightAlign:false});
        $(".mask-percent").inputmask({rightAlign:false});
        $(".mask-numeric").inputmask({
            alias: 'numeric',
            digits: 0,
            groupSeparator: '.',
            radixPoint: ',',
            autoGroup: true,
            digits: 0,
            digitsOptional: false,
            placeholder: '0',
            unmaskAsNumber: true,
            autoUnmask: true,
            rightAlign:false});
        $(document).on("click","#save-btn",function(){
            $("#identity").val("save");
            $("#submit-form").submit();
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

        $("#prior_exp").change(function(){
            if($( "#prior_exp" ).val() == 1)
                $("#prior_exp_div").show();
            else $("#prior_exp_div").hide();
        });

        $("#bprevious_investor_reinvest").change(function(){
            if($( "#bprevious_investor_reinvest" ).val() == 1)
                $("#previous_investor_div").show();
            else $("#previous_investor_div").hide();
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

        $("#company_stage_12 .mask-money").bind("paste keyup",function (event) {
           var _this = this;
            // Short pause to wait for paste to complete
            setTimeout( function() {
               $("#company_stage_12 #prev1_revenue_expense").val( Number($("#company_stage_12 #prev1_total_revenue").val().replace(/[^0-9\.-]+/g,"")) - Number($("#company_stage_12 #prev1_total_expense").val().replace(/[^0-9\.-]+/g,"")) );
               $("#company_stage_12 #cur_revenue_expense").val( Number($("#company_stage_12 #cur_total_revenue").val().replace(/[^0-9\.-]+/g,"")) - Number($("#company_stage_12 #cur_total_expense").val().replace(/[^0-9\.-]+/g,"")) );
               $("#company_stage_12 #next_revenue_expense").val( Number($("#company_stage_12 #next_total_revenue").val().replace(/[^0-9\.-]+/g,"")) - Number($("#company_stage_12 #next_total_expense").val().replace(/[^0-9\.-]+/g,"")) );
            }, 100);
        });

        $("#company_stage_3 .mask-money").bind("paste keyup",function (event) {
           var _this = this;
            // Short pause to wait for paste to complete
            setTimeout( function() {
               $("#company_stage_3 #prev1_revenue_expense").val( Number($("#company_stage_3 #prev1_total_revenue").val().replace(/[^0-9\.-]+/g,"")) - Number($("#company_stage_3 #prev1_total_expense").val().replace(/[^0-9\.-]+/g,"")) );
               $("#company_stage_3 #cur_revenue_expense").val( Number($("#company_stage_3 #cur_total_revenue").val().replace(/[^0-9\.-]+/g,"")) - Number($("#company_stage_3 #cur_total_expense").val().replace(/[^0-9\.-]+/g,"")) );
               $("#company_stage_3 #next_revenue_expense").val( Number($("#company_stage_3 #next_total_revenue").val().replace(/[^0-9\.-]+/g,"")) - Number($("#company_stage_3 #next_total_expense").val().replace(/[^0-9\.-]+/g,"")) );
            }, 100);
        });

    </script>

    <script type="text/javascript">

        var clipboard = new ClipboardJS('#copy-btn');

        clipboard.on('success', function (e) {
            $('#copy-btn').html('Copied').attr('disabled', true);
            setTimeout(function () {
                $('#copy-btn').html('<i class=\"fa fa-copy\"></i>').removeAttr('disabled');
            }, 5000);
        });

        $(document).on("click","#send-btn",function(){
            var sendemail = $("#linkemail").val();
            $.ajax({
                    url: '{{route('investment-questionnaire-form-save-link')}}',
                    type: 'POST',
                    data: {
                        '_token' : '{{csrf_token()}}',
                        'email' : sendemail,
                        'type' : 1,
                        'code' : '@php if(isset($form)) echo $form->code; @endphp'
                    },
                    dataType: 'html',
                    success: function (data) {
                       data= jQuery.parseJSON(data);
                        if(data['status']=='ok'){
                            $("#status-span").html(data['content']);
                        }else{
                            $("#status-span").html(data['content']);
                        }
                    },
                    error: function () {
                        alert("Something went wrong!");
                    }
                });
        });

        $("#submit-form").submit(function(){
            var investment_size_val = $("#investment_size_val").val();
            var investment_size = Number(investment_size_val.replace(/[^0-9\.-]+/g,""));
            $("#investment_size").val(investment_size);
        });

        $('#submit-form').on('keyup keypress', function(e) {
          var keyCode = e.keyCode || e.which;
          if (keyCode === 13) { 
            e.preventDefault();
            return false;
          }
        });
    </script>
</body>

</html>
