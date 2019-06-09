<?php get_header(); ?>

	<main role="main">
		<header>
            <figure>
                <picture>
                    <!-- source srcset="<?php echo get_template_directory_uri(); ?>images/img-header_dicas-992x300.jpg" media="(max-width: 992px)"> -->
                    <source srcset="<?php echo get_template_directory_uri(); ?>/images/img-header_dicas-475x300.jpg" media="(max-width: 768px)">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/img-header_dicas-1920x520.jpg" alt="" />
                </picture>
                <figcaption>
                    <h2 class="h1 text--light-base">
                        Tudo para você viver melhor.
                    </h2>
                </figcaption>
            </figure>
		</header>
		<!-- section -->
		<section>
			<div class="container">
				<div class="row align-content-start">
					<div class="col-xl">
						<h2><?php echo sprintf( __( '%s Search Results for ', 'omron' ), $wp_query->found_posts ); echo get_search_query(); ?></h2>
					</div>
				</div>
			</div>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
