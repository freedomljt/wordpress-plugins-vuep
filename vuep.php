<?php
/*
    Plugin Name: Vuep
    Description: Vuep for code
    Version: 1.0
*/
function vuepscripts() {
   wp_register_script( 'babel', 'https://unpkg.com/babel-standalone@6.26.0/babel.min.js');
   wp_register_script( 'transform', 'https://unpkg.com/babel-plugin-transform-vue-jsx', 'babel', true);
   wp_register_script( 'vue', 'https://unpkg.com/vue@2.6.10/dist/vue.js', 'transform', true);
   wp_register_script( 'vuep', 'https://unpkg.com/vuep@0.8.1/dist/vuep.js', 'vue', true);

   wp_register_script( 'lib', '{{lib_url}}/index.js', 'vuep', true);
   wp_register_script('app', plugin_dir_url( __FILE__ ).'vuep.js', 'lib', true );
}

function vuepstyle() {
    wp_register_style( 'vuep_theme', 'https://unpkg.com/vuep@0.8.1/dist/vuep.css');
    wp_register_style( 'style', '{{style_url}}/index.css', array('vuep_theme'), true);
    wp_enqueue_style('style');
}

add_action('wp_enqueue_scripts', 'vuepstyle');
add_action('wp_enqueue_scripts', 'vuepscripts');


//Add shortscode
function vuepshortcode(){
    wp_enqueue_script('babel');
    wp_enqueue_script('transform');
    wp_enqueue_script('vue');
    wp_enqueue_script('vuep');
    wp_enqueue_script('lib');
    wp_enqueue_script('app');
    $str= "<div id='myvue'></div>";
    return $str;
}

add_shortcode( 'vuep', 'vuepshortcode' );

 ?>
