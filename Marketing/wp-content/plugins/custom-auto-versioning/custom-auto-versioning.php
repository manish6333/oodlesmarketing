<?php
/*
   Plugin Name: Custom Versioning
   Description: Apply filter for versioning.
   Author: Vishal Yadav
   Version: 1.4
*/

class custom_versioning {

	function __construct(){
		add_action('init', array( $this, 'add_filter' ));
	}

	public function add_filter(){

		add_filter( 'style_loader_src', array( $this, 'set_custom_ver_css_js' ), 9999 ); 
		add_filter( 'script_loader_src', array( $this, 'set_custom_ver_css_js' ), 9999 ); 

	}

	public function set_custom_ver_css_js( $src ){

		if ( strpos( $src, 'ver=' ) ){
			$filte_wit_ver_arr = ( explode( '?ver=', $src ) );

			$original_url = str_replace( get_template_directory_uri(), '', $filte_wit_ver_arr[0]);

			if ( strpos( $original_url, '-child' ) !== false ){
				$filname = 	str_replace('-child', '', $original_url);
				$style_file = get_stylesheet_directory().$filname; 
			} else {
				$filname = 	str_replace('-child', '', $original_url);
				$style_file = get_template_directory().$filname; 
			}

			if( file_exists( $style_file ) ){
				if ( $style_file ) {
					// css file timestamp
					$version = filemtime($style_file); 
					
					if ( strpos( $src, 'ver=' ) )
						// use the WP function add_query_arg() 
						// to set the ver parameter in 
						$src = add_query_arg( 'ver', '1.'.$version, $src );
					return esc_url( $src );
				}
			} else {
				return esc_url( $src );
			}
		}
	}

}

$versioning = new custom_versioning();