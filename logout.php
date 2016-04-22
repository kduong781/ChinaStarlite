#!/usr/local/php5/bin/php-cgi
<!doctype html>
<html lang="en">
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="reset.css">
	<link rel="stylesheet" type="text/css" href="china.css">
<?php 
session_start();

session_destroy();

echo "You have been logged out. Click <a href='index.php'>here</a> to return to the home page.</br>";
//echo "<a href='logout.php'>Log out</a>";
?>