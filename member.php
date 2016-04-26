#!/usr/local/php5/bin/php-cgi
<!doctype html>
<html lang="en">
<head>
	<title>Home</title>
  <?php include 'header.php' ?>
  <meta charset="UTF-8">
</head>
<body>
<?php
session_start();
include 'navbar.php'
?>
<main>
<div id="content">
<?php 
$memberMsg = '';
?>
	<?php
	if($_SESSION['loginusername']){
		$memberMsg = "<a href='logout.php'>Log Out</a>";
		echo "Welcome, ".$_SESSION['loginusername']."<br>";
	}else{
		$memberMsg = "<a href='login.php'>Sign In</a>";
		echo"You must be logged in to view this page<br>";
		//echo "Click <a href='login.php'>here</a> to sign in";
	}
	echo "<div id='button' class='right'>".$memberMsg."</div>";
	?>
</div><!-- end content -->
</main>
<?php include 'footer.php'; ?>
</body>
</html>
