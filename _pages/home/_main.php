<?php
$page_title = 'Página Inicial';
?>
<?php require LAYOUT_PATH . 'dtd.php'; ?>
<html>
	<head>
<?php require LAYOUT_PATH . 'head_tag.php'; ?>
	</head>
	<body>
<?php require LAYOUT_PATH . 'header.php'; ?>
		<div class="tac">
			<a href="<?php echo PAGE_URL ?>trator">Trator</a> - 
			<a href="<?php echo a_configurar::url_form(); ?>">Configurações</a>
		</div>
		
<?php require LAYOUT_PATH . 'footer.php'; ?>
	</body>
</html>