<?php$id = safe($_GET['id']);$medicao = a_medicao::criar_por_id($id);if ($medicao === null)	return new a_http_erro(404);$bc->add($medicao->url_detalhes(), $medicao->nome());$bc->add($medicao->url_excluir(), 'Excluir');	$write_header = false;		$page_title = 'Excluir medição';?><?php require LAYOUT_PATH . 'dtd.php'; ?><html>	<head><?php require LAYOUT_PATH . 'head_tag.php'; ?>	</head>	<body><?php require LAYOUT_PATH . 'header.php'; ?><h1>Tem certeza de que deseja excluir essa medição?</h1><form class="formatted" method="post" action="<?php echo htmlspecialchars($trator->url_medicao_operacoes('delete')); ?>">	<fieldset class="tac confirma">		<input type="hidden" name="id" value="<?php echo $medicao->id; ?>" />		<input class="confirma sim" type="submit" name="confirma" value="Sim" />		<input class="confirma nao" type="submit" name="confirma" value="Não" />	</fieldset></form><?php require LAYOUT_PATH . 'footer.php'; ?>	</body></html>