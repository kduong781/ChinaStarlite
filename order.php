#!/usr/local/php5/bin/php-cgi
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Order Now</title>
  <?php include 'header.php' ?>
  <meta charset="UTF-8">
</head>
<body>
<?php session_start(); ?>
<?php include 'navbar.php' ?>
<div id="wrapper">
<main>
<div id="content">
<?php
		echo "<h1>Make an order</h1>";
	if($_SESSION['loginusername']){//if user in session, say hi
		echo "Welcome back, ".$_SESSION['loginusername']."<br>";
	}
	else{
		echo "Make an order by signing up for a free account or check out as a guest.";
	}
?>

</div><!-- end content -->
</main>
</div><!-- end wrapper -->
<?php include 'footer.php' ?>
</body>
</html>
