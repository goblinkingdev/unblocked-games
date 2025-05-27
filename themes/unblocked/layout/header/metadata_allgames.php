<?php
$meta_title = 'ALL GAMES - play all games on ' . \helper\options::options_by_key_type('site_name');
if ($meta_description == null || $meta_description == '') {
    $list_games = \helper\game::get_paging(1, 3, $keywords, $type, $display, $is_hot, $is_new, 'publish_date', 'DESC');
    $str = 'Play ';
    foreach ($list_games as $k => $g) {
        if ($k == count($list_games) - 1) {
            $str .= ucwords($g->name) . ' ';
        } else {
            $str .= ucwords($g->name) . ', ';
        }
    }
    $str .= 'and many more for free';
    $meta_description = 'Want to play All Games? ' . $str . ' on ' . \helper\options::options_by_key_type('site_name') . '. The best starting point to discover all games';
}
$banner = \helper\options::options_by_key_type('banner');
$meta_keyword = 'all games';
$url = load_url()->current_url();
$data = array(
    'site_title' => $meta_title,
    'site_description' => $meta_description,
    'site_keywords' => $meta_keyword,
    'base_url' => $url,
    'banner' => $banner
);
echo \helper\themes::get_layout('header/metadata', $data);
