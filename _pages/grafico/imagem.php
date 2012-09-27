<?php
chdir(THIRDPARTY_PATH . 'pChart/');

include('class/pData.class.php');
include('class/pDraw.class.php');
include('class/pImage.class.php');
include('class/pCache.class.php');


$titulo = safe($_GET['titulo'], 'Gráfico');

$series = safe($_GET['series']);
$eixos = safe($_GET['eixos']);
$abs = safe($_GET['abs']);

// dados do gráfico

$myData = new pData();

foreach($series as $val)
{
	$myData->addPoints($val['dados'], $val['nome']);
	$myData->setSerieOnAxis($val['nome'], $val['eixo']);
	$myData->setSerieWeight($val['nome'], 1);
}

foreach($eixos as $key => $val)
{
	$myData->setAxisName($key, $val['nome']);
	$myData->setAxisPosition($key, ($val['lado'] === 'd') ? AXIS_POSITION_RIGHT : AXIS_POSITION_LEFT);
}

$myData->addPoints($abs, 'Abscissa');

$myData->setAbscissa('Abscissa');

$largura = 640;
$altura = 440;
$margem = array('esq' => 54, 'dir' => 54, 'top' => 52, 'rod' => 24);
$altura_legenda = 40;

// desenho do gráfico
$myPicture = new pImage($largura, $altura + $altura_legenda, $myData);

$myPicture->setGraphArea($margem['esq'], $margem['top'] + $altura_legenda, $largura - $margem['dir'], $altura - $margem['rod'] + $altura_legenda);

$myPicture->Antialias = false;

$myPicture->setFontProperties(array('FontName' => 'fonts/MankSans.ttf'));

$myPicture->drawText($largura / 2, 6, $titulo, array('FontSize' => 20, 'Align' => TEXT_ALIGN_TOPMIDDLE));

$myPicture->setFontProperties(array('FontName' => 'fonts/verdana.ttf', 'FontSize' => 12));

$myPicture->drawLegend($margem['esq'], $altura_legenda + 18, array('Style' => LEGEND_NOBORDER, 'Mode' => LEGEND_HORIZONTAL));

$myPicture->setFontProperties(array('FontName' => 'fonts/verdana.ttf', 'FontSize' => 8));

$scaleSettings = array('GridR' => 200, 'GridG' => 200, 'GridB' => 200, 'DrawSubTicks' => true, 'CycleBackground' => false);

$myPicture->drawScale($scaleSettings);

$myPicture->Antialias = true;

$myPicture->setFontProperties(array('FontName' => 'fonts/pf_arma_five.ttf', 'FontSize' => 6));

$myPicture->drawSplineChart(array('DisplayValues' => false, 'DisplayOffset' => 10));

$myPicture->autoOutput();