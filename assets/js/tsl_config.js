jQuery(document).ready(function($){
    $('.tsl_colorpicker').wpColorPicker();

    var tsl_logout = $("#tsl_logout_option").find(":selected").val();
    if(tsl_logout == 2) {
        $(".tsl_logout_1").hide();
    } else {
        $(".tsl_logout_2").hide();
    }

    $("#tsl_logout_option").on("change", function(){
        $(".tsl_logout_1").toggle();
        $(".tsl_logout_2").toggle();
    });
});