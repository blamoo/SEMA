<?php
$operacao = safe($_GET['operacao']);
$confirma = safe($_POST['confirma']);
$id = safe($_POST['id']);

$tester = new tester();

switch ($operacao)
{
	case 'insert':
		$trator = a_trator::criar_por_array($_POST);

		$trator->validar($operacao, $tester);

		if ($tester->success())
		{
			$trator->salvar();
			echo alert::green('Adicionado com sucesso');
			http_helper::js_redirect(a_trator::url_lista());
		}
		else
			echo alert::red($tester->result_html());
	break;

	case 'update':
		$trator = a_trator::criar_por_array($_POST);

		$trator->validar($operacao, $tester);

		if ($tester->success())
		{
			$trator->salvar();
			echo alert::green('Alterado com sucesso');
			http_helper::js_redirect($trator->url_medicao_recalcular());
		}
		else
			echo alert::red($tester->result_html());
	break;

	case 'delete':
		$trator = a_trator::criar_por_id($id);

		if ($confirma != 'Sim')
		{
			http_helper::js_redirect($trator->url_detalhes());
			exit;
		}

		$trator->validar($operacao, $tester);

		if ($tester->success())
		{
			$trator->excluir();
			http_helper::js_redirect(a_trator::url_lista());
		}
		else
			echo $tester->result_html();
	break;

	default:
		return new a_http_erro(404);
}
