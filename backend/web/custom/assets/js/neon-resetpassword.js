var neonResetPassword = neonResetPassword || {};
var baseurl = '';
;(function($, window, undefined)
{
	"use strict";
	
	$(document).ready(function()
	{
		neonResetPassword.$container = $("#form_reset_password");
		neonResetPassword.$steps = neonResetPassword.$container.find(".form-steps");
		neonResetPassword.$steps_list = neonResetPassword.$steps.find(".step");
		neonResetPassword.step = 'step-1'; // current step
		neonResetPassword.$container.validate({
			rules: {
				new_password: {
					required: true,
				},
				confirm_password: {
					required: true,
					equalTo: "#new_password"
				}
			},
			
			messages: {
				new_password: {
					required: 'Vui lòng nhập giá trị.',
				},
				confirm_password: {
					required: 'Vui lòng nhập giá trị.',
					equalTo: 'Vui lòng nhập lại mật khẩu',
				}
			},
			
			highlight: function(element){
				$(element).closest('.input-group').addClass('validate-has-error');
			},
			unhighlight: function(element)
			{
				$(element).closest('.input-group').removeClass('validate-has-error');
			},
			
			submitHandler: function(ev)
			{
				$(".login-page").addClass('logging-in');
				neonResetPassword.setPercentage(30, function()
				{
					neonResetPassword.setPercentage(98, function()
					{
						$.ajax({
							url: baseurl + 'resetpassword',
							method: 'POST',
							data: {
								token: $("input#token").val(),
								password: $("input#confirm_password").val(),
							},
							error: function()
							{
								alert("An error occoured!");
							},
							success: function(result)
							{
								neonResetPassword.setPercentage(100);
								if(result == 'success'){
									setTimeout(function()
									{
										$(".login-page .login-header .description").slideUp();
										neonResetPassword.$steps.slideUp('normal', function()
										{
											$(".form-login-error").hide();
											$(".login-page").removeClass('logging-in');
											$(".form-forgotpassword-success").slideDown('normal');
										});
									}, 1000);
								}else{
									setTimeout(function()
									{
										$(".login-page .login-header .description").slideUp();
										neonResetPassword.$steps.slideUp('normal', function()
										{
											$(".login-page").removeClass('logging-in');
											$(".form-login-error").slideDown('normal');
											$(".form-steps").slideDown('normal');
										});
									}, 1000);
								}
							}
						});
					});
				});
			}
		});
	
		// Steps Handler
		neonResetPassword.$steps.find('[data-step]').on('click', function(ev)
		{
			ev.preventDefault();
			
			var $current_step = neonResetPassword.$steps_list.filter('.current'),
				next_step = $(this).data('step'),
				validator = neonResetPassword.$container.data('validator'),
				errors = 0;
			
			neonResetPassword.$container.valid();
			errors = validator.numberOfInvalids();
			
			if(errors)
			{
				validator.focusInvalid();
			}
			else
			{
				var $next_step = neonResetPassword.$steps_list.filter('#' + next_step),
					$other_steps = neonResetPassword.$steps_list.not( $next_step ),
					
					current_step_height = $current_step.data('height'),
					next_step_height = $next_step.data('height');
				
				TweenMax.set(neonResetPassword.$steps, {css: {height: current_step_height}});
				TweenMax.to(neonResetPassword.$steps, 0.6, {css: {height: next_step_height}});
				
				TweenMax.to($current_step, .3, {css: {autoAlpha: 0}, onComplete: function()
				{
					$current_step.attr('style', '').removeClass('current');
					
					var $form_elements = $next_step.find('.form-group');
					
					TweenMax.set($form_elements, {css: {autoAlpha: 0}});
					$next_step.addClass('current');
					
					$form_elements.each(function(i, el)
					{
						var $form_element = $(el);
						
						TweenMax.to($form_element, .2, {css: {autoAlpha: 1}, delay: i * .09});
					});
					
					setTimeout(function()
					{
						$form_elements.add($next_step).add($next_step).attr('style', '');
						$form_elements.first().find('input').focus();
						
					}, 1000 * (.5 + ($form_elements.length - 1) * .09));
				}});
			}
		});
		
		neonResetPassword.$steps_list.each(function(i, el)
		{
			var $this = $(el),
				is_current = $this.hasClass('current'),
				margin = 20;
			
			if(is_current)
			{
				$this.data('height', $this.outerHeight() + margin);
			}
			else
			{
				$this.addClass('current').data('height', $this.outerHeight() + margin).removeClass('current');
			}
		});
		
		
		// Login Form Setup
		neonResetPassword.$body = $(".login-page");
		neonResetPassword.$login_progressbar_indicator = $(".login-progressbar-indicator h3");
		neonResetPassword.$login_progressbar = neonResetPassword.$body.find(".login-progressbar div");
		
		neonResetPassword.$login_progressbar_indicator.html('0%');
		
		if(neonResetPassword.$body.hasClass('login-form-fall'))
		{
			var focus_set = false;
			
			setTimeout(function(){ 
				neonResetPassword.$body.addClass('login-form-fall-init')
				
				setTimeout(function()
				{
					if( !focus_set)
					{
						neonResetPassword.$container.find('input:first').focus();
						focus_set = true;
					}
					
				}, 550);
				
			}, 0);
		}
		else
		{
			neonResetPassword.$container.find('input:first').focus();
		}
		
		
		// Functions
		$.extend(neonResetPassword, {
			setPercentage: function(pct, callback)
			{
				pct = parseInt(pct / 100 * 100, 10) + '%';
				
				// Normal Login
				neonResetPassword.$login_progressbar_indicator.html(pct);
				neonResetPassword.$login_progressbar.width(pct);
				
				var o = {
					pct: parseInt(neonResetPassword.$login_progressbar.width() / neonResetPassword.$login_progressbar.parent().width() * 100, 10)
				};
				
				TweenMax.to(o, .7, {
					pct: parseInt(pct, 10),
					roundProps: ["pct"],
					ease: Sine.easeOut,
					onUpdate: function()
					{
						neonResetPassword.$login_progressbar_indicator.html(o.pct + '%');
					},
					onComplete: callback
				});
			}
		});
	});
	
})(jQuery, window);