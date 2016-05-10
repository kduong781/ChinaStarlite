/*Borrowed FROM W3SCHOOLS*/
/**
*Author: Kevin Duong
*Description: modal and cart javascript functionality
*/
// Get the modal
var modal = document.getElementById('myModal');
var subTotal = document.getElementById('subTotal');
var tax = document.getElementById('tax');
var total = document.getElementById('total');
var nSub = 0; //subTotal
var nTax = 0; //tax
var nTotal = 0; // total

var listNumber = 0;
// Get the button that opens the modal

// Get the <span> element that closes the modal

function openModal(x) {
  var nav = document.getElementsByTagName("nav")[0];
	var navPlacement = document.getElementById('navPlacement');
	 nav.className="smaller";
     navPlacement.style.height=nav.clientHeight;
  var btn = document.getElementById("modal-".concat(x));
  modal = btn;
  btn.style.display = "block";
}

function closeModal(x) {
  var btn = document.getElementById("modal-".concat(x));
  btn.style.display = "none";
}

function addItem(name, price, id, menuid) {
   var re = /^[1-9]{1}[0-9]{0,1}$/;
   var cartList = document.getElementById("cartList");
   var li = document.createElement('li');
   var quantity = document.getElementById(id).value;
   if(re.test(quantity)) {
     price = price * quantity;
     li.innerHTML = "<button class='remove' onclick='removeItem("+listNumber+","+price +")'>Remove</button>" + "x" + quantity + " " + name  + " <span class='price'>$" + parseFloat(price).toFixed(2) + "</span>"
      + "<input type='hidden' name='" + listNumber+ "'value='" + menuid + quantity + "'></input>";
     li.id = listNumber;
     listNumber++;
     cartList.parentNode.insertBefore(li,cartList);
     modal.style.display = "none";
     nSub = nSub + price;
     subTotal.innerHTML = "$" + parseFloat(nSub).toFixed(2);
     nTax = nSub * .0875;
     tax.innerHTML = "$" + parseFloat(nTax).toFixed(2);
     nTotal = nSub + nTax;
     total.innerHTML = "$" + parseFloat(nTotal).toFixed(2);
   }
}

function removeItem(x,price) {
		document.getElementById(x).remove();
    nSub = nSub - price;
    subTotal.innerHTML = "$" + parseFloat(nSub).toFixed(2);
    nTax = nSub * .0875;
    tax.innerHTML = "$" + parseFloat(nTax).toFixed(2);
    nTotal = nSub + nTax;
    total.innerHTML = "$" + parseFloat(nTotal).toFixed(2);
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
// When the user clicks the button, open the modal
/*
btn.onclick = function() {
    modal.style.display = "block";
}*/

// When the user clicks on <span> (x), close the modal


// When the user clicks anywhere outside of the modal, close it
