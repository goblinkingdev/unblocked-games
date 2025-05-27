<?php
$slug = \helper\options::options_by_key_type('slug_home');
$game = \helper\game::find_by_slug($slug);
if (!$game) {
    load_response()->redirect('/new-games');
}
//$post = \helper\posts::find_by_slug($slug);
//if ($post != null) {
//    $game->content = $post->content;
//$game->excerpt = $post->excerpt;
//}
$title = $game->name;
$enable_ads = \helper\game::get_ads_control();

$custom = \helper\themes::get_layout('header/metadata_home');
echo \helper\themes::get_layout('header', array('custom' => $custom, 'enable_ads' => $enable_ads));
echo \helper\themes::get_layout('menu');
echo \helper\themes::get_layout('sidebar', array('slug' => "/"));
echo \helper\themes::get_layout('game_play', array('game' => $game, 'enable_ads' => $enable_ads, 'is_home' => true));
echo \helper\themes::get_layout('header/richtext_home', array('game' => $game));
echo \helper\themes::get_layout('footer');
