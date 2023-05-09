<?php
/**
 * Plugin Name: AI Related Products
 * Plugin URI: https://www.sharkthemes.com
 * Description: Upsell your products with advanced intelligence. If you are using WooCommerce plugin for your online store, this should be one of the most beneficial add-ons for your company. We have created a sophisticated algorithm to display related products. You can use this plugin to display related products based on your customers' interests. You can now replace the default random related products with the related products that your customers are interested in. AI Related Products uses browser cookies to track the products that your visitors have visited and display the most relevant products. It uses your visitors' and users' cart products to filter and display the relevant products. It filters and displays relevant products based on your loyal customers' previous purchase history. You can add AI Related Products using block and shortcode to any page on your website. Since about version 5.0, WordPress supports blocks and has now switched to full site editing. For your convenience, we have introduced the AI Related Products Block. As you are already familiar with blocks, you can add this block to any pages or widget areas. Additionally, you can modify the settings and attributes to filter the product list. We also have Shortcodes to show advanced related products anywhere on your site. You can use it in blocks, widgets and classical editor. You can customize the content with the attributes that are supported in shortcode. These features will provide you with the best way to engage your customers in your online store because your customers will see the products that fascinate them everywhere. Furthermore, we have built an API so that developers may access the data for the AI Related Products for a variety of purposes. You can use it, for instance, to display relevant products in your connected apps or for email marketing, among many other various uses.
 * Version: 1.0.6
 * Author: Shark Themes
 * Author URI: https://sharkthemes.com
 * Requires at least: 5.6
 * Tested up to: 6.1.1
 *
 * Text Domain: ai-related-products
 * Domain Path: /languages/
 *
 * @package AI Related Products
 * @category Core
 * @author Shark Themes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'ST_WOO_AI_REL_PRODUCTS' ) ) {
	final class ST_WOO_AI_REL_PRODUCTS
	{

		protected static $instance = null;

		public static function get_instance()
		{
			if (is_null(self::$instance)) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		public function __construct()
		{
			$this->st_woo_ai_rel_products_constant();
			$this->st_woo_ai_rel_products_core();
		}

		public function st_woo_ai_rel_products_constant()
		{
			global $wp_version;
			define('ST_WOO_AI_REL_PRODUCTS_WP_VERSION', $wp_version);
			define('ST_WOO_AI_REL_PRODUCTS_BASE_PATH', dirname(__FILE__));
			define('ST_WOO_AI_REL_PRODUCTS_URL_PATH', plugin_dir_url(__FILE__));
			define('ST_WOO_AI_REL_PRODUCTS_PLUGIN_BASE_PATH', plugin_basename(__FILE__));
			define('ST_WOO_AI_REL_PRODUCTS_PLUGIN_FILE_PATH', (__FILE__));
		}

		public function st_woo_ai_rel_products_core()
		{
			include_once ST_WOO_AI_REL_PRODUCTS_BASE_PATH . '/include/core.php';
		}

	}
}

if ( ! function_exists( 'ST_Woo_Ai_Rel_Products' ) ) {
	function ST_Woo_Ai_Rel_Products() { 
		return ST_WOO_AI_REL_PRODUCTS::get_instance();
	}
}

if ( ! function_exists( 'st_woo_ai_rel_products_admin_install_woo_notice' ) ) {
	function st_woo_ai_rel_products_admin_install_woo_notice() {
		$class = 'notice notice-warning';
		$message = __( 'WooCommerce AI Related Product Plugin is a supportive addon for WooCommerce. Please install and activate the WooCommerce plugin.', 'ai-related-products' );
		$label = __( 'Install WooCommerce', 'ai-related-products' );
		$url = admin_url( 'plugin-install.php?s=woocommerce&tab=search&type=term' );
	
		printf( '<div class="%1$s"><p>%2$s <a href="%3$s">%4$s</a></p></div>', esc_attr( $class ), esc_html( $message ), esc_url( $url ), esc_html( $label ) );
	}
}

if ( ! function_exists( 'is_plugin_active' ) ) {
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

if ( ! function_exists( 'st_woo_ai_rel_products_init' ) ) {
	function st_woo_ai_rel_products_init() {
		if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
			// Initialize AI Related Products
			ST_Woo_Ai_Rel_Products();
		} else {
			add_action( 'admin_notices', 'st_woo_ai_rel_products_admin_install_woo_notice' );
		}
	}
}
add_action( 'init', 'st_woo_ai_rel_products_init' );
