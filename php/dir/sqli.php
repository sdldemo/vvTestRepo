<?php
/**
 * MOPAS SQL Injection Example 1
 * Fetch data from MySQL database using old mysql extension
 */
define('DB_HOST', '');
define('DB_PORT', 3306);
define('DB_USER', '');
// FIXED: AI issue #11, High, Hardcoded Password, https://github.com/sdldemo/vvTestRepo/issues/11

define('DB_NAME', '');

error_reporting(0);

if (empty($_POST['condition'])) {
	echo '<form action="" method="POST">
		Get items by condition: <input type="text" name="condition"/>
		<input type="submit" name="submit" value="Submit"/>
	</form>';
	exit;
}

if (mysql_connect(DB_HOST . ':' . DB_PORT, DB_USER, DB_PASSWORD) === FALSE) {
	die('Could not connect to database');
}

if (mysql_select_db(DB_NAME) === FALSE) {
	die('Could not select database');
}

if (mysql_set_charset('utf8') === FALSE) {
	die('Unable to set the character set');
}

$condition = $_POST['condition'];

$query = "SELECT * FROM items WHERE $condition";

// TODO: AI issue #, High, SQL Injection,
//
// POST /php/dir/sqli.php HTTP/1.1
// Host: localhost
// Accept-Encoding: identity
// Connection: close
// Content-Length: 22
// Content-Type: application/x-www-form-urlencoded
//
// condition=sleep%285%29
//
// (!(mysql_select_db('') === False))
// (!(mysql_set_charset('utf8') === False))
$result = mysql_query($query);

if ($result === FALSE) {
	die('Query error.');
}

$numRows = mysql_num_rows($result);

if ($numRows === FALSE || $numRows === 0) {
	die('No item for you with this name.');
}

while($itemInfo = mysql_fetch_assoc($result)) {
	// TODO: AI issue #, High, Cross-site Scripting,
	//
	// POST /php/dir/sqli.php HTTP/1.1
	// Host: localhost
	// Accept-Encoding: identity
	// Connection: close
	// Content-Length: 22
	// Content-Type: application/x-www-form-urlencoded
	//
	// condition=935137890000
	//
	// (mysql_fetch_assoc(mysql_query(('SELECT * FROM items WHERE ' . $_POST['condition'])))['owner'] == '<script>alert(1)</script>')
	// (!(mysql_num_rows(mysql_query(('SELECT * FROM items WHERE ' . $_POST['condition']))) === 0))
	// (!(mysql_num_rows(mysql_query(('SELECT * FROM items WHERE ' . $_POST['condition']))) === False))
	// (!(mysql_query(('SELECT * FROM items WHERE ' . $_POST['condition'])) === False))
	// (!(mysql_select_db('') === False))
	// (!(mysql_set_charset('utf8') === False))
	//
	// TODO: AI issue #, High, Cross-site Scripting,
	//
	// POST /php/dir/sqli.php HTTP/1.1
	// Host: localhost
	// Accept-Encoding: identity
	// Connection: close
	// Content-Length: 22
	// Content-Type: application/x-www-form-urlencoded
	//
	// condition=935137890000
	//
	// (mysql_fetch_assoc(mysql_query(('SELECT * FROM items WHERE ' . $_POST['condition'])))['itemname'] == '<script>alert(1)</script>')
	// (!(mysql_num_rows(mysql_query(('SELECT * FROM items WHERE ' . $_POST['condition']))) === 0))
	// (!(mysql_num_rows(mysql_query(('SELECT * FROM items WHERE ' . $_POST['condition']))) === False))
	// (!(mysql_query(('SELECT * FROM items WHERE ' . $_POST['condition'])) === False))
	// (!(mysql_select_db('') === False))
	// (!(mysql_set_charset('utf8') === False))
	//
	// TODO: AI issue #, High, Cross-site Scripting,
	//
	// POST /php/dir/sqli.php HTTP/1.1
	// Host: localhost
	// Accept-Encoding: identity
	// Connection: close
	// Content-Length: 22
	// Content-Type: application/x-www-form-urlencoded
	//
	// condition=935137890000
	//
	// (mysql_fetch_assoc(mysql_query(('SELECT * FROM items WHERE ' . $_POST['condition'])))['itemname'] == '<script>alert(1)</script>')
	// (!(mysql_num_rows(mysql_query(('SELECT * FROM items WHERE ' . $_POST['condition']))) === 0))
	// (!(mysql_num_rows(mysql_query(('SELECT * FROM items WHERE ' . $_POST['condition']))) === False))
	// (!(mysql_query(('SELECT * FROM items WHERE ' . $_POST['condition'])) === False))
	// (!(mysql_select_db('') === False))
	// (!(mysql_set_charset('utf8') === False))
	//
	// TODO: AI issue #, High, Cross-site Scripting,
	//
	// POST /php/dir/sqli.php HTTP/1.1
	// Host: localhost
	// Accept-Encoding: identity
	// Connection: close
	// Content-Length: 22
	// Content-Type: application/x-www-form-urlencoded
	//
	// condition=935137890000
	//
	// (mysql_fetch_assoc(mysql_query(('SELECT * FROM items WHERE ' . $_POST['condition'])))['itemname'] == '<script>alert(1)</script>')
	// (!(mysql_num_rows(mysql_query(('SELECT * FROM items WHERE ' . $_POST['condition']))) === 0))
	// (!(mysql_num_rows(mysql_query(('SELECT * FROM items WHERE ' . $_POST['condition']))) === False))
	// (!(mysql_query(('SELECT * FROM items WHERE ' . $_POST['condition'])) === False))
	// (!(mysql_select_db('') === False))
	// (!(mysql_set_charset('utf8') === False))
	//
	echo "owner: {$itemInfo['owner']}, item name: {$itemInfo['itemname']}\n";
}
?>
