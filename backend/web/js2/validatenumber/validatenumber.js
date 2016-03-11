function validatenumber(id){
	 $('#'+id).keypress(function(e) {
            var verified = (e.which == 8 || e.which == undefined || e.which == 0) ? null : String.fromCharCode(e.which).match(/[^0-9]/);
            if (verified) {
            	e.preventDefault(); 
            	alert('Vui lòng nhập số');
            }
    });
}