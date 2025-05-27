<?php

if ($_POST["name"] != null && $_POST["email"] != null && $_POST["message"] != null) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $website = $_POST["website"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $save = \helper\contact::contact_save($name, $email, $email, $subject, $message);
    if ($save) {
        echo 1;
    }
} else {
    return 0;
}
?>
