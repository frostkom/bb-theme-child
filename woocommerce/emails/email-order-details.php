<?php
/**
 * Order details table shown in emails.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

if(!isset($obj_theme_child))
{
	$obj_theme_child = new mf_theme_child();
}

$text_align = (is_rtl() ? 'right' : 'left');

do_action('woocommerce_email_before_order_table', $order, $sent_to_admin, $plain_text, $email);

echo "<h2>";

	if($sent_to_admin)
	{
		$before = '<a class="link" href="'.esc_url($order->get_edit_order_url()).'">';
		$after  = '</a>';
	}

	else
	{
		$before = $after  = '';
	}

	/* translators: %s: Order ID. */
	echo wp_kses_post($before.sprintf(__('[Order #%s]', 'woocommerce').$after.' (<time datetime="%s">%s</time>)', $order->get_order_number(), $order->get_date_created()->format('c'), wc_format_datetime($order->get_date_created())));

echo "</h2>
<div style='margin-bottom: 40px'>
	<table class='td' cellspacing='0' cellpadding='6' style='width: 100%; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif' border='1'>
		<thead>
			<tr>
				<th class='td' scope='col' style='text-align: ".esc_attr($text_align)."'>".__('Product', 'woocommerce')."</th>
				<th class='td' scope='col' style='text-align: ".esc_attr($text_align)."'>".__('Quantity', 'woocommerce')."</th>
				<th class='td' scope='col' style='text-align: ".esc_attr($text_align)."'>".__('Price', 'woocommerce')."</th>
			</tr>
		</thead>
		<tbody>"
			.wc_get_email_order_items( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				$order,
				array(
					'show_sku' => $sent_to_admin,
					'show_image' => false,
					'image_size' => array(32, 32),
					'plain_text' => $plain_text,
					'sent_to_admin' => $sent_to_admin,
				)
			)
		."</tbody>
		<tfoot>";

			$i = 0;
			$order_id = $order->get_order_number();

			foreach($order->get_order_item_totals() as $key => $total)
			{
				if($key != 'cart_subtotal')
				{
					$out_temp = $obj_theme_child->get_order_detail_row($order_id, $key, $total);

					if($out_temp != '')
					{
						$i++;

						$cell_xtra = " class='td' style='text-align: ".esc_attr($text_align)."; ".(1 === $i ? 'border-top-width: 4px' : '')."'";

						echo "<tr class='".$key."'>
							<th colspan='2'".$cell_xtra.">".wp_kses_post($total['label'])."</th>" // scope='row'
							."<td".$cell_xtra.">".$out_temp."</td>
						</tr>";
					}
				}
			}

			if($order->get_customer_note())
			{
				echo "<tr>
					<th class='td' colspan='2' style='text-align: ".esc_attr($text_align)."'>".__('Note:', 'woocommerce')."</th>" // scope='row'
					."<td class='td' style='text-align: ".esc_attr($text_align)."'>".wp_kses_post(nl2br(wptexturize($order->get_customer_note())))."</td>
				</tr>";
			}

		echo "</tfoot>
	</table>
</div>";

do_action('woocommerce_email_after_order_table', $order, $sent_to_admin, $plain_text, $email);
