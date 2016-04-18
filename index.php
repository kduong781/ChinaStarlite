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
				<div class="control_prev"><img src="images/prev.png" alt="previous"></div>
				<div class="control_next"><img src="images/next.png" alt="next"></div>
			  	<div id="toggle" class="play"></div>
				<ul>
				    <li><img src="img/test3.jpg" alt=""></li>
				    <li><img src="img/test4.jpg" alt=""></li>
				    <li><img src="img/test2.jpg" alt=""></li>
				    <li><img src="img/test1.jpg" alt=""></li>
				  </ul>  
			</div><!-- end slider -->
  		<main>
  			<!-- <img src="images/logo.png" alt="logo"> -->



			<div id="pagination"></div>







  		</main>
  	</div><!-- end #content -->
  <?php include 'footer.php' ?>
	<script type="text/javascript" src="slider.js"></script>

 </body>

</html>
