<?php

/*
 * Adaclare Technologies
 *
 * Webister Hosting Software
 *
 *
 */

include 'config.php';
 $port = rand(1000, 9999);
mkdir('/var/webister/'.$port);
$conn = mysqli_connect("$host", "$user", "$pass", 'webister');
$sql = "INSERT INTO Users (id, username, password, bandwidth, diskspace, port)
VALUES ('".$port."', '".$_GET['username']."', '".sha1($_GET['password'])."','0','".$_GET['quota']."','".$port."')";
if ($conn->query($sql) === true) {
} else {
    die('1');
}
$conn->close();
echo $port;
