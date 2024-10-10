<?php
get_header();
?>

<div class="contact-page">
    <div class="contact-info">
        <h2>Company Contact Information</h2>
        <div class="contact-details">
            <p><?php the_field('address'); ?></p>
            <p>Phone: <?php the_field('phone_number'); ?></p>
            <p>Email: <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></p>
        </div>

        <?php $images = get_field('images'); ?>

        <?php if( $images ): ?>
        <div class="gallery">
            <ul>
                <?php foreach( $images as $image ): ?>
                    <li class="gallery-item">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">

                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php else: ?>
            <p>No image in the gallery.</p>
        <?php endif; ?>
    </div>

    <div class="contact-form">
        <h3>Contact Form</h3>
        <?php echo do_shortcode('[gravityform id="1" title="true"]'); ?>
    </div>
</div>

<?php
get_footer();
?>
