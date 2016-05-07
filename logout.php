#!/usr/local/php5/bin/php-cgi
<!doctype html>
<html lang="en">
<head>
	<title>Log Out</title>
  <?php include 'header.php' ?>
	<meta charset="UTF-8">
</head>
<body>
<?php include 'navbar.php' ?>
<div id="wrapper">
<main>
<div id="content">
<?php
session_start();

session_destroy();

echo "You have been logged out.<br>Click <a href='index.php'>here</a> to return to the home page.<br>";
echo "Click <a href='login.php'>here</a> to sign in</br>";
header('Location: login.php');

?>
</div><!-- end content -->
</main>
</div><!-- end wrapper -->
<?php include 'footer.php' ?>
</body>
</html>
