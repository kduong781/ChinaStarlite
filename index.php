#!/usr/local/php5/bin/php-cgi
<!doctype html>
<html lang="en">
<head>
	<title>Home</title>
  <?php include 'header.php' ?>
  <meta charset="UTF-8">
</head>
<body>
<?php session_start(); ?>
<?php include 'navbar.php' ?>
  	<div id="carousel"><!-- noscript: get rid of carousel -->
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
	</div><!-- end carousel -->
  		<main>
  	<div id="content">



  			<br><img src="img/shrek.jpg" alt="shrek">

  	</div><!-- end #content -->
  		</main>
  <?php include 'footer.php' ?>
	<script type="text/javascript" src="js/slider.js"></script>

 </body>

</html>
