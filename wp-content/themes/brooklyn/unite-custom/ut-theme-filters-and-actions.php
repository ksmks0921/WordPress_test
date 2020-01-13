<?php if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}

/**
 * Hero State
 */

if ( ! function_exists( 'ut_hero_state' ) ) :

    function ut_hero_state() {
        
        /* onepage front page and blog always do have a hero */
        if( is_front_page() && ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' || is_home() && ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) {
            return true;            
        }

        /* no hero support for posts yet */
        if( is_single() && !is_singular('portfolio') ) {
            return false;
        } 
        
        /* sytem pages with hero support */
        if( is_search() || is_404() || is_archive() ) {
            return true;
        }
        
        /* check if current page has an active hero */
        $current = get_queried_object();
                
        if( isset( $current->ID ) && get_post_meta( $current->ID , 'ut_activate_page_hero' , true ) == 'on' ) {
            
            return true;
        }

        return false;
    
    }
    
    add_filter( 'ut_show_hero', 'ut_hero_state' );
    
endif;



/**
 * Change Blog Layout by URL
 */

if ( ! function_exists( 'change_blog_layout_by_url' ) ) :

    function change_blog_layout_by_url( $layout ) {
        
        global $ajax_blog_layout;
        
        $layouts = array(
            'classic',
            'mixed-grid',
            'grid',
            'list-grid',
            'list-grid-first-full'
        );        
        
        if( isset( $_GET['home_layout'] ) && in_array( $_GET['home_layout'], $layouts ) ) {            
            
            $layout = $_GET['home_layout'];
            
        }
        
        if( isset( $ajax_blog_layout ) && in_array( $ajax_blog_layout, $layouts ) ) {
            
            $layout = $ajax_blog_layout;
            
        }

        return $layout;
    
    }
    
    add_filter( 'unite_blog_layout', 'change_blog_layout_by_url', 90 );
    
endif;



/**
 * Activate Hero by URL
 */

if ( ! function_exists( 'change_hero_by_url' ) ) :

    function change_hero_by_url( $status ) {
        
        if( isset( $_GET['hero'] ) && $_GET['hero'] == 'on' ) {
            return true;
        }
        
        if( isset( $_GET['hero'] ) && $_GET['hero'] == 'off' ) {
            return false;
        }

        return $status;
    
    }
    
    add_filter( 'ut_show_hero', 'change_hero_by_url', 90 );
    
endif;



/**
 * Activate / Deactive Sidebar by URL
 */

if ( ! function_exists( 'change_sidebar_by_url' ) ) :

    function change_sidebar_by_url( $status ) {
        
        if( isset( $_GET['sidebar'] ) && $_GET['sidebar'] == 'off' ) {
            return false;
        }

        return $status;
    
    }
    
    add_filter( 'ut_show_sidebar', 'change_sidebar_by_url', 90 );
    
endif;


/**
 * Excerpt Length List Grid without Sidebar
 */

if ( ! function_exists( 'change_excerpt_list_grid_by_url' ) ) :

    function change_excerpt_list_grid_by_url( $length ) {
        
        if( isset( $_GET['sidebar'] ) && $_GET['sidebar'] == 'off' && isset( $_GET['home_layout'] ) && $_GET['home_layout'] == 'list-grid' ) {
            return 70;
        }

        return $length;
    
    }
    
    add_filter( 'ut_blog_list_excerpt_length', 'change_excerpt_list_grid_by_url', 90 );
    
endif;








/**
 * Page Title
 *
 * @access    public 
 * @version   1.0.0
 */ 
 
if( !function_exists('ut_page_title') ) :

    function ut_page_title() { 
        
        global $wp_version;
        
        if ( $wp_version <= 4.1 ) { ?>
            
            <title><?php echo wp_title( '|', true, 'right' ); ?></title>
        
        <?php }
        
    }

    add_action('ut_meta_theme_hook', 'ut_page_title' );
    
endif;


/**
 * Page Title Separator
 *
 * @access    public 
 * @since     4.2.0
 * @version   1.0.0
 */ 

if( !function_exists('ut_page_title_separator') ) :

    function ut_page_title_separator( $sep ) {
    
        $sep = "|";
    
        return $sep;
    
    }
    
    add_filter( 'document_title_separator', 'ut_page_title_separator' );

endif;


/**
 * Extra Classs For Body
 *
 * @access    public 
 * @since     1.0.0
 * @version   1.0.0
 */ 
 
if ( ! function_exists( 'ut_body_classes' ) ) :

    function ut_body_classes( $classes ) {
        
        if( ot_get_option( 'ut_site_border', 'hide' ) == 'show' ) {
            $classes[] = 'ut-site-border';
        }
        
        if( ot_get_option( 'ut_top_header', 'hide' ) == 'show' ) {
            $classes[] = 'ut-has-top-header';
        }
        
        if( !apply_filters( 'ut_show_hero', false ) ) {
            $classes[] = 'has-no-hero';
        }
        
        if( is_home() && !ut_return_hero_config('ut_hero_type') ) {
            $classes[] = 'has-no-hero';
        }        
        
        if( ut_return_header_config( 'ut_header_layout', 'default' ) == 'side' ) {
            $classes[] = 'ut-has-bklyn-sidenav';
        }
        
        if( apply_filters( 'ut_maintenance_mode_active', false ) ) {
            $classes[] = 'ut-bklyn-maintenance';
        } 
        
        if( ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) {
            
            $classes[] = 'ut-bklyn-onepage';        
            
        } else {
        
            $classes[] = 'ut-bklyn-multisite';    
        
        }
                    
        return $classes;        
        
    }
    
    add_filter( 'body_class', 'ut_body_classes' );
    
endif;


/**
 * Loader Overlay Markup
 *
 * @access    public 
 * @since     4.1.0
 * @version   1.0.1
 */ 
 
if ( ! function_exists( 'ut_loader_overlay' ) ) :

    function ut_loader_overlay( $classes ) {
        
        if( ot_get_option( 'ut_use_image_loader' ) == 'on' ) {
					
            if( ut_dynamic_conditional( 'ut_use_image_loader_on' ) ) {
        
                echo '<div class="ut-loader-overlay"></div>';
                echo '<div id="qLoverlay"><div class="ut-inner-overlay"></div></div>';
            
            }
        
        }
        

        
        
    }
    
    add_action( 'ut_before_header_hook', 'ut_loader_overlay' );
    
endif;



/**
 * Delete Category Transient
 *
 * @access    public 
 * @since     1.0
 * @version   1.0
 */ 

if ( ! function_exists( 'unitedthemes_category_transient_flusher' ) ) : 
 
    function unitedthemes_category_transient_flusher() {
        // Like, beat it. Dig?
        delete_transient( 'all_the_cool_cats' );
    }
    
    add_action( 'edit_category', 'unitedthemes_category_transient_flusher' );
    add_action( 'save_post',     'unitedthemes_category_transient_flusher' );

endif;


/**
 * fix wordpress w3c rel
 *
 * @access    public 
 * @since     1.0
 * @version   1.0
 */ 

if( !function_exists('ut_replace_cat_tag') ) {
    
    function ut_replace_cat_tag ( $text ) {
        
        $text = preg_replace('/rel="category tag"/', 'data-rel="category tag"', $text); return $text;
        
    }
    
    add_filter( 'the_category', 'ut_replace_cat_tag' );
    
}


/**
 * add editor styles
 *
 * @access    public 
 * @since     1.0
 * @version   1.0
 */ 

if ( !function_exists( 'ut_add_editor_styles' ) ) {

    function ut_add_editor_styles() {
        
        add_editor_style( 'ut-editor.css' );
        
    }
    
    add_action( 'init', 'ut_add_editor_styles' );
    
}


/**
 * Side Navigation Content Wrap Open
 *
 * @access    public 
 * @version   4.2.0
 */ 
 
if( !function_exists('ut_side_navigation_content_wrap_open') ) :

    function ut_side_navigation_content_wrap_open() { 
        
        if( ut_return_header_config( 'ut_header_layout', 'default' ) != 'side' ) {
            return;
        }        
        
        echo '<div id="bklyn-sidenav-content-wrap">';        
        
    }

    add_action('ut_before_header_hook', 'ut_side_navigation_content_wrap_open' );
    
endif;

/**
 * Side Navigation Content Wrap Close
 *
 * @access    public 
 * @version   4.2.0
 */ 
 
if( !function_exists('ut_side_navigation_content_wrap_close') ) :

    function ut_side_navigation_content_wrap_close() { 

        if( ut_return_header_config( 'ut_header_layout', 'default' ) != 'side' ) {
            return;
        }
        
        echo '</div>';
        
    }

    add_action('ut_after_footer_hook', 'ut_side_navigation_content_wrap_close' );
    
endif;



/*
 * Change Category Blog Layout
 *
 * @access    public 
 * @since     4.2.0
 * @version   1.0.0
 */
           
if ( ! function_exists( 'search_blog_layout' ) ) :

    function search_blog_layout( $layout ) {
        
        if( is_search() || is_archive() ) {
            
            $layout = 'grid';
            
        }
        
        return $layout;
    
    }
    
    add_filter( 'unite_blog_layout', 'search_blog_layout', 90 );
    
endif;

