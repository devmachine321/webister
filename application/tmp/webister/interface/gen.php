<?php

/*
 * Adaclare Technologies
 *
 * Webister Hosting Software
 *
 *
 */

session_start();
if (isset($_GET['id'])) {
    if (file_exists('data/'.$_GET['id'].'.php')) {
        $_SESSION['planid'] = $_GET['id'];
        header('Location: api.php');
    }
}
