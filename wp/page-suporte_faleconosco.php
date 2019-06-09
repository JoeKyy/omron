<?php
    /* Template Name: Suporte (fale conosco) */

    get_header();
?>

<main role="page">
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<!-- post thumbnail -->
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
		<?php $image_1920x520 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '1920x520' ); ?>
		<?php $image_992x300 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '992x300' ); ?>
		<?php $image_475x300 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '475x300' ); ?>
		<header>
            <figure>
                <picture>
					<!-- <source media="(max-width: 768px)" srcset="<?php echo $image_992x300[0]; ?>"> -->
					<source media="(max-width: 768px)" srcset="<?php echo $image_475x300[0]; ?>">
					<img src="<?php echo $image_1920x520[0]; ?>" />
				</picture>
				<figcaption>
                    <h2 class="h1 text--dark-base">
                        Tenha mais informações sobre seus produtos.
                    </h2>
                </figcaption>
            </figure>
		</header>
		<?php endif; ?>
		<!-- /post thumbnail -->
		<!-- article -->
		<article>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <?php the_content(); // Dynamic Content ?>
                    </div>
                </div>
            </div>
        </article>
		<!-- /article -->
	<?php endwhile; ?>
	<?php else: ?>
		<!-- article -->
		<article>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
						<p><?php _e( 'Sorry, nothing to display.', 'omron' ); ?></p>
                    </div>
                </div>
            </div>
        </article>
		<!-- /article -->
	<?php endif; ?>
	</main>

<?php get_footer(); ?>
