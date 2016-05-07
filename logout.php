#!/usr/local/php5/bin/php-cgi
<!doctype html>
<html lang="en">
<head>
	<title>Log Out</title>
  <?php include 'header.php' 
  ?>
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

header('Location: index.php');
exit();

?>
</div><!-- end content -->
</main>
</div><!-- end wrapper -->
<?php include 'footer.php' ?>
</body>
</html>
