<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'font-awesome','simple-line-icons','oceanwp-style' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

function add_admin_link( $items, $args ) {
    if ( is_user_logged_in() && $args->theme_location == 'main_menu' ) {
        // Trouvez l'endroit où vous voulez insérer le lien (par exemple, après le 2ème élément)
        $pos = strpos($items, '</li>', 2);
        if ($pos !== false) {
            // Découpez la chaîne en deux parties
            $part1 = substr($items, 0, $pos + 5); // +5 pour inclure la balise de fermeture </li>
            $part2 = substr($items, $pos + 5);
            // Ajoutez votre nouveau lien
            $new_link = '<li><a href="'. get_admin_url() .'">Admin</a></li>';
            // Concaténez les parties du menu avec le nouveau lien
            $items = $part1 . $new_link . $part2;
        }
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'add_admin_link', 10, 2 );

// END ENQUEUE PARENT ACTION
