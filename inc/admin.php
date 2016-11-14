<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function mfmLightbox() {
    echo "<h1>MFM Lightbox</h1>";
        ?>
                <form id="settings-form" method="post" action="options.php">
                    <?php 
                    settings_fields( 'mfm-lightbox-settings' );
                    do_settings_sections( 'mfm-lightbox-settings' );
                    ?>
                    <div class="tab-data tab-general active">
                        <h2>General</h2>
                        <div class="input-wrapper">
                            <label for="enable-menu">Enable MFM Lightbox Gallery: </label>
                            <input type="checkbox" name="mfm-lb-enabled" id="enable-menu" <?php if(get_option('mfm-lb-enabled')){echo "checked";} ?>>
                        </div>
                        
                    <?php submit_button(); ?>
                </form>
        <?php

}