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
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'diligent' ); ?></a>

	<header class="diligent-site-header">
      <div class="humberger-menu">
        <div class="humberger-menu-line"></div>
        <div class="humberger-menu-line"></div>
        <div class="humberger-menu-line"></div>
      </div>

      <div class="main-menu">
        <nav>
		<?php
			wp_nav_menu(array(
			'theme_location' => 'main_menu', 
			'container' => false,
			'items_wrap' => '<ul>%3$s</ul>',
			));
		?>
        </nav>
      </div>
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
      <div class="right-menu">
        <div class="btn-block">
          <a href="#">Contact Us</a>
        </div>
      </div>
    </header>