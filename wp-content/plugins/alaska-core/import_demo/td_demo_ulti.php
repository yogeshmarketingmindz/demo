<?php


	class td_demo_base
	{


		/**
		 * Checks if one of the needles from $needle_array is found in the $haystack
		 *
		 * @param $haystack
		 * @param $needle_array
		 *
		 * @return bool
		 */
		public static function multi_instring( $haystack, $needle_array )
		{
			foreach ( $needle_array as $needle ) {
				if ( strpos( $haystack, $needle ) !== false ) {
					return $needle;
				}
			}

			return false;
		}


		/**
		 * If one of the $requiered_keys is missing from the $received_array we will kill the execution
		 *
		 * @param $class          - the calling __CLASS__
		 * @param $function       - the calling __FUNCTION__
		 * @param $received_array - the array of parameter_key => 'value' received from the caller
		 * @param $requiered_keys - the expected array of parameter_key => 'error_string'
		 */
		protected static function check_params( $class, $function, $received_array, $requiered_keys )
		{
			foreach ( $requiered_keys as $requiered_key => $requiered_msg ) {
				if ( empty( $received_array[ $requiered_key ] ) ) {
					self::kill( $class, $function, $requiered_key . ' - ' . $requiered_msg, $received_array );
				}
			}
		}


		/**
		 * kill the execution and show an error message
		 *
		 * @param        $class
		 * @param        $function
		 * @param        $msg
		 * @param string $additional_info
		 */
		public static function kill( $class, $function, $msg, $additional_info = '' )
		{
			echo PHP_EOL . 'ERROR - ' . $class . '::' . $function . ' - ' . $msg;

			if ( !empty( $additional_info ) ) {
				if ( is_array( $additional_info ) ) {
					echo PHP_EOL . 'More info:' . PHP_EOL;
					foreach ( $additional_info as $key => $value ) {
						echo $key . ' - ' . $value . PHP_EOL;
					}
				}
			}

			die;
		}
	}


	/**
	 * Class td_demo_history - saves and restores a history point for our demos.
	 */
	class td_demo_history extends td_demo_base
	{
		private $td_demo_history = array();

		/**
		 * read the current history
		 */
		function __construct()
		{
			$this->td_demo_history = get_option( TD_THEME_NAME . '_demo_history' );
		}


		/**
		 * saves one demo history ONLY. If we already have one saved, it will do nothing
		 */
		function save_all()
		{

			// do not save another demo history if we already have one
			if ( isset( $this->td_demo_history[ 'demo_settings_date' ] ) ) {
				return;
			}

			$local_td_demo_history = array();

			$local_td_demo_history[ 'page_on_front' ] = get_option( 'page_on_front' );
			$local_td_demo_history[ 'show_on_front' ] = get_option( 'show_on_front' );
			$local_td_demo_history[ 'nav_menu_locations' ] = get_theme_mod( 'nav_menu_locations' );

			$sidebar_widgets = get_option( 'sidebars_widgets' );
			$local_td_demo_history[ 'sidebars_widgets' ] = $sidebar_widgets;

			$used_widgets = $this->get_used_widgets( $sidebar_widgets );


			if ( is_array( $used_widgets ) ) {
				foreach ( $used_widgets as $used_widget ) {
					$local_td_demo_history[ 'used_widgets' ][ $used_widget ] = get_option( 'widget_' . $used_widget );
				}
			}

			$local_td_demo_history[ 'theme_options' ] = get_option( TD_THEME_OPTIONS_NAME );
			$local_td_demo_history[ 'td_social_networks' ] = get_option( 'td_social_networks' );
			$local_td_demo_history[ 'demo_settings_date' ] = time();
			update_option( TD_THEME_NAME . '_demo_history', $local_td_demo_history );
		}


		/**
		 * Restores a demo history point. After the restore, the saved state is deleted from the database
		 */
		function restore_all()
		{
			update_option( 'page_on_front', $this->td_demo_history[ 'page_on_front' ] );
			update_option( 'show_on_front', $this->td_demo_history[ 'show_on_front' ] );
			set_theme_mod( 'nav_menu_locations', $this->td_demo_history[ 'nav_menu_locations' ] );
			update_option( 'sidebars_widgets', $this->td_demo_history[ 'sidebars_widgets' ] );

			if ( isset( $this->td_demo_history[ 'used_widgets' ] ) and is_array( $this->td_demo_history[ 'used_widgets' ] ) ) {
				foreach ( $this->td_demo_history[ 'used_widgets' ] as $used_widget => $used_widget_value ) {
					update_option( 'widget_' . $used_widget, $used_widget_value );
				}
			}


			// put the old theme settings back
			td_global::$td_options = $this->td_demo_history[ 'theme_options' ];
			update_option( TD_THEME_OPTIONS_NAME, td_global::$td_options );

			// ?
			update_option( 'td_social_networks', $this->td_demo_history[ 'td_social_networks' ] );

			// delete the demo history
			delete_option( TD_THEME_NAME . '_demo_history' );
		}


		/**
		 * returns the widget names used on each sidebar .... not 100% sure
		 *
		 * @param $sidebar_widgets_option
		 *
		 * @return array
		 */
		private function get_used_widgets( $sidebar_widgets_option )
		{
			$used_widgets = array();
			if ( is_array( $sidebar_widgets_option ) ) {
				foreach ( $sidebar_widgets_option as $sidebar => $widgets ) {
					if ( is_array( $widgets ) ) {
						foreach ( $widgets as $widget ) {
							$used_widgets[] = $this->_get_widget_id_base( $widget );
						}
					}
				}
			}

			return array_unique( $used_widgets );
		}

		private function _get_widget_id_base( $id )
		{
			return preg_replace( '/-[0-9]+$/', '', $id );
		}
	}


	/**
	 * Class td_demo_state - keeps the demo state. What demo is installed and how it's installed (full or no_content). We have a similar function in
	 * @see td_util::get_loaded_demo_id for the front end
	 */
	class td_demo_state extends td_demo_base
	{


		/**
		 * updates the current installed demo state
		 *
		 * @param $demo_id           string - the demo id that is installed
		 * @param $demo_install_type string "empty"|full|no_content  (full - a full install, no_content - a settings only install)
		 */
		static function update_state( $demo_id, $demo_install_type )
		{
			$new_state = array(
				'demo_id'           => $demo_id,
				'demo_install_type' => $demo_install_type,
			);
			update_option( TD_THEME_NAME . '_demo_state', $new_state );
		}


		/**
		 * @return bool|array
		 *  false - if there is no demo installed
		 *  array - array(
		 * 'demo_id' => '',
		 * 'demo_install_type' => ''    "empty"|full|no_content
		 * );
		 */
		static function get_installed_demo()
		{
			$demo_state = get_option( TD_THEME_NAME . '_demo_state' );
			if ( isset( $demo_state[ 'demo_install_type' ] ) and $demo_state[ 'demo_install_type' ] != '' ) {
				return $demo_state;
			}

			return false;
		}
	}


	/**
	 * Class td_demo_misc - misc stuff for demos. All the settings form here are removed via the td_demo_history when the theme settings are loaded back.
	 */
	class td_demo_category extends td_demo_base
	{


		static function add_category( $params_array )
		{

			self::check_params(
				__CLASS__, __FUNCTION__, $params_array, array(
					         'category_name' => 'Param is requiered!',
				         )
			);


			if ( empty( $params_array[ 'parent_id' ] ) ) {
				$new_cat_id = wp_create_category( $params_array[ 'category_name' ] );
			}
			else {
				$new_cat_id = wp_create_category( $params_array[ 'category_name' ], $params_array[ 'parent_id' ] );
			}


			//update category descriptions
			if ( !empty( $params_array[ 'description' ] ) ) {
				wp_update_term(
					$new_cat_id, 'category', array(
						           'description' => $params_array[ 'description' ],
					           )
				);
			}


			// update the category top post style
			if ( !empty( $params_array[ 'top_posts_style' ] ) ) {
				td_global::$td_options[ 'category_options' ][ $new_cat_id ][ 'tdc_category_top_posts_style' ] = $params_array[ 'top_posts_style' ];
			}


			// update the category top post grid style
			if ( !empty( $params_array[ 'tdc_category_td_grid_style' ] ) ) {
				td_global::$td_options[ 'category_options' ][ $new_cat_id ][ 'tdc_category_td_grid_style' ] = $params_array[ 'tdc_category_td_grid_style' ];
			}

			if ( !empty( $params_array[ 'tdc_color' ] ) ) {
				td_global::$td_options[ 'category_options' ][ $new_cat_id ][ 'tdc_color' ] = $params_array[ 'tdc_color' ];
			}


			// update the category template
			if ( !empty( $params_array[ 'category_template' ] ) ) {
				td_global::$td_options[ 'category_options' ][ $new_cat_id ][ 'tdc_category_template' ] = $params_array[ 'category_template' ];
			}


			// update the background if needed
			if ( !empty( $params_array[ 'background_td_pic_id' ] ) ) {
				td_global::$td_options[ 'category_options' ][ $new_cat_id ][ 'tdc_image' ] = td_demo_media::get_image_url_by_td_id( $params_array[ 'background_td_pic_id' ] );
				td_global::$td_options[ 'category_options' ][ $new_cat_id ][ 'tdc_bg_repeat' ] = 'stretch';
			}


			// update the sidebar if needed
			if ( !empty( $params_array[ 'sidebar_id' ] ) ) {
				td_global::$td_options[ 'category_options' ][ $new_cat_id ][ 'tdc_sidebar_name' ] = $params_array[ 'sidebar_id' ];
			}

			// moduel id to sue 123456 (NO MODULE JUST THE NUMBER)
			if ( !empty( $params_array[ 'tdc_layout' ] ) ) {
				td_global::$td_options[ 'category_options' ][ $new_cat_id ][ 'tdc_layout' ] = $params_array[ 'tdc_layout' ];
			}

			// update the sidebar position
			// sidebar_left, sidebar_right, no_sidebar
			if ( !empty( $params_array[ 'tdc_sidebar_pos' ] ) ) {
				td_global::$td_options[ 'category_options' ][ $new_cat_id ][ 'tdc_sidebar_pos' ] = $params_array[ 'tdc_sidebar_pos' ];
			}

			//update once the category options
			update_option( TD_THEME_OPTIONS_NAME, td_global::$td_options );


			// keep a list of installed category ids so we can delete them later if needed
			// ths is NOT IN WP_011, it's a WordPress option
			$td_stacks_demo_categories_id = get_option( 'td_demo_categories_id' );
			$td_stacks_demo_categories_id [] = $new_cat_id;
			update_option( 'td_demo_categories_id', $td_stacks_demo_categories_id );


			return $new_cat_id;
		}

		static function remove()
		{
			$td_stacks_demo_categories_id = get_option( 'td_demo_categories_id' );
			if ( is_array( $td_stacks_demo_categories_id ) ) {
				foreach ( $td_stacks_demo_categories_id as $td_stacks_demo_category_id ) {
					wp_delete_category( $td_stacks_demo_category_id );
				}
			}
		}
	}

	class td_demo_category_posttype extends td_demo_base
	{
		static function add_category_posttype( $params_array )
		{
			self::check_params(
				__CLASS__, __FUNCTION__, $params_array, array(
					         'category_name' => 'Param is requiered!',
				         )
			);
			if ( empty( $params_array[ 'parent_id' ] ) ) {
				$new_cat_tes_id = wp_insert_term( $params_array[ 'category_name' ], $params_array[ 'taxonomy_name' ] );
			}
			else {
				$new_cat_tes_id = wp_insert_term( $params_array[ 'category_name' ], $params_array[ 'taxonomy_name' ], array( 'parent' => $params_array[ 'parent_id' ] ) );
			}
			//Update option
			//update once the category options
			update_option( TD_THEME_OPTIONS_NAME, td_global::$td_options );

			// keep a list of installed category ids so we can delete them later if needed
			// ths is NOT IN WP_011, it's a WordPress option
			$td_stacks_demo_categories_id = get_option( 'td_demo_categories_posttype_id' );
			$td_stacks_demo_categories_id [] = $new_cat_tes_id;
			update_option( 'td_demo_categories_posttype_id', $td_stacks_demo_categories_id );

			return $new_cat_tes_id;
		}

		/**
		 * @param $params
		 *
		 * @return int|WP_Error
		 */
		static function add_post( $params )
		{


			self::check_params(
				__CLASS__, __FUNCTION__, $params, array(
					         'title'                => 'Param is requiered!',
					         'file'                 => 'Param is requiered!',
//					         'categories_id_array'  => 'Param is requiered!',
//					         'featured_image_td_id' => 'Param is requiered!',
				         )
			);

			$new_post = array(
				'post_title'     => $params[ 'title' ],
				'post_status'    => 'publish',
				'post_type'      => $params[ 'post_type' ],
				'post_content'   => td_demo_content::parse_content_file( $params[ 'file' ] ),
				'comment_status' => 'open',
				'guid'           => td_global::td_generate_unique_id(),
			);
			//new post / page
			$post_id = wp_insert_post( $new_post );
			// add our demo custom meta field, using this field we will delete all the pages
			update_post_meta( $post_id, 'td_demo_content', true );
			if ( !empty( $params[ 'taxonomy_name' ] ) && !empty( $params[ 'categories_id_array' ] ) ) {
				//assign the terms stored in $terms array to $the_post_id post
				wp_set_post_terms( $post_id, $params[ 'categories_id_array' ], $params[ 'taxonomy_name' ] );
			}
			if ( !empty( $params[ 'featured_image_td_id' ] ) ) {
				//set post thumbnail
				set_post_thumbnail( $post_id, td_demo_media::get_by_td_id( $params[ 'featured_image_td_id' ] ) );
			}
			// set the post template
			if ( !empty( $params[ 'portfolio_type' ] ) ) {
				update_post_meta( $post_id, 'themestudio_portfolio_type', $params[ 'portfolio_type' ]  );
			}
			if ( !empty( $params[ 'portfolio_slide' ] ) ) {
				update_post_meta( $post_id, 'themestudio_portfolio_slider', $params[ 'portfolio_slide' ]  );
			}
			if ( !empty( $params[ 'portfolio_image' ] ) ) {
				update_post_meta( $post_id, 'themestudio_portfolio_image', $params[ 'portfolio_image' ]  );
			}
			if ( !empty( $params[ 'portfolio_video' ] ) ) {
				update_post_meta( $post_id, 'themestudio_portfolio_video', $params[ 'portfolio_video' ]  );
			}
			if ( !empty( $params[ 'portfolio_audio' ] ) ) {
				update_post_meta( $post_id, 'themestudio_portfolio_audio', $params[ 'portfolio_audio' ]  );
			}

			if ( !empty( $params[ 'portfolio_client_name' ] ) ) {
				update_post_meta( $post_id, 'themestudio_title_meta', $params[ 'portfolio_client_name' ]  );
			}
			if ( !empty( $params[ 'portfolio_client_url' ] ) ) {
				update_post_meta( $post_id, 'themestudio_portfolio_url',$params[ 'portfolio_client_url' ]  );
			}

			if ( !empty( $params[ 'ts_name' ] ) ) {
				update_post_meta( $post_id, 'themestudio_testimonials_name',$params[ 'ts_name' ]  );
			}
			if ( !empty( $params[ 'ts_pos' ] ) ) {
				update_post_meta( $post_id, 'themestudio_testimonials_position',$params[ 'ts_pos' ]  );
			}
			if ( !empty( $params[ 'ts_client_web' ] ) ) {
				update_post_meta( $post_id, 'themestudio_testimonials_website',$params[ 'ts_client_web' ]  );
			}


			return $post_id;
		}


		static public function parse_content_file_mega( $file_path,$menu1,$menu2,$menu3 )
		{

			if ( !file_exists( $file_path ) ) {
				self::kill( __CLASS__, __FUNCTION__, 'file not found: ' . $file_path );
			}
			$file_content = file_get_contents( $file_path );
			$search_in_file = self::multi_instring(
				$file_content, array(
					             '0div',
					             'localhost',
					             '192.168.0.',
				             )
			);
			if ( $search_in_file !== false ) {
				self::kill( __CLASS__, __FUNCTION__, 'found in file content: ' . $search_in_file );
			}
			preg_match_all( "/xxx_(.*)_xxx/U", $file_content, $matches, PREG_PATTERN_ORDER );
			if ( !empty( $matches ) and is_array( $matches ) ) {
				foreach ( $matches[ 1 ] as $index => $match ) {
					$size = ''; //default image size
					//try to read the size form the match - NOT USED 29.05.2015
					if ( strpos( $match, ':' ) !== false ) {
						$match_parts = explode( ':', $match );
						$match = $match_parts[ 0 ];
						$size = explode( 'x', $match_parts[ 1 ] );
						//print_r($size);
					}
					$file_content = str_replace( $matches[ 0 ][ $index ], td_demo_media::get_image_url_by_td_id( $match, $size ), $file_content );
				}
			}
			unset( $matches );
			preg_match_all( "/iii_(.*)_iii/U", $file_content, $matches, PREG_PATTERN_ORDER );
			if ( !empty( $matches ) and is_array( $matches ) ) {
				foreach ( $matches[ 1 ] as $index => $match ) {

					$file_content = str_replace( $matches[ 0 ][ $index ], td_demo_media::get_by_td_id( $match ), $file_content );
				}
			}
			$file_content = str_replace( 'aaa_menu1_aaa', $menu1, $file_content );
			$file_content = str_replace( 'aaa_menu2_aaa', $menu2, $file_content );
			$file_content = str_replace( 'aaa_menu3_aaa', $menu3, $file_content );
			return $file_content;
		}


		static function add_post_megamenu( $params )
		{
			self::check_params(
				__CLASS__, __FUNCTION__, $params, array(
					         'title'                => 'Param is requiered!',
					         'file'                 => 'Param is requiered!',
				         )
			);
			$new_post = array(
				'post_title'     => $params[ 'title' ],
				'post_status'    => 'publish',
				'post_type'      => $params[ 'post_type' ],
				'post_content'   => td_demo_category_posttype::parse_content_file_mega( $params[ 'file' ],$params['menu1'],$params['menu2'],$params['menu3'] ),
				'comment_status' => 'open',
				'guid'           => td_global::td_generate_unique_id(),
			);
			//new post / page
			$post_id = wp_insert_post( $new_post );
			// add our demo custom meta field, using this field we will delete all the pages
			update_post_meta( $post_id, 'td_demo_content', true );
			if ( !empty( $params[ 'taxonomy_name' ] ) && !empty( $params[ 'categories_id_array' ] ) ) {
				//assign the terms stored in $terms array to $the_post_id post
				wp_set_post_terms( $post_id, $params[ 'categories_id_array' ], $params[ 'taxonomy_name' ] );
			}
			if ( !empty( $params[ 'featured_image_td_id' ] ) ) {
				//set post thumbnail
				set_post_thumbnail( $post_id, td_demo_media::get_by_td_id( $params[ 'featured_image_td_id' ] ) );
			}
			return $post_id;
		}



		static function remove( $taxonomy )
		{
			if ( is_admin() ) {
				$terms = get_terms( $taxonomy, array( 'fields' => 'ids', 'hide_empty' => false ) );
				foreach ( $terms as $value ) {
					wp_delete_term( $value, $taxonomy );
				}
			}
		}

		static function remove_post()
		{
			$args = array(
				'post_type'      => array( 'testimonial','portfolio','megamenu' ),
				'posts_per_page' => '-1',
			);
			$query = new WP_Query( $args );
			if ( !empty( $query->posts ) ) {
				foreach ( $query->posts as $post ) {
					wp_delete_post( $post->ID, true );
				}
			}
		}
	}


	class td_demo_content extends td_demo_base
	{


		static public function parse_content_file( $file_path )
		{

			if ( !file_exists( $file_path ) ) {
				self::kill( __CLASS__, __FUNCTION__, 'file not found: ' . $file_path );
			}
			$file_content = file_get_contents( $file_path );
			$search_in_file = self::multi_instring(
				$file_content, array(
					             '0div',
					             'localhost',
					             '192.168.0.',
				             )
			);
			if ( $search_in_file !== false ) {
				self::kill( __CLASS__, __FUNCTION__, 'found in file content: ' . $search_in_file );
			}
			preg_match_all( "/xxx_(.*)_xxx/U", $file_content, $matches, PREG_PATTERN_ORDER );
			if ( !empty( $matches ) and is_array( $matches ) ) {
				foreach ( $matches[ 1 ] as $index => $match ) {
					$size = ''; //default image size
					//try to read the size form the match - NOT USED 29.05.2015
					if ( strpos( $match, ':' ) !== false ) {
						$match_parts = explode( ':', $match );
						$match = $match_parts[ 0 ];
						$size = explode( 'x', $match_parts[ 1 ] );
						//print_r($size);
					}
					$file_content = str_replace( $matches[ 0 ][ $index ], td_demo_media::get_image_url_by_td_id( $match, $size ), $file_content );
				}
			}
			unset( $matches );
			preg_match_all( "/iii_(.*)_iii/U", $file_content, $matches, PREG_PATTERN_ORDER );
			if ( !empty( $matches ) and is_array( $matches ) ) {
				foreach ( $matches[ 1 ] as $index => $match ) {

					$file_content = str_replace( $matches[ 0 ][ $index ], td_demo_media::get_by_td_id( $match ), $file_content );
				}
			}

			return $file_content;
		}

		/**
		 * @param $params
		 *
		 * @return int|WP_Error
		 */
		static function add_post( $params )
		{


			self::check_params(
				__CLASS__, __FUNCTION__, $params, array(
					         'title'                => 'Param is requiered!',
					         'file'                 => 'Param is requiered!',
					         'categories_id_array'  => 'Param is requiered!',
					         'featured_image_td_id' => 'Param is requiered!',
				         )
			);


			$new_post = array(
				'post_title'     => $params[ 'title' ],
				'post_status'    => 'publish',
				'post_type'      => 'post',
				'post_content'   => self::parse_content_file( $params[ 'file' ] ),
				'comment_status' => 'open',
				'post_category'  => $params[ 'categories_id_array' ], //adding category to this post
				'guid'           => td_global::td_generate_unique_id(),
			);

			//new post / page
			$post_id = wp_insert_post( $new_post );

			// add our demo custom meta field, using this field we will delete all the pages
			update_post_meta( $post_id, 'td_demo_content', true );

			if ( !empty( $params[ 'post_format' ] ) ) {
				set_post_format( $post_id, $params[ 'post_format' ] );
			}

			set_post_thumbnail( $post_id, td_demo_media::get_by_td_id( $params[ 'featured_image_td_id' ] ) );

			if( !empty($params['post_image_url'])){
				update_post_meta( $post_id, 'themestudio_post_image', $params[ 'post_image_url' ]);
			}
			if ( !empty( $params[ 'featured_video_url' ] ) ) {
				update_post_meta( $post_id, 'themestudio_post_video_embed', $params[ 'featured_video_url' ] );
			}
			if ( !empty( $params[ 'featured_audio_url' ] ) ) {
				update_post_meta( $post_id, 'themestudio_post_audio_embed', $params[ 'featured_audio_url' ] );
			}
			if ( !empty( $params[ 'post_gallery_url' ] ) ) {
				update_post_meta( $post_id, 'themestudio_image_gallery', $params[ 'post_gallery_url' ] );
			}


			return $post_id;
		}


		static function add_page( $params )
		{

			self::check_params(
				__CLASS__, __FUNCTION__, $params, array(
					         'title' => 'Param is requiered!',
					         'file'  => 'Param is requiered!',
				         )
			);

			$new_post = array(
				'post_title'     => $params[ 'title' ],
				'post_status'    => 'publish',
				'post_type'      => 'page',
				'post_content'   => self::parse_content_file( $params[ 'file' ] ),
				'comment_status' => 'open',
				'guid'           => td_global::td_generate_unique_id(),
			);

			//new post / page
			$page_id = wp_insert_post( $new_post );

			if ( is_wp_error( $page_id ) ) {
				self::kill( __CLASS__, __FUNCTION__, $page_id->get_error_message() );
			}

			if ( $page_id === 0 ) {
				self::kill( __CLASS__, __FUNCTION__, 'wp_insert_post returned 0. Not ok!' );
			}

			// add our demo custom meta field, using this field we will delete all the pages
			update_post_meta( $page_id, 'td_demo_content', true );

			// set the page template if we have one
			if ( !empty( $params[ 'template' ] ) ) {
				update_post_meta( $page_id, '_wp_page_template', $params[ 'template' ] );
			}
			// add featured page
			set_post_thumbnail( $page_id, td_demo_media::get_by_td_id( $params[ 'featured_image_td_id' ] ) );

			// set as homepage?
			if ( !empty( $params[ 'homepage' ] ) and $params[ 'homepage' ] === true ) {
				update_option( 'page_on_front', $page_id );
				update_option( 'show_on_front', 'page' );
			}
			if ( !empty( $params[ 'ts_sidebar_page' ] ) ) {
				update_post_meta( $page_id, 'themestudio_page_sidebar', $params[ 'ts_sidebar_page' ], true );
			}
			//add custom title
			if ( !empty( $params[ 'ts_cust_title' ] ) ) {
				update_post_meta( $page_id, 'themestudio_custom_page_title', $params[ 'ts_cust_title' ], true );
			}
			//add custom Description
			if ( !empty( $params[ 'ts_cust_desc' ] ) ) {
				update_post_meta( $page_id, 'themestudio_custom_page_description', $params[ 'ts_cust_desc' ], true );
			}
			//Choose show banner or hide
			if ( !empty( $params[ 'ts_show_banner' ] ) ) {
				update_post_meta( $page_id, 'themestudio_show_banner', $params[ 'ts_show_banner' ], true );
			}

			// set as homepage?
			if (!empty($params['homepage']) and $params['homepage'] === true) {
				update_option( 'page_on_front', $page_id);
				update_option( 'show_on_front', 'page' );
			}
			// set as Blogpage?
			if (!empty($params['blogpage']) and $params['blogpage'] === true) {
				update_option( 'page_for_posts', $page_id );
			}

			return $page_id;
		}


		static function remove()
		{
			$args = array(
				'post_type'      => array( 'page', 'post', 'testimonial' ),
				'meta_key'       => 'td_demo_content',
				'posts_per_page' => '-1',
			);
			$query = new WP_Query( $args );
			if ( !empty( $query->posts ) ) {
				foreach ( $query->posts as $post ) {
					wp_delete_post( $post->ID, true );
				}
			}
		}

		static function remove_revolution()
		{
			global $wpdb; // you may not need this part. Try with and without it
			//Delete Data in table
			$sql1 = 'DELETE FROM  ' . $wpdb->prefix . 'revslider_slides';
			$wpdb->query( $wpdb->prepare( $sql1 ) );
			$sql2 = 'DELETE FROM  ' . $wpdb->prefix . 'revslider_css';
			$wpdb->query( $wpdb->prepare( $sql2 ) );
			$sql3 = 'DELETE FROM  ' . $wpdb->prefix . 'revslider_layer_animations';
			$wpdb->query( $wpdb->prepare( $sql3 ) );
			$sql4 = 'DELETE FROM  ' . $wpdb->prefix . 'revslider_navigations';
			$wpdb->query( $wpdb->prepare( $sql4 ) );
			$sql5 = 'DELETE FROM  ' . $wpdb->prefix . 'revslider_sliders';
			$wpdb->query( $wpdb->prepare( $sql5 ) );
			$sql6 = 'DELETE FROM  ' . $wpdb->prefix . 'revslider_static_slides';
			$wpdb->query( $wpdb->prepare( $sql6 ) );
		}
	}


	class td_demo_widgets extends td_demo_base
	{

		private static $hard_coded_sidebars = array(
			'primary',
			'footer_widget_1',
			'footer_widget_2',
			'footer_widget_3',
			'footer_widget_4',
		);
		private static $last_widget_instance = 70;


		private static $last_sidebar_widget_position = 0;


		/**
		 * adds a new sidebar
		 *
		 * @param $sidebar_name string - must begin with td_demo_
		 */
		static function add_sidebar( $sidebar_name )
		{
			if ( substr( $sidebar_name, 0, 8 ) != 'td_demo_' ) {
				self::kill( __CLASS__, __FUNCTION__, 'All sidebars used in the demo must begin with td_demo_' );
			}
			$tmp_sidebars = td_util::get_option( 'sidebars' );
			$tmp_sidebars[] = $sidebar_name;
			td_util::update_option( 'sidebars', $tmp_sidebars );
		}


		/**
		 * adds a widget to a sidebar
		 * WARNING "td-" is automatically added to the sidebar name
		 *
		 * @param $sidebar_id
		 *                     - default - to add to the default sidebar
		 *                     - footer-1 - to add to the footer 1
		 *                     - footer-2 - to add to the footer 2
		 *                     - footer-3 - to add to the footer 3
		 *                     - OR any custom sidebar created with @see td_demo_widgets::add_sidebar()
		 * @param $widget_name - the id of the widget
		 * @param $atts
		 */
		static function add_widget_to_sidebar( $sidebar_id, $widget_name, $atts )
		{

			$tmp_sidebars = td_util::get_option( 'sidebars' );
			if ( empty( $tmp_sidebars ) ) {
				$tmp_sidebars = array();
			}


			if (
				!in_array(  $sidebar_id, self::$hard_coded_sidebars ) and
				!in_array( $sidebar_id, $tmp_sidebars )
			) {
				self::kill( __CLASS__, __FUNCTION__, 'td_demo_widgets::add_widget_to_sidebar - No sidebar with the name provided! - ' . $sidebar_id . ' . Current registered sidebars: ', array_merge( self::$hard_coded_sidebars, $tmp_sidebars ) );
			}

			$widget_instances = get_option( 'widget_' . $widget_name );
			//in the demo mode, all the widgets will have an istance id of 70+
			$widget_instances[ self::$last_widget_instance ] = $atts;

			//add the widget instance to the database
			update_option( 'widget_' . $widget_name, $widget_instances );

			//print_r($widget_instances);
			$sidebars_widgets = get_option( 'sidebars_widgets' );

			//print_r($sidebars_widgets);
			$sidebars_widgets[ td_util::sidebar_name_to_id( $sidebar_id ) ][ self::$last_sidebar_widget_position ] = $widget_name . '-' . self::$last_widget_instance;
			//print_r($sidebars_widgets);
			update_option( 'sidebars_widgets', $sidebars_widgets );


			self::$last_sidebar_widget_position++;
			self::$last_widget_instance++;

		}


		/**
		 * Removes all widgets from the default sidebar.
		 *
		 * @param $sidebar_id - one of the following: default, footer-1, footer-2, footer   -3
		 */
		static function remove_widgets_from_sidebar( $sidebar_id = 'default' )
		{

			if ( !in_array( $sidebar_id, self::$hard_coded_sidebars ) ) {
				self::kill( __CLASS__, __FUNCTION__, 'You can only remove widgets from the hardcoded sidebars. For custom made sidebars during the import, there is no need to remove the widgets', self::$hard_coded_sidebars );
			}


			$sidebar_id = td_util::sidebar_name_to_id( $sidebar_id );
			$sidebars_widgets = get_option( 'sidebars_widgets' );

			if ( isset( $sidebars_widgets[ 'td-' . $sidebar_id ] ) ) {
				//empty the default sidebar
				$sidebars_widgets[ 'td-' . $sidebar_id ] = array();
				update_option( 'sidebars_widgets', $sidebars_widgets );
			}
		}


		/**
		 * remove the sidebars that begin with td_demo_
		 */
		static function remove()
		{
			$tmp_sidebars = td_util::get_option( 'sidebars' );
			if ( !empty( $tmp_sidebars ) ) {
				foreach ( $tmp_sidebars as $index => $sidebar ) {
					if ( substr( $sidebar, 0, 8 ) == 'td_demo_' ) {
						unset( $tmp_sidebars[ $index ] );
					}
				}
				td_util::update_option( 'sidebars', $tmp_sidebars );
			}

		}
	}


	/**
	 * tagDiv menu creating class
	 * Class td_demo_menus
	 */
	class td_demo_menus extends td_demo_base
	{


		private static $allowed_menu_names = array(
			'Megamenu',
			'Support & help',
			'Control panel',
			'Function Features',
			'Layout Features',
			'Portfolio Page',
		);


		/**
		 * creates a menu and adds it to a location of the theme
		 *
		 * @param $menu_name
		 * @param $location
		 *
		 * @return int menu id
		 */
		static function create_menu( $menu_name, $location )
		{
			if ( !in_array( $menu_name, self::$allowed_menu_names ) ) {
				self::kill( __CLASS__, __FUNCTION__, 'menu_name is not in allowed_menu_names. Menu name must be one of: ', self::$allowed_menu_names );
			}

			$menu_exists = wp_get_nav_menu_object( $menu_name );
			if ( $menu_exists === false ) { // check if the menu already exists
				$menu_id = wp_create_nav_menu( $menu_name );
				if ( is_wp_error( $menu_id ) ) {
					self::kill( __CLASS__, __FUNCTION__, $menu_id->get_error_message() );
				}

				$menu_spots_array = get_theme_mod( 'nav_menu_locations' );
				// activate the menu only if it's not already active
				if ( !isset( $menu_spots_array[ $location ] ) or $menu_spots_array[ $location ] != $menu_id ) {
					$menu_spots_array[ $location ] = $menu_id;
					set_theme_mod( 'nav_menu_locations', $menu_spots_array );
				}

				return $menu_id;
			}
			else {
				return $menu_exists->term_id;
			}
		}


		/**
		 * Adds a link to a menu
		 *
		 * @param $menu_params
		 *
		 * @return int|WP_Error
		 */
		static function add_link( $menu_params )
		{
			// requiered parameters
			self::check_params(
				__CLASS__, __FUNCTION__, $menu_params, array(
					         'title'          => 'Param is requiered!',
					         'url'            => 'Param is requiered!',
					         'add_to_menu_id' => 'A menu id generated by td_demo_menus::create_menu is requiered',
				         )
			);


			$itemData = array(
				'menu-item-object' => '',
				'menu-item-type'   => 'custom',
				'menu-item-title'  => $menu_params[ 'title' ],
				'menu-item-url'    => $menu_params[ 'url' ],
				'menu-item-status' => 'publish',
			);

			if ( !empty( $menu_params[ 'parent_id' ] ) ) {
				$itemData[ 'menu-item-parent-id' ] = $menu_params[ 'parent_id' ];
			}

			$menu_item_id = wp_update_nav_menu_item( $menu_params[ 'add_to_menu_id' ], 0, $itemData );

			return $menu_item_id;
		}


		/**
		 * @param $menu_params
		 *      - requiered -
		 *      - page_id
		 *      - add_to_menu_id
		 *      - optional -
		 *      - parent_id -
		 */
		static function add_page( $menu_params )
		{

			// requiered parameters
			self::check_params(
				__CLASS__, __FUNCTION__, $menu_params, array(
					         'page_id'        => 'To add a page to the menu, you need a page_ID. To add links or empty items, use td_demo_menus::add_link()',
					         'add_to_menu_id' => 'A menu id generated by td_demo_menus::create_menu is requiered',
				         )
			);


			//$menu_id, $title='', $page_id, $parent_id = ''
			$itemData = array(
				'menu-item-object-id' => $menu_params[ 'page_id' ],
				'menu-item-parent-id' => 0,
				'menu-item-object'    => 'page',
				'menu-item-type'      => 'post_type',
				'menu-item-status'    => 'publish',
			);

			if ( !empty( $menu_params[ 'parent_id' ] ) ) {
				$itemData[ 'menu-item-parent-id' ] = $menu_params[ 'parent_id' ];
			}
			// if no titlte is provided, wordpress will show the title of the page
			if ( !empty( $menu_params[ 'title' ] ) ) {
				$itemData[ 'menu-item-title' ] = $menu_params[ 'title' ];
			}

			// we do not use the menu id anywhere for now
			$menu_item_id = wp_update_nav_menu_item( $menu_params[ 'add_to_menu_id' ], 0, $itemData );

			return $menu_item_id;
		}


		/**
		 * adds a mega menu to a menu
		 *
		 * @param $menu_params
		 *
		 * @return int|WP_Error
		 */
		static function add_mega_menu( $menu_params )
		{

			// requiered parameters
			self::check_params(
				__CLASS__, __FUNCTION__, $menu_params, array(
					         'title'          => 'Param is requiered!',
					         'add_to_menu_id' => 'A menu id generated by td_demo_menus::create_menu is requiered',
				         )
			);


			$itemData = array(
				'menu-item-object'    => 'megamenu',
				'menu-item-type'      => 'post_type',
				'menu-item-title'     => $menu_params[ 'title' ],
				'menu-item-url'       => '#',
				'menu-item-status'    => 'publish',
				'menu-item-object-id' => $menu_params[ 'page_id' ],
			);

			$menu_item_id = wp_update_nav_menu_item( $menu_params[ 'add_to_menu_id' ], 0, $itemData );
			return $menu_item_id;
		}


		/**
		 * adds a category to a menu
		 *
		 * @param $menu_params
		 */
		static function add_category( $menu_params )
		{

			// requiered parameters
			self::check_params(
				__CLASS__, __FUNCTION__, $menu_params, array(
					         'title'          => 'Param is requiered!',
					         'category_id'    => 'Param is requiered! - this is the category id that will be used to generate the mega menu',
					         'add_to_menu_id' => 'A menu id generated by td_demo_menus::create_menu is requiered',
				         )
			);


			$itemData = array(
				'menu-item-title'     => $menu_params[ 'title' ],
				'menu-item-object-id' => $menu_params[ 'category_id' ],
				'menu-item-db-id'     => 0,
				'menu-item-url'       => get_category_link( $menu_params[ 'category_id' ] ),
				'menu-item-type'      => 'taxonomy', //taxonomy
				'menu-item-status'    => 'publish',
				'menu-item-object'    => 'category',
			);

			if ( !empty( $menu_params[ 'parent_id' ] ) ) {
				$itemData[ 'menu-item-parent-id' ] = $menu_params[ 'parent_id' ];
			}

			wp_update_nav_menu_item( $menu_params[ 'add_to_menu_id' ], 0, $itemData );
		}


		/**
		 * removes all the menus, used by uninstall
		 */
		static function remove()
		{
			foreach ( self::$allowed_menu_names as $menu_name ) {
				wp_delete_nav_menu( $menu_name );
			}
		}
	}


//$td_stacks_media->td_media_sideload_image('http://demo.tagdiv.com/newsmag/wp-content/uploads/2014/08/38.jpg', '');
	class td_demo_media extends td_demo_base
	{
		/**
		 * Download an image from the specified URL and attach it to a post.
		 *
		 * @since 2.6.0
		 *
		 * @param string $file    The URL of the image to download
		 * @param int    $post_id The post ID the media is to be associated with
		 * @param string $desc    Optional. Description of the image
		 *
		 * @return string|WP_Error Populated HTML img tag on success
		 */
		static function add_image_to_media_gallery( $td_attachment_id, $file, $post_id = '', $desc = null )
		{

			require_once( ABSPATH . 'wp-admin/includes/media.php' );
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
			require_once( ABSPATH . 'wp-admin/includes/image.php' );


			// Set variables for storage, fix file filename for query strings.
			preg_match( '/[^\?]+\.(jpe?g|jpe|gif|png)\b/i', $file, $matches );
			$file_array = array();
			$file_array[ 'name' ] = basename( $matches[ 0 ] );

			// Download file to temp location.
			$file_array[ 'tmp_name' ] = download_url( $file );

			// If error storing temporarily, return the error.
			if ( is_wp_error( $file_array[ 'tmp_name' ] ) ) {
				@unlink( $file_array[ 'tmp_name' ] );
				echo 'is_wp_error $file_array: ' . $file;
				print_r( $file_array[ 'tmp_name' ] );

				return $file_array[ 'tmp_name' ];
			}

			// Do the validation and storage stuff.
			$id = media_handle_sideload( $file_array, $post_id, $desc ); //$id of attachement or wp_error

			// If error storing permanently, unlink.
			if ( is_wp_error( $id ) ) {
				@unlink( $file_array[ 'tmp_name' ] );
				echo 'is_wp_error $id: ' . $id->get_error_messages() . ' ' . $file;

				return $id;
			}


			update_post_meta( $id, 'td_demo_attachment', $td_attachment_id );

			return $id;
		}


		static function remove()
		{
			$args = array(
				'post_type'      => array( 'attachment' ),
				'post_status'    => 'inherit',
				'meta_key'       => 'td_demo_attachment',
				'posts_per_page' => '-1',
			);
			$query = new WP_Query( $args );


			if ( !empty( $query->posts ) ) {
				foreach ( $query->posts as $post ) {
					$return_value = wp_delete_attachment( $post->ID, true );
					if ( $return_value === false ) {
						echo 'td_demo_media::remove - failed to delete image id:' . $post->ID;
					}
					//echo 'deleting: ' . $post->ID;
				}
			}
		}


		static function get_by_td_id( $td_id )
		{
			$args = array(
				'post_type'      => array( 'attachment' ),
				'post_status'    => 'inherit',
				'meta_key'       => 'td_demo_attachment',
				'posts_per_page' => '-1',
			);

			//@todo big problem here - we rely on the wp_cache from get_post_meta too much
			$query = new WP_Query( $args );
			if ( !empty( $query->posts ) ) {
				foreach ( $query->posts as $post ) {
					//search for our td_id in the post meta
					$pic_td_id = get_post_meta( $post->ID, 'td_demo_attachment', true );
					if ( $pic_td_id == $td_id ) {
						return $post->ID;
						break;
					}
				}
			}

			return false;
		}


		static function get_image_url_by_td_id( $td_id, $size = 'full' )
		{
			$image_id = self::get_by_td_id( $td_id );
			if ( $image_id !== false ) {
				$attachement_array = wp_get_attachment_image_src( $image_id, $size, false );
				if ( !empty( $attachement_array[ 0 ] ) ) {
					return $attachement_array[ 0 ];
				}

			}

			return false;
		}


	}