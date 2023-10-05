<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined('ABSPATH') || exit;

echo "<div class='woocommerce-order'>";

	if($order)
	{
		do_action('woocommerce_before_thankyou', $order->get_id());

		if($order->has_status('failed'))
		{
			echo "<p class='woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed'>".__('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce')."</p>
			<p class='woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions'>
				<a href='".esc_url($order->get_checkout_payment_url())."' class='button pay'>".__('Pay', 'woocommerce')."</a>";

				if(is_user_logged_in())
				{
					echo "<a href='".esc_url(wc_get_page_permalink('myaccount'))."' class='button pay'>".__('My account', 'woocommerce')."</a>";
				}

			echo "</p>";
		}

		else
		{
			echo "<h2 class='woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received'>"
				.apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your order has been received.', 'woocommerce'), $order)
			."</h2>";

			/*$done_text = apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your order has been received.', 'woocommerce'), $order);
			echo get_notification();*/

			echo "<ul class='woocommerce-order-overview woocommerce-thankyou-order-details order_details'>
				<li class='woocommerce-order-overview__order order'>"
					.__('Order number', 'lang_bb-theme-child').":"
					."<strong>".$order->get_order_number()."</strong>
				</li>
				<li class='woocommerce-order-overview__date date'>"
					.__('Date', 'lang_bb-theme-child').":"
					."<strong>".wc_format_datetime($order->get_date_created(), 'Y-m-d')."</strong>
				</li>";

				if(is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email())
				{
					echo "<li class='woocommerce-order-overview__email email'>"
						.__('Email', 'lang_bb-theme-child').":"
						."<strong>".$order->get_billing_email()."</strong>
					</li>";
				}

				/*echo "<li class='woocommerce-order-overview__total total'>"
					.__('Total', 'lang_bb-theme-child').":"
					."<strong>".$order->get_formatted_order_total()."</strong>
				</li>";

				if($order->get_payment_method_title())
				{
					echo "<li class='woocommerce-order-overview__payment-method method'>"
						.__('Payment method', 'lang_bb-theme-child').":"
						."<strong>".wp_kses_post($order->get_payment_method_title())."</strong>
					</li>";
				}*/

				/*echo "<li class='woocommerce-order-overview__print hide_on_print'>
					<a href='#' onclick='window.print()'><i class='fa fa-print fa-3x blue' title='".__("Save your order details", 'lang_bb-theme-child')."'></i></a>
				</li>";*/

			echo "</ul>";
		}

		do_action('woocommerce_thankyou_'.$order->get_payment_method(), $order->get_id());
		do_action('woocommerce_thankyou', $order->get_id());
	}

	else
	{
		echo "<p class='woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received'>"
			.apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your order has been received.', 'woocommerce'), null)
		."</p>";

		/*$done_text = apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your order has been received.', 'woocommerce'), null);
		echo get_notification();*/
	}

echo "</div>";