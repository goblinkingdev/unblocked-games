<?php

$domain_url = \helper\options::options_by_key_type('base_url');
$domain_url = preg_replace('/([\/]+)$/', '', $domain_url);
$thumb = $category->image;
if (!$thumb) {
    $thumb = \helper\options::options_by_key_type('favicon');
}
$banner = $category->image;
if (!$banner) {
    $banner = \helper\options::options_by_key_type('banner');
}
$metadata = json_decode($category->metadata);
$meta_description = $metadata->description;
if ($meta_description == null || $meta_description == '') {
    $list_games = \helper\game::get_paging(1, 3, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type, $category->id);
    $str = 'Play ';
    foreach ($list_games as $k => $g) {
        if ($k == count($list_games) - 1) {
            $str .= ucwords($g->name) . ' ';
        } else {
            $str .= ucwords($g->name) . ', ';
        }
    }
    $str .= 'and many more for free';
    $meta_description = 'Want to play ' . $category->name . '? ' . $str . ' on ' . \helper\options::options_by_key_type('site_name') . '. The best starting point to discover ' . strtolower($category->name);
}
// $url = load_url()->current_url();
$url = $domain_url . '/games/' . $category->slug;
$meta_title = ucwords($category->name);
$title = $meta_title . " - Play " . $meta_title . ' on ' . \helper\options::options_by_key_type('site_name');
$meta_keyword = strtolower($category->name);
$favicon = \helper\image::get_thumbnail($thumb, 60, 60, 'm');
$favicon57 = \helper\image::get_thumbnail($thumb, 57, 57, 'm');
$favicon72 = \helper\image::get_thumbnail($thumb, 72, 72, 'm');
$favicon114 = \helper\image::get_thumbnail($thumb, 144, 144, 'm');

$data = array(
    'site_title' => $title,
    'site_name' => $title,
    'site_description' => $meta_description,
    'site_keywords' => $meta_keyword,
    'base_url' => $url,
    'banner' => $banner,
    'favicon' => $favicon,
    'favicon57' => $favicon57,
    'favicon72' => $favicon72,
    'favicon114' => $favicon114
);
echo \helper\themes::get_layout('header/metadata', $data);
