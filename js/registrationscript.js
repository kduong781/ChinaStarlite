function autoFormAdvance(afterNumChars,currentFormId,nextFormId) {
	if(document.getElementById(currentFormId).value.length==afterNumChars) {
		document.getElementById(nextFormId).focus();
	}
}

var $dateFields = document.getElementsByClassName('autoAdvance');

$dateFields[0].onkeyup = function(){
	autoFormAdvance(2,'registermonth','registerday');
}

$dateFields[1].onkeyup = function(){
	autoFormAdvance(2,'registerday','registeryear');
}