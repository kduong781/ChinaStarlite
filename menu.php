#!/usr/local/php5/bin/php-cgi
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Menu</title>
  <?php include 'header.php' ?>
  <meta charset="UTF-8">
</head>
<body>
<?php session_start(); ?>
<?php include 'navbar.php' ?>
<div id="wrapper">
<main>
<div id="content"></div><!-- end content -->
</main>
</div><!-- end wrapper -->
<?php include 'footer.php' ?>
</body>
</html>
