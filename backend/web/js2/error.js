$(document).ready(function() {
    $("input").keypress(function(){
    	var check = $(this).val();
    	if(check.replace(/\s/g, '') == ''){
    		$(this).addClass('error');
    	}else{
    		$(this).removeClass('error');
    	}
    });
});