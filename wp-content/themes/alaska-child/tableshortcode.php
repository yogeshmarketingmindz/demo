<?php
function table_short() {
	$post = get_post('2015');
	$content = $post->post_content;
	$content = apply_filters('the_content', $content);
	echo $content;
	
} 
add_shortcode( 'Px_tab', 'table_short' ); 

//Plan tables.................

function table_plan() {
	$post = get_post('2078');
	$content = $post->post_content;
	$content = apply_filters('the_content', $content);
	echo $content;
	
} 
add_shortcode( 'tab_plan', 'table_plan' ); 


?>