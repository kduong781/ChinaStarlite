#!/usr/local/php5/bin/php-cgi
<!doctype html>
<html lang="en">
<head>
	<title>Log In</title>
  <?php include 'header.php' ?>
	<meta charset="UTF-8">
</head>
<body>
<?php
session_start();
include 'navbar.php';
?>
<div id="wrapper">
<main>
	<div id="content">

<!-- ////////////////////////////////////////////////////////START//////////////////////////////////////////////////////// -->
	<?php
	if($_SESSION['loginusername']){//if loginusername
		echo "You are already logged in as ".$_SESSION['loginusername']."<br>";
		echo "<br><div id='button'><a href='logout.php'>Log Out</a></div><br>";
		echo "<br><div id='button'><a href='member.php'>Member Page</a></div>";

	}else{//else if not loginusename
		?>
			<h1>Log In or Sign Up</h1>

			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
				<div class="formFields">
					<label for="loginusername">Username:</label> <input type="text" name="loginusername" id="loginusername"><br>
					<label for="loginpassword">Password:</label> <input type="password" name="loginpassword" id="loginpassword"><br>
					<input type="submit" name="submit" value="Log In">
					<button name="forgot" class="forgot">Forgot Password</button><br>

		<?php

		define('DBHOST','cecs-db01.coe.csulb.edu');
		define('DBNAME','cecs323o29');
		define('DBUSER','cecs323o29');
		define('DBPASS','nijeek');

		/*define('DBHOST','localhost'); //test
		define('DBNAME','cecs323o29');  //test
		define('DBUSER','root');        //test
		define('DBPASS','password');    //test  */

		//initialize and sanitize inputs
		$username = trim($_POST['loginusername']);
		$password = trim($_POST['loginpassword']);
		echo "<div class='msgBox'>";
			$connect=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME) or die("couldn't connect");
			$sql="SELECT * FROM users WHERE  username='$username'";
			$query=mysqli_query($connect,$sql);
			$numrows=mysqli_num_rows($query);
		if($username && $password){

			if($numrows!=0){//if there is data in query
				while($row = mysqli_fetch_assoc($query)){
					$dbusername = $row['username'];
					$dbpassword = $row['password'];
					$dbfname = $row['fname'];
					$dblname = $row['lname'];
					$dbemail = $row['email'];
				}
				//check if username and password matches
				if($username==$dbusername && $password==$dbpassword){
					/*echo "Login successful! Go to the <a href='member.php'>member page</a><br>";*/
					/*echo "Click <a href='logout.php'>here</a> to log out";*/
					$_SESSION['loginusername']=$dbusername; //set our session
					$_SESSION['fname'] = $dbfname;
					$_SESSION['lname'] = $dblname;
					$_SESSION['email'] = $dbemail;

					header( 'Location: member.php' ) ;//redirect to member page
				}else{
					echo "<br><span class='error'>Incorrect password</span><br>";
				}
			}else{
				echo "<br><span class='error'>This user does not exist</span><br>";
			}
			mysqli_free_result($query);
			//mysqli_close($connect);
		}else{
			echo "<br>Please enter your username and password";//stops executing anything else afte this point
		}
		echo "</div>";//end msgBox

		?>
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

			<div id="modal_background" class="overlay">
				<div id="modal_window" >
					<div style="text-align: right;"><a id="modal_close" href="#">close <b>[X]</b></a></div>
					<form id="modal_feedback" method="POST" action="#" accept-charset="UTF-8">
						<p>Enter your email address to retrieve your username/password</p>
						<input type="text" name="forgotemail" id="forgotemail"><br><div id="forgotemailmessage"></div><br>
						<input type="submit" name="feedback" value="Send Message">
					</form>
				</div> <!-- #modal_window -->
			</div> <!-- #modal_background -->

		<?php
		if(isset($_POST['feedback']) && $_POST['forgotemail']!=""){
			$forgottenEmail =  $_POST['forgotemail'];
			$sql="SELECT * FROM users WHERE  email='$forgottenEmail'";
				$query=mysqli_query($connect,$sql);
				$numrows=mysqli_num_rows($query);
				if($numrows == 0){
					echo "<span class='error'><br>This email is not associated with any accounts on this site.<br></span>";
				}else{

					while($row = mysqli_fetch_assoc($query)){
						$forgotEmailUsername = $row['username'];
						$forgotEmailPassword = $row['password'];
					}



$to = $forgottenEmail;
$subject = 'Your ChinaStarlite Credentials';
$email = $forgottenEmail;
$messsage = "Username:".$forgotEmailUsername."\n Password:".$forgotEmailPassword."";
/*$body = <<<EMAIL
$msg

EMAIL;*/

$header = 'minijordon@gmail.com';

	mail($to, $subject, $message, $header);
	

					//mail($forgottenEmail,"Your ChinaStarlite Credentials",$msg);

				//	$msg = "Username:".$forgotEmailUsername."\n Password:".$forgotEmailPassword."";
				//	mail($forgottenEmail,"Your ChinaStarlite Credentials",$msg);


				}
				mysqli_free_result($query);
		}
	}//end else not username
	?>
<!-- ////////////////////////////////////////////////////////END////////////////////////////////////////////////////////////// -->
</div><!-- end content -->
</main>
</div><!-- end wrapper -->
<script src="js/forgot.js"></script>
<?php include 'footer.php';
mysqli_close($connect); ?>
</body>
</html>
