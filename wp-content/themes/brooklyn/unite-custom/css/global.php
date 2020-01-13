<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Global_CSS' ) ) {	
    
    class UT_Global_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
            
            ob_start(); ?>

            <style id="ut-global-custom-css" type="text/css">
                
                /* Global Accent Colors
                ================================================== */
                ::-moz-selection { 
                    background: <?php echo $this->accent; ?>; 
                }
                
                ::selection { 
                    background: <?php echo $this->accent; ?>; 
                }
                
                a { 
                    color: <?php echo $this->accent; ?>; 
                }
                
                ins, mark { 
                    background:<?php echo $this->accent; ?>; 
                }
                
                .lead ins {
                    color:<?php echo $this->accent; ?>; 
                }
                
                .themecolor  { 
                    color: <?php echo $this->accent; ?>; 
                }
                
                .lead span {
                    color: <?php echo $this->accent; ?>; 
                }
                
                .themecolor-bg {
                    background:<?php echo $this->accent; ?>; 
                }                
                
                .img-hover { 
                    background:rgb(<?php echo $this->hex_to_rgb( $this->accent ); ?>);    
                    background:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 0.85); 
                }                
                
                .ha-transparent #navigation ul li a:hover { 
                    color: <?php echo $this->accent; ?>; 
                }
                
                /* glow effect */
                .ut-glow {
                    color: <?php echo $this->accent; ?>;
                    text-shadow:0 0 40px <?php echo $this->accent; ?>, 2px 2px 3px black; 
                }                
                                
                .ut-language-selector a:hover { 
                    color: <?php echo $this->accent; ?>; 
                }
                
                /* logo */
                .site-logo img { 
                    max-height: <?php echo ot_get_option('ut_site_logo_max_height' , '60'); ?>px; 
                }
                
                @media (min-width: 1601px) {
                
                    .side-site-logo img {
                        max-width: <?php echo ot_get_option( 'ut_site_logo_max_width', '100' ); ?>%;
                    }                
                
                }
                
                .ut-header-dark .site-logo .logo a:hover { 
                    color:<?php echo $this->accent; ?>;
                }
                
                /* blockquotes */
                blockquote { 
                    border-color:<?php echo $this->accent; ?>; 
                }
                
                blockquote span { 
                    color:<?php echo $this->accent; ?>;  
                }
                
                /* headlines */
                h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover {
                    color:<?php echo $this->accent; ?>;
                }
                
                /* forms */
                input[type="button"],
                .button, input[type="submit"] {
                    background:<?php echo $this->accent; ?>;
                }                 
                
                .dark button, 
                .dark input[type="submit"], 
                .dark input[type="button"] {
                    background:<?php echo $this->accent; ?>;
                }
                
                .light .button, 
                .light input[type="submit"], 
                .light input[type="button"] { 
                    background:<?php echo $this->accent; ?>;
                }
                
                /* wordpress media element */
                .mejs-controls .mejs-time-rail .mejs-time-current, 
                .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current { 
                    background:<?php echo $this->accent; ?> !important; 
                }
                
                /* more link */
                a.more-link:hover { 
                    color:<?php echo $this->accent; ?>; 
                }
                
                /* post format */
                .format-link .entry-header a { 
                    background:<?php echo $this->accent; ?> !important; 
                }
                
                .ut-gallery-slider .flex-direction-nav a { 
                    background:rgb(<?php echo $this->hex_to_rgb( $this->accent ); ?>); 
                    background:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 0.85); 
                }
                
                /* comments */
                .comments-title span { 
                    color:<?php echo $this->accent; ?>; 
                }
                
                #cancel-comment-reply-link { 
                    color:<?php echo $this->accent; ?>; 
                }
                
                /* fontawesome */
                .fa-ul li .fa  { 
                    color:<?php echo $this->accent; ?>;                  
                }
                
                /* misc */
                .ut-avatar-overlay { 
                    background:rgb(<?php echo $this->hex_to_rgb( $this->accent ); ?>); 
                    background:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 0.85);  
                }
                
                /* contact form 7 */
                div.wpcf7-validation-errors { 
                    border-color:<?php echo $this->accent; ?>;  
                }
                
                /* deprecated */
                .count { 
                    color:<?php echo $this->accent; ?>; 
                }
                
                .team-member-details { 
                    background:rgb(<?php echo $this->hex_to_rgb( $this->accent ); ?>);
                    background:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 0.85 ); 
                }
                
                .about-icon { 
                    background:<?php echo $this->accent; ?>; 
                }
                
                .cta-section { 
                    background:<?php echo $this->accent; ?> !important; 
                }
                
                .icons-ul i { 
                    color:<?php echo $this->accent; ?>; 
                }
                
                .entry-meta a:hover, 
                #secondary a:hover, 
                .page-template-templatestemplate-archive-php a:hover { color:<?php echo $this->accent; ?>; }

                
                
                /* Preloader
                ================================================== */ 
                <?php echo $this->typography_css( '#qLpercentage', ot_get_option('ut_image_loader_percentage_font') ); ?>
                
                #ut-loader-logo { 
                    max-width: <?php echo ot_get_option( 'ut_image_loader_logo_max_width', 100 ); ?>px;
                }
                
                #qLoverlay { 
                    background: <?php echo ot_get_option('ut_image_loader_background' , '#FFF'); ?>; 
                }
                
                .ut-loading-bar-style2 .ut-loading-bar-style2-ball-effect { 
                    background-color: <?php echo ot_get_option('ut_image_loader_bar_color' , '#FFF'); ?>; 
                }
                
                .ut-loading-bar-style3-outer { 
                    border-color: <?php echo ot_get_option('ut_image_loader_bar_color' , '#FFF'); ?>; 
                }
                
                .ut-loading-bar-style-3-inner { 
                    background-color: <?php echo ot_get_option('ut_image_loader_bar_color' , '#FFF'); ?>;
                }
                
                .ut-loader__bar4, .ut-loader__ball4 { 
                    background: <?php echo ot_get_option('ut_image_loader_bar_color' , '#FFF'); ?>; 
                }
                
                .ut-loading-bar-style5-inner { 
                    color: <?php echo ot_get_option('ut_image_loader_bar_color' , '#FFF'); ?>; 
                }
                
                .sk-cube-grid .sk-cube { 
                    background-color: <?php echo ot_get_option('ut_image_loader_bar_color' , '#FFF'); ?>; 
                }
                
                .ut-inner-overlay .ut-loading-text p { 
                    color: <?php echo ot_get_option('ut_image_loader_text_color' ); ?> !important; 
                }
                
                <?php echo $this->typography_css( '.ut-inner-overlay .ut-loading-text p', ot_get_option('ut_image_loader_font') ); ?>
                
                .ut-inner-overlay .ut-loading-text { 
                    margin-top: <?php echo ot_get_option( 'ut_image_loader_text_margin_top', 20 ); ?>px !important; 
                }
                
                .ut-loader-overlay { 
                    background: <?php echo ot_get_option('ut_image_loader_background' , '#FFF'); ?>;
                }
                

                <?php 
               
                /**
                 * Body Font
                 */
                echo $this->font_style_css( array(
                    'selector'           => 'body',
                    'font-type'          => ot_get_option('ut_body_font_type', 'ut-font' ),   
                    'font-style'         => ot_get_option('ut_body_font_style', 'regular' ),
                    'google-font-style'  => ot_get_option('ut_google_body_font_style'),
                    'websafe-font-style' => ot_get_option('ut_body_websafe_font_style') 
                ) ); 
                
                if( ot_get_option('ut_body_font_color') ) {
                    echo 'body { color: ' . ot_get_option('ut_body_font_color') . ' ;}';    
                }
               
                /**
                 * Headline Fonts
                 */
                foreach( array('h1','h2','h3','h4','h5','h6') as $headline ) {
                
                    echo $this->font_style_css( array(
                        'selector'           => $headline,
                        'font-type'          => ot_get_option('ut_global_' . $headline . '_font_type', 'ut-font' ),   
                        'font-style'         => ot_get_option('ut_'. $headline .'_font_style', 'regular' ),
                        'google-font-style'  => ot_get_option('ut_'. $headline .'_google_font_style'),
                        'websafe-font-style' => ot_get_option('ut_'. $headline .'_websafe_font_style') 
                    ) ); 
                
                    if( ot_get_option('ut_global_'.$headline.'_font_color') ) {
                        echo $headline . ' {  color: ' . ot_get_option('ut_global_'.$headline.'_font_color') . '; }'. "\n";
                    }
                
                }
                
                /**
                 * Content Widgets
                 */
                echo $this->font_style_css( array(
                    'selector'           => '#ut-sitebody #primary .entry-content .widget-title',
                    'font-type'          => ot_get_option('ut_content_widgets_type', 'ut-websafe' ),   
                    'font-style'         => ot_get_option('ut_content_widgets_font_style', 'semibold' ),
                    'google-font-style'  => ot_get_option('ut_google_content_widgets_style'),
                    'websafe-font-style' => ot_get_option('ut_global_content_widgets_websafe_font_style') 
                ) );
                
                /**
                 * Blockquote Fonts
                 */
                echo $this->font_style_css( array(
                    'selector'           => 'blockquote, .format-quote blockquote',
                    'font-type'          => ot_get_option('ut_blockquote_font_type', 'ut-font' ),   
                    'font-style'         => ot_get_option('ut_blockquote_font_style', 'semibold' ),
                    'google-font-style'  => ot_get_option('ut_google_blockquote_font_style'),
                    'websafe-font-style' => ot_get_option('ut_blockquote_websafe_font_style') 
                ) );                
                
                if( ot_get_option('ut_global_blockquote_headline_color') ) {
                    echo 'blockquote { color: ' . ot_get_option('ut_global_blockquote_headline_color') . ' ;}';
                }
                
                /**
                 * Single Blockquote Fonts
                 */
                echo $this->font_style_css( array(
                    'selector'           => '.single blockquote, .page blockquote',
                    'font-type'          => ot_get_option('ut_single_blockquote_font_type', 'ut-websafe' ),   
                    'font-style'         => ot_get_option('ut_single_blockquote_font_style', 'semibold' ),
                    'google-font-style'  => ot_get_option('ut_google_single_blockquote_font_style'),
                    'websafe-font-style' => ot_get_option('ut_single_blockquote_websafe_font_style') 
                ) );
                
                
                /**
                 * Global Lead
                 */
                echo $this->font_style_css( array(
                    'selector'           => '.lead, .dark .lead, .taxonomy-description',
                    'font-type'          => ot_get_option('ut_global_lead_font_type', 'ut-font' ),   
                    'font-style'         => ot_get_option('ut_lead_font_style', 'semibold' ),
                    'google-font-style'  => ot_get_option('ut_google_lead_font_style'),
                    'websafe-font-style' => ot_get_option('ut_lead_websafe_font_style') 
                ) ); 
                
                if( ot_get_option('ut_global_lead_color') ) {
                    echo '.lead p { color: ' . ot_get_option('ut_global_lead_color') . ' ;}';
                }
                

                /**
                 * Contact Section Header
                 */
                echo $this->font_style_css( array(
                    'selector'           => '#contact-section .parallax-title, #contact-section .section-title',
                    'font-type'          => ot_get_option('ut_csection_header_font_type', 'ut-font' ),   
                    'font-style'         => ot_get_option('ut_csection_header_font_style', 'regular' ),
                    'google-font-style'  => ot_get_option('ut_csection_header_google_font_style'),
                    'websafe-font-style' => ot_get_option('ut_csection_header_websafe_font_style') 
                ) );
                
                if( ot_get_option('ut_csection_header_font_type', 'ut-font' ) == 'ut-font' ) {
                
                    echo $this->typography_css( '#contact-section .parallax-title, #contact-section .section-title', ot_get_option('ut_csection_header_font_style_settings') );
                
                }
                
                /**
                 * Contact Section Lead
                 */
                echo $this->font_style_css( array(
                    'selector'           => '#contact-section .lead p',
                    'font-type'          => ot_get_option('ut_csection_lead_font_type', 'ut-font' ),   
                    'font-style'         => ot_get_option('ut_csection_lead_font_style', 'regular' ),
                    'google-font-style'  => ot_get_option('ut_csection_lead_google_font_style'),
                    'websafe-font-style' => ot_get_option('ut_csection_lead_websafe_font_style') 
                ) ); 
                
                if( ot_get_option( 'ut_csection_lead_color' ) ) {
                    echo '#contact-section .lead p { color: ' . ot_get_option('ut_csection_lead_color') . ' ;}';
                }
               
                if( ot_get_option('ut_csection_lead_font_type', 'ut-font' ) == 'ut-font' ) {
                
                    echo $this->typography_css( '#contact-section .lead', ot_get_option('ut_csection_lead_font_style_settings') );
                
                }
                    
                ?>
                
                <?php 
                
                /*
                 * Border Settings
                 */
                                                 
                if( ot_get_option('ut_site_border', 'hide' ) == 'show' ) : ?>
                
                    /* html border */
                    html { background: <?php echo ot_get_option( 'ut_site_border_color', '#FFF' ); ?>; margin-left:30px; margin-right: 30px; }
                    
                    <?php if( ot_get_option('ut_site_border_body_color' ) ) { ?>
                        
                        body, #main-content { background: <?php echo ot_get_option('ut_site_border_body_color' ); ?>; }
                    
                    <?php } ?>
                    
                    /* top header background */
                    #ut-top-header { background: <?php echo ot_get_option( 'ut_site_border_color', '#FFF' ); ?>; }
                    
                    /* placeholder color */
                    <?php if( ut_return_header_config('ut_navigation_state' , 'off') == 'on' ) { ?>
                    
                        #ut-top-header-placeholder { background: <?php echo ot_get_option( 'ut_site_border_color', '#FFF' ); ?>; }
                    
                    <?php } ?>
                
                <?php endif; ?>
                
                
                <?php 
                
                /*
                 * Top Header
                 */
                 
                if( ot_get_option('ut_top_header' , 'hide' ) == 'show' ) : ?>
                    
                    /* top header background */
                    #ut-top-header { background: <?php echo ot_get_option( 'ut_top_header_background_color', ot_get_option( 'ut_site_border_color', '#FFF' ) ); ?>; }
                    
                    /* top header colors */
                    .ut-header-inner { color: <?php echo ot_get_option( 'ut_top_header_text_color', '#888' ); ?>; }
                    
                    /* left */
                    #ut-top-header-left .fa { color: <?php echo ot_get_option( 'ut_top_header_icon_color', '#888' ); ?>; }
                    #ut-top-header-left a { color: <?php echo ot_get_option( 'ut_top_header_link_color', '#888' ); ?>; }
                    #ut-top-header-left a:hover { color: <?php echo ot_get_option( 'ut_top_header_link_color_hover', $this->accent ); ?>; }
                    
                    /* right */
                    #ut-top-header-right .fa { color: <?php echo ot_get_option( 'ut_top_header_social_icon_color', '#888' ); ?>; }
                    #ut-top-header-right .fa:hover { color: <?php echo ot_get_option( 'ut_top_header_social_icon_color_hover', $this->accent ); ?>; }
                        
                    /* video size */
                    #ut-hero .ut-video-control, .ut-audio-control { bottom: 50px !important; }
                    
                <?php endif; ?>
                
     
                /* LightGallery
                ================================================== */ 
                .lg-progress-bar .lg-progress { background-color: <?php echo $this->accent; ?>; }
                .lg-outer .lg-thumb-item.active, .lg-outer .lg-thumb-item:hover { border-color: <?php echo $this->accent; ?>; }
                
                /* Parallax Overlay 
                ================================================== */
                .parallax-overlay-pattern.style_one { background-image: url(" <?php echo THEME_WEB_ROOT; ?>/images/overlay-pattern.png") !important; }
                .parallax-overlay-pattern.style_two { background-image: url(" <?php echo THEME_WEB_ROOT; ?>/images/overlay-pattern2.png") !important; }
                
                /* General Section Headlines
                ================================================== */
                <?php echo $this->section_headline_css('', 'pt-style-2', ot_get_option('ut_global_headline_style_2_color'), ot_get_option('ut_global_headline_style_2_height', '1px'), ot_get_option('ut_global_headline_style_2_width', '30px') ); ?>


                <?php if( ot_get_option( 'ut_vc_page_padding' ) == 'off' ) : ?>
                    
                    /* Page Spacing
                    ================================================== */
                    
                    /*
                    .page #primary, .home #primary, .single #primary { padding-top: 0 !important; }
                    .page #primary, .home #primary, .single #primary { padding-bottom:0 !important; } 
                    */
                    
                <?php endif; ?>
                
                
                <?php if( !unite_mobile_detection()->isMobile() && ot_get_option('ut_animate_sections' , 'on') == 'on' ) : ?>
                    
                    /* Section Animation
                    ================================================== */
                    
                    .js #main-content section .section-content,
                    .js #main-content section .section-header-holder {
                        opacity:0;
                    }
                        
                <?php endif; ?>
                
                
                .blog #primary,
                .single #primary,
                .search #primary,
                .archive #primary {
                    padding-top:<?php echo $this->add_px_value( ot_get_option('ut_blog_padding_top') ); ?>;
                    padding-bottom:<?php echo $this->add_px_value( ot_get_option('ut_blog_padding_bottom') ); ?>;   
                }
                
                .blog #secondary,
                .single #secondary {
                    padding-top:<?php echo $this->add_px_value( ot_get_option('ut_blog_padding_top') ); ?>;   
                }
                
                .blog.has-no-hero #primary,
                .single.has-no-hero #primary {
                    padding-top:<?php echo $this->add_px_value( ot_get_option('ut_blog_no_hero_padding_top') ); ?>;
                    padding-bottom:<?php echo $this->add_px_value( ot_get_option('ut_blog_no_hero_padding_bottom') ); ?>;
                }
                
                .blog.has-no-hero #secondary,
                .single.has-no-hero #secondary {
                    padding-top:<?php echo $this->add_px_value( ot_get_option('ut_blog_no_hero_padding_top') ); ?>;
                }
                
                .page #primary {
                    padding-top:<?php echo $this->add_px_value( ot_get_option('ut_page_padding_top') ); ?>;
                    padding-bottom:<?php echo $this->add_px_value( ot_get_option('ut_page_padding_bottom') ); ?>;   
                }
                
                .page #secondary {
                    padding-top:<?php echo $this->add_px_value( ot_get_option('ut_page_padding_top') ); ?>;
                }
                
                .page.has-no-hero #primary {
                    padding-top:<?php echo $this->add_px_value( ot_get_option('ut_page_no_hero_padding_top') ); ?>;
                    padding-bottom:<?php echo $this->add_px_value( ot_get_option('ut_page_no_hero_padding_bottom') ); ?>;  
                }
                
                .page.has-no-hero #secondary {
                    padding-top:<?php echo $this->add_px_value( ot_get_option('ut_page_no_hero_padding_top') ); ?>;
                }
                
                .ut-vc-offset-anchor-top,
                .ut-vc-offset-anchor-bottom {
                    position:absolute;
                    width: 0px;
                    height: 0px;
                    display: block;
                    overflow: hidden;
                    visibility: hidden;
                }
                
                .ut-vc-offset-anchor-top {
                    top:0;
                    left:0;
                }
                
                .ut-vc-offset-anchor-bottom {
                    left:0;
                    bottom:0px;
                }
                
                .ut-scroll-up-waypoint-wrap {
                    position:relative;
                }
                
                
            
            </style>
            
            <?php
            
            /* output css */
            echo $this->minify_css( ob_get_clean() );
                    
        
        }

    }

}

new UT_Global_CSS;