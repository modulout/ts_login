<?php
/*
Plugin Name: Tipster script login
Plugin URI: https://www.modulout.com
Description: Tipster script login
Author: Modulout
Version: 1.0.0
Author URI: https://www.modulout.com
*/
if(!defined('WPINC')) {
    die;
}
/* Language text domain */
add_action( 'plugins_loaded', 'tsl_load_textdomain' );
function tsl_load_textdomain() {
  load_plugin_textdomain( 'tipster_script_login', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}

define("TSL_URL", plugin_dir_url(__FILE__));
define("TSL_PATH", plugin_dir_path(__FILE__));

/* Add css/js to admin area */
function tsl_admin_style_js() {
    wp_register_script("tsl_colorpicker", TSL_URL.'assets/js/tsl_colorpicker.js', array('wp-color-picker'), false, true);
}
add_action('admin_enqueue_scripts', 'tsl_admin_style_js');

function tsl_include_style_script() {
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js', array('jquery'));
    wp_enqueue_style('tsl-main', TSL_URL.'assets/css/main.css');
    wp_enqueue_script("tsl-main", TSL_URL.'assets/js/main.js', array('jquery'));
    wp_localize_script('tsl-main', 'tsl_main', [
        'ajaxurl'          => admin_url('admin-ajax.php'),
        'fields_empty'     => esc_html__("The username or password field is empty!", "tipster_script_login"),
        'fields_wrong'     => esc_html__("Incorrect username or password please try again!", "tipster_script_login"),
        'rfields_empty'    => esc_html__("The username or e-mail or password field is empty!", "tipster_script_login"),
        'username_exists'  => esc_html__("The username already exists!", "tipster_script_login"),
        'email_exists'     => esc_html__("The email already exists!", "tipster_script_login"),
        'register_fail'    => esc_html__("Registration failed! Please try again.", "tipster_script_login"),
        'register_success' => esc_html__("Registration was successful. You can log in.", "tipster_script_login"),
    ]);
    $style = get_option('ts_style', 'style-blue');
    if($style == "style-custom") {
        wp_add_inline_style('tsl-main', _tsl_helper_custom_style());
    } 
}
add_action('wp_enqueue_scripts', 'tsl_include_style_script');

/* Include files */
include_once TSL_PATH."php/TSL_Admin.php";
$tsl_admin = new TSL_Admin();
include_once TSL_PATH."php/Tsl_login_register.php";
include_once TSL_PATH."php/tsl_ajax.php";
/* END Include files */

/* Custom colors */
function _tsl_helper_custom_color($colors, $color_name, $default_color) {
    $tsl_color = $default_color;
    if(isset($colors[$color_name]) && $colors[$color_name] != "") {
        $tsl_color = $colors[$color_name];
    }
    return $tsl_color;
}

function _tsl_helper_custom_style() {
    $custom_colors = get_option("tsl_custom_colors");
    return "
    /* Header */
    .tsl_login_css .modal-header {
        background-color: "._tsl_helper_custom_color($custom_colors, 'tsl_hbgc', '#fff').";
    }
    .tsl_login_css .modal-header .modal-title {
        color: "._tsl_helper_custom_color($custom_colors, 'tsl_htc', '#000').";
    }
    /* Content */
    .tsl_login_css .modal-body {
        background-color: "._tsl_helper_custom_color($custom_colors, 'tsl_cbgc', '#fff').";
        color: "._tsl_helper_custom_color($custom_colors, 'tsl_ctc', '#212529').";
    }
    .tsl_login_css .modal-body .input {
        background-color: "._tsl_helper_custom_color($custom_colors, 'tsl_cibgc', '#fafafa').";
        border-color: "._tsl_helper_custom_color($custom_colors, 'tsl_cibc', '#a3a3a3')."!important;
        color: "._tsl_helper_custom_color($custom_colors, 'tsl_citc', '#111')."!important;
    }
    /* Submit button */
    .tsl_login_css .modal-body #tsl_login_submit, .tsl_login_css .modal-body #tsl_register_submit {
        background-color: "._tsl_helper_custom_color($custom_colors, 'tsl_sbbgc', '#0170B9').";
        border-color: "._tsl_helper_custom_color($custom_colors, 'tsl_sbbc', '#0170B9').";
        color: "._tsl_helper_custom_color($custom_colors, 'tsl_sbtc', '#fff').";
    }
    .tsl_login_css .modal-body #tsl_login_submit:hover, .tsl_login_css .modal-body #tsl_login_submit:visited, 
    .tsl_login_css .modal-body #tsl_register_submit:hover, .tsl_login_css .modal-body #tsl_register_submit:visited {
        background-color: "._tsl_helper_custom_color($custom_colors, 'tsl_sbhbgc', '#3a3a3a').";
        border-color: "._tsl_helper_custom_color($custom_colors, 'tsl_sbhbc', '#3a3a3a').";
        color: "._tsl_helper_custom_color($custom_colors, 'tsl_sbhtc', '#fff').";
    }
    .tsl_login_form_header__logged-dd {
        background-color: #fff;
    }
    .tsl_login_form_header__logged-dd-icon  {
        color: #fff;
    }
    .tsl_login_form_header__logged-dd-item {
        color: #000;
    }
    .tsl_login_form_header__logged-dd-item:hover {
        color: #333;
    }
    ";
}
/* END Custom colors */

/* Login/Register */
function tsl_login_form_modal() {
    $args = [
        "echo"      => false,
        "id_submit" => "tsl_login_submit"
    ];
    $data = "";
    $data .= '<div class="tsl_login_css tsl_login_modal modal fade" tabindex="-1" role="dialog">';
        $data .= '<div class="modal-dialog modal-dialog-centered">';
            $data .= '<div class="modal-content">';
                $data .= '<div class="modal-header">';
                    $data .= '<h4 class="modal-title">';
                        $data .= '<i class="fa fa-user"></i>&nbsp;';
                        $data .= esc_html__("Sign in", "tipster_script_login");           
                    $data .= '</h4>';
                    $data .= '<button type="button" class="btn-close btn-close-dark" data-bs-dismiss="modal" aria-label="Close"></button>';
                $data .= "</div>";
                $data .= '<div class="modal-body">';
                    $data .= wp_login_form($args);
                    $data .= wp_nonce_field('ajax-login-nonce', 'security', true, false);
                    $data .= "<p class='tsl_form_error alert alert-danger' role='alert'></p>";
                    $data .= "<p class='tsl_register_success alert alert-success' role='alert'></p>";
                $data .= "</div>";
            $data .= "</div>";
        $data .= "</div>";
    $data .= "</div>";
    echo $data;
}
add_action("wp_footer", "tsl_login_form_modal");

function tsl_register_form_modal() {
    $data = "";
    $data .= '<div class="tsl_login_css tsl_register_modal modal fade" tabindex="-1" role="dialog">';
        $data .= '<div class="modal-dialog modal-dialog-centered">';
            $data .= '<div class="modal-content">';
                $data .= '<div class="modal-header">';
                    $data .= '<h4 class="modal-title">';
                        $data .= '<i class="fa fa-user-plus"></i>&nbsp;';
                        $data .= esc_html__("Sign up", "tipster_script_login");           
                    $data .= '</h4>';
                    $data .= '<button type="button" class="btn-close btn-close-dark" data-bs-dismiss="modal" aria-label="Close"></button>';
                $data .= "</div>";
                $data .= '<div class="modal-body">';
                    $data .= '<p class="tsl_register">';
                        $data .= '<label for="tsl_username">'.esc_html__("Username", "tipster_script_login").'*</label>';
                        $data .= '<input type="text" id="tsl_username" class="input">';
                    $data .= '</p>';
                    $data .= '<p class="tsl_register">';
                        $data .= '<label for="tsl_email">'.esc_html__("Email", "tipster_script_login").'*</label>';
                        $data .= '<input type="text" id="tsl_email" class="input">';
                    $data .= '</p>';
                    $data .= '<p class="tsl_register">';
                        $data .= '<label for="tsl_password">'.esc_html__("Password", "tipster_script_login").'*</label>';
                        $data .= '<input type="password" id="tsl_password" class="input">';
                    $data .= '</p>';
                    $data .= '<p class="tsl-register-submit">';
                        $data .= '<input type="submit" id="tsl_register_submit" class="button button-primary" value="'.esc_html__("Register", "tipster_script_login").'">';
                    $data .= '</p>';
                    $data .= wp_nonce_field('ajax-register-nonce', 'rsecurity', true, false);
                    $data .= "<p class='tsl_form_error alert alert-danger' role='alert'></p>";
                $data .= "</div>";
            $data .= "</div>";
        $data .= "</div>";
    $data .= "</div>";
    echo $data;
}
add_action("wp_footer", "tsl_register_form_modal");