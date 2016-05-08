<?php @ob_start(); ?>
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


 /*   function reverseNavOrder(){
        var $menuItems = document.getElementById("primary");
        var $i = $menuItems.childNodes.length;
        var $tags = document.querySelectorAll('nav > ul > li');
        //var $tags = $menuItems.getElementsByTagName('NAV')[0].getElementsByTagName('LI');
            //alert($tags[2].getElementsByTagName('a')[0].innerHTML);
          if(window.innerWidth<=1057){
           
            $menuItems.insertBefore($menuItems.firstChild, $menuItems.lastChild);
            $menuItems.insertBefore($menuItems.firstChild, $menuItems.lastChild);
            $menuItems.insertBefore($menuItems.firstChild, $menuItems.lastChild);
            $menuItems.insertBefore($menuItems.firstChild, $menuItems.lastChild);
            while ($i--){
                $menuItems.appendChild($menuItems.childNodes[$i]);
            }
            $tags = document.querySelectorAll('nav > ul > li');
       
        }else{
            if($tags[2].getElementsByTagName('a')[0].innerHTML != 'Sign In' || $tags[2].getElementsByTagName('a')[0].innerHTML == "undefined"){
                $menuItems.insertBefore($menuItems.firstChild, $menuItems.lastChild);
                $menuItems.insertBefore($menuItems.firstChild, $menuItems.lastChild);
                $menuItems.insertBefore($menuItems.firstChild, $menuItems.lastChild);
                $menuItems.insertBefore($menuItems.firstChild, $menuItems.lastChild);
                while ($i--){
                    $menuItems.appendChild($menuItems.childNodes[$i]);
                }
            $tags = document.querySelectorAll('nav > ul > li');
            }
        }
       //return window.innerWidth;

       // alert($tags[2].innerHTML.indexOf('Sign In') > -1);
    }
*/
    function dropDownMenu(){
        var dropdown = document.querySelector("nav > ul > li.menu > img");
        /*var dropdown = document.getElementsByClassName('menu')[0];*/
       // alert(dropdown.tagName);
        if(window.innerWidth>740){
            dropdown.style.display = 'none';
        }else{
            dropdown.style.display = 'block';
        }
    }
    var showMenu = document.querySelector('nav > ul > li.menu');
    var menuItems = document.querySelectorAll('nav > ul > li.right');
    var show = false;

    function menuShrink(){
        var id = setInterval(framer, 25);
           var i= 0;
            function framer() {
                if (i==6) {
                    clearInterval(id);
                } else {
                    menuItems[i].style.display="none";
                    i++
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
                    i++
                }
            } 
    }

    showMenu.onclick = function(){
        if(show == true){
           menuShrink();
           show = false;

        }else{
           menuDrop();
           show=true;
        }
    }

    window.onload = shrinkNav();

    window.onload = function(){//initialize global var, know when to switch back
            //reverseNavOrder();
            dropDownMenu();
    }

    window.onresize = function(){
       // reverseNavOrder();
            dropDownMenu();
    }

    /*window.onresize = function(){
        reverseNavOrder();
    }*/

</script>
