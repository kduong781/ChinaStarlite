<nav>
 <span class="absolute right"><p>Call Us: +1 (562) 123-4567</p></span>
    <ul>
        <li class='left'><a href="index.php"><img src="images/logo-head.png" alt="logo"></a></li>
        <li id="title" class='left'></li>
        <li class='right'><a href="login.php">Sign In</a></li>
        <li class='right'><a href="member.php">Member</a></li>
        <li class='right'><a href="about.php">About Us</a></li>
        <li class='right'><a href="order.php">Order Now</a></li>
        <li class='right'><a href="menu.php">Menu</a></li>
        <li class='right'><a href="index.php">Home</a></li>
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
    function init() {
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
    window.onload = init();
</script>