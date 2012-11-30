<?php
$relatorio = new a_dados_relatorio($trator);

if(!$relatorio->validar())
	exit('Um relatório não pode ser gerado pois esse trator não tem medições cadastradas');

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

$tableTrator = $section->addTable('tableStyle');

$tableTrator->addRow();

$tableTrator->addCell(8000, $dataCellStyle)->addText(utf8_decode("Id"), $dataFont, $dataParagraph);
$tableTrator->addCell(8000, $dataCellStyle)->addText(utf8_decode($trator->id), $dataFont, $dataParagraph);

$tableTrator->addCell(8000, $dataCellStyle)->addText(utf8_decode("Nome"), $dataFont, $dataParagraph);
$tableTrator->addCell(8000, $dataCellStyle)->addText(utf8_decode($trator->nome), $dataFont, $dataParagraph);

$tableTrator->addRow();

$tableTrator->addCell(8000, $dataCellStyle)->addText(utf8_decode("Rotação nominal do motor (rpm)"), $dataFont, $dataParagraph);
$tableTrator->addCell(8000, $dataCellStyle)->addText(utf8_decode($trator->rotacao_nominal_motor), $dataFont, $dataParagraph);

$tableTrator->addCell(8000, $dataCellStyle)->addText(utf8_decode("Rotação máxima livre (rpm)"), $dataFont, $dataParagraph);
$tableTrator->addCell(8000, $dataCellStyle)->addText(utf8_decode($trator->rotacao_maxima_livre), $dataFont, $dataParagraph);

$tableTrator->addRow();

$tableTrator->addCell(8000, $dataCellStyle)->addText(utf8_decode("Relação de transmissão Motor/TDP"), $dataFont, $dataParagraph);
$tableTrator->addCell(8000, $dataCellStyle)->addText(utf8_decode($trator->relacao_transmissao_motor), $dataFont, $dataParagraph);

$tableTrator->addCell(8000, $dataCellStyle)->addText(utf8_decode("Relação de transmissão Ventilador/motor"), $dataFont, $dataParagraph);
$tableTrator->addCell(8000, $dataCellStyle)->addText(utf8_decode($trator->relacao_transmissao_ventilador), $dataFont, $dataParagraph);

$tableTrator->addRow();

$tableTrator->addCell(8000, $dataCellStyle)->addText(utf8_decode("Horas do trator"), $dataFont, $dataParagraph);
$tableTrator->addCell(8000, $dataCellStyle)->addText(utf8_decode($trator->horas_trator), $dataFont, $dataParagraph);

$tableTrator->addCell(8000, $dataCellStyle)->addText(utf8_decode("Aspiração"), $dataFont, $dataParagraph);
$tableTrator->addCell(8000, $dataCellStyle)->addText(utf8_decode($trator->aspiracao), $dataFont, $dataParagraph);

$tableTrator->addRow();

$tableTrator->addCell(8000, $dataCellStyle)->addText(utf8_decode("Densidade combustível (kg/L)"), $dataFont, $dataParagraph);
$tableTrator->addCell(8000, $dataCellStyle)->addText(utf8_decode($trator->densidade_combustivel), $dataFont, $dataParagraph);

$tableTrator->addCell(8000, $dataCellStyle)->addText(utf8_decode("Poder calorífico (MJ/kg)"), $dataFont, $dataParagraph);
$tableTrator->addCell(8000, $dataCellStyle)->addText(utf8_decode($trator->poder_calorifico), $dataFont, $dataParagraph);

$section->addTextBreak();

// Cria uma tabela com o estilo acima e adiciona à seção
$tableMedicoes = $section->addTable('tableStyle');

// Adiciona nova linha na tabela
$tableMedicoes->addRow(2400);

// Adicionando células do cabeçalho
$tableMedicoes->addCell(8000, $headerCellStyle)->addText(utf8_decode("Motor (rpm)"),						$headerFont, $headerParagraph);
$tableMedicoes->addCell(8000, $headerCellStyle)->addText(utf8_decode("TDP (rpm)"),							$headerFont, $headerParagraph);
$tableMedicoes->addCell(8000, $headerCellStyle)->addText(utf8_decode("Ventilador (rpm)"),					$headerFont, $headerParagraph);
$tableMedicoes->addCell(8000, $headerCellStyle)->addText(utf8_decode("Medição 1"),							$headerFont, $headerParagraph);
$tableMedicoes->addCell(8000, $headerCellStyle)->addText(utf8_decode("Medição 2"),							$headerFont, $headerParagraph);
$tableMedicoes->addCell(8000, $headerCellStyle)->addText(utf8_decode("Medição 1"),							$headerFont, $headerParagraph);
$tableMedicoes->addCell(8000, $headerCellStyle)->addText(utf8_decode("Medição 2"),							$headerFont, $headerParagraph);
$tableMedicoes->addCell(8000, $headerCellStyle)->addText(utf8_decode("Força (kgf)"),						$headerFont, $headerParagraph);
$tableMedicoes->addCell(8000, $headerCellStyle)->addText(utf8_decode("kW TDP"),								$headerFont, $headerParagraph);
$tableMedicoes->addCell(8000, $headerCellStyle)->addText(utf8_decode("cv TDP"),								$headerFont, $headerParagraph);
$tableMedicoes->addCell(8000, $headerCellStyle)->addText(utf8_decode("kW Motor"),							$headerFont, $headerParagraph);
$tableMedicoes->addCell(8000, $headerCellStyle)->addText(utf8_decode("cv Motor"),							$headerFont, $headerParagraph);
$tableMedicoes->addCell(8000, $headerCellStyle)->addText(utf8_decode("kgf.m TDP"),							$headerFont, $headerParagraph);
$tableMedicoes->addCell(8000, $headerCellStyle)->addText(utf8_decode("N.m TDP"),							$headerFont, $headerParagraph);
$tableMedicoes->addCell(8000, $headerCellStyle)->addText(utf8_decode("kgf.mMotor"),							$headerFont, $headerParagraph);
$tableMedicoes->addCell(8000, $headerCellStyle)->addText(utf8_decode("N.m Motor"),							$headerFont, $headerParagraph);
$tableMedicoes->addCell(8000, $headerCellStyle)->addText(utf8_decode("Chv (L.h^-1)"),						$headerFont, $headerParagraph);
$tableMedicoes->addCell(8000, $headerCellStyle)->addText(utf8_decode("Chm (kg.h^-1)"),						$headerFont, $headerParagraph);
$tableMedicoes->addCell(8000, $headerCellStyle)->addText(utf8_decode("Cs (g.kWh^-1)"),						$headerFont, $headerParagraph);
$tableMedicoes->addCell(8000, $headerCellStyle)->addText(utf8_decode("Consumo energético (MJ.h^-1)"),		$headerFont, $headerParagraph);
$tableMedicoes->addCell(8000, $headerCellStyle)->addText(utf8_decode("Eficiência (%)"),						$headerFont, $headerParagraph);
$tableMedicoes->addCell(8000, $headerCellStyle)->addText(utf8_decode("Energia específica (kWh.L^-1)"),		$headerFont, $headerParagraph);

// Adicionando células das medições
foreach($relatorio->dados as $key => $val)
{
	$tableMedicoes->addRow();
	$tableMedicoes->addCell(null, $dataCellStyle)->addText(utf8_decode($val->rpm_motor),				$dataFont, $dataParagraph);
	$tableMedicoes->addCell(null, $dataCellStyle)->addText(utf8_decode($val->rpm_tdp),					$dataFont, $dataParagraph);
	$tableMedicoes->addCell(null, $dataCellStyle)->addText(utf8_decode($val->rpm_ventilador),			$dataFont, $dataParagraph);
	$tableMedicoes->addCell(null, $dataCellStyle)->addText(utf8_decode($val->fm_clp_1),					$dataFont, $dataParagraph);
	$tableMedicoes->addCell(null, $dataCellStyle)->addText(utf8_decode($val->fm_clp_2),					$dataFont, $dataParagraph);
	$tableMedicoes->addCell(null, $dataCellStyle)->addText(utf8_decode($val->chv_clp_1),				$dataFont, $dataParagraph);
	$tableMedicoes->addCell(null, $dataCellStyle)->addText(utf8_decode($val->chv_clp_2),				$dataFont, $dataParagraph);
	$tableMedicoes->addCell(null, $dataCellStyle)->addText(utf8_decode($val->dados_forca),				$dataFont, $dataParagraph);
	$tableMedicoes->addCell(null, $dataCellStyle)->addText(utf8_decode($val->pi_kw_tdp),				$dataFont, $dataParagraph);
	$tableMedicoes->addCell(null, $dataCellStyle)->addText(utf8_decode($val->pi_cv_tdp),				$dataFont, $dataParagraph);
	$tableMedicoes->addCell(null, $dataCellStyle)->addText(utf8_decode($val->pi_kw_motor),				$dataFont, $dataParagraph);
	$tableMedicoes->addCell(null, $dataCellStyle)->addText(utf8_decode($val->pi_cv_motor),				$dataFont, $dataParagraph);
	$tableMedicoes->addCell(null, $dataCellStyle)->addText(utf8_decode($val->ti_kgfm_tdp),				$dataFont, $dataParagraph);
    $tableMedicoes->addCell(null, $dataCellStyle)->addText(utf8_decode($val->ti_nm_tdp),				$dataFont, $dataParagraph);
	$tableMedicoes->addCell(null, $dataCellStyle)->addText(utf8_decode($val->ti_kgfm_motor),			$dataFont, $dataParagraph);
	$tableMedicoes->addCell(null, $dataCellStyle)->addText(utf8_decode($val->ti_nm_motor),				$dataFont, $dataParagraph);
	$tableMedicoes->addCell(null, $dataCellStyle)->addText(utf8_decode($val->cc_chv),					$dataFont, $dataParagraph);
	$tableMedicoes->addCell(null, $dataCellStyle)->addText(utf8_decode($val->cc_chm),					$dataFont, $dataParagraph);
	$tableMedicoes->addCell(null, $dataCellStyle)->addText(utf8_decode($val->cc_cs),					$dataFont, $dataParagraph);
	$tableMedicoes->addCell(null, $dataCellStyle)->addText(utf8_decode($val->consumo_energetico),		$dataFont, $dataParagraph);
	$tableMedicoes->addCell(null, $dataCellStyle)->addText(utf8_decode($val->eficiencia_termica),		$dataFont, $dataParagraph);
	$tableMedicoes->addCell(null, $dataCellStyle)->addText(utf8_decode($val->energia_especifica),		$dataFont, $dataParagraph);
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