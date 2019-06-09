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
                    <h2 class="h1 text--light-base">
                        Tudo para você viver melhor.
                    </h2>
                </figcaption>
            </figure>
		</header>
		<nav>
            <ul>
                <li><a <?php if( is_category('Saúde e bem-estar') ) { echo 'class="selected"'; } ?> href="<?php echo get_site_url(); ?>/category/saude-e-bem-estar/">Saúde e bem-estar</a></li>
                <li><a <?php if( is_category('Alimentação') ) { echo 'class="selected"'; } ?> href="<?php echo get_site_url(); ?>/category/alimentacao/">Alimentação</a></li>
                <li><a <?php if( is_category('Fitness') ) { echo 'class="selected"'; } ?> href="<?php echo get_site_url(); ?>/category/fitness/">Fitness</a></li>
                <li><a <?php if( is_category('Evento Zero') ) { echo 'class="selected"'; } ?> href="<?php echo get_site_url(); ?>/category/evento-zero/">Evento Zero</a></li>
            </ul>
            <select>
                <option selected="selected">Menu</option>
                <option value="<?php echo get_site_url(); ?>/category/saude-e-bem-estar/">Saúde e bem-estar</option>
                <option value="<?php echo get_site_url(); ?>/category/alimentacao/">Alimentação</option>
                <option value="<?php echo get_site_url(); ?>/category/fitness/">Fitness</option>
                <option value="<?php echo get_site_url(); ?>/category/evento-zero/">Evento Zero</option>
            </select>
        </nav>
		<!-- section -->
		<section>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>