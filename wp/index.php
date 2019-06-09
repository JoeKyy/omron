<?php get_header(); ?>

	<main role="page" class="loop">
		<header>
			<div class="container">
				<div class="row align-content-start">
					<div class="col-xl mt-5">
						<h2><?php _e( 'Latest Posts', 'omron' ); ?></h2>
					</div>
				</div>
			</div>
		</header>
		<!-- section -->
		<section>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
