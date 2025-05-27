<?php
$game_id = load_request()->post_value('game_id');
$score = load_request()->post_value('score');
if (intval($score) <= 3) {
    $score = 3;
}
$data = \helper\game::rate($game_id, $score);
echo json_encode($data);
