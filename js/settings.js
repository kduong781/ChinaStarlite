var settingsButton = document.getElementsByClassName('settings')[0];
var settingsContent = document.getElementById('settingsContent');
/*var usernameBox = document.getElementById('userNameBox');
var passwordBox = document.getElementById('passwordBox');
var deactivateBox = document.getElementById('deactivateBox');*/
var changeusername = document.getElementById('changeusername');
var changepassword= document.getElementById('changepassword');
var deactivateaccount= document.getElementById('deactivateaccount');
var usernameunderline= document.getElementById('usernameunderline');
var passwordunderline= document.getElementById('passwordunderline');
var deactivateunderline= document.getElementById('deactivateunderline');
var newusernameform = document.getElementById('newusernameform');
var newpasswordform = document.getElementById('newpasswordform'); 
var deactivateform = document.getElementById('deactivateform');



var maxHeight = 320;
var minHeight = 0;
//shows target
function slideDown(element,collapsedHeight) {
  var time = setInterval(frame, 10);
  var height = collapsedHeight;
  function frame() {
    if (height >= maxHeight) {
      clearInterval(time);//stops time
    } else {
      height+=20;   //slider moves in increments of 20
      element.style.height = height + "px"; 
    }
  }
}

//hides target
function slideUp(element,expandedHeight) {
  var time = setInterval(frame, 10);
  var height = expandedHeight;
  function frame() {
    if (height <= 0) {
      clearInterval(time);//stops time
    } else {
      height-=20; //slider moves in decrements of 20
      element.style.height = height + "px"; 
    }
  }
}

//hide featured items
function slideSettingsUp(){
   slideUp(settingsContent,maxHeight);
   settingsContent.style.border = 'none';
}

//shows featured items
function slideSettingsDown(){
  slideDown(settingsContent,minHeight);
  settingsContent.style.border = '1px solid black';
}

settingsButton.onclick = function(){
  var nav = document.getElementsByTagName("nav")[0];
  var navPlacement = document.getElementById('navPlacement');
  nav.className="smaller";
  navPlacement.style.height=nav.clientHeight;
  //alert(settingsContent.clientHeight);
  if(settingsContent.clientHeight==0){
    slideSettingsDown();
  }else{
    slideSettingsUp();
  }
}

changeusername.onclick = function(){
  usernameunderline.style.borderBottom ='3px solid black';
  deactivateunderline.style.border = 'none';
  passwordunderline.style.border = 'none';

  newusernameform.style.display = 'block';
  newpasswordform.style.display = 'none';
  deactivateform.style.display = 'none';
}

changepassword.onclick = function(){
  passwordunderline.style.borderBottom ='3px solid black';
  deactivateunderline.style.border = 'none';
  usernameunderline.style.border = 'none';

newusernameform.style.display = 'none';
newpasswordform.style.display = 'block';
deactivateform.style.display = 'none';
}

deactivateaccount.onclick = function(){
  deactivateunderline.style.borderBottom ='3px solid black';
  usernameunderline.style.border = 'none';
  passwordunderline.style.border = 'none';

newusernameform.style.display = 'none';
newpasswordform.style.display = 'none';
deactivateform.style.display = 'block';
}

window.onload = function(){
  settingsContent.style.height = 0;
  settingsContent.style.border = 'none';
  usernameunderline.style.borderBottom ='3px solid black';

  deactivateunderline.style.display = 'inline-block';
 passwordunderline.style.display = 'inline-block';
  usernameunderline.style.display ='inline-block';

  deactivateunderline.style.float= 'left';
  passwordunderline.style.float= 'left';
  usernameunderline.style.float ='left';

  deactivateunderline.style.paddingBottom= '0.3em';
  passwordunderline.style.paddingBottom= '0.3em';
  usernameunderline.style.paddingBottom ='0.3em';

  newusernameform.style.display = 'block';
  newpasswordform.style.display = 'none';
  deactivateform.style.display = 'none';



}