<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Mobile_Navigation_CSS' ) ) {	
    
    class UT_Mobile_Navigation_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
            
            ob_start(); ?>
            
            <style id="ut-mobile-navigation-custom-css" type="text/css">
                
                <?php 
                
                /* Mobile Navigation
                ================================================== */
                echo $this->typography_css( '#ut-sitebody #ut-mobile-menu a', ot_get_option('ut_global_mobile_navigation_font_style') );
                echo $this->typography_css( '#ut-sitebody #ut-mobile-menu .sub-menu a', ot_get_option('ut_global_mobile_navigation_sub_font_style') );
                
                ?>                

                @media (max-width: 1024px) {
                    
                    .ut-mobile-menu a:hover { 
                        background:<?php echo $this->accent; ?>; 
                    }
                    
                    .ut-mobile-menu a:after,
                    .ut-mm-button:hover:before, 
                    .ut-mm-trigger.active .ut-mm-button:before { 
                        color: <?php echo $this->accent; ?>;
                    }                    
                    
                    .ut-header-light .ut-mm-button:before {
                        color: <?php echo $this->accent; ?>;
                    }
                    
                    <?php if( ot_get_option( 'ut_mobile_navigation_trigger_icon' ) ) : ?>
                        
                        <?php $unicode = ut_get_fontawesome_unicode( ot_get_option( 'ut_mobile_navigation_trigger_icon' ) ); ?>
                        
                        <?php if( $unicode ) { ?>
                        
                            #ut-sitebody .ut-mm-trigger .ut-mm-button::before{ content: "\<?php echo $unicode; ?>";}
                        
                        <?php } ?>    
                        
                    <?php endif; ?>
                    
                    
                    <?php if( ot_get_option( 'ut_header_layout', 'default' ) == 'side' ) : ?>
                        
                        #ut-sitebody #header-section.ha-header {
                            box-shadow:none;
                        }
                    
                    <?php endif; ?>
                    
                    
                    <?php if( ot_get_option( 'ut_mobile_navigation_background_color_closed' ) && ot_get_option( 'ut_header_layout', 'default' ) == 'side' ) : ?>
                        
                        #ut-sitebody #header-section.ha-header {
                             background: <?php echo ot_get_option( 'ut_mobile_navigation_background_color_closed' ); ?>; 
                        }
                    
                    <?php endif; ?>
                    
                    
                    <?php if( ot_get_option( 'ut_mobile_navigation_background_color' ) ) : ?>
                        
                        #ut-sitebody.ut-mobile-menu-open #header-section.ha-header {
                            background: <?php echo ot_get_option( 'ut_mobile_navigation_background_color' ); ?> !important; 
                        }
                        
                        #ut-sitebody.ut-mobile-menu-open .ut-header-dark #ut-mobile-nav,
                        #ut-sitebody.ut-mobile-menu-open .ut-header-light #ut-mobile-nav {
                            background:transparent;
                        }
                                                               
    
                    <?php endif; ?>    
                    
                    <?php if( ot_get_option( 'ut_mobile_navigation_link_color' ) ) : ?>
                        
                        #ut-sitebody.ut-mobile-menu-open #ut-mobile-menu a {
                            color: <?php echo ot_get_option( 'ut_mobile_navigation_link_color' ); ?> !important; 
                        }
    
                    <?php endif; ?>
                    
                    
                    <?php if( ot_get_option( 'ut_mobile_navigation_link_color_hover' ) ) : ?>
                        
                        #ut-sitebody.ut-mobile-menu-open #ut-mobile-menu a:hover,
                        #ut-sitebody.ut-mobile-menu-open #ut-mobile-menu a:focus,
                        #ut-sitebody.ut-mobile-menu-open #ut-mobile-menu a:active {
                            color: <?php echo ot_get_option( 'ut_mobile_navigation_link_color_hover' ); ?> !important; 
                        }
    
                    <?php endif; ?>
                    
                    
                   
                    
                    
                    <?php if( ot_get_option( 'ut_mobile_navigation_link_background_color_hover' ) ) : ?>
                        
                        #ut-sitebody.ut-mobile-menu-open #ut-mobile-menu a:hover,
                        #ut-sitebody.ut-mobile-menu-open #ut-mobile-menu a:focus,
                        #ut-sitebody.ut-mobile-menu-open #ut-mobile-menu a:active {
                            background: <?php echo ot_get_option( 'ut_mobile_navigation_link_background_color_hover' ); ?> !important; 
                        }
    
                    <?php endif; ?>
                    
                    
                    <?php if( ot_get_option( 'ut_mobile_navigation_dot_color' ) ) : ?>
                        
                        #ut-sitebody.ut-mobile-menu-open #ut-mobile-menu a::after {
                            color: <?php echo ot_get_option( 'ut_mobile_navigation_dot_color' ); ?>; 
                        }
    
                    <?php endif; ?>
                    
                    <?php if( ot_get_option( 'ut_mobile_navigation_submenu_dot_color' ) ) : ?>
                        
                        #ut-sitebody.ut-mobile-menu-open #ut-mobile-menu .sub-menu a::after {
                            color: <?php echo ot_get_option( 'ut_mobile_navigation_submenu_dot_color' ); ?>; 
                        }
    
                    <?php endif; ?>
                    
                    
                    <?php if( ot_get_option( 'ut_mobile_navigation_dot_color_hover' ) ) : ?>
                        
                        #ut-sitebody.ut-mobile-menu-open #ut-mobile-menu a:hover::after {
                            color: <?php echo ot_get_option( 'ut_mobile_navigation_dot_color_hover' ); ?>; 
                        }
    
                    <?php endif; ?>
                    
                    <?php if( ot_get_option( 'ut_mobile_navigation_submenu_dot_color_hover' ) ) : ?>
                        
                        #ut-sitebody.ut-mobile-menu-open #ut-mobile-menu .sub-menu a:hover::after {
                            color: <?php echo ot_get_option( 'ut_mobile_navigation_dot_color_hover' ); ?>; 
                        }
    
                    <?php endif; ?>
                    
                    
                    <?php if( ot_get_option( 'ut_mobile_navigation_border_color' ) ) : ?>
                        
                        #ut-sitebody.ut-mobile-menu-open #ut-mobile-menu,
                        #ut-sitebody.ut-mobile-menu-open #ut-mobile-menu a {
                            border-color:<?php echo ot_get_option( 'ut_mobile_navigation_border_color' ); ?>;
                        }
                        
                    <?php endif; ?>
                    
                    
                    <?php if( ot_get_option( 'ut_mobile_navigation_trigger_color' ) ) : ?>
                        
                        #ut-sitebody .ut-mm-trigger .ut-mm-button::before {
                            color: <?php echo ot_get_option( 'ut_mobile_navigation_trigger_color' ); ?>; 
                        }
    
                    <?php endif; ?>
                    
                    
                    <?php if( ot_get_option( 'ut_mobile_navigation_trigger_color_hover' ) ) : ?>
                        
                        #ut-sitebody .ut-mm-trigger .ut-mm-button:hover::before,
                        #ut-sitebody.ut-mobile-menu-open .ut-mm-trigger.active .ut-mm-button::before {
                            color: <?php echo ot_get_option( 'ut_mobile_navigation_trigger_color_hover' ); ?>; 
                        }
    
                    <?php endif; ?>

                }
                
                
                
                
            
            </style>            
            
            <?php
            
            /* output css */
            echo $this->minify_css( ob_get_clean() );
            
        }        
        
    }

}

new UT_Mobile_Navigation_CSS();