<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="container">
			<div class="row align-content-start">
				<!-- post thumbnail -->
				<?php if (has_post_thumbnail( $post->ID ) ): ?>
				<?php $image_550x340 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '550x340' ); ?>
				<div class="col-xl-auto pr-xl-5">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<img src="<?php echo $image_550x340[0]; ?>" />
					</a>
				</div>
				<?php endif; ?>
				<!-- /post thumbnail -->
				<div class="col-xl">
					<!-- post title -->
					<h3>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h3>
					<!-- /post title -->
					<!-- post details -->
					<!-- <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
					<span class="author"><?php _e( 'Published by', 'omron' ); ?> <?php the_author_posts_link(); ?></span>
					<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'omron' ), __( '1 Comment', 'omron' ), __( '% Comments', 'omron' )); ?></span> -->
					<!-- /post details -->
					<?php omromwp_excerpt(140,''); // Build your custom callback length in functions.php ?>
					<p>
						<a class="btn btn-primary btn-lg col-xl-4 text-uppercase" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							Leia mais
						</a>
					</p>
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
			<div class="row align-content-start">
				<div class="col-xl">
					<h3><?php _e( 'Sorry, nothing to display.', 'omron' ); ?></h3>
				</div>
			</div>
		</div>
	</article>
	<!-- /article -->

<?php endif; ?>