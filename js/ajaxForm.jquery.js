(function($){
	var defaultConfig = {
		submitSelector: 'input[type="submit"]',
		targetSelector: '#ajax_target',
		responsePrefix: '',
		responseSuffix: '',
		loadingHtml: 'Carregando...'
	};
	
	$.fn.ajaxForm = function(customConfig){
		var $form = this;
		
		var config = $.extend({}, defaultConfig, customConfig);
		
		$form.submit(function(e){
			e.preventDefault();
			
			var $submit_btn = $(e.target).find(config.submitSelector).attr('disabled', 'disabled');
			
			var $target = $(config.targetSelector).html(config.loadingHtml);
			
			var request = $.post($form.attr('action'), $(e.target).serializeArray());
			
			request.always(function(data){
				$target.html(config.responsePrefix + data + config.responseSuffix);
				$submit_btn.removeAttr('disabled');
			});
		});
	};

})(jQuery);

