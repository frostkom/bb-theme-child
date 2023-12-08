<?php

define('FL_CHILD_THEME_DIR', get_stylesheet_directory());
define('FL_CHILD_THEME_URL', get_stylesheet_directory_uri());

if(!function_exists('is_plugin_active') || function_exists('is_plugin_active') && is_plugin_active("mf_base/index.php"))
{
	require_once("classes/class-fl-child-theme.php");
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
	}

	else
	{
		add_action('wp_head', array($obj_theme_child, 'wp_head'), 0);

		//add_filter('pre_get_posts', array($obj_theme_child, 'pre_get_posts'));

		add_filter('woocommerce_checkout_fields', array($obj_theme_child, 'woocommerce_checkout_fields'));
		add_action('woocommerce_after_order_notes', array($obj_theme_child, 'woocommerce_after_order_notes'));
		add_action('woocommerce_checkout_process', array($obj_theme_child, 'woocommerce_checkout_process'));
		add_action('woocommerce_checkout_update_order_meta', array($obj_theme_child, 'woocommerce_checkout_update_order_meta'));
		//add_action('woocommerce_admin_order_data_after_billing_address', array($obj_theme_child, 'woocommerce_admin_order_data_after_billing_address'), 10, 1);

		//add_action('woocommerce_after_add_to_cart_button', array($obj_theme_child, 'woocommerce_after_add_to_cart_button'));
		add_action('woocommerce_payment_complete', array($obj_theme_child, 'woocommerce_payment_complete'));
		//add_action('woocommerce_payment_complete_order_status', array($obj_theme_child, 'woocommerce_payment_complete_order_status'), 10, 3);
		//add_action('woocommerce_order_status_changed', array($obj_theme_child, 'woocommerce_order_status_changed'), 10, 3);
		//add_action('dibs_easy_process_payment', array($obj_theme_child, 'dibs_easy_process_payment'), 10, 2);
		//add_action('woocommerce_pre_payment_complete', array($obj_theme_child, 'woocommerce_pre_payment_complete'), 10, 2);

		/*add_action('woocommerce_payment_complete_order_status_on-hold', array($obj_theme_child, 'woocommerce_payment_complete_order_status_on_hold'), 10, 2);
		add_action('woocommerce_payment_complete_order_status_pending', array($obj_theme_child, 'woocommerce_payment_complete_order_status_pending'), 10, 2);
		add_action('woocommerce_payment_complete_order_status_failed', array($obj_theme_child, 'woocommerce_payment_complete_order_status_failed'), 10, 2);
		add_action('woocommerce_payment_complete_order_status_cancelled', array($obj_theme_child, 'woocommerce_payment_complete_order_status_cancelled'), 10, 2);
		add_action('woocommerce_payment_complete_order_status_processing', array($obj_theme_child, 'woocommerce_payment_complete_order_status_processing'), 10, 2);
		add_action('woocommerce_payment_complete_order_status_completed', array($obj_theme_child, 'woocommerce_payment_complete_order_status_completed'), 10, 2);*/

		add_action('woocommerce_proceed_to_checkout', array($obj_theme_child, 'woocommerce_proceed_to_checkout'), 20);
	}

	//add_filter('wc_tax_enabled', array($obj_theme_child, 'wc_tax_enabled'));

	add_action('wp_ajax_debug_run', array($obj_theme_child, 'debug_run'), 10, 1);
}

add_filter('woocommerce_ship_to_different_address_checked', '__return_true');

add_action('wp_enqueue_scripts', 'FLChildTheme::enqueue_scripts', 1000);

// Remove option_theme_educators_url when uninstalling theme