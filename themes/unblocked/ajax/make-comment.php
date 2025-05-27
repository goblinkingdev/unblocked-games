<?php
if ($_POST["content"] != null && $_POST["email"] != null && $_POST["author"] != null && $_POST["related_url"] != null && $_POST["related_id"] != null) {
    $author = $_POST["author"];
    $content = $_POST["content"];
    $email = $_POST["email"];
    $related_id = $_POST["related_id"];
    $url = $_POST["related_url"];
    $website = $_POST["website"];
    $parent_id = ($_POST["parent_id"] != null && (int)$_POST["parent_id"] > 0) ? (int)$_POST["parent_id"] : 0;

    $result = \helper\comment::comment_save($url, $related_id, $content, $author, $email, $parent_id, $website);
    echo json_encode($result);
} else {
    echo 'rong';
}
?>
