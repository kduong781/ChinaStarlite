#!/usr/local/php5/bin/php-cgi
<?php 
/**
*Author: Rohit Sehdev
*Description: About Page
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>About Us</title>
	<meta charset="UTF-8">
  <?php include 'header.php' ?>
  <link rel="stylesheet" type="text/css" href="about.css">
  <script type="text/javascript" src="js/about.js"></script>
</head>
<body>
<?php session_start(); ?>
<?php include 'navbar.php' ?>
<div id="wrapper">
<main>
<div id="content"></div><!-- end content -->
	
		<ul class = "upper">
            <li class = "sub"><a href="#" id="ourStory" onclick = "showStory();" >Our Story</a></li>
            <li class = "sub" ><a href="#" id="locations"  onclick = "showLocations();">Locations</a></li>
        </ul>
		
		
		<div id = "storyDescription" >
		<div class = "writing">
		
		Our restaurant was founded by rural, hardworking country folk with a dream of feeding fellow villagers with delicious, authentic chinese food. As popularity began to grow, 
		the opportunity to buy a small restaurant space popped up and word around the new location quickly spread of an amazing restaurant opening it's doors. The business thrived, 
		exceeding highest expectations, to where the restaurant was known throughout China. As five generations past, the restaurant and the brand is still owned and ran by the originating family 
		all while still keeping to the traditions that garnered such attention. Now we have expanded to Long Beach, California to share the authentic taste of China with amazing hospitality and 
		ingredients freshly imported from our home country. Enjoy.
		
		</div>
		
		</div>
		
		
		
		
		
		<div id = "locationsDescription">
		
			
			<div id="locationsIntro" class = "writing">
				Our locations include the original restaurant still going strong in China and our newest locations situated in Long Beach, California. Recent events have allowed us to expand to the United States 
				where we feel we can provide the best China has to offer. Possible expansions to various parts of the country are in the works. Please visit us for a delicious meal.
			</div>
			
			<div class = "border"></div>
			
			<div id = "locationsBlock">
				<div id="locationOptions">
				
					<ul class = "actualLocations">
						<li class = "subActualLocations"><a href="#locationsDescription" id = "hongkongLink" onclick = "showHongKong();">Hong Kong</a></li>
						<li class = "subActualLocations"><a href="#locationsDescription" id = "longbeachLink" onclick = "showLongBeach();">Long Beach</a></li>
					</ul>
			
				</div>
			
			
			
				<div id = "hongkong">
				
				<figure>
					<img src="img/hongkongrestaurant.jpg" alt="Hong Kong Restaurant" title="Hong Kong Restaurant"/>
				</figure>
				
				<div class = "writingSub">
				
				Where it all started. This restaurant has been through five generations and yet, still keeps to the old traditions and techniques that put us on the map so long ago.
				
				</div>
				</div>
			
			
			
				<div id = "longbeach">
				
				<figure>
					<img src="img/longbeachrestaurant.jpg" alt="Long Beach Restaurant" title="Long Beach Restaurant"/>
				</figure>
			
				<div class = "writingSub">
				
				Our first United States business endeavour. We wanted to share our authentic Chinese cuisine with the citizens of Long Beach and being in close proximity to the beach isn't bad either.
				
				</div>
				</div>
			
				
				<div class = "paddingAbout"></div>
				
				
			</div>
		
		
		
		
		
		</div>
		
		<div class = "border"></div>
		<div class = "paddingAbout"></div>
		
		
		<div id = "fieldsets">
		
		
			<fieldset>
				<legend>Privacy Policy</legend>
				We take your privacy very seriously. Any information given is solely used to complete your orders. Your information remains securely with only us.
			</fieldset>
		
		
		
			<fieldset>
				<legend>Accommodations</legend>
				Please do not hesitate to divulge any information concerning disablities or allergies. We will do our best to accommodate any necessary seating arrangements or ingredient substitutions.
			</fieldset>
			
			
			
			<fieldset>
				<legend>Contact Us</legend>
				+1 (562) 123-4567
				<br>
				china_starlite@gmail.com
			</fieldset>
		
		
		</div>
		
		<div class = "paddingAbout"></div>
		
		

</main>
</div><!-- end wrapper -->
<?php include 'footer.php' ?>


</body>
</html>
