#!/usr/local/php5/bin/php-cgi
<!doctype html>
<html lang="en">
<head>
	<title>Log Out</title>
	<link rel="stylesheet" type="text/css" href="reset.css">
	<link rel="stylesheet" type="text/css" href="china.css">
</head>
<body>
<?php include 'navbar.php' ?>
<div id="leftBar"></div><!-- end leftBar -->
<main>
<div id="content">
<?php 
session_start();

session_destroy();

echo "You have been logged out.<br>Click <a href='index.php'>here</a> to return to the home page.<br>";
echo "Click <a href='login.php'>here</a> to sign in</br>";

?>
</div><!-- end content -->
</main>
<?php include 'footer.php' ?>
</body>
</html>
