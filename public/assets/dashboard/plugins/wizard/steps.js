$(".tab-wizard").steps({
    headerTag: "h6",
    bodyTag: "section",
    transitionEffect: "fade",
    titleTemplate: '<span class="step">#index#</span> #title#',
    labels: {
        finish: "Submit"
    }, 
    onFinished: function (event, currentIndex) {
        var form = $(this);
        // Submit form input
        form.submit();        
    }
});


var form = $(".validation-wizard").show();

$(".validation-wizard").steps({
    headerTag: "h6"
    , bodyTag: "section"
    , transitionEffect: "fade"
    , titleTemplate: '<span class="step">#index#</span> #title#'
    , labels: {
        finish: "Submit"
    }
    , onStepChanging: function (event, currentIndex, newIndex) {
        return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
    }
    , onFinishing: function (event, currentIndex) {
        return form.validate().settings.ignore = ":disabled", form.valid()
    }
    , onFinished: function (event, currentIndex) {
         swal({
            title : "Membership Application Submit!", 
            text : "Thank you for submitting membership application to the Family Investment Exchange… The membership committee will be in touch.",
            confirmButtonColor:"#1e88e5",
            confirmButtonText: "Submit Membership Application!",   
            closeOnConfirm: false }, 
            function(){   
                var form = $("#apply-form");
                // Submit form input
                form.submit(); 
        });

    }
}), $(".validation-wizard").validate({
    ignore: "input[type=hidden]"
    , errorClass: "text-danger"
    , successClass: "text-success"
    , highlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    }
    , unhighlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    }
    , errorPlacement: function (error, element) {
        error.insertAfter(element)
    }
    , rules: {
        email: {
            email: !0
        },
        email_confirmation:{
            equalTo: email
        },
        password: {
            minlength: 8,
        },
        conf_password: {
            minlength: 8,
            equalTo: password
        },
        company_website: {
            url:true
        },
        linkedIn: {
            url:true
        }
    }
})