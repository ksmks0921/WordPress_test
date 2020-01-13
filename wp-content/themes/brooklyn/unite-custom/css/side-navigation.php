<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Side_Navigation_CSS' ) ) {	
    
    class UT_Side_Navigation_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
            
            if( ut_return_header_config( 'ut_header_layout', 'default' ) != 'side' ) {
                return;
            }
            
            ob_start(); ?>
                
            <style id="ut-side-navigation-custom-css" type="text/css">
                
                <?php if( ot_get_option( 'ut_side_header_width' ) ) : ?>
                    
                    #bklyn-sidenav-wrap {
                        width: <?php echo ot_get_option( 'ut_side_header_width' , '21' ); ?>%;
                    }
                
                <?php endif; ?>
                
                .ut-has-bklyn-sidenav .vc-sidenav-column-container-wrap {
                    position:relative;
                    display:block;
                    width:100%;
                    height:100%;               
                }
                
                #bklyn-sidenav-content-wrap {
                    min-height: 100%;
                    height: 100%;  
                }
                
                <?php if( ot_get_option( 'ut_side_header_align', 'left' ) == 'left' ) : ?>  
                
                    /* top header */
                    .ut-has-bklyn-sidenav #ut-top-header {
                        position: absolute;
                        margin-left: <?php echo ot_get_option( 'ut_side_header_width' , '21' ); ?>%;
                        z-index:1;
                    }
                    
                    /* content wrap */
                    #bklyn-sidenav-content-wrap {
                        margin-left: <?php echo ot_get_option( 'ut_side_header_width' , '21' ); ?>%;
                    }
                    
                    /* vc column container wrap */
                    .ut-has-bklyn-sidenav .vc-sidenav-column-container-wrap {
                        padding-left:<?php echo ot_get_option( 'ut_side_header_width' , '21' ); ?>%;                        
                    }
                    
                    .ut-has-bklyn-sidenav .vc_row.vc_row-o-equal-height.vc_row-o-columns-stretch > .vc_column_container {
                        margin-left: <?php echo ot_get_option( 'ut_side_header_width' , '21' ); ?>%;
                    }
                    
                    /* mobile */
                    @media (max-width: 767px) {
                    
                        #bklyn-sidenav-content-wrap {
                            margin-left:0px;
                        }
                        
                        .ut-has-bklyn-sidenav .vc-sidenav-column-container-wrap {
                            padding-left:0px;                        
                        }
                        
                        .ut-has-bklyn-sidenav .vc_row.vc_row-o-equal-height.vc_row-o-columns-stretch > .vc_column_container {
                            margin-left: 0px;
                        }
                    
                    }
                    
                    /* tablet */
                    @media (min-width: 768px) and (max-width: 1024px) {
                    
                        #bklyn-sidenav-content-wrap {
                            margin-left:0px;
                        }
                        
                        .ut-has-bklyn-sidenav .vc-sidenav-column-container-wrap {
                            padding-left:0px;                        
                        }
                        
                        .ut-has-bklyn-sidenav .vc_row.vc_row-o-equal-height.vc_row-o-columns-stretch > .vc_column_container {
                            margin-left: 0px;
                        }
                    
                    }
                    
                <?php else : ?>
                    
                    #bklyn-sidenav-wrap {
                        left:inherit;
                        right:0;
                    }
                    
                    /* top header */
                    .ut-has-bklyn-sidenav #ut-top-header {
                        position: absolute;
                        margin-right: <?php echo ot_get_option( 'ut_side_header_width' , '21' ); ?>%;
                        z-index:1;
                    }
                    
                    /* content wrap */
                    #bklyn-sidenav-content-wrap {
                        margin-right: <?php echo ot_get_option( 'ut_side_header_width' , '21' ); ?>%;
                    }
                    
                    /* vc column container wrap */
                    .ut-has-bklyn-sidenav .vc-sidenav-column-container-wrap {
                        padding-right:<?php echo ot_get_option( 'ut_side_header_width' , '21' ); ?>%;
                    }
                    
                    .ut-has-bklyn-sidenav .vc_row.vc_row-o-equal-height.vc_row-o-columns-stretch > .vc_column_container {
                        margin-right:<?php echo ot_get_option( 'ut_side_header_width' , '21' ); ?>%;
                    }
                    
                    #bklyn-sidenav-wrap.bklyn-sidenav-shadow {
                        -webkit-box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.2);
                           -moz-box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.2);
                                box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.2);                    
                    }
                    
                    
                    /* mobile */
                    @media (max-width: 767px) {
                    
                        #bklyn-sidenav-content-wrap {
                            margin-right:0px;
                        }
                        
                        .ut-has-bklyn-sidenav .vc-sidenav-column-container-wrap {
                            padding-right:0px;
                        }
                        
                        .ut-has-bklyn-sidenav .vc_row.vc_row-o-equal-height.vc_row-o-columns-stretch > .vc_column_container {
                            margin-right:0px;
                        }
                    
                    }
                    
                    /* tablet */
                    @media (min-width: 768px) and (max-width: 1024px) {
                    
                        #bklyn-sidenav-content-wrap {
                            margin-right:0px;
                        }
                        
                        .ut-has-bklyn-sidenav .vc-sidenav-column-container-wrap {
                            padding-right:0px;
                        }
                        
                        .ut-has-bklyn-sidenav .vc_row.vc_row-o-equal-height.vc_row-o-columns-stretch > .vc_column_container {
                            margin-right:0px;
                        }
                    
                    }
                
                <?php endif; ?>
                                 
                /* side navigation sub menu default state */                
                #bklyn-sidenav ul .sub-menu,
                #bklyn-sidenav ul .sub-menu ul {
                    display: none;
                }
                
                #bklyn-sidenav ul .current-menu-ancestor > .sub-menu {
                    display: block;
                }
                
                /* Main Navigation Font
                ================================================== */ 
                <?php 
                    
                    /* font weight fallback */
                    $font_weight_fallback = ut_return_header_config( 'ut_navigation_font_weight', 'normal' ) == 'bold' ? 'semibold' : 'regular';
                    
                    echo $this->font_style_css( array(
                        'selector'           => '#ut-sitebody #bklyn-sidenav ul li a',
                        'font-type'          => ot_get_option('ut_global_navigation_font_type', 'ut-font' ),   
                        'font-style'         => ot_get_option('ut_global_navigation_font_style', $font_weight_fallback ),
                        'google-font-style'  => ot_get_option('ut_global_navigation_google_font_style'),
                        'websafe-font-style' => ot_get_option('ut_global_navigation_websafe_font_style') 
                    ) ); 
                    
                ?>
                
                <?php if ( ot_get_option( 'ut_global_side_navigation_arrow_line_height' ) ) : ?>
                
                    #bklyn-sidenav ul li::before {
                        line-height: <?php echo ot_get_option( 'ut_global_side_navigation_arrow_line_height' ); ?>
                    }
                
                <?php endif; ?>
                
                /* Main Navigation Submenu
                ================================================== */        
                <?php echo $this->typography_css( '#ut-sitebody #bklyn-sidenav ul.sub-menu li > a', ot_get_option('ut_global_navigation_submenu_font_style') ); ?>     
                
                /* Mobile Navigation
                ================================================== */
                <?php echo $this->typography_css( '#ut-sitebody #ut-mobile-menu a', ot_get_option('ut_global_mobile_navigation_font_style') ); ?>
                
                /* Text Logo
                ================================================== */
                <?php echo $this->typography_css( '.side-site-logo h1.logo a', ot_get_option('ut_global_header_text_logo_websafe_font_style') ); ?>
                
                <?php 
                
                /* Background Image
                ================================================== */
                $ut_side_header_background_image = ut_return_header_config( 'ut_side_header_background_image' );
                
                if( $ut_side_header_background_image ) : 
                
                    echo $this->css_background( '#bklyn-sidenav-wrap' , $ut_side_header_background_image );
                
                endif; ?>
                
                <?php if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-dark' ) == 'ut-header-light' ) : ?>
                    
                    #bklyn-sidenav-wrap.ut-header-light {
                        background-color:#FFF;
                    }
                    
                    #bklyn-sidenav-wrap.ut-header-light #bklyn-sidenav ul li::before {
                        color:#444444;   
                    }
                    
                    #bklyn-sidenav-wrap.ut-header-light #bklyn-sidenav ul li a {
                        color:#999999;   
                    }
                    
                    #bklyn-sidenav-wrap.ut-header-light #bklyn-sidenav ul li a:hover,
                    #bklyn-sidenav-wrap.ut-header-light #bklyn-sidenav ul li a:focus,
                    #bklyn-sidenav-wrap.ut-header-light #bklyn-sidenav ul li a:active {
                        color: <?php echo $this->accent; ?>;   
                    }
                    
                    #bklyn-sidenav-wrap.ut-header-light #bklyn-sidenav .current_page_item > a, 
                    #bklyn-sidenav-wrap.ut-header-light #bklyn-sidenav .current-menu-item > a,
                    #bklyn-sidenav-wrap.ut-header-light #bklyn-sidenav .current_page_ancestor > a, 
                    #bklyn-sidenav-wrap.ut-header-light #bklyn-sidenav .current-menu-ancestor > a,
                    #bklyn-sidenav-wrap.ut-header-light #bklyn-sidenav ul li a.selected {
                        color: <?php echo $this->accent; ?>;
                    }
                    
                    #bklyn-sidenav-wrap.ut-header-light .search-field {
                        background:#FFFFFF;
                        border-color:#DDDDDD;
                        color:#B2B2B6;
                    }
                    
                    #bklyn-sidenav-wrap.ut-header-light .search-field:focus {
                        background:transparent;
                        border-color:#CFCFCF;
                        color:#222222;   
                    }
                    
                    #bklyn-sidenav-wrap.ut-header-light #bklyn-sidenav-search .fa-search {
                        color:#999999;    
                    }
                     
                    #bklyn-sidenav-wrap.ut-header-light .ut-sociallinks {
                        border-top:1px dotted #dddddd;
                    }
                    
                    #bklyn-sidenav-wrap.ut-header-light .ut-sociallinks li a {
                        color:#999999;    
                    }
                    
                    #bklyn-sidenav-wrap.ut-header-light .ut-sociallinks li a:hover,
                    #bklyn-sidenav-wrap.ut-header-light .ut-sociallinks li a:focus,
                    #bklyn-sidenav-wrap.ut-header-light .ut-sociallinks li a:active {
                        color: <?php echo $this->accent; ?>;    
                    }
                
                <?php endif; ?>

                <?php if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-dark' ) == 'ut-header-dark' ) : ?>
                
                    #bklyn-sidenav-wrap.ut-header-dark {
                        background-color:#1F2223;
                    }
                    
                    #bklyn-sidenav-wrap.ut-header-dark #bklyn-sidenav ul li::before {
                        color:#444444;   
                    }
                    
                    #bklyn-sidenav-wrap.ut-header-dark #bklyn-sidenav ul li a {
                        color:#777777;   
                    }
                    
                    #bklyn-sidenav-wrap.ut-header-dark #bklyn-sidenav ul li a:hover,
                    #bklyn-sidenav-wrap.ut-header-dark #bklyn-sidenav ul li a:focus,
                    #bklyn-sidenav-wrap.ut-header-dark #bklyn-sidenav ul li a:active {
                        color:#FFFFFF;   
                    }
                    
                    #bklyn-sidenav-wrap.ut-header-dark #bklyn-sidenav .current_page_item > a, 
                    #bklyn-sidenav-wrap.ut-header-dark #bklyn-sidenav .current-menu-item > a,
                    #bklyn-sidenav-wrap.ut-header-dark #bklyn-sidenav .current_page_ancestor > a, 
                    #bklyn-sidenav-wrap.ut-header-dark #bklyn-sidenav .current-menu-ancestor > a,
                    #bklyn-sidenav-wrap.ut-header-dark #bklyn-sidenav ul li a.selected {
                        color:#FFFFFF;
                    }
                    
                    #bklyn-sidenav-wrap.ut-header-dark .search-field {
                        background:transparent;
                        border-color:#333333;
                        color:#777777;   
                    }
                    
                    #bklyn-sidenav-wrap.ut-header-dark .search-field:focus {
                        background:transparent;
                        border-color:#333333;
                        color:#E5E5E5;   
                    }
                    
                    #bklyn-sidenav-wrap.ut-header-dark #bklyn-sidenav-search .fa-search {
                        color:#444444;
                    }
                    
                    #bklyn-sidenav-wrap.ut-header-dark .ut-sociallinks {
                        border-top: 1px dotted #333333;
                    }
                    
                    #bklyn-sidenav-wrap.ut-header-dark .ut-sociallinks li a {
                        color:#444444;    
                    }
                    
                    #bklyn-sidenav-wrap.ut-header-dark .ut-sociallinks li a:hover,
                    #bklyn-sidenav-wrap.ut-header-dark .ut-sociallinks li a:focus,
                    #bklyn-sidenav-wrap.ut-header-dark .ut-sociallinks li a:active {
                        color: #FFFFFF;    
                    }
                    
                <?php endif; ?>
                
                
                <?php if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-dark' ) == 'ut-header-custom' ) : ?>           
                    
                    /* Custom Skin Navigation Settings
                    ================================================== */
                         
                    <?php if( ut_return_header_config( 'ut_header_ps_text_logo_color' ) ) : ?>
                        
                        .side-site-logo h1.logo a {
                            color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_header_ps_text_logo_color' ) ); ?>;
                            color:<?php echo ut_return_header_config( 'ut_header_ps_text_logo_color' ); ?>;
                        }
                    
                    <?php endif; ?>
                    
                    <?php if( ut_return_header_config( 'ut_header_ps_text_logo_color_hover' ) ) : ?>
                    
                        .side-site-logo h1.logo a:hover,
                        .side-site-logo h1.logo a:focus,
                        .side-site-logo h1.logo a:active {
                            color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_header_ps_text_logo_color_hover' ) ); ?> !important;
                            color:<?php echo ut_return_header_config( 'ut_header_ps_text_logo_color_hover' ); ?> !important;
                        }
                    
                    <?php endif; ?>
                    
                    <?php if( ut_return_header_config( 'ut_header_ps_background_color' ) ) : ?>
                
                        #ut-sitebody #bklyn-sidenav-wrap.ut-primary-custom-skin {
                            background-color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_header_ps_background_color' ) ); ?> !important;
                            background-color:<?php echo ut_return_header_config( 'ut_header_ps_background_color' ); ?> !important;
                        }
                    
                    <?php endif; ?>
                    
                    <?php if( ut_return_header_config( 'ut_header_ps_shadow_color' ) ) : ?>
                
                        #ut-sitebody #bklyn-sidenav-wrap.ut-primary-custom-skin.bklyn-sidenav-shadow {
                           -webkit-box-shadow:0 1px 5px <?php echo ut_return_header_config( 'ut_header_ps_shadow_color' ); ?>;
                              -moz-box-shadow:0 1px 5px <?php echo ut_return_header_config( 'ut_header_ps_shadow_color' ); ?>;
                                   box-shadow:0 1px 5px <?php echo ut_return_header_config( 'ut_header_ps_shadow_color' ); ?>;
                        }
                    
                    <?php endif; ?>
                    
                    
                    <?php if( ut_return_header_config( 'ut_navigation_ps_fl_color' ) ) : ?>
                
                        #ut-sitebody .ut-primary-custom-skin #bklyn-sidenav ul li a {
                            color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_fl_color' ) ); ?>;
                            color:<?php echo ut_return_header_config( 'ut_navigation_ps_fl_color' ); ?>;   
                        }    
                    
                    <?php endif; ?>
                    
                    
                    <?php if( ut_return_header_config( 'ut_navigation_ps_fl_color_hover' ) ) : ?>
                    
                        #ut-sitebody .ut-primary-custom-skin #bklyn-sidenav ul li a:hover,
                        #ut-sitebody .ut-primary-custom-skin #bklyn-sidenav ul li a:focus,
                        #ut-sitebody .ut-primary-custom-skin #bklyn-sidenav ul li a:active {
                            color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_fl_color_hover' ) ); ?>;
                            color:<?php echo ut_return_header_config( 'ut_navigation_ps_fl_color_hover' ); ?>;   
                        }    
                    
                    <?php endif; ?>
                    
                    
                    <?php if( ut_return_header_config( 'ut_navigation_ps_fl_active_color' ) ) : ?>
                
                        #ut-sitebody .ut-primary-custom-skin #bklyn-sidenav .current_page_item > a, 
                        #ut-sitebody .ut-primary-custom-skin #bklyn-sidenav .current-menu-item > a,
                        #ut-sitebody .ut-primary-custom-skin #bklyn-sidenav .current_page_ancestor > a, 
                        #ut-sitebody .ut-primary-custom-skin #bklyn-sidenav .current-menu-ancestor > a,
                        #ut-sitebody .ut-primary-custom-skin #bklyn-sidenav ul li a.selected {
                             color:<?php echo $this->rgba_to_rgb(  ut_return_header_config( 'ut_navigation_ps_fl_active_color' ) ); ?>;
                             color:<?php echo ut_return_header_config( 'ut_navigation_ps_fl_active_color' ); ?>;
                        }
                    
                    <?php endif; ?>
                    
                    
                    <?php if( ut_return_header_config( 'ut_navigation_ps_fl_arrow_color' ) ) : ?>
                    
                        #ut-sitebody .ut-primary-custom-skin #bklyn-sidenav ul li::before {
                            color:<?php echo $this->rgba_to_rgb(  ut_return_header_config( 'ut_navigation_ps_fl_arrow_color' ) ); ?>;
                            color:<?php echo ut_return_header_config( 'ut_navigation_ps_fl_arrow_color' ); ?>;   
                        }
                    
                    <?php endif; ?>
                    
                    
                    <?php if( ut_return_header_config( 'ut_navigation_ps_sl_color' ) ) : ?>
            
                        #ut-sitebody .ut-primary-custom-skin #bklyn-sidenav ul.sub-menu li > a {
                            color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_sl_color' ) ); ?>;
                            color:<?php echo ut_return_header_config( 'ut_navigation_ps_sl_color' ); ?>;
                        }
                    
                    <?php endif; ?>
            
                    
                    <?php if( ut_return_header_config( 'ut_navigation_ps_sl_active_color' ) ) : ?>
            
                        #ut-sitebody .ut-primary-custom-skin #bklyn-sidenav ul.sub-menu li.current_page_item > a,
                        #ut-sitebody .ut-primary-custom-skin #bklyn-sidenav ul.sub-menu li.current-menu-item > a {
                            color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_sl_active_color' ) ); ?>;
                            color:<?php echo ut_return_header_config( 'ut_navigation_ps_sl_active_color' ); ?>;
                        }
                    
                    <?php endif; ?>
                    
                    
                    <?php if( ut_return_header_config( 'ut_navigation_ps_sl_color_hover' ) ) : ?>
                    
                        #ut-sitebody .ut-primary-custom-skin #bklyn-sidenav ul.sub-menu li > a:hover,
                        #ut-sitebody .ut-primary-custom-skin #bklyn-sidenav ul.sub-menu li > a:focus,
                        #ut-sitebody .ut-primary-custom-skin #bklyn-sidenav ul.sub-menu li > a:active  {
                            color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_sl_color_hover' ) ); ?>;
                            color:<?php echo ut_return_header_config( 'ut_navigation_ps_sl_color_hover' ); ?>;
                        }
                    
                    <?php endif; ?>
                    
                    <?php if( ut_return_header_config( 'ut_navigation_ps_sl_arrow_color' ) ) : ?>
            
                        #ut-sitebody .ut-primary-custom-skin #bklyn-sidenav ul.sub-menu li:before {
                            color:<?php echo $this->rgba_to_rgb( ut_return_header_config( 'ut_navigation_ps_sl_arrow_color' ) ); ?>;
                            color:<?php echo ut_return_header_config( 'ut_navigation_ps_sl_arrow_color' ); ?>;
                        }
                    
                    <?php endif; ?>
                    
                    <?php if( ut_return_header_config( 'ut_side_header_search_form_icon_color' ) ) : ?>
                        
                        #bklyn-sidenav-search .fa-search {
                            color: <?php echo ut_return_header_config( 'ut_side_header_search_form_icon_color' ); ?>;
                        }
                    
                    <?php endif; ?>
                        
                    #bklyn-sidenav-search .search-field {
                        background: transparent;
                    }
                
                    <?php if( ut_return_header_config( 'ut_side_header_search_form_border_color' ) ) : ?>
                        
                        #bklyn-sidenav-search .search-field {
                            border-color: <?php echo ut_return_header_config( 'ut_side_header_search_form_border_color' ); ?>;
                        }
                    
                    <?php endif; ?>
                    
                    <?php if( ut_return_header_config( 'ut_side_header_search_form_placeholder_color' ) ) : ?>
                        
                        #bklyn-sidenav-search .search-field {
                            color: <?php echo ut_return_header_config( 'ut_side_header_search_form_placeholder_color' ); ?>;
                        }
                    
                    <?php endif; ?>
                    
                    <?php if( ut_return_header_config( 'ut_side_header_search_form_border_focus_color' ) ) : ?>
                        
                        #bklyn-sidenav-search .search-field:focus {
                            border-color: <?php echo ut_return_header_config( 'ut_side_header_search_form_border_focus_color' ); ?>;
                        }
                    
                    <?php endif; ?>
                    
                    <?php if( ut_return_header_config( 'ut_side_header_search_form_placeholder_focus_color' ) ) : ?>
                        
                        #bklyn-sidenav-search .search-field:focus {
                            color: <?php echo ut_return_header_config( 'ut_side_header_search_form_placeholder_focus_color' ); ?>;
                        }
                    
                    <?php endif; ?>
                    
                    <?php if( ut_return_header_config( 'ut_side_header_social_icons_border_color' ) ) : ?>
                    
                        #ut-sitebody .ut-primary-custom-skin .ut-sociallinks {
                            border-top: 1px dotted <?php echo ut_return_header_config( 'ut_side_header_social_icons_border_color' ); ?>;
                        }
                    
                    <?php endif; ?>
                    
                    <?php if( ut_return_header_config( 'ut_side_header_social_icon_color' ) ) : ?>
                    
                        #ut-sitebody .ut-primary-custom-skin .ut-sociallinks li a {
                            color: <?php echo ut_return_header_config( 'ut_side_header_social_icon_color' ); ?>;    
                        }
                    
                    <?php endif; ?>
                    
                    <?php if( ut_return_header_config( 'ut_side_header_social_icon_color_hover' ) ) : ?>
                    
                        #ut-sitebody .ut-primary-custom-skin .ut-sociallinks li a:hover,
                        #ut-sitebody .ut-primary-custom-skin .ut-sociallinks li a:focus,
                        #ut-sitebody .ut-primary-custom-skin .ut-sociallinks li a:active {
                            color: <?php echo ut_return_header_config( 'ut_side_header_social_icon_color_hover' ); ?>;    
                        }
                    
                    <?php endif; ?>
                    
                <?php endif; ?>
                
                
                 <?php if( ut_return_header_config( 'ut_side_header_copyright_color' ) ) : ?>
                    
                    #ut-sitebody .bklyn-sidenav-copyright  {
                        color: <?php echo ut_return_header_config( 'ut_side_header_copyright_color' ); ?>;    
                    }
                
                <?php endif; ?>
                
            </style>            
                
            <?php
            
            $this->css .= ob_get_clean();
            
            /* output css */
            echo $this->minify_css( $this->css );
        
        }
        
    }

}

new UT_Side_Navigation_CSS;