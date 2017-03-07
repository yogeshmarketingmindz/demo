<?php
	if ( !class_exists( 'ReduxFramework' ) && file_exists( get_template_directory() . '/admin/reduxframework/ReduxCore/framework.php' ) ) {
	    require_once( get_template_directory() . '/admin/reduxframework/ReduxCore/framework.php' );
	}
	if (is_child_theme()) {
		if ( file_exists( get_template_directory() . '/theme_options.php' ) ) {
		    require_once( get_template_directory() . '/theme_options.php' );
		}
	}

	/*
	 * Load Required/Recommended Plugins
	*/

	if ( file_exists( get_template_directory() . '/core/plugins_load.php' ) ) {
		require_once get_template_directory() . '/core/plugins_load.php';
	}