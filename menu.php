#!/usr/local/php5/bin/php-cgi
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Menu</title>
	<link rel="stylesheet" type="text/css" href="reset.css">
	<link rel="stylesheet" type="text/css" href="china.css">
</head>
<body>
<?php session_start(); ?>
<?php include 'navbar.php' ?>
<div id="leftBar"></div><!-- end leftBar -->
<main>
<div id="content"></div><!-- end content -->
</main>
<?php include 'footer.php' ?>
</body>
</html>
