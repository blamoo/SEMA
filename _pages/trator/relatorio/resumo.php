<?php
$relatorio = new a_dados_relatorio($trator);
//$valido = $relatorio->validar();

function u($str)
{
	return utf8_decode($str);
}

$temp_potencia_torque_tdp       = fs_helper::CacheRemoteFile($relatorio->url_potencia_torque_tdp());
$temp_potencia_torque_motor     = fs_helper::CacheRemoteFile($relatorio->url_potencia_torque_motor());
$temp_consumo_combustivel_tdp   = fs_helper::CacheRemoteFile($relatorio->url_consumo_combustivel_tdp());

$temp_potencia_torque_tdp       = fs_helper::ChangeExtension($temp_potencia_torque_tdp,		'png');
$temp_potencia_torque_motor     = fs_helper::ChangeExtension($temp_potencia_torque_motor,	'png');
$temp_consumo_combustivel_tdp   = fs_helper::ChangeExtension($temp_consumo_combustivel_tdp,	'png');

chdir(THIRDPARTY_PATH . 'PHPWord/src/');

require_once 'PHPWord.php';

$PHPWord = new PHPWord();

$section = $PHPWord->createSection(array('orientation'=>'landscape', 'marginLeft'=>300, 'marginRight'=>300, 'marginTop'=>300, 'marginBottom'=>300));

$PHPWord->addFontStyle('tableheader',	array('size' => 8));
$PHPWord->addFontStyle('tabledata',		array('size' => 8));


$styleTable = array('borderSize'=>6, 'borderColor'=>'006699', 'cellMargin'=>12);
$styleFirstRow = array();

$PHPWord->addTableStyle('tableStyle', $styleTable, $styleFirstRow);

$table = $section->addTable('tableStyle');

$headerStyle = array('textDirection'=>PHPWord_Style_Cell::TEXT_DIR_TBRL);

$table->addRow(2400);
$table->addCell(8000, $headerStyle)->addText(u("Motor\n(rpm)"),							'tableheader');
$table->addCell(8000, $headerStyle)->addText(u("TDP\n(rpm)"),							'tableheader');
$table->addCell(8000, $headerStyle)->addText(u("Ventilador\n(rpm)"),					'tableheader');
$table->addCell(8000, $headerStyle)->addText(u("Medição\n1"),							'tableheader');
$table->addCell(8000, $headerStyle)->addText(u("Medição\n2"),							'tableheader');
$table->addCell(8000, $headerStyle)->addText(u("Medição\n1"),							'tableheader');
$table->addCell(8000, $headerStyle)->addText(u("Medição\n2"),							'tableheader');
$table->addCell(8000, $headerStyle)->addText(u("Força\n(kgf)"),							'tableheader');
// $table->addCell(8000, $headerStyle)->addText(u("Braço (m)"),							'tableheader');
// $table->addCell(8000, $headerStyle)->addText(u("Fator de\ncorreção\nda força"),		'tableheader');
$table->addCell(8000, $headerStyle)->addText(u("kW\nTDP"),								'tableheader');
$table->addCell(8000, $headerStyle)->addText(u("cv\nTDP"),								'tableheader');
$table->addCell(8000, $headerStyle)->addText(u("kW\nMotor"),							'tableheader');
$table->addCell(8000, $headerStyle)->addText(u("cv\nMotor"),							'tableheader');
$table->addCell(8000, $headerStyle)->addText(u("kgf.m\nTDP"),							'tableheader');
$table->addCell(8000, $headerStyle)->addText(u("N.m\nTDP"),								'tableheader');
$table->addCell(8000, $headerStyle)->addText(u("kgf.m\nMotor"),							'tableheader');
$table->addCell(8000, $headerStyle)->addText(u("N.m\nMotor"),							'tableheader');
$table->addCell(8000, $headerStyle)->addText(u("Chv\n(L.h^-1)"),						'tableheader');
$table->addCell(8000, $headerStyle)->addText(u("Chm\n(kg.h^-1)"),						'tableheader');
$table->addCell(8000, $headerStyle)->addText(u("Cs\n(g.kWh^-1)"),						'tableheader');
$table->addCell(8000, $headerStyle)->addText(u("Consumo energético\n(MJ.h^-1)"),		'tableheader');
$table->addCell(8000, $headerStyle)->addText(u("Eficiência\n(%)"),						'tableheader');
$table->addCell(8000, $headerStyle)->addText(u("Energia\nespecífica\n(kWh.L^-1)"),		'tableheader');

foreach($relatorio->dados as $key => $val)
{
	$table->addRow();
	$table->addCell(null)->addText(u($val->rpm_motor),					'tabledata');
	$table->addCell(null)->addText(u($val->rpm_tdp),					'tabledata');
	$table->addCell(null)->addText(u($val->rpm_ventilador),				'tabledata');
	$table->addCell(null)->addText(u($val->fm_clp_1),					'tabledata');
	$table->addCell(null)->addText(u($val->fm_clp_2),					'tabledata');
	$table->addCell(null)->addText(u($val->chv_clp_1),					'tabledata');
	$table->addCell(null)->addText(u($val->chv_clp_2),					'tabledata');
	$table->addCell(null)->addText(u($val->dados_forca),				'tabledata');
	// $table->addCell(null)->addText(u($val->dados_braco),				'tabledata');
	// $table->addCell(null)->addText(u($val->dados_fator_correcao),	'tabledata');
	$table->addCell(null)->addText(u($val->pi_kw_tdp),					'tabledata');
	$table->addCell(null)->addText(u($val->pi_cv_tdp),					'tabledata');
	$table->addCell(null)->addText(u($val->pi_kw_motor),				'tabledata');
	$table->addCell(null)->addText(u($val->pi_cv_motor),				'tabledata');
	$table->addCell(null)->addText(u($val->ti_kgfm_tdp),				'tabledata');
    $table->addCell(null)->addText(u($val->ti_nm_tdp),					'tabledata');
	$table->addCell(null)->addText(u($val->ti_kgfm_motor),				'tabledata');
	$table->addCell(null)->addText(u($val->ti_nm_motor),				'tabledata');
	$table->addCell(null)->addText(u($val->cc_chv),						'tabledata');
	$table->addCell(null)->addText(u($val->cc_chm),						'tabledata');
	$table->addCell(null)->addText(u($val->cc_cs),						'tabledata');
	$table->addCell(null)->addText(u($val->consumo_energetico),			'tabledata');
	$table->addCell(null)->addText(u($val->eficiencia_termica),			'tabledata');
	$table->addCell(null)->addText(u($val->energia_especifica),			'tabledata');
}

$imageStyle = array('align'=>'center');
$section->addPageBreak();
$section->addImage($temp_potencia_torque_tdp,		$imageStyle);
$section->addImage($temp_potencia_torque_motor,		$imageStyle);
$section->addImage($temp_consumo_combustivel_tdp,	$imageStyle);

$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
$objWriter->save('php://output');

unlink($temp_potencia_torque_tdp);
unlink($temp_potencia_torque_motor);
unlink($temp_consumo_combustivel_tdp);