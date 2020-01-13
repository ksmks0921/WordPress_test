<?php

/**
 * Meta Boxes
 */

/* main meta panel */
include( THEME_DOCUMENT_ROOT . '/admin/metaboxes/ut-metaboxes.php' );

/* side metaboxes */
include( THEME_DOCUMENT_ROOT . '/admin/metaboxes/ut-metabox-portfolio-settings.php' );
include( THEME_DOCUMENT_ROOT . '/admin/metaboxes/ut-metabox-sidebar-settings.php' );

/* post format tools */
include( THEME_DOCUMENT_ROOT . '/admin/metaboxes/ut-metabox-post-format-settings.php' );
include( THEME_DOCUMENT_ROOT . '/admin/metaboxes/ut-metabox-post-format-manager.php' );


/** 
 * Dashboard Body Class
 *
 * @return    string
 *
 * @access    private
 * @since     4.1
 * @version   1.0.0
 */
if( !function_exists( '_ut_dashboard_bodyclass' ) ) {
    
    function _ut_dashboard_bodyclass( $classes ){
        
        $classes = explode(' ', $classes);
        
        if( isset( $_GET['page'] ) && ( $_GET['page'] == 'ut_theme_options' || $_GET['page'] == 'ut-demo-importer' || $_GET['page'] == 'unite-theme-info' || $_GET['page'] == 'unite-welcome-page' || $_GET['page'] == 'unite-video-tutorials' ) ) {
            
            $classes[] = 'ut-theme-backend';
        
        }
        
        if( isset( $_GET['page'] ) && $_GET['page'] == 'unite-theme-info' ) {
            
            $classes[] = 'ut-theme-info-page';
            
        }
        
        if( isset( $_GET['page'] ) && $_GET['page'] == 'ut-demo-importer' ) {
            
            $classes[] = 'ut-demo-importer-page';
            
        }
        
        if( isset( $_GET['page'] ) && $_GET['page'] == 'unite-welcome-page' ) {
            
            $classes[] = 'ut-welcome-page';
            
        }
        
        if( isset( $_GET['page'] ) && $_GET['page'] == 'unite-video-tutorials' ) {
            
            $classes[] = 'ut-video-tutorials-page';
            
        }
        
        if( isset( $_GET['page'] ) && $_GET['page'] == 'ut_theme_options' ) {
            
            $classes[] = 'ut-theme-options-page';
            
        }
        
        
        
        
        return implode(' ', $classes);
      
    }
    
    add_filter( 'admin_body_class', '_ut_dashboard_bodyclass' );

}


/**
 * Dashboard Custom Order
 *
 * @return    array
 *
 * @since     4.2
 * @version   1.0.0
 */
 
if ( ! function_exists( '_ut_dashboard_custom_order' ) ) :

    function _ut_dashboard_custom_order( $menu_ord )  {
       
        global $submenu;
    
        $arr = array();
        $arr[] = $submenu['unite-welcome-page'][0]; 
        $arr[] = $submenu['unite-welcome-page'][5];
        $arr[] = $submenu['unite-welcome-page'][1];
        $arr[] = $submenu['unite-welcome-page'][3];
        $arr[] = $submenu['unite-welcome-page'][2];
        $arr[] = $submenu['unite-welcome-page'][4];
        
        $submenu['unite-welcome-page'] = $arr;
    
        return $menu_ord;
        
    }
    
    add_filter( 'custom_menu_order', '_ut_dashboard_custom_order' );

endif;



/**
 * Enhanced Gallery Settings
 *
 * @return    array
 *
 * @since     4.2
 * @version   1.0.0
 */

if ( ! function_exists( 'ut_create_gallery_options' ) ) :

    function ut_create_gallery_options() {
        
        ob_start(); ?>
        
        <script type="text/html" id="tmpl-ut-gallery-setting">
            
            <div class="clear"></div>
            <h3><?php esc_html_e('Lightbox Option' , 'unitedthemes'); ?></h3>
            
            <label class="setting">

                <span><?php esc_html_e('Lightbox' , 'unitedthemes'); ?></span>
                  
                <select data-setting="ut_gallery_lightbox">
                    <option value="off"><?php esc_html_e('Off' , 'unitedthemes'); ?></option>
                    <option value="on"><?php esc_html_e('On' , 'unitedthemes'); ?></option>
                </select>
                  
                <p> esc_html_e('Please make sure you are linking to the "Media File" when turning this option "on". See "Link to" Option above!' , 'unitedthemes'); ?></p>
              
            </label>
            
            <div class="clear"></div>
            <h3><?php esc_html_e('Image Border' , 'unitedthemes'); ?></h3>
            
            <label class="setting">
            <span><?php esc_html_e('Image Border' , 'unitedthemes'); ?></span>
                  
                <select data-setting="ut_image_border">
                    <option value="off"><?php esc_html_e('Off' , 'unitedthemes'); ?></option>
                    <option value="on"><?php esc_html_e('On' , 'unitedthemes'); ?></option>
                </select>
            
            </label>
            
            <label class="setting">
                
                <span><?php esc_html_e('Radius' , 'unitedthemes'); ?></span>                 
                <input type="text" data-setting="ut_image_border_radius">
                <div class="clear"></div>
                <p><?php esc_html_e('Please insert a value in pixel: e.g. "3px".' , 'unitedthemes'); ?></p>
                
            </label>
            
        </script>
        
        <script type="text/javascript">
            
            jQuery(document).ready(function(){

              _.extend(wp.media.gallery.defaults, {
                ut_gallery_lightbox: 'off',
                ut_image_border: 'off',
                ut_image_border_radius: '0'
              });
        
              wp.media.view.Settings.Gallery = wp.media.view.Settings.Gallery.extend({
                template: function(view){
                    return wp.media.template('gallery-settings')(view)
                        + wp.media.template('ut-gallery-setting')(view);
                    }
                });
        
            });
        
        </script>
        
        <?php echo ob_get_clean();
    
    }
        
    add_action('print_media_templates','ut_create_gallery_options');

endif; 






/**
 * Update Page Settings Tabs ( One Page Setting )
 */

if ( ! function_exists( 'ut_update_page_type' ) ) :

    function ut_update_page_type( $menu_data ) {
        
        $menu_object = wp_get_nav_menu_items( $menu_data );
        
        /* no menu, leave here  */
        if( ! $menu_object ) {
            return false;
        }
        
        foreach ( (array) $menu_object as $key => $menu_item ) {
                    
            update_post_meta( $menu_item->object_id, 'ut_page_type', $menu_item->menutype );    
                
        }
        
    }
    
    if( ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) {

        add_action( 'wp_update_nav_menu', 'ut_update_page_type', 90, 1 );
    
    }
    
endif;

/** 
 * Add Column View CSS
 *
 * @return    string
 *
 * @access    private
 * @since     4.0
 * @version   1.0.0
 */
 
if( !function_exists( '_ut_page_column_type_scripts' ) ) {

    function _ut_page_column_type_scripts() {
        
        wp_enqueue_style(
            'ut-column-views',
            THEME_WEB_ROOT . '/admin/assets/css/ut-column-views.css'
        );
        
        wp_enqueue_script(
            'ut-column-views-js', 
            THEME_WEB_ROOT . '/admin/assets/js/ut-column-views.js',
            array('jquery')
        );      
        
    }
    
    add_action('admin_print_styles-edit.php', '_ut_page_column_type_scripts');

}

/** 
 * Add new column to WordPress Posts Dashbaord
 *
 * @return    string
 *
 * @access    private
 * @since     4.0
 * @version   1.0.0
 */
if( !function_exists( '_ut_page_column_type' ) ) {
    
    function _ut_page_column_type( $defaults ){

        $defaults['page_type']  = esc_html__( 'Type', 'unitedthemes' );
        return $defaults; 
      
    }
    
    if( ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) {
    
        add_filter( 'manage_pages_columns', '_ut_page_column_type' );
    
    }

}

/** 
 * Add Page Type to columns inside WordPress Posts Dashbaord
 *
 * @return    int
 *
 * @access    private
 * @since     4.0
 * @version   1.0.0
 */
if( !function_exists( '_ut_page_custom_column_type' ) ) {

    function _ut_page_custom_column_type( $column_name, $id ){
                
        if( $column_name === 'page_type' ) {
            
            $type = get_post_meta( get_the_ID(), 'ut_page_type', true );
            
            if( $type == 'section' && get_the_ID() != get_option('page_for_posts') && get_the_ID() != get_option('page_on_front') ) {
                
                echo '<span class="ut-page-type section">' . esc_html__( 'section', 'unitedthemes' ) . '</span>';
                
            } else {
                
                echo '<span class="ut-page-type page">' . esc_html__( 'page', 'unitedthemes' ) . '</span>';
                
            }            
        
        }        
        
    }
    
    if( ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) {
    
        add_action( 'manage_pages_custom_column', '_ut_page_custom_column_type', 5, 2 );
    
    }
    
}

/** 
 * Adjust Typography Field
 *
 * @return    array
 *
 * @access    private
 * @since     4.0
 * @version   1.0.0
 */
if( !function_exists( '_ut_typography_settings' ) ) {

    function _ut_typography_settings( $font_settings, $field_id ){
            
        if( $field_id == 'ut_global_headline_font_style_settings' || $field_id == 'ut_csection_header_font_style_settings' || $field_id == 'ut_csection_lead_font_style_settings' ) {
            
            $font_settings = array_diff( $font_settings, array('font-family', 'font-weight') );
                    
        }
        
        if( $field_id == 'ut_global_page_headline_font_style_settings' ) {
            
            $font_settings = array_diff( $font_settings, array('font-family', 'font-weight') );
                    
        }
        
        if( $field_id == 'ut_image_loader_font' || $field_id == 'ut_image_loader_percentage_font' ) {
            
            $font_settings = array_diff( $font_settings, array( 'line-height' ) );
                    
        }
        
        if( $field_id == 'ut_image_loader_percentage_font' ) {
            
            $font_settings = array_diff( $font_settings, array( 'text-transform','font-variant' ) );
                    
        }
        
        if( $field_id == 'ut_global_navigation_submenu_font_style' ) {
            
            $font_settings = array_diff( $font_settings, array( 'font-family', 'letter-spacing', 'font-variant', 'line-height' ) );
                    
        }
        
        if( $field_id == 'ut_global_mobile_navigation_font_style' || $field_id == 'ut_global_mobile_navigation_sub_font_style' ) {
            
            $font_settings = array_diff( $font_settings, array( 'font-family', 'font-style', 'letter-spacing', 'font-variant', 'line-height', 'text-decoration' ) );
                    
        }
        
        if( $field_id == 'ut_global_navigation_websafe_font_style' || $field_id == 'ut_global_navigation_google_font_style' ) {
            
            $font_settings = array_diff(  $font_settings, array( 'line-height', 'font-variant', 'letter-spacing' ) );
        
        }
        
        if( $field_id == 'ut_global_blog_titles_font_style' || $field_id == 'ut_global_blog_single_titles_font_style' ) {
            
            $font_settings = array_diff(  $font_settings, array( 'font-family', 'font-style', 'letter-spacing', 'font-variant', 'line-height', 'text-decoration', 'font-weight' ) );
        
        }
        
        if( $field_id == 'ut_global_header_text_logo_websafe_font_style' ) {
            
            $font_settings = array_diff(  $font_settings, array( 'font-family', 'font-style', 'letter-spacing', 'font-variant', 'line-height', 'text-decoration', 'font-size', 'text-transform' ) );
        
        }
        
        if( $field_id == 'ut_global_content_widgets_websafe_font_style' || $field_id == 'ut_single_blockquote_websafe_font_style' ) {
            
            $font_settings = array_diff(  $font_settings, array( 'font-family', 'font-style', 'letter-spacing', 'font-variant', 'line-height', 'text-decoration', 'text-transform', 'font-weight' ) );
        
        }
        
        if( $field_id == 'ut_global_hero_catchphrase_websafe_font_style' || $field_id == 'ut_front_catchphrase_websafe_font_style' || $field_id == 'ut_blog_catchphrase_websafe_font_style' || $field_id == 'ut_page_caption_description_websafe_font_style' ) {
            
            $font_settings = array_diff(  $font_settings, array( 'font-family', 'font-style', 'font-variant', 'line-height', 'text-decoration' ) );    
        
        }
        
        return $font_settings;        
    
    }
    
    add_filter( 'ot_recognized_typography_fields', '_ut_typography_settings', 10, 2 );
    
}

/** 
 * Adjust Font Size Field
 *
 * @return    array
 *
 * @access    private
 * @since     4.0
 * @version   1.0.0
 */
if( !function_exists( '_ut_typography_font_sizes' ) ) {

    function _ut_typography_font_sizes( $font_size, $field_id ){
        
        if( $field_id == 'ut_image_loader_font' || $field_id == 'ut_image_loader_percentage_font' ) {
            
            $font_size = 30;
                    
        }
        
        if( $field_id == 'ut_global_navigation_google_font_style' || $field_id == 'ut_global_navigation_submenu_font_style' ) {
            
            $font_size = 20;
            
        }
        
        return $font_size;  
                
    }
    
    add_filter( 'ot_font_size_high_range', '_ut_typography_font_sizes', 10, 2 );

} 


/** 
 * Adjust EM Min Val
 *
 * @return    array
 *
 * @access    private
 * @since     4.1
 * @version   1.0.0
 */
if( !function_exists( '_ut_typography_em_min_sizes' ) ) {

    function _ut_typography_em_min_sizes( $field, $field_id ){
        
        if( $field_id == 'ut_global_hero_catchphrase_websafe_font_style' || $field_id == 'ut_front_catchphrase_websafe_font_style' || $field_id == 'ut_blog_catchphrase_websafe_font_style' || $field_id == 'ut_page_caption_description_websafe_font_style' ) {
            
            $field = 0.1;
                    
        }
        
        return $field;  
                
    }
    
    add_filter( 'ot_letter_spacing_high_range', '_ut_typography_em_min_sizes', 10, 2 );

}

/** 
 * Adjust EM High Val
 *
 * @return    array
 *
 * @access    private
 * @since     4.1
 * @version   1.0.0
 */
if( !function_exists( '_ut_typography_em_high_sizes' ) ) {

    function _ut_typography_em_high_sizes( $field, $field_id ){
        
        if( $field_id == 'ut_global_hero_catchphrase_websafe_font_style' || $field_id == 'ut_front_catchphrase_websafe_font_style' || $field_id == 'ut_blog_catchphrase_websafe_font_style' || $field_id == 'ut_page_caption_description_websafe_font_style' ) {
            
            $field = 1;
                    
        }
                
        return $field;  
                
    }
    
    add_filter( 'ot_letter_spacing_low_range', '_ut_typography_em_high_sizes', 10, 2 );

}

/** 
 * Adjust EM Interval
 *
 * @return    array
 *
 * @access    private
 * @since     4.1
 * @version   1.0.0
 */
if( !function_exists( '_ut_typography_em_interval' ) ) {

    function _ut_typography_em_interval( $field, $field_id ){
        
        if( $field_id == 'ut_global_hero_catchphrase_websafe_font_style' || $field_id == 'ut_front_catchphrase_websafe_font_style' || $field_id == 'ut_blog_catchphrase_websafe_font_style' || $field_id == 'ut_page_caption_description_websafe_font_style' ) {
            
            $field = 0.1;
                    
        }
                
        return $field;  
                
    }
    
    add_filter( 'ot_letter_spacing_range_interval', '_ut_typography_em_interval', 10, 2 );

}




/** 
 * Remove Row Actions
 *
 * @return    array
 *
 * @access    private
 * @since     4.1.1
 * @version   1.0.0
 */
function ut_remove_row_actions_post( $actions ) {
    
    if( get_post_type() === 'portfolio-manager' ) {
        unset( $actions['view'] );
    }    
    
    if( get_post_type() === 'ut-table-manager' ) {
        unset( $actions['view'] );
    } 
    
    return $actions;    

}

add_filter( 'post_row_actions', 'ut_remove_row_actions_post', 10, 1 );




/** 
 * Remove Slider Revolution MetaBoxes
 *
 * @return    array
 *
 * @access    private
 * @since     4.1.1
 * @version   1.0.0
 */	
function remove_revolution_slider_meta_boxes() {
    
    $post_types = get_post_types();
    
    foreach ( $post_types as $post_type ) {
        
        if ( 'post' != $post_type ) {
            remove_meta_box( 'mymetabox_revslider_0', $post_type, 'normal' );
        }
        
    }
    
}

add_action( 'do_meta_boxes', 'remove_revolution_slider_meta_boxes' );
    
    
    
    

