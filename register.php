#!/usr/local/php5/bin/php-cgi
<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
  <title>Register</title>
 <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->
  <script src="js/jquery-1.12.3.min.js"></script>
  <?php include 'header.php' ?>
  <meta charset="UTF-8">
</head>
<body>
<?php include 'navbar.php' ?>
<?php 
//initialize message variables
$registerfnamemsg = '';
$registerlnamemsg = '';
$registerusernamemsg = '';
$registeremailmsg = '';
$registerpasswordmsg = '';
$registerdobmsg = '';
$registerphonemsg = '';


?>
<div id="wrapper">
<main>
<div id="content">
<h1>Sign Up For a China Starlite Account</h1>

<?php
//initialize and sanitize inputs
$fname = ucfirst(trim($_POST['registerfname']));
$lname = ucfirst(trim($_POST['registerlname']));
$username = trim($_POST['registerusername']);//no duplicate usernames
$email = trim($_POST['registeremail']); //no duplicate emails
$password = $_POST['registerpassword'];
$month = $_POST['registermonth'];
$day = $_POST['registerday'];
$year = $_POST['registeryear'];
$dob = (string)($year.'-'.$month.'-'.$day);
$phone = $_POST['registerphone'];


?>

<?php 


/*define('DBHOST','localhost'); //test
define('DBNAME','cecs323o29');  //test
define('DBUSER','root');        //test
define('DBPASS','password');    //test
*/ 

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
  $sql = "SELECT * FROM users";

  $result = mysqli_query($connection, $sql);

  //find out how many rows are in the result set
   $numrows=mysqli_num_rows($result);

  //loop through the result set
  if ($result=mysqli_query($connection,$sql)){
    $allow=true;
    $success=false;
    while ($row=mysqli_fetch_assoc($result)){
                 if($row['username'] == $username){
                  //echo "<br><span class='msgBox'>Username already exists</span><br>";
                  $registerusernamemsg="Username already exists. Please choose another.";
                  $allow=false;
                  /*break;*/
                }
                if($row['email'] == $email){
                  echo "<br>Your email address is already being used by another account in our system<br>";
                  $registeremailmsg="Your email address is already being used by another account in our system";
                  $allow=false;
                  /*break;*/
                }
      }
?>

<?php
//==========================================php validation starts here================================================
$pass=true;
if(isset($_POST['registersubmit'])){
    if(empty($_POST["registerfname"])){
                  $pass=false;
                  $registerfnamemsg='Please enter your first name';
                  unset($_POST['registersubmit']);
    }
    if(empty($_POST["registerlname"])){
                  $pass=false;
                  $registerlnamemsg='Please enter your last name';
                  unset($_POST['registersubmit']);
    }
    if(empty($_POST["registerusername"])){
                  $pass=false;
                  $registerusernamemsg='Please enter your preferred username';
                  unset($_POST['registersubmit']);
    }
    if(empty($_POST["registeremail"])){
                  $pass=false;
                  $registeremailmsg='Please enter your email address';
                  unset($_POST['registersubmit']);
    }else{
        if(!preg_match('/^(.+)@([^\.].*)\.([a-z]{2,})$/',$email)){
                  $pass=false;
                  $registeremailmsg='Please enter a valid email address';
                  unset($_POST['registersubmit']);
        }
    }
    if(empty($_POST["registerpassword"])){
                  $pass=false;
                  $registerpasswordmsg='Please enter a password';
                  unset($_POST['registersubmit']);
    }
    if(empty($_POST["registerphone"])){
                  $pass=false;
                  $registerphonemsg='Please enter your phone number';
                  unset($_POST['registersubmit']);
    }else{
        if(!preg_match('/^\d{3}-\d{3}-\d{4}$/',$phone)){
                  $pass=false;
                  $registerphonemsg='Please enter your phone number in the correct format (###-###-####)';
                  unset($_POST['registersubmit']);
        }
    }
    if($dob == ''){
                  $pass=false;
                  $registerdobmsg='Please enter your date of birth';
                  unset($_POST['registersubmit']);
    }
    if(!preg_match('/^\d{4}-\d{2}-\d{2}$/',$dob)){
                  $pass=false;
                  $registerdobmsg='Please enter a valid date (mm/dd/yyyy)';
                  unset($_POST['registersubmit']);
    }
}
//==============================================end php validation ===================================================

?>
<?php
  if(isset($_POST['registersubmit'])){
      if($allow){
         $sql = "INSERT INTO users(`id`, `fname`, `lname`, `dob`, `username`, `password`, `email`,`phone`) VALUES (NULL, '$fname', '$lname', '$dob', '$username', '$password', '$email', '$phone');";

         $result = mysqli_query($connection, $sql);

            if (!$result) { //check if query is successful
                mysqli_free_result($result);
                unset($_POST['registersubmit']);
                echo "<br><span class='msgBox'>Registration was unsuccessful. Please try again</span>" . mysqli_error();
            }else{
                ?>
                <script>document.getElementById('content').innerHTML = "<br>Registration Successful!<br><br><div id='button'><a href='login.php'>Log In</a></div>";</script>
                <?php
                $success=true;
            }
      }else{
        //echo "<br>kikllllllllllllllllplease try again";
      }

}
  

  }
  else { echo "no result<br>";}
if(!$_POST['registersubmit'] || !($success && $pass && $allow)){
  ?>

<div class="formFields">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <label for="registerfname">First Name:</label> 
  <input type="text" name="registerfname" placeholder="eg: John" required="required" <?php if($_POST['registerfname'])echo 'value='.$_POST['registerfname']; ?>><span class='registermsg'><?php echo $registerfnamemsg; ?></span><br>
  <label for="registerlname">Last Name:</label> 
  <input type="text" name="registerlname" placeholder="eg: Smith" required="required" <?php if($_POST['registerlname'])echo 'value='.$_POST['registerlname']; ?>><span class='registermsg'><?php echo $registerlnamemsg; ?></span><br>
  <label for="registerusername">Username:</label> 
  <input type="text" name="registerusername" placeholder="username" required="required" <?php if($_POST['registerusername'])echo 'value='.$_POST['registerusername']; ?>><span class='registermsg'><?php echo $registerusernamemsg; ?></span><br>
  <label for="registermonth">Date of Birth:</label> 
  <input type="text" id="registermonth" class="autoAdvance" name="registermonth" placeholder="mm" maxlength="2" required="required" size="2" <?php if($_POST['registermonth'])echo 'value='.$_POST['registermonth']; ?>> <span class="dateSection">/</span> <input type="text" id="registerday" class="autoAdvance" name="registerday" placeholder="dd" maxlength="2" required="required" size="2" <?php if($_POST['registerday'])echo 'value='.$_POST['registerday']; ?>> <span class="dateSection">/</span> <input type="text" id="registeryear" name="registeryear" placeholder="yyyy" maxlength="4" required="required" size="4" <?php if($_POST['registeryear'])echo 'value='.$_POST['registeryear']; ?>><span class='registermsg'><?php echo $registerdobmsg; ?></span><br>
  <label for="registeremail">Email Address:</label> 
  <input type="email" name="registeremail" placeholder="user@example.com" required="required" <?php if($_POST['registeremail'])echo 'value='.$_POST['registeremail']; ?>><span class='registermsg'><?php echo $registeremailmsg; ?></span><br>
  <label for="registerphone">Phone Number:</label> 
  <input type="tel" name="registerphone" placeholder="909-903-9000" maxlength="12" required="required" <?php if($_POST['registerphone'])echo 'value='.$_POST['registerphone']; ?>><span class='registermsg'><?php echo $registerphonemsg; ?></span><br>
  <label for="registerpassword">Password:</label> 
  <input type="password" name="registerpassword" placeholder="password" required="required" <?php if($_POST['registerpassword'])echo 'value='.$_POST['registerpassword']; ?>><span class='registermsg'><?php echo $registerpasswordmsg; ?></span><br>
  <input type="submit" name="registersubmit" value="Register" required="required">
  <input type="reset" name="reset"><br>
</form>
</div><!-- end formfields -->
<?php 
}//end if !pass/success/allow
?>
</div><!-- end content -->
</main>
</div><!-- end wrapper -->
<?php   mysqli_free_result($result); ?>
<?php mysqli_close($connection); ?>
<script type="text/javascript" src="js/registrationscript.js"></script>
<?php include 'footer.php' ?>
</body>
</html>

