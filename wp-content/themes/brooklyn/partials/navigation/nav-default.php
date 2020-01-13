<?php

$flush_nav = ( ot_get_option( 'ut_site_border', 'hide' ) == 'show' && ot_get_option( 'ut_site_navigation_flush', 'no' ) == 'yes' ) && ut_return_header_config( 'ut_navigation_width', 'centered' ) == 'fullwidth' ? 'ut-flush-nav' : '';

$menu = array(
    'echo'              => false,
    'container'         => 'nav',
    'container_id'      => 'navigation',
    'fallback_cb'         => 'ut_default_menu',
    'container_class'   => 'grid-85 hide-on-tablet hide-on-mobile ' . $flush_nav . '',
    'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'theme_location'    => 'primary', 
    'walker'            => new ut_menu_walker()
);

if ( has_nav_menu( 'primary' ) ) {
    
    /* main navigation */
    echo wp_nav_menu( $menu );
    
}