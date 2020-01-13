<?php

function _ut_theme_options() {

  $ut_settings = array( 
    
    'sections'        => array( 
      
        array(
            'id'          => 'ut_general_settings',
            'title'       => 'General',
            'icon'        => 'general-icon.png',
            'def_section' => 'ut_site_layout_settings',
            'subsections' => array(
                
                array(
                    'label'       => 'Site Mode',
                    'id'          => 'ut_site_layout_settings'
                ),
                
                array(
                    'label'       => 'Logo & Accent Color',
                    'id'          => 'ut_customize_settings'
                ),
                
                array(
                    'label'       => 'Apple Touch Icons',
                    'id'          => 'ut_touch_settings'
                ),
                
                array(
                    'label'       => 'Site Border',
                    'id'          => 'ut_border_settings'
                ),
                
                array(
                    'label'       => 'Top Header',
                    'id'          => 'ut_top_header_settings'
                ),
                
                array(
                    'label'       => 'Global Header and Navigation',
                    'id'          => 'ut_navigation_settings',
                ),
                
                array(
                    'label'       => 'Mobile Navigation',
                    'id'          => 'ut_mobile_navigation_settings',
                ),
                
                array(
                    'label'       => 'Sidebar Colors',
                    'id'          => 'ut_global_sidebar_settings'
                ),
                
                array(
                    'label'       => 'Footer',
                    'id'          => 'ut_footer_settings',
                    'def_section' => 'ut_footer_colors',
                    'subsections' => array(

                        array(
                            'label'       => 'Colors',
                            'id'          => 'ut_footer_colors'
                        ),
                        
                        array(
                            'label'       => 'Scroll Top Button',
                            'id'          => 'ut_scroll_top'
                        )
                        
                    )                
                ),
                
                array(
                    'label'       => 'Subfooter',
                    'id'          => 'ut_subfooter_settings'                
                ),
            )
        ),
    
        array(
            'id'          => 'ut_typography_settings',
            'title'       => 'Typography',
            'icon'        => 'typography-icon.png',
            'def_section' => 'ut_global_body_settings',
            'subsections' => array(
                
                array(
                    'label'       => 'General',
                    'id'          => 'ut_general_typography_settings',
                    'def_section' => 'ut_global_body_settings',
                    'subsections' => array(
                        
                        array(
                            'label'     => 'Body',
                            'id'        => 'ut_global_body_settings'
                        ),    
                        
                        array(
                            'label'     => 'Logo and Navigation',
                            'id'        => 'ut_global_navigation_menu_settings'
                        ),
                        
                        array(
                            'label'     => 'Content Titles',
                            'id'        => 'ut_global_htags_settings'
                        ),
                        
                        array(
                            'label'     => 'Content Widgets',
                            'id'        => 'ut_global_content_widgets_settings'
                        ),
                        
                        array(
                            'label'     => 'Blog',
                            'id'        => 'ut_global_blog_menu_settings'
                        ), 
                        
                        array(
                            'label'     => 'Blockquotes',
                            'id'        => 'ut_global_blockquote_settings'
                        ),
                        
                        array(
                            'label'     => 'Sidebar',
                            'id'        => 'ut_global_blog_widgets_settings'                    
                        ), 
                        
                        array(
                            'label'     => 'Contact Section Title',
                            'id'        => 'ut_csection_header_font_setting'
                        ),
                        
                        array(
                            'label'     => 'Footer',
                            'id'        => 'ut_global_footer_typo_settings'                    
                        ),
                        
                        
                    )
                ),
                
                array(
                    'label'       => 'Heroes',
                    'id'          => 'ut_heroes_typography_settings',
                    'def_section' => 'ut_front_hero_font_style_settings',
                    'subsections' => array(
                        
                        array(
                            'label'     => 'Heroes',
                            'id'        => 'ut_front_hero_font_style_settings'
                        ),
                        
                        array(
                            'label'     => 'Blog Hero',
                            'id'        => 'ut_blog_font_style_settings'
                        ),
                        
                          
                    )
                ),
                
                array(
                    'label'       => 'Pages',
                    'id'          => 'ut_pages_typography_settings',
                    'def_section' => 'ut_global_page_title_settings',
                    'subsections' => array(
                        
                        array(
                            'label'     => 'Page Titles',
                            'id'        => 'ut_global_page_title_settings'
                        ),
                          
                    )
                ),
                
                array(
                    'label'       => 'Sections',
                    'id'          => 'ut_sections_typography_settings',
                    'def_section' => 'ut_global_header_settings',
                    'subsections' => array(
                        
                        array(
                            'label'     => 'Section Titles',
                            'id'        => 'ut_global_header_settings'
                        ),
                        
                        array(
                            'label'     => 'Section Leads',
                            'id'        => 'ut_global_lead_settings'
                        ),   
                          
                    )
                ),
                
                array(
                    'label'       => 'Portfolio',
                    'id'          => 'ut_sections_typography_settings',
                    'def_section' => 'ut_global_portfolio_settings',
                    'subsections' => array(
                        
                        array(
                            'label'     => 'Portfolio Showcase',
                            'id'        => 'ut_global_portfolio_settings'
                        ),
                        
                    )
                ),
                
            )
            
        ),
        
        array(
            'id'          => 'ut_global_hero_settings',
            'title'       => 'Global Hero Settings',
            'icon'        => 'hero-icon.png',
            'def_section' => 'ut_global_hero_caption_settings',
            'subsections' => array(
                    
                array(
                    'label'       => 'Global Hero Styling',
                    'id'          => 'ut_global_hero_styling_settings',
                    'def_section' => 'ut_global_hero_caption_settings',
                    'subsections' => array(
                        
                        array(
                            'label'     => 'Caption',
                            'id'        => 'ut_global_hero_caption_settings'
                        ),
                        array(
                            'label'     => 'Background',
                            'id'        => 'ut_global_hero_background_settings'
                        ),
                        array(
                            'label'     => 'Overlay',
                            'id'        => 'ut_global_hero_overlay_settings'
                        ),
                        array(
                            'label'     => 'Border',
                            'id'        => 'ut_global_hero_border_settings'
                        ),
                        
                    )
                ),                     
                
                array(
                    'label'     => 'Global Hero Type',
                    'id'        => 'ut_global_hero_type_settings'
                )   
                    
            )
            
        ),
        
        array(
            'id'          => 'ut_blog_settings',
            'title'       => 'Blog',
            'icon'        => 'blog-icon.png',
            'def_section' => 'ut_blog_layout_setting',
            'subsections' => array(
            
                array(
                    'label'     => 'Blog Layout',
                    'id'        => 'ut_blog_layout_setting'
                ),

                array(
                    'label'     => 'Sidebar Setting',
                    'id'        => 'ut_blog_sidebar_setting'
                ),
                
                array(
                    'label'     => 'Pagination',
                    'id'        => 'ut_blog_pagination_setting'
                ),
            
            )
                        
        ),
        
        array(
            'id'          => 'ut_portfolio_settings',
            'title'       => 'Portfolio',
            'icon'        => 'portfolio-icon.png',
            'def_section' => 'ut_portfolio_single_settings',
            'subsections' => array(
                
                array(
                    'label'     => 'Single Portfolio',
                    'id'        => 'ut_portfolio_single_settings'
                ),
                
                array(
                    'label'     => 'Showcase',
                    'id'        => 'ut_portfolio_showcase_setting'
                ),
                
            )
            
        ),
      
        array(
            'id'          => 'ut_csection_settings',
            'title'       => 'Contact',
            'icon'        => 'contact-icon.png',
            'def_section' => 'ut_csection_content_settings',
            'subsections' => array(
                
                array(
                    'label'     => 'Content',
                    'id'        => 'ut_csection_content_settings'
                ),
                
                array(
                    'label'       => 'Styling',
                    'id'          => 'ut_csection_styling_setting',
                    'def_section' => 'ut_csection_header_settings',
                    'subsections' => array(
                        
                        array(
                            'label'     => 'Header',
                            'id'        => 'ut_csection_header_settings'
                        ),
                        array(
                            'label'     => 'Colors',
                            'id'        => 'ut_csection_color_settings'
                        ),
                        array(
                            'label'     => 'Background',
                            'id'        => 'ut_csection_background_settings'
                        ),
                        array(
                            'label'     => 'Overlay',
                            'id'        => 'ut_csection_overlay_settings'
                        ),
                        array(
                            'label'     => 'Border',
                            'id'        => 'ut_csection_border_settings'
                        ),
                        array(
                            'label'     => 'Spacing',
                            'id'        => 'ut_csection_spacing_settings'
                        ), 
                    
                    )
                    
                ),
                
            )
            
        ),
      
        array(
            'id'          => 'ut_advanced_settings',
            'title'       => 'Advanced',
            'icon'        => 'advanced-icon.png',
            'def_section' => 'ut_sanimation_settings',
            'subsections' => array(
                
                array(
                    'label'     => 'Maintenance Mode',
                    'id'        => 'ut_maintenace_mode_settings'
                ),
                
                array(
                    'label'     => 'Section Animation',
                    'id'        => 'ut_sanimation_settings'
                ),
                
                array(
                    'label'     => 'Manage Preloader',
                    'id'        => 'ut_loader_settings'
                ),  
                
                array(
                    'label'         => 'System Pages',
                    'id'            => 'ut_system_page_settings',
                    'def_section'   => 'ut_system_page_archive_settings',
                    'subsections'   => array(

                        array(
                            'label'     => 'Archive',
                            'id'        => 'ut_system_page_archive_settings'
                        ),                        

                        array(
                            'label'     => 'Search',
                            'id'        => 'ut_system_page_search_settings'
                        ),
                        
                        array(
                            'label'     => '404',
                            'id'        => 'ut_system_page_404_settings'
                        ),
                        
                    )

                ),
                
                array(
                    'label'     => 'Custom CSS',
                    'id'        => 'ut_custom_css_settings'
                ),
                
                array(
                    'label'     => 'SEO',
                    'id'        => 'ut_seo_settings',
                ),
                
                /*array(
                    'label'     => 'Page Cache',
                    'id'        => 'ut_cache_settings'
                ),*/
                
                array(
                    'label'     => 'Lightbox Settings',
                    'id'        => 'ut_lightbox_settings'
                ),

                array(
                    'label'     => 'Content Spacing Settings',
                    'id'        => 'ut_content_spacing_settings'
                ),
                
            )
        
        )
        
        /* end sections */
            
    ),
    
    'settings'        => array(
      
        /*
        |--------------------------------------------------------------------------
        | Sub Section Logo and Themecolor
        |--------------------------------------------------------------------------
        */       
        array(
            'id'          => 'ut_site_layout_panel_headline',
            'label'       => 'Site Mode',
            'type'        => 'panel_headline',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_site_layout_settings'
        ),
        
        array(
            'id'          => 'ut_site_layout',
            'label'       => 'Site Mode',
            'desc'        => 'Decide if you like to use Brooklyn as a One Pager or as a Multisite. You might ask yourself, what is the mayor difference between those 2 styles? To keep it short and simple. The Onepager front page is seperated in sections and each section is a single page inside your WordPress installation. We recommend to use this option with cause. If you have used the demo installer, the installer decides which option is necessary.<br /><strong>Use this option with cause!</strong>',
            'type'        => 'select',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_site_layout_settings',
            'std'         => 'onepage',
            'markup'      => '1_1',
            'choices'     => array( 
                array(
                    'value'       => 'onepage',
                    'label'       => 'One Pager'
                ),
                array(
                    'value'       => 'multisite',
                    'label'       => 'Multisite'
                )
            ),            
        ),
        
        /*
        |--------------------------------------------------------------------------
        | Sub Section Logo and Themecolor
        |--------------------------------------------------------------------------
        */
        array(
            'id'          => 'ut_customize_panel_headline',
            'label'       => 'Logo & Accent Color',
            'type'        => 'panel_headline',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_customize_settings'
        ),
      
        array(
            'id'          => 'ut_accentcolor',
            'label'       => 'Accent Color',
            'desc'        => 'Define your desired primary theme accent color. Keep in mind, that you can easily define own colors for each page or section by using the "Color Settings" tab beneath the WordPress Editor. You can also add a custom CSS class to each page or section by using the class field.',
            'type'        => 'colorpicker_customizer',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_customize_settings',
        ),
      
        array(
            'id'          => 'ut_site_logo_max_height',
            'label'       => 'Logo Max Height',
            'desc'        => 'Use an alternate Logo max height. Note: This Option affects all logos. <br /><strong>Maximum value is: 60!</strong>',
            'type'        => 'numeric_slider',
            'std'         => '60',
            'min_max_step'=> '0,60,1',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_customize_settings',
        ),  
        
        array(
            'id'          => 'ut_site_logo',
            'label'       => 'Main Logo',
            'desc'        => 'The maximum height of the logo should be 60px. And for retina logo, please double the size of your logo by keeping the aspect ratio.',
            'type'        => 'upload_customizer',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_customize_settings',
        ),
      
        array(
            'id'          => 'ut_site_logo_alt',
            'label'       => 'Alternate Logo',
            'desc'        => 'Upload an alternate Logo. Should be the same size as your Main Logo. This Logo will be used if 2 different navigations skins are available on the site. Example: The navigation switches from primary to secondary skin when reaching the main content.',
            'type'        => 'upload_customizer',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_customize_settings',
        ),
      
        array(
            'id'          => 'ut_site_logo_retina',
            'label'       => 'Retina Main Logo',
            'desc'        => 'Upload a retina ready Main Logo. Simply double the size of your Main Logo.',
            'type'        => 'upload_customizer',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_customize_settings',
        ),
      
        array(
            'id'          => 'ut_site_logo_alt_retina',
            'label'       => 'Retina Alternate Logo',
            'desc'        => 'Upload an alternate retina Logo. Should be the same size as your Retina Main Logo.',
            'type'        => 'upload_customizer',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_customize_settings',
        ),
      
        /*
        |--------------------------------------------------------------------------
        | Sub Section Touch Icons
        |--------------------------------------------------------------------------
        */ 
      
        array(
            'id'          => 'ut_touch_setting_headline',
            'label'       => 'Apple Touch Icons',
            'type'        => 'panel_headline',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_touch_settings'
        ),
      
        array(
            'id'          => 'ut_favicon',
            'label'       => 'Favicon',
            'desc'        => 'The dimension for the image must be 16x16 pixels or 32x32 pixels, using either 8-bit or 24-bit colors and the format must be one of PNG (a W3C standard), GIF, or ICO.',
            'type'        => 'upload',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_touch_settings'
        ),
        
        array(
            'id'          => 'ut_apple_touch_icon_iphone',
            'label'       => 'Apple Touch Icon IPhone',
            'desc'        => '57x57 pixel for iPhone and iPod touch. <br /> <strong>Recommended format must be one of PNG, GIF, or JPG</strong>.',
            'type'        => 'upload',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_touch_settings'
        ),
      
        array(
            'id'          => 'ut_apple_touch_icon_ipad',
            'label'       => 'Apple Touch Icon IPad',
            'desc'        => '72 x 72 pixel for IPad. <br /> <strong>Recommended format must be one of PNG, GIF, or JPG</strong>.',
            'type'        => 'upload',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_touch_settings'
         ),
      
        array(
            'id'          => 'ut_apple_touch_icon_iphone_retina',
            'label'       => 'Apple Touch Icon IPhone (Retina)',
            'desc'        => '114 x 114 pixel for high-resolution iPhone and iPod touch. <br /> <strong>Recommended format must be one of PNG, GIF, or JPG</strong>.',
            'type'        => 'upload',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_touch_settings'
        ),
      
        array(
            'id'          => 'ut_apple_touch_icon_ipad_retina',
            'label'       => 'Apple Touch Icon IPad (Retina)',
            'desc'        => '144 x 144 pixel for high-resolution iPad. <br /> <strong>Recommended format must be one of PNG, GIF, or JPG</strong>.',
            'type'        => 'upload',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_touch_settings'
        ),
    
        /*
        |--------------------------------------------------------------------------
        | Border Settings
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'          => 'ut_border_setting_headline',
            'label'       => 'Site Border',
            'type'        => 'panel_headline',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_border_settings',
        ),
      
        array(
            'id'          => 'ut_site_border',
            'label'       => 'Display Site Border?',
            'desc'        => 'A border which embeds your entire site.',
            'type'        => 'select',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_border_settings',
            'std'         => 'hide',
            'choices'     => array( 
                array(
                    'value'     => 'show',
                    'label'     => 'Show'
                ),
                array(
                    'value'     => 'hide',
                    'label'     => 'Hide'
                )
              
            )
            
        ),
      
        array(
            'id'         => 'ut_site_border_color',
            'label'      => 'Bordercolor',
            'desc'       => 'Define your desired Site Border Color.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_border_settings',
            'std'        => '#FFFFFF',
            'required'   => array(
                'ut_site_border'    => 'show'
            )
        ),
      
        array(
            'id'         => 'ut_site_border_body_color',
            'label'      => 'Body Background Color',
            'desc'       => 'Define your desired Body Background Color. We recommend to use the same color as your Site Border Color or a complementary one.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_border_settings',
            'required'   => array(
                'ut_site_border'    => 'show'
            )
        ),
      
        /*
        |--------------------------------------------------------------------------
        | Top Header Configuration
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'         => 'ut_top_header_setting_headline',
            'label'      => 'Top Header',
            'type'       => 'panel_headline',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_top_header_settings',
        ),
      
        array(
            'id'         => 'ut_top_header',
            'label'      => 'Display Top Header?',
            'desc'       => 'The Top Header will be placed above header and navigation and contains additional elements like phone number, email address and social profile links.',
            'type'       => 'select',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_top_header_settings',
            'std'        => 'hide',
            'choices'    => array( 
                array(
                    'value'     => 'show',
                    'label'     => 'Show'
                ),
                array(
                    'value'     => 'hide',
                    'label'     => 'Hide'
                )
            ),
        ),
      
        array(
            'id'         => 'ut_top_header_email',
            'label'      => 'Email',
            'desc'       => 'Please enter your company email.',
            'type'       => 'text',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_top_header_settings',
            'required'   => array(
                'ut_top_header'     => 'show'
            )
        ),
      
        array(
            'id'         => 'ut_top_header_phone',
            'label'      => 'Phone',
            'desc'       => 'Please enter your company phone number.',
            'type'       => 'text',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_top_header_settings',
            'required'   => array(
                'ut_top_header'     => 'show'
            )
        ),      
      
        array(
            'id'         => 'ut_top_header_social_icons',
            'label'      => 'Social Icons',
            'desc'       => 'Add your desired social profile icon and links. <br /><strong>You can re-order with drag & drop, the order will update after saving.</strong>',
            'type'       => 'list-item',
            'list_title' => false,
            'markup'     => '1_1',          
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_top_header_settings',
            'settings'   => array( 
                array(
                    'id'        => 'icon',
                    'label'     => 'Choose Social Icon',
                    'type'      => 'select',
                    'class'     => 'ut-select-setting-title',
                    'choices'   => array( 
                        array(
                            'value'     => 'fa-adn',
                            'label'     => 'Alpha'
                        ),
                        array(
                            'value'     => 'fa-behance',
                            'label'     => 'Behance'                    
                        ),
                        array(
                            'value'     => 'fa-bitbucket',
                            'label'     => 'Bitbucket'                    
                        ),
                        array(
                            'value'     => 'fa-codepen',
                            'label'     => 'Codepen'                    
                        ),
                        array(
                            'value'     => 'fa-delicious',
                            'label'     => 'Delicious'                    
                        ),
                        array(
                            'value'     => 'fa-deviantart',
                            'label'     => 'Deviantart'                    
                        ),
                        array(
                            'value'     => 'fa-digg',
                            'label'     => 'Digg'                    
                        ),
                        array(
                            'value'     => 'fa-dribbble',
                            'label'     => 'Dribbble'
                        ),
                        array(
                            'value'     => 'fa-dropbox',
                            'label'     => 'Dropbox'
                        ),
                        array(
                            'value'     => 'fa-facebook',
                            'label'     => 'Facebook'
                        ),
                        array(
                            'value'     => 'fa-flickr',
                            'label'     => 'Flickr'
                        ),
                        array(
                            'value'     => 'fa-foursquare',
                            'label'     => 'Foursquare'
                        ),                  
                        array(
                            'value'     => 'fa-github',
                            'label'     => 'Github'
                        ),
                        array(
                            'value'     => 'fa-gittip',
                            'label'     => 'Gittip'
                        ),
                        array(
                            'value'     => 'fa-google-plus',
                            'label'     => 'Google Plus'
                        ),
                        array(
                            'value'     => 'fa-instagram',
                            'label'     => 'Instagram'
                        ),
                        array(
                            'value'     => 'fa-jsfiddle',
                            'label'     => 'JSFiddle'
                        ),
                        array(
                            'value'     => 'fa-linkedin',
                            'label'     => 'LinkedIn'
                        ),
                        array(
                            'value'     => 'fa-reddit',
                            'label'     => 'Reddit'
                        ),
                        array(
                            'value'     => 'fa-pinterest',
                            'label'     => 'Pinterest'
                        ),
                        array(
                            'value'     => 'fa-skype',
                            'label'     => 'Skype'
                        ),
                        array(
                            'value'     => 'fa-soundcloud',
                            'label'     => 'Soundcloud'
                        ),
                        array(
                            'value'     => 'fa-snapchat',
                            'label'     => 'Snapchat'
                        ),
                        array(
                            'value'     => 'fa-tumblr',
                            'label'     => 'Tumblr'
                        ),
                        array(
                            'value'     => 'fa-twitter',
                            'label'     => 'Twitter'
                        ),
                        array(
                            'value'     => 'fa-vimeo-square',
                            'label'     => 'Vimeo'
                        ),
                        array(
                            'value'     => 'fa-vk',
                            'label'     => 'VK'
                        ),
                        array(
                            'value'     => 'fa-xing',
                            'label'     => 'Xing'
                        ),
                        array(
                            'value'     => 'fa-youtube',
                            'label'     => 'Youtube'
                        ),
                        array(
                            'value'     => 'fa-spotify',
                            'label'     => 'Spotify'
                        ),

                    ),
                    
                ),
                array(
                    'id'    => 'link',
                    'label' => 'Enter Social Link',
                    'type'  => 'text',
                    'rows'  => '3'
                )
            ),
            'required'   => array(
                'ut_top_header'     => 'show'
            )
        ),
      
        array(
            'id'         => 'ut_top_header_color_setting_headline',
            'label'      => 'Color Settings',
            'desc'       => 'Color Settings',
            'type'       => 'section_headline',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_top_header_settings',
            'required'   => array(
                'ut_top_header'     => 'show'
            )
        ),
        
        array(
            'id'         => 'ut_top_header_background_color',
            'label'      => 'Top Header Background Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_top_header_settings',
            'std'        => '',
            'required'   => array(
                'ut_top_header'     => 'show'
            )
        ),
      
        array(
            'id'         => 'ut_top_header_text_color',
            'label'      => 'Top Header Text Color',
            'desc'       => 'Color for regular Text.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_top_header_settings',
            'std'        => '#888',
            'required'   => array(
                'ut_top_header'     => 'show'
            )
        ),
      
        array(
            'id'         => 'ut_top_header_icon_color',
            'label'      => 'Top Header Icon Color',
            'desc'       => 'Color for Icons.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_top_header_settings',
            'std'        => '#888',
            'required'   => array(
                'ut_top_header'     => 'show'
            )
        ),
      
        array(
            'id'         => 'ut_top_header_link_color',
            'label'      => 'Top Header Link Color',
            'desc'       => 'Color for Links.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_top_header_settings',
            'std'        => '#888',
            'required'   => array(
                'ut_top_header'     => 'show'
            )
        ),
      
        array(
            'id'         => 'ut_top_header_link_color_hover',
            'label'      => 'Top Header Link Color Hover',
            'desc'       => 'Color for Links on hover.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_top_header_settings',
            'std'        => get_option('ut_accentcolor' , '#F1C40F'),
            'required'   => array(
                'ut_top_header'     => 'show'
            )
        ),
      
        array(
            'id'         => 'ut_top_header_social_icon_color',
            'label'      => 'Top Header Social Icon Color',
            'desc'       => 'Color for Social Icons.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_top_header_settings',
            'std'        => '#888',
            'required'   => array(
                'ut_top_header'     => 'show'
            )
        ),
      
        array(
            'id'         => 'ut_top_header_social_icon_color_hover',
            'label'      => 'Top Header Social Icon Color Hover',
            'desc'       => 'Color for Social Icons on hover.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_top_header_settings',
            'std'        => get_option('ut_accentcolor' , '#F1C40F'),
            'required'   => array(
                'ut_top_header'     => 'show'
            )
        ),
       
        /*
        |--------------------------------------------------------------------------
        | Header and Navigation Configuration
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'         => 'ut_navigation_setting_headline',
            'label'      => 'Header and Navigation',
            'type'       => 'panel_headline',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
        ),
      
        array(
            'id'         => 'ut_navigation_setting_Info',
            'label'      => 'Navigation',
            'desc'       => 'These are your global Header and Navigation settings for the entire site.',
            'type'       => 'section_headline_info',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
        ),
        
        array(
            'id'         => 'ut_header_layout',
            'label'      => 'Header Layout',
            'desc'       => 'Select your desired Header and Navigation Layout.',
            'type'       => 'radio_image',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'std'        => 'default',
            'markup'     => '1_1',
            'choices'    => array( 
                
                array(
                    'value'     => 'default',
                    'src'       => 'header-default.png',
                    'label'     => 'Horizontal Top Navigation'
                ),
                array(
                    'value'     => 'side',
                    'src'       => 'header-side.png',
                    'label'     => 'Vertical Side Navigation'
                )
                                
            ),
            'trigger'   => array(
                
            )        
            
        ),
        
        /**
         * Vertical Side Navigation Options 
         */
        
        array(
            'id'         => 'ut_side_header_align',
            'label'      => 'Header and Navigation Align',
            'desc'       => 'Decide if header and navigation are located on the left or right side.',
            'type'       => 'select',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'std'        => 'left',
            'choices'    => array( 
                array(
                    'value'     =>  'left',
                    'label'     =>  'left'
                ),
                array(
                    'value'     =>  'right',
                    'label'     =>  'right'
                )
            ),
            'required'   => array(
                 'ut_header_layout'      => 'side'
            )
        ),
        
        array(
            'id'           => 'ut_side_header_width',
            'label'        => 'Header and Navigation Width',
            'desc'         => 'Drag the handle to set the width. <br /><strong>Maximum value is: 50</strong>',
            'type'         => 'numeric_slider',
            'std'          => '21',
            'min_max_step' => '10,50,1',
            'section'      => 'ut_general_settings',
            'subsection'   => 'ut_navigation_settings',
            'required'     => array(
                 'ut_header_layout'      => 'side'
            )
        ),
        
        
        array(
            'id'          => 'ut_site_logo_max_width',
            'label'       => 'Logo Max Width',
            'desc'        => 'Use an alternate Logo max width. Note: This Option affects all logos. <br /><strong>Maximum value is: 100!</strong>',
            'type'        => 'numeric_slider',
            'std'         => '100',
            'min_max_step'=> '0,100,1',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                 'ut_header_layout'      => 'side'
            )
        ),
        
        array(
            'id'         => 'ut_side_header_search_form',
            'label'      => 'Display Search Form?',
            'desc'       => 'An optional search form beneath the navigation.',
            'type'       => 'select',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'std'        => 'on',
            'choices'    => array( 
                array(
                    'value'     =>  'on',
                    'label'     =>  'Yes'
                ),
                array(
                    'value'     =>  'off',
                    'label'     =>  'No'
                )
            ),
            'required'   => array(
                 'ut_header_layout'      => 'side'
            )
        ),
        
        array(
            'id'         => 'ut_side_header_copyright',
            'label'      => 'Copyright',
            'desc'       => 'An optional copyright information.',
            'type'       => 'text',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                 'ut_header_layout'      => 'side'
            )
        ),
        
        array(
            'id'         => 'ut_side_header_copyright_color',
            'label'      => 'Copyright Color',
            'desc'       => 'Desired color for copyright information.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                 'ut_header_layout'      => 'side'
            )
        ),
        
        array(
            'id'         => 'ut_side_header_activate_social_icons',
            'label'      => 'Display Social Icons?',
            'desc'       => 'An optional set of social icons.',
            'type'       => 'select',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'std'        => 'on',
            'choices'    => array( 
                array(
                    'value'     =>  'on',
                    'label'     =>  'Yes'
                ),
                array(
                    'value'     =>  'off',
                    'label'     =>  'No'
                )
            ),
            'required'   => array(
                 'ut_header_layout'      => 'side'
            )
        ),
        
        
        array(
            'id'         => 'ut_side_header_social_icons',
            'label'      => 'Social Icons',
            'desc'       => 'Add your desired social profile icon and links. <br /><strong>You can re-order with drag & drop, the order will update after saving.</strong>',
            'type'       => 'list-item',
            'list_title' => false,
            'markup'     => '1_1',          
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'settings'   => array( 
                array(
                    'id'        => 'icon',
                    'label'     => 'Choose Social Icon',
                    'type'      => 'select',
                    'class'     => 'ut-select-setting-title',
                    'choices'   => array( 
                        array(
                            'value'     => 'fa-adn',
                            'label'     => 'Alpha'
                        ),
                        array(
                            'value'     => 'fa-behance',
                            'label'     => 'Behance'                    
                        ),
                        array(
                            'value'     => 'fa-bitbucket',
                            'label'     => 'Bitbucket'                    
                        ),
                        array(
                            'value'     => 'fa-codepen',
                            'label'     => 'Codepen'                    
                        ),
                        array(
                            'value'     => 'fa-delicious',
                            'label'     => 'Delicious'                    
                        ),
                        array(
                            'value'     => 'fa-deviantart',
                            'label'     => 'Deviantart'                    
                        ),
                        array(
                            'value'     => 'fa-digg',
                            'label'     => 'Digg'                    
                        ),
                        array(
                            'value'     => 'fa-dribbble',
                            'label'     => 'Dribbble'
                        ),
                        array(
                            'value'     => 'fa-dropbox',
                            'label'     => 'Dropbox'
                        ),
                        array(
                            'value'     => 'fa-facebook',
                            'label'     => 'Facebook'
                        ),
                        array(
                            'value'     => 'fa-flickr',
                            'label'     => 'Flickr'
                        ),
                        array(
                            'value'     => 'fa-foursquare',
                            'label'     => 'Foursquare'
                        ),                  
                        array(
                            'value'     => 'fa-github',
                            'label'     => 'Github'
                        ),
                        array(
                            'value'     => 'fa-gittip',
                            'label'     => 'Gittip'
                        ),
                        array(
                            'value'     => 'fa-google-plus',
                            'label'     => 'Google Plus'
                        ),
                        array(
                            'value'     => 'fa-instagram',
                            'label'     => 'Instagram'
                        ),
                        array(
                            'value'     => 'fa-jsfiddle',
                            'label'     => 'JSFiddle'
                        ),
                        array(
                            'value'     => 'fa-linkedin',
                            'label'     => 'LinkedIn'
                        ),
                        array(
                            'value'     => 'fa-reddit',
                            'label'     => 'Reddit'
                        ),
                        array(
                            'value'     => 'fa-pinterest',
                            'label'     => 'Pinterest'
                        ),
                        array(
                            'value'     => 'fa-skype',
                            'label'     => 'Skype'
                        ),
                        array(
                            'value'     => 'fa-soundcloud',
                            'label'     => 'Soundcloud'
                        ),
                        array(
                            'value'     => 'fa-snapchat',
                            'label'     => 'Snapchat'
                        ),
                        array(
                            'value'     => 'fa-tumblr',
                            'label'     => 'Tumblr'
                        ),
                        array(
                            'value'     => 'fa-twitter',
                            'label'     => 'Twitter'
                        ),
                        array(
                            'value'     => 'fa-vimeo-square',
                            'label'     => 'Vimeo'
                        ),
                        array(
                            'value'     => 'fa-vk',
                            'label'     => 'VK'
                        ),
                        array(
                            'value'     => 'fa-xing',
                            'label'     => 'Xing'
                        ),
                        array(
                            'value'     => 'fa-youtube',
                            'label'     => 'Youtube'
                        ),
                        array(
                            'value'     => 'fa-spotify',
                            'label'     => 'Spotify'
                        ),

                    ),
                    
                ),
                array(
                    'id'    => 'link',
                    'label' => 'Enter Social Link',
                    'type'  => 'text',
                    'rows'  => '3'
                )
            ),
            'required'   => array(
                'ut_header_layout'                      => 'side',
                'ut_side_header_activate_social_icons'  => 'on'
            )
        ),       
        
        array(
            'id'          => 'ut_side_header_background_image',
            'label'       => 'Header Background Image',
            'desc'        => '',
            'type'        => 'background',
            'markup'      => '1_1',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_navigation_settings',
            'required'    => array(
                'ut_header_layout'    => 'side'
            )
        ),
        
        array(
            'id'         => 'ut_side_navigation_shadow',
            'label'      => 'Header Shadow',
            'desc'       => 'Activate Header Shadow?',
            'type'       => 'select',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'std'        => 'off',
            'choices'    => array( 
                array(
                    'value'     => 'on',
                    'label'     => 'On'
                ),
                array(
                    'value'     => 'off',
                    'label'     => 'Off'
                )
            ),
            'required'   => array(
                'ut_header_layout'      => 'side',
            )
        ),
        
        /**
         * Horizontal Navigation Options 
         */
                        
        array(
            'id'         => 'ut_navigation_width',
            'label'      => 'Header Width',
            'desc'       => 'It handles centering the content within the header. Centered content has a max width of 1200px and fullwidth content 100%.',
            'type'       => 'select',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'std'        => 'centered',
            'choices'    => array( 
                array(
                    'value'     => 'centered',
                    'label'     => 'Centered'
                ),
                array(
                    'value'     => 'fullwidth',
                    'label'     => 'Fullwidth'
                )
            ),
            'required'      => array(
                'ut_header_layout'      => 'default'
            )
        ),
      
        array(
            'id'         => 'ut_site_navigation_flush',
            'label'      => 'Activate Navigation Flush?',
            'desc'       => 'only applies of Page Border is active and Header Width has been set to fullwidth.',
            'type'       => 'select',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'std'        => 'no',
            'choices'    => array( 
                array(
                    'value'     =>  'yes',
                    'label'     =>  'Yes'
                ),
                array(
                    'value'     =>  'no',
                    'label'     =>  'No'
                )
            ),
            'required'   => array(
                'ut_site_border'        => 'show',
                'ut_navigation_width'   => 'fullwidth',
                'ut_header_layout'      => 'default'
            )
        ),
       
        array(
            'id'         => 'ut_navigation_skin',
            'label'      => 'Header Color Skin',
            'desc'       => 'Brookyln provides 2 default color skins for your header and navigation. If these skins do not match your requirements simply use the custom option and individualize it to your needs.',
            'type'       => 'select',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'std'        => 'ut-header-light',
            'choices'    => array( 
                array(
                    'value'     => 'ut-header-dark',
                    'label'     => 'Dark'
                ),
                array(
                    'value'     => 'ut-header-light',
                    'label'     => 'Light'
                ),
                array(
                    'value'     => 'ut-header-custom',
                    'label'       => 'Custom Skin'
                )
            ),
            'required'      => array(
                'ut_header_layout'      => 'default|side'
            )
        ),
      
        array(
            'id'         => 'ut_navigation_darkskin_settings_headline',
            'label'      => 'Dark Skin Settings',
            'desc'       => 'Dark Skin Settings',
            'type'       => 'section_headline',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_navigation_skin'    => 'ut-header-dark',
                'ut_header_layout'      => 'default'
            )
        ),
      
        array(
            'id'         => 'ut_navigation_lightskin_settings_headline',
            'label'      => 'Light Skin Settings',
            'desc'       => 'Light Skin Settings',
            'type'       => 'section_headline',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_navigation_skin'    => 'ut-header-light',
                'ut_header_layout'      => 'default'
            )
        ),
      
        /* setting for both base skins */
        array(
            'id'         => 'ut_navigation_state',
            'label'      => 'Always show Header and Navigation?',
            'desc'       => 'This option makes header and navigation visible all the time. If you choose "On (transparent)". The navigation will turn into the chosen skin when reaching the main content."',
            'type'       => 'select',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'std'        => 'off',
            'choices'    => array( 
                array(
                    'value'     => 'on',
                    'label'     => 'On (with chosen skin)'
                ),
                array(
                    'value'     => 'on_transparent',
                    'label'     => 'On (transparent)'
                ),
                array(
                    'value'     => 'off',
                    'label'     => 'Off'
                )
            ),
            'required'  => array(
                'ut_navigation_skin'    => 'ut-header-dark|ut-header-light',
                'ut_header_layout'      => 'default'
            )
        ),
      
        array(
            'id'         => 'ut_navigation_shadow',
            'label'      => 'Header Shadow',
            'desc'       => 'Activate Header Shadow?',
            'type'       => 'select',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'std'        => 'on',
            'choices'    => array( 
                array(
                    'value'     => 'on',
                    'label'     => 'On'
                ),
                array(
                    'value'     => 'off',
                    'label'     => 'Off'
                )
            ),
            'required'   => array(
                'ut_header_layout'      => 'default',
                'ut_navigation_skin'    => 'ut-header-light|ut-header-dark',
                'ut_navigation_state'   => 'on|off'
            )
        ),
      
        array(
            'id'         => 'ut_navigation_transparent_border',
            'label'      => 'Activate Navigation Border Bottom?',
            'desc'       => 'A small decoration line.',
            'type'       => 'select',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'std'        => 'off',
            'choices'    => array( 
                array(
                    'value'     => 'on',
                    'label'     => 'On'
                ),
                array(
                    'value'     => 'off',
                    'label'     => 'Off'
                )
            ),
            'required'   => array(
                'ut_header_layout'      => 'default',
                'ut_navigation_skin'    => 'ut-header-light|ut-header-dark',
                'ut_navigation_state'   => 'on_transparent'
            )
        ),
      
        array(
            'id'         => 'ut_navigation_customskin_settings_headline',
            'label'      => 'Custom Skin Settings',
            'desc'       => 'Custom Skin Settings',
            'type'       => 'section_headline',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_navigation_skin'    => 'ut-header-custom',
                'ut_header_layout'      => 'default'
            )
        ),
      
        array(
            'id'         => 'ut_navigation_customskin_state',
            'label'      => 'Always show Header and Navigation?',
            'desc'       => 'This option makes header and navigation visible all the time. If you choose "Yes, but switch to secondary skin on scroll!". The navigation will turn into the secondary skin when reaching the main content. There secondary skin settings will appear once you select this option."',
            'type'       => 'select',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'std'        => 'on',
            'markup'     => '1_1',
            'choices'    => array( 
                array(
                    'value'     => 'on',
                    'label'     => 'Yes, with primary skin!'
                ),
                array(
                    'value'     => 'on_switch',
                    'label'     => 'Yes, but switch to secondary skin on scroll or hover!'
                ),
                array(
                    'value'     => 'off',
                    'label'       => 'No, but switch to primary skin on scroll!'
                )
            ),
            'required'   => array(
                'ut_navigation_skin'    => 'ut-header-custom',
                'ut_header_layout'      => 'default'
            )
        ),
      
      
        /* Primary Skin */
        array(
            'id'         => 'ut_navigation_customskin_primary_settings_headline',
            'label'      => 'Primary Skin Settings',
            'desc'       => 'Primary Skin Settings',
            'type'       => 'section_headline',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off',
                'ut_header_layout'               => 'default'   
            )
        ),
        array(
            'id'         => 'ut_side_navigation_customskin_primary_settings_headline',
            'label'      => 'Color Skin Settings',
            'desc'       => 'Color Skin Settings',
            'type'       => 'section_headline',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off',
                'ut_header_layout'               => 'side'   
            )
        ),
        
      
        array(
            'id'         => 'ut_header_ps_text_logo_color',
            'label'      => 'Text Logo Color',
            'desc'       => 'RGBA Color. Only applies if no main logo has been uploaded and set. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off' 
            )
        ),
      
        array(
            'id'         => 'ut_header_ps_text_logo_color_hover',
            'label'      => 'Text Logo Color Hover',
            'desc'       => 'RGBA Color. Only applies if no main logo has been uploaded and set. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off' 
            )
        ),
      
        array(
            'id'         => 'ut_subheadline_ps_header_colors',
            'label'      => 'Header Colors',
            'type'       => 'sub_section_headline',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off' 
            )
        ),
      
        array(
            'id'         => 'ut_header_ps_background_color',
            'label'      => 'Header Background Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off' 
            )
        ),
      
        array(
            'id'         => 'ut_header_ps_shadow_color',
            'label'      => 'Header Shadow Color',
            'desc'       => 'You can turn off the shadow by settings its opacity to 0. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off' 
            )
        ),      
            
        array(
            'id'         => 'ut_header_ps_border_color',
            'label'      => 'Header Border Bottom Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off' 
            )
        ), 
      
        array(
            'id'         => 'ut_subheadline_ps_fl_colors',
            'label'      => 'Navigation First Level Colors',
            'type'       => 'sub_section_headline',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off' 
            )
        ),
      
        array(
            'id'         => 'ut_navigation_ps_fl_color',
            'label'      => 'Navigation First Level Link Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off' 
            )
        ),
      
        array(
            'id'         => 'ut_navigation_ps_fl_color_hover',
            'label'      => 'Navigation First Level Link Hover Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off' 
            )
        ),
      
        array(
            'id'         => 'ut_navigation_ps_fl_dot_color',
            'label'      => 'Navigation First Level Dot Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off' 
            )
        ),
        
        array(
            'id'         => 'ut_navigation_ps_fl_active_color',
            'label'      => 'Navigation First Level Active Link Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off'
            )
        ),
        
        array(
            'id'         => 'ut_navigation_ps_fl_arrow_color',
            'label'      => 'Navigation First Level Arrow Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'side',
                'ut_navigation_skin'             => 'ut-header-custom',
            )
        ),        
        
        array(
            'id'         => 'ut_subheadline_ps_sl_colors',
            'label'      => 'Navigation Sub Menu Colors',
            'type'       => 'sub_section_headline',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off' 
            )
        ),
      
        array(
            'id'         => 'ut_navigation_ps_sl_background_color',
            'label'      => 'Navigation Sub Menu Background Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off' 
            )
        ),
      
        array(
            'id'         => 'ut_navigation_ps_sl_color',
            'label'      => 'Navigation Sub Menu Link Color',
             'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off' 
            )
        ),
      
        array(
            'id'         => 'ut_navigation_ps_sl_color_hover',
            'label'      => 'Navigation Sub Menu Link Hover Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off' 
            )
        ),
        
        array(
            'id'         => 'ut_navigation_ps_sl_active_color',
            'label'      => 'Navigation Sub Menu Active Link Color',
             'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off' 
            )
        ),
        
        array(
            'id'         => 'ut_navigation_ps_sl_arrow_color',
            'label'      => 'Navigation Sub Menu Arrow Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'side',
                'ut_navigation_skin'             => 'ut-header-custom',
            )
        ), 
        
        array(
            'id'         => 'ut_navigation_ps_sl_shadow_color',
            'label'      => 'Navigation Sub Menu Shadow Color',
            'desc'       => 'You can turn off the shadow by settings its opacity to 0. Simply use the adjustment bar on the right of the colorpicker.',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off' 
            )
        ),
      
        array(
            'id'         => 'ut_navigation_ps_sl_border_color',
            'label'      => 'Navigation Sub Menu Border Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off' 
            )
        ),
      
        /* optional hover state */
        array(
            'id'         => 'ut_subheadline_ps_hover_colors',
            'label'      => 'Hover State Colors',
            'type'       => 'sub_section_headline',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch' 
            )
        ),
      
        array(
            'id'         => 'ut_navigation_ps_hover_state',
            'label'      => 'Add Hover State?',
            'desc'       => 'Add a hover state if you mouseover the header.',
            'type'       => 'select',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'std'        => 'off',
            'choices'    => array( 
                array(
                    'value'     => 'on',
                    'label'     => 'Yes'
                ),
                array(
                    'value'     => 'off',
                    'label'     => 'No'
                )
            ),
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch' 
            )
        ),
      
        array(
            'id'         => 'ut_header_ps_background_color_hover',
            'label'      => 'Header Background Color on Hover',
            'type'       => 'colorpicker',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch',
                'ut_navigation_ps_hover_state'   => 'on' 
            )
        ),
      
        array(
            'id'         => 'ut_header_ps_border_color_hover',
            'label'      => 'Header Border Color on Hover',
            'type'       => 'colorpicker',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch',
                'ut_navigation_ps_hover_state'   => 'on' 
            )
        ),
      
        array(
            'id'         => 'ut_header_ps_shadow_color_hover',
            'label'      => 'Header Shadow Color on Hover',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch',
                'ut_navigation_ps_hover_state'   => 'on' 
            )
        ),
      
        array(
            'id'         => 'ut_navigation_ps_hover_fl_color',
            'label'      => 'Navigation First Level Link Color on Hover',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch',
                'ut_navigation_ps_hover_state'   => 'on' 
            )
        ),
      
        array(
            'id'         => 'ut_navigation_ps_hover_fl_dot_color',
            'label'      => 'Navigation First Level Dot Color on Hover',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch',
                'ut_navigation_ps_hover_state'   => 'on' 
            )
        ),
      
        /* Secondary Skin */
        array(
            'id'         => 'ut_navigation_customskin_secondary_settings_headline',
            'label'      => 'Secondary Skin Settings',
            'desc'       => 'Secondary Skin Settings',
            'type'       => 'section_headline',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        ),
      
        array(
            'id'         => 'ut_header_ss_text_logo_color',
            'label'      => 'Text Logo Color',
            'desc'       => 'Only applies if no Main Logo has been uploaded and set.',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
            
        ),
      
        array(
            'id'         => 'ut_header_ss_text_logo_color_hover',
            'label'      => 'Text Logo Color Hover',
            'desc'       => 'Only applies if no main logo has been uploaded and set. ',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        ),
      
        array(
            'id'         => 'ut_subheadline_ss_header_colors',
            'label'      => 'Header Colors',
            'type'       => 'sub_section_headline',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        ),
      
        array(
            'id'         => 'ut_header_ss_background_color',
            'label'      => 'Header Background Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        ),
      
        array(
            'id'         => 'ut_header_ss_shadow_color',
            'label'      => 'Header Shadow Color',
            'desc'       => 'You can turn off the shadow by settings its opacity to 0. Simply use the adjustment bar on the right of the colorpicker.',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',        
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        ), 
      
        array(
            'id'         => 'ut_header_ss_border_color',
            'label'      => 'Header Border Bottom Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        ), 
      
        array(
            'id'         => 'ut_subheadline_ss_fl_colors',
            'label'      => 'Navigation First Level Colors',
            'type'       => 'sub_section_headline',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        ),      
      
        array(
            'id'         => 'ut_navigation_ss_fl_color',
            'label'      => 'Navigation First Level Link Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        ),
      
        array(
            'id'         => 'ut_navigation_ss_fl_color_hover',
            'label'      => 'Navigation First Level Link Hover Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        ),
      
        array(
            'id'         => 'ut_navigation_ss_fl_dot_color',
            'label'      => 'Navigation First Level Dot Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        ),
      
        array(
            'id'         => 'ut_navigation_ss_fl_active_color',
            'label'      => 'Navigation First Level Active Link Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        ),
      
        array(
            'id'         => 'ut_subheadline_ss_sl_colors',
            'label'      => 'Navigation Sub Menu Colors',
            'type'       => 'sub_section_headline',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        ),
            
        array(
            'id'         => 'ut_navigation_ss_sl_background_color',
            'label'      => 'Navigation Sub Menu Background Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        ),
      
        array(
            'id'         => 'ut_navigation_ss_sl_color',
            'label'      => 'Navigation Sub Menu Link Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        ),
      
        array(
            'id'         => 'ut_navigation_ss_sl_color_hover',
            'label'      => 'Navigation Sub Menu Link Hover Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        ),
      
        array(
            'id'         => 'ut_navigation_ss_sl_shadow_color',
            'label'      => 'Navigation Sub Menu Shadow Color',
            'desc'       => 'You can turn off the shadow by settings its opacity to 0. Simply use the adjustment bar on the right of the colorpicker.',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        ),
      
        array(
            'id'         => 'ut_navigation_ss_sl_border_color',
            'label'      => 'Navigation Sub Menu Border Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'default',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        ),
        
        
        /*
        |--------------------------------------------------------------------------
        | Special Side Navigation Options 
        |--------------------------------------------------------------------------
        */
        array(
            'id'         => 'ut_subheadline_sh_form_colors',
            'label'      => 'Search Form Colors',
            'type'       => 'sub_section_headline',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'side',
                'ut_navigation_skin'             => 'ut-header-custom',
            )
        ),  
        
        array(
            'id'         => 'ut_side_header_search_form_icon_color',
            'label'      => 'Search Form Icon Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'side',
                'ut_navigation_skin'             => 'ut-header-custom'
            )
        ),
        
        array(
            'id'         => 'ut_side_header_search_form_border_color',
            'label'      => 'Search Form Border Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'side',
                'ut_navigation_skin'             => 'ut-header-custom'
            )
        ),
        
        array(
            'id'         => 'ut_side_header_search_form_placeholder_color',
            'label'      => 'Search Form Placeholder Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'side',
                'ut_navigation_skin'             => 'ut-header-custom'
            )
        ),
        
        array(
            'id'         => 'ut_side_header_search_form_border_focus_color',
            'label'      => 'Search Form Border Focus Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'side',
                'ut_navigation_skin'             => 'ut-header-custom'
            )
        ),
        
        array(
            'id'         => 'ut_side_header_search_form_placeholder_focus_color',
            'label'      => 'Search Form Placeholder Focus Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'side',
                'ut_navigation_skin'             => 'ut-header-custom'
            )
        ),
                
        array(
            'id'         => 'ut_subheadline_sh_si_colors',
            'label'      => 'Social Icons Colors',
            'type'       => 'sub_section_headline',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'side',
                'ut_navigation_skin'             => 'ut-header-custom',
            )
        ),        
        
        array(
            'id'         => 'ut_side_header_social_icon_color',
            'label'      => 'Icon Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'side',
                'ut_navigation_skin'             => 'ut-header-custom'
            )
        ),
        
        array(
            'id'         => 'ut_side_header_social_icon_color_hover',
            'label'      => 'Icon Hover Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'side',
                'ut_navigation_skin'             => 'ut-header-custom'
            )
        ),
        
        array(
            'id'         => 'ut_side_header_social_icons_border_color',
            'label'      => 'Border Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'side',
                'ut_navigation_skin'             => 'ut-header-custom'
            )
        ),
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        /*
        |--------------------------------------------------------------------------
        | Mobile Navigation Configuration
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'         => 'ut_mobile_navigation_setting_headline',
            'label'      => 'Mobile Navigation',
            'type'       => 'panel_headline',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_mobile_navigation_settings',
        ),
      
        array(
            'id'         => 'ut_mobile_navigation_trigger_icon',
            'label'      => 'Mobile Menu Open / Close Icon',
            'desc'       => 'Select your desired icon.',
            'type'       => 'iconpicker',
            'markup'     => '1_1',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_mobile_navigation_settings',
        ),
      
        array(
            'id'         => 'ut_mobile_navigation_trigger_color',
            'label'      => 'Mobile Menu Open / Close Button Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_mobile_navigation_settings',
        ),
      
        array(
            'id'         => 'ut_mobile_navigation_trigger_color_hover',
            'label'      => 'Mobile Menu Open / Close Button Hover and Active Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_mobile_navigation_settings',
        ),
        
        array(
            'id'         => 'ut_mobile_navigation_background_color_closed',
            'label'      => 'Background Color ( closed mobile nav )',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_mobile_navigation_settings',
            'required'   => array(
                'ut_header_layout'               => 'side',
            )
        ),        
        
        array(
            'id'         => 'ut_mobile_navigation_background_color',
            'label'      => 'Background Color ( opened mobile nav )',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_mobile_navigation_settings',            
        ),
      
        array(
            'id'         => 'ut_mobile_navigation_link_color',
            'label'      => 'Link Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_mobile_navigation_settings',
        ),
      
        array(
            'id'         => 'ut_mobile_navigation_link_color_hover',
            'label'      => 'Link Hover Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_mobile_navigation_settings',
        ),
      
        array(
            'id'         => 'ut_mobile_navigation_dot_color',
            'label'      => 'Dot Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_mobile_navigation_settings',
        ),
      
        array(
            'id'         => 'ut_mobile_navigation_dot_color_hover',
            'label'      => 'Dot Hover Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_mobile_navigation_settings',
        ),
      
        array(
            'id'         => 'ut_mobile_navigation_submenu_dot_color',
            'label'      => 'Submenu Dot Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_mobile_navigation_settings',
        ),
      
        array(
            'id'         => 'ut_mobile_navigation_submenu_dot_color_hover',
            'label'      => 'Submenu Dot Hover Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_mobile_navigation_settings',
        ),      
      
        array(
            'id'         => 'ut_mobile_navigation_link_background_color',
            'label'      => 'Link Background Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_mobile_navigation_settings',
        ),
      
        array(
            'id'         => 'ut_mobile_navigation_link_background_color_hover',
            'label'      => 'Link Background Hover Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_mobile_navigation_settings',
        ),
      
        array(
            'id'         => 'ut_mobile_navigation_border_color',
            'label'      => 'Border Color',
            'desc'       => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'       => 'colorpicker',
            'mode'       => 'rgb',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_mobile_navigation_settings',
        ),        
        
        /*
        |--------------------------------------------------------------------------
        | Sidebar
        |--------------------------------------------------------------------------
        */
        
        array(
            'id'         => 'ut_global_sidebar_colors_headline',
            'label'      => 'Sidebar Colors',
            'type'       => 'panel_headline',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_global_sidebar_settings',
        ),      
      
        array(
            'id'         => 'ut_global_sidebar_widgets_text_color',
            'label'      => 'Sidebar Text Color',
            'desc'       => 'HEX Color.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_global_sidebar_settings',
        ),
      
        array(
            'id'         => 'ut_global_sidebar_widgets_link_color',
            'label'      => 'Sidebar Link Color',
            'desc'       => 'HEX Color.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_global_sidebar_settings',
        ),
      
        array(
            'id'         => 'ut_global_sidebar_widgets_link_color_hover',
            'label'      => 'Sidebar Link Hover Color',
            'desc'       => 'HEX Color.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_global_sidebar_settings',
        ),
      
        array(
            'id'         => 'ut_global_sidebar_widgets_icon_color',
            'label'      => 'Sidebar Icons Color',
            'desc'       => 'HEX Color.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_global_sidebar_settings',
        ),
      
        array(
            'id'         => 'ut_global_sidebar_widgets_icon_color_hover',
            'label'      => 'Sidebar Icons Hover Color',
            'desc'       => 'HEX Color.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_global_sidebar_settings',
        ),
      
        array(
            'id'         => 'ut_global_sidebar_widgets_border_color',
            'label'      => 'Sidebar Border Color',
            'desc'       => 'HEX Color.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_global_sidebar_settings',
        ),
      
        array(
            'id'         => 'ut_global_sidebar_widgets_border_color_hover',
            'label'      => 'Sidebar Border Hover Color',
            'desc'       => 'HEX Color.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_global_sidebar_settings',
        ),
      
        /*
        |--------------------------------------------------------------------------
        | Footer
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'         => 'ut_footer_setting_headline',
            'label'      => 'Footer Colors',
            'type'       => 'panel_headline',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_footer_colors',
        ),
      
        array(
            'id'         => 'ut_footer_skin',
            'label'      => 'Footer Colors',
            'desc'       => 'This option is deprecated and is only maintained due to compatibility reasons for older Brooklyn Versions. Please use the color options below.',
            'type'       => 'select',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_footer_colors',
            'std'        => 'ut-footer-light',
            'choices'    => array(           
                array(
                    'value'     => 'ut-footer-dark',
                    'label'     => 'Dark'
                ),
                array(
                    'value'     => 'ut-footer-light',
                    'label'     => 'Light'
                ),
                array(
                    'value'     => 'ut-footer-custom',
                    'label'       => 'Custom Skin'
                )           
            )
        ),      
      
        array(
            'id'         => 'ut_footer_skin_dark_bgcolor',
            'label'      => 'Footer Skin Background Color',
            'desc'       => '<strong>(optional)</strong> - set an alternative background color for your footer, since the base skin is dark, we recommend to use a dark color as well.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_footer_colors',
            'required'   => array(
                'ut_footer_skin'    =>  'ut-footer-dark'
            )
        ),
      
        array(
            'id'         => 'ut_footer_skin_light_bgcolor',
            'label'      => 'Footer Skin Background Color',
            'desc'       => '<strong>(optional)</strong> - set an alternative background color for your footer, since the base skin is light, we recommend to use a bright color as well.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_footer_colors',
            'required'   => array(
                'ut_footer_skin'    =>  'ut-footer-light'
            )
        ),
        
        array(
            'id'         => 'ut_footer_color_cs_settings_headline',
            'label'      => 'Individual Footer Colors',
            'desc'       => 'Custom Skin Footer Colors',
            'type'       => 'section_headline',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_footer_colors',
            'required'   => array(
                'ut_footer_skin'    =>  'ut-footer-custom'
            )
        ),
        
        array(
            'id'         => 'ut_footer_skin_bgcolor',
            'label'      => 'Footer Background Color',
            'desc'       => 'HEX Color.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_footer_colors',
            'required'   => array(
                'ut_footer_skin'    =>  'ut-footer-custom'
            )
        ),
                     
        array(
            'id'         => 'ut_footer_skin_border',
            'label'      => 'Footer Top Border Color',
            'desc'       => 'Once set, a thin border gets applied to the top of your footer.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_footer_colors',
            'required'   => array(
                'ut_footer_skin'    =>  'ut-footer-custom'
            )
        ),
      
        array(
            'id'         => 'ut_footer_widgets_text_color',
            'label'      => 'Footer Text Color',
            'desc'       => 'HEX Color.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_footer_colors',
            'required'   => array(
                'ut_footer_skin'    =>  'ut-footer-custom'
            )
        ),
      
        array(
            'id'         => 'ut_footer_widgets_link_color',
            'label'      => 'Footer Link Color',
            'desc'       => 'HEX Color.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_footer_colors',
            'required'   => array(
                'ut_footer_skin'    =>  'ut-footer-custom'
            )
        ),
      
        array(
            'id'         => 'ut_footer_widgets_link_color_hover',
            'label'      => 'Footer Link Hover Color',
            'desc'       => 'HEX Color.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_footer_colors',
            'required'   => array(
                'ut_footer_skin'    =>  'ut-footer-custom'
            )
        ),
      
        array(
            'id'         => 'ut_footer_widgets_icon_color',
            'label'      => 'Footer Icons Color',
            'desc'       => 'HEX Color.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_footer_colors',
            'required'   => array(
                'ut_footer_skin'    =>  'ut-footer-custom'
            )
        ),
      
        array(
            'id'         => 'ut_footer_widgets_icon_color_hover',
            'label'      => 'Footer Icons Hover Color',
            'desc'       => 'HEX Color.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_footer_colors',
            'required'   => array(
                'ut_footer_skin'    =>  'ut-footer-custom'
            )
        ),
      
        array(
            'id'         => 'ut_footer_widgets_border_color',
            'label'      => 'Footer Border Color',
            'desc'       => 'HEX Color.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_footer_colors',
            'required'   => array(
                'ut_footer_skin'    =>  'ut-footer-custom'
            )
        ),
      
        array(
            'id'         => 'ut_footer_widgets_border_color_hover',
            'label'      => 'Footer Border Hover Color',
            'desc'       => 'HEX Color.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_footer_colors',
            'required'   => array(
                'ut_footer_skin'    =>  'ut-footer-custom'
            )
        ),      
        
        
        /*
         * Scroll To Top Button 
         */
        
        array(
            'id'         => 'ut_footer_scroll_up_settings_headline',
            'label'      => 'Scroll Top Button',
            'desc'       => 'Scroll Top Button',
            'type'       => 'section_headline',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_scroll_top',
        ),
      
        array(
            'id'         => 'ut_show_scroll_up_button',
            'label'      => 'Scroll To Top Button',
            'desc'       => 'Display "Scroll To Top" button? You can change the state of this button individually on each page. This "Back to top" link allows users to smoothly scroll back to the top of the page. Its a little detail which enhances navigation experience on website with long pages.', 
            'type'       => 'select',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_scroll_top',
            'std'        => 'on',
            'choices'    => array( 
                array(
                    'value'     => 'on',
                    'label'     => 'yes, please!'
                ),
                array(
                    'value'     => 'off',
                    'label'     => 'no, thanks!'
                )
            )            
        ),
      
        array(
            'id'         => 'ut_scroll_up_button_icon_color',
            'label'      => 'Scroll To Top Icon Color',
            'desc'       => 'HEX Color.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_scroll_top',
            'required'   => array(
                'ut_show_scroll_up_button'  => 'on'
            )
        ),
      
        array(
            'id'         => 'ut_scroll_up_button_icon_color_hover',
            'label'      => 'Scroll To Top Icon Hover Color',
            'desc'       => 'HEX Color.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_scroll_top',
            'required'   => array(
                'ut_show_scroll_up_button'  => 'on'
            )
        ),
      
        array(
            'id'         => 'ut_scroll_up_button_background_color',
            'label'      => 'Scroll To Top Background Color',
            'desc'       => 'HEX Color.',
            'type'       => 'colorpicker',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_scroll_top',
            'required'   => array(
                'ut_show_scroll_up_button'  => 'on'
            )
        ),
      
        array(
            'id'         => 'ut_scroll_up_button_shadow',
            'label'      => 'Display Scroll To Top Button Shadow?',
            'desc'       => 'Add an additional shadow.',
            'type'       => 'select',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_scroll_top',
            'std'        => 'on',
            'choices'    => array( 
                array(
                    'value'     => 'on',
                    'label'     => 'yes, please!'
                ),
                array(
                    'value'     => 'off',
                    'label'     => 'no, thanks!'
                )
            ),
            'required'   => array(
                'ut_show_scroll_up_button'  => 'on'
            )
        ),
      
        array(
            'id'         => 'ut_scroll_up_button_border_radius',
            'label'      => 'Display Scroll To Top Button Border Radius?',
            'desc'       => 'Add an additional radius.',
            'type'       => 'select',
            'section'    => 'ut_general_settings',
            'subsection' => 'ut_scroll_top',
            'std'        => 'on',
            'choices'    => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'yes, please!'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'no, thanks!'
                )
            ),
            'required'   => array(
                'ut_show_scroll_up_button'  => 'on'
            )
        ),
      
        /*
        |--------------------------------------------------------------------------
        | Sub Footer
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'          => 'ut_subfooter_setting_headline',
            'label'       => 'Subfooter',
            'type'        => 'panel_headline',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_subfooter_settings',
        ),
      
        array(
            'id'          => 'ut_subfooter_padding_top',
            'label'       => 'Subfooter Spacing Top',
            'desc'        => '<strong>(optional)</strong> - value in pixel e.g. 10px. Default: 0px. If <strong>Subfooter Background Color</strong> has been set, default is: 20px.',
            'type'        => 'text',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_subfooter_settings',
        ),      
                  
        array(
            'id'          => 'ut_site_copyright',
            'label'       => 'Copyright',
            'desc'        => 'Add an additional copyright to the footer of this theme.',
            'type'        => 'textarea-simple',
            'markup'      => '1_1',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_subfooter_settings',
            'rows'        => '3'
        ),     
      
        array(
            'id'          => 'ut_subfooter_font_weight',
            'label'       => 'Copyright Font Weight',
            'desc'        => 'Font weight for additional copyright.',
            'type'        => 'select',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_subfooter_settings',
            'std'         => 'normal',
            'choices'     => array( 
                array(
                    'value'     => 'normal',
                    'label'     => 'Normal'
                ),
                array(
                    'value'     => 'bold',
                    'label'     => 'Bold'
                )
            ),
        ),
      
        array(
            'id'          => 'ut_footer_social_icons',
            'label'       => 'Social Icons',
            'desc'        => 'Add your desired social profile icon and links. <br /><strong>You can re-order with drag & drop, the order will update after saving.</strong>',
            'type'        => 'list-item',
            'list_title'  => false,
            'markup'      => '1_1',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_subfooter_settings',
            'settings'    => array( 
                array(
                    'id'          => 'icon',
                    'label'       => 'Icon',
                    'class'       => 'ut-select-setting-title',
                    'type'        => 'select',
                    'choices'     => array( 
                        array(
                            'value'     => 'fa-adn',
                            'label'     => 'Alpha'                    
                        ),
                        array(
                            'value'     => 'fa-behance',
                            'label'     => 'Behance'                    
                        ),
                        array(
                            'value'     => 'fa-bitbucket',
                            'label'     => 'Bitbucket'                    
                        ),
                        array(
                            'value'     => 'fa-codepen',
                            'label'     => 'Codepen'                    
                        ),
                        array(
                            'value'     => 'fa-delicious',
                            'label'     => 'Delicious'                    
                        ),
                        array(
                            'value'     => 'fa-deviantart',
                            'label'     => 'Deviantart'                    
                        ),
                        array(
                            'value'     => 'fa-digg',
                            'label'     => 'Digg'                    
                        ),
                        array(
                            'value'     => 'fa-dribbble',
                            'label'     => 'Dribbble'
                        ),
                        array(
                            'value'     => 'fa-dropbox',
                            'label'     => 'Dropbox'
                        ),
                        array(
                            'value'     => 'fa-facebook',
                            'label'     => 'Facebook'
                        ),
                        array(
                            'value'     => 'fa-flickr',
                            'label'     => 'Flickr'
                        ),
                        array(
                            'value'     => 'fa-foursquare',
                            'label'     => 'Foursquare'
                        ),                  
                        array(
                            'value'     => 'fa-github',
                            'label'     => 'Github'
                        ),
                        array(
                            'value'     => 'fa-gittip',
                            'label'     => 'Gittip'
                        ),
                        array(
                            'value'     => 'fa-google-plus',
                            'label'     => 'Google Plus'
                        ),
                        array(
                            'value'     => 'fa-instagram',
                            'label'     => 'Instagram'
                        ),
                        array(
                            'value'     => 'fa-jsfiddle',
                            'label'     => 'JSFiddle'
                        ),
                        array(
                            'value'     => 'fa-linkedin',
                            'label'     => 'LinkedIn'
                        ),
                        array(
                            'value'     => 'fa-reddit',
                            'label'     => 'Reddit'
                        ),
                        array(
                            'value'     => 'fa-pinterest',
                            'label'     => 'Pinterest'
                        ),
                        array(
                            'value'     => 'fa-skype',
                            'label'     => 'Skype'
                        ),
                        array(
                            'value'     => 'fa-soundcloud',
                            'label'     => 'Soundcloud'
                        ),
                        array(
                            'value'     => 'fa-snapchat',
                            'label'     => 'Snapchat'
                        ),
                        array(
                            'value'     => 'fa-tumblr',
                            'label'     => 'Tumblr'
                        ),
                        array(
                            'value'     => 'fa-twitter',
                            'label'     => 'Twitter'
                        ),
                        array(
                            'value'     => 'fa-vimeo-square',
                            'label'     => 'Vimeo'
                        ),
                        array(
                            'value'     => 'fa-vk',
                            'label'     => 'VK'
                        ),
                        array(
                            'value'     => 'fa-xing',
                            'label'     => 'Xing'
                        ),
                        array(
                            'value'     => 'fa-youtube',
                            'label'     => 'Youtube'
                        ),
                        array(
                            'value'     => 'fa-spotify',
                            'label'     => 'Spotify'
                        ),
        
                    ),
                    
                ),
                array(
                    'id'        => 'link',
                    'label'     => 'Link',
                    'type'      => 'text',
                    'rows'      => '3'
                )
            )
            
        ),
      
        array(
            'id'          => 'ut_subfooter_color_setting_headline',
            'label'       => 'Subfooter Colors',
            'desc'        => 'Subfooter Colors',
            'type'        => 'section_headline',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_subfooter_settings',
        ),
      
        array(
            'id'          => 'ut_subfooter_bgcolor',
            'label'       => 'Subfooter Background Color',
            'desc'        => '<strong>(optional)</strong> - set an alternative background color for your subfooter.',
            'type'        => 'colorpicker',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_subfooter_settings',
        ),
      
        array(
            'id'          => 'ut_subfooter_text_color',
            'label'       => 'Subfooter Text Color',
            'desc'        => 'HEX Color.',
            'type'        => 'colorpicker',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_subfooter_settings',
        ),
      
        array(
            'id'          => 'ut_subfooter_link_color',
            'label'       => 'Subfooter Link Color',
            'desc'        => 'HEX Color.',
            'type'        => 'colorpicker',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_subfooter_settings',
        ),
      
        array(
            'id'          => 'ut_subfooter_link_color_hover',
            'label'       => 'Subfooter Link Hover Color',
            'desc'        => 'HEX Color.',
            'type'        => 'colorpicker',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_subfooter_settings',
        ),
      
        array(
            'id'          => 'ut_subfooter_icon_color',
            'label'       => 'Subfooter Icon Color',
            'desc'        => 'HEX Color.',
            'type'        => 'colorpicker',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_subfooter_settings',
        ),
      
        array(
            'id'          => 'ut_subfooter_headline_color',
            'label'       => 'Subfooter Headline Color',
            'desc'        => 'HEX Color.',
            'type'        => 'colorpicker',
            'section'     => 'ut_general_settings',
            'subsection'  => 'ut_subfooter_settings',
        ),

        /*
        |--------------------------------------------------------------------------
        | Typography - Body
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'          => 'ut_global_body_headline',
            'label'       => 'Body Font Face',
            'type'        => 'panel_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_body_settings',
        ),
      
        array(
            'id'          => 'ut_body_font_type',
            'label'       => 'Choose Font Source',
            'desc'        => sprintf('Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_body_settings',
            'std'         => 'ut-font',
            'choices'     => array( 
                array(
                    'value'     => 'ut-font',
                    'label'     => 'Theme Font'
                ),
                array(
                    'value'     => 'ut-websafe',
                    'label'     => 'Web Safe Fonts'
                ),
                array(
                    'value'     => 'ut-google',
                    'label'     => 'Google Font'
                )
            ),
        ),    
      
        array(
            'id'          => 'ut_body_font_color',
            'label'       => 'Body Font Color',
            'desc'        => 'Main body font color.',  
            'type'        => 'colorpicker',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_body_settings'
        ),
         
        array(
            'id'          => 'ut_google_body_font_style',
            'label'       => 'Body Font Style',
            'type'        => 'googlefont',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_body_settings',
            'required'      => array(
                'ut_body_font_type'  => 'ut-google'
            )
        ),
      
        array(
            'id'          => 'ut_body_font_style',
            'label'       => 'Body Font Style',
            'desc'        => '<strong>(optional)</strong> - default regular. <a href="#" class="ut-font-preview">Preview Theme Font Style</a>',
            'std'         => 'regular',
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_body_settings',
            'choices'     => array( 
                array(
                    'value'       => 'extralight',
                    'label'       => 'Extralight'
                ),
                array(
                    'value'       => 'light',
                    'label'       => 'Light'
                 ),
                array(
                    'value'       => 'regular',
                    'label'       => 'Regular'
                ),
                array(
                    'value'       => 'medium',
                    'label'       => 'Medium'
                ),
                array(
                    'value'       => 'semibold',
                    'label'       => 'Semi Bold'
                ),
                array(
                    'value'       => 'bold',
                    'label'       => 'Bold'
                )
            ),
            'required'      => array(
                'ut_body_font_type'  =>     'ut-font'
            )
        ),
      
        array(
            'id'          => 'ut_body_websafe_font_style',
            'label'       => 'Body Font Style',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_body_settings',
            'required'      => array(
                'ut_body_font_type'  => 'ut-websafe'
            )
        ),
      
        /*
        |--------------------------------------------------------------------------
        | Typography - Navigation
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'          => 'ut_global_header_headline',
            'label'       => 'Header Text Logo Font',
            'type'        => 'panel_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_navigation_menu_settings',
        ),
      
        array(
            'id'          => 'ut_global_header_text_logo_websafe_font_style',
            'label'       => 'Header Text Logo Font Setting',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_navigation_menu_settings',
        ),
      
        array(
            'id'          => 'ut_global_navigation_headline',
            'label'       => 'Navigation Font',
            'desc'        => 'Navigation Font',
            'type'        => 'section_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_navigation_menu_settings',
        ),
      
        array(
            'id'          => 'ut_global_navigation_font_type',
            'label'       => 'Choose Font Source',
            'desc'        => sprintf('Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_navigation_menu_settings',
            'std'         => 'ut-font',
            'choices'     => array( 
                array(
                    'value'       => 'ut-font',
                    'label'       => 'Theme Font'
                ),
                array(
                    'value'       => 'ut-websafe',
                    'label'       => 'Web Safe Fonts'
                ),
                array(
                    'value'       => 'ut-google',
                    'label'       => 'Google Font'
                )
            ),
        ),
      
        array(
            'id'          => 'ut_global_navigation_google_font_style',
            'label'       => 'Navigation Font Style',
            'desc'        => 'Font Settings will be applied to mobile menu as well.',
            'type'        => 'googlefont',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_navigation_menu_settings',
            'required'      => array(
                'ut_global_navigation_font_type'  => 'ut-google'
            )
        ),
      
        array(
            'id'          => 'ut_global_navigation_websafe_font_style',
            'label'       => 'Navigation Font Style',
            'desc'        => 'Font Settings will be applied to mobile menu as well.',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_navigation_menu_settings',
            'required'      => array(
                'ut_global_navigation_font_type'  => 'ut-websafe'
            )
        ),
      
        array(
            'id'          => 'ut_global_navigation_font_style',
            'label'       => 'Navigation Font Style',
            'desc'        => 'Font Settings will be applied to mobile menu as well. <a href="#" class="ut-font-preview">Font Styles</a>',
            'type'        => 'select',
            'std'         => 'semibold',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_navigation_menu_settings',
            'choices'     => array( 
                array(
                    'value'       => 'extralight',
                    'label'       => 'Extra Light'
                ),
                array(
                    'value'       => 'light',
                    'label'       => 'Light'
                ),
                array(
                    'value'       => 'regular',
                    'label'       => 'Regular'
                ),
                array(
                    'value'       => 'medium',
                    'label'       => 'Medium'
                ),
                array(
                    'value'       => 'semibold',
                    'label'       => 'Semi Bold'
                ),
                array(
                    'value'       => 'bold',
                    'label'       => 'Bold'
                )
            ),
            'required'      => array(
                'ut_global_navigation_font_type'  => 'ut-font'
            )
        ),
        
        array(
            'id'          => 'ut_global_side_navigation_arrow_line_height',
            'label'       => 'Side Navigation Arrow Line Height',
            'desc'        => 'Only affects vertical navigation.',
            'type'        => 'text',
            'desc'        => 'Defines the amount of space above and below e.g. 1.4',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_navigation_menu_settings',
        ),
        
        array(
            'id'          => 'ut_global_navigation_submenu_font_style',
            'label'       => 'Navigation Submenu Font Setting',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_navigation_menu_settings',
        ),
        
        
        array(
            'id'          => 'ut_global_mobile_navigation_headline',
            'label'       => 'Mobile Navigation Font',
            'desc'        => 'Mobile Navigation Font',
            'type'        => 'section_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_navigation_menu_settings',
        ),
        
        array(
            'id'          => 'ut_global_mobile_navigation_font_style',  
            'label'       => 'Mobile Navigation Font Setting',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_navigation_menu_settings',
        ),
        
        array(
            'id'          => 'ut_global_mobile_navigation_sub_font_style',  
            'label'       => 'Mobile Navigation Submenu Font Setting',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_navigation_menu_settings',
        ),
        
        /*
        |--------------------------------------------------------------------------
        | Hero Front Font Style
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'          => 'ut_front_hero_font_style_headline',
            'label'       => 'Heroes Font Face',
            'type'        => 'panel_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_front_hero_font_style_settings',
        ),
      
        array(
            'id'          => 'ut_front_hero_font_type',
            'label'       => 'Choose Font Source',
            'desc'        => sprintf('Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_front_hero_font_style_settings',
            'std'          => 'ut-font',
            'choices'     => array( 
                array(
                    'value'       => 'ut-font',
                    'label'       => 'Theme Font'
                ),
                array(
                    'value'       => 'ut-websafe',
                    'label'       => 'Web Safe Fonts'
                ),
                array(
                    'value'       => 'ut-google',
                    'label'       => 'Google Font'
                )
            ),
        ), 
      
        array(
            'id'          => 'ut_google_front_page_hero_font_style',
            'label'       => 'Hero Font Style',
            'type'        => 'googlefont',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_front_hero_font_style_settings',
            'required'      => array(
                'ut_front_hero_font_type'  => 'ut-google'
            )
        ),
      
        array(
            'id'          => 'ut_front_page_hero_font_style',
            'label'       => 'Hero Font Style',
            'desc'        => '<a href="#" class="ut-font-preview">Preview Font Styles</a>',
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_front_hero_font_style_settings',
            'choices'     => array( 
                array(
                    'value'       => 'extralight',
                    'label'       => 'Extra Light'
                ),
                array(
                    'value'       => 'light',
                    'label'       => 'Light'
                ),
                array(
                    'value'       => 'regular',
                    'label'       => 'Regular'
                ),
                array(
                    'value'       => 'medium',
                    'label'       => 'Medium'
                 ),
                array(
                    'value'       => 'semibold',
                    'label'       => 'Semi Bold'
                 ),
                array(
                    'value'       => 'bold',
                    'label'       => 'Bold'
                )
            ),
            'required'      => array(
                'ut_front_hero_font_type'  => 'ut-font'
            )
        ),
      
        array(
            'id'          => 'ut_front_page_hero_font_size',
            'label'       => 'Hero Caption Title Font Size',
            'desc'        => 'This option only affects Desktop view, Mobile and Tablet views are not affected. Value in em: e.g. "6em".',
            'type'        => 'text',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_front_hero_font_style_settings',
        ), 
      
        array(
            'id'          => 'ut_front_page_hero_websafe_font_style',
            'label'       => 'Hero Font Style',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_front_hero_font_style_settings',
            'required'    => array(
                'ut_front_hero_font_type'  => 'ut-websafe'
            )
        ),
        
        array(
            'id'          => 'ut_front_catchphrase_websafe_font_style',
            'label'       => 'Hero Caption Description Font Setting',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_front_hero_font_style_settings',
        ),  
        
      
        /*
        |--------------------------------------------------------------------------
        | Hero Blog Font Style
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'          => 'ut_blog_font_style_headline',
            'label'       => 'Blog Hero Font Face',
            'type'        => 'panel_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_blog_font_style_settings',
        ),
       
        array(
            'id'          => 'ut_blog_hero_font_type',
            'label'       => 'Choose Font Source',
            'desc'        => sprintf('Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_blog_font_style_settings',
            'std'         => 'ut-font',
            'choices'     => array( 
              array(
                'value'       => 'ut-font',
                'label'       => 'Theme Font'
              ),
              array(
                'value'       => 'ut-websafe',
                'label'       => 'Web Safe Fonts'
              ),
              array(
                'value'       => 'ut-google',
                'label'       => 'Google Font'
              )
            ),            
        ), 
      
        array(
            'id'            => 'ut_google_blog_hero_font_style',
            'label'         => 'Hero Font Style',
            'type'          => 'googlefont',
            'markup'        => '1_1',
            'section'       => 'ut_typography_settings',
            'subsection'    => 'ut_blog_font_style_settings',
            'required'      => array(
                'ut_blog_hero_font_type'    => 'ut-google'
            )
        ),
      
        array(
            'id'          => 'ut_blog_hero_font_style',
            'label'       => 'Hero Font Style',
            'desc'        => '<a href="#" class="ut-font-preview">Preview Font Styles</a>',
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_blog_font_style_settings',
            'choices'     => array( 
                array(
                    'value'       => 'extralight',
                    'label'       => 'Extra Light'
                ),
                array(
                    'value'       => 'light',
                    'label'       => 'Light'
                ),
                array(
                    'value'       => 'regular',
                    'label'       => 'Regular'
                ),
                array(
                    'value'       => 'medium',
                    'label'       => 'Medium'
                ),
                array(
                    'value'       => 'semibold',
                    'label'       => 'Semi Bold'
                ),
                array(
                    'value'       => 'bold',
                    'label'       => 'Bold'
                )
            ),
            'required'      => array(
                'ut_blog_hero_font_type'    => 'ut-font'
            )
        ),
      
        array(
            'id'          => 'ut_blog_hero_font_size',
            'label'       => 'Hero Caption Title Font Size',
            'desc'        => 'This option only affects Desktop view, Mobile and Tablet views are not affected. Value in em: e.g. "6em".',
            'type'        => 'text',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_blog_font_style_settings',
        ),
      
        array(
            'id'          => 'ut_blog_hero_websafe_font_style',
            'label'       => 'Hero Font Style',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_blog_font_style_settings',
            'required'    => array(
                'ut_blog_hero_font_type'    => 'ut-websafe'
            )
        ),
      
        array(
            'id'          => 'ut_blog_catchphrase_websafe_font_style',
            'label'       => 'Hero Caption Description Font Setting',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_blog_font_style_settings',
        ),
        
        /*
        |--------------------------------------------------------------------------
        | Global Content Widgets Font Styles
        |--------------------------------------------------------------------------
        */
        
        array(
            'id'          => 'ut_global_content_widgets_headline',
            'label'       => 'Content Widgets',
            'type'        => 'panel_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_content_widgets_settings',
        ),
        
        array(
            'id'          => 'ut_global_content_widgets_websafe_font_style',
            'label'       => 'Content Widgets Titles Font Size',
            'desc'        => 'Font size for content widgets titles such as portfolio detail titles.',
            'type'        => 'typography',
            //'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_content_widgets_settings'
        ),
        
        /*
        |--------------------------------------------------------------------------
        | Global Headline Font Styles
        |--------------------------------------------------------------------------
        */
      
        #H1 
        array(
            'id'          => 'ut_global_htags_headline_h1',
            'label'       => 'H1',
            'type'        => 'panel_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
        ),
      
        array(
            'id'          => 'ut_global_h1_font_type',
            'label'       => 'Choose font source for H1 tags',
            'desc'        => sprintf('Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
            'std'         => 'ut-font',
            'choices'     => array( 
                array(
                    'value'       => 'ut-font',
                    'label'       => 'Theme Font'
                ),
                array(
                    'value'       => 'ut-websafe',
                    'label'       => 'Web Safe Fonts'
                ),
                array(
                    'value'       => 'ut-google',
                    'label'       => 'Google Font'
                )
            ),
        ),
      
        array(
            'id'          => 'ut_global_h1_font_color',
            'label'       => 'Content H1 Font Color',
            'desc'        => '',
            'type'        => 'colorpicker',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings'
        ),
      
        array(
            'id'          => 'ut_h1_google_font_style',
            'label'       => 'Content H1 Font Style',
            'type'        => 'googlefont',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
            'required'    => array(
                'ut_global_h1_font_type'    =>  'ut-google'
            )
        ), 
      
        array(
            'id'          => 'ut_h1_websafe_font_style',
            'label'       => 'Content H1 Font Style',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
            'required'    => array(
                'ut_global_h1_font_type'    =>  'ut-websafe'
            )
        ), 
      
        array(
            'id'          => 'ut_h1_font_style',
            'label'       => 'Content H1 Font Style',
            'desc'        => '<strong>(optional)</strong> - default semibold. <br /> This option will affect content headlines. <a href="#" class="ut-font-preview">Preview Font Style</a>',
            'std'         => 'semibold',
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
            'choices'     => array( 
                array(
                    'value'       => 'extralight',
                    'label'       => 'Extralight'
                ),
                array(
                    'value'       => 'light',
                    'label'       => 'Light'
                ),
                array(
                    'value'       => 'regular',
                    'label'       => 'Regular'
                ),
                array(
                    'value'       => 'medium',
                    'label'       => 'Medium'
                ),
                array(
                    'value'       => 'semibold',
                    'label'       => 'Semi Bold'
                ),
                array(
                    'value'       => 'bold',
                    'label'       => 'Bold'
                )
            ),
            'required'    => array(
                    'ut_global_h1_font_type'    =>  'ut-font'
            )
        ),
        
        #H2
        array(
            'id'          => 'ut_global_htags_headline_h2',
            'label'       => 'H2',
            'desc'        => 'H2',
            'type'        => 'section_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
        ),
      
        array(
            'id'          => 'ut_global_h2_font_type',
            'label'       => 'Choose font source for H2 tags',
            'desc'        => sprintf('Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
            'std'          => 'ut-font',
            'choices'     => array( 
                array(
                    'value'       => 'ut-font',
                    'label'       => 'Theme Font'
                ),
                array(
                    'value'       => 'ut-websafe',
                    'label'       => 'Web Safe Fonts'
                ),
                array(
                    'value'       => 'ut-google',
                    'label'       => 'Google Font'
                )
            ),
        ),
      
        array(
            'id'          => 'ut_global_h2_font_color',
            'label'       => 'Content H2 Font Color',
            'type'        => 'colorpicker',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings'
        ),
      
        array(
            'id'          => 'ut_h2_google_font_style',
            'label'       => 'Content H2 Font Style',
            'type'        => 'googlefont',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
            'required'    => array(
                'ut_global_h2_font_type'    =>  'ut-google'
            )
        ), 
      
        array(
            'id'          => 'ut_h2_websafe_font_style',
            'label'       => 'Content H2 Font Style',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
            'required'    => array(
                'ut_global_h2_font_type'    =>  'ut-websafe'
            )
        ),
      
        array(
            'id'          => 'ut_h2_font_style',
            'label'       => 'Content H2 Font Style',
            'desc'        => '<strong>(optional)</strong> - default semibold. <br /> This option will affect content headlines. <a href="#" class="ut-font-preview">Preview Font Style</a>',
            'std'         => 'semibold',
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
            'choices'     => array( 
                array(
                    'value'       => 'extralight',
                    'label'       => 'Extralight'
                ),
                array(
                    'value'       => 'light',
                    'label'       => 'Light'
                ),
                array(
                    'value'       => 'regular',
                    'label'       => 'Regular'
                ),
                array(
                    'value'       => 'medium',
                    'label'       => 'Medium'
                ),
                array(
                    'value'       => 'semibold',
                    'label'       => 'Semi Bold'
                ),
                array(
                    'value'       => 'bold',
                    'label'       => 'Bold'
                )
            ),
            'required'    => array(
                'ut_global_h2_font_type'    =>  'ut-font'
            )
        ),
        
        #H3
        array(
            'id'          => 'ut_global_htags_headline_h3',
            'label'       => 'H3',
            'desc'        => 'H3',
            'type'        => 'section_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
        ),
            
        array(
            'id'          => 'ut_global_h3_font_type',
            'label'       => 'Choose font source for H3 tags',
            'desc'        => sprintf('Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
            'std'         => 'ut-font',
            'choices'     => array( 
                array(
                    'value'       => 'ut-font',
                    'label'       => 'Theme Font'
                ),
                array(
                    'value'       => 'ut-websafe',
                    'label'       => 'Web Safe Fonts'
                ),
                array(
                    'value'       => 'ut-google',
                    'label'       => 'Google Font'
                )
            ),
        ),
      
        array(
            'id'          => 'ut_global_h3_font_color',
            'label'       => 'Content H3 Font Color',
            'type'        => 'colorpicker',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings'
        ),
      
        array(
            'id'          => 'ut_h3_google_font_style',
            'label'       => 'Content H3 Font Style',
            'type'        => 'googlefont',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
            'required'    => array(
                'ut_global_h3_font_type'    =>  'ut-google'
            )
        ), 
      
        array(
            'id'          => 'ut_h3_websafe_font_style',
            'label'       => 'Content H3 Font Style',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
            'required'    => array(
                'ut_global_h3_font_type'    =>  'ut-websafe'
            )
        ), 
      
        array(
            'id'          => 'ut_h3_font_style',
            'label'       => 'Content H3 Font Style',
            'desc'        => '<strong>(optional)</strong> - default semibold. <br /> This option will affect content headlines. <a href="#" class="ut-font-preview">Preview Font Style</a>',
            'std'         => 'semibold',
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
            'choices'     => array( 
                array(
                    'value'       => 'extralight',
                    'label'       => 'Extralight'
                ),
                array(
                    'value'       => 'light',
                    'label'       => 'Light'
                 ),
                array(
                    'value'       => 'regular',
                    'label'       => 'Regular'
                ),
                array(
                    'value'       => 'medium',
                    'label'       => 'Medium'
                 ),
                array(
                    'value'       => 'semibold',
                    'label'       => 'Semi Bold'
                ),
                array(
                    'value'       => 'bold',
                    'label'       => 'Bold'
                )
            ),
            'required'    => array(
                'ut_global_h3_font_type'    =>  'ut-font'
            )
        ), 
      
      
        #H4
        array(
            'id'          => 'ut_global_htags_headline_h4',
            'label'       => 'H4',
            'desc'        => 'H4',
            'type'        => 'section_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
        ),
      
        array(
            'id'          => 'ut_global_h4_font_type',
            'label'       => 'Choose font source for H4 tags',
            'desc'        => sprintf('Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
            'std'          => 'ut-font',
            'choices'     => array( 
                array(
                    'value'       => 'ut-font',
                    'label'       => 'Theme Font'
                ),
                array(
                    'value'       => 'ut-websafe',
                    'label'       => 'Web Safe Fonts'
                ),
                array(
                    'value'       => 'ut-google',
                    'label'       => 'Google Font'
                )
            ),
        ),
      
        array(
            'id'          => 'ut_global_h4_font_color',
            'label'       => 'Content H4 Font Color',
            'type'        => 'colorpicker',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings'
        ),
      
        array(
            'id'          => 'ut_h4_google_font_style',
            'label'       => 'Content H4 Font Style',
            'type'        => 'googlefont',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
            'required'    => array(
                'ut_global_h4_font_type'    =>  'ut-google'
            )
        ), 
      
        array(
            'id'          => 'ut_h4_websafe_font_style',
            'label'       => 'Content H4 Font Style',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
            'required'    => array(
                'ut_global_h4_font_type'    =>  'ut-websafe'
            )
        ),
      
        array(
            'id'          => 'ut_h4_font_style',
            'label'       => 'Content H4 Font Style',
            'desc'        => '<strong>(optional)</strong> - default semibold. <br /> This option will affect content headlines. <a href="#" class="ut-font-preview">Preview Font Style</a>',
            'std'         => 'semibold',
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
            'choices'     => array( 
                array(
                    'value'       => 'extralight',
                    'label'       => 'Extralight'
                ),
                array(
                    'value'       => 'light',
                    'label'       => 'Light'
                ),
                array(
                    'value'       => 'regular',
                    'label'       => 'Regular'
                ),
                array(
                    'value'       => 'medium',
                    'label'       => 'Medium'
                ),
                array(
                    'value'       => 'semibold',
                    'label'       => 'Semi Bold'
                ),
                array(
                    'value'       => 'bold',
                    'label'       => 'Bold'
                )
            ),
            'required'    => array(
                'ut_global_h4_font_type'    =>  'ut-font'
            )
        ),
        
        #H5
        array(
            'id'          => 'ut_global_htags_headline_h5',
            'label'       => 'H5',
            'desc'        => 'H5',
            'type'        => 'section_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
        ),
            
        array(
            'id'          => 'ut_global_h5_font_type',
            'label'       => 'Choose font source for H5 tags',
            'desc'        => sprintf('Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
            'std'          => 'ut-font',
            'choices'     => array( 
                array(
                    'value'       => 'ut-font',
                    'label'       => 'Theme Font'
                ),
                array(
                    'value'       => 'ut-websafe',
                    'label'       => 'Web Safe Fonts'
                ),
                array(
                    'value'       => 'ut-google',
                    'label'       => 'Google Font'
                )
            ),
        ),
      
        array(
            'id'          => 'ut_global_h5_font_color',
            'label'       => 'Content H5 Font Color',
            'type'        => 'colorpicker',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings'
        ),
      
        array(
            'id'          => 'ut_h5_google_font_style',
            'label'       => 'Content H5 Font Style',
            'type'        => 'googlefont',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
            'required'    => array(
                'ut_global_h5_font_type'    =>  'ut-google'
            )
        ), 
      
        array(
            'id'          => 'ut_h5_websafe_font_style',
            'label'       => 'Content H5 Font Style',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
            'required'    => array(
                'ut_global_h5_font_type'    =>  'ut-websafe'
            )
        ),
      
        array(
            'id'          => 'ut_h5_font_style',
            'label'       => 'Content H5 Font Style',
            'desc'        => '<strong>(optional)</strong> - default semibold. <br /> This option will affect content headlines. <a href="#" class="ut-font-preview">Preview Font Style</a>',
            'std'         => 'semibold',
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
            'choices'     => array( 
              array(
                'value'       => 'extralight',
                'label'       => 'Extralight'
              ),
              array(
                'value'       => 'light',
                'label'       => 'Light'
              ),
              array(
                'value'       => 'regular',
                'label'       => 'Regular'
              ),
              array(
                'value'       => 'medium',
                'label'       => 'Medium'
              ),
              array(
                'value'       => 'semibold',
                'label'       => 'Semi Bold'
              ),
              array(
                'value'       => 'bold',
                'label'       => 'Bold'
              )
            ),
            'required'    => array(
                'ut_global_h5_font_type'    =>  'ut-font'
            )
        ),
        
        #H6      
        array(
            'id'          => 'ut_global_htags_headline_h6',
            'label'       => 'H6',
            'desc'        => 'H6',
            'type'        => 'section_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
        ),
      
        array(
            'id'          => 'ut_global_h6_font_type',
            'label'       => 'Choose font source for H6 tags',
            'desc'        => sprintf('Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
            'std'         => 'ut-font',
            'choices'     => array( 
                array(
                    'value'       => 'ut-font',
                    'label'       => 'Theme Font'
                ),
                array(
                    'value'       => 'ut-websafe',
                    'label'       => 'Web Safe Fonts'
                ),
                array(
                    'value'       => 'ut-google',
                    'label'       => 'Google Font'
                )
            ),
        ),
      
        array(
            'id'          => 'ut_global_h6_font_color',
            'label'       => 'Content H6 Font Color',
            'type'        => 'colorpicker',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings'
        ),
      
        array(
            'id'          => 'ut_h6_google_font_style',
            'label'       => 'Content H6 Font Style',
            'type'        => 'googlefont',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
            'required'    => array(
                'ut_global_h6_font_type'    =>  'ut-google'
            )
        ), 
      
        array(
            'id'          => 'ut_h6_websafe_font_style',
            'label'       => 'Content H6 Font Style',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
            'required'    => array(
                'ut_global_h6_font_type'    =>  'ut-websafe'
            )
        ),
      
        array(
            'id'          => 'ut_h6_font_style',
            'label'       => 'Content H6 Font Style',
            'desc'        => '<strong>(optional)</strong> - default semibold. <br /> This option will affect content headlines. <a href="#" class="ut-font-preview">Preview Font Style</a>',
            'std'         => 'semibold',
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_htags_settings',
            'choices'     => array( 
                array(
                    'value'       => 'extralight',
                    'label'       => 'Extralight'
                ),
                array(
                    'value'       => 'light',
                    'label'       => 'Light'
                ),
                array(
                    'value'       => 'regular',
                    'label'       => 'Regular'
                ),
                array(
                    'value'       => 'medium',
                    'label'       => 'Medium'
                ),
                array(
                    'value'       => 'semibold',
                    'label'       => 'Semi Bold'
                ),
                array(
                    'value'       => 'bold',
                    'label'       => 'Bold'
                )
            ),
            'required'    => array(
                'ut_global_h6_font_type'    =>  'ut-font'
            )
        ),
      
        /*
        |--------------------------------------------------------------------------
        | Global Header Typography and Styles
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'          => 'ut_global_header_styles_headline',
            'label'       => 'General Section Headlines',
            'type'        => 'panel_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_header_settings',
        ),
      
        array(
            'id'          => 'ut_global_headline_style',
            'label'       => 'General Section Headlines Style',
            'desc'        => '<strong>(optional)</strong> - default "Style One". This option will affect section and single page headers. <br /> <strong>Keep in mind: You can change the header style individually for each page!</strong> <a href="#" class="ut-header-preview">Preview Header Styles</a>',
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_header_settings',
            'choices'     => array( 
              
              array(
                'value'       => 'pt-style-1',
                'label'       => 'Style One'
              ),
              
              array(
                'value'       => 'pt-style-2',
                'label'       => 'Style Two'
              ),
              
              array(
                'value'       => 'pt-style-3',
                'label'       => 'Style Three'
              ),
              
              array(
                'value'       => 'pt-style-4',
                'label'       => 'Style Four'
              ),
              
              array(
                'value'       => 'pt-style-5',
                'label'       => 'Style Five'
              ),
              
              array(
                'value'       => 'pt-style-6',
                'label'       => 'Style Six'
              ),
              
              array(
                'value'       => 'pt-style-7',
                'label'       => 'Style Seven'
              )
              
            ),
        ),
      
        array(
            'id'          => 'ut_global_headline_style_2_color',
            'label'       => 'Style Two Decoration Line Color',
            'desc'        => '<strong>(optional)</strong>',
            'type'        => 'colorpicker',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_header_settings',
            'std'         => '#222222',
            'required'    => array(
                'ut_global_headline_style' => 'pt-style-2'
            )
        ),
      
        array(
            'id'          => 'ut_global_headline_style_2_height',
            'label'       => 'Style Two Decoration Line Height',
            'desc'        => '<strong>(optional)</strong> - value in px , default: 1px',
            'type'        => 'text',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_header_settings',
            'required'    => array(
                'ut_global_headline_style' => 'pt-style-2'
            )
        ),
      
        array(
            'id'          => 'ut_global_headline_style_2_width',
            'label'       => 'Style Two Decoration Line Width',
            'desc'        => '<strong>(optional)</strong> - value in % or px , default: 30px',
            'type'        => 'text',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_header_settings',
            'required'    => array(
                'ut_global_headline_style' => 'pt-style-2'
            )
        ),
      
        array(
            'id'          => 'ut_global_headline_width',
            'label'       => 'Header Width',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_header_settings',
            'type'        => 'select',
            'choices'     => array(                     
                array(
                    'label'       => '7/10 (center)',
                    'value'       => 'seven'
                ),
                array(
                    'label'       => '10/10 (fullwidth)',
                    'value'       => 'ten'
                )
            ),
            'std'         => 'seven'
        ),
      
        array(
            'id'          => 'ut_global_headline_align',
            'label'       => 'Header Text Alignment',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_header_settings',
            'type'        => 'select',
            'choices'     => array(                     
                array(
                    'label'       => 'Center',
                    'value'       => 'center'
                ),
                array(
                    'label'       => 'Left',
                    'value'       => 'left'
                ),
            ),
            'std'         => 'center'
        ),
            
        array(
            'id'          => 'ut_global_header_font_headline',
            'label'       => 'General Section Headlines Font Face',
            'desc'        => 'General Section Headlines Font Face',
            'type'        => 'section_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_header_settings',
        ),
      
        array(
            'id'          => 'ut_global_headline_font_type',
            'label'       => 'Choose Font Source',
            'desc'        => sprintf('Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_header_settings',
            'std'         => 'ut-font',
            'choices'     => array( 
              array(
                'value'       => 'ut-font',
                'label'       => 'Theme Font'
              ),
              array(
                'value'       => 'ut-websafe',
                'label'       => 'Web Safe Fonts'
              ),
              array(
                'value'       => 'ut-google',
                'label'       => 'Google Font'
              )
            ),
        ),
      
        array(
            'id'          => 'ut_global_headline_font_color',
            'label'       => 'General Section Headlines Font Color',
            'type'        => 'colorpicker',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_header_settings',            
        ),
      
        array(
            'id'          => 'ut_global_google_headline_font_style',
            'label'       => 'General Section Headlines Font Style',
            'type'        => 'googlefont',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_header_settings',
            'required'    => array(
                'ut_global_headline_font_type' => 'ut-google'
            )
        ), 
      
        array(
            'id'          => 'ut_global_headline_font_style',
            'label'       => 'General Section Headlines Font Style',
            'desc'        => '<strong>(optional)</strong> - default semibold. This option will affect section and single page headers. <br /> <strong>Keep in mind: You can change the header font style individually for each page!</strong> <a href="#" class="ut-font-preview">Preview Font Style</a>',
            'std'         => 'semibold',
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_header_settings',
            'choices'     => array( 
                array(
                    'value'       => 'extralight',
                    'label'       => 'Extralight'
                ),
                array(
                    'value'       => 'light',
                    'label'       => 'Light'
                ),
                array(
                    'value'       => 'regular',
                    'label'       => 'Regular'
                ),
                array(
                    'value'       => 'medium',
                    'label'       => 'Medium'
                 ),
                array(
                    'value'       => 'semibold',
                    'label'       => 'Semi Bold'
                ),
                array(
                    'value'       => 'bold',
                    'label'       => 'Bold'
                )
            ),
            'required'    => array(
                'ut_global_headline_font_type' => 'ut-font'
            )
        ),
      
        array(
            'id'          => 'ut_global_headline_font_style_settings',
            'label'       => 'General Section Title Font Settings',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_header_settings',
             'required'    => array(
                'ut_global_headline_font_type' => 'ut-font'
            )
        ),
      
        array(
            'id'          => 'ut_global_headline_websafe_font_style_settings',
            'label'       => 'General Section Title Font Settings',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_header_settings',
            'required'    => array(
                'ut_global_headline_font_type' => 'ut-websafe'
            )
        ),
      
      
        /*
        |--------------------------------------------------------------------------
        | Global Page Titles Typography and Styles
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'          => 'ut_global_page_header_styles_headline',
            'label'       => 'General Page Title',
            'type'        => 'panel_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_page_title_settings',
        ),
      
        array(
            'id'          => 'ut_global_page_headline_style',
            'label'       => 'General Page Title Style',
            'desc'        => '<strong>(optional)</strong> - default "Style One". This option will affect single page titles. <br /> <strong>Keep in mind: You can change the header style individually for each page!</strong> <a href="#" class="ut-header-preview">Preview Header Styles</a>',
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_page_title_settings',
            'choices'     => array( 
                array(
                    'value'       => 'pt-style-1',
                    'label'       => 'Style One'
                ),
                array(
                    'value'       => 'pt-style-2',
                    'label'       => 'Style Two'
                ),
                array(
                    'value'       => 'pt-style-3',
                    'label'       => 'Style Three'
                ),
                array(
                    'value'       => 'pt-style-4',
                    'label'       => 'Style Four'
                ),
                array(
                    'value'       => 'pt-style-5',
                    'label'       => 'Style Five'
                ),
                array(
                    'value'       => 'pt-style-6',
                    'label'       => 'Style Six'
                ),
                array(
                    'value'       => 'pt-style-7',
                    'label'       => 'Style Seven'
                )
              
            ),
        ),
      
        array(
            'id'          => 'ut_global_page_headline_style_2_color',
            'label'       => 'Style Two Decoration Line Color',
            'desc'        => '<strong>(optional)</strong>',
            'type'        => 'colorpicker',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_page_title_settings',
            'std'         => '#222222',
            'required'    => array(
                'ut_global_page_headline_style' => 'pt-style-2'
            )
        ),
      
        array(
            'id'          => 'ut_global_page_headline_style_2_height',
            'label'       => 'Style Two Decoration Line Height',
            'desc'        => '<strong>(optional)</strong> - value in px , default: 1px',
            'type'        => 'text',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_page_title_settings',
            'required'    => array(
                'ut_global_page_headline_style' => 'pt-style-2'
            )
        ),
      
        array(
            'id'          => 'ut_global_page_headline_style_2_width',
            'label'       => 'Style Two Decoration Line Width',
            'desc'        => '<strong>(optional)</strong> - value in % or px , default: 30px',
            'type'        => 'text',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_page_title_settings',
            'required'    => array(
                'ut_global_page_headline_style' => 'pt-style-2'
            )
        ),
      
        array(
            'id'          => 'ut_global_page_headline_width',
            'label'       => 'Header Width',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_page_title_settings',
            'type'        => 'select',
            'choices'     => array(                     
                array(
                    'label'       => '7/10 (center)',
                    'value'       => 'seven'
                ),
                array(
                    'label'       => '10/10 (fullwidth)',
                    'value'       => 'ten'
                )
            ),
            'std'         => 'seven'
        ),
      
        array(
            'id'          => 'ut_global_page_headline_align',
            'label'       => 'Header Text Alignment',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_page_title_settings',
            'type'        => 'select',
            'choices'     => array(                     
                array(
                    'label'       => 'Center',
                    'value'       => 'center'
                ),
                array(
                    'label'       => 'Left',
                    'value'       => 'left'
                ),
            ),
            'std'         => 'center'
        ),

        array(
            'id'          => 'ut_global_page_header_font_headline',
            'label'       => 'General Page Title Font Face',
            'desc'        => 'General Section Headlines Font Face',
            'type'        => 'section_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_page_title_settings',
        ),
      
        array(
            'id'          => 'ut_global_page_headline_font_type',
            'label'       => 'Choose Font Source',
            'desc'        => sprintf('Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_page_title_settings',
            'std'         => 'ut-font',
            'choices'     => array( 
                array(
                    'value'       => 'ut-font',
                    'label'       => 'Theme Font'
                ),
                array(
                    'value'       => 'ut-websafe',
                    'label'       => 'Web Safe Fonts'
                ),
                array(
                    'value'       => 'ut-google',
                    'label'       => 'Google Font'
                )
            ),
        ),
      
        array(
            'id'          => 'ut_global_page_headline_font_color',
            'label'       => 'General Page Title Font Color',
            'type'        => 'colorpicker',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_page_title_settings',
        ),
      
        array(
            'id'          => 'ut_global_page_google_headline_font_style',
            'label'       => 'General Page Title Font Style',
            'type'        => 'googlefont',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_page_title_settings',
            'required'    => array(
                'ut_global_page_headline_font_type'     =>  'ut-google'
            )
        ), 
      
        array(
            'id'          => 'ut_global_page_headline_font_style',
            'label'       => 'General Page Title Font Style',
            'desc'        => '<strong>(optional)</strong> - default semibold. This option will affect single page titles. <br /> <strong>Keep in mind: You can change the header font style individually for each page!</strong> <a href="#" class="ut-font-preview">Preview Font Style</a>',
            'std'         => 'semibold',
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_page_title_settings',
            'choices'     => array( 
                array(
                    'value'       => 'extralight',
                    'label'       => 'Extralight'
                ),
                array(
                    'value'       => 'light',
                    'label'       => 'Light'
                ),
                array(
                    'value'       => 'regular',
                    'label'       => 'Regular'
                ),
                array(
                    'value'       => 'medium',
                    'label'       => 'Medium'
                ),
                array(
                    'value'       => 'semibold',
                    'label'       => 'Semi Bold'
                ),
                array(
                    'value'       => 'bold',
                    'label'       => 'Bold'
                )
            ),
            'required'    => array(
                'ut_global_page_headline_font_type'     =>  'ut-font'
            )
        ),
        
        array(
            'id'          => 'ut_global_page_headline_websafe_font_style_settings',
            'label'       => 'General Page Title Font Settings',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_page_title_settings',
            'required'    => array(
                'ut_global_page_headline_font_type'     =>  'ut-websafe'
            )
        ), 
      
        array(
            'id'          => 'ut_global_page_headline_font_style_settings',
            'label'       => 'General Page Title Font Settings',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_page_title_settings',
            'required'    => array(
                'ut_global_page_headline_font_type'     =>  'ut-font'
            )
        ),
      
        /*
        |--------------------------------------------------------------------------
        | Global Header Lead  Typography and Styles
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'          => 'ut_global_lead_headline',
            'label'       => 'General Section Leads',
            'type'        => 'panel_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_lead_settings',
        ),
      
        array(
            'id'          => 'ut_global_lead_font_type',
            'label'       => 'Choose Font Source',
            'desc'        => sprintf('Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_lead_settings',
            'std'          => 'ut-font',
            'choices'     => array( 
                array(
                    'value'       => 'ut-font',
                    'label'       => 'Theme Font'
                ),
                array(
                    'value'       => 'ut-websafe',
                    'label'       => 'Web Safe Fonts'
                ),
                array(
                    'value'       => 'ut-google',
                    'label'       => 'Google Font'
                )
            ),
        ),
      
        array(
            'id'          => 'ut_global_lead_color',
            'label'       => 'Global Section Lead Color',
            'desc'        => 'Can be overwritten by Page and Section Settings.',
            'type'        => 'colorpicker',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_lead_settings'
        ),      
      
        array(
            'id'          => 'ut_google_lead_font_style',
            'label'       => 'General Section Leads Font Style',
            'type'        => 'googlefont',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_lead_settings',
            'required'    => array(
                'ut_global_lead_font_type'      => 'ut-google'
            )
        ),
      
        array(
            'id'          => 'ut_lead_websafe_font_style',
            'label'       => 'General Section Leads Font Style',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_lead_settings',
            'required'    => array(
                'ut_global_lead_font_type'      => 'ut-websafe'
            )
        ),  
      
        array(
            'id'          => 'ut_lead_font_style',
            'label'       => 'General Section Leads Font Style',
            'desc'        => '<a href="#" class="ut-font-preview">General Section Leads Font Style</a>',
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_lead_settings',
            'choices'     => array( 
                array(
                    'value'       => 'extralight',
                    'label'       => 'Extra Light'
                ),
                array(
                    'value'       => 'light',
                    'label'       => 'Light'
                ),
                array(
                    'value'       => 'regular',
                    'label'       => 'Regular'
                ),
                array(
                    'value'       => 'medium',
                    'label'       => 'Medium'
                ),
                array(
                    'value'       => 'semibold',
                    'label'       => 'Semi Bold'
                ),
                array(
                    'value'       => 'bold',
                    'label'       => 'Bold'
                )
            ),
            'required'    => array(
                'ut_global_lead_font_type'      => 'ut-font'
            )
        ),      
      
        /*
        |--------------------------------------------------------------------------
        | Portolio Hover
        |--------------------------------------------------------------------------
        */
       
        array(
            'id'          => 'ut_global_portfolio_title_headline',
            'label'       => 'Portfolio Hover Title',
            'type'        => 'panel_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_portfolio_settings',
        ),
      
        array(
            'id'          => 'ut_global_portfolio_title_color',
            'label'       => 'Portfolio Title Color',
            'desc'        => 'Can be overwritten by Showcase Settings.',
            'type'        => 'colorpicker',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_portfolio_settings'
        ),       

        array(
            'id'          => 'ut_global_portfolio_title_font_type',
            'label'       => 'Choose Font Source',
            'desc'        => sprintf('Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_portfolio_settings',
            'std'          => 'ut-font',
            'choices'     => array( 
                array(
                    'value'       => 'ut-font',
                    'label'       => 'Theme Font'
                ),
                 array(
                    'value'       => 'ut-websafe',
                    'label'       => 'Web Safe Fonts'
                ),
                array(
                    'value'       => 'ut-google',
                    'label'       => 'Google Font'
                )
            ),
        ),
      
        array(
            'id'          => 'ut_portfolio_title_font_style',
            'label'       => 'Header Font Style',
            'desc'        => '<strong>(optional)</strong> - default : Typography -> General Headlines. <a href="#" class="ut-font-preview">Preview Font Styles</a>',
            'type'        => 'select',
            'std'         => 'regular',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_portfolio_settings',
            'choices'     => array( 
                array(
                    'value'       => 'extralight',
                    'label'       => 'Extra Light'
                ),
                array(
                    'value'       => 'light',
                    'label'       => 'Light'
                ),
                array(
                    'value'       => 'regular',
                    'label'       => 'Regular'
                 ),
                array(
                    'value'       => 'medium',
                    'label'       => 'Medium'
                ),
                array(
                    'value'       => 'semibold',
                    'label'       => 'Semi Bold'
                ),
                array(
                    'value'       => 'bold',
                    'label'       => 'Bold'
                )
            ),
            'required'      => array(
                'ut_global_portfolio_title_font_type'       => 'ut-font'
            )
        ),
      
        array(
            'id'          => 'ut_google_portfolio_title_font_style',
            'label'       => 'Portfolio Title Font Style',
            'type'        => 'googlefont',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_portfolio_settings',
            'required'      => array(
                'ut_global_portfolio_title_font_type'       => 'ut-google'
            )
        ),
      
        array(
            'id'          => 'ut_websafe_portfolio_title_font_style',
            'label'       => 'Portfolio Title Font Style',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_portfolio_settings',
            'required'      => array(
                'ut_global_portfolio_title_font_type'       => 'ut-websafe'
            )
        ),
      
        array(
            'id'          => 'ut_global_portfolio_category_headline',
            'label'       => 'Portfolio Hover Category',
            'desc'        => 'Portfolio Hover Category',
            'type'        => 'section_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_portfolio_settings',
        ),      
      
        array(
            'id'          => 'ut_global_portfolio_category_color',
            'label'       => 'Portfolio Hover Category Color',
            'desc'        => 'Can be overwritten by Showcase Settings.',
            'type'        => 'colorpicker',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_portfolio_settings'
        ),
      
        array(
            'id'          => 'ut_global_portfolio_category_font_type',
            'label'       => 'Choose Font Source',
            'desc'        => sprintf('Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_portfolio_settings',
            'std'         => 'ut-font',
            'choices'     => array( 
              array(
                'value'       => 'ut-font',
                'label'       => 'Theme Font'
              ),
              array(
                'value'       => 'ut-websafe',
                'label'       => 'Web Safe Fonts'
              ),
              array(
                'value'       => 'ut-google',
                'label'       => 'Google Font'
              )
            ),
        ),
      
        array(
            'id'          => 'ut_portfolio_category_font_style',
            'label'       => 'Header Font Style',
            'desc'        => '<strong>(optional)</strong> - default : Typography -> General Headlines. <a href="#" class="ut-font-preview">Preview Font Styles</a>',
            'type'        => 'select',
            'std'         => 'regular',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_portfolio_settings',
            'choices'     => array( 
                array(
                    'value'       => 'extralight',
                    'label'       => 'Extra Light'
                ),
                array(
                    'value'       => 'light',
                    'label'       => 'Light'
                ),
                array(
                    'value'       => 'regular',
                    'label'       => 'Regular'
                ),
                array(
                    'value'       => 'medium',
                    'label'       => 'Medium'
                ),
                array(
                    'value'       => 'semibold',
                    'label'       => 'Semi Bold'
                ),
                array(
                    'value'       => 'bold',
                    'label'       => 'Bold'
                )
            ),
            'required'      => array(
                'ut_global_portfolio_category_font_type'        => 'ut-font'
            )
        ),

        array(
            'id'          => 'ut_google_portfolio_category_font_style',
            'label'       => 'Category Font Style',
            'type'        => 'googlefont',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_portfolio_settings',
            'required'      => array(
                'ut_global_portfolio_category_font_type'        => 'ut-google'
            )
        ),
      
        array(
            'id'          => 'ut_websafe_portfolio_category_font_style',
            'label'       => 'Category Font Style',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_portfolio_settings',
            'required'      => array(
                'ut_global_portfolio_category_font_type'        => 'ut-websafe'
            )
        ), 
      
        /*
        |--------------------------------------------------------------------------
        | Contact Section Header Font Style
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'          => 'ut_csection_header_font_headline',
            'label'       => 'Contact Section Header',
            'type'        => 'panel_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_csection_header_font_setting',
        ),
      
        array(
            'id'          => 'ut_csection_header_font_type',
            'label'       => 'Choose font source for Header',
            'desc'        => sprintf('Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_csection_header_font_setting',
            'std'         => 'ut-font',
            'choices'     => array( 
                array(
                    'value'       => 'ut-font',
                    'label'       => 'Theme Font'
                ),
                array(
                    'value'       => 'ut-websafe',
                    'label'       => 'Web Safe Fonts'
                ),
                array(
                    'value'       => 'ut-google',
                    'label'       => 'Google Font'
                )
            ),
        ),
      
        array(
            'id'          => 'ut_csection_header_google_font_style',
            'label'       => 'Header Font Style',
            'type'        => 'googlefont',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_csection_header_font_setting',
            'required'    => array(
                'ut_csection_header_font_type'      => 'ut-google'
            )
        ),
      
        array(
            'id'          => 'ut_csection_header_websafe_font_style',
            'label'       => 'Header Font Style',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_csection_header_font_setting',
            'required'    => array(
                'ut_csection_header_font_type'      => 'ut-websafe'
            )
        ),  
      
        array(
            'id'          => 'ut_csection_header_font_style',
            'label'       => 'Header Font Style',
            'desc'        => '<strong>(optional)</strong> - default : Typography -> General Headlines. <a href="#" class="ut-font-preview">Preview Font Styles</a>',
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_csection_header_font_setting',
            'choices'     => array( 
                array(
                    'label'       => 'Default',
                    'value'       => 'global'
                ),              
                array(
                    'value'       => 'extralight',
                    'label'       => 'Extra Light'
                ),
                array(
                    'value'       => 'light',
                    'label'       => 'Light'
                ),
                array(
                    'value'       => 'regular',
                    'label'       => 'Regular'
                ),
                array(
                    'value'       => 'medium',
                    'label'       => 'Medium'
                ),
                array(
                    'value'       => 'semibold',
                    'label'       => 'Semi Bold'
                ),
                array(
                    'value'       => 'bold',
                    'label'       => 'Bold'
                )
            ),
            'required'    => array(
                'ut_csection_header_font_type'      => 'ut-font'
            )
        ),
        
        array(
            'id'          => 'ut_csection_header_font_style_settings',
            'label'       => 'Header Font Style Settings',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_csection_header_font_setting',
             'required'    => array(
                'ut_csection_header_font_type' => 'ut-font'
            )
        ),
        
        array(
            'id'          => 'ut_csection_lead_headline',
            'label'       => 'Contact Section Lead',
            'type'        => 'section_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_csection_header_font_setting',
        ),
      
        array(
            'id'          => 'ut_csection_lead_font_type',
            'label'       => 'Choose Font Source',
            'desc'        => sprintf('Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_csection_header_font_setting',
            'std'         => 'ut-font',
            'choices'     => array( 
                array(
                    'value'       => 'ut-font',
                    'label'       => 'Theme Font'
                ),
                array(
                    'value'       => 'ut-websafe',
                    'label'       => 'Web Safe Fonts'
                ),
                array(
                    'value'       => 'ut-google',
                    'label'       => 'Google Font'
                )
            ),
        ),
      
        array(
            'id'          => 'ut_csection_lead_color',
            'label'       => 'Global Section Lead Color',
            'desc'        => 'Can be overwritten by Page and Section Settings.',
            'type'        => 'colorpicker',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_csection_header_font_setting',
        ),      
      
        array(
            'id'          => 'ut_csection_lead_google_font_style',
            'label'       => 'General Section Leads Font Style',
            'type'        => 'googlefont',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_csection_header_font_setting',
            'required'    => array(
                'ut_csection_lead_font_type'      => 'ut-google'
            )
        ),
      
        array(
            'id'          => 'ut_csection_lead_websafe_font_style',
            'label'       => 'General Section Leads Font Style',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_csection_header_font_setting',
            'required'    => array(
                'ut_csection_lead_font_type'      => 'ut-websafe'
            )
        ),  
      
        array(
            'id'          => 'ut_csection_lead_font_style',
            'label'       => 'General Section Leads Font Style',
            'desc'        => '<a href="#" class="ut-font-preview">General Section Leads Font Style</a>',
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_csection_header_font_setting',
            'choices'     => array( 
                array(
                    'value'       => 'extralight',
                    'label'       => 'Extra Light'
                ),
                array(
                    'value'       => 'light',
                    'label'       => 'Light'
                ),
                array(
                    'value'       => 'regular',
                    'label'       => 'Regular'
                ),
                array(
                    'value'       => 'medium',
                    'label'       => 'Medium'
                ),
                array(
                    'value'       => 'semibold',
                    'label'       => 'Semi Bold'
                ),
                array(
                    'value'       => 'bold',
                    'label'       => 'Bold'
                )
            ),
            'required'    => array(
                'ut_csection_lead_font_type'      => 'ut-font'
            )
        ),
        
        array(
            'id'          => 'ut_csection_lead_font_style_settings',
            'label'       => 'Header Font Style Settings',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_csection_header_font_setting',
             'required'    => array(
                'ut_csection_lead_font_type' => 'ut-font'
            )
        ),
        
        
        /*
        |--------------------------------------------------------------------------
        | Typography - Blockquote
        |--------------------------------------------------------------------------
        */
       
        array(
            'id'          => 'ut_global_blockquote_headline',
            'label'       => 'Blockquotes Font Face',
            'type'        => 'panel_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_blockquote_settings',
        ),
      
        array(
            'id'          => 'ut_blockquote_font_type',
            'label'       => 'Choose Font Source',
            'desc'        => sprintf('Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_blockquote_settings',
            'std'         => 'ut-font',
            'choices'     => array( 
                array(
                    'value'       => 'ut-font',
                    'label'       => 'Theme Font'
                ),
                array(
                    'value'       => 'ut-websafe',
                    'label'       => 'Web Safe Fonts'
                ),
                array(
                    'value'       => 'ut-google',
                    'label'       => 'Google Font'
                )
            ),
        ),
      
        array(
            'id'          => 'ut_global_blockquote_headline_color',
            'label'       => 'Global Blockquote Font Color',
            'desc'        => '<strong>optional</strong>',
            'type'        => 'colorpicker',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_blockquote_settings',            
        ),
      
        array(
            'id'          => 'ut_google_blockquote_font_style',
            'label'       => 'Blockquote Font Style',
            'type'        => 'googlefont',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_blockquote_settings',
            'required'    => array(
                'ut_blockquote_font_type'      => 'ut-google'
            )
        ),
      
        array(
            'id'          => 'ut_blockquote_websafe_font_style',
            'label'       => 'Blockquote Font Style',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_blockquote_settings',
            'required'    => array(
                'ut_blockquote_font_type'      => 'ut-websafe'
            )
        ),
      
        array(
            'id'          => 'ut_blockquote_font_style',
            'label'       => 'Blockquote Font Style',
            'desc'        => '<a href="#" class="ut-font-preview">Blockquote Font Styles</a>',
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_blockquote_settings',
            'choices'     => array( 
                array(
                    'value'       => 'extralight',
                    'label'       => 'Extra Light'
                ),
                array(
                    'value'       => 'light',
                    'label'       => 'Light'
                ),
                array(
                    'value'       => 'regular',
                    'label'       => 'Regular'
                ),
                array(
                    'value'       => 'medium',
                    'label'       => 'Medium'
                ),
                array(
                    'value'       => 'semibold',
                    'label'       => 'Semi Bold'
                ),
                array(
                    'value'       => 'bold',
                    'label'       => 'Bold'
                )
            ),
            'required'    => array(
                'ut_blockquote_font_type'      => 'ut-font'
            )
        ),
      
        array(
            'id'          => 'ut_single_blockquote_websafe_font_style',
            'label'       => 'Single Posts Blockquote Font Styling',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_blockquote_settings'
        ),
      
      
      
      
        /*
        |--------------------------------------------------------------------------
        | Typography - Blog
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'          => 'ut_global_blog_settings_headline',
            'label'       => 'Blog',
            'type'        => 'panel_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_blog_menu_settings',
        ),
      
        array(
            'id'          => 'ut_global_blog_titles_font_style',
            'label'       => 'Blog Posts Title Font Setting',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_blog_menu_settings'
        ),
      
        array(
            'id'          => 'ut_global_blog_single_settings_headline',
            'label'       => 'Single Posts',
            'desc'        => 'Single Posts',
            'type'        => 'section_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_blog_menu_settings',
        ),
      
        array(
            'id'          => 'ut_global_blog_single_titles_font_style',
            'label'       => 'Single Post Title Font Setting',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_blog_menu_settings'
        ),      
      
        /*
        |--------------------------------------------------------------------------
        | Typography - Blog Sidebar
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'          => 'ut_global_blog_widgets_headline',
            'label'       => 'Sidebar Widgets',
            'type'        => 'panel_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_blog_widgets_settings',
        ),
      
        array(
            'id'          => 'ut_global_sidebar_widgets_headline_color',
            'label'       => 'Sidebar Widgets Headlines Color',
            'desc'        => 'HEX Color.',
            'type'        => 'colorpicker',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_blog_widgets_settings',
        ),
      
        array(
            'id'          => 'ut_global_blog_widgets_headline_font_type',
            'label'       => 'Choose Font Source',
            'desc'        => sprintf('Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_blog_widgets_settings',
            'std'         => 'ut-font',
            'choices'     => array( 
                array(
                    'value'       => 'ut-font',
                    'label'       => 'Theme Font'
                ),
                array(
                    'value'       => 'ut-websafe',
                    'label'       => 'Web Safe Fonts'
                ),
                array(
                    'value'       => 'ut-google',
                    'label'       => 'Google Font'
                )
            ),
        ),
      
        array(
            'id'          => 'ut_global_blog_widgets_headline_google_font_style',
            'label'       => 'Sidebar Widgets Headlines Font Style',
            'type'        => 'googlefont',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_blog_widgets_settings',
            'required'    => array(
                'ut_global_blog_widgets_headline_font_type'     => 'ut-google'
            )
        ),
      
        array(
            'id'          => 'ut_global_blog_widgets_headline_websafe_font_style',
            'label'       => 'Sidebar Widgets Headlines Font Style',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_blog_widgets_settings',
            'required'    => array(
                'ut_global_blog_widgets_headline_font_type'     => 'ut-websafe'
            )
        ),
      
        array(
            'id'          => 'ut_global_blog_widgets_headline_font_style',
            'label'       => 'Sidebar Widgets Headlines Font Style',
            'desc'        => '<a href="#" class="ut-font-preview">Blockquote Font Styles</a>',
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_blog_widgets_settings',
            'choices'     => array( 
                array(
                    'value'       => 'extralight',
                    'label'       => 'Extra Light'
                ),
                array(
                    'value'       => 'light',
                    'label'       => 'Light'
                ),
                array(
                    'value'       => 'regular',
                    'label'       => 'Regular'
                ),
                array(
                    'value'       => 'medium',
                    'label'       => 'Medium'
                ),
                array(
                    'value'       => 'semibold',
                    'label'       => 'Semi Bold'
                ),
                array(
                    'value'       => 'bold',
                    'label'       => 'Bold'
                )
            ),
            'required'    => array(
                'ut_global_blog_widgets_headline_font_type'     => 'ut-font'
            )
        ),
        
        array(
            'id'          => 'ut_global_sidebar_widgets_text_font_size',
            'label'       => 'Sidebar Text Font Size',
            'type'        => 'text',
            'desc'        => 'Value in px: e.g. 14px.',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_blog_widgets_settings',
        ),
        
        array(
            'id'          => 'ut_global_sidebar_widgets_arrow_line_height',
            'label'       => 'Sidebar Widgets Arrows Line Height',
            'type'        => 'text',
            'desc'        => 'Defines the amount of space above and below e.g. 1.6',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_blog_widgets_settings',
        ),
        
        
        
        
        /*
        |--------------------------------------------------------------------------
        | Typography - Footer
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'          => 'ut_global_footer_widgets_headline',
            'label'       => 'Footer Widgets',
            'type'        => 'panel_headline',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_footer_typo_settings',
        ),
      
        array(
            'id'          => 'ut_footer_widgets_headline_color',
            'label'       => 'Footer Widgets Headlines Color',
            'type'        => 'colorpicker',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_footer_typo_settings',
        ),
      
        array(
            'id'          => 'ut_footer_widgets_headline_font_type',
            'label'       => 'Choose Font Source',
            'desc'        => sprintf('Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_footer_typo_settings',
            'std'         => 'ut-font',
            'choices'     => array( 
                array(
                    'value'       => 'ut-font',
                    'label'       => 'Theme Font'
                 ),
                array(
                    'value'       => 'ut-websafe',
                    'label'       => 'Web Safe Fonts'
                ),
                array(
                    'value'       => 'ut-google',
                    'label'       => 'Google Font'
                )
            ),
        ),
      
        array(
            'id'          => 'ut_footer_widgets_headline_google_font_style',
            'label'       => 'Footer Widgets Headlines Font Style',
            'type'        => 'googlefont',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_footer_typo_settings',
            'required'    => array(
                'ut_footer_widgets_headline_font_type'      => 'ut-google'
            )
        ),
      
        array(
            'id'          => 'ut_footer_widgets_headline_websafe_font_style',
            'label'       => 'Footer Widgets Headlines Font Style',
            'type'        => 'typography',
            'markup'      => '1_1',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_footer_typo_settings',
            'required'    => array(
                'ut_footer_widgets_headline_font_type'      => 'ut-websafe'
            )
        ),  
      
        array(
            'id'          => 'ut_footer_widgets_headline_font_style',
            'label'       => 'Footer Widgets Headlines Font Style',
            'desc'        => '<strong>(optional)</strong>',
            'type'        => 'select',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_footer_typo_settings',
            'choices'     => array( 
                array(
                    'label'       => 'Default',
                    'value'       => 'global'
                ),
                array(
                    'value'       => 'extralight',
                    'label'       => 'Extra Light'
                ),
                array(
                    'value'       => 'light',
                    'label'       => 'Light'
                ),
                array(
                    'value'       => 'regular',
                    'label'       => 'Regular'
                ),
                array(
                    'value'       => 'medium',
                    'label'       => 'Medium'
                ),
                array(
                    'value'       => 'semibold',
                    'label'       => 'Semi Bold'
                ),
                array(
                    'value'       => 'bold',
                    'label'       => 'Bold'
                )
            ),
            'required'    => array(
                'ut_footer_widgets_headline_font_type'      => 'ut-font'
            )
        ),
        
        
        array(
            'id'          => 'ut_footer_widgets_text_font_size',
            'label'       => 'Footer Text Font Size',
            'type'        => 'text',
            'desc'        => 'Value in px: e.g. 14px.',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_footer_typo_settings',
        ),
        
        array(
            'id'          => 'ut_footer_widgets_arrow_line_height',
            'label'       => 'Footers Widgets Arrows Line Height',
            'type'        => 'text',
            'desc'        => 'Defines the amount of space above and below e.g. 1.6',
            'section'     => 'ut_typography_settings',
            'subsection'  => 'ut_global_footer_typo_settings',
        ),
        
        
        
        /*
        |--------------------------------------------------------------------------
        | Global Hero Settings 
        |--------------------------------------------------------------------------
        */ 
      
        array(
            'id'          => 'ut_global_hero_styling_headline',
            'label'       => 'Global Hero Caption Styling',
            'type'        => 'panel_headline',
            'section'     => 'ut_global_hero_settings',
            'subsection'  => 'ut_global_hero_caption_settings',
        ),
      
        array(
            'id'          => 'ut_global_hero_setting_Info',
            'label'       => 'Global Hero Caption',
            'desc'        => 'These are your global Hero Styling settings for the entire site. However, in order to give you more freedom while individualizing your Brooklyn powered website. You can overwrite these settings by using the "Hero Styling" tab inside the Front Page or Blog Section as well as on single pages or portfolios. Means you can differentiate the visual appearance on different parts of your website.',
            'type'        => 'section_headline_info',
            'section'     => 'ut_global_hero_settings',
            'subsection'  => 'ut_global_hero_caption_settings',
        ),
      
        array(
            'id'          => 'ut_global_hero_style',
            'label'       => 'Hero Caption Style',
            'desc'        => 'Choose between 11 different hero caption styles. If you are using a slider as your desired hero type, you can define an individual style for each slide. <a href="#" class="ut-hero-preview">Preview Hero Caption Styles</a>',
            'type'        => 'select',
            'section'     => 'ut_global_hero_settings',
            'subsection'  => 'ut_global_hero_caption_settings',
            'choices'     => array( 
                array(
                    'value'       => 'ut-hero-style-1',
                    'label'       => 'Style One',
                    'src'         => ''
                ),
                array(
                    'value'       => 'ut-hero-style-2',
                    'label'       => 'Style Two'
                ),
                array(
                    'value'       => 'ut-hero-style-3',
                    'label'       => 'Style Three'
                ),
                array(
                    'value'       => 'ut-hero-style-4',
                    'label'       => 'Style Four'
                ),
                array(
                    'value'       => 'ut-hero-style-5',
                    'label'       => 'Style Five'
                ),
                array(
                    'value'       => 'ut-hero-style-6',
                    'label'       => 'Style Six'
                ),
                array(
                    'value'       => 'ut-hero-style-7',
                    'label'       => 'Style Seven'
                ),
                array(
                    'value'       => 'ut-hero-style-8',
                    'label'       => 'Style Eight'
                ),
                array(
                    'value'       => 'ut-hero-style-9',
                    'label'       => 'Style Nine'
                ),
                array(
                    'value'       => 'ut-hero-style-10',
                    'label'       => 'Style Ten'
                ),
                array(
                    'value'       => 'ut-hero-style-11',
                    'label'       => 'Style Eleven'
                )
            ) /* end choices */
        ),
        
        array(
            'id'          => 'ut_global_hero_width',
            'label'       => 'Choose Hero Width',
            'desc'        => 'Decide if the hero content gets stretched to fullwidth or displays centered.',
            'type'        => 'select',
            'std'         => 'center',
            'section'     => 'ut_global_hero_settings',
            'subsection'  => 'ut_global_hero_caption_settings',
            'choices'     => array( 
                array(
                    'value'     => 'centered',
                    'label'     => 'Grid Based'
                ),
                array(
                    'value'    => 'fullwidth',
                    'label'    => 'Fullwidth'
                ),
            ) /* end choices */
        ),
        
        array(
            'id'          => 'ut_global_hero_align',
            'label'       => 'Choose Hero Caption Alignment',
            'desc'        => 'Specifies the default alignment for the caption inside the hero.',
            'type'        => 'select',
            'std'         => 'center',
            'section'     => 'ut_global_hero_settings',
            'subsection'  => 'ut_global_hero_caption_settings',
            'choices'     => array( 
                array(
                    'value'       => 'center',
                    'label'       => 'Center'
                ),
                array(
                    'value'       => 'left',
                    'label'       => 'Left'
                ),
                array(
                    'value'       => 'right',
                    'label'       => 'Right'
                )
            ) /* end choices */
        ),
        
        array(
            'id'          => 'ut_global_hero_v_align',
            'label'       => 'Choose Hero Caption Vertical Alignment',
            'desc'        => 'Specifies the default vertical alignment for the caption inside the hero.',
            'type'        => 'select',
            'std'		  => 'middle',
            'section'     => 'ut_global_hero_settings',
            'subsection'  => 'ut_global_hero_caption_settings',
            'choices'     => array( 
                array(
                    'value'     => 'middle',
                    'label'     => 'middle'
                ),
                array(
                    'value'    => 'bottom',
                    'label'    => 'bottom'
                ),
            ),
            'required'      => array(
                'ut_global_hero_align'  => 'left|right',
                'ut_global_hero_width'  => 'fullwidth'
            ),
        ),
        
        array(
            'id'          => 'ut_global_hero_background_settings_headline',
            'label'       => 'Global Hero Background Settings',
            'type'        => 'panel_headline',
            'section'     => 'ut_global_hero_settings',
            'subsection'  => 'ut_global_hero_background_settings',
        ),
        
        array(
            'id'          => 'ut_global_hero_background_color',
            'label'       => 'Hero Background Color',
            'desc'        => '<strong>(optional)</strong>',
            'type'        => 'colorpicker',
            'section'     => 'ut_global_hero_settings',
            'subsection'  => 'ut_global_hero_background_settings',
        ),
        
        array(
            'id'          => 'ut_global_hero_overlay_settings_headline',
            'label'       => 'Global Hero Overlay Settings',
            'type'        => 'panel_headline',
            'section'     => 'ut_global_hero_settings',
            'subsection'  => 'ut_global_hero_overlay_settings',
        ),
      
        array(
            'id'          => 'ut_global_hero_overlay',
            'label'       => 'Activate Hero Overlay?',
            'desc'        => '<strong>(optional)</strong>',
            'std'         => 'on',
            'type'        => 'select',
            'section'     => 'ut_global_hero_settings',
            'subsection'  => 'ut_global_hero_overlay_settings',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'yes, please!',
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'no, thanks!'
                )
            ) /* end choices */
        ),
      
        array(
            'id'          => 'ut_global_hero_overlay_color',
            'label'       => 'Hero Overlay Color',
            'desc'        => '<strong>(optional)</strong>',
            'type'        => 'colorpicker',
            'section'     => 'ut_global_hero_settings',
            'subsection'  => 'ut_global_hero_overlay_settings',
            'required'    => array(
                'ut_global_hero_overlay'    => 'on'
            )
        ),
      
        array(
            'id'          => 'ut_global_hero_overlay_color_opacity',
            'label'       => 'Hero Overlay Color Opacity',
            'desc'        => 'Drag the handle to set the opacity.',
            'type'        => 'numeric-slider',
            'section'     => 'ut_global_hero_settings',
            'subsection'  => 'ut_global_hero_overlay_settings',
            'min_max_step'=> '0,1,0.1',
            'required'    => array(
                'ut_global_hero_overlay'    => 'on'
            )
        ),  
      
        array(
            'id'          => 'ut_global_hero_overlay_pattern',
            'label'       => 'Activate Hero Overlay Pattern?',
            'desc'        => '<strong>(optional)</strong>',
            'std'         => 'on',
            'type'        => 'select',
            'section'     => 'ut_global_hero_settings',
            'subsection'  => 'ut_global_hero_overlay_settings',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'yes, please!'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'no, thanks!'
                )
            ),
            'required'    => array(
                'ut_global_hero_overlay'    => 'on'
            )
        ),
      
        array(
            'id'          => 'ut_global_hero_overlay_pattern_style',
            'label'       => 'Hero Overlay Pattern Style',
            'desc'        => '<strong>(optional)</strong>',
            'std'         => 'style_one',
            'type'        => 'select',
            'section'     => 'ut_global_hero_settings',
            'subsection'  => 'ut_global_hero_overlay_settings',
            'choices'     => array( 
                array(
                    'value'       => 'style_one',
                    'label'       => 'Style One'
                ),
                array(
                    'value'       => 'style_two',
                    'label'       => 'Style Two'
                ),
                array(
                    'value'       => 'custom',
                    'label'       => 'Custom Pattern'
                )

            ),
            'required'    => array(
                'ut_global_hero_overlay'            => 'on',
                'ut_global_hero_overlay_pattern'    => 'on'
            )
        ),
        
        array(
            'id'          => 'ut_global_hero_custom_pattern',
            'label'       => 'Custom Pattern',
            'desc'        => '',
            'type'        => 'background',
            'markup'      => '1_1',
            'section'     => 'ut_global_hero_settings',
            'subsection'  => 'ut_global_hero_overlay_settings',
            'required'    => array(
                'ut_global_hero_overlay'                => 'on',
                'ut_global_hero_overlay_pattern'        => 'on',
                'ut_global_hero_overlay_pattern_style'  => 'custom'
            )
        ),        
        
        array(
            'id'          => 'ut_global_hero_overlay_effect_settings_headline',
            'label'       => 'Global Hero Overlay Effect Settings',
            'desc'        => 'Global Hero Overlay Effect Settings',
            'type'        => 'section_headline',
            'section'     => 'ut_global_hero_settings',
            'subsection'  => 'ut_global_hero_overlay_settings',
        ),
      
        array(
            'id'          => 'ut_global_hero_overlay_effect',
            'label'       => 'Activate Overlay Animation Effect?',
            'desc'        => '<strong>(optional)</strong> Keep in mind, that this effect uses canvas objects for animation. Old Browsers do not support this feature!',
            'std'         => 'off',
            'type'        => 'select',
            'section'     => 'ut_global_hero_settings',
            'subsection'  => 'ut_global_hero_overlay_settings',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'yes, please!'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'no, thanks!'
                )
            ) /* end choices */
        ),
      
        array(
            'id'          => 'ut_global_hero_overlay_effect_style',
            'label'       => 'Overlay Animation Effect',
            'desc'        => 'choose between 2 awesome animation effects!',
            'std'         => 'dots',
            'type'        => 'select',
            'section'     => 'ut_global_hero_settings',
            'subsection'  => 'ut_global_hero_overlay_settings',
            'choices'     => array( 
                array(
                    'value'       => 'dots',
                    'label'       => 'Connecting Dots'
                ),
                array(
                    'value'       => 'bubbles',
                    'label'       => 'Rising Bubbles'
                )
            ),
            'required'      => array(
                'ut_global_hero_overlay_effect'     => 'on'
            )
        ),
      
        array(
            'id'          => 'ut_global_hero_overlay_effect_color',
            'label'       => 'Overlay Effect Color',
            'desc'        => '<strong>(optional)</strong>. Leave this field empty if you like to keep the theme accentcolor as effect color.',
            'type'        => 'colorpicker',
            'section'     => 'ut_global_hero_settings',
            'subsection'  => 'ut_global_hero_overlay_settings',
            'required'      => array(
                'ut_global_hero_overlay_effect'     => 'on'
            )
        ),
      
        array(
            'id'          => 'ut_global_hero_border_setting_headline',
            'label'       => 'Global Hero Border Settings',
            'type'        => 'panel_headline',
            'section'     => 'ut_global_hero_settings',
            'subsection'  => 'ut_global_hero_border_settings',
        ),
      
        array(
            'id'          => 'ut_global_hero_border_bottom',
            'label'       => 'Activate Border at Hero Bottom?',
            'type'        => 'select',
            'choices'     => array(              
                array(
                    'label'       => 'yes, please!',
                    'value'       => 'on'
                ),
                array(
                    'label'       => 'no, thanks!',
                    'value'       => 'off'
                )              
            ),
            'std'         	=> 'off',
            'section'       => 'ut_global_hero_settings',
            'subsection'    => 'ut_global_hero_border_settings',
        ),
      
        array(
            'id'          	=> 'ut_global_hero_border_bottom_color',
            'label'       	=> 'Border Bottom Color',
            'type'        	=> 'colorpicker',
            'desc'       	=> '<strong>(optional)</strong>',
            'section'       => 'ut_global_hero_settings',
            'subsection'    => 'ut_global_hero_border_settings',
            'required'      => array(
                'ut_global_hero_border_bottom' => 'on'
            )
        ),
      
        array(
            'id'            => 'ut_global_hero_border_bottom_width',
            'label'         => 'Border Bottom Width',
            'desc'          => 'Drag the handle to set the bottom width.',
            'type'          => 'numeric-slider',
            'min_max_step'  => '1,100',
            'section'       => 'ut_global_hero_settings',
            'subsection'    => 'ut_global_hero_border_settings',
             'required'      => array(
                'ut_global_hero_border_bottom' => 'on'
            )
        ),
      
        array(
            'id'            => 'ut_global_hero_border_bottom_style',
            'label'         => 'Border Bottom Style',
            'desc'          => 'Creates a border at the bottom of the hero.',
            'type'          => 'select',
            'std'         	=> 'solid',
            'section'       => 'ut_global_hero_settings',
            'subsection'    => 'ut_global_hero_border_settings',
            'choices'       => array(
                array(
                    'label'     => 'dashed',
                    'value'     => 'dashed'
                ),
                array(
                    'label'     => 'dotted',
                    'value'     => 'dotted'
                ),
                array(
                    'label'     => 'solid',
                    'value'     => 'solid'
                ),
                array(
                    'label'     => 'double',
                    'value'     => 'double'
                )
            ),
             'required'      => array(
                'ut_global_hero_border_bottom' => 'on'
            )
        ),
      
        array(
            'id'            => 'ut_global_hero_fancy_border_setting_headline',
            'label'         => 'Global Hero Fancy Border Settings',
            'desc'          => 'Global Hero Fancy Border',
            'type'          => 'section_headline',
            'section'       => 'ut_global_hero_settings',
            'subsection'    => 'ut_global_hero_border_settings',
        ),
      
        array(
            'id'          => 'ut_global_hero_fancy_border',
            'label'       => 'Activate Fancy Border?',
            'desc'        => 'Allows you to create a nice fancy border at the bottom of your hero area.',
            'type'        => 'select',
            'std'         => 'off',
            'section'     => 'ut_global_hero_settings',
            'subsection'  => 'ut_global_hero_border_settings',  
            'choices'     => array(              
              array(
                'label'       => 'yes, please!',
                'value'       => 'on'
              ),
              array(
                'label'       => 'no, thanks!',
                'value'       => 'off'
              )              
            ),      
        ),
      
        array(
            'id'          	=> 'ut_global_hero_fancy_border_color',
            'label'       	=> 'Color',
            'type'        	=> 'colorpicker',
            'desc'       	=> '<strong>(optional)</strong>',
            'section'       => 'ut_global_hero_settings',
            'subsection'    => 'ut_global_hero_border_settings',
            'required'      => array(
                'ut_global_hero_fancy_border'   => 'on'
            )
        ),
      
        array(
            'id'          	=> 'ut_global_hero_fancy_border_background_color',
            'label'       	=> 'Background Color',
            'type'        	=> 'colorpicker',
            'desc'       	=> '<strong>(optional)</strong>',
            'section'       => 'ut_global_hero_settings',
            'subsection'    => 'ut_global_hero_border_settings',
            'required'      => array(
                'ut_global_hero_fancy_border'   => 'on'
            )
        ),
      
        array(
            'id'            => 'ut_global_hero_fancy_border_size',
            'label'         => 'Size',
            'desc'         	=> '<strong>(optional)</strong> -  include "px" in your string. e.g. 30px (default: 10px)',
            'type'          => 'text',
            'section'       => 'ut_global_hero_settings',
            'subsection'    => 'ut_global_hero_border_settings',
            'required'      => array(
                'ut_global_hero_fancy_border'   => 'on'
            )
        ), 
      
        /*
        |--------------------------------------------------------------------------
        | Global Hero Content Settings
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'            => 'ut_global_hero_expertise_slogan_settings_headline',
            'label'         => 'Global Hero Caption Colors',
            'type'          => 'section_headline',
            'section'       => 'ut_global_hero_settings',
            'subsection'    => 'ut_global_hero_caption_settings',
        ),
      
        array(
            'id'            => 'ut_global_hero_expertise_slogan_color',
            'label'         => 'Hero Caption Slogan Color',
            'desc'          => '<strong>(optional)</strong> - set an alternate color for <strong>Hero Caption Slogan</strong>.',
            'type'          => 'colorpicker',
            'section'       => 'ut_global_hero_settings',
            'subsection'    => 'ut_global_hero_caption_settings',
        ),
      
        array(
            'id'            => 'ut_global_hero_expertise_slogan_background_color',
            'label'         => 'Hero Caption Slogan Background Color',
            'desc'          => '<strong>(optional)</strong> - set an alternate background color for <strong>Hero Caption Slogan</strong>.',
            'type'          => 'colorpicker',
            'section'       => 'ut_global_hero_settings',
            'subsection'    => 'ut_global_hero_caption_settings',
        ), 
      
        array(
            'id'            => 'ut_global_hero_company_slogan_color',
            'label'         => 'Hero Caption Title Color',
            'desc'          => '<strong>(optional)</strong> - set an alternate color for <strong>Hero Caption Title</strong>.',
            'type'          => 'colorpicker',
            'section'       => 'ut_global_hero_settings',
            'subsection'    => 'ut_global_hero_caption_settings',
        ),
      
        array(
            'id'            => 'ut_global_hero_catchphrase_color',
            'label'         => 'Hero Caption Description Color',
            'desc'          => '<strong>(optional)</strong>- set an alternate color for <strong>Hero Caption Description</strong>.',
            'type'          => 'colorpicker',
            'section'       => 'ut_global_hero_settings',
            'subsection'    => 'ut_global_hero_caption_settings',
        ),
        
        array(
            'id'            => 'ut_global_hero_catchphrase_line_color',
            'label'         => 'Hero Caption Description Line Color',
            'desc'          => '<strong>(optional)</strong>- set an alternate color for <strong>Hero Caption Description Line</strong>.',
            'type'          => 'colorpicker',
            'mode'          => 'rgb',
            'section'       => 'ut_global_hero_settings',
            'subsection'    => 'ut_global_hero_caption_settings',
            'required'      => array(
                'ut_global_hero_style'  => 'ut-hero-style-3'
            )
        ),
      
        /*
        |--------------------------------------------------------------------------
        | Global Hero Type
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'          => 'ut_global_hero_type_headline',
            'label'       => 'Global Hero Type',
            'type'        => 'panel_headline',
            'section'     => 'ut_global_hero_settings',
            'subsection'  => 'ut_global_hero_type_settings',
        ),  
      
        array(
            'id'          => 'ut_global_hero_header_type',
            'label'       => 'Choose Hero Type',
            'type'        => 'select',
            'section'     => 'ut_global_hero_settings',
            'subsection'  => 'ut_global_hero_type_settings',
            'choices'     => array( 
                array(
                    'value'       => 'image',
                    'label'       => 'Single Background Image'
                ),
                array(
                    'value'       => 'animatedimage',
                    'label'       => 'Animated Single Background Image'
                ),
                array(
                    'value'       => 'splithero',
                    'label'       => 'Split Hero'
                ),
                array(
                    'value'       => 'slider',
                    'label'       => 'Background Image Slider'
                ),
                array(
                    'value'       => 'transition',
                    'label'       => 'Fancy Image Slider'
                ),
                array(
                    'value'       => 'tabs',
                    'label'       => 'Tablet Slider'
                ),
                array(
                    'value'       => 'video',
                    'label'       => 'Video Header'
                ),
                array(
                    'value'       => 'custom',
                    'label'       => 'Custom Shortcode'
                ),
                array(
                    'value'       => 'dynamic',
                    'label'       => 'Dynamic Hero ( dynamic height )'
                )
            ),
        ),
        
        /*
        |--------------------------------------------------------------------------
        | Blog Layout
        |--------------------------------------------------------------------------
        */
        
        array(
            'id'          => 'ut_blog_layout_setting_headline',
            'label'       => 'Blog Settings',
            'type'        => 'panel_headline',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_layout_setting',
        ),
        
        array(
            'id'          => 'ut_blog_layout',
            'label'       => 'Blog Layout',
            'desc'        => 'Select between 4 nice blog layouts.',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_layout_setting',
            'std'         => 'standard',
            'choices'     => array( 
                array(
                    'value'       => 'classic',
                    'label'       => 'Classic'
                ),
                array(
                    'value'       => 'grid',
                    'label'       => 'Grid'
                ),
                array(
                    'value'       => 'mixed-grid',
                    'label'       => 'Mixed Grid'
                ),
                array(
                    'value'       => 'list-grid',
                    'label'       => 'List'
                ),

            ),
            
        ),
        
        array(
            'id'          => 'ut_blog_elements_border',
            'label'       => 'Blog Element Border Radius',
            'desc'        => 'By default image and a bunch of other elements have a 4px border radius. With the help of this option, you can remove this border.',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_layout_setting',
            'std'         => 'on',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'on'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'off'
                ),

            ),
            
        ),
        
        array(
            'id'          => 'ut_blog_grid_excerpt_length',
            'label'       => 'Blog Grid Excerpt Length',
            'desc'        => 'Desired Excerpt Length in Words. e.g. 20',
            'type'        => 'text',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_layout_setting',
            'required'    => array(
                'ut_blog_layout'      => 'grid'
            )
        ),
        
        array(
            'id'          => 'ut_blog_list_excerpt_length',
            'label'       => 'Blog List Excerpt Length',
            'desc'        => 'Desired Excerpt Length in Words. e.g. 20',
            'type'        => 'text',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_layout_setting',
            'required'    => array(
                'ut_blog_layout'      => 'list'
            )
        ),
        
        array(
            'id'          => 'ut_blog_mixed_grid_excerpt_length',
            'label'       => 'Blog Grid Excerpt Length',
            'desc'        => 'Desired Excerpt Length in Words. e.g. 20',
            'type'        => 'text',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_layout_setting',
            'required'    => array(
                'ut_blog_layout'      => 'mixed-grid'
            )
        ),
                
        /*
        |--------------------------------------------------------------------------
        | Blog Sidebar
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'          => 'ut_blog_sidebar_headline',
            'label'       => 'Sidebar Align',
            'type'        => 'panel_headline',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_sidebar_setting',
        ),
      
        array(
            'id'          => 'ut_sidebar_align',
            'label'       => 'Sidebar Align',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_sidebar_setting',
            'choices'     => array( 
                array(
                    'value'       => 'left',
                    'label'       => 'Left'
                ),
                array(
                    'value'       => 'right',
                    'label'       => 'Right'
                )
            ),
        ),
      
        /*
        |--------------------------------------------------------------------------
        | Blog Paginationm
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'          => 'ut_blog_pagination_headline',
            'label'       => 'Blog Pagination',
            'type'        => 'panel_headline',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_pagination_setting',
        ),
      
        array(
            'id'          => 'ut_blog_pagination_height',
            'label'       => 'Blog Pagination Height',
            'desc'        => 'Drag the handle to set the pagination height. Default: 120',
            'std'         => '120',
            'type'        => 'numeric-slider',
            'min_max_step'=> '0,300,10',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_pagination_setting',        
        ),
        
        array(
            'id'          => 'ut_blog_pagination_background_color',
            'label'       => 'Portfolio Pagination Background Color',
            'type'        => 'colorpicker',
            'desc'        => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_pagination_setting',
        ),
      
        array(
            'id'          => 'ut_blog_pagination_arrow_color',
            'label'       => 'Portfolio Pagination Arrow Color',
            'type'        => 'colorpicker',
            'desc'        => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_pagination_setting',
        ),
      
        array(
            'id'          => 'ut_blog_pagination_arrow_hover_color',
            'label'       => 'Portfolio Pagination Arrow Hover Color',
            'type'        => 'colorpicker',
            'desc'        => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_pagination_setting',
        ),
      
        /*
        |--------------------------------------------------------------------------
        | Portfolio Settings
        |--------------------------------------------------------------------------
        */ 
      
        array(
            'id'          => 'ut_portfolio_content_headline',
            'label'       => 'Single Portfolio',
            'type'        => 'panel_headline',
            'section'     => 'ut_portfolio_settings',
            'subsection'  => 'ut_portfolio_single_settings',
        ),
      
        array(
            'id'          => 'ut_single_portfolio_navigation',
            'label'       => 'Activate Portfolio Navigation?',
            'desc'        => 'A navigation with links to the previous and next portfolio post as well as a link to the page which holds the main portfolio overview. ',
            'type'        => 'select',
            'std'         => 'off',
            'section'     => 'ut_portfolio_settings',
            'subsection'  => 'ut_portfolio_single_settings',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'yes, please!'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'no, thanks!'
                )
            ),
        ),
      
        array(
            'id'          => 'ut_single_portfolio_navigation_height',
            'label'       => 'Portfolio Navigation Height',
            'desc'        => 'Drag the handle to set the portfolio navigation height. Default: 120.',
            'std'         => '120',
            'type'        => 'numeric-slider',
            'min_max_step'=> '0,300,10',
            'section'     => 'ut_portfolio_settings',
            'subsection'  => 'ut_portfolio_single_settings',
            'required'    => array(
                'ut_single_portfolio_navigation'        => 'on'
            )        
        ),
      
        array(
            'id'          => 'ut_single_portfolio_navigation_background_color',
            'label'       => 'Portfolio Navigation Background Color',
            'desc'        => '<strong>(optional)</strong>',
            'type'        => 'colorpicker',
            'section'     => 'ut_portfolio_settings',
            'subsection'  => 'ut_portfolio_single_settings',
            'required'    => array(
                'ut_single_portfolio_navigation'        => 'on'
            ) 
        ),
        
        array(
            'id'          => 'ut_single_portfolio_navigation_arrow_color',
            'label'       => 'Portfolio Navigation Arrow Color',
            'desc'        => '<strong>(optional)</strong>',
            'type'        => 'colorpicker',
            'section'     => 'ut_portfolio_settings',
            'subsection'  => 'ut_portfolio_single_settings',
            'required'    => array(
                'ut_single_portfolio_navigation'        => 'on'
            ) 
        ),
        
        array(
            'id'          => 'ut_single_portfolio_navigation_arrow_hover_color',
            'label'       => 'Portfolio Navigation Arrow Hover Color',
            'desc'        => '<strong>(optional)</strong>',
            'type'        => 'colorpicker',
            'section'     => 'ut_portfolio_settings',
            'subsection'  => 'ut_portfolio_single_settings',
            'required'    => array(
                'ut_single_portfolio_navigation'        => 'on'
            ) 
        ),
        
        array(
            'id'          => 'ut_single_portfolio_back_to_main_color',
            'label'       => 'Main Portfolio Link Color',
            'desc'        => '<strong>(optional)</strong>',
            'type'        => 'colorpicker',
            'section'     => 'ut_portfolio_settings',
            'subsection'  => 'ut_portfolio_single_settings',
        ),
        
        array(
            'id'          => 'ut_single_portfolio_back_to_main_hover_color',
            'label'       => 'Main Portfolio Link Hover Color',
            'desc'        => '<strong>(optional)</strong>',
            'type'        => 'colorpicker',
            'section'     => 'ut_portfolio_settings',
            'subsection'  => 'ut_portfolio_single_settings',
        ),
        
        array(
            'id'          => 'ut_single_portfolio_navigation_main_portfolio_page',
            'label'       => 'Main Portfolio Page',
            'desc'        => 'Select a page where your main showcase is located.',
            'type'        => 'page_select',
            'section'     => 'ut_portfolio_settings',
            'subsection'  => 'ut_portfolio_single_settings',
        ),
      
        /*
        |--------------------------------------------------------------------------
        | Portfolio Settings
        |--------------------------------------------------------------------------
        */ 
      
        array(
            'id'          => 'ut_portfolio_showcase_headline',
            'label'       => 'Packery Showcase Caption',
            'type'        => 'panel_headline',
            'section'     => 'ut_portfolio_settings',
            'subsection'  => 'ut_portfolio_showcase_setting',
        ),
      
        array(
            'id'          => 'ut_portfolio_showcase_icon_type',
            'label'       => 'Showcase Icon',
            'type'        => 'select',
            'section'     => 'ut_portfolio_settings',
            'subsection'  => 'ut_portfolio_showcase_setting',
            'std'         => 'custom',
            'choices'     => array( 
                array(
                    'value'       => 'font',
                    'label'       => 'Font Awesome Icon'
                ),
                array(
                    'value'       => 'custom',
                    'label'       => 'Custom Icon'
                ),              
            ),
        ),
    
        array(
            'id'          => 'ut_portfolio_showcase_custom_icon',
            'label'       => 'Custom Icon',
            'type'        => 'upload',
            'markup'      => '1_1',
            'section'     => 'ut_portfolio_settings',
            'subsection'  => 'ut_portfolio_showcase_setting',
            'required'    => array(
                'ut_portfolio_showcase_icon_type'       => 'custom'
            )
        ),
    
        array(
            'id'          => 'ut_portfolio_showcase_font_icon',
            'label'       => 'Select Fontawesome Icon',
            'type'        => 'iconpicker',
            'markup'      => '1_1',
            'section'     => 'ut_portfolio_settings',
            'subsection'  => 'ut_portfolio_showcase_setting',
            'required'    => array(
                'ut_portfolio_showcase_icon_type'       => 'font'
            )
        ),
            
        /*
        |--------------------------------------------------------------------------
        | Contact Section Content
        |--------------------------------------------------------------------------
        */
        
        array(
            'id'          => 'ut_csection_content_headline',
            'label'       => 'Contact Section Content',
            'type'        => 'panel_headline',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_content_settings',
        ),
      
        array(
            'id'          => 'ut_activate_csection',
            'label'       => 'Activate Contact Section',
            'desc'        => 'You can individually decide if you like to activate or deactivate the contact section per page / portfolio.',
            'type'        => 'checkbox',
            'markup'      => '1_1',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_content_settings',
            'choices'     => array( 
                array(
                    'value'       => 'is_front_page',
                    'label'       => 'Home'
                ),
                array(
                    'value'       => 'is_home',
                    'label'       => 'Blog'
                ),
                array(
                    'value'       => 'is_page',
                    'label'       => 'Single Pages'
                ),
                array(
                    'value'       => 'is_single',
                    'label'       => 'Single Posts'
                ),
                array(
                    'value'       => 'is_singular',
                    'label'       => 'Single Portfolio Pages'
                ),
                array(
                    'value'       => 'is_archive',
                    'label'       => 'Archive'
                ),
                array(
                    'value'       => 'ut_is_search',
                    'label'       => 'Search'
                ),
                array(
                    'value'       => 'is_404',
                    'label'       => '404'
                )
            ),
        ),
      
        array(
            'id'          => 'ut_csection_header_slogan',
            'label'       => 'Contact Header Slogan',
            'type'        => 'textarea-simple',
            'markup'      => '1_1',
            'htmldesc'    => '&lt;span&gt; word &lt;/span&gt; = highlight word in themecolor',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_content_settings',
            'rows'        => '5'
        ),
      
        array(
            'id'          => 'ut_csection_header_expertise_slogan',
            'label'       => 'Contact Header Expertise Slogan',
            'type'        => 'textarea-simple',
            'markup'      => '1_1',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_content_settings',
            'rows'        => '5'
        ),
      
        array(
            'id'          => 'ut_left_csection_content_area',
            'label'       => 'Left Content Area',
            'desc'        => '<p> For example : create a contact form with your desired form generator and insert the shortcode in here. We recommend to make use of Contact Form 7. P.S. This field is also a good place to place a Google map shortcode! Leave empty to hide the complete box. </p>',
            'type'        => 'textarea',
            'markup'      => '1_1',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_content_settings',
            'rows'        => '25'
        ),
      
        array(
            'id'          => 'ut_right_csection_content_area',
            'label'       => 'Right Content Area',
            'desc'        => '<p> For example : create a contact form with your desired form generator and insert the shortcode in here. We recommend to make use of Contact Form 7. P.S. This field is also a good place to place a Google map shortcode! Leave empty to hide the complete box. </p>',
            'type'        => 'textarea',
            'markup'      => '1_1',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_content_settings',
            'rows'        => '25'
        ),
        
        
        /*
        |--------------------------------------------------------------------------
        | Contact Section Header Styling
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'          => 'ut_contact_header_setting_headline',
            'label'       => 'Contact Section Header Style',
            'type'        => 'panel_headline',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_header_settings'
        ),
      
        array(
            'id'          => 'ut_csection_header_style',
            'label'       => 'Header Style',
            'desc'        => '<strong>(optional)</strong> - default : Typography -> Global Header Styles. <a href="#" class="ut-header-preview">Preview Header Styles</a>',
            'type'        => 'select',
            'std'         => 'global',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_header_settings',
            'choices'     => array( 
                array(
                    'label'       => 'Default',
                    'value'       => 'global'
                ),          
                array(
                    'value'       => 'pt-style-1',
                    'label'       => 'Style One'
                ),
                array(
                    'value'       => 'pt-style-2',
                    'label'       => 'Style Two'
                ),
                array(
                    'value'       => 'pt-style-3',
                    'label'       => 'Style Three'
                ),
                array(
                    'value'       => 'pt-style-4',
                    'label'       => 'Style Four'
                ),
                array(
                    'value'       => 'pt-style-5',
                    'label'       => 'Style Five'
                ),              
                array(
                    'value'       => 'pt-style-6',
                    'label'       => 'Style Six'
                ),
                array(
                    'value'       => 'pt-style-7',
                    'label'       => 'Style Seven'
                )
             
            ),
        ),
      
        array(
            'id'          => 'ut_csection_headline_style_2_color',
            'label'       => 'Style Two Decoration Line Color',
            'desc'        => '<strong>(optional)</strong>',
            'type'        => 'colorpicker',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_header_settings',
            'std'         => '#222222',
            'required'    => array(
                'ut_csection_header_style'      => 'pt-style-2'
            )
        ),
      
        array(
            'id'          => 'ut_csection_headline_style_2_height',
            'label'       => 'Style Two Decoration Line Height',
            'desc'        => '<strong>(optional)</strong> - value in px , default: 1px',
            'type'        => 'text',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_header_settings',
        ),
      
        array(
            'id'          => 'ut_csection_headline_style_2_width',
            'label'       => 'Style Two Decoration Line Width',
            'desc'        => '<strong>(optional)</strong> - value in % or px , default: 30px',
            'type'        => 'text',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_header_settings',
        ),
      
        array(
            'id'          => 'ut_csection_title_uppercase',
            'label'       => 'Uppercase',
            'desc'        => 'Display the Contact Section Title in uppercase letters?',
            'type'        => 'radio',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_header_settings',
            'std'          => 'off',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'yes please!'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'no thanks!'
                ),
            )
        ),
        
        array(
            'id'          => 'ut_csection_header_padding_bottom',
            'label'       => 'Header Padding Bottom',
            'desc'        => '<strong>(optional)</strong> - include "px" in your string. e.g. 150px (default: 30px). This option defines the space between header and the following content.',
            'type'        => 'text',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_header_settings'
        ), 
        
        
        /*
        |--------------------------------------------------------------------------
        | Contact Section Background
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'          => 'ut_contact_background_setting_headline',
            'label'       => 'Contact Section Background',
            'type'        => 'panel_headline',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_background_settings'
        ),
      
        array(
            'id'          => 'ut_csection_background_type',
            'label'       => 'Choose Background Type',
            'type'        => 'select',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_background_settings',
            'std'         => 'image',
            'toplevel'    => true,
            'choices'     => array( 
                array(
                    'value'       => 'image',
                    'label'       => 'Image'
                ),
                array(
                    'value'       => 'map',
                    'label'       => 'Google Map'
                ),
                array(
                    'value'       => 'video',
                    'label'       => 'Video'
                )
            ),
        ),
      
        array(
            'id'          => 'ut_csection_video_source',
            'label'       => 'Video Source',
            'type'        => 'select',
            'std'		  => 'youtube',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_background_settings',
            'choices'     => array( 
                array(
                    'value'       => 'youtube',
                    'label'       => 'Youtube'
                ),
                array(
                    'value'       => 'selfhosted',
                    'label'       => 'Selfthosted'
                )
            ),
            'required'  => array(
                'ut_csection_background_type'       => 'video'
            )
        ),
      
        array(
            'id'          => 'ut_csection_video',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_background_settings',        
            'label'       => 'Video URL',
            'desc'        => 'Please insert the url only e.g. http://youtu.be/gvt_YFuZ8LA . Please do not insert the complete embedded code!',
            'type'        => 'text',
            'required'  => array(
                'ut_csection_background_type'       => 'video',
                'ut_csection_video_source'          => 'youtube'
            )
        ),
      
        array(
            'id'          => 'ut_csection_video_mp4',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_background_settings', 
            'label'       => 'MP4',
            'type'        => 'upload',    
            'required'  => array(
                'ut_csection_background_type'       => 'video',
                'ut_csection_video_source'          => 'selfhosted'
            )
        ),
      
        array(
            'id'          => 'ut_csection_video_ogg',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_background_settings', 
            'label'       => 'OGG',
            'type'        => 'upload',
            'required'  => array(
                'ut_csection_background_type'       => 'video',
                'ut_csection_video_source'          => 'selfhosted'
            )    
        ),
      
        array(
            'id'          => 'ut_csection_video_webm',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_background_settings', 
            'label'       => 'WEBM',
            'type'        => 'upload',
            'required'  => array(
                'ut_csection_background_type'       => 'video',
                'ut_csection_video_source'          => 'selfhosted'
            )   
        ),
      
        array(
            'id'          	=> 'ut_csection_video_loop',
            'section'       => 'ut_csection_settings',
            'subsection'    => 'ut_csection_background_settings', 
            'label'       	=> 'Loop Video',
            'type'        	=> 'select',
            'choices'     	=> array(
              
              array(
                'label'       => 'yes, please!',
                'value'       => 'on'
              ),
              array(
                'label'       => 'no, thanks!',
                'value'       => 'off'
              )
              
            ),
            'std'         	=> 'on',
            'required'  => array(
                'ut_csection_background_type'       => 'video'
            )
        ),
      
        array(
            'id'          	=> 'ut_csection_video_preload',
            'section'       => 'ut_csection_settings',
            'subsection'    => 'ut_csection_background_settings', 
            'label'       	=> 'Preload Video',
            'type'        	=> 'select',
            'choices'     	=> array(
              
              array(
                'label'       => 'yes, please!',
                'value'       => 'on'
              ),
              array(
                'label'       => 'no, thanks!',
                'value'       => 'off'
              )
              
            ),
            'std'         	=> 'on',
            'required'  => array(
                'ut_csection_background_type'       => 'video',
                'ut_csection_video_source'          => 'selfhosted'
            )
        ),
      
        array(
            'id'          => 'ut_csection_video_sound',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_background_settings', 
            'label'       => 'Activate video sound after page is loaded?',
            'desc'        => '<strong>(optional)</strong>. Play sound directly when page is loaded.',
            'std'         => 'off',
            'type'        => 'select',
            'choices'     => array( 
              array(
                'value'       => 'on',
                'label'       => 'yes, please!'
              ),
              array(
                'value'       => 'off',
                'label'       => 'no, thanks!'
              )
            ),
            'required'  => array(
                'ut_csection_background_type'       => 'video'
            )
        ),
        
        array(
            'id'            => 'ut_csection_video_volume',
            'section'       => 'ut_csection_settings',
            'subsection'    => 'ut_csection_background_settings', 
            'label'         => 'Video Volume',
            'desc'          => 'Drag the handle to set the video volume. Default: 5.',
            'std'           => '5',
            'type'          => 'numeric-slider',
            'min_max_step'  => '0,100,1',
            'required'      => array(
                'ut_csection_background_type'       => 'video'
            )
        ),
      
        array(
            'id'          	=> 'ut_csection_video_mute_button',
            'section'       => 'ut_csection_settings',
            'subsection'    => 'ut_csection_background_settings', 
            'label'       	=> 'Show Mute Button?',
            'desc'          => 'whether the video mute button is displayed or not.',
            'type'        	=> 'select',
            'choices'     	=> array(          
                array(
                    'label'       => 'yes, please!',
                    'value'       => 'on'
                ),
                array(
                    'label'       => 'no, thanks!',
                    'value'       => 'off'
                )          
            ),
            'std'         	=> 'off',
            'required'  => array(
                'ut_csection_background_type'       => 'video'
            )
        ),
      
        array(
            'id'          => 'ut_csection_video_poster',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_background_settings', 
            'label'       => 'Poster Image',
            'desc'        => 'This image will be displayed instead of the video on mobile devices.',
            'type'        => 'upload',    
            'markup'      => '1_1',
            'required'  => array(
                'ut_csection_background_type'       => 'video'
            )
        ),
      
        array(
            'id'          => 'ut_csection_background_image',
            'label'       => 'Contact Section Background Image',
            'desc'        => 'Keep in mind, that you are not able to set a background position or attachment if the parallax option for this section has been set to "on".',
            'type'        => 'background',
            'markup'      => '1_1',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_background_settings',
            'required'  => array(
                'ut_csection_background_type'       => 'image'
            )
        ),
        
        array(
            'id'          => 'ut_csection_parallax',
            'label'       => 'Activate Parallax',
            'desc'        => 'Parallax involves the background moving at a slower rate to the foreground, creating a 3D effect as you scroll down the page.',
            'std'         => 'off',
            'type'        => 'select',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_background_settings',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'On'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'Off'
                )
            ),
            'required'  => array(
                'ut_csection_background_type'       => 'image'
            )
        ),
        
        array(
            'id'          => 'ut_csection_map',
            'label'       => 'Google Map Shortcode',
            'desc'        => 'We recommend to use the Maps Marker plugin to display maps! Placing a shortcode will overwrite the background image. Also keep in mind, that activating the parallax effect does not work with maps.',
            'type'        => 'text',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_background_settings',
            'required'  => array(
                'ut_csection_background_type'       => 'map'
            )
        ),
        
        
        /*
        |--------------------------------------------------------------------------
        | Contact Section Overlay
        |--------------------------------------------------------------------------
        */
        
        array(
            'id'          => 'ut_contact_overlay_setting_headline',
            'label'       => 'Contact Section Overlay',
            'type'        => 'panel_headline',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_overlay_settings',
            'required'      => array(
                'ut_csection_background_type'       => 'image|video'
            )
        ),
      
        array(
            'id'          => 'ut_csection_overlay',
            'label'       => 'Overlay',
            'desc'        => '<strong>(optional)</strong> A smooth overlay with optional design patterns.',
            'type'        => 'select',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_overlay_settings',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'On'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'Off'
                )
            ),
            'required'      => array(
                'ut_csection_background_type'       => 'image|video'
            )
        ),
        
        array(
            'id'          => 'ut_csection_overlay_color',
            'label'       => 'Overlay Color',
            'desc'        => '<strong>(optional)</strong>',
            'type'        => 'colorpicker',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_overlay_settings',
            'required'      => array(
                'ut_csection_overlay'               => 'on',
                'ut_csection_background_type'       => 'image|video'
            )
        ),
      
        array(
            'id'          => 'ut_csection_overlay_opacity',
            'label'       => 'Overlay Color Opacity',
            'desc'        => 'Drag the handle to set the overlay opacity.',
            'std'         => '0.8',
            'type'        => 'numeric-slider',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_overlay_settings',
            'min_max_step'=> '0,1,0.1',
            'required'      => array(
                'ut_csection_overlay'               => 'on',
                'ut_csection_background_type'       => 'image|video'
            )
        ),
        
        array(
            'id'          => 'ut_csection_overlay_pattern',
            'label'       => 'Overlay Pattern',
            'desc'        => 'Add overlay design pattern.',
            'type'        => 'select',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_overlay_settings',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'On'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'Off'
                )
            ),
            'required'      => array(
                'ut_csection_overlay'               => 'on',
                'ut_csection_background_type'       => 'image|video'
            )
        ),
      
        array(
            'id'          => 'ut_csection_overlay_pattern_style',
            'label'       => 'Overlay Pattern Style',
            'desc'        => '<strong>(optional)</strong>',
            'type'        => 'select',
            'std'         => 'style_one',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_overlay_settings',
            'choices'     => array( 
                array(
                    'value'       => 'style_one',
                    'label'       => 'Style One'
                ),
                array(
                    'value'       => 'style_two',
                    'label'       => 'Style Two'
                )
            ),
            'required'      => array(
                'ut_csection_overlay'               => 'on',
                'ut_csection_overlay_pattern'       => 'on',
                'ut_csection_background_type'       => 'image|video'
            )
        ),
        
        /*
        |--------------------------------------------------------------------------
        | Contact Section Border Settings 
        |--------------------------------------------------------------------------
        */
        
        array(
            'id'          => 'ut_csection_border_setting_headline',
            'label'       => 'Contact Section Border Settings',
            'type'        => 'panel_headline',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_border_settings'
        ),
        
        array(
            'id'          => 'ut_activate_csection_border',
            'label'       => 'Activate Border at Top?',
            'type'        => 'select',
            'std'         => 'off',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_border_settings',
            'choices'     => array(              
                array(
                    'label'       => 'yes, please!',
                    'value'       => 'on'
                ),
                array(
                    'label'       => 'no, thanks!',
                    'value'       => 'off'
                )              
            ),
        ),
        
        array(
            'id'          	=> 'ut_csection_border_color',
            'label'       	=> 'Border Top Color',
            'type'        	=> 'colorpicker',
            'desc'       	=> '<strong>(optional)</strong>',
            'section'       => 'ut_csection_settings',
            'subsection'    => 'ut_csection_border_settings',
            'required'      => array(
                'ut_activate_csection_border'       => 'on'
            )
        ),    
      
        array(
            'id'            => 'ut_csection_border_width',
            'label'         => 'Border Top Width',
            'desc'          => 'Drag the handle to set the border width.',
            'type'          => 'numeric-slider',
            'min_max_step'  => '1,100',
            'section'       => 'ut_csection_settings',
            'subsection'    => 'ut_csection_border_settings',
            'required'      => array(
                'ut_activate_csection_border'       => 'on'
            )
        ),
      
        array(
            'id'            => 'ut_csection_border_style',
            'label'         => 'Border Top Style',
            'desc'          => 'Creates a border at the bottom of the hero.',
            'type'          => 'select',
            'std'         	=> 'solid',
            'section'       => 'ut_csection_settings',
            'subsection'    => 'ut_csection_border_settings',            
            'choices'       => array(
                array(
                    'label'     => 'dashed',
                    'value'     => 'dashed'
                ),
                array(
                    'label'     => 'dotted',
                    'value'     => 'dotted'
                ),
                array(
                    'label'     => 'solid',
                    'value'     => 'solid'
                ),
                array(
                    'label'     => 'double',
                    'value'     => 'double'
                )
            ),
            'required'      => array(
                'ut_activate_csection_border'       => 'on'
            )
        ),
        
        array(
            'id'          => 'ut_csection_hero_fancy_border_setting_headline',
            'label'       => 'Fancy Border Settings',
            'desc'        => 'Hero Fancy Border',
            'type'        => 'section_headline',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_border_settings'
        ),            
            
        array(
            'id'          => 'ut_csection_fancy_border',
            'label'       => 'Activate Fancy Border?',
            'desc'        => 'Allows you to create a nice fancy border at the bottom of your contact section area.',
            'type'        => 'select',
            'choices'     => array(              
                array(
                    'label'       => 'yes, please!',
                    'value'       => 'on'
                ),
                array(
                    'label'       => 'no, thanks!',
                    'value'       => 'off'
                )              
            ),
            'std'         	=> 'off',
            'section'       => 'ut_csection_settings',
            'subsection'    => 'ut_csection_border_settings'
        ),      
        
        array(
            'id'          	=> 'ut_csection_fancy_border_color',
            'label'       	=> 'Primary Color',
            'type'        	=> 'colorpicker',
            'desc'       	=> '<strong>(optional)</strong>',
            'section'       => 'ut_csection_settings',
            'subsection'    => 'ut_csection_border_settings',
            'required'      => array(
                'ut_csection_fancy_border'      => 'on'
            )
        ),   
           
        array(
            'id'          	=> 'ut_csection_fancy_border_background_color',
            'label'       	=> 'Secondary Color',
            'type'        	=> 'colorpicker',
            'desc'       	=> '<strong>(optional)</strong>',
            'section'       => 'ut_csection_settings',
            'subsection'    => 'ut_csection_border_settings',
            'required'      => array(
                'ut_csection_fancy_border'      => 'on'
            )
        ),
        
        array(
            'id'            => 'ut_csection_fancy_border_size',
            'label'         => 'Size',
            'desc'         	=> '<strong>(optional)</strong> -  include "px" in your string. e.g. 30px (default: 10px)',
            'type'          => 'text',
            'section'       => 'ut_csection_settings',
            'subsection'    => 'ut_csection_border_settings',
            'required'      => array(
                'ut_csection_fancy_border'      => 'on'
            )
        ), 
        
        
        /*
        |--------------------------------------------------------------------------
        | Contact Section Spacing
        |--------------------------------------------------------------------------
        */
           
        array(
            'id'          => 'ut_contact_padding_setting_headline',
            'label'       => 'Contact Section Padding',
            'desc'        => 'Contact Section Padding',
            'type'        => 'section_headline',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_spacing_settings'
        ),
      
        array(
            'id'          => 'ut_csection_padding_top',
            'label'       => 'Contact Section Padding Top',
            'desc'        => '<strong>(optional)</strong> - default 80px',
            'type'        => 'text',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_spacing_settings'
        ),
      
        array(
            'id'          => 'ut_csection_padding_bottom',
            'label'       => 'Contact Section Padding Bottom',
            'desc'        => '<strong>(optional)</strong> - default 40px',
            'type'        => 'text',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_spacing_settings'
        ),    
                
        /*
        |--------------------------------------------------------------------------
        | Contact Section Color Settings
        |--------------------------------------------------------------------------
        */
        
        array(
            'id'          => 'ut_csection_color_setting_headline',
            'label'       => 'Contact Section Color Settings',
            'type'        => 'panel_headline',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_color_settings'
        ),
        
        array(
            'id'          => 'ut_csection_skin',
            'label'       => 'Section Color Skin',
            'desc'        => 'If you are planing to use light background images or colors use the dark skin and the other way around. If these skins do not match your requirements, you can define your own colors beneath. The Dark skin has been made fir pure white background in this case.',
            'type'        => 'select',
            'std'         => 'dark',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_color_settings',
            'choices'     => array(
                array(
                    'label'     => 'Light',
                    'value'     => 'light'
                ),
                array(
                    'label'     => 'Dark',
                    'value'     => 'dark'
                )
            ),
        ),
      
        array(
            'id'          => 'ut_csection_header_slogan_color',
            'label'       => 'Section Title Color',
            'desc'        => '<strong>(optional)</strong>',
            'type'        => 'colorpicker',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_color_settings'
        ),
      
        array(
            'id'          => 'ut_csection_header_expertise_slogan_color',
            'label'       => 'Section Slogan Color',
            'desc'        => '<strong>(optional)</strong>',
            'type'        => 'colorpicker',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_color_settings'
        ),
      
        array(
            'id'          => 'ut_csection_background_color',
            'label'       => 'Section Background Color',
            'desc'        => '<strong>(optional)</strong>',
            'type'        => 'colorpicker',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_color_settings'
        ),
      
        array(
            'id'          => 'ut_left_csection_content_area_color',
            'label'       => 'Left Content Area Background Color',
            'desc'        => '<strong>(optional)</strong>',
            'type'        => 'colorpicker',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_color_settings'
        ),
      
        array(
            'id'          => 'ut_left_csection_content_area_opacity',
            'label'       => 'Left Content Area Background Color Opacity',
            'desc'        => 'Drag the handle to set the opacity.',
            'std'         => '0.8',
            'type'        => 'numeric-slider',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_color_settings',
            'min_max_step'=> '0,1,0.1'
        ),
      
        array(
            'id'          => 'ut_right_csection_content_area_color',
            'label'       => 'Right Content Area Background Color',
            'desc'        => '<strong>(optional)</strong>',
            'type'        => 'colorpicker',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_color_settings',
        ),
      
        array(
            'id'          => 'ut_right_csection_content_area_opacity',
            'label'       => 'Right Content Area Background Color Opacity',
            'desc'        => 'Drag the handle to set the opacity.',
            'std'         => '0.8',
            'type'        => 'numeric-slider',
            'section'     => 'ut_csection_settings',
            'subsection'  => 'ut_csection_color_settings',
            'min_max_step'=> '0,1,0.1'
        ),
      
            /*
            |--------------------------------------------------------------------------
            | Advanced Settings
            |--------------------------------------------------------------------------
            */
          
            /*
            | Section Animation
            */
            
            array(
                'id'          => 'ut_sanimation_setting_headline',
                'label'       => 'Section Animation',
                'type'        => 'panel_headline',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_sanimation_settings',
            ),
          
            array(
                'id'          => 'ut_scrollto_effect',
                'label'       => 'Scroll to Section Effect',
                'desc'        => 'This option will activate / deactivate the section scroll animation.',
                'type'        => 'easing',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_sanimation_settings',
                'std'         => 'easeInOutExpo'
            ),
          
            array(
                'id'          => 'ut_scrollto_speed',
                'label'       => 'Scroll to Section Effect Speed',
                'desc'        => '<strong>(optional)</strong> - value in ms , default: 650',
                'type'        => 'text',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_sanimation_settings',
            ),
          
            array(
                'id'          => 'ut_smooth_scroll',
                'label'       => 'Activate Smooth Scroll in Chrome',
                'desc'        => 'This option will activate / deactivate smooth scrolling for chrome, other browser are not affected. Smooth scrolling is only available for Chrome.',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_sanimation_settings',
                'std'         => 'on',
                'choices'     => array( 
                    array(
                        'value'       => 'on',
                        'label'       => 'On'
                    ),
                    array(
                        'value'       => 'off',
                        'label'       => 'Off'
                    )
                ),
            ),
            
            /*
            | Maintenace Mode
            */
            
            array(
                'id'          => 'ut_maintenace_mode_settings_headline',
                'label'       => 'Maintenance Mode',
                'type'        => 'panel_headline',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_maintenace_mode_settings',
            ),
            
            array(
                'id'          => 'ut_maintenace_mode',
                'label'       => 'Activate Maintenance Mode',
                'desc'        => 'This option will activate a maintenace mode for your website.',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_maintenace_mode_settings',
                'std'         => 'off',
                'choices'     => array( 
                    array(
                        'value'       => 'on',
                        'label'       => 'On'
                    ),
                    array(
                        'value'       => 'off',
                        'label'       => 'Off'
                    )
                ),
            ),
            
            array(
                'id'          => 'ut_archive_hero_background_color',
                'label'       => 'Hero Background Color',
                'desc'        => '<strong>(optional)</strong>',
                'type'        => 'colorpicker',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_maintenace_mode_settings',
            ),
            
            array(
                'id'          => 'ut_maintenance_hero_background_image',
                'label'       => 'Hero Background Image',
                'desc'        => 'Keep in mind, that you are not able to set a background position or attachment if the parallax option for this section has been set to "on".',
                'type'        => 'background',
                'markup'      => '1_1',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_maintenace_mode_settings'
            ),
            
            array(
                'id'          => 'ut_maintenance_hero_overlay',
                'label'       => 'Activate Hero Overlay?',
                'desc'        => '<strong>(optional)</strong>',
                'std'         => 'on',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_maintenace_mode_settings',
                'choices'     => array( 
                    array(
                        'value'       => 'on',
                        'label'       => 'yes, please!',
                    ),
                    array(
                        'value'       => 'off',
                        'label'       => 'no, thanks!'
                    )
                ) /* end choices */
            ),
          
            array(
                'id'          => 'ut_maintenance_hero_overlay_color',
                'label'       => 'Hero Overlay Color',
                'desc'        => '<strong>(optional)</strong>',
                'type'        => 'colorpicker',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_maintenace_mode_settings',
                'required'    => array(
                    'ut_maintenance_hero_overlay'    => 'on'
                )
            ),
          
            array(
                'id'          => 'ut_maintenance_hero_overlay_color_opacity',
                'label'       => 'Hero Overlay Color Opacity',
                'desc'        => 'Drag the handle to set the opacity.',
                'type'        => 'numeric-slider',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_maintenace_mode_settings',
                'min_max_step'=> '0,1,0.1',
                'required'    => array(
                    'ut_maintenance_hero_overlay'    => 'on'
                )
            ),  
          
            array(
                'id'          => 'ut_maintenance_hero_overlay_pattern',
                'label'       => 'Activate Hero Overlay Pattern?',
                'desc'        => '<strong>(optional)</strong>',
                'std'         => 'on',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_maintenace_mode_settings',
                'choices'     => array( 
                    array(
                        'value'       => 'on',
                        'label'       => 'yes, please!'
                    ),
                    array(
                        'value'       => 'off',
                        'label'       => 'no, thanks!'
                    )
                ),
                'required'    => array(
                    'ut_maintenance_hero_overlay'    => 'on'
                )
            ),
          
            array(
                'id'          => 'ut_maintenance_hero_overlay_pattern_style',
                'label'       => 'Hero Overlay Pattern Style',
                'desc'        => '<strong>(optional)</strong>',
                'std'         => 'style_one',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_maintenace_mode_settings',
                'choices'     => array( 
                    array(
                        'value'       => 'style_one',
                        'label'       => 'Style One'
                    ),
                    array(
                        'value'       => 'style_two',
                        'label'       => 'Style Two'
                    )
                ),
                'required'    => array(
                    'ut_maintenance_hero_overlay'            => 'on',
                    'ut_maintenance_hero_overlay_pattern'    => 'on'
                )
            ),
            
            
            
            
            
            
            
              
            /*
            | Pre Loader
            */
          
            array(
                'id'          => 'ut_loader_setting_headline',
                'label'       => 'Manage Preloader',
                'type'        => 'panel_headline',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_loader_settings',
            ),
          
            array(
                'id'          => 'ut_use_image_loader',
                'label'       => 'Use Image Preloader',
                'desc'        => 'This option will activate a JavaScript based preloader.',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_loader_settings',
                'choices'     => array( 
                    array(
                        'value'       => 'on',
                        'label'       => 'On'
                    ),
                    array(
                        'value'       => 'off',
                        'label'       => 'Off'
                    )
                ),
            ),
          
            array(
                'id'          => 'ut_use_image_loader_on',
                'label'       => 'Preloader Exceptions',
                'desc'        => 'Activate theme image preloader for the following type of pages.',
                'type'        => 'checkbox',
                'markup'      => '1_1',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_loader_settings',
                'choices'     => array( 
                    array(
                        'value'       => 'is_front_page',
                        'label'       => 'Home'
                    ),
                    array(
                        'value'       => 'is_home',
                        'label'       => 'Blog'
                    ),
                    array(
                        'value'       => 'is_page',
                        'label'       => 'Single Pages'
                    ),
                    array(
                        'value'       => 'is_single',
                        'label'       => 'Single Posts'
                    ),
                    array(
                        'value'       => 'is_singular',
                        'label'       => 'Single Portfolio Pages'
                    )
                ),
            ),
          
            array(
                'id'          => 'ut_image_loader_style_headline',
                'label'       => 'Select Preloader Style',
                'type'        => 'section_headline',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_loader_settings'
            ),
          
            array(
                'id'          => 'ut_image_loader_style',
                'label'       => 'Preloader Style',
                'desc'        => 'Choose between 6 awesome preloader styles.',
                'type'        => 'select',
                'std'         => 'style_one',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_loader_settings',
                'choices'     => array( 
                    array(
                        'value'       => 'style_one',
                        'label'       => 'Style One'
                    ),
                    array(
                        'value'       => 'style_two',
                        'label'       => 'Style Two'
                    ),
                    array(
                        'value'       => 'style_three',
                        'label'       => 'Style Three'
                    ),
                    array(
                        'value'       => 'style_four',
                        'label'       => 'Style Four'
                    ),
                    array(
                        'value'       => 'style_five',
                        'label'       => 'Style Five'
                    ),
                    array(
                        'value'       => 'style_six',
                        'label'       => 'Style Six'
                    )
                ),
    
            ),
          
            array(
                'id'          => 'ut_show_loader_bar',
                'label'       => 'Display Loader Bar',
                'desc'        => 'A visual indicator for the loading progress.',
                'std'         => 'on',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_loader_settings',
                'choices'     => array( 
                    array(
                        'value'       => 'on',
                        'label'       => 'On'
                    ),
                    array(
                        'value'       => 'off',
                        'label'       => 'Off'
                    )
                ),
                'required'      => array(
                    'ut_image_loader_style' => 'style_one'
                )
            ),
          
            array(
                'id'          => 'ut_image_loader_barheight',
                'label'       => 'Bar Height',    
                'desc'        => 'Drag the handle to set the desired bar height.',
                'type'        => 'numeric-slider',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_loader_settings',
                'min_max_step'=> '1,100,1',
                'required'    => array(
                    'ut_image_loader_style' => 'style_one',
                    'ut_show_loader_bar'    => 'on'
                )
            ),        
          
            array(
                'id'          => 'ut_show_loader_percentage',
                'label'       => 'Display Loader Percentage',
                'desc'        => 'A visual numeric indicator for the loading progress.',
                'std'         => 'on',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_loader_settings',
                'choices'     => array( 
                    array(
                        'value'       => 'on',
                        'label'       => 'On'
                    ),
                    array(
                        'value'       => 'off',
                        'label'       => 'Off'
                    )
                ),
                'required'      => array(
                    'ut_image_loader_style' => 'style_one'
                )            
            ),
          
            array(
                'id'          => 'ut_image_loader_logo_headline',
                'label'       => 'Upload Preloader Logo',
                'desc'        => 'Upload Preloader Logo',
                'type'        => 'section_headline',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_loader_settings'
            ),
          
            array(
                'id'           => 'ut_image_loader_logo',
                'label'        => 'Logo',
                'desc'         => 'A custom logo for theme preloader.',
                'type'         => 'upload',
                'markup'       => '1_1',
                'section'      => 'ut_advanced_settings',
                'subsection'   => 'ut_loader_settings'
            ),
                
            array(
                'id'          => 'ut_image_loader_logo_max_width',
                'label'       => 'Logo Max Width',
                'desc'        => 'Drag the handle to set the maximum width.',
                'type'        => 'numeric-slider',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_loader_settings',
                'min_max_step'=> '50,720,10'
            ),
          
            array(
                'id'          => 'ut_image_loader_color_headline',
                'label'       => 'Preloader Color Settings',
                'desc'        => 'Preloader Color Settings',
                'type'        => 'section_headline',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_loader_settings'
            ),
          
            array(
                'id'          => 'ut_image_loader_background',
                'label'       => 'Preloader Backgroundcolor',
                'desc'        => '<strong>(optional)</strong>',
                'type'        => 'colorpicker',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_loader_settings',
            ),
          
            array(
                'id'          => 'ut_image_loader_bar_color',
                'label'       => 'Preloader Indicator Color',
                'desc'        => '<strong>(optional)</strong> - default: accentcolor. Color for the element which visually indicates the loading. If you leave this field empty, the system will use the accentcolor which has been defined inside the theme customizer.',
                'type'        => 'colorpicker',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_loader_settings',
            ),
          
            array(
                'id'          => 'ut_image_loader_font_headline',
                'label'       => 'Preloader Loading Text Font Settings',
                'desc'        => 'Preloader Loading Text Font Settings',
                'type'        => 'section_headline',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_loader_settings',
                'required'    => array(
                    'ut_image_loader_style' => 'style_two|style_three|style_four|style_five'
                ) 
            ),
          
            array(
                'id'          => 'ut_image_loader_text',
                'label'       => 'Preloader Loading Text',
                'desc'        => '<strong>(optional)</strong> - default: "Loading".',
                'type'        => 'text',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_loader_settings',
                'required'    => array(
                    'ut_image_loader_style' => 'style_two|style_three|style_four|style_five'
                ) 
            ),
          
            array(
                'id'          => 'ut_image_loader_text_color',
                'label'       => 'Preloader Loading Text Color',
                'desc'        => '<strong>(optional)</strong>',
                'type'        => 'colorpicker',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_loader_settings',
                'required'    => array(
                    'ut_image_loader_style' => 'style_two|style_three|style_four|style_five'
                ) 
            ),
          
            array(
                'id'          => 'ut_image_loader_font',
                'label'       => 'Preloader Loading Text Font',
                'type'        => 'typography',
                'markup'      => '1_1',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_loader_settings',
                'required'    => array(
                    'ut_image_loader_style' => 'style_two|style_three|style_four|style_five'
                ) 
            ),
          
            array(
                'id'          => 'ut_image_loader_text_margin_top',
                'label'       => 'Preloader Loading Text Spacing Top',    
                'desc'        => 'Drag the handle to set the top spacing value.',
                'type'        => 'numeric-slider',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_loader_settings',
                'std'         => 20,
                'min_max_step'=> '1,100,1'
            ),
          
            array(
                'id'          => 'ut_image_loader_percentage_font_headline',
                'label'       => 'Preloader Percentage Font Settings',
                'desc'        => 'Preloader Percentage Font Settings',
                'type'        => 'section_headline',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_loader_settings',
                'required'    => array(
                    'ut_image_loader_style' => 'style_one'
                ) 
            ),
          
            array(
                'id'          => 'ut_image_loader_color',
                'label'       => 'Preloader Percentage Color',
                'desc'        => '<strong>(optional)</strong>',
                'type'        => 'colorpicker',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_loader_settings',
                'required'    => array(
                    'ut_image_loader_style' => 'style_one'
                ) 
            ),
          
            array(
                'id'          => 'ut_image_loader_percentage_font',
                'label'       => 'Preloader Percentage Text Font',
                'type'        => 'typography',
                'markup'      => '1_1',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_loader_settings',
                'required'    => array(
                    'ut_image_loader_style' => 'style_one'
                ) 
            ),
      
            /*
            | System Pages
            */
          
            array(
                'id'          => 'ut_search_setting_headline',
                'label'       => 'Search',
                'type'        => 'panel_headline',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_search_settings',
            ),
            
            array(
                'id'          => 'ut_search_hero_background_color',
                'label'       => 'Hero Background Color',
                'desc'        => '<strong>(optional)</strong>',
                'type'        => 'colorpicker',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_search_settings',
            ),
            
            array(
                'id'          => 'ut_search_hero_parallax',
                'label'       => 'Activate Parallax',
                'desc'        => 'Parallax involves the background moving at a slower rate to the foreground, creating a 3D effect as you scroll down the page.',
                'std'         => 'off',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_search_settings',
                'choices'     => array( 
                    array(
                        'value'       => 'on',
                        'label'       => 'On'
                    ),
                    array(
                        'value'       => 'off',
                        'label'       => 'Off'
                    )
                )
                
            ),
            
            array(
                'id'          => 'ut_search_hero_background_image',
                'label'       => 'Hero Background Image',
                'desc'        => 'Keep in mind, that you are not able to set a background position or attachment if the parallax option for this section has been set to "on".',
                'type'        => 'background',
                'markup'      => '1_1',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_search_settings'
            ),
            
            array(
                'id'          => 'ut_search_hero_overlay',
                'label'       => 'Activate Hero Overlay?',
                'desc'        => '<strong>(optional)</strong>',
                'std'         => 'on',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_search_settings',
                'choices'     => array( 
                    array(
                        'value'       => 'on',
                        'label'       => 'yes, please!',
                    ),
                    array(
                        'value'       => 'off',
                        'label'       => 'no, thanks!'
                    )
                ) /* end choices */
            ),
          
            array(
                'id'          => 'ut_search_hero_overlay_color',
                'label'       => 'Hero Overlay Color',
                'desc'        => '<strong>(optional)</strong>',
                'type'        => 'colorpicker',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_search_settings',
                'required'    => array(
                    'ut_search_hero_overlay'    => 'on'
                )
            ),
          
            array(
                'id'          => 'ut_search_hero_overlay_color_opacity',
                'label'       => 'Hero Overlay Color Opacity',
                'desc'        => 'Drag the handle to set the opacity.',
                'type'        => 'numeric-slider',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_search_settings',
                'min_max_step'=> '0,1,0.1',
                'required'    => array(
                    'ut_search_hero_overlay'    => 'on'
                )
            ),  
          
            array(
                'id'          => 'ut_search_hero_overlay_pattern',
                'label'       => 'Activate Hero Overlay Pattern?',
                'desc'        => '<strong>(optional)</strong>',
                'std'         => 'on',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_search_settings',
                'choices'     => array( 
                    array(
                        'value'       => 'on',
                        'label'       => 'yes, please!'
                    ),
                    array(
                        'value'       => 'off',
                        'label'       => 'no, thanks!'
                    )
                ),
                'required'    => array(
                    'ut_search_hero_overlay'    => 'on'
                )
            ),
          
            array(
                'id'          => 'ut_search_hero_overlay_pattern_style',
                'label'       => 'Hero Overlay Pattern Style',
                'desc'        => '<strong>(optional)</strong>',
                'std'         => 'style_one',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_search_settings',
                'choices'     => array( 
                    array(
                        'value'       => 'style_one',
                        'label'       => 'Style One'
                    ),
                    array(
                        'value'       => 'style_two',
                        'label'       => 'Style Two'
                    )
                ),
                'required'    => array(
                    'ut_search_hero_overlay'            => 'on',
                    'ut_search_hero_overlay_pattern'    => 'on'
                )
            ),
    
            array(
                'id'          => 'ut_search_hero_down_arrow_settings_headline',
                'label'       => 'Scroll Down Arrow',
                'type'        => 'section_headline',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_search_settings',
            ),
    
            array(
                'id'          => 'ut_search_hero_down_arrow_scroll_position',
                'label'       => 'Scroll Down Arrow Horizontal Position',
                'desc'        => 'Drag the handle to set your desired horizontal position.',
                'type'        => 'numeric_slider',
                'std'         => '50',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_search_settings',
            ),
          
            array(
                'id'          => 'ut_search_hero_down_arrow_scroll_position_vertical',
                'label'       => 'Scroll Down Arrow Vertical Position',
                'desc'        => 'Drag the handle to set your desired vertical position.',
                'type'        => 'numeric_slider',
                'std'         => '80',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_search_settings',
            ),      
          
            array(
                'id'          => 'ut_search_hero_down_arrow_color',
                'label'       => 'Scroll Down Arrow Color',
                'desc'        => '<strong>(optional)</strong> - choose an alternative for <strong>Scroll Down Arrow</strong>.',
                'type'        => 'colorpicker',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_search_settings',
            ),
        
            /* 404 */
            
            array(
                'id'          => 'ut_404_setting_headline',
                'label'       => '404',
                'type'        => 'panel_headline',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_404_settings',
            ),
            
            array(
                'id'          => 'ut_404_hero_background_color',
                'label'       => 'Hero Background Color',
                'desc'        => '<strong>(optional)</strong>',
                'type'        => 'colorpicker',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_404_settings',
            ),
            
            array(
                'id'          => 'ut_404_hero_parallax',
                'label'       => 'Activate Parallax',
                'desc'        => 'Parallax involves the background moving at a slower rate to the foreground, creating a 3D effect as you scroll down the page.',
                'std'         => 'off',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_404_settings',
                'choices'     => array( 
                    array(
                        'value'       => 'on',
                        'label'       => 'On'
                    ),
                    array(
                        'value'       => 'off',
                        'label'       => 'Off'
                    )
                )
                
            ),
            
            array(
                'id'          => 'ut_404_hero_background_image',
                'label'       => 'Hero Background Image',
                'desc'        => 'Keep in mind, that you are not able to set a background position or attachment if the parallax option for this section has been set to "on".',
                'type'        => 'background',
                'markup'      => '1_1',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_404_settings'
            ),
            
            array(
                'id'          => 'ut_404_hero_overlay',
                'label'       => 'Activate Hero Overlay?',
                'desc'        => '<strong>(optional)</strong>',
                'std'         => 'on',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_404_settings',
                'choices'     => array( 
                    array(
                        'value'       => 'on',
                        'label'       => 'yes, please!',
                    ),
                    array(
                        'value'       => 'off',
                        'label'       => 'no, thanks!'
                    )
                ) /* end choices */
            ),
      
            array(
                'id'          => 'ut_404_hero_overlay_color',
                'label'       => 'Hero Overlay Color',
                'desc'        => '<strong>(optional)</strong>',
                'type'        => 'colorpicker',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_404_settings',
                'required'    => array(
                    'ut_404_hero_overlay'    => 'on'
                )
            ),
          
            array(
                'id'          => 'ut_404_hero_overlay_color_opacity',
                'label'       => 'Hero Overlay Color Opacity',
                'desc'        => 'Drag the handle to set the opacity.',
                'type'        => 'numeric-slider',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_404_settings',
                'min_max_step'=> '0,1,0.1',
                'required'    => array(
                    'ut_404_hero_overlay'    => 'on'
                )
            ),  
          
            array(
                'id'          => 'ut_404_hero_overlay_pattern',
                'label'       => 'Activate Hero Overlay Pattern?',
                'desc'        => '<strong>(optional)</strong>',
                'std'         => 'on',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_404_settings',
                'choices'     => array( 
                    array(
                        'value'       => 'on',
                        'label'       => 'yes, please!'
                    ),
                    array(
                        'value'       => 'off',
                        'label'       => 'no, thanks!'
                    )
                ),
                'required'    => array(
                    'ut_404_hero_overlay'    => 'on'
                )
            ),
          
            array(
                'id'          => 'ut_404_hero_overlay_pattern_style',
                'label'       => 'Hero Overlay Pattern Style',
                'desc'        => '<strong>(optional)</strong>',
                'std'         => 'style_one',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_404_settings',
                'choices'     => array( 
                    array(
                        'value'       => 'style_one',
                        'label'       => 'Style One'
                    ),
                    array(
                        'value'       => 'style_two',
                        'label'       => 'Style Two'
                    )
                ),
                'required'    => array(
                    'ut_404_hero_overlay'            => 'on',
                    'ut_404_hero_overlay_pattern'    => 'on'
                )
            ),
        
            /* Archive */
            
            array(
                'id'          => 'ut_archive_setting_headline',
                'label'       => 'Archive',
                'type'        => 'panel_headline',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_archive_settings',
            ),
            
            array(
                'id'          => 'ut_archive_hero_background_color',
                'label'       => 'Hero Background Color',
                'desc'        => '<strong>(optional)</strong>',
                'type'        => 'colorpicker',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_archive_settings',
            ),
            
            array(
                'id'          => 'ut_archive_hero_parallax',
                'label'       => 'Activate Parallax',
                'desc'        => 'Parallax involves the background moving at a slower rate to the foreground, creating a 3D effect as you scroll down the page.',
                'std'         => 'off',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_archive_settings',
                'choices'     => array( 
                    array(
                        'value'       => 'on',
                        'label'       => 'On'
                    ),
                    array(
                        'value'       => 'off',
                        'label'       => 'Off'
                    )
                )
                
            ),
            
            array(
                'id'          => 'ut_archive_hero_background_image',
                'label'       => 'Hero Background Image',
                'desc'        => 'Keep in mind, that you are not able to set a background position or attachment if the parallax option for this section has been set to "on".',
                'type'        => 'background',
                'markup'      => '1_1',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_archive_settings'
            ),
            
            array(
                'id'          => 'ut_archive_hero_overlay',
                'label'       => 'Activate Hero Overlay?',
                'desc'        => '<strong>(optional)</strong>',
                'std'         => 'on',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_archive_settings',
                'choices'     => array( 
                    array(
                        'value'       => 'on',
                        'label'       => 'yes, please!',
                    ),
                    array(
                        'value'       => 'off',
                        'label'       => 'no, thanks!'
                    )
                ) /* end choices */
            ),
          
            array(
                'id'          => 'ut_archive_hero_overlay_color',
                'label'       => 'Hero Overlay Color',
                'desc'        => '<strong>(optional)</strong>',
                'type'        => 'colorpicker',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_archive_settings',
                'required'    => array(
                    'ut_archive_hero_overlay'    => 'on'
                )
            ),
          
            array(
                'id'          => 'ut_archive_hero_overlay_color_opacity',
                'label'       => 'Hero Overlay Color Opacity',
                'desc'        => 'Drag the handle to set the opacity.',
                'type'        => 'numeric-slider',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_archive_settings',
                'min_max_step'=> '0,1,0.1',
                'required'    => array(
                    'ut_archive_hero_overlay'    => 'on'
                )
            ),  
          
            array(
                'id'          => 'ut_archive_hero_overlay_pattern',
                'label'       => 'Activate Hero Overlay Pattern?',
                'desc'        => '<strong>(optional)</strong>',
                'std'         => 'on',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_archive_settings',
                'choices'     => array( 
                    array(
                        'value'       => 'on',
                        'label'       => 'yes, please!'
                    ),
                    array(
                        'value'       => 'off',
                        'label'       => 'no, thanks!'
                    )
                ),
                'required'    => array(
                    'ut_archive_hero_overlay'    => 'on'
                )
            ),
          
            array(
                'id'          => 'ut_archive_hero_overlay_pattern_style',
                'label'       => 'Hero Overlay Pattern Style',
                'desc'        => '<strong>(optional)</strong>',
                'std'         => 'style_one',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_archive_settings',
                'choices'     => array( 
                    array(
                        'value'       => 'style_one',
                        'label'       => 'Style One'
                    ),
                    array(
                        'value'       => 'style_two',
                        'label'       => 'Style Two'
                    )
                ),
                'required'    => array(
                    'ut_archive_hero_overlay'            => 'on',
                    'ut_archive_hero_overlay_pattern'    => 'on'
                )
            ),        
    
            array(
                'id'          => 'ut_archive_hero_down_arrow_settings_headline',
                'label'       => 'Scroll Down Arrow',
                'type'        => 'section_headline',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_archive_settings',
            ),
    
            array(
                'id'          => 'ut_archive_hero_down_arrow_scroll_position',
                'label'       => 'Scroll Down Arrow Horizontal Position',
                'desc'        => 'Drag the handle to set your desired horizontal position.',
                'type'        => 'numeric_slider',
                'std'         => '50',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_archive_settings',
            ),
          
            array(
                'id'          => 'ut_archive_hero_down_arrow_scroll_position_vertical',
                'label'       => 'Scroll Down Arrow Vertical Position',
                'desc'        => 'Drag the handle to set your desired vertical position.',
                'type'        => 'numeric_slider',
                'std'         => '80',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_archive_settings',
            ),      
          
            array(
                'id'          => 'ut_archive_hero_down_arrow_color',
                'label'       => 'Scroll Down Arrow Color',
                'desc'        => '<strong>(optional)</strong> - choose an alternative for <strong>Scroll Down Arrow</strong>.',
                'type'        => 'colorpicker',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_system_page_archive_settings',
            ),        
      
            /*
            | Custom CSS
            */
         
            array(
                'id'          => 'ut_custom_css_settings_headline',
                'label'       => 'Custom CSS',
                'type'        => 'panel_headline',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_custom_css_settings',
            ),
          
            array(
                'id'          => 'ut_custom_css',
                'label'       => 'Custom CSS',
                'desc'        => 'Insert your custom CSS code right in here if you are not planing to use the delivered child theme. This custom CSS will be directly hooked into the wp head right after all other Stylesheets.',
                'type'        => 'css',
                'markup'      => '1_1',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_custom_css_settings'
            ),
        
            /*
            | SEO
            */
          
            array(
                'id'          => 'ut_seo_settings_headline',
                'label'       => 'SEO',
                'type'        => 'panel_headline',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_seo_settings',
            ),
          
            array(
                'id'          => 'ut_google_analytics',
                'label'       => 'Google Analytics ID',
                'desc'        => 'Enter your Google Analytics ID here to track your site with Google Analytics. <strong>Please insert ID only!</strong>',
                'type'        => 'text',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_seo_settings'
            ),
      
            /*
            |--------------------------------------------------------------------------
            | Cache Options - needs overwork 
            |--------------------------------------------------------------------------
                
          
            array(
                'id'          => 'ut_cache_setting_headline',
                'label'       => 'One Page Cache',
                'type'        => 'panel_headline',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_cache_settings',
            ),
          
            array(
                'id'          => 'ut_use_cache',
                'label'       => 'Use Cache',
                'desc'        => 'This option will cache your one page. We recommend to turn this option off when developing the site or adding new content. This cache stores CSS / JS and the main Query for our frontpage. For more and advanced caching options please use a Cache Plugin.',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_cache_settings',
                'std'          => 'off',
                'choices'     => array( 
                    array(
                        'value'       => 'off',
                        'label'       => 'off'
                    ),
                    array(
                        'value'       => 'on',
                        'label'       => 'on'
                    )
                ),
            ),
              
            array(
                'id'          => 'ut_cache_ltime',
                'label'       => 'Cache Lifetime',
                'desc'        => 'In Minutes, for example : 10',
                'type'        => 'text',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_cache_settings',
            ), */
      
      
            /*
            |--------------------------------------------------------------------------
            | Lightbox Options
            |--------------------------------------------------------------------------
            */      
          
            array(
                'id'          => 'ut_lightbox_setting_headline',
                'label'       => 'Lightbox Settings',
                'type'        => 'panel_headline',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_lightbox_settings',
            ),
          
            array(
                'id'          => 'ut_lightbox_script',
                'label'       => 'Lightbox Script',
                'desc'        => 'Choose your desired Lightbox Script. This option will only affect the theme but not used plugins. Our portfolio plugin has a separate option under "Settings" > "Portfolio Settings".',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_lightbox_settings',
                'std'          => 'prettyphoto',
                'choices'     => array( 
                    array(
                        'value'       => 'prettyphoto',
                        'label'       => 'Prettyphoto'
                    ),
                    array(
                        'value'       => 'lightgallery',
                        'label'       => 'Lightgallery'
                    )
                ),
            ),
      
            /*
            |--------------------------------------------------------------------------
            | Visual Composer Options
            |--------------------------------------------------------------------------
            */
                
            array(
                'id'          => 'ut_spacing_settings_headline',
                'label'       => 'Content Spacing Settings',
                'type'        => 'panel_headline',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_content_spacing_settings'
            ),
            
            array(
                'id'          => 'ut_blog_with_hero_settings_headline',
                'label'       => 'Blog with Hero',
                'type'        => 'section_headline',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_content_spacing_settings'
            ),
            
            array(
                'id'          => 'ut_blog_padding_top',
                'label'       => 'Padding Top',
                'type'        => 'text',
                'desc'        => 'include "px" in your string. e.g. 150px (default: 80px)',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_content_spacing_settings'
            ),
            
            array(
                'id'          => 'ut_blog_padding_bottom',
                'label'       => 'Padding Bottom',
                'type'        => 'text',
                'desc'        => 'include "px" in your string. e.g. 150px (default: 60px)',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_content_spacing_settings'
            ),
            
            array(
                'id'          => 'ut_blog_without_hero_settings_headline',
                'label'       => 'Blog without Hero',
                'type'        => 'section_headline',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_content_spacing_settings'
            ),
            
            array(
                'id'          => 'ut_blog_no_hero_padding_top',
                'label'       => 'Padding Top',
                'type'        => 'text',
                'desc'        => 'include "px" in your string. e.g. 150px (default: 80px)',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_content_spacing_settings'
            ),
            
            array(
                'id'          => 'ut_blog_no_hero_padding_bottom',
                'label'       => 'Padding Bottom',
                'type'        => 'text',
                'desc'        => 'include "px" in your string. e.g. 150px (default: 60px)',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_content_spacing_settings'
            ),
            
            array(
                'id'          => 'ut_page_with_hero_settings_headline',
                'label'       => 'Page with Hero',
                'type'        => 'section_headline',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_content_spacing_settings'
            ),
                        
            array(
                'id'          => 'ut_page_padding_top',
                'label'       => 'Padding Top',
                'type'        => 'text',
                'desc'        => 'include "px" in your string. e.g. 150px (default: 80px)',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_content_spacing_settings'
            ),
            
            array(
                'id'          => 'ut_page_padding_bottom',
                'label'       => 'Padding Bottom',
                'type'        => 'text',
                'desc'        => 'include "px" in your string. e.g. 150px (default: 60px)',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_content_spacing_settings'
            ),
            
            array(
                'id'          => 'ut_page_without_hero_settings_headline',
                'label'       => 'Page without Hero',
                'type'        => 'section_headline',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_content_spacing_settings'
            ),
            
            array(
                'id'          => 'ut_page_no_hero_padding_top',
                'label'       => 'Padding Top',
                'type'        => 'text',
                'desc'        => 'include "px" in your string. e.g. 150px (default: 80px)',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_content_spacing_settings'
            ),
            
            array(
                'id'          => 'ut_page_no_hero_padding_bottom',
                'label'       => 'Padding Bottom',
                'type'        => 'text',
                'desc'        => 'include "px" in your string. e.g. 150px (default: 60px)',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_content_spacing_settings'
            )
      
        )
        
    );
  
    /* allow settings to be filtered before saving */
    return apply_filters( 'ut_theme_option_settings', $ut_settings );
  
}

add_action( 'admin_init', '_ut_theme_options' );


function _ut_get_theme_options_submenu( $panel_id ) {
    
    if( empty( $panel_id ) ) {
        return;
    }
    
    $_ut_theme_options = _ut_theme_options();
    
    foreach( $_ut_theme_options['sections'] as $section ) {
        
        if( $section['id'] == $panel_id ) {
            
            return $section['subsections'];            
            
        }
        
    }

}