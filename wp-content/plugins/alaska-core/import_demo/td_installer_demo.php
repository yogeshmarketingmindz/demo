<?php
	/**
	 * Created by ra on 5/15/2015.
	 */
	class td_demo_installer {




		function __construct() {
			//AJAX VIEW PANEL LOADING
			add_action( 'wp_ajax_td_ajax_demo_install', array( $this, 'ajax_demos_controller' ) );
		}


		function ajax_demos_controller() {
			if (!current_user_can('switch_themes')) {
				die;
			}

			// try to extend the time limit
			global $demo_list;
			@set_time_limit(240);
			$td_demo_action = td_util::get_http_post_val('td_demo_action');
			$td_demo_id = td_util::get_http_post_val('td_demo_id');




			/*  ----------------------------------------------------------------------------
				Uninstall button - do uninstall with content
			 */
			if ($td_demo_action == 'uninstall_demo') {
				// remove our content
				td_demo_media::remove();
				td_demo_content::remove();
				td_demo_content::remove_revolution();
				td_demo_category::remove();
				td_demo_category_posttype::remove('testimonials_cats');
				td_demo_category_posttype::remove('portfolio_cats');
				td_demo_category_posttype::remove_post();
				td_demo_menus::remove();
				td_demo_widgets::remove();

				// restore all settings to the state before a demo was loaded
				$td_demo_history = new td_demo_history();
				$td_demo_history->restore_all();

				// update our state - no stack installed
				td_demo_state::update_state('', '');
			}




			/*  ----------------------------------------------------------------------------
				remove content before stack install
			*/



			/*  ----------------------------------------------------------------------------
			   Install content only - remove old settings
		   */
			else if ($td_demo_action == 'remove_content_before_install_no_content') {

				// save the history - this class will save the history only when going from user settings -> stack
				$td_demo_history = new td_demo_history();
				$td_demo_history->save_all();



				// clean the user settings
				td_demo_media::remove();
				td_demo_content::remove();
				td_demo_content::remove_revolution();
				td_demo_category::remove();
				td_demo_category_posttype::remove('testimonials_cats');
				td_demo_category_posttype::remove('portfolio_cats');
				td_demo_category_posttype::remove_post();
				td_demo_menus::remove();
				td_demo_widgets::remove();


				// remove panel settings and recompile the css as empty
				foreach (td_global::$td_options as $option_id => $option_value) {
					td_global::$td_options[$option_id] = '';
				}
				//typography settings
				td_global::$td_options['td_fonts'] = '';
				//css font files (google) buffer
				td_global::$td_options['td_fonts_css_files'] = '';
				//compile user css if any
				td_global::$td_options['tds_user_compile_css'] = td_css_generator();
				update_option(TD_THEME_OPTIONS_NAME, td_global::$td_options);
			}

			/*  ----------------------------------------------------------------------------
				Install with no content
			*/
			else if ($td_demo_action == 'install_no_content_demo') {
				td_demo_state::update_state($td_demo_id, 'no_content');
				// load panel settings - this will also recompile the css
				$this->import_panel_settings($demo_list[$td_demo_id]['folder'] . 'td_panel_settings.txt');
			}
			// step 1
			else if ($td_demo_action == 'remove_content_before_install') {

				// save the history - this class will save the history only when going from user settings -> stack
				$td_demo_history = new td_demo_history();
				$td_demo_history->save_all();

				// clean the user settings
				td_demo_media::remove();
				td_demo_content::remove();
				td_demo_content::remove_revolution();
				td_demo_category::remove();
				td_demo_category_posttype::remove('testimonials_cats');
				td_demo_category_posttype::remove('portfolio_cats');
				td_demo_category_posttype::remove_post();
				td_demo_menus::remove();
				td_demo_widgets::remove();
			}
			/*  ----------------------------------------------------------------------------
				install Full
			*/
			else if ($td_demo_action == 'td_media_1') {
				// change our state
				td_demo_state::update_state($td_demo_id, 'full');
				// load panel settings
				$this->import_panel_settings($demo_list[$td_demo_id]['folder'] . 'td_panel_settings.txt');
				// load the media import script
				require_once($demo_list[$td_demo_id]['folder'] . 'td_media_1.php');
			}
			else if ($td_demo_action == 'td_media_2') {
				//echo 'sss';
				// load the media import script
				require_once($demo_list[$td_demo_id]['folder'] . 'td_media_2.php');
			}
			else if ($td_demo_action == 'td_media_3') {

				// load the media import script
				require_once($demo_list[$td_demo_id]['folder'] . 'td_media_3.php');
			}
			else if ($td_demo_action == 'td_media_4') {
				// load the media import script
				require_once($demo_list[$td_demo_id]['folder'] . 'td_media_4.php');
			}
			else if ($td_demo_action == 'td_media_5') {
				// load the media import script
				require_once($demo_list[$td_demo_id]['folder'] . 'td_media_5.php');
			}
			else if ($td_demo_action == 'td_media_6') {
				// load the media import script
				require_once($demo_list[$td_demo_id]['folder'] . 'td_media_6.php');
			}
			else if ($td_demo_action == 'td_media_portfolio') {
				// load the media import script
				require_once($demo_list[$td_demo_id]['folder'] . 'td_media_portfolio.php');
			}
			else if ($td_demo_action == 'td_import')  {
				require_once($demo_list[$td_demo_id]['folder'] . 'td_import.php');
			}
			else if($td_demo_action == 'td_revolution'){
				//Import Revolution
				if ( class_exists( 'RevSlider' ) ) {
					$this->import_revolution_settings($demo_list[$td_demo_id]['folder'].'revolution/');
				}
			}


		}

		public function import_panel_settings($file_path) { //it's public only for testing
			//read the settings file

			$data = file_get_contents( $file_path );
			$data = json_decode( $data, true );
			$data = maybe_unserialize( $data );

			// Only if there is data
			if ( !empty( $data ) || is_array( $data ) ) {
				update_option( TD_THEME_OPTIONS_NAME, $data );
			}

			update_option( 'tdf_consumer_key', '83FGxUqbnH8mvFu50HuWxA' );
			update_option( 'tdf_consumer_secret', '2HXI9MBanKddMe3Lg8FPEtwsbO3imQakIcZIBpt7hv4' );
			update_option( 'tdf_access_token', '101961223-ZxYVkbSCZhVDktPkJXbEwgn3PsdHLvzCc95IaL7D' );
			update_option( 'tdf_access_token_secret', 'mIWqEBMaCqDABJWsF8gbatcbFi2UMkTQJ555uC6iiRvke' );
			update_option( 'tdf_cache_expire', '3600' );
			update_option( 'tdf_user_timeline', 'Envato' );
		}

		public function import_revolution_settings($filepath){
			//Import Sliders
			if ( class_exists( 'RevSlider' ) ) {
				$import_sliders_array = array(
					'home-business-slide1.zip',
					'home-business-slide2.zip',
					'home-business-slide3.zip',
				);
				if( is_array( $import_sliders_array ) ){
					foreach ($import_sliders_array as $slider_zip) {
						if ( !empty($slider_zip) && file_exists( $filepath.$slider_zip ) ) {
							$slider = new RevSlider();
							$slider->importSliderFromPost( true, true, $filepath.$slider_zip );
						}
					}
				}else{
					if ( file_exists( $filepath.$import_sliders_array ) ) {
						$slider = new RevSlider();
						$slider->importSliderFromPost( true, true, $filepath.$import_sliders_array );
					}
				}
			}
		}

	}

	new td_demo_installer();