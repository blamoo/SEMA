<?php
$page_title = 'Resumo do relatório';

$relatorio = new a_dados_relatorio($trator);

$document_container_class = 'trator_relatorio_resumo';
?>
<?php require LAYOUT_PATH . 'dtd.php'; ?>
<html>
	<head>
<?php require LAYOUT_PATH . 'head_tag.php'; ?>
	</head>
	<body>
<?php require LAYOUT_PATH . 'header.php'; ?>
	<div class="content">
		<?php
		if ($relatorio->validar())
		{
		?>
			<a onclick="alert('O processamento do relatório pode demorar alguns segundos.\nClique apenas uma vez e aguarde a notificação de download')" href="<?php echo htmlspecialchars($trator->url_relatorio_download()); ?>">Download do relatório</a><br/>
			
			<img src="<?php echo htmlspecialchars($relatorio->url_potencia_torque_motor()) ?>" alt="Potência e Torque na TDP" />
			<img src="<?php echo htmlspecialchars($relatorio->url_potencia_torque_tdp()) ?>" alt="Consumo de combustível  (TDP)" />
			<img src="<?php echo htmlspecialchars($relatorio->url_consumo_combustivel_tdp()) ?>" alt="Potência e Torque no motor" />
		<?php
		}
		else
			echo alert::red('<p>Um relatório não pode ser gerado pois esse trator não tem medições cadastradas</p>');
		?>
	</div>
		
<?php require LAYOUT_PATH . 'footer.php'; ?>
	</body>
</html>