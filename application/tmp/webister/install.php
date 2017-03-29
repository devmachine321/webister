<?php

/*
 * Adaclare Technologies
 *
 * Webister Hosting Software
 *
 *
 */

error_reporting(0);
$DBServer = 'localhost';
$DBUser = 'root';
$DBPass = $argv[1];
$DBName = 'webister';

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

// check connection
if ($conn->connect_error) {
    trigger_error('Database connection failed: '.$conn->connect_error, E_USER_ERROR);
}

 $sql = 'CREATE TABLE Settings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
code VARCHAR(1000),
value VARCHAR(1000)
)';
$conn->query($sql);

 $sql = 'CREATE TABLE Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(1000),
password TEXT,
bandwidth TEXT,
diskspace TEXT,
port TEXT
)';
$conn->query($sql);
 $sql = 'CREATE TABLE FailedLogin (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
ip TEXT,
time TEXT
)';
$conn->query($sql);

$sql = "INSERT INTO Users (id, username, password, bandwidth, diskspace, port) VALUES ('2', 'admin', '".sha1('admin')."', '', '', '8080')";
$conn->query($sql);
$sql = "INSERT INTO Settings (id, code, value) VALUES ('1', 'title', 'My Web Host')";
$conn->query($sql);
unlink('/var/webister/interface/config.php');
file_put_contents('/var/webister/interface/config.php', '<?php

$'.'host'." = 'localhost';
$".'user'."   = 'root';
$".'pass'."   = '".$argv[1]."';
$".'data'."   = 'webister';


");

mysql_connect('localhost', 'root', $argv[1]);
mysql_query("CREATE USER 'admin'@'localhost' IDENTIFIED BY 'admin';");
mysql_query('CREATE DATABASE admin');
mysql_query("GRANT ALL ON admin.* TO 'admin'@'localhost'");
mysql_close();
