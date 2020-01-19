<?php

/**
 * @package slideReal
 */
/*
Plugin Name: Slider Real
Plugin URI: https://mzielinski.pl
Description: Slider for real page
Version: 1.0.0
Author: mzielinski.pl
Author URI: https://mzielinski.pl
Licence: MIT
Text Domain: sliderReal
 */

if(!defined('ABSPATH')) {

    die;
}

class sliderReal {

    function __construct()
    {
        add_action('init',array( $this, 'custom_post_type'));
        add_action('wp_insert_post', array($this,'set_default_custom_fields'));
        add_shortcode( 'sliderWithBG', array($this,'sliderWithBG_shortcode'));
        add_shortcode( 'sliderWithoutBG', array($this,'sliderWithoutBG_shortcode'));

    }

    function activate() {
        flush_rewrite_rules();
        $this->custom_post_type();

    }

    function deactivate() {
        flush_rewrite_rules();
    }

    function uninstall() {

    }

    function custom_post_type() {
        register_post_type('Slides',[
            'public'=>true,
            'supports' => array(
            'title',
            'author',
            'thumbnail',
            'custom-fields',
            'post-formats'),
            'labels' => array(
                'name'               => __( 'Slides',                   'titlename' ),
                'singular_name'      => __( 'Slides',                   'name' ),
                'menu_name'          => __( 'Slides',                   'menuname' ),
                'name_admin_bar'     => __( 'Slides',                   'adminname' ),
                'add_new'            => __( 'Dodaj nowy',               'addnewSlide' ),
                'add_new_item'       => __( 'Dodaj nowy slide',         'aaddnewSlide' ),
                'edit_item'          => __( 'Edytuj slide',             'example-textdomain' ),
                'new_item'           => __( 'Nowy slide',               'example-textdomain' ),
                'view_item'          => __( 'Podgląd slide',            'example-textdomain' ),
                'search_items'       => __( 'Szukaj slidów',            'example-textdomain' ),
                'not_found'          => __( 'Brak slidów',              'example-textdomain' ),
                'not_found_in_trash' => __( 'Brak slidów w koszu',      'example-textdomain' ),
                'all_items'          => __( 'Wszystkie slidy',          'example-textdomain' ),
            )
        ]);

    }

    function sliderWithBG_shortcode() {
        require('sliderWithBG.php');
    }

    function sliderWithoutBG_shortcode() {
        require('sliderWithoutBG.php');
    }


    function set_default_custom_fields($post_id){
        if ( isset($_GET['post_type']) && $_GET['post_type'] == 'slides' ) {
            add_post_meta($post_id, 'Tekst', '', true);
            add_post_meta($post_id, 'URL oferty', '', true);
            add_post_meta($post_id, 'URL obrazka przezroczystego', '', true);
        }
        return true;
    }


}

if(class_exists('sliderReal')) {
    $slider = new sliderReal();
}

register_activation_hook(__FILE__, array($slider, 'activate'));
register_deactivation_hook(__FILE__, array($slider, 'deactivate'));
