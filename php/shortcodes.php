<?php
function tsl_login_form_shortcode($atts, $content) {
    extract( shortcode_atts( array(
        'id'    => '',
        'style' => '1',
    ), $atts));

    $data = '';
    ob_start();
    include TSS_PATH."php/templates/login_".$style.".php";
    $data .= ob_get_clean();
    return $data;
}
add_shortcode("tsl_login_form", "tsl_login_form_shortcode");