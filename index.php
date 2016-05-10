#!/usr/local/php5/bin/php-cgi
<?php 
/**
*Author: Rohit Sehdev
*Contributors: Mingtau Li (all carousel functionality except for images chosen)
*Description: Home Page
*/
?>
<!doctype html>
<html lang="en">
<head>
	<title>Home</title>
  <?php include 'header.php' ?>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body class="bkgrnd">
<?php session_start(); ?>
<?php include 'navbar.php' ?>
  	<div id="carousel">
  			<div id="slider">
				<div class="previous"><img src="images/prev.png" alt="previous"></div>
				<div class="next"><img src="images/next.png" alt="next"></div>
			  	<div id="toggle" class="play"></div>
				<ul>
				    <li><img src="img/test1.jpg" alt="test1"></li>
				    <li><img src="img/test2.jpg" alt="test2"><p>Made with the freshest ingredients</p></li>
				    <li><img src="img/test3.jpg" alt="test3"><p>Enjoy a fantastic meal with the whole family</p></li>
				    <li><img src="img/test4.jpg" alt="test4"><p>Unique flair with elegent simplicity</p></li>
				  </ul>
			</div><!-- end slider -->
			<div id="pagination"><div id="select"><ul></ul></div></div>
	</div><!-- end carousel -->

	<div id="transparent">
		<p>
			TASTE THE FLAVOR OF CHINA
		</p>
	</div><!-- end transparent -->
<div id="wrapper">
  		<main>

  	<div id="content">


  			<p>
  			
			China Starlite is a cornerstone in the Chinese community and has been recognized for its outstanding Chinese cuisine, excellent service and friendly staff. Our Chinese restaurant is known for its authentic, classic dishes and its insistence on only using high quality, fresh ingredients.
			
  			</p>

  	</div><!-- end #content -->
  		</main>
</div><!-- end wrapper -->
  <?php include 'footer.php' ?>
	<script type="text/javascript" src="js/slider.js"></script>

 </body>

</html>