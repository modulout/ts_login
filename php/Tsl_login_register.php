<?php
class Tsl_login_register extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'Tsl_login_register',
            'Tipster script - Login form',
            array('description' => __('Tipster script - Login form', "tipster_script_login"))
        );
    }

    public static function tsl_register_widget() {
        return register_widget("Tsl_login_register");
    }

    function widget($args, $instance){
        extract($args, EXTR_SKIP);
        echo $before_widget;
        ?>
        <div class="tss_login_form_header">
        <?php
        if(is_user_logged_in()) :
            $current_user = wp_get_current_user();
            ?>
            <span class="tss_login_form_header__logged">
                <i class="fa fa-user"></i>&nbsp;
                <?php echo $current_user->display_name; ?>
            </span>
            <?php
        else : 
            ?>
            <span class="tss_login_form_header__login js--tsl-login-popup">
                <i class="fa fa-lock"></i>&nbsp;
                <?php esc_attr_e("Login", "tipster_script_login"); ?>
            </span>
            <span class="tss_login_form_header__separator">&nbsp;/&nbsp;</span>
            <span class="tss_login_form_header__register js--tsl-register-popup">
                <i class="fa fa-user-plus"></i>&nbsp;
                <?php esc_attr_e("Register", "tipster_script_login"); ?>
            </span>       
            <?php
        endif;
        ?>
        </div>
        <?php
        echo $after_widget;
    }
}
add_action( 'widgets_init', array('Tsl_login_register', 'tsl_register_widget') );