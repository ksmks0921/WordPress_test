<?php

/**
 * Default Sidebar for Blog
 * by www.unitedthemes.com
 */

if( !apply_filters( 'ut_show_sidebar', true ) ) {
    return;    
}

?>

<?php if( is_active_sidebar('blog-widget-area') ) : ?>
    
    <div id="secondary" class="widget-area grid-25 mobile-grid-100 tablet-grid-25" role="complementary">
        <ul class="sidebar sidebar-<?php echo ot_get_option('ut_sidebar_align' , 'right'); ?>">
            <?php dynamic_sidebar('blog-widget-area'); ?>
        </ul>
    </div>
    
<?php endif; ?>