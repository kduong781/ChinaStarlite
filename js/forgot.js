	var modalBackground = document.getElementById('modal_background');
	var modalWindow = document.getElementById('modal_window');
	var modalClose = document.getElementById('modal_close');
	var forgotButton = document.getElementsByName('forgot')[0];

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

