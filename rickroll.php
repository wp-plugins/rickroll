<?php
/*
Plugin Name: Rickroll
Plugin URI: http://halelf.org/plugins/rickroll/
Description: Rickroll Your Embeded Videos
Author: Mika 'Ipstenu' Epstein
Version: 2.0
Author URI: http://ipstenu.org
*/

add_filter('embed_oembed_html','ippy_rickroll',10,3);

function ippy_rickroll($html, $url, $args) {

$default = '<iframe width="420" height="315" src="http://www.youtube.com/embed/oHg5SJYRHA0?fs=1&amp;feature=oembed&amp;showinfo=0" frameborder="0" allowfullscreen=""></iframe>';

// Youtube
if ( strstr($url, 'youtube.com') ) {
    $url_string = parse_url($url, PHP_URL_QUERY);
    parse_str($url_string, $id);
    $html = str_replace( $id['v'], 'oHg5SJYRHA0', $html);
}

// Vimeo
elseif ( strstr($url, 'vimeo.com' ) ) {
   $pattern = '/video\/(\d+)\"/i';
   $html = preg_replace( $pattern , 'video/2619976"', $html);
}

// Everyone else
else { $html = $default; }

return $html;
}
