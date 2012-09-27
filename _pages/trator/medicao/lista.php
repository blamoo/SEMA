<?php
	
$medicoes = a_medicao::criar_lista_por_trator($trator);

$page_title = 'Medições para o trator ' . $trator->nome;
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
if (count($medicoes) == 0)
{
	echo '<tr><td>Não há medições cadastradas nesse trator</td></tr>';
}
else
{
?>
	<!--thead>
		<tr><th>Nome</th><th>Ações</th></tr>
	</thead-->
	<tbody>
<?php
	foreach($medicoes as $key => $val)
	{
?>
		<tr>
			<td><?php echo $val->rpm_motor; ?></td>
			<td><?php echo $val->rpm_tdp; ?></td>
			<td><?php echo $val->rpm_ventilador; ?></td>
			<td><?php echo $val->fm_clp_1; ?></td>
			<td><?php echo $val->fm_clp_2; ?></td>
			<td><?php echo $val->chv_clp_1; ?></td>
			<td><?php echo $val->chv_clp_2; ?></td>
			<!--td><?php echo $val->dados_forca; ?></td-->
			<!--td><?php echo $val->dados_braco; ?></td>
			<td><?php echo $val->pi_kw_tdp; ?></td>
			<td><?php echo $val->pi_cv_tdp; ?></td>
			<td><?php echo $val->pi_kw_motor; ?></td>
			<td><?php echo $val->pi_cv_motor; ?></td>
			<td><?php echo $val->ti_kgfm_tdp; ?></td>
			<td><?php echo $val->ti_nm_tdp; ?></td>
			<td><?php echo $val->ti_kgfm_motor; ?></td>
			<td><?php echo $val->ti_nm_motor; ?></td>
			<td><?php echo $val->ti_reserva_torque; ?></td>
			<td><?php echo $val->cc_chv; ?></td>
			<td><?php echo $val->cc_chm; ?></td>
			<td><?php echo $val->cc_cs; ?></td>
			<td><?php echo $val->consumo_energetico; ?></td>
			<td><?php echo $val->eficiencia_termica; ?></td>
			<td><?php echo $val->energia_especifica; ?></td-->
			
			<td>
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
	<a title="Adicionar" href="<?php echo htmlspecialchars($trator->url_medicao_adicionar()); ?>"><img src="<?php echo IMG_URL; ?>fuuge_24/plus-circle.png" alt="Adicionar" /></a>
	<a title="Relatório" href="<?php echo htmlspecialchars($trator->url_relatorio_resumo()); ?>"><img src="<?php echo IMG_URL; ?>fuuge_24/table-export.png" alt="Relatório" /></a>
	<a title="Voltar" href="<?php echo htmlspecialchars(a_trator::url_lista()); ?>"><img src="<?php echo IMG_URL; ?>fuuge_24/arrow-180.png" alt="Voltar" /></a>
</div>

<?php require LAYOUT_PATH . 'footer.php'; ?>
	</body>
</html>