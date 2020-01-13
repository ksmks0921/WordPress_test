<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Hero_CSS' ) ) {	
    
    class UT_Hero_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
            
            $ut_hero_type  = ut_return_hero_config('ut_hero_type');
            $ut_hero_style = ut_return_hero_config('ut_hero_style' , 'ut-hero-style-1');
            
            ob_start(); ?>
            
            <style id="ut-hero-custom-css" type="text/css">
                
                <?php
                
                /** 
                 * Hero Align
                 */                
                
                if( ut_return_hero_config('ut_hero_align' , 'center') ) : ?>
                
                    #ut-hero .hero-inner {
                        text-align: <?php echo ut_return_hero_config('ut_hero_align' , 'center'); ?>
                    }
               
                <?php endif; ?>
                
                
                <?php
                
                /** 
                 * Hero Background Color
                 */                
                
                if( ut_return_hero_config('ut_hero_background_color') ) : ?>
                
                    #ut-hero {
                        background: <?php echo ut_return_hero_config('ut_hero_background_color'); ?>
                    }
               
                <?php endif; ?>     
                
                    
                <?php
                
                /** 
                 * Hero Caption Slogan Color
                 */
                
                $ut_hero_caption_slogan_color = ut_return_hero_config('ut_hero_caption_slogan_color');
                
                if( $ut_hero_caption_slogan_color ) : ?>
                
                    .hero-description { 
                        color: <?php echo $ut_hero_caption_slogan_color; ?>;
                    }
                
                <?php endif; ?>
                
                
                <?php
                
                /** 
                 * Hero Caption Slogan Background Color
                 */
                
                $ut_hero_caption_slogan_background_color = ut_return_hero_config('ut_hero_caption_slogan_background_color');
                
                if( $ut_hero_caption_slogan_background_color ) : ?>
                
                    .hero-description { 
                        background: <?php echo $ut_hero_caption_slogan_background_color; ?>;
                        padding-bottom:0; 
                        margin-bottom: 5px;
                    }
                
                <?php endif; ?>
                
                <?php
                
                /** 
                 * Hero Caption Title
                 */
                
                $ut_hero_caption_title_color = ut_return_hero_config( 'ut_hero_caption_title_color' );
                
                if( $ut_hero_caption_title_color ) : ?> 
                    
                    #ut-hero .hero-title { 
                        color: <?php echo $ut_hero_caption_title_color; ?>; 
                    }
                    
                    .ut-hero-style-4 .hero-title { 
                        border: 3px solid <?php echo $ut_hero_caption_title_color; ?>;  
                    }
                    
                    .ut-hero-style-6 .hero-title { 
                        border: 1px solid <?php echo $ut_hero_caption_title_color; ?>;  
                    }
                    
                    .ut-hero-style-7 .hero-title { 
                        border: 3px solid <?php echo $ut_hero_caption_title_color; ?>;
                    }
                    
                    .ut-hero-style-8 .hero-title { 
                        border-bottom: 2px solid <?php echo $ut_hero_caption_title_color; ?>;
                        border-top: 2px solid <?php echo $ut_hero_caption_title_color; ?>;
                    }
                    
                    .ut-hero-style-9 .hero-title { 
                        border-left: 3px solid <?php echo $ut_hero_caption_title_color; ?>;
                        border-right: 3px solid <?php echo $ut_hero_caption_title_color; ?>;
                    }
                    
                    .ut-hero-style-10 .hero-title { 
                        border-left: 3px dashed <?php echo $ut_hero_caption_title_color; ?>;
                        border-right: 3px dashed <?php echo $ut_hero_caption_title_color; ?>;
                    }
                    
                    .hero-title.ut-glow { 
                        color: <?php echo $ut_hero_caption_title_color; ?>;
                        text-shadow: 0 0 40px <?php echo $ut_hero_caption_title_color; ?>, 2px 2px 3px black; 
                    }
                    
                <?php endif; ?>                   
                
                
                
                <?php if( ut_return_hero_config( 'ut_hero_catchphrase_line_color' ) ) : ?>
                
                    .ut-hero-style-3 .hero-description { 
                        border: 3px solid <?php echo $ut_hero_caption_title_color; ?>;  
                    }
                
                <?php endif; ?>
                
                
                
                .ut-hero-style-5 .hero-description { 
                    border-color:<?php echo $this->accent; ?>; 
                }
                
                .hero-title span:not(.ut-word-rotator) { 
                    color:<?php echo $this->accent; ?> !important; 
                }
                
                .hero-title.ut-glow span { 
                    text-shadow: 0 0 40px <?php echo $this->accent; ?>, 2px 2px 3px black; 
                }
                
                <?php
                
                /** 
                 * Hero Caption Title Text Transform
                 */
                
                if( ut_return_hero_config('ut_hero_caption_title_uppercase' ) == 'on' ) : ?>
                
                    .hero-title { 
                        text-transform: uppercase !important;  
                    }
                
                <?php elseif( ut_return_hero_config('ut_hero_caption_title_uppercase' ) == 'off' )  : ?>
                    
                    .hero-title { 
                        text-transform: none !important; 
                    }
                
                <?php endif; ?>
                
                
                <?php
                
                /** 
                 * Hero Caption Title Letterspacing
                 */
                
                $ut_hero_caption_title_letterspacing = ut_return_hero_config('ut_hero_caption_title_letterspacing');
                
                if( $ut_hero_caption_title_letterspacing ) : ?>
                    
                    .hero-title { 
                        letter-spacing: <?php echo $this->add_px_value( $ut_hero_caption_title_letterspacing ); ?>; 
                    }
                    
                <?php endif; ?>
                
                
                <?php
                
                /** 
                 * Hero Catchphrase Font Settings 
                 */
                    
                if( $this->typography_css( '#ut-hero .hero-description-bottom', ut_return_hero_config( 'ut_hero_catchphrase_websafe_font_style' ) ) ) {
                
                    echo $this->typography_css( '#ut-hero .hero-description-bottom', ut_return_hero_config( 'ut_hero_catchphrase_websafe_font_style' ) );     
                
                } elseif( is_home() || is_single() ) {
                
                    echo $this->typography_css( '#ut-hero .hero-description-bottom', ot_get_option( 'ut_blog_catchphrase_websafe_font_style' ) );
                
                } else {
                
                    echo $this->typography_css( '#ut-hero .hero-description-bottom', ot_get_option( 'ut_front_catchphrase_websafe_font_style' ) );
                    
                }
                
                ?>
                
                
                <?php if( ut_return_hero_config('ut_hero_catchphrase_color') ) : ?>
                
                    .hero-description-bottom { color: <?php echo ut_return_hero_config('ut_hero_catchphrase_color'); ?>;}                
                
                <?php endif; ?>
                
                
                <?php 
                
                /**
                 * Hero Font Size 
                 */
                
                if( ut_return_hero_config( 'ut_hero_font_size' ) && $ut_hero_style != 'ut-hero-style-11' ) : ?>
                
                    @media screen and (min-width: 1025px) { 
                        
                        .hero-title { 
                            font-size: <?php echo ut_return_hero_config( 'ut_hero_font_size' ); ?> !important; 
                            line-height:1.2em !important;
                        } 
                    
                    }
                
                <?php endif; ?>
                
                
                <?php
                
                /**
                 * Hero Primary Button Style for all pages  
                 */
                             
                if( ut_return_hero_config('ut_main_hero_button_style' , 'default' ) == 'custom') {
                    
                    echo $this->create_button('.hero-btn' , ut_return_hero_config('ut_main_hero_button_settings') );
                    
                } 
                
                ?>
                
                <?php
                
                /**
                 * Hero Secondary Button Style for all pages  
                 */
                             
                if( ut_return_hero_config('ut_second_hero_button_style' , 'default' ) == 'custom') {
                    
                    echo $this->create_button('.hero-second-btn' , ut_return_hero_config('ut_second_hero_button_settings') );
                    
                } 
                
                ?>
                
                
                <?php
                
                /** 
                 * Hero Border Bottom 
                 */
                
                if( ut_return_hero_config('ut_hero_buttons_margin') ) {
                    
                    echo '#ut-hero .hero-btn-holder { margin-top: ' , $this->add_px_value( ut_return_hero_config('ut_hero_buttons_margin', 0 ) ) . '; }';
                    
                }
                
                ?>
                
                
                <?php
                
                /** 
                 * Hero Border Bottom 
                 */
                if( ut_return_hero_config('ut_hero_border_bottom' , 'off' ) == 'on') {
                   
                    if( ut_return_hero_config('ut_hero_overlay') == 'on') {
                        
                        echo '#ut-hero .parallax-overlay { border-bottom: ' , $this->add_px_value( ut_return_hero_config('ut_hero_border_bottom_width' , 1 ) ) , ' '.ut_return_hero_config('ut_hero_border_bottom_style' , 'solid' ) , ' ' , ut_return_hero_config('ut_hero_border_bottom_color', $this->accent ) , '; }';
                        
                    } else {
                        
                        echo '#ut-hero { border-bottom: ' , $this->add_px_value( ut_return_hero_config('ut_hero_border_bottom_width' , 1 ) ) , ' '.ut_return_hero_config('ut_hero_border_bottom_style' , 'solid' ) , ' ' , ut_return_hero_config('ut_hero_border_bottom_color', $this->accent ) , '; }';
                        
                    }
                   
                }
                
                ?>
                
                
                <?php 
                
                /** 
                 * Fancy Border
                 */
                if( ( is_home() || is_front_page() ) && ut_return_hero_config('ut_hero_fancy_border', 'off' ) == 'on') : ?>
                
                    #ut-hero .ut-fancy-border { 
                        display: block; 
                        position: absolute; 
                        bottom: 0; 
                        left: 0; 
                        width: 100%; 
                        background:<?php echo ut_return_hero_config( 'ut_hero_fancy_border_background_color' , '#FFF' ); ?>; 
                        border-bottom:<?php echo ut_return_hero_config( 'ut_hero_fancy_border_size' , '10px' ); ?>;
                        border-color:<?php echo ut_return_hero_config( 'ut_hero_fancy_border_color' , $this->accent ); ?>; 
                        border-style: dashed; 
                        z-index:9999; 
                    }
                
                <?php endif; ?>
                
                
                <?php
                
                /** 
                 * Hero Background Image for Tablet Slider 
                 */
                if( $ut_hero_type == 'tabs' ) {
                    
                    echo $this->global_headline_font_style('.ut-tablets-title', ut_return_hero_config('ut_tabs_headline_style', 'semibold') );
                    
                    /* hero type tabs uses a different header image */            
                    echo $this->css_background( '.hero .parallax-scroll-container', ut_return_hero_config('ut_hero_image', '' , true ) );
                    
                } ?>
                
                
                <?php
                
                /* 
                 * Dynamic Hero 
                 */
                 
                if( $ut_hero_type == 'dynamic' ) : ?>
                    
                    #ut-hero.hero { 
                        height: <?php echo ut_return_hero_config('ut_hero_dynamic_content_height','60'); ?>%; 
                        min-height: <?php echo ut_return_hero_config('ut_hero_dynamic_content_height','60'); ?>%; 
                        height: calc( <?php echo ut_return_hero_config('ut_hero_dynamic_content_height','60'); ?>% + 80px) !important; /* @todo */
                    }
                    
                    #ut-hero.hero .hero-inner { 
                        vertical-align: <?php echo ut_return_hero_config( 'ut_hero_dynamic_content_v_align', 'middle' ); ?>; 
                    }
                    
                    <?php if( ut_return_hero_config( 'ut_hero_dynamic_content_v_align', 'middle' ) == 'bottom' ) : ?>
                    
                        #ut-hero.hero .hero-holder { 
                            padding-bottom: <?php echo ut_return_hero_config( 'ut_hero_dynamic_content_margin_bottom', '40px' ); ?>; 
                        }
                    
                    <?php endif; ?>
                    
                <?php endif; ?>
                
                
                <?php
                
                /**
                 * Hero Background Image 
                 */
                 
                if( $ut_hero_type == 'image' || $ut_hero_type == 'splithero' || $ut_hero_type == 'dynamic' ) {
                    
                    $ut_hero_image = ut_return_hero_config('ut_hero_image');                            
                    
                    if( is_array( $ut_hero_image ) && !empty( $ut_hero_image['background-image'] ) ) {
                        
                        /*no background if rain effect is active */
                        echo $this->css_background( '.hero .parallax-scroll-container' , $ut_hero_image );
                        
                    } elseif( !empty( $ut_hero_image ) && !is_array( $ut_hero_image ) ) {
                        
                        /* fallback to version 1.0 */
                        echo '.hero .parallax-scroll-container { background-image: url(' , esc_url( $ut_hero_image ) , '); }'. "\n";
                    
                    }                
                
                }
                
                ?>
                
                
                <?php
                
                /**
                 * Video Poster 
                 */
                
                if( $ut_hero_type == 'video' ) :
                    
                    /* video poster image for mobile devices */
                    $ut_video_poster = ut_return_hero_config('ut_video_poster');
                    
                    /* hero can be an image , so we need to check the hero type */
                    if( !empty( $ut_video_poster ) && ut_return_hero_config('ut_video_source' , 'youtube') == 'youtube' || !empty( $ut_video_poster ) && unite_mobile_detection()->isMobile() ) {
                        
                        echo '.hero { 
                            background-image: url(' . esc_url( $ut_video_poster ) . ');
                            background-size: cover !important;
                            background-attachment: scroll !important;
                        }'. "\n";                    
                        
                    }
                    
                    if( unite_mobile_detection()->isMobile() ) {
                                        
                        echo '.ut-video-control {
                            display:none !important;
                        }';
                    
                    }
                    
                endif; ?>
                
                
                <?php
                
                /** 
                 * Video Position for selfhosted Videos
                 */
                 
                if( ut_return_hero_config('ut_video_source' , 'youtube') == 'selfhosted' && !unite_mobile_detection()->isMobile() && ut_return_hero_config('ut_video_containment' , 'hero') == 'body' && is_front_page() ) {                
                    echo '.ut-video-container { position:fixed; }';                               
                }
                
                ?>
                
                <?php
                
                /**
                 * Video Position Fix
                 */
                
                if( !is_home() ) {
                             
                    echo '#wrapper_mbYTP_ut-background-video-hero { min-width: 100% !important; }';
                
                } ?>
                
                
                <?php 
                
                /**
                 * Split Hero 
                 */
                
                if( $ut_hero_type == 'splithero' ) {
                    
                    $split_image_max_width = ut_return_hero_config('ut_hero_split_image_width');
                    
                    /* check if value is available */
                    $split_image_max_width = empty( $split_image_max_width ) ? '60' : $split_image_max_width;
                    
                    echo '#ut-hero .ut-split-image { max-width: ' , $split_image_max_width , '% !important; }'. "\n";
                    
                
                }
                
                ?>
                
                
                <?php
                
                /** 
                 * Split Hero - Video Padding 
                 */
                 
                if( $ut_hero_type == 'splithero' ) {
                
                    echo '.ut-hero-video-boxed { padding: ' , $this->add_px_value( ut_return_hero_config('ut_hero_split_video_box_padding', '20') ) , '; }';                
                
                }
                
                ?>
                
                
                <?php
                
                /** 
                 * Split Hero - Position
                 */
                 
                if( ( ut_return_header_config('ut_navigation_state') == 'on_transparent' || ut_return_header_config('ut_navigation_state') == 'on' ) && ( $ut_hero_type == 'splithero' && ut_return_hero_config('ut_hero_split_content_type' , 'image') == 'image' ) ) {
                
                    echo '#ut-hero .hero-holder { margin-top:80px; }';                
                
                }
                
                ?>
                
                
                <?php
                
                /**
                 * Animated Image 
                 */
                 
                if( $ut_hero_type == 'animatedimage' ) {
                    
                    $header_image = ut_return_hero_config('ut_hero_animated_image');
                    
                    if( !empty($header_image) ) {
                    
                        /* get image ID by url*/
                        $imageID = ut_get_image_id( $header_image );
                        
                        /* grab image imnformation */                    
                        $imageinfo = wp_get_attachment_image_src( $imageID , 'full' ); ?>
                                            
                        .hero { 
                            background-position: 0px 0px;
                            background-repeat: repeat-x;
                            background-image: url("<?php echo esc_url( $header_image ); ?>"); 
                            -webkit-animation: animatedBackground 60s linear infinite;
                               -moz-animation: animatedBackground 60s linear infinite;
                                    animation: animatedBackground 60s linear infinite;
                        }
                        
                        @media screen and (max-width: 1024px) {
                            
                            .hero {
                                -webkit-animation: none !important;
                                -moz-animation: none !important;
                                animation: none !important;
                            }
                            
                        }
                        
                        @keyframes animatedBackground {
                            from { background-position: 0 0; }
                            to { background-position: <?php echo $imageinfo[1]; ?>px 0; }
                        }
                        
                        @-webkit-keyframes animatedBackground {
                            from { background-position: 0 0; }
                            to { background-position: <?php echo $imageinfo[1]; ?>px 0; }
                        }
                        
                        @-moz-keyframe animatedBackground {
                            from { background-position: 0 0; }
                            to { background-position: <?php echo $imageinfo[1]; ?>px 0; }
                        }

                        
                    <?php 
                    
                    }
                        
                }
                
                ?>
                
                
                <?php
                
                /**
                 * Background Slider Arrow Colors 
                 */
                 
                if( $ut_hero_type == 'slider' ) {
                    
                    if( ut_return_hero_config('ut_background_slider_arrow_background_color') ) {
                        
                        echo '#ut-hero .ut-flex-control { background: ' , ut_return_hero_config('ut_background_slider_arrow_background_color') , '; }';
                        echo '#ut-hero .ut-flex-control:visited { background: ' , ut_return_hero_config('ut_background_slider_arrow_background_color') , '; }';
                        
                    }
                    
                    if( ut_return_hero_config('ut_background_slider_arrow_background_color_hover') ) {
                        
                        echo '#ut-hero .ut-flex-control:hover { background: ' , ut_return_hero_config('ut_background_slider_arrow_background_color_hover') , '; }';
                        echo '#ut-hero .ut-flex-control:focus { background: ' , ut_return_hero_config('ut_background_slider_arrow_background_color_hover') , '; }';
                        echo '#ut-hero .ut-flex-control:active{ background: ' , ut_return_hero_config('ut_background_slider_arrow_background_color_hover') , '; }';
                        
                    }
                    
                    if( ut_return_hero_config('ut_background_slider_arrow_color') ) {
                        
                        echo '#ut-hero .ut-flex-control { color: ' , ut_return_hero_config('ut_background_slider_arrow_color') , '; }';
                        echo '#ut-hero .ut-flex-control:visited { color: ' , ut_return_hero_config('ut_background_slider_arrow_color') , '; }';
                        
                    }
                    
                    if( ut_return_hero_config('ut_background_slider_arrow_color_hover') ) {
                        
                        echo '#ut-hero .ut-flex-control:hover { color: ' , ut_return_hero_config('ut_background_slider_arrow_color_hover') , '; }';
                        echo '#ut-hero .ut-flex-control:focus { color: ' , ut_return_hero_config('ut_background_slider_arrow_color_hover') , '; }';
                        echo '#ut-hero .ut-flex-control:active{ color: ' , ut_return_hero_config('ut_background_slider_arrow_color_hover') , '; }';
                        
                    }
                    
                }
                
                ?>
                
                <?php
                
                /**
                 * Fancy Slider 
                 */
                
                if( $ut_hero_type == 'transition' ) {
                
                    echo '.ut-fancy-slider-fullwidth { height: ' , $this->add_px_value( ut_return_hero_config('ut_fancy_slider_height' , '600px') ) , '; }';
                    echo '.ut-fancy-slider-fullwidth .hero-inner { height: ' , $this->add_px_value( ut_return_hero_config('ut_fancy_slider_height' , '600px') ) , '; }';
                
                }
                
                ?>
                
                
                
                <?php
                
                /**
                 * Hero Overlay Styling 
                 */

                if( ut_return_hero_config('ut_hero_overlay_color') ) {
                   
                   echo '.hero .parallax-overlay { background-color: rgba(' . $this->hex_to_rgb( ut_return_hero_config( 'ut_hero_overlay_color' ) ) . ' , ' , ut_return_hero_config('ut_hero_overlay_color_opacity' , '0.8') , ' ) !important; }'. "\n";
                   
                }
                
                ?>                
                
                
                <?php
                
                /** 
                 * Hero Overlay
                 */ 
                
                if( ut_return_hero_config( 'ut_hero_overlay_pattern_style', 'style_one' ) == 'custom' ) {
                    
                    echo $this->css_background( '.parallax-overlay-pattern.custom' , ut_return_hero_config('ut_hero_overlay_custom_pattern') );
                
                }
                
                ?>
                
               
                <?php 
                
                 /**
                 * Hero Scroll Down
                 */                
                
                ?>
                    
                .hero-down-arrow a { 
                    color: <?php echo ut_return_hero_config('ut_hero_down_arrow_color', '#FFF' ); ?>; 
                }
                
                .hero-down-arrow a:hover, 
                .hero-down-arrow a:focus, 
                .hero-down-arrow a:active { 
                    color: <?php echo ut_return_hero_config('ut_hero_down_arrow_color', '#FFF' ); ?> 
                }
                
                <?php if( ut_return_hero_config('ut_hero_down_arrow_scroll_position') != '' ) : ?>
                
                    .hero-down-arrow { 
                        
                        left: <?php echo ut_return_hero_config('ut_hero_down_arrow_scroll_position'); ?>%;
                        
                        <?php if( ut_return_hero_config('ut_hero_down_arrow_scroll_position') == '0' ) : ?>
                            
                            margin-left: 0px;        
                        
                        <?php endif; ?>
                        
                        <?php if( ut_return_hero_config('ut_hero_down_arrow_scroll_position') == '100' ) : ?>
                            
                            margin-left: -26px;        
                        
                        <?php endif; ?>                       
                         
                    }
                    
                <?php endif; ?>
                
                
                <?php if( ut_return_hero_config('ut_hero_down_arrow_scroll_position_vertical') != '' ) : ?>
                
                    .hero-down-arrow { 
                        bottom: <?php echo $this->add_px_value( ut_return_hero_config('ut_hero_down_arrow_scroll_position_vertical') ); ?>;
                    }
                    
                <?php endif; ?>
                
                
                
                <?php 
                
                /**
                 * No Result Page Hero
                 */
                 
                if( is_search() && ot_get_option('ut_search_hero_background_image') ) : 
                    
                    echo $this->css_background( '.search-no-results .hero .parallax-scroll-container' , ot_get_option('ut_search_hero_background_image') );
                    echo $this->css_background( '.search-results .hero .parallax-scroll-container' , ot_get_option('ut_search_hero_background_image') );
                
                 endif; ?>
                 
                <?php 
                
                /**
                 * 404 Page Hero
                 */
                 
                if( is_404() && ot_get_option('ut_404_hero_background_image') ) : 
                    
                    echo $this->css_background( '.error404 .hero .parallax-scroll-container' , ot_get_option('ut_404_hero_background_image') );
                
                 endif; ?>
                 
                <?php 
                
                /**
                 * Archive Page Hero
                 */
                 
                if( is_archive() && ot_get_option('ut_archive_hero_background_image') ) : 
                    
                    echo $this->css_background( '.archive .hero .parallax-scroll-container' , ot_get_option('ut_archive_hero_background_image') );
                
                 endif; ?>
                 
                 <?php 
                
                /**
                 * Maintance Page Hero
                 */
                 
                if( apply_filters( 'ut_maintenance_mode_active', false ) && ot_get_option('ut_maintenance_hero_background_image') ) : 
                    
                    echo $this->css_background( '.ut-bklyn-maintenance .hero .parallax-scroll-container' , ot_get_option('ut_maintenance_hero_background_image') );
                
                 endif; ?>
                
                
            </style>
            
            <?php 
 
            echo $this->minify_css( ob_get_clean() );
        
        }  
            
    }

}

new UT_Hero_CSS;