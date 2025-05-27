<?php

$site_title = \helper\options::options_by_key_type('site_title');
switch ($slug) {
    case 'about-us':
        $title = 'About Us';
        break;
    case 'copyright-infringement-notice-procedure':
        $title = 'Copyright Infringement Notice Procedure';
        break;
    case 'contact-us':
        $title = 'Contact Us';
        break;
    case 'privacy-policy':
        $title = 'privacy policy';
        break;
    case 'term-of-use':
        $title = 'Tearm Of Use';
        break;
    default :
        load_response()->redirect('/404');
        break;
}
$domain_url = \helper\options::options_by_key_type('base_url');
$domain_url = preg_replace('/([\/]+)$/', '', $domain_url);
$thumb = \helper\options::options_by_key_type('favicon');
$site_name = \helper\options::options_by_key_type('site_name');
$banner = \helper\options::options_by_key_type('banner');
$meta_title = ucwords($title . ' - ' . $site_name);
$meta_description = 'The information ' . $title . ' at ' . $site_name;
$meta_keyword = strtolower($title . ' ' . $site_name);
$base_url = $domain_url . '/' . $slug;
$data = array(
    'site_title' => $meta_title,
    'site_name' => $site_name,
    'site_description' => $meta_description,
    'site_keywords' => $meta_keyword,
    'base_url' => $base_url,
    'banner' => $banner
);
echo \helper\themes::get_layout('header/metadata', $data);
echo '<meta name="robots" content="noindex">';
?>
