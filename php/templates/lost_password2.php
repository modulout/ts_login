<?php $header_img = get_option("tsl_form_image", ""); ?>
<div class="tsl_login_css tsl_lost_pass_modal modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?php if($header_img != "") : ?>
                <img src="<?php echo esc_url($header_img); ?>" title="<?php esc_html_e("Login form", "tipster_script_login"); ?>" alt="<?php esc_html_e("Login form", "tipster_script_login"); ?>" />
            <?php endif; ?>
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fa fa-user"></i>&nbsp;
                    <?php esc_html_e("Forgot password?", "tipster_script_login"); ?>       
                </h4>
                <?php if($recaptcha_status == "1") : ?>
                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                <?php endif; ?>
                <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="custom-lost-password">
                    <p><?php esc_html_e("Please enter your username or email address. You will receive an email message with instructions on how to reset your password.", "tipster_script_login"); ?></p>
                    <label for="lost-password-email"><?php esc_html_e("Username or Email Address", "tipster_script_login"); ?></label><br>
                    <input type="text" id="lost-password-email" required><br>
                    <button id="lost-password-submit"><?php esc_html_e("Get New Password", "tipster_script_login"); ?></button>
                </div>
                <div class="tsl_lost_pass_footer">
                    <button class="tsl_login js--tsl-login-popup">
                        <?php esc_html_e("Log in", "tipster_script_login"); ?>
                    </button>
                </div>
                <?php if($recaptcha_badge == "2" && $recaptcha_status == "1") : ?>
                    <p class="tsl_recaptcha_message">
                        This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy">Privacy Policy</a> and <a href="https://policies.google.com/terms">Terms of Service</a> apply.
                    </p>
                <?php endif; ?>
                <?php echo wp_nonce_field('ajax-lost_pass-nonce', 'lsecurity', true, false); ?>
                <p class='tsl_form_error alert alert-danger' role='alert'></p>
                <p class='tsl_lost_pass_success alert alert-success' role='alert'></p>
            </div>
        </div>
    </div>
</div>