<?php
$page = $_POST['p'];
$keywords = $_POST['keywords'];
$field_order = $_POST['field_order'];
$order_type = $_POST['order_type'];
$category_id = $_POST['category_id'];
$is_hot = $_POST['is_hot'];
$is_new = $_POST['is_new'];
$tag_id = $_POST['tag_id'];
$limit = $_POST['limit'];
if (!$limit) {
    $limit = \helper\options::options_by_key_type('game_home_limit', 'display');
    if (!$limit) {
        $limit = 15;
    }
}
$display = 'yes';

if (!$field_order) {
    $field_order = 'publish_date';
}

//=>$paging_content > pagination.php
$num_links = 3;


if ($tag_id) {
    $games = \helper\game::paging_by_tag($tag_id, $page, $limit, $order_by, $order_type, $not_equal);
    $count = \helper\game::count_by_tag($tag_id);
    $paging_content = \helper\game::paging_link($count, $page, $limit, $num_links);
} else {
    //get all in $games based $category_id
    $games  = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type, $category_id, $not_equal);
    $count = \helper\game::get_count($keywords, $type, $display, $is_hot, $is_new, $category_id, $not_equal);
    $paging_content = \helper\game::paging_link($count, $page, $limit, $num_links);
}

$html = \helper\themes::get_layout('game_item_ajax', array('games' => $games, 'paging_content' => $paging_content, 'flag' => true));
echo $html;
