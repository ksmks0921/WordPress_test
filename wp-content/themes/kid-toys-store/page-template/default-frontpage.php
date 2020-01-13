<?php
/**
 * The template for displaying home page.
 *
 * Template Name: Default Home Page
 *
 * @package Kid Toys Store
 */

get_header(); ?>

<?php do_action( 'kid_toys_store_above_slider' ); ?>

<?php echo do_shortcode('[crellyslider alias="main_slider"]'); ?>

<?php /** slider section **/ ?>
<?php
	// Get pages set in the customizer (if any)
	$pages = array();
	for ( $count = 1; $count <= 5; $count++ ) {
		$mod = intval( get_theme_mod( 'kid_toys_store_slidersettings-page-' . $count ) );
		if ( 'page-none-selected' != $mod ) {
			$pages[] = $mod;
		}
	}
	if( !empty($pages) ) :
		$args = array(
			'posts_per_page' => 5,
			'post_type' => 'page',
			'post__in' => $pages,
			'orderby' => 'post__in'
		);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) :
			$count = 1;
			?>
			<div class="slider-main">
				<div id="slider" class="nivoSlider">
					<?php
						$kid_toys_store_n = 0;
					while ( $query->have_posts() ) : $query->the_post();
							
							$kid_toys_store_n++;
							$kid_toys_store_slideno[] = $kid_toys_store_n;
							$kid_toys_store_slidetitle[] = get_the_title();
							$kid_toys_store_slidelink[] = esc_url(get_permalink());
							?>
								<img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $kid_toys_store_n ); ?>" />
							<?php
						$count++;
					endwhile;
						wp_reset_postdata();
					?>
				</div>

				<?php
				$kid_toys_store_k = 0;
			    foreach( $kid_toys_store_slideno as $kid_toys_store_sln ){ ?>
					<div id="slidecaption<?php echo esc_attr( $kid_toys_store_sln ); ?>" class="nivo-html-caption">
						<div class="slide-cap  ">
							<div class="container">
								<h2><?php echo esc_html( $kid_toys_store_slidetitle[$kid_toys_store_k] ); ?></h2>
								<a class="read-more" href="<?php echo esc_url( $kid_toys_store_slidelink[$kid_toys_store_k] ); ?>"><?php  esc_html_e( 'SHOP NOW','kid-toys-store' ); ?></a>
							</div>
						</div>
					</div>
		    	<?php $kid_toys_store_k++;
				} ?>
			</div>
		<?php else : ?>
				<div class="header-no-slider"></div>
			<?php
		endif;
	else : ?>
			<div class="header-no-slider"></div>
		<?php
	endif;
?>

<?php do_action( 'kid_toys_store_below_slider' ); ?>

<section id="our-products">
	<div class="container">
        <?php if( get_theme_mod('kid_toys_store_sec1_title') != ''){ ?>     
            <h3><?php echo esc_html(get_theme_mod('kid_toys_store_sec1_title',__('Most Populer Products','kid-toys-store'))); ?></h3>
            <hr class="titlehr">
        <?php }?>
			<?php $pages = array();
			for ( $count = 0; $count <= 0; $count++ ) {
				$mod = intval( get_theme_mod( 'kid_toys_store_servicesettings-page-' . $count ));
				if ( 'page-none-selected' != $mod ) {
				  $pages[] = $mod;
				}
			}
			if( !empty($pages) ) :
			  $args = array(
			    'post_type' => 'page',
			    'post__in' => $pages,
			    'orderby' => 'post__in'
			  );
			  $query = new WP_Query( $args );
			  if ( $query->have_posts() ) :
			    $count = 0;
					while ( $query->have_posts() ) : $query->the_post(); ?>
					    <div class="box-image">
					        <p><?php the_content(); ?></p>
					        <div class="clearfix"></div>
					    </div>
					<?php $count++; endwhile; ?>
			  <?php else : ?>
			      <div class="no-postfound"></div>
			  <?php endif;
			endif;
		wp_reset_postdata();?>
	    <div class="clearfix"></div>
	</div>
</section>

<?php do_action( 'kid_toys_store_below_product_section' ); ?>

<div class="container">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>