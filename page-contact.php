<?php
/**
 * The template for displaying the contact page and form
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Furniture_Theme
 */


get_header();
?>
<main id="primary" class="site-main">
    <?php while (have_posts()) : the_post(); ?>

        <?php if (function_exists('the_field')): ?>
            <section class="contact-page">
                <div class="contact-info">
                    <h1><?php the_title(); ?></h1>
                    <div class="contact-details">
                        <?php if (get_field('address')): ?>
                            <p><?php the_field('address'); ?></p>
                        <?php endif; ?>

                        <?php if (get_field('phone_number')): ?>
                            <p>Phone: <?php the_field('phone_number'); ?></p>
                        <?php endif; ?>

                        <?php if (get_field('email')): ?>
                            <p>Email: <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></p>
                        <?php endif; ?>
                    </div>
                    <?php $images = get_field('images'); ?>
                    <?php if ($images): ?>
                        <div class="gallery">
                            <?php foreach ($images as $image): ?>
                                <article class="gallery-item">
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                </article>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p>No image in the gallery.</p>
                    <?php endif; ?>
                </div>
            </section>
            <?php endif; ?>

            <section class="contact-form">
                <h3>Contact Form</h3>
                <?php echo do_shortcode('[gravityform id="1" title="true"]'); ?>
            </section>
</main>
<?php endwhile; ?>
<?php
get_footer();
