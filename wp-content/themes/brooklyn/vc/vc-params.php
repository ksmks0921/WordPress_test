<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/* check if Visual Composer is installed */
if( ! defined( 'WPB_VC_VERSION' )  ) {
    return;
}


/**
 * Add Text Transform for Custom Heading Shortcode
 *
 * @return    array
 *
 * @access    private
 * @since     4.0
 */
 
function _vc_add_text_transform_to_custom_heading() {
    
    return array(
        'type'          => 'dropdown',
        'heading'       => esc_html__( 'Text Transform', 'unitedthemes' ),
        'param_name'    => 'text_transform',
        'value'         => array(
            esc_html__( 'Select Text Transform' , 'unitedthemes' ) => '',
            esc_html__( 'None' , 'unitedthemes' )        => 'none',
            esc_html__( 'Capitalize' , 'unitedthemes' )  => 'capitalize',
            esc_html__( 'Inherit' , 'unitedthemes' )     => 'inherit',
            esc_html__( 'Lowercase' , 'unitedthemes' )   => 'lowercase',
            esc_html__( 'Uppercase' , 'unitedthemes' )   => 'uppercase'            
        ),
        
    );
    
}

vc_add_param( 'vc_custom_heading', _vc_add_text_transform_to_custom_heading() );


/**
 * Add Offset Anchors 
 *
 * @return    array
 *
 * @access    private
 * @since     4.3
 */

function _vc_add_section_anchor_to_vc_row() {
    
    return array(
        
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Link Section inside Menu?', 'unitedthemes' ),
            'description'   => 'By using this option you are able to create a hidden anchor which allows you to link / scroll to this section.',
            'param_name'    => 'bklyn_section_anchor',
            'value'         => array(
                esc_html__( 'off', 'unitedthemes' ) => '',
                esc_html__( 'on', 'unitedthemes' )  => 'true'
            ),
            'group'         => 'Linking'
        ),
        
        array(
            'type'              => 'section_anchor',
            'heading'           => esc_html__( 'Section Settings', 'ut_shortcodes' ),
            'param_name'        => 'bklyn_section_anchor_id',
            'group'             => 'Linking',
            'dependency'    => array(
                'element' => 'bklyn_section_anchor',
                'value'   => 'true',
            ),
        ),
        
    );

}

vc_add_params( 'vc_row', _vc_add_section_anchor_to_vc_row() );


/**
 * Add Overlay Settings to VC Row
 *
 * @return    array
 *
 * @access    private
 * @since     4.0
 */

function _vc_add_overlay_settings_to_vc_row() {
    
    return array( 
        
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Activate Overlay?', 'unitedthemes' ),
            'param_name'    => 'bklyn_overlay',
            'value'         => array(
                esc_html__( 'off', 'unitedthemes' ) => '',
                esc_html__( 'on', 'unitedthemes' )  => 'true'
            ),
            'group'         => 'Overlay'
        ),
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'Overlay Color', 'unitedthemes' ),
            'param_name'    => 'bklyn_overlay_color',
            'group'         => 'Overlay',
            'dependency'    => array(
                'element' => 'bklyn_overlay',
                'value'   => 'true',
            ),
        ),
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Activate Overlay Pattern?', 'unitedthemes' ),
            'param_name'    => 'bklyn_overlay_pattern',
            'value'         => array(
                esc_html__( 'off', 'unitedthemes' ) => '',
                esc_html__( 'on', 'unitedthemes' )  => 'true'
            ),
            'group'         => 'Overlay',
            'dependency'    => array(
                'element' => 'bklyn_overlay',
                'value'   => 'true',
            ),
        ),
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Overlay Style', 'unitedthemes' ),
            'param_name'    => 'bklyn_overlay_pattern_style',
            'group'         => 'Overlay',
            'value'         => array(
                esc_html__( 'Style One' , 'unitedthemes' )  => 'bklyn-style-one',
                esc_html__( 'Style Two' , 'unitedthemes' )  => 'bklyn-style-two',
            ),
            'dependency'    => array(
                'element' => 'bklyn_overlay_pattern',
                'value'   => 'true',
            )
                        
        )
        
        
    );
    
}

vc_add_params( 'vc_row', _vc_add_overlay_settings_to_vc_row() );
vc_add_params( 'vc_column', _vc_add_overlay_settings_to_vc_row() );


/**
 * Add Background Settings to VC Row
 *
 * @return    array
 *
 * @access    private
 * @since     4.0.3
 */

function _vc_add_background_settings_to_vc_row() {
    
    return array(
        
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Background Position', 'unitedthemes' ),
            'param_name'    => 'background_position',
            'value'         => array(
                esc_html__( 'Select Background Position', 'unite' ) => '',
                esc_html__( 'left top', 'unite' )                   => 'left top',
                esc_html__( 'left center', 'unite' )                => 'left center',
                esc_html__( 'left bottom', 'unite' )                => 'left bottom',
                esc_html__( 'center top', 'unite' )                 => 'center top',
                esc_html__( 'center center', 'unite' )              => 'center center',
                esc_html__( 'center bottom', 'unite' )              => 'center bottom',
                esc_html__( 'right top', 'unite' )                  => 'right top',
                esc_html__( 'right center', 'unite' )               => 'right center',
                esc_html__( 'right bottom', 'unite' )               => 'right bottom'  
            ),
            'group'         => 'Design Options',
            'dependency'    => array(
                'element' => 'parallax',
                'value_not_equal_to' => array('content-moving','content-moving-fade')
            )
        ),
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Background Attachment', 'unitedthemes' ),
            'param_name'    => 'background_attachment',
            'value'         => array(
                esc_html__( 'Select Background Attachment', 'unitedthemes' )=> '',
                esc_html__( 'Scroll', 'unitedthemes' )                      => 'scroll',
                esc_html__( 'Fixed', 'unitedthemes' )                       => 'fixed',
                esc_html__( 'Inherit', 'unitedthemes' )                     => 'inherit'
            ),
            'group'         => 'Design Options',
            'dependency'    => array(
                'element' => 'parallax',
                'value_not_equal_to' => array('content-moving','content-moving-fade')
            )   
        ),
        
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Hide Background on Medium Desktop?', 'unitedthemes' ),
            'param_name'        => 'hide_bg_medium',
            'edit_field_class'  => 'vc_col-sm-6',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' )     => '',
                esc_html__( 'yes', 'unitedthemes' )    => 'true'
            ),
            'group'             => 'Design Options'
        ),
        
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Hide Background on Tablet?', 'unitedthemes' ),
            'param_name'        => 'hide_bg_tablet',
            'edit_field_class'  => 'vc_col-sm-6',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' )     => '',
                esc_html__( 'yes', 'unitedthemes' )    => 'true'
            ),
            'group'             => 'Design Options'
        ),
        
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Hide Background on Mobile?', 'unitedthemes' ),
            'param_name'        => 'hide_bg_mobile',
            'edit_field_class'  => 'vc_col-sm-6',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' )     => '',
                esc_html__( 'yes', 'unitedthemes' )    => 'true'
            ),
            'group'             => 'Design Options'
        ),
        
        
        
            
        
    );
    
}

vc_add_params( 'vc_row', _vc_add_background_settings_to_vc_row() );
vc_add_params( 'vc_column', _vc_add_background_settings_to_vc_row() );

/**
 * Enhance VC Media Grid
 *
 * @return    array
 *
 * @access    private
 * @since     4.0.3
 */

function _vc_add_enhance_media_grid_gap() {
    
    return array(
        'type' => 'dropdown',
        'heading' => __( 'Gap', 'unitedthemes' ),
        'param_name' => 'gap',
        'value' => array(
            '0px' => '0',
            '1px' => '1',
            '2px' => '2',
            '3px' => '3',
            '4px' => '4',
            '5px' => '5',
            '10px' => '10',
            '15px' => '15',
            '20px' => '20',
            '25px' => '25',
            '30px' => '30',
            '35px' => '35',
            '40px' => '40',
        ),
        'std' => '40',
        'description' => __( 'Select gap between grid elements.', 'unitedthemes' ),
        'edit_field_class' => 'vc_col-sm-6'
        
    );
    
}

vc_add_param( 'vc_media_grid', _vc_add_enhance_media_grid_gap() );

/* remove grid items */
vc_remove_param( 'vc_media_grid', 'item' );


/**
 * Enhance VC Media Gallery
 *
 * @return    array
 *
 * @access    private
 * @since     4.0.3
 */

function _vc_add_color_settings_to_vc_media_gallery() {
    
    return array(
        
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'Arrow Color', 'unitedthemes' ),
            'param_name'    => 'arrow_color',
            'group'         => 'Colors'
        ),
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'Arrow Hover Color', 'unitedthemes' ),
            'param_name'    => 'arrow_color_hover',
            'group'         => 'Colors'
        ),
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'Dot Color', 'unitedthemes' ),
            'param_name'    => 'dot_color',
            'group'         => 'Colors'
        ),
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'Dot Color Active', 'unitedthemes' ),
            'param_name'    => 'dot_color_active',
            'group'         => 'Colors'
        )
    
    );

}

vc_add_params( 'vc_gallery', _vc_add_color_settings_to_vc_media_gallery() );




$deprecated = array (
    'category'   => 'Brooklyn ( Deprecated )',
    'deprecated' => true
);

vc_map_update( 'vc_posts_slider', $deprecated );
vc_map_update( 'vc_media_grid', $deprecated );
vc_map_update( 'vc_images_carousel', $deprecated );
vc_map_update( 'vc_gallery', $deprecated );




/**
 * Add Animation Settings to VC Column
 *
 * @return    array
 *
 * @access    private
 * @since     4.2.0
 */

function _vc_add_animation_settings_to_vc_column() {
    
    return array (
        
       array(
            'type'              => 'animation_style',
            'heading'           => __( 'Animation Effect', 'unitedthemes' ),
            'description'       => __( 'Select image animation effect.', 'unitedthemes' ),
            'group'             => 'Animation',
            'param_name'        => 'effect',
            'settings' => array(
                'type' => array(
                    'in',
                    'out',
                    'other',
                ),
            )
            
        ),
        
        array(
            'type'              => 'textfield',
            'heading'           => esc_html__( 'Animation Duration', 'unitedthemes' ),
            'description'       => esc_html__( 'Animation time in seconds  e.g. 1s', 'unitedthemes' ),
            'param_name'        => 'animation_duration',
            'group'             => 'Animation',
        ), 
        
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Animate Once?', 'unitedthemes' ),
            'description'       => esc_html__( 'Animate only once when reaching the viewport, animate everytime when reaching the viewport or make the animation infinite? By default the animation executes everytime when the element becomes visible in viewport, means when leaving the viewport the animation will be reseted and starts again when reaching the viewport again. By setting this option to yes, the animation executes exactly once. By setting it to infinite, the animation loops all the time, no matter if the element is in viewport or not.', 'unitedthemes' ),
            'param_name'        => 'animate_once',
            'group'             => 'Animation',
            'value'             => array(
                esc_html__( 'no' , 'unitedthemes' )      => 'no',
                esc_html__( 'yes', 'unitedthemes' )      => 'yes',
                esc_html__( 'infinite', 'unitedthemes' ) => 'infinite',
            )
        ), 
        
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Animate Image on Tablet?', 'unitedthemes' ),
            'param_name'        => 'animate_tablet',
            'group'             => 'Animation',
            'edit_field_class'  => 'vc_col-sm-6',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' ) => 'false',
                esc_html__( 'yes'  , 'unitedthemes' ) => 'true'
            ),
        ),
        
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Animate Image on Mobile?', 'unitedthemes' ),
            'param_name'        => 'animate_mobile',
            'group'             => 'Animation',
            'edit_field_class'  => 'vc_col-sm-6',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' ) => 'false',
                esc_html__( 'yes'  , 'unitedthemes' ) => 'true'
            ),
        ),                            
        
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Delay Animation?', 'unitedthemes' ),
            'param_name'        => 'delay',
            'group'             => 'Animation',
            'edit_field_class'  => 'vc_col-sm-6',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' ) => 'false',
                esc_html__( 'yes'  , 'unitedthemes' ) => 'true'                                                                        
            )
        ),
        
        array(
            'type'              => 'textfield',
            'heading'           => esc_html__( 'Delay Timer', 'unitedthemes' ),
            'description'       => esc_html__( 'Time in milliseconds until the image animation starts. e.g. 200', 'unitedthemes' ),
            'param_name'        => 'delay_timer',
            'group'             => 'Animation',
            'edit_field_class'  => 'vc_col-sm-6',
            'dependency'        => array(
                'element' => 'delay',
                'value'   => 'true',
            )
        ),   
    
    );

}

vc_add_params( 'vc_row', _vc_add_animation_settings_to_vc_column() );
vc_add_params( 'vc_column', _vc_add_animation_settings_to_vc_column() );
vc_add_params( 'vc_row_inner', _vc_add_animation_settings_to_vc_column() );
vc_add_params( 'vc_column_inner', _vc_add_animation_settings_to_vc_column() );