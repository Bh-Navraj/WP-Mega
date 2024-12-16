<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nepalmega
 */

get_header();
?>

<div class="main-content inner-page">
	<section class="hero">
        <?php
        // Fetch the Customizer values
        $innerbanner_image = get_theme_mod('inner_banner_image');
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
		</div>
	</section>	

</div><!-- main-content end -->		 

<?php
get_footer();
