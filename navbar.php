<nav>
    <ul>
      <li class='left'><a href="index.php"><img src="images/logo-head.png" alt="logo"></a></li>
      <li class='right'><a href="login.php">Sign In</a></li>
      <li class='right'><a href="about.php">About Us</a></li>
      <li class='right'><a href="order.php">Order Now</a></li>
      <li class='right'><a href="menu.php">Menu</a></li>
      <li class='right'><a href="index.php">Home</a></li>
    </ul>
 </nav>
<script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>
<script>
        $(function() {
         var page = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
	         $("nav ul li.right a").each(function(){
	              if($(this).attr("href") == page)
	              $(this).addClass("active");
	         })
	    });
 </script>

 