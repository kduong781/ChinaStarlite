#!/usr/local/php5/bin/php-cgi
<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<title>Checkout</title>
<meta charset="utf-8">
<?php
  $connection = mysqli_connect("cecs-db01.coe.csulb.edu","cecs323o29","nijeek","cecs323o29");
	$sql = "";
  mysqli_set_charset($connection,"utf8");
?>
<?php include 'header.php' ?>
	<link rel="stylesheet" type="text/css" href="order.css">
	<link rel="stylesheet" type="text/css" href="modal.css">
</head>
<body>
<?php session_start(); ?>
<?php include 'navbar.php' ?>

<?php
// define variables and set to empty values
$firstnameErr = $lastnameErr = $emailErr = $stateErr = $cityErr = $streetErr = $zipErr  = $privacyErr = "";
$firstname = $lastname = $email = $state = $city = $street = $zip = $privacy = "";
$price = "";
$date = date ("F d, Y", getlastmod())." at ". date ("g:i:s A", getlastmod());
if ($_SERVER["REQUEST_METHOD"] == "POST") {

   if (empty($_POST["firstname"])) {
     $firstnameErr = "First Name is required";
   } else {
     if(!preg_match("/[a-zA-z\s]{1,}$/",$_POST["firstname"])) {
        $firstnameErr = "Invalid Name (Letters Only)";
     }else {
       $firstnameErr = "";
       $firstname = $_POST["firstname"];
     }
   }



   if (empty($_POST["lastname"])) {
     $lastnameErr = "Last Name is required";
   } else {
     if(!preg_match("/[a-zA-z\s]{1,}$/",$_POST["lastname"])) {
        $lastnameErr = "Invalid Name (Letters Only)";
     }else {
       $lastnameErr = "";
       $lastname = $_POST["lastname"];
     }
   }

   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     if(!preg_match("/^[a-zA-z0-9]{1,}(?:[@][a-zA-z0-9]{1,}(?:[\.])[a-zA-z]{2,3}$)/",$_POST["email"])) {
       $emailErr = "Invalid email";
     }else {
        $emailErr = "";
       $email = $_POST["email"];
     }
   }

   if (empty($_POST["street"])) {
     $streetErr = "Street is required";
   } else {
     if(!preg_match("/^[a-zA-z#0-9\s]{1,}$/",$_POST["street"])) {
      $streetErr = "Invalid Street (No Special Characters)";
    }else {
      $streetErr = "";
      $street = $_POST["street"];
    }
   }

   if (empty($_POST["state"])) {
     $stateErr = "State is required";
   } else {
     if(!preg_match("/^[a-zA-z#0-9\s]{1,}$/",$_POST["state"])) {
      $stateErr = "Invalid State (Leters Only)";
    }else {
      $stateErr = "";
      $state = $_POST["state"];
    }
   }

   if (empty($_POST["city"])) {
     $cityErr = "City is required";
   } else {
     if(!preg_match("/^[a-zA-z#0-9\s]{1,}$/",$_POST["city"])) {
      $cityErr = "Invalid City (Letters Only)";
    }else {
      $cityErr = "";
      $city = $_POST["city"];
    }
   }
   if (empty($_POST["zip"])) {
     $zipErr = "Zipcode is required";
   } else {
     if(!preg_match("/^\d{5}$/",$_POST["zip"])) {
      $zipErr = "Invalid Zipcode (5 digits only)";
    }else {
      $zipErr = "";
      $zip = $_POST["zip"];
    }
   }

   if (empty($_POST["privacy"])) {
     $privacyErr = "Please accept privacy policies";
   } else {
     $privacy = $_POST["privacy"];
   }
}

?>
<?php
if((isset($_POST['submit']) && $firstnameErr == "" && $lastnameErr == "" && $emailErr == ""
  && $stateErr== "" &&  $cityErr == "" && $streetErr == "" && $zipErr == "" &&  $deliveryErr == "" && $privacyErr == "") || isset($_SESSION['loginusername'])) {
    $sql = "INSERT INTO cecs323o29.orders(oId,userID,date,menu_menuid,quantity) VALUES ";
    $counter = 0;
    foreach($_GET as $key => $val) {
        if($val == "Submit") {

        }else {
          if($counter > 0) {
            $sql .= ", ";
          }
          $sql .= "(NULL,". $_SESSION['id'].",'".$date."',".substr($val,0,4).",".substr($val,4).")";
          $counter++;
        }
    }
    $result = mysqli_query($connection, $sql);
    if (!$result) { //check if query is successful
       mysqli_free_result($result);
    }


      echo "<div id='main'>";
      echo "<h1>Order Confirmation (Pickup)</h1>";
      				echo "<div class='orderInfo'><fieldset><legend>Order Information</legend>";
      echo "<div class='orderCont'>Congratulations ". $_GET['firstname']  ." " . $_GET['lastname'] . " on completing your order!</br>";
      echo "Please make sure the information you have inputted is correct: </br>";
      foreach($_POST as $key => $val) {
          if($key == "firstname") {
            echo "First name: $val </br>";
            fwrite($myfile, "First name: $val \n");
          }else if($key == "lastname") {
            echo "Last name: $val </br>";
            fwrite($myfile, "Last name: $val \n");
          }else if($key == "email"){
            echo "Email: $val </br>";
            fwrite($myfile, "Email: $val \n");
          }else if($key == "street"){

          }else if($key == "city"){

          }else if($key == "zip"){

          }else if($key == "item"){
            echo "Item: $val </br>";
            fwrite($myfile, "Item: $val \n");
          }
      }

			if (isset($_SESSION['loginusername'])) {
				echo "Username: ". $_SESSION['loginusername']."</br>";
				if(isset($_SESSION['fname']) ){
					echo "First Name: ". $_SESSION['fname']."</br>";
				}
				if(isset($_SESSION['lname']) ){
						echo "Last Name: ". $_SESSION['lname']."</br>";
				}if(isset($_SESSION['email']) ){
					echo "Email: ". $_SESSION['email']."</br>";
			///		echo "INSERT INTO cecs323o29.orders VALUES(NULL,". $_SESSION['id'].",".$date.",".substr($val,0,4).",".substr($val,4).")"; //, $date, substr($val,0,4), substr($val,4))";
								//echo "INSERT INTO orders VALUES ";//"(NULL, ";//.$_SESSION['id'].",";//. $date.",". substr($val,0,4).",". substr($val,4).")";
				}
			}
      foreach($_GET as $key => $val) {
          if($val == "Submit") {

          }else {
            $sql = "SELECT * FROM menu WHERE menuid=".substr($val,0,4);
            $result = mysqli_query($connection, $sql);
            if ($result=mysqli_query($connection,$sql))
            {
            // Fetch one and one row
            while ($row=mysqli_fetch_assoc($result))
              {
                  echo "x".substr($val,4)." ".$row['foodName']." ".$price."</br> ";
              }
              mysqli_free_result($result);
            }
          }
      }
        	fclose($myfile);
        echo "</fieldset></div></div>";

  }else {
		echo '<div id="main">';


    foreach($_GET as $key => $val) {
        if($val == "Submit") {

        }else {
          $sql = "SELECT * FROM menu WHERE menuid=".substr($val,0,4);
          $result = mysqli_query($connection, $sql);
          if ($result=mysqli_query($connection,$sql))
          {
          // Fetch one and one row
          while ($row=mysqli_fetch_assoc($result))
            {
                echo "x".substr($val,4)." ".$row['foodName']." ".$price."</br> ";
            }
            mysqli_free_result($result);
          }
        }
    }

?>
<div id="itemConfirm">
 <h3>Items</h3>
<?php
foreach($_GET as $key => $val) {
	if($val == "Submit") {

	}else {
		echo "$val </br>";
	}
}

?>
</div>
<?php
 echo '<p><span class="error">* required field.</span></p>
<form method="post" action="confirmation.php">
   First Name: <input type="text" name="firstname">
   <span class="error">* ' . $firstnameErr . '</span>
   <br><br>
   Last Name: <input type="text" name="lastname">
   <span class="error">* ' .  $lastnameErr . '</span>
   <br><br>
   E-mail: <input type="text" name="email">
   <span class="error">* ' . $emailErr . '</span>
   <br><br>
   Street: <input type="text" name="street">
   <span class="error">* ' . $streetErr . '</span>
   <br><br>
   City: <input type="text" name="city">
   <span class="error">* ' . $cityErr . '</span>
   <br><br>
   State: <input type="text" name="state">
   <span class="error">* ' . $stateErr . '</span>
   <br><br>
   Zip: <input type="text" name="zip">
   <span class="error">* ' . $zipErr . '</span>
   <br><br>';
	 ?>

	 <?php
   echo '<input type="checkbox" name="privacy" value="privacy">Accept Privacy Below
   <span class="error">* ' . $privacyErr . '</span>
   <br><br>';
	 ?>
	 <?php
/*	 foreach($_GET as $key => $val) {
		 if($val == "Submit") {

		 }else {
			 echo "$val </br>";
		 }
	 }
*/
	 ?>
	 <?php
   echo '<input type="submit" name="submit" value="Submit">
</form>


<fieldset>
  <legend>Privacy Issues</legend>
  <div>
    We take your privacy very seriously. Any information given is solely used to complete your orders. Your information remains securely with only us.
  </div>
</fieldset>
</div>';
}
?>
<?php include 'footer.php' ?>
<script src="modal.js"></script>
</body>
</html>
