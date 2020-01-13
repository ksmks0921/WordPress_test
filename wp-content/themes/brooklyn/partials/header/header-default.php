<!-- header section -->
<header id="header-section" class="ha-header <?php ut_header_class(); ?>">
            
    <?php if( ut_return_header_config('ut_navigation_width' , 'centered') == 'centered' ) :?>
    
        <div class="grid-container">
    
    <?php endif; ?>    
                
            <div class="ha-header-perspective">
                
                <div class="ha-header-front">
                    
                    <div class="grid-15 tablet-grid-80 mobile-grid-80 <?php echo ot_get_option( 'ut_site_border', 'hide' ) == 'show' && ot_get_option( 'ut_site_navigation_flush', 'no' ) == 'yes' && ut_return_header_config( 'ut_navigation_width', 'centered' ) == 'fullwidth' ? 'ut-flush-logo' : ''; ?>">
                    
                        <?php if ( get_theme_mod( 'ut_site_logo' ) ) : ?>
                            
                            <?php 
    
                            /* check if current page has an option to show a hero */
                            $active_page_hero = get_post_meta( get_the_ID() , 'ut_activate_page_hero' , true );
                            
                            $sitelogo = !is_front_page() && !is_home() && ( $active_page_hero == 'off' || empty( $active_page_hero ) ) ? ( ut_return_logo_config( 'ut_site_logo_alt' ) ? ut_return_logo_config( 'ut_site_logo_alt' ) : ut_return_logo_config( 'ut_site_logo' ) ) : ut_return_logo_config( 'ut_site_logo' );                        
                            
                            $alternate_logo = ut_return_logo_config( 'ut_site_logo_alt' ) ? ut_return_logo_config( 'ut_site_logo_alt' ) : ut_return_logo_config( 'ut_site_logo' );
                            
                                if( ut_return_header_config( 'ut_header_layout', 'default' ) == 'side' ) { 
                                    $sitelogo = $alternate_logo;
                                }
                                
                            
                            ?>
                            
                            
                            <div class="site-logo">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img data-altlogo="<?php echo $alternate_logo; ?>" src="<?php echo $sitelogo; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
                            </div>
                            
                        <?php else : ?>
                        
                            <div class="site-logo">
                                <h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            </div>
                            
                        <?php endif; ?>                 
                    
                    </div>    
                    
                    <?php if( ut_return_header_config( 'ut_header_layout', 'default' ) == 'default' ) : ?>
                    
                        <?php get_template_part( 'partials/navigation/nav', 'default' ); ?>
                    
                    <?php endif; ?>  
                    
                    <?php get_template_part( 'partials/navigation/nav', 'mobile' ); ?>
                                                            
                </div>
                
            </div><!-- close .ha-header-perspective -->
        
    <?php if( ut_return_header_config('ut_navigation_width' , 'centered') == 'centered') :?>        
    
        </div> 
    
    <?php endif; ?>
    
</header><!-- close header --> 