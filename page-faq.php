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
	while (have_posts()) : the_post(); ?>

		<header class="hero-banner faq-banner">
			<h1><?php the_title(); ?></h1>
		</header>
		
		<?php
		// Check both function and rows exists.
		if ( function_exists('have_rows')):
			if ( have_rows('faq') ): 

				// Since ACF 6.25 wp_kses is used on the_field/the_sub_field so no escaping needed.
					// Loop through rows.
					while ( have_rows('faq') ) : the_row(); 
						if ( function_exists( 'get_sub_field' ) ) {
						
							if ( get_sub_field('heading') && get_sub_field('content')  ) { ?>
							<article class="accordion-wrapper">
								<button class="accordion"><?php the_sub_field('heading'); ?></button>
								<div class="accordion-content">
									<?php the_sub_field('content'); ?>
								</div>
							</article>
							<?php }
						}
					endwhile;
			//end ifs
			endif;
		endif;
	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
get_footer();
