<?php
function theme_enqueue_styles() {

	$parent_style = 'parent-style';

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style',
			get_stylesheet_directory_uri() . '/style.css',
			array( $parent_style )
	);
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
add_action( 'init', 'remove_footer_credit', 10 );

function remove_footer_credit () {
	remove_action( 'storefront_footer', 'storefront_credit', 20 );
	add_action( 'storefront_footer', 'custom_storefront_credit', 20 );
}

function custom_storefront_credit() {
	?>
	<div class="site-info">
		&copy; <?php echo get_bloginfo( 'name' ) . ' ' . get_the_date( 'Y' ); ?>
		<br>
		Developed by <a href="http://www.whitecanvassoft.com">WhiteCanvasSoftware</a>
	</div><!-- .site-info -->
	<?php
}

