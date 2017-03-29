<?php

/*
 * Adaclare Technologies
 *
 * Webister Hosting Software
 *
 *
 */

session_start();
include 'config.php';
$con = mysqli_connect("$host", "$user", "$pass", 'webister');

$email = mysqli_real_escape_string($con, $_POST['user']);

$pass = sha1(mysqli_real_escape_string($con, $_POST['pass']));

$sql = "select * from Users where username='$email' AND password='$pass'";
$run_user = mysqli_query($con, $sql);
$check_user = mysqli_num_rows($run_user);
if ($check_user > 0) {
    $_SESSION['user'] = $email;
    if ($_POST['pass'] == 'admin') {
        header('Location: temppass.php');
        die();
    }
    header('Location: index.php?page=cp');
    die();
} else {
    include 'config.php';

// Create connection
$conn = new mysqli('localhost', 'root', "$pass", 'webister');

    $t = time();
    $sql = "INSERT INTO FailedLogin(id, ip, time)
VALUES ('".rand(1, 99999)."', '".$_SERVER['REMOTE_ADDR']."', '".date('Y-m-d', $t)."')";
    $conn->query($sql);
    $conn->close();

    header('Location: index.php?page=main&error');
    die();
}
