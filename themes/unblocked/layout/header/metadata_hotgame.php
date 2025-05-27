<?php
$domain_url = \helper\options::options_by_key_type('base_url');
$domain_url = preg_replace('/([\/]+)$/', '', $domain_url);
$thumb = \helper\options::options_by_key_type('logo');
$banner = \helper\options::options_by_key_type('banner');
$meta_title = 'HOT GAMES - play Hot Games on ' . \helper\options::options_by_key_type('site_name');
if ($meta_description == null || $meta_description == '') {
    $list_games = \helper\game::get_paging(1, 3, $keywords, $type, $display, 'yes', $is_new, 'publish_date', 'DESC');
    $str = 'Play ';
    foreach ($list_games as $k => $g) {
        if ($k == count($list_games) - 1) {
            $str .= ucwords($g->name) . ' ';
        } else {
            $str .= ucwords($g->name) . ', ';
        }
    }
    $str .= 'and many more for free';
    $meta_description = 'Want to play Hot Games? ' . $str . ' on ' . \helper\options::options_by_key_type('site_name') . '. The best starting point to discover hot games';
}
$meta_keyword = 'hot games';
$url = $domain_url . '/hot-games';
// $titlefacebook = $meta_title;
// $thumbfacebook = $thumb;
// $urlfacebook = $url;
// $desfacebook = $meta_description;
$favicon = \helper\image::get_thumbnail($thumb, 60, 60, 'm');
$favicon57 = \helper\image::get_thumbnail($thumb, 57, 57, 'm');
$favicon72 = \helper\image::get_thumbnail($thumb, 72, 72, 'm');
$favicon114 = \helper\image::get_thumbnail($thumb, 144, 144, 'm');

$data = array(
    'site_title' => $meta_title,
    'site_name' => $meta_title,
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
