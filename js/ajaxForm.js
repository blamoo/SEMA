$(document).ready(function(){
	
	$('form.ajax_form').ajaxForm({
		loadingHtml: '<div class="alert yellow"><img src="img/ajax-loader.gif" alt="*" /><br/>Carregando...</div>'
	});
	
});