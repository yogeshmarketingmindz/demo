<?php
	/**
	 * Import Demo functions and definitions
	 *
	 * Set up the theme and provides some helper functions, which are used in the
	 * theme as custom template tags. Others are attached to action and filter
	 * hooks in WordPress to change core functionality.
	 *
	 * When using a child theme you can override certain functions (those wrapped
	 * in a function_exists() call) by defining them first in your child theme's
	 * functions.php file. The child theme's functions.php file is included before
	 * the parent theme's file, so the child theme functions would be used.
	 *
	 * @link       https://codex.wordpress.org/Theme_Development
	 * @link       https://codex.wordpress.org/Child_Themes
	 *
	 * Functions that are not pluggable (not wrapped in function_exists()) are
	 * instead attached to a filter or action hook.
	 *
	 * For more information on hooks, actions, and filters,
	 * {@link https://codex.wordpress.org/Plugin_API}
	 *
	 * @package    Import Demo
	 * @subpackage Import Demo Init
	 * @since      Import Demo
	 * @version    1.0.0
	 */



	/**
	 * Enqueue Admin CSS
	 */
	if ( !function_exists( 'import_demos_admin_enqueue' ) ) {

		function import_demos_admin_enqueue()
		{
			// Admin CSS
			wp_enqueue_script( 'import_demos-admin', THEMESTUDIO_IMPORT_PATH_URL . 'assets/js/wp-admin-demos.js',  array('jquery'),false, '1122', 'all' );
			wp_enqueue_style( 'import_demos-admin', THEMESTUDIO_IMPORT_PATH_URL . 'assets/css/admin-style.css', false, '1122', 'all' );
			wp_localize_script( 'import_demos-admin', 'td_ajax_url', get_admin_url() . 'admin-ajax.php' );

		}

		add_action( 'admin_enqueue_scripts', 'import_demos_admin_enqueue', 11 );
	}
	
	/**
	 * Implement the Custom Import panel
	 */
	
	require THEMESTUDIO_IMPORT_PATH . 'import-panel.php';
	require THEMESTUDIO_IMPORT_PATH . 'td_global.php';
	require THEMESTUDIO_IMPORT_PATH . 'td_config.php';
	require THEMESTUDIO_IMPORT_PATH . 'td_demo_ulti.php';
	require THEMESTUDIO_IMPORT_PATH . 'td_util.php';
	require THEMESTUDIO_IMPORT_PATH . 'td_installer_demo.php';