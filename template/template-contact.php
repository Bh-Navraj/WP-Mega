<?php
/*
Template Name: Contact Template
*/
get_header(); // Include the header
?>


<div class="main-content inner-page">
    <section class="hero">
        <?php
        // Fetch the Customizer values
        $innerbanner_image = get_theme_mod('inner_banner_image');
        $map_url = get_theme_mod('contact_map');
        ?>

        <div class="hero-banner inner-hero-banner d-flex align-center justify-start" style="background-image: url('<?php echo esc_url($innerbanner_image); ?>');">
            <div class="container">
                <div class="hero-inerbanner-content">
                <?php 
                    $title = get_the_title(); 
                    if ($title): 
                    ?>
                        <h1><?php echo esc_html($title); ?></h1>
                    <?php endif; ?>
                </div>
            </div><!-- container end -->
        </div>
    </section>
    <section class="content">
        <div class="container">
             <div class="content-dec">
                <?php if (the_content()): ?>
                    <?php the_content() ?>
                <?php endif; ?>    
             </div>
             
            <?php
                if ($map_url) : 
                    ?>
                        <div class="contact-map">
                            <iframe 
                                src="<?php echo esc_url($map_url); ?>" 
                                width="100%" 
                                height="450" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    <?php 
                    endif; 
                ?>
            
        </div><!-- Container end-->
    </section>
</div>
<?php get_footer(); // Include the footer 
?>