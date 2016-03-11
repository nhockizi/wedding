$(document).ready(function() {
    $(".table-product .btn-delete").click(function(){
    	$(this).parent().parent().parent().hide();
    	$(this).parent().parent().parent().find('.input_delete').val('1');
    })
    $('.quantity').keyup(function(){
		var input = $(this).val();
		$(this).val(input.replace(/[^0-9]+/g, ''))
		var quantity = $(this).val().replace(/,/g, "");
		if(quantity == ''){
			quantity = 0;
		}
		var price = $(this).parent().parent().find('.price').val().replace(/,/g, "");
		var total_price = $(this).parent().parent().find('.total_price').val();
		if(quantity != 0){
			$(this).parent().parent().find('.price').prop('disabled', false);
			if(price != 0 && price != ''){
				var total = quantity * price;
				$(this).parent().parent().find('.total_price').val(total);
			}
		}else{
			$(this).parent().parent().find('.price').val('');
			$(this).parent().parent().find('.price').prop('disabled', true);
			$(this).parent().parent().find('.total_price').val('');
		}
		CountTotal()
    })
    $('.price').keyup(function(){
		var input = $(this).val();
		$(this).val(input.replace(/[^0-9]+/g, ''))
		var price = $(this).val().replace(/,/g, "");
		if(price == ''){
			price = 0;
		}
		var quantity = $(this).parent().parent().find('.quantity').val().replace(/,/g, "");
		var total_price = $(this).parent().parent().find('.total_price').val();
		if(price != 0 && price != ''){
			if(quantity != 0 && quantity != ''){
				var total = quantity * price;
				$(this).parent().parent().find('.total_price').val(total);
			}
		}else{
			$(this).parent().parent().find('.total_price').val('');
		}
		CountTotal()
    })
    $(".select-product").select2({
        width: '100%',
        ajax: {
            url: "../contract/load-product",
            dataType: 'json',
            delay: 0,
            data: function (params) {
                return {
                    q: params.term,
                    page: params.page
                };
            },
            processResults: function (data, params) {
                params.page = params.page || 1;
                return {
                    results: data.items,
                    pagination: {
                        more: (params.page * 20) < data.total_count
                    }
                };
            },
            cache: true,
        },
        escapeMarkup: function (markup) { return markup; },
        templateResult: formatRepo,
        templateSelection: templateSelection
    });
    $(".select-material").select2({
        width: '100%',
        ajax: {
            url: "../contract/load-material",
            dataType: 'json',
            delay: 0,
            data: function (params) {
                return {
                    q: params.term,
                    page: params.page
                };
            },
            processResults: function (data, params) {
                params.page = params.page || 1;
                return {
                    results: data.items,
                    pagination: {
                        more: (params.page * 20) < data.total_count
                    }
                };
            },
            cache: true,
        },
        escapeMarkup: function (markup) { return markup; },
        templateResult: formatRepo,
        templateSelection: templateSelection
    });
    function templateSelection(repo){
        if(typeof repo.name =='undefined'){
            repo.name = repo.text;
        }
        return repo.name;
    }
    function formatRepo (repo) {
        if(typeof repo.name !='undefined'){
            var markup = "<div class='select2-result-repository clearfix'>" +
                  "<div class='select2-result-repository__title'>" + repo.name + "</div>";
            return markup;
        }
    }
});
function CountTotal(){
	var total_contract = 0;
	$('.total_contract').each(function(){
		if($(this).val() != ''){
	    	total_contract += parseFloat($(this).val().replace(/,/g, ""));
		}
	});
	if(total_contract == 0){
		total_contract = '';
	}
    $("#total_contract").val(total_contract);
    $("#total_price_contract").val(total_contract);
}