$(function(){
	var base = $("#base").val();
	$("#btn_result_year").click(function(){

		var year_male = $('#year_age_male').val();
		var year_female = $('#year_age_female').val();
		location.href = base + "/wedding/detail?yearmale=" + year_male + "&male=true&yearfemale=" + year_female 
		+ "&female=true";
	})
})