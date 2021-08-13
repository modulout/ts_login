<?php
/* User login */
add_action('wp_ajax_nopriv_tsl_login_form', 'tsl_login_form');
function tsl_login_form() {
    check_ajax_referer('ajax-login-nonce', 'security');

    $recaptcha_status = $_POST['recaptcha_status'];

    $info = array();
    $info['user_login'] = sanitize_user($_POST['username']);
    $info['user_password'] = $_POST['pass'];


    //Recaptcha
    if($recaptcha_status == "1") {
        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptcha_secret = get_option("tsl_recaptcha_secret_key", "");
        $recaptcha_response = sanitize_text_field($_POST['recaptcha_response']);

        $recaptcha_data = json_decode(file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response));

        if($recaptcha_data->success == true) {
            _login_user_helper($info);
        } else {
            echo json_encode("4");
            die();
        }
    } else {
        _login_user_helper($info);
    } 
}

function _login_user_helper($info) {
    $user_signon = wp_signon($info, false);
    if (is_wp_error($user_signon)){
        echo json_encode("0");
    } else {
        echo json_encode("1");
    }
    die();
}
/* END User login */
/* User register*/
add_action('wp_ajax_nopriv_tsl_register_form', 'tsl_register_form');
function tsl_register_form() {
    check_ajax_referer('ajax-register-nonce', 'rsecurity');

    $recaptcha_status = $_POST['recaptcha_status'];
    $username = sanitize_user($_POST['username']);
    $email = sanitize_email($_POST['email']);
    $pass = $_POST['pass'];

    //Recaptcha
    if($recaptcha_status == "1") {
        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptcha_secret = get_option("tsl_recaptcha_secret_key", "");
        $recaptcha_response = sanitize_text_field($_POST['recaptcha_response']);

        $recaptcha_data = json_decode(file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response));

        if($recaptcha_data->success == true) {
            _register_user_helper($username, $email, $pass);
        } else {
            echo json_encode("4");
            die();
        }
    } else {
        _register_user_helper($username, $email, $pass);
    } 
}

function _register_user_helper() {
    //Check if username exists
    if(username_exists($username)) {
        echo json_encode("0");
        die();
    } elseif(email_exists($email)) {
        echo json_encode("3");
        die();
    } else {
        //Create a new user
        $new_user_id = wp_create_user($username, $pass, $email);

        if(!empty($new_user_id->errors)) {
            echo json_encode("2");
            die();
        } elseif(isset($new_user_id) && $new_user_id > 0) {
            $site_name = get_bloginfo("name");
            $site_email = get_bloginfo("admin_email");

            //Send email to admin - new user registration
            $admin_title = "[".$site_name."]".esc_html__("New User Registration", "tipster_script_login");
            $admin_body = esc_html__("New user registration on your site", "tipster_script_login")." ".$site_name.":<br><br>";
            $admin_body .= esc_html__("Username", "tipster_script_login").": ".$username."<br><br>";
            $admin_body .= esc_html__("Email", "tipster_script_login").": ".$email;
            wp_mail($site_email, $admin_title, $admin_body);

            //Send email to user - registration successful
            $user_title = "[".$site_name."]".esc_html__("Registration Was Successful", "tipster_script_login");
            $user_body = esc_html__("You registered on site", "tipster_script_login")." ".$site_name.":<br><br>";
            $user_body .= esc_html__("Username", "tipster_script_login").": ".$username."<br><br>";
            $user_body .= esc_html__("Email", "tipster_script_login").": ".$email;
            wp_mail($email, $user_title, $user_body);

            echo json_encode("1");
            die();
        } else {
            echo json_encode("2");
            die();
        }
    }
}
/* END User register */