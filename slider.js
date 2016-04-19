jQuery(document).ready(function ($) {
    var slideCount = $('#slider ul li').length;
    //var slideWidth = $('#slider ul li').width();
    var slideWidth = window.innerWidth-17;
    $('#slider ul li img').css({width: slideWidth});
    var slideHeight = $('#slider ul li').height();
    var sliderWidth = slideCount * slideWidth;

    $('#slider').css({ width: slideWidth, height: slideHeight });

    $('#slider ul').css({ width: sliderWidth, marginLeft: - slideWidth });

    $('#slider ul li:last-child').prependTo('#slider ul');

var interval;
var play = false;
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
        var $currentActive = $('#select .selected');
        var $nextActive = $('#select .selected').next();
        $currentActive.removeClass('selected');
        if(!$nextActive.length) {
           $('#select li').first().addClass('selected');
        } else {
          $nextActive.addClass('selected');
      }
    };

    function slideLeft() {
        $('#slider ul').animate({
            left: - slideWidth
        }, 250, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
        var $currentActive = $('#select .selected');
        var $nextActive = $('#select .selected').prev();
        $currentActive.removeClass('selected');
        if(!$nextActive.length) {
           $('#select li').last().addClass('selected');
        } else {
          $nextActive.addClass('selected');
        }

    };

    function zoomLeft() {//slides left with no animation time
        $('#slider ul').animate({
            left: - slideWidth
        }, 0, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };////////////////////////////

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

    function pagination(){
        for(var i=0;i<2;i++){
            zoomRight();
       }

    }

      $('#pagination').click(function(){pagination();});

    window.onresize = function(){
        slideWidth = window.innerWidth-17;
        $('#slider ul li img').css({width: slideWidth});
$('#slider').css({ width: slideWidth, height: slideHeight });
 $('#slider ul').css({ width: sliderWidth, marginLeft: - slideWidth });

    }

});
