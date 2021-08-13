<?php
global $tsl_admin;
wp_enqueue_style('tsl_config');
wp_enqueue_style('wp-color-picker');
wp_enqueue_script("tsl_config"); 

$form_templates_arr = [
    1 => esc_html__("Basic", "tipster_script_login"),
    2 => esc_html__("Image on top", "tipster_script_login"),
    3 => esc_html__("Image on left side", "tipster_script_login"),
];

if(isset($_GET['save_config'])) {
    $tsl_admin->tsl_save_config();
}
?>
<div id="wbody">
    <div id="wpbody-content" aria-label="Main content" tabindex="0">
        <div class="wrap">
            <h2><?php esc_html_e('Config', 'tipster_script_login'); ?></h2>
            <form action="admin.php?page=tsl_config&save_config" method="post">
                <table class="form-table">
                    <tbody>
                        <!-- Login/Register style -->
                        <tr>
                            <th>
                                <?php esc_html_e("Login/Register style", "tipster_script_login"); ?>
                            </th>
                            <td>
                                <select name="tsl_form_template" id="tsl_form_template">
                                    <?php foreach($form_templates_arr as $key => $item) : ?>
                                        <?php 
                                            $selected = "";
                                            if(get_option("tsl_form_template", "1") == $key) {
                                                $selected = " selected";
                                            }
                                        ?>
                                        <option value="<?php echo $key; ?>"<?php echo $selected; ?>><?php echo $item; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class=tsl_form_img>
                                    <label for=""><?php esc_html_e("Image", "tipster_script_login"); ?></label><br>
                                    <input id="tsl_form_image" type="text" name="tsl_form_image" value="<?php echo get_option("tsl_form_image", ""); ?>" />
                                    <input id="_btn" class="upload_image_button button button-primary" type="button" value="Upload" />
                                </div>
                            </td>
                        </tr>
                        <!-- Logout option -->
                        <tr>
                            <th>
                                <?php esc_html_e("Log out option", "tipster_script_login"); ?>
                            </th>
                            <td>
                                <select name="tsl_logout_option" id="tsl_logout_option">
                                    <option value="1"<?php echo (get_option("tsl_logout_option") == 1) ? ' selected' : ''; ?>><?php esc_html_e("Button", "tipster_script_login"); ?></option>
                                    <option value="2"<?php echo (get_option("tsl_logout_option") == 2) ? ' selected' : ''; ?>><?php esc_html_e("Dropdown", "tipster_script_login"); ?></option>
                                </select>
                                <div class='item tsl_logout_1'>
                                    <div class="tsl_custom_colorpicker">
                                        <label for="tsl_bbgc"><?php esc_html_e("Button background color", "tipster_script_login"); ?></label><br>
                                        <input type="text" class="tsl_colorpicker" name="tsl_bbgc" id="tsl_bbgc" value="<?php echo get_option("tsl_bbgc", "#565e64"); ?>" data-default-color="#565e64" />
                                    </div>
                                    <div class="tsl_custom_colorpicker">
                                        <label for="tsl_btc"><?php esc_html_e("Button text color", "tipster_script_login"); ?></label><br>
                                        <input type="text" class="tsl_colorpicker" name="tsl_btc" id="tsl_btc" value="<?php echo get_option("tsl_btc", "#fff"); ?>" data-default-color="#fff" />
                                    </div>
                                    <div class="tsl_custom_colorpicker">
                                        <label for="tsl_bbc"><?php esc_html_e("Button border color", "tipster_script_login"); ?></label><br>
                                        <input type="text" class="tsl_colorpicker" name="tsl_bbc" id="tsl_bbc" value="<?php echo get_option("tsl_bbc", "#51585e"); ?>" data-default-color="#51585e" />
                                    </div>
                                    <div class="tsl_custom_colorpicker">
                                        <label for="tsl_bhbgc"><?php esc_html_e("Button hover background color", "tipster_script_login"); ?></label><br>
                                        <input type="text" class="tsl_colorpicker" name="tsl_bhbgc" id="tsl_bhbgc" value="<?php echo get_option("tsl_bhbgc", "#5c636a"); ?>" data-default-color="#5c636a" />
                                    </div>
                                    <div class="tsl_custom_colorpicker">
                                        <label for="tsl_bhtc"><?php esc_html_e("Button hover text color", "tipster_script_login"); ?></label><br>
                                        <input type="text" class="tsl_colorpicker" name="tsl_bhtc" id="tsl_bhtc" value="<?php echo get_option("tsl_bhtc", "#fff"); ?>" data-default-color="#fff" />
                                    </div>
                                    <div class="tsl_custom_colorpicker">
                                        <label for="tsl_bhbc"><?php esc_html_e("Button hover border color", "tipster_script_login"); ?></label><br>
                                        <input type="text" class="tsl_colorpicker" name="tsl_bhbc" id="tsl_bhbc" value="<?php echo get_option("tsl_bhbc", "#565e64"); ?>" data-default-color="#565e64" />
                                    </div>
                                </div>
                                <div class='item tsl_logout_2'>
                                    <div class="tsl_custom_colorpicker">
                                        <label for="tsl_ddbgc"><?php esc_html_e("Dropdown background color", "tipster_script_login"); ?></label><br>
                                        <input type="text" class="tsl_colorpicker" name="tsl_ddbgc" id="tsl_ddbgc" value="<?php echo get_option("tsl_ddbgc", "#fff"); ?>" data-default-color="#fff" />
                                    </div>
                                    <div class="tsl_custom_colorpicker">
                                        <label for="tsl_ddtc"><?php esc_html_e("Dropdown text color", "tipster_script_login"); ?></label><br>
                                        <input type="text" class="tsl_colorpicker" name="tsl_ddtc" id="tsl_ddtc" value="<?php echo get_option("tsl_ddtc", "#000"); ?>" data-default-color="#000" />
                                    </div>
                                    <div class="tsl_custom_colorpicker">
                                        <label for="tsl_ddhtc"><?php esc_html_e("Dropdown hover text color", "tipster_script_login"); ?></label><br>
                                        <input type="text" class="tsl_colorpicker" name="tsl_ddhtc" id="tsl_ddhtc" value="<?php echo get_option("tsl_ddhtc", "#333"); ?>" data-default-color="#333" />
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="tsl_custom_colors">
                            <th colspan="2">
                                <div class="ts-admin-grid">
                                    <div class='item'>
                                        <div class="tsl_custom_colorpicker">
                                            <label for="tsl_hbgc"><?php esc_html_e("Header background color", "tipster_script_login"); ?></label><br>
                                            <input type="text" class="tsl_colorpicker" name="tsl_hbgc" id="tsl_hbgc" value="<?php echo get_option("tsl_hbgc", "#fff"); ?>" data-default-color="#fff" />
                                        </div>
                                        <div class="tsl_custom_colorpicker">
                                            <label for="tsl_htc"><?php esc_html_e("Header text color", "tipster_script_login"); ?></label><br>
                                            <input type="text" class="tsl_colorpicker" name="tsl_htc" id="tsl_htc" value="<?php echo get_option("tsl_htc", "#000"); ?>" data-default-color="#000" />
                                        </div>
                                        <div class="tsl_custom_colorpicker">
                                            <label for="tsl_cbgc"><?php esc_html_e("Content background color", "tipster_script_login"); ?></label><br>
                                            <input type="text" class="tsl_colorpicker" name="tsl_cbgc" id="tsl_cbgc" value="<?php echo get_option("tsl_cbgc", "#fff"); ?>" data-default-color="#fff" />
                                        </div>
                                        <div class="tsl_custom_colorpicker">
                                            <label for="tsl_ctc"><?php esc_html_e("Content text (label) color", "tipster_script_login"); ?></label><br>
                                            <input type="text" class="tsl_colorpicker" name="tsl_ctc" id="tsl_ctc" value="<?php echo get_option("tsl_ctc", "#212529"); ?>" data-default-color="#212529" />
                                        </div>
                                        <div class="tsl_custom_colorpicker">
                                            <label for="tsl_cibgc"><?php esc_html_e("Content input background color", "tipster_script_login"); ?></label><br>
                                            <input type="text" class="tsl_colorpicker" name="tsl_cibgc" id="tsl_cibgc" value="<?php echo get_option("tsl_cibgc", "#fafafa"); ?>" data-default-color="#fafafa" />
                                        </div>
                                        <div class="tsl_custom_colorpicker">
                                            <label for="tsl_citc"><?php esc_html_e("Content input text color", "tipster_script_login"); ?></label><br>
                                            <input type="text" class="tsl_colorpicker" name="tsl_citc" id="tsl_citc" value="<?php echo get_option("tsl_citc", "#111"); ?>" data-default-color="#111" />
                                        </div>
                                        <div class="tsl_custom_colorpicker">
                                            <label for="tsl_cibc"><?php esc_html_e("Content input border color", "tipster_script_login"); ?></label><br>
                                            <input type="text" class="tsl_colorpicker" name="tsl_cibc" id="tsl_cibc" value="<?php echo get_option("tsl_cibc", "#a3a3a3"); ?>" data-default-color="#a3a3a3" />
                                        </div>
                                        <div class="tsl_custom_colorpicker">
                                            <label for="tsl_sbbgc"><?php esc_html_e("Submit button background color", "tipster_script_login"); ?></label><br>
                                            <input type="text" class="tsl_colorpicker" name="tsl_sbbgc" id="tsl_sbbgc" value="<?php echo get_option("tsl_sbbgc", "#0170B9"); ?>" data-default-color="#0170B9" />
                                        </div>
                                        <div class="tsl_custom_colorpicker">
                                            <label for="tsl_sbtc"><?php esc_html_e("Submit button text color", "tipster_script_login"); ?></label><br>
                                            <input type="text" class="tsl_colorpicker" name="tsl_sbtc" id="tsl_sbtc" value="<?php echo get_option("tsl_sbtc", "#fff"); ?>" data-default-color="#fff" />
                                        </div>
                                        <div class="tsl_custom_colorpicker">
                                            <label for="tsl_sbbc"><?php esc_html_e("Submit button border color", "tipster_script_login"); ?></label><br>
                                            <input type="text" class="tsl_colorpicker" name="tsl_sbbc" id="tsl_sbbc" value="<?php echo get_option("tsl_sbbc", "#0170B9"); ?>" data-default-color="#0170B9" />
                                        </div>
                                        <div class="tsl_custom_colorpicker">
                                            <label for="tsl_sbhbgc"><?php esc_html_e("Submit button hover background color", "tipster_script_login"); ?></label><br>
                                            <input type="text" class="tsl_colorpicker" name="tsl_sbhbgc" id="tsl_sbhbgc" value="<?php echo get_option("tsl_sbhbgc", "#3a3a3a"); ?>" data-default-color="#3a3a3a" />
                                        </div>
                                        <div class="tsl_custom_colorpicker">
                                            <label for="tsl_sbhtc"><?php esc_html_e("Submit button hover text color", "tipster_script_login"); ?></label><br>
                                            <input type="text" class="tsl_colorpicker" name="tsl_sbhtc" id="tsl_sbhtc" value="<?php echo get_option("tsl_sbhtc", "#fff"); ?>" data-default-color="#fff" />
                                        </div>
                                        <div class="tsl_custom_colorpicker">
                                            <label for="tsl_sbhbc"><?php esc_html_e("Submit button hover border color", "tipster_script_login"); ?></label><br>
                                            <input type="text" class="tsl_colorpicker" name="tsl_sbhbc" id="tsl_sbhbc" value="<?php echo get_option("tsl_sbhbc", "#3a3a3a"); ?>" data-default-color="#3a3a3a" />
                                        </div>
                                    </div>
                                </div>
                            </th>
                        </tr>
                    </tbody>
                </table>
                <h3><?php esc_html_e("Google reCAPTCHA v3", "tipster_script_login"); ?></h3>
                <table class="form-table">
                    <tbody>
                        <tr>
                            <th>
                                <?php esc_html_e("Status", "tipster_script_login"); ?>
                            </th>
                            <td>
                                <select name="tsl_recaptcha_enable">
                                    <option value="0"<?php echo (get_option("tsl_recaptcha_enable", "0") == "0") ? " selected" : ""; ?>><?php esC_html_e("Disable", "tipster_script_login"); ?></option>
                                    <option value="1"<?php echo (get_option("tsl_recaptcha_enable", "0") == "1") ? " selected" : ""; ?>><?php esC_html_e("Enable", "tipster_script_login"); ?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php esc_html_e("Site key", "tipster_script_login"); ?>
                            </th>
                            <td>
                                <input type="text" size="45" name="tsl_recaptcha_site_key" value="<?php echo get_option("tsl_recaptcha_site_key", ""); ?>" />
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <?php esc_html_e("Secret key", "tipster_script_login"); ?>
                            </th>
                            <td>
                                <input type="text" size="45" name="tsl_recaptcha_secret_key" value="<?php echo get_option("tsl_recaptcha_secret_key", ""); ?>" />
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p class="submit">
                    <input type="submit" name="save" value="<?php esc_html_e('Save changes', 'tipster_script_login');?>" class="button button-primary">
                </p>
            </form>
        </div>
    </div>
</div>
<?php
wp_enqueue_script('tsl-upload', TSL_URL.'assets/js/upload_image.js', array('jquery', 'media-upload', 'thickbox'));
wp_enqueue_style('thickbox');