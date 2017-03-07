<?php

// add any new or customised functions here
require_once ( "core/init-child.php" );
include("Zoho_form.php");
include("Zoho_form_landing.php");
include("Zoho_form_widget.php");
include("tableshortcode.php");

function add_hatom_data_structure($content) {
$t = get_the_modified_time('c');
$author = get_the_author();
$title = get_the_title();
$pt= get_the_date('c');
if (is_home() || is_front_page() || is_singular() || is_page() || is_archive() || is_category() ) {
$content .= '<div class="hatom-extra" style="display:none;visibility:hidden;"><span class="entry-title">'.$title.'</span> is published on <span class="published">'.$pt.'</span> and last modified: <span class="updated"> '.$t.'</span> by <span class="author vcard"><span class="fn">'.$author.'</span></span></div>';
}
return $content;
}

add_filter('the_content', 'add_hatom_data_structure');

