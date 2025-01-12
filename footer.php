<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package diligent
 */

?>
<div class="pg-footer">
    <div class="container">
        <footer class="footer">
            <div class="footer-content">
                
                <!-- Footer Column 1: Footer Logo -->
                <div class="footer-content-column">
                    <div class="footer-logo">
                        <?php if (is_active_sidebar('footer-column-1')) : ?>
                            <?php dynamic_sidebar('footer-column-1'); ?>
                        <?php else : ?>
                            <a class="footer-logo-link" href="#">
                                <img src="assets/img/footer-logo.png" alt="Footer Logo">
                            </a>
                            <p class="footer-menu-name">Smart Vending Better Inventory</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Footer Column 2: Company -->
                <div class="footer-content-column">
                    <div class="footer-menu">
                        <?php if (is_active_sidebar('footer-column-2')) : ?>
                            <?php dynamic_sidebar('footer-column-2'); ?>
                        <?php else : ?>
                            <div class="footer-widget">
                                <h2 class="footer-menu-name">Company</h2>
                                <ul>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Features</a></li>
                                    <li><a href="#">Works</a></li>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Footer Column 3: Resources -->
                <div class="footer-content-column">
                    <div class="footer-menu">
                        <?php if (is_active_sidebar('footer-column-3')) : ?>
                            <?php dynamic_sidebar('footer-column-3'); ?>
                        <?php else : ?>
                            <div class="footer-widget">
                                <h2 class="footer-menu-name">Resources</h2>
                                <ul>
                                    <li><a href="#">Products</a></li>
                                    <li><a href="#">Services</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Footer Column 4: Newsletter -->
                <div class="footer-content-column">
                    <?php if (is_active_sidebar('footer-column-4')) : ?>
                        <?php dynamic_sidebar('footer-column-4'); ?>
                    <?php else : ?>
                        <div class="footer-widget">
                            <h2 class="footer-call-to-action-title">Newsletter</h2>
                            <form action="" method="post">
                                <div class="mail-form">
                                    <div class="mail-form-wrap">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Icon.png" alt="" />
                                        <input type="email" name="email" class="mail-form-input" placeholder="Enter Your Email Name" />
                                    </div>
                                    <input type="submit" value="Subscribe Now" />
                                </div>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>

            </div>

            <!-- Footer Copyright Section -->
            <div class="footer-copyright">
                <div class="footer-copyright-wrapper">
                    <p class="footer-copyright-text">
                        <a class="footer-copyright-link" href="#">
                            © <?php echo esc_html(date('Y')); ?>, All Rights Reserved
                        </a>
                    </p>
                </div>
            </div>

        </footer>
    </div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
