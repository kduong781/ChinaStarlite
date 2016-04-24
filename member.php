#!/usr/local/php5/bin/php-cgi
<!doctype html>
<html lang="en">
<head>
	<title>Home</title>
  <?php include 'header.php' ?>
</head>
<body>
<?php
session_start();
include 'navbar.php'
?>
<div id="leftBar"></div><!-- end leftBar -->
<main>
<div id="content">
	<?php
	if($_SESSION['loginusername']){
	echo "Welcome, ".$_SESSION['loginusername'];
	}else{
		die("You must be logged in to view this page");
	}
	?>
</div><!-- end content -->
</main>
<?php include 'footer.php'; ?>
</body>
</html>
