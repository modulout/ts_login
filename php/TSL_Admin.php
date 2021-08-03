<?php
class TSL_Admin {
    public function __construct() {
        add_action("admin_menu", array($this, "tsl_admin_menu"));
    }

    function tsl_admin_menu() {
        add_menu_page('Tipster script Login', 'Tipster script Login', "manage_options", 'tipster_script_login', array($this, 'tsl_display'));
        add_submenu_page('tipster_script_login', esc_html__('Config', "tipster_script_login"), esc_html__('Config',"tipster_script_login"), "manage_options", 'tsl_config', array($this, 'tsl_display'));
    }

    function tsl_display() {
        include_once( dirname(__FILE__) . '/tsl_config.php' );
    }

    /* Save all values */
    public function tsl_save_config() { 
        foreach($_POST as $value => $item) {
            update_option($value, $item);
        }
        
        //Save all colors - only 1 request on frontend to get all colors
        unset($_POST['save']);
        update_option('tsl_custom_colors', $_POST);

        echo "<script>window.location = 'admin.php?page=tsl_config';</script>";
    }
}