<?php
/**
 * Plugin Name: Answer Engine Optimization for ChatGPT, Gemini, AI & AEO
 * Plugin URI: https://supersharpai.com/answer-engine-optimization-aeo-wordpress-plugin
 * Description: Optimize Your Content for AI Answer Engines. Auto-generate FAQs and Quick Answer blocks with OpenAI, show AI optimization status, and output FAQ JSON-LD schema.
 * Version: 1.0
 * Author: SuperSharpAI.com
 * Text Domain: make-website-aeo-ai-ready
 * Author URI: http://supersharpai.com/
 * License: GPL2
 * Requires at least: 5.0
 * Requires PHP: 7.1
 */

// ===== Admin Settings =====

 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action('admin_menu', function () {
    add_options_page('Answer Engine Optimization - Settings', 'Answer Engine Optimization - Settings', 'manage_options', 'make-website-aeo-ai-ready', 'mwaar_content_optimizer_settings_page');
});
add_filter('plugin_action_links_make-website-aeo-ai-ready/make-website-aeo-ai-ready.php', 'mwaar_add_plugin_action_links');

add_action('admin_init', function () {
    register_setting('mwaar_content_optimizer_options', 'mwaar_content_optimizer_api_key', array(
			'type'              => 'string',
			'show_in_rest'      => true,
			'sanitize_callback' => 'sanitize_text_field',
		));
    register_setting('mwaar_content_optimizer_options', 'mwaar_content_optimizer_model', array(
			'type'              => 'string',
			'show_in_rest'      => true,
			'sanitize_callback' => 'sanitize_text_field',
		));
    register_setting('mwaar_content_optimizer_options', 'mwaar_content_optimizer_endpoint', array(
			'type'              => 'string',
			'show_in_rest'      => true,
			'sanitize_callback' => 'sanitize_text_field',
		));
});

function mwaar_add_plugin_action_links($links) {
    $custom_links = array(
        '<a href="' . admin_url('post-new.php?post_type=page') . '" style="color:#46b450;font-weight:bold;">' . __('Start Working', 'make-website-aeo-ai-ready') . '</a>',
        
        '<a href="' . esc_url('https://supersharpai.com/answer-engine-optimization-toolkit/') . '" style="font-weight:bold;" target="_blank" >' . __('More info', 'make-website-aeo-ai-ready') . '</a>'
    );

    return array_merge($custom_links, $links);
}

add_action('admin_enqueue_scripts', 'mwaar_enqueue_admin_assets');

?>