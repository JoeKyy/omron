<?php
    /* Template Name: Home Page Template */
    get_header();
?>
    <main role="home">
        <section id="rotate" class="rotate">
            <?php
                $args = array(
                    'order'   => 'DESC',
                    'post_type' => 'carrousel',
                    'posts_per_page' => 3
                );
                $the_query = new WP_Query( $args );
                if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
            ?>
            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                <figure>
                    <a href="<?php echo get_post_meta(get_the_ID(), 'carrousel-url', true) ?>">
                        <?php $image_1920x520 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '1920x520' ); ?>
                        <?php $image_992x300 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '992x300' ); ?>
                        <?php $image_475x300 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '475x300' ); ?>
                        <picture>
                            <!-- <source media="(max-width: 768px)" srcset="<?php echo $image_992x300[0]; ?>"> -->
                            <source media="(max-width: 768px)" srcset="<?php echo $image_475x300[0]; ?>">
                            <img src="<?php echo $image_1920x520[0]; ?>" />
                        </picture>
                    </a>
                </figure>
            <?php endif; ?>
            <?php
                wp_reset_postdata();
                endwhile; endif;
            ?>
        </section>
        <?php if (have_posts()): while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
        <?php else: ?>
            <!-- article -->
            <article>
                <h2><?php _e( 'Sorry, nothing to display.', 'omron' ); ?></h2>
            </article>
            <!-- /article -->
        <?php endif; ?>
    </main>
<?php get_footer(); ?>
