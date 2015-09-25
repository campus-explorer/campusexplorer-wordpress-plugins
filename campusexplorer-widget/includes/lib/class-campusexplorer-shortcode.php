<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class campusexplorer_Shortcode {

	public static function content( $atts, $content = "" ) {

		$ce_source = sanitize_title_with_dashes(get_option('ce_pub_source_code'));

		if ($ce_source){

			$widget_settings =  ' data-ce-source="' . $ce_source ;
			$widget_settings .= ($atts['sourcecode_append'] != '' ? '-' . $atts['sourcecode_append'] : ''); 
			$widget_settings .= '"'; // end ce-source
			$widget_settings .= ($atts['tracking'] != '' ? ' data-ce-tracking="' . $atts['tracking'] . '"'  : '');
			$widget_settings .= ($atts['aos'] != '' ? ' data-ce-area_of_study="' . $atts['aos'] . '"'  : '');
			$widget_settings .= ($atts['concentration'] != '' ? ' data-ce-concentration="' . $atts['concentration'] . '"'  : '');
			$widget_settings .= ($atts['college'] != '' ? ' data-ce-college="' . $atts['college'] . '"'   : '');
			$widget_settings .= ($atts['header_text'] != '' ? ' data-ce-header_text="' . $atts['header_text'] . '"'  : '');
			$widget_settings .= ($atts['intro_text'] != '' ? ' data-ce-intro_text="' . $atts['intro_text'] . '"'  : '');

			if ($atts['is_lightbox'] == 1){
				$out = '<a class="campusexplorer-widget-launch" ';
				$out .= $widget_settings;
				$out .=  ' title="Get information on the degree program that\'s right for you."  rel="nofollow">';
				$out .= ($atts['lightbox_btn_text'] ?  $atts['lightbox_btn_text']: 'Request Information');
				$out .= '</a>';
			}else{
				$out = '<div class="campusexplorer-widget" '. $widget_settings .'></div>';
			}
		}

		return $out;
	}

}

