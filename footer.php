#!/usr/local/php5/bin/php-cgi
 <footer>
 <hr>
 <ul>
      <li><a href="login.php">Sign In</a></li>
      <li><a href="about.php">About Us</a></li>
      <li><a href="order.php">Order Now</a></li>
      <li><a href="menu.php">Menu</a></li>
      <li><a href="index.php">Home</a></li>
    </ul>
	  <?php
	    echo "<p>";
	    echo "<br />";
	    echo "<small>Last Modified: " . date ("F d Y H:i:s.", getlastmod())."</small>";
	    echo "<br />";
	    echo "<small> &copy; 2016 by Mingtau Li, Kevin Duong, Rohit Sehdev, Khai Nguyen";
	    echo" <br />";
	    echo " Check us out on <a href='https://github.com/kduong781/ChinaStarlite/' target='_blank'>Github</a>";
	    echo" </small>";
	    echo" </p>";
	    ?>
</footer>
