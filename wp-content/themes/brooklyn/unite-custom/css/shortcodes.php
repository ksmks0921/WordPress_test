<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Shortcodes_CSS' ) ) {	
    
    class UT_Shortcodes_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
            
            ob_start(); ?>

            <style id="ut-shortcode-custom-css" type="text/css">
                
                
                /* Buttons
                ================================================== */ 
                .ut-btn.dark:hover,
                .ut-btn.ut-pt-btn:hover { 
                    background: <?php echo $this->accent; ?>;  
                }
                
                .ut-btn.theme-btn {
                    background: <?php echo $this->accent; ?>;
                }
                
                /* Single Quote
                ================================================== */                
                .ut-rated i { 
                    color: <?php echo $this->accent; ?>; 
                }
                
                /* Custom Icon
                ================================================== */
                .ut-custom-icon-link:hover i { 
                    color: <?php echo $this->accent; ?>;
                }
                .ut-custom-icon a:hover i:first-child {
                    color: <?php echo $this->accent; ?>;
                }
                
                /* Blog Excerpt
                ================================================== */
                .light .ut-bs-wrap .entry-title a:hover, 
                .light .ut-bs-wrap a:hover .entry-title  { 
                    color: <?php echo $this->accent; ?>;
                }   
                
                /* Client Carousel
                ================================================== */ 
                .elastislide-wrapper nav span:hover { 
                    border-color: <?php echo $this->accent; ?>;
                    color: <?php echo $this->accent; ?>;
                }
                
                /* Twitter Rotator
                ================================================== */
                .ut-twitter-rotator h2 a {
                    color: <?php echo $this->accent; ?>; 
                }
                
                .ut-rq-icon { 
                    color: <?php echo $this->accent; ?>; 
                }
                
                /* Quote Rotator
                ================================================== */
                .ut-rotate-quote .flex-direction-nav a,
                .ut-rotate-quote-alt .flex-direction-nav a { 
                    background:rgb(<?php echo $this->hex_to_rgb( $this->accent ); ?>); 
                    background:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 0.85); 
                }
                
                
                /* Service Column
                ================================================== */
                .ut-service-column h3 span  { 
                    color:<?php echo $this->accent; ?>; 
                }
                
                /* Social Icons
                ================================================== */
                .ut-social-title { 
                    color:<?php echo $this->accent; ?>; 
                }
                
                .ut-social-link:hover .ut-social-icon { 
                    background:<?php echo $this->accent; ?> !important; 
                }
                
                /* List Icons
                ================================================== */
                .ut-icon-list i { 
                    color:<?php echo $this->accent; ?>; 
                }
                
                /* Alert
                ================================================== */
                .ut-alert.themecolor { 
                    background:<?php echo $this->accent; ?>; 
                }               
                
                /* Parallax Quote
                ================================================== */
                .ut-parallax-quote-title span { 
                    color:<?php echo $this->accent; ?>;  
                }
                
                /* Tabs
                ================================================== */
                .light .ut-nav-tabs li a:hover { 
                    border-color:<?php echo $this->accent; ?> !important; 
                }
                
                .light .ut-nav-tabs li a:hover { 
                    color:<?php echo $this->accent; ?> !important; 
                }
                
                /* Probar
                ================================================== */
                .ut-skill-overlay { 
                    background:<?php echo $this->accent; ?>; 
                }
                
                /* Accordion
                ================================================== */
                .light .ut-accordion-heading a:hover { 
                    border-color:<?php echo $this->accent; ?> !important; 
                }
                
                .light .ut-accordion-heading a:hover { 
                    color:<?php echo $this->accent; ?> !important; 
                }
                
                /* Dropcap
                ================================================== */
                .ut-dropcap-one, 
                .ut-dropcap-two { 
                    background: <?php echo $this->accent; ?>; 
                }                
                
                /* Team Member ( Template )
                ================================================== */
                .member-social a:hover {
                    color:<?php echo $this->accent; ?>; 
                }
                
                .ut-member-style-2 .member-description .ut-member-title { 
                    color:<?php echo $this->accent; ?>; 
                }
                
                .ut-member-style-2 .ut-so-link:hover {
                    background: <?php echo $this->accent; ?> !important;    
                }
                
                .member-description-style-3 .ut-member-title { 
                    color:<?php echo $this->accent; ?>; 
                }
                
                .ut-member-style-3 .member-social a:hover { 
                    border-color: <?php echo $this->accent; ?>;  
                }
                
                .ut-hide-member-details:hover {
                    color:<?php echo $this->accent; ?>; 
                }
                
                .light .ut-hide-member-details {
                    color:<?php echo $this->accent; ?>; 
                }
                
                                
                /* Video Shortcode
                ================================================== */ 
                .light .ut-shortcode-video-wrap .ut-video-caption { 
                    border-color:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 1); 
                }
                
                .light .ut-shortcode-video-wrap .ut-video-caption i { 
                    border-color:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 0.3); 
                }
                
                .light .ut-shortcode-video-wrap .ut-video-caption i { 
                    color:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 0.3); 
                }
                
                .light .ut-shortcode-video-wrap .ut-video-caption:hover i { 
                    border-color:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 1); 
                }
                
                .light .ut-shortcode-video-wrap .ut-video-caption:hover i { 
                    color:<?php echo $this->accent; ?> !important; 
                }
                
                .light .ut-shortcode-video-wrap .ut-video-caption:hover i { 
                    text-shadow: 0 0 40px <?php echo $this->accent; ?>, 2px 2px 3px black; 
                }
                
                .light .ut-video-loading { 
                    color:<?php echo $this->accent; ?> !important; 
                }
                
                .light .ut-video-loading { 
                    text-shadow: 0 0 40px <?php echo $this->accent; ?>, 2px 2px 3px black; 
                }
                
                .light .ut-video-caption-text { 
                    border-color:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 1); 
                }
                
                /* Pricing Tables
                ================================================== */ 
                .ut-pt-featured { 
                    background: <?php echo $this->accent; ?> !important;                 
                }
                
                .ut-pt-featured-table .ut-pt-info .fa-li  { 
                    color: <?php echo $this->accent; ?> !important; 
                }
                
                .ut-pt-wrap.ut-pt-wrap-style-2 .ut-pt-featured-table .ut-pt-header { 
                    background: <?php echo $this->accent; ?>; 
                }
                
                .ut-pt-wrap-style-3 .ut-pt-info ul, 
                .ut-pt-wrap-style-3 .ut-pt-info ul li {
                    border-color:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 0.1);
                }
                
                .ut-pt-wrap-style-3 .ut-pt-header, 
                .ut-pt-wrap-style-3 .ut-custom-row, 
                .ut-pt-wrap-style-3 .ut-btn.ut-pt-btn,
                .ut-pt-wrap-style-3 .ut-pt-featured-table .ut-btn { 
                    border-color:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 0.1); 
                }
            
                .ut-pt-wrap-style-3 .ut-btn { 
                    color:<?php echo $this->accent; ?> !important; 
                }
                
                .ut-pt-wrap-style-3 .ut-btn { 
                    text-shadow: 0 0 40px <?php echo $this->accent; ?>, 2px 2px 3px black; 
                }
                
                .ut-pt-wrap-style-3 .ut-pt-featured-table .ut-btn { 
                    color: <?php echo $this->accent; ?> !important; 
                }
                
                .ut-pt-wrap-style-3 .ut-pt-featured-table .ut-btn { 
                    text-shadow: 0 0 40px <?php echo $this->accent; ?>, 2px 2px 3px black; 
                }
            
                .ut-pt-wrap-style-3 .ut-pt-featured-table .ut-pt-title { 
                    color:<?php echo $this->accent; ?> !important; 
                }
                
                .ut-pt-wrap-style-3 .ut-pt-featured-table .ut-pt-title { 
                    text-shadow: 0 0 40px <?php echo $this->accent; ?>, 2px 2px 3px black; 
                }
                
            
            </style>
            
            <?php
            
            echo $this->minify_css( ob_get_clean() );
        
        }

    }

}

new UT_Shortcodes_CSS;