#!/usr/local/php5/bin/php-cgi
<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
  <title>Register</title>
 <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->
  <script src="js/jquery-1.12.3.min.js"></script>
  <link rel="stylesheet" type="text/css" href="reset.css">
  <link rel="stylesheet" type="text/css" href="china.css">
</head>
<body>
<?php include 'navbar.php' ?>
<div id="leftBar">
      <strong>I am a nav bar. Delete me</strong>
</div><!-- end leftBar -->

<main>
<div id="content">
<h1>Sign Up For a China Starlite Account</h1>
<div class="formFields">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" required="required">
  <label for="registerfname">First Name:</label> 
  <input type="text" name="registerfname" placeholder="eg: John" required="required"><br>
  <label for="registerlname">Last Name:</label> 
  <input type="text" name="registerlname" placeholder="eg: Smith" required="required"><br>
  <label for="registerusername">Username:</label> 
  <input type="text" name="registerusername" placeholder="username" required="required"><br>
  <label for="registermonth">Date of Birth:</label> 
  <input type="text" id="registermonth" class="autoAdvance" name="registermonth" placeholder="mm" maxlength="2" required="required" size="2"> <span class="dateSection">/</span> <input type="text" id="registerday" class="autoAdvance" name="registerday" placeholder="dd" maxlength="2" required="required" size="2"> <span class="dateSection">/</span> <input type="text" id="registeryear" name="registeryear" placeholder="yyyy" maxlength="4" required="required" size="4"><br>
  <label for="registeremail">Email Address:</label> 
  <input type="email" name="registeremail" placeholder="user@example.com" required="required"><br>
  <label for="registerphone">Phone Number:</label> 
  <input type="tel" name="registerphone" placeholder="909-903-9000" required="required"><br>
  <label for="registerpassword">Password:</label> 
  <input type="password" name="registerpassword" placeholder="password" required="required"><br>
  <input type="submit" name="registersubmit" value="Register" required="required">
  <input type="reset" name="reset"><br>
</form>
</div><!-- end formfields -->
<?php
$fname = $_POST['registerfname'];
$lname = $_POST['registerlname'];
$username = $_POST['registerusername'];//no duplicate usernames
$email = $_POST['registeremail']; //no duplicate emails
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
    $success = false;

    while ($row=mysqli_fetch_assoc($result)){
                if($row['username']==$username){
                  echo "Username already exists<br>";
                  $allow=false;
                  break;
                }
                if($row['email']==$email){
                  echo "Your email address is already being used by another account in our system<br>";
                  $allow=false;
                  break;
                }
      }
?>

<script type="text/javascript" src="js/registrationscript.js"></script>

<?php
  if(isset($_POST['registersubmit'])){
      if($allow){
         $sql = "INSERT INTO users(`id`, `fname`, `lname`, `dob`, `username`, `password`, `email`,`phone`) VALUES (NULL, '$fname', '$lname', '$dob', '$username', '$password', '$email', '$phone');";

         $result = mysqli_query($connection, $sql);
      }

      if (!$result) { //check if query is successful
          mysqli_free_result($result);
          unset($_POST['registersubmit']);
          echo '<br>Registration was unsuccessful. Please try again ' . mysqli_error();
          /*die(mysql_error());*/
      }else{
          echo "<br>Registration Successful!Click <a href='login.php'>here</a> to log in"; 
      }

}
  

  }
  else { echo "no result<br>";}
  ?>
<?php   mysqli_free_result($result); ?>
<?php mysqli_close($connection); ?>
</div><!-- end content -->
</main>
<?php include 'footer.php' ?>
</body>
</html>

