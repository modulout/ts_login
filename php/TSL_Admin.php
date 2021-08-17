<?php
class TSL_Admin {
    public function __construct() {
        add_action("admin_menu", array($this, "tsl_admin_menu"));
    }

    function tsl_admin_menu() {
        add_menu_page('TS Login', 'TS Login', "manage_options", 'tipster_script_login', array($this, 'tsl_display'), 'dashicons-lock');
        add_submenu_page('tipster_script_login', esc_html__('Config', "tipster_script_login"), esc_html__('Config',"tipster_script_login"), "manage_options", 'tsl_config', array($this, 'tsl_display'));
    }

    function tsl_display() {
        include_once( dirname(__FILE__) . '/tsl_config.php' );
    }

    /* Save all values */
    public function tsl_save_config() { 
        $data = $_POST;
        foreach($data as $value => $item) {
            update_option($value, sanitize_text_field($item));
        }

        //Save all colors - only 1 request on frontend to get all colors
        $colors_data = [
            "tsl_bbgc"             => sanitize_hex_color($data['tsl_bbgc']),
            "tsl_btc"              => sanitize_hex_color($data['tsl_btc']),
            "tsl_bbc"              => sanitize_hex_color($data['tsl_bbc']),
            "tsl_bhbgc"            => sanitize_hex_color($data['tsl_bhbgc']),
            "tsl_bhtc"             => sanitize_hex_color($data['tsl_bhtc']),
            "tsl_bhbc"             => sanitize_hex_color($data['tsl_bhbc']),
            "tsl_ddbgc"            => sanitize_hex_color($data['tsl_ddbgc']),
            "tsl_ddtc"             => sanitize_hex_color($data['tsl_ddtc']),
            "tsl_ddhtc"            => sanitize_hex_color($data['tsl_ddhtc']),
            "tsl_hbgc"             => sanitize_hex_color($data['tsl_hbgc']),
            "tsl_htc"              => sanitize_hex_color($data['tsl_htc']),
            "tsl_cbgc"             => sanitize_hex_color($data['tsl_cbgc']),
            "tsl_ctc"              => sanitize_hex_color($data['tsl_ctc']),
            "tsl_cibgc"            => sanitize_hex_color($data['tsl_cibgc']),
            "tsl_citc"             => sanitize_hex_color($data['tsl_citc']),
            "tsl_cibc"             => sanitize_hex_color($data['tsl_cibc']),
            "tsl_sbbgc"            => sanitize_hex_color($data['tsl_sbbgc']),
            "tsl_sbtc"             => sanitize_hex_color($data['tsl_sbtc']),
            "tsl_sbbc"             => sanitize_hex_color($data['tsl_sbbc']),
            "tsl_sbhbgc"           => sanitize_hex_color($data['tsl_sbhbgc']),
            "tsl_sbhtc"            => sanitize_hex_color($data['tsl_sbhtc']),
            "tsl_sbhbc"            => sanitize_hex_color($data['tsl_sbhbc']),
            "tsl_recaptcha_enable" => sanitize_text_field($data['tsl_recaptcha_enable']),
            "tsl_recaptcha_badge"  => sanitize_text_field($data['tsl_recaptcha_badge']),
        ];
        update_option('tsl_custom_colors', $colors_data);

        echo "<script>window.location = 'admin.php?page=tsl_config';</script>";
    }
}