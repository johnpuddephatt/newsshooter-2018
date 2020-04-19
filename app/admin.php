<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});



add_action('admin_init', 'App\sitewidebanner');

function sitewidebanner() {
    add_settings_section(
        'sitewidebanner_section', // Section ID
        'Site wide banner', // Section Title
        'App\sitewidebanner_section_callback', // Callback
        'general' // What Page?  This makes the section show up on the General Settings Page
    );

    add_settings_field( // Option 1
        'sitewidebanner', // Option ID
        'Banner text', // Label
        'App\sitewidebanner_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'sitewidebanner_section', // Name of our section
        array( // The $args
            'sitewidebanner' // Should match Option ID
        )
    );

    add_settings_field( // Option 1
        'sitewidebanner_link_text', // Option ID
        'Banner link text', // Label
        'App\sitewidebanner_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'sitewidebanner_section', // Name of our section
        array( // The $args
            'sitewidebanner_link_text' // Should match Option ID
        )
    );

    add_settings_field( // Option 1
        'sitewidebanner_link_url', // Option ID
        'Banner link URL', // Label
        'App\sitewidebanner_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'sitewidebanner_section', // Name of our section
        array( // The $args
            'sitewidebanner_link_url' // Should match Option ID
        )
    );


    register_setting('general','sitewidebanner', 'esc_attr');
    register_setting('general','sitewidebanner_link_url', 'esc_attr');
    register_setting('general','sitewidebanner_link_text', 'esc_attr');

}

function sitewidebanner_section_callback() { // Section Callback
    echo '<p>Enter a message to be displayed on all pages.</p>';
}

function sitewidebanner_callback($args) {  // Textbox Callback
    $option = get_option($args[0]);
    echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
}
