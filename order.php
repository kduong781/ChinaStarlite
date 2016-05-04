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
		<div class="menu">
			<span class="menuTitle">Lunch</span>
			<p>Lunch is 20:00 AM - 2:00 PM</p>
			<ul>
				<li>
					<div>
						<h4>Fried Rice</h4>
						<p>Award winning rice with eggs, green onions, etc.</p>
					</div>
				</li>
			</ul>
		</div>
	</div>

</div>

	<div id="lunch" class="hide">
		<div class="menu">
			<span class="menuTitle">Lunch</span>
			<p>Lunch is 10:00 AM - 2:00 PM</p>
			<ul>
				<li>
					<div>
						<h4>Fried Rice</h4>
						<p>Award winning rice with eggs, green onions, etc.</p>
				 	</div>
				</li>
			</ul>
	  </div>
	</div>
	<div id="dinner" class="hide">
		<div class="menu">
			<span class="menuTitle">Dinner</span>
			<p>Dinner is 3:00 PM - 10:00 PM</p>
			<ul>
				<li>
					<div>
						<h4>Mongolian Beef</h4>
						<p>Tasty beef with sauce</p>
					</div>
				</li>
			</ul>
	  </div>
	</div>
	<div id="appetizer" class="hide">
		<div class="menu">
			<span class="menuTitle">Appetizer</span>
			<p>Appetizer is all day</p>
			<ul>
				<li>
					<div>
						<h4>Shrimp Balls</h4>
						<p>Very good shrimp</p>
					</div>
				</li>
			</ul>
		</div>
	</div>

<script src="js/order.js"></script>
<?php include 'footer.php' ?>
</body>
</html>
