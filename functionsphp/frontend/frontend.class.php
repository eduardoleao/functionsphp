<?php
/**
 * Fontend specific functionality of this theme.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    FunctionsPhp
 * @subpackage FunctionsPhp/FrontEnd
 */

namespace FunctionsPhp\FrontEnd;


use \FunctionsPhp\Includes\Theme as Theme;


class FrontEnd extends Theme {


	/**
	 * Initialize the class and set its properties.
	 */
	public function __construct() {
		
		return $this;

	}
		

	/**
	 * Register stylesheets for the frontend.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		// Ref: https://developer.wordpress.org/reference/functions/wp_enqueue_style/
		
		wp_enqueue_style( $this->text_domain  . '-styles' , $this->theme_path . '/style.css' , array() , $this->version , 'screen' );

	}


	/**
	 * Register javascripts for the frontend.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		// Ref: https://developer.wordpress.org/reference/functions/wp_enqueue_script/
		
		wp_enqueue_script( $this->text_domain . '-scripts' , $this->theme_path . '/script.js' , array() , $this->version , true );
	
	}


	/**
	 * Register thumbnail sizes.
	 *
	 * @since    1.0.0
	 */
	public function register_thumbnail_sizes() {
		
		// Ref: https://developer.wordpress.org/reference/functions/add_theme_support/

		add_theme_support( 'post-thumbnails' );

		// Ref: https://developer.wordpress.org/reference/functions/add_image_size/

		add_image_size( 'custom-thumbnail' , 900 , 600 , true );

	}


	/**
	 * Add theme support.
	 *
	 * @since    1.0.0
	 */
	public function add_theme_support() {
		
		// Ref: https://developer.wordpress.org/reference/functions/add_theme_support/

		// HTML5.
		add_theme_support( 'html5' , array( 'comment-list' , 'comment-form' , 'search-form' , 'gallery' , 'caption' ) );
		
		// Menus.
		add_theme_support( 'menus' );

		// Post formats.
		add_theme_support( 'post-formats' , array( 'aside' , 'gallery' , 'link' , 'image' , 'quote' , 'status' , 'video' , 'audio' , 'chat' ) );
	
	}

}