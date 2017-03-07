<?php

// Create Megamenu
	$td_demo_header_menu_id = td_demo_menus::create_menu( 'Megamenu', 'megamenu' );
	$td_demo_support_menu_id = td_demo_menus::create_menu( 'Support & help', '' );
	$td_demo_control_menu_id = td_demo_menus::create_menu( 'Control panel', '' );
	$td_demo_layout_features_menu_id = td_demo_menus::create_menu( 'Layout Features', '' );
	$td_demo_function_features_menu_id = td_demo_menus::create_menu( 'Function Features', '' );
	$td_demo_portfolio_page_menu_id = td_demo_menus::create_menu( 'Portfolio Page', '' );


	/*  ----------------------------------------------------------------------------
		sidebars
	 */
//default sidebar
	td_demo_widgets::remove_widgets_from_sidebar( 'primary' );
	td_demo_widgets::add_widget_to_sidebar(
		'primary', 'search',
		array(
			'title' => "",
		)
	);
    /*
	td_demo_widgets::add_widget_to_sidebar(
		'primary', 'meta',
		array(
			'title' => "Meta",
		)
	);
    */
	td_demo_widgets::add_widget_to_sidebar(
		'primary', 'recent-posts',
		array(
			'title'  => "Recent Posts",
			'number' => "5",
		)
	);
	td_demo_widgets::add_widget_to_sidebar(
		'primary', 'recent-comments',
		array(
			'title'  => "Recent Commets",
			'number' => "5",
		)
	);
	td_demo_widgets::add_widget_to_sidebar(
		'footer_widget_1', 'ts_alaska_footer_about',
		array(
			'title'       => "About company",
			'description' => "Progressively conceptualize frictionless web-readiness without standardized e-commerce. Quickly incubate ubiquitous infomediaries after maintainable",
			'address'     => 'PO Box 16122 Collins Street West Victoria 8007 Australia',
			'email'       => 'no-replay@envato.com',
		)
	);
	td_demo_widgets::add_widget_to_sidebar(
		'footer_widget_1', 'ts_alaska_nav_menu',
		array(
			'title'       => "About company",
			'description' => "Progressively conceptualize frictionless web-readiness without standardized e-commerce. Quickly incubate ubiquitous infomediaries after maintainable",
			'address'     => 'PO Box 16122 Collins Street West Victoria 8007 Australia',
			'email'       => 'no-replay@envato.com',
		)
	);

	td_demo_widgets::add_widget_to_sidebar(
		'footer_widget_2', 'nav_menu',
		array(
			'title'    => "Support & help",
			'nav_menu' => $td_demo_support_menu_id,

		)
	);
	td_demo_widgets::add_widget_to_sidebar(
		'footer_widget_3', 'nav_menu',
		array(
			'title'    => "Control panel",
			'nav_menu' => $td_demo_control_menu_id,

		)
	);
	td_demo_widgets::add_widget_to_sidebar(
		'footer_widget_4', 'ts_alaska_follow_us',
		array(
			'title'     => "FOLLOW US",
			'twitter'   => "#",
			'facebook'  => "#",
			'google'    => "#",
			'youtube'   => "#",
			'vine'      => "#",
			'behance'   => "#",
			'dribbble'  => "#",
			'tumblr'    => "#",
			'instagram' => "#",
			'linkedin'  => "#",
		)
	);

	/*  ----------------------------------------------------------------------------
		pages
	 */
//homepage
	$td_homepage_id = td_demo_content::add_page(
		array(
			'title'           => 'Home V1',
			'file'            => td_global::$get_template_directory . 'demos/demo1/pages/home/homepage.txt',
			'template'        => 'templates/home-template.php',   // the page template full file name with .php
			'ts_cust_title'   => '',
			'ts_cust_desc'    => '',
			'ts_show_banner'  => 'on',
			'ts_sidebar_page' => 'primary',
			'homepage'        => true,
		)
	);
	$td_homepage2_id = td_demo_content::add_page(
		array(
			'title'           => 'Home V2',
			'file'            => td_global::$get_template_directory . 'demos/demo1/pages/home/home_v2.txt',
			'template'        => 'templates/home-template.php',   // the page template full file name with .php
			'ts_cust_title'   => '',
			'ts_cust_desc'    => '',
			'ts_show_banner'  => 'on',
			'ts_sidebar_page' => 'primary',
			'homepage'        => false,
		)
	);
	$td_homepage3_id = td_demo_content::add_page(
		array(
			'title'           => 'Home V3',
			'file'            => td_global::$get_template_directory . 'demos/demo1/pages/home/home_v3.txt',
			'template'        => 'templates/home-template.php',   // the page template full file name with .php
			'ts_cust_title'   => '',
			'ts_cust_desc'    => '',
			'ts_show_banner'  => 'on',
			'ts_sidebar_page' => 'primary',
			'homepage'        => false,
		)
	);
	$td_homepage4_id = td_demo_content::add_page(
		array(
			'title'           => 'Home V4',
			'file'            => td_global::$get_template_directory . 'demos/demo1/pages/home/home_v4.txt',
			'template'        => 'templates/home-template.php',   // the page template full file name with .php
			'ts_cust_title'   => '',
			'ts_cust_desc'    => '',
			'ts_show_banner'  => 'on',
			'ts_sidebar_page' => 'primary',
			'homepage'        => false,
		)
	);
	$td_homepage5_id = td_demo_content::add_page(
		array(
			'title'           => 'Home V5',
			'file'            => td_global::$get_template_directory . 'demos/demo1/pages/home/home_v5.txt',
			'template'        => 'templates/home-template.php',   // the page template full file name with .php
			'ts_cust_title'   => '',
			'ts_cust_desc'    => '',
			'ts_show_banner'  => 'on',
			'ts_sidebar_page' => 'primary',
			'homepage'        => false,
		)
	);
	$td_homecorporate_id = td_demo_content::add_page(
		array(
			'title'           => 'Home Corporate',
			'file'            => td_global::$get_template_directory . 'demos/demo1/pages/home/home_v6new.txt',
			'template'        => 'templates/home-template.php',   // the page template full file name with .php
			'ts_cust_title'   => '',
			'ts_cust_desc'    => '',
			'ts_show_banner'  => 'on',
			'ts_sidebar_page' => 'primary',
			'homepage'        => false,
		)
	);
	$td_homepage6_id = td_demo_content::add_page(
		array(
			'title'           => 'Home V6',
			'file'            => td_global::$get_template_directory . 'demos/demo1/pages/home/home_v6.txt',
			'template'        => 'templates/home-template.php',   // the page template full file name with .php
			'ts_cust_title'   => '',
			'ts_cust_desc'    => '',
			'ts_show_banner'  => 'on',
			'ts_sidebar_page' => 'primary',
			'homepage'        => false,
		)
	);
	$td_homepage7_id = td_demo_content::add_page(
		array(
			'title'           => 'Home V7',
			'file'            => td_global::$get_template_directory . 'demos/demo1/pages/home/home_v7.txt',
			'template'        => 'templates/home-template.php',   // the page template full file name with .php
			'ts_cust_title'   => '',
			'ts_cust_desc'    => '',
			'ts_show_banner'  => 'on',
			'ts_sidebar_page' => 'primary',
			'homepage'        => false,
		)
	);
	$td_homepage8_id = td_demo_content::add_page(
		array(
			'title'           => 'Home V8',
			'file'            => td_global::$get_template_directory . 'demos/demo1/pages/home/home_v8.txt',
			'template'        => 'templates/home-template.php',   // the page template full file name with .php
			'ts_cust_title'   => '',
			'ts_cust_desc'    => '',
			'ts_show_banner'  => 'on',
			'ts_sidebar_page' => 'primary',
			'homepage'        => false,
		)
	);

// Add page minimal
	$td_aboutus_id = td_demo_content::add_page(
		array(
			'title'           => 'About Us',
			'file'            => td_global::$get_template_directory . 'demos/demo1/pages/minimal/about.txt',
			'template'        => 'templates/fullwidth-template.php',   // the page template full file name with .php
			'ts_cust_title'   => '',
			'ts_cust_desc'    => 'Every day we learn something new and useful that we want to share with you',
			'ts_show_banner'  => 'on',
			'ts_sidebar_page' => 'primary',
			'homepage'        => false,
		)
	);
	$td_services_id = td_demo_content::add_page(
		array(
			'title'           => 'Services',
			'file'            => td_global::$get_template_directory . 'demos/demo1/pages/minimal/services.txt',
			'template'        => 'templates/fullwidth-template.php',   // the page template full file name with .php
			'ts_cust_title'   => '',
			'ts_cust_desc'    => '',
			'ts_show_banner'  => 'on',
			'ts_sidebar_page' => 'primary',
			'homepage'        => false,
		)
	);
	$td_teams_id = td_demo_content::add_page(
		array(
			'title'                => 'Teams',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/teams.txt',
			'template'             => 'page.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => 'Start your project with us. We’d love to work with you',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => 'header_pic',
			'ts_sidebar_page'      => '',
			'homepage'             => false,
		)
	);
	$td_pricing_id = td_demo_content::add_page(
		array(
			'title'                => 'Pricing',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/pricing-table.txt',
			'template'             => 'templates/fullwidth-template.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => '',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => 'header_pic',
			'ts_sidebar_page'      => '',
			'homepage'             => false,
		)
	);
	$td_faq_id = td_demo_content::add_page(
		array(
			'title'                => 'F.A.Q Page',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/faq.txt',
			'template'             => 'page.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => '',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => 'header_pic',
			'ts_sidebar_page'      => '',
			'homepage'             => false,
		)
	);
	$td_contactpage_id = td_demo_content::add_page(
		array(
			'title'                => 'Contact',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/contact.txt',
			'template'             => 'templates/fullwidth-template.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => 'Start your project with us. We’d love to work with you',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => 'header_pic',
			'ts_sidebar_page'      => '',
			'homepage'             => false,
		)
	);

	$td_buttons_id = td_demo_content::add_page(
		array(
			'title'                => 'Buttons',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/buttons.txt',
			'template'             => 'page.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => '',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => 'header_pic',
			'ts_sidebar_page'      => '',
			'homepage'             => false,
		)
	);
	$td_typography_id = td_demo_content::add_page(
		array(
			'title'                => 'Typography',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/typography.txt',
			'template'             => 'page.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => '',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => 'header_pic',
			'ts_sidebar_page'      => '',
			'homepage'             => false,
		)
	);
	$td_tabs_id = td_demo_content::add_page(
		array(
			'title'                => 'Tabs and Toggles',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/tabs-and-toggles.txt',
			'template'             => 'page.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => '',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => 'header_pic',
			'ts_sidebar_page'      => '',
			'homepage'             => false,
		)
	);
	$td_contentbox_id = td_demo_content::add_page(
		array(
			'title'                => 'Content box',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/content-box.txt',
			'template'             => 'templates/fullwidth-template.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => '',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => 'header_pic',
			'ts_sidebar_page'      => '',
			'homepage'             => false,
		)
	);
	$td_dividers_id = td_demo_content::add_page(
		array(
			'title'                => 'Dividers',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/dividers.txt',
			'template'             => 'page.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => '',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => 'header_pic',
			'ts_sidebar_page'      => '',
			'homepage'             => false,
		)
	);
	$td_counters_id = td_demo_content::add_page(
		array(
			'title'                => 'Counters',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/counters.txt',
			'template'             => 'templates/fullwidth-template.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => '',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => 'header_pic',
			'ts_sidebar_page'      => '',
			'homepage'             => false,
		)
	);
	$td_notifications_id = td_demo_content::add_page(
		array(
			'title'                => 'Notifications',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/notifications.txt',
			'template'             => 'page.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => '',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => 'header_pic',
			'ts_sidebar_page'      => '',
			'homepage'             => false,
		)
	);
	$td_columns_id = td_demo_content::add_page(
		array(
			'title'                => 'Columns',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/columns.txt',
			'template'             => 'page.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => '',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => 'header_pic',
			'ts_sidebar_page'      => '',
			'homepage'             => false,
		)
	);
	$td_social_id = td_demo_content::add_page(
		array(
			'title'                => 'Icons & social',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/social.txt',
			'template'             => 'templates/fullwidth-template.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => '',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => 'header_pic',
			'ts_sidebar_page'      => '',
			'homepage'             => false,
		)
	);
	$td_promotional_id = td_demo_content::add_page(
		array(
			'title'                => 'Promotional banner',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/promotional-banner.txt',
			'template'             => 'templates/fullwidth-template.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => '',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => '',
			'ts_sidebar_page'      => '',
			'homepage'             => false,
		)
	);


	/*  ----------------------------------------------------------------------------
		menu
	 */
//homepage

//homepage
	$td_subpage_id_1 = td_demo_content::add_page(
		array(
			'title'                => 'Fully Responsive Design',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/fully-responsive-design.txt',
			'template'             => 'templates/page_sidebar_left.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => '',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => '',
			'ts_sidebar_page'      => 'custom_sidebar',
			'homepage'             => false,
		)
	);
	$td_subpage_id_2 = td_demo_content::add_page(
		array(
			'title'                => 'Parallax Image, Video',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/parallax-image-video-background.txt',
			'template'             => 'templates/page_sidebar_left.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => '',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => '',
			'ts_sidebar_page'      => 'custom_sidebar',
			'homepage'             => false,
		)
	);
	$td_subpage_id_3 = td_demo_content::add_page(
		array(
			'title'                => 'Megamenu with drag, drop',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/megamenu-with-drag-drop.txt',
			'template'             => 'templates/page_sidebar_left.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => '',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => '',
			'ts_sidebar_page'      => 'custom_sidebar',
			'homepage'             => false,
		)
	);
	$td_subpage_id_4 = td_demo_content::add_page(
		array(
			'title'                => 'Unlimited Color Skins',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/unlimited-color-skins.txt',
			'template'             => 'templates/page_sidebar_left.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => '',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => '',
			'ts_sidebar_page'      => 'custom_sidebar',
			'homepage'             => false,
		)
	);
	$td_subpage_id_5 = td_demo_content::add_page(
		array(
			'title'                => 'Cross-Browser Compatible',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/cross-browser-compatible.txt',
			'template'             => 'templates/page_sidebar_left.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => '',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => '',
			'ts_sidebar_page'      => 'custom_sidebar',
			'homepage'             => false,
		)
	);
	$td_subpage_id_6 = td_demo_content::add_page(
		array(
			'title'                => 'Design with UX Optimization',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/elegant-design-with-ux-optimization.txt',
			'template'             => 'templates/page_sidebar_left.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => '',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => '',
			'ts_sidebar_page'      => 'custom_sidebar',
			'homepage'             => false,
		)
	);
	$td_subpage_id_7 = td_demo_content::add_page(
		array(
			'title'                => 'Visual Composer Drag Drop',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/visual-composer-drag-drop.txt',
			'template'             => 'templates/page_sidebar_left.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => '',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => '',
			'ts_sidebar_page'      => 'custom_sidebar',
			'homepage'             => false,
		)
	);
	$td_subpage_id_8 = td_demo_content::add_page(
		array(
			'title'                => 'SEO Friendly with Yoast',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/seo-friendly-with-yoast.txt',
			'template'             => 'templates/page_sidebar_left.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => '',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => '',
			'ts_sidebar_page'      => 'custom_sidebar',
			'homepage'             => false,
		)
	);
	$td_subpage_id_9 = td_demo_content::add_page(
		array(
			'title'                => 'Mailchimp Newsletter Support',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/font-awesome-icons-2.txt',
			'template'             => 'templates/page_sidebar_left.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => '',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => '',
			'ts_sidebar_page'      => 'custom_sidebar',
			'homepage'             => false,
		)
	);
	$td_subpage_id_10 = td_demo_content::add_page(
		array(
			'title'                => '2 Revolution Slider Sliders',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/2-revolution-slider-sliders.txt',
			'template'             => 'templates/page_sidebar_left.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => '',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => '',
			'ts_sidebar_page'      => 'custom_sidebar',
			'homepage'             => false,
		)
	);
	$td_subpage_id_11 = td_demo_content::add_page(
		array(
			'title'                => 'Translation Ready',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/translation-ready.txt',
			'template'             => 'templates/page_sidebar_left.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => '',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => '',
			'ts_sidebar_page'      => 'custom_sidebar',
			'homepage'             => false,
		)
	);
	$td_subpage_id_12 = td_demo_content::add_page(
		array(
			'title'                => 'Premium Support & Free Updates',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/premium-support-free-updates.txt',
			'template'             => 'templates/page_sidebar_left.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => '',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => '',
			'ts_sidebar_page'      => 'custom_sidebar',
			'homepage'             => false,
		)
	);

// Portfolio Page

	$td_subpage_id_13 = td_demo_content::add_page(
		array(
			'title'                => 'Portfolio 2 columns',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/portfolio-2-columns.txt',
			'template'             => 'templates/fullwidth-template.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => 'Dramatically deploy timely e-commerce via transparent scenarios.',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => '',
			'ts_sidebar_page'      => '',
			'homepage'             => false,
		)
	);
	$td_subpage_id_14 = td_demo_content::add_page(
		array(
			'title'                => 'Portfolio 3 columns',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/portfolio-3-columns.txt',
			'template'             => 'templates/fullwidth-template.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => 'Custom your portfolio page with 3 columns',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => '',
			'ts_sidebar_page'      => 'custom_sidebar',
			'homepage'             => false,
		)
	);
	$td_subpage_id_15 = td_demo_content::add_page(
		array(
			'title'                => 'Portfolio 4 columns',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/portfolio-4-columns.txt',
			'template'             => 'templates/fullwidth-template.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => 'Awesome portfolio displaying in 4 columns',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => '',
			'ts_sidebar_page'      => '',
			'homepage'             => false,
		)
	);
	$td_subpage_id_16 = td_demo_content::add_page(
		array(
			'title'                => 'Portfolio Sidebar',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/portfolio-sidebar.txt',
			'template'             => 'templates/page_sidebar_left.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => 'Display portfolio in a sidebar page template',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => '',
			'ts_sidebar_page'      => 'custom_sidebar',
			'homepage'             => false,
		)
	);
	$td_subpage_id_17 = td_demo_content::add_page(
		array(
			'title'                => 'Portfolio Full Width',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/portfolio-full-width.txt',
			'template'             => 'templates/fullwidth-template.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => 'This portfolio page even fullwith',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => '',
			'ts_sidebar_page'      => '',
			'homepage'             => false,
		)
	);

	$td_subpage_id_18 = td_demo_content::add_page(
		array(
			'title'                => 'Portfolio Single Page',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/extra/smart_post_portfolio.txt',
			'template'             => 'templates/page_sidebar_left.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => '',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => '',
			'ts_sidebar_page'      => 'custom_sidebar',
			'homepage'             => false,
		)
	);

//add the homepage to the menu
	$add_menu_home = td_demo_menus::add_page(
		array(
			'title'          => 'Home',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'page_id'        => $td_homepage_id,
			'parent_id'      => '',
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Home V2',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'page_id'        => $td_homepage2_id,
			'parent_id'      => $add_menu_home,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Home V3',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'page_id'        => $td_homepage3_id,
			'parent_id'      => $add_menu_home,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Home V4',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'page_id'        => $td_homepage4_id,
			'parent_id'      => $add_menu_home,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Home V5',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'page_id'        => $td_homepage5_id,
			'parent_id'      => $add_menu_home,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Home V6',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'page_id'        => $td_homepage6_id,
			'parent_id'      => $add_menu_home,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Home V7',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'page_id'        => $td_homepage7_id,
			'parent_id'      => $add_menu_home,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Home V8',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'page_id'        => $td_homepage8_id,
			'parent_id'      => $add_menu_home,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Home V9',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'page_id'        => $td_homecorporate_id,
			'parent_id'      => $add_menu_home,
		)
	);
// Add menu page
	$add_menu_page_id = td_demo_menus::add_link(
		array(
			'title'          => 'Page',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'url'            => '#',
			'parent_id'      => '',
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'About us',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'parent_id'      => $add_menu_page_id,
			'page_id'        => $td_aboutus_id,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Services',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'parent_id'      => $add_menu_page_id,
			'page_id'        => $td_services_id,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Teams',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'parent_id'      => $add_menu_page_id,
			'page_id'        => $td_teams_id,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Pricing Table',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'parent_id'      => $add_menu_page_id,
			'page_id'        => $td_pricing_id,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'F.A.Q Page',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'parent_id'      => $add_menu_page_id,
			'page_id'        => $td_faq_id,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Contact Us',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'parent_id'      => $add_menu_page_id,
			'page_id'        => $td_contactpage_id,
		)
	);

//add menu Control
	td_demo_menus::add_link(
		array(
			'title'          => 'Get Support',
			'add_to_menu_id' => $td_demo_control_menu_id,
			'url'            => '#',
			'parent_id'      => '',
		)
	);
	td_demo_menus::add_link(
		array(
			'title'          => 'Premium Hosting',
			'add_to_menu_id' => $td_demo_control_menu_id,
			'url'            => '#',
			'parent_id'      => '',
		)
	);
	td_demo_menus::add_link(
		array(
			'title'          => 'Auto Install Scripts',
			'add_to_menu_id' => $td_demo_control_menu_id,
			'url'            => '#',
			'parent_id'      => '',
		)
	);
	td_demo_menus::add_link(
		array(
			'title'          => 'Service Status',
			'add_to_menu_id' => $td_demo_control_menu_id,
			'url'            => '#',
			'parent_id'      => '',
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Contact Us',
			'add_to_menu_id' => $td_demo_control_menu_id,
			'page_id'        => $td_contactpage_id,
			'parent_id'      => $add_menu_home,
		)
	);
//add menu Support & help
	td_demo_menus::add_link(
		array(
			'title'          => 'Support Home',
			'add_to_menu_id' => $td_demo_support_menu_id,
			'url'            => '#',
			'parent_id'      => '',
		)
	);
	td_demo_menus::add_link(
		array(
			'title'          => 'Knowledge Center',
			'add_to_menu_id' => $td_demo_support_menu_id,
			'url'            => '#',
			'parent_id'      => '',
		)
	);
	td_demo_menus::add_link(
		array(
			'title'          => 'Rackspace Community',
			'add_to_menu_id' => $td_demo_support_menu_id,
			'url'            => '#',
			'parent_id'      => '',
		)
	);
	td_demo_menus::add_link(
		array(
			'title'          => 'API Documentation',
			'add_to_menu_id' => $td_demo_support_menu_id,
			'url'            => '#',
			'parent_id'      => '',
		)
	);
	td_demo_menus::add_link(
		array(
			'title'          => 'Developer Center',
			'add_to_menu_id' => $td_demo_support_menu_id,
			'url'            => '#',
			'parent_id'      => '',
		)
	);
// Add menu shortcodes
	$add_menu_short_id = td_demo_menus::add_link(
		array(
			'title'          => 'Shortcodes',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'url'            => '#',
			'parent_id'      => '',
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Buttons',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'parent_id'      => $add_menu_short_id,
			'page_id'        => $td_buttons_id,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Typography',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'parent_id'      => $add_menu_short_id,
			'page_id'        => $td_typography_id,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Tabs and Toggles',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'parent_id'      => $add_menu_short_id,
			'page_id'        => $td_tabs_id,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Content box',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'parent_id'      => $add_menu_short_id,
			'page_id'        => $td_contentbox_id,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Dividers',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'parent_id'      => $add_menu_short_id,
			'page_id'        => $td_dividers_id,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Counters',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'parent_id'      => $add_menu_short_id,
			'page_id'        => $td_counters_id,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Notifications',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'parent_id'      => $add_menu_short_id,
			'page_id'        => $td_notifications_id,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Columns',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'parent_id'      => $add_menu_short_id,
			'page_id'        => $td_columns_id,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Icons & social',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'parent_id'      => $add_menu_short_id,
			'page_id'        => $td_social_id,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Promotional banner',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'parent_id'      => $add_menu_short_id,
			'page_id'        => $td_promotional_id,
		)
	);

//Add Mega menu
	td_demo_menus::add_page(
		array(
			'title'          => 'Parallax Image, Video',
			'add_to_menu_id' => $td_demo_layout_features_menu_id,
			'parent_id'      => '',
			'page_id'        => $td_subpage_id_2,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Megamenu with drag, drop',
			'add_to_menu_id' => $td_demo_layout_features_menu_id,
			'parent_id'      => '',
			'page_id'        => $td_subpage_id_3,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Unlimited Color Skins',
			'add_to_menu_id' => $td_demo_layout_features_menu_id,
			'parent_id'      => '',
			'page_id'        => $td_subpage_id_4,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Cross-Browser Compatible',
			'add_to_menu_id' => $td_demo_layout_features_menu_id,
			'parent_id'      => '',
			'page_id'        => $td_subpage_id_5,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Design with UX Optimization',
			'add_to_menu_id' => $td_demo_layout_features_menu_id,
			'parent_id'      => '',
			'page_id'        => $td_subpage_id_6,
		)
	);

	td_demo_menus::add_page(
		array(
			'title'          => 'Visual Composer Drag Drop',
			'add_to_menu_id' => $td_demo_function_features_menu_id,
			'parent_id'      => '',
			'page_id'        => $td_subpage_id_7,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'SEO Friendly with Yoast',
			'add_to_menu_id' => $td_demo_function_features_menu_id,
			'parent_id'      => '',
			'page_id'        => $td_subpage_id_8,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Mailchimp Newsletter Support',
			'add_to_menu_id' => $td_demo_function_features_menu_id,
			'parent_id'      => '',
			'page_id'        => $td_subpage_id_9,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => '2 Revolution Slider Sliders',
			'add_to_menu_id' => $td_demo_function_features_menu_id,
			'parent_id'      => '',
			'page_id'        => $td_subpage_id_10,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Translation Ready',
			'add_to_menu_id' => $td_demo_function_features_menu_id,
			'parent_id'      => '',
			'page_id'        => $td_subpage_id_11,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Premium Support & Free Updates',
			'add_to_menu_id' => $td_demo_function_features_menu_id,
			'parent_id'      => '',
			'page_id'        => $td_subpage_id_12,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Portfolio 2 Columns',
			'add_to_menu_id' => $td_demo_portfolio_page_menu_id,
			'parent_id'      => '',
			'page_id'        => $td_subpage_id_13,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Portfolio 3 Columns',
			'add_to_menu_id' => $td_demo_portfolio_page_menu_id,
			'parent_id'      => '',
			'page_id'        => $td_subpage_id_14,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Portfolio 4 Columns',
			'add_to_menu_id' => $td_demo_portfolio_page_menu_id,
			'parent_id'      => '',
			'page_id'        => $td_subpage_id_15,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Portfolio Sidebar',
			'add_to_menu_id' => $td_demo_portfolio_page_menu_id,
			'parent_id'      => '',
			'page_id'        => $td_subpage_id_16,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Portfolio Fullwith',
			'add_to_menu_id' => $td_demo_portfolio_page_menu_id,
			'parent_id'      => '',
			'page_id'        => $td_subpage_id_17,
		)
	);
	$td_whmcs_id = td_demo_menus::add_link(
		array(
			'title'          => 'WHMCS',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'url'            => '#',
			'parent_id'      => '',
		)
	);
	td_demo_menus::add_link(
		array(
			'title'          => 'WHMCS Knowledgebase Page',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'url'            => '#',
			'parent_id'      => $td_whmcs_id,
		)
	);
	td_demo_menus::add_link(
		array(
			'title'          => 'WHMCS Domain Page',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'url'            => '#',
			'parent_id'      => $td_whmcs_id,
		)
	);
	td_demo_menus::add_link(
		array(
			'title'          => 'WHMCS Announcements Page',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'url'            => '#',
			'parent_id'      => $td_whmcs_id,
		)
	);
	td_demo_menus::add_link(
		array(
			'title'          => 'WHMCS Support Page',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'url'            => '#',
			'parent_id'      => $td_whmcs_id,
		)
	);


	/*  ---------------------------------------------------------------------------
		posts
	*/

	/*  ---------------------------------------------------------------------------
		categories
	*/
	$demo_cat_1_id = td_demo_category::add_category(
		array(
			'category_name'        => 'Design',
			'parent_id'            => '',
			'category_template'    => '',
			'top_posts_style'      => '',
			'description'          => '',
			'background_td_pic_id' => '',
			'sidebar_id'           => '',
			'tdc_layout'           => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
			'tdc_sidebar_pos'      => '', //sidebar_left, sidebar_right, no_sidebar
		)
	);
	$demo_cat_2_id = td_demo_category::add_category(
		array(
			'category_name'        => 'Technology',
			'parent_id'            => '',
			'category_template'    => '',
			'top_posts_style'      => '',
			'description'          => '',
			'background_td_pic_id' => '',
			'sidebar_id'           => '',
			'tdc_layout'           => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
			'tdc_sidebar_pos'      => '', //sidebar_left, sidebar_right, no_sidebar
		)
	);
	$demo_cat_3_id = td_demo_category::add_category(
		array(
			'category_name'        => 'Hosting',
			'parent_id'            => '',
			'category_template'    => '',
			'top_posts_style'      => '',
			'description'          => '',
			'background_td_pic_id' => '',
			'sidebar_id'           => '',
			'tdc_layout'           => '', //THE MODULE ID 1 2 3 NO NAME JUST ID
			'tdc_sidebar_pos'      => '', //sidebar_left, sidebar_right, no_sidebar
		)
	);

// posts in featured category

	td_demo_content::add_post(
		array(
			'title'                => 'Seamlessly enable multimedia based technologies',
			'file'                 => td_global::$get_template_directory . 'demos/default/pages/extra/post_default.txt',
			'categories_id_array'  => array( $demo_cat_1_id, $demo_cat_2_id ),
			'featured_image_td_id' => 'blog_img1',
			'post_format'          => 'image',
			'post_image_url'       => THEMESTUDIO_IMPORT_PATH_URL . 'assets/images/bl1.jpg',
		)
	);

	td_demo_content::add_post(
		array(
			'title'                => 'Distinctively provide access to backend',
			'file'                 => td_global::$get_template_directory . 'demos/default/pages/extra/post_default.txt',
			'categories_id_array'  => array( $demo_cat_1_id, $demo_cat_3_id ),
			'featured_image_td_id' => 'blog_img2',
			'post_format'          => 'image',
		)
	);

	td_demo_content::add_post(
		array(
			'title'                => 'Intrinsicly plagiarize interactive',
			'file'                 => td_global::$get_template_directory . 'demos/default/pages/extra/post_default.txt',
			'categories_id_array'  => array( $demo_cat_3_id, $demo_cat_2_id ),
			'featured_image_td_id' => 'blog_img1',
			'post_format'          => 'gallery',
			'post_gallery_url'     => array( THEMESTUDIO_IMPORT_PATH_URL . 'assets/images/blog_img2.jpg', THEMESTUDIO_IMPORT_PATH_URL . 'assets/images/blog_img1.jpg', THEMESTUDIO_IMPORT_PATH_URL . 'assets/images/blog_img5.jpg' ),
		)
	);

	td_demo_content::add_post(
		array(
			'title'                => 'Uniquely develop quality catalysts',
			'file'                 => td_global::$get_template_directory . 'demos/default/pages/extra/post_default.txt',
			'categories_id_array'  => array( $demo_cat_3_id ),
			'featured_image_td_id' => 'blog_img4',
			'post_format'          => 'video',
			'featured_video_url'   => 'https://player.vimeo.com/video/116022179',
		)
	);
	td_demo_content::add_post(
		array(
			'title'                => 'Collaboratively negotiate',
			'file'                 => td_global::$get_template_directory . 'demos/default/pages/extra/post_default.txt',
			'categories_id_array'  => array( $demo_cat_2_id ),
			'featured_image_td_id' => 'blog_img5',
			'post_format'          => 'audio',
			'featured_audio_url'   => 'https://soundcloud.com/littlesimz/little-simz-e-d-g-e-04-devour',
		)
	);

	/**
	 * Add Categories custom post type
	 */

	/*  ---------------------------------------------------------------------------
		categories Testimonial
	*/
	$demo_cat_test_1_id = td_demo_category_posttype::add_category_posttype(
		array(
			'category_name' => 'Planning',
			'taxonomy_name' => 'testimonials_cats',
			'parent_id'     => '',
		)
	);
	$demo_cat_test_2_id = td_demo_category_posttype::add_category_posttype(
		array(
			'category_name' => 'Ceremony',
			'taxonomy_name' => 'testimonials_cats',
			'parent_id'     => '',
		)
	);
// Add post for testimonial
	td_demo_category_posttype::add_post(
		array(
			'title'                => 'Lucia Penelope',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/extra/testimonial.txt',
			'categories_id_array'  => $demo_cat_test_1_id,
			'featured_image_td_id' => 'client',
			'post_type'            => 'testimonial',
			'taxonomy_name'        => 'testimonials_cats',
			'ts_name'              => 'Lucia Penelope',
			'ts_pos'               => 'CEO & Founder Geckoos',
			'ts_client_web'        => 'http://themestudio.net',
		)
	);
	td_demo_category_posttype::add_post(
		array(
			'title'                => 'Mark Adraison',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/extra/testimonial.txt',
			'categories_id_array'  => $demo_cat_test_1_id,
			'featured_image_td_id' => 'client',
			'post_type'            => 'testimonial',
			'taxonomy_name'        => 'testimonials_cats',
			'ts_name'              => 'Robert Smith',
			'ts_pos'               => 'CEO & Founder Geckoos',
			'ts_client_web'        => 'http://themestudio.net',
		)
	);
	td_demo_category_posttype::add_post(
		array(
			'title'                => 'Robert Smith',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/extra/testimonial.txt',
			'categories_id_array'  => $demo_cat_test_1_id,
			'featured_image_td_id' => 'client',
			'post_type'            => 'testimonial',
			'taxonomy_name'        => 'testimonials_cats',
			'ts_name'              => 'Robert Smith',
			'ts_pos'               => 'CEO & Founder Geckoos',
			'ts_client_web'        => 'http://themestudio.net',
		)
	);
	/*  ---------------------------------------------------------------------------
		categories Portfolio
	*/
	$demo_cat_port_1_id = td_demo_category_posttype::add_category_posttype(
		array(
			'category_name' => 'Advertising',
			'taxonomy_name' => 'portfolio_cats',
			'parent_id'     => '',
		)
	);
	$demo_cat_port_2_id = td_demo_category_posttype::add_category_posttype(
		array(
			'category_name' => 'Branding',
			'taxonomy_name' => 'portfolio_cats',
			'parent_id'     => '',
		)
	);
	$demo_cat_port_3_id = td_demo_category_posttype::add_category_posttype(
		array(
			'category_name' => 'Print',
			'taxonomy_name' => 'portfolio_cats',
			'parent_id'     => '',
		)
	);
	$demo_cat_port_4_id = td_demo_category_posttype::add_category_posttype(
		array(
			'category_name' => 'Product',
			'taxonomy_name' => 'portfolio_cats',
			'parent_id'     => '',
		)
	);
	$demo_cat_port_5_id = td_demo_category_posttype::add_category_posttype(
		array(
			'category_name' => 'Web Design',
			'taxonomy_name' => 'portfolio_cats',
			'parent_id'     => '',
		)
	);
// Add post for portfolio

	$post_portfolio_id = td_demo_category_posttype::add_post(
		array(
			'title'                 => 'Carlotta',
			'file'                  => td_global::$get_template_directory . 'demos/demo1/pages/extra/post_portfolio.txt',
			'categories_id_array'   => $demo_cat_port_1_id,
			'featured_image_td_id'  => 'newpreview',
			'post_type'             => 'portfolio',
			'taxonomy_name'         => 'portfolio_cats',
			'portfolio_type'        => 'slider',
			'portfolio_image'       => '',
			'portfolio_slide'       => array( THEMESTUDIO_IMPORT_PATH_URL . 'assets/images/newpreview.jpg', THEMESTUDIO_IMPORT_PATH_URL . 'assets/images/notes_office.jpg', THEMESTUDIO_IMPORT_PATH_URL . 'assets/images/parallax_img_video.jpg' ),
			'portfolio_video'       => '',
			'portfolio_audio'       => '',
			'portfolio_client_name' => 'Themestudio',
			'portfolio_client_url'  => 'http://alaska.themestudio.net/',
		)
	);
	td_demo_menus::add_link(
		array(
			'title'          => 'Porfolio single',
			'add_to_menu_id' => $td_demo_portfolio_page_menu_id,
			'url'            => home_url( '/' ) . '?p=' . $post_portfolio_id,
			'parent_id'      => $td_subpage_id_18,
		)
	);

	td_demo_category_posttype::add_post(
		array(
			'title'                 => 'Black Girl',
			'file'                  => td_global::$get_template_directory . 'demos/demo1/pages/extra/post_portfolio.txt',
			'categories_id_array'   => $demo_cat_port_1_id,
			'featured_image_td_id'  => 'person_02',
			'post_type'             => 'portfolio',
			'taxonomy_name'         => 'portfolio_cats',
			'portfolio_type'        => 'image',
			'portfolio_image'       => '',
			'portfolio_slide'       => '',
			'portfolio_video'       => '',
			'portfolio_audio'       => '',
			'portfolio_client_name' => 'Themestudio',
			'portfolio_client_url'  => 'http://alaska.themestudio.net/',
		)
	);
	td_demo_category_posttype::add_post(
		array(
			'title'                 => 'Seilenna',
			'file'                  => td_global::$get_template_directory . 'demos/demo1/pages/extra/post_portfolio.txt',
			'categories_id_array'   => $demo_cat_port_3_id,
			'featured_image_td_id'  => 'singleimgh2',
			'post_type'             => 'portfolio',
			'taxonomy_name'         => 'portfolio_cats',
			'portfolio_type'        => 'video',
			'portfolio_image'       => '',
			'portfolio_slide'       => '',
			'portfolio_video'       => 'https://player.vimeo.com/video/116022179',
			'portfolio_audio'       => '',
			'portfolio_client_name' => 'Themestudio',
			'portfolio_client_url'  => 'http://alaska.themestudio.net/',
		)
	);
	td_demo_category_posttype::add_post(
		array(
			'title'                 => 'Ada Blackjack',
			'file'                  => td_global::$get_template_directory . 'demos/demo1/pages/extra/post_portfolio.txt',
			'categories_id_array'   => $demo_cat_port_3_id,
			'featured_image_td_id'  => 'featurebg',
			'post_type'             => 'portfolio',
			'taxonomy_name'         => 'portfolio_cats',
			'portfolio_type'        => 'soundcloud',
			'portfolio_image'       => '',
			'portfolio_slide'       => '',
			'portfolio_video'       => '',
			'portfolio_audio'       => 'https://soundcloud.com/littlesimz/little-simz-e-d-g-e-04-devour',
			'portfolio_client_name' => 'Themestudio',
			'portfolio_client_url'  => 'http://alaska.themestudio.net/',
		)
	);
	td_demo_category_posttype::add_post(
		array(
			'title'                 => 'Tenoversix',
			'file'                  => td_global::$get_template_directory . 'demos/demo1/pages/extra/post_portfolio.txt',
			'categories_id_array'   => $demo_cat_port_3_id,
			'featured_image_td_id'  => 'img_feature_1',
			'post_type'             => 'portfolio',
			'taxonomy_name'         => 'portfolio_cats',
			'portfolio_type'        => 'slider',
			'portfolio_image'       => '',
			'portfolio_slide'       => array( THEMESTUDIO_IMPORT_PATH_URL . 'assets/images/newpreview.jpg', THEMESTUDIO_IMPORT_PATH_URL . 'assets/images/notes_office.jpg', THEMESTUDIO_IMPORT_PATH_URL . 'assets/images/parallax_img_video.jpg' ),
			'portfolio_video'       => '',
			'portfolio_audio'       => '',
			'portfolio_client_name' => 'Themestudio',
			'portfolio_client_url'  => 'http://alaska.themestudio.net/',
		)
	);
	td_demo_category_posttype::add_post(
		array(
			'title'                 => 'Soundcloud Project',
			'file'                  => td_global::$get_template_directory . 'demos/demo1/pages/extra/post_portfolio.txt',
			'categories_id_array'   => $demo_cat_port_4_id,
			'featured_image_td_id'  => 'main2',
			'post_type'             => 'portfolio',
			'taxonomy_name'         => 'portfolio_cats',
			'portfolio_type'        => 'image',
			'portfolio_image'       => THEMESTUDIO_IMPORT_PATH_URL . 'assets/images/main2.jpg',
			'portfolio_slide'       => '',
			'portfolio_video'       => '',
			'portfolio_audio'       => '',
			'portfolio_client_name' => 'Themestudio',
			'portfolio_client_url'  => 'http://alaska.themestudio.net/',
		)
	);
	td_demo_category_posttype::add_post(
		array(
			'title'                 => 'One Chair',
			'file'                  => td_global::$get_template_directory . 'demos/demo1/pages/extra/post_portfolio.txt',
			'categories_id_array'   => $demo_cat_port_5_id,
			'featured_image_td_id'  => 'mega_menu',
			'post_type'             => 'portfolio',
			'taxonomy_name'         => 'portfolio_cats',
			'portfolio_type'        => 'image',
			'portfolio_image'       => THEMESTUDIO_IMPORT_PATH_URL . 'assets/images/mega_menu.jpg',
			'portfolio_slide'       => '',
			'portfolio_video'       => '',
			'portfolio_audio'       => '',
			'portfolio_client_name' => 'Themestudio',
			'portfolio_client_url'  => 'http://alaska.themestudio.net/',
		)
	);
	td_demo_category_posttype::add_post(
		array(
			'title'                 => 'Objectively promote',
			'file'                  => td_global::$get_template_directory . 'demos/demo1/pages/extra/post_portfolio.txt',
			'categories_id_array'   => $demo_cat_port_4_id,
			'featured_image_td_id'  => 'mega_menu',
			'post_type'             => 'portfolio',
			'taxonomy_name'         => 'portfolio_cats',
			'portfolio_type'        => 'image',
			'portfolio_image'       => THEMESTUDIO_IMPORT_PATH_URL . 'assets/images/mega_menu.jpg',
			'portfolio_slide'       => '',
			'portfolio_video'       => '',
			'portfolio_audio'       => '',
			'portfolio_client_name' => 'Themestudio',
			'portfolio_client_url'  => 'http://alaska.themestudio.net/',
		)
	);
	td_demo_category_posttype::add_post(
		array(
			'title'                 => 'Competently engage',
			'file'                  => td_global::$get_template_directory . 'demos/demo1/pages/extra/post_portfolio.txt',
			'categories_id_array'   => $demo_cat_port_2_id,
			'featured_image_td_id'  => 'promo_01',
			'post_type'             => 'portfolio',
			'taxonomy_name'         => 'portfolio_cats',
			'portfolio_type'        => 'image',
			'portfolio_image'       => THEMESTUDIO_IMPORT_PATH_URL . 'assets/images/promo_01.jpg',
			'portfolio_slide'       => '',
			'portfolio_video'       => '',
			'portfolio_audio'       => '',
			'portfolio_client_name' => 'Themestudio',
			'portfolio_client_url'  => 'http://alaska.themestudio.net/',
		)
	);
	td_demo_category_posttype::add_post(
		array(
			'title'                 => 'Stet clita kasd gubergren',
			'file'                  => td_global::$get_template_directory . 'demos/demo1/pages/extra/post_portfolio.txt',
			'categories_id_array'   => $demo_cat_port_2_id,
			'featured_image_td_id'  => 'promo_02',
			'post_type'             => 'portfolio',
			'taxonomy_name'         => 'portfolio_cats',
			'portfolio_type'        => 'image',
			'portfolio_image'       => THEMESTUDIO_IMPORT_PATH_URL . 'assets/images/promo_02.jpg',
			'portfolio_slide'       => '',
			'portfolio_video'       => '',
			'portfolio_audio'       => '',
			'portfolio_client_name' => 'Themestudio',
			'portfolio_client_url'  => 'http://alaska.themestudio.net/',
		)
	);
// add megamenu

	$add_mega_menu = td_demo_category_posttype::add_post_megamenu(
		array(
			'title'     => 'megamenu',
			'file'      => td_global::$get_template_directory . 'demos/demo1/pages/extra/megamenu.txt',
			'post_type' => 'megamenu',
			'menu1'     => $td_demo_function_features_menu_id,
			'menu2'     => $td_demo_layout_features_menu_id,
			'menu3'     => $td_demo_portfolio_page_menu_id,
		)
	);
	td_demo_menus::add_mega_menu(
		array(
			'title'          => 'Featured',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'page_id'        => $add_mega_menu,
			'parent_id'      => '',
		)
	);
	// Add menu page shop
	$td_shop_id = td_demo_content::add_page(
		array(
			'title'                => 'Shop',
			'file'                 => td_global::$get_template_directory . 'demos/demo1/pages/minimal/shop.txt',
			'template'             => 'page.php',   // the page template full file name with .php
			'ts_cust_title'        => '',
			'ts_cust_desc'         => 'Ecommerce for wordpress',
			'ts_show_banner'       => 'on',
			'featured_image_td_id' => 'header_pic',
			'ts_sidebar_page'      => '',
			'homepage'             => false,
		)
	);
	//add menu shop
	td_demo_menus::add_page(
		array(
			'title'          => 'Shop',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'parent_id'      => '',
			'page_id'        => $td_shop_id,
		)
	);
// Blog page
	$td_blogpage_id = td_demo_content::add_page(
		array(
			'title'           => 'Blog',
			'file'            => td_global::$get_template_directory . 'demos/default/pages/extra/blogpage.txt',
			'template'        => 'page.php',   // the page template full file name with .php
			'ts_cust_title'   => '',
			'ts_cust_desc'    => '',
			'ts_show_banner'  => 'on',
			'ts_sidebar_page' => 'primary',
			'homepage'        => false,
			'blogpage'        => true,
		)
	);
	td_demo_menus::add_page(
		array(
			'title'          => 'Blog',
			'add_to_menu_id' => $td_demo_header_menu_id,
			'parent_id'      => '',
			'page_id'        => $td_blogpage_id,
		)
	);