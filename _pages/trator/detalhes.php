<?php

$id = safe($_GET['id']);

$trator = a_trator::criar_por_id($id);

if ($trator === null)
	return new a_http_erro(404);

$bc->add($trator->url_detalhes(), $trator->nome);
		
$page_title = 'Detalhes do trator - ' . $trator->nome;
?>
<?php require LAYOUT_PATH . 'dtd.php'; ?>
<html>
	<head>
<?php require LAYOUT_PATH . 'head_tag.php'; ?>
	</head>
	<body>
<?php require LAYOUT_PATH . 'header.php'; ?>

<table class="formatted">
	<tr><td>Id</td><td><?php echo $trator->id; ?></td></tr>
	<tr><td>Nome</td><td><?php echo htmlspecialchars($trator->nome); ?></td></tr>
	<tr><td>Rotação nominal do motor (rpm)</td><td><?php echo $trator->rotacao_nominal_motor; ?></td></tr>
	<tr><td>Rotação máxima livre (rpm)</td><td><?php echo $trator->rotacao_maxima_livre; ?></td></tr>
	<tr><td>Relação de transmissão Motor/TDP</td><td><?php echo $trator->relacao_transmissao_motor; ?></td></tr>
	<tr><td>Relação de transmissão Ventilador/motor</td><td><?php echo $trator->relacao_transmissao_ventilador; ?></td></tr>
	<tr><td>Horas do trator</td><td><?php echo $trator->horas_trator; ?></td></tr>
	<tr><td>Aspiração</td><td><?php echo htmlspecialchars($trator->aspiracao); ?></td></tr>
	<tr><td>Densidade combustível (kg/L)</td><td><?php echo $trator->densidade_combustivel; ?></td></tr>
	<tr><td>Poder calorífico (MJ/kg)</td><td><?php echo $trator->poder_calorifico; ?></td></tr>
</table>
<div id="operacoes">
	<a title="Medições" href="<?php echo htmlspecialchars($trator->url_medicao_lista()); ?>"><img src="<?php echo IMG_URL ?>fuuge_24/vise.png" alt="Medições" /></a>
	<a title="Alterar" href="<?php echo htmlspecialchars($trator->url_alterar()); ?>"><img src="<?php echo IMG_URL ?>fuuge_24/pencil.png" alt="Alterar" /></a>
	<a title="Excluir" href="<?php echo htmlspecialchars($trator->url_excluir()); ?>"><img src="<?php echo IMG_URL ?>fuuge_24/cross.png" alt="Excluir" /></a>
	<a title="Relatório" href="<?php echo htmlspecialchars($trator->url_relatorio_resumo()); ?>"><img src="<?php echo IMG_URL; ?>fuuge_24/table-export.png" alt="Relatório" /></a>
	<a title="Voltar" href="<?php echo htmlspecialchars(a_trator::url_lista()); ?>"><img src="<?php echo IMG_URL; ?>fuuge_24/arrow-180.png" alt="Voltar" /></a>
</div>
<?php require LAYOUT_PATH . 'footer.php'; ?>
	</body>
</html>