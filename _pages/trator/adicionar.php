<?php
$js[] = JS_URL . 'ajaxForm.js';

$id = safe($_GET['id']);

if ($id === null)
{
	$trator = new a_trator();
	
	$operacao = 'insert';
	
	$bc->add(a_trator::url_adicionar(), 'Adicionar');
	$page_title = 'Adicionar trator';
}
else
{
	$trator = a_trator::criar_por_id($id);

	if ($trator === null)
		return new a_http_erro(404);
	
	$operacao = 'update';
	
	$bc->add($trator->url_detalhes(), $trator->nome);
	$bc->add($trator->url_alterar(), 'Alterar');
	$page_title = 'Alterar trator';
}

?>
<?php require LAYOUT_PATH . 'dtd.php'; ?>
<html>
	<head>
<?php require LAYOUT_PATH . 'head_tag.php'; ?>
	</head>
	<body>
<?php require LAYOUT_PATH . 'header.php'; ?>

<form class="formatted ajax_form" method="post" action="<?php echo htmlspecialchars(a_trator::url_operacoes($operacao)); ?>">
	<fieldset>
		
		<input type="hidden" name="id" value="<?php echo $trator->id; ?>" />
		
		<div class="form_line">
			<label>Nome:</label>
			<input class="in_string" type="text" size="100" name="nome" value="<?php echo $trator->nome; ?>" />
		</div>
	
		<div class="form_line w_1_4">
			<label>Rotação nominal do motor:</label>
			<input class="in_int" type="text" name="rotacao_nominal_motor" value="<?php echo $trator->rotacao_nominal_motor; ?>" />
		</div>
		
		<div class="form_line w_1_4">
			<label>Rotação máxima livre:</label>
			<input class="in_int" type="text" name="rotacao_maxima_livre" value="<?php echo $trator->rotacao_maxima_livre; ?>" />
		</div>
		
		<div class="form_line w_1_4">
			<label>Relação de transmissão Motor/TDP:</label>
			<input class="in_float" type="text" name="relacao_transmissao_motor" value="<?php echo $trator->relacao_transmissao_motor; ?>" />
		</div>
		
		<div class="form_line w_1_4">
			<label>Relação de transmissão Ventilador/motor:</label>
			<input class="in_float" type="text" name="relacao_transmissao_ventilador" value="<?php echo $trator->relacao_transmissao_ventilador; ?>" />
		</div>
		
		<hr/>
		
		<div class="form_line w_1_4">
			<label>Horas do trator:</label>
			<input class="in_int" type="text" name="horas_trator" value="<?php echo $trator->horas_trator; ?>" />
		</div>
		
		<div class="form_line w_1_4">
			<label>Aspiração:</label>
			<input class="in_string" type="text" name="aspiracao" value="<?php echo $trator->aspiracao; ?>" />
		</div>
		
		<div class="form_line w_1_4">
			<label>Densidade combustível (kg/L):</label>
			<input class="in_float" type="text" name="densidade_combustivel" value="<?php echo $trator->densidade_combustivel; ?>" />
		</div>
		
		<div class="form_line w_1_4">
			<label>Poder calorífico (MJ/kg):</label>
			<input class="in_float" type="text" name="poder_calorifico" value="<?php echo $trator->poder_calorifico; ?>" />
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