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

		<?php	while ( have_posts() ) :
			the_post(); 

			// the_post_thumbnail( 'landscape-blog' );

			?>

			<section class="home-intro">
                <h1><?php the_title(); ?></h1>
				<?php the_post_thumbnail( 'large' ); ?>
			</section>

			<section class="home-work">
				<h2>Featured Works</h2>

			<?php
$args = array(
    'post_type'      => 'fwd-work',
    'posts_per_page' => 4,
    'tax_query'      => array(
        array(
            'taxonomy' => 'fwd-featured',
            'field'    => 'slug',
            'terms'    => 'front-page'
        )
    )
);
$query = new WP_Query( $args );

if ( $query->have_posts() ) {
    while( $query->have_posts() ) {
        $query->the_post(); 
        ?>
        <article>
            <a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('medium'); ?>
                <h3><?php the_title(); ?></h3>
            </a>
        </article>
        <?php
    }
    wp_reset_postdata();
} ?>
			</section>

			<section class="home-work"></section>
			<section class="home-left"></section>
			<section class="home-right">
            </section>
			<section class="home-slider">
<?php
            $args = array(
    'post_type'      => 'fwd-testimonial',
    'posts_per_page' => -1
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) : ?>
    <div class="swiper">
        <div class="swiper-wrapper">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="swiper-slide">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="swiper-pagination"></div>
        <button class="swiper-button-prev"></button>
        <button class="swiper-button-next"></button>
    </div>
    <?php
    wp_reset_postdata();
endif; ?>
            </section>
			<section class="home-blog">
			<h2><?php esc_html_e( 'Latest Blog Posts', 'fwd' ); ?></h2>
			<?php
$args = array( 
    'post_type'      => 'post',
    'posts_per_page' => 4 
);

echo get_the_date();

$blog_query = new WP_Query( $args );

if ( $blog_query -> have_posts() ) {
    while ( $blog_query -> have_posts() ) {
        $blog_query -> the_post();
        ?>
        <article>
            <a href="<?php the_permalink(); ?>">
                <h3><?php the_title(); ?></h3>
            </a>
        </article>
        <?php
    }
    wp_reset_postdata();
}
?>
			</section>




<!-- // 			<section class="home-intro">
// 			<img width="960" height="639" src="https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/notebook-computer-1024x682.jpg" class="attachment-large size-large wp-post-image" alt="Laptop, pens, paper on yellow desk" decoding="async" fetchpriority="high" srcset="https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/notebook-computer-1024x682.jpg 1024w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/notebook-computer-300x200.jpg 300w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/notebook-computer-768x512.jpg 768w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/notebook-computer-1536x1024.jpg 1536w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/notebook-computer.jpg 2000w" sizes="(max-width: 960px) 100vw, 960px">
// 			<p>
// 			lorem
// 			</p>
// 			</section>

// 			<section class="home-work">
// 			<h2>Featured Works</h2>

// 			<article>
// 			<img width="300" height="200" src="https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/checkout-process-300x200.jpg" class="attachment-medium size-medium wp-post-image" alt="Checkout on Shopify page" decoding="async" srcset="https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/checkout-process-300x200.jpg 300w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/checkout-process-1024x682.jpg 1024w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/checkout-process-768x512.jpg 768w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/checkout-process-1536x1024.jpg 1536w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/checkout-process.jpg 2000w" sizes="(max-width: 300px) 100vw, 300px">
// 			<p>Web 3</p>
// 			</a>
// 			</article>

// 			<article>
// 			<img width="300" height="199" src="https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/flowers-bunches-300x199.jpg" class="attachment-medium size-medium wp-post-image" alt="Yellow flowers" decoding="async" srcset="https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/flowers-bunches-300x199.jpg 300w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/flowers-bunches-1024x678.jpg 1024w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/flowers-bunches-768x509.jpg 768w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/flowers-bunches-1536x1018.jpg 1536w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/flowers-bunches.jpg 2000w" sizes="(max-width: 300px) 100vw, 300px">
// 			<p>Photo 2</p>
// 			</a>
// 			</article>

// 			<article>
// 			<img width="300" height="200" src="https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/cell-phone-300x200.jpg" class="attachment-medium size-medium wp-post-image" alt="Food, drink, yellow phone on table" decoding="async" loading="lazy" srcset="https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/cell-phone-300x200.jpg 300w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/cell-phone-1024x682.jpg 1024w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/cell-phone-768x512.jpg 768w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/cell-phone-1536x1024.jpg 1536w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/cell-phone.jpg 2000w" sizes="(max-width: 300px) 100vw, 300px">
// 			<p>Web 1</p>
// 				</a>
// 				</article>

// 				<article>
// 				<img width="300" height="200" src="https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/cable-car-300x200.jpg" class="attachment-medium size-medium wp-post-image" alt="Yellow cable car" decoding="async" loading="lazy" srcset="https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/cable-car-300x200.jpg 300w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/cable-car-1024x682.jpg 1024w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/cable-car-768x512.jpg 768w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/cable-car-1536x1024.jpg 1536w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/cable-car.jpg 2000w" sizes="(max-width: 300px) 100vw, 300px">
// 				<p>Photo 1</p>
// 				</a>
// 				</article>
// 			</section>

// 			<section class="home-work">
// 			<h2>Featured Works (Relationship Field)</h2>
// 			<article class="front-portfolio">
// 					            <a href="https://wp.bcitwebdeveloper.ca/mindset-demo/works/web-2/">
// 					            	<img width="300" height="200" src="https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/cellphone-graph-300x200.jpg" class="attachment-medium size-medium wp-post-image" alt="Graphs on a phone" decoding="async" loading="lazy" srcset="https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/cellphone-graph-300x200.jpg 300w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/cellphone-graph-1024x682.jpg 1024w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/cellphone-graph-768x512.jpg 768w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/cellphone-graph-1536x1024.jpg 1536w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/cellphone-graph.jpg 2000w" sizes="(max-width: 300px) 100vw, 300px">					            	<p>Web 2</p>
// 					            </a>
// 				            </article>

// 							<article class="front-portfolio">
// 					            <a href="https://wp.bcitwebdeveloper.ca/mindset-demo/works/photo-3/">
// 					            	<img width="300" height="200" src="https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/rubber-ducks-300x200.jpg" class="attachment-medium size-medium wp-post-image" alt="Rubber ducks in rows" decoding="async" loading="lazy" srcset="https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/rubber-ducks-300x200.jpg 300w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/rubber-ducks-1024x684.jpg 1024w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/rubber-ducks-768x513.jpg 768w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/rubber-ducks-1536x1025.jpg 1536w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/rubber-ducks.jpg 2000w" sizes="(max-width: 300px) 100vw, 300px">					            	<p>Photo 3</p>
// 					            </a>
// 				            </article>

// 							<article class="front-portfolio">
// 					            <a href="https://wp.bcitwebdeveloper.ca/mindset-demo/works/photo-1/">
// 					            	<img width="300" height="200" src="https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/cable-car-300x200.jpg" class="attachment-medium size-medium wp-post-image" alt="Yellow cable car" decoding="async" loading="lazy" srcset="https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/cable-car-300x200.jpg 300w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/cable-car-1024x682.jpg 1024w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/cable-car-768x512.jpg 768w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/cable-car-1536x1024.jpg 1536w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/cable-car.jpg 2000w" sizes="(max-width: 300px) 100vw, 300px">					            	<p>Photo 1</p>
// 					            </a>
// 				            </article>

// 							<article class="front-portfolio">
// 					            <a href="https://wp.bcitwebdeveloper.ca/mindset-demo/works/web-3/">
// 					            	<img width="300" height="200" src="https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/checkout-process-300x200.jpg" class="attachment-medium size-medium wp-post-image" alt="Checkout on Shopify page" decoding="async" loading="lazy" srcset="https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/checkout-process-300x200.jpg 300w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/checkout-process-1024x682.jpg 1024w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/checkout-process-768x512.jpg 768w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/checkout-process-1536x1024.jpg 1536w, https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/checkout-process.jpg 2000w" sizes="(max-width: 300px) 100vw, 300px">					            	<p>Web 3</p>
// 					            </a>
// 				            </article>
// 			</section>

// 			<section class="home-left">
// 				<h2>Who We Are</h2>
// 				<p>Etiam eleifend euismod quam. In congue, lacus ut interdum tempus, enim leo dapibus velit, sit amet lacinia ex erat sit amet nisl. Cras varius orci sit amet venenatis volutpat. Vestibulum ut odio pretium, iaculis ipsum a, bibendum felis. Nullam accumsan molestie facilisis. Morbi mollis congue nulla, ut scelerisque tortor feugiat ut. Morbi in arcu nulla. In a facilisis neque, cursus scelerisque purus. Fusce purus mauris, porta nec hendrerit et, ultricies vitae leo. Curabitur ac consectetur nisl. Morbi nulla magna, malesuada a pellentesque eu, dapibus sed nisi.</p>			
// 				</section>

// 				<section class="home-right">
// 				<h2>What We Offer</h2>
// 				<p>Aenean et venenatis libero. Phasellus porttitor tortor vel leo pulvinar, in pharetra mauris iaculis. Nunc varius diam eget libero placerat cursus. Nulla eleifend lacus condimentum tincidunt aliquam. Nam aliquam ultricies sem et imperdiet. Suspendisse ac facilisis dolor. Nulla sagittis magna non lorem ultrices laoreet. Aliquam vel libero maximus, posuere lorem viverra, tristique mauris. Integer tellus massa, eleifend quis justo ut, tristique tempus turpis. Sed ac mi lacinia, tincidunt risus at, tempor ante.</p>			
// 				</section>
				
// 				<section class="home-slider">
// 				<h2>Testimonials</h2>
// 												    <div class="swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events swiper-container-autoheight">
// 				        <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(-988px, 0px, 0px); height: 494px;" id="swiper-wrapper-966821efaa8105b77" aria-live="polite"><div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="2" style="width: 474px; margin-right: 20px;" role="group" aria-label="1 / 8">
				                    
// <figure class="wp-block-pullquote"><blockquote><p>“Investing in this company was one of the best decisions I’ve made. Its exceptional quality not only met but exceeded my expectations, making every penny worth it.”</p><cite>Alejandro R.</cite></blockquote></figure>
// 				                </div><div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="3" style="width: 474px; margin-right: 20px;" role="group" aria-label="2 / 8">
				                    
// <figure class="wp-block-pullquote"><blockquote><p>“Experiencing this service was truly life-changing for me. I can’t recommend it highly enough to anyone seeking a transformative experience.”</p><cite>Mei W.</cite></blockquote></figure>
// 				                </div>
// 				            				                <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" style="width: 474px; margin-right: 20px;" role="group" aria-label="3 / 8">
				                    
// <figure class="wp-block-pullquote"><blockquote><p>“This work truly amazed me with its effectiveness and quality. It went above and beyond what I expected, and I couldn’t be happier with my purchase!”</p><cite>Becky L.</cite></blockquote></figure>
// 				                </div>
// 				            				                <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="1" style="width: 474px; margin-right: 20px;" role="group" aria-label="4 / 8">
				                    
// <figure class="wp-block-pullquote"><blockquote><p>“The level of service provided was beyond exceptional. From start to finish, I was thoroughly impressed by the professionalism and dedication of the team.”</p><cite>Jamal M.</cite></blockquote></figure>
// 				                </div>
// 				            				                <div class="swiper-slide" data-swiper-slide-index="2" style="width: 474px; margin-right: 20px;" role="group" aria-label="5 / 8">
				                    
// <figure class="wp-block-pullquote"><blockquote><p>“Investing in this company was one of the best decisions I’ve made. Its exceptional quality not only met but exceeded my expectations, making every penny worth it.”</p><cite>Alejandro R.</cite></blockquote></figure>
// 				                </div>
// 				            				                <div class="swiper-slide swiper-slide-duplicate-prev" data-swiper-slide-index="3" style="width: 474px; margin-right: 20px;" role="group" aria-label="6 / 8">
				                    
// <figure class="wp-block-pullquote"><blockquote><p>“Experiencing this service was truly life-changing for me. I can’t recommend it highly enough to anyone seeking a transformative experience.”</p><cite>Mei W.</cite></blockquote></figure>
// 				                </div>
// 				            				        <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="0" style="width: 474px; margin-right: 20px;" role="group" aria-label="7 / 8">
				                    
// <figure class="wp-block-pullquote"><blockquote><p>“This work truly amazed me with its effectiveness and quality. It went above and beyond what I expected, and I couldn’t be happier with my purchase!”</p><cite>Becky L.</cite></blockquote></figure>
// 				                </div><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" data-swiper-slide-index="1" style="width: 474px; margin-right: 20px;" role="group" aria-label="8 / 8">
				                    
// <figure class="wp-block-pullquote"><blockquote><p>“The level of service provided was beyond exceptional. From start to finish, I was thoroughly impressed by the professionalism and dedication of the team.”</p><cite>Jamal M.</cite></blockquote></figure>
// 				                </div></div>
// 				        <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 4"></span></div>
// 				    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
// 				    			</section>


// 								<section class="home-blog">
// 								<h2>Latest Blog Posts</h2>
// 															<article>
// 												<a href="https://wp.bcitwebdeveloper.ca/mindset-demo/if-you-see-light/">
// 													<img width="400" height="200" src="https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/yellow-flowers-400x200.jpg" class="attachment-landscape-blog size-landscape-blog wp-post-image" alt="Yellow flowers" decoding="async" loading="lazy">					                <h3>If You See Light</h3>
// 													<time datetime="2020-08-13T23:11:00-07:00" itemprop="datePublished">August 13, 2020</time>
// 												</a>
// 											</article>
// 																		<article>
// 												<a href="https://wp.bcitwebdeveloper.ca/mindset-demo/sicilian-crest/">
// 													<img width="400" height="200" src="https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/coffee-wireframes-400x200.jpg" class="attachment-landscape-blog size-landscape-blog wp-post-image" alt="Wireframes and coffee on a table" decoding="async" loading="lazy">					                <h3>Sicilian Crest</h3>
// 													<time datetime="2020-08-13T09:10:00-07:00" itemprop="datePublished">August 13, 2020</time>
// 												</a>
// 											</article>
// 																		<article>
// 												<a href="https://wp.bcitwebdeveloper.ca/mindset-demo/this-year/">
// 													<img width="400" height="200" src="https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/notebook-computer-400x200.jpg" class="attachment-landscape-blog size-landscape-blog wp-post-image" alt="Laptop, pens, paper on yellow desk" decoding="async" loading="lazy">					                <h3>This Year</h3>
// 													<time datetime="2020-08-02T23:09:00-07:00" itemprop="datePublished">August 2, 2020</time>
// 												</a>
// 											</article>
// 																		<article>
// 												<a href="https://wp.bcitwebdeveloper.ca/mindset-demo/wear-black/">
// 													<img width="400" height="200" src="https://wp.bcitwebdeveloper.ca/mindset-demo/wp-content/uploads/2022/01/laptop-table-400x200.jpg" class="attachment-landscape-blog size-landscape-blog wp-post-image" alt="Laptop on a table" decoding="async" loading="lazy">					                <h3>Wear Black</h3>
// 													<time datetime="2020-07-25T23:08:00-07:00" itemprop="datePublished">July 25, 2020</time>
// 												</a>
// 											</article>
// 														</section>						 -->

<?php 
the_field('name');

if (function_exists( 'get_field' ) ) {
	if ( get_field( 'top_section' ) ) {
		the_field( 'top_section' );
	}


if ( function_exists( 'get_field' ) ) {

    if ( get_field( 'left_section_title' ) ) {
        echo '<h2>' . esc_html( get_field( 'left_section_title' ) ) . '</h2>';
    }

    if ( get_field( 'left_section_text' ) ) {
        echo '<p>' . esc_html( get_field( 'left_section_text' ) ) . '</p>';
    }

}

if ( function_exists( 'get_field' ) ) {

    if ( get_field( 'right_section_title' ) ) {
        echo '<h2>' . esc_html( get_field( 'right_section_title' ) ) . '</h2>';
    }

    if ( get_field( 'right_section_text' ) ) {
        echo '<p>' . esc_html( get_field( 'right_section_text' ) ) . '</p>';
    }
}
}
?>

		
		<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php
get_footer();
