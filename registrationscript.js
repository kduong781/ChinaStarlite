	jQuery('input[name="dob"]').bind('keyup',function(event){//formats the date
    var key = event.keyCode || event.charCode;
    if (key == 8 || key == 46) return false;
    var strokes = $(this).val().length;
    if(strokes === 2 || strokes === 5){
        var thisVal = $(this).val();
        thisVal += '/';
        $(this).val(thisVal);
    }
});