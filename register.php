#!/usr/local/php5/bin/php-cgi
<?php 
/**
*Author: Mingtau Li
*Description: Site registration page
*Allows users to create user accounts on the website
*all user data is stored in database
*/
?>
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
$registeragreemsg = '';


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
                  /*echo "<br>Your email address is already being used by another account in our system<br>";*/
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
       if(!isset($_POST["registeragree"])){
                  $pass=false;
                  $registeragreemsg='You need to agree to our terms and conditions in order to register for an account';
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
      }

}
  

  }
  else { echo "no result<br>";}
if(!$_POST['registersubmit'] || !($success && $pass && $allow)){
  ?>
<div class="formFields">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <label for="registerfname">First Name:</label> 
  <input type="text" id="registerfname" name="registerfname" placeholder="eg: John" required="required" <?php if($_POST['registerfname'])echo 'value='.$_POST['registerfname']; ?>><span class='registermsg'><?php echo $registerfnamemsg; ?></span><br>
  <label for="registerlname">Last Name:</label> 
  <input type="text" id="registerlname" name="registerlname" placeholder="eg: Smith" required="required" <?php if($_POST['registerlname'])echo 'value='.$_POST['registerlname']; ?>><span class='registermsg'><?php echo $registerlnamemsg; ?></span><br>
  <label for="registerusername">Username:</label> 
  <input type="text" id="registerusername" name="registerusername" placeholder="username" required="required" <?php if($_POST['registerusername'])echo 'value='.$_POST['registerusername']; ?>><span class='registermsg'><?php echo $registerusernamemsg; ?></span><br>
  <label for="registermonth">Date of Birth:</label> 
  <input type="text" id="registermonth" class="autoAdvance" name="registermonth" placeholder="mm" maxlength="2" required="required" size="2" <?php if($_POST['registermonth'])echo 'value='.$_POST['registermonth']; ?>> <span class="dateSection">/</span> <input type="text" id="registerday" class="autoAdvance" name="registerday" placeholder="dd" maxlength="2" required="required" size="2" <?php if($_POST['registerday'])echo 'value='.$_POST['registerday']; ?>> <span class="dateSection">/</span> <input type="text" id="registeryear" name="registeryear" placeholder="yyyy" maxlength="4" required="required" size="4" <?php if($_POST['registeryear'])echo 'value='.$_POST['registeryear']; ?>><span class='registermsg'><?php echo $registerdobmsg; ?></span><br>
  <label for="registeremail">Email Address:</label> 
  <input type="email" id="registeremail" name="registeremail" placeholder="user@example.com" required="required" <?php if($_POST['registeremail'])echo 'value='.$_POST['registeremail']; ?>><span class='registermsg'><?php echo $registeremailmsg; ?></span><br>
  <label for="registerphone">Phone Number:</label> 
  <input type="tel" id="registerphone" name="registerphone" placeholder="909-903-9000" maxlength="12" required="required" <?php if($_POST['registerphone'])echo 'value='.$_POST['registerphone']; ?>><span class='registermsg'><?php echo $registerphonemsg; ?></span><br>
  <label for="registerpassword">Password:</label> 
  <input type="password" id="registerpassword" name="registerpassword" placeholder="password" required="required" <?php if($_POST['registerpassword'])echo 'value='.$_POST['registerpassword']; ?>><span class='registermsg'><?php echo $registerpasswordmsg; ?></span><br>
  <label for="registeragree" class="terms">I agree to the terms and conditions</label> 
  <input type="checkbox" id="registeragree" name="registeragree" required="required" <?php if(isset($_POST['registeragree'])) echo "checked='checked'"; ?>><span class='registermsg'><?php echo $registeragreemsg; ?></span><br>
  
  <section id="termsandconditions">
 
      <h1>Terms and Conditions</h1>
  
<h2>1. YOUR AGREEMENT</h2>
<p>
By using this Site, you agree to be bound by, and to comply with, these Terms and Conditions. If you do not agree to these Terms and Conditions, please do not use this site.
</p>
<blockquote>
    PLEASE NOTE: We reserve the right, at our sole discretion, to change, modify or otherwise alter these Terms and Conditions at any time. Unless otherwise indicated, amendments will become effective immediately. Please review these Terms and Conditions periodically. Your continued use of the Site following the posting of changes and/or modifications will constitute your acceptance of the revised Terms and Conditions and the reasonableness of these standards for notice of changes. For your information, this page was last updated as of the date at the top of these terms and conditions.
</blockquote>
<h2>2. PRIVACY</h2>
<p>
Please review our Privacy Policy, which also governs your visit to this Site, to understand our practices.
</p>

<h2>3. LINKED SITES</h2>
<p>
This Site may contain links to other independent third-party Web sites ("Linked Sites”). These Linked Sites are provided solely as a convenience to our visitors. Such Linked Sites are not under our control, and we are not responsible for and does not endorse the content of such Linked Sites, including any information or materials contained on such Linked Sites. You will need to make your own independent judgment regarding your interaction with these Linked Sites.
</p>
<h2>4. FORWARD LOOKING STATEMENTS</h2>
<p>
All materials reproduced on this site speak as of the original date of publication or filing. The fact that a document is available on this site does not mean that the information contained in such document has not been modified or superseded by events or by a subsequent document or filing. We have no duty or policy to update any information or statements contained on this site and, therefore, such information or statements should not be relied upon as being current as of the date you access this site.
</p>

<h2>5. DISCLAIMER OF WARRANTIES AND LIMITATION OF LIABILITY</h2>
<ol type="A">
<li>
THIS SITE MAY CONTAIN INACCURACIES AND TYPOGRAPHICAL ERRORS. WE DOES NOT WARRANT THE ACCURACY OR COMPLETENESS OF THE MATERIALS OR THE RELIABILITY OF ANY ADVICE, OPINION, STATEMENT OR OTHER INFORMATION DISPLAYED OR DISTRIBUTED THROUGH THE SITE. YOU EXPRESSLY UNDERSTAND AND AGREE THAT: (i) YOUR USE OF THE SITE, INCLUDING ANY RELIANCE ON ANY SUCH OPINION, ADVICE, STATEMENT, MEMORANDUM, OR INFORMATION CONTAINED HEREIN, SHALL BE AT YOUR SOLE RISK; (ii) THE SITE IS PROVIDED ON AN "AS IS" AND "AS AVAILABLE" BASIS; (iii) EXCEPT AS EXPRESSLY PROVIDED HEREIN WE DISCLAIM ALL WARRANTIES OF ANY KIND, WHETHER EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, WORKMANLIKE EFFORT, TITLE AND NON-INFRINGEMENT; (iv) WE MAKE NO WARRANTY WITH RESPECT TO THE RESULTS THAT MAY BE OBTAINED FROM THIS SITE, THE PRODUCTS OR SERVICES ADVERTISED OR OFFERED OR MERCHANTS INVOLVED; (v) ANY MATERIAL DOWNLOADED OR OTHERWISE OBTAINED THROUGH THE USE OF THE SITE IS DONE AT YOUR OWN DISCRETION AND RISK; and (vi) YOU WILL BE SOLELY RESPONSIBLE FOR ANY DAMAGE TO YOUR COMPUTER SYSTEM OR FOR ANY LOSS OF DATA THAT RESULTS FROM THE DOWNLOAD OF ANY SUCH MATERIAL.
</li><li>
YOU UNDERSTAND AND AGREE THAT UNDER NO CIRCUMSTANCES, INCLUDING, BUT NOT LIMITED TO, NEGLIGENCE, SHALL WE BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, PUNITIVE OR CONSEQUENTIAL DAMAGES THAT RESULT FROM THE USE OF, OR THE INABILITY TO USE, ANY OF OUR SITES OR MATERIALS OR FUNCTIONS ON ANY SUCH SITE, EVEN IF WE HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. THE FOREGOING LIMITATIONS SHALL APPLY NOTWITHSTANDING ANY FAILURE OF ESSENTIAL PURPOSE OF ANY LIMITED REMEDY.
</li>
</ol>
<h2>6. EXCLUSIONS AND LIMITATIONS</h2>
<p>
SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF CERTAIN WARRANTIES OR THE LIMITATION OR EXCLUSION OF LIABILITY FOR INCIDENTAL OR CONSEQUENTIAL DAMAGES. ACCORDINGLY, OUR LIABILITY IN SUCH JURISDICTION SHALL BE LIMITED TO THE MAXIMUM EXTENT PERMITTED BY LAW.
</p>

<h2>7. OUR PROPRIETARY RIGHTS</h2>
<p>
This Site and all its Contents are intended solely for personal, non-commercial use. Except as expressly provided, nothing within the Site shall be construed as conferring any license under our or any third party's intellectual property rights, whether by estoppel, implication, waiver, or otherwise. Without limiting the generality of the foregoing, you acknowledge and agree that all content available through and used to operate the Site and its services is protected by copyright, trademark, patent, or other proprietary rights. You agree not to: (a) modify, alter, or deface any of the trademarks, service marks, trade dress (collectively "Trademarks") or other intellectual property made available by us in connection with the Site; (b) hold yourself out as in any way sponsored by, affiliated with, or endorsed by us, or any of our affiliates or service providers; (c) use any of the Trademarks or other content accessible through the Site for any purpose other than the purpose for which we have made it available to you; (d) defame or disparage us, our Trademarks, or any aspect of the Site; and (e) adapt, translate, modify, decompile, disassemble, or reverse engineer the Site or any software or programs used in connection with it or its products and services.

The framing, mirroring, scraping or data mining of the Site or any of its content in any form and by any method is expressly prohibited.
</p>

<h2>8. INDEMNITY</h2>
<p>
By using the Site web sites you agree to indemnify us and affiliated entities (collectively "Indemnities") and hold them harmless from any and all claims and expenses, including (without limitation) attorney's fees, arising from your use of the Site web sites, your use of the Products and Services, or your submission of ideas and/or related materials to us or from any person's use of any ID, membership or password you maintain with any portion of the Site, regardless of whether such use is authorized by you.
</p>
<h2>9. COPYRIGHT AND TRADEMARK NOTICE</h2>
<p>
Except our generated dummy copy, which is free to use for private and commercial use, all other text is copyrighted. generator.lorem-ipsum.info © 2013, all rights reserved
</p>

<h2>10. INTELLECTUAL PROPERTY INFRINGEMENT CLAIMS</h2>
<p>
It is our policy to respond expeditiously to claims of intellectual property infringement. We will promptly process and investigate notices of alleged infringement and will take appropriate actions under the Digital Millennium Copyright Act ("DMCA") and other applicable intellectual property laws. Notices of claimed infringement should be directed to:
<br>
126 Electricov St.<br>

Kiev, Kiev 04176<br>

United States<br>

contact@chinaStarlite.info

</p>
<h2>11. PLACE OF PERFORMANCE</h2>
<p>
This Site is controlled, operated and administered by us from our office in Kiev, Ukraine. We make no representation that materials at this site are appropriate or available for use at other locations outside of the Ukraine and access to them from territories where their contents are illegal is prohibited. If you access this Site from a location outside of the Ukraine, you are responsible for compliance with all local laws.
</p>
<h2>12. GENERAL</h2>
<ol type="A">
<li>If any provision of these Terms and Conditions is held to be invalid or unenforceable, the provision shall be removed (or interpreted, if possible, in a manner as to be enforceable), and the remaining provisions shall be enforced. Headings are for reference purposes only and in no way define, limit, construe or describe the scope or extent of such section. Our failure to act with respect to a breach by you or others does not waive our right to act with respect to subsequent or similar breaches. These Terms and Conditions set forth the entire understanding and agreement between us with respect to the subject matter contained herein and supersede any other agreement, proposals and communications, written or oral, between our representatives and you with respect to the subject matter hereof, including any terms and conditions on any of customer's documents or purchase orders.
</li><li>
No Joint Venture, No Derogation of Rights. You agree that no joint venture, partnership, employment, or agency relationship exists between you and us as a result of these Terms and Conditions or your use of the Site. Our performance of these Terms and Conditions is subject to existing laws and legal process, and nothing contained herein is in derogation of our right to comply with governmental, court and law enforcement requests or requirements relating to your use of the Site or information provided to or gathered by us with respect to such use.
</li>
</ol>

  </section>
  <input type="submit" name="registersubmit" value="Register">
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

