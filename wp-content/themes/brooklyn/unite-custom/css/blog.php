<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Blog_CSS' ) ) {	
    
    class UT_Blog_CSS extends UT_Custom_CSS { 
        
        public function custom_css() {
            
            ob_start(); ?>
            
            <style id="ut-blog-custom-css" type="text/css">
            
            <?php
            
            /**
             * Hero Title Font 
             */
            
            if( is_home() ) {
                
                $class = '.hero-title';
                
                if( ut_return_hero_config('ut_hero_style' , 'ut-hero-style-1') == 'ut-hero-style-11') {
                    $class = '#ut-hero .hdh .hero-description, .hero-title';
                }
            
                echo $this->font_style_css( array(
                    'selector'           => $class,
                    'font-type'          => ot_get_option('ut_blog_hero_font_type', 'ut-font' ),   
                    'font-style'         => ot_get_option('ut_blog_hero_font_style', 'semibold' ),
                    'google-font-style'  => ot_get_option('ut_google_blog_hero_font_style'),
                    'websafe-font-style' => ot_get_option('ut_blog_hero_websafe_font_style') 
                ) ); 
            
            }
            
            ?>
                                    
            /**
             * Title Highlight
             */            
            .entry-title span {
                color: <?php echo $this->accent; ?>; 
            }
                        
            /**
             * Blog Pagination
             */
            <?php if( ot_get_option('ut_blog_pagination_background_color') ) : ?>
                    
               #ut-blog-navigation { background: <?php echo ot_get_option('ut_blog_pagination_background_color'); ?>;} 
                
            <?php endif; ?>
            
            <?php if( ot_get_option('ut_blog_pagination_height') ) : ?>
                
               #ut-blog-navigation { height: <?php echo ot_get_option('ut_blog_pagination_height'); ?>px;}
               #ut-blog-navigation .fa { line-height: <?php echo ot_get_option('ut_blog_pagination_height'); ?>px;}  
                
            <?php endif; ?>
            
            <?php if( ot_get_option('ut_blog_pagination_arrow_color') ) : ?>
                
               #ut-blog-navigation a { color: <?php echo ot_get_option('ut_blog_pagination_arrow_color'); ?>;}
               #ut-blog-navigation a:visited { color: <?php echo ot_get_option('ut_blog_pagination_arrow_color'); ?>;}  
                
            <?php endif; ?>
            
            <?php if( ot_get_option('ut_blog_pagination_arrow_hover_color', $this->accent ) ) : ?>
                
               #ut-blog-navigation a:hover { color: <?php echo ot_get_option('ut_blog_pagination_arrow_hover_color', $this->accent ); ?>;} 
               #ut-blog-navigation a:focus { color: <?php echo ot_get_option('ut_blog_pagination_arrow_hover_color', $this->accent ); ?>;}
               #ut-blog-navigation a:active { color: <?php echo ot_get_option('ut_blog_pagination_arrow_hover_color', $this->accent ); ?>;}
                
            <?php endif; ?>           
            
            /**
             * Blog Titles
             */
            
            <?php if( ot_get_option('ut_global_blog_titles_font_style') ) : ?>
                 
                <?php echo $this->typography_css('.blog h2.entry-title, .archive h2.entry-title, .search h2.entry-title', ot_get_option('ut_global_blog_titles_font_style') ); ?>
            
            <?php endif; ?>
            
            /**
             * Single Post Titles
             */
            
            <?php if( ot_get_option('ut_global_blog_single_titles_font_style') ) : ?>
                
                <?php echo $this->typography_css('.single-post h1.entry-title', ot_get_option('ut_global_blog_single_titles_font_style') ); ?>
            
            <?php endif; ?>            
            
            /**
             * Elements Border
             */
            
            <?php if( ot_get_option( 'ut_blog_elements_border', 'on' ) == 'off' ) : ?>
            
                .wp-caption img, 
                img[class*="wp-image-"],
                .entry-thumbnail img,
                .ut-gallery-slider .slides > li img,
                pre,
                .author-avatar img,
                .ut-gallery-slider .flex-direction-nav a,
                .format-link .entry-header a,
                .comment-body,
                .comment-avatar .avatar,
                .ut_widget_flickr li img {
                    -webkit-border-radius:0;
                        -moz-border-radius:0;
                            border-radius:0;   
                }

            <?php endif; ?>    
            
            
            </style>
            
            <?php
            
            /* output css */
            echo $this->minify_css( ob_get_clean() );
        
        }  
            
    }

}

new UT_Blog_CSS;