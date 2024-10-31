<?php 
if ( ! defined( 'ABSPATH' ) ) { exit;}
if(!class_exists('NiPOTMAP_Init')){	
	class NiPOTMAP_Init{
		
		var $nioacowfw_constant = array();  
		public function __construct($nioacowfw_constant = array()){
			$this->nioacowfw_constant  = $nioacowfw_constant;
		}
	}
}
?>