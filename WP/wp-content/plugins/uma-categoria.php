<?php
/*
Plugin name: One category only
Version: 0.2
Description: Replace the categories checkbox list in the admin area, by a radio button list, so that you choose only one category per post. Tested with WP 3.3.1.
*/
if(
	strstr($_SERVER['REQUEST_URI'], 'wp-admin/post-new.php') ||
	strstr($_SERVER['REQUEST_URI'], 'wp-admin/post.php') ||
	strstr($_SERVER['REQUEST_URI'], 'wp-admin/edit.php') 
	

	)
{ob_start('one_category_only');
}
function one_category_only($content) {
	$content = str_replace('type="checkbox" name="tax_input', 'type="radio" name="tax_input', $content);
return $content;
}


 ?>