<?php
    /* Template Name: FAQ */

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
                        <h2 class="h3 text-uppercase">Tire suas dúvidas</h2>
                    </div>
                </div>
            </div>
            <div class="bg--dark-base text--light-base mt-4 py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="form-group col-xl-4">
                                    <div>
                                        <input class="form-check-input" checked type="radio" name="faq" id="faq0" value="monitores">
                                        <label class="form-check-label" for="faq0">
                                            Questões gerais
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-xl-4">
                                    <div>
                                        <input class="form-check-input" type="radio" name="faq" id="faq1" value="monitores">
                                        <label class="form-check-label" for="faq1">
                                            Monitores de Pressão Arterial
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-xl-4">
                                    <div>
                                        <input class="form-check-input" type="radio" name="faq" id="faq2" value="inaladores">
                                        <label class="form-check-label" for="faq2">
                                            Inaladores
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-xl-4">
                                    <div>
                                        <input class="form-check-input" type="radio" name="faq" id="faq3" value="active health">
                                        <label class="form-check-label" for="faq3">
                                            Active Health
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-xl-4">
                                    <div>
                                        <input class="form-check-input" type="radio" name="faq" id="faq4" value="alívio da dor">
                                        <label class="form-check-label" for="faq4">
                                            Alívio da dor - TENS
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-xl-4">
                                    <div>
                                        <input class="form-check-input" type="radio" name="faq" id="faq5" value="termometros">
                                        <label class="form-check-label" for="faq5">
                                            Termômetros
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

    <script type="text/javascript">
    (function ($, root, undefined) {

        $(function () {

            'use strict';

            $('#questoes-gerais').show();
            $('#monitores').hide();
            $('#inaladores').hide();
            $('#active-health').hide();
            $('#alivio-dor').hide();
            $('#termometros').hide();

            $('input[type="radio"]').click(function() {
                if($(this).attr('id') == 'faq0') {
                    $('#questoes-gerais').show();
                    $('#monitores').hide();
                    $('#inaladores').hide();
                    $('#active-health').hide();
                    $('#alivio-dor').hide();
                    $('#termometros').hide();
                } else if($(this).attr('id') == 'faq1') {
                    $('#questoes-gerais').hide();
                    $('#monitores').show();
                    $('#inaladores').hide();
                    $('#active-health').hide();
                    $('#alivio-dor').hide();
                    $('#termometros').hide();
                } else if($(this).attr('id') == 'faq2') {
                    $('#questoes-gerais').hide();
                    $('#monitores').hide();
                    $('#inaladores').show();
                    $('#active-health').hide();
                    $('#alivio-dor').hide();
                    $('#termometros').hide();
                } else if($(this).attr('id') == 'faq3') {
                    $('#questoes-gerais').hide();
                    $('#monitores').hide();
                    $('#inaladores').hide();
                    $('#active-health').show();
                    $('#alivio-dor').hide();
                    $('#termometros').hide();
                } else if($(this).attr('id') == 'faq4') {
                    $('#questoes-gerais').hide();
                    $('#monitores').hide();
                    $('#inaladores').hide();
                    $('#active-health').hide();
                    $('#alivio-dor').show();
                    $('#termometros').hide();
                } else if($(this).attr('id') == 'faq5') {
                    $('#questoes-gerais').hide();
                    $('#monitores').hide();
                    $('#inaladores').hide();
                    $('#active-health').hide();
                    $('#alivio-dor').hide();
                    $('#termometros').show();
                }
            });

        });

    })(jQuery, this);
    </script>

<?php get_footer(); ?>