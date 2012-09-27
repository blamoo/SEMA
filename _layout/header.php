<div id="document_container" class="<?php echo $document_container_class; ?>">

<script type="text/javascript" src="<?php echo htmlspecialchars(JS_URL . 'jquery.js'); ?>"></script>
<script type="text/javascript" src="<?php echo htmlspecialchars(JS_URL . 'ajaxForm.jquery.js'); ?>"></script>
<script type="text/javascript" src="<?php echo htmlspecialchars(JS_URL . 'qtip.jquery.js'); ?>"></script>
<script type="text/javascript" src="<?php echo htmlspecialchars(JS_URL . 'common.js'); ?>"></script>

<?php
	foreach ($js as $val)
		echo '<script type="text/javascript" src="', htmlspecialchars($val), '"></script>', PHP_EOL;
?>

<div id="header">
	<a href="<?php echo PAGE_URL; ?>"><img src="<?php echo IMG_URL ?>logoNEMPAheader.png" alt="NEMPA" /></a>
	<h1><a href="<?php echo PAGE_URL; ?>">Sistema de Ensaio de Máquinas Agrícolas</a></h1>
	<div class="clear"></div>
</div>


<div id="main">

<div id="breadcrumb">
<?php
echo $bc->out();
?>
</div>

<?php
if ($write_header)
	echo '<h1>', $page_title, '</h1>';
?>