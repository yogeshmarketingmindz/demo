<?php
	/*
 * This is the config file for the theme.
 */

	define("TD_THEME_NAME", "Alaska import");
	define("TD_THEME_VERSION", "1.0.0");
	define("TD_THEME_DEMO_DOC_URL", 'http://themestudio.net/');  //the url to the demo documentation
	define("TD_THEME_OPTIONS_NAME", "alaska"); //where to store our options

	global  $demo_list;
	$demo_list = array (
		'default' => array(
			'text' => 'Demo 1',
			'folder' => THEMESTUDIO_IMPORT_PATH . 'demos/demo1/',
			'img' => THEMESTUDIO_IMPORT_PATH_URL . 'demos/demo1/screenshot.png',
			'demo_url' => 'http://alaska.themestudio.net/',
			'td_css_generator_demo' => false
		),
		'defaultdemo' => array(
			'text' => 'Demo 2',
			'folder' => THEMESTUDIO_IMPORT_PATH . 'demos/default/',
			'img' => THEMESTUDIO_IMPORT_PATH_URL . 'demos/default/screenshot.png',
			'demo_url' => 'http://alaska2.themestudio.net/',
			'td_css_generator_demo' => false
		),
	);




	/**
	 * speed booster v 3.0 hooks - prepare the framework for the theme
	 * is also used by td_deploy - that's why it's a static class
	 * Class td_wp_booster_hooks
	 */
	class td_config {


		static function checkbox($checkbox_array) {
			//create a unique id
			$control_uniq_id = td_global::td_generate_unique_id();
			$input_hidden_value = $checkbox_array['false_value'];
			$class_buton_active = $class_control_active ='';

			//check for user saved data
			$user_data = self::read($checkbox_array);


			//check to see if the checkbox is active when we create it
			if($user_data == $checkbox_array['true_value']) {
				$input_hidden_value = $checkbox_array['true_value'];
				$class_buton_active = 'td-checbox-buton-active';
				$class_control_active = 'td-checkbox-active';
			}

			//building the control
			$buffy = '<div class="td-checkbox ' . $class_control_active . '" data-uid="' . $control_uniq_id . '" data-val-true="' . $checkbox_array['true_value'] . '" data-val-false="' . $checkbox_array['false_value'] . '">
                    <div class="td-checbox-buton ' . $class_buton_active . '"></div>
                  </div>
                  <input type="hidden" name="' . self::generate_name($checkbox_array) . '" id="' . $control_uniq_id . '" value="' . $input_hidden_value . '">';

			return $buffy;
		}
		/**
		 * Reads an individual setting - only one setting!
		 * @param $read_array -
		 * 'ds' => 'data source ID',
		'item_id' = > 'the category id for example', - OPTIONAL category id or author id or page id
		 * 'option_id' => 'the option id ex: background'
		 * @return returns the value of the setting
		 */
		static function read($read_array) {
			switch ($read_array['ds']) {

				case 'td_taxonomy':
					return td_util::get_taxonomy_option($read_array['item_id'], $read_array['option_id']);
					break;

				case 'td_cpt':
					return td_util::get_ctp_option($read_array['item_id'], $read_array['option_id']);
					break;

				case 'td_category':
					return td_util::get_category_option($read_array['item_id'], $read_array['option_id']);
					break;

				case 'td_option':
					return td_util::get_option($read_array['option_id']);//htmlspecialchars()
					break;

				case 'wp_option':
					return htmlspecialchars(get_option($read_array['option_id']));
					break;

				case 'td_homepage':
					// here we get all the options for the homepage (including widgets?)
					break;

				case 'td_page_option':

					break;

				case 'td_widget':

					break;

				//author metadata
				case 'td_author':
					return get_the_author_meta($read_array['option_id'], $read_array['item_id']);
					break;


				//wordpress theme mod datasource
				case 'wp_theme_mod':
					return htmlspecialchars(get_theme_mod($read_array['option_id']));
					break;


				//wordpress usermenu to menu spot datasource
				case 'wp_theme_menu_spot':
					$menu_spots_array = get_theme_mod('nav_menu_locations');
					//check to see if there is a menu assigned to that particular option_id (menu id)
					if (isset($menu_spots_array[$read_array['option_id']])) {
						return $menu_spots_array[$read_array['option_id']];
					} else {
						return '';
					}
					break;


				//translation data source
				case 'td_translate':
					//get all the translations (they are stored in the td_008 variable)
					$translations = td_util::get_option('td_translation_map_user');
					if (!empty($translations[$read_array['option_id']])) {
						return $translations[$read_array['option_id']];//htmlspecialchars()
					} else {
						return '';
					}
					//return td_util::get_option($read_array['option_id']);
					break;


				//read the ads parameters
				//[ds] => td_ads [option_id] => current_ad_type [item_id] => header - has to become [item_id][option_id]
				case 'td_ads':
					//get all the ad spots (they are stored in the td_008 variable)
					$ads = td_util::get_option('td_ads');
					if (!empty($ads[$read_array['item_id']]) and !empty($ads[$read_array['item_id']][$read_array['option_id']])) {
						return htmlspecialchars($ads[$read_array['item_id']][$read_array['option_id']]);
					} else {
						return '';
					}
					break;


				//social networks
				case 'td_social_networks':
					$social_array = td_util::get_option('td_social_networks');
					if (!empty($social_array[$read_array['option_id']])) {
						return $social_array[$read_array['option_id']];
					} else {
						return '';
					}
					break;

				case 'td_fonts_user_insert':
					$fonts_user_inserted = td_util::get_option('td_fonts_user_inserted');
					if(!empty($fonts_user_inserted[$read_array['option_id']])) {
						return $fonts_user_inserted[$read_array['option_id']];
					}
					break;


				case 'td_fonts':
					$fonts_user_inserted = td_util::get_option('td_fonts');
					if(!empty($fonts_user_inserted[$read_array['item_id']][$read_array['option_id']])) {
						return $fonts_user_inserted[$read_array['item_id']][$read_array['option_id']];
					}
					break;


				case 'td_block_styles':
					//get the hole block style array
					$td_block_styles = td_util::get_option('td_block_styles');

					if(!empty($td_block_styles) and !empty($td_block_styles[$read_array['item_id']][$read_array['option_id']])) {
						return $td_block_styles[$read_array['item_id']][$read_array['option_id']];
					}
					break;


				// fake datasource for demo import panel, we just use the panel to render controls but we save on our own @todo - find a solution to this
				case 'td_import_theme_styles':
					break;

				// fake datasource for metaboxes, we just use the panel to render controls but we save on our own  @todo - find a solution to this
				case 'td_page':
					break;
				case 'td_homepage_loop':
					break;
				case 'td_post_theme_settings':
					break;
				case 'td_update_theme_options':
					break;


				default:
					// try to get options for plugins
					return tdx_options::get_option($read_array['ds'], $read_array['option_id']);
					//return tdx_api_panel::get_data_from_datasource($read_array['ds'], $read_array['option_id']);
					break;
			}
		}

		/**
		 * generates the names for the forms control ex: <input name="xxx"
		 * @param $params_array
		 * @return string
		 */
		private static function generate_name($params_array) {
			if (
				$params_array['ds'] == 'td_category'
				or $params_array['ds'] == 'td_author'
				or $params_array['ds'] == 'td_ads'
				or $params_array['ds'] == 'td_fonts'
				or $params_array['ds'] == 'td_block_styles'
				or $params_array['ds'] == 'td_cpt'
				or $params_array['ds'] == 'td_taxonomy'
			) {
				return $params_array['ds'] . '[' . $params_array['item_id'] . ']' . '[' . $params_array['option_id'] . ']';
			} elseif($params_array['ds'] == 'wp_widget') {
				return $params_array['ds'] . '[' . $params_array['sidebar'] . ']' . '[' . $params_array['widget_name'] . ']' . '[' . $params_array['attribute_key'] . ']';
			} else {
				return $params_array['ds'] . '[' . $params_array['option_id'] . ']';
			}
		}

	}
