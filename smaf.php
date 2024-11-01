<?php
/**
 * @package BI3
 * @version 1.0
 */
/*
Plugin Name: SMAF: Send me attachment file to email.
Plugin URI: http://bi3.biz/plugins/smaf.zip
Description: Send user attachment file to email.
Author: Eugen
Version: 1.0
Author URI: http://bi3.biz/
*/


/*function custom_footer_message() {
    print '';
}*/

function send_me_attachment_file($cf7) {
         if(isset($cf7->scanned_form_tags) && !empty($cf7->scanned_form_tags)) {
	    foreach($cf7->scanned_form_tags as $scanned_form_tag) {
	     if(isset($scanned_form_tag['basetype'], $scanned_form_tag['name']) && $scanned_form_tag['basetype'] == 'acceptance' && substr($scanned_form_tag['name'], 0, 15) == 'acceptance-smaf') {
                $postID = wpcf7_special_mail_tag_for_post_data('','_post_id') ;
		$attachment = get_post($postID);
                 if ( isset($attachment->ID, $attachment->guid) && count($attachment_path = explode('wp-content/uploads/', $attachment->guid)) == 2) {	
                                $pathinfo = pathinfo($attachment_path[1]);
				$basename = $pathinfo['basename'];	
				$wp_upload_dir = wp_upload_dir();
                                $origin_file = ABSPATH . 'wp-content/uploads/' . $attachment_path[1];
				$target_file = $wp_upload_dir['path'] . '/' . date('d-m-Y-h-i-s') . '-' . $basename;
				copy($origin_file, $target_file);
				$cf7->mail['attachments'] = '[attach1]';
     		                $cf7->uploaded_files = array('attach1' => $target_file);
                 }
               break;
	    }
         }
       }
     }

add_action( 'wpcf7_before_send_mail', 'send_me_attachment_file' );

function if_attachment_form_exists($post){
    if(is_attachment() && isset($post->post_content) && preg_match('/\[contact-form-7.*id="([0-9]{0,10})".*\]/is', $post->post_content, $form )) {
      $formID = $form[1];
      if ( $wpcf7_contact_form = wpcf7_contact_form( $formID ) ) {
       add_filter('the_title', 'remove_title');
       add_filter('wp_get_attachment_link', 'override_the_attachment_link');
       //add_action('wp_footer', 'custom_footer_message', 100);
    }
   }

  return $post;
}


add_action('the_post', 'if_attachment_form_exists');

function override_the_attachment_link() {
 return '';
}
 
// Remove title
function remove_title($title){
     //Return new title if called inside loop
    if ( in_the_loop() )
        return '';
     //Else return regular   
    return $title;
}
