<?php
$relatorio = new a_dados_relatorio($trator);
// $valido = $relatorio->validar();

//cria cópias locais dos gráficos (a biblioteca PHPWord não aceita imagens remotas)
$temp_potencia_torque_tdp       = fs_helper::CacheRemoteFile($relatorio->url_potencia_torque_tdp(),		'png');
$temp_potencia_torque_motor     = fs_helper::CacheRemoteFile($relatorio->url_potencia_torque_motor(),	'png');
$temp_consumo_combustivel_tdp   = fs_helper::CacheRemoteFile($relatorio->url_consumo_combustivel_tdp(),	'png');

chdir(THIRDPARTY_PATH . 'PHPWord/src/'); // Muda o diretório local para a pasta do PHPWord

require_once 'PHPWord.php';

$PHPWord = new PHPWord();

// Cria uma nova seção no documento, orientação "Paisagem"
$section = $PHPWord->createSection(array('orientation'=>'landscape', 'marginLeft'=>300, 'marginRight'=>300, 'marginTop'=>300, 'marginBottom'=>300));

// Adiciona um estilo de tabela ao documento
$PHPWord->addTableStyle('tableStyle', array('borderSize'=>6, 'borderColor'=>'006699', 'cellMargin'=>12));

// Cria uma tabela com o estilo acima e adiciona à seção
$table = $section->addTable('tableStyle');

// Adiciona nova linha na tabela
$table->addRow(2400);


// Estilo das células do cabeçalho
$headerCellStyle = new PHPWord_Style_Cell();
$headerCellStyle->setVAlign('center');
$headerCellStyle->setTextDirection(PHPWord_Style_Cell::TEXT_DIR_TBRL);

// Estilo do parágrafo do cabeçalho
$headerParagraph = new PHPWord_Style_Paragraph();
$headerParagraph->setAlign('right');
$headerParagraph->setSpaceBefore(12);
$headerParagraph->setSpaceAfter(12);

// Estilo da fonte do cabeçalho
$headerFont = new PHPWord_Style_Font();
$headerFont->setSize(8);

// Adicionando células do cabeçalho
$table->addCell(8000, $headerCellStyle)->addText(utf8_decode("Motor (rpm)"),						$headerFont, $headerParagraph);
$table->addCell(8000, $headerCellStyle)->addText(utf8_decode("TDP (rpm)"),							$headerFont, $headerParagraph);
$table->addCell(8000, $headerCellStyle)->addText(utf8_decode("Ventilador (rpm)"),					$headerFont, $headerParagraph);
$table->addCell(8000, $headerCellStyle)->addText(utf8_decode("Medição 1"),							$headerFont, $headerParagraph);
$table->addCell(8000, $headerCellStyle)->addText(utf8_decode("Medição 2"),							$headerFont, $headerParagraph);
$table->addCell(8000, $headerCellStyle)->addText(utf8_decode("Medição 1"),							$headerFont, $headerParagraph);
$table->addCell(8000, $headerCellStyle)->addText(utf8_decode("Medição 2"),							$headerFont, $headerParagraph);
$table->addCell(8000, $headerCellStyle)->addText(utf8_decode("Força (kgf)"),						$headerFont, $headerParagraph);
$table->addCell(8000, $headerCellStyle)->addText(utf8_decode("kW TDP"),								$headerFont, $headerParagraph);
$table->addCell(8000, $headerCellStyle)->addText(utf8_decode("cv TDP"),								$headerFont, $headerParagraph);
$table->addCell(8000, $headerCellStyle)->addText(utf8_decode("kW Motor"),							$headerFont, $headerParagraph);
$table->addCell(8000, $headerCellStyle)->addText(utf8_decode("cv Motor"),							$headerFont, $headerParagraph);
$table->addCell(8000, $headerCellStyle)->addText(utf8_decode("kgf.m TDP"),							$headerFont, $headerParagraph);
$table->addCell(8000, $headerCellStyle)->addText(utf8_decode("N.m TDP"),							$headerFont, $headerParagraph);
$table->addCell(8000, $headerCellStyle)->addText(utf8_decode("kgf.mMotor"),							$headerFont, $headerParagraph);
$table->addCell(8000, $headerCellStyle)->addText(utf8_decode("N.m Motor"),							$headerFont, $headerParagraph);
$table->addCell(8000, $headerCellStyle)->addText(utf8_decode("Chv (L.h^-1)"),						$headerFont, $headerParagraph);
$table->addCell(8000, $headerCellStyle)->addText(utf8_decode("Chm (kg.h^-1)"),						$headerFont, $headerParagraph);
$table->addCell(8000, $headerCellStyle)->addText(utf8_decode("Cs (g.kWh^-1)"),						$headerFont, $headerParagraph);
$table->addCell(8000, $headerCellStyle)->addText(utf8_decode("Consumo energético (MJ.h^-1)"),		$headerFont, $headerParagraph);
$table->addCell(8000, $headerCellStyle)->addText(utf8_decode("Eficiência (%)"),						$headerFont, $headerParagraph);
$table->addCell(8000, $headerCellStyle)->addText(utf8_decode("Energia específica (kWh.L^-1)"),		$headerFont, $headerParagraph);

// Estilo das células dos dados
$dataCellStyle = new PHPWord_Style_Cell();
$dataCellStyle->setVAlign('center');

// Estilo do parágrafo dos dados
$dataParagraph = new PHPWord_Style_Paragraph();
$dataParagraph->setAlign('center');
$dataParagraph->setSpaceBefore(60);
$dataParagraph->setSpaceAfter(60);

// Estilo da fonte dos dados
$dataFont = new PHPWord_Style_Font();
$dataFont->setSize(8);

// Adicionando células das medições
foreach($relatorio->dados as $key => $val)
{
	$table->addRow();
	$table->addCell(null, $dataCellStyle)->addText(utf8_decode($val->rpm_motor),				$dataFont, $dataParagraph);
	$table->addCell(null, $dataCellStyle)->addText(utf8_decode($val->rpm_tdp),					$dataFont, $dataParagraph);
	$table->addCell(null, $dataCellStyle)->addText(utf8_decode($val->rpm_ventilador),			$dataFont, $dataParagraph);
	$table->addCell(null, $dataCellStyle)->addText(utf8_decode($val->fm_clp_1),					$dataFont, $dataParagraph);
	$table->addCell(null, $dataCellStyle)->addText(utf8_decode($val->fm_clp_2),					$dataFont, $dataParagraph);
	$table->addCell(null, $dataCellStyle)->addText(utf8_decode($val->chv_clp_1),				$dataFont, $dataParagraph);
	$table->addCell(null, $dataCellStyle)->addText(utf8_decode($val->chv_clp_2),				$dataFont, $dataParagraph);
	$table->addCell(null, $dataCellStyle)->addText(utf8_decode($val->dados_forca),				$dataFont, $dataParagraph);
	$table->addCell(null, $dataCellStyle)->addText(utf8_decode($val->pi_kw_tdp),				$dataFont, $dataParagraph);
	$table->addCell(null, $dataCellStyle)->addText(utf8_decode($val->pi_cv_tdp),				$dataFont, $dataParagraph);
	$table->addCell(null, $dataCellStyle)->addText(utf8_decode($val->pi_kw_motor),				$dataFont, $dataParagraph);
	$table->addCell(null, $dataCellStyle)->addText(utf8_decode($val->pi_cv_motor),				$dataFont, $dataParagraph);
	$table->addCell(null, $dataCellStyle)->addText(utf8_decode($val->ti_kgfm_tdp),				$dataFont, $dataParagraph);
    $table->addCell(null, $dataCellStyle)->addText(utf8_decode($val->ti_nm_tdp),				$dataFont, $dataParagraph);
	$table->addCell(null, $dataCellStyle)->addText(utf8_decode($val->ti_kgfm_motor),			$dataFont, $dataParagraph);
	$table->addCell(null, $dataCellStyle)->addText(utf8_decode($val->ti_nm_motor),				$dataFont, $dataParagraph);
	$table->addCell(null, $dataCellStyle)->addText(utf8_decode($val->cc_chv),					$dataFont, $dataParagraph);
	$table->addCell(null, $dataCellStyle)->addText(utf8_decode($val->cc_chm),					$dataFont, $dataParagraph);
	$table->addCell(null, $dataCellStyle)->addText(utf8_decode($val->cc_cs),					$dataFont, $dataParagraph);
	$table->addCell(null, $dataCellStyle)->addText(utf8_decode($val->consumo_energetico),		$dataFont, $dataParagraph);
	$table->addCell(null, $dataCellStyle)->addText(utf8_decode($val->eficiencia_termica),		$dataFont, $dataParagraph);
	$table->addCell(null, $dataCellStyle)->addText(utf8_decode($val->energia_especifica),		$dataFont, $dataParagraph);
}
// Esses dados provavelmente serão iguais para todas as medições, pegando o valor da última linha somente
// TODO: passar isso para a tabela de tratores?
$trator_braco =				$val->dados_braco;
$trator_fator_correcao =	$val->dados_fator_correcao;

// Estilo das imagens dos gráficos
$imageStyle = array('align'=>'center');

// Adicionando imagens
$section->addPageBreak();
$section->addImage($temp_potencia_torque_tdp,		$imageStyle);
$section->addImage($temp_potencia_torque_motor,		$imageStyle);
$section->addImage($temp_consumo_combustivel_tdp,	$imageStyle);

// Tipo de documento: arquivo docx
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Disposition: attachment; filename="' . $trator->nome . '.docx"');

$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
// Joga o resultado no navegador para download ao invés de salvar um arquivo
$objWriter->save('php://output');

// exclui arquivos temporários (imagens dos gráficos)
unlink($temp_potencia_torque_tdp);
unlink($temp_potencia_torque_motor);
unlink($temp_consumo_combustivel_tdp);