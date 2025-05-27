<?php

$custom = \helper\themes::get_layout('header/metadata_information', array('slug' => $slug));
$data['custom'] = $custom;
echo \helper\themes::get_header($data);
echo \helper\themes::get_layout('menu');
echo \helper\themes::get_layout('information', array('slug' => $slug));
echo \helper\themes::get_layout('footer');
?>   
