<?php
$operacao = 'recalcular';

$page_title = 'Recalcular medições';
?>
<?php require LAYOUT_PATH . 'dtd.php'; ?>
<html>
	<head>
<?php require LAYOUT_PATH . 'head_tag.php'; ?>
	</head>
	<body>
<?php require LAYOUT_PATH . 'header.php'; ?>

<form class="formatted" method="post" action="<?php echo htmlspecialchars($trator->url_medicao_operacoes($operacao)); ?>">
	<fieldset class="tac confirma">
	
		<div class="form_line">
			<p>Esse processo recalcula todas as medições que foram inseridas ou alteradas antes de alguma alteração nos dados do trator.</p>
			<p>Deseja prosseguir?</p>
		</div>
		
		<div class="form_line">
			<input class="confirma sim" type="submit" name="confirma" value="Sim" />
			<input class="confirma nao" type="submit" name="confirma" value="Não" />
		</div>
		
	</fieldset>
	<div class="clear"></div>
</form>

<?php require LAYOUT_PATH . 'footer.php'; ?>
	</body>
</html>