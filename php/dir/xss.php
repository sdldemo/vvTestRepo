<?php
/**
 *  MOPAS Cross-site Scripting Example 1
 */
echo $_GET['a'];
fopen($_GET['b']);
?>
