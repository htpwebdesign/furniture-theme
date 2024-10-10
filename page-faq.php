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
		while ( have_posts() ) :
			the_post();

	

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
