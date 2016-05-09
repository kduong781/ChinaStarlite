	var modalBackground = document.getElementById('modal_background');
	var modalWindow = document.getElementById('modal_window');
	var modalClose = document.getElementById('modal_close');
	var forgotButton = document.getElementsByName('forgot')[0];
	var modalFeedback = document.getElementById('modal_feedback');
	var forgotemail = document.getElementById('forgotemail');
	var forgotemailmessage = document.getElementById('forgotemailmessage');

function showModal(){
	modalBackground.style.display="block";
	modalWindow.style.display ="block";	
}

function hideModal(){
	modalBackground.style.display="none";
	modalWindow.style.display ="none";	
}

forgotButton.onclick = function(e){
	e.preventDefault();
	showModal();
	var nav = document.getElementsByTagName("nav")[0];
	var navPlacement = document.getElementById('navPlacement');
	 nav.className="smaller";
     navPlacement.style.height=nav.clientHeight;
}
	
modalClose.onclick = function(e){
	e.preventDefault();
	hideModal();
}

modalBackground.onclick = function(e){
	if(e.target.id == 'modal_background'){
		hideModal();
	}
}

forgotemail.onkeyup = function(){
	forgotemailmessage.innerHTML = '';
}

modalFeedback.onsubmit = function(e){
	if(forgotemail.value.trim() == ''){
		e.preventDefault();
		forgotemailmessage.innerHTML = 'Please enter your email address';
	}
	var emailpat = new RegExp("^(.+)@([^\.].*)\.([a-z]{2,})$");
	if(!emailpat.test(forgotemail.value.trim())){
		e.preventDefault();
		forgotemailmessage.innerHTML = 'Please enter a valid email address';
	}

}