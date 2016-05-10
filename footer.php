<?php 
/**
*Author: Mingtau Li
*Contributors: Kevin Duong (assisted in styling)
*Description: site footer called by php includes
*/
?>
 <footer>
   <div>
   <hr>
   <ul id="footerNav">
        <li><a href="login.php">Sign In</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="order.php">Order Now</a></li>
        <li><a href="menu.php">Menu</a></li>
        <li><a href="index.php">Home</a></li>
    </ul>

       <ul class="social">
         <li><a href="http://www.twitter.com" target="_blank"><img src="images/twitter.png" alt="twitter" class="social right"></a></li>
         <li><a href="http://www.facebook.com" target="_blank"><img src="images/facebook.png" alt="facebook" class="social right"></a></li>
         <li><a href="http://www.yelp.com" target="_blank"><img src="images/yelp.png" alt="yelp" class="social right"></a></li>
         <li><a href="http://www.linkedin.com" target="_blank"><img src="images/linkedin.png" alt="linkedin" class="social right"></a></li>
       </ul>
	  <?php
	    echo "<small> &copy; 2016 by Mingtau Li, Kevin Duong, Rohit Sehdev, Khai Nguyen";
	    echo" <br />";
	    echo " Check us out on <a href='https://github.com/kduong781/ChinaStarlite/' target='_blank'>Github</a>";
	    echo" </small>";
      echo "<br />";
      echo "<small>Last Modified: " . date ("F d, Y", getlastmod())." at ". date ("g:i:s A", getlastmod())."</small>";
	    echo" </div>";
	    ?>
</footer>
