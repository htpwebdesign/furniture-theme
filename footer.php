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
            <h3 >Customer Care</h3>
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
            <h3 style="font-weight: bold;">Company</h3>
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

    <!-- Second Section: Address Information -->
    <div class="footer-address">
        <address>
            123 Fake St. Vancouver, BC, V8X 1D9<br>
            555.555.5555<br>
            <a href="mailto:furniture@furniture.com">
                furniture@furniture.com
            </a>
        </address>
    </div>

    <!-- Third Section: Copyright -->
    <div class="footer-bottom">
        © <?php echo date('Y'); ?> Furniture Store | All Rights Reserved
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
