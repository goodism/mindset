<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php fwd_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fwd' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

    <main id="primary" class="site-main">
    <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header>
            <div class="entry-content">
                <?php // ACF code goes here ?>
                <div class="entry-content">
    <?php 
    if ( function_exists ( 'get_field' ) ) {
        if ( get_field( 'test_intro' ) ) {
            the_field( 'test_intro' );
        }
        if ( get_field( 'test_heading' ) ) {
            echo '<h2>' . esc_html( get_field( 'test_heading' ) ) . '</h2>';
        }
        if ( get_field( 'test_image' ) ) {
            echo wp_get_attachment_image( get_field( 'test_image' ), 'medium', '', array( 'class' => 'alignleft' ));
        }
        if ( get_field( 'test_text' ) ) {
            the_field( 'test_text' );
        }
    } 
    ?>
</div>
            </div>
        </article>
    <?php endwhile; // End of the loop. ?>
	
 
	
</main>
	<footer class="entry-footer">
		<?php fwd_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->