<?php

$domain_url = \helper\options::options_by_key_type('base_url');
$domain_url = preg_replace('/([\/]+)$/', '', $domain_url);
$thumb = $tag->image;
if (!$thumb) {
    $thumb = \helper\options::options_by_key_type('favicon');
}
$banner = $tag->image;
if (!$banner) {
    $banner = \helper\options::options_by_key_type('banner');
}
$metadata = json_decode($tag->metadata);
$meta_description = $metadata->description;
if ($meta_description == null || $meta_description == '') {
    $list_games = \helper\game::paging_by_tag($tag->id, 1, 3, 'publish_date', "DESC");
    $str = 'Play ';
    foreach ($list_games as $k => $g) {
        if ($k == count($list_games) - 1) {
            $str .= ucwords($g->name) . ' ';
        } else {
            $str .= ucwords($g->name) . ', ';
        }
    }
    $str .= 'and many more for free';
    $meta_description = 'Want to play ' . $tag->name . '? ' . $str . ' on ' . \helper\options::options_by_key_type('site_name') . '. The best starting point to discover ' . strtolower($tag->name);
}
$meta_keyword = strtolower($tag->name);
$url = $domain_url . '/tag/' . $tag->slug;
$meta_title = ucwords($tag->name);
$title = $meta_title . " - Play " . $meta_title . ' on ' . \helper\options::options_by_key_type('site_name');

$favicon = \helper\image::get_thumbnail($thumb, 60, 60, 'm');
$favicon57 = \helper\image::get_thumbnail($thumb, 57, 57, 'm');
$favicon72 = \helper\image::get_thumbnail($thumb, 72, 72, 'm');
$favicon114 = \helper\image::get_thumbnail($thumb, 114, 114, 'm');

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
