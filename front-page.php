<?php
/**
 * The template the home page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Furniture_Theme
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php while ( have_posts() ) : the_post(); ?>

        <h1><?php the_title(); ?></h1>

        <?php if (function_exists('the_field')): ?>

            <!-- Hero Banner Section -->
            <section class="hero-banner">
                <?php if (get_field('hero_banner')): ?>    
                    <?php 
                    $image = get_field('hero_banner');
                    $size = 'full';
                    if($image) {
                        echo wp_get_attachment_image($image, $size);
                    }
                    ?>
                <?php endif; ?>

                <!-- title and about -->
                <h1><?php echo esc_html(get_field('company_name') ); ?></h1>
                <p><?php echo esc_html(get_field('company_intro') ); ?></p>

            <!-- Collections CTA -->
                <?php if (get_field('collections_call_to_action')): ?>    
                    <?php
                    $link_collections = get_field('collections_call_to_action');

                    if ($link_collections):
                        $link_collections_url = $link_collections['url'];
                        $link_collections_title = $link_collections['title'];
                        $link_collections_target = $link_collections['target'] ? $link_collections['target'] : '_self';
                        ?>
                        <a class="button" href="<?php echo esc_url($link_collections_url); ?>" target="<?php echo esc_attr($link_collections_target); ?>">
                            <?php echo esc_html($link_collections_title); ?>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            </section>

        <!-- Featured In Section -->
             <aside class="featured-in-section">
                <?php $featured_in_gallery = get_field('featured_in_gallery'); ?>
                <?php if ($featured_in_gallery): ?>
                    <div class="gallery">
                        <?php foreach ($featured_in_gallery as $feature_image_id): ?>
                            <article class="gallery-item">
                               <?php echo wp_get_attachment_image($feature_image_id, 'full'); ?>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                </aside>

            <!-- Explore our Collections Section-->
        <?php
                $terms = get_terms(
			array(
				'taxonomy' => 'product_cat',
				'hide_empty' => true,
			)
		);

		//only run if there are terms and isn't an error is_wp_error
		if ($terms && ! is_wp_error($terms)) : ?>
			<section class="collections-page">
				<h2>Explore our Collections</h2>
				<?php foreach ($terms as $term) : ?>

					<article class="single-collection-container">
						<!-- here we can pass the entire $term object into this function and it knows what to do to get our link -->
						<a href="<?php echo get_term_link($term); ?>">
							<!-- here were getting the name out of the $term object to display as the text displayed by the A tag -->
							<?php echo esc_html($term->name);


							$thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
							if ($thumbnail_id) {
								echo wp_get_attachment_image($thumbnail_id, 'full');
							} ?>
						</a>
					</article>
				<?php endforeach; ?>
			</section>
		<?php endif; ?>

          <!-- Home Gallery Section -->
            <section class="home-gallery">
            
                <?php $home_page_gallery = get_field('home_page_gallery'); ?>
                <?php if ($home_page_gallery): ?>
                    <div class="gallery">
                        <?php foreach ($home_page_gallery as $each_image_id): ?>
                            <article class="gallery-item">
                                <?php echo wp_get_attachment_image($each_image_id, 'full'); ?>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                            <!-- Get a Quote CTA -->
                <h2>Have a custom project in mind?</h2>
                <?php if (get_field('request_quote_call_to_action')): ?>    
                    <?php
                    $request_quote = get_field('request_quote_call_to_action');

                    if ($request_quote):
                        $request_quote_url = $request_quote['url'];
                        $request_quote_title = $request_quote['title'];
                        $request_quote_target = $request_quote['target'] ? $request_quote['target'] : '_self';
                        ?>
                        <a class="button" href="<?php echo esc_url($request_quote_url); ?>" target="<?php echo esc_attr($request_quote_target); ?>">
                            Request a quote
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            </section>

        <?php endif; ?>
        
    <?php endwhile; // End of the loop. ?>

</main><!-- #main -->

<?php get_footer(); ?>
