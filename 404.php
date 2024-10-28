<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Furniture_Theme
 */

 get_header();
 ?>
 
 <main id="primary" class="site-main page-404">
	 <section class="error-404 not-found">
		 <h1 class="page-title"><?php esc_html_e( 'Oops! Page Not Found.', 'furniture-theme' ); ?></h1>
		 
		 <p><?php esc_html_e( 'It looks like nothing was found at this location.', 'furniture-theme' ); ?></p>
 
		 <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			 <?php esc_html_e( 'Back to Home', 'furniture-theme' ); ?>
		 </a>
	 </section>
 </main>
 
 <?php
 get_footer();
 ?>