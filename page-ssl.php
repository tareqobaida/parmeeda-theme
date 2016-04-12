<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<h1>We will redirect you to SSLCOMMERZ gateway</h1>
<?php 
$test_box_url = 'https://www.sslcommerz.com.bd/gwprocess/testbox/';
$curl = curl_init($test_box_url);
curl_setopt($curl,CURLOPT_POST, 1);
$order_id=$_GET['order-id'];
echo $order_id;
global $woocommerce;
$order = new WC_Order($order_id);

?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php do_action( 'storefront_sidebar' ); ?>
<?php get_footer(); ?>
