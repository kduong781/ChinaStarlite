#!/usr/local/php5/bin/php-cgi
<?php
/**
*Author: Khai Nguyen
*Description: Menu Page
*/
?>
<?php

$connection = mysqli_connect("cecs-db01.coe.csulb.edu","cecs323o29","nijeek","cecs323o29");
$error = mysqli_connect_error();

if ($error != null) {
  $output = "<p>Unable to connect to database<p>" . $error;
  // Outputs a message and terminates the current script
  exit($output);
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Khai Nguyen">
	<title>Menu</title>
	<link rel="stylesheet" type="text/css" href="menustyle.css">
	<link rel="stylesheet" type="text/css" href="jquery-ui.css">

	<script   src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>
	
  <?php include 'header.php' ?>
  
</head>
<body>
<?php session_start(); ?>
<?php include 'navbar.php' ?>
<main>
<div id="content">


	<div class="tabs">
    <ul class="tab-links">
        <li class="active"><a href="#tab1">Specialty</a></li>
        <li><a href="#tab2">Seafood</a></li>
        <li><a href="#tab3">Soup</a></li>
        <li><a href="#tab4">Appetizer & Drinks</a></li>
    </ul>
 
    <div class="tab-content">
        <div id="tab1" class="tab active">
			
            <p id="chickenText">Chicken</p>
            <div id="chickenTab">
			
				<?php
				
					//Retrieve foodName,description,price from menu of chicken 
					$SQL = "Select foodName,description,price From menu WHERE menutype='Chicken';";
					$Result = mysqli_query($connection, $SQL);
					
					if ($Result = mysqli_query($connection, $SQL))
					{
						// Fetch row one and one
						while ($row=mysqli_fetch_assoc($Result))
						{
							echo "<div class='food'>" . $row["foodName"] . "<span>$".$row["price"]. "</span></div>" ;
							echo "<div class='menuDetail'>" . $row["description"] . "</div>";
							echo "<hr>";
				
						}

						// Free result set
						mysqli_free_result($Result);

					}
					
				?>
				
			</div>
			<br>
			<p>Beef</p>
            <div  id="beefTab">
			
				<?php
				
					//Retrieve foodName,description,price from menu of beef 
					$SQL = "Select foodName,description,price From menu WHERE menutype='Beef';";
					$Result = mysqli_query($connection, $SQL);
					
					if ($Result = mysqli_query($connection, $SQL))
					{
						// Fetch row one and one
						while ($row=mysqli_fetch_assoc($Result))
						{
							echo "<div class='food'>" . $row["foodName"] . "<span>$".$row["price"]. "</span></div>" ;
							echo "<div class='menuDetail'>" . $row["description"] . "</div>";
							echo "<hr>";
						}

						// Free result set
						mysqli_free_result($Result);

					}
					
				?>
				
			</div>
			
			<p>Pork</p>
            <div id="porkTab">
				
				<?php
				
					//Retrieve foodName,description,price from menu of pork 
					$SQL = "Select foodName,description,price From menu WHERE menutype='Pork';";
					$Result = mysqli_query($connection, $SQL);
					
					if ($Result = mysqli_query($connection, $SQL))
					{
						// Fetch row one and one
						while ($row=mysqli_fetch_assoc($Result))
						{
							echo "<div class='food'>" . $row["foodName"] . "<span>$".$row["price"]. "</span></div>" ;
							echo "<div class='menuDetail'>" . $row["description"] . "</div>";
							echo "<hr>";
						}

						// Free result set
						mysqli_free_result($Result);

					}
					
				?>
				
			</div>
			
			<!-- Display a couple menu items images for promotion -->
			<div class="promotionImages" style="width:200px;height:200px;overflow:hidden;" >
				<div>
					<img src="https://cookingwithali.files.wordpress.com/2010/11/chicken-ginger-scallion-stir-fry-2.jpg" alt="Ginger Fried Chicken" width="200" height="200">
					<p>Ginger Fried Chicken</p>
				</div>
				<div>
					<img src="http://www.kawalingpinoy.com/wp-content/uploads/2016/01/beefwithcornstirfry1a-1.jpg" alt="Beef with Baby Corn" width="200" height="200">
					<p>Beef with Baby Corn</p>
				</div>
				<div>
					<img src="http://www.recipe.com/images/moo-shu-pork-R076101-ss.jpg" alt="Moo Shu Pork" width="200" height="200">
					<p>Moo Shu Pork</p>
				</div>
				<div>
					<img src="https://i.ytimg.com/vi/AE1EXv4pRq0/maxresdefault.jpg" alt="Moo Goo Gai Pin" width="200" height="200">
					<p>Moo Goo Gai Pin</p>
				</div>
			</div>
			
        </div>
 
        <div id="tab2" class="tab">
            <p>Fresh Seafood</p>
            <div>
				
				<?php
					$SQL = "Select foodName,description,price From menu WHERE menutype='Seafood';";
					$Result = mysqli_query($connection, $SQL);
					
					if ($Result = mysqli_query($connection, $SQL))
					{
						// Fetch row one and one
						while ($row=mysqli_fetch_assoc($Result))
						{
							echo "<div class='food'>" . $row["foodName"] . "<span>$".$row["price"]. "</span></div>" ;
							echo "<div class='menuDetail'>" . $row["description"] . "</div>";
							echo "<hr>";
						}

						// Free result set
						mysqli_free_result($Result);

					}
					
				?>
				
			</div>
			
			<!-- Display a couple menu items images for seafood -->
			<div class="promotionImages2" style="width:200px;height:200px;overflow:hidden;" >
				<div>
					<img src="http://pikachakula.com/wp-content/uploads/2014/09/Cajun-battered-king-prawns.jpg" alt="Deep Fried Prawns" width="200" height="200">
					<p>Deep Fried Prawns</p>
				</div>
				<div>
					<img src="http://perfectchineserestaurant.com/wp-content/uploads/2015/12/%E9%9B%80%E5%B7%A2%E8%9D%A6%E4%BB%81-300x300.jpg" alt="Sauteed Three Kinds of Seafood" width="200" height="200">
					<p>Sauteed Three Kinds of Seafood</p>
				</div>
				<div>
					<img src="https://www.ming.com/assets/images/recipes/season-1/105-calamari.jpg" alt="Ginger Fried Squid" width="200" height="200">
					<p>Ginger Fried Squid</p>
				</div>
				<div>
					<img src="http://sizzlingchinesefood.weebly.com/uploads/2/5/9/7/25974758/2868717_orig.jpg" alt="Palace Style Prawns" width="200" height="200">
					<p>Palace Style Prawns</p>
				</div>
			</div>
			
        </div>
 
        <div id="tab3" class="tab">
            <p>Hot Soup</p>
            <div>
				
				<?php
					$SQL = "Select foodName,description,price From menu WHERE menutype='Soup';";
					$Result = mysqli_query($connection, $SQL);
					
					if ($Result = mysqli_query($connection, $SQL))
					{
						// Fetch row one and one
						while ($row=mysqli_fetch_assoc($Result))
						{
							echo "<div class='food'>" . $row["foodName"] . "<span>$".$row["price"]. "</span></div>" ;
							echo "<div class='menuDetail'>" . $row["description"] . "</div>";
							echo "<hr>";
						}

						// Free result set
						mysqli_free_result($Result);

					}
					
				?>
				
			</div>
			
			<!-- Display a couple menu items images for soup -->
			<div class="promotionImages3" style="width:200px;height:200px;overflow:hidden;" >
				<div>
					<img src="http://www.ctmenusonline.com/images/rp_2_si_foo_beef_thick_soup_with_cilantro_63.jpg" alt="Si Foo Beef Thick Soup" width="200" height="200">
					<p>Si Foo Beef Thick Soup</p>
				</div>
				<div>
					<img src="http://unofficialrecipes.com/wp-content/uploads/2016/01/Pork-And-Shrimp-Wonton-Soup-Recipe.png" alt="Wonton Soup" width="200" height="200">
					<p>Wonton Soup</p>
				</div>
				<div>
					<img src="http://cookdiary.net/wp-content/uploads/images/Hot-and-Sour-Soup_10554.jpg" alt="Hot & Sour Soup" width="200" height="200">
					<p>Hot & Sour Soup</p>
				</div>
				<div>
					<img src="http://tantanrestaurant.com/wp-content/uploads/2013/08/00415.jpg" alt="Crab Meat&Fish Maw Soup" width="200" height="200">
					<p>Crab Meat&Fish Maw Soup</p>
				</div>
			</div>
			
        </div>
 
        <div id="tab4" class="tab">
            <p>Appetizer</p>
            <div>
				
				<?php
					$SQL = "Select foodName,description,price From menu WHERE menutype='Appetizer';";
					$Result = mysqli_query($connection, $SQL);
					
					if ($Result = mysqli_query($connection, $SQL))
					{
						// Fetch row one and one
						while ($row=mysqli_fetch_assoc($Result))
						{
							echo "<div class='food'>" . $row["foodName"] . "<span>$".$row["price"]. "</span></div>" ;
							echo "<div class='menuDetail'>" . $row["description"] . "</div>";
							echo "<hr>";
						}

						// Free result set
						mysqli_free_result($Result);

					}
					
				?>
				
				
			</div>
			
			<p>Beverages</p>
			<div>
				<?php
					$SQL = "Select foodName,description,price From menu WHERE menutype='Drinks';";
					$Result = mysqli_query($connection, $SQL);
					
					if ($Result = mysqli_query($connection, $SQL))
					{
						// Fetch row one and one
						while ($row=mysqli_fetch_assoc($Result))
						{
							echo "<div class='food'>" . $row["foodName"] . "<span>$".$row["price"]. "</span></div>" ;
							echo "<div class='menuDetail'>" . $row["description"] . "</div>";
							echo "<hr>";
						}

						// Free result set
						mysqli_free_result($Result);

					}
					
				?>
			</div>
			
			<!-- Display a couple menu items images for appetizer -->
			<div class="promotionImages4" style="width:200px;height:200px;overflow:hidden;" >
				<div>
					<img src="http://steamykitchen.com/wp-content/uploads/2013/02/chinese-fried-wontons-recipe-1242-640x426.jpg" alt="Imperial Deep Fried Wonton" width="200" height="200">
					<p>Imperial Deep Fried Wonton</p>	
				</div>
				<div>
					<img src="http://previews.123rf.com/images/michaeljung/michaeljung0903/michaeljung090300172/4591767-chinese-style-deep-fried-chicken-wings-Stock-Photo.jpg" alt="Chicken Wings" width="200" height="200">
					<p>Chicken Wings</p>
				</div>
				<div>
					<img src="http://www.farsan.co.uk/images/ww/background/spring-roll.jpg" alt="Spring Rolls" width="200" height="200">
					<p>Spring Rolls</p>
				</div>
				<div>
					<img src="http://foodforfour.com/wp-content/uploads/2014/08/pan-fried-pork-dumplings.jpg" alt="Pan Fried Dumplings" width="200" height="200">
					<p>Pan Fried Dumplings</p>
				</div>
			</div>
			
        </div>
		
		
    </div>
</div>


</div><!-- end content -->
</main>
<?php include 'footer.php' ?>
<script type="text/javascript" src="js/menuscript.js"></script>
</body>
</html>