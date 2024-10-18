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

<footer id="colophon" class="site-footer" 
style="background-image: url(
<?php if (get_field('footer_image', 'option')) :    
            the_field('footer_image', 'option');
    endif; ?>)">
    <div class="footer-wrapper">
        <!-- First Section: Customer Care and Company -->
        <div class="footer-nav-container" >
            <!-- Customer Care Section -->
            <nav class="footer-column" >
                <h3>Customer Care</h3>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer_left',
                    'menu_class'     => 'footer-menu',
                    'container'      => 'ul',
                    'fallback_cb'    => false,
                ) );
                ?>
            </nav>

            <!-- Company Section -->
            <nav class="footer-column" >
                <h3>Company Info</h3>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer_right',
                    'menu_class'     => 'footer-menu',
                    'container'      => 'ul',
                    'fallback_cb'    => false,
                ) );
                ?>
            </nav>
        </div>

        <?php if (function_exists('the_field')): ?>
        <!-- Second Section: Address Information -->
            <div class="footer-address">
                <address>
                        <?php if (get_field('google_maps_link', 'option')): ?>    
                            <?php
                            $link_google_map = get_field('google_maps_link', 'option');

                            if ($link_google_map):
                                $link_google_map_url = $link_google_map['url'];
                                $link_google_map_title = $link_google_map['title'];
                                $link_google_map_target = $link_google_map['target'] ? $link_google_map['target'] : '_self';
                                ?>
                                <a class="address-item" href="<?php echo esc_url($link_google_map_url); ?>" target="<?php echo esc_attr($link_google_map_target); ?>">
                                    <?php echo esc_html($link_google_map_title); ?>
                                </a>
                            <?php endif; 
                        endif; ?>
                </address>
                    <?php if (get_field('email', 'option')): ?>
                        <a class="address-item" href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a>
                    <?php endif; ?>
                    <?php if (get_field('phone_number', 'option')): ?>
                        <a class="address-item" href=tel:+<?php the_field('phone_number', 'option'); ?>><?php the_field('phone_number', 'option'); ?></a>
                    <?php endif; ?>
            </div>
        <?php endif; ?>
        <!-- Third Section: Copyright -->
        <hr class="solid">
        <div class="footer-bottom copyright-section">
            <?php if (get_field('store_name', 'option')): ?>
                <p class="copyright-text">© 2024 <?php the_field('store_name', 'option'); ?> | All Rights Reserved </p>
            <?php endif; ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>