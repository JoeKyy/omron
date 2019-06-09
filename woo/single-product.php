<?php get_header( 'shop' ); ?>
	<main role="page" class="product">
		<?php while ( have_posts() ) : the_post(); ?>

		<?php
			defined( 'ABSPATH' ) || exit;

			if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
				return;
			}

			global $product;

			$post_thumbnail_id = $product->get_image_id();
		?>
			<header>
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-6 col-12 p-0">
							<img src="<?php echo get_template_directory_uri(); ?>/images/img-header_product.png" alt="">
						</div>
						<div class="col-xl-6 col-12 align-self-center">
							<?php if ( $product->get_image_id() ) { ?>
							<?php $image_350x350 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '350x350' ); ?>
							<ul class="rotate">
								<li>
									<img class="mx-auto" src="<?php echo $image_350x350[0]; ?>" />
								</li>
							</ul>
							<p>
								<strong><?php the_title() ?></strong>
							</p>
							<?php } ?>
						</div>
					</div>
				</div>
				<nav>
					<ul>
						<li><a href="#produto">Produto</a></li>
						<li><a href="#onde-comprar">Onde comprar</a></li>
						<li><a href="#videos">Vídeos</a></li>
						<li><a href="#caracteristicas">Características</a></li>
						<li><a href="#acessorios">Acessórios</a></li>
						<li><a href="#suporte">Suporte</a></li>
					</ul>
					<select>
						<option value="produto.html#produto">Produto</option>
						<option value="produto.html#onde-comprar">Onde comprar</option>
						<option value="produto.html#videos">Vídeos</option>
						<option value="produto.html#caracteristicas">Características</option>
						<option value="produto.html#acessorios">Acessórios</option>
						<option value="produto.html#suporte">Suporte</option>
					</select>
				</nav>
			</header>
			<article>
				<section id="produto" class="productAbout">
					<div class="bg--light-darken">
						<div class="container">
							<div class="row py-5">
								<div class="col-xl-12">
									<?php echo get_the_content(); // WPCS: XSS ok. ?>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section id="onde-comprar" class="productBuy">
					<div class="bg--dark-base text--light-base pt-3 pb-5">
						<div class="container">
							<div class="row">
								<div class="col-xl-6">
									<div class="row">
										<div class="col-xl-11">
											<div class="row">
												<div class="col-xl-12">
													<h3 class="text-size-medium-2 text-uppercase">Comprar online</h3>
												</div>
											</div>
											<div class="row">
												<div class="col-xl-12 my-4">
													<ul class="slide">
														<li>
															<div class="mx-2">
																<img class="mx-auto" src="https://placehold.it/160x30" alt="">
															</div>
														</li>
														<li>
															<div class="mx-2">
																<img class="mx-auto" src="https://placehold.it/160x30" alt="">
															</div>
														</li>
														<li>
															<div class="mx-2">
																<img class="mx-auto" src="https://placehold.it/160x30" alt="">
															</div>
														</li>
														<li>
															<div class="mx-2">
																<img class="mx-auto" src="https://placehold.it/160x30" alt="">
															</div>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-6">
									<div class="row">
										<div class="col-xl-12">
											<h3 class="text-size-medium-2 text-uppercase">Compre na loja física mais próxima</h3>
										</div>
									</div>
									<div class="row">
										<div class="col-xl-12">
											<form action="">
												<div class="form-group search">
													<input class="text--light-base text-size-medium-2" type="search" placeholder="Digite seu CEP ou cidade" name="busca">
													<span>Buscar</span>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section id="videos" class="productVideo">
					<div class="container">
						<div class="row my-5">
							<div class="col-xl-12">
								<div class="row">
									<div class="col-xl-12">
										<h3 class="h4 mt-0 text-uppercase">Videos</h3>
									</div>
								</div>
								<div class="row">
									<?php
										$tabs = apply_filters( 'woocommerce_product_tabs', array() );
										if ( ! empty( $tabs ) ) :
											foreach ( $tabs as $key => $tab ) :
													if ( $tab['title'] === "Videos" ) {
														call_user_func( $tab['callback'], $key, $tab );
													}
											endforeach;
										endif;
									?>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section id="avaliacoes" class="productReview">
					<div class="bg--light-darken pt-3 pb-5">
						<div class="container">
							<div class="row my-2">
								<div class="col-xl-12">
									<div class="row mb-3">
										<div class="col-xl-12">
											<h3 class="h4 text-uppercase">Avaliacões do Produto</h3>
										</div>
									</div>
									<div class="row mb-5">
										<div class="col-xl-12">
											<?php comments_template( '', true); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section id="caracteristicas" class="productFeature">
					<div class="container">
						<div class="row my-5">
							<div class="col-xl-12">
								<div class="row">
									<div class="col-xl-12">
										<h3 class="h4 mt-0 mb-4 text-uppercase">Características</h3>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-12">
										<div class="table-responsive">
											<table class="table table-striped">
												<?php
													global $product;
													do_action( 'woocommerce_product_additional_information', $product );
												?>
											</table>
										</div>
									</div>
								</div>
								<div class="row mt-4">
									<div class="col-xl-12">
										<p class="mb-2">
											<strong>Conteúdo da Embalagem:</strong>
										</p>
										<?php
											$tabs = apply_filters( 'woocommerce_product_tabs', array() );
											if ( ! empty( $tabs ) ) :
												foreach ( $tabs as $key => $tab ) :
														if ( $tab['title'] === "Conteúdo da Embalagem" ) {
															call_user_func( $tab['callback'], $key, $tab );
														}
												endforeach;
											endif;
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section id="acessorios" class="productLike">
					<div class="bg--dark-base text--light-base pt-3 pb-5">
						<div class="container">
							<div class="row mb-3">
								<div class="col-xl-12">
									<h3 class="h4 text-uppercase">Acessórios compatíveis</h3>
								</div>
							</div>
							<div class="row mb-3">
								<?php
									woocommerce_upsell_display();
								?>
							</div>
						</div>
					</div>
				</section>
				<section id="suporte" class="productSupport">
					<div class="bg--light-darken pt-3 pb-5">
						<div class="container">
							<div class="row my-2">
								<div class="col-xl-12">
									<div class="row mb-3">
										<div class="col-xl-12">
											<h3 class="h4 text-uppercase">Suporte</h3>
										</div>
									</div>
									<div class="row">
										<div class="col-xl-12">
											<?php
												$tabs = apply_filters( 'woocommerce_product_tabs', array() );
												if ( ! empty( $tabs ) ) :
													foreach ( $tabs as $key => $tab ) :
															if ( $tab['title'] === "Validações" ) {
																call_user_func( $tab['callback'], $key, $tab );
															}
													endforeach;
												endif;
											?>
										</div>
									</div>
									<div class="row">
										<div class="col-xl-12">
											<?php
												$tabs = apply_filters( 'woocommerce_product_tabs', array() );
												if ( ! empty( $tabs ) ) :
													foreach ( $tabs as $key => $tab ) :
															if ( $tab['title'] === "Manuais" ) {
																call_user_func( $tab['callback'], $key, $tab );
															}
													endforeach;
												endif;
											?>
										</div>
									</div>
									<div class="row mt-2">
										<div class="col-xl-12">
											<p class="mb-3"><strong>Encontre uma assistência perto de você</strong></p>
											<form action="">
												<div class="form-group search">
													<input type="search" placeholder="Procure por assistências próximas" name="busca">
													<span>Buscar</span>
												</div>
											</form>
										</div>
									</div>
									<div class="row mt-5">
										<div class="col-xl-6">
											<p>
												Em caso de dúvidas, entre em contato com nosso SAC:<br />
												<strong>Telefone: 0800- 771-6907</strong><br />
												Grande São Paulo e telefone móveis:<br />
												<strong>Telefone: 11 2336-8044</strong>
											</p>
											<p class="text-size-medium"><strong>Atendimento de segunda a sexta feira, das 8h as 19h</strong></p>
										</div>
										<div class="col-xl-6">
											<p class="mb-3">Se preferir, entre em contato com o SAC por email.</p>
											<p><a href="" class="btn btn-primary text-uppercase">Entre em contato</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<?php
				/**
				 * Hook: woocommerce_after_single_product_summary.
				 *
				 * @hooked woocommerce_output_product_data_tabs - 10
				 * @hooked woocommerce_upsell_display - 15
				 * @hooked woocommerce_output_related_products - 20
				 */
				//do_action( 'woocommerce_after_single_product_summary' );
				?>
			</article>

		<?php endwhile; // end of the loop. ?>
	</main>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
