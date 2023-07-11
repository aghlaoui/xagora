<?php
/*
Plugin Name: Embed Vid
Plugin URI: 
Description: This plugin allows you to embed videos easily.
Version: 1.0
Author: Zakarya Aghlaoui
Author URI: 
License: GPLv2 or later
Text Domain: xagora
*/

add_action('acf/init', 'acf_embed_creating');
function acf_embed_creating()
{
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type(array(
            'name'              => 'Embep Video',
            'title'             => __('EmbedVid'),
            'description'       => __('a test embed video'),
            'render_template'   => plugin_dir_path(__FILE__) . 'template-parts/embed-block.php',
            'category'          => 'formatting',
        ));
    }

    add_action('enqueue_block_editor_assets', 'acf_embed_editor_assets');
}

function acf_embed_editor_assets()
{
    wp_enqueue_style('icons-fa', plugin_dir_url(__FILE__) . 'src/icons-fa.min.css');
    wp_enqueue_style('acf-embed-editor-style', plugin_dir_url(__FILE__) . 'src/style.css', array(), '1.0');
}
