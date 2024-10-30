<?php
/*
 * Plugin Name: Brainshark Embed Plugin
 * Plugin URI: www.brainshark.com
 * Description: This plugin allows you to easily embed Brainshark presentations by using the [brainshark] shortcode. To get started: 1) Activate the plugin. 2) Use the shortcode [brainshark url="YOUR_PRESENTATION_LINK" width="EMBED_WIDTH" height="EMBED_HEIGHT"] ex. [brainshark url="www.brainshark.com/YOUR_COMPANY/vu?pi=PRESENTATION_ID" width="555" height="452"]. Optimal embed sizes 345x294, 440x366, 555x452
 * Version: 2.0
 * Author: Louis Ellis
 */
 
/********************************************************/
/* FUNCTIONS
********************************************************/
require_once('TemplateEngine.php'); 
 
if(!class_exists('Brainshark')){
	class Brainshark {
		 	 	
		public function generateShortcode( $atts ) {
			extract( shortcode_atts( array(
				'url'   => '',
				'width' => '555',
				'height'=> '452'
			), $atts ) );
						
			$Player = new TemplateEngine('Player.php', array(
					'url'   => $url. '&dm=5&pause=1&nrs=1',
					'width' => $width,
					'height'=> $height
				));
			return $Player->render();
		}
		
		public function __construct(){
			//Add shortcode support for 
			add_shortcode( 'brainshark', array($this,'generateShortcode' ) );
		}

	}
	
	new Brainshark();
	
}
?>