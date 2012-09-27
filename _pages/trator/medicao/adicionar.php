<?php
$js[] = JS_URL . 'ajaxForm.js';

$id = safe($_GET['id']);

if ($id === null)
{
	$medicao = new a_medicao();
	$medicao->set_trator($trator);
	
	$operacao = 'insert';
	
	$bc->add($trator->url_medicao_adicionar(), 'Adicionar');
}
else
{
	$medicao = a_medicao::criar_por_id($id);

	if ($medicao === null)
		return new a_http_erro(404);
	
	$operacao = 'update';
	
	$bc->add($medicao->url_detalhes(), $medicao->nome());
	$bc->add($medicao->url_alterar(), 'Alterar');
}

$page_title = 'Adicionar medição';
?>
<?php require LAYOUT_PATH . 'dtd.php'; ?>
<html>
	<head>
<?php require LAYOUT_PATH . 'head_tag.php'; ?>
	</head>
	<body>
<?php require LAYOUT_PATH . 'header.php'; ?>

<form class="formatted ajax_form" method="post" action="<?php echo htmlspecialchars($trator->url_medicao_operacoes($operacao)); ?>">
	<fieldset>
		<input type="hidden" name="id" value="<?php echo $medicao->id; ?>" />
		<input type="hidden" name="id_trator" value="<?php echo $medicao->id_trator; ?>" />
		
		<div class="form_line">
			<label>Rotações do Motor (rpm)</label>
			<input type="text" name="rpm_motor" value="<?php echo $medicao->rpm_motor; ?>" />
		</div>
		
		<div class="form_line w_1_4">
			<label>Força medida 1 (kgf)</label>
			<input type="text" name="fm_clp_1" value="<?php echo $medicao->fm_clp_1; ?>" />
		</div>
		
		<div class="form_line w_1_4">
			<label>Força medida 2 (kgf)</label>
			<input type="text" name="fm_clp_2" value="<?php echo $medicao->fm_clp_2; ?>" />
		</div>
		<div class="clear"></div>
		<div class="form_line w_1_4">
			<label>Chv 1 (L.h-1)</label>
			<input type="text" name="chv_clp_1" value="<?php echo $medicao->chv_clp_1; ?>" />
		</div>
		
		<div class="form_line w_1_4">
			<label>Chv 2 (L.h-1)</label>
			<input type="text" name="chv_clp_2" value="<?php echo $medicao->chv_clp_2; ?>" />
		</div>
		
		<div class="form_line">
			<label>Braço (m)</label>
			<input type="text" name="dados_braco" value="<?php echo $medicao->dados_braco; ?>" />
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