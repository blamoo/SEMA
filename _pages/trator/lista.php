<?php
$page_title = 'Tratores cadastrados';

$tratores = a_trator::criar_lista();
?>
<?php require LAYOUT_PATH . 'dtd.php'; ?>
<html>
	<head>
<?php require LAYOUT_PATH . 'head_tag.php'; ?>
	</head>
	<body>
<?php require LAYOUT_PATH . 'header.php'; ?>

<table class="formatted">
<?php
if (count($tratores) == 0)
{
	echo '<tr><td>Não há tratores cadastrados</td></tr>';
}
else
{
?>
	<thead>
		<tr><th>Nome</th><th>Ações</th></tr>
	</thead>
	<tbody>
<?php
	foreach($tratores as $key => $val)
	{
?>
		<tr>
			<td><a href="<?php echo htmlspecialchars($val->url_detalhes()); ?>"><?php echo $val->nome; ?></a></td>
			<td>
				<a title="Medições" href="<?php echo htmlspecialchars($val->url_medicao_lista()); ?>"><img src="<?php echo IMG_URL ?>fuuge_24/vise.png" alt="Medições" /></a>
				<a title="Relatório" href="<?php echo htmlspecialchars($val->url_relatorio_resumo()); ?>"><img src="<?php echo IMG_URL; ?>fuuge_24/table-export.png" alt="Relatório" /></a>
				<a title="Detalhes" href="<?php echo htmlspecialchars($val->url_detalhes()); ?>"><img src="<?php echo IMG_URL ?>fuuge_24/document.png" alt="Detalhes" /></a>
				<a title="Alterar" href="<?php echo htmlspecialchars($val->url_alterar()); ?>"><img src="<?php echo IMG_URL ?>fuuge_24/pencil.png" alt="Alterar" /></a>
				<a title="Excluir" href="<?php echo htmlspecialchars($val->url_excluir()); ?>"><img src="<?php echo IMG_URL ?>fuuge_24/cross.png" alt="Excluir" /></a>
			</td>
			</tr>
<?php
	}
?>
	</tbody>
<?php
}
?>
</table>

<div id="operacoes">
	<a title="Adicionar" href="<?php echo htmlspecialchars(a_trator::url_adicionar()); ?>"><img src="<?php echo IMG_URL; ?>fuuge_24/plus-circle.png" alt="Adicionar" /></a>
	<a title="Voltar" href="<?php echo htmlspecialchars(PAGE_URL); ?>"><img src="<?php echo IMG_URL; ?>fuuge_24/arrow-180.png" alt="Voltar" /></a>
</div>

<?php require LAYOUT_PATH . 'footer.php'; ?>
	</body>
</html>