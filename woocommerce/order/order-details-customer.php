<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.7.0
 */

defined( 'ABSPATH' ) || exit;

if(!isset($obj_theme_child))
{
	$obj_theme_child = new mf_theme_child();
}

//$show_shipping = ! wc_ship_to_billing_address_only() && $order->needs_shipping_address();

echo "<section class='woocommerce-customer-details'>";

	//if ( $show_shipping ) :
?>
		<section class="woocommerce-columns woocommerce-columns--2 woocommerce-columns--addresses col2-set addresses">
			<div class="woocommerce-column woocommerce-column--1 woocommerce-column--billing-address col-1">
<?php 
	//}
				echo "<h2 class='woocommerce-column__title'>".__('Billing address', 'woocommerce')."</h2>
				<address>"
					.wp_kses_post($order->get_formatted_billing_address(esc_html__('N/A', 'woocommerce')));

					$billing_phone = esc_html($order->get_billing_phone());

					if($billing_phone != '')
					{
						echo "<p class='woocommerce-customer-details--phone'><a href='".format_phone_no($billing_phone)."'>".$billing_phone."</a></p>";
					}

					$billing_email = esc_html($order->get_billing_email());

					if($billing_email != '')
					{
						echo "<p class='woocommerce-customer-details--email'><a href='mailto:".$billing_email."'>".$billing_email."</a></p>";
					}

				echo "</address>";

	//if ( $show_shipping ) :
?>

			</div><!-- /.col-1 -->
<?php
			$shipping_address = wp_kses_post($order->get_formatted_shipping_address(esc_html__('N/A', 'woocommerce')));

			if($shipping_address != esc_html__('N/A', 'woocommerce'))
			{
				echo "<div class='woocommerce-column woocommerce-column--2 woocommerce-column--shipping-address col-2'>
					<h2 class='woocommerce-column__title'>".__('Shipping address', 'woocommerce')."</h2>
					<address>"
						.$shipping_address;

						$shipping_phone = esc_html($order->get_shipping_phone());

						if($shipping_phone != '')
						{
							echo "<p class='woocommerce-customer-details--phone'><a href='".format_phone_no($shipping_phone)."'>".$shipping_phone."</a></p>";
						}

					echo "</address>
				</div>";
			}
?>
		</section><!-- /.col2-set -->

<?php
	//endif;
?>

	<?php do_action( 'woocommerce_order_details_after_customer_details', $order ); ?>
<?php
	echo "<section class='flex_flow tight'>";

		$order_items = $order->get_items(apply_filters('woocommerce_purchase_order_item_types', 'line_item'));

		foreach($order_items as $item_id => $arr_item)
		{
			$order_id = $arr_item->get_order_id();

			$product_id = $arr_item['product_id'];
			$variation_id = $arr_item['variation_id'];
			$quantity = $arr_item['quantity'];

			for($i = 1; $i <= $quantity; $i++)
			{
				if($variation_id > 0)
				{
					$product_virtual = get_post_meta($variation_id, '_virtual', true);
					$product_downloadable = get_post_meta($variation_id, '_downloadable', true);

					$product_title = mf_get_post_content($variation_id, 'post_title');

					$item_id = $product_id."_v".$variation_id;
				}

				else
				{
					$product_virtual = get_post_meta($product_id, '_virtual', true);
					$product_downloadable = get_post_meta($product_id, '_downloadable', true);

					$product_title = mf_get_post_content($product_id, 'post_title');

					$item_id = $product_id;
				}

				if($i > 1)
				{
					$item_id .= "_".$i;
				}

				if($product_virtual == 'yes' || $product_downloadable == 'yes')
				{
					$product_ssn = get_post_meta($order_id, $obj_theme_child->meta_prefix.'ssn_'.$item_id, true);
					$product_phone = get_post_meta($order_id, $obj_theme_child->meta_prefix.'phone_'.$item_id, true);
					$product_email = get_post_meta($order_id, $obj_theme_child->meta_prefix.'email_'.$item_id, true);

					echo "<div>
						<h2 class='woocommerce-column__title'>".$product_title;

							if($quantity > 1)
							{
								echo " (".$i.")";
							}

						echo "</h2>
						<address>";

							if($product_ssn != '')
							{
								echo "<p>".$product_ssn."</p>";
							}

							if($product_phone != '')
							{
								echo "<p class='woocommerce-customer-details--phone'><a href='".format_phone_no($product_phone)."'>".$product_phone."</a></p>";
							}

							if($product_email != '')
							{
								echo "<p class='woocommerce-customer-details--email'><a href='mailto:".$billing_email."'>".$product_email."</a></p>";
							}

						echo "</address>
					</div>";
				}
			}
		}

	echo "</section>";
?>

</section>