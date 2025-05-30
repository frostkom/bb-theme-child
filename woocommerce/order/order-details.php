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
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.8.0
 *
 * @var bool $show_downloads Controls whether the downloads table should be rendered.
 */

 // phpcs:disable WooCommerce.Commenting.CommentHooks.MissingHookComment

defined( 'ABSPATH' ) || exit;

// Added
############################
if(!isset($obj_theme_child))
{
	$obj_theme_child = new mf_theme_child();
}
############################

$order = wc_get_order( $order_id ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

if ( ! $order ) {
	return;
}

$order_items        = $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) );
$show_purchase_note = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
$downloads          = $order->get_downloadable_items();
$actions            = array_filter(
	wc_get_account_orders_actions( $order ),
	function ( $key ) {
		return 'view' !== $key;
	},
	ARRAY_FILTER_USE_KEY
);

// Changed
##########################
// We make sure the order belongs to the user. This will also be true if the user is a guest, and the order belongs to a guest (userID === 0).
//$show_customer_details = $order->get_user_id() === get_current_user_id();
$show_customer_details = ($order->get_user_id() === get_current_user_id() || IS_SUPER_ADMIN);
##########################

if ( $show_downloads ) {
	wc_get_template(
		'order/order-downloads.php',
		array(
			'downloads'  => $downloads,
			'show_title' => true,
		)
	);
}

//Moved up
##########################
if ( $show_customer_details ) {
	wc_get_template( 'order/order-details-customer.php', array( 'order' => $order ) );
}
##########################

?>
<section class="woocommerce-order-details">
	<?php do_action( 'woocommerce_order_details_before_order_table', $order ); ?>

	<h2 class="woocommerce-order-details__title"><?php esc_html_e( 'Order details', 'woocommerce' ); ?></h2>

	<table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

		<thead>
			<tr>
				<th class="woocommerce-table__product-name product-name"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
				<th class="woocommerce-table__product-table product-total"><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
			</tr>
		</thead>

		<tbody>
			<?php
			do_action( 'woocommerce_order_details_before_order_table_items', $order );

			foreach ( $order_items as $item_id => $item ) {
				$product = $item->get_product();

				wc_get_template(
					'order/order-details-item.php',
					array(
						'order'              => $order,
						'item_id'            => $item_id,
						'item'               => $item,
						'show_purchase_note' => $show_purchase_note,
						'purchase_note'      => $product ? $product->get_purchase_note() : '',
						'product'            => $product,
					)
				);
			}

			do_action( 'woocommerce_order_details_after_order_table_items', $order );
			?>
		</tbody>

		<?php
		if ( ! empty( $actions ) ) :
			?>
		<tfoot>
			<tr>
				<th class="order-actions--heading"><?php esc_html_e( 'Actions', 'woocommerce' ); ?>:</th>
				<td>
						<?php
						$wp_button_class = wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '';
						foreach ( $actions as $key => $action ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
							if ( empty( $action['aria-label'] ) ) {
								// Generate the aria-label based on the action name.
								/* translators: %1$s Action name, %2$s Order number. */
								$action_aria_label = sprintf( __( '%1$s order number %2$s', 'woocommerce' ), $action['name'], $order->get_order_number() );
							} else {
								$action_aria_label = $action['aria-label'];
							}
								echo '<a href="' . esc_url( $action['url'] ) . '" class="woocommerce-button' . esc_attr( $wp_button_class ) . ' button ' . sanitize_html_class( $key ) . ' order-actions-button " aria-label="' . esc_attr( $action_aria_label ) . '">' . esc_html( $action['name'] ) . '</a>';
								unset( $action_aria_label );
						}
						?>
					</td>
				</tr>
			</tfoot>
			<?php endif ?>
		<tfoot>
			<?php
			foreach ( $order->get_order_item_totals() as $key => $total ) {
				// Added
				$out_temp = $obj_theme_child->get_order_detail_row($order_id, $key, $total);

				if($out_temp != '')
				{
				?>
					<tr>
						<th scope="row"><?php echo esc_html( $total['label'] ); ?></th>
						<td><?php echo wp_kses_post( $total['value'] ); ?></td>
					</tr>
					<?php
				}
			}
			?>
			<?php if ( $order->get_customer_note() ) : ?>
				<tr>
					<th><?php esc_html_e( 'Note:', 'woocommerce' ); ?></th>
					<td><?php echo wp_kses( nl2br( wptexturize( $order->get_customer_note() ) ), array( 'br' => array() ) ); ?></td>
				</tr>
			<?php endif; ?>
		</tfoot>
	</table>

	<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>
</section>

<?php
/**
 * Action hook fired after the order details.
 *
 * @since 4.4.0
 * @param WC_Order $order Order data.
 */
do_action( 'woocommerce_after_order_details', $order );

// Added
##########################
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

	echo "<div class='download_buttons'>
		<a href='https://apps.apple.com/se/app/k%C3%B6rkortsboken/id6450051169' class='fl-button'>
			<span class='fl-button-text'>App Store</span>
		</a>
		<a href='https://play.google.com/store/apps/details?id=se.str.korkortsboken&pli=1' class='fl-button'>
			<span class='fl-button-text'>Google Play</span>
		</a>
	</div>
</div>";
##########################