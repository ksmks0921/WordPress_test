<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Deprecated_CSS' ) ) {	
    
    class UT_Deprecated_CSS extends UT_Custom_CSS {
        
        public function custom_css() {

            /* deprecated since 4.1 */
            $ut_hero_caption_slogan_margin_bottom = ut_return_hero_config('ut_hero_caption_slogan_margin_bottom');
            
            if( $ut_hero_caption_slogan_margin_bottom ) :
            
                $this->css .= '#ut-hero .hdh { margin-bottom: ' . $this->add_px_value( $ut_hero_caption_slogan_margin_bottom ) . '; }';
            
            endif;
            
            /* deprecated since 4.0.3 */
            $ut_navigation_padding_top      = ut_return_header_config( 'ut_navigation_padding_top' );
            $ut_navigation_padding_bottom   = ut_return_header_config( 'ut_navigation_padding_bottom' );
            
            if( !empty( $ut_navigation_padding_top ) ) {
            
                $this->css .= '#header-section { padding-top: ' . $ut_navigation_padding_top . '; }';
            
            }
            
            if( !empty( $ut_navigation_padding_bottom ) ) {
                
                $this->css .= '#header-section { padding-bottom: ' . $ut_navigation_padding_bottom . '; }';
            
            }
            
            /* deprecated since 4.0.3 */
            if( ut_return_header_config('ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-light' ) {
                
                $ut_navigation_skin_light_bgcolor = ut_return_header_config('ut_navigation_skin_light_bgcolor');
                
                $ut_navigation_skin_bgcolor_opacity = ut_return_header_config('ut_navigation_skin_bgcolor_opacity');
                $ut_navigation_skin_bgcolor_opacity = !empty( $ut_navigation_skin_bgcolor_opacity ) ? $ut_navigation_skin_bgcolor_opacity : '95';
                
                if( !empty( $ut_navigation_skin_light_bgcolor ) ) {
                    
                    /* add to CSS */
                    $this->css .= '
                    #header-section.ut-header-light,
                    .ha-header.ha-transparent:hover,
                    .ha-header.ha-transparent:hover #navigation ul.sub-menu,
                    #header-section.ut-header-light #navigation ul.sub-menu {
                        background: rgba(' . ut_hex_to_rgb( $ut_navigation_skin_light_bgcolor ) . ' ,' . ( $ut_navigation_skin_bgcolor_opacity / 100 ) . ' ) ; 
                    }'; 
                    
                }
            
            /* deprecated since 4.0.3 */    
            } else {
                
                $ut_navigation_skin_dark_bgcolor = ut_return_header_config('ut_navigation_skin_dark_bgcolor');
                
                $ut_navigation_skin_bgcolor_opacity = ut_return_header_config('ut_navigation_skin_bgcolor_opacity');
                $ut_navigation_skin_bgcolor_opacity = !empty( $ut_navigation_skin_bgcolor_opacity ) ? $ut_navigation_skin_bgcolor_opacity : '95';
                
                if( !empty( $ut_navigation_skin_dark_bgcolor ) ) {
                    
                    /* add to CSS */
                    $this->css .= '
                    #header-section.ut-header-dark,
                    .ha-header.ha-transparent:hover,
                    .ha-header.ha-transparent:hover #navigation ul.sub-menu,
                    #header-section.ut-header-dark #navigation ul.sub-menu {
                        background: rgba(' . ut_hex_to_rgb( $ut_navigation_skin_dark_bgcolor ) . ' ,' . ( $ut_navigation_skin_bgcolor_opacity / 100 ) . ' ) ; 
                    }'; 
                    
                }
                    
            }
            
            /* deprecated since 4.0.3 */ 
           if( ut_return_header_config( 'ut_navigation_level_one_color' ) )  {
                    
                $this->css .= '#ut-sitebody #navigation ul li a { color: ' . ut_return_header_config( 'ut_navigation_level_one_color' ) . '; }';
                
            }
            
            if( ut_return_header_config('ut_navigation_level_one_icon_color') ) { 
                    
                $this->css .= '#ut-sitebody #navigation ul li a:after { color: ' . ut_return_header_config('ut_navigation_level_one_icon_color') . '; }';
                
            }
            
            
            
            
            
            
            if( !empty( $this->css ) ) {
                echo $this->minify_css( '<style id="ut-deprecated-css" type="text/css">' . $this->css . '</style>' );
            }
            
            
        }

    }

}

new UT_Deprecated_CSS;