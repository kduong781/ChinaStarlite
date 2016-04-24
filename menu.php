#!/usr/local/php5/bin/php-cgi
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Menu</title>
  <?php include 'header.php' ?>
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
