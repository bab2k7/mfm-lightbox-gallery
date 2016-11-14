<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function mfm_lightbox_filter( $output, $atts ) {
	$posts = get_posts(array('include' => $atts['ids'],'post_type' => 'attachment'));
        if(isset($atts['columns'])){
            $numCols = $atts['columns'];
        }
        else{
            $numCols = 3;
        }
        $galId = str_replace(",","",$atts['ids']);
        
        $output .= "<div class='gallery-size-thumbnail gallery gallery-columns-".$numCols."'>";
        foreach($posts as $imagePost){
            $imageFull = wp_get_attachment_image_src($imagePost->ID, 'full');
            $imageThumb = wp_get_attachment_image_src($imagePost->ID, 'thumbnail');
            $imageAlt = get_post_meta( $imagePost->ID, '_wp_attachment_image_alt', true);
            $output .= "<figure class='gallery-item'>";  
            $output .= "<div class='gallery-icon portrait'>";
            $output .= "<a href='".$imageFull[0]."' / class='gallery-".$galId."'>";
            $output .= "<img src='".$imageThumb[0]."' alt='".$imageAlt."' class='attachment-thumbnail size-thumbnail'>";
            $output .= "</a>";
            $output .= "</div>";
            $output .= "</figure>";
        }
        $output .= "</div>";
        $output .= "<script>
                    mfmlightbox(document).ready(function(){
                        mfmlightbox('.gallery-".$galId."').featherlightGallery();
                    });
                    </script>";
        
	return $output;
}
if(get_option('mfm-lb-enabled')){
    add_filter( 'post_gallery', 'mfm_lightbox_filter', 10, 2 );
}



add_action('wp_head', 'mfm_lightbox_head');

function mfm_lightbox_head() {
    
    echo '<link rel="stylesheet" href="'.plugin_dir_url(dirname(__FILE__)).'css/featherlight.gallery.css" type="text/css" media="all" />';
    echo '<link rel="stylesheet" href="'.plugin_dir_url(dirname(__FILE__)).'css/featherlight.css" type="text/css" media="all" />';
    echo '<link rel="stylesheet" href="'.plugin_dir_url(dirname(__FILE__)).'css/styles.css" type="text/css" media="all" />'; 
    echo '<script src="'.plugin_dir_url(dirname(__FILE__)).'js/featherlight.js"></script>';
    echo '<script src="'.plugin_dir_url(dirname(__FILE__)).'js/featherlight.gallery.js"></script>';
    
    
    echo '<script>
         var mfmlightbox = jQuery.noConflict();
        </script>
        ';
}