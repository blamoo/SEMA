<?php
$relatorio = new a_dados_relatorio($trator);

$valido = $relatorio->validar();

$page_title = 'Relatório';
?>
<?php require LAYOUT_PATH . 'dtd.php'; ?>
<html>
	<head>
<?php require LAYOUT_PATH . 'head_tag.php'; ?>
	</head>
	<body>
<?php require LAYOUT_PATH . 'header.php'; ?>

<?php
if (!$valido)
	echo '<h2>Não foi possível gerar um relatório pois o trator não tem medições cadastradas</h2>';
else
{
?>
	<img src="<?php echo htmlspecialchars($relatorio->url_potencia_torque_tdp()); ?>" alt="" /><br/>
	<img src="<?php echo htmlspecialchars($relatorio->url_potencia_torque_motor()); ?>" alt="" /><br/>
	<img src="<?php echo htmlspecialchars($relatorio->url_consumo_combustível_tdp()); ?>" alt="" />
<?php
}
?>

<?php require LAYOUT_PATH . 'footer.php'; ?>
	</body>
</html>