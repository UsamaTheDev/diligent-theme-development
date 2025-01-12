<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package diligent
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <div id="page" class="site">
        <header class="diligent-header">
            <div class="container">
                <div class="header-wrapper">
                    
                    <!-- Hamburger Menu -->
                    <div class="humberger-menu">
                        <div class="humberger-menu-line"></div>
                        <div class="humberger-menu-line"></div>
                        <div class="humberger-menu-line"></div>
                    </div>

                    <!-- Main Navigation Menu -->
                    <div class="main-menu">
                        <nav>
                            <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'main_menu', 
                                    'container' => false,
                                    'items_wrap' => '<ul>%3$s</ul>',
                                    'walker' => new Diligent_Walker_Nav_Primary(), // Use the custom nav walker class
                                ));
                            ?>
                        </nav>
                    </div>

                    <!-- Logo Section -->
                    <div class="logo">
                        <?php if (has_custom_logo()) : ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <?php the_custom_logo(); ?>
                            </a>
                        <?php else : ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Logo.png" alt="<?php bloginfo('name'); ?>" />
                            </a>
                        <?php endif; ?>
                    </div>

                    <!-- Right-side Menu (e.g., Contact Us button) -->
                    <div class="right-menu">
                        <div class="btn-block">
                            <a href="#">Contact Us</a>
                        </div>
                    </div>

                </div> <!-- End header-wrapper -->
            </div> <!-- End container -->
        </header>
