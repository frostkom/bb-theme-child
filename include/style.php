<?php

if(!defined('ABSPATH'))
{
	header("Content-Type: text/css; charset=utf-8");

	$folder = str_replace("/wp-content/themes/bb-theme-child/include", "/", dirname(__FILE__));

	require_once($folder."wp-load.php");
}

echo "@media all
{
	/* Checkout */
	.woocommerce ul#shipping_method li label, .woocommerce-page ul#shipping_method li label
	{
		margin-left: 0 !important;
	}

	#shipping_phone_field, .includes_tax /* This will remove tax from cart and checkout*/
	{
		display: none;
	}

	/* Order Details */
	.fl-page .woocommerce ul.order_details
	{
		margin-bottom: 0;
	}

	.woocommerce-columns.woocommerce-columns--2
	{
		display: -webkit-box;
		display: -ms-flexbox;
		display: -webkit-flex;
		display: flex;
		flex-direction: row-reverse;
	}

		.woocommerce-column.woocommerce-column--2
		{
			margin-right: 1em;
		}

	/*.continue_buttons a.fl-button, .download_buttons a.fl-button
	{
		background: #fb9678 !important;
		border: 1px solid #cc694c !important;
	}*/

	.continue_buttons a.fl-button, .download_buttons a.fl-button
	{
		background: #63b8bd !important;
		border: 1px solid #3c8c91 !important;
	}
}

@media print
{
	header, .woocommerce-order-overview__print, .hide_on_print, footer
	{
		display: none !important;
	}
}";