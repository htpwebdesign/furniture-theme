<?php

/**
 * The template for displaying the FAQ page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Furniture_Theme
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
	while (have_posts()) : the_post();

		//since ACF 6.25 wp_kses is used on get_field/sub_field so no escaping needed.

		// Check rows exists.
		if (have_rows('faq')):

			// Loop through rows.
			while (have_rows('faq')) : the_row();

				if (function_exists('get_sub_field')) {
					if (get_sub_field('heading')) { ?>
						<h3><?php the_sub_field('heading'); ?></h3> <?php }
																if (get_sub_field('content')) { ?>
						<p><?php the_sub_field('content'); ?></p> <?php }
															}


														// End loop.
														endwhile;
													//end if
													endif;
												endwhile; // End of the loop.
																	?>

</main><!-- #main -->

<?php
get_footer();
