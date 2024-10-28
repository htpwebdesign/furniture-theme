<?php
/**
 * The template for the about page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Furniture_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) : the_post();  ?>
			<header class='hero-banner about-banner half-banner'>
				<div class="banner-content">
					<h1><?php the_title(); ?></h1>
				</div>
				<?php if (function_exists('the_field')): ?>
					<?php if (get_field('hero_banner')): ?>	
						<?php $image = get_field('hero_banner');
							$size = 'full';
							if($image){
								echo wp_get_attachment_image($image,$size);
							}
						?>
				<?php endif; ?>
			</header>
				<?php if ( get_field('about_fields') ): ?>	
					<?php
						if ( have_rows('about_fields') ):?>
							<div class="about-section-container">
								<?php while ( have_rows('about_fields') ) : the_row();
									$heading_value = get_sub_field('heading'); ?>
										<section class="about-section" >
												<div class="about-section-text">
													<h2><?php echo esc_attr($heading_value); ?></h2>
													<?php
													$content_value = get_sub_field('content'); ?>
													<p><?php echo esc_attr($content_value); ?></p>
													<?php get_template_part('template-parts/cta');?>
												</div>
												<div class="about-section-img">
													<?php
													$image_value = get_sub_field('image');
													$size = 'full';
													if($image){
														echo wp_get_attachment_image($image_value,$size);
													}
													?>
												</div>
										</section>
										<?php
								endwhile; ?>
							</div>
						<?php endif;
				 endif; 
			 endif; 
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
