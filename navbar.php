<?php
/**
*Author: Mingtau Li
*Contributors: Kevin Duong (smart detection for user state)
*Description: navigation bar called by php includes
*Changes in size and design depending on screen size and mouse scroll
*/
?>
<?php @ob_start(); ?>
<div class="studentmsg">Student Project -- not a commercial site.</div>
<nav>
    <p class="absolute right">Call Us: +1 (562) 123-4567</p>
    <ul id="primary">
        <li class='left'><a href="index.php"><img src="images/logo-head.png" alt="logo"></a></li>
        <li id="title" class='left'></li>
        <?php
          if(isset($_SESSION['loginusername'])) {
            echo   '<li class="right"><a href="logout.php">Log Out</a></li>';
          } else {
            echo   '<li class="right"><a href="login.php">Sign In</a></li>';
          }
         ?>
        <li class='right'><a href="member.php">Member</a></li>
        <li class='right'><a href="about.php">About Us</a></li>
        <li class='right'><a href="order.php">Order Now</a></li>
        <li class='right'><a href="menu.php">Menu</a></li>
        <li class='right'><a href="index.php">Home</a></li>
        <li class='right menu'><img src="images/menu.png" alt="menu"></li>
    </ul>
    <div id="pad"></div>
 </nav>
 <div id="social">
    <ul>
        <li class="right secondary"><a href="http://www.twitter.com" target="_blank"><img src="images/twitter.png" alt="twitter" class="social right"></a></li>
        <li class="right secondary"><a href="http://www.facebook.com" target="_blank"><img src="images/facebook.png" alt="facebook" class="social right"></a></li>
        <li class="right secondary"><a href="http://www.yelp.com" target="_blank"><img src="images/yelp.png" alt="yelp" class="social right"></a></li>
        <li class="right secondary"><a href="http://www.linkedin.com" target="_blank"><img src="images/linkedin.png" alt="linkedin" class="social right"></a></li>
    </ul>
  </div>
  <div id="navPlacement"></div>
<script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>
<script>
        $(function() {
         var navPlacement = document.getElementById('navPlacement');
         var page = window.location.href.substr(window.location.href.lastIndexOf("/")+1);

             $("nav ul li.right a").each(function(){
                  if($(this).attr("href") == page)
                  $(this).addClass("active");
             })
        });
 </script>

<script>
    function shrinkNav() {
        window.addEventListener('scroll', function(e){
            var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                shrinkOn = 30,
                nav = document.querySelector("nav");
            var currentPage = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
                if(currentPage != 'index.php'){
                    if (distanceY > shrinkOn){
                        nav.className="smaller";
                        navPlacement.style.height=nav.clientHeight;
                    }else{

                        if(nav.classList.contains("smaller")){
                            nav.classList.remove("smaller");
                            navPlacement.style.height=nav.clientHeight;
                        }
                    }
                }
                else{
                    nav.style.position="relative";
                    navPlacement.style.display="none";

                }
        });
    }
    var showMenu = document.querySelector('nav > ul > li.menu');
    var menuItems = document.querySelectorAll('nav > ul > li.right');
     var dropdown = document.querySelector("nav > ul > li.menu > img");

     function dropDownMenu(){
        if(window.innerWidth>740){
            dropdown.style.display = 'none';
        }else{
            dropdown.style.display = 'inline-block';
        }
    }

    function menuShrink(){
        var id = setInterval(framer, 25);
           var i= 0;
            function framer() {
                if (i==6) {
                    clearInterval(id);
                } else {
                    menuItems[i].style.display="none";
                    i++;
                }
            } 
    }
    function menuDrop(){
        var id = setInterval(framer, 25);
           var i= 0;
            function framer() {
                if (i==6) {
                    clearInterval(id);
                } else {
                    menuItems[i].style.display="block";
                    i++;
                }
            } 
    }

    var show = true;
    showMenu.onclick = function(){
        if(show){
           menuShrink();
           show = false;

        }else{
           menuDrop();
           show=true;
        }
    }

    window.onpageload = dropDownMenu();
    window.onpagelod = shrinkNav();
    window.onload = function(){
            //reverseNavOrder();
            shrinkNav();
            dropDownMenu();

    }

        window.onresize = function(){
           // reverseNavOrder();
                dropDownMenu();
                if(window.innerWidth>740){
                    for(items=0;items<menuItems.length;items++){
                        menuItems[items].style.display="inline-block";
                    }
                }else{
                     for(items=0;items<menuItems.length;items++){
                        menuItems[items].style.display="block";
                    }
                }
           shrinkNav();
        }


</script>
