<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package nepalmega
 */

get_header();
?>

	
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
					


					<?php
						while ( have_posts() ) :
							the_post();

						if ( 'post' === get_post_type() ) :
						?>
						<div class="entry-meta">
							<?php
								nepalmega_posted_on();
								nepalmega_posted_by();
							?>
						</div><!-- .entry-meta -->
					<?php endif; 
						endwhile;
					?>


                </div>
            </div><!-- container end -->
        </div>
    </section>

	<section class="content">
        <div class="container">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'nepalmega' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'nepalmega' ) . '</span> <span class="nav-title">%title</span>',
					)
				);

				// If comments are open or we have at least one comment, load up the comment template.
				// if ( comments_open() || get_comments_number() ) :
				// 	comments_template();
				// endif;

			endwhile; // End of the loop.
			?>

		</div>
	</section>


<?php
// get_sidebar();
get_footer();
