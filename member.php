#!/usr/local/php5/bin/php-cgi
<!doctype html>
<html lang="en">
<head>
	<title>Member</title>
  <?php include 'header.php' ?>
  <meta charset="UTF-8">
</head>
<body>
<?php
session_start();
include 'navbar.php'
?>
<div id="wrapper">
<main>
<div id="content">
<?php 
$memberMsg = '';
?>
	<?php
	if($_SESSION['loginusername']){
		$memberMsg = "<img src='images/settings.png' alt='settings'> Settings";
		echo "Welcome, ".$_SESSION['loginusername']."<br>";
	}else{
		$memberMsg = "<a href='login.php'>Sign In</a>";
		echo"You must be logged in to view this page<br>";
	}
	echo "<div id='button' class='right settings'>".$memberMsg."</div>";
	?>

	<?php 
	define('DBHOST','cecs-db01.coe.csulb.edu');
	define('DBNAME','cecs323o29');
	define('DBUSER','cecs323o29');
	define('DBPASS','nijeek');

	$connection = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
	$error = mysqli_connect_error();
	if ($error != null) {
		$output = "<p>Unable to connect to database<p>" . $error;
		exit($output);
	}
	$currentusername = $_SESSION['loginusername'];
	$sql = "SELECT * FROM users WHERE username = '$currentusername'";

	$result = mysqli_query($connection, $sql);

	


	//loop through the result set
  if ($result=mysqli_query($connection,$sql)){

    while ($row=mysqli_fetch_assoc($result)){
?>
    		<script>
    		var currentpassword = '<?php echo $row['password']; ?>';
    		var currentusername = '<?php echo $currentusername; ?>'
    		</script>
<?php
  	}
   }

     $sql="SELECT * FROM users";
     $result=mysqli_query($connection,$sql);
	?>

<script>
var usernames = [];
	<?php
	 if ($result=mysqli_query($connection,$sql)){

    while ($row=mysqli_fetch_assoc($result)){
    	?>
    		 usernames.push('<?php echo $row['username']; ?>');
    	<?php
  	}
     }
     mysqli_free_result($result);
     ?>
</script>




	<div id="settingsContent">
			<h2>Profile Settings</h2>
			<div id="usernameunderline"><button class='profile' id='changeusername'>Change UserName</button></div>
			<div id="passwordunderline"><button class='profile' id='changepassword'>Change Password</button></div>
			<div id="deactivateunderline"><button class='profile' id='deactivateaccount'>Deactivate Account</button></div>

		<div id="userNameBox">
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="newusernameform">
				<label for="newUsername">Enter your new username:</label>
				<input type="text" name="newusername" id="newUsername"><br><div id='newusernamemsg'></div><br>
				<label for="newUsernamepassword">Enter your password to change your username: </label>
				<input type="password" name="newusernamepassword" id="newUsernamepassword"><br><div id='newusernamepasswordmsg'></div>
				<br>
				<input type="submit" name="newusernamesubmit" value="submit">

			</form>
				<script>
					var newusernameform = document.getElementById('newusernameform');
					var newusernamebox = document.getElementById('newUsername');
					var newusernamemsg = document.getElementById('newusernamemsg');
					var newusernamepasswordmsg = document.getElementById('newusernamepasswordmsg');
					var newusernamepassword = document.getElementById('newUsernamepassword');
					var success = true;
					newusernamebox.onkeyup = function(){
						success = true;
						newusernamemsg.innerHTML = '';
						for(var ii=0;ii<usernames.length;ii++){
							if(newusernamebox.value.trim() == usernames[ii]){
								newusernamemsg.innerHTML = 'this username already exists';
								success=false;
							}
						}
					}

					newusernamepassword.onkeyup = function(){
						newusernamepasswordmsg.innerHTML = '';
					}

					newusernameform.onsubmit = function(e){
							if(newusernamebox.value.trim() == ''){
								success=false;
								//e.preventDefault();
								newusernamemsg.innerHTML = 'Please enter a valid username';
							}
							/*if(!success){
								e.preventDefault();
							}*/
							if(newusernamepassword.value != currentpassword){
								success=false;
								e.preventDefault();
								newusernamepasswordmsg.innerHTML = 'Please enter the correct password';
							}
					}

				</script>
					<?php
							if(isset($_POST['newusernamesubmit'])){

									$newusername = $_POST['newusername'];
									$sql="UPDATE users SET username='$newusername' WHERE username='$currentusername'";
		     						$result=mysqli_query($connection,$sql);
		     						if(!$result){
		     							exit('unable to update');
		     						}

		     					
							unset($_POST['newusernamesubmit']);
							$_SESSION['loginusername'] = $newusername;
							header('Location: member.php');
							}
					?>
		</div><!-- end usernamebox -->
	<!-- ==================================================================== -->
		<div id="passwordBox">
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="newpasswordform">
				<label for="oldpassword">Enter your old password: </label>
				<input type="password" name="oldpassword" id="oldpassword"><br><div id="oldpasswordmsg"></div><br>
				<label for="newpassword">Enter your new password:</label>
				<input type="password" name="newpassword" id="newpassword"><br><div id="newpasswordmsg"></div><br>
				<input type="submit" name="newpasswordsubmit" value="submit">
			</form>
			<script>
				var newpasswordform = document.getElementById('newpasswordform'); 
				var oldpassword = document.getElementById('oldpassword');
				var newpassword = document.getElementById('newpassword');
				var oldpasswordmsg = document.getElementById('oldpasswordmsg'); 
				var newpasswordmsg = document.getElementById('newpasswordmsg'); 

				newpasswordform.onsubmit = function(e){
					newpasswordmsg.innerHTML = '';
					oldpasswordmsg.innerHTML = '';
					if(oldpassword.value != currentpassword){
						e.preventDefault();
						oldpasswordmsg.innerHTML = 'Please enter the correct password';
					}
					if(oldpassword.value.trim() == ''){
						e.preventDefault();
						oldpasswordmsg.innerHTML = 'Please enter your password';
					}
					if(newpassword.value.trim() == currentpassword){
						e.preventDefault();
						newpasswordmsg.innerHTML = 'Please choose a new password';
					}
					if(newpassword.value.trim() == ''){
						e.preventDefault();
						newpasswordmsg.innerHTML = 'Please enter your new password';
					}
				}
			</script>
			<?php
							if(isset($_POST['newpasswordsubmit'])){
									$newpassword = $_POST['newpassword'];
									$sql="UPDATE users SET password='$newpassword' WHERE username='$currentusername'";
		     						$result=mysqli_query($connection,$sql);
		     						if(!$result){
		     							exit('unable to update');
		     						}
							unset($_POST['newpasswordsubmit']);
							header('Location: member.php');
							}
					?>

		</div><!-- end passwordbox -->
	<!-- ==================================================================== -->
		<div id="deactivateBox">
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="deactivateform">
			<div id="warningmessage">Warning: This will delete your account from our system permanently</div><br>
			<label for="deactivate">Enter your password to confirm deactivation</label>
			<input type="password" name="deactivate" id="deactivate"><br><div id="deactivatemsg"></div><br>
			<input type="submit" name="submitdeactivate" value="deactivate account">
			</form>
			<script>
				var deactivateform = document.getElementById('deactivateform'); 
				var deactivate = document.getElementById('deactivate');
				var deactivatemsg = document.getElementById('deactivatemsg'); 

				deactivateform.onsubmit = function(e){
					deactivatemsg.innerHTML = '';
					if(deactivate.value != currentpassword){
						e.preventDefault();
						deactivatemsg.innerHTML = 'Please enter the correct password';
					}
					if(deactivate.value.trim() == ''){
						e.preventDefault();
						deactivatemsg.innerHTML = 'Please enter your password';
					}
				}
				
			</script>
			<?php
							if(isset($_POST['submitdeactivate'])){
									$newpassword = $_POST['newpassword'];
									$sql="DELETE FROM users WHERE username='$currentusername'";
		     						$result=mysqli_query($connection,$sql);
		     						if(!$result){
		     							exit('unable to update');
		     						}
							unset($_POST['submitdeactivate']);
							header('Location: logout.php');
							}
					?>
		</div><!-- end deactivatebox -->

</div><!-- end settingscontent -->
</div><!-- end content -->
</main>
</div><!-- end wrapper -->
<script src='js/settings.js'></script>
<?php   mysqli_free_result($result); ?>
<?php mysqli_close($connection); ?>
<?php include 'footer.php'; ?>
</body>
</html>
