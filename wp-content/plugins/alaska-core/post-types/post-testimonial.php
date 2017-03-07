<?php
    /*
     * Register post type testimonial
    */
    function themestudio_testimonials_post_type() 
    {
        $labels = array(
            'name' 					=> __('Testimonial', 'post type general name', 'themestudio'),
            'singular_name' 		=> __('Testimonial', 'post type singular name', 'themestudio'),
            'add_new' 				=> __('Add New', 'testmonial', 'themestudio'),
            'all_items' 			=> __('All Testimonials', 'themestudio'),
            'add_new_item' 			=> __('Add New Testimonial', 'themestudio'),
            'edit_item' 			=> __('Edit Testimonial', 'themestudio'),
            'new_item' 				=> __('New Testimonial', 'themestudio'),
            'view_item' 			=> __('View Testimonial', 'themestudio'),
            'search_items' 			=> __('Search Testimonial', 'themestudio'),
            'not_found' 			=> __('No Testimonial Found', 'themestudio'),
            'not_found_in_trash' 	=> __('No Testimonial Found in Trash', 'themestudio'), 
            'parent_item_colon' 	=> '',
        );
        
        $args = array(
            'labels' 			=> $labels,
            'public' 			=> true,
            'show_ui' 			=> true,
            'taxonomies'          => array( 'testimonials_cats', ),
            'capability_type' 	=> 'post',
            'hierarchical' 		=> false,
            'rewrite' 			=> array('slug' => 'testimonial-view', 'with_front' => true),
            'query_var' 		=> true,
            'show_in_nav_menus' => false,
            'menu_icon' 		=> 'dashicons-format-quote',
            'supports' 			=> array('title', 'thumbnail', 'excerpt', 'editor', 'author',),
        );
        
        register_post_type( 'testimonial' , $args );  
         $rewrite = array(
            'slug'                       => 'testimonial-category',
            'with_front'                 => true,
            'hierarchical'               => false,
        );         
          register_taxonomy('testimonials_cats',
            array('testimonial'), 
            array(
                'hierarchical' 		=> true,
                'public'            => true,
                'label' 			=> 'Testimonial Categories',
                'show_admin_column'	=>'true',
                'singular_label' 	=> 'Category', 
                'query_var' 		=> true,
                'rewrite'           =>  $rewrite,
            )
        );
    }
    add_action('init', 'themestudio_testimonials_post_type');
?>