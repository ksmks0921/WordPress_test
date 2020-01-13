<?php
/**
 * The template part for displaying slider
 *
 * @package Kid Toys Store
 * @subpackage kid_toys_store
 * @since Kid Toys Store 1.0
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
    <div class="postbox smallpostimage row">
        <?php 
            if(has_post_thumbnail()) { ?>
        <div class="box-image col-md-5">
            <?php the_post_thumbnail();  ?>
        </div>
        <?php } ?>
        <div class="new-text <?php 
            if(has_post_thumbnail()) { ?>col-md-7"<?php } else { ?>col-md-12"<?php } ?>>
            <div class="box-content">
                <h2><?php the_title();?></h2>
                <div class="metabox">
                    <span class="entry-date"><i class="fa fa-calendar" aria-hidden="true"></i><?php the_date(); ?></span>
                    <span class="entry-author"><i class="fa fa-user" aria-hidden="true"></i><?php the_author(); ?></span>
                    <span class="entry-comments"><i class="fa fa-comments" aria-hidden="true"></i><?php comments_number( __('0 Comments','kid-toys-store'), __('0 Comments','kid-toys-store'), __('% Comments','kid-toys-store') ); ?></span>
                </div>
                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink();?>" class="blogbutton-small hvr-sweep-to-right" title="<?php esc_html_e( 'Read Full', 'kid-toys-store' ); ?>"><?php esc_html_e('Read Full','kid-toys-store'); ?></a>
            </div>
        </div>
        <div class="clearfix"></div> 
    </div> 
</div>