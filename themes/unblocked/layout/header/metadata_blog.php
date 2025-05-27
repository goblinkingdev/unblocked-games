<?php
$domain_url = \helper\options::options_by_key_type('base_url');
$domain_url = preg_replace('/([\/]+)$/', '', $domain_url);
$thumb = \helper\options::options_by_key_type('logo');
$banner = \helper\options::options_by_key_type('banner');
$title = "Online games blog on " . \helper\options::options_by_key_type('site_title');
$site_name = \helper\options::options_by_key_type('site_name');
$meta_description = 'Blog site, where you want to learn and share gaming knowledge at ' . $site_name;
$site_keywords = strtolower('blog on ' . $site_name);
// $url = load_url()->current_url();
$url = $domain_url . '/blog';

$favicon = \helper\image::get_thumbnail($thumb, 60, 60, 'm');
$favicon57 = \helper\image::get_thumbnail($thumb, 57, 57, 'm');
$favicon72 = \helper\image::get_thumbnail($thumb, 72, 72, 'm');
$favicon114 = \helper\image::get_thumbnail($thumb, 144, 144, 'm');
$data = array(
    'site_title' => $title,
    'site_name' => $title,
    'site_description' => $meta_description,
    'site_keywords' => $site_keywords,
    'base_url' => $url,
    'banner' => $banner,
    'favicon' => $favicon,
    'favicon57' => $favicon57,
    'favicon72' => $favicon72,
    'favicon114' => $favicon114
);
echo \helper\themes::get_layout('header/metadata', $data);
