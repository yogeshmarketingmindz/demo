<?php
	/*
	 * Plugin Name: Alaska Core
	 * Plugin URI: http://themestudio.net
	 * Description: Add new post type, taxonomy, metaboxes, shortcodes or something
	 * Author: ThemeStudio Development Group
	 * Text Domain: alaska-core
	 * Version: 1.2
	 * Author URI: http://themestudio.net
	 */
	if ( !defined( 'ABSPATH' ) ) {
		exit; // disable direct access
	}
	define( 'ALASKA_CORE_VERSION', '1.1' );
	define( 'ALASKA_CORE_BASE_URL', trailingslashit( plugins_url( 'alaska-core' ) ) );
	define( 'ALASKA_CORE_DIR_PATH', plugin_dir_path( __FILE__ ) );
	define( 'ALASKA_CORE_LIBS', ALASKA_CORE_DIR_PATH . '/libs/' );
	define( 'THEMESTUDIO_IMPORT_PATH', ALASKA_CORE_DIR_PATH . 'import_demo/' );
	define( 'THEMESTUDIO_IMPORT_PATH_URL', ALASKA_CORE_BASE_URL . '/import_demo/' );


	function ts_content_action_init()
	{
// Localization
		load_plugin_textdomain( 'alaska-core', false, ALASKA_CORE_DIR_PATH . 'languages' );
	}

// Add actions
	add_action( 'init', 'ts_content_action_init' );
	if(!function_exists('ts_init_import')){
		function ts_init_import(){
			require_once THEMESTUDIO_IMPORT_PATH.'init.php';
		}
	}

	add_action( 'after_setup_theme', 'ts_init_import' );

    function alaska_core_require_once( $file_path )
    {
    
        if ( file_exists( $file_path ) ) {
            require_once $file_path;
        }
    }
    
    /**
    * Load Redux Framework
    */
    alaska_core_require_once( ALASKA_CORE_LIBS . 'admin/reduxframework/ReduxCore/framework.php' );
	/**
	 * Load custom post type
	 */
	$postTypeArgs = array( 'portfolio', 'testimonial', 'megamenu' );
	if ( is_array( $postTypeArgs ) && !empty( $postTypeArgs ) ):

		foreach ( $postTypeArgs as $postType ):

			$postType = sanitize_key( $postType );

			$filePath = ALASKA_CORE_DIR_PATH . 'post-types/post-' . $postType . '.php';

			if ( file_exists( $filePath ) ):

				include_once $filePath;

			endif;

		endforeach;

	endif;

	/**
	 * Meta boxes
	 */
	require_once ALASKA_CORE_DIR_PATH . 'inc/icon-fonts.php';
	require_once ALASKA_CORE_DIR_PATH . 'metaboxes/metaboxes.php';


	if ( !function_exists( 'themestudio_metabox_js' ) ) {

		/*
		 * Load metabox js,css
		*/
		function themestudio_metabox_js()
		{
			if ( is_admin() ) {
				wp_register_script( 'custommetabox', plugins_url( '/core/metaboxes/js/themestudio-metas.js', __FILE__ ), false, ALASKA_CORE_VERSION, true );
				wp_enqueue_script( 'custommetabox' );
			}
		}

		add_action( 'admin_enqueue_scripts', 'themestudio_metabox_js' );

	}


    if ( !function_exists( 'alaska_subcrible_submit' ) ) {
        function alaska_subcrible_submit()
        {
            /**
             * Submit subcribe ajax
             */
    
            if ( !class_exists( 'MCAPI' ) ) {
                alaska_core_require_once( ALASKA_CORE_LIBS . 'classes/MCAPI.class.php' );
            }
            $response = array(
                'html'    => '',
                'message' => '',
                'success' => 'no',
            );
    
            $api_key = isset( $_POST[ 'api_key' ] ) ? $_POST[ 'api_key' ] : '';
            $list_id = isset( $_POST[ 'list_id' ] ) ? $_POST[ 'list_id' ] : '';
            $success_message = isset( $_POST[ 'success_message' ] ) ? $_POST[ 'success_message' ] : '';
            $email = isset( $_POST[ 'email' ] ) ? $_POST[ 'email' ] : '';
    
            $response[ 'message' ] = esc_html__( 'Failed', 'alaska-core' );
    
            $merge_vars = array();
            $api = new MCAPI( $api_key );
            if ( $api->listSubscribe( $list_id, $email, $merge_vars ) === true ) {
                $response[ 'message' ] = sanitize_text_field( $success_message );
                $response[ 'success' ] = 'yes';
            }
            else {
                // Sending failed
                $response[ 'message' ] = $api->errorMessage;
            }
    
    
            wp_send_json( $response );
            die();
    
        }
    
        add_action( 'wp_ajax_alaska_subcrible_submit', 'alaska_subcrible_submit', 100 );
        add_action( 'wp_ajax_nopriv_alaska_subcrible_submit', 'alaska_subcrible_submit', 100 );
    }
// define('ALASKA_CORE_SHORTCODE', true);


	require ALASKA_CORE_DIR_PATH . '/inc/ts_vc_global.php';
	require ALASKA_CORE_DIR_PATH . '/inc/themestudio.shortcode.class.php';
	require ALASKA_CORE_DIR_PATH . '/inc/shortcode-pricing-table.php';
	require ALASKA_CORE_DIR_PATH . '/widgets/newletter.php';

	if ( !function_exists( 'print_admin_notices' ) ):
		function print_admin_notices()
		{

		}

		add_action( 'admin_notices', 'print_admin_notices' );
	endif;

	if ( !function_exists( 'add_plugin_css' ) ):
		function add_plugin_css()
		{

		}

		add_action( 'admin_head', 'add_plugin_css' );
	endif;

	if ( !function_exists( 'add_plugin_admin_css_js' ) ):
		function add_plugin_admin_css_js()
		{
			if ( is_admin() ) {
				wp_enqueue_script( 'jquery-ui-core' );
				wp_enqueue_script( 'jquery-ui-sortable' );

				wp_enqueue_style( 'ts-plugin-style', plugin_dir_url( __FILE__ ) . 'assets/css/admin.css' );
				wp_enqueue_script( 'ts-plugin-script', plugin_dir_url( __FILE__ ) . 'assets/js/admin.js', 'jquery', '1.0.0', true );
			}
		}

		add_action( 'admin_enqueue_scripts', 'add_plugin_admin_css_js' );
	endif;

	if ( !function_exists( 'themestudio_add_styles_and_scripts' ) ):
		function themestudio_add_styles_and_scripts()
		{

			if ( !is_admin() && !is_login_page() ) {
				//wp_enqueue_script('shortcodes-search-script', plugin_dir_url(__FILE__).'inc/js/mootools.js', 'jquery', '1.0.0', true);
				wp_enqueue_script( 'shortcodes-script', plugin_dir_url( __FILE__ ) . 'assets/js/shortcodes.js', 'jquery', '1.0.0', true );
				global $smof_data;
				$new_lines = array( "\r\n", "\r", "\n" );
			}
            //Ajax
            wp_enqueue_script( 'custom-script', plugin_dir_url( __FILE__ ) . 'assets/js/custom.js', 'jquery', '1.0.0', true );
            wp_localize_script( 'custom-script', 'ajaxurl', get_admin_url() . '/admin-ajax.php' );
            
			
            
            
		}

		add_action( 'wp_enqueue_scripts', 'themestudio_add_styles_and_scripts' );
	endif;

	if ( !function_exists( 'is_login_page' ) ):
		function is_login_page()
		{
			return in_array( $GLOBALS[ 'pagenow' ], array( 'wp-login.php', 'wp-register.php' ) );
		}
	endif;


	add_filter( 'deprecated_function_trigger_error', '_no_deprecated_func_alert' );
	function _no_deprecated_func_alert( $x )
	{
		return false;
	}

	function ts_shortcodes_content_action_init()
	{
// Localization
		load_plugin_textdomain( 'themestudio', false, dirname( plugin_basename( __FILE__ ) ) );
	}

	if ( !function_exists( 'alaska_core_resize_image' ) ) {
		/**
		 * @param int    $attach_id
		 * @param string $img_url
		 * @param int    $width
		 * @param int    $height
		 * @param bool   $crop
		 * @param bool   $place_hold        Using place hold image if the image does not exist
		 * @param bool   $use_real_img_hold Using real image for holder if the image does not exist
		 * @param string $solid_img_color   Solid placehold image color (not text color). Random color if null
		 *
		 * @since 1.0
		 * @return array
		 */
		function alaska_core_resize_image( $attach_id = null, $img_url = null, $width, $height, $crop = false, $place_hold = true, $use_real_img_hold = true, $solid_img_color = null )
		{

			// If is singular and has post thumbnail and $attach_id is null, so we get post thumbnail id automatic
			if ( is_singular() && !$attach_id ) {
				if ( has_post_thumbnail() && !post_password_required() ) {
					$attach_id = get_post_thumbnail_id();
				}
			}

			// this is an attachment, so we have the ID
			$image_src = array();
			if ( $attach_id ) {
				$image_src = wp_get_attachment_image_src( $attach_id, 'full' );
				$actual_file_path = get_attached_file( $attach_id );
				// this is not an attachment, let's use the image url
			}
			else {
				if ( $img_url ) {
					$file_path = str_replace( get_site_url(), get_home_path(), $img_url );
					$actual_file_path = rtrim( $file_path, '/' );
					if ( !file_exists( $actual_file_path ) ) {
						$file_path = parse_url( $img_url );
						$actual_file_path = rtrim( ABSPATH, '/' ) . $file_path[ 'path' ];
					}
					if ( file_exists( $actual_file_path ) ) {
						$orig_size = getimagesize( $actual_file_path );
						$image_src[ 0 ] = $img_url;
						$image_src[ 1 ] = $orig_size[ 0 ];
						$image_src[ 2 ] = $orig_size[ 1 ];
					}
					else {
						$image_src[ 0 ] = '';
						$image_src[ 1 ] = 0;
						$image_src[ 2 ] = 0;
					}
				}
			}
			if ( !empty( $actual_file_path ) && file_exists( $actual_file_path ) ) {
				$file_info = pathinfo( $actual_file_path );
				$extension = '.' . $file_info[ 'extension' ];

				// the image path without the extension
				$no_ext_path = $file_info[ 'dirname' ] . '/' . $file_info[ 'filename' ];

				$cropped_img_path = $no_ext_path . '-' . $width . 'x' . $height . $extension;

				// checking if the file size is larger than the target size
				// if it is smaller or the same size, stop right here and return
				if ( $image_src[ 1 ] > $width || $image_src[ 2 ] > $height ) {

					// the file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
					if ( file_exists( $cropped_img_path ) ) {
						$cropped_img_url = str_replace( basename( $image_src[ 0 ] ), basename( $cropped_img_path ), $image_src[ 0 ] );
						$vt_image = array(
							'url'    => $cropped_img_url,
							'width'  => $width,
							'height' => $height,
						);

						return $vt_image;
					}

					// $crop = false
					if ( $crop == false ) {
						// calculate the size proportionaly
						$proportional_size = wp_constrain_dimensions( $image_src[ 1 ], $image_src[ 2 ], $width, $height );
						$resized_img_path = $no_ext_path . '-' . $proportional_size[ 0 ] . 'x' . $proportional_size[ 1 ] . $extension;

						// checking if the file already exists
						if ( file_exists( $resized_img_path ) ) {
							$resized_img_url = str_replace( basename( $image_src[ 0 ] ), basename( $resized_img_path ), $image_src[ 0 ] );

							$vt_image = array(
								'url'    => $resized_img_url,
								'width'  => $proportional_size[ 0 ],
								'height' => $proportional_size[ 1 ],
							);

							return $vt_image;
						}
					}

					// no cache files - let's finally resize it
					$img_editor = wp_get_image_editor( $actual_file_path );

					if ( is_wp_error( $img_editor ) || is_wp_error( $img_editor->resize( $width, $height, $crop ) ) ) {
						return array(
							'url'    => '',
							'width'  => '',
							'height' => '',
						);
					}

					$new_img_path = $img_editor->generate_filename();

					if ( is_wp_error( $img_editor->save( $new_img_path ) ) ) {
						return array(
							'url'    => '',
							'width'  => '',
							'height' => '',
						);
					}
					if ( !is_string( $new_img_path ) ) {
						return array(
							'url'    => '',
							'width'  => '',
							'height' => '',
						);
					}

					$new_img_size = getimagesize( $new_img_path );
					$new_img = str_replace( basename( $image_src[ 0 ] ), basename( $new_img_path ), $image_src[ 0 ] );

					// resized output
					$vt_image = array(
						'url'    => $new_img,
						'width'  => $new_img_size[ 0 ],
						'height' => $new_img_size[ 1 ],
					);

					return $vt_image;
				}

				// default output - without resizing
				$vt_image = array(
					'url'    => $image_src[ 0 ],
					'width'  => $image_src[ 1 ],
					'height' => $image_src[ 2 ],
				);

				return $vt_image;
			}
			else {
				if ( $place_hold ) {
					$width = intval( $width );
					$height = intval( $height );

					// Real image place hold (https://unsplash.it/)
					if ( $use_real_img_hold ) {
						$random_time = time() + rand( 1, 100000 );
						$vt_image = array(
							'url'    => 'https://unsplash.it/' . $width . '/' . $height . '?random&time=' . $random_time,
							'width'  => $width,
							'height' => $height,
						);
					}
					else {
						$color = $solid_img_color;
						if ( is_null( $color ) || trim( $color ) == '' ) {
							// Random color
							// $color = str_pad( dechex( mt_rand( 1, 255 ) ), 2, '0', STR_PAD_LEFT ) . str_pad( dechex( mt_rand( 1, 255 ) ), 2, '0', STR_PAD_LEFT ) . str_pad( dechex( mt_rand( 1, 255 ) ), 2, '0', STR_PAD_LEFT );

							// Show no image (gray)
							$vt_image = array(
								'url'    => alaska_core_no_image( array( 'width' => $width, 'height' => $height ) ),
								'width'  => $width,
								'height' => $height,
							);
						}
						else {
							if ( $color == 'transparent' ) { // Show no image transparent
								$vt_image = array(
									'url'    => alaska_core_no_image( array( 'width' => $width, 'height' => $height ), false, true ),
									'width'  => $width,
									'height' => $height,
								);
							}
							else { // No image with color from placehold.it
								$vt_image = array(
									'url'    => 'http://placehold.it/' . $width . 'x' . $height . '/' . $color . '/ffffff/',
									'width'  => $width,
									'height' => $height,
								);
							}
						}
					}

					return $vt_image;
				}
			}

			return false;
		}
	}
	if ( !function_exists( 'alaska_core_no_image' ) ) {

		/**
		 * No image generator
		 *
		 * @since 1.0
		 *
		 * @param $size : array, image size
		 * @param $echo : bool, echo or return no image url
		 **/
		function alaska_core_no_image( $size = array( 'width' => 500, 'height' => 500 ), $echo = false, $transparent = false )
		{

			$plugin_dir = ALASKA_CORE_DIR_PATH;  // Change me if you want into for theme.
			$plugin_uri = ALASKA_CORE_DIR_PATH; // You should change plugin-name. Change me if you want into for theme.

			$suffix = ( $transparent ) ? '_transparent' : '';

			if ( !is_array( $size ) || empty( $size ) ):
				$size = array( 'width' => 500, 'height' => 500 );
			endif;

			if ( !is_numeric( $size[ 'width' ] ) && $size[ 'width' ] == '' || $size[ 'width' ] == null ):
				$size[ 'width' ] = 'auto';
			endif;

			if ( !is_numeric( $size[ 'height' ] ) && $size[ 'height' ] == '' || $size[ 'height' ] == null ):
				$size[ 'height' ] = 'auto';
			endif;

			// base image must be exist
			$img_base_fullpath = $plugin_dir . '/assets/images/noimage/no_image' . $suffix . '.png';
			$no_image_src = $plugin_uri . '/assets/images/noimage/no_image' . $suffix . '.png';

			// Check no image exist or not
			if ( !file_exists( $plugin_dir . '/assets/images/noimage/no_image' . $suffix . '-' . $size[ 'width' ] . 'x' . $size[ 'height' ] . '.png' ) ):

				$no_image = wp_get_image_editor( $img_base_fullpath );

				if ( !is_wp_error( $no_image ) ):
					$no_image->resize( $size[ 'width' ], $size[ 'height' ], true );
					$no_image_name = $no_image->generate_filename( $size[ 'width' ] . 'x' . $size[ 'height' ], $plugin_dir . '/assets/images/noimage/', null );
					$no_image->save( $no_image_name );
				endif;

			endif;

			// Check no image exist after resize
			$noimage_path_exist_after_resize = $plugin_dir . '/assets/images/noimage/no_image' . $suffix . '-' . $size[ 'width' ] . 'x' . $size[ 'height' ] . '.png';

			if ( file_exists( $noimage_path_exist_after_resize ) ):
				$no_image_src = $plugin_uri . '/assets/images/noimage/no_image' . $suffix . '-' . $size[ 'width' ] . 'x' . $size[ 'height' ] . '.png';
			endif;

			if ( $echo ):
				echo $no_image_src;
			else:
				return $no_image_src;
			endif;

		}
	}
// Add actions
	add_action( 'init', 'ts_shortcodes_content_action_init' );