<?php 
if ( ! defined( 'ABSPATH' ) ) { exit;}
if(!class_exists('NiPOTMAP_Front_End')){	
	class NiPOTMAP_Front_End{
		
		var $nioacowfw_constant = array();  
		public function __construct($nioacowfw_constant = array()){
			$this->nioacowfw_constant  = $nioacowfw_constant;

			add_filter( 'woocommerce_account_orders_columns',  array($this, 'add_account_orders_columns'), 10, 1 );
			add_action( 'woocommerce_my_account_my_orders_column_order-items', array($this, 'add_my_account_orders_item_column_content'), 10, 1 );
		}
		function add_my_account_orders_item_column_content($order ){
			 $details = array();
		
			foreach( $order->get_items() as $item )
				$details[] = $item->get_name() . '&nbsp;&times;&nbsp;' . $item->get_quantity();
		
			//echo sanitize_text_field (count( $details ) > 0 ? implode( '<br>', $details ) : '&ndash;');
		
			
			echo wp_kses_post( sprintf( __( '%s', 'woocommerce' ),  count( $details ) > 0 ? implode( '<br>', $details ) : '&ndash;' ) );
			
			
		}
		function add_account_orders_columns($columns){
			$new_columns = array();

			foreach ( $columns as $key => $name ) {
				$new_columns[ $key ] = $name;
		
				if ( 'order-status' === $key ) {
					$new_columns['order-items'] = __( 'Product | Quantity', 'woocommerce' );
					
				}
			}
			return $new_columns;
		}
	}
}
?>