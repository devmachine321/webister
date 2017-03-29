<?php

/*
 * Adaclare Technologies
 *
 * Webister Hosting Software
 *
 *
 */

error_reporting(0);

$action = (isset($_GET['action'])) ? $_GET['action'] : '';

if ($action == 'phpinfo') {
    echo 'Server Uptime is only allowed in webister';
} else {
    $load = file_get_contents('/proc/loadavg');
    $load = explode(' ', $load);
    $load = $load[0];
    if (!$load && function_exists('exec')) {
        $reguptime = trim(exec('uptime'));
        if ($reguptime) {
            if (preg_match("/, *(\d) (users?), .*: (.*), (.*), (.*)/", $reguptime, $uptime)) {
                $load = $uptime[3];
            }
        }
    }

    $uptime_text = file_get_contents('/proc/uptime');
    $uptime = substr($uptime_text, 0, strpos($uptime_text, ' '));
    if (!$uptime && function_exists('shell_exec')) {
        $uptime = shell_exec('cut -d. -f1 /proc/uptime');
    }
    $days = floor($uptime / 60 / 60 / 24);
    $hours = str_pad($uptime / 60 / 60 % 24, 2, '0', STR_PAD_LEFT);
    $mins = str_pad($uptime / 60 % 60, 2, '0', STR_PAD_LEFT);
    $secs = str_pad($uptime % 60, 2, '0', STR_PAD_LEFT);

    $phpver = phpversion();
    $mysqlver = (function_exists('mysql_get_client_info')) ? mysql_get_client_info() : '-';
    $zendver = (function_exists('zend_version')) ? zend_version() : '-';

    echo "<load>$load</load>\n";
    echo "<uptime>$days Days $hours:$mins:$secs</uptime>\n";
    /*
     * WHMCS does not rely on the following version information for tracking
     * server status.
     *
     * Some 3rd-party integrations may rely on previous revisions of this file that
     * exposed said information.  Users who have 3rd-party functionality which
     * require this may uncomment the lines at their own risk.
     *
     * Future revisions to this file may remove those commented lines and this
     * documentation block entirely.  If a 3rd-party integration that you use
     * relies on this, please notify them that access to that information via
     * this script is deprecated as of WHMCS 5.3.9-release.1.
     *
     * Anyone is free to contact WHMCS Support for further information or help
     * resolving integration issues.
     */
    echo "<phpver>$phpver</phpver>\n";
    echo "<mysqlver>$mysqlver</mysqlver>\n";
    echo "<zendver>$zendver</zendver>\n";
}
