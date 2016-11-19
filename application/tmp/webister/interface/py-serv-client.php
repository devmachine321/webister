<?php

/**
 * py-serv-client.php
 *
 * This is very import. Can Execute commands with this server.
 *
 * @category   Important
 * @package    Webister
 * @author     Tecflare
 * @copyright  2016 Tecflare
 */
function sendmessage($arg) {
$output = shell_exec('./execute ' . $arg);
return $output;
}

?>