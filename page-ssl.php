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
$store_id = 'test_parmeeda001';
$test_box_url = 'https://www.sslcommerz.com.bd/gwprocess/testbox/';
$callback_url = home_url().'wc-api/CALLBACK';
$order_id=$_GET['order-id'];
// echo $order_id;
global $woocommerce;
$order = new WC_Order($order_id);
$SSLCommerz_args = array(
		'store_id'      => $store_id,
		'total_amount'           => $order -> order_total,
		'tran_id'         => $order_id,
		'success_url' => $callback_url,
		'fail_url' => $callback_url,
		'cancel_url' => $callback_url,
		'cus_name'     => $order -> billing_first_name .' '. $order -> billing_last_name,
		'cus_add1'  => trim($order -> billing_address_1, ','),
		'cus_country'  => wc()->countries -> countries [$order -> billing_country],
		'cus_state'    => $order -> billing_state,
		'cus_city'     => $order -> billing_city,
		'cus_postcode'      => $order -> billing_postcode,
		'cus_phone'      => $order->billing_phone,
		'cus_email'    => $order -> billing_email,
		'ship_name'    => $order -> shipping_first_name .' '. $order -> shipping_last_name,
		'ship_add1' => $order -> shipping_address_1,
		'ship_country' => $order -> shipping_country,
		'ship_state'   => $order -> shipping_state,
		'ship_city'    => $order -> shipping_city,
		'ship_postcode'     => $order -> shipping_postcode,
		'language'         => 'EN',
		'currency'         => get_woocommerce_currency()
);
$paramsJoined = array();
foreach($SSLCommerz_args as $key => $value){
	$paramsJoined[] = "<input type='hidden' name='$key' value='$value'/>";
}
var_dump($paramsJoined);
$form = '<form action='.$test_box_url.' method="post" id="SSLCommerz_payment_form" target="_top">' . implode( '', $paramsJoined ) . '
<!-- Button Fallback -->
<div class="payment_buttons">
<input type="submit" class="button alt" id="submit_SSLCommerz_payment_form" value="' . __( 'Pay via SSLCommerz', 'woocommerce' ) . '" /> <a class="button cancel" href="' . esc_url( $order->get_cancel_order_url() ) . '">' . __( 'Cancel order &amp; restore cart', 'woocommerce' ) . '</a>
</div>
</form>';

echo $form;
				
// $query_string = http_build_query($SSLCommerz_args);
// // echo $query_string;
// $curl = curl_init();
// curl_setopt($curl, CURLOPT_URL, $test_box_url);
// curl_setopt($curl,CURLOPT_POST, 1);
// // curl_setopt($curl, CURLOPT_POSTFIELDS, $query_string);
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// $response = curl_exec($curl);
// var_dump($response);
// echo $response;
// curl_close($curl);

?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php do_action( 'storefront_sidebar' ); ?>
<?php get_footer(); ?>
