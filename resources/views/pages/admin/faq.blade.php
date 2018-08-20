@extends('layouts.admin')
@section('admin-css')

@endsection


@section('admin-content')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Faqs</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">pages</li>
            <li class="breadcrumb-item active">Faqs</li>
        </ol>
    </div>

</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<?php $i=1;?>
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        
            <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" class="btn btn-info text-white">+ Create New Faq</a> 
        
          
    </div>
    <br>
    <div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Create New Faq</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form class="form-horizontal" action="{{route('admin.edit-faq')}}" method="POST" id="faq-form">
                    <div class="modal-body" >
                            @csrf
                            <div class="form-group">
                                <label class="col-md-12">Question</label>
                                <div class="col-md-12">
                                    <input type="text" name="question" class="form-control" placeholder="type question" required=""> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Answer</label>
                                <div class="col-md-12">
                                    <textarea name="answer" class="form-control" rows="5" required=""></textarea>
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

    <div id="editModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit A Faq</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form class="form-horizontal" action="{{route('admin.update-faq')}}" method="POST" id="faq-form">
                    <div class="modal-body" >
                            @csrf
                            <input type="hidden" name="id" id="faq-id">
                            <div class="form-group">
                                <label class="col-md-12">Question</label>
                                <div class="col-md-12">
                                    <input type="text" id="faq-quiz" name="question" class="form-control" placeholder="type question" required="" style="color: white;"> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Answer</label>
                                <div class="col-md-12">
                                    <textarea name="answer" id="faq-answer" class="form-control" rows="5" required="" style="color: white;"></textarea>
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

    <div id="delModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Remove A Faq</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form class="form-horizontal" action="{{route('admin.remove-faq')}}" method="POST" id="faq-form">
                    <div class="modal-body" >
                            @csrf
                            <input type="hidden" name="id" id="del-id">
                            <h4 class="card-title">Are you sure remove this faq?</h4>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger waves-effect"  id="faq-form-submit-btn">Remove</button>
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Faqs</h4>
                    
                    <div id="accordion2" role="tablist" class="minimal-faq" aria-multiselectable="true">
                        @if($faqs->count()>0)
                            @foreach($faqs as $faq)
                            <div class="card m-b-0">
                                <div class="card-header" role="tab" id="{{'headingOne'.$i}}">

                                    <h5 class="mb-0">
                                        &nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#editModal" data-id="{{$faq->id}}" id="edit-btn"><i class="fa fa-edit text-info"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#delModal" data-id="{{$faq->id}}" id="del-btn"><i class="fa fa-close text-danger"></i></a>
                                        <a class="link" data-toggle="collapse" data-parent="#accordion2" href="{{'#collapseOne'.$i}}" aria-expanded="true" aria-controls="{{'collapseOne'.$i}}">
                                          {{'Q'.$i}} {{$faq->question}}
                                        </a>
                                    </h5>
                                </div>
                                <div id="{{'collapseOne'.$i}}" class="collapse show" role="tabpanel" aria-labelledby="{{'headingOne'.$i++}}">
                                    <div class="card-body">
                                        {{$faq->answer}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
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
    $(document).on("click","#edit-btn", function(){
        var id = $(this).data('id');
        $.ajax({
            url: '{{route('admin.get-faq')}}',
            type: 'POST',
            data: {
                '_token' : '{{csrf_token()}}',
                'id' : id
            },
            dataType: 'html',
            success: function (data) {
               data= jQuery.parseJSON(data);
                if(data['status']=='ok'){
                    $("#faq-id").val(id);
                    $("#faq-quiz").val(data['quiz']);
                    $("#faq-answer").html(data['answer']);
                }
            },
            error: function () {
                alert("Something went wrong!");
            }
        });
    });

    $(document).on("click", "#del-btn", function(){
        var id = $(this).data('id');
        $("#del-id").val(id);
    });
</script>
@endsection