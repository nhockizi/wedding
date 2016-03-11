function blockUI(){
    $.blockUI({
        message : '<i class="fa fa-spinner fa-spin"></i> Đang kiểm tra dữ liệu',
        // css: {
        //     border: 'none',
        //     padding: '15px',
        //     backgroundColor: '#000',
        //     '-webkit-border-radius': '10px',
        //     '-moz-border-radius': '10px',
        //     opacity: 0.5,
        //     color: '#fff'
        // },
        // baseZ: 9999
    });
}
function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test($email);
}
$(document).ready(function () {
    $('.datepicker').datepicker({
        autoclose: true,
        format:'dd-mm-yyyy'
    });
    $('.number').keyup(function (e) {
        var value = $(this).val();
        value = value.replace(/[^0-9 .]+/g, '');
        $(this).val(value);
    });
    if($.isFunction($.fn.select2))
	{
		$(".select").each(function(i, el)
		{
			var $this = $(el),
				opts = {
					allowClear: attrDefault($this, 'allowClear', false),
					minimumResultsForSearch: attrDefault($this, 'minimumResultsForSearch', 'Infinity'),
					width: attrDefault($this, 'width', '100%'),
				};
			$this.select2(opts);
		});
		$(".select-search").each(function(i, el)
		{
			var $this = $(el),
				opts = {
					allowClear: attrDefault($this, 'allowClear', false),
					width: attrDefault($this, 'width', '100%'),
				};
			$this.select2(opts);
		});

		if($.isFunction($.fn.niceScroll))
		{
			$(".select2-results").niceScroll({
				cursorcolor: '#d4d4d4',
				cursorborder: '1px solid #ccc',
				railpadding: {right: 3}
			});
		}
	}
	if($.isFunction($.fn.inputmask))
	{
		$("[data-mask]").each(function(i, el)
		{
			var $this = $(el),
				mask = $this.data('mask').toString(),
				opts = {
					numericInput: attrDefault($this, 'numeric', false),
					radixPoint: attrDefault($this, 'radixPoint', ''),
					rightAlignNumerics: attrDefault($this, 'numericAlign', 'left') == 'right'
				},
				placeholder = attrDefault($this, 'placeholder', ''),
				is_regex = attrDefault($this, 'isRegex', '');
			
				
			if(placeholder.length)
			{
				opts[placeholder] = placeholder;
			}
			
			switch(mask.toLowerCase())
			{
				case "phone":
					mask = "(999) 999-999-9999";
					break;
					
				case "currency":
				case "rcurrency":
					var sign = attrDefault($this, 'sign', '$');;
					
					mask = "999,999,999.99";
					
					if($this.data('mask').toLowerCase() == 'rcurrency')
					{
						mask += ' ' + sign;
					}
					else
					{
						mask = sign + ' ' + mask;
					}
					
					opts.numericInput = true;
					opts.rightAlignNumerics = false;
					opts.radixPoint = '.';
					break;
					
				case "email":
					mask = 'Regex';
					opts.regex = "[a-zA-Z0-9._%-]+@[a-zA-Z0-9-]+\\.[a-zA-Z]{2,4}";
					break;
				
				case "fdecimal":
					mask = 'decimal';
					$.extend(opts, {
						autoGroup		: true,
						groupSize		: 3,
						radixPoint		: attrDefault($this, 'rad', '.'),
						groupSeparator	: attrDefault($this, 'dec', ',')
					});
			}
			
			if(is_regex)
			{
				opts.regex = mask;
				mask = 'Regex';
			}
			
			$this.inputmask(mask, opts);
		});
	}
	$(".input-spinner").each(function(i, el)
	{
		var $this = $(el),
			$minus = $this.find('button:first'),
			$plus = $this.find('button:last'),
			$input = $this.find('input'),
			
			minus_step = attrDefault($minus, 'step', -1),
			plus_step = attrDefault($minus, 'step', 1),
			
			min = attrDefault($input, 'min', null),
			max = attrDefault($input, 'max', null);
			
		
		$this.find('button').on('click', function(ev)
		{
			ev.preventDefault();
			
			var $this = $(this),
				val = $input.val(),
				step = attrDefault($this, 'step', $this[0] == $minus[0] ? -1 : 1);
			
			if( ! step.toString().match(/^[0-9-\.]+$/))
			{
				step = $this[0] == $minus[0] ? -1 : 1;
			}
			
			if( ! val.toString().match(/^[0-9-\.]+$/))
			{
				val = 0;
			}
			
			$input.val( parseFloat(val) + step ).trigger('keyup');
		});
		
		$input.keyup(function()
		{
			if(min != null && parseFloat($input.val()) < min)
			{
				$input.val(min);
			}
			else
			
			if(max != null && parseFloat($input.val()) > max)
			{
				$input.val(max);
			}
		});
		
	});
});
