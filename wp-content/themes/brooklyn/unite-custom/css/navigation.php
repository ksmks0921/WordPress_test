<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Navigation_CSS' ) ) {	
    
    class UT_Navigation_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
                        
            /* font weight fallback */
            $font_weight_fallback = ut_return_header_config( 'ut_navigation_font_weight', 'normal' ) == 'bold' ? 'semibold' : 'regular';
            
            ob_start(); ?>
            
            <style id="ut-navigation-custom-css" type="text/css">
            
            /* Main Navigation
            ================================================== */ 
            <?php 
            
                echo $this->font_style_css( array(
                    'selector'           => '#ut-sitebody #ut-mobile-menu a, #ut-sitebody #navigation ul li a',
                    'font-type'          => ot_get_option('ut_global_navigation_font_type', 'ut-font' ),   
                    'font-style'         => ot_get_option('ut_global_navigation_font_style', $font_weight_fallback ),
                    'google-font-style'  => ot_get_option('ut_global_navigation_google_font_style'),
                    'websafe-font-style' => ot_get_option('ut_global_navigation_websafe_font_style') 
                ) ); 
                
            ?>
            
            /* Main Navigation Submenu
            ================================================== */        
            <?php echo $this->typography_css( '#ut-sitebody #navigation ul.sub-menu li > a', ot_get_option('ut_global_navigation_submenu_font_style') ); ?>     
            
            #navigation ul.sub-menu { 
                border-color:<?php echo $this->accent; ?>; 
            }            
                        
            /* Text Logo
            ================================================== */
            <?php echo $this->typography_css( '#ut-sitebody h1.logo a', ot_get_option('ut_global_header_text_logo_websafe_font_style') ); ?>
            
            
            <?php if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-light' ) : ?>
                
                /* Light Skin Navigation Settings
                ================================================== */
                #ut-sitebody #navigation li a:hover { color: <?php echo $this->accent; ?>; }
                
                /* main navigation parents and ancestor */
                #ut-sitebody #navigation .selected,
                #ut-sitebody #navigation ul li.current_page_parent a.active,
                #ut-sitebody #navigation ul li.current-menu-ancestor a.active { color: <?php echo $this->accent; ?>; }
                             
                #ut-sitebody #navigation ul li a:hover, 
                #ut-sitebody #navigation ul.sub-menu li a:hover { color: <?php echo $this->accent; ?>; }     
                
                /* main navigation current page */
                #ut-sitebody #navigation ul.sub-menu li > a { color: #999999; }
                #ut-sitebody #navigation ul li.current-menu-item:not(.current_page_parent):not(.menu-item-object-custom) a,
                #ut-sitebody #navigation ul li.current_page_item:not(.current_page_parent):not(.menu-item-object-custom) a { color: <?php echo $this->accent; ?>; }
                #ut-sitebody #navigation ul li.current-menu-item:not(.current_page_parent) .sub-menu li a { color: #999999; }
                                
            <?php endif; ?>
            
            
            <?php if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-dark' ) : ?>
                
                /* Dark Skin Navigation Settings
                ================================================== */
                #ut-sitebody .ut-header-dark #navigation li a:hover { color:<?php echo $this->accent; ?>; }
                
                /* main navigation parents and ancestor */
                #ut-sitebody #navigation .selected, 
                #ut-sitebody .ut-header-dark #navigation ul li.current_page_parent a.active,
                #ut-sitebody .ut-header-dark #navigation ul li.current-menu-ancestor a.active { color: <?php echo $this->accent; ?>; }
                             
                #ut-sitebody .ut-header-dark #navigation ul li a:hover, 
                #ut-sitebody .ut-header-dark #navigation ul.sub-menu li a:hover { color: <?php echo $this->accent; ?>; }     
                
                /* main navigation current page */
                #ut-sitebody .ut-header-dark #navigation ul.sub-menu li > a { color: #999999; }
                #ut-sitebody .ut-header-dark #navigation ul li.current-menu-item:not(.current_page_parent):not(.menu-item-object-custom) a,
                #ut-sitebody .ut-header-dark #navigation ul li.current_page_item:not(.current_page_parent):not(.menu-item-object-custom) a { color: <?php echo $this->accent; ?>; }
                #ut-sitebody .ut-header-dark #navigation ul li.current-menu-item:not(.current_page_parent) .sub-menu li a { color: #999999; }
                
                <?php if( ut_return_header_config( 'ut_navigation_level_one_color' ) )  { ?>
                    
                    #ut-sitebody .ut-header-dark #navigation ul li a { color: <?php echo ut_return_header_config( 'ut_navigation_level_one_color' ); ?>; }    
                
                <?php } ?>
                
                <?php if( ut_return_header_config('ut_navigation_level_one_icon_color') ) { ?>
                    
                    #ut-sitebody .ut-header-dark #navigation ul li a:after { color: <?php echo ut_return_header_config('ut_navigation_level_one_icon_color'); ?>; }
                
                <?php } ?>
                
            <?php endif; ?>
            
            
            /* Custom Skin Navigation Settings
            ================================================== */
            
            <?php if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-custom' ) : ?>            
                
                
                /* Primary Skin Settings
                ================================================== */       
                <?php if( ut_return_header_config( 'ut_header_ps_text_logo_color' ) ) : ?>
                        
                    .ut-primary-custom-skin h1.logo a {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_header_ps_text_logo_color' ) ); ?>;
                        color:<?php echo ut_return_header_config( 'ut_header_ps_text_logo_color' ); ?>;
                    }
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_header_ps_text_logo_color_hover' ) ) : ?>
                
                    .ut-primary-custom-skin h1.logo a:hover,
                    .ut-primary-custom-skin h1.logo a:focus,
                    .ut-primary-custom-skin h1.logo a:active {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_header_ps_text_logo_color_hover' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_header_ps_text_logo_color_hover' ); ?> !important;
                    }
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_header_ps_background_color' ) ) : ?>
                
                    #ut-sitebody #header-section.ut-primary-custom-skin {
                        background:transparent !important;
                        background:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_header_ps_background_color' ) ); ?> !important;
                        background:<?php echo ut_return_header_config( 'ut_header_ps_background_color' ); ?> !important;
                    }
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_header_ps_shadow_color' ) ) : ?>
                
                    #ut-sitebody #header-section.ut-primary-custom-skin.ha-header {
                       -webkit-box-shadow:0 1px 5px <?php echo ut_return_header_config( 'ut_header_ps_shadow_color' ); ?>;
                          -moz-box-shadow:0 1px 5px <?php echo ut_return_header_config( 'ut_header_ps_shadow_color' ); ?>;
                               box-shadow:0 1px 5px <?php echo ut_return_header_config( 'ut_header_ps_shadow_color' ); ?>;
                    }
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_header_ps_border_color' ) ) : ?>
                
                    #ut-sitebody #header-section.ut-primary-custom-skin.ha-header {
                        border-bottom:1px solid <?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_header_ps_border_color' ) ); ?>;
                        border-bottom:1px solid <?php echo ut_return_header_config( 'ut_header_ps_border_color' ); ?>;
                    }
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_navigation_ps_hover_state', 'off' ) == 'on' && ut_return_header_config( 'ut_header_ps_border_color_hover' ) ) : ?>
                
                    #ut-sitebody #header-section.ut-primary-custom-skin:hover {
                        border-bottom:1px solid <?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_header_ps_border_color_hover' ) ); ?>;
                        border-bottom:1px solid <?php echo ut_return_header_config( 'ut_header_ps_border_color_hover' ); ?>;
                    }
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_navigation_ps_hover_state', 'off' ) == 'on' && ut_return_header_config( 'ut_header_ps_background_color_hover' ) ) : ?>
                    
                     #ut-sitebody #header-section.ut-primary-custom-skin:hover {
                        background:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_header_ps_background_color_hover' ) ); ?> !important;
                        background:<?php echo ut_return_header_config( 'ut_header_ps_background_color_hover' ); ?> !important;
                    }
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_navigation_ps_hover_state', 'off' ) == 'on' && ut_return_header_config( 'ut_header_ps_shadow_color_hover' ) ) : ?>
                
                    #ut-sitebody #header-section.ut-primary-custom-skin.ha-header:hover {
                       -webkit-box-shadow:0 1px 5px <?php echo ut_return_header_config( 'ut_header_ps_shadow_color_hover' ); ?>;
                          -moz-box-shadow:0 1px 5px <?php echo ut_return_header_config( 'ut_header_ps_shadow_color_hover' ); ?>;
                               box-shadow:0 1px 5px <?php echo ut_return_header_config( 'ut_header_ps_shadow_color_hover' ); ?>;
                    }
                
                <?php endif; ?>
                                
                
                <?php if( ut_return_header_config( 'ut_navigation_ps_fl_color' ) ) : ?>
                
                    #ut-sitebody .ut-primary-custom-skin #navigation ul li a {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_fl_color' ) ); ?>;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_fl_color' ); ?>;   
                    }    
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_navigation_ps_fl_color_hover' ) ) : ?>
                
                    #ut-sitebody .ut-primary-custom-skin #navigation ul li a:hover,
                    #ut-sitebody .ut-primary-custom-skin #navigation ul li a:focus,
                    #ut-sitebody .ut-primary-custom-skin #navigation ul li a:active {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_fl_color_hover' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_fl_color_hover' ); ?> !important;   
                    }    
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_navigation_ps_fl_dot_color' ) ) : ?>
                
                    #ut-sitebody .ut-primary-custom-skin #navigation ul li a::after {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_fl_dot_color' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_fl_dot_color' ); ?> !important;   
                    }    
                
                <?php endif; ?>
                                
                
                <?php if( ut_return_header_config( 'ut_navigation_ps_hover_state', 'off' ) == 'on' && ut_return_header_config( 'ut_navigation_ps_hover_fl_color' ) ) : ?>
                
                    #ut-sitebody #header-section.ut-primary-custom-skin.ha-header:hover #navigation ul li a {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_hover_fl_color' ) ); ?>;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_hover_fl_color' ); ?>;   
                    }    
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_navigation_ps_hover_state', 'off' ) == 'on' && ut_return_header_config( 'ut_navigation_ps_hover_fl_dot_color' ) ) : ?>
                
                    #ut-sitebody #header-section.ut-primary-custom-skin:hover #navigation ul li a::after {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_hover_fl_dot_color' ) ); ?> !important;   
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_hover_fl_dot_color' ); ?> !important;   
                    }    
                
                <?php endif; ?>
                                
                
                <?php if( ut_return_header_config( 'ut_navigation_ps_fl_active_color' ) ) : ?>
                
                    #ut-sitebody .ut-primary-custom-skin #navigation .current_page_item:not(.menu-item-object-custom) > a, 
                    #ut-sitebody .ut-primary-custom-skin #navigation .current-menu-item:not(.menu-item-object-custom) > a,
                    #ut-sitebody .ut-primary-custom-skin #navigation .current_page_ancestor > a, 
                    #ut-sitebody .ut-primary-custom-skin #navigation .current-menu-ancestor > a,
                    #ut-sitebody .ut-primary-custom-skin #navigation ul li a.selected {
                         color:<?php echo $this->rgba_to_rgb(  ut_return_header_config( 'ut_navigation_ps_fl_active_color' ) ); ?> !important;
                         color:<?php echo ut_return_header_config( 'ut_navigation_ps_fl_active_color' ); ?> !important;
                    }
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_navigation_ps_sl_color' ) ) : ?>
            
                    #ut-sitebody .ut-primary-custom-skin #navigation ul.sub-menu li > a {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_sl_color' ) ); ?>;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_sl_color' ); ?>;
                    }
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_navigation_ps_sl_color_hover' ) ) : ?>
                
                    #ut-sitebody .ut-primary-custom-skin #navigation ul.sub-menu li > a:hover,
                    #ut-sitebody .ut-primary-custom-skin #navigation ul.sub-menu li > a:focus,
                    #ut-sitebody .ut-primary-custom-skin #navigation ul.sub-menu li > a:active  {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_sl_color_hover' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_sl_color_hover' ); ?> !important;
                    }
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_navigation_ps_sl_active_color' ) ) : ?>
                    
                    #ut-sitebody .ut-primary-custom-skin #navigation ul.sub-menu .current_page_item:not(.menu-item-object-custom) > a,
                    #ut-sitebody .ut-primary-custom-skin #navigation ul.sub-menu .current-menu-item:not(.menu-item-object-custom) > a,
                    #ut-sitebody .ut-primary-custom-skin #navigation ul.sub-menu .current_page_ancestor > a,
                    #ut-sitebody .ut-primary-custom-skin #navigation ul.sub-menu .current-menu-ancestor > a {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_sl_active_color' ) ); ?>!important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ps_sl_active_color' ); ?>!important;
                    }
                    
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_navigation_ps_sl_background_color' ) ) : ?>
                
                    #ut-sitebody .ut-primary-custom-skin #navigation .sub-menu {
                        background:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_sl_background_color' ) ); ?>;
                        background:<?php echo ut_return_header_config( 'ut_navigation_ps_sl_background_color' ); ?>;
                    }
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_navigation_ps_sl_shadow_color' ) ) : ?>
                
                    #ut-sitebody .ut-primary-custom-skin #navigation ul.sub-menu {
                       -webkit-box-shadow:0 1px 5px <?php echo ut_return_header_config( 'ut_navigation_ps_sl_shadow_color' ); ?>;
                          -moz-box-shadow:0 1px 5px <?php echo ut_return_header_config( 'ut_navigation_ps_sl_shadow_color' ); ?>;
                               box-shadow:0 1px 5px <?php echo ut_return_header_config( 'ut_navigation_ps_sl_shadow_color' ); ?>;
                    }
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_navigation_ps_sl_border_color' ) ) : ?>
                    
                    #ut-sitebody .ut-primary-custom-skin #navigation ul.sub-menu {
                        border-color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_sl_border_color' ) ); ?> !important;
                        border-color:<?php echo ut_return_header_config( 'ut_navigation_ps_sl_border_color' ); ?> !important;
                    }
                
                <?php endif; ?>
                                
                
                /* Secondary Skin Settings
                ================================================== */
                <?php if( ut_return_header_config( 'ut_header_ss_text_logo_color' ) ) : ?>
                        
                    .ut-secondary-custom-skin h1.logo a {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_header_ss_text_logo_color' ) ); ?>;
                        color:<?php echo ut_return_header_config( 'ut_header_ss_text_logo_color' ); ?>;   
                    }
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_header_ss_text_logo_color_hover' ) ) : ?>
                
                    .ut-secondary-custom-skin h1.logo a:hover,
                    .ut-secondary-custom-skin h1.logo a:focus,
                    .ut-secondary-custom-skin h1.logo a:active {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_header_ss_text_logo_color_hover' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_header_ss_text_logo_color_hover' ); ?> !important;
                    }
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_header_ss_background_color' ) ) : ?>
                
                    #ut-sitebody #header-section.ut-secondary-custom-skin {
                        background:transparent !important;
                        background:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_header_ss_background_color' ) ); ?> !important;
                        background:<?php echo ut_return_header_config( 'ut_header_ss_background_color' ); ?> !important;
                    }
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_header_ss_shadow_color' ) ) : ?>
                
                    #ut-sitebody #header-section.ut-secondary-custom-skin.ha-header {
                       -webkit-box-shadow:0 1px 5px <?php echo ut_return_header_config( 'ut_header_ss_shadow_color' ); ?>;
                          -moz-box-shadow:0 1px 5px <?php echo ut_return_header_config( 'ut_header_ss_shadow_color' ); ?>;
                               box-shadow:0 1px 5px <?php echo ut_return_header_config( 'ut_header_ss_shadow_color' ); ?>;
                    }
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_header_ss_border_color' ) ) : ?>
                
                    #ut-sitebody #header-section.ut-secondary-custom-skin.ha-header {
                       border-bottom:1px solid <?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_header_ss_border_color' ) ); ?>;
                       border-bottom:1px solid <?php echo ut_return_header_config( 'ut_header_ss_border_color' ); ?>;
                    }
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_navigation_ss_fl_color' ) ) : ?>
                
                    #ut-sitebody .ut-secondary-custom-skin #navigation ul li a {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ss_fl_color' ) ); ?>;   
                        color:<?php echo ut_return_header_config( 'ut_navigation_ss_fl_color' ); ?>;   
                    }    
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_navigation_ss_fl_color_hover' ) ) : ?>
                
                    #ut-sitebody .ut-secondary-custom-skin #navigation ul li a:hover,
                    #ut-sitebody .ut-secondary-custom-skin #navigation ul li a:focus,
                    #ut-sitebody .ut-secondary-custom-skin #navigation ul li a:active {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ss_fl_color_hover' ) ); ?> !important;   
                        color:<?php echo ut_return_header_config( 'ut_navigation_ss_fl_color_hover' ); ?> !important;   
                    }    
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_navigation_ss_fl_dot_color' ) ) : ?>
                
                    #ut-sitebody .ut-secondary-custom-skin #navigation ul li a::after {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ss_fl_dot_color' ) ); ?> !important;   
                        color:<?php echo ut_return_header_config( 'ut_navigation_ss_fl_dot_color' ); ?> !important;   
                    }    
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_navigation_ss_fl_active_color' ) ) : ?>
                
                    #ut-sitebody .ut-secondary-custom-skin #navigation .current_page_item:not(.menu-item-object-custom) > a, 
                    #ut-sitebody .ut-secondary-custom-skin #navigation .current-menu-item:not(.menu-item-object-custom) > a,
                    #ut-sitebody .ut-secondary-custom-skin #navigation .current_page_ancestor > a, 
                    #ut-sitebody .ut-secondary-custom-skin #navigation .current-menu-ancestor > a,
                    #ut-sitebody .ut-secondary-custom-skin #navigation ul li a.selected {
                         color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ss_fl_active_color' ) ); ?> !important;
                         color:<?php echo ut_return_header_config( 'ut_navigation_ss_fl_active_color' ); ?> !important;
                    }
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_navigation_ss_sl_color' ) ) : ?>
            
                    #ut-sitebody .ut-secondary-custom-skin #navigation ul.sub-menu li > a {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ss_sl_color' ) ); ?>;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ss_sl_color' ); ?>;
                    }
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_navigation_ss_sl_color_hover' ) ) : ?>
                
                    #ut-sitebody .ut-secondary-custom-skin #navigation ul.sub-menu li > a:hover,
                    #ut-sitebody .ut-secondary-custom-skin #navigation ul.sub-menu li > a:focus,
                    #ut-sitebody .ut-secondary-custom-skin #navigation ul.sub-menu li > a:active  {
                        color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ss_sl_color_hover' ) ); ?> !important;
                        color:<?php echo ut_return_header_config( 'ut_navigation_ss_sl_color_hover' ); ?> !important;
                    }
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_navigation_ss_sl_background_color' ) ) : ?>
                
                    #ut-sitebody .ut-secondary-custom-skin #navigation .sub-menu {
                        background:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ss_sl_background_color' ) ); ?>;
                        background:<?php echo ut_return_header_config( 'ut_navigation_ss_sl_background_color' ); ?>;
                    }
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_navigation_ss_sl_shadow_color' ) ) : ?>
                
                    #ut-sitebody .ut-secondary-custom-skin #navigation ul.sub-menu {
                       -webkit-box-shadow:0 1px 5px <?php echo ut_return_header_config( 'ut_navigation_ss_sl_shadow_color' ); ?>;
                          -moz-box-shadow:0 1px 5px <?php echo ut_return_header_config( 'ut_navigation_ss_sl_shadow_color' ); ?>;
                               box-shadow:0 1px 5px <?php echo ut_return_header_config( 'ut_navigation_ss_sl_shadow_color' ); ?>;
                    }
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_navigation_ss_sl_border_color' ) ) : ?>
                    
                    #ut-sitebody .ut-secondary-custom-skin #navigation ul.sub-menu {
                        border-color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ss_sl_border_color' ) ); ?> !important;
                        border-color:<?php echo ut_return_header_config( 'ut_navigation_ss_sl_border_color' ); ?> !important;
                    }
                
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config('ut_navigation_shadow' , 'off' ) == 'off' ) : ?>
                    
                    /* Header without Shadow
                    ================================================== */
                    .ha-header { box-shadow:none; }
                    
                <?php endif; ?>
                
            
            <?php endif; ?>
   
            </style>            
            
            <?php
            
            /* output css */
            echo $this->minify_css( ob_get_clean() );
        
        }  
            
    }

}

new UT_Navigation_CSS;