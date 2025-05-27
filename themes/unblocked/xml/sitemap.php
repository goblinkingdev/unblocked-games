<?php
$games = \helper\game::get_paging(null, null, '', '', 'yes', '', '', 'id', 'asc');
$category = \helper\category::find_by_taxonomy('game');
$domain_url = \helper\options::options_by_key_type('base_url');
$domain_url = preg_replace('/([\/]+)$/', '', $domain_url);
$arr_footer = ["about-us", "copyright-infringement-notice-procedure", "contact-us", "privacy-policy", "term-of-use"];
header("Content-type: text/xml");
$str = "";
$str_head = '<?xml version="1.0" encoding="UTF-8"?> 
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
  <url> 
    <loc>' . $domain_url . '</loc>
    <changefreq>daily</changefreq>
    <priority>1.00</priority>
  </url>

  <url> 
  <loc>' . $domain_url . '/new-games' . '</loc>
  <changefreq>daily</changefreq>
  <priority>1.00</priority>
  </url>

  <url> 
  <loc>' . $domain_url . '/hot-games' . '</loc>
  <changefreq>daily</changefreq>
  <priority>1.00</priority>
  </url>
  ';
$str_content = '';

foreach ($games as $game) {
  $str_content .= '<url> 
    <loc>' . $domain_url . '/' . $game->slug . '</loc> 
    <changefreq>daily</changefreq>
    <priority>0.8</priority>
  </url>';
}

foreach ($category as $ct) {
  if (\helper\game::get_count('', '', 'yes', '', '', $ct->id)) {
    $str_content .= '<url> 
      <loc>' . $domain_url . '/games/' . $ct->slug . '</loc> 
      <changefreq>daily</changefreq>
      <priority>0.9</priority>
    </url>';
  }
}

if (count($arr_footer)) {
  foreach ($arr_footer as $foobot) {
    $str_content .= '<url> 
    <loc>' . $domain_url . '/' . $foobot . '</loc> 
    <changefreq>daily</changefreq>
    <priority>0.5</priority>
  </url>';
  }
}
$str_last = '</urlset>';
$str = $str_head . $str_content . $str_last;
echo $str;
