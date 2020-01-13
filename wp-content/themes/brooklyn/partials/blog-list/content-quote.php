<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>

    <div class="grid-100 tablet-grid-100 mobile-grid-100">
    
        <div class="entry-meta entry-meta-top clearfix">
    
            <?php
                /* translators: used between list items, there is a space after the comma */
                $categories_list = get_the_category_list( esc_html__( ', ', 'unitedthemes' ) );
                if ( $categories_list && unitedthemes_categorized_blog() ) :
            ?>
            <span class="cat-links"><i class="fa fa-folder-open-o"></i><?php printf( esc_html__( 'Posted in %1$s', 'unitedthemes' ), $categories_list ); ?></span> 
            
            <?php endif; ?>
        
        </div>
        <!-- close entry-meta -->
            
        <div class="entry-content clearfix">
        
            <?php if( get_post_format_quote_content() ) : ?>
                
                <?php post_format_quote_content(); ?>
                
                <p><a class="more-link" title="<?php echo esc_attr( wp_strip_all_tags( get_the_title() ) ); ?>" href="<?php echo esc_url( get_permalink() ); ?>"><span class="more-link"><?php esc_html_e( 'Read more', 'unitedthemes' ); ?><i class="fa fa-chevron-circle-right"></i></span></a></p>
                    
            <?php else: ?>
                
                <?php the_content( '<span class="more-link">' . esc_html__( 'Read more', 'unitedthemes' ) . '<i class="fa fa-chevron-circle-right"></i></span>' ); ?>
            
            <?php endif; ?>
        
        </div>
        
        <div class="entry-meta clearfix">
        
            <span class="author-links"><i class="fa fa-user"></i><?php esc_html_e('By', 'unitedthemes') ?> <?php the_author_posts_link(); ?></span>
            
            <span class="date-format hide-on-desktop"><i class="fa fa-clock-o"></i><?php esc_html_e('On', 'unitedthemes') ?> <span><?php the_time( get_option('date_format') ); ?></span></span>
           
            <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
            
                <span class="comments-link"><i class="fa fa-comments-o"></i><?php esc_html_e('With', 'unitedthemes') ?> <?php comments_popup_link(esc_html__('No Comments', 'unitedthemes'), esc_html__('1 Comment', 'unitedthemes'), esc_html__('% Comments', 'unitedthemes')); ?></span>
                
            <?php endif; ?>       
                
        </div>
        <!-- close entry-meta -->
            
    </div>
    
    <div class="clear"></div>
    
    <div class="grid-100 ut-blog-line"></div>
    
</article>
<!-- #post-<?php the_ID(); ?> -->