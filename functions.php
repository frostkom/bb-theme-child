<?php

define('FL_CHILD_THEME_DIR', get_stylesheet_directory());
define('FL_CHILD_THEME_URL', get_stylesheet_directory_uri());

if(!function_exists('is_plugin_active') || function_exists('is_plugin_active') && is_plugin_active("mf_base/index.php"))
{
	include_once("include/classes.php");

	load_theme_textdomain('lang_bb-theme-child', get_stylesheet_directory()."/lang");

	$obj_theme_child = new mf_theme_child();

	add_action('cron_base', array($obj_theme_child, 'cron_base'), mt_rand(1, 10));

	if(is_admin())
	{
		add_action('admin_init', array($obj_theme_child, 'admin_init'), 0);
		add_action('admin_init', array($obj_theme_child, 'settings_theme_child'));

		add_filter('manage_'.$obj_theme_child->post_type_shop_order.'_posts_columns', array($obj_theme_child, 'column_header'), 20);
		add_action('manage_'.$obj_theme_child->post_type_shop_order.'_posts_custom_column', array($obj_theme_child, 'column_cell'), 20, 2);

		add_filter('manage_woocommerce_page_wc-orders_columns', array($obj_theme_child, 'column_header'), 20);
		add_action('manage_woocommerce_page_wc-orders_custom_column', array($obj_theme_child, 'column_cell'), 10, 2);

		add_filter('get_group_sync_type', array($obj_theme_child, 'get_group_sync_type'), 10);

		add_action('woocommerce_product_options_general_product_data', array($obj_theme_child, 'woocommerce_product_options_general_product_data'));
		add_action('woocommerce_process_product_meta', array($obj_theme_child, 'woocommerce_process_product_meta'));
	}

	else
	{
		add_action('wp_head', array($obj_theme_child, 'wp_head'), 0);

		add_filter('woocommerce_cart_shipping_method_full_label', array($obj_theme_child, 'woocommerce_cart_shipping_method_full_label'), 10, 2);
		add_filter('woocommerce_package_rates', array($obj_theme_child, 'woocommerce_package_rates'), 10, 2);

		add_filter('woocommerce_checkout_fields', array($obj_theme_child, 'woocommerce_checkout_fields'));
		add_action('woocommerce_after_order_notes', array($obj_theme_child, 'woocommerce_after_order_notes'));
		add_action('woocommerce_checkout_process', array($obj_theme_child, 'woocommerce_checkout_process'));
		add_action('woocommerce_checkout_update_order_meta', array($obj_theme_child, 'woocommerce_checkout_update_order_meta'));

		add_action('woocommerce_payment_complete', array($obj_theme_child, 'woocommerce_payment_complete'), 20);

		add_action('woocommerce_proceed_to_checkout', array($obj_theme_child, 'woocommerce_proceed_to_checkout'), 20);

		add_filter('woocommerce_order_get_formatted_shipping_address', array($obj_theme_child, 'woocommerce_order_get_formatted_shipping_address'), 10, 3);
	}

	add_filter('get_group_sync_addresses', array($obj_theme_child, 'get_group_sync_addresses'), 10, 2);

	add_action('wp_ajax_debug_ssn_run', array($obj_theme_child, 'debug_ssn_run'), 10, 1);
	add_action('wp_ajax_debug_nets_run', array($obj_theme_child, 'debug_nets_run'), 10, 1);
	add_action('wp_ajax_debug_lime_run', array($obj_theme_child, 'debug_lime_run'), 10, 1);

	add_filter('wp_grid_builder_map/marker_content', array($obj_theme_child, 'wp_grid_builder_map_marker_content'), 10, 2);
}

add_filter('woocommerce_ship_to_different_address_checked', '__return_true');

/* Disable Password Reset */
#######################################
/*add_filter('allow_password_reset', 'disable_password_reset');
add_action('login_init', 'lost_password_redirect');

function disable_password_reset()
{
	return false;
}

function lost_password_redirect()
{
	if(isset($_GET['action']))
	{
		if(in_array($_GET['action'], array('lostpassword', 'retrievepassword')))
		{
			wp_redirect(wp_login_url(), 301);
		}
	}
}*/
#######################################

// Remove option_theme_educators_url when uninstalling theme