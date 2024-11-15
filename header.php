<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Furniture_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class("preload"); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'furniture-theme' ); ?></a>

	<header id="masthead" class="site-header" class="preload">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$furniture_theme_description = get_bloginfo( 'description', 'display' );
			if ( $furniture_theme_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $furniture_theme_description; ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
		     <?php
			 wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
				
			if ( function_exists( 'furniture_theme_woocommerce_header_cart' ) ) {
						furniture_theme_woocommerce_header_cart();
					}
				?>
			
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="mobile menu toggle">
				<svg class="icon-menu" width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M4 7L7 7M20 7L11 7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
					<path d="M20 17H17M4 17L13 17" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
					<path d="M4 12H7L20 12" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
				</svg>
				<svg class="icon-close" width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: none;">
					<path d="M6 6L18 18" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
					<path d="M6 18L18 6" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
				</svg>
			</button>


		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
