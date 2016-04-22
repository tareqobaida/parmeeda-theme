<?php
/**
 * The template for front page.
 * front-page.php – Used for both “your latest posts” or 
 * “a static page” as set in the front page displays section of Settings Reading.
 */

get_header(); ?>

	<div id="primary" class="content-area" style="width: 100%">
		<main id="main" class="site-main" role="main">
<h1 id="frontpage-header">Our Exclusive Offers</h1>
			<?php 
			echo do_shortcode('[featured_products per_page="3" columns="3"]'); 
			 ?>
			 <h1 id="frontpage-header">Recent Attractions</h1>
			<?php 
			echo do_shortcode('[recent_products per_page="18" columns="6"]'); 
			 ?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
