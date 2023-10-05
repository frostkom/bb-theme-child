<?php
/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.6.0
 */

defined('ABSPATH') || exit;

if(!isset($obj_theme_child))
{
	$obj_theme_child = new mf_theme_child();
}

$order = wc_get_order($order_id); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

if(!$order)
{
	return;
}

$order_items = $order->get_items(apply_filters('woocommerce_purchase_order_item_types', 'line_item'));
$show_purchase_note = $order->has_status(apply_filters('woocommerce_purchase_note_order_statuses', array('completed', 'processing')));
//$show_customer_details = (is_user_logged_in() && $order->get_user_id() === get_current_user_id());
$downloads = $order->get_downloadable_items();
$show_downloads = ($order->has_downloadable_item() && $order->is_download_permitted());

if($show_downloads)
{
	wc_get_template(
		'order/order-downloads.php',
		array(
			'downloads' => $downloads,
			'show_title' => true,
		)
	);
}

/*if($show_customer_details)
{*/
	wc_get_template('order/order-details-customer.php', array('order' => $order));
//}

echo "<section class='woocommerce-order-details'>";

	do_action('woocommerce_order_details_before_order_table', $order);

	//echo "<h2 class='woocommerce-order-details__title'>".__('Order details', 'woocommerce')."</h2>";

	echo "<table class='woocommerce-table woocommerce-table--order-details shop_table order_details'>
		<thead>
			<tr>
				<th class='woocommerce-table__product-name product-name'>".__('Product', 'woocommerce')."</th>
				<th class='woocommerce-table__product-table product-total'>".__('Total', 'woocommerce')."</th>
			</tr>
		</thead>
		<tbody>";

			do_action('woocommerce_order_details_before_order_table_items', $order);

			foreach($order_items as $item_id => $item)
			{
				$product = $item->get_product();

				wc_get_template(
					'order/order-details-item.php',
					array(
						'order' => $order,
						'item_id' => $item_id,
						'item' => $item,
						'show_purchase_note' => $show_purchase_note,
						'purchase_note' => ($product ? $product->get_purchase_note() : ''),
						'product' => $product,
					)
				);
			}

			do_action('woocommerce_order_details_after_order_table_items', $order);

		echo "</tbody>
		<tfoot>";

			foreach($order->get_order_item_totals() as $key => $total)
			{
				if($key != 'cart_subtotal')
				{
					echo "<tr class='".$key."'>" //
						."<th>".esc_html($total['label'])."</th>" // scope='row'
						."<td>";

							//." (".var_export($total, true).")"
							//." (".$key.", ".$order_id.")"

							switch($key)
							{
								case 'payment_method':
									echo esc_html($total['value']);

									$dibs_payment_method = get_post_meta($order_id, 'dibs_payment_method', true);

									if($dibs_payment_method != '')
									{
										echo " - ".$dibs_payment_method;
									}
								break;

								case 'order_total':
									echo preg_replace("/<small class=\"includes_tax\">(.*?)<\/small>/i", "", wp_kses_post($total['value']));
								break;

								default:
									echo wp_kses_post($total['value']);
								break;
							}

						echo "</td>
					</tr>";
				}
			}

			if($order->get_customer_note())
			{
				echo "<tr>
					<th>".__('Note:', 'woocommerce')."</th>
					<td>".wp_kses_post(nl2br(wptexturize($order->get_customer_note())))."</td>
				</tr>";
			}

		echo "</tfoot>
	</table>";

	do_action('woocommerce_order_details_after_order_table', $order);

echo "</section>";

/**
 * Action hook fired after the order details.
 *
 * @since 4.4.0
 * @param WC_Order $order Order data.
 */
do_action('woocommerce_after_order_details', $order);

echo "<div class='fl-button-wrap fl-button-width-auto fl-button-center continue_buttons hide_on_print'>
	<a href='#' onclick='window.print()' class='fl-button'>
		<span class='fl-button-text'>".__("Save your order details", 'lang_bb-theme-child')."</span>
	</a>
	<a href='".get_permalink(wc_get_page_id('shop'))."' class='fl-button'>
		<span class='fl-button-text'>".__("Continue to shop", 'lang_bb-theme-child')."</span>
	</a>
</div>
<br>
<div class='hide_on_print'>
	<h2>".sprintf(__("Have you purchased access to the app %s?", 'lang_bb-theme-child'), "K&ouml;rkortsboken")."</h2>"
	."<p>".sprintf(__("Download from %s or %s. You need to create an account the first time you log in.", 'lang_bb-theme-child'), "App Store", "Google Play")."</p>"
	."<p>".__("There you use the social security number that you entered when you bought your periods and that you see above in your order. When you have created an account and logged in, your periods are there waiting for you. Good luck!", 'lang_bb-theme-child')."</p>";

	echo "<div class='download_buttons'>" //fl-button-wrap fl-button-width-auto fl-button-center 
		."<a href='https://apps.apple.com/se/app/k%C3%B6rkortsboken/id6450051169' class='fl-button'>
			<span class='fl-button-text'>App Store</span>
		</a>
		<a href='https://play.google.com/store/apps/details?id=se.str.korkortsboken&pli=1' class='fl-button'>
			<span class='fl-button-text'>Google Play</span>
		</a>
	</div>
</div>";