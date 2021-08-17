<?php
/*
Plugin Name: TS login
Plugin URI: https://github.com/modulout/ts_login
Description: With the TS login plugin, your users can log in or/and register from the front page (not needed to go to wp-admin anymore).
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
    wp_register_style("tsl_config", TSL_URL.'assets/css/main_admin.css');
    wp_register_script("tsl_config", TSL_URL.'assets/js/tsl_config.js', array('wp-color-picker'), false, true);
}
add_action('admin_enqueue_scripts', 'tsl_admin_style_js');

function tsl_include_style_script() {
    //Google recaptcha
    $site_key = get_option("tsl_recaptcha_site_key", "");
    $recaptcha_status = get_option("tsl_recaptcha_enable", "0");

    wp_enqueue_style('bootstrap', TSL_URL.'assets/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome', TSL_URL.'assets/css/font-awesome.css');
    if($recaptcha_status == "1") {
        wp_enqueue_script("recaptcha", 'https://www.google.com/recaptcha/api.js?render='.$site_key);
    }
    wp_enqueue_script('bootstrap', TSL_URL.'assets/js/bootstrap.bundle.min.js', array('jquery'));
    wp_enqueue_style('tsl-main', TSL_URL.'assets/css/main.css');
    wp_enqueue_script("tsl-main", TSL_URL.'assets/js/main.js', array('jquery'));
    wp_localize_script('tsl-main', 'tsl_main', [
        'ajaxurl'          => admin_url('admin-ajax.php'),
        'site_key'         => $site_key,
        'recaptcha_status' => $recaptcha_status,
        'fields_empty'     => esc_html__("The username or password field is empty!", "tipster_script_login"),
        'fields_wrong'     => esc_html__("Incorrect username or password please try again!", "tipster_script_login"),
        'rfields_empty'    => esc_html__("The username or e-mail or password field is empty!", "tipster_script_login"),
        'username_exists'  => esc_html__("The username already exists!", "tipster_script_login"),
        'email_exists'     => esc_html__("The email already exists!", "tipster_script_login"),
        'register_fail'    => esc_html__("Registration failed! Please try again.", "tipster_script_login"),
        'register_success' => esc_html__("Registration was successful. You can log in.", "tipster_script_login"),
        'recaptcha_error'  => esc_html__("Something went wrong. Please try again later.", "tipster_script_login"),
    ]);
    $style = get_option('ts_style', 'style-blue');
    if($style == "style-custom") {
        wp_add_inline_style('tsl-main', tsl_helper_custom_style());
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
function tsl_helper_custom_color($colors, $color_name, $default_color) {
    $tsl_color = $default_color;
    if(isset($colors[$color_name]) && $colors[$color_name] != "") {
        $tsl_color = $colors[$color_name];
    }
    return $tsl_color;
}

function tsl_helper_custom_style() {
    $custom_colors = get_option("tsl_custom_colors");
    $data = "";
    $data .= "
    /* Header */
    .tsl_login_css .modal-header {
        background-color: ".tsl_helper_custom_color($custom_colors, 'tsl_hbgc', '#fff').";
    }
    .tsl_login_css .modal-header .modal-title {
        color: ".tsl_helper_custom_color($custom_colors, 'tsl_htc', '#000').";
    }
    /* Content */
    .tsl_login_css .modal-body {
        background-color: ".tsl_helper_custom_color($custom_colors, 'tsl_cbgc', '#fff').";
        color: ".tsl_helper_custom_color($custom_colors, 'tsl_ctc', '#212529').";
    }
    .tsl_login_css .modal-body .input {
        background-color: ".tsl_helper_custom_color($custom_colors, 'tsl_cibgc', '#fafafa').";
        border-color: ".tsl_helper_custom_color($custom_colors, 'tsl_cibc', '#a3a3a3')."!important;
        color: ".tsl_helper_custom_color($custom_colors, 'tsl_citc', '#111')."!important;
    }
    /* Submit button */
    .tsl_login_css .modal-body #tsl_login_submit, .tsl_login_css .modal-body #tsl_register_submit {
        background-color: ".tsl_helper_custom_color($custom_colors, 'tsl_sbbgc', '#0170B9').";
        border-color: ".tsl_helper_custom_color($custom_colors, 'tsl_sbbc', '#0170B9').";
        color: ".tsl_helper_custom_color($custom_colors, 'tsl_sbtc', '#fff').";
    }
    .tsl_login_css .modal-body #tsl_login_submit:hover, .tsl_login_css .modal-body #tsl_login_submit:visited, 
    .tsl_login_css .modal-body #tsl_register_submit:hover, .tsl_login_css .modal-body #tsl_register_submit:visited {
        background-color: ".tsl_helper_custom_color($custom_colors, 'tsl_sbhbgc', '#3a3a3a').";
        border-color: ".tsl_helper_custom_color($custom_colors, 'tsl_sbhbc', '#3a3a3a').";
        color: ".tsl_helper_custom_color($custom_colors, 'tsl_sbhtc', '#fff').";
    }
    .tsl_login_form_header__logged-dd {
        background-color: ".tsl_helper_custom_color($custom_colors, 'tsl_ddbgc', '#fff').";
    }
    .tsl_login_form_header__logged-dd-icon  {
        color: ".tsl_helper_custom_color($custom_colors, 'tsl_ddbgc', '#fff').";
    }
    .tsl_login_form_header__logged-dd-item a, .tsl_login_form_header__logged-dd-item .tsl_logout_icon {
        color: ".tsl_helper_custom_color($custom_colors, 'tsl_ddtc', '#000').";
    }
    .tsl_login_form_header__logged-dd-item a:hover {
        color: ".tsl_helper_custom_color($custom_colors, 'tsl_ddhtc', '#333').";
    }
    .tsl_login_form_header__logged a.tsl_login_form_header__logged-btn {
        background-color: ".tsl_helper_custom_color($custom_colors, 'tsl_bbgc', '#565e64').";
        border-color: ".tsl_helper_custom_color($custom_colors, 'tsl_bbc', '#51585e').";
        color: ".tsl_helper_custom_color($custom_colors, 'tsl_ddbgc', '#fff').";
    }
    .tsl_login_form_header__logged a.tsl_login_form_header__logged-btn:hover, .tsl_login_form_header__logged a.tsl_login_form_header__logged-btn:visited {
        background-color: ".tsl_helper_custom_color($custom_colors, 'tsl_bhbgc', '#5c636a').";
        border-color: ".tsl_helper_custom_color($custom_colors, 'tsl_bhbc', '#565e64').";
        color: ".tsl_helper_custom_color($custom_colors, 'tsl_bhtc', '#fff').";
    }
    ";
    if($custom_colors["tsl_recaptcha_badge"] == "2" && $custom_colors['tsl_recaptcha_enable'] == "1") {
        $data .= "
        /* Recaptcha hide */
        .grecaptcha-badge {
            visibility: hidden;
         }
        ";
    }
    return $data;
}
/* END Custom colors */

/* Login/Register */
function tsl_login_form_modal() {
    $recaptcha_status = get_option("tsl_recaptcha_enable", "0");
    $recaptcha_badge = get_option("tsl_recaptcha_badge", "1");

    $args = [
        "echo"      => false,
        "id_submit" => "tsl_login_submit"
    ];

    $template_id = get_option("tsl_form_template", "1");

    include TSL_PATH."php/templates/login".$template_id.".php";
}
add_action("wp_footer", "tsl_login_form_modal");

function tsl_register_form_modal() {
    $recaptcha_status = get_option("tsl_recaptcha_enable", "0");
    $recaptcha_badge = get_option("tsl_recaptcha_badge", "1");

    $template_id = get_option("tsl_form_template", "1");
    include TSL_PATH."php/templates/register".$template_id.".php";
}
add_action("wp_footer", "tsl_register_form_modal");