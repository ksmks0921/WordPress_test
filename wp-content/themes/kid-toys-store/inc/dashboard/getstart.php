<?php
//about theme info
add_action( 'admin_menu', 'kid_toys_store_gettingstarted' );
function kid_toys_store_gettingstarted() {    	
	add_theme_page( esc_html__('Get Started', 'kid-toys-store'), esc_html__('Get Started', 'kid-toys-store'), 'edit_theme_options', 'kid_toys_store_guide', 'kid_toys_store_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function kid_toys_store_admin_theme_style() {
   wp_enqueue_style( 'kid-toys-store-font', kid_toys_store_admin_font_url(), array() );
   wp_enqueue_style('custom-admin-style', get_template_directory_uri() . '/inc/dashboard/getstart.css');
   wp_enqueue_script('tabs', get_template_directory_uri() . '/inc/dashboard/js/tab.js');
}
add_action('admin_enqueue_scripts', 'kid_toys_store_admin_theme_style');

// Theme Font URL
function kid_toys_store_admin_font_url() {
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';

	$query_args = array(
		'family'	=> urlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

//guidline for about theme
function kid_toys_store_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'kid-toys-store' );
?>

<div class="wrapper-info">  
    <div class="tab-sec">
		<div class="tab">
			<div class="logo">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/logo.png" alt="" />
			</div>
			<button class="tablinks home" onclick="openCity(event, 'tc_index')"><?php esc_html_e( 'Free Theme Information', 'kid-toys-store' ); ?></button>
		  	<button class="tablinks" onclick="openCity(event, 'tc_pro')"><?php esc_html_e( 'Premium Theme Information', 'kid-toys-store' ); ?></button>
		  	<button class="tablinks" onclick="openCity(event, 'tc_create')"><?php esc_html_e( 'Theme Support', 'kid-toys-store' ); ?></button>				
		</div>

		<div  id="tc_index" class="tabcontent">
			<h2><?php esc_html_e( 'Welcome to Kid Toys Store Theme', 'kid-toys-store' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
			<hr>
			<div class="info-link">
				<a href="<?php echo esc_url( KID_TOYS_STORE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'kid-toys-store' ); ?></a>
				<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'kid-toys-store'); ?></a>
				<a class="get-pro" href="<?php echo esc_url( KID_TOYS_STORE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'kid-toys-store'); ?></a>
			</div>
			<div class="col-tc-6">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/screenshot.png" alt="" />
			</div>
			<div class="col-tc-6">
				<P><?php esc_html_e( 'Kid Toys Store is a modern and lively WordPress theme to make websites related to kids. The theme can be used for kindergarten, preschools, day care, childcare centres, nurseries, play groups websites etc. You can use this theme if you have a toy store or take kids party order. The fun-filled font used is perfect to arouse enthusiasm in your viewers. The theme uses bright colours to suit a kids website. This multipurpose theme can be personalized to be used as a childcare blog or child healthcare blog. The Kid Toys Store is a responsive theme and can be run on multiple browsers. It is translation ready to suit any demographic. It has multiple page templates to design each template differently. The theme is written in clean and secure codes which makes it SEO-friendly and ranks you higher in search engine results. It is loaded with amazing features and functionalities to give extra edge to your site. You can extend the themes functionalities with third party plugins. It seamlessly supports WooCommerce plugin to make your site an online store. You can customize the theme to suit your requirements. You can change its background, colours, logos etc. Choose from the unlimited colours given in its palette to make it fresher.', 'kid-toys-store' ); ?></P>
			</div>
    	</div>

		<div id="tc_pro" class="tabcontent">
			<h3><?php esc_html_e( 'Kid Toys Store Theme Information', 'kid-toys-store' ); ?></h3>
			<hr>
			<div class="pro-image">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/resize.png" alt="" />
			</div>
			<div class="info-link-pro">
				<p><a href="<?php echo esc_url( KID_TOYS_STORE_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Buy Now', 'kid-toys-store' ); ?></a></p>
				<p><a href="<?php echo esc_url( KID_TOYS_STORE_LIVE_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Live Demo', 'kid-toys-store' ); ?></a></p>
				<p><a href="<?php echo esc_url( KID_TOYS_STORE_PRO_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Pro Documentation', 'kid-toys-store' ); ?></a></p>
			</div>
			<div class="col-pro-5">
				<h4><?php esc_html_e( 'Kid Toys Store Pro Theme', 'kid-toys-store' ); ?></h4>
				<P><?php esc_html_e( 'The premium Kids WordPress theme is a children oriented theme. It is designed for kindergartens, preschools, childcare centres, nurseries and other people intending to offer online services pertaining to children. You can also use it for your toy store or for a website which takes party orders for children. Additionally, you can use it to design a website which provides ideas for party decoration. It can also be used by paediatricians and child care specialists. This theme is designed with bright colours and fun fonts and images keeping in mind the best interest of kids and children. The premium kids WordPress theme is packed with amazing features and plugins to cater best services. It is fully responsive, translation ready and social media integrated theme. You can customize it to change its background, colours, headers, logos etc. according to your needs. It has an advanced slider with multiple effects and control options to place any option you want on the homepage. You can choose from hundreds of fonts and colours to make it lively, the way a kid website should look. It has enable/disable option for each section to keep the focus on a particular section. Buy this theme to showcase your creativity.', 'kid-toys-store' ); ?></P>		
			</div>
			<div class="col-pro-6">				
				<h4><?php esc_html_e( 'Theme Features', 'kid-toys-store' ); ?></h4>
				<ul>
					<li><?php esc_html_e( 'Theme Options using Customizer API', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Responsive design', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Favicon, Logo, title and tagline customization', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Advanced Color options', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( '100+ Font Family Options', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Background Image Option', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Simple Menu Option', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Additional section for products', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Enable-Disable options on All sections', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Home Page setting for different sections', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Advance Slider with unlimited slides', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Partner Section', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Promotional Banner Section for Products', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Seperate Newsletter Section', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Text and call to action button for each slides', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Pagination option', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Custom CSS option', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Translations Ready', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Custom Backgrounds, Colors, Headers, Logo & Menu', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Customizable Home Page', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Full-Width Template', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Footer Widgets & Editor Style', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Banner & Post Type Plugin Functionality', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Woo Commerce Compatible', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Multiple Inner Page Templates', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Product Sliders', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Slider', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Posttype', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Listing With Shortcode', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Contact page template', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Contact Widget', 'kid-toys-store' ); ?></li>
					<li><?php esc_html_e( 'Advance Social Media Feature', 'kid-toys-store' ); ?></li>
				</ul>				
			</div>
		</div>	

		<div id="tc_create" class="tabcontent">
			<h3><?php esc_html_e( 'Support', 'kid-toys-store' ); ?></h3>
			<hr>
			<div class="tab-cont">
		  		<h4><?php esc_html_e( 'Need Support?', 'kid-toys-store' ); ?></h4>				
				<div class="info-link-support">
					<P><?php esc_html_e( 'Our team is obliged to help you in every way possible whenever you face any type of difficulties and doubts.', 'kid-toys-store' ); ?></P>
					<a href="<?php echo esc_url( KID_TOYS_STORE_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support Forum', 'kid-toys-store' ); ?></a>
				</div>
			</div>
			<div class="tab-cont">	
				<h4><?php esc_html_e('Reviews', 'kid-toys-store'); ?></h4>				
				<div class="info-link-support">
					<P><?php esc_html_e( 'It is commendable to have such a theme inculcated with amazing features and robust functionalities. I feel grateful to recommend this theme to one and all.', 'kid-toys-store' ); ?></P>
					<a href="<?php echo esc_url( KID_TOYS_STORE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'kid-toys-store'); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>