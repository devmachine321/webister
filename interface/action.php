<?php
session_start();
if (!isset($_SESSION["user"])) {
	header("Location: https://ddflare-dodiaraculus.c9users.io:8081/index.php?page=main");
	die();
}
include("py-serv-client.php");
if ($_GET["act"] == "pwr") {
    sendmessage("pwr");
    header("Location: https://ddflare-dodiaraculus.c9users.io:8081/index.php?page=cp");
    die();
}
if ($_GET["act"] == "restart") {
    sendmessage("restart");
      header("Location: https://ddflare-dodiaraculus.c9users.io:8081/index.php?page=cp");
    die();
}
if ($_GET["act"] == "mysql") {
    sendmessage("mysql");
      header("Location: https://ddflare-dodiaraculus.c9users.io:8081/index.php?page=cp");
    die();
}
if ($_GET["act"] == "server") {
    sendmessage("server");
      header("Location: https://ddflare-dodiaraculus.c9users.io:8081/index.php?page=cp");
    die();
}
?>