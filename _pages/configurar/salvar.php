<?php
$tester = new tester();

a_configurar::validar($tester, $_POST);

if ($tester->success())
{
	a_configurar::salvar($_POST);
	echo alert::green('Configurações salvas com sucesso');
}	
else
{
	echo alert::red($tester->result_html());
}