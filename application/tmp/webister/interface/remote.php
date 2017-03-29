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
$username = $_GET['username'];
$password = $_GET['password'];
if (!isset($_GET['username']) || !isset($_GET['username'])) {
    echo 'false';
    die();
}
$con = mysqli_connect("$host", "$user", "$pass", 'webister');

$email = mysqli_real_escape_string($con, $username);

$pass = sha1(mysqli_real_escape_string($con, $password));

$sql = "select * from Users where username='$email' AND password='$pass'";
$run_user = mysqli_query($con, $sql);
$check_user = mysqli_num_rows($run_user);
if ($check_user > 0) {
    $_SESSION['user'] = $email;
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

    echo 'false';
    die();
}
