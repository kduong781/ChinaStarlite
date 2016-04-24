#!/usr/local/php5/bin/php-cgi
<!doctype html>
<html lang="en">
<head>
	<title>Home</title>
	<?php include 'header.php' ?>
</head>
<?php
session_start();

session_destroy();

echo "You have been logged out.<br>Click <a href='index.php'>here</a> to return to the home page.<br>";
echo "Click <a href='login.php'>here</a> to sign in</br>";

?>
