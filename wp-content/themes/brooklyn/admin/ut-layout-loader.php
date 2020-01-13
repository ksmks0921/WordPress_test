<?php 

/*
|--------------------------------------------------------------------------
| Load Default Layout on Theme Activation
|--------------------------------------------------------------------------
*/

if ( ! function_exists( 'ut_load_layout_into_ot' ) ) {

	function ut_load_layout_into_ot( $ot_layout_file ) {
		
		$GLOBALS['ut_load_ot_layout'] = true;		
		
		/* default file for theme activation */
		$ot_layout_file = !empty( $ot_layout_file ) ? $ot_layout_file : 'default.txt';
		
        $default_images = array();
        
        if( 'default.txt' == $ot_layout_file ) {
            
            $default_images['ut_search_hero_background_image']['background-repeat'] = 'no-repeat';
            $default_images['ut_search_hero_background_image']['background-attachment'] = 'scroll';
            $default_images['ut_search_hero_background_image']['background-position'] = 'center center';
            $default_images['ut_search_hero_background_image']['background-size'] = 'cover';
            $default_images['ut_search_hero_background_image']['background-image'] = THEME_WEB_ROOT . '/images/brooklyn-default.jpg';
            
            $default_images['ut_archive_hero_background_image']['background-repeat'] = 'no-repeat';
            $default_images['ut_archive_hero_background_image']['background-attachment'] = 'scroll';
            $default_images['ut_archive_hero_background_image']['background-position'] = 'center center';
            $default_images['ut_archive_hero_background_image']['background-size'] = 'cover';
            $default_images['ut_archive_hero_background_image']['background-image'] = THEME_WEB_ROOT . '/images/brooklyn-default.jpg';
            
            $default_images['ut_404_hero_background_image']['background-repeat'] = 'no-repeat';
            $default_images['ut_404_hero_background_image']['background-attachment'] = 'scroll';
            $default_images['ut_404_hero_background_image']['background-position'] = 'center center';
            $default_images['ut_404_hero_background_image']['background-size'] = 'cover';
            $default_images['ut_404_hero_background_image']['background-image'] = THEME_WEB_ROOT . '/images/brooklyn-default.jpg';
            
            update_option('ut_accentcolor', '#F0590E');
            
        }
        
		/* needed option tree file for operatiob */
		include_once( THEME_DOCUMENT_ROOT . '/admin/includes/ot-functions-admin.php' );
		
		/* theme options file */ 
		$ot_layout_file = get_template_directory() . '/admin/assets/optionsdata/' . $ot_layout_file;
		
		if ( !is_readable( $ot_layout_file ) ) {
			return;
		}
		
		/* file rawdata */
      	$rawdata = file_get_contents( $ot_layout_file );
		$options = isset( $rawdata ) ? unserialize( ot_decode( $rawdata ) ) : '';
				
		/* get settings array */
      	$settings = _ut_theme_options();		
		
		/* has options */
		if ( is_array( $options ) ) {
			
			/* validate options */
			if ( is_array( $settings ) ) {
				
				foreach( $settings['settings'] as $setting ) {
			  
					if ( isset( $options[$setting['id']] ) ) {
                        
                        if( array_key_exists( $setting['id'], $default_images ) ) {
                            
                            $options[$setting['id']] = $default_images[$setting['id']];
                                                    
                        }
                        
				  		$content = ot_stripslashes( $options[$setting['id']] );
				  		$options[$setting['id']] = ot_validate_setting( $content, $setting['type'], $setting['id'] );
				  
					}										
			  
				}
			
			} /* end validate */
			
			/* execute the action hook and pass the theme options to it */
        	do_action( 'ot_before_theme_options_save', $options );
			
			/* update the option tree array */
        	update_option('option_tree', $options);
			update_option('ut_layout_loaded' , 'active');
			
			$GLOBALS['ut_load_ot_layout'] = false;
		
		}
	
	}
	    
	add_action('ut_load_layout' , 'ut_load_layout_into_ot');
	
} ?>