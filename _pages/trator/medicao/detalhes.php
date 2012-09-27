<?php

$id = safe($_GET['id']);

$medicao = a_medicao::criar_por_id($id);

if ($medicao === null)
	return false;

$bc->add($medicao->url_detalhes(), $medicao->nome());

$page_title = 'Detalhes da medição Nº ' . $medicao->id;
?>
<?php require LAYOUT_PATH . 'dtd.php'; ?>
<html>
	<head>
<?php require LAYOUT_PATH . 'head_tag.php'; ?>
	</head>
	<body>
<?php require LAYOUT_PATH . 'header.php'; ?>

<table class="formatted">
<colgroup>
    <col span="1" style="background-color: margin: 90px;" />
</colgroup>

	<tr><td></td><td>Id</td><td><?php echo $medicao->id; ?></td></tr>
	<tr><td></td><td>Trator</td><td><?php echo $medicao->id_trator; ?></td></tr>
	<tr><td rowspan="3">Rotações</td><td>Motor (rpm)</td><td><?php echo $medicao->rpm_motor; ?></td></tr>
	<tr><td>TDP (rpm)</td><td><?php echo $medicao->rpm_tdp; ?></td></tr>
	<tr><td>Ventilador (rpm)</td><td><?php echo $medicao->rpm_ventilador; ?></td></tr>
	<tr><td rowspan="2">Força medida (kgf)</td><td>Medição 1</td><td><?php echo $medicao->fm_clp_1; ?></td></tr>
	<tr><td>Medição 2</td><td><?php echo $medicao->fm_clp_2; ?></td></tr>
	<tr><td rowspan="2">Chv (L.h<sup>-1</sup>)</td><td>Medição 1</td><td><?php echo $medicao->chv_clp_1; ?></td></tr>
	<tr><td>Medição 2</td><td><?php echo $medicao->chv_clp_2; ?></td></tr>
	<tr><td rowspan="2">Dados</td><td>Força (kgf)</td><td><?php echo $medicao->dados_forca; ?></td></tr>
	<tr><td>Braço (m)</td><td><?php echo $medicao->dados_braco; ?></td></tr>
	<tr><td rowspan="4">Potência indicada</td><td>kW TDP</td><td><?php echo $medicao->pi_kw_tdp; ?></td></tr>
	<tr><td>cv TDP</td><td><?php echo $medicao->pi_cv_tdp; ?></td></tr>
	<tr><td>kW Motor</td><td><?php echo $medicao->pi_kw_motor; ?></td></tr>
	<tr><td>cv Motor</td><td><?php echo $medicao->pi_cv_motor; ?></td></tr>
	<tr><td rowspan="4">Torque indicado</td><td>kgf.m TDP</td><td><?php echo $medicao->ti_kgfm_tdp; ?></td></tr>
	<tr><td>N.m TDP</td><td><?php echo $medicao->ti_nm_tdp; ?></td></tr>
	<tr><td>kgf.m Motor</td><td><?php echo $medicao->ti_kgfm_motor; ?></td></tr>
	<tr><td>N.m Motor</td><td><?php echo $medicao->ti_nm_motor; ?></td></tr>
	<tr><td rowspan="3">Consumo de combustível</td><td>Chv(L.h<sup>-1</sup>)</td><td><?php echo $medicao->cc_chv; ?></td></tr>
	<tr><td>Chm (kg.h<sup>-1</sup>)</td><td><?php echo $medicao->cc_chm; ?></td></tr>
	<tr><td>Cs (g.kWh<sup>-1</sup>)</td><td><?php echo $medicao->cc_cs; ?></td></tr>
	<tr><td></td><td>Consumo energético (MJ.h<sup>-1</sup>)</td><td><?php echo $medicao->consumo_energetico; ?></td></tr>
	<tr><td></td><td>Eficiência (%)</td><td><?php echo $medicao->eficiencia_termica; ?></td></tr>
	<tr><td>Energia específica</td><td>kWh.L<sup>-1</sup></td><td><?php echo $medicao->energia_especifica; ?></td></tr>
</table>

<div id="operacoes">
	<a title="Alterar" href="<?php echo htmlspecialchars($medicao->url_alterar()); ?>"><img src="<?php echo IMG_URL; ?>fuuge_24/pencil.png" alt="Alterar" /></a>
	<a title="Excluir" href="<?php echo htmlspecialchars($medicao->url_excluir()); ?>"><img src="<?php echo IMG_URL; ?>fuuge_24/cross.png" alt="Excluir" /></a>
	<a title="Voltar" href="<?php echo htmlspecialchars($trator->url_medicao_lista()); ?>"><img src="<?php echo IMG_URL; ?>fuuge_24/arrow-180.png" alt="Voltar" /></a>
</div>

<?php require LAYOUT_PATH . 'footer.php'; ?>
	</body>
</html>