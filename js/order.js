$(document).ready(function() {

  $("#ChickenTab").click(function(){
    $("#ChickenTab").removeClass("active");
    $("#BeefTab").removeClass("active");
    $("#PorkTab").removeClass("active");
    $("#DrinksTab").removeClass("active");
    $("#SeafoodTab").removeClass("active");
    $("#SoupTab").removeClass("active");
    $("#AppetizerTab").removeClass("active");
    $("#viewTab").removeClass("active");
    $("#Chicken").addClass("active");
    var content = $("#Chicken").html();
    $(".content").replaceWith('<div class="content">'+ content +'</div>');
  });

  $("#BeefTab").click(function(){
    $("#ChickenTab").removeClass("active");
    $("#BeefTab").removeClass("active");
    $("#PorkTab").removeClass("active");
    $("#DrinksTab").removeClass("active");
    $("#SeafoodTab").removeClass("active");
    $("#SoupTab").removeClass("active");
    $("#AppetizerTab").removeClass("active");
    $("#viewTab").removeClass("active");
    $("#BeefTab").addClass("active");
    var content = $("#Beef").html();
    $(".content").replaceWith('<div class="content">'+ content +'</div>');
  });

  $("#PorkTab").click(function(){
    $("#ChickenTab").removeClass("active");
    $("#BeefTab").removeClass("active");
    $("#PorkTab").removeClass("active");
    $("#DrinksTab").removeClass("active");
    $("#SeafoodTab").removeClass("active");
    $("#SoupTab").removeClass("active");
    $("#AppetizerTab").removeClass("active");
    $("#viewTab").removeClass("active");
    $("#PorkTab").addClass("active");
    var content = $("#Pork").html();
    $(".content").replaceWith('<div class="content">'+ content +'</div>');
  });

  $("#DrinksTab").click(function(){
    $("#ChickenTab").removeClass("active");
    $("#BeefTab").removeClass("active");
    $("#PorkTab").removeClass("active");
    $("#DrinksTab").removeClass("active");
    $("#SeafoodTab").removeClass("active");
    $("#SoupTab").removeClass("active");
    $("#AppetizerTab").removeClass("active");
    $("#viewTab").removeClass("active");
    $("#DrinksTab").addClass("active");
    var content = $("#Drinks").html();
    $(".content").replaceWith('<div class="content">'+ content +'</div>');
  });

  $("#SeafoodTab").click(function(){
    $("#ChickenTab").removeClass("active");
    $("#BeefTab").removeClass("active");
    $("#PorkTab").removeClass("active");
    $("#DrinksTab").removeClass("active");
    $("#SeafoodTab").removeClass("active");
    $("#SoupTab").removeClass("active");
    $("#AppetizerTab").removeClass("active");
    $("#viewTab").removeClass("active");
    $("#SeafoodTab").addClass("active");
    var content = $("#Seafood").html();
    $(".content").replaceWith('<div class="content">'+ content +'</div>');
  });

  $("#SoupTab").click(function(){
    $("#ChickenTab").removeClass("active");
    $("#BeefTab").removeClass("active");
    $("#PorkTab").removeClass("active");
    $("#DrinksTab").removeClass("active");
    $("#SeafoodTab").removeClass("active");
    $("#SoupTab").removeClass("active");
    $("#AppetizerTab").removeClass("active");
    $("#viewTab").removeClass("active");
    $("#SoupTab").addClass("active");
    var content = $("#Soup").html();
    $(".content").replaceWith('<div class="content">'+ content +'</div>');
  });

  $("#AppetizerTab").click(function(){
    $("#ChickenTab").removeClass("active");
    $("#BeefTab").removeClass("active");
    $("#PorkTab").removeClass("active");
    $("#DrinksTab").removeClass("active");
    $("#SeafoodTab").removeClass("active");
    $("#SoupTab").removeClass("active");
    $("#AppetizerTab").removeClass("active");
    $("#viewTab").removeClass("active");
    $("#AppetizerTab").addClass("active");
    var content = $("#Appetizer").html();
    $(".content").replaceWith('<div class="content">'+ content +'</div>');
  });

  $("#viewTab").click(function(){
    $("#ChickenTab").removeClass("active");
    $("#BeefTab").removeClass("active");
    $("#PorkTab").removeClass("active");
    $("#DrinksTab").removeClass("active");
    $("#SeafoodTab").removeClass("active");
    $("#SoupTab").removeClass("active");
    $("#AppetizerTab").removeClass("active");
    $("#viewTab").removeClass("active");
    $("#viewTab").addClass("active");
    var chicken = $("#Chicken").html();
    var beef = $("#Beef").html();
    var pork = $("#Pork").html();
    var drink = $("#Drinks").html();
    var seafood = $("#Seafood").html();
    var soup = $("#Soup").html();
    var appetizer = $("#Appetizer").html();
    var content = chicken + beef + pork + drink + seafood + soup + appetizer;

    $(".content").replaceWith('<div class="content">'+ content +'</div>');
  });

  function addItem($name, $price) {

  }

});
