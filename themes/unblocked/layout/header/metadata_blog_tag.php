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
    $meta_description = 'Blog and comments about the ' . $tag->name . ' tag';
}
// $url = load_url()->current_url();
$url = $domain_url . '/blog/tag/' . $tag->slug;

$meta_title = ucwords($tag->name);
$title = "Blog about the " . $meta_title . " tag on " . \helper\options::options_by_key_type('site_name');
$meta_keyword = strtolower($tag->name);
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
