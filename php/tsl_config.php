<?php
global $tsl_admin;
wp_enqueue_style('wp-color-picker');
wp_enqueue_script("tsl_colorpicker"); 

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
                <p class="submit">
                    <input type="submit" name="save" value="<?php esc_html_e('Save changes', 'tipster_script_login');?>" class="button button-primary">
                </p>
            </form>
        </div>
    </div>
</div>