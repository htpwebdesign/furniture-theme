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

<main id="primary" class="site-main faq-main">

	<?php
	while (have_posts()) : the_post(); ?>

		<header class="faq-banner">
			<div class="banner-content">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</div>
		</header>
		
		<?php
		// Check both function and rows exists.
		if ( function_exists('have_rows')):
			if ( have_rows('faq') ): 

				// Since ACF 6.25 wp_kses is used on the_field/the_sub_field so no escaping needed.
					// Loop through rows.?>
					<section class="accordion-wrapper">
					<?php while ( have_rows('faq') ) : the_row(); 
						  if ( function_exists( 'get_sub_field' ) ) {
						
							 	if ( get_sub_field('heading') && get_sub_field('content')  ) { ?>
									<button class="accordion"><?php the_sub_field('heading'); ?></button>
									<article class="accordion-content">
										<?php the_sub_field('content'); ?>
									</article>
									<?php }
						}
							endwhile; ?>
					</section>
			<?php //end ifs
			endif;
		endif;
	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
get_footer();
