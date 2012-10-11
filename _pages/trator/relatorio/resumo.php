<?php
$relatorio = new a_dados_relatorio($trator);
//$valido = $relatorio->validar();

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

$table = $section->addTable();

$headerStyle = array('textDirection'=>PHPWord_Style_Cell::TEXT_DIR_TBRL);

$table->addRow(2400);
$table->addCell(8000, $headerStyle)->addText("Motor\n(rpm)",						'tableheader');
$table->addCell(8000, $headerStyle)->addText("TDP\n(rpm)",							'tableheader');
$table->addCell(8000, $headerStyle)->addText("Ventilador\n(rpm)",					'tableheader');
$table->addCell(8000, $headerStyle)->addText("Medição\n1",							'tableheader');
$table->addCell(8000, $headerStyle)->addText("Medição\n2",							'tableheader');
$table->addCell(8000, $headerStyle)->addText("Medição\n1",							'tableheader');
$table->addCell(8000, $headerStyle)->addText("Medição\n2",							'tableheader');
$table->addCell(8000, $headerStyle)->addText("Força\n(kgf)",						'tableheader');
//$table->addCell(8000, $headerStyle)->addText("Braço (m)",							'tableheader');
//$table->addCell(8000, $headerStyle)->addText("Fator de\ncorreção\nda força",		'tableheader');
$table->addCell(8000, $headerStyle)->addText("kW\nTDP",								'tableheader');
$table->addCell(8000, $headerStyle)->addText("cv\nTDP",								'tableheader');
$table->addCell(8000, $headerStyle)->addText("kW\nMotor",							'tableheader');
$table->addCell(8000, $headerStyle)->addText("cv\nMotor",							'tableheader');
$table->addCell(8000, $headerStyle)->addText("kgf.m\nTDP",							'tableheader');
$table->addCell(8000, $headerStyle)->addText("N.m\nTDP",							'tableheader');
$table->addCell(8000, $headerStyle)->addText("kgf.m\nMotor",						'tableheader');
$table->addCell(8000, $headerStyle)->addText("N.m\nMotor",							'tableheader');
$table->addCell(8000, $headerStyle)->addText("Chv\n(L.h^-1)",						'tableheader');
$table->addCell(8000, $headerStyle)->addText("Chm\n(kg.h^-1)",						'tableheader');
$table->addCell(8000, $headerStyle)->addText("Cs\n(g.kWh^-1)",						'tableheader');
$table->addCell(8000, $headerStyle)->addText("Consumo energético\n(MJ.h^-1)",		'tableheader');
$table->addCell(8000, $headerStyle)->addText("Eficiência\n(%)",						'tableheader');
$table->addCell(8000, $headerStyle)->addText("Energia\nespecífica\n(kWh.L^-1)",		'tableheader');

foreach($relatorio->dados as $key => $val)
{
	$table->addRow();
	$table->addCell(null)->addText($val->rpm_motor,					'tabledata');
	$table->addCell(null)->addText($val->rpm_tdp,					'tabledata');
	$table->addCell(null)->addText($val->rpm_ventilador,			'tabledata');
	$table->addCell(null)->addText($val->fm_clp_1,					'tabledata');
	$table->addCell(null)->addText($val->fm_clp_2,					'tabledata');
	$table->addCell(null)->addText($val->chv_clp_1,					'tabledata');
	$table->addCell(null)->addText($val->chv_clp_2,					'tabledata');
	$table->addCell(null)->addText($val->dados_forca,				'tabledata');
//	$table->addCell(null)->addText($val->dados_braco,				'tabledata');
//	$table->addCell(null)->addText($val->dados_fator_correcao,		'tabledata');
	$table->addCell(null)->addText($val->pi_kw_tdp,					'tabledata');
	$table->addCell(null)->addText($val->pi_cv_tdp,					'tabledata');
	$table->addCell(null)->addText($val->pi_kw_motor,				'tabledata');
	$table->addCell(null)->addText($val->pi_cv_motor,				'tabledata');
	$table->addCell(null)->addText($val->ti_kgfm_tdp,				'tabledata');
    $table->addCell(null)->addText($val->ti_nm_tdp,					'tabledata');
	$table->addCell(null)->addText($val->ti_kgfm_motor,				'tabledata');
	$table->addCell(null)->addText($val->ti_nm_motor,				'tabledata');
	$table->addCell(null)->addText($val->cc_chv,					'tabledata');
	$table->addCell(null)->addText($val->cc_chm,					'tabledata');
	$table->addCell(null)->addText($val->cc_cs,						'tabledata');
	$table->addCell(null)->addText($val->consumo_energetico,		'tabledata');
	$table->addCell(null)->addText($val->eficiencia_termica,		'tabledata');
	$table->addCell(null)->addText($val->energia_especifica,		'tabledata');
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