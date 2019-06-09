<?php
    /* Template Name: Quem somos */

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
                    <h2 class="h1 text--light-base">
						<?php the_title(); ?>
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
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <h6 class="h2 text--primary-base">Entre em contato conosco</h6>
                        <p class="text-size-medium-2"><strong>Informações sobre assistência técnica, onde comprar e produtos.</strong></p>
                        <p class="text-size-medium-2">
                            <a href="mailto:sac@omronbrasil.com">sac@omronbrasil.com</a><br /> Atendimento de segunda a sexta-feira, das 8h às 19h.<br /> Tel: <a href="tel:08007716907">0800-771-6907</a><br /> Grande São Paulo e telefones móveis<br />                            Tel: <a href="tel:1123368044">(11) 2336-8044</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
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