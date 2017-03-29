<?php

/*
 * Adaclare Technologies
 *
 * Webister Hosting Software
 *
 *
 */

include 'config.php';
//die('update Administrators set username="' .addslashes($_POST["username"]) .'", password="' . md5(addslashes($_POST["password_ch"])) .'" where username=' . $_POST["username"]);
    $con = mysqli_connect($host, $user, $pass, $data);
    $sql = 'update Users set username="'.$_POST['username'].'", password="'.sha1($_POST['password']).'" where username="'.$_POST['username'].'"';
    mysqli_query($con, $sql);
   $query = sprintf("SET PASSWORD FOR %s@localhost = PASSWORD('%s');", $_POST['username'], $_POST['password']);
    mysqli_query($con, $query);
    mysqli_close($con);
    header('Location: index.php?page=cp#');
