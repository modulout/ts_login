<div class="tsl_login_css tsl_login_modal modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <i class="fa fa-user"></i>&nbsp;
                    <?php esc_html_e("Sign in", "tipster_script_login"); ?>        
                </h4>
                <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo wp_login_form($args); ?>
                <?php echo wp_nonce_field('ajax-login-nonce', 'security', true, false); ?>
                <p class='tsl_form_error alert alert-danger' role='alert'></p>
                <p class='tsl_register_success alert alert-success' role='alert'></p>
            </div>
        </div>
    </div>
</div>