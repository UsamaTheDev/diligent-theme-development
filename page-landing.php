<?php
/**
 * Template Name: Landing Page
 */
get_header();
?>

<div class="hero">
    <div class="bg-image">
        <?php 
        $hero_image = get_field('hero_background');
        if ($hero_image) : ?>
            <img src="<?php echo esc_url($hero_image); ?>" alt="" />
        <?php else : ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/hero.jpg" alt="" />
        <?php endif; ?>
    </div>
    <div class="container">
        <div class="hero-content">
            <div class="content">
                <h1>
                    <?php 
                    $hero_heading = get_field('hero_heading');
                    echo esc_html($hero_heading ? $hero_heading : 'Smarter Vending, Better Inventory');
                    ?>
                </h1>
            </div>
            <div class="industry">
                <?php
                $args = [
                    'post_type' => 'services',
                    'posts_per_page' => 2,
                ];
                $services_query = new WP_Query($args);

                if ($services_query->have_posts()) :
                    while ($services_query->have_posts()) : $services_query->the_post(); ?>
                        <div class="img-with-content">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
                            <?php endif; ?>
                            <div class="text">
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_excerpt(); ?></p>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="af-hero">
        <div class="af-wrapper">
            <div class="left-block">
                <h2>
                    <?php 
                    $after_hero_title = get_field('after_hero_title');
                    echo $after_hero_title ? $after_hero_title : 'WHO <span>WE ARE </span>';
                    ?>
                </h2>
                <img src="<?php 
                    $after_hero_image = get_field('after_hero_image');
                    echo $after_hero_image 
                        ? esc_url($after_hero_image) 
                        : get_template_directory_uri() . '/assets/img/af-img.jpg';
                    ?>" 
                    alt="About Us" />
            </div>
            <div class="right-block">
                <?php 
                $after_hero_content = get_field('after_hero_content');
                if ($after_hero_content) {
                    echo wp_kses_post($after_hero_content);
                } else { ?>
                    <p>Does your company struggle with stockouts, overconsumption, or even theft of inventory?</p>
                    <p>Are you forced to carry high levels of safety stock resulting in excessive inventory costs?</p>
                    <p>Are you constantly out of compliance because hazardous and flammable products are not properly stored?</p>
                <?php } ?>
            </div>
        </div>

        <div class="slider">
            <?php
            if (have_rows('slider_images')) :
                while (have_rows('slider_images')) : the_row();
                    $slider_image = get_sub_field('slider_image');
                    if ($slider_image) : ?>
                        <img src="<?php echo esc_url($slider_image['url']); ?>" alt="<?php echo esc_attr($slider_image['alt']); ?>" />
                    <?php endif;
                endwhile;
            else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/slide1 (1).jpg" alt="Slide 1" />
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/slide1 (1).jpg" alt="Slide 2" />
            <?php endif; ?>
        </div>
    </div>

    <div class="services">
        <h2>Our <span>Services</span></h2>
        <div class="column-block">
            <?php
            $args = [
                'post_type' => 'services',
                'posts_per_page' => 3,
                'post_status' => 'publish',
            ];
            $services_query = new WP_Query($args);

            if ($services_query->have_posts()) :
                while ($services_query->have_posts()) : $services_query->the_post(); ?>
                    <div class="column">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
                        <?php endif; ?>
                        <h4><?php the_title(); ?></h4>
                        <p><?php the_excerpt(); ?></p>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p><?php esc_html_e('No services found.', 'diligent'); ?></p>
            <?php endif; ?>
        </div>

        <div class="explore">
            <?php
            $explore_image = get_field('explore_image');
            $explore_title = get_field('explore_title');
            $explore_content = get_field('explore_content');
            $button_1_text = get_field('explore_button_1_text');
            $button_1_link = get_field('explore_button_1_link');
            $button_2_text = get_field('explore_button_2_text');
            $button_2_link = get_field('explore_button_2_link');

            if ($explore_image) : ?>
                <img src="<?php echo esc_url($explore_image); ?>" />
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/explore.png" alt="Explore" />
            <?php endif; ?>

            <div class="exp-content">
                <h2><?php echo $explore_title ?: "Explore Jak's Industrial Vending Solutions"; ?></h2>
                <p><?php echo $explore_content ?: 'Click on the + marks above to view how Jak’s industrial vending solutions can positively impact all aspects of your facility.'; ?></p>
                <div class="link">
                    <a href="<?php echo $button_1_link ? esc_url($button_1_link) : '#'; ?>">
                        <?php echo $button_1_text ?: 'Compare Solutions'; ?>
                    </a>
                    <a href="<?php echo $button_2_link ? esc_url($button_2_link) : '#'; ?>">
                        <?php echo $button_2_text ?: 'Inventory Software'; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="blocks">
        <!-- Left Block -->
        <div class="left-block">
            <h2>#1</h2>
            <h3><?php echo get_field('left_blocks_title') ?: 'We offer <span> Equipment Financing</span>'; ?></h3>
            <p><?php echo get_field('left_blocks_content') ?: 'We provide flexible equipment financing with zero upfront costs.'; ?></p>
            <div class="bl-link">
                <a href="<?php echo get_field('left_blocks_button_link') ?: '#'; ?>">
                    <?php echo get_field('left_blocks_button_text') ?: 'Learn More'; ?>
                </a>
            </div>
        </div>

        <!-- Right Block -->
        <div class="right-block">
            <h2>#2</h2>
            <h3><?php echo get_field('right_blocks_title') ?: 'We offer <span> Equipment Financing</span>'; ?></h3>
            <p><?php echo get_field('right_blocks_content') ?: 'We provide flexible equipment financing with zero upfront costs.'; ?></p>
            <div class="bl-link">
                <a href="<?php echo get_field('right_blocks_button_link') ?: '#'; ?>">
                    <?php echo get_field('right_blocks_button_text') ?: 'Explore Our Products'; ?>
                </a>
            </div>
        </div>
    </div>

    <div class="last-block">
        <?php if (get_field('last_block_image')) : ?>
            <img src="<?php echo esc_url(get_field('last_block_image')); ?>" />
        <?php else : ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/last-bock.jpg" alt="" />
        <?php endif; ?>

        <div class="content">
            <h2><?php echo get_field('last_block_title') ?: 'BEST IN WORLD <span>3 YEAR</span> COMPLETE <span>WARRANTY</span>'; ?></h2>
        </div>
    </div>
</div>

<?php get_footer(); ?>
