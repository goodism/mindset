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
 * @package FWD_Starter_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php

        // nav

        $args = array(
            'post_type'      => 'fwd-service',
            'posts_per_page' => -1,
            'order'          => 'ASC',
            'orderby'        => 'title'
        );
         
        $query = new WP_Query( $args );
         
        if ( $query -> have_posts() ) {
         echo '<nav>';
            while ( $query -> have_posts() ) {
                $query -> the_post();
                echo '<a href="#'. esc_attr( get_the_ID() ) .'">'. esc_html( get_the_title() ) .'</a>';
            }
            wp_reset_postdata();
            echo '</nav';
        }

        // end nav


		while ( have_posts() ) : the_post(); ?>


            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <header class="entry-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header>

            <div class="entry-content">
                <?php the_content(); ?>

                <?php // Add WP_Query() code here... ?>

            <?php    $args = array(
	
    'post_type'      => 'fwd-service',
	
    'posts_per_page' => -1,
	
    'order'          => 'ASC',
	
    'orderby'        => 'title'
	
);
	
$query = new WP_Query( $args );
	
 
	
if ( $query -> have_posts() ) {
	
    while ( $query -> have_posts() ) {
	
        $query -> the_post();
	
 
	
        echo '<a href="#'. esc_attr( get_the_ID() ) .'">'. esc_html( get_the_title() ) .'</a>';
	
 
	
    }
	
    wp_reset_postdata();
	
}
 
// 








// 
	
$query = new WP_Query( $args );
	
 
	
if ( $query -> have_posts() ){
	
    while ( $query -> have_posts() ) {
	
        $query -> the_post();
	
 
	
        if ( function_exists( 'get_field' ) ) {
	
            if ( get_field( 'service_text' ) ) {
	
                echo '<h2 id="'. esc_attr( get_the_ID() ) .'">'. esc_html( get_the_title() ) .'</h2>';	
                the_field( 'service_text' );
	
            }
	
        }
	
 
	
    }
	
    wp_reset_postdata();
	
}
?>
            </div>

            <?php get_template_part( 'template-parts/work-categories' ); ?>

        </article>

    




<?
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		
			


		endwhile; // End of the loop.
		?>






	</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
