$(function () {
    "use strict";

    // ============================================================== 
    // Theme options
    // ==============================================================   

    $("#phone_mobile").intlTelInput({
        geoIpLookup: function(callback) {
           $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
             var countryCode = (resp && resp.country) ? resp.country : "";
             callback(countryCode);
           });
        },


        initialCountry: "gb",

        separateDialCode: true
        // utilsScript: "./utils.js"
    });


    $(".select2").select2();

    $('.dropify').dropify();

    
    // this is for close icon when navigation open in mobile view
    $(".nav-toggler").click(function () {
        $("body").toggleClass("show-sidebar");
        $(".nav-toggler i").toggleClass("mdi mdi-menu");
        $(".nav-toggler i").addClass("mdi mdi-close");
    });
    
        
    
});