<?php
$title = 'new games';
$description = 'Play new games at ' . \helper\options::options_by_key_type('site_name');

$enable_ads = true;

$custom = \helper\themes::get_layout('header/metadata_newgame');
echo \helper\themes::get_layout('header', array('custom' => $custom, 'enable_ads' => $enable_ads));
echo \helper\themes::get_layout('menu');
echo \helper\themes::get_layout('game_item', array('title' => $title, 'field_order' => 'publish_date', 'is_home2' => true, 'enable_ads' => $enable_ads));
echo \helper\themes::get_layout('footer');
