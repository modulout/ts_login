<div class="tsl_login_css tsl_register_modal modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fa fa-user-plus"></i>&nbsp;<?php esc_html_e("Sign up", "tipster_script_login"); ?>           
                </h4>
                <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="tsl_register">
                    <label for="tsl_username"><?php esc_html_e("Username", "tipster_script_login"); ?>*</label>
                    <input type="text" id="tsl_username" class="input">
                </p>
                <p class="tsl_register">
                    <label for="tsl_email"><?php esc_html_e("Email", "tipster_script_login"); ?>*</label>
                    <input type="text" id="tsl_email" class="input">
                </p>
                <p class="tsl_register">
                    <label for="tsl_password"><?php esc_html_e("Password", "tipster_script_login"); ?>*</label>
                    <input type="password" id="tsl_password" class="input">
                </p>
                <p class="tsl-register-submit">
                    <input type="submit" id="tsl_register_submit" class="button button-primary" value="<?php esc_html_e("Register", "tipster_script_login"); ?>">
                </p>
                <?php echo wp_nonce_field('ajax-register-nonce', 'rsecurity', true, false); ?>
                <p class='tsl_form_error alert alert-danger' role='alert'></p>
            </div>
        </div>
    </div>
</div>