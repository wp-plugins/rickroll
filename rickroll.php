<?php
/*
Plugin Name: Rickroll
Plugin URI: http://halelf.org/plugins/rickroll/
Description: Rickroll all your YouTube videos
Author: Mika 'Ipstenu' Epstein
Version: 1.0
Author URI: http://ipstenu.org
*/

add_filter('embed_oembed_html','ippy_rickroll',10,3);

function ippy_rickroll($html, $url, $args) {
    $url_string = parse_url($url, PHP_URL_QUERY);
    parse_str($url_string, $id);
    if (isset($id['v'])) {
        return '<iframe width="640" height="420" src="http://www.youtube.com/embed/dQw4w9WgXcQ?rel=0&showinfo=0" frameborder="1"></iframe>';
    }
    return $html;
}
