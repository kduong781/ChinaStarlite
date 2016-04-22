#!/usr/local/php5/bin/php-cgi
<!doctype html>
<html lang="en">
<head>
	<title>Log In</title>
	<link rel="stylesheet" type="text/css" href="reset.css">
	<link rel="stylesheet" type="text/css" href="china.css">
</head>
<body>
<?php
session_start();
include 'navbar.php';
if(!$_SESSION['loginusername']){

?>
<div id="leftBar">
			<strong>I am a nav bar. Delete me</strong>
		</div><!-- end leftBar -->
<main>
	<div id="content">
<div id="noUser">
		<h1>Log In or Sign Up</h1>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<div class="formFields">
	<label for="loginusername">Username:</label> <input type="text" name="loginusername" id="loginusername"><br>
	<?php echo $loginUsernameMessage ?>
	<label for="loginpassword">Password:</label> <input type="password" name="loginpassword" id="loginpassword"><br>
	<?php echo $loginPasswordMessage ?>
	<input type="submit" name="submit" value="Log In">
	<button name="forgot">Forgot Password</button><br>
</div><!-- end formfields -->

</form>
<div id="registerInfo">
<h2>Create An Account With Us</h2>
<div name="SignUp" id="signUp">
	<a href="register.php">Sign Up</a>
</div><!-- end signup --><br>
<h3>Create an account with us for these great benefits:</h3>
<div id="benefits">
<ul>
	<li>Get priority orders/catering</li>
	<li>Get special offers and exclusive discounts</li>
	<li>Get invites to members-only events and exclusives</li>
	<li>Pay with your phone at the register</li>
	<li>Jump past the line on busy days</li>
	<li>Participate in raffles and scholarships</li>
	<li>Gain points for free meals</li>
	<li>View Announcements</li>
	<li>and much more!</li>
</ul>
</div><!-- end benefits -->
</div><!-- end registerInfo -->
</div><!-- end noUser -->

<?php
$username = $_POST['loginusername'];
$password = $_POST['loginpassword'];

define('DBHOST','cecs-db01.coe.csulb.edu');
define('DBNAME','cecs323o29');
define('DBUSER','cecs323o29');
define('DBPASS','nijeek');


	if($username && $password){

		$connect=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("couldn't connect");	
		$sql="SELECT * FROM users WHERE  username='$username'";
		$query=mysqli_query($connect,$sql);

		$numrows=mysqli_num_rows($query);


		if($numrows!=0){

			while($row = mysqli_fetch_assoc($query)){
				$dbusername = $row['username'];
				$dbpassword = $row['password'];
			}
			//check if username and password matches
			if($username==$dbusername && $password==$dbpassword){
				?>
				<script>
					document.getElementById('noUser').style.display="none";
				</script>
				<?php
				echo "Login successful! Go to the <a href='member.php'>member page</a><br>";
				echo "Click <a href='logout.php'>here</a> to log out";
				$_SESSION['loginusername']=$dbusername; //set our session

			}else{
				echo "<br><span class='error'>Incorrect password</span><br>";
			}

		}else{	
			die("<br><span class='error'>This user does not exist</span><br>");

		}

		mysqli_free_result($query);
		mysqli_close($connect);
	}else{
		die("<br>Please enter a username and password");//stops executing anything else afte this point
	}
}else{//end if session
	echo "You are already logged in as ".$_SESSION['loginusername']."<br>";
	echo "Click <a href='logout.php'>here</a> to log out.<br>";
	echo "Click <a href='logout.php'>here</a> to go to the member page.";
}

?>
</div><!-- end content -->
</main>
<?php include 'footer.php'; ?>
</body>
</html>