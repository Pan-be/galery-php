<?php

require('init.php');

$user = new User();

if (isset($_POST['imageName'])) {
    $user->ajax_save_user_image($_POST['imageName'], $_POST['userId']);
}