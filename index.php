#!/usr/local/php5/bin/php-cgi
<!doctype html>
<html lang="en">
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="reset.css">
	<link rel="stylesheet" type="text/css" href="china.css">
	<link rel="stylesheet" type="text/css" href="slider.css">

</head>
<body>
<?php session_start(); ?>
<?php include 'navbar.php' ?>
  	<div id="content">
  			<div id="slider">
				<div class="previous"><img src="images/prev.png" alt="previous"></div>
				<div class="next"><img src="images/next.png" alt="next"></div>
			  	<div id="toggle" class="play"></div>
				<ul>
				    <li><img src="img/test1.jpg" alt="test1"></li>
				    <li><img src="img/test2.jpg" alt="test2"></li>
				    <li><img src="img/test3.jpg" alt="test3"></li>
				    <li><img src="img/test4.jpg" alt="test4"></li>
				  </ul>  
			</div><!-- end slider -->
			<div id="pagination"><div id="select"><ul></ul></div></div>
  		<main>



  			<br><img src="img/shrek.jpg" alt="shrek">

  		</main>
  	</div><!-- end #content -->
  <?php include 'footer.php' ?>
	<script type="text/javascript" src="js/slider.js"></script>

 </body>

</html>
