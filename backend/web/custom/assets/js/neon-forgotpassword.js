var neonForgotPassword = neonForgotPassword || {};
var baseurl = '';
;(function($, window, undefined)
{
	"use strict";
	
	$(document).ready(function()
	{
		neonForgotPassword.$container = $("#form_forgot_password");
		neonForgotPassword.$steps = neonForgotPassword.$container.find(".form-steps");
		neonForgotPassword.$steps_list = neonForgotPassword.$steps.find(".step");
		neonForgotPassword.step = 'step-1'; // current step
		
				
		neonForgotPassword.$container.validate({
			rules: {
				
				email: {
					required: true,
					email: true
				}
			},
			
			messages: {
				
				email: {
					required: 'Vui lòng nhập giá trị.',
					email: 'E-mail không đúng định dạng.'
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
				neonForgotPassword.setPercentage(30, function()
				{
					neonForgotPassword.setPercentage(98, function()
					{
						$.ajax({
							url: baseurl + 'forgotpassword',
							method: 'POST',
							data: {
								email: $("input#email").val(),
							},
							error: function()
							{
								alert("An error occoured!");
							},
							success: function(result)
							{
								neonForgotPassword.setPercentage(100);
								if(result == 'success'){
									setTimeout(function()
									{
										$(".login-page .login-header .description").slideUp();
										neonForgotPassword.$steps.slideUp('normal', function()
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
										neonForgotPassword.$steps.slideUp('normal', function()
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
		neonForgotPassword.$steps.find('[data-step]').on('click', function(ev)
		{
			ev.preventDefault();
			
			var $current_step = neonForgotPassword.$steps_list.filter('.current'),
				next_step = $(this).data('step'),
				validator = neonForgotPassword.$container.data('validator'),
				errors = 0;
			
			neonForgotPassword.$container.valid();
			errors = validator.numberOfInvalids();
			
			if(errors)
			{
				validator.focusInvalid();
			}
			else
			{
				var $next_step = neonForgotPassword.$steps_list.filter('#' + next_step),
					$other_steps = neonForgotPassword.$steps_list.not( $next_step ),
					
					current_step_height = $current_step.data('height'),
					next_step_height = $next_step.data('height');
				
				TweenMax.set(neonForgotPassword.$steps, {css: {height: current_step_height}});
				TweenMax.to(neonForgotPassword.$steps, 0.6, {css: {height: next_step_height}});
				
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
		
		neonForgotPassword.$steps_list.each(function(i, el)
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
		neonForgotPassword.$body = $(".login-page");
		neonForgotPassword.$login_progressbar_indicator = $(".login-progressbar-indicator h3");
		neonForgotPassword.$login_progressbar = neonForgotPassword.$body.find(".login-progressbar div");
		
		neonForgotPassword.$login_progressbar_indicator.html('0%');
		
		if(neonForgotPassword.$body.hasClass('login-form-fall'))
		{
			var focus_set = false;
			
			setTimeout(function(){ 
				neonForgotPassword.$body.addClass('login-form-fall-init')
				
				setTimeout(function()
				{
					if( !focus_set)
					{
						neonForgotPassword.$container.find('input:first').focus();
						focus_set = true;
					}
					
				}, 550);
				
			}, 0);
		}
		else
		{
			neonForgotPassword.$container.find('input:first').focus();
		}
		
		
		// Functions
		$.extend(neonForgotPassword, {
			setPercentage: function(pct, callback)
			{
				pct = parseInt(pct / 100 * 100, 10) + '%';
				
				// Normal Login
				neonForgotPassword.$login_progressbar_indicator.html(pct);
				neonForgotPassword.$login_progressbar.width(pct);
				
				var o = {
					pct: parseInt(neonForgotPassword.$login_progressbar.width() / neonForgotPassword.$login_progressbar.parent().width() * 100, 10)
				};
				
				TweenMax.to(o, .7, {
					pct: parseInt(pct, 10),
					roundProps: ["pct"],
					ease: Sine.easeOut,
					onUpdate: function()
					{
						neonForgotPassword.$login_progressbar_indicator.html(o.pct + '%');
					},
					onComplete: callback
				});
			}
		});
	});
	
})(jQuery, window);