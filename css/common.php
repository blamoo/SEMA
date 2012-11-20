<?php
session_start();
header('Content-Type: text/css');

define('SCHEME', 0);
// define('SCHEME', 1);

function s()
{
	$args = func_get_args();
	echo $args[SCHEME];
}
?>
body{
padding-top: 12px;
font-size: 12px;
font-family: tahoma;
background-color: <?php s('#104c92', 'white', '#c4ffd0'); ?>;
color: <?php s('#ffffff', '#000000'); ?>;
}

a{
color: 	<?php s('#dddddd', '#111111'); ?>;
text-decoration: none;
cursor: pointer;
}

a:hover{
text-decoration: underline;
}

.ui-tooltip-content{
text-align: center;
}

div#header{
width: 960px;
margin: 0 auto;
margin-bottom: 12px;
}

div#header img{
height: 90px;
display: block;
float: left;
margin-right: 12px;
}

div#header h1{
float: left;
height: 90px;
line-height: 90px;
font-size: 18px;
}

div#main{
width: 960px;
margin: 0 auto 24px auto;
padding: 12px;
border: 1px solid <?php s('#ffffff', '#000000'); ?>;
border-radius: 6px;
}

div#main h1{
font-size: 26px;
text-align: center;
margin-bottom: 12px;
}

/* Breadcrumb */

div#main div#breadcrumb{
margin-bottom: 12px;
}
div#main div#breadcrumb a{
text-decoration: none;
}

div#main div#breadcrumb span.bull{
color: 	<?php s('#FFA500', '#156230'); ?>;
}

div#main div#operacoes{
float: left;
background-color: #eeeeee;
padding: 6px;
border-radius: 6px;
}

/* divs de alerta */
div#main div.alert{
color: #000000;
padding: 6px;
margin-bottom: 12px;
border-radius: 6px;
}

/* cores: HSL(X, 90%, 70%) */
div#main div.alert{

}
div#main div.alert ul.erros{
list-style: disc inside;
}

div#main div.alert.yellow{
background-color: #F7EA6E;
}

div#main div.alert.green{
background-color: #ADF76E;
}

div#main div.alert.red{
background-color: #F76E6E;
}
/* formulários */

div#main form.formatted{
padding-bottom: 12px;
}

div#main form.formatted div.form_line{
float: left;
width: 960px;
margin-top: 12px;
}

div#main form.formatted div.form_line.w_1_2{width: 480px;}
div#main form.formatted div.form_line.w_1_3{width: 320px;}
div#main form.formatted div.form_line.w_2_3{width: 640px;}
div#main form.formatted div.form_line.w_1_4{width: 240px;}
div#main form.formatted div.form_line.w_3_4{width: 720px;}

div#main form.formatted label{
display: block;
margin-bottom: 3px;
}

div#main form.formatted input{
}

div#main form.formatted hr{
float: left;
width: 960px;
margin-top: 12px;
}

div#main form.formatted fieldset.confirma{
text-align: center;
}

div#main form.formatted fieldset.confirma input.confirma{
display: inline-block;
vertical-align: middle;
border: none;
color: #000000;
border-radius: 3px;
margin: 1px;
}

div#main form.formatted fieldset.confirma input.confirma:hover{
cursor: pointer;
border: 1px solid <?php s('#ffffff', '#000000'); ?>;
margin: 0;
}

div#main form.formatted fieldset.confirma input.confirma.sim{
background-color: #F76E6E;
padding: 3px;
}

div#main form.formatted fieldset.confirma input.confirma.nao{
background-color: #ADF76E;
padding: 6px;
}

/* tabelas */
div#main table.formatted{
margin-bottom: 12px;
}

div#main table.formatted thead.center th, div#main table.formatted tbody.center td{
text-align: center;
}

div#main table.formatted td, div#main table.formatted th{
padding: 3px 6px;
vertical-align: middle;
}

div#main table.formatted tbody tr:nth-child(odd){
background-color: <?php s('#406391', '#b5c5d9'); ?>;
}
div#main table.formatted tbody tr:nth-child(even){
background-color: <?php s('#3d70b3', '#bebdcc'); ?>;
}

div#main table.formatted tbody tr:hover{
background-color: <?php s('#e4e9f0', '#31507d'); ?>;
color: <?php s('#000000', '#ffffff'); ?>;
}

div#main table.formatted tbody tr:hover a{
color: <?php s('#000000', '#ffffff'); ?>;
}

div#main table.formatted thead th{
background-color: <?php s('#3a4a5f', '#3a4a5f'); ?>;
color: <?php s('#ffffff', '#ffffff'); ?>;
font-weight: bold;
}

/***********************/
/* Páginas específicas */
/***********************/

/**/
div#document_container.trator_relatorio_resumo div#main div.content{
text-align: center;
}

div#document_container.trator_relatorio_resumo div#main div.content a{
font-size: 18px;
margin: 12px;
display: inline-block;
}
div#document_container.trator_relatorio_resumo div#main div.content img{
border: 1px solid black;
margin: 3px;
width: 470px;
}

/******************/
/* Classes gerais */
/******************/
.clear{
clear:both;
overflow:hidden;
}
.hidden{
display:none;
height: 0px;
}
.notext{
color:transparent;
text-indent: -999em;
overflow: hidden;
font-size: 0px;
line-height:100%;
}
.nofill{
border: none;
background-color: transparent;
height: 24px;
}
.fl{float: left;}
.fr{float: right;}
.cl{clear: left;}
.cr{clear: right;}
.cb{clear: both;}
.tac{text-align: center;}
.tal{text-align: left;}
.tar{text-align: right;}