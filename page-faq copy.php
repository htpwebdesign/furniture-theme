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
					$heading = get_sub_field('heading');
					$content = get_sub_field('content');

					if ($heading && $content) { ?>
						<article class="accordion-wrapper">
							<button class="accordion"><?php echo esc_html($heading); ?></button>
							<div class="accordion-content">
								<p><?php echo esc_html($content); ?></p>
							</div>
						</article>
	<?php }
				}
			endwhile;

		//end if
		endif;
	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
get_footer();
