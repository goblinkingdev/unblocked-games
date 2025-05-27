<?php
$id_game = $_POST['id_game'];
$url_game = $_POST['url_game'];
$data_result = [];
if ($id_game) {
    $html_rate = \helper\themes::get_layout('full_rate_mini', array('id' => $id_game));
}

if ($url_game) {
    $html_comment = \helper\themes::get_layout('comment', array('url' => $url_game));
}
$data_result['rate'] = $html_rate;
$data_result['comment'] = $html_comment;

echo json_encode($data_result);