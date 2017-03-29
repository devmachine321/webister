<?php

/*
 * Adaclare Technologies
 *
 * Webister Hosting Software
 *
 *
 */

session_start();
include '../../config.php';
$con = mysqli_connect($host, $user, $pass, $data);
$sql = 'SELECT * FROM Users WHERE username = "'.$_SESSION['user'].'"';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     $user = $row[5];
 }
   mysqli_free_result($result);
    mysqli_close($con);
