<?php

/**
 * Customized for furniture Theme 
 * 
 * The Template for displaying product archives, including the main shop page which is a post type archive 
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

/**
 * Hook: woocommerce_shop_loop_header.
 *
 * @since 8.6.0
 *
 * @hooked woocommerce_product_taxonomy_archive_header - 10
 */
do_action('woocommerce_shop_loop_header');

if (woocommerce_product_loop()) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action('woocommerce_before_shop_loop');

	
	// custom code for shop page start here 
	
	if (is_tax()) {
		woocommerce_product_loop_start();
		
			if (wc_get_loop_prop('total')) {
				while (have_posts()) {
					the_post();

					/**
					 * Hook: woocommerce_shop_loop.
					 */
					do_action('woocommerce_shop_loop');

					wc_get_template_part('content', 'product');
				}
			}
			woocommerce_product_loop_end();
	} else {

		$terms = get_terms(
			array(
				'taxonomy' => 'product_cat',
				'hide_empty' => true,
			)
		);

		//only run if there are terms and isn't an error is_wp_error
		if ($terms && ! is_wp_error($terms)) : ?>
			<section class="collections-page">
				<h2>Explore our Collections</h2>
				<?php foreach ($terms as $term) : ?>

					<article class="single-collection-container">
						<!-- here we can pass the entire $term object into this function and it knows what to do to get our link -->
						<span><a href="<?php echo get_term_link($term); ?>">
							<!-- here were getting the name out of the $term object to display as the text displayed by the A tag -->
							<?php echo esc_html($term->name);?></span>


							<?php $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
							if ($thumbnail_id) {
								echo wp_get_attachment_image($thumbnail_id, 'full');
							} ?>
						</a>
					</article>
				<?php endforeach; ?>
			</section>
		<?php endif; ?>


<?php }



	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action('woocommerce_after_shop_loop');
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action('woocommerce_no_products_found');
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action('woocommerce_sidebar');

get_footer('shop');
