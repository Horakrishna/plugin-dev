<?php
/*
Plugin Name: Qrcode
Plugin URI:https://horakrishnaroy.com  
Description:This plugin Qr-code .This iPlugin genarate your qrcode.
Version:1.0
Author:Pallab hk    
Author URI:
License:GPLv2 or later
Text Domain:qr-code
Domain Path:/languages/

*/

function postqrcode_load_textdomain(){
    load_plugin_textdomain('qr-code',false,dirname(__FILE__)."/languages");
}
add_action('plugin_loaded','postqrcode_load_textdomain');

function display_qr_code($content){
    $current_post_id =get_the_ID();
    $current_post_title= get_the_title($current_post_id);
    $current_post_url =urlencode(get_the_permalink( $current_post_id));
    $current_post_type=get_post_type($current_post_id);
    //Post type Check
    $exclude_post_type =apply_filters('pqrc_excluded_post_types',array());
    if(in_array($current_post_type,$exclude_post_type)){
        return $content;
    }

    //Image size
    $height = get_option( 'pqrc_height' );
    $width  = get_option( 'pqrc_width' );
    $height= $height? $height: 180;
    $width= $width? $width: 180;
    $dimension = apply_filters('pqrc_dimension',"{$width}x{$height}");

    $image_src =sprintf('https://api.qrserver.com/v1/create-qr-code/?size=%s&ecc=L&qzone=1&data=%s', $dimension,$current_post_url);

    $content .= sprintf("<div class='qr-code'><img src='%s' alt='%s'/></div>",$image_src,$current_post_id);
    return $content;
}
add_filter("the_content",'display_qr_code');
function pqrc_setting_init(){
    add_settings_section('pqrc_section',__('Post to Qr code','qr-code'),'pqrc_section_callback','general');
    add_settings_field('pqrc_height',__('QR Code Height','qr-code'),'pqrc_display_field','general','pqrc_section',array('pqrc_height'));
    add_settings_field('pqrc_width',__('QR code width','qr-code'),'pqrc_display_field','general','pqrc_section',array('pqrc_width'));
   // add_settings_field('pqrc_extra',__('QR Code extra','qr-code'),'pqrc_display_field','general','pqrc_section',array('pqrc_extra'));
   add_settings_field('pqrc_select',__('Dropdown','qr-code'),'pqrc_display_select','general','pqrc_section');

    register_setting('general','pqrc_height',array('sanitize_callback'=>'esc_attr'));
    register_setting('general','pqrc_width',array('sanitize_callback'=>'esc_attr'));
    register_setting('general','pqrc_extra',array('sanitize_callback'=>'esc_attr'));
    register_setting('general','pqrc_select',array('sanitize_callback'=>'esc_attr'));

    function pqrc_display_field($args){
        $option = get_option($args[0]);
        printf( "<input type='text' id='%s' name='%s' value='%s' />",$args[0],$args[0],$option);
    }
    function pqrc_section_callback(){
        echo "<p>".__('Settings for Post to QR plugin','qr-code')."</p>";
    }
    function pqrc_display_height(){
        $height =get_option('pqrc_height');
        printf("<input type='text' id='%s' name='%s' value='%s'/>",'pqrc_height','pqrc_height',$height);
    }
    function pqrc_display_width(){
        $width =get_option('pqrc_width');
        printf("<input type='text' id='%s' name='%s' value='%s'/>",'pqrc_width','pqrc_width',$width);
    }

    function pqrc_display_select(){
        $option =get_option('pqrc_select');
        $countries =array(
            'None',
            'Afganistan',
            'Bangladesh',
            'Bhutan',
            'India',
            'Maldib',
            'Srilanka',
        );
        printf("<select  id='%s' name='%s'/>",'pqrc_select','pqrc_select');
        foreach($countries as $country){
            $selected ='';
            if($option == $country ){ 
                $selected ='selected';
            } 
            printf('<option value="$s"> %s</option>',$country,$selected,$country);
        }
        echo "</select>";
    }
}
add_action('admin_init','pqrc_setting_init');