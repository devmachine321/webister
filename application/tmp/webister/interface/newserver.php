<?php

/*
 * Adaclare Technologies
 *
 * Webister Hosting Software
 *
 *
 */

function newserv($port, $disk, $username, $password)
{
    mkdir('/var/webister/'.$port);
    include 'config.php';
    $conn = mysqli_connect("$host", "$user", "$pass", 'webister');

    $sql = "INSERT INTO Users (id, username, password, bandwidth, diskspace, port)
VALUES ('".rand(10000, 99999)."', '".$username."', '".sha1($password)."','0','".$disk."','".$port."')";

    if ($conn->query($sql) === true) {
    } else {
        die('error');
    }

    $conn->close();
    shell_exec('sudo service webister restart');
}
