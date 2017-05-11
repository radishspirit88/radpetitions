<?php
/*
Plugin Name: Rad Petitions
Plugin URI:  https://github.com/radishspirit88/radpetitions
Description: A rad petition system plugin for WordPress that does not require User accounts.
Version:     1.0.0
Author:      Radish Spirit
Author URI:  https://github.com/radishspirit88
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

function radpets_setup_post_type()
{
    // register the "petition" custom post type
    register_post_type( 'petition', ['public' => 'true'] );
}
add_action( 'init', 'radpets_setup_post_type' );

function radpets_install()
{
    // trigger our function that registers the custom post type
    radpets_setup_post_type();

    // clear the permalinks after the post type has been registered
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'radpets_install' );

function radpets_deactivation()
{
    // our post type will be automatically removed, so no need to unregister it

    // clear the permalinks to remove our post type's rules
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'radpets_deactivation' );