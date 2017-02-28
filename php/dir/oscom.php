<?php
/**
 *  MOPAS OS Command Injection Example 1
 *  Resolve site name into IP address
 */
if (empty($_GET['domain'])) {
	die('no domain');
}

$domain = $_GET['domain'];
// TODO: AI issue #10, High, OS Commanding, https://github.com/sdldemo/vvTestRepo/issues/10
//
// GET /php/dir/oscom.php?domain=pwd+%7C%7C+echo+%25cd%25 HTTP/1.1
// Host: localhost
// Accept-Encoding: identity
// Connection: close
//
//
system("nslookup $domain");
echo 'step12';
?>
