#!/usr/local/php5/bin/php-cgi
<!--
/**
*Author: Kevin Duong
*Description: Order page
*/
-->
<!DOCTYPE html>
<?php
  $connection = mysqli_connect("cecs-db01.coe.csulb.edu","cecs323o29","nijeek","cecs323o29");
  mysqli_set_charset($connection,"utf8");
?>
<html lang="en">
<head>
	<title>Order Now</title>
  <?php include 'header.php' ?>
		<link rel="stylesheet" type="text/css" href="order.css">
    <link rel="stylesheet" type="text/css" href="modal.css">
  <meta charset="UTF-8">
</head>
<body>
<?php session_start(); ?>
<?php include 'navbar.php' ?>
<div class="wrapper">
	<div class="leftCol">
		<ul class="tabs">
			<?php
					$sql = "SELECT DISTINCT menutype FROM cecs323o29.menu";
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
  <!--    <li id="lunchTab" class="active">Lunch</li>
      <li id="dinnerTab" >Dinner</li>
      <li id="appetizerTab" >Appetizer</li>-->
    </ul>
  </div>
  <div class="cart">
    <form action="confirmation.php" method="get">
      <h1>Order Contents</h1>
      <ul id="cartList">
      </ul>
      <h4></h4>
      <h4>Subtotal <span id="subTotal" class="price">$0.00</span></h4>
      <h4>Tax <span id="tax" class="price">$0.00</span></h4>
      <h4>Total <span id="total" class="price">$0.00</span></h4>
      <input type="submit" name="submit" value="Submit">
   </form>
  </div>

  <div class="content">
    <div class="menu">
      <span class="menuTitle">Chicken</span>
      <hr class="typeHr">

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
                $url = $row["url"];
                $price = $row["price"];
                $id = $row["menuid"];
                $url =$row["url"];
                $description = $row["description"];
                echo "<h3><a href='#' onclick=openModal(".$id.")>".$name."</a> </h3>";
                echo "<p>".$description . "</p>";

                ?>

                <!-- The Modal -->
                <div class="modal <?php echo $id;?>">

                  <!-- Modal content -->
                  <div class="modal-content">
                    <div class="modal-header">
                      <span class="close" onclick="closeModal(<?php echo $id?>)">×</span>
                      <h2>Order</h2>
                    </div>
                    <div class="modal-body">
                      <p><?php echo $name . " $" . round($price,2);?></p>
                      <img src="<?php echo $url;?>" alt="<?php echo $description;?>">
                      <p><?php echo $description;?></p>
                    </div>
                    <div class="modal-footer">
                      <h3>Quantity: </h3>
                      <input pattern="[0-9]{1,2}" class="quantity-<?php echo $id;?>" type="text" value="1">
                      <input type="button" value="Add to Cart" onclick="addItem('<?php echo $name;?>',<?php echo $price;?>,'quantity-<?php echo $id;?>',<?php echo $id;?>)">
                    </div>
                  </div>

                </div>

                <?php
							}
							mysqli_free_result($result);
						}
				 ?>

		</div>
	</div>

</div>








<!-- Tab Info -->
<div class="hide">
	<div id="Chicken" class="hide">
		<div class="menu">
			<span class="menuTitle">Chicken</span>
      <hr class="typeHr">

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
                $url = $row["url"];
                $id = $row["menuid"];
								$description = $row["description"];
								echo "<h3><a href='#' onclick=openModal(".$id.")>".$name."</a> </h3>";
								echo "<p>".$description . "</p>";

                ?>

                <!-- The Modal -->
                <div class="modal <?php echo $id;?>">

                  <!-- Modal content -->
                  <div class="modal-content">
                    <div class="modal-header">
                      <span class="close" onclick="closeModal(<?php echo $id?>)">×</span>
                      <h2>Order</h2>
                    </div>
                    <div class="modal-body">
                      <p><?php echo $name . " $" . round($price,2);?></p>
                      <img src="<?php echo $url;?>" alt="<?php echo $description;?>">
                      <p><?php echo $description;?></p>
                    </div>
                    <div class="modal-footer">
                      <h3>Quantity: </h3>
                      <input pattern="[0-9]{1,2}" class="quantity-<?php echo $id;?>" type="text" value="1">
                      <input type="button" value="Add to Cart" onclick="addItem('<?php echo $name;?>',<?php echo $price;?>,'quantity-<?php echo $id;?>',<?php echo $id;?>)">
                    </div>
                  </div>

                </div>

                <?php
							}
							mysqli_free_result($result);
						}
				 ?>

	  </div>
	</div>

	<div id="Beef" class="hide">
		<div class="menu">
			<span class="menuTitle">Dinner</span>
      <hr class="typeHr">

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
                $url = $row["url"];
								$price = $row["price"];
                $id = $row["menuid"];
								$description = $row["description"];
								echo "<h3><a href='#' onclick=openModal(".$id.")>".$name."</a> </h3>";
								echo "<p>".$description . "</p>";

                ?>

                <!-- The Modal -->
                <div class="modal <?php echo $id;?>">

                  <!-- Modal content -->
                  <div class="modal-content">
                    <div class="modal-header">
                      <span class="close" onclick="closeModal(<?php echo $id?>)">×</span>
                      <h2>Order</h2>
                    </div>
                    <div class="modal-body">
                      <p><?php echo $name . " $" . round($price,2);?></p>
                      <img src="<?php echo $url;?>" alt="<?php echo $description;?>">
                      <p><?php echo $description;?></p>
                    </div>
                    <div class="modal-footer">
                      <h3>Quantity: </h3>
                      <input pattern="[0-9]{1,2}" class="quantity-<?php echo $id;?>" type="text" value="1">
                      <input type="button" value="Add to Cart" onclick="addItem('<?php echo $name;?>',<?php echo $price;?>,'quantity-<?php echo $id;?>',<?php echo $id;?>)">
                    </div>
                  </div>

                </div>

                <?php
							}
							mysqli_free_result($result);
						}
				 ?>

	  </div>
	</div>

	<div id="Pork" class="hide">
		<div class="menu">
			<span class="menuTitle">Pork</span>
      <hr class="typeHr">

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
                $url = $row["url"];
								$price = $row["price"];
                $id = $row["menuid"];
								$description = $row["description"];
								echo "<h3><a href='#' onclick=openModal(".$id.")>".$name."</a> </h3>";
								echo "<p>".$description . "</p>";

                ?>

                <!-- The Modal -->
                <div class="modal <?php echo $id;?>">

                  <!-- Modal content -->
                  <div class="modal-content">
                    <div class="modal-header">
                      <span class="close" onclick="closeModal(<?php echo $id?>)">×</span>
                      <h2>Order</h2>
                    </div>
                    <div class="modal-body">
                      <p><?php echo $name . " $" . round($price,2);?></p>
                      <img src="<?php echo $url;?>" alt="<?php echo $description;?>">
                      <p><?php echo $description;?></p>
                    </div>
                    <div class="modal-footer">
                      <h3>Quantity: </h3>
                      <input pattern="[0-9]{1,2}" class="quantity-<?php echo $id;?>" type="text" value="1">
                      <input type="button" value="Add to Cart" onclick="addItem('<?php echo $name;?>',<?php echo $price;?>,'quantity-<?php echo $id;?>',<?php echo $id;?>)">
                    </div>
                  </div>

                </div>

                <?php
							}
							mysqli_free_result($result);
						}
				 ?>

		</div>
	</div>

	<div id="Drinks" class="hide">
		<div class="menu">
			<span class="menuTitle">Drinks</span>
      <hr class="typeHr">

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
                $url = $row["url"];
								$price = $row["price"];
                $id = $row["menuid"];
								$description = $row["description"];
								echo "<h3><a href='#' onclick=openModal(".$id.")>".$name."</a> </h3>";
								echo "<p>".$description . "</p>";

                ?>

                <!-- The Modal -->
                <div class="modal <?php echo $id;?>">

                  <!-- Modal content -->
                  <div class="modal-content">
                    <div class="modal-header">
                      <span class="close" onclick="closeModal(<?php echo $id?>)">×</span>
                      <h2>Order</h2>
                    </div>
                    <div class="modal-body">
                      <p><?php echo $name . " $" . round($price,2);?></p>
                      <img src="<?php echo $url;?>" alt="<?php echo $description;?>">
                      <p><?php echo $description;?></p>
                    </div>
                    <div class="modal-footer">
                      <h3>Quantity: </h3>
                      <input pattern="[0-9]{1,2}" class="quantity-<?php echo $id;?>" type="text" value="1">
                      <input type="button" value="Add to Cart" onclick="addItem('<?php echo $name;?>',<?php echo $price;?>,'quantity-<?php echo $id;?>',<?php echo $id;?>)">
                    </div>
                  </div>

                </div>

                <?php
							}
							mysqli_free_result($result);
						}
				 ?>

	  </div>
	</div>

	<div id="Seafood" class="hide">
		<div class="menu">
			<span class="menuTitle">Seafood</span>
      <hr class="typeHr">

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
                $url = $row["url"];
								$price = $row["price"];
                $id = $row["menuid"];
								$description = $row["description"];
								echo "<h3><a href='#' onclick=openModal(".$id.")>".$name."</a> </h3>";
								echo "<p>".$description . "</p>";

                ?>

                <!-- The Modal -->
                <div class="modal <?php echo $id;?>">

                  <!-- Modal content -->
                  <div class="modal-content">
                    <div class="modal-header">
                      <span class="close" onclick="closeModal(<?php echo $id?>)">×</span>
                      <h2>Order</h2>
                    </div>
                    <div class="modal-body">
                      <p><?php echo $name . " $" . round($price,2);?></p>
                      <img src="<?php echo $url;?>" alt="<?php echo $description;?>">
                      <p><?php echo $description;?></p>
                    </div>
                    <div class="modal-footer">
                      <h3>Quantity: </h3>
                      <input pattern="[0-9]{1,2}" class="quantity-<?php echo $id;?>" type="text" value="1">
                      <input type="button" value="Add to Cart" onclick="addItem('<?php echo $name;?>',<?php echo $price;?>,'quantity-<?php echo $id;?>',<?php echo $id;?>)">
                    </div>
                  </div>

                </div>

                <?php
							}
							mysqli_free_result($result);
						}
				 ?>

	  </div>
	</div>

	<div id="Soup" class="hide">
		<div class="menu">
			<span class="menuTitle">Soup</span>
      <hr class="typeHr">

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
                $url = $row["url"];
								$price = $row["price"];
                $id = $row["menuid"];
								$description = $row["description"];
								echo "<h3><a href='#' onclick=openModal(".$id.")>".$name."</a> </h3>";
								echo "<p>".$description . "</p>";

                ?>

                <!-- The Modal -->
                <div class="modal <?php echo $id;?>">

                  <!-- Modal content -->
                  <div class="modal-content">
                    <div class="modal-header">
                      <span class="close" onclick="closeModal(<?php echo $id?>)">×</span>
                      <h2>Order</h2>
                    </div>
                    <div class="modal-body">
                      <p><?php echo $name . " $" . round($price,2);?></p>
                      <img src="<?php echo $url;?>" alt="<?php echo $description;?>">
                      <p><?php echo $description;?></p>
                    </div>
                    <div class="modal-footer">
                      <h3>Quantity: </h3>
                      <input pattern="[0-9]{1,2}" class="quantity-<?php echo $id;?>" type="text" value="1">
                      <input type="button" value="Add to Cart" onclick="addItem('<?php echo $name;?>',<?php echo $price;?>,'quantity-<?php echo $id;?>',<?php echo $id;?>)">
                    </div>
                  </div>

                </div>

                <?php
							}
							mysqli_free_result($result);
						}
				 ?>

		</div>
	</div>

	<div id="Appetizer" class="hide">
		<div class="menu">
			<span class="menuTitle">Appetizer</span>
      <hr class="typeHr">

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
                $url = $row["url"];
								$price = $row["price"];
                $id = $row["menuid"];
								$description = $row["description"];
								echo "<h3><a href='#' onclick=openModal(".$id.")>".$name."</a> </h3>";
								echo "<p>".$description . "</p>";

                ?>

                <!-- The Modal -->
                <div class="modal <?php echo $id;?>">

                  <!-- Modal content -->
                  <div class="modal-content">
                    <div class="modal-header">
                      <span class="close" onclick="closeModal(<?php echo $id?>)">×</span>
                      <h2>Order</h2>
                    </div>
                    <div class="modal-body">
                      <p><?php echo $name . " $" . round($price,2);?></p>
                      <img src="<?php echo $url;?>" alt="<?php echo $description;?>">
                      <p><?php echo $description;?></p>
                    </div>
                    <div class="modal-footer">
                      <h3>Quantity: </h3>
                      <input pattern="[1-9]{1}[0-9]{0,1}" required oninvalid="this.setCustomValidity('Please input a positive integer (Max 2 digits)')"  class="quantity-<?php echo $id;?>" type="text" value="1">
                      <input type="button" value="Add to Cart" onclick="addItem('<?php echo $name;?>',<?php echo $price;?>,'quantity-<?php echo $id;?>',<?php echo $id;?>)">
                    </div>
                  </div>

                </div>

                <?php
							}
							mysqli_free_result($result);
						}
				 ?>

		</div>
	</div>
</div>

<!-- End of Tab Info -->
<script src="js/order.js"></script>
<script src="js/modal.js"></script>
<?php include 'footer.php' ?>
</body>
</html>
