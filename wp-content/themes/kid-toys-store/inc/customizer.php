<?php
/**
 * Kid Toys Store Theme Customizer
 *
 * @package Kid Toys Store
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kid_toys_store_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'kid_toys_store_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'kid-toys-store' ),
	    'description' => __( 'Description of what this panel does.', 'kid-toys-store' )
	) );

	/**
	 * Upsells
	 */
	load_template( trailingslashit( get_template_directory() ) . 'inc/class-customizer-theme-info-control.php' );

	$wp_customize->add_section(
		'kid_toys_store_theme_info_main_section', array(
			'title'    => __( 'View PRO version', 'kid-toys-store' ),
			'priority' => 1,
		)
	);
	$wp_customize->add_setting(
		'kid_toys_store_theme_info_main_control', array(
			'sanitize_callback' => 'esc_html',
		)
	);

	$wp_customize->add_control(
		new Kid_Toys_Store_Theme_Info(
			$wp_customize, 'kid_toys_store_theme_info_main_control', array(
				'section'     => 'kid_toys_store_theme_info_main_section',
				'priority'    => 100,
				'options'     => array(
					esc_html__( 'Enable-Disable options on every section', 'kid-toys-store' ),
					esc_html__( 'Background Color & Image Option', 'kid-toys-store' ),
					esc_html__( '100+ Font Family Options', 'kid-toys-store' ),
					esc_html__( 'Advanced Color options', 'kid-toys-store' ),
					esc_html__( 'Translation ready', 'kid-toys-store' ),
					esc_html__( 'Gallery, Banner, Post Type Plugin Functionality', 'kid-toys-store' ),
					esc_html__( 'Integrated Google map', 'kid-toys-store' ),
					esc_html__( '1 Year Free Support', 'kid-toys-store' ),
				),
				'button_url'  => esc_url( 'https://www.themescaliber.com/themes/premium-kids-wordpress-theme' ),
				'button_text' => esc_html__( 'View PRO version', 'kid-toys-store' ),
			)
		)
	);

	//Layouts
	$wp_customize->add_section( 'kid_toys_store_left_right', array(
    	'title'      => __( 'Theme Layout Settings', 'kid-toys-store' ),
		'priority'   => 30,
		'panel' => 'kid_toys_store_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('kid_toys_store_theme_options',array(
	        'default' =>  __('Right Sidebar','kid-toys-store'),	        'sanitize_callback' => 'kid_toys_store_sanitize_choices'
	) );
	$wp_customize->add_control('kid_toys_store_theme_options',
	    array(
	        'type' => 'radio',
	        'label' => __('Do you want this section','kid-toys-store'),
	        'section' => 'kid_toys_store_left_right',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','kid-toys-store'),
	            'Right Sidebar' => __('Right Sidebar','kid-toys-store'),
	            'One Column' => __('One Column','kid-toys-store'),
	            'Three Columns' => __('Three Columns','kid-toys-store'),
	            'Four Columns' => __('Four Columns','kid-toys-store'),
	            'Grid Layout' => __('Grid Layout','kid-toys-store')
	        ),
	    )
    );

    $font_array = array(
        '' =>'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' =>'Acme', 
        'Anton' => 'Anton', 
        'Architects Daughter' =>'Architects Daughter',
        'Arimo' => 'Arimo', 
        'Arsenal' =>'Arsenal',
        'Arvo' =>'Arvo',
        'Alegreya' =>'Alegreya',
        'Alfa Slab One' =>'Alfa Slab One',
        'Averia Serif Libre' =>'Averia Serif Libre', 
        'Bangers' =>'Bangers', 
        'Boogaloo' =>'Boogaloo', 
        'Bad Script' =>'Bad Script',
        'Bitter' =>'Bitter', 
        'Bree Serif' =>'Bree Serif', 
        'BenchNine' =>'BenchNine',
        'Cabin' =>'Cabin',
        'Cardo' =>'Cardo', 
        'Courgette' =>'Courgette', 
        'Cherry Swash' =>'Cherry Swash',
        'Cormorant Garamond' =>'Cormorant Garamond', 
        'Crimson Text' =>'Crimson Text',
        'Cuprum' =>'Cuprum', 
        'Cookie' =>'Cookie',
        'Chewy' =>'Chewy',
        'Days One' =>'Days One',
        'Dosis' =>'Dosis',
        'Droid Sans' =>'Droid Sans', 
        'Economica' =>'Economica', 
        'Fredoka One' =>'Fredoka One',
        'Fjalla One' =>'Fjalla One',
        'Francois One' =>'Francois One', 
        'Frank Ruhl Libre' => 'Frank Ruhl Libre', 
        'Gloria Hallelujah' =>'Gloria Hallelujah',
        'Great Vibes' =>'Great Vibes', 
        'Handlee' =>'Handlee', 
        'Hammersmith One' =>'Hammersmith One',
        'Inconsolata' =>'Inconsolata',
        'Indie Flower' =>'Indie Flower', 
        'IM Fell English SC' =>'IM Fell English SC',
        'Julius Sans One' =>'Julius Sans One',
        'Josefin Slab' =>'Josefin Slab',
        'Josefin Sans' =>'Josefin Sans',
        'Kanit' =>'Kanit',
        'Lobster' =>'Lobster',
        'Lato' => 'Lato',
        'Lora' =>'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather',
        'Monda' =>'Monda',
        'Montserrat' =>'Montserrat',
        'Muli' =>'Muli',
        'Marck Script' =>'Marck Script',
        'Noto Serif' =>'Noto Serif',
        'Open Sans' =>'Open Sans',
        'Overpass' => 'Overpass', 
        'Overpass Mono' =>'Overpass Mono',
        'Oxygen' =>'Oxygen',
        'Orbitron' =>'Orbitron',
        'Patua One' =>'Patua One',
        'Pacifico' =>'Pacifico',
        'Padauk' =>'Padauk',
        'Playball' =>'Playball',
        'Playfair Display' =>'Playfair Display',
        'PT Sans' =>'PT Sans',
        'Philosopher' =>'Philosopher',
        'Permanent Marker' =>'Permanent Marker',
        'Poiret One' =>'Poiret One',
        'Quicksand' =>'Quicksand',
        'Quattrocento Sans' =>'Quattrocento Sans',
        'Raleway' =>'Raleway',
        'Rubik' =>'Rubik',
        'Rokkitt' =>'Rokkitt',
        'Russo One' => 'Russo One', 
        'Righteous' =>'Righteous', 
        'Slabo' =>'Slabo', 
        'Source Sans Pro' =>'Source Sans Pro',
        'Shadows Into Light Two' =>'Shadows Into Light Two',
        'Shadows Into Light' =>  'Shadows Into Light',
        'Sacramento' =>'Sacramento',
        'Shrikhand' =>'Shrikhand',
        'Tangerine' => 'Tangerine',
        'Ubuntu' =>'Ubuntu',
        'VT323' =>'VT323',
        'Varela Round' =>'Varela Round',
        'Vampiro One' =>'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' =>'Volkhov',
        'Kavoon' =>'Kavoon',
        'Poppins' => 'Poppins',
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz'
    );

    //Typography
	$wp_customize->add_section( 'kid_toys_store_typography', array(
    	'title'      => __( 'Typography', 'kid-toys-store' ),
		'priority'   => 30,
		'panel' => 'kid_toys_store_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'kid_toys_store_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kid_toys_store_paragraph_color', array(
		'label' => __('Paragraph Color', 'kid-toys-store'),
		'section' => 'kid_toys_store_typography',
		'settings' => 'kid_toys_store_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('kid_toys_store_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'kid_toys_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'kid_toys_store_paragraph_font_family', array(
	    'section'  => 'kid_toys_store_typography',
	    'label'    => __( 'Paragraph Fonts','kid-toys-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('kid_toys_store_paragraph_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('kid_toys_store_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','kid-toys-store'),
		'section'	=> 'kid_toys_store_typography',
		'setting'	=> 'kid_toys_store_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'kid_toys_store_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kid_toys_store_atag_color', array(
		'label' => __('"a" Tag Color', 'kid-toys-store'),
		'section' => 'kid_toys_store_typography',
		'settings' => 'kid_toys_store_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('kid_toys_store_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'kid_toys_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'kid_toys_store_atag_font_family', array(
	    'section'  => 'kid_toys_store_typography',
	    'label'    => __( '"a" Tag Fonts','kid-toys-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'kid_toys_store_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kid_toys_store_li_color', array(
		'label' => __('"li" Tag Color', 'kid-toys-store'),
		'section' => 'kid_toys_store_typography',
		'settings' => 'kid_toys_store_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('kid_toys_store_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'kid_toys_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'kid_toys_store_li_font_family', array(
	    'section'  => 'kid_toys_store_typography',
	    'label'    => __( '"li" Tag Fonts','kid-toys-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'kid_toys_store_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kid_toys_store_h1_color', array(
		'label' => __('H1 Color', 'kid-toys-store'),
		'section' => 'kid_toys_store_typography',
		'settings' => 'kid_toys_store_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('kid_toys_store_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'kid_toys_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'kid_toys_store_h1_font_family', array(
	    'section'  => 'kid_toys_store_typography',
	    'label'    => __( 'H1 Fonts','kid-toys-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('kid_toys_store_h1_font_size',array(
		'default'	=> '50px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('kid_toys_store_h1_font_size',array(
		'label'	=> __('H1 Font Size','kid-toys-store'),
		'section'	=> 'kid_toys_store_typography',
		'setting'	=> 'kid_toys_store_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'kid_toys_store_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kid_toys_store_h2_color', array(
		'label' => __('H2 Color', 'kid-toys-store'),
		'section' => 'kid_toys_store_typography',
		'settings' => 'kid_toys_store_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('kid_toys_store_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'kid_toys_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'kid_toys_store_h2_font_family', array(
	    'section'  => 'kid_toys_store_typography',
	    'label'    => __( 'H2 Fonts','kid-toys-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('kid_toys_store_h2_font_size',array(
		'default'	=> '45px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('kid_toys_store_h2_font_size',array(
		'label'	=> __('H2 Font Size','kid-toys-store'),
		'section'	=> 'kid_toys_store_typography',
		'setting'	=> 'kid_toys_store_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'kid_toys_store_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kid_toys_store_h3_color', array(
		'label' => __('H3 Color', 'kid-toys-store'),
		'section' => 'kid_toys_store_typography',
		'settings' => 'kid_toys_store_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('kid_toys_store_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'kid_toys_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'kid_toys_store_h3_font_family', array(
	    'section'  => 'kid_toys_store_typography',
	    'label'    => __( 'H3 Fonts','kid-toys-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('kid_toys_store_h3_font_size',array(
		'default'	=> '36px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('kid_toys_store_h3_font_size',array(
		'label'	=> __('H3 Font Size','kid-toys-store'),
		'section'	=> 'kid_toys_store_typography',
		'setting'	=> 'kid_toys_store_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'kid_toys_store_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kid_toys_store_h4_color', array(
		'label' => __('H4 Color', 'kid-toys-store'),
		'section' => 'kid_toys_store_typography',
		'settings' => 'kid_toys_store_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('kid_toys_store_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'kid_toys_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'kid_toys_store_h4_font_family', array(
	    'section'  => 'kid_toys_store_typography',
	    'label'    => __( 'H4 Fonts','kid-toys-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('kid_toys_store_h4_font_size',array(
		'default'	=> '30px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('kid_toys_store_h4_font_size',array(
		'label'	=> __('H4 Font Size','kid-toys-store'),
		'section'	=> 'kid_toys_store_typography',
		'setting'	=> 'kid_toys_store_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'kid_toys_store_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kid_toys_store_h5_color', array(
		'label' => __('H5 Color', 'kid-toys-store'),
		'section' => 'kid_toys_store_typography',
		'settings' => 'kid_toys_store_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('kid_toys_store_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'kid_toys_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'kid_toys_store_h5_font_family', array(
	    'section'  => 'kid_toys_store_typography',
	    'label'    => __( 'H5 Fonts','kid-toys-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('kid_toys_store_h5_font_size',array(
		'default'	=> '25px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('kid_toys_store_h5_font_size',array(
		'label'	=> __('H5 Font Size','kid-toys-store'),
		'section'	=> 'kid_toys_store_typography',
		'setting'	=> 'kid_toys_store_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'kid_toys_store_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kid_toys_store_h6_color', array(
		'label' => __('H6 Color', 'kid-toys-store'),
		'section' => 'kid_toys_store_typography',
		'settings' => 'kid_toys_store_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('kid_toys_store_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'kid_toys_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'kid_toys_store_h6_font_family', array(
	    'section'  => 'kid_toys_store_typography',
	    'label'    => __( 'H6 Fonts','kid-toys-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('kid_toys_store_h6_font_size',array(
		'default'	=> '18px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('kid_toys_store_h6_font_size',array(
		'label'	=> __('H6 Font Size','kid-toys-store'),
		'section'	=> 'kid_toys_store_typography',
		'setting'	=> 'kid_toys_store_h6_font_size',
		'type'	=> 'text'
	));

    //Social Icons(topbar)
	$wp_customize->add_section('kid_toys_store_topbar',array(
		'title'	=> __('Top Header','kid-toys-store'),
		'description'	=> __('Add Header Content here','kid-toys-store'),
		'priority'	=> null,
		'panel' => 'kid_toys_store_panel_id',
	));

    $wp_customize->add_setting('kid_toys_store_mail',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('kid_toys_store_mail',array(
		'label'	=> __('Email','kid-toys-store'),
		'section'	=> 'kid_toys_store_topbar',
		'setting'	=> 'kid_toys_store_mail',
		'type'	=> 'text'
	));

    $wp_customize->add_setting('kid_toys_store_call',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('kid_toys_store_call',array(
		'label'	=> __('Phone','kid-toys-store'),
		'section'	=> 'kid_toys_store_topbar',
		'setting'	=> 'kid_toys_store_call',
		'type'	=> 'text'
	));

	//Social Icons(topbar)
	$wp_customize->add_section('kid_toys_store_topbar_header',array(
		'title'	=> __('Social Icon Section','kid-toys-store'),
		'description'	=> __('Add Header Content here','kid-toys-store'),
		'priority'	=> null,
		'panel' => 'kid_toys_store_panel_id',
	));

	$wp_customize->add_setting('kid_toys_store_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('kid_toys_store_youtube_url',array(
		'label'	=> __('Add Youtube link','kid-toys-store'),
		'section'	=> 'kid_toys_store_topbar_header',
		'setting'	=> 'kid_toys_store_youtube_url',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('kid_toys_store_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('kid_toys_store_facebook_url',array(
		'label'	=> __('Add Facebook link','kid-toys-store'),
		'section'	=> 'kid_toys_store_topbar_header',
		'setting'	=> 'kid_toys_store_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('kid_toys_store_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('kid_toys_store_twitter_url',array(
		'label'	=> __('Add Twitter link','kid-toys-store'),
		'section'	=> 'kid_toys_store_topbar_header',
		'setting'	=> 'kid_toys_store_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('kid_toys_store_rss_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('kid_toys_store_rss_url',array(
		'label'	=> __('Add RSS link','kid-toys-store'),
		'section'	=> 'kid_toys_store_topbar_header',
		'setting'	=> 'kid_toys_store_rss_url',
		'type'	=> 'url'
	));

	//home page slider
	$wp_customize->add_section( 'kid_toys_store_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'kid-toys-store' ),
		'priority'   => null,
		'panel' => 'kid_toys_store_panel_id'
	) );

	$wp_customize->add_setting('kid_toys_store_slider_arrows',array(
      'default' => 'false',
      'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('kid_toys_store_slider_arrows',array(
	      'type' => 'checkbox',
	      'label' => __('Show / Hide slider','kid-toys-store'),
	      'section' => 'kid_toys_store_slidersettings',
	));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'kid_toys_store_slidersettings_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'kid_toys_store_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'kid_toys_store_slidersettings_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'kid-toys-store' ),
			'section'  => 'kid_toys_store_slidersettings',
			'type'     => 'dropdown-pages'
		) );

	}	

	//Our Product
	$wp_customize->add_section('kid_toys_store_product',array(
		'title'	=> __('Featured Products','kid-toys-store'),
		'description'=> __('This section will appear below the slider.','kid-toys-store'),
		'panel' => 'kid_toys_store_panel_id',
	));

	$wp_customize->add_setting('kid_toys_store_sec1_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('kid_toys_store_sec1_title',array(
		'label'	=> __('Section Title','kid-toys-store'),
		'section'=> 'kid_toys_store_product',
		'setting'=> 'kid_toys_store_sec1_title',
		'type'=> 'text'
	));	
	
	$wp_customize->add_setting( 'kid_toys_store_servicesettings_page', array(
		'default'           => '',
		'sanitize_callback' => 'kid_toys_store_sanitize_dropdown_pages'
	));
	$wp_customize->add_control( 'kid_toys_store_servicesettings_page', array(
		'label'    => __( 'Select Product Page', 'kid-toys-store' ),
		'section'  => 'kid_toys_store_product',
		'type'     => 'dropdown-pages'
	));

	//Footer
	$wp_customize->add_section('kid_toys_store_footer',array(
		'title'	=> __('Footer Text','kid-toys-store'),
		'description'=> __('This section will appear in the footer.','kid-toys-store'),
		'panel' => 'kid_toys_store_panel_id',
	));

	$wp_customize->add_setting('kid_toys_store_footer_copy',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('kid_toys_store_footer_copy',array(
		'label'	=> __('Text','kid-toys-store'),
		'section'=> 'kid_toys_store_footer',
		'setting'=> 'kid_toys_store_footer_copy',
		'type'=> 'text'
	));	
}
add_action( 'customize_register', 'kid_toys_store_customize_register' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class kid_toys_store_Customizer_Upsell {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object $manager Customizer manager.
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . 'inc/customize-theme-info-main.php' );
		load_template( trailingslashit( get_template_directory() ) . 'inc/customize-upsell-section.php' );

		// Register custom section types.
		$manager->register_section_type( 'kid_toys_store_Customizer_Theme_Info_Main' );

		// Main Documentation Link In Customizer Root.
		$manager->add_section(
			new kid_toys_store_Customizer_Theme_Info_Main(
				$manager, 'kid-toys-store-theme-info', array(
					'theme_info_title' => __( 'Kid Toys Store', 'kid-toys-store' ),
					'label_url'        => esc_url( 'https://themescaliber.com/doc/free-kid-toys-store/' ),
					'label_text'       => __( 'Documentation', 'kid-toys-store' ),
				)
			)
		);

		// Frontpage Sections Upsell.
		$manager->add_section(
			new kid_toys_store_Customizer_Upsell_Section(
				$manager, 'kid-toys-store-upsell-frontpage-sections', array(
					'panel'       => 'kid_toys_store_panel_id',
					'priority'    => 500,
					'options'     => array(
						esc_html__( 'Product Box Section', 'kid-toys-store' ),
						esc_html__( 'Services section', 'kid-toys-store' ),
						esc_html__( 'View Collection section', 'kid-toys-store' ),
						esc_html__( 'New Arrivals & Best Sellers Section', 'kid-toys-store' ),
						esc_html__( 'On Sale Products section', 'kid-toys-store' ),
						esc_html__( 'From The Blog section', 'kid-toys-store' ),
						esc_html__( 'Testimonials section', 'kid-toys-store' ),
						
					),
					'button_url'  => esc_url( 'https://www.themescaliber.com/themes/premium-kids-wordpress-theme' ),
					'button_text' => esc_html__( 'View PRO version', 'kid-toys-store' ),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'kid-toys-store-upsell-js', trailingslashit( get_template_directory_uri() ) . 'inc/js/kid-customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'kid-toys-store-theme-info-style', trailingslashit( get_template_directory_uri() ) . 'inc/css/customize-control.css' );
	}
}

Kid_Toys_Store_Customizer_Upsell::get_instance();