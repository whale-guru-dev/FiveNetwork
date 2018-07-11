@extends('layouts.admin')
@section('admin-css')

@endsection


@section('admin-content')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Staff Management</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">pages</li>
            <li class="breadcrumb-item active">Staff Management</li>
        </ol>
    </div>

</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" class="btn btn-info text-white">+ Create New Admin</a>  
    </div>
    <br>
    <div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Create New Admin</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form class="form-horizontal" action="{{route('admin.new-staff')}}" method="POST" id="new-staff-form">
                    <div class="modal-body" >
                        @csrf
                        <div class="form-group">
                            <label class="col-md-12">Admin UserName</label>
                            <div class="col-md-12">
                                <input type="text" name="username" class="form-control" placeholder="type username" required=""> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Admin First Name</label>
                            <div class="col-md-12">
                                <input type="text" name="fName" class="form-control" placeholder="type first name" required=""> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Admin Last Name</label>
                            <div class="col-md-12">
                                <input type="text" name="lName" class="form-control" placeholder="type last name" required=""> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Admin Email</label>
                            <div class="col-md-12">
                                <input type="email" name="email" class="form-control" placeholder="type email" required=""> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Admin Role</label>
                            <div class="col-md-12">
                                <select name="role" class="form-control" required="">
                                    <option value="" selected="">Select</option>
                                    <option value="1">Super Admin</option>
                                    <option value="2">Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Initial Password</label>
                            <div class="col-md-12">
                                <input type="password" name="password" class="form-control" required="" minlength="8">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Confirm Password</label>
                            <div class="col-md-12">
                                <input type="password" name="conf_password" class="form-control" required="" minlength="8">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info waves-effect"  id="faq-form-submit-btn">Save</button>
                        <button type="button" class="btn btn-default waves-effect" id="new-cancel-btn" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div id="edit-staff-modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit Admin</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form class="form-horizontal" action="{{route('admin.edit-admin-staff')}}" method="POST" id="edit-staff-form">
                    <div class="modal-body" >
                            @csrf
                            <input type="hidden" name="id" id="admin-id">
                            <div class="form-group">
                                <label class="col-md-12">Admin UserName</label>
                                <div class="col-md-12">
                                    <input type="text" name="username" class="form-control" placeholder="type username" > 
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Admin First Name</label>
                                <div class="col-md-12">
                                    <input type="text" name="fName" class="form-control" placeholder="type first name" > 
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Admin Last Name</label>
                                <div class="col-md-12">
                                    <input type="text" name="lName" class="form-control" placeholder="type last name" > 
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Admin Email</label>
                                <div class="col-md-12">
                                    <input type="email" name="email" class="form-control" placeholder="type email" > 
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Admin Role</label>
                                <div class="col-md-12">
                                    <select name="role" class="form-control">
                                        <option value="" selected="">Select</option>
                                        <option value="1">Super Admin</option>
                                        <option value="2">Admin</option>
                                    </select>
                                </div>
                            </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info waves-effect"  id="faq-form-submit-btn">Save</button>
                        <button type="button" class="btn btn-default waves-effect" id="edit-cancel-btn" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div id="del-staff-modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="del-staff-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="del-staff-modal-label">Are you sure delete this staff?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form class="form-horizontal" action="{{route('admin.del-staff')}}" method="POST" id="del-staff-form">
                    <div class="modal-body" >
                        @csrf
                        <input type="hidden" name="id" id="admin-del-id">
                        <label>This will remove this staff permanently.</label>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger waves-effect"  id="faq-form-submit-btn">Delete</button>
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Admins</h4>
                    <div class="card-body collapse show">
                        <div class="table-responsive">
                            <table class="table product-overview">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Admin Name</th>
                                        <th>Admin Username</th>
                                        <th>Admin Email</th>
                                        <th>Role</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($admins as $admin)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$admin->fName.' '.$admin->lName}}</td>
                                        <td>{{$admin->username}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>
                                            @if($admin->role == 1)
                                            <span class="badge badge-danger">Super Admin</span>
                                            @else
                                            <span class="badge badge-success">Admin</span>
                                            @endif
                                        </td>
                                        <td>{{$admin->created_at->format('Y/m/d')}}</td>
                                        <td><a href="#" data-toggle="modal" data-target="#edit-staff-modal" data-id="{{$admin->id}}" class="btn btn-info btn-sm" id="edit-staff">Edit</a></td>
                                        <td><a href="#" data-toggle="modal" data-target="#del-staff-modal" data-id="{{$admin->id}}" class="btn btn-danger btn-sm" id="del-staff">Delete</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
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

@section('admin-js')

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

<script type="text/javascript">
    $(document).on("click", "#edit-staff", function(){
        var id = $(this).data('id');
        $("#admin-id").val(id);
    });

    $(document).on("click", "#del-staff", function(){
        var delid = $(this).data('id');
        $("#admin-del-id").val(delid);
    });

    $(document).on("click", "#edit-cancel-btn", function(){
        document.getElementById("edit-staff-form").reset();
    });

    $(document).on("click", "#new-cancel-btn", function(){
        document.getElementById("new-staff-form").reset();
    });
</script>
@endsection