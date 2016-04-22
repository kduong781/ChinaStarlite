function autoFormAdvance(afterNumChars,currentFormId,nextFormId) {
	if(document.getElementById(currentFormId).value.length==afterNumChars) {
		document.getElementById(nextFormId).focus();
	}
}

var dateFields = document.getElementsByClass('autoAdvance');

dateFields[0].onkeyup = function(2,){

}



/*    $(document).on('keyup', '.autoAdvance', function (){
                alert("hi");
               }*/

