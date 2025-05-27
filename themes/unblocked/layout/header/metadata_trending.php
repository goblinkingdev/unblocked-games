<?php
$domain_url = \helper\options::options_by_key_type('base_url');
$domain_url = preg_replace('/([\/]+)$/', '', $domain_url);
$thumb = \helper\options::options_by_key_type('favicon');
if (empty($thumb)) {
    $thumb = \helper\options::options_by_key_type('logo');
}
$banner = \helper\options::options_by_key_type('banner');
$site_name = \helper\options::options_by_key_type('site_name');
$meta_title = 'Trending Games - ' . $site_name;
$meta_description = "All Trending Games at " . $site_name;
$meta_keyword = 'Trending Games, free Trending Games';
$url = $domain_url . '/trending';

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
