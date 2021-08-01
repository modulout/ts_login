<?php
class TSL_Admin {
    public function __construct() {
        add_filter("ts_custom_colors", array($this, "tsl_custom_colors")) ;
    }

    /* Custom colors */
    function tsl_custom_colors($data) {
        $data .= "<div class='item'>";
            $data .= "<h3>Login/Register</h3>";
            $data .= '<div class="ts_custom_colorpicker">';
                $data .= '<label for="tsl_hbgc">Header background color</label><br>';
                $data .= '<input type="text" class="ts_colorpicker" name="tsl_hbgc" id="tsl_hbgc" value="'.get_option("tsl_hbgc", "#fff").'" data-default-color="#fff" />';
            $data .= '</div>';
            $data .= '<div class="ts_custom_colorpicker">';
                $data .= '<label for="tsl_htc">Header text color</label><br>';
                $data .= '<input type="text" class="ts_colorpicker" name="tsl_htc" id="tsl_htc" value="'.get_option("tsl_htc", "#000").'" data-default-color="#000" />';
            $data .= '</div>';
            $data .= '<div class="ts_custom_colorpicker">';
                $data .= '<label for="tsl_cbgc">Content background color</label><br>';
                $data .= '<input type="text" class="ts_colorpicker" name="tsl_cbgc" id="tsl_cbgc" value="'.get_option("tsl_cbgc", "#fff").'" data-default-color="#fff" />';
            $data .= '</div>';
            $data .= '<div class="ts_custom_colorpicker">';
                $data .= '<label for="tsl_ctc">Content text (label) color</label><br>';
                $data .= '<input type="text" class="ts_colorpicker" name="tsl_ctc" id="tsl_ctc" value="'.get_option("tsl_ctc", "#212529").'" data-default-color="#212529" />';
            $data .= '</div>';
            $data .= '<div class="ts_custom_colorpicker">';
                $data .= '<label for="tsl_cibgc">Content input background color</label><br>';
                $data .= '<input type="text" class="ts_colorpicker" name="tsl_cibgc" id="tsl_cibgc" value="'.get_option("tsl_cibgc", "#fafafa").'" data-default-color="#fafafa" />';
            $data .= '</div>';
            $data .= '<div class="ts_custom_colorpicker">';
                $data .= '<label for="tsl_citc">Content input text color</label><br>';
                $data .= '<input type="text" class="ts_colorpicker" name="tsl_citc" id="tsl_citc" value="'.get_option("tsl_citc", "#111").'" data-default-color="#111" />';
            $data .= '</div>';
            $data .= '<div class="ts_custom_colorpicker">';
                $data .= '<label for="tsl_cibc">Content input border color</label><br>';
                $data .= '<input type="text" class="ts_colorpicker" name="tsl_cibc" id="tsl_cibc" value="'.get_option("tsl_cibc", "#a3a3a3").'" data-default-color="#a3a3a3" />';
            $data .= '</div>';
            $data .= '<div class="ts_custom_colorpicker">';
                $data .= '<label for="tsl_sbbgc">Submit button background color</label><br>';
                $data .= '<input type="text" class="ts_colorpicker" name="tsl_sbbgc" id="tsl_sbbgc" value="'.get_option("tsl_sbbgc", "#0170B9").'" data-default-color="#0170B9" />';
            $data .= '</div>';
            $data .= '<div class="ts_custom_colorpicker">';
                $data .= '<label for="tsl_sbtc">Submit button text color</label><br>';
                $data .= '<input type="text" class="ts_colorpicker" name="tsl_sbtc" id="tsl_sbtc" value="'.get_option("tsl_sbtc", "#fff").'" data-default-color="#fff" />';
            $data .= '</div>';
            $data .= '<div class="ts_custom_colorpicker">';
                $data .= '<label for="tsl_sbbc">Submit button border color</label><br>';
                $data .= '<input type="text" class="ts_colorpicker" name="tsl_sbbc" id="tsl_sbbc" value="'.get_option("tsl_sbbc", "#0170B9").'" data-default-color="#0170B9" />';
            $data .= '</div>';
            $data .= '<div class="ts_custom_colorpicker">';
                $data .= '<label for="tsl_sbhbgc">Submit button hover background color</label><br>';
                $data .= '<input type="text" class="ts_colorpicker" name="tsl_sbhbgc" id="tsl_sbhbgc" value="'.get_option("tsl_sbhbgc", "#3a3a3a").'" data-default-color="#3a3a3a" />';
            $data .= '</div>';
            $data .= '<div class="ts_custom_colorpicker">';
                $data .= '<label for="tsl_sbhtc">Submit button hover text color</label><br>';
                $data .= '<input type="text" class="ts_colorpicker" name="tsl_sbhtc" id="tsl_sbhtc" value="'.get_option("tsl_sbhtc", "#fff").'" data-default-color="#fff" />';
            $data .= '</div>';
            $data .= '<div class="ts_custom_colorpicker">';
                $data .= '<label for="tsl_sbhbc">Submit button hover border color</label><br>';
                $data .= '<input type="text" class="ts_colorpicker" name="tsl_sbhbc" id="tsl_sbhbc" value="'.get_option("tsl_sbhbc", "#3a3a3a").'" data-default-color="#3a3a3a" />';
            $data .= '</div>';
        $data .= "</div>";
        return $data;
    }
}