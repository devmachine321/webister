<?php

/*
 * Adaclare Technologies
 *
 * Webister Hosting Software
 *
 *
 */

function sendmessage($arg)
{
    $output = shell_exec('./execute '.$arg);

    return $output;
}
