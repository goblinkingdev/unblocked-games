<?php

if ($_POST['comment_id'] != null) {
    $comment_id = $_POST['comment_id'];
    $up_down = ($_POST['vote'] != null && in_array($_POST['vote'], array('up', 'down'))) ? $_POST['vote'] : "vote"; 
    $result = \helper\comment::comment_vote($comment_id, $up_down);
    echo json_encode($result);
} {
    echo "";
}
?>
