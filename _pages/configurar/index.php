<?php
$page_title = 'Configurar constantes';
$js[] = JS_URL . 'ajaxForm.js';

?>
<?php require LAYOUT_PATH . 'dtd.php'; ?>
<html>
	<head>
<?php require LAYOUT_PATH . 'head_tag.php'; ?>
	</head>
	<body>
<?php require LAYOUT_PATH . 'header.php'; ?>

<form class="formatted ajax_form" method="post" action="<?php echo htmlspecialchars(a_configurar::url_salvar()); ?>">
	<fieldset>
	
		<div class="form_line">
			<label>braço (m):</label>
			<input class="in_string" type="text" size="10" name="dados_braco" value="<?php echo a_configurar::$DADOS_BRACO; ?>" />
		</div>
		
		<div class="form_line">
			<label>Fator de correção da força:</label>
			<input class="in_string" type="text" size="10" name="fator_correcao" value="<?php echo a_configurar::$FATOR_CORRECAO; ?>" />
		</div>
		
		<div class="form_line">
			<div id="ajax_target"></div>
		</div>
		
		<div class="form_line">
			<input type="submit" value="Enviar" />
		</div>

	</fieldset>
	<div class="clear"></div>
</form>
		
<?php require LAYOUT_PATH . 'footer.php'; ?>
	</body>
</html>