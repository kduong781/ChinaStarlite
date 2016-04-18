jQuery(document).ready(function ($) {

var interval;
var play = false;
start();//start playing in beginning

function start(){
    interval = setInterval(function(){slideRight()}, 3000);
 $('#toggle').removeClass('play').addClass('pause');
}
 
 function pause(){
        clearInterval(interval);
$('#toggle').removeClass('pause').addClass('play');

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

    var slideCount = $('#slider ul li').length;
    //var slideWidth = $('#slider ul li').width();
    var slideWidth = window.innerWidth-17; 
    $('#slider ul li img').css({width: slideWidth});
       //var slideWidth = window.innerWidth;  //custom
    var slideHeight = $('#slider ul li').height();
    var sliderWidth = slideCount * slideWidth;
                    
    $('#slider').css({ width: slideWidth, height: slideHeight });
                    
    $('#slider ul').css({ width: sliderWidth, marginLeft: - slideWidth });
                    
    $('#slider ul li:last-child').prependTo('#slider ul');
    $('#slider ul li:first-child').appendTo('#slider ul');




    function slideLeft() {
        $('#slider ul').animate({
            left: + slideWidth
        }, 250, function () {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    function slideRight() {
        $('#slider ul').animate({
            left: - slideWidth
        }, 250, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    $('.control_prev').click(function () {
        slideRight();
        pause();
        play=true;
    });

    $('.control_next').click(function () {
        slideLeft();
        pause();
        play=true;
    });

    window.onresize = function(){
        slideWidth = window.innerWidth-17; 
        $('#slider ul li img').css({width: slideWidth});
$('#slider').css({ width: slideWidth, height: slideHeight });
 $('#slider ul').css({ width: sliderWidth, marginLeft: - slideWidth });
                    
    $('#slider ul li:last-child').prependTo('#slider ul');
    $('#slider ul li:first-child').appendTo('#slider ul');
    }

});    
