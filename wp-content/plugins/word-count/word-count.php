<?php
/*
Plugin Name: Word Count 
Plugin URI:https://horakrishnaroy.com  
Description:This plugin count word.count word from any post.
Version:1.0
Author:Pallab hk    
Author URI:
License:GPLv2 or later
Text Domain:word-count
Domain Path:/language/

*/

// function wordcount_activation_hook(){

// }
// register_activation_hook(__FILE__,"wordcount_activation_hook");

// function wordcount_deactivation_hook(){

// }
// register_deactivation_hook(__FILE__,"wordcount_deactivation_hook");

function wordcount_load_textdomain(){
    load_plugin_textdomain('word-count',false,dirname(__FILE__)."/languages");
}
add_action("lugin_loaded",'wordcount_load_textdomain');

function word_count_words($content){
    $stripped_content =strip_tags($content);
    $wordn            =str_word_count($stripped_content);
    $label            =__('Total number of words', 'word-count');
    $label            =apply_filters('wordcount_heading',$label);
    $tag              =apply_filters('wordcount_tag', 'h2');
    $content         .= sprintf('<%s>%s: %s </%s>',$tag, $label,$wordn, $tag);
    return $content;
}
add_filter('the_content','word_count_words');

function wordcount_reading_time($content){
    $stripped_content   =strip_tags($content);
    $wordn              =str_word_count($stripped_content);
    $reading_min        =floor($wordn/200);
    $reading_sec        =floor($wordn % 200 / (200/60));
    $is_visible         =apply_filters('wordcount_display_reading_time',1);

    if($is_visible){
        $label  =__("Total Reading Time",'word-count');
        $label  =apply_filters("wordcount_readingtime_heading",$label);
        $tag    =apply_filters("wordcount_readingtime_tag",'h4');
       $content   .= sprintf('<%s> %s: %s minutes %s seconds</%s>',$tag, $label, $reading_min, $reading_sec, $tag );
    }
    return $content;
}
add_filter('the_content','wordcount_reading_time');