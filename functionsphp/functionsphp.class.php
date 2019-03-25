<?php

namespace FunctionsPhp;

require_once get_template_directory( ) . '/functionsphp/includes/autoload.php';

use \FunctionsPhp\Includes\Theme as Theme;
use \FunctionsPhp\Includes\Loader as Loader;
use \FunctionsPhp\FrontEnd\FrontEnd as FrontEnd;
use \FunctionsPhp\Admin\Admin as Admin;
use \FunctionsPhp\CleanUp\CleanUp as CleanUp;


class Functionsphp extends Theme {

	/**
	 * Loader.
	 *
	 * @since    1.0.0
	 */
	protected $loader;


	/**
	 * Define the core functionality.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->loader = new Loader();

		$this->define_frontend_hooks();
		$this->define_admin_hooks();
		$this->define_cleanup_hooks();

		$this->loader->run();
		
	}


	/**
	 * Register hooks related to frontend functionality.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_frontend_hooks() {

		$frontend = new FrontEnd();

		// Enqueue styles and scripts.
		$this->loader->add_action( 'wp_enqueue_scripts' , $frontend , 'enqueue_styles' , 10 , 1 );
		$this->loader->add_action( 'wp_enqueue_scripts' , $frontend , 'enqueue_scripts' , 10 , 1  );

		// Add theme support.
		$this->loader->add_action( 'init' , $frontend , 'add_theme_support' , 1 , 1 );

		// Register thumbnail sizes.
		$this->loader->add_action( 'init' , $frontend , 'register_thumbnail_sizes' , 1 );

	}


	/**
	 * Register hooks related to admin area functionality.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {	

		$admin = new Admin();

		// Enqueue styles and scripts.
		$this->loader->add_action( 'admin_enqueue_scripts' , $admin , 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts' , $admin , 'enqueue_scripts' );

		// Register navigational menus.
		$this->loader->add_action( 'init' , $admin , 'register_nav_menus' );

		// Register widgert areas.
		$this->loader->add_action( 'widgets_init' , $admin , 'register_widget_areas' );

		// Register custom posttypes.
		$this->loader->add_action( 'init' , $admin , 'register_custom_posttypes' );

	}


	/**
	 * Register hooks related to cleanup functionality.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_cleanup_hooks() {

		$cleanup = new CleanUp();

		// Remove emoji's header.
		$this->loader->add_action( 'init' , $cleanup , 'disable_emoji_dequeue_script' );

		// Remove junk from header.
		$this->loader->add_action( 'init' , $cleanup , 'clean_up_header' );

		// Remove wpembed scripts.
		$this->loader->add_action( 'wp_footer' , $cleanup , 'remove_wpembed_scripts' );

	}

}
