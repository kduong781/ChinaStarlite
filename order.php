#!/usr/local/php5/bin/php-cgi
<!DOCTYPE html>
<?php
  $connection = mysqli_connect("cecs-db01.coe.csulb.edu","cecs323o29","nijeek","cecs323o29");
?>
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
			<?php
					$sql = "SELECT * FROM cecs323o29.menu";
					$result = mysqli_query($connection, $sql);
					if ($result=mysqli_query($connection,$sql))
					{
					// Fetch one and one row
					while ($row=mysqli_fetch_assoc($result))
						{
							$type = $row["menutype"];
							if($row[menutype] == "Chicken") {
									echo "<li id='".$type."Tab' class='active'>".$type."</li>";
							} else {
								echo "<li id='".$type."Tab'>".$type."</li>";
							}
						}
						mysqli_free_result($result);
					}
			 ?>
			 <li id="viewTab">View All</li>
	<!--		<li id="lunchTab" class="active">Lunch</li>
			<li id="dinnerTab" >Dinner</li>
			<li id="appetizerTab" >Appetizer</li>-->
		</ul>
	</div>
	<div class="content">
		<div class="menu">
			<span class="menuTitle">Chicken</span>
			<dl>
				<?php
						$sql = "SELECT * FROM cecs323o29.menu WHERE menutype='Chicken'";
						$result = mysqli_query($connection, $sql);
						if ($result=mysqli_query($connection,$sql))
						{
						// Fetch one and one row
						while ($row=mysqli_fetch_assoc($result))
							{
								$type = $row["menutype"];
								$name = $row["foodName"];
								$price = $row["price"];
								$description = $row["description"];
								echo "<dt>".$name." <span class='price'>". $price ."</span></dt>";
								echo "<dd>".$description . "</dd>";
							}
							mysqli_free_result($result);
						}
				 ?>
			</dl>
		</div>
	</div>

</div>



<!-- Tab Info -->

	<div id="Chicken" class="hide">
		<div class="menu">
			<span class="menuTitle">Chicken</span>
			<dl>
				<?php
						$sql = "SELECT * FROM cecs323o29.menu WHERE menutype='Chicken'";
						$result = mysqli_query($connection, $sql);
						if ($result=mysqli_query($connection,$sql))
						{
						// Fetch one and one row
						while ($row=mysqli_fetch_assoc($result))
							{
								$type = $row["menutype"];
								$name = $row["foodName"];
								$price = $row["price"];
								$description = $row["description"];
								echo "<dt>".$name." <span class='price'>". $price ."</span></dt>";
								echo "<dd>".$description . "</dd>";
							}
							mysqli_free_result($result);
						}
				 ?>
			</dl>
	  </div>
	</div>

	<div id="Beef" class="hide">
		<div class="menu">
			<span class="menuTitle">Dinner</span>
			<dl>
				<?php
						$sql = "SELECT * FROM cecs323o29.menu WHERE menutype='Beef'";
						$result = mysqli_query($connection, $sql);
						if ($result=mysqli_query($connection,$sql))
						{
						// Fetch one and one row
						while ($row=mysqli_fetch_assoc($result))
							{
								$type = $row["menutype"];
								$name = $row["foodName"];
								$price = $row["price"];
								$description = $row["description"];
								echo "<dt>".$name." <span class='price'>". $price ."</span></dt>";
								echo "<dd>".$description . "</dd>";
							}
							mysqli_free_result($result);
						}
				 ?>
			</dl>
	  </div>
	</div>

	<div id="Pork" class="hide">
		<div class="menu">
			<span class="menuTitle">Pork</span>
			<dl>
				<?php
						$sql = "SELECT * FROM cecs323o29.menu WHERE menutype='Pork'";
						$result = mysqli_query($connection, $sql);
						if ($result=mysqli_query($connection,$sql))
						{
						// Fetch one and one row
						while ($row=mysqli_fetch_assoc($result))
							{
								$type = $row["menutype"];
								$name = $row["foodName"];
								$price = $row["price"];
								$description = $row["description"];
								echo "<dt>".$name." <span class='price'>". $price ."</span></dt>";
								echo "<dd>".$description . "</dd>";
							}
							mysqli_free_result($result);
						}
				 ?>
			</dl>
		</div>
	</div>

	<div id="Drinks" class="hide">
		<div class="menu">
			<span class="menuTitle">Drinks</span>
			<dl>
				<?php
						$sql = "SELECT * FROM cecs323o29.menu WHERE menutype='Drinks'";
						$result = mysqli_query($connection, $sql);
						if ($result=mysqli_query($connection,$sql))
						{
						// Fetch one and one row
						while ($row=mysqli_fetch_assoc($result))
							{
								$type = $row["menutype"];
								$name = $row["foodName"];
								$price = $row["price"];
								$description = $row["description"];
								echo "<dt>".$name." <span class='price'>". $price ."</span></dt>";
								echo "<dd>".$description . "</dd>";
							}
							mysqli_free_result($result);
						}
				 ?>
			</dl>
	  </div>
	</div>

	<div id="Seafood" class="hide">
		<div class="menu">
			<span class="menuTitle">Seafood</span>
			<dl>
				<?php
						$sql = "SELECT * FROM cecs323o29.menu WHERE menutype='Seafood'";
						$result = mysqli_query($connection, $sql);
						if ($result=mysqli_query($connection,$sql))
						{
						// Fetch one and one row
						while ($row=mysqli_fetch_assoc($result))
							{
								$type = $row["menutype"];
								$name = $row["foodName"];
								$price = $row["price"];
								$description = $row["description"];
								echo "<dt>".$name." <span class='price'>". $price ."</span></dt>";
								echo "<dd>".$description . "</dd>";
							}
							mysqli_free_result($result);
						}
				 ?>
			</dl>
	  </div>
	</div>

	<div id="Soup" class="hide">
		<div class="menu">
			<span class="menuTitle">Soup</span>
			<dl>
				<?php
						$sql = "SELECT * FROM cecs323o29.menu WHERE menutype='Soup'";
						$result = mysqli_query($connection, $sql);
						if ($result=mysqli_query($connection,$sql))
						{
						// Fetch one and one row
						while ($row=mysqli_fetch_assoc($result))
							{
								$type = $row["menutype"];
								$name = $row["foodName"];
								$price = $row["price"];
								$description = $row["description"];
								echo "<dt>".$name." <span class='price'>". $price ."</span></dt>";
								echo "<dd>".$description . "</dd>";
							}
							mysqli_free_result($result);
						}
				 ?>
			</dl>
		</div>
	</div>

	<div id="Appetizer" class="hide">
		<div class="menu">
			<span class="menuTitle">Appetizer</span>
			<dl>
				<?php
						$sql = "SELECT * FROM cecs323o29.menu WHERE menutype='Appetizer'";
						$result = mysqli_query($connection, $sql);
						if ($result=mysqli_query($connection,$sql))
						{
						// Fetch one and one row
						while ($row=mysqli_fetch_assoc($result))
							{
								$type = $row["menutype"];
								$name = $row["foodName"];
								$price = $row["price"];
								$description = $row["description"];
								echo "<dt>".$name." <span class='price'>". $price ."</span></dt>";
								echo "<dd>".$description . "</dd>";
							}
							mysqli_free_result($result);
						}
				 ?>
			</dl>
		</div>
	</div>


<!-- End of Tab Info -->
<script src="js/order.js"></script>
<?php include 'footer.php' ?>
</body>
</html>
