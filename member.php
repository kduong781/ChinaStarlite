#!/usr/local/php5/bin/php-cgi
<!doctype html>
<html lang="en">
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="reset.css">
	<link rel="stylesheet" type="text/css" href="china.css">
</head>
<body>
<?php 
session_start();
if($_SESSION['loginusername']){
	echo "Welcome, ".$_SESSION['loginusername'];
}else{

	echo "You must be logged in to view this page";
}
?>
</body>
</html>