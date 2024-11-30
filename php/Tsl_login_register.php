<?php
class Tsl_login_register extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'Tsl_login_register',
            'TS - Login form',
            array('description' => __('TS - Login form', "tipster_script_login"))
        );
    }

    public static function tsl_register_widget() {
        return register_widget("Tsl_login_register");
    }

    function widget($args, $instance){
        extract($args, EXTR_SKIP);
        echo $before_widget;
        ?>
        <div class="tsl_login_form_header">
        <?php
        if(is_user_logged_in()) :
            $current_user = wp_get_current_user();
            $logout_value = get_option("tsl_logout_option", 1);
            ?>
            <span class="tsl_login_form_header__logged js--tsl-logged-show">
                <?php if($logout_value == 1) : ?>
                    <a href="<?php echo wp_logout_url(home_url()); ?>" class="tsl_login_form_header__logged-btn btn btn-secondary">
                        <?php echo (get_option("tsl_logout_icon", "") != "") ? get_option("tsl_logout_icon", "")."&nbsp;" : ""; ?>
                        <?php esc_html_e("Log out", "tipster_script_login"); ?>
                    </a>
                <?php else : ?>
                    <i class="fa fa-user"></i>&nbsp;<?php echo $current_user->display_name; ?>
                    <ul class="tsl_login_form_header__logged-dd">
                        <i class="fa fa-sort-up tsl_login_form_header__logged-dd-icon"></i>         
                        <li class="tsl_login_form_header__logged-dd-item">
                            <i class="fa fa-sign-out tsl_logout_icon"></i>&nbsp;
                            <a href="<?php echo wp_logout_url(home_url()); ?>"> <?php esc_html_e("Log out", "tipster_script_login"); ?></a>
                        </li>
                    </ul>
                <?php endif; ?>
            </span>
            <?php
        else : 
            ?>
            <span class="tsl_login_form_header__login js--tsl-login-popup">
                <?php echo (get_option("tsl_login_icon", "") != "") ? get_option("tsl_login_icon", "")."&nbsp;" : ""; ?>
                <?php esc_attr_e("Login", "tipster_script_login"); ?>
            </span>
            <span class="tsl_login_form_header__separator">&nbsp;/&nbsp;</span>
            <span class="tsl_login_form_header__register js--tsl-register-popup">
                <?php echo (get_option("tsl_register_icon", "") != "") ? get_option("tsl_register_icon", "")."&nbsp;" : ""; ?>
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