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
<main>
<div id="content">
	<?php
	if($_SESSION['loginusername']){
	echo "Welcome, ".ucfirst($_SESSION['loginusername']);
	}else{
		echo"You must be logged in to view this page<br>";
		echo "Click <a href='login.php'>here</a> to sign in";
	}
	?>
</div><!-- end content -->
</main>
<?php include 'footer.php'; ?>
</body>
</html>
