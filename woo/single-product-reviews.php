<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews" class="woocommerce-Reviews">
	<div id="comments">

		<?php if ( have_comments() ) : ?>
			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links(
					apply_filters(
						'woocommerce_comment_pagination_args',
						array(
							'prev_text' => '&larr;',
							'next_text' => '&rarr;',
							'type'      => 'list',
						)
					)
				);
				echo '</nav>';
			endif;
			?>
		<?php else : ?>
			have_comments => <?php print have_comments() ?><br />
			get_comment_pages_count => <?php print get_comment_pages_count() ?><br />
			get_option => <?php print get_option( 'page_comments' )  ?><br />

			<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'woocommerce' ); ?></p>
		<?php endif; ?>
	</div>


	<h3 class="h4 text-uppercase">Envie sua avaliação</h3>
	<p>Gostou do produto? Sua opinião é fundamental para melhorarmos sempre.</p>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
				$commenter = wp_get_current_commenter();

				$comment_form = array(
					/* translators: %s is product title */
					'title_reply'         => "", //have_comments() ? __( 'Add a review', 'woocommerce' ) : sprintf( __( 'Be the first to review &ldquo;%s&rdquo;', 'woocommerce' ), get_the_title() ),
					/* translators: %s is product title */
					'title_reply_to'      => "", //__( 'Leave a Reply to %s', 'woocommerce' ),
					'title_reply_before'  => "", //'<span id="reply-title" class="comment-reply-title">',
					'title_reply_after'   => "", //'</span>',
					'comment_notes' 	  => "", //'',
					'comment_notes_after' => "", //'',
					'fields'              => array(
						'author' => '
									<!--
										<p class="comment-form-author"><label for="author">' . esc_html__( 'Name', 'woocommerce' ) . '&nbsp;<span class="required">*</span></label> ' .
										'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" required /></p>
									/-->
									',
						'email'  => '
									<!--
									<p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'woocommerce' ) . '&nbsp;<span class="required">*</span></label> ' .
									'<input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" required /></p>
									/-->
									',
					),
					'label_submit'        => __( 'Submit', 'woocommerce' ),
					'logged_in_as'        => '',
					'comment_field'       => '',
				);

				if ( wc_review_ratings_enabled() ) {
					$comment_form['comment_field'] = '
					';
				}

				$comment_form['comment_field'] .= '
					<div class="row">
						<div class="col-xl-8">
							<p class="comment-form-comment">
								<textarea placeholder="Deixe aqui seu comentário" id="comment" name="comment" rows="12" required></textarea>
							</p>
						</div>
						<div class="col-xl-4">
							<div class="row">
								<div class="col-xl-12">
									<p class="comment-form-author">' .
										'<input placeholder="' . esc_html__( 'Name', 'woocommerce' ) . '" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" required />
									</p>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-12">
									<p class="comment-form-email">' .
										'<input placeholder="' . esc_html__( 'Email', 'woocommerce' ) . '" id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" required />
									</p>
								</div>
							</div>
							<div class="row my-1">
								<div class="col-xl-12">
									<div class="comment-form-rating">
										<!-- <label for="rating">' . esc_html__( 'Your rating', 'woocommerce' ) . '</label> /-->
										<select name="rating" id="rating" required>
											<option value="">' . esc_html__( 'Rate&hellip;', 'woocommerce' ) . '</option>
											<option value="5">' . esc_html__( 'Perfect', 'woocommerce' ) . '</option>
											<option value="4">' . esc_html__( 'Good', 'woocommerce' ) . '</option>
											<option value="3">' . esc_html__( 'Average', 'woocommerce' ) . '</option>
											<option value="2">' . esc_html__( 'Not that bad', 'woocommerce' ) . '</option>
											<option value="1">' . esc_html__( 'Very poor', 'woocommerce' ) . '</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row my-3">
								<div class="col-xl-12">
									<div class="row">
										<div class="col-1 pr-0">
											<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes">
										</div>
										<div class="col">
											<label for="wp-comment-cookies-consent" class="font-weight-normal text-wrap text-size-small">
												Eu aceito receber a newsletter, ofertas, novidades e outras informações da OMRON Healthcare Brasil
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-12">
									<input class="btn btn-primary btn-lg text-size-small" name="submit" type="submit" id="submit" class="submit" value="Enviar">
								</div>
							</div>
						</div>
					</div>
				';

				comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>
	<?php else : ?>
		<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>
	<?php endif; ?>

	<div class="clear"></div>
</div>
