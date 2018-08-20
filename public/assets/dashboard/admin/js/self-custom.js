$(function () {
    "use strict";

    // ============================================================== 
    // Theme options
    // ==============================================================   


    $("#aware_method").change(function() {    

         if($(this).val() == 1){
            $("#aware_who").show();
            $("#aware_who").addClass("show");
            $("#aware_how").hide();
            $("#aware_how").removeClass("show");
            $("#aware_method_desc_who").addClass("required");
            $("#aware_method_desc_how").removeClass("required");
            $("#aware_method_desc_how").val('');
         }else if($(this).val() == 0){
            $("#aware_how").show();
            $("#aware_how").addClass("show");
            $("#aware_method_desc_who").val('');
            $("#aware_who").hide();
            $("#aware_who").removeClass("show");
            $("#aware_method_desc_how").addClass("required");
            $("#aware_method_desc_who").removeClass("required");
         }else if($(this).val() == "-1"){
            $("#aware_how").hide();
            $("#aware_who").hide();
         }

     });

    $('#mdate').bootstrapMaterialDatePicker({ weekStart: 0, time: false });



    $(".select2").select2();

    $('.dropify').dropify();

    $("#plan_use_network").change(function() {    

         if($(this).val() == 0){
            $("#no_plan_use_network").show();
         }else{
            $("#no_plan_use_network").hide();
         }

     });

    $("#apply_type").change(function() {    

         if($(this).val() == 0){
            $("#name_type").html("Family Office Name");
            $("#family_office").show();
            $("#bprinciple").addClass("required");
         }else{
            $("#name_type").html("Investment Entity name");
            $("#family_office").hide();
            $("#bprinciple").removeClass("required");
         }

     });

    // $("#aware_method").on('click', function () {
    //     if ($("body").hasClass("mini-sidebar")) {
    //         $("body").trigger("resize");
    //         $(".scroll-sidebar, .slimScrollDiv").css("overflow", "hidden").parent().css("overflow", "visible");
    //         $("body").removeClass("mini-sidebar");
    //         $('.navbar-brand span').show();
    //         //$(".sidebartoggler i").addClass("ti-menu");
    //     }
    //     else {
    //         $("body").trigger("resize");
    //         $(".scroll-sidebar, .slimScrollDiv").css("overflow-x", "visible").parent().css("overflow", "visible");
    //         $("body").addClass("mini-sidebar");
    //         $('.navbar-brand span').hide();
    //         //$(".sidebartoggler i").removeClass("ti-menu");
    //     }
    // });

    
    
    // this is for close icon when navigation open in mobile view
    $(".nav-toggler").click(function () {
        $("body").toggleClass("show-sidebar");
        $(".nav-toggler i").toggleClass("mdi mdi-menu");
        $(".nav-toggler i").addClass("mdi mdi-close");
    });
    
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function () {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
        
    
});