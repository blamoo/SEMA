$(document).ready(function()
{
	$('a[title]').qtip({
		position: {
			viewport: $(window),
			my: 'top center',
			at: 'bottom center'
		},
		style: {
		classes: 'ui-tooltip-bootstrap'
		}
	});	
});