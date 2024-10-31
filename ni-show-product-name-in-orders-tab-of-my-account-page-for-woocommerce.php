<?php
/*
Plugin Name: Ni Show Product Name In Orders Tab Of My Account Page For WooCommerce
Description: Show product name in orders tab of my account page for woocommerce
Author: anzia
Version: 1.0.4
Author URI: http://naziinfotech.com/
Plugin URI: https://wordpress.org/plugins/ni-show-product-name-in-orders-tab-of-my-account-page-for-woocommerce
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/agpl-3.0.html
Text Domain: nioacowfw
Domain Path: /languages/
Requires at least: 4.7
Tested up to: 6.5.5
WC requires at least: 3.0.0
WC tested up to: 9.1.2
Last Updated Date: 16-July-2024
Requires PHP: 7.0
 
*/
if ( ! defined( 'ABSPATH' ) ) { exit;}
if(!class_exists('Ni_Show_Product_Name_In_Orders_Tab_Of_My_Account_Page')){	
	class Ni_Show_Product_Name_In_Orders_Tab_Of_My_Account_Page{
		var $nipotmap_constant = array();  
		public function __construct(){
			$this->nipotmap_constant = array();
			
			$this->nipotmap_constant['__FILE__'] = __FILE__;
			$this->nipotmap_constant['plugin_dir_url'] = plugin_dir_url( __FILE__ );
			add_action('plugins_loaded', array($this, 'plugins_loaded'));
			add_action('admin_notices', array($this, 'nipotmap_check_woocommece_active'));

			add_action('before_woocommerce_init', function() {
				if (class_exists('\Automattic\WooCommerce\Utilities\FeaturesUtil')) {
					\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility('custom_order_tables', __FILE__, true);
				}
			});

		}
		function plugins_loaded(){
			require_once("includes/nipotmap-init.php");
			$obj_init = new NiPOTMAP_Init($this->nipotmap_constant);
			
			require_once("includes/nipotmap-front-end.php");
			$obj_front_end = new NiPOTMAP_Front_End($this->nipotmap_constant);
			
		
			
		}
		function nipotmap_check_woocommece_active(){
			if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
				esc_html_e( "<div class='error'><p><strong>Ni Show Product Name In Orders Tab Of My Account Page For WooCommerce</strong> requires <strong> WooCommerce active plugin</strong> </p></div>");
			}
		}
	}
	$obj =  new   Ni_Show_Product_Name_In_Orders_Tab_Of_My_Account_Page();
}
?>