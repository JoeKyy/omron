<?php get_header(); ?>

	<main role="page" class="loop">
		<header>
            <figure>
                <picture>
                    <!-- source srcset="<?php echo get_template_directory_uri(); ?>images/img-header_dicas-992x300.jpg" media="(max-width: 992px)"> -->
                    <source srcset="<?php echo get_template_directory_uri(); ?>/images/img-header_dicas-475x300.jpg" media="(max-width: 768px)">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/img-header_dicas-1920x520.jpg" alt="" />
                </picture>
                <figcaption>
                    <h2 class="text-size-xxxbig text--light-base">
                        404
                    </h2>
                </figcaption>
            </figure>
		</header>
		<!-- section -->
		<section>

			<!-- article -->
			<article id="post-404">
				<div class="container">
					<div class="row align-content-start">
						<div class="col-xl">
							<h1><?php _e( 'Page not found', 'omron' ); ?></h1>
							<h3>
								<a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'omron' ); ?></a>
							</h3>
						</div>
					</div>
				</div>
			</article>
			<!-- /article -->

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
