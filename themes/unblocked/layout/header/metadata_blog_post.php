<?php
$domain_url = \helper\options::options_by_key_type('base_url');
$domain_url = preg_replace('/([\/]+)$/', '', $domain_url);
$thumb = $post->image;
if (!$thumb) {
    $thumb = \helper\options::options_by_key_type('logo');
}
$banner = $post->image;
if (!$banner) {
    $banner = \helper\options::options_by_key_type('banner');
}
$url = $domain_url . '/blog/' . $post->slug;

$title = ucwords($post->title) . " Blog";
$metadata = json_decode($post->metadata);
$meta_description = $metadata->excerpt;
if (!$meta_description) {
    $meta_description = $metadata->description;
}
$meta_keyword = strtolower($metadata->keywords) . " blog";
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
