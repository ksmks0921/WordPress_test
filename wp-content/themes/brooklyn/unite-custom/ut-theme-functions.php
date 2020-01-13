<?php if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}


/**
 * Theme Icon
 *
 * @return    bolean
 *
 * @access    public
 * @since     4.3
 */
 
if ( !function_exists( 'ut_favicon' ) ) {

    function ut_favicon() {
        
        if( ot_get_option( 'ut_favicon' ) ) {
        
            $favicon      = ot_get_option( 'ut_favicon' );
            $favicon_info = pathinfo( $favicon ); 
            $type         = NULL;
            
            if( isset($favicon_info['extension']) && $favicon_info['extension'] == 'png' ) {
                $type = 'type="image/png"';
            }
            
             if( isset($favicon_info['extension']) && $favicon_info['extension'] == 'ico' ) {
                $type = 'type="image/x-icon"';
            }
            
             if( isset($favicon_info['extension']) && $favicon_info['extension'] == 'gif' ) {
                $type = 'type="image/gif"';
            }
            
            echo '<link rel="shortcut&#x20;icon" href="' . esc_url( $favicon ) . '" ' . $type. ' />';
            echo '<link rel="icon" href="' . esc_url( $favicon ) . '" ' . $type. ' />';
        
        }
                  
    }
    
}


/**
 * Theme Scroll Effect
 *
 * @return    bolean
 *
 * @access    public
 * @since     4.3
 */
 
if ( !function_exists( 'ut_scroll_effect' ) ) {

    function ut_scroll_effect() {
        
        $scrollto = ot_get_option( 'ut_scrollto_effect' );
        return !empty( $scrollto['easing'] ) ? $scrollto['easing'] : 'easeInOutExpo' ;
                  
    }
    
}



/**
 * Recognized Theme Base Font Styles
 *
 * @return    bolean
 *
 * @access    public
 * @since     2.0
 */
 
if ( !function_exists( 'ut_recognized_font_styles' ) ) {

    function ut_recognized_font_styles() {
      
      return apply_filters( 'ut_recognized_font_styles', array(
            "extralight" => "ralewayextralight",
            "light"      => "ralewaylight",
            "regular"    => "ralewayregular",
            "medium"     => "ralewaymedium",
            "semibold"   => "ralewaysemibold",
            "bold"       => "ralewaybold"        
      ) );
      
    }
    
}

/**
 * Helper Function: return true if woocommerce shop is displaying
 *
 * @return    bolean
 *
 * @access    public
 * @since     2.0
 */

if ( !function_exists( 'ut_is_shop' ) ) {
	
    function ut_is_shop() {
	
		if( function_exists('is_shop') ) {
            
            return is_shop();
        
        } else {
            
            return false;    
            
        }
		
	}
    
}


/**
 * Helper Function: Create Default Header CSS Classes
 *
 * @return    bolean
 *
 * @access    public
 * @since     4.0.3
 */

if ( !function_exists( 'ut_header_class' ) ) {
	
    function ut_header_class( $class = '' ) {
        
        $page_has_hero = get_post_meta( get_the_ID() , 'ut_activate_page_hero' , true );
        
        /* class array */
        $classes = array();
        
        if( ut_return_header_config( 'ut_header_layout', 'default' ) != 'default' ) {        
        
            $classes[] = 'hide-on-desktop';
            
        } else {
            
            /* header width */
            $classes[] = ut_return_header_config('ut_navigation_width' , 'centered');
                        
            $classes[] = ot_get_option( 'ut_site_border', 'hide' ) == 'show' ? 'bordered-navigation' : '';
            $classes[] = ot_get_option( 'ut_top_header' , 'hide' ) == 'show' ? 'bordered-top' : '';
            $classes[] = ot_get_option( 'ut_site_border', 'hide' ) == 'show' && ut_return_header_config( 'ut_site_navigation_flush', 'no' ) == 'yes' && ut_return_header_config( 'ut_navigation_width', 'centered' ) == 'fullwidth' ? 'ut-flush' : '';
            
            if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-custom' ) {
                
                if( ( is_home() || is_front_page() || is_singular('portfolio') || $page_has_hero == 'on' ) ) {
                
                    $classes[] = 'ut-primary-custom-skin';
                
                } else {
                    
                    if( ut_return_header_config('ut_navigation_customskin_state' , 'off') == 'on_switch' ) {
                    
                        $classes[] = 'ut-secondary-custom-skin';
                    
                    } else {
                        
                        $classes[] = 'ut-primary-custom-skin';
                    
                    }
                    
                }
                
                if( ut_return_header_config( 'ut_navigation_customskin_state', 'off' ) == 'off' ) {
                        
                    $classes[] = 'ha-header-hide';
                    
                }
                
            } else {
                
                /* border */
                $classes[] = ut_return_header_config( 'ut_navigation_state') == 'on_transparent' && ut_return_header_config( 'ut_navigation_transparent_border' ) == 'on' ?  'ut-header-has-border' : '';
                
                /* transparent */
                $classes[] = ( ut_return_header_config( 'ut_navigation_state' , 'off' ) == 'on_transparent' && ( is_home() || is_front_page() || is_singular('portfolio') || ( is_page() && $page_has_hero == 'on' ) ) ) ? 'ha-transparent' : ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' );
                            
                if( is_home() || is_front_page() || is_singular('portfolio') || $page_has_hero == 'on' ) {
        
                    if( ut_return_header_config( 'ut_navigation_state' , 'off' ) == 'off' ) {
                        
                        $classes[] = 'ha-header-hide';
                        
                    }
                
                }            
                            
            }
        
        }
        
        /* clean up */
        $classes = array_map( 'esc_attr', $classes );
        $classes = array_unique( $classes );
        
        /* output */                
        echo implode( ' ' , $classes );
		
	}
    
}

/**
 * Helper Function: Create Default Header CSS Classes
 *
 * @return    bolean
 *
 * @access    public
 * @since     4.0.3
 */

if ( !function_exists( 'ut_side_header_class' ) ) {
	
    function ut_side_header_class( $class = '' ) {
        
        /* class array */
        $classes = array();
        
        /* navigation skin */
        if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-dark' ) == 'ut-header-custom' ) {
            
            $classes[] = 'ut-primary-custom-skin';
            
        } else {
            
            $classes[] = ut_return_header_config( 'ut_navigation_skin' , 'ut-header-dark' );
                        
        } 
        
        if( ut_return_header_config( 'ut_side_navigation_shadow', 'off' ) == 'on' ) {
            
            $classes[] = 'bklyn-sidenav-shadow';
        
        }
        
        
        
        /* clean up */
        $classes = array_map( 'esc_attr', $classes );
        $classes = array_unique( $classes );
        
        /* output */                
        echo implode( ' ' , $classes );
		
	}
    
}

/**
 * Helper Function: Return Font Awesome Unicode
 *
 * @return    bolean
 *
 * @access    public
 * @since     4.0.3
 * @version   1.2
 */

if ( !function_exists( 'ut_get_fontawesome_unicode' ) ) {
	
    function ut_get_fontawesome_unicode( $class = '' ) {
        
        if( empty( $class ) ) {
            return false;        
        }
        
        $unicode = json_decode( include_once( THEME_DOCUMENT_ROOT . '/unite/core/admin/assets/fonts/fontawesome_unicode.php' ), true );
        
        $class = str_replace('fa fa','fa', $class);
                                
        return isset( $unicode[$class] ) ? $unicode[$class] : false;
        
	}
    
}


/**
 * Helper Function: Add Autoplay for Vimeo embed videos
 *
 * @return    bolean
 *
 * @access    public
 * @since     2.6
 * @version   1.0
 */

if( !function_exists( 'autoplay_vimeo_oembed' ) ) {

    function autoplay_vimeo_oembed( $provider, $url, $args ) {
        
        if( strpos( $provider, 'vimeo' ) !== false ) {
            $provider = esc_url_raw( add_query_arg('autoplay', 0, $provider) );
        }
        return $provider;
        
    }
    add_filter('oembed_fetch_url', 'autoplay_vimeo_oembed', 10, 3);

}

/**
 * If the specified query is a search query, then modify the post_type array
 * to support a the 'portfolio' custom post type.
 *
 * @since    1.0.0
 *
 * @param    object    $query    The current search query.
 * @return   object    $query    The modified query supporting CPTs.
 */
 
if( !function_exists( 'ut_filter_search' ) ) {

    function ut_filter_search( $query ) {
        
        if ( ! $query->is_search ) {
            return $query;
        }
        
        $query->set( 'post_type', array( 'post', 'page', 'portfolio' ) );
        
        return $query;
        
    }
    
    add_filter( 'pre_get_posts', 'ut_filter_search' );

}


/** 
 * Post Counter
 *
 * @return    string
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */

$GLOBALS['unite_post_count']      = 1;    /* do not delete! */
$GLOBALS['unite_total_count']     = NULL; /* do not delete! */
$GLOBALS['unite_post_count_left'] = NULL; /* do not delete! */

if ( ! function_exists('_unite_post_count_left') ) :
    
    function _unite_post_count_left() {
        
        global $wp_query, $unite_post_count_left, $unite_total_count;                
                
        foreach( (array) $wp_query->posts as $published ) {
            
            if( $published->post_status == 'publish' ) {
                $unite_post_count_left++;    
            }
            
        }
        
        $unite_total_count = $unite_post_count_left;

    }    
    
    add_action( 'ut_before_content_hook', '_unite_post_count_left' ); 
    
endif;


/** 
 * An internal counter to count posts up and down
 *
 * @return    void
 *
 * @access    private
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( ! function_exists('_unite_post_count') ) :
    
    function _unite_post_count() {
        
        global $wp_query, $unite_post_count, $unite_post_count_left, $unite_total_count;
                        
        $unite_post_count++;
        $unite_post_count_left--;    
        
        /* get blog style */
        $blog_layout =  apply_filters( 'unite_blog_layout', ot_get_option('ut_blog_layout', 'classic') );
                
        /* get sidebar settings */
        $sidebar_settings = ut_get_sidebar_settings();
        
        /* counter for blog grid */
        if( $blog_layout == 'grid' && isset( $sidebar_settings['align'] ) && $sidebar_settings['align'] == 'none' || $blog_layout == 'grid' && is_author() ) {
                
            $unite_post_count = ( $unite_post_count === 4 ) ? 1 : $unite_post_count;           
        
        } elseif( $blog_layout == 'grid' ) {
            
            $unite_post_count = ( $unite_post_count === 3 ) ? 1 : $unite_post_count;
        
        }
        
    }
    
    add_action( 'ut_after_article_hook', '_unite_post_count', 99 );
    
endif;


/** 
 * Creates a parent grid for gird based blog layouts
 *
 * @return    string
 *
 * @access    private
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( ! function_exists('_unite_start_parent_grid') ) :
    
    function _unite_start_parent_grid() {
        
        global $unite_post_count, $unite_post_count_left, $unite_total_count;
        
        /* get blog style */
        $blog_layout =  apply_filters( 'unite_blog_layout', ot_get_option('ut_blog_layout', 'classic') );
        
        if( $blog_layout == 'mixed-grid' ) {
            
            /* mixed grid parent */
            if( $unite_post_count == 2 ) {
            
                echo '<div class="ut-blog-grid clearfix">';
            
            }
            
        }
        
        if( $blog_layout == 'grid' ) {
                        
            /* grid parent */
            if( $unite_post_count == 1 ) {
            
                echo '<div class="ut-blog-grid clearfix">';
            
            }
            
        }
        
        if( $blog_layout == 'list-grid' ) {
            
            /* grid parent */
            if( $unite_post_count == 1 ) {
            
                echo '<div class="ut-blog-layout-list clearfix">';
            
            }
            
        }  
        
        if( $blog_layout == 'list-grid-first-full' ) {
            
            /* grid parent */
            if( $unite_post_count == 2 ) {
            
                echo '<div class="ut-blog-layout-list clearfix">';
            
            }
            
        }        
            
    }
    
    add_action( 'ut_before_article_hook', '_unite_start_parent_grid', 10 );
    
endif;
   

/** 
 * Closes the parent grid for grid based blog layouts
 *
 * @return    string
 *
 * @access    private
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( ! function_exists('_unite_close_parent_grid') ) :
    
    function _unite_close_parent_grid() {                
        
        global $unite_post_count, $unite_post_count_left, $unite_total_count;
        
        /* get blog style */
        $blog_layout =  apply_filters( 'unite_blog_layout', ot_get_option('ut_blog_layout', 'classic') );
        
        /* mixed grid count */
        if( $blog_layout == 'mixed-grid' ) {
            
            if( ( $unite_post_count - 1 ) % 2 == 0 ) {
                
                 echo '<div class="clear"></div>';
                
            }
            
            if( $unite_post_count_left == 1 && $unite_total_count > 1 ) {
                
                /* close mixed grid parent */
                echo '</div><div class="clear"></div>';
            
            }
            
        }
        
        /* get sidebar settings */
        $sidebar_settings = ut_get_sidebar_settings();
        
        /* counter for blog grid */
        if( $blog_layout == 'grid' && isset( $sidebar_settings['align'] ) && $sidebar_settings['align'] == 'none' || $blog_layout == 'grid' && is_author() ) {
            
            if( $unite_post_count == 3 || $unite_post_count_left == 1 ) {
                    
                /* close grid parent */
                echo '</div><div class="clear"></div>';
            
            }        
        
        } elseif( $blog_layout == 'grid' ) {
                                                                                     
            if( $unite_post_count == 2 || $unite_post_count_left == 1 ) {
                    
                /* close grid parent */
                echo '</div><div class="clear"></div>';
            
            }
            
        }
        
        if( $blog_layout == 'list-grid-first-full' || $blog_layout == 'list-grid' ) {
            
            if( $unite_post_count_left == 1 ) {
                
                /* close list grid parent */
                echo '</div><div class="clear"></div>';
            
            }
        
        }
        
    }
    
    add_action( 'ut_after_article_hook', '_unite_close_parent_grid', 10 );
    
endif;

/** 
 * Return the path for the current article inside our main loop
 *
 * @return    string
 *
 * @access    private
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( ! function_exists('unite_get_template_path') ) :
    
    function unite_get_template_path() {
        
        global $unite_post_count, $unite_post_count_left, $unite_total_count;
        
        /* get blog style */
        $blog_layout =  apply_filters( 'unite_blog_layout', ot_get_option('ut_blog_layout', 'classic') );
        
        $path = '';
        
        /* return path for mixed grid blog */
        if( $blog_layout == 'mixed-grid' ) {
            
            if( $unite_post_count == 1 ) {
                
                $path = 'blog-mixed-grid/large';
                
            } else {
                
                $path = 'blog-mixed-grid/small';
            
            }
            
        }
        
        /* return path for grid blog */
        if( $blog_layout == 'grid' ) {
            
            $path = 'blog-grid';
        
        }
        
        /* return path for grid sortable blog */
        if( $blog_layout == 'grid-sortable' ) {
            
            $path = 'category-sortable-grid';
        
        }
        
        /* return path for classic blog */
        if( $blog_layout == 'classic' ) {
        
            $path = 'blog';
        
        }  
        
        /* return path for list blog */
        if( $blog_layout == 'list-grid' ) {
        
            $path = 'blog-list';
        
        }       
        
        /* return path for list blog with first post full */
        if( $blog_layout == 'list-grid-first-full' ) {
            
            if( $unite_post_count == 1 ) {
                
                $path = 'blog-list/large';
                
            } else {
                
                $path = 'blog-list';
            
            }
        
        }
        
        return apply_filters( 'unite_template_path', $path );
                
        
    }

endif;

/** 
 * Retuns size for blog-grid article
 *
 * @param     $extraclass ( optional )
 * @return    string
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */
if ( ! function_exists('ut_get_article_size') ) :

    function ut_get_article_size( $extra_class = '' ) {
        
        /* get sidebar settings */
        //$sidebar_settings = ut_get_sidebar_settings(); 
        
        /* default size */
        $grid = 'grid-50 tablet-grid-50 mobile-grid-100';
                        
        /* no sidebar - we use 3 column layout  */
        if( isset( $sidebar_settings['align'] ) && $sidebar_settings['align'] == 'none' || is_author() ) {
                                    
            $grid = 'grid-33 tablet-grid-33 mobile-grid-100';
            
        } 
        
        return $grid . ' ' . $extra_class;
        
    }

endif;


/**
 * Create Picturefill 
 *
 * @access    public 
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( ! function_exists( 'ut_create_picture' ) ) :

    function ut_create_picture( $post_id = NULL, $args ) { 
    
        global $post;
      
        $post_id = ( $post_id == NULL ) ? $post->ID : $post_id;    
        
        /* get post thumbnail first */
        $post_thumbnail = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); 
        $extension      = pathinfo( $post_thumbnail, PATHINFO_EXTENSION); ?>
        
        <picture title="<?php echo wp_strip_all_tags( get_the_title( $post_id ) ); ?>">
            
            <!--[if IE 9]><video style="display: none;"><![endif]-->    
            <?php if( !empty( $args['devices'] ) && is_array( $args['devices'] ) ) : ?>
                
                <?php foreach( $args['devices'] as $device ) :?>
                    
                    <?php 
                        
                        $image  = NULL;
                        $image  = unite_resize( $post_thumbnail, $device[0] , $device[1], true, true, true );
                        $retina = str_replace('.'.$extension, '@2x.'.$extension, $image );
                    
                    ?>
                    
                    <source srcset="<?php echo esc_url( $image ); ?>, <?php echo esc_url( $retina ); ?> 2x" media="(<?php echo $device[2]; ?>)">
                
                <?php endforeach; ?>
                
            <?php endif; ?>
            
            <?php $desktop  = unite_resize( $post_thumbnail, $args['desktop'][0] , $args['desktop'][1], true, true, true ); ?>
            
            <!--[if IE 9]></video><![endif]-->    
            <img src="<?php echo THEME_WEB_ROOT; ?>/img/placeholder.png" class="lazyload" srcset="<?php echo esc_url( $desktop ); ?>" alt="<?php echo wp_strip_all_tags( get_the_title( $post_id ) ); ?>">
            
        </picture>
        
    <?php }
    
endif;


/**
 * Create Valid Slug for hidden anchors 
 *
 * @access    public 
 * @since     4.2.3
 * @version   1.0.0
 */
 
if ( ! function_exists( 'ut_create_slug' ) ) :

    function ut_create_slug( $title ) {
        
        /* remove special characters */
        $slug = preg_replace( '/[^a-zA-Z ]+/', '', $title );
        
        /* remove numbers */
        $slug = preg_replace( '/[0-9]+/', '', $slug );
        
        /* remove whitespaces  */
        $slug = trim( $slug );
        $slug = preg_replace("/[\s_]/", "-", $slug);
        
        /* make lowercase */
        $slug = strtolower($slug);
        
        /* remove last dash if necessary */
        $slug = rtrim( $slug, "-" );
        
        return $slug;
        
    }

endif;
