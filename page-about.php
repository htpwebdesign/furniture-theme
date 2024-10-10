<?php
/**
 * The template for displaying all pages
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
			<h1><?php the_title(); ?></h1>
			<?php if (function_exists('the_field')): ?>
				<?php if (get_field('hero_banner')): ?>	
					<?php $image = get_field('hero_banner');
							$size = 'full';
							if($image){
								echo wp_get_attachment_image($image,$size);
							}
					?>
				<?php endif; ?>
				<?php if (get_field('about_the_company')): ?>	
					<?php
						if(have_rows('about_the_company')):
							while(have_rows('about_the_company')) : the_row();
								$heading_value = get_sub_field('heading'); ?>
								<h2><?php echo esc_attr($heading_value); ?></h2>
								<?php
								$content_value = get_sub_field('content'); ?>
								<p><?php echo esc_attr($content_value); ?></p>
								<?php
								$image_value = get_sub_field('image'); 
								$size = 'full';
								if($image){
									echo wp_get_attachment_image($image_value,$size);
								}
							endwhile;
						endif;
					?>
				<?php endif; ?>
				<?php if (get_field('about_the_design_process')): ?>	
					<?php
						if(have_rows('about_the_design_process')):
							while(have_rows('about_the_design_process')) : the_row();
								$heading_value = get_sub_field('heading'); ?>
								<h2><?php echo esc_attr($heading_value); ?></h2>
								<?php
								$content_value = get_sub_field('content'); ?>
								<p><?php echo esc_attr($content_value); ?></p>
								<?php
								$image_value = get_sub_field('image'); 
								$size = 'full';
								if($image){
									echo wp_get_attachment_image($image_value,$size);
								}
							endwhile;
						endif;
					?>
				<?php endif; ?>
				<?php if (get_field('about_the_production_process')): ?>
					<?php
						if(have_rows('about_the_production_process')):
							while(have_rows('about_the_production_process')) : the_row();
								$heading_value = get_sub_field('heading'); ?>
								<h2><?php echo esc_attr($heading_value); ?></h2>
								<?php
								$content_value = get_sub_field('content'); ?>
								<p><?php echo esc_attr($content_value); ?></p>
								<?php
								$image_value = get_sub_field('image'); 
								$size = 'full';
								if($image){
									echo wp_get_attachment_image($image_value,$size);
								}
							endwhile;
						endif;
					?>
				<?php endif; ?>
			<?php endif; ?>
		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();