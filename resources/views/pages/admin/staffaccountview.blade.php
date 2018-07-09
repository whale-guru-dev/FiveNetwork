
@extends('layouts.admin')
@section('admin-css')
<link rel="stylesheet" href="{{asset('assets/dashboard/plugins/dropify/dist/css/dropify.min.css')}}">
@endsection


@section('admin-content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Account setting</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">pages</li>
            <li class="breadcrumb-item active">Account setting</li>
        </ol>
    </div>
</div>
<div class="container-fluid">

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
	            	<div class="row">
                        <div class="col-md-9">
                            <h4 class="m-b-0 text-white">Account setting</h4>
                        </div>
                    </div>
                </div>

	            <div class="card-body">
	                <form class="form-horizontal" role="form" >
	                    <div class="form-body">
	                        <h3 class="box-title">Account setting</h3>
	                        <hr class="m-t-0 m-b-40">
	                        <div class="row">
	                        	<div class="col-md-12">
	                                <div class="form-group row">
	                                    <label class="control-label text-right col-md-4">Profile Photo:</label>
	                                    <div class="col-md-8">
	                                        <img src="{{asset('assets/dashboard/profile/propic/'.$admin->propic)}}" alt="profile photo" width="300" style="background: white;">
	                                    </div>
	                                </div>
	                            </div>	
	                        </div>

	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group row">
	                                    <label class="control-label text-right col-md-4">Username:</label>
	                                    <div class="col-md-8">
	                                        <p class="form-control-static"> {{$admin->username}} </p>
	                                    </div>
	                                </div>
	                            </div>
	                            <!--/span-->
	                        </div>

	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group row">
	                                    <label class="control-label text-right col-md-4">Email:</label>
	                                    <div class="col-md-8">
	                                        <p class="form-control-static"> {{$admin->email}} </p>
	                                    </div>
	                                </div>
	                            </div>
	                            <!--/span-->
	                        </div>

	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group row">
	                                    <label class="control-label text-right col-md-4">First Name:</label>
	                                    <div class="col-md-8">
	                                        <p class="form-control-static"> {{$admin->fName}} </p>
	                                    </div>
	                                </div>
	                            </div>
	                            <!--/span-->
	                        </div>

	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="form-group row">
	                                    <label class="control-label text-right col-md-4">Last Name:</label>
	                                    <div class="col-md-8">
	                                        <p class="form-control-static"> {{$admin->lName}} </p>
	                                    </div>
	                                </div>
	                            </div>
	                            <!--/span-->
	                        </div>
	                    </div>

	                    <div class="form-actions">
	                        <div class="row">
	                            <div class="col-md-12">
	                                <div class="row">
	                                    <div class="col-md-offset-3 col-md-9">
	                                        <button type="button" class="btn btn-info" id="allow-btn" data-toggle="modal" data-target="#edit-staff-modal"> <i class="fa fa-pencil"></i> Edit</button>
	                                    </div>
	                                </div>
	                            </div>

	                        </div>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
</div>


<div id="edit-staff-modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Account</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form class="form-horizontal" action="{{route('admin.edit-staff')}}" method="POST" id="edit-staff-form" enctype="multipart/form-data">
                <div class="modal-body" >
                    @csrf
                    <div class="form-group">
                    	<div class="col-md-12">
                            <label for="input-file-now-custom-1">You can upload your photo</label>
                            <input type="file" id="input-file-now-custom-1" class="dropify" data-default-file="{{asset('assets/dashboard/profile/propic/'.$admin->propic)}}" name="profile_photo"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">UserName</label>
                        <div class="col-md-12">
                            <input type="text" name="username" class="form-control" placeholder="type username" > 
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">First Name</label>
                        <div class="col-md-12">
                            <input type="text" name="fName" class="form-control" placeholder="type first name" > 
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">Last Name</label>
                        <div class="col-md-12">
                            <input type="text" name="lName" class="form-control" placeholder="type last name" > 
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">Email</label>
                        <div class="col-md-12">
                            <input type="email" name="email" class="form-control" placeholder="type email" > 
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">Original Password</label>
                        <div class="col-md-12">
                            <input type="password" name="cur_password" class="form-control" placeholder="type original password">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-12">Password</label>
                        <div class="col-md-12">
                            <input type="password" name="password" class="form-control" minlength="8" placeholder="type new password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">Confirm Password</label>
                        <div class="col-md-12">
                            <input type="password" name="conf_password" class="form-control" minlength="8" placeholder="type confirm password">
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info waves-effect"  id="faq-form-submit-btn">Save</button>
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection

@section('admin-js')
<script src="{{asset('assets/dashboard/plugins/wizard/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/dashboard/plugins/dropify/dist/js/dropify.min.js')}}"></script>
<script type="text/javascript">
    $('.dropify').dropify();
</script>

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
    });
</script>
@endif

@endsection