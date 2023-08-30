jQuery(function($) {
    $(".js--tsl-login-popup").on("click", function(){
        $('.tsl_login_modal').modal('show');
    });

    $(".js--tsl-register-popup").on("click", function(){
        $('.tsl_register_modal').modal('show');
    });

    $(".js--tsl-logged-show").on("click", function(){
        var logout_dd = $(".tsl_login_form_header__logged-dd");
        if(logout_dd.is(":hidden")) {
            logout_dd.css("display", "table");
        } else {
            logout_dd.hide();
        }
    });
    $(".tsl_login_modal #user_login, .tsl_login_modal #user_pass").on("focusin", function(){
        $('.tsl_login_modal .tsl_form_error').hide();
        $(".tsl_login_modal #user_login").removeAttr("style");
        $(".tsl_login_modal #user_pass").removeAttr("style");
    });

    $(".tsl_register_modal #tsl_username, .tsl_register_modal #tsl_email, .tsl_register_modal #tsl_password").on("focusin", function(){
        $('.tsl_register_modal .tsl_form_error').hide();
        $(".tsl_register_modal #tsl_username").removeAttr("style");
        $(".tsl_register_modal #tsl_email").removeAttr("style");
        $(".tsl_register_modal #tsl_password").removeAttr("style");
    });

    /* Login form - Sign in/Errors */
    $("#tsl_login_submit").on("click", function(e){
        e.preventDefault();

        var username = $("#user_login").val();
        var pass = $("#user_pass").val();
        if(username === "" || pass === "") {
            $('.tsl_login_modal .tsl_form_error').show().html("<i class='fa fa-exclamation-triangle'></i>&nbsp;"+tsl_main.fields_empty);
            $(".tsl_login_modal #user_login").attr("style", "border: 1px solid red !important");
            $(".tsl_login_modal #user_pass").attr("style", "border: 1px solid red !important");
            return false;
        }

        if(tsl_main.recaptcha_status === "1") {
            grecaptcha.ready(function () {
                grecaptcha.execute(tsl_main.site_key, { action: 'submit' }).then(function (token) {
                    var recaptchaResponse = document.getElementById('recaptchaResponse');
                    recaptchaResponse.value = token;
                    _tsl_login_ajax();
                });
            });
        } else {
            _tsl_login_ajax();
        }

        function _tsl_login_ajax() {
            $.ajax({
                type: 'POST',
                url: tsl_main.ajaxurl,
                data: {
                    action: 'tsl_login_form',
                    username: username,
                    pass: pass,
                    security: $('#security').val(),
                    recaptcha_status: tsl_main.recaptcha_status
                },
                success: function(data, textStatus, XMLHTTPRequest) {
                    data = JSON.parse(data); console.log(data);
                    if(data === '0') {
                        $('.tsl_login_modal .tsl_form_error').show().html("<i class='fa fa-exclamation-triangle'></i>&nbsp;"+tsl_main.fields_wrong);
                        $(".tsl_login_modal #user_login").attr("style", "border: 1px solid red !important");
                        $(".tsl_login_modal #user_pass").attr("style", "border: 1px solid red !important");
                        return false;
                    } else {
                        document.location.reload();
                    }
                }
            });
        }
    });

    $("#tsl_register_submit").on("click", function(e){
        e.preventDefault(); 
        var username = $("#tsl_username").val();
        var email = $("#tsl_email").val();
        var pass = $("#tsl_password").val();
        if(username === "" || email === "" || pass === "") {
            $('.tsl_register_modal .tsl_form_error').show().html("<i class='fa fa-exclamation-triangle'></i>&nbsp;"+tsl_main.rfields_empty);
            $(".tsl_register_modal #tsl_username").attr("style", "border: 1px solid red !important");
            $(".tsl_register_modal #tsl_email").attr("style", "border: 1px solid red !important");
            $(".tsl_register_modal #tsl_password").attr("style", "border: 1px solid red !important");
            return false;
        }

        if(tsl_main.recaptcha_status === "1") {
            grecaptcha.ready(function () {
                grecaptcha.execute(tsl_main.site_key, { action: 'submit' }).then(function (token) {
                    var recaptchaResponse = document.getElementById('recaptchaResponse');
                    recaptchaResponse.value = token;
                    _tsl_register_ajax();
                });
            });
        } else {
            _tsl_register_ajax();
        }

        function _tsl_register_ajax() {
            $.ajax({
                type: 'POST',
                url: tsl_main.ajaxurl,
                data: {
                    action: 'tsl_register_form',
                    username: username,
                    email: email,
                    pass: pass,
                    rsecurity: $('#rsecurity').val(),
                    recaptcha_status: tsl_main.recaptcha_status
                },
                success: function(data, textStatus, XMLHTTPRequest) {
                    data = JSON.parse(data);
                    if(data === '0') {
                        $('.tsl_register_modal .tsl_form_error').show().html("<i class='fa fa-exclamation-triangle'></i>&nbsp;"+tsl_main.username_exists);
                        $(".tsl_register_modal #tsl_username").attr("style", "border: 1px solid red !important");
                        return false;
                    } else if(data === '2') {
                        $('.tsl_register_modal .tsl_form_error').show().html("<i class='fa fa-exclamation-triangle'></i>&nbsp;"+tsl_main.register_fail);
                    } else if(data === '3') {
                        $('.tsl_register_modal .tsl_form_error').show().html("<i class='fa fa-exclamation-triangle'></i>&nbsp;"+tsl_main.email_exists);
                        $(".tsl_register_modal #tsl_email").attr("style", "border: 1px solid red !important");
                    } else if(data === '4') {
                        $('.tsl_register_modal .tsl_form_error').show().html("<i class='fa fa-exclamation-triangle'></i>&nbsp;"+tsl_main.recaptcha_error);
                    } else if(data === '5') {
                        $('.tsl_register_modal .tsl_form_error').show().html("<i class='fa fa-exclamation-triangle'></i>&nbsp;"+tsl_main.email_error);
                        $(".tsl_register_modal #tsl_email").attr("style", "border: 1px solid red !important");
                    } else {
                        $('.tsl_register_modal').modal('hide');
                        $('.tsl_login_modal').modal('show');
                        $('.tsl_login_modal .tsl_register_success').show().html("<i class='fa fa-check-circle'></i>&nbsp;&nbsp;"+tsl_main.register_success);
                    }
                }
            });
        }
    });
}); 