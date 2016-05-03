$(document).ready(function() {
$("#lunchTab").click(function(){
  var content = $("lunch").html();
  $(".content").replaceWith('<div class="content">'+ content +'</div>');
});
$("#dinnerTab").click(function(){
  var content = $("dinner").html();
    $(".content").replaceWith('<div class="content">'+ content +'</div>');
});
$("#appetizerTab").click(function(){
    var content = $("appetizer").html();
    $(".content").replaceWith('<div class="content">'+ content +'</div>');
});
});
