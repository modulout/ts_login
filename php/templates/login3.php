<?php $header_img = get_option("tsl_form_image", ""); ?>
<div class="tsl_login_css tsl_login_modal modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">   
            <div class="tsl_wrapper">
                <div class="tsl_inside d-none d-sm-block">
                    <?php if($header_img != "") : ?>
                        <img src="<?php echo esc_url($header_img); ?>" title="<?php esc_html_e("Login form", "tipster_script_login"); ?>" alt="<?php esc_html_e("Login form", "tipster_script_login"); ?>" />
                    <?php endif; ?>
                </div>
                <div class="tsl_inside_content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <i class="fa fa-user"></i>&nbsp;
                            <?php esc_html_e("Sign in", "tipster_script_login"); ?>        
                        </h4>
                        <?php if($recaptcha_status == "1") : ?>
                            <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                        <?php endif; ?>
                        <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php echo wp_login_form($args); ?>
                        <div class="tsl_login_footer">
                            <button class="tsl_forgot_password js--tsl-pass-popup">
                                <?php esc_html_e("Forgot password?", "tipster_script_login"); ?>
                            </button>
                            <?php if($register_show == 1) : ?>
                                <button class="tsl_register js--tsl-register-popup">
                                    <?php esc_html_e("Register", "tipster_script_login"); ?>
                                </button>
                            <?php endif; ?>
                        </div>
                        <?php if($recaptcha_badge == "2" && $recaptcha_status == "1") : ?>
                            <p class="tsl_recaptcha_message">
                                This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy">Privacy Policy</a> and <a href="https://policies.google.com/terms">Terms of Service</a> apply.
                            </p>
                        <?php endif; ?>
                        <?php echo wp_nonce_field('ajax-login-nonce', 'security', true, false); ?>
                        <p class='tsl_form_error alert alert-danger' role='alert'></p>
                        <p class='tsl_register_success alert alert-success' role='alert'></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>