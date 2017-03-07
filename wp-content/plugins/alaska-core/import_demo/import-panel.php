<?php

// Exit if accessed directly
	if ( !defined( 'ABSPATH' ) ) {
		exit;
	}


	global $tb_admin_menus;

	$tb_admin_menus = array(
		array(
			'page_title' => esc_html__( 'Template Install Demos', 'install-demos' ),
			'menu_title' => esc_html__( 'Template Install Demos', 'install-demos' ),
			'capability' => 'manage_options',
			'menu_slug'  => 'ts_import_demos',
			'function'   => 'tmp_install_demo_admin_page',
			'icon'       => '', // icon_url
			'parrent'    => 'themes.php',
		),
	);

	/**
	 * Admin menus
	 **/
	function tmp_builder_register_menu_page()
	{
		global $tb_admin_menus;

		if ( !empty( $tb_admin_menus ) ) {
			foreach ( $tb_admin_menus as $admin_menu ):
				add_submenu_page( $admin_menu[ 'parrent' ], $admin_menu[ 'page_title' ], $admin_menu[ 'menu_title' ], $admin_menu[ 'capability' ], $admin_menu[ 'menu_slug' ], $admin_menu[ 'function' ] );
			endforeach;
		}

	}
	add_action( 'admin_menu', 'tmp_builder_register_menu_page' );


	function tmp_install_demo_admin_page()
	{
		require_once "td_view_install_demos.php";
	}
