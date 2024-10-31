<?php

/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Furniture_Theme
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function furniture_theme_woocommerce_setup()
{
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 1920,
			'single_image_width'    => 1920,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	// add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'furniture_theme_woocommerce_setup');

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function furniture_theme_woocommerce_scripts()
{
	wp_enqueue_style('furniture-theme-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION);
}
add_action('wp_enqueue_scripts', 'furniture_theme_woocommerce_scripts');

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function furniture_theme_woocommerce_active_body_class($classes)
{
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter('body_class', 'furniture_theme_woocommerce_active_body_class');

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function furniture_theme_woocommerce_related_products_args($args)
{
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args($defaults, $args);

	return $args;
}
add_filter('woocommerce_output_related_products_args', 'furniture_theme_woocommerce_related_products_args');

/**
 * Remove default WooCommerce wrapper.
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

if (! function_exists('furniture_theme_woocommerce_wrapper_before')) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function furniture_theme_woocommerce_wrapper_before()
	{
?>
		<main id="primary" class="site-main">
		<?php
	}
}
add_action('woocommerce_before_main_content', 'furniture_theme_woocommerce_wrapper_before');

if (! function_exists('furniture_theme_woocommerce_wrapper_after')) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function furniture_theme_woocommerce_wrapper_after()
	{
		?>
		</main><!-- #main -->
	<?php
	}
}
add_action('woocommerce_after_main_content', 'furniture_theme_woocommerce_wrapper_after');

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'furniture_theme_woocommerce_header_cart' ) ) {
			furniture_theme_woocommerce_header_cart();
		}
	?>
 */

if (! function_exists('furniture_theme_woocommerce_cart_link_fragment')) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function furniture_theme_woocommerce_cart_link_fragment($fragments)
	{
		ob_start();
		furniture_theme_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter('woocommerce_add_to_cart_fragments', 'furniture_theme_woocommerce_cart_link_fragment');

if (! function_exists('furniture_theme_woocommerce_cart_link')) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function furniture_theme_woocommerce_cart_link()
	{
	?>
		<a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('View your shopping cart', 'furniture-theme'); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n('%d piece', '%d pieces', WC()->cart->get_cart_contents_count(), 'furniture-theme'),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="count"><?php echo esc_html($item_count_text); ?></span>
			<svg role="img" aria-label="Cart Icon" xmlns="http://www.w3.org/2000/svg" width="47.998" height="40.34">
				<g fill="#1a171b">
					<path d="M47.273 0h-6.544a.728.728 0 0 0-.712.58L38.63 7.219H.727a.727.727 0 0 0-.7.912l4.6 17.5c.006.021.019.037.026.059a.792.792 0 0 0 .042.094.747.747 0 0 0 .092.135.831.831 0 0 0 .065.068.626.626 0 0 0 .167.107.285.285 0 0 0 .045.029l13.106 5.145-5.754 2.184a4.382 4.382 0 1 0 .535 1.353l7.234-2.746 6.866 2.7A4.684 4.684 0 1 0 27.6 33.4l-5.39-2.113 13.613-5.164c.013-.006.021-.016.033-.021a.712.712 0 0 0 .188-.119.625.625 0 0 0 .063-.072.654.654 0 0 0 .095-.135.58.58 0 0 0 .04-.1.73.73 0 0 0 .033-.084l5.042-24.137h5.953a.728.728 0 0 0 0-1.455zM8.443 38.885a3.151 3.151 0 1 1 3.152-3.15 3.155 3.155 0 0 1-3.152 3.15zm23.1-6.3a3.151 3.151 0 1 1-3.143 3.149 3.155 3.155 0 0 1 3.148-3.152zM25.98 8.672l-.538 7.3H14.661l-.677-7.295zm-.645 8.75-.535 7.293h-9.328l-.672-7.293zM1.671 8.672h10.853l.677 7.3h-9.61zm2.3 8.75h9.362l.677 7.293H5.892zM20.2 30.5 9.175 26.17H31.6zm14.778-5.781h-8.722l.537-7.293h9.7zm1.822-8.752h-9.9l.537-7.295h10.889z" />
					<circle cx="8.443" cy="35.734" r=".728" />
					<circle cx="31.548" cy="35.734" r=".728" />
				</g>
			</svg>
		</a>
	<?php
	}
}

if (! function_exists('furniture_theme_woocommerce_header_cart')) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function furniture_theme_woocommerce_header_cart()
	{
		if (is_cart()) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
	?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr($class); ?>">
				<?php furniture_theme_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget('WC_Widget_Cart', $instance);
				?>
			</li>
		</ul>
<?php
	}
}

// ADD CUSTOM WOOCOMMERCE CODE DOWN HERE---------------------------------------------------------->

// making sure sidebar isn't displaying on shop, product, pages, etc.

remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

// getting rid of the product count, and product sorting by price, popularity, etc. 

remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

//removing "Add to Cart" or "Select Options" from single Collections page
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);


//removing the price from single collections page
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);


/**
 * Remove default WooCommerce breadcrumb from before main content
 */
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

/**
 * Add breadcrumb into the header using 'woocommerce_shop_loop_header' hook.
 */
add_action('woocommerce_archive_description', 'woocommerce_breadcrumb', 15);

/**
 *single product page hooks 
 */
//unsetting tabs
function remove_product_tabs($tabs)
{
	unset($tabs['description']);
	unset($tabs['reviews']);
	unset($tabs['additional_information']);
	return $tabs;
}
add_filter('woocommerce_product_tabs', 'remove_product_tabs', 98, 1);

//re adding product description and additional info
add_action('woocommerce_before_single_product_summary', 'woocommerce_product_description_tab', 25);
add_action('woocommerce_before_single_product_summary', 'woocommerce_product_additional_information_tab', 26);


//disabling bundle stuff
add_action('wp_enqueue_scripts', 'woocommerce_bundles_deregister_styles', 100);
function woocommerce_bundles_deregister_styles()
{
	wp_deregister_style('wc-bundle-css');
	wp_dequeue_style('wc-bundle-css');
}

