$(document).ready(function() {
$("#lunchTab").click(function(){
  $("#lunchTab").removeClass("active");
  $("#dinnerTab").removeClass("active");
  $("#appetizerTab").removeClass("active");
  $("#lunchTab").addClass("active");
  var content = $("#lunch").html();
  $(".content").replaceWith('<div class="content">'+ content +'</div>');
});
$("#dinnerTab").click(function(){
  $("#lunchTab").removeClass("active");
  $("#dinnerTab").removeClass("active");
  $("#appetizerTab").removeClass("active");
  $("#dinnerTab").addClass("active");
  var content = $("#dinner").html();
    $(".content").replaceWith('<div class="content">'+ content +'</div>');
});
$("#appetizerTab").click(function(){
    $("#lunchTab").removeClass("active");
    $("#dinnerTab").removeClass("active");
    $("#appetizerTab").removeClass("active");
    $("#appetizerTab").addClass("active");
    var content = $("#appetizer").html();
    $(".content").replaceWith('<div class="content">'+ content +'</div>');
});
});
