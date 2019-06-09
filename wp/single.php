<?php get_header(); ?>

	<main role="single">
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
				</figure>
			</header>
			<?php endif; ?>
			<!-- /post thumbnail -->
			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="container">
					<div class="col-xl-11 mx-auto">
						<!-- post title -->
						<header>
							<h2><?php the_title(); ?></h2>
							<!-- post details -->
							<!-- <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
							<span class="author"><?php _e( 'Published by', 'omron' ); ?> <?php the_author_posts_link(); ?></span>
							<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'omron' ), __( '1 Comment', 'omron' ), __( '% Comments', 'omron' )); ?></span> -->
							<!-- /post details -->
						</header>
						<!-- /post title -->
						<?php the_content(); // Dynamic Content ?>
						<?php //the_tags( __( 'Tags: ', 'omron' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>
						<!-- <p><?php //_e( 'Categorised in: ', 'omron' ); the_category(', '); // Separated by commas ?></p> -->
						<!-- <p><?php //_e( 'This post was written by ', 'omron' ); the_author(); ?></p> -->
						<?php //edit_post_link(); // Always handy to have Edit Post Links available ?>
						<?php //comments_template(); ?>
			</article>
			<!-- /article -->
		<?php endwhile; ?>
		<?php else: ?>
			<!-- article -->
			<article>
				<header>
					<h1><?php _e( 'Sorry, nothing to display.', 'omron' ); ?></h1>
				</header>
			</article>
			<!-- /article -->
		<?php endif; ?>
	</main>

<?php get_footer(); ?>
