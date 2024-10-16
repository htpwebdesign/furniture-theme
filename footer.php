<?php 
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Furniture_Theme
 */

?>

<footer id="colophon" class="site-footer">
    <!-- First Section: Customer Care and Company -->
    <div class="footer-container" >
        <!-- Customer Care Section -->
        <div class="footer-column" >
            <h3>Customer Care</h3>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'footer_left',
                'menu_class'     => 'footer-menu',
                'container'      => 'ul',
                'fallback_cb'    => false,
            ) );
            ?>
        </div>

        <!-- Company Section -->
        <div class="footer-column" >
            <h3>Company</h3>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'footer_right',
                'menu_class'     => 'footer-menu',
                'container'      => 'ul',
                'fallback_cb'    => false,
            ) );
            ?>
        </div>
    </div>

    <?php if (function_exists('the_field')): ?>
    <!-- Second Section: Address Information -->
        <div class="footer-address">
            <address>
                <?php if (get_field('physical_address', 'option')): ?>
                    <p><?php the_field('physical_address', 'option'); ?></p>
                <?php endif; ?>
            </address>
                <?php if (get_field('email', 'option')): ?>
                    <a href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a>
                <?php endif; ?>
                <?php if (get_field('phone_number', 'option')): ?>
                    <a href=<?php the_field('phone_number', 'option'); ?>><?php the_field('phone_number', 'option'); ?></a>
                <?php endif; ?>
        </div>
    <?php endif; ?>
    <!-- Third Section: Copyright -->
    <div class="footer-bottom">
        <?php if (get_field('store_name', 'option')): ?>
            © <?php echo date('Y');?> <?php the_field('store_name', 'option'); ?> | All Rights Reserved
        <?php endif; ?>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>

