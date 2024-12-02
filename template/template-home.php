<?php
/*
Template Name: Home Template
*/
get_header(); // Include the header
?>


<div class="home-page">
    <section class="hero">
        <?php
            // Fetch the Customizer values
            $hero_image = get_theme_mod('hero_banner_image');
            $hero_title = get_theme_mod('hero_title');
            $hero_description = get_theme_mod('hero_description');
        ?>

        <div class="hero-banner d-flex align-center justify-start" style="background-image: url('<?php echo esc_url($hero_image); ?>');">
            <div class="container">    
                <div class="hero-content">
                    <?php if ($hero_title): ?>
                        <h1><?php echo esc_html($hero_title); ?></h1>
                    <?php endif; ?>

                    <?php if ($hero_description): ?>
                        <p><?php echo esc_html($hero_description); ?></p>
                    <?php endif; ?>
                </div>
            </div><!-- container end --> 
        </div>
    </section>
    <section class="content">
    <?php
    // The WordPress Query
    $args = array(
        'post_type'      => 'post', // Change 'post' to your custom post type if needed
        'posts_per_page' => 10,     // Number of posts to display
        'order'          => 'DESC', // Order by descending date
        'orderby'        => 'date'  // Order by date
    );

    $query = new WP_Query($args);

    // The Loop
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
    ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="post-meta">
                <span class="post-date"><?php echo get_the_date(); ?></span>
                <span class="post-author">By <?php the_author(); ?></span>
            </div>
            <div class="post-content">
                <?php the_excerpt(); ?>
            </div>
        </article>
    <?php
        endwhile;
    else :
    ?>
        <p>No posts found.</p>
    <?php
    endif;

    // Reset Post Data
    wp_reset_postdata();
    ?>
</section>
</div>
<?php get_footer(); // Include the footer ?>
