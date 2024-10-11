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
            </section>

            <!-- Home Gallery Section -->
            <section class="home-gallery">
                <h1>Our Awesome Company</h1>
                <p>Zombies reversus ab inferno, nam malum cerebro. De carne animata corpora quaeritis. Summus sit, morbo vel maleficia?</p>

                <?php $home_page_gallery = get_field('home_page_gallery'); ?>
                <?php if ($home_page_gallery): ?>
                    <div class="gallery">
                        <?php foreach ($home_page_gallery as $each_image): ?>
                            <article class="gallery-item">
                                <img src="<?php echo esc_url($each_image['url']); ?>" alt="<?php echo esc_attr($each_image['alt']); ?>">
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p>No image in the gallery.</p>
                <?php endif; ?>
            </section>

            <!-- Collections Section -->
            <section class="collections-section">
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

            <!-- Quote Section -->
            <section class="quote-section">
                <h1>Have a custom project in mind?</h1>
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
