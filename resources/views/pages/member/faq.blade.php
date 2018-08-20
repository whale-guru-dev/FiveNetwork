@extends('layouts.member')
@section('member-css')

@endsection


@section('member-content')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-4 align-self-center">
        <h3 class="text-themecolor">Frequently Asked Questions</h3>
    </div>
    <div class="col-md-4 align-self-center text-center">
        <!-- <div class="row text-center"> -->
            <img src="{{asset('logo.png')}}" width="200" height="150" alt="homepage" class="dark-logo" />
        <!-- </div> -->
        
    </div>
    <div class="col-md-4 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Frequently Asked Questions</li>
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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Frequently Asked Questions</h4>
                    
                    <div id="accordion2" role="tablist" class="minimal-faq" aria-multiselectable="true">
                        @if($faqs->count()>0)
                            @foreach($faqs as $faq)
                            <div class="card m-b-0">
                                <div class="card-header" role="tab" id="{{'headingOne'.$i}}">
                                    <h5 class="mb-0">
                                    <a class="link" data-toggle="collapse" data-parent="#accordion2" href="{{'#collapseOne'.$i}}" aria-expanded="true" aria-controls="{{'collapseOne'.$i}}">
                                      <h4 class="card-title text-info" style="font-weight: bold;">{{'Q'.$i}} . {{$faq->question}}</h4>
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

@section('member-js')

@endsection