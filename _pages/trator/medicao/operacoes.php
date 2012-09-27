<?php
$operacao = safe($_GET['operacao']);
$confirma = safe($_POST['confirma']);
$id = safe($_POST['id']);

$tester = new tester();

switch ($operacao)
{
	case 'insert':
		$medicao = a_medicao::criar_por_array($_POST);
		$medicao->set_trator($trator);

		$medicao->validar($operacao, $tester);

		if ($tester->success())
		{
			$medicao->calcular();
			$medicao->salvar();
			alert::green('Adicionado com sucesso');
			http_helper::js_redirect($trator->url_medicao_lista());
		}
		else
			echo alert::red($tester->result_html());
	break;

	case 'update':
		$medicao = a_medicao::criar_por_array($_POST);
		$medicao->set_trator($trator);

		$medicao->validar($operacao, $tester);

		if ($tester->success())
		{
			$medicao->calcular();
			$medicao->salvar();
			alert::green('Alterado com sucesso');
			http_helper::js_redirect($trator->url_medicao_lista());
		}
		else
			echo alert::red($tester->result_html());
	break;

	case 'delete':
		$medicao = a_medicao::criar_por_id($id);

		if ($confirma != 'Sim')
		{
			http_helper::js_redirect($medicao->url_detalhes());
			exit;
		}

		$medicao->validar($operacao, $tester);

		if ($tester->success())
		{
			$medicao->excluir();
			http_helper::js_redirect($trator->url_medicao_lista());
		}
		else
			echo $tester->result_html();
	break;

	case 'recalcular':
		$medicoes = a_medicao::criar_lista_por_trator($trator);

		foreach ($medicoes as $val)
		{
			$val->calcular();
			$val->salvar();
		}
		alert::green('Recalculado com sucesso');
		http_helper::js_redirect($trator->url_medicao_lista());
	break;


	default:
		return new a_http_erro(404);
}
