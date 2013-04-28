<?php
add_action('init', 'remove_editor_init');
function remove_editor_init() {
$ids = array(21,8);
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
	for($a=0;$a<count($ids);$a++)
	{
		 if ($post_id == $ids[$a]) {
        remove_post_type_support('page', 'editor');
		}
	}
	
   
}
?>