<?php
$id_game = $_POST['id_game'];
if ($id_game) {
    $id_save = \helper\game::increate_like($id_game);
}