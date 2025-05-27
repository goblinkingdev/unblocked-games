<?php

$page = (int) $_POST['page'];
$limit = (int) $_POST['limit'];
$url = $_POST['url'];
$sort = $_POST['sort'];
$datacontent = \helper\themes::get_layout('comment_paging', array('page' => $page, 'limit' => $limit, 'url' => $url, 'sort' => $sort));
echo $datacontent;
