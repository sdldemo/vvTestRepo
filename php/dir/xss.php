<?php
/**
 *  MOPAS Cross-site Scripting Example 1
 */
// TODO: AI issue #27, High, Cross-site Scripting, https://github.com/sdldemo/vvTestRepo/issues/27
//
// GET /php/dir/xss.php?a=%3Cscript%3Ealert%281%29%3C%2Fscript%3E HTTP/1.1
// Host: localhost
// Accept-Encoding: identity
// Connection: close
//
//
echo $_GET['a'];
?>
