<?php

/*
 * Adaclare Technologies
 *
 * Webister Hosting Software
 *
 *
 */

session_start();
session_destroy();
header('Location: index.php?page=main');
