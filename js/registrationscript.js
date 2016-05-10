/**
*Author: Mingtau Li
*Description: custom scripts to handle user registration input
*Functionalities: automatically adds dashes to phone numbers, automatically advances to next date field
*/
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


 	jQuery('input[name="registerphone"]').bind('keyup',function(event){//formats registration phone number
    var key = event.keyCode || event.charCode;
    if (key == 8 || key == 46) return false;
    	var strokes = $(this).val().length;
    if(strokes === 3 || strokes === 7){
        var thisVal = $(this).val();
        thisVal += '-';
        $(this).val(thisVal);
    }
});