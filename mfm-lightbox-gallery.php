<?php
/**
 * Plugin Name: MFM Lightbox Gallery
 * Plugin URI: http://www.monkeyfishmarketing.com  
 * Description: This plugin will allow you to create Lightbox Gallery functionality to Wordpress Galleries
 * Version: 1.1
 * Author: Billy Bleasdale
 * License: GPL2
 */

if(!function_exists('mfm_menu')){
    add_action('admin_menu', 'mfm_menu');

    function mfm_menu() {
        add_menu_page('MonkeyFish', 'MonkeyFish', 'manage_options', 'mfm_menu', 'mfmMain',plugins_url( 'mfm-schema/images/mfm-logo.png'));
        add_submenu_page( 'mfm_menu','Welcome','Welcome', 'manage_options',   'mfm_menu',   '__return_null' );
    }
    
    function mfmMain(){
        echo "<h1>Welcome to Monkeyfish Marketing</h1>";
        
    }
    
}




require_once( plugin_dir_path( __FILE__ ) .'auto-updates.php' );
if ( is_admin() ) {
    new LightboxGitHubPluginUpdater( __FILE__, 'bab2k7', "mfm-lightbox-gallery" );
}

include( plugin_dir_path( __FILE__ ) . 'inc/admin.php');
include( plugin_dir_path( __FILE__ ) . 'inc/functions.php');


add_action('admin_menu', 'mfm_lightbox');

function mfm_lightbox() {
    add_submenu_page('mfm_menu','MFM Lightbox', 'MFM Lightbox', 'manage_options', 'mfm_lightbox', 'mfmLightbox');
}


if ( is_admin() ){ // admin actions
  add_action( 'admin_init', 'register_mfmlightboxsettings' );
} else {
  // non-admin enqueues, actions, and filters
}

function register_mfmlightboxsettings() { // whitelist options
    /* Global Settings */
    register_setting( 'mfm-lightbox-settings', 'mfm-lb-enabled' );
    
    
}
