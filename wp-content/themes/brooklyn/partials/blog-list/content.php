<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
    
    <div class="grid-45 tablet-grid-100 mobile-grid-100">
    
        <?php if ( unite_has_post_thumbnail() && ! post_password_required() ) : ?>
                                            
            <div class="ut-post-thumbnail">
                
                <div class="entry-thumbnail">
                
                    <a title="<?php printf(esc_html__('Permanent Link to %s', 'unitedthemes'), get_the_title()); ?>" href="<?php the_permalink(); ?>">
                    
                        <?php 
                                        
                            ut_create_picture( $post->ID, array( 
                                'desktop' => array( '756', '700' )
                            ) );
                        
                        ?>                
                        
                    </a>
                
                </div>  
                        
            </div>
            <!-- Close UT-post-thumbnail -->
        
        <?php endif; ?>
    
    </div>
    
    <div class="<?php echo unite_has_post_thumbnail() ? 'grid-55 ut-blog-list-content' : 'grid-100'; ?> tablet-grid-100 mobile-grid-100">
    
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
    
    
        <?php if( get_the_title() ) :?>
        
            <header class="entry-header clearfix">
            
                <div class="date-format hide-on-tablet hide-on-mobile">
                    <span class="day"><?php the_time('d'); ?></span>
                    <span class="month"><?php the_time('M'); ?> <?php the_time('Y'); ?></span>
                </div>
                        
                <h2 class="entry-title"><a title="<?php echo esc_attr( wp_strip_all_tags( get_the_title() ) ); ?>" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>          
                 
            </header>
            <!-- close entry-header -->
        
        <?php endif; ?>
        
        <div class="entry-meta clearfix">
        
            <span class="author-links"><i class="fa fa-user"></i><?php esc_html_e('By', 'unitedthemes') ?> <?php the_author_posts_link(); ?></span>
            
            <span class="date-format hide-on-desktop"><i class="fa fa-clock-o"></i><?php esc_html_e('On', 'unitedthemes') ?> <span><?php the_time( get_option('date_format') ); ?></span></span>
            
            <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
            
                <span class="comments-link"><i class="fa fa-comments-o"></i><?php esc_html_e('With', 'unitedthemes') ?> <?php comments_popup_link(esc_html__('No Comments', 'unitedthemes'), esc_html__('1 Comment', 'unitedthemes'), esc_html__('% Comments', 'unitedthemes')); ?></span>
                
            <?php endif; ?>       
                
        </div>
        <!-- close entry-meta -->
        
        <div class="entry-content clearfix">
            
            <?php echo unite_get_excerpt_by_id( $post, apply_filters( 'ut_blog_list_excerpt_length', ut_get_option( 'ut_blog_list_excerpt_length', 20 ) ) ); ?>
            
            <p><a class="more-link" title="<?php echo esc_attr( wp_strip_all_tags( get_the_title() ) ); ?>" href="<?php echo esc_url( get_permalink() ); ?>"><span class="more-link"><?php esc_html_e( 'Read more', 'unitedthemes' ); ?><i class="fa fa-chevron-circle-right"></i></span></a></p>
            
        </div>
        <!-- entry-content -->
    
    </div>
    
    <div class="clear"></div>
        
    <div class="grid-100 ut-blog-line"></div>
    
</article>
<!-- #post-<?php the_ID(); ?> -->