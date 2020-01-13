<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Kid Toys Store
 */
?>
    <div class="footertown">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <?php dynamic_sidebar('footer-1');?>
                </div>
                <div class="col-lg-3 col-md-3">
                    <?php dynamic_sidebar('footer-2');?>
                </div>
                <div class="col-lg-3 col-md-3">
                    <?php dynamic_sidebar('footer-3');?>
                </div>
                <div class="col-lg-3 col-md-3">
                    <?php dynamic_sidebar('footer-4');?>
                </div>        
            </div>
        </div>
    </div>
    <div id="footer" class="copyright-wrapper">
    	<div class="container">
            <div class="copyright">
                <p><?php echo esc_html(get_theme_mod('kid_toys_store_footer_copy',__('Copyright 2018 -','kid-toys-store'))); ?> <?php kid_toys_store_credit_link(); ?></p>
            </div>
            <div class="clear"></div>  
        </div>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>