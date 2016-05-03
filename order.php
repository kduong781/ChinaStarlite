#!/usr/local/php5/bin/php-cgi
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Order Now</title>
  <?php include 'header.php' ?>
		<link rel="stylesheet" type="text/css" href="order.css">
  <meta charset="UTF-8">
</head>
<body>
<?php session_start(); ?>
<?php include 'navbar.php' ?>
<div class="wrapper">
	<div class="leftCol">
		<ul class="tabs">
			<li id="lunchTab" class="active">Lunch</li>
			<li id="dinnerTab" >Dinner</li>
			<li id="appetizerTab" >Appetizer</li>
		</ul>
	</div>
	<div class="content">
		Menu
	</div>

</div>

	<div id="lunch" class="hide">
		lunch
	</div>
	<div id="dinner" class="hide">
		dinner
	</div>
	<div id="appetizer" class="hide">
		appetizer
	</div>

<script src="js/order.js"></script>
<?php include 'footer.php' ?>
</body>
</html>
