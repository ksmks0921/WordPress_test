<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/*
|--------------------------------------------------------------------------
| Start Custom CSS
|--------------------------------------------------------------------------
*/
if ( !function_exists( 'unitedthemes_custom_css' ) ) {
       
    function unitedthemes_custom_css() {
        
        $google_fonts     = ut_recognized_google_fonts();
        $ut_recognized_font_styles = ut_recognized_font_styles();
        $font_styles = array(
            'regular' => 'normal',
            'normal'  => 'normal',
            'italic'  => 'italic'
        );
          
        $css = NULL;
        
        $UT_Custom_CSS = new UT_Custom_CSS();
                
        /* start css */
        $css .= '<style type="text/css">'. "\n";
            
            $ut_hero_type  = ut_return_hero_config('ut_hero_type');
            $ut_hero_style = ut_return_hero_config('ut_hero_style' , 'ut-hero-style-1');
            
            /* header hero font style for front */
            if( is_front_page() || is_singular('portfolio') || is_page() || is_404() || is_archive() || is_author() || is_search() ) {                
                
                if( ot_get_option('ut_front_hero_font_type' , 'ut-font') == 'ut-google' ) {
                
                    $ut_google_front_page_hero_font_style = ot_get_option('ut_google_front_page_hero_font_style');
                    
                    if( !empty($google_fonts[$ut_google_front_page_hero_font_style['font-id']]['family']) ) {
                                                
                        if( $ut_hero_style == 'ut-hero-style-11') {
                            $css.= '#ut-hero .hdh .hero-description,';
                        }
                        
                        $css .= '.hero-title {';
                            
                            /* familiy */
                            $css .= 'font-family:"'.$google_fonts[$ut_google_front_page_hero_font_style['font-id']]['family'].'", "Helvetica Neue", Helvetica, Arial, sans-serif;';                    
                            
                            if( !empty($ut_google_front_page_hero_font_style['font-weight']) ) {
                                $css .= ' font-weight: ' . $ut_google_front_page_hero_font_style['font-weight'] . ';';    
                            }
                            
                            if( !empty($ut_google_front_page_hero_font_style['font-size']) ) {
                                $css .= ' font-size: ' . $ut_google_front_page_hero_font_style['font-size'] . ';';    
                            }
                            
                            if( !empty($ut_google_front_page_hero_font_style['font-style']) ) {
                                $css .= ' font-style: ' . $font_styles[$ut_google_front_page_hero_font_style['font-style']] . ';';    
                            }
                            
                            if( !empty($ut_google_front_page_hero_font_style['line-height']) ) {
                                $css .= ' line-height: ' . $ut_google_front_page_hero_font_style['line-height'] . ';';    
                            }
                            
                            if( !empty($ut_google_front_page_hero_font_style['text-transform']) ) {
                                $css .= ' text-transform: ' . $ut_google_front_page_hero_font_style['text-transform'] . ';';    
                            }
                            
                        $css .= '}';
                    
                    } else {
                        
                        /* fallback if user has not chosen a google font yet */
                        $ut_header_hero_font_style = ot_get_option('ut_front_page_hero_font_style' , 'semibold');
                        
                        if( $ut_hero_style == 'ut-hero-style-11') {
                            $css.= '#ut-hero .hdh .hero-description,';
                        }                        
                        
                        $css .= '.hero-title { font-family: ' . $ut_recognized_font_styles[$ut_header_hero_font_style] . ', "Helvetica Neue", Helvetica, Arial, sans-serif; }'. "\n";
                        
                    }
                
                } elseif( ot_get_option('ut_front_hero_font_type' , 'ut-font') == 'ut-websafe' ) {
                    
                    /* design exception for hero */ 
                    if( $ut_hero_style == 'ut-hero-style-11') {
                        $css.= '#ut-hero .hdh .hero-description,';
                    }
                    
                    $css .= $UT_Custom_CSS->typography_css('.hero-title', ot_get_option('ut_front_page_hero_websafe_font_style') );
                    
                } else {
                    
                    /* out for theme font */
                    $ut_hero_font_style = ut_return_hero_config( 'ut_hero_font_style' , 'semibold' );
                    
                    /* design exception for hero */ 
                    if( $ut_hero_style == 'ut-hero-style-11') {
                        $css.= '#ut-hero .hdh .hero-description,';
                    }
                    
                    $css .= '.hero-title { font-family: ' . $ut_recognized_font_styles[$ut_hero_font_style] . ', "Helvetica Neue", Helvetica, Arial, sans-serif; }'. "\n";
                                
                }

                
            }
            
            /* custom css from theme option panel */
            $css .= ot_get_option('ut_custom_css');
            
            
        /* end css */    
        $css .= '</style>';
        
        echo apply_filters( 'ut-custom-css', $css );        
        
    }
    
    add_action('wp_head' , 'unitedthemes_custom_css');
    
} 

?>