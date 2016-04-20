jQuery(document).ready(function ($) {
    var slideCount = $('#slider ul li').length;
    //var slideWidth = $('#slider ul li').width();
    var slideWidth = window.innerWidth-17; 
    $('#slider ul li img').css({width: slideWidth});
    var slideHeight = $('#slider ul li').height();
    var sliderWidth = slideCount * slideWidth;
    var pagIndex = 0;
                    
    $('#slider').css({ width: slideWidth, height: slideHeight });
                    
    $('#slider ul').css({ width: sliderWidth, marginLeft: - slideWidth });
                    
    $('#slider ul li:last-child').prependTo('#slider ul');

var interval;
var play = false;
var spacePressed = false;
start();//start playing in beginning
addPagination();
$('#pagination ul li:first-child').addClass('selected');

function start(){
    interval = setInterval(function(){slideLeft()}, 3000);
 $('#toggle').removeClass('play').addClass('pause');
}
 
 function pause(){
    clearInterval(interval);
    $('#toggle').removeClass('pause').addClass('play');
}

function addPagination(){
    $('#slider ul li').each(function(){
        $('#pagination #select ul').append('<li></li>');
    });
}

$('#toggle').bind('click', function(){
    if (play){
        start();
        play = false;
     }
     else {
        pause();
        play = true;
     }
});

    function slideRight() {
        $('#slider ul').animate({
            left: + slideWidth
        }, 250, function () {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '');
        });
        pageRight();
    };

    function slideLeft() {
        $('#slider ul').animate({
            left: - slideWidth
        }, 250, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
        pageLeft();
    };

    function pageRight(){
        pagIndex = $('#pagination #select ul li.selected').index();
        if(pagIndex == $('#pagination #select ul li:first-child').index()){
            pagIndex = $('#pagination #select ul li:last-child').index()+1;
        }

        $('#pagination #select ul li.selected').removeClass('selected');
       var page='#pagination ul li:nth-child('+pagIndex+')';
       $(page).addClass('selected');

    };

    function pageLeft(){
         pagIndex = $('#pagination #select ul li.selected').index();
        if(pagIndex == $('#pagination #select ul li:last-child').index()){
            pagIndex = 1;
        }else{
            pagIndex=pagIndex+2; //+2 because array index starts from 0 but nth-child starts at 1
        }
        $('#pagination #select ul li.selected').removeClass('selected');
       var page='#pagination ul li:nth-child('+pagIndex+')';
       $(page).addClass('selected');
    };

    function zoomLeft() {//slides left with no animation time
        $('#slider ul').animate({
            left: - slideWidth
        }, 0, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
        pageLeft();
    }; 

    function zoomRight() {//slides left with no animation time
        $('#slider ul').animate({
            left: + slideWidth
        }, 0, function () {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '');
        });
        pageRight();
    };

    $('.previous').click(function () {
        slideLeft();
        pause();
        play=true;
    });

    $('.next').click(function () {
        slideRight();
        pause();
        play=true;
    });

    $("body").keydown(function(e) {
      if(e.keyCode == 37) {     //left keypress
        pause();
        slideLeft();
      }
      else if(e.keyCode == 39) { // right keypress
        pause();
        slideRight();
      }else if (e.keyCode === 0 || e.keyCode === 32) {
        e.preventDefault()
        if(spacePressed){
            spacePressed=false;
            start();
        }else if(!spacePressed){
            spacePressed=true;
            pause();
        }
        
  }
    });

    var paginationClick = $('#pagination ul li');
    $('#pagination ul li').click(function(){
        
        var selected =$('#select ul li.selected').index();
        var clickedIndex = $(this).index();
        if(clickedIndex < selected){
            while(clickedIndex != selected){
                selected--;
                zoomRight();
            }
        }if(clickedIndex > selected){
            while(clickedIndex != selected){
                selected++
                zoomLeft();
            }
        }
        pause(); 
        start();
    });



    window.onresize = function(){
        slideWidth = window.innerWidth-17; 
        $('#slider ul li img').css({width: slideWidth});
        $('#slider').css({ width: slideWidth, height: slideHeight });
         $('#slider ul').css({ width: sliderWidth, marginLeft: - slideWidth });
    }

});    
